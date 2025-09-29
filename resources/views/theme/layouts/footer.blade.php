@php
    $contents = Setting::getFooter()->contents;

    $socmed = \App\Models\MediaAccounts::all();

    $socmedHTML = '<div class="mt-4 d-flex justify-content-center gap-2">';
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
<footer id="footer" class="dark" style="background: linear-gradient(135deg, #1e3a8a 0%; padding: 80px 0 50px;">
    <div class="container">
        <div class="row gy-5">
            <!-- Contact -->
            <div class="col-lg-3 col-md-6">
                <h4 class="text-white mb-4 fw-bold">Contact Us</h4>
                <p class="text-white-50 mb-3">
                    <strong>Office:</strong><br>
                    Unit 907-909<br> Antel Global Corporate Center,<br>
                    Julia Vargas Avenue, Ortigas Center,<br>
                    Pasig City, Philippines
                </p>
                <p class="text-white-50 mb-3">
                    <strong>Telephone:</strong><br>
                    +63 (2) 8706-6144,<br> 8706-5796, 8511-0528<br>
                    +63 (2) 8709-8061, 8806-5201
                </p>
                <p class="text-white-50 mb-3">
                    <strong>Mobile:</strong><br>
                    +63 908 869 4069 (Smart)<br>
                    +63 917 569 7380 (Globe)<br>
                    +63 922 330 8373 (Sun)
                </p>
                <p class="text-white-50 mb-0">
                    <strong>Email:</strong><br>
                    <a href="mailto:sales@webfocus.ph" class="footer-link">sales@webfocus.ph</a><br>
                    <a href="mailto:marketing@webfocus.ph" class="footer-link">marketing@webfocus.ph</a><br>
                    <a href="mailto:billing@webfocus.ph" class="footer-link">billing@webfocus.ph</a><br>
                    <a href="mailto:customercare@webfocus.ph" class="footer-link">customercare@webfocus.ph</a><br>
                    <a href="mailto:support@webfocus.ph" class="footer-link">support@webfocus.ph</a>
                </p>
            </div>

            <!-- Company Links -->
            <div class="col-lg-3 col-md-6"><br>
                <h4 class="text-white mb-4 fw-bold">Company</h4>
                <ul class="list-unstyled footer-list">
                    <a href="#" class="footer-link">History</a><br>
                    <a href="#" class="footer-link">Mission & Vision</a><br>
                    <a href="#" class="footer-link">Our Company</a><br>
                    <a href="#" class="footer-link">Message from the CEO</a><br>
                </ul>

                <h4 class="text-white mt-5 mb-3 fw-bold">Hosting</h4>
                <ul class="list-unstyled footer-list">
                    <a href="#" class="footer-link">Shared Cloud Hosting</a><br>
                    <a href="#" class="footer-link">Dedicated Cloud Hosting</a><br>
                    <a href="#" class="footer-link">Dedicated Bare-Metal Hosting</a><br>
                </ul>

                <h4 class="text-white mt-5 mb-3 fw-bold">Domains</h4>
                <ul class="list-unstyled footer-list">
                    <a href="#" class="footer-link">Top-Level Domain</a><br>
                    <a href="#" class="footer-link">Hybrid TLD</a><br>
                    <a href="#" class="footer-link">Country-Level Domain</a><br>
                    <a href="#" class="footer-link">Education Domain</a><br>
                    <a href="#" class="footer-link">Government Domain</a><br>
                </ul>
            </div>

            <!-- Services & Social -->
            <div class="col-lg-3 col-md-6">
                <h4 class="text-white mb-4 fw-bold">Web Development</h4>
                <ul class="list-unstyled footer-list">
                    <li><a href="#" class="footer-link">Web Design & Development</a></li>
                    <li><a href="#" class="footer-link">E-Commerce Solutions</a></li>
                </ul>

                <h4 class="text-white mt-5 mb-3 fw-bold">Document Management</h4>
                <ul class="list-unstyled footer-list">
                    <li><a href="#" class="footer-link">FileHold</a></li>
                    <li><a href="#" class="footer-link">Docukit</a></li>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                </ul>
            </div>
            <!-- Awards & Social Media -->
            <div class="col-lg-3 col-md-6 text-center">
                <h4 class="text-white mb-4 fw-bold">Social Links</h4>
                {!! $socmedHTML !!}<br>
                <br>
                <div class="d-flex justify-content-center gap-3">
                    <img src="{{ asset('images/testi/award.png') }}" alt="Award 1"
                         class="award-img" style="max-height: 200px;"></div>
                         <div><br>
                    <img src="{{ asset('images/testi/award2.jpg') }}" alt="Award 2"
                         class="award-img" style="max-height: 100px;">
                </div>
                <br>
                <br>
                <br>
                <br>
            </div>
        </div>

        <!-- Bottom -->
        <div class="text-center mt-5 pt-4 border-top border-white border-opacity-10">
            <a href="{{ url('/') }}" class="standard-logo d-inline-block mb-3">
                <img src="{{ asset('images/logos/logo-webfocus.png') }}"
                     alt="{{ Setting::info()->company_name ?? 'Company Name' }}">
            </a>
            <p class="text-white-30 mb-0">Copyright © {{ date('Y') }}
                All Rights Reserved by Webfocus Inc.</p>
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
        background: radial-gradient(circle at top left, rgba(255,255,255,0.1), transparent 70%);
        pointer-events: none;
    }

    .footer-link {
        color: #ffffff;
        text-decoration: none;
        transition: all 0.3s ease;
        font-size: 0.95rem;
        line-height: 1.8;
    }

    .footer-link:hover {
        color: #f97316;
        text-decoration: none;
        padding-left: 5px;
    }

    .footer-list li {
        margin-bottom: 0.75rem;
    }

    .award-img {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        border-radius: 8px;
    }

    .award-img:hover {
        transform: scale(1.15);
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
    }



    /* Responsive Adjustments */
    @media (max-width: 767px) {
        #footer {
            padding: 50px 0 30px;
        }


        .award-img {
            max-height: 80px;
        }
    }
</style>
