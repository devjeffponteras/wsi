{!! '<'.'?xml version="1.0" encoding="UTF-8"?>' !!}
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">

    {{-- Homepage --}}
    <url>
        <loc>{{ url('/') }}</loc>
        <lastmod>{{ now()->tz('UTC')->toAtomString() }}</lastmod>
        <changefreq>daily</changefreq>
        <priority>1.0</priority>
    </url>

    {{-- Custom Pages --}}
    @foreach ($customPages as $page)
        <url>
            <loc>{{ url($page->slug) }}</loc>
            @if($page->updated_at)
                <lastmod>{{ $page->updated_at->tz('UTC')->toAtomString() }}</lastmod>
            @endif
            <changefreq>weekly</changefreq>
            <priority>0.8</priority>
        </url>

        {{-- Sub Pages --}}
        @if ($page->subPages && $page->subPages->count())
            @foreach ($page->subPages as $sub)
                <url>
                    <loc>{{ url($sub->slug) }}</loc>
                    @if($sub->updated_at)
                        <lastmod>{{ $sub->updated_at->tz('UTC')->toAtomString() }}</lastmod>
                    @endif
                    <changefreq>weekly</changefreq>
                    <priority>0.7</priority>
                </url>
            @endforeach
        @endif
    @endforeach

    {{-- Articles by Category --}}   
    @foreach ($articleCategories as $category) 
        @foreach ($category->articles as $article)
            <url>
                <loc>{{ route('news.front.show', $article->slug) }}</loc>
                @if($article->updated_at)
                    <lastmod>{{ $article->updated_at->tz('UTC')->toAtomString() }}</lastmod>
                @endif
                <changefreq>weekly</changefreq>
                <priority>0.6</priority>
            </url>
        @endforeach
    @endforeach

</urlset>
  