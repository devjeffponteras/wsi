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
                    <div class="company-overview">
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-3 text-center">Who We Are</h3>
                    <div class="who-we-are-text">
                        <p class="scroll-animate stagger-1">WebFocus Solutions, Inc., is a Philippine-based digital company, established in 2001, offering innovative, cost-effective IT software solutions to over a thousand clients.</p>
                        <p class="scroll-animate stagger-2">Our approach is to provide personalized digital solutions tailored to a company's needs and budget. We aim to maintain our premium brand in the IT industry and help customers integrate technological advancements for a competitive advantage.</p>
                        <p class="scroll-animate stagger-3">We invest in up-to-date infrastructure and software applications, ensuring our people are adapted to technological updates. We prioritize security, providing tools and education to protect customers and online assets. Our online support team offers 24/7 support to ensure customer satisfaction.</p>
                    </div>
                </div>

                <!-- Our Achievements -->
                <div class="company-overview-card">
                    <div class="company-overview-">
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-3 text-center">Our Achievements</h3>
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
                <div class="feature feature">
                </div>
                <h3 class="text-2xl font-bold text-gray-800 mb-4 text-center">What We Do</h3>
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
                    <div class="mission-vision">
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-3 text-center">Our Mission</h3>
                    <div class="space-y-3 text-gray-600">
                        <p>To develop and provide customized, scalable, modular, and cost-effective Web and Mobile Application Development, Digital Marketing, Domain and Hosting, Infrastructure Installation, and Business Solutions including Managed I.T. and Professional Services.</p>
                        <p>To establish ourselves as a reliable partner of startups to SMEs, providing innovative solutions to specific needs.</p>
                        <p>To provide highly-skilled I.T. professionals and dedicated 24/7 support to ensure customer security and customer satisfaction.</p>
                    </div>
                </div>

                <div class="mission-vision-card">
                    <div class="mission-vision- mission-vision">
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-3 text-center">Our Vision</h3>
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
                    At WebFocus Solutions Inc., we believe that IT solutions should be more than just functional—they should be innovative, secure, and tailored to each client’s needs. Our approach is guided by five core principles ensuring top-tier service, cutting-edge technology, and long-term business success.
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
                <a href="#" class="btn btn-primary">View Open Positions</a>
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
});
</script>
@endsection
