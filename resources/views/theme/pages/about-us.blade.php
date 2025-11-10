@extends('theme.main')

@section('pagecss')
<style>
/* Hero Section */
    .hero-section {
        color: white;
        min-height: 70vh;
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
        overflow: hidden;
        margin-top: -30px;
        padding-top: 0;
    }

    .hero-video {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        z-index: 0;
    }

    .hero-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(43, 86, 211, 0.5);
        z-index: 1;
    }

    .hero-content {
        text-align: center;
        max-width: 900px;
        z-index: 2;
        padding: 1.5rem;
    }

    .hero-title {
        font-size: clamp(2.25rem, 4.5vw, 3.5rem); /* Adjusted to new styles */
        font-weight: 800;
        line-height: 1.2;
        margin-bottom: 1.25rem;
        background: linear-gradient(45deg, #ffffff, #d1d5db);
        -webkit-background-clip: text;
        background-clip: text;
        -webkit-text-fill-color: transparent;
        animation: fadeInSlideUp 0.8s ease-out 0.2s forwards;
    }

    .hero-subtitle {
        font-size: clamp(1rem, 2vw, 1.25rem); /* Adjusted to new styles */
        font-weight: 400;
        color: rgba(255, 255, 255, 0.9);
        max-width: 700px;
        margin: 0 auto 2rem;
        animation: fadeInSlideUp 0.8s ease-out 0.4s forwards;
    }

    /* Section Styling */
    .section {
        padding: 2.5rem 0;
        background-color: #ffffff;
    }

    .section-title {
        font-size: clamp(2rem, 3.5vw, 2.75rem); /* Adjusted to new styles (body text ~1.25rem * 2) */
        font-weight: 800;
        text-align: center;
        color: #1f2937;
        margin-bottom: 1rem;
    }

    .section-subtitle {
        font-size: clamp(1rem, 1.5vw, 1.125rem); /* Adjusted to new styles */
        text-align: center;
        color: #6b7280;
        max-width: 1000px;
        margin: 0 auto 2.5rem;
    }

/* Card Styling */
.modern-card {
    background: #ffffff;
    border-radius: 16px;
    border: 1px solid rgba(0, 0, 0, 0.05);
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    padding: 2rem;
}

.modern-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 8px 30px rgba(0, 0, 0, 0.12);
}

