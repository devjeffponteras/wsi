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
                    <img src="{{ asset('images/logos/white-wsi-logo.png') }}" alt="{{ Setting::info()->company_name ?? 'Company Name' }}" style="max-height: 100px;">
                </a>
                    <li class="mb-3 d-flex align-items-start">
                        <i class="bi bi-geo-alt-fill me-2" style="font-size: 1.2rem; color: #1697f9;"></i>
                        <span style="color: white;">
                            Unit 907-909, Antel Global Corporate Center,<br>
                            Julia Vargas Avenue, Ortigas Center,<br>
                            Pasig City, Philippines
                        </span>
                    </li>
                    <li class="mb-3 d-flex align-items-center">
                        <i class="bi bi-telephone-fill me-2" style="font-size: 1.2rem; color: #1697f9;"></i>
                        <span style="color: white;">
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
                    <li><a href="{{ url('/') }}" class="footer-link">Home</a></li>
                    <li><a href="{{ url('/about-us') }}" class="footer-link">About Us</a></li>
                    <li><a href="{{ url('/services') }}" class="footer-link">Services</a></li>
                    <li><a href="{{ url('/news') }}" class="footer-link">News & Updates</a></li>
                </ul>
                {!! $socmedHTML !!}
            </div>

            <!-- Awards -->
            <div class="col-lg-4 col-md-4 text-center">
                <div class="d-flex justify-content-center gap-3">
                    <img src="{{ asset('images/testi/award.png') }}" alt="Award 1" class="award-img" style="max-height: 200px;">
                </div>
                <br>
                <div class="col-lg-4 col-md-4 text-center">
                <div class="d-flex justify-content-center gap-3">
                    <img src="{{ asset('images/testi/award2.jpg') }}" alt="Award 2" class="award-img" style="max-height: 180px;">
                </div>
             </div>
            </div>


        </div>

        <!-- Bottom -->
        <div class="text-center mt-5 pt-4 border-top border-white border-opacity-10">
            <p class="text-white-50 mb-0">Copyright © {{ date('Y') }} Webfocus Solutions Inc. All Rights Reserved.</p><br>
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
        /* Reduce vertical spacing on narrow mobile screens */
        #footer {
            padding: 20px 0 10px;
        }

        .award-img {
            max-height: 64px;
        }

        .social-icon {
            width: 28px;
            height: 28px;
            font-size: 0.95rem;
        }

        /* Tighten footer list spacing */
        .footer-list li {
            margin-bottom: 0.25rem;
            padding: 0;
        }
    }
    /* Additional mobile responsiveness */
    @media (max-width: 992px) {
        /* Stack columns but keep vertical spacing modest */
        #footer .container .row {
            display: flex;
            flex-direction: column;
            gap: 0;
        }

        #footer .col-lg-4, #footer .col-md-4 {
            width: 100% !important;
            max-width: 100% !important;
            padding-left: 0 !important;
            padding-right: 0 !important;
            margin-bottom: 0 !important;
        }

        /* Footer lists center on small screens */
        .footer-list {
            text-align: center;
            padding-left: 0;
        }

        .footer-list li {
            display: block;
            margin-bottom: 0.15rem;
            padding: 0;
        }

        .footer-link {
            display: inline-block;
            font-size: 0.94rem;
        }

        /* Latest news block spacing (remove extra vertical margins) */
        #footer-news-quicklinks .footer-quicklinks-list div {
            margin: 0;
            padding: 0;
        }

        /* Center social icons and awards */
        .social-icon, .award-img {
            margin-left: auto;
            margin-right: auto;
            display: inline-block;
        }

        /* Reduce bottom copyright spacing */
        .text-center.mt-5.pt-4 {
            padding-top: 0;
            margin-top: 0;
        }
    }

    @media (max-width: 420px) {
        .footer-link { font-size: 0.9rem; }
        .award-img { max-height: 48px; }
        .social-icon { width: 22px; height: 22px; }

        /* Extra-tight spacing for very small screens */
        #footer { padding: 8px 0 6px; }
        #footer .container .row { gap: 0; }

        /* Ensure child blocks don't add spacing */
        #footer .col-lg-4 > *,
        #footer .col-md-4 > * {
            margin-bottom: 0 !important;
            padding-bottom: 0 !important;
        }
    }

    /* Remove any residual margins on stacked footer blocks */
    @media (max-width: 992px) {
        #footer .footer-block { margin-bottom: 0 !important; padding-bottom: 0 !important; }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Listen for header menu clicks and update footer quicklinks if news-related
        document.querySelectorAll('a.menu-link').forEach(link => {
            link.addEventListener('click', function(e) {
                try {
                    const href = this.getAttribute('href') || '';
                    // Only handle links that point to news or news categories
                    if (href.includes('/news')) {
                        // If it's exactly '/news' or contains '/news/' followed by slug
                        const parts = href.replace(window.location.origin, '').split('/').filter(Boolean);
                        let slug = 'all';
                        const newsIndex = parts.indexOf('news');
                        if (newsIndex !== -1 && parts.length > newsIndex + 1) {
                            slug = parts[newsIndex + 1];
                        }

                        fetch(`{{ url('/news/quick-links') }}/${slug}`)
                            .then(r => r.json())
                            .then(data => {
                                const container = document.querySelector('#footer-news-quicklinks .footer-quicklinks-list');
                                if (!container) return;
                                if (Array.isArray(data) && data.length > 0) {
                                    container.innerHTML = data.map(item => `<div><a class="footer-link" href="/news/${item.slug}">${item.name}</a></div>`).join('');
                                } else {
                                    container.innerHTML = '<div class="text-white-50">No recent articles available.</div>';
                                }
                            })
                            .catch(err => console.error('Failed to load footer quicklinks', err));
                    }
                } catch (err) {
                    console.error(err);
                }
            });
        });
    });
</script>
