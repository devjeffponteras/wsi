
@extends('theme.main')

@section('pagecss')
<link rel="stylesheet" href="{{ asset('theme/css/newstyle.css') }}" type="text/css" />
<style>

</style>
@endsection

@section('content')
<div class="flex flex-col min-h-screen">
    <!-- Hero Section -->
    <section class="hero-section">
        <video class="hero-video" autoplay loop muted playsinline poster="{{ asset('storage/banners/fallback-poster.jpg') }}">
            <source src="{{ asset('storage/banners/videoplayback.webm') }}" type="video/webm">
            <source src="{{ asset('images/videoplayback.mp4') }}" type="video/mp4">
            <picture>
                <source srcset="{{ asset('storage/banners/fallback-poster.webp') }}" type="image/webp">
                <img src="{{ asset('images/banners/fallback-poster.jpg') }}" alt="WebFocus Solutions News Banner" class="hero-video-fallback">
            </picture>
            Your browser does not support the video tag.
        </video>
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <h1 class="hero-title animate-slide-in-up">
                Stay Informed with <span class="text-white">WebFocus News</span>
            </h1>
            <p class="hero-subtitle animate-slide-in-up">
                Get the latest updates on hosting solutions, document management, and technology trends from WebFocus Solutions, Inc.
            </p>
        </div>
    </section>

    <!-- Main News Section -->
    <section class="news-section">
        <div class="news-container">
            <div class="search-bar scroll-animate">
                <input type="text" class="search-input" placeholder="Search news articles..." aria-label="Search news articles">
            </div>
            <div class="text-center mb-12 scroll-animate">
                <h2 class="section-title">Main News</h2>
                <p class="section-subtitle">
                    Discover the latest updates and featured stories from WebFocus Solutions, Inc.
                </p>
            </div>
            <div class="main-news-grid scroll-animate">
                <!-- Featured Article -->
                <div class="main-news-card">
                    <img src="{{ asset('images/news/news.jpg') }}" alt="WebFocus Launches New Hosting Plans" class="main-news-image">
                    <div class="main-news-content">
                        <div class="main-news-meta">September 17, 2025 | Technology</div>
                        <h3 class="main-news-title">WebFocus Launches Enhanced Hosting Plans with FocusCare+</h3>
                        <p class="main-news-summary">
                            WebFocus Solutions, Inc. introduces new cloud, shared, dedicated, and bare-metal hosting plans, all backed by our premium FocusCare+ support for seamless performance.
                        </p>
                        <a href="{{-- route('news.article', ['id' => 1]) --}}" class="btn btn-primary">Read More</a>
                    </div>
                </div>
                <!-- Secondary Featured Article -->
                <div class="main-news-card">
                    <img src="{{ asset('images/news/news1.jpg') }}" alt="FileHold 2.0 Release" class="main-news-image">
                    <div class="main-news-content">
                        <div class="main-news-meta">September 15, 2025 | Document Management</div>
                        <h3 class="main-news-title">FileHold 2.0: Revolutionizing Document Management</h3>
                        <p class="main-news-summary">
                            The latest FileHold update brings advanced workflow automation and enhanced security features, making document management easier than ever.
                        </p>
                        <a href="{{-- route('news.article', ['id' => 2]) --}}" class="btn btn-primary">Read More</a>
                    </div>
                </div>
            </div>
            <!-- Recent News -->
            <div class="recent-news-grid scroll-animate">
                <div class="recent-news-card">
                    <img src="{{ asset('images/news/news2.jpg') }}" alt="Tech Tips for Businesses" class="recent-news-image">
                    <div class="recent-news-content">
                        <div class="recent-news-meta">September 14, 2025 | Tips & Tricks</div>
                        <h3 class="recent-news-title">5 Tech Tips for Small Businesses in 2025</h3>
                        <p class="recent-news-summary">
                            Boost your business with these essential technology tips, from cloud hosting to cybersecurity best practices.
                        </p>
                        <a href="{{-- route('news.article', ['id' => 3]) --}}" class="btn btn-primary">Read More</a>
                    </div>
                </div>
                <div class="recent-news-card">
                    <img src="{{ asset('images/news/news3.jpg') }}" alt="FocusCare+ Expansion" class="recent-news-image">
                    <div class="recent-news-content">
                        <div class="recent-news-meta">September 12, 2025 | Hosting</div>
                        <h3 class="recent-news-title">FocusCare+ Expands Support Services</h3>
                        <p class="recent-news-summary">
                            WebFocus enhances FocusCare+ with 24/7 monitoring and proactive maintenance for all hosting plans.
                        </p>
                        <a href="{{-- route('news.article', ['id' => 4]) --}}" class="btn btn-primary">Read More</a>
                    </div>
                </div>
                <div class="recent-news-card">
                    <img src="{{ asset('images/news/news4.jpg') }}" alt="Cybersecurity Update" class="recent-news-image">
                    <div class="recent-news-content">
                        <div class="recent-news-meta">September 10, 2025 | Security</div>
                        <h3 class="recent-news-title">New Cybersecurity Features for WebFocus Hosting</h3>
                        <p class="recent-news-summary">
                            Learn about the latest security enhancements to protect your website and data with WebFocus hosting solutions.
                        </p>
                        <a href="{{-- route('news.article', ['id' => 5]) --}}" class="btn btn-primary">Read More</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- News Categories -->
    <section class="categories-section">
        <div class="news-container">
            <div class="text-center mb-12 scroll-animate">
                <h2 class="section-title">Explore by Category</h2>
                <p class="section-subtitle">
                    Browse our news articles by category to stay updated on topics that matter to you.
                </p>
            </div>
            <div class="categories-grid scroll-animate">
                <div class="category-card">
                    <div class="category-icon">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999M8.5 10.5h8.5M12 15.5v5.5"></path>
                        </svg>
                    </div>
                    <h3 class="category-title">Technology</h3>
                    <a href="{{-- route('news.category', ['category' => 'technology']) --}}" class="btn btn-primary">View Articles</a>
                </div>
                <div class="category-card">
                    <div class="category-icon">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"></path>
                        </svg>
                    </div>
                    <h3 class="category-title">Document Management</h3>
                    <a href="{{-- route('news.category', ['category' => 'document-management']) --}}" class="btn btn-primary">View Articles</a>
                </div>
                <div class="category-card">
                    <div class="category-icon">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2"></path>
                        </svg>
                    </div>
                    <h3 class="category-title">Hosting</h3>
                    <a href="{{-- route('news.category', ['category' => 'hosting']) --}}" class="btn btn-primary">View Articles</a>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="section-cta">
        <div class="cta-container scroll-animate">
            <div class="cta-content">
                <h2 class="text-3xl sm:text-4xl font-bold mb-4">Stay Updated with WebFocus</h2>
                <p class="text-lg text-white/90 max-w-2xl mx-auto mb-6">
                    Subscribe to our newsletter for the latest news, updates, and insights from WebFocus Solutions, Inc.
                </p>
                <div class="cta-button-group">
                    <a href="#subscribe" class="btn btn-primary" onclick="console.log('Subscribe Now clicked')">Subscribe Now</a>
                    <a href="#contact" class="btn btn-glass">Contact Us</a>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@section('pagejs')
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Intersection Observer for scroll animations
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

    // Observe scroll animation elements
    document.querySelectorAll('.scroll-animate').forEach(el => observer.observe(el));
});
</script>
@endsection
