@extends('theme.main')

@section('pagecss')
<link rel="stylesheet" href="{{ asset('theme/css/newstyle.css') }}" type="text/css" />
<style>
    /* Newsroom Global Styles */
    .newsroom-container {
        max-width: 1400px;
        margin: 0 auto;

    }

    /* Hero Section */
    .newsroom-hero {
        background: linear-gradient(135deg, rgba(30, 58, 138, 0.8) 0%, rgba(59, 130, 246, 0.8) 100%),
                    url('{{ asset("theme/images/banners/image1.jpg") }}') center/cover no-repeat;
        color: white;
        align-items: center;
        justify-content: space-between;
        gap: 12px;
        margin-bottom: 20px;
    }

    .widget-toggle {
        border: none;
        background: transparent;
        color: #1e40af;
        width: 36px;
        height: 36px;
        border-radius: 50%;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: background 0.2s ease, color 0.2s ease;
    }

    .widget-toggle:hover,
    .widget-toggle:focus-visible {
        background: rgba(30, 64, 175, 0.1);
        color: #1e3a8a;
        outline: none;
    }

    .widget-header .widget-title {
        flex: 1;
        text-align: center;
        margin: 0;
    }

    .collapsible-wrapper {
        overflow: hidden;
        position: relative;
    }

    .collapsible-inner {
        transition: transform 0.26s ease, opacity 0.26s ease;
        transform: translateX(0);
        opacity: 1;
        will-change: transform, opacity;
    }

    .collapsible-wrapper.collapsed .collapsible-inner {
        transform: translateX(120%);
        opacity: 0;
    }

    .sidebar-widget.collapsible-widget {
        transition: padding 0.26s ease, background 0.26s ease, box-shadow 0.26s ease, width 0.26s ease, max-width 0.26s ease;
    }

    .sidebar-widget.collapsible-widget.collapsed {
        padding: 6px;
        background: transparent;
        box-shadow: none;
        margin-left: auto;
        margin-right: 0;
    }

    .sidebar-widget.collapsible-widget.collapsed .widget-header {
        margin-bottom: 0;
        justify-content: flex-end;
        gap: 6px;
    }

    .sidebar-widget.collapsible-widget.collapsed .widget-title {
        display: none;
    }

    .sidebar-widget.collapsible-widget.collapsed .widget-toggle {
        background: #ffffff;
        box-shadow: 0 8px 18px rgba(15, 23, 42, 0.15);
    }

    .sidebar-widget.collapsible-widget.collapsed .widget-toggle:hover,
    .sidebar-widget.collapsible-widget.collapsed .widget-toggle:focus-visible {
        background: #e2e8f0;
    }

    .newsroom-hero-content {
        position: relative;
        z-index: 3;
        max-width: 900px;
        margin: 0 auto;
        padding: 1.5rem;
        text-align: center;
    }

    .newsroom-hero h1 {
        font-size: clamp(2.25rem, 4.5vw, 3.5rem);
        font-weight: 800;
        line-height: 1.2;
        margin-bottom: 1.25rem;
        text-shadow: 0 4px 8px rgba(0,0,0,0.3);
        background: linear-gradient(45deg, #ffffff, #d1d5db);
        -webkit-background-clip: text;
        background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .newsroom-hero p {
        font-size: clamp(1rem, 2vw, 1.25rem);
        font-weight: 400;
        color: rgba(255, 255, 255, 0.9);
        max-width: 700px;
        margin: 0 auto 2rem;
        text-shadow: 0 2px 4px rgba(0,0,0,0.3);
        line-height: 1.5;
    }

    /* Navigation Tabs */
    .newsroom-nav {
        background: #f8fafc;
        border-bottom: 1px solid #e2e8f0;
        padding: 0;
        position: sticky;
        top: 10px;
        z-index: 100;
    }

    .newsroom-nav-container {
        max-width: 1400px;
        margin: 0 auto;
        padding: 0 20px;
    }

    .newsroom-nav-container {
        position: relative;
    }

    .newsroom-nav-container::before,
    .newsroom-nav-container::after {
        content: '';
        position: absolute;
        top: 0;
        bottom: 0;
        width: 30px;
        pointer-events: none;
        transition: opacity 0.2s ease;
    }

    .newsroom-nav-container::before {
        left: 0;
        background: linear-gradient(90deg, #f8fafc 0%, rgba(248, 250, 252, 0));
    }

    .newsroom-nav-container::after {
        right: 0;
        background: linear-gradient(270deg, #f8fafc 0%, rgba(248, 250, 252, 0));
    }

    .newsroom-nav-list {
        display: flex;
        justify-content: center;
        list-style: none;
        margin: 0;
        padding: 8px 24px 12px;
        overflow-x: auto;
        scrollbar-width: none;
        -ms-overflow-style: none;
        gap: 18px;
        scroll-snap-type: x mandatory;
    }

    .newsroom-nav-list::-webkit-scrollbar {
        display: none;
    }

    .newsroom-nav-item {
        padding: 18px 28px;
        font-weight: 600;
        color: #64748b;
        cursor: pointer;
        transition: all 0.3s ease;
        position: relative;
        white-space: nowrap;
        border-bottom: 3px solid transparent;
        scroll-snap-align: start;
    }

    .newsroom-nav-item:hover {
        color: #1e40af;
        background: rgba(59, 130, 246, 0.05);
    }

    .newsroom-nav-item.active {
        color: #1e40af;
        border-bottom-color: #1e40af;
        background: rgba(59, 130, 246, 0.05);
    }

    /* Featured Story Section */
    .featured-story {
        padding: 60px 0;
        background: #fff;
    }

    .featured-story-grid {
        display: grid;
        grid-template-columns: 2fr 1fr;
        gap: 60px;
        align-items: start;
    }

    .featured-article {
        position: relative;
        overflow: hidden;
        border-radius: 12px;
        box-shadow: 0 10px 40px rgba(0,0,0,0.1);
        transition: transform 0.3s ease;
    }

    .featured-article:hover {
        transform: translateY(-5px);
    }

    .featured-article-image {
        width: 100%;
        height: 400px;
        object-fit: cover;
    }

    .featured-article-content {
        padding: 40px;
        background: linear-gradient(to top, rgba(0,0,0,0.8), transparent 60%);
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        color: white;
    }

    .featured-article-category {
        background: #1e40af;
        color: white;
        padding: 8px 16px;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        display: inline-block;
        margin-bottom: 15px;
    }

    .featured-article-title {
        font-size: 2rem;
        font-weight: 700;
        margin-bottom: 15px;
        line-height: 1.2;
        display: inline-block;
        background: rgba(255, 255, 255, 0.92);
        color: #1e293b;
        padding: 10px 18px;
        border-radius: 12px;
        box-shadow: 0 6px 18px rgba(15, 23, 42, 0.18);
    }

    .featured-article-summary {
        font-size: 1rem;
        opacity: 0.9;
        margin-bottom: 20px;
        line-height: 1.6;
    }

    .featured-article-meta {
        font-size: 0.9rem;
        opacity: 0.8;
    }

    /* Quick Links Sidebar */
    .quick-links {
        background: #f8fafc;
        border-radius: 12px;
        padding: 30px;
        height: fit-content;
    }

    .quick-links h3 {
        font-size: 1.25rem;
        font-weight: 700;
        color: #1e293b;
        margin-bottom: 25px;
        padding-bottom: 15px;
        border-bottom: 2px solid #e2e8f0;
    }

    .quick-link-group {
        margin-bottom: 20px;
    }

    .quick-link-date-heading {
        font-size: 0.8rem;
        font-weight: 700;
        color: #1e3a8a;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        display: block;
        margin-bottom: 8px;
    }

    .quick-link-list {
        display: flex;
        flex-direction: column;
    }

    .quick-link-item {
        display: block;
        padding: 15px 0;
        border-bottom: 1px solid #e2e8f0;
        text-decoration: none;
        color: #374151;
        transition: color 0.3s ease;
    }

    .quick-link-item:last-child {
        border-bottom: none;
    }

    .quick-link-item:hover {
        color: #1e40af;
    }

    .quick-link-title {
        font-weight: 600;
        line-height: 1.4;
    }

    /* News Grid Section */
    .news-grid-section {
        padding: 60px 0;
        background: #f8fafc;
    }

    .section-header {
        text-align: center;
        margin-bottom: 50px;
    }

    .section-title {
        font-size: 2.5rem;
        font-weight: 700;
        color: #1e293b;
        margin-bottom: 15px;
    }

    .section-subtitle {
        font-size: 1.1rem;
        color: #64748b;
        max-width: 600px;
        margin: 0 auto;
    }

    .news-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
        gap: 40px;
    }

    .news-card {
        background: #fff;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 4px 20px rgba(0,0,0,0.08);
        transition: all 0.3s ease;
        height: 100%;
        display: flex;
        flex-direction: column;
    }

    .news-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 8px 30px rgba(0,0,0,0.15);
    }

    .news-card-image {
        width: 100%;
        height: 220px;
        object-fit: cover;
    }

    .news-card-content {
        padding: 30px;
        flex-grow: 1;
        display: flex;
        flex-direction: column;
    }

    .news-card-category {
        background: linear-gradient(135deg, #3b82f6, #1e40af);
        color: white;
        padding: 6px 12px;
        border-radius: 15px;
        font-size: 0.75rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        display: inline-block;
        margin-bottom: 15px;
        width: fit-content;
    }

    .news-card-title {
        font-size: 1.25rem;
        font-weight: 700;
        color: #1e293b;
        margin-bottom: 15px;
        line-height: 1.3;
        flex-grow: 1;
    }

    .news-card-summary {
        font-size: 0.95rem;
        color: #64748b;
        line-height: 1.6;
        margin-bottom: 20px;
    }

    .news-card-meta {
        display: flex;
        justify-content: space-between;
        align-items: center;
        font-size: 0.85rem;
        color: #9ca3af;
        margin-top: auto;
    }

    .read-more-btn {
        display: inline-block;
        color: #1e293b;
        text-decoration: none;
        font-weight: 600;
        background: rgba(255, 255, 255, 0.94);
        padding: 10px 18px;
        border-radius: 999px;
        box-shadow: 0 8px 22px rgba(15, 23, 42, 0.18);
        transition: all 0.3s ease;
    }

    .read-more-btn:hover {
        color: #1d4ed8;
        transform: translateY(-2px);
        box-shadow: 0 12px 28px rgba(37, 99, 235, 0.28);
    }

    /* Media Type Sections */
    .media-section {
        padding: 60px 0;
        background: #fff;
        display: none;
    }

    .media-section.active {
        display: block;
    }

    /* Prevent CTA decorative images from creating horizontal overflow */

    /* Press Releases specific styling */
    .press-releases-section {
        background: #fff;
    }

    .press-release-card {
        border-left: 4px solid #1e40af;
        background: #fff;
        padding: 30px;
        margin-bottom: 25px;
        border-radius: 8px;
        box-shadow: 0 2px 15px rgba(0,0,0,0.05);
        transition: all 0.3s ease;
    }

    .press-release-card:hover {
        box-shadow: 0 5px 25px rgba(0,0,0,0.1);
        transform: translateX(5px);
    }

    .press-release-header {
        display: flex;
        justify-content: space-between;
        align-items: start;
        margin-bottom: 15px;
    }

    .press-release-date {
        background: #f1f5f9;
        color: #1e40af;
        padding: 8px 16px;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: 600;
        white-space: nowrap;
    }

    .press-release-title {
        font-size: 1.4rem;
        font-weight: 700;
        color: #1e293b;
        margin-bottom: 15px;
        line-height: 1.3;
    }

    .press-release-summary {
        color: #64748b;
        line-height: 1.6;
        margin-bottom: 20px;
    }

    /* Responsive Design */
    @media (max-width: 1024px) {
        .featured-story-grid {
            grid-template-columns: 1fr;
            gap: 40px;
        }

        .news-grid {
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
        }

        .newsroom-hero h1 {
            font-size: 2.5rem;
        }
    }

    @media (max-width: 768px) {
        .newsroom-nav {
            top: 64px;
        }

        .newsroom-nav-list {
            justify-content: flex-start;
            padding: 8px 16px 12px;
            gap: 12px;
        }

        .newsroom-nav-item {
            flex: 0 0 auto;
            padding: 14px 20px;
            font-size: 0.95rem;
            border-bottom-width: 2px;
        }

        .newsroom-nav-container::before,
        .newsroom-nav-container::after {
            width: 18px;
        }

        .newsroom-hero {
            min-height: 60vh;
            margin-top: -20px;
        }

        .newsroom-nav-item {
            padding: 15px 20px;
        }

        .featured-article-content {
            padding: 25px;
        }

        .featured-article-title {
            font-size: 1.5rem;
        }

        .section-title {
            font-size: 2rem;
        }

        .news-grid {
            grid-template-columns: 1fr;
        }

        .press-release-header {
            flex-direction: column;
            gap: 10px;
        }

        .cta-buttons {
            flex-direction: column;
            align-items: center;
        }
    }

    @media (max-width: 480px) {
        .newsroom-nav-item {
            padding: 12px 16px;
            font-size: 0.85rem;
        }
    }
</style>
@endsection

@section('after-banner')
@empty($news)
    <!-- Navigation Tabs -->
    <nav class="newsroom-nav">
        <div class="newsroom-nav-container">
            <ul class="newsroom-nav-list">
                <li class="newsroom-nav-item active" data-target="all-news">All News</li>
                @foreach($categories as $category)
                    <li class="newsroom-nav-item" data-target="{{ $category->slug }}">{{ $category->name }}</li>
                @endforeach
            </ul>
        </div>
    </nav>
@endempty
@endsection

@section('content')
@isset($news)
    @if(!empty($news->styles))
        <style>
            {!! $news->styles !!}
        </style>
    @endif
<!-- Individual News Article View -->
<div class="article-detail-layout">
    <!-- Article Hero Section -->
    <section class="article-hero">
        <div class="article-hero-background">
            @if($news->banner_image)
                <img src="{{ $news->image }}" alt="{{ $news->name }}" class="article-hero-image">
            @else
                <img src="{{ asset('theme/images/banners/image1.jpg') }}" alt="{{ $news->name }}" class="article-hero-image">
            @endif
            <div class="article-hero-overlay"></div>
        </div>

        <div class="container">
            <div class="article-hero-content">
                <nav aria-label="breadcrumb" class="article-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('/news') }}">News</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $news->name }}</li>
                    </ol>
                </nav>

                <div class="article-meta">
                    @if($news->category)
                        <span class="article-category">{{ $news->category->name ?? 'News' }}</span>
                    @endif
                    <time class="article-date" datetime="{{ $news->date }}">
                        {{ \Carbon\Carbon::parse($news->date)->format('F j, Y') }}
                    </time>
                </div>

                <h1 class="article-title">{{ $news->name }}</h1>

                @if($news->teaser)
                    <p class="article-excerpt">{{ $news->teaser }}</p>
                @endif
            </div>
        </div>
    </section>

    <!-- Article Content -->
    <section class="article-content-section">
        <div class="container">
            <div class="row article-layout-row">
                <div class="col-lg-8 article-main-col">
                    <article class="article-main-content">
                        <!-- Article Body -->

                        <div class="article-body">
                            {!! $news->contents !!}
                        </div>

                        <!-- Article Tags -->
                        @if($news->meta_keyword)
                            <div class="article-tags">
                                <h5>Tags:</h5>
                                @foreach(explode(',', $news->meta_keyword) as $tag)
                                    <span class="article-tag">{{ trim($tag) }}</span>
                                @endforeach
                            </div>
                        @endif

                        <!-- Social Sharing -->
                        <div class="article-sharing">
                            <h5>Share this article:</h5>
                            <div class="sharing-buttons">
                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}" target="_blank" class="sharing-btn facebook">
                                    <i class="fab fa-facebook-f"></i> Facebook
                                </a>
                                <a href="https://twitter.com/intent/tweet?url={{ urlencode(url()->current()) }}&text={{ urlencode($news->name) }}" target="_blank" class="sharing-btn twitter">
                                    <i class="fab fa-twitter"></i> Twitter
                                </a>
                                <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(url()->current()) }}" target="_blank" class="sharing-btn linkedin">
                                    <i class="fab fa-linkedin-in"></i> LinkedIn
                                </a>
                                <a href="mailto:?subject={{ urlencode($news->name) }}&body={{ urlencode('Check out this article: ' . url()->current()) }}" class="sharing-btn email">
                                    <i class="fas fa-envelope"></i> Email
                                </a>
                            </div>
                        </div>
                    </article>
                </div>

                <!-- Sidebar -->
                <div class="col-lg-4 article-sidebar-col">
                    <aside class="article-sidebar">
                        <!-- Latest Articles -->
                        @if(isset($latestArticles) && $latestArticles->count() > 0)
                            <div class="sidebar-widget collapsible-widget">
                                <div class="widget-header">
                                    <button class="widget-toggle" type="button" aria-expanded="true" aria-controls="latest-news-list" data-expanded-icon="fa-chevron-right" data-collapsed-icon="fa-chevron-left">
                                        <i class="fas fa-chevron-right" aria-hidden="true"></i>
                                        <span class="visually-hidden">Toggle latest news</span>
                                    </button>
                                    <h4 class="widget-title">Latest News</h4>
                                </div>
                                <div class="collapsible-wrapper">
                                    <div class="collapsible-inner">
                                        <div id="latest-news-list" class="latest-articles collapsible-content">
                                    @foreach($latestArticles as $article)
                                        <article class="latest-article-item">
                                            <div class="latest-article-image">
                                                @if(!empty($article->thumbnail_image))
                                                    <img src="{{ $article->thumbnail }}" alt="{{ $article->name }} thumbnail">
                                                @else
                                                    <img src="{{ asset('theme/images/banners/image1.jpg') }}" alt="{{ $article->name }} thumbnail">
                                                @endif
                                            </div>
                                            <div class="latest-article-content">
                                                <h5><a href="{{ url('/news/' . $article->slug) }}">{{ $article->name }}</a></h5>
                                                <time class="latest-article-date">{{ \Carbon\Carbon::parse($article->date)->format('M j, Y') }}</time>
                                            </div>
                                        </article>
                                    @endforeach
                                        </div>
                                        <div class="latest-news-footer">
                                            <a href="{{ url('/news') }}" class="btn btn-outline-primary btn-block">
                                                <i class="fas fa-arrow-left"></i> Back to News
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </aside>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Individual Article Styles -->
<style>
    .article-detail-layout {
        margin-top: -30px;
    }

    .article-detail-layout .container {
        padding-left: 5px;
        padding-right: 5px;
    }

    .article-hero {
        position: relative;
        min-height: 60vh;
        display: flex;
        align-items: center;
        color: white;
        overflow: hidden;
    }

    .article-hero-background {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 0;
    }

    .article-hero-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .article-hero-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(135deg, rgba(30, 58, 138, 0.8) 0%, rgba(0, 0, 0, 0.6) 100%);
        z-index: 1;
    }

    .article-hero-content {
        position: relative;
        z-index: 2;
        max-width: 800px;
        margin-top: 35px;
    }

    .article-breadcrumb {
        margin-bottom: 20px;
    }

    .article-breadcrumb .breadcrumb {
        background: rgba(255, 255, 255, 0.1);
        border-radius: 25px;
        padding: 8px 20px;
        margin-bottom: 0;
    }

    .article-breadcrumb .breadcrumb-item a {
        color: rgba(255, 255, 255, 0.8);
        text-decoration: none;
    }

    .article-breadcrumb .breadcrumb-item.active {
        color: white;
    }

    .article-meta {
        display: flex;
        align-items: center;
        gap: 20px;
        margin-bottom: 20px;
    }

    .article-category {
        background: #1e40af;
        color: white;
        padding: 6px 16px;
        border-radius: 20px;
        font-size: 0.85rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .article-date {
        color: rgba(255, 255, 255, 0.9);
        font-size: 0.95rem;
    }

    .article-title {
        font-size: clamp(2rem, 4vw, 3.5rem);
        font-weight: 800;
        color: white;
        line-height: 1.2;
        margin-bottom: 20px;
        text-shadow: 0 2px 4px rgba(0,0,0,0.3);
    }

    .article-excerpt {
        font-size: 1.25rem;
        line-height: 1.6;
        color: rgba(255, 255, 255, 0.9);
        max-width: 600px;
    }

    .article-content-section {
        padding: 80px 0;
        background: #fff;
    }

    .article-main-content {
        background: white;
        border-radius: 12px;
        padding: 40px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.1);
        margin-bottom: 40px;
    }

    .article-body {
        font-size: 1.1rem;
        line-height: 1.8;
        color: #374151;
        margin-bottom: 40px;
    }

    .article-body h1, .article-body h2, .article-body h3 {
        color: #1e40af;
        margin-top: 2rem;
        margin-bottom: 1rem;
    }

    .article-body p {
        margin-bottom: 1.5rem;
    }

    .article-body img {
        max-width: 100%;
        height: auto;
        border-radius: 8px;
        margin: 20px 0;
    }

    /* Article thumbnail (large) - keep aspect ratio, don't stretch */
    .article-thumbnail-image {
        display: block;
        width: 100%;
        max-width: 600px;
        height: auto;
        border-radius: 12px;
        box-shadow: 0 4px 16px rgba(0,0,0,0.12);
        object-fit: contain;
        margin: 0 auto 32px auto;
    }

    .article-tags {
        border-top: 1px solid #e5e7eb;
        padding-top: 20px;
        margin-bottom: 30px;
    }

    .article-tags h5 {
        color: #374151;
        margin-bottom: 15px;
        font-size: 1rem;
        font-weight: 600;
    }

    .article-tag {
        display: inline-block;
        background: #f3f4f6;
        color: #6b7280;
        padding: 6px 12px;
        border-radius: 15px;
        font-size: 0.85rem;
        margin-right: 8px;
        margin-bottom: 8px;
    }

    .article-sharing {
        border-top: 1px solid #e5e7eb;
        padding-top: 20px;
    }

    .article-sharing h5 {
        color: #374151;
        margin-bottom: 15px;
        font-size: 1rem;
        font-weight: 600;
    }

    .sharing-buttons {
        display: flex;
        gap: 10px;
        flex-wrap: wrap;
    }

    .sharing-btn {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 10px 15px;
        border-radius: 25px;
        text-decoration: none;
        font-size: 0.9rem;
        font-weight: 500;
        transition: all 0.3s ease;
    }

    .sharing-btn.facebook {
        background: #1877f2;
        color: white;
    }

    .sharing-btn.twitter {
        background: #1da1f2;
        color: white;
    }

    .sharing-btn.linkedin {
        background: #0a66c2;
        color: white;
    }

    .sharing-btn.email {
        background: #6b7280;
        color: white;
    }

    .sharing-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        color: white;
        text-decoration: none;
    }

    .article-main-col,
    .article-sidebar-col {
        transition: all 0.3s ease;
    }

    .article-sidebar-col {
        display: flex;
    }

    .article-sidebar {
        padding-left: 40px;
        padding-right: 0;
        width: 100%;
    }

    .sidebar-widget {
        background: white;
        border-radius: 12px;
        padding: 30px;
        margin-bottom: 30px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.1);
    }

    .sidebar-widget.collapsible-widget {
        transition: padding 0.26s ease, background 0.26s ease, box-shadow 0.26s ease, width 0.26s ease, max-width 0.26s ease;
    }

    .sidebar-widget.collapsible-widget.collapsed {
        padding: 6px;
        background: transparent;
        box-shadow: none;
        margin-left: auto;
        margin-right: 0;
    }

    .sidebar-widget.collapsible-widget.collapsed .widget-header {
        margin-bottom: 0;
        gap: 6px;
        justify-content: flex-end;
    }

    .sidebar-widget.collapsible-widget.collapsed .widget-title {
        display: none;
    }

    .sidebar-widget.collapsible-widget.collapsed .widget-toggle {
        background: #ffffff;
        box-shadow: 0 8px 18px rgba(15, 23, 42, 0.15);
    }

    .sidebar-widget.collapsible-widget.collapsed .widget-toggle:hover,
    .sidebar-widget.collapsible-widget.collapsed .widget-toggle:focus-visible {
        background: #e2e8f0;
    }

    .widget-title {
        color: #1e40af;
        font-size: 1.25rem;
        font-weight: 700;
        margin-bottom: 20px;
        padding-bottom: 10px;
        border-bottom: 2px solid #e5e7eb;
    }

    .sidebar-widget.collapsible-widget .widget-title {
        margin-bottom: 0;
        padding-bottom: 0;
        border-bottom: none;
    }

    .widget-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 12px;
        margin-bottom: 20px;
    }

    .widget-toggle {
        border: none;
        background: transparent;
        color: #1e40af;
        width: 36px;
        height: 36px;
        border-radius: 50%;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: background 0.2s ease, color 0.2s ease;
    }

    .widget-toggle:hover,
    .widget-toggle:focus-visible {
        background: rgba(30, 64, 175, 0.1);
        color: #1e3a8a;
        outline: none;
    }

    .widget-header .widget-title {
        flex: 1;
        text-align: center;
        margin: 0;
    }

    .collapsible-content {
        transition: opacity 0.25s ease;
        opacity: 1;
    }

    .collapsible-content[hidden] {
        display: none;
        opacity: 0;
    }

    .latest-article-item {
        display: flex;
        gap: 15px;
        margin-bottom: 20px;
        padding-bottom: 20px;
        border-bottom: 1px solid #f3f4f6;
    }

    .latest-article-item:last-child {
        margin-bottom: 0;
        padding-bottom: 0;
        border-bottom: none;
    }

    .latest-news-footer {
        margin-top: 20px;
        padding-top: 20px;
        border-top: 1px solid #e5e7eb;
    }

    .latest-news-footer .btn {
        width: 100%;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
    }

    .latest-news-footer {
        margin-top: 20px;
        padding-top: 20px;
        border-top: 1px solid #e5e7eb;
    }

    .latest-news-footer .btn {
        width: 100%;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
    }

    .latest-article-image {
        flex-shrink: 0;
        width: 80px;
        height: 60px;
        border-radius: 8px;
        overflow: hidden;
    }

    .latest-article-image img {
        width: 100%;
        height: 100%;
        object-fit: contain;
        background: #f8fafc;
    }

    .latest-article-content h5 {
        font-size: 0.95rem;
        margin-bottom: 5px;
    }

    .latest-article-content h5 a {
        color: #374151;
        text-decoration: none;
        line-height: 1.4;
    }

    .latest-article-content h5 a:hover {
        color: #1e40af;
    }

    .latest-article-date {
        font-size: 0.8rem;
        color: #6b7280;
    }

    @media (min-width: 992px) {
        .article-layout-row.sidebar-collapsed {
            flex-wrap: nowrap;
            align-items: flex-start;
        }

        .article-layout-row.sidebar-collapsed .article-main-col {
            flex: 1 1 calc(100% - 80px);
            max-width: calc(100% - 80px);
        }

        .article-layout-row.sidebar-collapsed .article-sidebar-col {
            max-width: 80px;
            flex: 0 0 80px;
            padding-left: 0;
            padding-right: 0;
            justify-content: flex-end;
        }

        .article-layout-row.sidebar-collapsed .article-sidebar {
            padding-left: 0;
            padding-right: 0;
        }
    }

    @media (max-width: 992px) {
        .article-sidebar-col {
            display: block;
        }

        .article-sidebar {
            padding-left: 0;
            margin-top: 40px;
        }
    }

    @media (max-width: 768px) {
        .article-main-content {
            padding: 25px;
        }

        .article-hero-content {
            padding: 20px;
            margin-top: 60px;
        }

        .sharing-buttons {
            flex-direction: column;
        }

        .sharing-btn {
            justify-content: center;
        }
    }
