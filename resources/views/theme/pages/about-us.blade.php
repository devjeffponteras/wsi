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