/* Feature Icons */
.feature-icon {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 3rem;
    height: 3rem;
    border-radius: 12px;
    background: linear-gradient(135deg, #2b56d3, #5b7ce8);
    color: white;
    margin: 0 auto 1.5rem;
    transition: transform 0.3s ease;
}

.feature-icon:hover {
    transform: scale(1.1);
}

.feature-icon-secondary {
    background: linear-gradient(135deg, #2b56d3);
}

.feature-icon-accent {
    background: linear-gradient(135deg, #93c5fd, #dbeafe);
}

/* Stats Grid for Achievements */
.stats-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    grid-template-rows: repeat(2, auto);
    gap: 1.5rem;
    margin-top: 2rem;
}

.stat-item {
    background: linear-gradient(135deg, #f0f9ff, #f8fafc);
    border-radius: 12px;
    padding: 1.5rem;
    text-align: center;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
    transition: transform 0.3s ease;
}

.stat-item:hover {
    transform: scale(1.05);
}

.stat-number {
    font-size: 2.25rem;
    font-weight: 800;
    background: linear-gradient(135deg, #2b56d3, #5b7ce8);
    -webkit-background-clip: text;
    background-clip: text;
    -webkit-text-fill-color: transparent;
    margin-bottom: 0.5rem;
}

.stat-label {
    font-size: 0.875rem;
    font-weight: 600;
    color: #6b7280;
    text-transform: uppercase;
}

/* Services Row Specific Styles */
.services-row {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
    gap: 1.5rem;
    justify-content: center;
    padding: 0 1rem;
}

.service-card {
    background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);
    border-radius: 12px;
    padding: 1.5rem;
    text-align: center;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
    transition: transform 0.3s ease, box-shadow 0.3s ease, min-height 0.3s ease;
    position: relative;
    min-height: 280px; /* Base height for icon + title + short description */
    cursor: pointer; /* Indicate clickability */
}

.service-card:hover, .service-card.expanded {
    transform: scale(1.05);
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
    min-height: 380px; /* Expanded height for icon + title + full description + button */
}

.service-icon {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 2.5rem;
    height: 2.5rem;
    border-radius: 50%;
    background: linear-gradient(135deg, #2b56d3, #5b7ce8);
    color: white;
    margin: 0 auto 1rem; /* Center icon */
    transition: transform 0.3s ease;
}

.service-card:hover .service-icon, .service-card.expanded .service-icon {
    transform: rotate(360deg);
}

.service-title {
    font-size: 1.1rem;
    font-weight: 600;
    color: #1f2937;
    margin-bottom: 0.75rem;
    position: relative;
    z-index: 3; /* Above descriptions */
}

.service-details {
    font-size: 0.95rem;
    color: #4b5563;
    position: absolute;
    text-justify: auto;
    margin-top: 50px;
    left: 1.5rem;
    right: 1.5rem;
    transition: opacity 0.3s ease, transform 0.3s ease;
    z-index: 2; /* Below title */
}

.service-details.short {
    opacity: 1;
    transform: translateY(0);
    top: 5rem; /* Below icon + title */
}

.service-details.full {
    opacity: 0;
    transform: translateY(10px);
    top: 5rem; /* Same as short for smooth swap */
}

.service-card:hover .service-details.short, .service-card.expanded .service-details.short {
    opacity: 0;
    transform: translateY(-10px);
}

.service-card:hover .service-details.full, .service-card.expanded .service-details.full {
    opacity: 1;
    transform: translateY(0);
}

/* Arrow Button */
.arrow-btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    padding: 0.5rem 1rem;
    border-radius: 50px;
    font-weight: 600;
    font-size: 0.9rem;
    text-decoration: none;
    background: linear-gradient(135deg, #2b56d3);
    color: white;
    transition: opacity 0.3s ease, transform 0.3s ease;
    position: absolute;
    margin-top: 1rem;
    bottom: 1rem; /* Position at bottom */
    left: 50%;
    transform: translateX(-50%) translateY(10px);
    opacity: 0; /* Hidden by default */
    z-index: 4; /* Above title and descriptions */
}

.service-card:hover .arrow-btn, .service-card.expanded .arrow-btn {
    opacity: 1;
    transform: translateX(-50%) translateY(0);
}

.arrow-btn:hover {
    background: linear-gradient(135deg, #ff5600);
    color:white;
    transform: translateX(-50%) translateY(-2px);
}

.arrow-btn svg {
    margin-left: 0.5rem;
    width: 1rem;
    height: 1rem;
}


    /* Buttons */
    .btns {
        display: inline-flex;
        align-items: center;
        padding: 1rem 2rem;
        border-radius: 50px;
        font-weight: 600;
        font-size: 1rem;
        text-decoration: none;
        transition: all 0.3s ease;
        border: 1px solid rgb(255, 255, 255);
        cursor: pointer;
    }

    .btn-primary1 {
        background: linear-gradient(135deg, #1e40af, #3b82f6);
        color: white;
        backdrop-filter: blur(10px);
    }

    .btn-primary1:hover {
        background: linear-gradient(135deg, #ff5600);
        color: white;
        transform: translateY(-3px);
    }
/* Company Overview Specific Styles */
.company-overview-container {
    display: flex;
    flex-direction: row;
    gap: 2rem;
    margin: 0 auto;
    background: #ffffff;
    border-radius: 16px;
    padding: 2rem;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
}

.company-overview-card {
    flex: 1;
    padding: 1.5rem;
    border-radius: 12px;
    background: rgba(255, 255, 255, 0.95);
    transition: transform 0.3s ease;
}

.company-overview-card:hover {
    transform: translateY(-5px);
}

.company-overview-icon {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 2.5rem;
    height: 2.5rem;
    border-radius: 8px;
    background: linear-gradient(135deg, #2b56d3);
    color: white;
    margin: 0 auto 1rem; /* Center icon */
}

.company-overview-icon-secondary {
    background: linear-gradient(135deg, #3b82f6);
}

.who-we-are-text {
    display: flex;
    flex-direction: column;
    gap: 1.5rem;
    font-size: 1.1rem;
    font-weight: 400;
    color: #4b5563;
}

.who-we-are-text p {
    opacity: 0;
    transform: translateY(20px);
    transition: all 0.6s ease-out;
}

.who-we-are-text p.animate {
    opacity: 1;
    transform: translateY(0);
}

/* Mission & Vision Specific Styles */
.mission-vision-container {
    display: flex;
    flex-direction: row;
    gap: 2rem;
    margin: 0 auto;
    background: #ffffff;
    border-radius: 16px;
    padding: 2rem;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
}

.mission-vision-card {
    flex: 1;
    padding: 1.5rem;
    border-radius: 12px;
    background: rgba(255, 255, 255, 0.95);
    transition: transform 0.3s ease;
}

.mission-vision-card:hover {
    transform: translateY(-5px);
}

.mission-vision-icon {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 2.5rem;
    height: 2.5rem;
    border-radius: 8px;
    background: linear-gradient(135deg, #2b56d3, #5b7ce8);
    color: white;
    margin: 0 auto 1rem; /* Center icon */
}

.mission-vision-icon-secondary {
    background: linear-gradient(135deg, #3b82f6, #60a5fa);
}

/* Core Values Specific Styles */
.core-values-container {
    width: 100%;
    margin: 0;
    position: relative;
    padding: 0;
    background: #ffffff;
}

.core-values-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
    gap: 1.5rem;
    justify-content: center;
    padding: 0 1rem;
}

.core-value-card {
    background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);
    border-radius: 12px;
    padding: 1.5rem;
    text-align: center;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
    transition: transform 0.3s ease, box-shadow 0.3s ease, opacity 0.3s ease;
    opacity: 0;
}

.core-value-card.animate {
    opacity: 1;
    transform: translateY(0);
}

.core-value-card:hover {
    transform: scale(1.05);
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
}

.core-value-icon {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 2.5rem;
    height: 2.5rem;
    border-radius: 50%;
    background: linear-gradient(135deg, #2b56d3, #5b7ce8);
    color: white;
    margin-bottom: 1rem;
    transition: transform 0.3s ease;
}

.core-value-card:hover .core-value-icon {
    transform: rotate(360deg);
}

/* CEO Message Specific Styles */
.ceo-message-container {
    background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);
    border-radius: 16px;
    padding: 2rem;
    position: relative;
    overflow: hidden;
    max-width: 900px;
    margin: 0 auto;
}

.ceo-message-container::before {
    content: '';
    position: absolute;
    top: -50%;
    left: -50%;
    width: 200%;
    height: 200%;
    background: radial-gradient(circle at 50% 50%, rgba(43, 86, 211, 0.1) 0%, transparent 50%);
    animation: float 10s ease-in-out infinite;
}

.ceo-message-content {
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
    position: relative;
    z-index: 1;
}

.ceo-profile {
    width: 120px;
    height: 120px;
    border-radius: 50%;
    background: linear-gradient(135deg, #2b56d3, #5b7ce8);
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 1.5rem;
}

/* Join Our Team Specific Styles */
.careers-container {
    width: 100%;
    margin: 0;
    position: relative;
    padding: 0;
    background: #ffffff;
}

.careers-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
    gap: 1.5rem;
    justify-content: center;
    padding: 0 1rem;
    margin-top: 2rem;
}

.career-card {
    background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);
    border-radius: 12px;
    padding: 1.5rem;
    text-align: center;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
    transition: transform 0.3s ease, box-shadow 0.3s ease, opacity 0.3s ease;
    opacity: 0;
}

.career-card.animate {
    opacity: 1;
    transform: translateY(0);
}

.career-card:hover {
    transform: scale(1.05);
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
}

.career-icon {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 2.5rem;
    height: 2.5rem;
    border-radius: 50%;
    background: linear-gradient(135deg, #2b56d3, #5b7ce8);
    color: white;
    margin-bottom: 1rem;
    transition: transform 0.3s ease;
}

.career-card:hover .career-icon {
    transform: rotate(360deg);
}

 /* CTA Section */
    .section-cta {
        position: relative;
        padding: 6rem 1rem;
        background: linear-gradient(135deg, #1e40af, #3b82f6);
        text-align: center;
        color: white;
    }

    .cta-container {
        position: relative;
        z-index: 1;
        max-width: 1200px;
        margin: 0 auto;
        padding: 2rem 1rem;
    }

    .cta-container::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: radial-gradient(circle at 50% 50%, rgba(255, 255, 255, 0.15) 0%, transparent 50%);
        z-index: 0;
        animation: float 12s ease-in-out infinite;
    }

    .cta-content {
        position: relative;
        z-index: 1;
    }

    .cta-button-group {
        display: flex;
        flex-wrap: wrap;
        gap: 1.5rem;
        justify-content: center;
        margin-top: 2.5rem;
    }

/* Animations */
@keyframes slideInUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes fadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
}

@keyframes float {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-15px); }
}

@keyframes fadeInSlideUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.animate-slide-in-up {
    animation: slideInUp 0.6s ease-out both;
}

.animate-fade-in {
    animation: fadeIn 0.6s ease-out;
}

.scroll-animate {
    opacity: 0;
    transform: translateY(20px);
    transition: all 0.6s ease-out;
}

.scroll-animate.animate {
    opacity: 1;
    transform: translateY(0);
}

.stagger-1 { transition-delay: 0.1s; }
.stagger-2 { transition-delay: 0.2s; }
.stagger-3 { transition-delay: 0.3s; }
.stagger-4 { transition-delay: 0.4s; }
.stagger-5 { transition-delay: 0.5s; }

/* Responsive Design */
@media (max-width: 768px) {
    .hero-section {
        min-height: 70vh;
        padding: 1.5rem;
        margin-top: -30px; /* Maintain header overlap */
        padding-top: 0;
    }

    .hero-title {
        font-size: clamp(2rem, 4vw, 2.75rem);
    }

    .hero-subtitle {
        font-size: clamp(0.9rem, 1.8vw, 1.1rem);
    }

    .section {
        padding: 3rem 0;
    }

    .stats-grid {
        grid-template-columns: repeat(2, 1fr);
        gap: 1rem;
        padding: 0 0.5rem;
    }

    .services-row {
        grid-template-columns: 1fr;
        padding: 0 0.5rem;
    }

    .modern-card {
        padding: 1.5rem;
    }

    .company-overview-container {
        flex-direction: column;
        padding: 1.5rem;
    }

    .mission-vision-container {
        flex-direction: column;
        padding: 1.5rem;
    }

    .core-values-grid {
        grid-template-columns: 1fr;
        padding: 0 0.5rem;
    }

    .careers-grid {
        grid-template-columns: 1fr;
        padding: 0 0.5rem;
    }

    .ceo-message-container {
        padding: 1.5rem;
    }

    .cta-container {
        padding: 2rem 0.5rem;
    }

    .company-overview-card {
        padding: 1.5rem;
    }

    .company-overview-icon {
        width: 2rem;
        height: 2rem;
    }

    .mission-vision-icon {
        width: 2rem;
        height: 2rem;
    }

    .who-we-are-text {
        font-size: 1rem;
    }

    .stat-number {
        font-size: 1.75rem;
    }

    .stat-label {
        font-size: 0.75rem;
    }

    .service-card {
        min-height: 260px; /* Adjust for icon + title + short description */
    }

    .service-card:hover, .service-card.expanded {
        min-height: 320px; /* Adjust for icon + title + full description + button */
    }

    .service-details.short {
        top: 5rem;
    }

    .service-details.full {
        top: 5rem;
    }

    .arrow-btn {
        bottom: 0.75rem;
    }
}

@media (max-width: 640px) {
    .section-title {
        font-size: clamp(1.75rem, 3vw, 2.25rem);
    }

    .section-subtitle {
        font-size: clamp(0.875rem, 1.5vw, 1rem);
    }

    .careers-grid {
        grid-template-columns: 1fr;
        padding: 0 0.5rem;
    }

    .cta-container {
        padding: 2rem 0.5rem;
    }

    .stats-grid {
        grid-template-columns: repeat(2, 1fr);
        gap: 0.75rem;
        padding: 0 0.25rem;
    }

    .stat-number {
        font-size: 1.5rem;
    }

    .stat-label {
        font-size: 0.7rem;
    }
}
</style>
@endsection

@section('content')

  {!! $content->contents !!}
{{-- <div class="flex flex-col min-h-screen">
    <!-- Hero Section -->
    <section class="hero-section">
        <video class="hero-video" autoplay loop muted playsinline>
            <source src="{{ asset('images/videoplayback.mp4') }}" type="video/mp4">
            Your browser does not support the video tag.
        </video>
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <h1 class="hero-title animate-slide-in-up">
                Leading IT Solutions <span class="text-white">Since 2001</span>
            </h1>
            <p class="hero-subtitle animate-slide-in-up">
                WebFocus Solutions Inc. is a leading IT solutions company, renowned for innovative, secure, and tailored IT solutions that promote growth, efficiency, and success.
            </p>
        </div>
    </section>

    <!-- Company Overview -->
    <section class="section">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12 scroll-animate">
                <h2 class="section-title">Company Overview</h2>
                <p class="section-subtitle">
                    Discover the story behind WebFocus Solutions Inc. and our journey to becoming a leading IT solutions provider.
                </p>
            </div>

            <div class="company-overview-container scroll-animate">
                <!-- Who We Are -->
                <div class="company-overview-card">
                    <div class="company-overview"></div>
                    <h2 class="text-xl font-bold text-gray-800 mb-3 text-center">Who We Are</h2>
                    <div class="who-we-are-text">
                        <p class="scroll-animate stagger-1">WebFocus Solutions, Inc., is a Philippine-based digital company, established in 2001, offering innovative, cost-effective IT software solutions to over a thousand clients.</p>
                        <p class="scroll-animate stagger-2">Our approach is to provide personalized digital solutions tailored to a company's needs and budget. We aim to maintain our premium brand in the IT industry and help customers integrate technological advancements for a competitive advantage.</p>
                        <p class="scroll-animate stagger-3">We invest in up-to-date infrastructure and software applications, ensuring our people are adapted to technological updates. We prioritize security, providing tools and education to protect customers and online assets. Our online support team offers 24/7 support to ensure customer satisfaction.</p>
                    </div>
                </div>

                <!-- Our Achievements -->
                <div class="company-overview-card">
                    <div class="company-overview-"></div>
                    <h2 class="text-xl font-bold text-gray-800 mb-3 text-center">Our Achievements</h2>
                    <div class="stats-grid">
                        <div class="stat-item">
                            <div class="stat-number" data-count="1000">0</div>
                            <div class="stat-label">Happy Clients</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-number" data-count="99.9">0</div>
                            <div class="stat-label">Uptime Guarantee</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-number">24/7</div>
                            <div class="stat-label">Support Available</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-number" data-count="23">0</div>
                            <div class="stat-label">Years Experience</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- What We Do -->
            <div class="modern-card scroll-animate stagger-2 mt-6">
                <div class="feature feature"></div>
                <h2 class="text-2xl font-bold text-gray-800 mb-4 text-center">What We Do</h2>
                <div class="services-row">
                    <div class="service-card scroll-animate stagger-1">
                        <div class="service-icon">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 5a2 2 0 012-2h12a2 2 0 012 2v14a2 2 0 01-2 2H6a2 2 0 01-2-2V5z"></path>
                            </svg>
                        </div>
                        <h4 class="service-title">Web Design & Development</h4>
                        <p class="service-details short text-gray-600">Website design and development for traffic and leads.</p>
                        <p class="service-details full text-gray-600">We offer website design and web development services with a holistic approach to driving inbound traffic and generating leads. Our client websites are built using the latest technology, ensuring responsiveness, security, and an optimal user experience.</p>
                        <div class="text-center">
                            <a href="{{-- route('services.web-design') --}}" class="arrow-btn">
                                Learn More
                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                    <div class="service-card scroll-animate stagger-2">
                        <div class="service-icon">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                            </svg>
                        </div>
                        <h4 class="service-title">Domain Registration</h4>
                        <p class="service-details short text-gray-600">Register domains for brand credibility.</p>
                        <p class="service-details full text-gray-600">We assist in choosing and registering the right domain name for your business, building brand credibility and attracting more clients. Choose from diverse top-level, hybrid top-level, country-level, education, and government domains.</p>
                        <div class="text-center">
                            <a href="{{-- route('services.domain-registration') --}}" class="arrow-btn">
                                Learn More
                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                    <div class="service-card scroll-animate stagger-3">
                        <div class="service-icon">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path>
                            </svg>
                        </div>
                        <h4 class="service-title">Web Hosting</h4>
                        <p class="service-details short text-gray-600">Reliable and secure hosting solutions.</p>
                        <p class="service-details full text-gray-600">We offer reliable, secure, and high-performing server packages for businesses. With options like Cloud Hosting and Dedicated Servers, WebFocus provides end-to-end solutions and round-the-clock support to your business.</p>
                        <div class="text-center">
                            <a href="{{-- route('services.web-hosting') --}}" class="arrow-btn">
                                Learn More
                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                    <div class="service-card scroll-animate stagger-4">
                        <div class="service-icon">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"></path>
                            </svg>
                        </div>
                        <h4 class="service-title">Document Management System</h4>
                        <p class="service-details short text-gray-600">Efficient document management with FileHold.</p>
                        <p class="service-details full text-gray-600">WebFocus is an accredited partner of FileHold, a document management system software application for organizations. This enables the creation, editing, and sharing of e-documents, reducing paper and ink usage.</p>
                        <div class="text-center">
                            <a href="{{-- route('services.document-management') --}}" class="arrow-btn">
                                Learn More
                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Mission & Vision -->
        <section class="section bg-gray-50">
            <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-12 scroll-animate">
                    <h2 class="section-title">Mission & Vision</h2>
                    <p class="section-subtitle">
                        WebFocus Solutions Inc. is a leading IT solutions company in the Philippines, renowned for unique IT solutions that promote growth, efficiency, and success. Our objective is to give excellent value via experience, devotion, and customer-focused service, thereby making a significant difference in the digital world.
                    </p>
                </div>

                <div class="mission-vision-container scroll-animate">
                    <div class="mission-vision-card">
                        <div class="mission-vision"></div>
                        <h2 class="text-xl font-bold text-gray-800 mb-3 text-center">Our Mission</h2>
                        <div class="space-y-3 text-gray-600">
                            <p>To develop and provide customized, scalable, modular, and cost-effective Web and Mobile Application Development, Digital Marketing, Domain and Hosting, Infrastructure Installation, and Business Solutions including Managed I.T. and Professional Services.</p>
                            <p>To establish ourselves as a reliable partner of startups to SMEs, providing innovative solutions to specific needs.</p>
                            <p>To provide highly-skilled I.T. professionals and dedicated 24/7 support to ensure customer security and customer satisfaction.</p>
                        </div>
                    </div>

                    <div class="mission-vision-card">
                        <div class="mission-vision- mission-vision"></div>
                        <h2 class="text-xl font-bold text-gray-800 mb-3 text-center">Our Vision</h2>
                        <div class="space-y-3 text-gray-600">
                            <p>To establish WebFocus Solutions Inc. as an IT and Business Solutions company that provides innovative solutions and transforms businesses to integrate technological advancements.</p>
                            <p>To be a premium and established household brand in the IT industry, offering products and services that will provide value to our customers and ensure quality and security.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Core Values -->
        <section class="section">
            <div class="core-values-container">
                <div class="text-center mb-12 scroll-animate">
                    <h2 class="section-title">Our Commitment to Excellence</h2>
                    <p class="section-subtitle">
                        At WebFocus Solutions Inc., we believe that IT solutions should be more than just functional—they should be innovative, secure, and tailored to each client's needs. Our approach is guided by five core principles ensuring top-tier service, cutting-edge technology, and long-term business success.
                    </p>
                </div>

                <div class="core-values-grid">
                    <div class="core-value-card scroll-animate stagger-1">
                        <div class="core-value-icon">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"></path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold text-gray-800 mb-2">Tailored Solutions</h3>
                        <p class="text-gray-600">Our team focuses on creating tailored solutions that cater to the unique needs of our clients, avoiding a one-size-fits-all approach.</p>
                    </div>

                    <div class="core-value-card scroll-animate stagger-2">
                        <div class="core-value-icon">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold text-gray-800 mb-2">Innovation</h3>
                        <p class="text-gray-600">Our team stays updated with the latest tech stacks and best practices to optimize client websites and applications, keeping up with the ever-evolving technology landscape.</p>
                    </div>

                    <div class="core-value-card scroll-animate stagger-3">
                        <div class="core-value-icon">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold text-gray-800 mb-2">Security</h3>
                        <p class="text-gray-600">We take cybersecurity seriously to protect our clients' digital assets and educate them on staying secure amid the increasing number of cyber threats.</p>
                    </div>

                    <div class="core-value-card scroll-animate stagger-4">
                        <div class="core-value-icon">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold text-gray-800 mb-2">Customer Service</h3>
                        <p class="text-gray-600">Our commitment to client satisfaction is evident in our support team's swift resolution of issues, ensuring minimal disruptions and maximum efficiency.</p>
                    </div>

                    <div class="core-value-card scroll-animate stagger-5">
                        <div class="core-value-icon">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold text-gray-800 mb-2">Return on Investment</h3>
                        <p class="text-gray-600">Our solutions are designed to meet technical needs and generate measurable returns for clients, helping them ensure long-term business success.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Message from CEO -->
        <section class="section bg-gray-50">
            <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="ceo-message-container scroll-animate">
                    <div class="ceo-message-content">
                        <div class="ceo-profile">
                            <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold text-gray-800 mb-2">Sarah Mitchell</h3>
                        <p class="text-gray-600 mb-4">CEO & Founder</p>
                        <h3 class="text-2xl font-bold text-gray-800 mb-4">A Message from Our CEO</h3>
                        <div class="space-y-3 text-gray-600">
                            <p>"When I founded WebFocus Solutions Inc. in 2001, I had a vision of creating a company that would truly understand and serve the needs of businesses in the digital age. Today, I'm proud to say we've built something special."</p>
                            <p>"Our success isn't measured just in the number of websites we've built or servers we manage, but in the growth and success of our clients. Every day, our team works tirelessly to ensure that your digital presence not only meets but exceeds your expectations."</p>
                            <p>"Thank you for trusting us with your digital journey. We're excited to continue growing together."</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Careers -->
        <section class="section">
            <div class="careers-container scroll-animate">
                <div class="text-center mb-12">
                    <h2 class="section-title">Join Our Team</h2>
                    <p class="section-subtitle">
                        We're always looking for talented individuals who share our passion for creating exceptional digital experiences.
                    </p>
                </div>

                <div class="careers-grid">
                    <div class="career-card scroll-animate stagger-1">
                        <div class="career-icon">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2-2v2m8 0V6a2 2 0 012 2v6a2 2 0 01-2 2H6a2 2 0 01-2-2V8a2 2 0 012-2V6"></path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold text-gray-800 mb-2">Remote-First</h3>
                        <p class="text-gray-600">Work from anywhere in the world with flexible schedules and modern tools.</p>
                    </div>

                    <div class="career-card scroll-animate stagger-2">
                        <div class="career-icon">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold text-gray-800 mb-2">Great Culture</h3>
                        <p class="text-gray-600">Collaborative and supportive environment where everyone's ideas are valued.</p>
                    </div>

                    <div class="career-card scroll-animate stagger-3">
                        <div class="career-icon">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold text-gray-800 mb-2">Growth Opportunities</h3>
                        <p class="text-gray-600">Continuous learning and development opportunities to advance your career.</p>
                    </div>
                </div>
                <div class="text-center mt-10">
                    <h1></h1>
                    <a href="#" class="btn btn-primary1">View Open Positions</a>
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
    </div> --}}
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
                    let count = parseFloat(counter.innerText) || 0;
                    const increment = target / 100;
                    const updateCount = () => {
                        if (count < target) {
                            count += increment;
                            counter.innerText = Math.min(Math.round(count * 10) / 10, target).toFixed(target % 1 === 0 ? 0 : 1);
                            setTimeout(updateCount, 20);
                        } else {
                            counter.innerText = target.toFixed(target % 1 === 0 ? 0 : 1);
                        }
                    };
                    updateCount();
                });
            }
        });
    }, observerOptions);

    // Observe scroll animation elements
    document.querySelectorAll('.scroll-animate').forEach(el => observer.observe(el));

    // Toggle expanded state for service cards
    const serviceCards = document.querySelectorAll('.service-card');
    serviceCards.forEach(card => {
        card.addEventListener('click', () => {
            if (card.classList.contains('expanded')) {
                card.classList.remove('expanded');
            } else {
                serviceCards.forEach(c => c.classList.remove('expanded'));
                card.classList.add('expanded');
            }
        });
    });

    // Contact Form Handler
    const contactForm = document.getElementById('contactForm');
    const successDiv = document.getElementById('formSuccess');
    const errorDiv = document.getElementById('formError');

    contactForm.addEventListener('submit', function(e) {
        e.preventDefault();

        // Hide previous messages
        successDiv.classList.add('hidden');
        errorDiv.classList.add('hidden');

        // Get form data
        const formData = new FormData(contactForm);

        // Simple validation (already handled by HTML5 required attributes)
        const name = document.getElementById('name').value.trim();
        const email = document.getElementById('email').value.trim();
        const message = document.getElementById('message').value.trim();

        if (!name || !email || !message) {
            errorDiv.textContent = 'Please fill in all required fields.';
            errorDiv.classList.remove('hidden');
            return;
        }

        // Simple email validation
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(email)) {
            errorDiv.textContent = 'Please enter a valid email address.';
            errorDiv.classList.remove('hidden');
            return;
        }

        // Simulate form submission (replace with actual AJAX call)
        fetch( {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                contactForm.reset();
                successDiv.classList.remove('hidden');
                // Scroll to success message
                successDiv.scrollIntoView({ behavior: 'smooth' });
            } else {
                errorDiv.textContent = data.message || 'Something went wrong. Please try again.';
                errorDiv.classList.remove('hidden');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            errorDiv.textContent = 'Network error. Please try again later.';
            errorDiv.classList.remove('hidden');
        });
    });
});
</script>
@endsection
