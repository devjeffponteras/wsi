
@extends('theme.main')

@section('pagecss')
<link rel="stylesheet" href="{{ asset('theme/css/newstyle.css') }}" type="text/css" />
<style>
    /* Document Management Specific Styles */
    .dms-section {
        padding: 4rem 0;
        background: #ffffff;
    }

    .dms-container {
        max-width: 100%; /* Full width to remove margins */
        margin: 0 auto;
        padding: 0 1rem;
    }

    .packages-inner-container {
        max-width: 1200px; /* Constrain packages-grid to match hosting.blade.php */
        margin: 0 auto;
    }

    .dms-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 2rem;
        margin-top: 2rem;
    }

    @media (min-width: 768px) {
        .dms-grid {
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
        }
    }

    .dms-card {
        background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);
        border-radius: 16px;
        padding: 2rem;
        text-align: center;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        border: 1px solid rgba(43, 86, 211, 0.1);
    }

    .dms-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 12px 40px rgba(0, 0, 0, 0.15);
    }

    .dms-icon {
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

    .dms-card:hover .dms-icon {
        transform: scale(1.1);
    }

    .dms-title {
        font-size: 1.5rem;
        font-weight: 700;
        color: #1f2937;
        margin-bottom: 1rem;
    }

    .dms-description {
        font-size: 1rem;
        color: #6b7280;
        line-height: 1.6;
        margin-bottom: 1.5rem;
    }

    .overview-section {
        background: linear-gradient(135deg, #f0f9ff 0%, #e0f2fe 100%);
        padding: 4rem 0;
    }

    .overview-container {
        max-width: 100%; /* Full width to remove margins */
        margin: 0 auto;
        padding: 0 1rem;
    }

    .overview-content {
        max-width: 800px;
        margin: 0 auto;
        text-align: center;
    }

    .overview-text {
        font-size: 1.125rem;
        color: #4b5563;
        line-height: 1.7;
        margin-bottom: 1.5rem;
    }

    .packages-section {
        padding: 4rem 0;
    }

    .packages-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 2rem;
        margin-top: 2rem;
    }

    @media (min-width: 1024px) {
        .packages-grid {
            display: flex;
            flex-wrap: nowrap;
            justify-content: space-between;
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
            <source src="{{ asset('storage/banners/videoplayback.mp4') }}" type="video/mp4">
            <picture>
                <source srcset="{{ asset('storage/banners/fallback-poster.webp') }}" type="image/webp">
                <img src="{{ asset('storage/banners/fallback-poster.jpg') }}" alt="WebFocus Solutions Document Management Banner" class="hero-video-fallback">
            </picture>
            Your browser does not support the video tag.
        </video>
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <h1 class="hero-title animate-slide-in-up">
                Streamline Your Document Workflow <span class="text-white">With FileHold</span>
            </h1>
            <p class="hero-subtitle animate-slide-in-up">
                Organize, secure, and manage your documents efficiently with FileHold, the ultimate document management system designed for modern businesses.
            </p>
        </div>
    </section>

    <!-- Document Management Systems -->
    <section class="dms-section">
        <div class="dms-container">
            <div class="text-center mb-12 scroll-animate">
                <h2 class="section-title">Document Management Systems</h2>
                <p class="section-subtitle">
                    Discover how FileHold transforms your document workflow with powerful tools for organization, security, and accessibility.
                </p>
            </div>
            <div class="dms-grid scroll-animate">
                <div class="dms-card">
                    <div class="dms-icon">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"></path>
                        </svg>
                    </div>
                    <h3 class="dms-title">Document Management Solutions</h3>
                    <p class="dms-description">
                        FileHold provides a robust document management system that streamlines document storage, retrieval, and collaboration. Designed for businesses of all sizes, FileHold ensures your documents are secure, organized, and accessible anytime, anywhere, boosting productivity and compliance.
                    </p>
                    <a href="{{-- route('dms.learn-more') --}}" class="btn btn-primary">Learn More</a>
                </div>
            </div>
        </div>
    </section>

    <!-- FileHold Overview -->
    <section class="overview-section">
        <div class="overview-container">
            <div class="text-center mb-12 scroll-animate">
                <h2 class="section-title">FileHold Overview</h2>
                <p class="section-subtitle">
                    Learn about FileHold’s comprehensive features that empower your business to manage documents with ease and efficiency.
                </p>
            </div>
            <div class="overview-content scroll-animate">
                <p class="overview-text">
                    FileHold is a leading document management system designed to simplify the way businesses handle their documents. With a user-friendly interface and powerful functionality, FileHold enables organizations to digitize, organize, and secure their documents while streamlining workflows. Whether you’re managing contracts, invoices, or compliance documents, FileHold offers scalable solutions tailored to your needs.
                </p>
                <p class="overview-text">
                    Integrated with robust search capabilities, version control, and automated workflows, FileHold reduces manual processes and enhances collaboration. Hosted on secure servers with WebFocus Solutions, Inc., FileHold ensures data integrity and compliance with industry standards, making it the ideal choice for businesses seeking efficiency and reliability.
                </p>
                <a href="{{-- route('dms.filehold-details') --}}" class="btn btn-primary">Explore FileHold</a>
            </div>
        </div>
    </section>

    <!-- Features & Benefits -->
    <section class="packages-section">
        <div class="dms-container">
            <div class="packages-inner-container">
                <div class="text-center mb-12 scroll-animate">
                    <h2 class="section-title">Features & Benefits</h2>
                    <p class="section-subtitle">
                        Choose from our tailored FileHold plans, each designed to meet your document management needs with powerful features and seamless integration.
                    </p>
                </div>
                <div class="packages-grid scroll-animate">
                    <!-- Content removed as per request -->
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="section-cta">
        <div class="cta-container scroll-animate">
            <div class="cta-content">
                <h2 class="text-3xl sm:text-4xl font-bold mb-4">Transform Your Document Management Today</h2>
                <p class="text-lg text-white/90 max-w-2xl mx-auto mb-6">
                    Streamline your workflows with FileHold and WebFocus Solutions, Inc. Get started now and experience efficient, secure document management.
                </p>
                <div class="cta-button-group">
                    <a href="#get-filehold" class="btn btn-primary" onclick="console.log('Get Started Now clicked')">Get Started Now</a>
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
