<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Facades\App\Helpers\ListingHelper;

use App\Http\Requests\ContactUsRequest;
use App\Helpers\Setting;

use Illuminate\Support\Facades\Mail;
use App\Mail\InquiryAdminMail;
use App\Mail\InquiryMail;

use App\Models\Article;
use App\Models\Page;
use App\Models\User;

use App\Models\ResourceCategory;
use App\Models\Resource;
use App\Models\TemplateCategory;
use App\Models\Template;
use App\Models\EmailRecipient;
use App\Models\ArticleCategory;
use App\Models\Ecommerce\{BannerAd, BannerAdPage};

use Auth;
use DB;
use Session;
use Illuminate\Pagination\LengthAwarePaginator;



class FrontController extends Controller
{

    public function registration()
    {
        $categories = TemplateCategory::where('status','Active')->orderBy('name','asc')->get();
        $templates  = Template::where('status','Active')->get();
        return view('theme.template-registration',compact('categories','templates'));
    }

    public function request_for_demo($id)
    {
        $template = Template::find($id);

        return view('theme.demo',compact('template'));
    }

    public function home()
    {
        // condition here? by jeff p.

        return $this->page('home');
    }

    public function privacy_policy(){

        $footer = Page::where('slug', 'footer')->where('name', 'footer')->first();

        $page = new Page();
        $page->name = 'Privacy Policy';

        $breadcrumb = $this->breadcrumb($page);

        return view('theme.pages.privacy-policy', compact('page', 'footer','breadcrumb'));

    }

    public function privacy_terms()
    {
        $footer = Page::where('slug', 'footer')->where('name', 'footer')->first();

        $content = Page::where('slug', 'privacy-terms')
            ->orWhere('slug', 'privacy-policy-terms-of-use')
            ->orWhere('name', 'Privacy Policy & Terms of Use')
            ->first();

        $page = $content ?? new Page();
        if (empty($page->name)) {
            $page->name = 'Privacy Policy & Terms of Use';
        }



        $breadcrumb = $this->breadcrumb($page);

        $forcePageBanner = true;
        $forceHomeBanner = false;

        return view('theme.pages.privacy-terms', [
            'page' => $page,
            'footer' => $footer,
            'breadcrumb' => $breadcrumb,
            'content' => $content,
            'forcePageBanner' => $forcePageBanner,
            'forceHomeBanner' => $forceHomeBanner,
        ]);
    }

    public function sitemap()
    {
        // return $this->page('sitemap');

        $page = $this->page('sitemap')->page;

        $breadcrumb = $this->breadcrumb($page);

        $customPages = Page::where('name', '<>', 'footer')->where('status', 'PUBLISHED')->where('parent_page_id', 0)->orderBy('id','asc')->get();

    $articleCategories = ArticleCategory::published()->with('articles')->get();

        return view('theme.pages.sitemap', compact(
            'page',
            'breadcrumb',
            'articleCategories',
            'customPages'
        ));
    }

