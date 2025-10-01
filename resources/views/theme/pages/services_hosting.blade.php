
@extends('theme.main')

@section('pagecss')
<link rel="stylesheet" href="{{ asset('theme/css/newstyle.css') }}" type="text/css" />
<style>
    /* Hosting-Specific Styles */
    .hosting-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 2rem;
        margin: 2rem 1.5rem;
        padding: 0 1rem;
    }
    .hosting-card {
        background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);
        border-radius: 16px;
        padding: 2rem;
        text-align: center;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        border: 1px solid rgba(43, 86, 211, 0.1);
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        height: 100%;
    }
    .hosting-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 12px 40px rgba(0, 0, 0, 0.15);
    }
    .hosting-icon {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 3.5rem;
        height: 3.5rem;
        border-radius: 12px;
        background: linear-gradient(135deg, #2b56d3, #5b7ce8);
        color: white;
        margin-bottom: 1.5rem;
        transition: transform 0.3s ease;
    }
    .hosting-card:hover .hosting-icon {
        transform: scale(1.1);
    }
    .hosting-icon-secondary {
        background: linear-gradient(135deg, #ec4899, #ef4444);
    }
    .hosting-icon-accent {
        background: linear-gradient(135deg, #16a34a, #059669);
    }
    .hosting-icon-baremetal {
        background: linear-gradient(135deg, #6b7280, #4b5563);
    }
    .hosting-title {
        font-size: 1.5rem;
        font-weight: 700;
        color: #1f2937;
        margin-bottom: 1rem;
    }
    .hosting-description {
        font-size: 1rem;
        color: #6b7280;
        line-height: 1.6;
        margin-bottom: 1.5rem;
        flex-grow: 1;
    }

    .packages-section {
        padding: 2rem 0;
    }
    .plans-header {
        text-align: center;
        margin-bottom: 2rem;
    }
    .plans-header .rating {
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.25rem;
        color: #1f2937;
        margin-bottom: 0.5rem;
        gap: 0.5rem;
    }
    .plans-header .stars {
        display: flex;
        gap: 0.25rem;
    }
    .plans-header .stars svg {
        width: 1.5rem;
        height: 1.5rem;
        fill: #facc15; /* Gold color for stars */
    }
    .plans-header .plan-tabs {
        display: flex;
        justify-content: center;
        gap: 1rem;
        margin-top: 1rem;
    }
    .plans-header .plan-tabs a {
        padding: 0.5rem 1.5rem;
        background: #e5e7eb;
        border-radius: 9999px; /* Full oval shape */
        text-decoration: none;
        color: #1f2937;
        font-weight: 600;
        display: inline-block;
        transition: background 0.3s ease, color 0.3s ease;
    }
    .plans-header .plan-tabs a.active,
    .plans-header .plan-tabs a:hover {
        background: #2b56d3;
        color: white;
    }
    .plans-intro {
        margin-top: 1.5rem;
        padding: 1rem 1.5rem;
        background: rgba(255, 255, 255, 0.8);
        border-radius: 0.5rem;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }
    .packages-grid {
        display: grid;
        grid-template-columns: repeat(4, minmax(300px, 1fr));
        gap: 2rem;
        margin: 0 auto;
        max-width: 1300px;
        justify-content: center;
        padding: 0 1rem;
    }
    .package-card {
        background: white;
        border-radius: 16px;
        padding: 2rem;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        border: 1px solid rgba(43, 86, 211, 0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        height: 100%;
    }
    .package-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.12);
    }
    .package-header {
        display: flex;
        align-items: center;
        margin-bottom: 1.5rem;
    }
    .package-icon {
        width: 2.5rem;
        height: 2.5rem;
        border-radius: 8px;
        background: linear-gradient(135deg, #2b56d3, #5b7ce8);
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 1rem;
    }
    .package-icon-secondary {
        background: linear-gradient(135deg, #ec4899, #ef4444);
    }
    .package-icon-accent {
        background: linear-gradient(135deg, #16a34a, #059669);
    }
    .package-icon-baremetal {
        background: linear-gradient(135deg, #6b7280, #4b5563);
    }
    .package-title {
        font-size: 1.25rem;
        font-weight: 700;
        color: #1f2937;
    }
    .package-price {
        font-size: 1.5rem;
        font-weight: 800;
        color: #2b56d3;
        margin-bottom: 1rem;
    }
    .package-features {
        list-style: none;
        padding: 0;
        margin-bottom: 1.5rem;
        flex-grow: 1;
    }
    .package-features li {
        padding: 0.5rem 0;
        border-bottom: 1px solid #f3f4f6;
        color: #6b7280;
    }
    .package-features li:last-child {
        border-bottom: none;
    }
    .package-cta {
        width: 100%;
        text-align: center;
    }
    @media (max-width: 1279px) {
        .packages-grid {
            grid-template-columns: repeat(2, minmax(300px, 1fr));
        }
    }
    @media (max-width: 767px) {
        .packages-grid {
            grid-template-columns: 1fr;
        }
        .plans-header .plan-tabs a {
            padding: 0.5rem 1rem;
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
            <source src="{{ asset('images/videoplayback.mp4') }}" type="video/mp4">
            <picture>
                <source srcset="{{ asset('storage/banners/fallback-poster.webp') }}" type="image/webp">
                <img src="{{ asset('storage/banners/fallback-poster.jpg') }}" alt="WebFocus Solutions Hosting Banner" class="hero-video-fallback">
            </picture>
            Your browser does not support the video tag.
        </video>
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <h1 class="hero-title animate-slide-in-up">
                Reliable Hosting Solutions <span class="text-white">For Your Business</span>
            </h1>
            <p class="hero-subtitle animate-slide-in-up">
                Discover our range of hosting packages designed to meet your needs, from shared to dedicated servers, all backed by FocusCare+ for seamless support.
            </p>
        </div>
    </section>
    <!-- Hosting Overview -->
    <section class="section">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12 scroll-animate">
                <h2 class="section-title">Hosting Overview</h2>
                <p class="section-subtitle">
                    Explore our comprehensive hosting solutions, including cloud, shared, dedicated, and bare-metal options, all enhanced with FocusCare+ for optimal performance and support.
                </p>
            </div>
            <div class="hosting-grid scroll-animate">
                <!-- Cloud Hosting -->
                <div class="hosting-card">
                    <div class="hosting-icon">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999M8.5 10.5h8.5M12 15.5v5.5"></path>
                        </svg>
                    </div>
                    <h3 class="hosting-title">Cloud Hosting</h3>
                    <p class="hosting-description">
                        Scalable cloud hosting solutions for dynamic websites and applications. Benefit from high availability, automatic scaling, and robust performance with our cloud infrastructure.
                    </p>
                    <div class="package-cta">
                    <a href="{{-- route('hosting.cloud-packages') --}}" class="btns btn-primary1">View Packages</a>
                    </div>
                </div>
                <!-- Shared Hosting -->
                <div class="hosting-card">
                    <div class="hosting-icon hosting-icon-secondary">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10c0 2.21 3.79 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.79 4 8 4s8-1.79 8-4M4 7c0-2.21 3.79-4 8-4s8 1.79 8 4m0 5c0 2.21-3.79 4-8 4s-8-1.79-8-4"></path>
                        </svg>
                    </div>
                    <h3 class="hosting-title">Shared Hosting</h3>
                    <p class="hosting-description">
                        Affordable shared hosting for small to medium websites. Share resources with other users while enjoying reliable uptime, easy management tools, and FocusCare+ support.
                    </p>
                    <div class="package-cta">
                    <a href="{{-- route('hosting.shared-packages') --}}" class="btns btn-primary1">View Packages</a>
                    </div>
                </div>
                <!-- Dedicated Hosting -->
                <div class="hosting-card">
                    <div class="hosting-icon hosting-icon-accent">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2"></path>
                        </svg>
                    </div>
                    <h3 class="hosting-title">Dedicated Hosting</h3>
                    <p class="hosting-description">
                        <div class="package-cta">
                        High-performance dedicated servers for resource-intensive applications. Enjoy full control, enhanced security, and premium FocusCare+ support.
                        </div>
                    </p>
                    <div class="package-cta">
                    <a href="{{-- route('hosting.dedicated-packages') --}}" class="btns btn-primary1">View Packages</a>
                    </div>
                </div>
                <!-- Bare-Metal Hosting -->
                <div class="hosting-card">
                    <div class="hosting-icon hosting-icon-baremetal">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 19a2 2 0 01-2-2V7a2 2 0 012-2h4l2 2h4a2 2 0 012 2v1M5 19h14a2 2 0 002-2v-5a2 2 0 00-2-2H9a2 2 0 00-2 2v5a2 2 0 01-2 2z"></path>
                        </svg>
                    </div>
                    <h3 class="hosting-title">Bare-Metal Hosting</h3>
                    <p class="hosting-description">
                        Fully customizable bare-metal servers for maximum performance and flexibility. Ideal for businesses requiring dedicated hardware and tailored configurations.
                    </p>
                    <div class="package-cta">
                    <a href="{{-- route('hosting.baremetal-packages') --}}" class="btns btn-primary1">View Packages</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hosting Plans with Enhanced Introduction, Rating, and Oval Tabs -->
    <section class="packages-section">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12 scroll-animate">
                <h2 class="section-title">Hosting Plans</h2>
                <!-- Enhanced Introduction/Highlight -->
                    <div class="flex items-center justify-center gap-3 mb-2">
                        <h3 class="text-lg font-semibold text-gray-800">Why Choose Our Hosting Plans?</h3>
                    </div>
                    <p class="section-subtitle">
                        Our hosting plans offer unbeatable performance, scalability, and security, with features like 99.9% uptime, free SSL certificates, and 24/7 expert support through FocusCare+. Whether you're launching a small blog or a large e-commerce site, we have the perfect solution for you.
                    </p>

                <!-- Enhanced Customer Rating and Oval Plan Tabs -->
                <div class="plans-header scroll-animate">
                    <div class="rating">
                        <span class="rating-score">4.8/5</span>
                        <div class="stars">
                            <svg viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
                            <svg viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
                            <svg viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
                            <svg viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
                            <svg viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
                        </div>
                        <span class="rating-reviews">(1,237 Reviews)</span>
                    </div>
                    <div class="plan-tabs">
                        <a href="#" class="active">Monthly Plans</a>
                        <a href="#">Yearly Plans</a>
                    </div>
                </div>
            </div>
            <div class="packages-grid scroll-animate">
                <!-- Cloud Hosting Package -->
                <div class="package-card">
                    <div class="package-header">
                        <div class="package-icon">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999M8.5 10.5h8.5M12 15.5v5.5"></path>
                            </svg>
                        </div>
                        <h3 class="package-title">Cloud Starter</h3>
                    </div>
                    <div class="package-price">$9.99/mo</div>
                    <ul class="package-features">
                        <li>2 CPU Cores</li>
                        <li>4GB RAM</li>
                        <li>100GB SSD Storage</li>
                        <li>1TB Bandwidth</li>
                        <li>FocusCare+ Support</li>
                    </ul>
                    <div class="package-cta">
                        <a href="{{-- route('hosting.cloud-starter') --}}" class="btns btn-primary1">Get Started</a>
                    </div>
                </div>
                <!-- Shared Hosting Package -->
                <div class="package-card">
                    <div class="package-header">
                        <div class="package-icon package-icon-secondary">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10c0 2.21 3.79 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.79 4 8 4s8-1.79 8-4M4 7c0-2.21 3.79-4 8-4s8 1.79 8 4m0 5c0 2.21-3.79 4-8 4s-8-1.79-8-4"></path>
                            </svg>
                        </div>
                        <h3 class="package-title">Shared Basic</h3>
                    </div>
                    <div class="package-price">$4.99/mo</div>
                    <ul class="package-features">
                        <li>1 Website</li>
                        <li>10GB SSD Storage</li>
                        <li>100GB Bandwidth</li>
                        <li>Free SSL Certificate</li>
                        <li>FocusCare+ Support</li>
                    </ul>
                    <div class="package-cta">
                        <a href="{{-- route('hosting.shared-basic') --}}" class="btns btn-primary1">Get Started</a>
                    </div>
                </div>
                <!-- Dedicated Hosting Package -->
                <div class="package-card">
                    <div class="package-header">
                        <div class="package-icon package-icon-accent">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2"></path>
                            </svg>
                        </div>
                        <h3 class="package-title">Dedicated Pro</h3>
                    </div>
                    <div class="package-price">$49.99/mo</div>
                    <ul class="package-features">
                        <li>4 CPU Cores</li>
                        <li>16GB RAM</li>
                        <li>500GB SSD Storage</li>
                        <li>5TB Bandwidth</li>
                        <li>FocusCare+ Support</li>
                    </ul>
                    <div class="package-cta">
                        <a href="{{-- route('hosting.dedicated-pro') --}}" class="btns btn-primary1">Get Started</a>
                    </div>
                </div>
                <!-- Bare-Metal Hosting Package -->
                <div class="package-card">
                    <div class="package-header">
                        <div class="package-icon package-icon-baremetal">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 19a2 2 0 01-2-2V7a2 2 0 012-2h4l2 2h4a2 2 0 012 2v1M5 19h14a2 2 0 002-2v-5a2 2 0 00-2-2H9a2 2 0 00-2 2v5a2 2 0 01-2 2z"></path>
                            </svg>
                        </div>
                        <h3 class="package-title">Bare-Metal Elite</h3>
                    </div>
                    <div class="package-price">$99.99/mo</div>
                    <ul class="package-features">
                        <li>8 CPU Cores</li>
                        <li>32GB RAM</li>
                        <li>1TB SSD Storage</li>
                        <li>10TB Bandwidth</li>
                        <li>FocusCare+ Support</li>
                    </ul>
                    <div class="package-cta">
                        <a href="{{-- route('hosting.baremetal-elite') --}}" class="btns btn-primary1">Get Started</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Overview of FocusCare+ -->
    <section class="focuscare-section">
            <div class="container-standard">
                <div class="text-center mb-12 scroll-animate animate">
                    <h2 class="section-title">Overview of FocusCare+</h2>
                    <p class="section-subtitle">
                        Ensuring a Seamless Hosting Experience with FocusCare+
                    </p>
                </div>

                <!-- Middle Row: 2 Cards -->
                <div class="scroll-animate d-flex flex-row justify-content-between gap-2 animate">
                    <!-- Introduction -->
                    <div class="focuscare-card col">
                        <h3 class="focuscare-title mb-4">Introduction to FocusCare+</h3>
                        <p class="focuscare-text">
                            When you invest in a hosting service, you’re not just looking for a place to store your website—you want reliability, security, and ongoing support. At WebFocus Solutions, Inc., we understand that maintaining a smooth online presence goes beyond the initial setup. That’s why we offer FocusCare+, a dedicated after-sales support service that ensures your hosting environment stays optimized, secure, and trouble-free.
                        </p>
                    </div>

                    <!-- What is FocusCare+? -->
                    <div class="focuscare-card col">
                        <h3 class="focuscare-title mb-4">What is FocusCare+?</h3>
                        <p class="focuscare-text">
                            FocusCare+ isn’t just another IT service—it’s a built-in support system that comes with your WebFocus hosting package. Think of it as your website’s personal doctor, always ready to diagnose and fix any software or application-related issues that might arise. Whether it’s routine maintenance, troubleshooting, or preventive care, FocusCare+ ensures that your website runs at peak performance without extra costs.
                        </p>
                    </div>

                    <!-- Keeping IT Solutions in Top Condition -->
                    <div class="focuscare-card col">
                        <h3 class="focuscare-title mb-4">FocusCare Plus | Keeping IT Solutions in Top Condition</h3>
                        <p class="focuscare-text">
                            WebFocus Solutions, Inc. does more than just host websites. We also provide personalized after-sales support with our FocusCare+ service. From website maintenance to troubleshooting, our skilled system administrators work to keep your hosting environment and availed IT Services secure and optimal at no additional cost.
                        </p>
                    </div>

                    <!-- Reliable and Cost-Effective IT Support -->
                    <div class="focuscare-card col">
                        <h3 class="focuscare-title mb-4">Reliable and Cost-effective IT Support</h3>
                        <p class="focuscare-text">
                            FocusCare+ is a key component of our service, designed to help you administer your software and applications more easily. Instead of worrying about unanticipated technological issues, you can trust our experts to provide proactive solutions that save you time and money. We provide high-quality, continual support, guaranteeing that your online presence is stable and hassle-free.
                        </p>
                    </div>

                    <!-- Why After-Sales Support Matters -->
                    <div class="focuscare-card col">
                        <h3 class="focuscare-title mb-4">Why After-Sales Support Matters</h3>
                        <p class="focuscare-text">
                            Many businesses focus on choosing the right hosting provider but overlook the importance of ongoing support. Without a reliable after-sales service, minor technical issues can escalate into major disruptions, leading to downtime, security risks, and lost revenue. With FocusCare+, you don’t have to worry about these challenges. Our expert system administrators proactively monitor and address potential issues before they affect your business.
                        </p>
                    </div>
                </div>
            </div>
        </section>

    {{-- <section class="section">
        <div class="core-values-container">
            <div class="text-center mb-12 scroll-animate">
                <h2 class="section-title">Overview of FocusCare+</h2>
                <p class="section-subtitle">
                    Ensuring a Seamless Hosting Experience with FocusCare+
                </p>
            </div>
            <!-- Middle Row: 2 Cards -->
            <div class="core-values-grid">
                <div class="core-value-card scroll-animate stagger-1">
                    <div class="core-value">

                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"></path>

                    </div>
                    <h3 class="text-lg font-bold text-gray-800 mb-2">Introduction to FocusCare+</h3>
                    <p class="text-gray-600 text-justify">When you invest in a hosting service, you’re not just looking for a place to store your website—you want reliability, security, and ongoing support. At WebFocus Solutions, Inc., we understand that maintaining a smooth online presence goes beyond the initial setup. That’s why we offer FocusCare+, a dedicated after-sales support service that ensures your hosting environment stays optimized, secure, and trouble-free.</p>
                </div>

                <div class="core-value-card scroll-animate stagger-2">
                    <div class="core-value">

                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>

                    </div>
                    <h3 class="text-lg font-bold text-gray-800 mb-2">What is FocusCare+?</h3>
                    <p class="text-gray-600">FocusCare+ isn’t just another IT service—it’s a built-in support system that comes with your WebFocus hosting package. Think of it as your website’s personal doctor, always ready to diagnose and fix any software or application-related issues that might arise. Whether it’s routine maintenance, troubleshooting, or preventive care, FocusCare+ ensures that your website runs at peak performance without extra costs.</p>
                </div>

                <div class="core-value-card scroll-animate stagger-3">
                    <div class="core-value">

                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>

                    </div>
                    <h3 class="text-lg font-bold text-gray-800 mb-2">FocusCare Plus | Keeping IT Solutions in Top Condition</h3>
                    <p class="text-gray-600">WebFocus Solutions, Inc. does more than just host websites. We also provide personalized after-sales support with our FocusCare+ service. From website maintenance to troubleshooting, our skilled system administrators work to keep your hosting environment and availed IT Services secure and optimal at no additional cost.</p>
                </div>

                <div class="core-value-card scroll-animate stagger-4">
                    <div class="core-value">

                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>

                    </div>
                    <h3 class="text-lg font-bold text-gray-800 mb-2">Reliable and Cost-effective IT Support</h3>
                    <p class="text-gray-600">FocusCare+ is a key component of our service, designed to help you administer your software and applications more easily. Instead of worrying about unanticipated technological issues, you can trust our experts to provide proactive solutions that save you time and money. We provide high-quality, continual support, guaranteeing that your online presence is stable and hassle-free.</p>
                </div>

                <div class="core-value-card scroll-animate stagger-5">
                    <div class="core-value">

                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>

                    </div>
                    <h3 class="text-lg font-bold text-gray-800 mb-2">Why After-Sales Support Matters</h3>
                    <p class="text-gray-600">Many businesses focus on choosing the right hosting provider but overlook the importance of ongoing support. Without a reliable after-sales service, minor technical issues can escalate into major disruptions, leading to downtime, security risks, and lost revenue. With FocusCare+, you don’t have to worry about these challenges. Our expert system administrators proactively monitor and address potential issues before they affect your business.</p>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- FocusCare+ Services -->
    <section class="focuscare-section">
        <div class="focuscare-container">
            <div class="text-center mb-12 scroll-animate">
                <h2 class="section-title">FocusCare+ Services</h2>
                <p class="section-subtitle">
                    Reliable After-Sales Support for Your Peace of Mind
                </p>
            </div>
            <div class="focuscare-grid scroll-animate">
                <!-- Benefits -->
                <div class="focuscare-card">
                    <h3 class="focuscare-title">Benefits of FocusCare+ After-Sales Support</h3>
                    <ul class="focuscare-list">
                        <li>24/7 System Monitoring: Continuous checks to ensure your hosting environment remains stable and secure.</li>
                        <li>Expert Troubleshooting: Quick resolution of software or application-related issues to prevent downtime.</li>
                        <li>Preventive Maintenance: Regular updates and optimizations to keep your website running smoothly.</li>
                        <li>Cost Savings: No need to hire a dedicated IT team—our support is already included in your hosting plan.</li>
                    </ul>
                </div>
                <!-- Experience Hassle-Free Hosting -->
                <div class="focuscare-card">
                    <h3 class="focuscare-title">Experience Hassle-Free Hosting with WebFocus</h3>
                    <p class="focuscare-text">
                        With FocusCare+, you’re not just getting a hosting service—you’re getting a complete IT support system dedicated to your business’s success. Say goodbye to technical headaches and focus on what truly matters—growing your business.
                    </p>
                    <p class="focuscare-text">
                        Looking for reliable hosting with top-notch after-sales support? WebFocus Solutions, Inc. has got you covered.
                    </p>
                </div>
            </div>
        </div>
    </section>
    <!-- FocusCare+ Premium Support -->
    <section class="focuscare-section">
        <div class="focuscare-container">
            <div class="text-center mb-12 scroll-animate">
                <h2 class="section-title">FocusCare+ – Premium Support</h2>
                <p class="section-subtitle">
                    Comprehensive After-Sales Support Included in Your Plan
                </p>
            </div>
            <div class="focuscare-grid scroll-animate">
                <div class="focuscare-card">
                    <h3 class="focuscare-title">FocusCare+ – Premium After-Sales Support</h3>
                    <p class="focuscare-text">
                        With FocusCare+, WebFocus Solutions, Inc. offers more than just hosting—we provide peace of mind. This built-in after-sales support ensures your website stays secure, optimized, and running smoothly. From routine maintenance to troubleshooting and preventive care, FocusCare+ gives you expert IT assistance without the extra cost. Reliable hosting with continuous support? That’s the WebFocus promise.
                    </p>
                </div>
            </div>
        </div>
    </section>
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
