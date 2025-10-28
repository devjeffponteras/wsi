<?php

namespace App\Http\Controllers\Cms4Controllers; 

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Http\Requests\PageContactUsRequest;
use App\Http\Requests\PageCustomizeRequest;
use App\Http\Requests\PageStandardRequest;
use App\Http\Requests\PageDefaultRequest;
use App\Http\Requests\PagePost;

use Facades\App\Helpers\ListingHelper;
use Facades\App\Helpers\FileHelper;
use App\Helpers\Setting;
use App\Helpers\ModelHelper;

use App\Models\EmailRecipient;
use App\Models\Permission;
use App\Models\Category;
use App\Models\Article;
use App\Models\Album;
use App\Models\Menu;
use App\Models\Page;

use Response;
use Storage;
use Auth;

class ServicesController extends Controller
{
    private $searchFields = ['name'];
    private $advanceSearchFields = ['album_id', 'name', 'label', 'contents', 'status', 'meta_title', 'meta_keyword', 'meta_description', 'user_id', 'updated_at1', 'updated_at2'];

    public function __construct()
    {
        Permission::module_init($this, 1);
    }
    
     public function services_index(Request $request)
    {
        $pages = Page::whereIn('name', ['Services', 'Hosting', 'Domain', 'Web Development', 'DMS'])
             ->paginate(10);

        $filter = ListingHelper::get_filter($this->searchFields);

        $advanceSearchData = ListingHelper::get_search_data($this->advanceSearchFields);
        $uniquePagesByAlbum = ListingHelper::get_unique_item_by_column(Page::class, 'album_id');
        $uniquePagesByUser = ListingHelper::get_unique_item_by_column(Page::class, 'user_id');

        $searchType = 'simple_search';

        //return $pages;
        return view('admin.cms4.services.index', compact('pages', 'filter', 'advanceSearchData', 'uniquePagesByAlbum', 'uniquePagesByUser', 'searchType'));
    }
    public function edit(Page $page)
    {
        $albums = Album::where('type', 'sub_banner')->get();
        $parentPages = Page::where('id', '!=', $page->id)->where('page_type', '=', 'standard')->get();
        $pageAlbum = $page->album;

        if ($page->is_contact_us_page()) {
            $settings = \App\Models\Setting::find(1);
            $emails = EmailRecipient::email_list_str();

            return view('admin.cms4.pages.contact-us', compact('page', 'parentPages', 'albums', 'pageAlbum', 'settings', 'emails'));
        } else if ($page->is_default_page()) {
            return view('admin.cms4.pages.default', compact('page'));
        } else if ($page->is_customize_page()) {
            return view('admin.cms4.pages.customize', compact('page', 'parentPages', 'albums', 'pageAlbum'));
        } else {
            return view('admin.cms4.pages.edit', compact('page', 'parentPages', 'albums', 'pageAlbum'));
        }
    }

    
    public function update(PageStandardRequest $request, Page $page)
    {
        $updateData = $request->validated();
        $updateData['album_id'] = empty($updateData['album_id']) ? 0 : $updateData['album_id'];
        $updateData['parent_page_id'] = empty($updateData['parent_page_id']) ? 0 : $updateData['parent_page_id'];
        $updateData['status'] = $request->has('visibility') ? 'PUBLISHED' : 'PRIVATE';
        $updateData['page_type'] = 'standard';
        $updateData['slug'] = $page->name == $updateData['name'] && $page->parent_page_id == $updateData['parent_page_id'] ?
                            $page->slug : ModelHelper::convert_to_slug(Page::class, $updateData['name'], $updateData['parent_page_id']);
        $updateData['user_id'] = auth()->id();

        if ($request->banner_type == 'banner_slider' || $request->has('delete_image')) {
            Storage::disk('public')->delete($page->get_image_url_storage_path());
            $updateData['image_url'] = '';
        }

        if ($request->hasFile('image_url')) {
            $updateData['image_url'] = FileHelper::move_to_folder($request->file('image_url'), 'banners')['url'];
        }

        $page->update($updateData);

        return back()->with('success', __('standard.pages.update_success'));
    }
}
