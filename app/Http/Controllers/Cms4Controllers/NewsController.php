<?php

namespace App\Http\Controllers\Cms4Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\NewsRequest;
use App\Models\News;
use App\Models\ArticleCategory;
use Facades\App\Helpers\ListingHelper;
use Facades\App\Helpers\FileHelper;
use App\Helpers\ModelHelper;
use Auth;

class NewsController extends Controller
{
    private $searchFields = ['name'];
    private $advanceSearchFields = ['teaser', 'is_featured', 'name', 'contents', 'status', 'meta_title', 'meta_keyword', 'meta_description', 'user_id', 'category_id', 'updated_at1', 'updated_at2'];
    private $sortFields = ['updated_at', 'name', 'is_featured'];

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $news = ListingHelper::simple_search(News::class, $this->searchFields);
        $filter = ListingHelper::get_filter($this->searchFields);

        $advanceSearchData = ListingHelper::get_search_data($this->advanceSearchFields);
        $uniqueNewsByCategory = ListingHelper::get_unique_item_by_column(News::class, 'category_id');
        $uniqueNewsByUser = ListingHelper::get_unique_item_by_column(News::class, 'user_id');

        $searchType = 'simple_search';

        return view('admin.cms4.news.index', compact(
            'news',
            'filter',
            'advanceSearchData',
            'uniqueNewsByCategory',
            'uniqueNewsByUser',
            'searchType'
        ));
    }

    /**
     * Get slug for a given title.
     */
    public function get_slug(Request $request)
    {
        $slug = ModelHelper::convert_to_slug(News::class, $request->title);
        return response()->json(['slug' => $slug]);
    }

    /**
     * Change status of news article.
     */
    public function change_status(Request $request)
    {
        $news = News::findOrFail($request->id);
        $news->status = $request->status;
        $news->save();

        return response()->json([
            'success' => true,
            'message' => 'Status updated successfully!'
        ]);
    }

    /**
     * Delete news article.
     */
    public function delete(Request $request)
    {
        $news = News::findOrFail($request->id);
        $news->delete();

        // If request expects JSON (AJAX), return JSON. Otherwise redirect back with flash message
        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'News article deleted successfully!'
            ]);
        }

        return redirect()->route('news.index')->with('success', 'News article deleted successfully!');
    }

    /**
     * Restore deleted news article.
     */
    public function restore(News $news)
    {
        $news->restore();

        return redirect()->route('news.index')->with('success', 'News article restored successfully!');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = ArticleCategory::all();
        return view('admin.cms4.news.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(NewsRequest $request)
    {
        $newData = $request->validated();

        $newData['slug'] = ModelHelper::convert_to_slug(News::class, $newData['name']);
        $newData['status'] = $request->has('visibility') ? 'Published' : 'Private';
        $newData['banner_image'] = $request->hasFile('news_image') ? FileHelper::move_to_folder($request->file('news_image'), 'news_image')['url'] : null;
        $newData['thumbnail_image'] = $request->hasFile('news_thumbnail') ? FileHelper::move_to_folder($request->file('news_thumbnail'), 'news_image/news_thumbnail')['url'] : null;
        $newData['is_featured'] = News::can_set_featured() && $request->has('is_featured');
        $newData['user_id'] = auth()->id();

        News::create($newData);

        return redirect()->route('news.index')->with('success', 'News article created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(News $news)
    {
        return view('admin.cms4.news.show', compact('news'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(News $news)
    {
        $categories = ArticleCategory::all();
        return view('admin.cms4.news.edit', compact('news', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(NewsRequest $request, News $news)
    {
        \Log::info('News update started', [
            'news_id' => $news->id,
            'has_news_image' => $request->hasFile('news_image'),
            'has_delete_image' => $request->has('delete_image'),
            'image_url_input' => $request->input('image_url')
        ]);

        $updateData = $request->validated();

        $updateData['slug'] = $news->name != $updateData['name'] ? ModelHelper::convert_to_slug(News::class, $updateData['name']) : $news->slug;
        $updateData['status'] = $request->has('visibility') ? 'Published' : 'Private';
        $updateData['is_featured'] = $news->is_featured ? $request->has('is_featured') : News::can_set_featured() && $request->has('is_featured');
        $updateData['user_id'] = auth()->id();

        // Handle image upload/deletion
        if ($request->has('delete_image') || $request->hasFile('news_image')) {
            if ($news->banner_image) {
                FileHelper::delete_file($news->get_banner_image_storage_path());
            }
            $updateData['banner_image'] = null;
            if ($request->hasFile('news_image')) {
                $uploadResult = FileHelper::move_to_folder($request->file('news_image'), 'news_image');
                $updateData['banner_image'] = $uploadResult['url'];
            }
        }

        // Handle thumbnail upload/deletion
        if ($request->has('delete_thumbnail') || $request->hasFile('news_thumbnail')) {
            if ($news->thumbnail_image) {
                FileHelper::delete_file($news->get_thumbnail_image_storage_path());
            }
            $updateData['thumbnail_image'] = null;
            if ($request->hasFile('news_thumbnail')) {
                $uploadResult = FileHelper::move_to_folder($request->file('news_thumbnail'), 'news_image/news_thumbnail');
                $updateData['thumbnail_image'] = $uploadResult['url'];
            }
        } elseif ($request->filled('thumbnail_url')) {
            $updateData['thumbnail_url'] = $request->thumbnail_url;
        }

        $news->update($updateData);

        return redirect()->route('news.index')->with('success', 'News article updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(News $news)
    {
        $news->delete();
        return redirect()->route('news.index')->with('success', 'News article deleted successfully!');
    }

    /**
     * Advanced search functionality.
     */
    public function advance_index(Request $request)
    {
        $equalQueryFields = ['category_id', 'status', 'user_id'];

        $news = ListingHelper::sort_by('is_featured')
            ->filter_fields($this->sortFields)
            ->advance_search(News::class, $this->advanceSearchFields, $equalQueryFields);

        $filter = ListingHelper::filter_fields($this->sortFields)->get_filter($this->searchFields);

        $advanceSearchData = ListingHelper::get_search_data($this->advanceSearchFields);
        $uniqueNewsByCategory = ListingHelper::get_unique_item_by_column(News::class, 'category_id');
        $uniqueNewsByUser = ListingHelper::get_unique_item_by_column(News::class, 'user_id');

        $searchType = 'advance_search';

        return view('admin.cms4.news.index', compact(
            'news',
            'filter',
            'advanceSearchData',
            'uniqueNewsByCategory',
            'uniqueNewsByUser',
            'searchType'
        ));
    }
}
