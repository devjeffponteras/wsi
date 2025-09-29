@extends('theme.main')

@section('pagecss')
<link rel="stylesheet" href="{{ asset('theme/css/newstyle.css') }}" type="text/css" />
<style>
    /* Main News Grid */
    .main-news-grid {
        flex: 2;
        display: grid;
        grid-template-columns: 1fr;
        gap: 2.5rem;
    }
    .main-news-card {
        background: #fff;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .main-news-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
    }
    .main-news-image {
        width: 100%;
        height: 250px;
        object-fit: cover;
    }
    .main-news-content {
        padding: 2rem;
    }
    .main-news-meta {
        font-size: 0.85rem;
        color: #9ca3af;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 0.75rem;
    }
    .main-news-title {
        font-size: 1.75rem;
        font-weight: 700;
        color: #1e293b;
        margin-bottom: 1rem;
        line-height: 1.3;
    }
    .main-news-summary {
        font-size: 1.1rem;
        color: #64748b;
        margin-bottom: 1.5rem;
        line-height: 1.6;
    }
    .main-news-card .btn-primary {
        padding: 0.75rem 1.5rem;
        background: #049fd9; /* Updated to Cisco-like blue */
        color: #fff;
        border-radius: 5px;
        text-decoration: none;
        font-weight: 500;
    }
    .main-news-card .btn-primary:hover {
        background: #038ac0;
    }

    /* Recent News Sidebar */
    .recent-news-grid {
        flex: 1;
        min-width: 300px;
        display: grid;
        gap: 1.5rem;
    }
    .recent-news-card {
        display: flex;
        align-items: center;
        background: #fff;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        transition: transform 0.3s ease;
    }
    .recent-news-card:hover {
        transform: translateY(-5px);
    }
    .recent-news-image {
        width: 150px;
        height: 210px;
        object-fit: cover;
        flex-shrink: 0;
    }
    .recent-news-content {
        padding: 1rem 1.5rem;
        flex-grow: 1;
    }
    .recent-news-meta {
        font-size: 0.75rem;
        color: #9ca3af;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 0.5rem;
    }
    .recent-news-title {
        font-size: 1.1rem;
        font-weight: 600;
        color: #1e293b;
        margin-bottom: 0.75rem;
        line-height: 1.4;
    }
    .recent-news-summary {
        font-size: 0.9rem;
        color: #64748b;
        margin-bottom: 0.75rem;
        line-height: 1.5;
    }
    .recent-news-card .btn-primary {
        padding: 0.5rem 1rem;
        background: #049fd9;
        color: #fff;
        border-radius: 5px;
        text-decoration: none;
        font-weight: 500;
        font-size: 0.9rem;
    }
    .recent-news-card .btn-primary:hover {
        background: #038ac0;
    }

    /* Search Bar */
    .search-bar {
        margin-bottom: 2.5rem;
        text-align: center;
    }
    .search-input {
        padding: 0.85rem 1.5rem;
        border: 1px solid #d1d5db;
        border-radius: 50px;
        font-size: 1rem;
        width: 100%;
        max-width: 450px;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
    }

    /* Additional Recent News Section */
    .additional-recent-news-section {
        padding: 3rem 0;
        background: #fff;
    }
    .additional-recent-news-grid {
        max-width: 1200px;
        margin: 0 auto;
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 2rem;
    }
    .additional-recent-news-card {
        background: #fff;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        transition: transform 0.3s ease;
    }
    .additional-recent-news-card:hover {
        transform: translateY(-5px);
    }
    .additional-recent-news-image {
        width: 100%;
        height: 180px;
        object-fit: cover;
    }
    .additional-recent-news-content {
        padding: 1.5rem;
    }
    .additional-recent-news-meta {
        font-size: 0.75rem;
        color: #9ca3af;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 0.5rem;
    }
    .additional-recent-news-title {
        font-size: 1.2rem;
        font-weight: 600;
        color: #1e293b;
        margin-bottom: 0.75rem;
        line-height: 1.4;
    }
    .additional-recent-news-summary {
        font-size: 0.9rem;
        color: #64748b;
        margin-bottom: 0.75rem;
        line-height: 1.5;
    }
    .additional-recent-news-card .btn-primary {
        padding: 0.5rem 1rem;
        background: #049fd9;
        color: #fff;
        border-radius: 5px;
        text-decoration: none;
        font-weight: 500;
        font-size: 0.9rem;
    }
    .additional-recent-news-card .btn-primary:hover {
        background: #038ac0;
    }

    /* Customer Spotlight Section */
    .customer-spotlight-section {
        padding: 3rem 0;
        background: #f9fafb;
    }
    .customer-spotlight-grid {
        max-width: 1200px;
        margin: 0 auto;
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 2rem;
    }
    .customer-spotlight-card {
        background: #fff;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
        transition: transform 0.3s ease;
    }
    .customer-spotlight-card:hover {
        transform: translateY(-8px);
    }
    .customer-spotlight-image {
        width: 100%;
        height: 200px;
        object-fit: cover;
    }
    .customer-spotlight-content {
        padding: 2rem;
    }
    .customer-spotlight-title {
        font-size: 1.5rem;
        font-weight: 700;
        color: #1e293b;
        margin-bottom: 1rem;
        line-height: 1.3;
    }
    .customer-spotlight-summary {
        font-size: 1rem;
        color: #64748b;
        margin-bottom: 1.5rem;
        line-height: 1.6;
    }
    .customer-spotlight-card .btn-primary {
        padding: 0.75rem 1.5rem;
        background: #049fd9;
        color: #fff;
        border-radius: 5px;
        text-decoration: none;
        font-weight: 500;
    }
    .customer-spotlight-card .btn-primary:hover {
        background: #038ac0;
    }

    /* Media Navigation (Tabs) */
    .media-navigation {
        padding: 2rem 0;
        background: #f3f4f6;
        text-align: center;
    }
    .media-nav-list {
        display: flex;
        justify-content: center;
        gap: 2rem;
        list-style: none;
        padding: 0;
        margin: 0;
    }
    .media-nav-item {
        font-size: 1.2rem;
        font-weight: 600;
        color: #1e293b;
        cursor: pointer;
        transition: color 0.3s ease;
        position: relative;
    }
    .media-nav-item:hover {
        color: #049fd9;
    }
    .media-nav-item.active {
        color: #049fd9;
    }
    .media-nav-item.active::after {
        content: '';
        position: absolute;
        bottom: -4px;
        left: 0;
        width: 100%;
        height: 2px;
        background: #049fd9;
    }

    /* Media Display Sections */
    .media-display-section {
        padding: 3rem 0;
        background: #fff;
        display: none;
    }
    .media-display-section.active {
        display: block;
    }
    .media-display-grid {
        max-width: 1200px;
        margin: 0 auto;
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 2rem;
    }
    .media-display-card {
        background: #fff;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
        transition: transform 0.3s ease;
    }
    .media-display-card:hover {
        transform: translateY(-8px);
    }
    .media-display-image {
        width: 100%;
        height: 180px;
        object-fit: cover;
    }
    .media-display-content {
        padding: 1.5rem;
    }
    .media-display-title {
        font-size: 1.2rem;
        font-weight: 600;
        color: #1e293b;
        margin-bottom: 0.75rem;
        line-height: 1.4;
    }
    .media-display-summary {
        font-size: 0.9rem;
        color: #64748b;
        margin-bottom: 0.75rem;
        line-height: 1.5;
    }
    .media-display-card .btn-primary {
        padding: 0.5rem 1rem;
        background: #049fd9;
        color: #fff;
        border-radius: 5px;
        text-decoration: none;
        font-weight: 500;
        font-size: 0.9rem;
    }
    .media-display-card .btn-primary:hover {
        background: #038ac0;
    }

    /* Responsive Design */
    @media (max-width: 1024px) {
        .news-container {
            flex-direction: column;
        }
        .main-news-grid, .recent-news-grid {
            width: 100%;
        }
        .recent-news-grid {
            margin-top: 2rem;
        }
        .additional-recent-news-grid, .customer-spotlight-grid, .media-display-grid {
            grid-template-columns: 1fr;
        }
    }
    @media (max-width: 767px) {
        .hero-section {
            height: 40vh;
        }
        .hero-title {
            font-size: 2rem;
        }
        .hero-subtitle {
            font-size: 1rem;
        }
        .main-news-image {
            height: 180px;
        }
        .main-news-title {
            font-size: 1.4rem;
        }
        .recent-news-image {
            width: 80px;
            height: 80px;
        }
        .recent-news-title {
            font-size: 1rem;
        }
        .additional-recent-news-image {
            height: 150px;
        }
        .customer-spotlight-image {
            height: 180px;
        }
        .media-nav-list {
            flex-direction: column;
            gap: 1rem;
        }
        .media-display-image {
            height: 150px;
        }
    }