    public function seach_result(Request $request)
    {
        // dd($request->searchtxt);
        $page = new Page();
        $page->name = 'Search Results';

        $breadcrumb = $this->breadcrumb($page);
        $pageLimit = 10;

        $searchtxt = $request->searchtxt;
        session(['searchtxt' => $searchtxt]);

        $pages = Page::where('status', 'PUBLISHED')
            ->whereNotIn('slug', ['footer', 'home'])
            ->where(function ($query) use ($searchtxt) {
                $query->where('name', 'like', '%' . $searchtxt . '%')
                    ->orWhere('contents', 'like', '%' . $searchtxt . '%');
            })
            ->select('name', 'slug')
            ->orderBy('name', 'asc')
            ->get();

        $news = Article::where('status', 'PUBLISHED')
            ->where(function ($query) use ($searchtxt) {
                $query->where('name', 'like', '%' . $searchtxt . '%')
                    ->orWhere('contents', 'like', '%' . $searchtxt . '%');
            })
            ->select('name', 'slug')
            ->orderBy('name', 'asc')
            ->get();

        // // Products (books)
        // $products = Product::where('status', 'PUBLISHED')
        //     ->whereRaw('LOWER(book_type) NOT IN (?, ?)', ['ebook', 'e-book'])
        //     ->where(function ($query) use ($searchtxt) {
        //         $query->where('name', 'like', '%' . $searchtxt . '%')
        //             ->orWhere('author', 'like', '%' . $searchtxt . '%');
        //     })
        //     ->select('name', 'slug')
        //     ->orderBy('name', 'asc')
        //     ->get();

        // $products = Product::select('products.*')->leftJoin('product_additional_infos', 'products.id', '=', 'product_additional_infos.product_id')
        // ->where('products.status', 'PUBLISHED')->get();

        // Resources (cases)
        $resources = Resource::where('status', 'Active')
            ->where(function ($query) use ($searchtxt) {
                $query->where('name', 'like', '%' . $searchtxt . '%')
                    ->orWhere('description', 'like', '%' . $searchtxt . '%');
            })
            ->select('name', 'slug')
            ->orderBy('name', 'asc')
            ->get();

        // products are not relevant for this search context — exclude them
        // $totalItems = $pages->count() + $news->count() + $products->count() + $resources->count();
        $totalItems = $pages->count() + $news->count() + $resources->count();

        // If exactly one result, redirect straight to that page/article for better UX
        if ($totalItems === 1) {
            if ($pages->count() === 1) {
                $slug = $pages->first()->slug;
                return redirect(url($slug));
            }
            if ($news->count() === 1) {
                $slug = $news->first()->slug;
                return redirect(route('news.front.show', $slug));
            }
            // products intentionally excluded from single-result redirect
            if ($resources->count() === 1) {
                $slug = $resources->first()->slug;
                return redirect(route('resource-details.front.show', $slug));
            }
            // Fallback: pick first merged item and check existence
            $first = collect($pages)->merge($news)->merge($resources)->first();
            if ($first) {
                $slug = $first->slug ?? null;
                if ($slug) {
                    if (Page::where('slug', $slug)->exists()) return redirect(url($slug));
                    if (Article::where('slug', $slug)->exists()) return redirect(route('news.front.show', $slug));
                }
            }
        }

        // Exclude products from search results for now
        // $searchResult = collect($pages)->merge($news)->merge($products)->merge($resources);
        $searchResult = collect($pages)->merge($news)->merge($resources);

        // Simple manual pagination for collections (10 per page)
        $perPage = 10;
        $currentPage = (int) ($request->get('page', 1));
        $currentItems = $searchResult->slice(($currentPage - 1) * $perPage, $perPage)->all();
        $searchResult = new LengthAwarePaginator($currentItems, $searchResult->count(), $perPage, $currentPage, [
            'path' => $request->url(),
        ]);

        return view('theme.pages.search-result', compact('searchResult', 'totalItems', 'page','breadcrumb'));
    }

    /**
     * Wrapper for /search route — accepts `q` param from header and forwards
     * it to the existing seach_result handler (which expects `searchtxt`).
     */
    public function search(Request $request)
    {
        // map `q` => `searchtxt` so existing logic can be reused
        $q = $request->get('q', $request->get('searchtxt', ''));
        $request->merge(['searchtxt' => $q]);
        return $this->seach_result($request);
    }

