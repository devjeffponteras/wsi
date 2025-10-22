<?php

namespace App\Http\Controllers;

use App\Models\{Page, ArticleCategory};
use Illuminate\Http\Request;


class SitemapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Create a temporary Page instance for breadcrumb and page title
    $page = new Page();
    $page->name = 'Sitemap';

    // Generate breadcrumb trail
    $breadcrumb = $this->breadcrumb($page);

    // Get all top-level published pages except 'footer'
    $customPages = Page::where('name', '<>', 'footer')
        ->where('status', 'PUBLISHED')
        ->where('parent_page_id', 0)
        ->orderBy('id', 'asc')
        ->get();

    // Load article categories with their published articlesm 
    $articleCategories = ArticleCategory::with('articles')->get();

    // Return the sitemap view with the collected data
    return view('theme.sitemap', compact(
        'page',
        'breadcrumb',
        'customPages',
        'articleCategories'
    ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sitemap  $sitemap
     * @return \Illuminate\Http\Response
     */
    public function show(Sitemap $sitemap)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sitemap  $sitemap
     * @return \Illuminate\Http\Response
     */
    public function edit(Sitemap $sitemap)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sitemap  $sitemap
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sitemap $sitemap)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sitemap  $sitemap
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sitemap $sitemap)
    {
        //
    }

    public function breadcrumb($page)
    {
        return [
            'Home' => url('/'),
            $page->name => url('/').'/'.$page->slug
        ];
    }

     public function xml()
    {
        $customPages = Page::where('name', '<>', 'footer')
            ->where('status', 'PUBLISHED')
            ->where('parent_page_id', 0)
            ->orderBy('id', 'asc')
            ->with('subPages')
            ->get();

        $articleCategories = ArticleCategory::with('articles')->get();

        return response()
            ->view('theme.sitemap-xml', compact('customPages', 'articleCategories'))
            ->header('Content-Type', 'application/xml');
    }
}
