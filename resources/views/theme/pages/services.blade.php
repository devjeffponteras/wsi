
@extends('theme.main')

@section('pagecss')
<link rel="stylesheet" href="{{ asset('theme/css/newstyle.css') }}" type="text/css" />
@endsection

@section('content')
<div class="flex flex-col min-h-screen">
    <!-- Hero Section -->
    <section class="hero-section">
        <video class="hero-video" autoplay loop muted playsinline>
           <source src="{{ asset('images/videoplayback.mp4') }}" type="video/mp4">
            Your browser does not support the video tag.
        </video>
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <h1 class="hero-title animate-slide-in-up">
                 <span class="text-white">Services</span>
            </h1>
            <p class="hero-subtitle animate-slide-in-up">
                WebFocus Solutions Inc. is a leading IT solutions company, renowned for innovative, secure, and tailored IT solutions that promote growth, efficiency, and success.
            </p>
        </div>
    </section>

    <!-- Company Overview -->
    <div class="section feature-cards">
        <div class="d-flex flex-column flex-md-row feature-cards-top">
            <a href="#" class="card-animate position-relative col-12 col-md-3">
                <h5 class="i-tittle">Domain</h5>
                <p class="i-description">Establish your business online with a custom domain.</p>
                <i class="icon-world i-animate"></i>
                <i class="icon-line-arrow-right i-animate"></i>
            </a>
            <a href="#" class="card-animate position-relative col-12 col-md-3">
                <h5 class="i-tittle">Focus Care+</h5>
                <p class="i-description">FocusCare+ – Premium After-Sales Support Included in Your Hosting Plan</p>
                <i class="icon-data i-animate"></i>
                <i class="icon-line-arrow-right i-animate"></i>
            </a>
            <a href="#" class="card-animate position-relative col-12 col-md-3">
                <h5 class="i-tittle">Hosting</h5>
                <p class="i-description">Websites are saved (or "hosted") on a publicly accessible computer (a server)</p>
                <i class="icon-share1 i-animate"></i>
                <i class="icon-line-arrow-right i-animate"></i>
            </a>
            <a href="#" class="card-animate position-relative col-12 col-md-3">
                <h5 class="i-tittle">Web Development</h5>
                <p class="i-description">WebFocus Solutions, Inc. offers tailored web design solutions that meet technical needs</p>
                <i class="icon-cloudversify i-animate"></i>
                <i class="icon-line-arrow-right i-animate"></i>
            </a>
        </div>
    </div>

    <section class="section">
        <div class="careers-container scroll-animate">
            <div class="text-center mb-12">
                <h2 class="section-title">Our Services</h2>
                <p class="section-subtitle">Discover the range of innovative IT solutions we offer to elevate your business.</p>
            </div>

            <div class="careers-grid">
                <div class="career-card scroll-animate stagger-1">
                    <img src="/storage/images/pic1.jpg" alt="Custom Domains Image" class="career-image">
                    <h3 class="text-lg font-bold text-gray-800 mb-2">Custom Domains</h3>
                    <p class="text-gray-600">A unique domain name ensures your place in the digital world and connects you to millions of users worldwide.</p>
                    <a href="#" class="btn btn-primary career-button">Learn More</a>
                </div>

                <div class="career-card scroll-animate stagger-2">
                    <img src="/storage/images/pic2.jpg" alt="Focus Care+ Support Image" class="career-image">
                    <h3 class="text-lg font-bold text-gray-800 mb-2">Focus Care+ Support</h3>
                    <p class="text-gray-600">This built-in after-sales support ensures your website stays secure, optimized, and running smoothly.</p>
                    <a href="#" class="btn btn-primary career-button">Learn More</a>
                </div>

                <div class="career-card scroll-animate stagger-3">
                    <img src="/storage/images/pic3.jpg" alt="Web Development Image" class="career-image">
                    <h3 class="text-lg font-bold text-gray-800 mb-2">Web Development</h3>
                    <p class="text-gray-600">We have both web designers and web programmers, ensuring a functional, user-friendly, and visually appealing website.</p>
                    <a href="#" class="btn btn-primary career-button">Learn More</a>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="section-cta">
        <div class="cta-container scroll-animate">
            <div class="cta-content">
                <h2 class="text-2xl sm:text-3xl font-bold mb-4">Ready to Transform Your Business?</h2>
                <p class="text-lg text-white/90 max-w-xl mx-auto mb-6">
                    Partner with WebFocus Solutions Inc. to elevate your digital presence and achieve unparalleled success. Let's build the future together.
                </p>
                <div class="cta-button-group">
                    <a href="#contact" class="btn btn-primary" onclick="console.log('Request a Quote clicked')">Get Started</a>
                    <a href="#services" class="btn btn-glass">Explore Now</a>
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
                // Trigger counter animation for stat numbers
                const counters = entry.target.querySelectorAll('.stat-number[data-count]');
                counters.forEach(counter => {
                    const target = parseFloat(counter.getAttribute('data-count'));
                    let count = parseFloat(counter.innerText) || 0; // Ensure initial value is 0
                    const increment = target / 100;
                    const updateCount = () => {
                        if (count < target) {
                            count += increment;
                            counter.innerText = Math.min(Math.round(count * 10) / 10, target).toFixed(target % 1 === 0 ? 0 : 1);
                            setTimeout(updateCount, 20);
                        } else {
                            counter.innerText = target.toFixed(target % 1 === 0 ? 0 : 1); // Ensure exact target value
                        }
                    };
                    updateCount();
                });
            }
        });
    }, observerOptions);

    // Observe scroll animation elements
    document.querySelectorAll('.scroll-animate').forEach(el => observer.observe(el));
});
</script>
@endsection
@endsection