    public function page($slug = "home")
    {

        if (Auth::guest()) {
            $page = Page::where('slug', $slug)->where('status', 'PUBLISHED')->first();
        } else {
            $page = Page::where('slug', $slug)->first();
        }

        if ($page == null) {
            $view404 = 'theme.pages.404';
            if (view()->exists($view404)) {
                $page = new Page();
                $page->name = 'Page not found';
                return view($view404, compact('page'));
            }

            abort(404);
        }
        $breadcrumb = $this->breadcrumb($page);

        $footer = Page::where('slug', 'footer')->where('name', 'footer')->first();

        if (!empty($page->template)) {
            return view('theme.pages.'.$page->template, compact('footer', 'page', 'breadcrumb'));
        }

        $parentPage = null;
        $parentPageName = $page->name;
        $currentPageItems = [];
        $currentPageItems[] = $page->id;
        if ($page->has_parent_page() || $page->has_sub_pages()) {
            if ($page->has_parent_page()) {
                $parentPage = $page->parent_page;
                $parentPageName = $parentPage->name;
                $currentPageItems[] = $parentPage->id;
                while ($parentPage->has_parent_page()) {
                    $parentPage = $parentPage->parent_page;
                    $currentPageItems[] = $parentPage->id;
                }
            } else {
                $parentPage = $page;
                $currentPageItems[] = $parentPage->id;
            }
        }

        return view('theme.page', compact('footer', 'page', 'parentPage', 'breadcrumb', 'currentPageItems', 'parentPageName'));
    }


    public function contact_us(Request $request)
{
    $validated = $request->validate([
        'name'     => 'required|string|max:255',
        'email'    => 'required|email|max:255',
        'contact'  => 'required|string|max:50',
        'message'  => 'required|string',
        'services' => 'nullable|string|max:255',
        'subject'  => 'nullable|string|max:255',
    ], [
        'name.required'    => 'Full Name is required.',
        'email.required'   => 'E-mail Address is required.',
        'email.email'      => 'Please enter a valid email address.',
        'contact.required' => 'Contact Number is required.',
        'message.required' => 'Message is required.',
    ]);

    $settings = Setting::info();

    // Send confirmation to client (only if email is valid)
    Mail::to($validated['email'])->send(new InquiryMail($settings, $validated));

    // Send to admins - FILTER OUT invalid/empty emails
    $emailRecipients = EmailRecipient::query()
        ->whereNotNull('email')
        ->where('email', '!=', '')
        ->get()
        ->filter(fn ($r) => filter_var($r->email, FILTER_VALIDATE_EMAIL));

    foreach ($emailRecipients as $recipient) {
        Mail::to($recipient->email)->send(new InquiryAdminMail($settings, $validated, $recipient));
    }

    return back()->with('success', 'Email sent!');
}

    // public function contact_us(ContactUsRequest $request)
    // {
    //     $admins  = User::where('role_id', 1)->get();
    //     $client = $request->all();

    //     Mail::to($client['email'])->send(new InquiryMail(Setting::info(), $client));

    //     foreach ($admins as $admin) {
    //         Mail::to($admin->email)->send(new InquiryAdminMail(Setting::info(), $client, $admin));
    //     }

    //     if (Mail::failures()) {
    //         return redirect()->back()->with('error','Failed to send inquiry. Please try again later.');
    //     }

    //     return redirect()->back()->with('success','Email sent!');
    // }

    public function breadcrumb($page)
    {
        return [
            'Home' => url('/'),
            $page->name => url('/').'/'.$page->slug
        ];
    }

    public function resource_list(Request $request)
    {
        Session::put('menuName', 'cases');

        //dd(Session::get('menuName'));
        $filterYear = $request->get('year',false);

        $page = Page::where('slug', 'cases')->first();
        $page->name = "Cases";

        $breadcrumb = $this->breadcrumb($page);

        // $years = DB::select('SELECT year(created_at) as yr FROM `resources`  where deleted_at is null and status = "Active" GROUP by year(created_at) ORDER BY year(created_at)');

        $years = DB::select('SELECT year(publish_date) as yr FROM `resources`  where deleted_at is null and status = "Active" GROUP by year(publish_date) ORDER BY year(publish_date)');


        $categories = ResourceCategory::where('status', 'Active')->get();
        $searchCategories = ResourceCategory::where('id', '<>', 3)->where('status', 'Active')->orderBy('name', 'asc')->get();


        $resources = Resource::where('status', 'Active');

        if($filterYear){
            $resources->whereYear('publish_date', $request->year);
        }

        $resources = $resources->orderBy('publish_date', 'desc')->orderBy('name', 'asc')->get();
        // dd($resources);
        $categorySlug = "Cases";
        $slug = "";
        $keyword = "";
        // dd($searchCategories);
        return view('theme.pages.resource-list', compact('page', 'resources','categories','breadcrumb', 'categorySlug', 'years', 'filterYear', 'searchCategories', 'slug', 'keyword'));
    }

