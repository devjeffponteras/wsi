
@extends('theme.main')

@section('pagecss')
<link rel="stylesheet" href="{{ asset('theme/css/newstyle.css') }}" type="text/css" />
@endsection

@section('content')
<div class="flex flex-col min-h-screen">
    <!-- Hero Section -->
    <section class="hero-section">
        <video class="hero-video" autoplay loop muted playsinline>
<source src="{{ asset('images/videoplayback.mp4') }}" type="video/mp4">            Your browser does not support the video tag.
        </video>
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <h1 class="hero-title animate-slide-in-up">
                Tailored Web Solutions <span class="text-white">for Your Success</span>
            </h1>
            <p class="hero-subtitle animate-slide-in-up">
                WebFocus Solutions, Inc. crafts fast-loading, responsive, and SEO-ready websites that drive measurable results for your business.
            </p>
            <a href="#contact" class="btn btn-primary animate-slide-in-up" onclick="console.log('Request a Quote clicked')">Request a Quote</a>
        </div>
    </section>

    <!-- Overview Section -->
    <section class="section">
        <div class="container mx-auto px-6">
            <div class="text-center mb-12 scroll-animate">
                <h2 class="section-title">Why Choose WebFocus for Web Development</h2>
                <p class="section-subtitle">
                    With over 1,600 satisfied clients, we deliver tailored web solutions that combine stunning design with seamless functionality.
                </p>
            </div>
            <div class="grid md:grid-cols-2 gap-12 scroll-animate">
                <div class="stagger-1">
                    <h3 class="text-2xl font-semibold text-gray-800 mb-4">Our Expertise</h3>
                    <p class="text-gray-600 mb-4">
                        WebFocus Solutions, Inc. offers tailored web design solutions that meet technical needs and generate measurable returns for clients. Our team of web designers and programmers ensures functional, user-friendly, and visually appealing websites.
                    </p>
                    <p class="text-gray-600">
                        We strive to create fast-loading, one-of-a-kind, and responsive websites, recognizing every company’s uniqueness. Our production team, including web developers and database programmers, delivers stunning graphics and easy navigation to satisfy customers.
                    </p>
                </div>
                <div class="stagger-2">
                    <img src="/storage/images/webdev.jpg" alt="Web Development Illustration" class="feature-image">
                    <p class="text-gray-600 text-center">
                        Over 1,600 clients trust us to showcase their brand’s talent through innovative web solutions.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Benefits Section -->
    <section class="section" style="background: linear-gradient(135deg, #f0f9ff, #ffffff);">
        <div class="container mx-auto px-6">
            <div class="text-center mb-12 scroll-animate">
                <h2 class="section-title">Benefits of Our Web Development Services</h2>
                <p class="section-subtitle">
                    Discover why businesses choose WebFocus for websites that perform and impress.
                </p>
            </div>
            <div class="benefits-grid scroll-animate">
                <!-- Row 1 -->
                <div class="modern-card stagger-1">
                    <i class="fas fa-desktop package-icon"></i>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">User-Friendly Design</h3>
                    <p class="text-gray-600 text-sm">Intuitive interfaces and navigation for an exceptional user experience.</p>
                </div>
                <div class="modern-card stagger-2">
                    <i class="fas fa-search package-icon"></i>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">SEO Optimization</h3>
                    <p class="text-gray-600 text-sm">Built-in SEO features to boost your search engine rankings.</p>
                </div>
                <!-- Row 2 -->
                <div class="modern-card stagger-3">
                    <i class="fas fa-tachometer-alt package-icon"></i>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Fast Performance</h3>
                    <p class="text-gray-600 text-sm">Optimized websites for quick loading and smooth performance.</p>
                </div>
                <div class="modern-card stagger-4">
                    <i class="fas fa-expand-arrows-alt package-icon"></i>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Scalability</h3>
                    <p class="text-gray-600 text-sm">Websites designed to grow with your business’s evolving needs.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Package Inclusions Section -->
    <section class="section">
        <div class="container mx-auto px-6">
            <div class="text-center mb-12 scroll-animate">
                <h2 class="section-title">Web Development Package Inclusions</h2>
                <p class="section-subtitle">
                    Our comprehensive web development package includes everything you need for a professional online presence.
                </p>
            </div>
            <div class="scroll-animate">
                <table class="package-table">
                    <thead>
                        <tr>
                            <th>Feature</th>
                            <th>Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="package-table-row stagger-1">
                            <td data-label="Feature"><i class="fas fa-code package-icon"></i> Premium Website Development</td>
                            <td data-label="Description">Custom-designed websites tailored to your brand and business goals.</td>
                        </tr>
                        <tr class="package-table-row stagger-2">
                            <td data-label="Feature"><i class="fas fa-cogs package-icon"></i> Custom-Built CMS</td>
                            <td data-label="Description">Manage your content easily with a bespoke content management system.</td>
                        </tr>
                        <tr class="package-table-row stagger-3">
                            <td data-label="Feature"><i class="fas fa-mobile-alt package-icon"></i> Responsive/Mobile-Ready Design</td>
                            <td data-label="Description">Websites that look great and function perfectly on all devices.</td>
                        </tr>
                        <tr class="package-table-row stagger-4">
                            <td data-label="Feature"><i class="fas fa-search-plus package-icon"></i> SEO-Ready</td>
                            <td data-label="Description">Optimized structure and metadata to improve search engine visibility.</td>
                        </tr>
                        <tr class="package-table-row stagger-5">
                            <td data-label="Feature"><i class="fas fa-envelope package-icon"></i> Electronic Inquiry Form</td>
                            <td data-label="Description">Up to 10 fields, secured with Google integration for seamless inquiries.</td>
                        </tr>
                        <tr class="package-table-row stagger-6">
                            <td data-label="Feature"><i class="fas fa-chart-line package-icon"></i> Google Analytics Integration</td>
                            <td data-label="Description">Free integration to track and analyze your website’s performance.</td>
                        </tr>
                        <tr class="package-table-row stagger-1">
                            <td data-label="Feature"><i class="fas fa-file-alt package-icon"></i> Page Manager</td>
                            <td data-label="Description">Easily create and manage website pages with our free tool.</td>
                        </tr>
                        <tr class="package-table-row stagger-2">
                            <td data-label="Feature"><i class="fas fa-folder-open package-icon"></i> File Manager</td>
                            <td data-label="Description">Organize and upload files effortlessly with our free file manager.</td>
                        </tr>
                        <tr class="package-table-row stagger-3">
                            <td data-label="Feature"><i class="fas fa-image package-icon"></i> Banner Manager</td>
                            <td data-label="Description">Create and manage banners to enhance your site’s visual appeal.</td>
                        </tr>
                        <tr class="package-table-row stagger-4">
                            <td data-label="Feature"><i class="fas fa-newspaper package-icon"></i> News Manager</td>
                            <td data-label="Description">Share updates and news with our free news management tool.</td>
                        </tr>
                        <tr class="package-table-row stagger-5">
                            <td data-label="Feature"><i class="fas fa-users package-icon"></i> User Manager</td>
                            <td data-label="Description">Manage user accounts and permissions with ease.</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <!-- Portfolio Section -->
    <section class="section" style="background: linear-gradient(135deg, #f0f9ff, #ffffff);">
        <div class="container mx-auto px-6">
            <div class="text-center mb-12 scroll-animate">
                <h2 class="section-title">Our Portfolio</h2>
                <p class="section-subtitle">
                    Explore a selection of websites we’ve built for our clients.
                </p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 scroll-animate">
                <div class="modern-card portfolio-card stagger-1">
                    <img src="/storage/images/business.jpg" alt="Portfolio Project 1" class="portfolio-image">
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Business Website</h3>
                    <p class="text-gray-600 text-sm">A sleek, responsive site for a corporate client.</p>
                </div>
                <div class="modern-card portfolio-card stagger-2">
                    <img src="/storage/images/ecommerce.jpg" alt="Portfolio Project 2" class="portfolio-image">
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">E-Commerce Platform</h3>
                    <p class="text-gray-600 text-sm">A robust online store with seamless navigation.</p>
                </div>
                <div class="modern-card portfolio-card stagger-3">
                    <img src="/storage/images/non.jpg" alt="Portfolio Project 3" class="portfolio-image">
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Non-Profit Site</h3>
                    <p class="text-gray-600 text-sm">A vibrant website for a community organization.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Process Section -->
    <section class="section">
        <div class="container mx-auto px-6">
            <div class="text-center mb-12 scroll-animate">
                <h2 class="section-title">Our Web Development Process</h2>
                <p class="section-subtitle">
                    From concept to launch, we follow a streamlined process to deliver exceptional results.
                </p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 scroll-animate">
                <div class="process-step stagger-1">
                    <div class="process-number">1</div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Consultation</h3>
                    <p class="text-gray-600 text-sm">We discuss your goals and requirements to create a tailored plan.</p>
                </div>
                <div class="process-step stagger-2">
                    <div class="process-number">2</div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Design & Development</h3>
                    <p class="text-gray-600 text-sm">Our team crafts a stunning, functional website based on your vision.</p>
                </div>
                <div class="process-step stagger-3">
                    <div class="process-number">3</div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Testing & Launch</h3>
                    <p class="text-gray-600 text-sm">We test rigorously and launch your site, ensuring optimal performance.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="section" style="background: linear-gradient(135deg, #f0f9ff, #ffffff);">
        <div class="container mx-auto px-6">
            <div class="text-center mb-12 scroll-animate">
                <h2 class="section-title">What Our Clients Say</h2>
                <p class="section-subtitle">
                    Hear from some of our 1,600+ satisfied clients about their experience with WebFocus.
                </p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 scroll-animate">
                <div class="testimonial-card stagger-1">
                    <p class="testimonial-quote">“WebFocus delivered a stunning website that perfectly captures our brand. Their team was professional and responsive throughout the process.”</p>
                    <p class="testimonial-author">Jane Doe, CEO of TechTrend</p>
                </div>
                <div class="testimonial-card stagger-2">
                    <p class="testimonial-quote">“The responsive design and SEO features have significantly boosted our online visibility. Highly recommend WebFocus!”</p>
                    <p class="testimonial-author">John Smith, Founder of EcoShop</p>
                </div>
                <div class="testimonial-card stagger-3">
                    <p class="testimonial-quote">“Their custom CMS made managing our content a breeze. The site is fast and user-friendly.”</p>
                    <p class="testimonial-author">Sarah Lee, Marketing Director</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="section-cta">
        <div class="cta-container scroll-animate">
            <div class="cta-content">
                <h2 class="text-3xl sm:text-4xl font-bold mb-4">Ready to Build Your Dream Website?</h2>
                <p class="text-lg text-white/90 max-w-2xl mx-auto mb-6">
                    Partner with WebFocus Solutions, Inc. to create a website that drives results and showcases your brand.
                </p>
                <div class="cta-button-group">
                    <a href="#contact" class="btn btn-primary" onclick="console.log('Request a Quote clicked')">Request a Quote</a>
                    <a href="#services" class="btn btn-glass">Explore Our Services</a>
                </div>
            </div>
        </div>
    </section>
</div>

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

    // Button hover effect
    document.querySelectorAll('.btn').forEach(btn => {
        btn.addEventListener('mouseenter', () => {
            btn.style.transform = 'translateY(-3px)';
        });
        btn.addEventListener('mouseleave', () => {
            btn.style.transform = 'translateY(0)';
        });
    });
});
</script>
@endsection
@endsection
