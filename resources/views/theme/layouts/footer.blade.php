@php
    $contents = Setting::getFooter()->contents;

    $socmed = \App\Models\MediaAccounts::all();

    $socmedHTML = '<div class="mt-4 d-flex justify-content-center gap-3">';
    foreach($socmed as $sm){
        $socmedHTML .= '
            <a href="'.$sm->media_account.'" class="social-icon si-small si-rounded si-colored si-'.$sm->name.'" title="'.$sm->name.'" target="_blank" aria-label="Follow us on '.$sm->name.'">
                <i class="icon-'.$sm->name.'"></i>
                <i class="icon-'.$sm->name.'"></i>
            </a>
        ';
    }
    $socmedHTML .= '</div>';

    $keywords   = ['{Social Media Icons}'];
    $variables  = [$socmedHTML];
    $footerContents = str_replace($keywords, $variables, $contents);
@endphp

{!! $footerContents !!}

<!-- Footer ============================================= -->
<footer id="footer" class="dark" style="background: linear-gradient(135deg, #1e3a8a 0%; padding: 80px 0 20px;">
    <div class="container">
        <div class="row gy-4">
            <!-- Contact with Logo -->
            <div class="col-lg-4 col-md-3">
               <ul class="list-unstyled text-white-50">
                    <a href="{{ url('/') }}" class="standard-logo d-inline-block mb-3 text-center text-md-start">
                    <img src="{{ asset('images/logos/logo-webfocus.png') }}" alt="{{ Setting::info()->company_name ?? 'Company Name' }}" style="max-height: 80px;">
                </a>
                    <li class="mb-3 d-flex align-items-start">
                        <i class="bi bi-geo-alt-fill me-2" style="font-size: 1.2rem; color: #1697f9;"></i>
                        <span>
                            Unit 907-909, Antel Global Corporate Center,<br>
                            Julia Vargas Avenue, Ortigas Center,<br>
                            Pasig City, Philippines
                        </span>
                    </li>
                    <li class="mb-3 d-flex align-items-center">
                        <i class="bi bi-telephone-fill me-2" style="font-size: 1.2rem; color: #1697f9;"></i>
                        <span>
                            +63 (2) 8706-5796
                        </span>
                    </li>
                    <li class="mb-0 d-flex align-items-center">
                        <i class="bi bi-envelope-fill me-2" style="font-size: 1.2rem; color: #1697f9;"></i>
                        <span>
                            <a href="mailto:customercare@webfocus.ph" class="footer-link">customercare@webfocus.ph</a>
                        </span>
                    </li>
                </ul>
            </div>

           <!-- Company Links and Follow Us -->
            <div class="col-lg-4 col-md-4">
                <ul class="list-unstyled footer-list">
                    <br><br><br><li><h4 class="text-white mb-3 fw-bold">Quicklinks</h4></li>
                    <li><a href="#" class="footer-link">Home</a></li>
                    <li><a href="#" class="footer-link">About Us</a></li>
                    <li><a href="#" class="footer-link">Services</a></li>
                    <li><a href="#" class="footer-link">News & Updates</a></li>
                                    {!! $socmedHTML !!}
                </ul>
            </div>

            <!-- Awards -->
            <div class="col-lg-4 col-md-4 text-center">
                <div class="d-flex justify-content-center gap-3">
                    <img src="{{ asset('images/testi/award.png') }}" alt="Award 1" class="award-img" style="max-height: 180px;">
                </div><br>
                    <div class="d-flex justify-content-center gap-3">
                    <img src="{{ asset('images/testi/award2.jpg') }}" alt="Award 2" class="award-img" style="max-height: 120px;">
                </div>
            </div>
        </div>

        <!-- Bottom -->
        <div class="text-center mt-5 pt-4 border-top border-white border-opacity-10">
            <p class="text-white-50 mb-0">Copyright © {{ date('Y') }} All Rights Reserved by Webfocus Solutions Inc.</p><br>
        </div>
    </div>
</footer>

<style>
    /* Footer Styling */
    #footer {
        font-family: 'Inter', sans-serif;
        position: relative;
        overflow: hidden;
    }

    #footer::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: radial-gradient(circle at top left, rgba(255,255,255,0.15), transparent 70%);
        pointer-events: none;
    }

    .footer-link {
        color: #ffffff;
        text-decoration: none;
        transition: all 0.3s ease;
        font-size: 1rem;
        line-height: 2;
    }

    .footer-link:hover {
        color: #f97316;
        text-decoration: none;
        padding-left: 8px;
    }

    .footer-list li {
        margin-bottom: 0.5rem;
    }

    .social-icon {
        width: 40px;
        height: 40px;
        font-size: 1.2rem;
        transition: transform 0.3s ease;
    }

    .social-icon:hover {
        transform: scale(1.2);
    }

    .award-img {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        border-radius: 8px;
        filter: brightness(0.9);
    }

    .award-img:hover {
        transform: scale(1.1);
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
        filter: brightness(1);
    }

    /* Responsive Adjustments */
    @media (max-width: 767px) {
        #footer {
            padding: 40px 0 20px;
        }

        .award-img {
            max-height: 80px;
        }

        .social-icon {
            width: 32px;
            height: 32px;
            font-size: 1rem;
        }
    }
</style>