    public function resource_category_list(Request $request, $slug)
    {
        Session::put('menuName', 'cases');

        $filterYear = $request->get('year',false);
        $keyword = $request->get('keyword',false);
        // dd($filterYear);
        $resourceCategory = ResourceCategory::where('slug', $slug)->first();
        $page = Page::where('slug', 'cases')->first();

        // dd($resourceCategory->id);

        $page->name = $resourceCategory->name;

        $breadcrumb = $this->breadcrumb($page);

        // $years = DB::select('SELECT year(created_at) as yr FROM `resources`  where deleted_at is null and status = "Active" GROUP by year(created_at) ORDER BY year(created_at)');

        $years = DB::select('SELECT year(publish_date) as yr FROM `resources`  where deleted_at is null and status = "Active" GROUP by year(publish_date) ORDER BY year(publish_date)');

        $resources = Resource::where('category_id', $resourceCategory->id);

        if($filterYear) {
            $resources->whereYear('publish_date', $request->year);
        }

        if($keyword) {
            $resources->where('category_id', $resourceCategory->id);
        }

        $resources = $resources->orderBy('publish_date', 'desc')->orderBy('name', 'asc')->paginate(10);
        // dd($resources);
        //$categories = ResourceCategory::where('id', '<>', 3)->where('parent_id', 0)->where('status', 'Active')->orderBy('name', 'asc')->get();
        $categories = ResourceCategory::where('status', 'Active')->get();
        $searchCategories = ResourceCategory::where('id', '<>', 3)->where('status', 'Active')->orderBy('name', 'asc')->get();
        // $searchCategories = ResourceCategory::where('id', $resourceCategory->id )->orderBy('name', 'asc')->get();

        $categorySlug = $resourceCategory->name;

        return view('theme.pages.resource-list', compact('page', 'resources','categories','breadcrumb', 'categorySlug', 'years', 'filterYear', 'searchCategories', 'keyword', 'slug'));
    }

    public function resource_details($slug)
    {
        Session::put('menuName', 'cases');

        $resource = Resource::where('slug', $slug)->first();

        $page = Page::where('slug', 'cases')->first();
        $page->name = "$resource->name";

        $breadcrumb = $this->breadcrumb($page);

        return view('theme.pages.resource-details', compact('page', 'resource','breadcrumb'));

    }

    /**
     * Return quick links (latest articles) for a given category slug or 'all'.
     * Responds with JSON array of articles {name, slug, date}
     */

    public function portfolio() {
        $page = new Page();
        $page->name = 'Portfolio';

        return view('theme.pages.portfolio.index', compact('page'));
    }

        public function aboutus()
    {
        \Log::info('Loading about page with partials: theme.pages.about-history, theme.pages.about-company, theme.pages.about-mission-vision');

        $pageRecord = Page::with(['album.banners' => function ($query) {
                $query->orderBy('order', 'asc');
            }])
            ->where(function ($query) {
                $query->where('slug', 'about-us')->orWhere('name', 'About Us');
            })
            ->first();

        if ($pageRecord) {
            $page = $pageRecord;
            if (empty($page->slug)) {
                $page->slug = 'about-us';
            }
            if (empty($page->name)) {
                $page->name = 'About Us';
            }
        } else {
            $page = new Page();
            $page->name = 'About Us';
            $page->slug = 'about-us';
        }

        $forceHomeBanner = false;
        $forcePageBanner = true;

        $hasBanners = $page && $page->album && $page->album->banners && $page->album->banners->count() > 0;

        if (!$hasBanners && empty($page->image_url)) {
            $page->image_url = asset('theme/images/banners/no-banner.jpg');
        }

        $breadcrumb = $this->breadcrumb($page);
        $content = $pageRecord ?? Page::where('name', 'About Us')->first();
        if (!$content) {
            $content = new Page();
        }
        $footer = Page::where('slug', 'footer')->where('name', 'footer')->first();

        return view('theme.pages.about-us', compact('content','footer', 'page', 'breadcrumb', 'forceHomeBanner', 'forcePageBanner'));
    }


