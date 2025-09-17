@extends('theme.main')

@section('pagecss')
<link rel="stylesheet" href="{{ asset('theme/css/newstyle.css') }}" type="text/css" />
@endsection

@section('content')
<div class="flex flex-col min-h-screen">
    <!-- Hero Section -->
    <section class="hero-section">
        <video class="hero-video" autoplay loop muted playsinline poster="{{ asset('storage/banners/fallback-poster.jpg') }}">
            <source src="{{ asset('storage/banners/videoplayback.webm') }}" type="video/webm">
            <source src="{{ asset('storage/banners/videoplayback.mp4') }}" type="video/mp4">
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
                    <a href="{{-- route('hosting.cloud-packages') --}}" class="btn btn-primary">View Packages</a>
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
                    <a href="{{-- route('hosting.shared-packages') --}}" class="btn btn-primary">View Packages</a>
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
                        High-performance dedicated servers for resource-intensive applications. Enjoy full control, enhanced security, and premium FocusCare+ support.
                    </p>
                    <a href="{{-- route('hosting.dedicated-packages') --}}" class="btn btn-primary">View Packages</a>
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
                    <a href="{{-- route('hosting.baremetal-packages') --}}" class="btn btn-primary">View Packages</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Hosting Plans -->
    <section class="packages-section">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12 scroll-animate">
                <h2 class="section-title">Hosting Plans</h2>
                <p class="section-subtitle">
                    Choose from our tailored hosting plans, each designed to meet specific business needs and backed by FocusCare+ support for seamless performance.
                </p>
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
                        <a href="{{-- route('hosting.cloud-starter') --}}" class="btn btn-primary">Get Started</a>
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
                        <a href="{{-- route('hosting.shared-basic') --}}" class="btn btn-primary">Get Started</a>
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
                        <a href="{{-- route('hosting.dedicated-pro') --}}" class="btn btn-primary">Get Started</a>
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
                        <a href="{{-- route('hosting.baremetal-elite') --}}" class="btn btn-primary">Get Started</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Overview of FocusCare+ -->
    <section class="focuscare-section">
        <div class="focuscare-container">
            <div class="text-center mb-12 scroll-animate">
                <h2 class="section-title">Overview of FocusCare+</h2>
                <p class="section-subtitle">
                    Ensuring a Seamless Hosting Experience with FocusCare+
                </p>
            </div>

            <!-- Middle Row: 2 Cards -->
            <div class="focuscare-row middle scroll-animate">
                <!-- Introduction -->
                <div class="focuscare-card">
                    <div class="focuscare-icon">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                        </svg>
                    </div>
                    <h3 class="focuscare-title">Introduction to FocusCare+</h3>
                    <p class="focuscare-text">
                        When you invest in a hosting service, you’re not just looking for a place to store your website—you want reliability, security, and ongoing support. At WebFocus Solutions, Inc., we understand that maintaining a smooth online presence goes beyond the initial setup. That’s why we offer FocusCare+, a dedicated after-sales support service that ensures your hosting environment stays optimized, secure, and trouble-free.
                    </p>
                </div>

                <!-- What is FocusCare+? -->
                <div class="focuscare-card">
                    <div class="focuscare-icon">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"></path>
                        </svg>
                    </div>
                    <h3 class="focuscare-title">What is FocusCare+?</h3>
                    <p class="focuscare-text">
                        FocusCare+ isn’t just another IT service—it’s a built-in support system that comes with your WebFocus hosting package. Think of it as your website’s personal doctor, always ready to diagnose and fix any software or application-related issues that might arise. Whether it’s routine maintenance, troubleshooting, or preventive care, FocusCare+ ensures that your website runs at peak performance without extra costs.
                    </p>
                </div>
            </div>

            <!-- Bottom Row: 3 Cards -->
            <div class="focuscare-row bottom scroll-animate">
                <!-- Keeping IT Solutions in Top Condition -->
                <div class="focuscare-card">
                    <div class="focuscare-icon">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                    </div>
                    <h3 class="focuscare-title">FocusCare Plus | Keeping IT Solutions in Top Condition</h3>
                    <p class="focuscare-text">
                        WebFocus Solutions, Inc. does more than just host websites. We also provide personalized after-sales support with our FocusCare+ service. From website maintenance to troubleshooting, our skilled system administrators work to keep your hosting environment and availed IT Services secure and optimal at no additional cost.
                    </p>
                </div>

                <!-- Reliable and Cost-Effective IT Support -->
                <div class="focuscare-card">
                    <div class="focuscare-icon">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </div>
                    <h3 class="focuscare-title">Reliable and Cost-effective IT Support</h3>
                    <p class="focuscare-text">
                        FocusCare+ is a key component of our service, designed to help you administer your software and applications more easily. Instead of worrying about unanticipated technological issues, you can trust our experts to provide proactive solutions that save you time and money. We provide high-quality, continual support, guaranteeing that your online presence is stable and hassle-free.
                    </p>
                </div>

                <!-- Why After-Sales Support Matters -->
                <div class="focuscare-card">
                    <div class="focuscare-icon">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="focuscare-title">Why After-Sales Support Matters</h3>
                    <p class="focuscare-text">
                        Many businesses focus on choosing the right hosting provider but overlook the importance of ongoing support. Without a reliable after-sales service, minor technical issues can escalate into major disruptions, leading to downtime, security risks, and lost revenue. With FocusCare+, you don’t have to worry about these challenges. Our expert system administrators proactively monitor and address potential issues before they affect your business.
                    </p>
                </div>
            </div>
        </div>
    </section>

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
                    <div class="focuscare-icon">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                    </div>
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
                    <div class="focuscare-icon">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
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
                    <div class="focuscare-icon">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="focuscare-title">FocusCare+ – Premium After-Sales Support</h3>
                    <p class="focuscare-text">
                        With FocusCare+, WebFocus Solutions, Inc. offers more than just hosting—we provide peace of mind. This built-in after-sales support ensures your website stays secure, optimized, and running smoothly. From routine maintenance to troubleshooting and preventive care, FocusCare+ gives you expert IT assistance without the extra cost. Reliable hosting with continuous support? That’s the WebFocus promise.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="section-cta">
        <div class="cta-container scroll-animate">
            <div class="cta-content">
                <h2 class="text-3xl sm:text-4xl font-bold mb-4">Start Hosting with Confidence Today</h2>
                <p class="text-lg text-white/90 max-w-2xl mx-auto mb-6">
                    Launch your website with WebFocus Solutions, Inc. and enjoy reliable hosting backed by FocusCare+ support. Get started now!
                </p>
                <div class="cta-button-group">
                    <a href="#contact" class="btn btn-primary" onclick="console.log('Request a Quote clicked')">Get Started Now</a>
                    <a href="#services" class="btn btn-glass">Contact Us</a>
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

