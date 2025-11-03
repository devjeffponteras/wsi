@extends('theme.main')

@section('pagecss')
<link rel="stylesheet" href="{{ asset('theme/css/newstyle.css') }}" type="text/css" />
<style>
    /* About Us responsive overrides */


    .hero-content {
        position: relative;
        z-index: 2;
        text-align: center;
        padding: 2rem 1.25rem;
        width: 100%;
        box-sizing: border-box;
    }

    .hero-title {
        color: #fff;
        margin: 0 0 0.5rem 0;
        font-weight: 700;
        line-height: 1.05;
        font-size: clamp(1.8rem, 6vw, 3.2rem);
    }

    .hero-subtitle {
        color: rgba(255,255,255,0.95);
        margin: 0 auto;
        max-width: 900px;
        font-size: clamp(1rem, 2.6vw, 1.25rem);
    }

    /* Ensure any images inside content are fluid */
    .article-body img, .content-wordings img, .card img {
        max-width: 100% !important;
        height: auto !important;
        display: block;
    }

    /* CTA responsive text */
    .section-cta .content-title h1 {
        font-size: clamp(1.6rem, 6vw, 3.2rem) !important;
        line-height: 1.1;
        margin: 0;
    }

    .section-cta .content-description p {
        font-size: clamp(0.95rem, 3.2vw, 1.25rem) !important;
    }

    /* Prevent decorative images from causing horizontal overflow */
    .section-cta { overflow: hidden; }

    .hero-decor { max-width: 770px; width: 42%; height: auto; bottom: 0; }

    /* Contact card responsive */
    .contact-us-page .card {
        width: 100%;
        box-sizing: border-box;
    }

    /* Small screens: hide heavy video, use fallback hero image for performance */
    @media (max-width: 768px) {
        .hero-video { display: none; }
        .hero-section { background-image: url('{{ asset('theme/images/banners/image1.jpg') }}'); background-size: cover; background-position: center; }
        .hero-content { padding: 1.25rem; }
        .hero-title { font-size: clamp(1.6rem, 7vw, 2.2rem); }
        .hero-subtitle { font-size: clamp(0.95rem, 4vw, 1.05rem); }

        /* Ensure CTA stack looks good */
        .contact-us-page .col-md-7, .contact-us-page .col-md-5 { width: 100%; max-width: 100%; }
        .contact-us-page .col-md-5 { margin-top: 12px; }

        /* Make form columns full width and buttons stack */
        .row.g-2 .col-md-6 { width: 100%; max-width: 100%; }
        .row.g-2 .col-md-6 .button.button-3d, .row.g-2 .col-md-6 button.button-3d { width: 100%; }
        .card.p-4 { padding: 1rem; }

        /* Shrink hero decorative svg so it doesn't overflow on mobile */
        .hero-section img.position-absolute { width: 220px !important; left: 4% !important; bottom: 0 !important; }
        .section-cta .hero-decor { display: none !important; }
    }

    /* Extra small phones */
    @media (max-width: 420px) {
        .hero-title { font-size: 1.4rem; }
        .hero-subtitle { font-size: 0.95rem; }
        .section-cta .content-title h1 { font-size: 1.6rem !important; }
        .section-cta .content-description p { font-size: 0.95rem !important; }
        .button.button-3d { width: 100%; padding: 10px 14px; }
        /* Further reduce hero svg on very small phones */
        .hero-section img.position-absolute { width: 160px !important; left: 6% !important; }
        .section-cta .hero-decor { display: none !important; }
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
                Leading IT Solutions <span class="text-white">Since 2001</span>
            </h1>
            <p class="hero-subtitle animate-slide-in-up">
                WebFocus Solutions Inc. is a leading IT solutions company, renowned for innovative, secure, and tailored IT solutions that promote growth, efficiency, and success.
            </p>
        </div>
    </section>

   <!-- Overview Section -->
    {!! $content->contents !!}

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