      public function services()
    {
        \Log::info('Loading about page with partials: theme.pages.about-history, theme.pages.about-company, theme.pages.about-mission-vision');
        $pageRecord = Page::with(['album.banners' => function ($query) {
                $query->orderBy('order', 'asc');
            }])
            ->where(function ($query) {
                $query->where('slug', 'services')->orWhere('name', 'Services');
            })
            ->first();

        if ($pageRecord) {
            $page = $pageRecord;
            if (empty($page->slug)) {
                $page->slug = 'services';
            }
            if (empty($page->name)) {
                $page->name = 'Services';
            }
        } else {
            $page = new Page();
            $page->name = 'Services';
            $page->slug = 'services';
        }

        $forceHomeBanner = false;
        $forcePageBanner = true;

        $hasBanners = $page && $page->album && $page->album->banners && $page->album->banners->count() > 0;

        if (!$hasBanners && empty($page->image_url)) {
            $page->image_url = asset('theme/images/banners/no-banner.jpg');
        }

        $breadcrumb = $this->breadcrumb($page);
        $content = $pageRecord ?? Page::where('name', 'Services')->first();
        if (!$content) {
            $content = new Page();
        }
        $footer = Page::where('slug', 'footer')->where('name', 'footer')->first();
        return view('theme.pages.services', compact('content','footer', 'page', 'breadcrumb', 'forceHomeBanner', 'forcePageBanner'));
    }
        public function services_domain()
    {
        \Log::info('Loading services page with partials: theme.pages.service_domain');
        $page = new Page();
        $page->name = 'Domain';
        $page->slug = 'services/services_domain';
        $breadcrumb = $this->breadcrumb($page);
        $content = Page::where('name', 'Domain')->first();
        $footer = Page::where('slug', 'footer')->where('name', 'footer')->first();
        //return $content;
        return view('theme.pages.services_domain', compact('content','footer', 'page', 'breadcrumb'));
    }

        public function services_webdev()
    {
        \Log::info('Loading services page with partials: theme.pages.services_webdev');
        $page = new Page();
        $page->name = 'Web Development';
        $page->slug = 'services/services_webdev';
        $breadcrumb = $this->breadcrumb($page);
        $content = Page::where('name', 'Web Development')->first();
        $footer = Page::where('slug', 'footer')->where('name', 'footer')->first();
        return view('theme.pages.services_webdev', compact('content','footer', 'page', 'breadcrumb'));

}
        public function services_hosting()
    {
        \Log::info('Loading services page with partials: theme.pages.services_hosting');
        $page = new Page();
        $page->name = 'Hosting';
        $page->slug = 'services/services_hosting';
        $breadcrumb = $this->breadcrumb($page);
        $content = Page::where('name', 'Hosting')->first();
        $footer = Page::where('slug', 'footer')->where('name', 'footer')->first();
        return view('theme.pages.services_hosting', compact('content','footer', 'page', 'breadcrumb'));

}

        public function services_dms()
    {
        \Log::info('Loading services page with partials: theme.pages.services_dms');
        $page = new Page();
        $page->name = 'DMS';
        $page->slug = 'services/services_dms';
        $breadcrumb = $this->breadcrumb($page);
        $content = Page::where('name', 'DMS')->first();
        $footer = Page::where('slug', 'footer')->where('name', 'footer')->first();
        return view('theme.pages.services_dms', compact('content','footer', 'page', 'breadcrumb'));
        //return $content;
}