</style>

@else
<!-- Main Newsroom Listing View -->
<div class="newsroom-layout">

    <!-- Latest News Section -->
    <section id="all-news" class="media-section active">
        <!-- Featured Story -->
        <div class="featured-story">
            <div class="newsroom-container">
                <div class="featured-story-grid">
                    @if(isset($featuredArticle) && $featuredArticle)
                    <article class="featured-article">
                        @if($featuredArticle->thumbnail_image)
                            <img src="{{ $featuredArticle->thumbnail }}" alt="{{ $featuredArticle->name }}" class="featured-article-image">
                        @else
                            <img src="{{ asset('images/news/news.jpg') }}" alt="{{ $featuredArticle->name }}" class="featured-article-image">
                        @endif
                        <div class="featured-article-content">
                            <span class="featured-article-category">{{ $featuredArticle->category->name ?? 'Featured Story' }}</span>
                            <h2 class="featured-article-title">{{ $featuredArticle->name }}</h2>
                            @if($featuredArticle->teaser)
                                <p class="featured-article-summary">{{ $featuredArticle->teaser }}</p>
                            @endif
                            <div class="featured-article-meta">{{ \Carbon\Carbon::parse($featuredArticle->date)->format('F j, Y') }} • {{ $featuredArticle->category->name ?? 'News' }}</div>
                            <a href="{{ url('/news/' . $featuredArticle->slug) }}" class="read-more-btn" style="margin-top: 15px; display: inline-block;">Read More →</a>
                        </div>
                    </article>
                    @else
                        @php
                            $fallbackArticle = \App\Models\News::where('status', 'Published')->latest('date')->first();
                        @endphp
                        @if($fallbackArticle)
                        <article class="featured-article">
                            @if($fallbackArticle->banner_image)
                                <img src="{{ $fallbackArticle->image }}" alt="{{ $fallbackArticle->name }}" class="featured-article-image">
                            @else
                                <img src="{{ asset('theme/images/banners/image1.jpg') }}" alt="{{ $fallbackArticle->name }}" class="featured-article-image">
                            @endif
                            <div class="featured-article-content">
                                <span class="featured-article-category">{{ $fallbackArticle->category->name ?? 'Featured Story' }}</span>
                                <h2 class="featured-article-title">{{ $fallbackArticle->name }}</h2>
                                <p class="featured-article-summary">
                                    {{ $fallbackArticle->excerpt }}
                                </p>
                                <div class="featured-article-meta">{{ \Carbon\Carbon::parse($fallbackArticle->date)->format('F j, Y') }} • {{ $fallbackArticle->category->name ?? 'News' }}</div>
                                <a href="{{ url('/news/' . $fallbackArticle->slug) }}" class="read-more-btn" style="margin-top: 15px; display: inline-block;">Read More →</a>
                            </div>
                        </article>
                        @endif
                    @endif

                    <aside class="quick-links">
                        <h3>Quick Links</h3>
                        @if(isset($quickLinkArticles) && $quickLinkArticles->count() > 0)
                            @foreach($quickLinkArticles as $publishedDate => $articlesByDate)
                                <div class="quick-link-group">
                                    <span class="quick-link-date-heading">{{ $publishedDate }}</span>
                                    <div class="quick-link-list">
                                        @foreach($articlesByDate as $article)
                                            <a href="{{ url('/news/' . $article->slug) }}" class="quick-link-item">
                                                <span class="quick-link-title">{{ $article->name }}</span>
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
                        @else
                            @php
                                $quickLinks = \App\Models\News::where('status', 'Published')->orderByDesc('date')->take(6)->get()->groupBy(function ($article) {
                                    return \Carbon\Carbon::parse($article->date)->format('F j, Y');
                                });
                            @endphp
                            @forelse($quickLinks as $publishedDate => $articlesByDate)
                                <div class="quick-link-group">
                                    <span class="quick-link-date-heading">{{ $publishedDate }}</span>
                                    <div class="quick-link-list">
                                        @foreach($articlesByDate as $quickLink)
                                            <a href="{{ url('/news/' . $quickLink->slug) }}" class="quick-link-item">
                                                <span class="quick-link-title">{{ $quickLink->name }}</span>
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                            @empty
                                <p>No recent articles available.</p>
                            @endforelse
                        @endif
                    </aside>
                </div>
            </div>
        </div>

        <!-- News Grid -->
        <div class="news-grid-section">
            <div class="newsroom-container">
                <div class="section-header">
                    <h2 class="section-title">Recent Stories</h2>
                    <p class="section-subtitle">Discover the latest updates and featured stories from WebFocus Solutions</p>
                </div>

                <div class="news-grid">
                    @if(isset($latestArticles) && $latestArticles->count() > 0)
                        @foreach($latestArticles as $article)
                        <article class="news-card">
                            @if($article->thumbnail_image)
                                <img src="{{ $article->thumbnail }}" alt="{{ $article->name }}" class="news-card-image">
                            @else
                                <img src="{{ asset('images/news/news' . (($loop->index % 3) + 1) . '.jpg') }}" alt="{{ $article->name }}" class="news-card-image">
                            @endif
                            <div class="news-card-content">
                                <span class="news-card-category">{{ $article->category->name ?? 'News' }}</span>
                                <h3 class="news-card-title">{{ $article->name }}</h3>
                                @if($article->excerpt)
                                    <p class="news-card-summary">{{ $article->excerpt }}</p>
                                @endif
                                <div class="news-card-meta">
                                    <span>{{ \Carbon\Carbon::parse($article->date)->format('F j, Y') }}</span>
                                    <a href="{{ url('/news/' . $article->slug) }}" class="read-more-btn">Read More →</a>
                                </div>
                            </div>
                        </article>
                        @endforeach
                    @else
                        @php
                            $fallbackArticles = \App\Models\News::where('status', 'Published')->latest('date')->take(3)->get();
                        @endphp
                        @forelse($fallbackArticles as $article)
                        <article class="news-card">
                            @if($article->thumbnail_image)
                                <img src="{{ $article->thumbnail }}" alt="{{ $article->name }}" class="news-card-image">
                            @else
                                <img src="{{ asset('theme/images/banners/image1.jpg') }}" alt="{{ $article->name }}" class="news-card-image">
                            @endif
                            <div class="news-card-content">
                                <span class="news-card-category">{{ $article->category->name ?? 'News' }}</span>
                                <h3 class="news-card-title">{{ $article->name }}</h3>
                                @if($article->excerpt)
                                    <p class="news-card-summary">{{ $article->excerpt }}</p>
                                @endif
                                <div class="news-card-meta">
                                    <span>{{ \Carbon\Carbon::parse($article->date)->format('F j, Y') }}</span>
                                    <a href="{{ url('/news/' . $article->slug) }}" class="read-more-btn">Read More →</a>
                                </div>
                            </div>
                        </article>
                        @empty
                        <div class="no-news-message">
                            <h3>No news articles available at the moment.</h3>
                            <p>Please check back later for updates.</p>
                        </div>
                        @endforelse
                    @endif
                </div>
            </div>
        </div>
    </section>

    <!-- Press Releases Section -->
    @foreach($categories as $category)
    <section id="{{ $category->slug }}" class="media-section">
        <div class="news-grid-section">
            <div class="newsroom-container">
                <div class="section-header">
                    <h2 class="section-title">{{ $category->name }}</h2>
                    <p class="section-subtitle">Articles in the {{ $category->name }} category</p>
                </div>

                <div class="news-grid">
                    @php
                        $categoryArticles = \App\Models\News::where('status', 'Published')
                            ->where('category_id', $category->id)
                            ->with('category')
                            ->latest('date')
                            ->limit(6)
                            ->get()
                            ->map(function($article) {
                                $article->excerpt = $article->teaser ? \Illuminate\Support\Str::limit($article->teaser, 120) : '';
                                return $article;
                            });
                    @endphp

                    @if($categoryArticles->count() > 0)
                        @foreach($categoryArticles as $article)
                        <article class="news-card">
                            @if($article->thumbnail_image)
                                <img src="{{ $article->thumbnail }}" alt="{{ $article->name }}" class="news-card-image">
                            @else
                                <img src="{{ asset('images/news/news' . (($loop->index % 3) + 1) . '.jpg') }}" alt="{{ $article->name }}" class="news-card-image">
                            @endif
                            <div class="news-card-content">
                                <span class="news-card-category">{{ $article->category->name ?? $category->name }}</span>
                                <h3 class="news-card-title">{{ $article->name }}</h3>
                                @if($article->excerpt)
                                    <p class="news-card-summary">{{ $article->excerpt }}</p>
                                @endif
                                <div class="news-card-meta">
                                    <span>{{ \Carbon\Carbon::parse($article->date)->format('F j, Y') }}</span>
                                    <a href="{{ url('/news/' . $article->slug) }}" class="read-more-btn">Read More →</a>
                                </div>
                            </div>
                        </article>
                        @endforeach
                    @else
                        <div class="col-12 text-center">
                            <p class="text-muted">No articles available in this category yet.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
    @endforeach

    @include('theme.pages.partials.news-cta')
