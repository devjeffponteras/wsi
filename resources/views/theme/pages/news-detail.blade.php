@extends('theme.main')

@section('pagecss')
<link rel="stylesheet" href="{{ asset('theme/css/newstyle.css') }}" type="text/css" />
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
        background: transparent;
        border-radius: 0;
        padding: 0;
        box-shadow: none;
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

    .article-body blockquote {
        background: #f8fafc;
        border-left: 4px solid #1e40af;
        padding: 20px;
        margin: 25px 0;
        border-radius: 0 8px 8px 0;
        font-style: italic;
        color: #4b5563;
    }

    .article-body ul, .article-body ol {
        margin-bottom: 1.5rem;
        padding-left: 30px;
    }

    .article-body li {
        margin-bottom: 8px;
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
        transition: all 0.3s ease;
    }

    .article-tag:hover {
        background: #1e40af;
        color: white;
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
        transition: all 0.3s ease;
    }

    .latest-article-item:last-child {
        margin-bottom: 0;
        padding-bottom: 0;
        border-bottom: none;
    }

    .latest-article-item:hover {
        transform: translateX(5px);
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
        object-fit: cover;
        transition: transform 0.3s ease;
    }

    .latest-article-item:hover .latest-article-image img {
        transform: scale(1.1);
    }

    .latest-article-content h5 {
        font-size: 0.95rem;
        margin-bottom: 5px;
    }

    .latest-article-content h5 a {
        color: #374151;
        text-decoration: none;
        line-height: 1.4;
        transition: color 0.3s ease;
    }

    .latest-article-content h5 a:hover {
        color: #1e40af;
    }

    .latest-article-date {
        font-size: 0.8rem;
        color: #6b7280;
    }

    .back-to-newsroom {
        background: linear-gradient(45deg, #1e40af, #3b82f6);
        color: white;
        border: none;
        padding: 12px 24px;
        border-radius: 25px;
        text-decoration: none;
        font-weight: 600;
        display: inline-flex;
        align-items: center;
        gap: 10px;
        transition: all 0.3s ease;
        width: 100%;
        justify-content: center;
    }

    .back-to-newsroom:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(30, 64, 175, 0.3);
        color: white;
        text-decoration: none;
    }

    .author-info {
        background: #f8fafc;
        padding: 25px;
        border-radius: 12px;
        margin: 40px 0;
        border-left: 4px solid #1e40af;
    }

    .author-avatar {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        object-fit: cover;
        margin-right: 20px;
    }

    .author-details h6 {
        color: #1e40af;
        font-weight: 700;
        margin-bottom: 5px;
    }

    .author-details p {
        color: #6b7280;
        margin-bottom: 0;
        font-size: 0.9rem;
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

        .article-meta {
            flex-direction: column;
            align-items: flex-start;
            gap: 10px;
        }

        .sidebar-widget {
            padding: 20px;
        }
    }

    /* Animation for scroll effects */
    .scroll-animate {
        opacity: 0;
        transform: translateY(30px);
        transition: all 0.6s ease;
    }

    .scroll-animate.animate {
        opacity: 1;
        transform: translateY(0);
    }

    /* Print styles */
    @media print {
        .article-sidebar,
        .article-sharing,
        .back-to-newsroom {
            display: none;
        }

        .article-hero {
            min-height: 30vh;
        }

        .article-main-content {
            box-shadow: none;
            padding: 20px 0;
        }
    }

    /* Content Preview Styling - Matches Admin Exactly */
    .content-preview {
        background: white !important;
        border: 2px solid #e5e7eb !important;
        border-radius: 12px !important;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15) !important;
        padding: 2rem;
        margin-bottom: 2rem;
    }

    .preview-title {
        color: #1f2937;
        font-weight: 600;
        margin-bottom: 1rem;
        padding-bottom: 0.75rem;
        border-bottom: 1px solid #e5e7eb;
        font-size: 1rem;
    }

    .preview-output.article-body,
    .article-body {
        margin-bottom: 0;
    }

    .article-body h1 {
        font-size: 2rem;
        font-weight: 800;
        color: #1e40af;
        margin: 2.5rem 0 1.5rem 0;
        line-height: 1.2;
        border-bottom: 3px solid #e5e7eb;
        padding-bottom: 0.75rem;
    }

    .article-body h2 {
        font-size: 1.75rem;
        font-weight: 700;
        color: #1f2937;
        margin: 2rem 0 1rem 0;
        line-height: 1.3;
        border-bottom: 2px solid #e5e7eb;
        padding-bottom: 0.5rem;
    }

    .article-body h3 {
        font-size: 1.5rem;
        font-weight: 600;
        color: #374151;
        margin: 1.5rem 0 0.75rem 0;
        line-height: 1.4;
    }

    .article-body h4 {
        font-size: 1.25rem;
        font-weight: 600;
        color: #4b5563;
        margin: 1.25rem 0 0.5rem 0;
        line-height: 1.4;
    }

    .article-body p {
        font-size: 1.1rem;
        line-height: 1.8;
        color: #374151;
        margin: 0 0 1.5rem 0;
        text-align: justify;
    }

    .article-body ul, .article-body ol {
        margin: 1.5rem 0;
        padding-left: 2rem;
    }

    .article-body li {
        font-size: 1.1rem;
        line-height: 1.7;
        color: #374151;
        margin: 0.5rem 0;
    }

    .article-body ul li {
        list-style-type: disc;
    }

    .article-body ol li {
        list-style-type: decimal;
    }

    .article-body strong {
        font-weight: 700;
        color: #1f2937;
    }

    .article-body em {
        font-style: italic;
        color: #6b7280;
    }

    .article-body blockquote {
        background: #f8fafc;
        border-left: 4px solid #1e40af;
        padding: 1.5rem;
        margin: 2rem 0;
        border-radius: 0 8px 8px 0;
        font-style: italic;
        color: #4b5563;
    }

    .article-body img {
        max-width: 100%;
        height: auto;
        border-radius: 8px;
        margin: 1.5rem 0;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .content-preview {
            padding: 1.5rem;
        }

        .article-body h1 {
            font-size: 1.75rem;
            margin: 2rem 0 1rem 0;
        }

        .article-body h2 {
            font-size: 1.5rem;
            margin: 1.5rem 0 0.75rem 0;
        }

        .article-body h3 {
            font-size: 1.25rem;
            margin: 1.25rem 0 0.5rem 0;
        }

        .article-body h4 {
            font-size: 1.1rem;
            margin: 1rem 0 0.5rem 0;
        }

        .article-body p,
        .article-body li {
            font-size: 1rem;
            line-height: 1.6;
        }

        .article-body ul, .article-body ol {
            padding-left: 1.5rem;
        }
    }