     public function news()
    {
        \Log::info('Loading news page with database articles');
        $page = Page::with(['album.banners' => function ($query) {
                $query->orderBy('order', 'asc');
            }])
            ->where('slug', 'news')
            ->first();

        if (!$page) {
            $page = new Page();
            $page->name = 'News';
            $page->slug = 'news';
        }
        $breadcrumb = $this->breadcrumb($page);
        $footer = Page::where('slug', 'footer')->where('name', 'footer')->first();

        // Fetch articles from new News model
        $featuredArticle = \App\Models\News::where('status', 'Published')
            ->where('is_featured', 1)
            ->with('category')
            ->latest('date')
            ->first();

        $latestArticles = \App\Models\News::where('status', 'Published')
            ->with('category')
            ->latest('date')
            ->limit(6)
            ->get()
            ->map(function($article) {
                $article->excerpt = $article->teaser ? \Illuminate\Support\Str::limit($article->teaser, 120) : '';
                return $article;
            });

        $quickLinkArticles = \App\Models\News::where('status', 'Published')
            ->with('category')
            ->orderByDesc('date')
            ->skip(1)
            ->take(8)
            ->get()
            ->groupBy(function ($article) {
                return \Carbon\Carbon::parse($article->date)->format('F j, Y');
            });

    $categories = \App\Models\ArticleCategory::published()->with(['news' => function($query) {
                $query->where('status', 'Published');
            }])
            ->get();

        // Group articles by category for different sections
        $pressReleases = \App\Models\News::where('status', 'Published')
            ->whereHas('category', function($q) {
                $q->where('name', 'LIKE', '%Press Release%')
                  ->orWhere('name', 'LIKE', '%Announcements%');
            })
            ->with('category')
            ->latest('date')
            ->limit(3)
            ->get();

        $companyUpdates = \App\Models\News::where('status', 'Published')
            ->whereHas('category', function($q) {
                $q->where('name', 'LIKE', '%Company%')
                  ->orWhere('name', 'LIKE', '%Events%');
            })
            ->with('category')
            ->latest('date')
            ->limit(3)
            ->get()
            ->map(function($article) {
                $article->excerpt = $article->teaser ? \Illuminate\Support\Str::limit($article->teaser, 120) : '';
                return $article;
            });

        $thoughtLeadership = \App\Models\News::where('status', 'Published')
            ->whereHas('category', function($q) {
                $q->where('name', 'LIKE', '%Thought%')->orWhere('name', 'LIKE', '%Leadership%');
            })
            ->with('category')
            ->latest('date')
            ->limit(3)
            ->get()
            ->map(function($article) {
                $article->excerpt = $article->teaser ? \Illuminate\Support\Str::limit($article->teaser, 120) : '';
                return $article;
            });

        return view('theme.pages.news', compact(
            'footer', 'page', 'breadcrumb', 'featuredArticle', 'latestArticles',
            'quickLinkArticles', 'categories', 'pressReleases', 'companyUpdates', 'thoughtLeadership'
        ));
    }

    public function news_detail($slug)
    {
        // Fetch the specific article
        $news = \App\Models\News::where('slug', $slug)
            ->where('status', 'Published')
            ->with(['category', 'user'])
            ->first();

        if (!$news) {
            abort(404, 'Article not found');
        }

        // Fetch latest articles for sidebar (excluding current article)
        $latestArticles = \App\Models\News::where('status', 'Published')
            ->where('id', '!=', $news->id)
            ->with('category')
            ->latest('date')
            ->limit(5)
            ->get();

        $breadcrumb = ['Home' => url('/'), 'News' => url('/news'), $news->name => '#'];
        $page = new Page();
        $page->name = $news->name;
        $page->slug = $slug;
        $footer = Page::where('slug', 'footer')->where('name', 'footer')->first();

        return view('theme.pages.news', compact('news', 'latestArticles', 'breadcrumb', 'page', 'footer'));
    }

}
