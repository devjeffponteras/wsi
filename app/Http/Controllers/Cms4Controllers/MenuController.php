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
        $title = $request->input('title') ?? $request->input('url') ?? '';
        $slug = ModelHelper::convert_to_slug(News::class, $title);
        return response()->json(['slug' => $slug]);
    }

    /**
     * Change status of news article.
     */
    public function change_status(Request $request)
    {
        // Normalize requested status to stored values
        $requestedStatus = strtoupper((string) $request->input('status', ''));
        $newStatus = $requestedStatus === 'PUBLISHED' ? 'Published' : 'Private';

        // Collect target IDs (single id or multiple via pipe-delimited 'pages')
        $ids = [];
        if ($request->filled('id')) {
            $ids[] = (int) $request->id;
        } elseif ($request->filled('pages')) {
            $ids = array_values(array_filter(array_map('intval', explode('|', (string) $request->pages))));
        }

        if (empty($ids)) {
            $message = 'No news selected for status update.';
            if ($request->ajax() || $request->wantsJson()) {
                return response()->json(['success' => false, 'message' => $message], 422);
            }
            return redirect()->route('news.index')->with('error', $message);
        }

        // Update all selected records
        $updated = News::whereIn('id', $ids)->update(['status' => $newStatus]);

        $message = count($ids) > 1
            ? 'Selected news articles updated to '.strtolower($newStatus).' successfully!'
            : 'News article updated to '.strtolower($newStatus).' successfully!';

        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success' => true,
                'updated' => $updated,
                'status' => $newStatus,
                'message' => $message
            ]);
        }

        return redirect()->route('news.index')->with('success', $message);
    }

    /**
     * Delete news article.
     */
    public function delete(Request $request)
    {
        $ids = [];

        if ($request->filled('id')) {
            $ids[] = (int) $request->id;
        } elseif ($request->filled('pages')) {
            $ids = array_values(array_filter(array_map('intval', explode('|', $request->pages))));
        }

        if (empty($ids)) {
            return $request->ajax() || $request->wantsJson()
                ? response()->json(['success' => false, 'message' => 'No news selected for deletion.'], 422)
                : redirect()->route('news.index')->with('error', 'No news selected for deletion.');
        }

        $newsItems = News::whereIn('id', $ids)->get();

        if ($newsItems->isEmpty()) {
            return $request->ajax() || $request->wantsJson()
                ? response()->json(['success' => false, 'message' => 'Selected news not found.'], 404)
                : redirect()->route('news.index')->with('error', 'Selected news not found.');
        }

        $newsItems->each->delete();

        $message = count($ids) > 1
            ? 'Selected news articles deleted successfully!'
            : 'News article deleted successfully!';

        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => $message
            ]);
        }

        return redirect()->route('news.index')->with('success', $message);
    }

    /**
     * Restore deleted news article.
     */
    public function restore($news)
    {
        // Include soft-deleted records when looking up the model
        $model = News::withTrashed()->findOrFail($news);
        $model->restore();

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
        // Normalize optional category
        if (empty($newData['category_id']) || $newData['category_id'] == '0') {
            $newData['category_id'] = null;
        }
        // Normalize date to Y-m-d for DB compatibility
        if (!empty($newData['date'])) {
            try {
                if (str_contains($newData['date'], '/')) {
                    $newData['date'] = \Carbon\Carbon::createFromFormat('d/m/Y', $newData['date'])->format('Y-m-d');
                } else {
                    $newData['date'] = \Carbon\Carbon::parse($newData['date'])->format('Y-m-d');
                }
            } catch (\Exception $e) {
                // leave as-is; validation already ensured it's a date
            }
        }
        // Store only filenames to keep DB clean; model accessors build public URLs
        if ($request->hasFile('news_image')) {
            $upload = FileHelper::move_to_product_file_folder($request->file('news_image'), 'images/news_image');
            $newData['banner_image'] = $upload['name'];
        } else {
            $newData['banner_image'] = null;
        }

        if ($request->hasFile('news_thumbnail')) {
            $uploadThumb = FileHelper::move_to_product_file_folder($request->file('news_thumbnail'), 'images/news_image/news_thumbnail');
            $newData['thumbnail_image'] = $uploadThumb['name'];
        } else {
            $newData['thumbnail_image'] = null;
        }
        // Enforce featured limit
        if ($request->has('is_featured') && News::can_set_featured()) {
            $newData['is_featured'] = News::featured_count() < News::featured_limit();
        } else {
            $newData['is_featured'] = false;
        }
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
        // Preserve featured if already featured and checkbox remains checked; otherwise enforce limit when turning on
        if ($request->has('is_featured')) {
            if ($news->is_featured) {
                $updateData['is_featured'] = true; // remains featured if still checked
            } else {
                $updateData['is_featured'] = News::can_set_featured() && (News::featured_count() < News::featured_limit());
            }
        } else {
            $updateData['is_featured'] = false; // checkbox not checked
        }
        $updateData['user_id'] = auth()->id();

        // Normalize optional category
        if (empty($updateData['category_id']) || $updateData['category_id'] == '0') {
            $updateData['category_id'] = null;
        }
        // Normalize date to Y-m-d
        if (!empty($updateData['date'])) {
            try {
                if (str_contains($updateData['date'], '/')) {
                    $updateData['date'] = \Carbon\Carbon::createFromFormat('d/m/Y', $updateData['date'])->format('Y-m-d');
                } else {
                    $updateData['date'] = \Carbon\Carbon::parse($updateData['date'])->format('Y-m-d');
                }
            } catch (\Exception $e) {
                // keep original
            }
        }

        // Handle image upload/deletion
        if ($request->has('delete_image') || $request->hasFile('news_image')) {
            if ($news->banner_image) {
                FileHelper::delete_file($news->get_banner_image_storage_path());
            }
            $updateData['banner_image'] = null;
            if ($request->hasFile('news_image')) {
                $uploadResult = FileHelper::move_to_product_file_folder($request->file('news_image'), 'images/news_image');
                $updateData['banner_image'] = $uploadResult['name'];
            }
        }

        // Handle thumbnail upload/deletion
        if ($request->has('delete_thumbnail') || $request->hasFile('news_thumbnail')) {
            if ($news->thumbnail_image) {
                FileHelper::delete_file($news->get_thumbnail_image_storage_path());
            }
            $updateData['thumbnail_image'] = null;
            if ($request->hasFile('news_thumbnail')) {
                $uploadResult = FileHelper::move_to_product_file_folder($request->file('news_thumbnail'), 'images/news_image/news_thumbnail');
                $updateData['thumbnail_image'] = $uploadResult['name'];
            }
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
