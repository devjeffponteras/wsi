@extends('theme.main')

@php
    $forceHomeBanner = $forceHomeBanner ?? false;
    $forcePageBanner = $forcePageBanner ?? false;

    if (!$forceHomeBanner && !$forcePageBanner) {
        if (isset($page) && $page->album && $page->album->banners && $page->album->banners->count() > 0) {
            $forceHomeBanner = true;
        } else {
            $forcePageBanner = true;
            if (isset($page) && empty($page->image_url)) {
                $page->image_url = asset('theme/images/banners/no-banner.jpg');
            }
        }
    } elseif ($forcePageBanner && isset($page) && empty($page->image_url)) {
        $page->image_url = asset('theme/images/banners/no-banner.jpg');
    }
@endphp

@section('pagecss')
<link rel="stylesheet" href="{{ asset('theme/css/newstyle.css') }}" type="text/css" />
<style>
/* ======== Feature Cards Section ======== */
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
.feature-cards .i-title {
    font-size: 0.9rem;
    color: #6b7280;
    margin-bottom: 1rem;
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



/* ======== Advanced Solutions Section ======== */
.advanced-solutions-section {
    padding: 4rem 1rem;
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
}
.solution-content {
    padding: 2rem;
}
.solution-title {
    font-size: 1.5rem;
    font-weight: 700;
    color: #1e293b;
    margin-bottom: 0.5rem;
}
.solution-description {
    font-size: 1rem;
    color: #64748b;
    margin-bottom: 1rem;
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
.package-cta a {
    display: inline-block;
    padding: 0.75rem 1.5rem;
    background: linear-gradient(135deg, #049fd9 0%, #0284a5 100%);
    color: #fff;
    text-decoration: none;
    border-radius: 8px;
    font-weight: 600;
    transition: transform 0.3s ease;
}
.package-cta a:hover {
    transform: translateY(-2px);
    color: #fff;
}


@media (min-width: 1200px) {
    .advanced-solutions-grid {
        grid-template-columns: repeat(3, 1fr);
    }
}
@media (max-width: 768px) {
    .feature-cards .card-animate {
        margin-bottom: 1rem;
    }
    .advanced-solutions-grid {
        grid-template-columns: 1fr;
        gap: 2rem;
    }
    .solution-header {
        height: 180px;
    }
}
@media (max-width: 576px) {
    .feature-cards .card-animate {
        padding: 1rem;
        text-align: center;
    }
    .feature-cards .card-image {
        height: 130px;
    }
    .feature-cards .i-tittle {
        font-size: 1.1rem;
    }
    .feature-cards .i-title {
        font-size: 0.85rem;
    }
    .feature-cards .icon-row {
        position: static;
        justify-content: center;
        gap: 0.75rem;
        margin-top: 0.5rem;
    }
    .solution-content {
        padding: 1.5rem 1rem;
    }
    .solution-title {
        font-size: 1.2rem;
    }
    .solution-description {
        font-size: 0.9rem;
    }
    .solution-features li {
        font-size: 0.85rem;
    }
    .package-cta a {
        width: 100%;
        text-align: center;
    }
}


.feature-cards .card-animate {
    min-height: 360px;
}
.solution-card {
    min-height: 620px;
    display: flex;
    flex-direction: column;
}
.solution-content {
    flex-grow: 1;
}
</style>

@endsection

@section('content')
    <!-- Hero Section -->

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

