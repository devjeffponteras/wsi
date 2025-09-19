@extends('theme.main')

@section('pagecss')
<link rel="stylesheet" href="{{ asset('theme/css/newstyle.css') }}" type="text/css" />
<style>
    /* Additional styles for domain checker and table */
    .domain-checker {
        width: 100%;
        max-width: none;
        padding: 2rem 0;
        background: #fff;
        border-radius: 0;
        box-shadow: none;
        display: none; /* Hidden by default */
    }
    .domain-checker form {
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
        width: 100%;
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 1rem;
    }
    .domain-input {
        padding: 0.75rem;
        border: 1px solid #d1d5db;
        border-radius: 4px;
        font-size: 1rem;
        width: 200px;
    }
    .domain-extension {
        padding: 0.75rem;
        border: 1px solid #d1d5db;
        border-radius: 4px;
        font-size: 1rem;
        width: 100px;
    }
    .domain-table {
        width: 100%;
        max-width: 1200px;
        margin: 2rem auto 0;
        border-collapse: collapse;
    }
    .domain-table th,
    .domain-table td {
        padding: 1rem;
        text-align: left;
        border: 1px solid #e5e7eb;
    }
    .domain-table th {
        background-color: #f3f4f6;
        font-weight: 600;
    }
    .domain-table tr:nth-child(even) {
        background-color: #f9fafb;
    }
    /* Styles for custom domain cards */
    .custom-domain-card {
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
    .custom-domain-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.12);
    }
    .custom-domain-card .card-header {
        display: flex;
        align-items: center;
        margin-bottom: 1.5rem;
    }
    .domain-icon {
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
    .custom-domain-card .card-header h3 {
        font-size: 1.25rem;
        font-weight: 700;
        color: #1f2937;
        margin: 0;
    }
    .custom-domain-card .card-content {
        list-style: none;
        padding: 0;
        margin-bottom: 1.5rem;
        flex-grow: 1;
    }
    .custom-domain-card .card-content li {
        padding: 0.5rem 0;
        border-bottom: 1px solid #f3f4f6;
        color: #6b7280;
    }
    .custom-domain-card .card-content li:last-child {
        border-bottom: none;
    }
    .custom-domain-card .card-footer {
        font-size: 1.5rem;
        font-weight: 800;
        color: #2b56d3;
        margin-bottom: 1rem;
    }
    .custom-domain-card .package-cta {
        width: 100%;
        text-align: center;
    }
    @media (max-width: 1024px) {
        .custom-domain-card {
            margin-bottom: 1rem;
        }
    }
    @media (max-width: 640px) {
        .domain-checker form {
            flex-direction: column;
            gap: 0.5rem;
        }
        .domain-input, .domain-extension, .btn.btn-primary {
            width: 100%;
        }
        .grid-cols-2 {
            grid-template-columns: 1fr; /* Stack cards vertically on small screens */
        }
    }
    /* Enhanced styles for Domain Types table */
    .domain-types-table {
        width: 100%;
        max-width: 1200px;
        margin: 0 auto;
        border-collapse: separate;
        border-spacing: 0;
        background: #ffffff;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
        overflow: hidden;
    }
    .domain-types-table th,
    .domain-types-table td {
        padding: 1.2rem 1.5rem;
        text-align: left;
        border-bottom: 1px solid #e5e7eb;
    }
    .domain-types-table th {
        background-color: #2b56d3;
        color: white;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.05em;
    }
    .domain-types-table tr:last-child td {
        border-bottom: none;
    }
    .domain-types-table tr:hover {
        background-color: #f3f4f6;
        transition: background-color 0.3s ease;
    }
    .domain-types-table .type-cell {
        display: flex;
        align-items: center;
        font-weight: 600;
        color: #1f2937;
    }
    .domain-types-table .type-cell .domain-icon {
        width: 2rem;
        height: 2rem;
        margin-right: 0.75rem;
        font-size: 1rem;
        transition: transform 0.3s ease;
    }
    .domain-types-table tr:hover .domain-icon {
        transform: scale(1.1);
    }
    .domain-types-table .description-cell {
        color: #4b5563;
        font-size: 0.95rem;
    }
    .domain-types-table .extensions-cell {
        font-family: monospace;
        color: #2b56d3;
    }
    /* Styles for See All Domain Price button */
    .see-all-button {
        display: block;
        margin: 1.5rem auto;
        padding: 0.75rem 1.5rem;
        background-color: #2b56d3;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        transition: background-color 0.3s ease, transform 0.3s ease;
    }
    .see-all-button:hover {
        background-color: #1e3a8a;
        transform: translateY(-2px);
    }
    @media (max-width: 640px) {
        .domain-types-table {
            display: block;
            overflow-x: auto;
        }
        .domain-types-table th,
        .domain-types-table td {
            min-width: 150px;
        }
    }
</style>
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
            <table class="domain-types-table scroll-animate">
                <thead>
                    <tr>
                        <th>Type</th>
                        <th>Description</th>
                        <th>Extensions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="type-cell"><div class="domain-icon"><i class="fas fa-globe-americas"></i></div> Top Level Domains</td>
                        <td class="description-cell">Globally recognized extensions perfect for businesses and organizations</td>
                        <td class="extensions-cell">.com, .net, .org</td>
                    </tr>
                    <tr>
                        <td class="type-cell"><div class="domain-icon"><i class="fas fa-briefcase"></i></div> Hybrid Top Level Domains</td>
                        <td class="description-cell">Niche extensions for industries, ideal for mobile-friendly sites</td>
                        <td class="extensions-cell">.biz, .info, .mobi, .pro, .asia, .online</td>
                    </tr>
                    <tr>
                        <td class="type-cell"><div class="domain-icon"><i class="fas fa-map-marker-alt"></i></div> Country Level Domains</td>
                        <td class="description-cell">Local presence for Philippines, ideal for region-specific businesses</td>
                        <td class="extensions-cell">.ph, .com.ph, .net.ph, .org.ph</td>
                    </tr>
                    <tr>
                        <td class="type-cell"><div class="domain-icon"><i class="fas fa-graduation-cap"></i></div> Education Domains</td>
                        <td class="description-cell">Exclusive for educational institutions, establishes credibility</td>
                        <td class="extensions-cell">.edu.ph</td>
                    </tr>
                </tbody>
            </table>
            <button class="see-all-button" id="toggleDomainChecker">See All Domain Price</button>
        </div>
    </section>

    <!-- Domain Checker -->
    <section class="section domain-checker">
        <div class="container mx-auto px-6">
            <div class="text-center mb-12 scroll-animate">
                <h2 class="section-title">Find Your Domain Now</h2>
                <p class="section-subtitle">
                    Enter your desired domain name to check its availability and secure it before someone else does.
                </p>

                <form class="flex flex-row gap-2 items-center">
                    <input type="text" class="domain-input" placeholder="Enter your domain (e.g., mybusiness)" aria-label="Domain name input">
                    <select class="domain-extension" aria-label="Domain extension">
                        <option value=".com">.com</option>
                        <option value=".net">.net</option>
                        <option value=".org">.org</option>
                        <option value=".ph">.ph</option>
                        <option value=".info">.info</option>
                    </select>
                    <button type="submit" class="btn btn-primary" onclick="console.log('Check Domain Availability clicked')">Check Availability</button>
                </form>
                <table class="domain-table">
                    <thead>
                        <tr>
                            <th>TLD</th>
                            <th>Register</th>
                            <th>Renew</th>
                            <th>Transfer</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>.com</td>
                            <td>$10.99/yr</td>
                            <td>$12.99/yr</td>
                            <td>$9.99</td>
                        </tr>
                        <tr>
                            <td>.net</td>
                            <td>$12.99/yr</td>
                            <td>$14.99/yr</td>
                            <td>$10.99</td>
                        </tr>
                        <tr>
                            <td>.org</td>
                            <td>$11.99/yr</td>
                            <td>$13.99/yr</td>
                            <td>$10.49</td>
                        </tr>
                        <tr>
                            <td>.ph</td>
                            <td>$15.99/yr</td>
                            <td>$16.99/yr</td>
                            <td>$12.99</td>
                        </tr>
                        <tr>
                            <td>.info</td>
                            <td>$9.99/yr</td>
                            <td>$11.99/yr</td>
                            <td>$8.99</td>
                        </tr>
                    </tbody>
                </table>
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

    // Toggle Domain Checker visibility
    const toggleButton = document.getElementById('toggleDomainChecker');
    const domainChecker = document.querySelector('.domain-checker');
    toggleButton.addEventListener('click', function() {
        if (domainChecker.style.display === 'none' || domainChecker.style.display === '') {
            domainChecker.style.display = 'block';
        } else {
            domainChecker.style.display = 'none';
        }
    });
});
</script>
@endsection
