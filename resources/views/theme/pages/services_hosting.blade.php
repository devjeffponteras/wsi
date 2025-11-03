
@extends('theme.main')

@section('pagecss')
<link rel="stylesheet" href="{{ asset('theme/css/newstyle.css') }}" type="text/css" />
<style>

    .text-center.mb-12 h2 {
    margin: 0;
    line-height: 1.3;
    }

    .text-center.mb-12 h2 + h2 {
    margin-top: 0.5rem;
    }

    .text-center.mb-12 {
    margin-bottom: 2rem;
    }

    .focuscare-overlay {
    position: absolute;
    top: 260px;
    left: 50px;
    width: 100%;
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: left;
    align-items: left;
    text-align: left;
    }

    .focuscare-text_bg {
    font-size: 1.7rem;
    font-weight: 550;
    line-height: 1.2;
    color: #222;
    margin: 2px 0;
    }
    .focuscare-text_hover {
    font-size: 1.3rem;
    font-weight: 450;
    line-height: 1.2;
    color: #222;
    margin: 2px 0;
    }
    .focuscare-text_best {
    font-size: 1.2rem;
    font-weight: 400;
    line-height: 1.5;
    color: #222;
    margin: 4px 0;
    }

  .highlight {
        display: inline-block;
        background: linear-gradient(90deg, #facc15);
        color: #000000ff;
        font-size: 1.8rem;
        padding: 6px 14px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        margin-bottom: 8px;
        font-weight: 600;
  }

    .focuscare-section {
    padding: 60px 0;
    }

    .focuscare-img {
        width: 100%;
        height: auto;
        opacity: 0.3;
        object-fit: cover;
        border-radius: 12px;
        transition: opacity 0.3s ease, transform 0.3s ease;
    }

   .focuscare {
    font-size: 4rem;
    font-weight: 800;
    margin-bottom: 0.1rem;
    line-height: 1.1;
    color: #086fddff;
    }
        .focuscare-subs {
        font-size: 1.2rem;
        color: #555;
        margin-top: 0;
        line-height: 1.2;
    }
    .hosting-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 2rem;
        margin: 2rem 1.5rem;
        padding: 0 1rem;
    }

    .hosting-grid_fc {
        display: flex;
        justify-content: center;
        align-items: stretch;
        flex-wrap: wrap;
        gap: 7rem;
        text-align: center;
        margin-top: 2rem;
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

    .hosting-card_fc {
    background: #f9fafb;
    border-radius: 1rem;
    border: 1px solid #e5e7eb;
    padding: 2rem;
    text-align: center;
    box-shadow: 0 4px 8px rgba(0,0,0,0.05);
    display: flex;
    align-items: center;
    justify-content: center;
    height: 350px;
    width:300px;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .hosting-card_fc:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 16px rgba(0,0,0,0.1);
    border-color: #3b82f6;
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
        gap: 0;
        margin-top: 1rem;
        position: relative;
        background: #e5e7eb;
        border-radius: 50px;
        padding: 4px;
        width: fit-content;
        margin-left: auto;
        margin-right: auto;
    }
    .plans-header .plan-tabs::before {
        content: '';
        position: absolute;
        top: 4px;
        left: 4px;
        width: calc(50% - 4px);
        height: calc(100% - 8px);
        background: #2b56d3;
        border-radius: 46px;
        transition: transform 0.3s ease;
        z-index: 1;
    }
    .plans-header .plan-tabs.yearly::before {
        transform: translateX(100%);
    }
    .plans-header .plan-tabs a {
        padding: 0.75rem 2rem;
        background: transparent;
        border-radius: 46px;
        text-decoration: none;
        color: #6b7280;
        font-weight: 600;
        display: inline-block;
        transition: color 0.3s ease;
        position: relative;
        z-index: 2;
        min-width: 120px;
        text-align: center;
    }
    .plans-header .plan-tabs a.active {
        color: white;
    }
    .plans-header .plan-tabs a:hover {
        color: #2b56d3;
    }
    .plans-header .plan-tabs a.active:hover {
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
        font-size: 2.3rem;
        font-weight: 800;
        color: #2b56d3;
        margin-bottom: 1rem;
    }
    #package_price{
         margin-bottom:14rem;
    }
    .package-features {
        list-style: none;
        padding: 0;
        margin-bottom: 1.5rem;
        flex-grow: 1;
        text-align: center;
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
        .package-save {
        display: inline-block;
        background: linear-gradient(90deg, #facc15, #f97316);
        color: #ffffffff;
        font-weight: bold;
        font-size: 0.9rem;
        padding: 6px 14px;
        border-radius: 20px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        margin-bottom: 8px;
    }

    /* SRP Highlighting Styles */
    .srp-highlight {
        background: linear-gradient(135deg, #fee2e2, #fecaca) !important;
        border: 2px solid #f87171 !important;
        border-radius: 12px;
        padding: 12px;
        margin-bottom: 12px;
        position: relative;
        box-shadow: 0 4px 12px rgba(248, 113, 113, 0.2);
        animation: srpPulse 2s infinite;
    }

    .srp-highlight::before {
        content: "💰";
        position: absolute;
        top: -8px;
        right: -8px;
        font-size: 1.2rem;
        background: #ef4444;
        border-radius: 50%;
        width: 24px;
        height: 24px;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
    }

    @keyframes srpPulse {
        0%, 100% {
            box-shadow: 0 4px 12px rgba(248, 113, 113, 0.2);
        }
        50% {
            box-shadow: 0 6px 16px rgba(248, 113, 113, 0.4);
        }
    }

    .srp-highlight .text-red-700 {
        color: #b91c1c !important;
        font-weight: 800;
        font-size: 1.1rem;
    }

    .srp-highlight .text-red-600 {
        color: #dc2626 !important;
        font-weight: 700;
        letter-spacing: 0.05em;
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

    /* Compact pricing card style for hosting packages */
    .pricing-compact {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 0.5rem;
        padding: 1rem 1.25rem;
    }

    .pricing-header {
        width: 100%;
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 0.5rem;
    }

    .save-badge {
        background: linear-gradient(90deg,#facc15,#f59e0b);
        color: #08203a;
        font-weight: 700;
        padding: 6px 10px;
        border-radius: 6px;
        font-size: 0.85rem;
        box-shadow: 0 2px 6px rgba(0,0,0,0.12);
        display: inline-block;
    }

    .srp-text {
        font-size: 0.95rem;
        color: #1f2937;
        font-weight: 600;
    }

    .price-large {
        font-family: 'Georgia', serif;
        font-size: 3.5rem;
        color: #08306a;
        font-weight: 800;
        letter-spacing: 0.02em;
        margin: 0.25rem 0 0.75rem;
        line-height: 0.9;
    }

    .inquire-cta {
        background: linear-gradient(180deg,#2b56d3,#1f4fd1);
        color: #fff;
        padding: 8px 22px;
        border-radius: 6px;
        text-decoration: none;
        display: inline-block;
        box-shadow: 0 4px 10px rgba(43,86,211,0.25);
        font-weight: 700;
    }

    @media (max-width: 480px) {
        .price-large { font-size: 2.6rem; }
        .pricing-header { gap: 0.4rem; }
    }

    /* Prevent CTA decorative images from creating horizontal overflow */
    .section-cta { overflow: hidden; }
    .section-cta .hero-decor { max-width: 770px; width: 42%; height: auto; bottom: 0; }
    @media (max-width: 768px) {
        .section-cta .hero-decor { display: none !important; }
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
   {{-- {!! $content->contents !!} --}}

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
                    <a href="{{ route('contact-us') }}" class="btns btn-primary1">Inquire Now</a>
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
                    <a href="{{ route('contact-us') }}" class="btns btn-primary1">Inquire Now</a>
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
                    <a href="{{ route('contact-us') }}" class="btns btn-primary1">Inquire Now</a>
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
                    <a href="{{ route('contact-us') }}" class="btns btn-primary1">Inquire Now</a>
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
                    <div class="plan-tabs" id="planToggle">
                        <a href="#" class="active" data-plan="monthly">1 Year Plan</a>
                        <a href="#" data-plan="yearly">2 Years Plan</a>
                    </div>
                </div>
            </div>
            <div class="packages-grid scroll-animate">
                <div class="package-card">
                    <div class="package-header">
                    </div>

                    <div id="package_price" class="package-price"></div>
                    <ul class="package-features">
                        <li>Allocated Storage</li>
                        <li>Monthly Allocated Data Cap</li>
                        <li></li>
                        <li>E-mail Accounts</li>
                        <li></li>
                        <li>E-mail Accounts</li>
                        <li></li>
                        <li>Mailing Lists</li>
                        <li></li>
                        <li>Domains</li><br><br>
                        <li>Control Panel</li>
                        <li>Live Statistics</li>
                        <li>MySQL Database</li>
                        <li>Back-up Fee</li>
                        <li>Set-up Fee</li>
                        <li>Technical Support</li>
                        <li>FocusCare+</li>
                    </ul>
                    <div class="package-cta">

                    </div>
                </div>
                <!-- Standard Package -->
                <div class="package-card" data-package="standard">
                    <p class="package-title">STANDARD PACKAGE</p>
                    <div class="pricing-details">
                    <div class="pricing-compact">
                        <div class="pricing-header">
                            <div class="save-badge">SAVE 10%</div>
                            <div class="srp-text">SRP: <span class="srp-amount">₱8,520</span></div>
                        </div>

                        <div class="price-large">₱7,668</div>

                        <a href="{{ route('contact-us') }}" class="inquire-cta">INQUIRE NOW</a>

                    </div>
                    </div>
                    <ul class="package-features">
                        <li>6 GB</li>
                        <li>50 GB</li>
                        <li>Multiple accounts Subject to the storage capacity</li>
                        <li>Multiple accounts Subject to the storage capacity</li>
                        <li>Free</li>
                        <li>1 hosted Domain with Multiple Sub-domains and Domain Aliases subject to storage capacity</li>
                        <li>Free</li>
                        <li>Free</li>
                        <li>Free</li>
                        <li>Free</li>
                        <li>Free</li>
                        <li>24/7 Technical Support</li>
                        <li>Free</li>
                    </ul>
                </div>
                <!-- Deluxe Package -->
                <div class="package-card" data-package="deluxe">
                    <p class="package-title">DELUXE PACKAGE</p>
                    <div class="pricing-compact">
                        <div class="pricing-header">
                            <div class="save-badge">SAVE 10%</div>
                            <div class="srp-text">SRP: <span class="srp-amount">₱15,000</span></div>
                        </div>

                        <div class="price-large">₱13,500</div>

                        <a href="{{ route('contact-us') }}" class="inquire-cta">INQUIRE NOW</a>

                    </div>
                    <ul class="package-features">
                        <li>9 GB</li>
                        <li>100 GB</li>
                        <li>Multiple accounts Subject to the storage capacity</li>
                        <li>Multiple accounts Subject to the storage capacity</li>
                        <li>Free</li>
                        <li>1 hosted Domain with Multiple Sub-domains and Domain Aliases subject to storage capacity</li>
                        <li>Free</li>
                        <li>Free</li>
                        <li>Free</li>
                        <li>Free</li>
                        <li>Free</li>
                        <li>24/7 Technical Support</li>
                        <li>Free</li>
                    </ul>
                </div>
                <!-- Business Package -->
                <div class="package-card" data-package="business">
                    <p class="package-title">BUSINESS PACKAGE</p>
                    <div class="pricing-compact">
                        <div class="pricing-header">
                            <div class="save-badge">SAVE 10%</div>
                            <div class="srp-text">SRP: <span class="srp-amount">₱24,120</span></div>
                        </div>

                        <div class="price-large">₱21,708</div>

                        <a href="{{ route('contact-us') }}" class="inquire-cta">INQUIRE NOW</a>

                    </div>
                    <ul class="package-features">
                        <li>12 GB</li>
                        <li>150 GB</li>
                        <li>Multiple accounts Subject to the storage capacity</li>
                        <li>Multiple accounts Subject to the storage capacity</li>
                        <li>Free</li>
                         <li>1 hosted Domain with Multiple Sub-domains and Domain Aliases subject to storage capacity</li>
                        <li>Free</li>
                        <li>Free</li>
                        <li>Free</li>
                        <li>Free</li>
                        <li>24/7 Technical Support</li>
                        <li>Free</li>
                    </ul>
                </div>
                <!-- Bare-Metal Hosting Package -->

            </div>
        </div>
    </section>

    <!-- Overview of FocusCare+ -->
    <section class="focuscare-section">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-lg-8 p-0">
        <img src="{{ asset('images/focuscare.jpg') }}" class="focuscare-img w-full h-auto rounded-lg">
        <div class="focuscare-overlay d-flex flex-column">
        <p class="focuscare-text_hover">When you choose a hosting service, you need more than just storage.</p>
        <p style="margin-bottom: 120px;" class="focuscare-text_hover">You Need reliability, security, and support.</p>

        <p class="focuscare-text_bg">
        That's why we offer <span class="highlight">FocusCare+</span>, our after-sales service
        </p>
        <p class="focuscare-text_bg">
        that keeps your hosting environment optimized, secured,
        </p>
        <p class="focuscare-text_bg">
        and constantly reliable.
        </p>
        </div>
                </div>
                <div class="col-lg-4  p-5">
                    <h1 class="focuscare">FocusCare+</h1>
                    <p class="focuscare-subs">Seamless Support for Your Hosting Needs</p>
                </div>
            </div>
        </div>
        </section>

        <section style="padding: 0.5rem 0;" class="section">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12 scroll-animate">
                <h4 class="section-title">Built-In Expertise That Keeps Your Website Running Smoothly.</h4>

            </div>
            <div class="hosting-grid_fc scroll-animate">
            <!-- Cloud Hosting -->
            <div class="hosting-card_fc">
                <p class="focuscare-text_best">
                    Included with your WebFocus hosting plan, FocusCare+ acts as your website’s personal support team. We keep it secure, optimized, and performing at its best, all at no extra cost.
                </p>
            </div>

            <!-- Shared Hosting -->
            <div class="hosting-card_fc">
                <p class="focuscare-text_best">
                   Our expert team delivers proactive solutions that keep your systems secure, your software running smoothly, and your business uninterrupted. Save time, and stay confident knowing your online presence is always in good hands.
                </p>

            </div>

            <!-- Dedicated Hosting -->
            <div class="hosting-card_fc">
                <p class="focuscare-text_best">
                   FocusCare+ simplifies the way you manage your software and applications. Our experts handle maintenance, troubleshooting, and optimization to keep your systems secure and performing at their best — at no extra cost
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

    <section style="padding: 1rem 0;" class="section">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-8 scroll-animate">
        <h2 class="mb-2 leading-tight"> Reliable hosting meets personalized support. That’s <span class="highlight">FocusCare+</span> by WebFocus Solutions, Inc.</h2>
        <h2 class="leading-tight"> Get started with worry-free hosting!</h2>
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
    <img class="position-absolute hero-decor" src="{{ asset('images/hero.svg') }}" style="transform: rotateY(180deg); left: 10%;">
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

    // Comprehensive pricing data based on your table
    const pricingData = {
        monthly: {
            standard: {
                price: '₱639',
                srp: '₱8,520',
                total: '₱7,668',
                discounted: '₱7,668',
                discount: '10%',
                duration: '1 year',
                period: '1 year subscription',
                savings: '₱852',
                description: 'You save ₱852 compared to SRP!'
            },
            deluxe: {
                price: '₱1,125',
                srp: '₱15,000',
                total: '₱13,500',
                discounted: '₱13,500',
                discount: '10%',
                duration: '1 year',
                period: '1 year subscription',
                savings: '₱1,500',
                description: 'You save ₱1,500 compared to SRP!'
            },
            business: {
                price: '₱1,809',
                srp: '₱24,120',
                total: '₱21,708',
                discounted: '₱21,708',
                discount: '10%',
                duration: '1 year',
                period: '1 year subscription',
                savings: '₱2,412',
                description: 'You save ₱2,412 compared to SRP!'
            }
        },
        yearly: {
            standard: {
                price: '₱497',
                srp: '₱17,040',
                total: '₱11,928',
                discounted: '₱11,928',
                discount: '30%',
                duration: '2 years',
                period: '2 year subscription',
                savings: '₱5,112',
                description: 'You save ₱5,112 compared to SRP!'
            },
            deluxe: {
                price: '₱875',
                srp: '₱30,000',
                total: '₱21,000',
                discounted: '₱21,000',
                discount: '30%',
                duration: '2 years',
                period: '2 year subscription',
                savings: '₱9,000',
                description: 'You save ₱9,000 compared to SRP!'
            },
            business: {
                price: '₱1,407',
                srp: '₱48,240',
                total: '₱33,768',
                discounted: '₱33,768',
                discount: '30%',
                duration: '2 years',
                period: '2 year subscription',
                savings: '₱14,472',
                description: 'You save ₱14,472 compared to SRP!'
            }
        }
    };    // Plan toggle functionality
    const planToggle = document.getElementById('planToggle');
    const monthlyTab = planToggle.querySelector('[data-plan="monthly"]');
    const yearlyTab = planToggle.querySelector('[data-plan="yearly"]');

    function updatePricing(planType) {
        const packages = document.querySelectorAll('.package-card[data-package]');

        packages.forEach(packageCard => {
            const packageName = packageCard.getAttribute('data-package');
            const data = pricingData[planType][packageName];

            if (data) {
                // Update monthly price
                const priceElement = packageCard.querySelector('.price-amount');
                if (priceElement) {
                    priceElement.textContent = data.price;
                }

                // Update SRP (original price)
                const srpElement = packageCard.querySelector('.srp-amount');
                if (srpElement) {
                    srpElement.textContent = data.srp;
                }

                // Update discounted amount
                const discountedElement = packageCard.querySelector('.discounted-amount');
                if (discountedElement) {
                    discountedElement.textContent = data.discounted;
                }

                // Update discount percentage
                const discountElement = packageCard.querySelector('.discount-text');
                if (discountElement) {
                    discountElement.textContent = `SAVE ${data.discount}`;
                }

                // Update subscription period
                const periodElement = packageCard.querySelector('.period-text');
                if (periodElement) {
                    periodElement.textContent = data.period;
                }

                // Update total cost
                const totalElement = packageCard.querySelector('.total-amount');
                if (totalElement) {
                    totalElement.textContent = data.total;
                }

                // Update savings description
                const descriptionElement = packageCard.querySelector('.subscription-text');
                if (descriptionElement) {
                    descriptionElement.textContent = data.description;
                }
            }
        });
    }    function switchToMonthly() {
        planToggle.classList.remove('yearly');
        monthlyTab.classList.add('active');
        yearlyTab.classList.remove('active');
        updatePricing('monthly');
    }

    function switchToYearly() {
        planToggle.classList.add('yearly');
        yearlyTab.classList.add('active');
        monthlyTab.classList.remove('active');
        updatePricing('yearly');
    }

    monthlyTab.addEventListener('click', function(e) {
        e.preventDefault();
        if (!this.classList.contains('active')) {
            switchToMonthly();
        }
    });

    yearlyTab.addEventListener('click', function(e) {
        e.preventDefault();
        if (!this.classList.contains('active')) {
            switchToYearly();
        }
    });

    // Initialize with yearly pricing (default)
    updatePricing('yearly');
});
</script>
@endsection
