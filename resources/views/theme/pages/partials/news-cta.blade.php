<!-- CTA Section extracted from news page -->
@php
    $ctaHeading = $ctaHeading ?? 'Power up your <br/> growth today.';
    $ctaDescription = $ctaDescription ?? 'Drop us a line and guide you to the right solution';
    $ctaHeroSrc = $ctaHeroSrc ?? asset('images/hero.svg');
    $ctaHeroClass = $ctaHeroClass ?? 'cta-hero position-absolute';
    $ctaHeroStyle = $ctaHeroStyle ?? 'transform: rotateY(180deg); left: 10%; bottom: 0;';
    $ctaButtonStyle = $ctaButtonStyle ?? 'background-color: #2b56d3;';
@endphp
<section class="section-cta position-relative">
    <style>
        .section-cta {
            overflow: hidden;
        }

        .section-cta .cta-hero {
            max-width: 770px;
            width: 42%;
            height: auto;
            bottom: 0;
        }

        @media (max-width: 768px) {
            .section-cta .cta-hero {
                display: none !important;
            }
        }
    </style>
    <div class="cta-container scroll-animate">
        <div class="cta-content">
            <div class="row col-12 contact-us-page">
                <div class="col-12 col-md-7">
                    <div class="content-wordings">
                        <div class="content-title">
                            <h1 style="font-size: 58px;" class="text-white mb-3"><b>{!! $ctaHeading !!}</b></h1>
                        </div>
                        <div class="content-description">
                            <p style="font-size: 22px;">{!! $ctaDescription !!}</p>
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
                                        <button name="submit" type="submit" id="submit-button" tabindex="5" value="Submit" class="button button-3d m-0" href="javascript:void(0)" onclick="document.getElementById('contactUsForm').submit()" style="{{ $ctaButtonStyle }}">
                                            <i class="bi-send" style="margin-right: 5px;"></i> Submit
                                        </button>
                                    </div>
                                    <div class="col-md-6 d-flex justify-content-end">
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
    <img class="{{ $ctaHeroClass }}" src="{{ $ctaHeroSrc }}" style="{{ $ctaHeroStyle }}">
</section>