</div>
@endisset
@endsection

@section('pagejs')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Media Tabs Functionality
    const navItems = document.querySelectorAll('.newsroom-nav-item');
    const sections = document.querySelectorAll('.media-section');

    navItems.forEach(item => {
        item.addEventListener('click', (e) => {
            e.preventDefault();
            // Remove active class from all items and sections
            navItems.forEach(i => i.classList.remove('active'));
            sections.forEach(s => s.classList.remove('active'));

            // Add active class to clicked item
            item.classList.add('active');

            // Show corresponding section
            const target = item.dataset.target;
            const targetSection = document.getElementById(target);
            if (targetSection) {
                targetSection.classList.add('active');
                targetSection.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });

    // Intersection Observer for scroll animations - adapted from services
    const observerOptions = {
        threshold: 0.2,
        rootMargin: '0px 0px -30px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate');
                // Original news cards animation
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, observerOptions);

    // Observe scroll animation elements
    document.querySelectorAll('.scroll-animate').forEach(el => observer.observe(el));

    // Observe all news cards for entrance animations
    document.querySelectorAll('.news-card, .press-release-card').forEach(card => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(20px)';
        card.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
        observer.observe(card);
    });

    const COLLAPSE_DURATION = 260;

    const toggleGroups = {};

    document.querySelectorAll('.widget-toggle').forEach(button => {
        const targetId = button.getAttribute('aria-controls');
        if (!targetId) {
            return;
        }
        if (!toggleGroups[targetId]) {
            toggleGroups[targetId] = [];
        }
        toggleGroups[targetId].push(button);
    });

    Object.entries(toggleGroups).forEach(([targetId, buttons]) => {
        const content = document.getElementById(targetId);
        if (!content) {
            return;
        }

    const wrapper = content.closest('.collapsible-wrapper');
    const inner = wrapper ? wrapper.querySelector('.collapsible-inner') : null;
    const widget = content.closest('.collapsible-widget');
    const sidebarCol = widget ? widget.closest('.article-sidebar-col') : null;
    const layoutRow = sidebarCol ? sidebarCol.closest('.article-layout-row') : content.closest('.article-layout-row');

        const updateIconForButton = (btn, expanded) => {
            const icon = btn.querySelector('i');
            if (!icon) {
                return;
            }
            const expandedIcon = btn.dataset.expandedIcon;
            const collapsedIcon = btn.dataset.collapsedIcon;
            if (expandedIcon && collapsedIcon) {
                icon.classList.remove(expanded ? collapsedIcon : expandedIcon);
                icon.classList.add(expanded ? expandedIcon : collapsedIcon);
            }
        };

        const setExpandedState = (expanded) => {
            const wasCollapsed = wrapper ? wrapper.classList.contains('collapsed') : false;
            const wasHidden = content.hasAttribute('hidden');

            buttons.forEach(btn => {
                btn.setAttribute('aria-expanded', expanded ? 'true' : 'false');
                btn.classList.toggle('is-collapsed', !expanded);
                updateIconForButton(btn, expanded);
            });

            if (layoutRow) {
                layoutRow.classList.toggle('sidebar-collapsed', !expanded);
            }

            if (expanded) {
                if (wrapper) {
                    wrapper.classList.remove('collapsed');
                }
                if (widget) {
                    widget.classList.remove('collapsed');
                }
                content.removeAttribute('hidden');

                if ((inner && wasCollapsed) || (inner && wasHidden)) {
                    inner.style.transform = 'translateX(120%)';
                    inner.style.opacity = '0';
                    requestAnimationFrame(() => {
                        inner.style.transform = 'translateX(0)';
                        inner.style.opacity = '1';
                    });
                }

                if (wasCollapsed || wasHidden) {
                    content.style.opacity = '0';
                    requestAnimationFrame(() => {
                        content.style.opacity = '1';
                    });
                    setTimeout(() => {
                        content.style.opacity = '';
                        if (inner) {
                            inner.style.transform = '';
                            inner.style.opacity = '';
                        }
                    }, COLLAPSE_DURATION);
                } else if (inner) {
                    inner.style.transform = '';
                    inner.style.opacity = '';
                }
            } else {
                content.style.opacity = '0';
                if (wrapper) {
                    wrapper.classList.add('collapsed');
                }
                if (widget) {
                    widget.classList.add('collapsed');
                }
                if (inner) {
                    inner.style.transform = 'translateX(120%)';
                    inner.style.opacity = '0';
                }
                setTimeout(() => {
                    content.setAttribute('hidden', '');
                    content.style.opacity = '';
                    if (inner) {
                        inner.style.transform = '';
                        inner.style.opacity = '';
                    }
                }, COLLAPSE_DURATION);
            }
        };

        buttons.forEach(btn => {
            btn.addEventListener('click', () => {
                const isExpanded = btn.getAttribute('aria-expanded') === 'true';
                setExpandedState(!isExpanded);
            });
        });

        const initialExpanded = buttons.length === 0 || buttons[0].getAttribute('aria-expanded') === 'true';
        setExpandedState(initialExpanded);
    });

    // Reset form function (from services)
    window.resetForm = function() {
        document.getElementById('contactUsForm').reset();
    };
});
</script>
@endsection
