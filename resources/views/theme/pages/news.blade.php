@extends('theme.main')

@section('pagecss')
<link rel="stylesheet" href="{{ asset('theme/css/newstyle.css') }}" type="text/css" />
<style>
    /* Newsroom Global Styles */
    .newsroom-container {
        max-width: 1400px;
        margin: 0 auto;
        padding: 0 20px;
    }

    /* Hero Section */
    .newsroom-hero {
        background: linear-gradient(135deg, rgba(30, 58, 138, 0.8) 0%, rgba(59, 130, 246, 0.8) 100%),
                    url('{{ asset("theme/images/banners/image1.jpg") }}') center/cover no-repeat;
        color: white;
        min-height: 70vh;
        text-align: center;
        position: relative;
        overflow: hidden;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-top: -30px;
        padding-top: 0;
    }

    .newsroom-hero::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 0, 0, 0.3);
        z-index: 1;
    }

    /* Video Banner Option */
    .newsroom-hero-video {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        z-index: 0;
    }

    .newsroom-hero-video-fallback {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        z-index: 0;
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
        top: 80px;
        z-index: 100;
    }

    .newsroom-nav-container {
        max-width: 1400px;
        margin: 0 auto;
        padding: 0 20px;
    }

    .newsroom-nav-list {
        display: flex;
        justify-content: center;
        list-style: none;
        margin: 0;
        padding: 0;
        overflow-x: auto;
        scrollbar-width: none;
        -ms-overflow-style: none;
    }

    .newsroom-nav-list::-webkit-scrollbar {
        display: none;
    }

    .newsroom-nav-item {
        padding: 20px 30px;
        font-weight: 600;
        color: #64748b;
        cursor: pointer;
        transition: all 0.3s ease;
        position: relative;
        white-space: nowrap;
        border-bottom: 3px solid transparent;
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

    .quick-link-date {
        font-size: 0.8rem;
        color: #9ca3af;
        display: block;
        margin-bottom: 5px;
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
        color: #1e40af;
        text-decoration: none;
        font-weight: 600;
        transition: color 0.3s ease;
    }

    .read-more-btn:hover {
        color: #3b82f6;
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
</style>
@endsection

@section('content')
@isset($news)
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
            <div class="row">
                <div class="col-lg-8">
                    <article class="article-main-content">
                        <!-- Article Body -->
                        @if($news->thumbnail_image)
                            <div class="article-thumbnail-wrapper" style="text-align:center; margin-bottom: 32px;">
                                <img src="{{ $news->thumbnail }}" alt="{{ $news->name }} Thumbnail" class="article-thumbnail-image" style="max-width: 600px; width: 100%; height: auto; border-radius: 12px; box-shadow: 0 4px 16px rgba(0,0,0,0.12);">
                            </div>
                        @endif
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
                <div class="col-lg-4">
                    <aside class="article-sidebar">
                        <!-- Latest Articles -->
                        @if(isset($latestArticles) && $latestArticles->count() > 0)
                            <div class="sidebar-widget">
                                <h4 class="widget-title">Latest News</h4>
                                <div class="latest-articles">
                                    @foreach($latestArticles as $article)
                                        <article class="latest-article-item">
                                            <div class="latest-article-image">
                                                @if($article->thumbnail_image)
                                                    <img src="{{ $article->thumbnail }}" alt="{{ $article->name }}">
                                                @else
                                                    <img src="{{ asset('theme/images/banners/image1.jpg') }}" alt="{{ $article->name }}">
                                                @endif
                                            </div>
                                            <div class="latest-article-content">
                                                <h5><a href="{{ url('/news/' . $article->slug) }}">{{ $article->name }}</a></h5>
                                                <time class="latest-article-date">{{ \Carbon\Carbon::parse($article->date)->format('M j, Y') }}</time>
                                            </div>
                                        </article>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        <!-- Back to Newsroom -->
                        <div class="sidebar-widget">
                            <a href="{{ url('/news') }}" class="btn btn-outline-primary btn-block">
                                <i class="fas fa-arrow-left"></i> Back to News
                            </a>
                        </div>
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

    .article-sidebar {
        padding-left: 40px;
    }

    .sidebar-widget {
        background: white;
        border-radius: 12px;
        padding: 30px;
        margin-bottom: 30px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.1);
    }

    .widget-title {
        color: #1e40af;
        font-size: 1.25rem;
        font-weight: 700;
        margin-bottom: 20px;
        padding-bottom: 10px;
        border-bottom: 2px solid #e5e7eb;
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

    @media (max-width: 992px) {
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
    <!-- Newsroom Hero Section -->
    <section class="newsroom-hero">
        <!-- Video Background -->
        <video class="newsroom-hero-video" autoplay loop muted playsinline poster="{{ asset('theme/images/banners/videos/explore-poster.jpg') }}">
            <source src="{{ asset('theme/images/banners/videos/webfocus.webm') }}" type="video/webm">
            <source src="{{ asset('theme/images/banners/videos/webfocus.mp4') }}" type="video/mp4">
            <!-- Fallback image if video fails -->
            <img src="{{ asset('theme/images/banners/image1.jpg') }}" alt="WebFocus Newsroom Banner" class="newsroom-hero-video-fallback">
        </video>
    </section>

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
                            @foreach($quickLinkArticles as $article)
                                <a href="{{ url('/news/' . $article->slug) }}" class="quick-link-item">
                                    <span class="quick-link-date">{{ \Carbon\Carbon::parse($article->date)->format('F j, Y') }}</span>
                                    <span class="quick-link-title">{{ $article->name }}</span>
                                </a>
                            @endforeach
                        @else
                            @php
                                $quickLinks = \App\Models\News::where('status', 'Published')->latest('date')->take(4)->get();
                            @endphp
                            @forelse($quickLinks as $quickLink)
                            <a href="{{ url('/news/' . $quickLink->slug) }}" class="quick-link-item">
                                <span class="quick-link-date">{{ \Carbon\Carbon::parse($quickLink->date)->format('F j, Y') }}</span>
                                <span class="quick-link-title">{{ $quickLink->name }}</span>
                            </a>
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

    <!-- CTA Section -->
    <section class="section-cta position-relative">
        <div class="cta-container scroll-animate">
            <div class="cta-content">
                <div class="row col-12 contact-us-page">
                    <div class="col-12 col-md-7">
                        <div class="content-wordings">
                            <div class="content-title">
                                <h1 style="font-size: 58px;" class="text-white mb-3"><b>Power up your <br/> growth today.</b></h1>
                            </div>
                            <div class="content-description">
                                <p style="font-size: 22px;">Drop us a line and guide you to the right solution</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-5">
                        <div class="card p-4 shadow pb-0">
                            <h3 class="font-primary"><b>Leave Us a Message</b></h3>
                            @if(session()->has('success'))
                                <div class="style-msg successmsg">
                                    <div class="sb-msg"><i class="icon-thumbs-up"></i><strong>Success!</strong> {{ session()->get('success') }}</div>
                                    {{-- <button type="button" class="btn-close btn-sm" data-dismiss="alert" aria-hidden="true">&times;</button> --}}
                                </div>
                            @endif

                            @if(session()->has('error'))
                                <div class="style-msg successmsg">
                                    <div class="sb-msg"><i class="icon-thumbs-up"></i><strong>Success!</strong> {{ session()->get('error') }}</div>
                                    {{-- <button type="button" class="btn-close btn-sm" data-dismiss="alert" aria-hidden="true">&times;</button> --}}
                                </div>
                            @endif
                            <p><strong>Note:</strong> Please do not leave required fields (<span class="text-danger">*</span>) empty.</p>
                            <div class="form-style fs-sm">
                                <form id="contactUsForm" action="{{ route('contact-us') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="fullName" class="fs-6 fw-semibold text-initial nols">Full Name <span class="text-danger">*</span></label>
                                        <input type="text" id="fullName" class="form-control form-input" name="name" placeholder="First and Last Name" />
                                    </div>

                                    <div class="form-group">
                                        <label for="emailAddress" class="fs-6 fw-semibold text-initial nols">E-mail Address <span class="text-danger">*</span></label>
                                        <input type="email" id="emailAddress" class="form-control form-input" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" placeholder="hello@email.com" />
                                    </div>
                                    <div class="form-group">
                                        <label for="contactNumber" class="fs-6 fw-semibold text-initial nols">Contact Number <span class="text-danger">*</span></label>
                                        <input type="number" id="contactNumber" class="form-control form-input" name="contact" placeholder="Landline or Mobile" />
                                    </div>
                                    <div class="form-group">
                                        <label for="message" class="fs-6 fw-semibold text-initial nols">Message <span class="text-danger">*</span></label>
                                        <textarea name="message" id="message" class="form-control form-input textarea" rows="5"></textarea>
                                    </div>

                                    <div class="row g-2">
                                        <div class="col-md-6">
                                            <!-- <a class="button button-circle border-bottom ms-0 text-initial nols fw-normal button-large d-block text-center" href="javascript:void(0)" onclick="document.getElementById('contactUsForm').submit()">Submit</a> -->
                                            <button name="submit" type="submit" id="submit-button" tabindex="5" value="Submit" class="button button-3d m-0" href="javascript:void(0)" onclick="document.getElementById('contactUsForm').submit()" style="background-color: #2b56d3;">
                                                <i class="bi-send" style="margin-right: 5px;"></i> Submit
                                            </button>
                                        </div>
                                        <div class="col-md-6 d-flex justify-content-end">
                                            <!-- <a href="javascript:void(0)" class="button button-circle button-dark border-bottom ms-0 text-initial nols fw-normal button-large d-block text-center" onclick="resetForm();">Reset</a> -->
                                            <button name="reset" type="reset" id="reset-button" tabindex="5" class="button button-3d m-0 reset-button" href="javascript:void(0)" onclick="resetForm();">
                                                <i class="bi-arrow-counterclockwise" style="margin-right: 5px;"></i>Reset
                                            </button>
                                        </div>
                                    </div>

                                    {{-- hidden inputs --}}
                                    <div class="form-group" style="display:none;">
                                        <input type="text" id="services" class="form-control form-input" name="services" placeholder="Enter Subject" value="Design" required/>
                                        <input type="text" id="subject" class="form-control form-input" name="subject" placeholder="Enter Subject" value="Design" required/>
                                    </div>

                                </form>
                                {{-- captcha script --}}
                                <script src="https://www.google.com/recaptcha/api.js" async defer></script>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <img class="position-absolute" src="{{ asset('images/hero.svg') }}" style="transform: rotateY(180deg); bottom: 0; left: 10%;width: 770px;">
    </section>
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

    // Reset form function (from services)
    window.resetForm = function() {
        document.getElementById('contactUsForm').reset();
    };
});
</script>
@endsection
