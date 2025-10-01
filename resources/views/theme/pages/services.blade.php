@extends('theme.main')

@section('pagecss')
<link rel="stylesheet" href="{{ asset('theme/css/newstyle.css') }}" type="text/css" />
<style>
    /* Additional styles for image cards */
    .feature-cards .card-animate {
        position: relative;
        text-decoration: none;
        color: inherit;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        padding: 1.5rem;
        border-radius: 8px;
        background: #fff;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        margin-bottom: 1rem;
    }
    .feature-cards .card-animate:hover {
        transform: translateY(-5px);
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
    }
    .feature-cards .card-image {
        width: 100%;
        height: 150px;
        object-fit: cover;
        border-radius: 8px 8px 0 0;
        margin-bottom: 1rem;
    }
    .feature-cards .i-tittle {
        font-size: 1.25rem;
        font-weight: 600;
        color: #1f2937;
        margin-bottom: 0.5rem;
    }
    .feature-cards .i-description {
        font-size: 0.9rem;
        color: #6b7280;
        margin-bottom: 1rem;
        opacity: 1; /* Ensure description is always visible */
        visibility: visible; /* Explicitly set visibility */
        display: block; /* Ensure it displays as a block under the title */
        transition: none; /* Remove any transitions that might affect visibility */
    }
    .feature-cards .card-animate:hover .i-description {
        opacity: 1; /* Ensure description remains visible on hover */
        visibility: visible;
        display: block; /* Maintain block display on hover */
    }
    .feature-cards .icon-row {
        display: flex;
        justify-content: space-between;
        align-items: center;
        position: absolute;
        bottom: -0.5rem;
        left: 1rem;
        right: 1rem;
    }
    .feature-cards .i-animate {
        font-size: 1.5rem;
        transition: transform 0.3s ease;
    }
    .feature-cards .card-animate:hover .i-animate {
        transform: scale(1.1);
    }
    @media (max-width: 768px) {
        .feature-cards .card-animate {
            margin: 0 0 1rem 0;
        }
        .feature-cards .icon-row {
            flex-direction: column;
            gap: 0.5rem;
            bottom: 0.5rem;
        }
    }

    /* New Styles for Advanced Solutions Section */
    .advanced-solutions-section {
        padding: 4rem 0;
        background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
    }
    .advanced-solutions-grid {
        max-width: 1200px;
        margin: 0 auto;
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
        gap: 2.5rem;
    }
    .solution-card {
        background: #fff;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
        transition: transform 0.4s ease, box-shadow 0.4s ease;
        position: relative;
    }
    .solution-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 12px 35px rgba(0, 0, 0, 0.12);
    }
    .solution-header {
        position: relative;
        height: 200px;
        overflow: hidden;
    }
    .solution-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.4s ease;
    }
    .solution-card:hover .solution-image {
        transform: scale(1.05);
    }
    .solution-badge {
        position: absolute;
        top: 1rem;
        left: 1rem;
        background: #2b56d3;
        color: #fff;
        padding: 0.5rem 1rem;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    .solution-content {
        padding: 2rem;
    }
    .solution-title {
        font-size: 1.5rem;
        font-weight: 700;
        color: #1e293b;
        margin-bottom: 0.5rem;
        line-height: 1.3;
    }
    .solution-description {
        font-size: 1rem;
        color: #64748b;
        margin-bottom: 1rem;
        line-height: 1.5;
    }
    .solution-features {
        list-style: none;
        padding: 0;
        margin-bottom: 1.5rem;
    }
    .solution-features li {
        display: flex;
        align-items: center;
        margin-bottom: 0.75rem;
        color: #64748b;
        font-size: 0.95rem;
    }
    .solution-features li::before {
        content: '✓';
        margin-right: 0.75rem;
        color: #10b981;
        font-weight: bold;
        font-size: 1.1rem;
    }
    .solution-cta {
        display: inline-block;
        padding: 0.75rem 1.5rem;
        background: linear-gradient(135deg, #049fd9 0%, #0284a5 100%);
        color: #fff;
        text-decoration: none;
        border-radius: 8px;
        font-weight: 600;
        transition: transform 0.3s ease;
    }
    .solution-cta:hover {
        transform: translateY(-2px);
        color: #fff;
    }
    @media (max-width: 768px) {
        .advanced-solutions-grid {
            grid-template-columns: 1fr;
            gap: 2rem;
        }
        .solution-header {
            height: 180px;
        }
        .solution-title {
            font-size: 1.3rem;
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
            <a href="#" class="card-animate position-relative col-12 col-md-4">
                 <img src="{{ asset('images/services/domain1.jpg') }}" alt="Domain Image" class="card-image">
                <h5 class="i-tittle">Domain</h5>
                <p class="i-title">Claim your unique online identity with a custom domain name tailored to your brand.</p>
                <div class="icon-row">
                    <i class="icon-world i-animate"></i>
                    <i class="icon-line-arrow-right i-animate"></i>
                </div>
            </a>
            <a href="#" class="card-animate position-relative col-12 col-md-4">
                 <img src="{{ asset('images/services/hosting.jpg') }}" alt="Hosting Image" class="card-image">
                <h5 class="i-tittle">Hosting</h5>
                <p class="i-title">Reliable, high-performance hosting solutions for websites of all sizes.</p>
                <div class="icon-row">
                    <i class="icon-share1 i-animate"></i>
                    <i class="icon-line-arrow-right i-animate"></i>
                </div>
            </a>
            <a href="#" class="card-animate position-relative col-12 col-md-4">
                <img src="{{ asset('images/services/web.jpg') }}" alt="Web Development Image" class="card-image">
                <h5 class="i-tittle">Web Development</h5>
                <p class="i-title">Custom web solutions that combine stunning design with robust functionality.</p>
                <div class="icon-row">
                    <i class="icon-cloudversify i-animate"></i>
                    <i class="icon-line-arrow-right i-animate"></i>
                </div>
            </a>
        </div>
    </div>

    <!-- Advanced Solutions Section -->
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
                        <p class="solution-description">Streamline your document workflows with FileHold 2.0, offering secure storage, automation, and compliance.</p>
                        <ul class="solution-features">
                            <li>Secure workflow automation with FileHold 2.0</li>
                            <li>Advanced search and compliance tools</li>
                            <li>Seamless integration with existing systems</li>
                            <li>Reduce operational costs by up to 40%</li>
                        </ul>
                        <div class="package-cta">
                            <a href="{{-- route('hosting.cloud-packages') --}}" class="btn btn-primary">Learn More</a>
                        </div>
                    </div>
                </div>

                <div class="solution-card">
                    <div class="solution-header">
                        <img src="{{ asset('images/services/chm.jpg') }}" alt="Cloud Solutions" class="solution-image">
                        <div class="solution-badge">Scalable</div>
                    </div>
                    <div class="solution-content">
                        <h3 class="solution-title">Cloud Hosting & Migration</h3>
                        <p class="solution-description">Effortlessly scale your operations with our flexible cloud hosting and seamless migration services.</p>
                        <ul class="solution-features">
                            <li>Hybrid and private cloud deployments</li>
                            <li>Zero-downtime migration services</li>
                            <li>Auto-scaling for peak performance</li>
                            <li>Cost-optimized resource allocation</li>
                        </ul>
                        <div class="package-cta">
                            <a href="{{-- route('hosting.cloud-packages') --}}" class="btn btn-primary">Learn More</a>
                        </div>
                    </div>
                </div>

                <div class="solution-card">
                    <div class="solution-header">
                        <img src="{{ asset('images/services/cc.jpg') }}" alt="Cybersecurity" class="solution-image">
                        <div class="solution-badge">Secure</div>
                    </div>
                    <div class="solution-content">
                        <h3 class="solution-title">Cybersecurity & Compliance</h3>
                        <p class="solution-description">Protect your business with advanced cybersecurity measures and compliance solutions tailored to your needs.</p>
                        <ul class="solution-features">
                            <li>Proactive threat detection and response</li>
                            <li>GDPR and HIPAA compliance audits</li>
                            <li>Endpoint protection and firewall management</li>
                            <li>Regular vulnerability assessments</li>
                        </ul>
                        <div class="package-cta">
                            <a href="{{-- route('hosting.cloud-packages') --}}" class="btn btn-primary">Learn More</a>
                        </div>
                    </div>
                </div>
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
        <img class="position-absolute" src="/images/hero.svg" style="transform: rotateY(180deg); bottom: 0; left: 10%;width: 770px;">
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

