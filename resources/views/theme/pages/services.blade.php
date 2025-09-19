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
                 <img src="{{ asset('images/services/domain1.jpg') }}" alt="Domain Image" class="card-image">
                <h5 class="i-tittle">Domain</h5>
                <p class="i-description">Establish your business online with a custom domain.</p>
                <div class="icon-row">
                    <i class="icon-world i-animate"></i>
                    <i class="icon-line-arrow-right i-animate"></i>
                </div>
            </a>
            <a href="#" class="card-animate position-relative col-12 col-md-3">
                 <img src="{{ asset('images/services/fc.jpg') }}" alt="Focus Care+ Image" class="card-image">
                <h5 class="i-tittle">Focus Care+</h5>
                <p class="i-description">FocusCare+ – Premium After-Sales Support Included in Your Hosting Plan</p>
                <div class="icon-row">
                    <i class="icon-data i-animate"></i>
                    <i class="icon-line-arrow-right i-animate"></i>
                </div>
            </a>
            <a href="#" class="card-animate position-relative col-12 col-md-3">
                 <img src="{{ asset('images/services/hosting.jpg') }}" alt="Hosting Image" class="card-image">
                <h5 class="i-tittle">Hosting</h5>
                <p class="i-description">Websites are saved (or "hosted") on a publicly accessible computer (a server)</p>
                <div class="icon-row">
                    <i class="icon-share1 i-animate"></i>
                    <i class="icon-line-arrow-right i-animate"></i>
                </div>
            </a>
            <a href="#" class="card-animate position-relative col-12 col-md-3">
                <img src="{{ asset('images/services/web.jpg') }}" alt="Web Development Image" class="card-image">
                <h5 class="i-tittle">Web Development</h5>
                <p class="i-description">WebFocus Solutions, Inc. offers tailored web design solutions that meet technical needs</p>
                <div class="icon-row">
                    <i class="icon-cloudversify i-animate"></i>
                    <i class="icon-line-arrow-right i-animate"></i>
                </div>
            </a>
        </div>
    </div>

    <!-- Advanced Solutions Section (New Design - Replaces Redundant "Our Services") -->
    <section class="advanced-solutions-section">
        <div class="container">
            <div class="text-center mb-12 scroll-animate">
                <h2 class="section-title">Advanced IT Solutions</h2>
                <p class="section-subtitle">Unlock next-level capabilities with our specialized services designed for modern businesses. From secure data handling to scalable cloud infrastructure.</p>
            </div>
            <div class="advanced-solutions-grid scroll-animate">
                <div class="solution-card">
                    <div class="solution-header">
                        <img src="{{ asset('images/services/dms.jpg') }}" alt="Document Management" class="solution-image">
                        <div class="solution-badge">Enterprise</div>
                    </div>
                    <div class="solution-content">
                        <h3 class="solution-title">Document Management System</h3>
                        <ul class="solution-features">
                            <li>Secure workflow automation with FileHold 2.0</li>
                            <li>Advanced search and compliance tools</li>
                            <li>Seamless integration with existing systems</li>
                            <li>Reduce operational costs by up to 40%</li>
                        </ul>
                    <div class="package-cta">
                    <a href="{{-- route('hosting.cloud-packages') --}}" class="btn btn-primary">Learn More</a>
                    </div>
                        {{-- <a href="{{ route('services.document-management') }}" class="solution-cta">Explore Solution</a> --}}
                    </div>
                </div>

                <div class="solution-card">
                    <div class="solution-header">
                        <img src="{{ asset('images/services/chm.jpg') }}" alt="Cloud Solutions" class="solution-image">
                        <div class="solution-badge">Scalable</div>
                    </div>
                    <div class="solution-content">
                        <h3 class="solution-title">Cloud Hosting & Migration</h3>
                        <ul class="solution-features">
                            <li>Hybrid and private cloud deployments</li>
                            <li>Zero-downtime migration services</li>
                            <li>Auto-scaling for peak performance</li>
                            <li>Cost-optimized resource allocation</li>
                        </ul>
                                            <div class="package-cta">
                    <a href="{{-- route('hosting.cloud-packages') --}}" class="btn btn-primary">Learn More</a>
                    </div>
                        {{-- <a href="{{ route('services.cloud') }}" class="solution-cta">Explore Solution</a> --}}
                    </div>
                </div>

                <div class="solution-card">
                    <div class="solution-header">
                        <img src="{{ asset('images/services/cc.jpg') }}" alt="Cybersecurity" class="solution-image">
                        <div class="solution-badge">Secure</div>
                    </div>
                    <div class="solution-content">
                        <h3 class="solution-title">Cybersecurity & Compliance</h3>
                        <ul class="solution-features">
                            <li>Proactive threat detection and response</li>
                            <li>GDPR and HIPAA compliance audits</li>
                            <li>Endpoint protection and firewall management</li>
                            <li>Regular vulnerability assessments</li>
                        </ul>
                                            <div class="package-cta">
                    <a href="{{-- route('hosting.cloud-packages') --}}" class="btn btn-primary">Learn More</a>
                    </div>
                        {{-- <a href="{{ route('services.cybersecurity') }}" class="solution-cta">Explore Solution</a> --}}
                    </div>
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