</style>
@endsection

@section('content')
@php
// Get the current URL slug for example content
$currentSlug = request()->segment(2);

// Get the current article data or use fallback
$currentArticle = $examples[$currentSlug] ?? [
    'title' => 'News Article',
    'category' => 'News',
    'date' => now()->format('Y-m-d'),
    'author' => 'WebFocus Team',
    'summary' => 'Article summary will be displayed here.',
    'content' => '<p>Article content will be displayed here.</p>',
    'tags' => 'news, webfocus'
];
@endphp

<div class="article-detail-layout">
    <!-- Article Hero Section -->
    <section class="article-hero">
        <div class="article-hero-background">
            @if(isset($news) && $news->banner_image)
                <img src="{{ $news->image }}" alt="{{ $news->name }}" class="article-hero-image">
            @else
                <img src="{{ asset('theme/images/banners/image1.jpg') }}" alt="{{ isset($news) ? $news->name : 'News Article' }}" class="article-hero-image">
            @endif
            <div class="article-hero-overlay"></div>
        </div>

        <div class="container">
            <div class="article-hero-content scroll-animate">
                <nav aria-label="breadcrumb" class="article-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('/news') }}">News</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            {{ isset($news) ? $news->title : $currentArticle['title'] }}
                        </li>
                    </ol>
                </nav>

                <div class="article-meta">
                    <span class="article-category">
                        {{ isset($news) ? ($news->category ?? 'News') : $currentArticle['category'] }}
                    </span>
                    <time class="article-date" datetime="{{ isset($news) ? $news->date : $currentArticle['date'] }}">
                        {{ isset($news) ? \Carbon\Carbon::parse($news->date)->format('F j, Y') : \Carbon\Carbon::parse($currentArticle['date'])->format('F j, Y') }}
                    </time>
                </div>

                <h1 class="article-title">
                    {{ isset($news) ? $news->title : $currentArticle['title'] }}
                </h1>

                <p class="article-excerpt">
                    {{ isset($news) ? ($news->summary ?? '') : $currentArticle['summary'] }}
                </p>
            </div>
        </div>
    </section>

    <!-- Article Content -->
    <section class="article-content-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <article class="article-main-content scroll-animate">
                        <!-- Article Body - Preview Style -->
                        <div class="content-preview">
                            <h6 class="preview-title">Article Content:</h6>
                            <div class="article-body preview-output">
                                @if(isset($news) && $news->content)
                                    {!! $news->content !!}
                                @else
                                    {!! $currentArticle['content'] !!}
                                @endif
                            </div>
                        </div>

                        <!-- Author Info -->
                        <div class="author-info">
                            <div class="d-flex align-items-center">
                                <div class="author-avatar bg-primary d-flex align-items-center justify-content-center text-white">
                                    {{ substr((isset($news) && $news->user ? $news->user->name : 'WebFocus Team'), 0, 1) }}
                                </div>
                                <div class="author-details">
                                    <h6>{{ isset($news) && $news->user ? $news->user->name : 'WebFocus Team' }}</h6>
                                    <p>Content Writer</p>
                                </div>
                            </div>
                        </div>

                        <!-- Article Tags -->
                        <div class="article-tags">
                            <h5>Tags:</h5>
                            @php
                                $tags = isset($news) ? ($news->meta_keyword ?? 'news') : $currentArticle['tags'];
                            @endphp
                            @foreach(explode(',', $tags) as $tag)
                                <span class="article-tag">{{ trim($tag) }}</span>
                            @endforeach
                        </div>

                        <!-- Social Sharing -->
                        <div class="article-sharing">
                            <h5>Share this article:</h5>
                            <div class="sharing-buttons">
                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}" target="_blank" class="sharing-btn facebook">
                                    <i class="fab fa-facebook-f"></i> Facebook
                                </a>
                                <a href="https://twitter.com/intent/tweet?url={{ urlencode(url()->current()) }}&text={{ urlencode(isset($news) ? $news->name : $currentArticle['title']) }}" target="_blank" class="sharing-btn twitter">
                                    <i class="fab fa-twitter"></i> Twitter
                                </a>
                                <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(url()->current()) }}" target="_blank" class="sharing-btn linkedin">
                                    <i class="fab fa-linkedin-in"></i> LinkedIn
                                </a>
                                <a href="mailto:?subject={{ urlencode($currentArticle['title']) }}&body={{ urlencode('Check out this article: ' . url()->current()) }}" class="sharing-btn email">
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
                            <div class="sidebar-widget scroll-animate">
                                <h4 class="widget-title">Latest News</h4>
                                <div class="latest-articles">
                                    @foreach($latestArticles as $article)
                                        <article class="latest-article-item">
                                            <div class="latest-article-image">
                                                @if($article->banner_image)
                                                    <img src="{{ $article->image }}" alt="{{ $article->name }}">
                                                @else
                                                    <img src="{{ asset('images/news/news.jpg') }}" alt="{{ $article->name }}">
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

                        <!-- Categories Widget -->
                        @if(isset($categories) && $categories->count() > 0)
                            <div class="sidebar-widget scroll-animate">
                                <h4 class="widget-title">Categories</h4>
                                <div class="categories-list">
                                    @foreach($categories as $category)
                                        <a href="{{ url('/news/category/' . $category->slug) }}" class="category-item d-block mb-2 p-2 text-decoration-none">
                                            {{ $category->name }} <span class="text-muted">({{ $category->articles_count ?? 0 }})</span>
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        <!-- Back to Newsroom -->
                        <div class="sidebar-widget scroll-animate">
                            <a href="{{ url('/news') }}" class="back-to-newsroom">
                                <i class="fas fa-arrow-left"></i> Back to News
                            </a>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@section('pagejs')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Scroll animations
    const observerOptions = {
        threshold: 0.2,
        rootMargin: '0px 0px -30px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate');
            }
        });
    }, observerOptions);

    // Observe all scroll animate elements
    document.querySelectorAll('.scroll-animate').forEach(el => observer.observe(el));

    // Smooth scrolling for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });

    // Reading progress indicator
    const article = document.querySelector('.article-body');
    if (article) {
        const progressBar = document.createElement('div');
        progressBar.className = 'reading-progress';
        progressBar.style.cssText = `
            position: fixed;
            top: 0;
            left: 0;
            width: 0%;
            height: 4px;
            background: linear-gradient(90deg, #1e40af, #3b82f6);
            z-index: 9999;
            transition: width 0.3s ease;
        `;
        document.body.appendChild(progressBar);

        window.addEventListener('scroll', () => {
            const scrollTop = window.pageYOffset;
            const articleTop = article.offsetTop;
            const articleHeight = article.offsetHeight;
            const windowHeight = window.innerHeight;

            const scrolled = Math.max(0, Math.min(100,
                ((scrollTop - articleTop + windowHeight / 2) / articleHeight) * 100
            ));

            progressBar.style.width = scrolled + '%';
        });
    }

    // Print functionality
    const printBtn = document.createElement('button');
    printBtn.innerHTML = '<i class="fas fa-print"></i> Print Article';
    printBtn.className = 'btn btn-outline-secondary btn-sm mt-3';
    printBtn.onclick = () => window.print();

    const sharingSection = document.querySelector('.article-sharing');
    if (sharingSection) {
        sharingSection.appendChild(printBtn);
    }

    // Copy link functionality
    const copyBtn = document.createElement('button');
    copyBtn.innerHTML = '<i class="fas fa-link"></i> Copy Link';
    copyBtn.className = 'sharing-btn bg-secondary';
    copyBtn.onclick = async () => {
        try {
            await navigator.clipboard.writeText(window.location.href);
            copyBtn.innerHTML = '<i class="fas fa-check"></i> Copied!';
            setTimeout(() => {
                copyBtn.innerHTML = '<i class="fas fa-link"></i> Copy Link';
            }, 2000);
        } catch (err) {
            console.error('Failed to copy: ', err);
        }
    };

    const sharingButtons = document.querySelector('.sharing-buttons');
    if (sharingButtons) {
        sharingButtons.appendChild(copyBtn);
    }
});
</script>
@endsection
