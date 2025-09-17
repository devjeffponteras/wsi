
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
                Establish Your Online Presence <span class="text-white">with a Custom Domain</span>
            </h1>
            <p class="hero-subtitle animate-slide-in-up">
                A domain name is your website’s address and the foundation of your online brand. Secure yours today and connect with millions worldwide.
            </p>
            <a href="#check-domain" class="btn btn-primary animate-slide-in-up" onclick="console.log('Check Domain Availability clicked')">Check Availability</a>
        </div>
    </section>

    <!-- Why a Custom Domain Matters -->
    <section class="section">
        <div class="container mx-auto px-6">
            <div class="text-center mb-12 scroll-animate">
                <h2 class="section-title">Why a Custom Domain Matters</h2>
                <p class="section-subtitle">
                    A unique domain name ensures your place in the digital world, establishes credibility, and sets the stage for online success.
                </p>
            </div>
            <div class="benefits-grid scroll-animate">
                <!-- Row 1 -->
                <div class="modern-card stagger-1">
                    <i class="fas fa-globe domain-icon"></i>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Build Your Brand</h3>
                    <p class="text-gray-600 text-sm">A custom domain strengthens your brand identity, making it memorable and professional.</p>
                </div>
                <div class="modern-card stagger-2">
                    <i class="fas fa-search domain-icon"></i>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Boost SEO</h3>
                    <p class="text-gray-600 text-sm">Relevant domain names improve search engine rankings, driving more traffic to your site.</p>
                </div>
                <!-- Row 2 -->
                <div class="modern-card stagger-3">
                    <i class="fas fa-shield-alt domain-icon"></i>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Earn Trust</h3>
                    <p class="text-gray-600 text-sm">A professional domain builds customer confidence and trust in your business.</p>
                </div>
                <div class="modern-card stagger-4">
                    <i class="fas fa-cogs domain-icon"></i>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Flexible Options</h3>
                    <p class="text-gray-600 text-sm">Choose from a variety of extensions to match your business goals and audience.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Domain Types -->
    <section class="section" style="background: linear-gradient(135deg, #f0f9ff, #ffffff);">
        <div class="container mx-auto px-6">
            <div class="text-center mb-12 scroll-animate">
                <h2 class="section-title">Choose Your Perfect Domain</h2>
                <p class="section-subtitle">
                    Don’t wait—someone else might claim your ideal domain name! Explore our diverse range of domain extensions.
                </p>
            </div>
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6 scroll-animate">
                <div class="domain-card stagger-1">
                    <i class="fas fa-globe-americas domain-icon"></i>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Top Level Domains</h3>
                    <p class="text-gray-600 text-sm">Globally recognized extensions like <strong>.com</strong>, <strong>.net</strong>, and <strong>.org</strong> are perfect for businesses, organizations, and individuals seeking a universal presence.</p>
                </div>
                <div class="domain-card stagger-2">
                    <i class="fas fa-briefcase domain-icon"></i>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Hybrid Top Level Domains</h3>
                    <p class="text-gray-600 text-sm">Niche extensions like <strong>.biz</strong>, <strong>.info</strong>, <strong>.mobi</strong>, <strong>.pro</strong>, <strong>.asia</strong>, and <strong>.online</strong> cater to specific industries or mobile-friendly sites.</p>
                </div>
                <div class="domain-card stagger-3">
                    <i class="fas fa-map-marker-alt domain-icon"></i>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Country Level Domains</h3>
                    <p class="text-gray-600 text-sm">Localize your presence with extensions like <strong>.ph</strong>, <strong>.com.ph</strong>, <strong>.net.ph</strong>, and <strong>.org.ph</strong> for Philippines-based businesses.</p>
                </div>
                <div class="domain-card stagger-4">
                    <i class="fas fa-graduation-cap domain-icon"></i>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Education Domains</h3>
                    <p class="text-gray-600 text-sm">Exclusive for educational institutions, <strong>.edu.ph</strong> establishes credibility for schools and universities in the Philippines.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Domain Checker -->
    <section class="section">
        <div class="container mx-auto px-6">
            <div class="text-center mb-12 scroll-animate">
                <h2 class="section-title">Find Your Domain Now</h2>
                <p class="section-subtitle">
                    Enter your desired domain name to check its availability and secure it before someone else does.
                </p>
            </div>
            <div class="domain-checker scroll-animate">
                <form class="flex flex-col sm:flex-row gap-4 items-center">
                    <input type="text" class="domain-input" placeholder="Enter your domain (e.g., mybusiness.com)" aria-label="Domain name input">
                    <h1></h1>
                    <button type="submit" class="btn btn-primary" onclick="console.log('Check Domain Availability clicked')">Check Availability</button>
                </form>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="section" style="background: linear-gradient(135deg, #f0f9ff, #ffffff);">
        <div class="container mx-auto px-6">
            <div class="text-center mb-12 scroll-animate">
                <h2 class="section-title">Frequently Asked Questions</h2>
                <p class="section-subtitle">
                    Got questions about domain registration? We’ve got answers.
                </p>
            </div>
            <div class="scroll-animate">
                <div class="faq-item stagger-1">
                    <h3 class="faq-question">How do I choose a domain name?</h3>
                    <p class="faq-answer">Select a domain name that reflects your brand, is easy to remember, and includes relevant keywords for SEO. Keep it short and avoid complex characters.</p>
                </div>
                <div class="faq-item stagger-2">
                    <h3 class="faq-question">What happens if my domain is taken?</h3>
                    <p class="faq-answer">If your desired domain is unavailable, try variations (e.g., adding a word or using a different extension like .co or .online). We can also help you negotiate with the current owner.</p>
                </div>
                <div class="faq-item stagger-3">
                    <h3 class="faq-question">How long does it take to register a domain?</h3>
                    <p class="faq-answer">Domain registration is typically instant once payment is confirmed, though some extensions (e.g., .edu.ph) may require additional verification.</p>
                </div>
                <div class="faq-item stagger-4">
                    <h3 class="faq-question">Can I transfer my domain to WebFocus?</h3>
                    <p class="faq-answer">Yes, we support seamless domain transfers. Contact our team to initiate the process and ensure no downtime for your website.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="section-cta">
        <div class="cta-container scroll-animate">
            <div class="cta-content">
                <h2 class="text-3xl sm:text-4xl font-bold mb-4">Secure Your Domain Today</h2>
                <p class="text-lg text-white/90 max-w-2xl mx-auto mb-6">
                    Don’t let your perfect domain slip away. Partner with WebFocus Solutions Inc. to establish your online presence now.
                </p>
                <div class="cta-button-group">
                    <a href="#check-domain" class="btn btn-primary" onclick="console.log('Get Started Now clicked')">Get Started Now</a>
                    <a href="#contact" class="btn btn-glass">Contact Us</a>
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