</style>
@endsection

@section('content')
<div class="flex flex-col min-h-screen">
    <!-- Hero Section -->
    <section class="hero-section">
        <video class="hero-video" autoplay loop muted playsinline poster="{{ asset('storage/banners/fallback-poster.jpg') }}">
            <source src="{{ asset('storage/banners/videoplayback.webm') }}" type="video/webm">
            <source src="{{ asset('images/videoplayback.mp4') }}" type="video/mp4"> <!-- Fixed path consistency -->
            <picture>
                <source srcset="{{ asset('storage/banners/fallback-poster.webp') }}" type="image/webp">
                <img src="{{ asset('storage/banners/fallback-poster.jpg') }}" alt="WebFocus Solutions News Banner" class="hero-video-fallback">
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
                        <div class="main-news-meta">September 19, 2025 | Technology</div> <!-- Updated date -->
                        <h3 class="main-news-title">WebFocus Launches Enhanced Hosting Plans with FocusCare+</h3>
                        <p class="main-news-summary">
                            WebFocus Solutions, Inc. introduces new cloud, shared, dedicated, and bare-metal hosting plans, all backed by our premium FocusCare+ support for seamless performance.
                        </p>
                        {{-- <a href="{{ route('news.article', ['id' => 1]) }}" class="btn btn-primary">Read More</a> <!-- Uncommented, assuming routes exist --> --}}
                    </div>
                </div>
                <!-- Secondary Featured Article -->
                <div class="main-news-card">
                    <img src="{{ asset('images/news/news1.jpg') }}" alt="FileHold 2.0 Release" class="main-news-image">
                    <div class="main-news-content">
                        <div class="main-news-meta">September 18, 2025 | Document Management</div> <!-- Updated date -->
                        <h3 class="main-news-title">FileHold 2.0: Revolutionizing Document Management</h3>
                        <p class="main-news-summary">
                            The latest FileHold update brings advanced workflow automation and enhanced security features, making document management easier than ever.
                        </p>
                        {{-- <a href="{{ route('news.article', ['id' => 2]) }}" class="btn btn-primary">Read More</a> --}}
                    </div>
                </div>
            </div>
            <div class="recent-news-grid scroll-animate">
                <!-- Recent News -->
                <div class="recent-news-card">
                    <img src="{{ asset('images/news/news2.jpg') }}" alt="Tech Tips for Businesses" class="recent-news-image">
                    <div class="recent-news-content">
                        <div class="recent-news-meta">September 17, 2025 | Tips & Tricks</div>
                        <h3 class="recent-news-title">5 Tech Tips for Small Businesses in 2025</h3>
                        <p class="recent-news-summary">
                            Boost your business with these essential technology tips, from cloud hosting to cybersecurity best practices.
                        </p>
                        {{-- <a href="{{ route('news.article', ['id' => 3]) }}" class="btn btn-primary">Read More</a> --}}
                    </div>
                </div>
                <div class="recent-news-card">
                    <img src="{{ asset('images/news/news3.jpg') }}" alt="FocusCare+ Expansion" class="recent-news-image">
                    <div class="recent-news-content">
                        <div class="recent-news-meta">September 16, 2025 | Hosting</div>
                        <h3 class="recent-news-title">FocusCare+ Expands Support Services</h3>
                        <p class="recent-news-summary">
                            WebFocus enhances FocusCare+ with 24/7 monitoring and proactive maintenance for all hosting plans.
                        </p>
                        {{-- <a href="{{ route('news.article', ['id' => 4]) }}" class="btn btn-primary">Read More</a> --}}
                    </div>
                </div>
                <div class="recent-news-card">
                    <img src="{{ asset('images/news/news1.jpg') }}" alt="Cybersecurity Update" class="recent-news-image">
                    <div class="recent-news-content">
                        <div class="recent-news-meta">September 15, 2025 | Security</div>
                        <h3 class="recent-news-title">New Cybersecurity Features for WebFocus Hosting</h3>
                        <p class="recent-news-summary">
                            Learn about the latest security enhancements to protect your website and data with WebFocus hosting solutions.
                        </p>
                        {{-- <a href="{{ route('news.article', ['id' => 5]) }}" class="btn btn-primary">Read More</a> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Additional Recent News Section -->
    <section class="additional-recent-news-section">
        <div class="news-container">
            <div class="text-center mb-12 scroll-animate">
                <h2 class="section-title">Recent News</h2>
                <p class="section-subtitle">
                    Stay up-to-date with the latest articles and updates from WebFocus Solutions, Inc.
                </p>
            </div>
            <div class="additional-recent-news-grid scroll-animate">
                <div class="additional-recent-news-card">
                    <img src="{{ asset('images/news/news2.jpg') }}" alt="AI Integration Update" class="additional-recent-news-image">
                    <div class="additional-recent-news-content">
                        <div class="additional-recent-news-meta">September 14, 2025 | Technology</div>
                        <h3 class="additional-recent-news-title">WebFocus Integrates AI for Smarter Hosting Solutions</h3>
                        <p class="additional-recent-news-summary">
                            Discover how our new AI-driven tools enhance hosting performance and customer support.
                        </p>
                        {{-- <a href="{{ route('news.article', ['id' => 6]) }}" class="btn btn-primary">Read More</a> --}}
                    </div>
                </div>
                <div class="additional-recent-news-card">
                    <img src="{{ asset('images/news/news3.jpg') }}" alt="Eco-Friendly Hosting" class="additional-recent-news-image">
                    <div class="additional-recent-news-content">
                        <div class="additional-recent-news-meta">September 13, 2025 | Hosting</div>
                        <h3 class="additional-recent-news-title">WebFocus Launches Eco-Friendly Hosting Options</h3>
                        <p class="additional-recent-news-summary">
                            Learn about our new sustainable hosting plans designed to reduce carbon footprint.
                        </p>
                        {{-- <a href="{{ route('news.article', ['id' => 7]) }}" class="btn btn-primary">Read More</a> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Customer Spotlight Section (Renamed to Features for newsroom feel) -->
    <section class="customer-spotlight-section">
        <div class="news-container">
            <div class="text-center mb-12 scroll-animate">
                <h2 class="section-title">Features & Spotlights</h2>
                <p class="section-subtitle">
                    Hear from our valued customers and explore in-depth stories.
                </p>
            </div>
            <div class="customer-spotlight-grid scroll-animate">
                <div class="customer-spotlight-card">
                    <img src="{{ asset('images/news/customer1.jpg') }}" alt="Customer Success Story 1" class="customer-spotlight-image">
                    <div class="customer-spotlight-content">
                        <div class="customer-spotlight-meta">September 12, 2025 | Success Story</div> <!-- Added meta -->
                        <h3 class="customer-spotlight-title">How ABC Corp Boosted Efficiency with FileHold</h3>
                        <p class="customer-spotlight-summary">
                            ABC Corp streamlined their document management with FileHold 2.0, saving 30% on operational costs.
                        </p>
                        {{-- <a href="{{ route('customer.spotlight', ['id' => 1]) }}" class="btn btn-primary">Learn More</a> --}}
                    </div>
                </div>
                <div class="customer-spotlight-card">
                    <img src="{{ asset('images/news/customer.jpg') }}" alt="Customer Success Story 2" class="customer-spotlight-image">
                    <div class="customer-spotlight-content">
                        <div class="customer-spotlight-meta">September 11, 2025 | Success Story</div>
                        <h3 class="customer-spotlight-title">XYZ Ltd’s Growth with WebFocus Hosting</h3>
                        <p class="customer-spotlight-summary">
                            XYZ Ltd scaled their online presence with our hosting plans, increasing traffic by 50%.
                        </p>
                        {{-- <a href="{{ route('customer.spotlight', ['id' => 2]) }}" class="btn btn-primary">Learn More</a> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Media Navigation (as Tabs) -->
    <nav class="media-navigation">
        <ul class="media-nav-list scroll-animate">
            <li class="media-nav-item" data-target="press-releases">Press Releases</li>
            <li class="media-nav-item" data-target="videos">Videos</li>
            <li class="media-nav-item" data-target="articles">Articles</li>
            <li class="media-nav-item" data-target="blogs">Blogs</li>
            <li class="media-nav-item" data-target="podcasts">Podcasts</li>
            <li class="media-nav-item" data-target="people">People@WebFocus</li> <!-- Updated name -->
        </ul>
    </nav>

    <!-- Press Releases Display Section -->
    <section class="media-display-section press-releases-section active"> <!-- Added class and active -->
        <div class="news-container">
            <div class="text-center mb-12 scroll-animate">
                <h2 class="section-title">Press Releases</h2>
            </div>
            <div class="media-display-grid scroll-animate"> <!-- Changed to media-display-grid for vertical cards -->
                <div class="media-display-card">
                    <img src="{{ asset('images/news/news2.jpg') }}" alt="Tech Tips for Businesses" class="media-display-image">
                    <div class="media-display-content">
                        <div class="media-display-meta">September 17, 2025 | Tips & Tricks</div> <!-- Added meta -->
                        <h3 class="media-display-title">5 Tech Tips for Small Businesses in 2025</h3>
                        <p class="media-display-summary">
                            Boost your business with these essential technology tips, from cloud hosting to cybersecurity best practices.
                        </p>
                        {{-- <a href="{{ route('news.article', ['id' => 3]) }}" class="btn btn-primary">Read More</a> --}}
                    </div>
                </div>
                <div class="media-display-card">
                    <img src="{{ asset('images/news/news3.jpg') }}" alt="FocusCare+ Expansion" class="media-display-image">
                    <div class="media-display-content">
                        <div class="media-display-meta">September 16, 2025 | Hosting</div>
                        <h3 class="media-display-title">FocusCare+ Expands Support Services</h3>
                        <p class="media-display-summary">
                            WebFocus enhances FocusCare+ with 24/7 monitoring and proactive maintenance for all hosting plans.
                        </p>
                        {{-- <a href="{{ route('news.article', ['id' => 4]) }}" class="btn btn-primary">Read More</a> --}}
                    </div>
                </div>
                <div class="media-display-card">
                    <img src="{{ asset('images/news/news1.jpg') }}" alt="Cybersecurity Update" class="media-display-image">
                    <div class="media-display-content">
                        <div class="media-display-meta">September 15, 2025 | Security</div>
                        <h3 class="media-display-title">New Cybersecurity Features for WebFocus Hosting</h3>
                        <p class="media-display-summary">
                            Learn about the latest security enhancements to protect your website and data with WebFocus hosting solutions.
                        </p>
                        {{-- <a href="{{ route('news.article', ['id' => 5]) }}" class="btn btn-primary">Read More</a> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Videos Display Section -->
    <section class="media-display-section videos-section">
        <div class="news-container">
            <div class="text-center mb-12 scroll-animate">
                <h2 class="section-title">Videos</h2>
            </div>
            <div class="media-display-grid scroll-animate">
                <div class="media-display-card">
                    <img src="{{ asset('images/news/news2.jpg') }}" alt="Tech Tips Video" class="media-display-image"> <!-- Placeholder; replace with iframe for real videos -->
                    <div class="media-display-content">
                        <div class="media-display-meta">September 17, 2025 | Tips & Tricks</div>
                        <h3 class="media-display-title">5 Tech Tips for Small Businesses in 2025 (Video)</h3>
                        <p class="media-display-summary">
                            Watch our video on essential technology tips, from cloud hosting to cybersecurity.
                        </p>
                        {{-- <a href="{{ route('news.video', ['id' => 3]) }}" class="btn btn-primary">Watch Now</a> --}}
                    </div>
                </div>
                <div class="media-display-card">
                    <img src="{{ asset('images/news/news3.jpg') }}" alt="FocusCare+ Video" class="media-display-image">
                    <div class="media-display-content">
                        <div class="media-display-meta">September 16, 2025 | Hosting</div>
                        <h3 class="media-display-title">FocusCare+ Expands Support Services (Video)</h3>
                        <p class="media-display-summary">
                            Video overview of enhanced FocusCare+ with 24/7 monitoring.
                        </p>
                        {{-- <a href="{{ route('news.video', ['id' => 4]) }}" class="btn btn-primary">Watch Now</a> --}}
                    </div>
                </div>
                <div class="media-display-card">
                    <img src="{{ asset('images/news/news1.jpg') }}" alt="Cybersecurity Video" class="media-display-image">
                    <div class="media-display-content">
                        <div class="media-display-meta">September 15, 2025 | Security</div>
                        <h3 class="media-display-title">New Cybersecurity Features for WebFocus Hosting (Video)</h3>
                        <p class="media-display-summary">
                            Video on latest security enhancements for your website.
                        </p>
                        {{-- <a href="{{ route('news.video', ['id' => 5]) }}" class="btn btn-primary">Watch Now</a> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Articles Display Section -->
    <section class="media-display-section articles-section">
        <div class="news-container">
            <div class="text-center mb-12 scroll-animate">
                <h2 class="section-title">Articles</h2>
            </div>
            <div class="media-display-grid scroll-animate">
                <div class="media-display-card">
                    <img src="{{ asset('images/news/news2.jpg') }}" alt="Tech Tips Article" class="media-display-image">
                    <div class="media-display-content">
                        <div class="media-display-meta">September 17, 2025 | Tips & Tricks</div>
                        <h3 class="media-display-title">5 Tech Tips for Small Businesses in 2025</h3>
                        <p class="media-display-summary">
                            In-depth article on technology tips for businesses.
                        </p>
                        {{-- <a href="{{ route('news.article', ['id' => 3]) }}" class="btn btn-primary">Read More</a> --}}
                    </div>
                </div>
                <div class="media-display-card">
                    <img src="{{ asset('images/news/news3.jpg') }}" alt="FocusCare+ Article" class="media-display-image">
                    <div class="media-display-content">
                        <div class="media-display-meta">September 16, 2025 | Hosting</div>
                        <h3 class="media-display-title">FocusCare+ Expands Support Services</h3>
                        <p class="media-display-summary">
                            Article detailing the expansion of FocusCare+ services.
                        </p>
                        {{-- <a href="{{ route('news.article', ['id' => 4]) }}" class="btn btn-primary">Read More</a> --}}
                    </div>
                </div>
                <div class="media-display-card">
                    <img src="{{ asset('images/news/news1.jpg') }}" alt="Cybersecurity Article" class="media-display-image">
                    <div class="media-display-content">
                        <div class="media-display-meta">September 15, 2025 | Security</div>
                        <h3 class="media-display-title">New Cybersecurity Features for WebFocus Hosting</h3>
                        <p class="media-display-summary">
                            Article on new security features.
                        </p>
                        {{-- <a href="{{ route('news.article', ['id' => 5]) }}" class="btn btn-primary">Read More</a> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Blogs Display Section -->
    <section class="media-display-section blogs-section">
        <div class="news-container">
            <div class="text-center mb-12 scroll-animate">
                <h2 class="section-title">Blogs</h2>
            </div>
            <div class="media-display-grid scroll-animate">
                <div class="media-display-card">
                    <img src="{{ asset('images/news/news2.jpg') }}" alt="Tech Tips Blog" class="media-display-image">
                    <div class="media-display-content">
                        <div class="media-display-meta">September 17, 2025 | Tips & Tricks</div>
                        <h3 class="media-display-title">5 Tech Tips for Small Businesses in 2025</h3>
                        <p class="media-display-summary">
                            Blog post with practical tech advice.
                        </p>
                        {{-- <a href="{{ route('news.blog', ['id' => 3]) }}" class="btn btn-primary">Read More</a> --}}
                    </div>
                </div>
                <div class="media-display-card">
                    <img src="{{ asset('images/news/news3.jpg') }}" alt="FocusCare+ Blog" class="media-display-image">
                    <div class="media-display-content">
                        <div class="media-display-meta">September 16, 2025 | Hosting</div>
                        <h3 class="media-display-title">FocusCare+ Expands Support Services</h3>
                        <p class="media-display-summary">
                            Blog on support service expansions.
                        </p>
                        {{-- <a href="{{ route('news.blog', ['id' => 4]) }}" class="btn btn-primary">Read More</a> --}}
                    </div>
                </div>
                <div class="media-display-card">
                    <img src="{{ asset('images/news/news1.jpg') }}" alt="Cybersecurity Blog" class="media-display-image">
                    <div class="media-display-content">
                        <div class="media-display-meta">September 15, 2025 | Security</div>
                        <h3 class="media-display-title">New Cybersecurity Features for WebFocus Hosting</h3>
                        <p class="media-display-summary">
                            Blog exploring cybersecurity updates.
                        </p>
                        {{-- <a href="{{ route('news.blog', ['id' => 5]) }}" class="btn btn-primary">Read More</a> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Podcasts Display Section -->
    <section class="media-display-section podcasts-section">
        <div class="news-container">
            <div class="text-center mb-12 scroll-animate">
                <h2 class="section-title">Podcasts</h2>
            </div>
            <div class="media-display-grid scroll-animate">
                <div class="media-display-card">
                    <img src="{{ asset('images/news/news2.jpg') }}" alt="Tech Tips Podcast" class="media-display-image">
                    <div class="media-display-content">
                        <div class="media-display-meta">September 17, 2025 | Tips & Tricks</div>
                        <h3 class="media-display-title">5 Tech Tips for Small Businesses in 2025 (Podcast)</h3>
                        <p class="media-display-summary">
                            Listen to our podcast on essential tech tips.
                        </p>
                        {{-- <a href="{{ route('news.podcast', ['id' => 3]) }}" class="btn btn-primary">Listen Now</a> --}}
                    </div>
                </div>
                <div class="media-display-card">
                    <img src="{{ asset('images/news/news3.jpg') }}" alt="FocusCare+ Podcast" class="media-display-image">
                    <div class="media-display-content">
                        <div class="media-display-meta">September 16, 2025 | Hosting</div>
                        <h3 class="media-display-title">FocusCare+ Expands Support Services (Podcast)</h3>
                        <p class="media-display-summary">
                            Podcast episode on support expansions.
                        </p>
                        {{-- <a href="{{ route('news.podcast', ['id' => 4]) }}" class="btn btn-primary">Listen Now</a> --}}
                    </div>
                </div>
                <div class="media-display-card">
                    <img src="{{ asset('images/news/news1.jpg') }}" alt="Cybersecurity Podcast" class="media-display-image">
                    <div class="media-display-content">
                        <div class="media-display-meta">September 15, 2025 | Security</div>
                        <h3 class="media-display-title">New Cybersecurity Features for WebFocus Hosting (Podcast)</h3>
                        <p class="media-display-summary">
                            Podcast on cybersecurity features.
                        </p>
                        {{-- <a href="{{ route('news.podcast', ['id' => 5]) }}" class="btn btn-primary">Listen Now</a> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- People@WebFocus Display Section -->
    <section class="media-display-section people-section">
        <div class="news-container">
            <div class="text-center mb-12 scroll-animate">
                <h2 class="section-title">People@WebFocus</h2>
            </div>
            <div class="media-display-grid scroll-animate">
                <div class="media-display-card">
                    <img src="{{ asset('images/news/news2.jpg') }}" alt="Employee Story 1" class="media-display-image">
                    <div class="media-display-content">
                        <div class="media-display-meta">September 17, 2025 | Employee Spotlight</div>
                        <h3 class="media-display-title">Meet Our Tech Innovator</h3>
                        <p class="media-display-summary">
                            Story of an employee driving innovation at WebFocus.
                        </p>
                        {{-- <a href="{{ route('news.people', ['id' => 3]) }}" class="btn btn-primary">Read More</a> --}}
                    </div>
                </div>
                <div class="media-display-card">
                    <img src="{{ asset('images/news/news3.jpg') }}" alt="Employee Story 2" class="media-display-image">
                    <div class="media-display-content">
                        <div class="media-display-meta">September 16, 2025 | Employee Spotlight</div>
                        <h3 class="media-display-title">Support Team Hero</h3>
                        <p class="media-display-summary">
                            Profile of a key support team member.
                        </p>
                        {{-- <a href="{{ route('news.people', ['id' => 4]) }}" class="btn btn-primary">Read More</a> --}}
                    </div>
                </div>
                <div class="media-display-card">
                    <img src="{{ asset('images/news/news1.jpg') }}" alt="Employee Story 3" class="media-display-image">
                    <div class="media-display-content">
                        <div class="media-display-meta">September 15, 2025 | Employee Spotlight</div>
                        <h3 class="media-display-title">Security Expert Insights</h3>
                        <p class="media-display-summary">
                            Insights from our cybersecurity expert.
                        </p>
                        {{-- <a href="{{ route('news.people', ['id' => 5]) }}" class="btn btn-primary">Read More</a> --}}
                    </div>
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
                    <a href="#subscribe" class="btn btn-primary">Subscribe Now</a> <!-- Removed console.log -->
                    <a href="#contact" class="btn btn-glass">Contact Us</a>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@section('pagejs')
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

    // Media Tabs Functionality
    const navItems = document.querySelectorAll('.media-nav-item');
    const sections = document.querySelectorAll('.media-display-section');

    navItems.forEach(item => {
        item.addEventListener('click', () => {
            navItems.forEach(i => i.classList.remove('active'));
            item.classList.add('active');
            sections.forEach(s => s.classList.remove('active'));
            const target = item.dataset.target;
            document.querySelector(`.${target}-section`).classList.add('active');
        });
    });

    // Activate first tab on load
    if (navItems.length > 0) {
        navItems[0].click();
    }
});
</script>
@endsection
