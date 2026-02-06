@extends('theme.main')

@section('pagecss')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css">
@endsection

@php
    $contents = $page->contents;

// LATEST NEWS
    $featuredArticles = \App\Models\News::where('is_featured', 1)->where('status', 'Published')->skip(0)->take(3)->get();
    if($featuredArticles->count()) {

        $featuredArticlesHTML = '';

        $prefooter = asset('theme/images/pre-footer.jpg');

        foreach ($featuredArticles as $index => $article) {
            $imageUrl = (empty($article->thumbnail_image)) ? asset('theme/images/misc/no-image.jpg') : $article->thumbnail;


            $featuredArticlesHTML .= '

                <div class="slide" data-thumb="'. $imageUrl .'">
                    <div class="d-block position-relative">
                        <div class="row">
                            <div class="col-md-6 half-one position-default">
                                <div class="floating-panel">
                                    <h2 class="h2 fw-semibold lh-base featured-article-title">'. $article->name .'</h2>
                                    <small class="featured-article-meta">Date posted: '. $article->date_posted() .'</small>
                                    <p class="text-muted mt-4">'. $article->teaser .'</p>
                                    <a href="'. $article->get_url() .'" class="button button-3d button-mini button-rounded button-blue">Learn More &nbsp; ></a>
                                </div>
                            </div>
                            <div class="col-md-6 p-5">
                                <img class="rounded-corners" src="'. $imageUrl .'" alt="'. htmlspecialchars($article->name) .'">
                            </div>
                        </div>
                    </div>
                </div>

                ';

            if (\App\Models\News::has_featured_limit() && $index >= env('FEATURED_NEWS_LIMIT')) {
                break;
            }
        }

    } else {
        $featuredArticlesHTML = '';
    }

    $keywords   = ['{Featured Articles}'];
    $variables  = [$featuredArticlesHTML];
    $contents = str_replace($keywords,$variables,$contents);

@endphp

@section('content')

    {!! $contents !!}
{{-- <!-- BEGIN Home Page Copy Snippet (copy this block plus the Swiper CSS/JS includes below into Manage > Pages > Edit) -->
    <style>
            .counter-cards {
                padding: 100px 0;
                background-color: #f9f9f9;
            }

            #counter-cards-container {
                max-width: 1400px;
                transition: transform 1s ease, opacity 1s ease;
                transform: translateY(0);
                opacity: 1;
            }

            .icon-carousel-section {
                padding: 90px 0;
                background-color: #fff;
            }

            .icon-carousel-heading p {
                max-width: 520px;
                margin: 12px auto 0;
                color: #5a5a5a;
            }

            .logo-carousel {
                position: relative;
                overflow: hidden;
                padding: 20px 32px;
            }

            .logo-swiper {
                width: 100%;
                padding: 8px 0;
            }

            .logo-carousel .swiper-wrapper {
                align-items: center;
            }

            .logo-carousel .swiper-slide {
                width: auto !important;
                display: flex;
                justify-content: center;
            }
                display: flex;
                flex-direction: column;
                align-items: center;
                text-align: center;
                gap: 12px;
            }

            .icon-item i {
                font-size: 42px;
                color: #0f4c81;
            }

            .icon-item span {
                font-size: 16px;
                font-weight: 600;
                color: #1f1f1f;
            }

            .logo-item {
                display: flex;
                align-items: center;
                justify-content: center;
            }

            .logo-item img {
                width: 115px;
                max-width: 115px;
                height: auto;
                background: transparent;
                filter: none;
                opacity: 1;
                transition: transform 0.3s ease;
            }
            margin-top: 0;
            padding-top: 0;
        }

        .testi-cards .testi-meta img {
            width: 72px;
            margin-right: 12px;
        }

        #testimonials-swiper .swiper-slide {
            height: auto;
        }

        #testimonials-swiper .swiper-pagination {
            position: static;
            margin-top: 16px;
        }

        #testimonials-swiper .swiper-pagination-bullet {
            background: #0f4c81;
            opacity: 0.35;
        }

        #testimonials-swiper .swiper-pagination-bullet-active {
            opacity: 1;
        }

        #testimonials-swiper .testi-content p {
            white-space: normal;
            word-break: break-word;
        }

        #testimonials-swiper .testi-content p::before,
        #testimonials-swiper .testi-content p::after,
        #testimonials-swiper .testi-meta::before {
            content: none !important;
        }

        /* Prevent page jump when testimonials slide changes */
        .testimonials-swiper {
            min-height: 220px; /* keep a stable container height */
        }
        .testimonials-swiper .swiper-wrapper {
            align-items: stretch; /* ensure slides fill the same height */
        }
        .testimonials-swiper .swiper-slide {
            height: auto; /* allow content to flow but within fixed container */
        }
        .testimonials-swiper .testimonial,
        .testimonials-swiper .testi-content {
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center; /* vertically center text within the fixed height */
        }

        .featured-article-title {
            margin-bottom: 0;
        }

        .featured-article-meta {
            color: #878787;
        }

        .logo-carousel {
            position: relative;
            overflow: hidden;
            padding: 22px 72px;
        }

        .logo-swiper {
            width: 100%;
            padding: 0;
        }

        .logo-carousel .swiper-wrapper {
            align-items: center;
        }

        .logo-carousel .swiper-slide {
            width: auto !important;
            display: flex;
            justify-content: center;
        }

        .logo-nav {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            width: 44px;
            height: 44px;
            border-radius: 50%;
            border: 1px solid rgba(15, 76, 129, 0.25);
            background: rgba(255, 255, 255, 0.9);
            color: #0f4c81;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: background-color 0.3s ease, color 0.3s ease;
            z-index: 3;
            box-shadow: 0 4px 18px rgba(15, 76, 129, 0.12);
        }

        .logo-nav:hover,
        .logo-nav:focus {
            background: #0f4c81;
            color: #fff;
        }

        .logo-nav.logo-prev {
            left: 16px;
        }

        .logo-nav.logo-next {
            right: 16px;
        }

        .logo-item {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .logo-item img {
            width: 128px;
            max-width: 128px;
            height: auto;
            background: transparent;
            filter: none;
            opacity: 1;
            transition: transform 0.3s ease;
        }

        .logo-item img:hover {
            transform: scale(1.05);
        }

        @keyframes logo-scroll {
            from {
                transform: translateX(0);
            }
            to {
                transform: translateX(-50%);
            }
        }

        @media (max-width: 992px) {
            .icon-carousel-section {
                padding: 72px 0;
            }

            .icon-track {
                gap: 32px;
            }

            .icon-item {
                min-width: 130px;
            }

            .icon-item i {
                font-size: 38px;
            }

            .logo-carousel {
                padding: 20px 56px;
            }

            .logo-nav {
                width: 40px;
                height: 40px;
            }

            .logo-item img {
                width: 94px;
                max-width: 94px;
            }
        }

        @media (max-width: 576px) {
            .icon-carousel-section {
                padding: 60px 0;
            }

            .icon-track {
                gap: 24px;
            }

            .icon-item {
                min-width: 110px;
            }

            .icon-item i {
                font-size: 32px;
            }

            .logo-carousel {
                padding: 18px 40px;
            }

            .logo-nav {
                width: 36px;
                height: 36px;
            }

            .logo-item img {
                width: 84px;
                max-width: 84px;
            }
        }

        #portfolio-swiper .swiper-slide {
            display: flex;
            justify-content: center;
            padding: 24px 16px;
            height: auto;
        }

        #portfolio-swiper .swiper-pagination {
            position: static;
            margin-top: 24px;
            display: flex;
            justify-content: center;
        }

        .portfolio-card {
            width: 100%;
            max-width: 360px;
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            overflow: hidden;
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        .portfolio-card img {
            width: 100%;
            height: 220px;
            object-fit: cover;
        }

        .portfolio-card-body {
            padding: 24px;
            display: flex;
            flex-direction: column;
            gap: 12px;
            flex: 1;
        }

        .portfolio-card h5 {
            font-weight: 600;
            margin: 0;
            color: #0f4c81;
        }

        .portfolio-card p {
            margin: 0;
            color: #555;
            line-height: 1.5;
        }

        .portfolio-card a {
            color: #0f4c81;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .portfolio-card a:hover {
            text-decoration: underline;
        }
</style>

<div class="section mt-0 clearfix counter-cards">
        <div class="container-fluid">
            <div class="mx-auto" id="counter-cards-container">
                <div class="row g-4">
                    <div class="col-12 col-md-4">
                        <div class="counter-card text-center">
                            <div class="counter counter-medium font-primary theme-font-color"><span data-from="100" data-to="20" data-refresh-interval="100" data-speed="2000" data-comma="true"></span>+</div>
                            <p class="opac-8">Years in Business</p>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="counter-card text-center">
                            <div class="counter counter-medium font-primary theme-font-color"><span data-from="100" data-to="1600" data-refresh-interval="100" data-speed="2000" data-comma="true"></span>+</div>
                            <p class="opac-8">Projects Delivered</p>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="counter-card text-center">
                            <div class="counter counter-medium font-primary theme-font-color"><span data-from="1" data-to="1000" data-refresh-interval="100" data-speed="2000" data-comma="true"></span>+</div>
                            <p class="opac-8">Clients Served</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="section feature-cards container-standard bg-white">
        <div class="d-flex flex-column flex-md-row feature-cards-top">
           <a href="#" class="card-animate position-relative col-12 col-md-3">
                <h5 class="i-tittle">Domain</h5>
                <p class="i-description pb-4">Establish your business online with a custom domain.</p>
                <i class="icon-world i-animate"></i>
                <i class="icon-line-arrow-right i-animate"></i>
            </a>
            <a href="#" class="card-animate position-relative col-12 col-md-3">
                <h5 class="i-tittle">Focus Care+</h5>
                <p class="i-description pb-4">FocusCare+ – Premium After-Sales Support Included in Your Hosting Plan</p>
                <i class="icon-data i-animate"></i>
                <i class="icon-line-arrow-right i-animate"></i>
            </a>
            <a href="#" class="card-animate position-relative col-12 col-md-3">
                <h5 class="i-tittle">Hosting</h5>
                <p class="i-description">Websites are saved (or "hosted") on a publicly accessible computer (a server)</p>
                <i class="icon-share1 i-animate"></i>
                <i class="icon-line-arrow-right i-animate"></i>
            </a>
            <a href="#" class="card-animate position-relative col-12 col-md-3 feature-card-bordered">
                <h5 class="i-tittle">Web Development</h5>
                <p class="i-description">WebFocus Solutions, Inc. offers tailored web design solutions that meet technical needs</p>
                <i class="icon-cloudversify i-animate"></i>
                <i class="icon-line-arrow-right i-animate"></i>
            </a>
        </div>
        <div class="d-flex flex-column flex-md-row feature-cards-bottom">
            <a href="#" class="card-animate position-relative col-12 col-md-3">
                <h5 class="i-tittle">AI models</h5>
                <p class="i-description">Automate your complex workflows with AI agents and assistance</p>
                <i class="icon-connectdevelop i-animate"></i>
                <i class="icon-line-arrow-right i-animate"></i>
            </a>
            <a href="#" class="card-animate position-relative col-12 col-md-3">
                <h5 class="i-tittle">Analytics</h5>
                <p class="i-description">Automate your complex workflows with AI agents and assistance</p>
                <i class="icon-graph i-animate"></i>
                <i class="icon-line-arrow-right i-animate"></i>
            </a>
            <a href="#" class="card-animate position-relative col-12 col-md-3">
                <h5 class="i-tittle">Security and identity</h5>
                <p class="i-description">Automate your complex workflows with AI agents and assistance</p>
                <i class="bi-shield-check i-animate"></i>
                <i class="icon-line-arrow-right i-animate"></i>
            </a>
            <a href="#" class="card-animate position-relative col-12 col-md-3 feature-card-bordered">
                <h5 class="i-tittle">Consulting</h5>
                <p class="i-description">Automate your complex workflows with AI agents and assistance</p>
                <i class="icon-users2 i-animate"></i>
                <i class="icon-line-arrow-right i-animate"></i>
            </a>
        </div>
    </div>

    <div class="section logo-cards">
        <div class="container-standard">
            <div class="row">
                <h3 class="text-center hidden-up">Trusted by companies small and large around the globe</h3>

                <br />
                <br />
                <br />
                <br class="hide-450" />
                <br class="hide-450" />
                <br />

                <div class="text-center mb-4 hidden-up see-customer-btn">
                    <button class="btn btn-primary rounded font-bold btn-hover-theme">See our customer stories</button>
                </div>

                <br />
                <br class="hide-450" />
                <br class="hide-450" />
                <br />
                <br />
                <br />

                <div class="logo-carousel hidden-up" data-gjs-type="default">
                    <button class="logo-nav logo-prev" type="button" aria-label="Previous logos">
                        <i class="icon-line-arrow-left"></i>
                    </button>
                    <div class="logo-swiper swiper" data-gjs-type="swiper-container">
                        <div class="swiper-wrapper" data-gjs-type="swiper-wrapper">
                            <div class="swiper-slide" data-gjs-type="swiper-slide">
                                <a class="logo-item" data-gjs-type="link" href="https://www.sampleclient.com" target="_blank" rel="noopener" aria-label="Client 37">
                                    <img src="/images/clients/logo37.jpg" alt="Client logo">
                                </a>
                            </div>
                            <div class="swiper-slide" data-gjs-type="swiper-slide">
                                <a class="logo-item" data-gjs-type="link" href="https://www.sampleclient.com" target="_blank" rel="noopener" aria-label="Client 32">
                                    <img src="/images/clients/logo32.jpg" alt="Client logo">
                                </a>
                            </div>
                            <div class="swiper-slide" data-gjs-type="swiper-slide">
                                <a class="logo-item" data-gjs-type="link" href="https://www.sampleclient.com" target="_blank" rel="noopener" aria-label="Client 4">
                                    <img src="/images/clients/logo4.jpg" alt="Client logo">
                                </a>
                            </div>
                            <div class="swiper-slide" data-gjs-type="swiper-slide">
                                <a class="logo-item" data-gjs-type="link" href="https://www.sampleclient.com" target="_blank" rel="noopener" aria-label="Client 3">
                                    <img src="/images/clients/logo3.jpg" alt="Client logo">
                                </a>
                            </div>
                            <div class="swiper-slide" data-gjs-type="swiper-slide">
                                <a class="logo-item" data-gjs-type="link" href="https://www.sampleclient.com" target="_blank" rel="noopener" aria-label="Client 13">
                                    <img src="/images/clients/logo13.jpg" alt="Client logo">
                                </a>
                            </div>
                            <div class="swiper-slide" data-gjs-type="swiper-slide">
                                <a class="logo-item" data-gjs-type="link" href="https://www.sampleclient.com" target="_blank" rel="noopener" aria-label="Client 8">
                                    <img src="/images/clients/logo8.jpg" alt="Client logo">
                                </a>
                            </div>
                            <div class="swiper-slide" data-gjs-type="swiper-slide">
                                <a class="logo-item" data-gjs-type="link" href="https://www.sampleclient.com" target="_blank" rel="noopener" aria-label="Client 6">
                                    <img src="/images/clients/logo6.jpg" alt="Client logo">
                                </a>
                            </div>
                            <div class="swiper-slide" data-gjs-type="swiper-slide">
                                <a class="logo-item" data-gjs-type="link" href="https://www.sampleclient.com" target="_blank" rel="noopener" aria-label="Client 21">
                                    <img src="/images/clients/logo21.jpg" alt="Client logo">
                                </a>
                            </div>
                            <div class="swiper-slide" data-gjs-type="swiper-slide">
                                <a class="logo-item" data-gjs-type="link" href="https://www.sampleclient.com" target="_blank" rel="noopener" aria-label="Client 63">
                                    <img src="/images/clients/logo63.jpg" alt="Client logo">
                                </a>
                            </div>
                            <div class="swiper-slide" data-gjs-type="swiper-slide">
                                <a class="logo-item" data-gjs-type="link" href="https://www.sampleclient.com" target="_blank" rel="noopener" aria-label="Client 53">
                                    <img src="/images/clients/logo53.jpg" alt="Client logo">
                                </a>
                            </div>
                        </div>
                    </div>
                    <button class="logo-nav logo-next" type="button" aria-label="Next logos">
                        <i class="icon-line-arrow-right"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- portfolio-carousel full width -->

    <h3 class="fw-bolder h1 mb-4 text-center py-5 hidden-up">Portfolio Highlights</h3>

    <div id="portfolio-swiper" data-gjs-type="swiper-container" class="swiper hidden-up">
        <div class="swiper-wrapper" data-gjs-type="swiper-wrapper">
            <div class="swiper-slide" data-gjs-type="swiper-slide">
                <article class="portfolio-item pf-uielements pf-media">
                    <div class="grid-inner">
                        <div class="portfolio-image">
                            <a href="portfolio-single.html">
                                <img data-gjs-type="image" src="/images/portfolio/clinica.png" alt="Clinica Manila homepage preview">
                            </a>
                            <div class="bg-overlay">
                                <div class="bg-overlay-content dark flex-column" data-hover-animate="fadeIn">
                                    <div class="portfolio-desc pt-0 center" data-hover-animate="fadeInDownSmall" data-hover-animate-out="fadeOutUpSmall" data-hover-speed="350">
                                        <h3><a href="portfolio-single.html">Clinica Manila</a></h3>
                                        <span><a href="#">Awesome Webapp for Clinica Manila</a>  <a href="#">5 Star</a></span>
                                    </div>

                                    <div class="d-flex">
                                        <a href="/images/portfolio/clinica.png" class="overlay-trigger-icon bg-light text-dark" data-hover-animate="fadeInUpSmall" data-hover-animate-out="fadeOutDownSmall" data-hover-speed="350" data-lightbox="image" title="Clinica Manila"><i class="icon-line-plus"></i></a>
                                        <a href="portfolio-single.html" class="overlay-trigger-icon bg-light text-dark" data-hover-animate="fadeInUpSmall" data-hover-animate-out="fadeOutDownSmall" data-hover-speed="350"><i class="icon-line-ellipsis"></i></a>
                                    </div>
                                </div>
                                <div class="bg-overlay-bg dark" data-hover-animate="fadeIn"></div>
                            </div>
                        </div>
                        <div class="content-body p-3 mb-2 mt-2">
                            <h5 class="card-title fw-semibold theme-font-color mb-2">Clinica Manila</h5>
                            <p class="card-text">Awesome Webapp for Clinica Manila. Some quick example text to build on the card title.</p>
                        </div>
                    </div>
                </article>
            </div>
            <div class="swiper-slide" data-gjs-type="swiper-slide">
                <article class="portfolio-item pf-uielements pf-media">
                    <div class="grid-inner">
                        <div class="portfolio-image">
                            <a href="portfolio-single.html">
                                <img data-gjs-type="image" src="/images/portfolio/exp.png" alt="EXP Controls dashboard preview">
                            </a>
                            <div class="bg-overlay">
                                <div class="bg-overlay-content dark flex-column" data-hover-animate="fadeIn">
                                    <div class="portfolio-desc pt-0 center" data-hover-animate="fadeInDownSmall" data-hover-animate-out="fadeOutUpSmall" data-hover-speed="350">
                                        <h3><a href="portfolio-single.html">EXP Controls</a></h3>
                                        <span><a href="#">Great WepApp design for </a> <a href="#">EXP Controls</a></span>
                                    </div>

                                    <div class="d-flex">
                                        <a href="/images/portfolio/exp.png" class="overlay-trigger-icon bg-light text-dark" data-hover-animate="fadeInUpSmall" data-hover-animate-out="fadeOutDownSmall" data-hover-speed="350" data-lightbox="image" title="EXP Controls"><i class="icon-line-plus"></i></a>
                                        <a href="portfolio-single.html" class="overlay-trigger-icon bg-light text-dark" data-hover-animate="fadeInUpSmall" data-hover-animate-out="fadeOutDownSmall" data-hover-speed="350"><i class="icon-line-ellipsis"></i></a>
                                    </div>
                                </div>
                                <div class="bg-overlay-bg dark" data-hover-animate="fadeIn"></div>
                            </div>
                        </div>
                        <div class="content-body p-3 mb-2 mt-2">
                            <h5 class="card-title fw-semibold theme-font-color mb-2">EXP Controls</h5>
                            <p class="card-text">Great WepApp design for EXP Controls. Some quick example text to build on the card title.</p>
                        </div>
                    </div>
                </article>
            </div>
            <div class="swiper-slide" data-gjs-type="swiper-slide">
                <article class="portfolio-item pf-uielements pf-media">
                    <div class="grid-inner">
                        <div class="portfolio-image">
                            <a href="portfolio-single.html">
                                <img data-gjs-type="image" src="/images/portfolio/lydias.png" alt="Lydia's Lechon website preview">
                            </a>
                            <div class="bg-overlay">
                                <div class="bg-overlay-content dark flex-column" data-hover-animate="fadeIn">
                                    <div class="portfolio-desc pt-0 center" data-hover-animate="fadeInDownSmall" data-hover-animate-out="fadeOutUpSmall" data-hover-speed="350">
                                        <h3><a href="portfolio-single.html">Lydia's Lechon</a></h3>
                                        <span><a href="#">Modern and Slick WebApp for </a> <a href="#">Lydia's Lechon</a></span>
                                    </div>

                                    <div class="d-flex">
                                        <a href="/images/portfolio/lydias.png" class="overlay-trigger-icon bg-light text-dark" data-hover-animate="fadeInUpSmall" data-hover-animate-out="fadeOutDownSmall" data-hover-speed="350" data-lightbox="image" title="Lydia's Lechon"><i class="icon-line-plus"></i></a>
                                        <a href="portfolio-single.html" class="overlay-trigger-icon bg-light text-dark" data-hover-animate="fadeInUpSmall" data-hover-animate-out="fadeOutDownSmall" data-hover-speed="350"><i class="icon-line-ellipsis"></i></a>
                                    </div>
                                </div>
                                <div class="bg-overlay-bg dark" data-hover-animate="fadeIn"></div>
                            </div>
                        </div>
                        <div class="content-body p-3 mb-2 mt-2">
                            <h5 class="card-title fw-semibold theme-font-color mb-2">Lydia's Lechon</h5>
                            <p class="card-text">Modern and Slick WebApp for Lydia's Lechon. Some quick example text to build on the card title.</p>
                        </div>
                    </div>
                </article>
            </div>
            <div class="swiper-slide" data-gjs-type="swiper-slide">
                <article class="portfolio-item pf-uielements pf-media">
                    <div class="grid-inner">
                        <div class="portfolio-image">
                            <a href="portfolio-single.html">
                                <img data-gjs-type="image" src="/images/portfolio/precious.png" alt="Precious Hearts Pages landing page">
                            </a>
                            <div class="bg-overlay">
                                <div class="bg-overlay-content dark flex-column" data-hover-animate="fadeIn">
                                    <div class="portfolio-desc pt-0 center" data-hover-animate="fadeInDownSmall" data-hover-animate-out="fadeOutUpSmall" data-hover-speed="350">
                                        <h3><a href="portfolio-single.html">Precious Hearts Pages</a></h3>
                                        <span><a href="#">A desirable WebApp for </a> <a href="#">Precious Hearts Pages</a></span>
                                    </div>

                                    <div class="d-flex">
                                        <a href="/images/portfolio/precious.png" class="overlay-trigger-icon bg-light text-dark" data-hover-animate="fadeInUpSmall" data-hover-animate-out="fadeOutDownSmall" data-hover-speed="350" data-lightbox="image" title="Precious Hearts Pages"><i class="icon-line-plus"></i></a>
                                        <a href="portfolio-single.html" class="overlay-trigger-icon bg-light text-dark" data-hover-animate="fadeInUpSmall" data-hover-animate-out="fadeOutDownSmall" data-hover-speed="350"><i class="icon-line-ellipsis"></i></a>
                                    </div>
                                </div>
                                <div class="bg-overlay-bg dark" data-hover-animate="fadeIn"></div>
                            </div>
                        </div>
                        <div class="content-body p-3 mb-2 mt-2">
                            <h5 class="card-title fw-semibold theme-font-color mb-2">Precious Hearts Pages</h5>
                            <p class="card-text">A desirable WebApp for Precious Hearts Pages. Some quick example text to build on the card title.</p>
                        </div>
                    </div>
                </article>
            </div>
            <div class="swiper-slide" data-gjs-type="swiper-slide">
                <article class="portfolio-item pf-uielements pf-media">
                    <div class="grid-inner">
                        <div class="portfolio-image">
                            <a href="portfolio-single.html">
                                <img data-gjs-type="image" src="/images/portfolio/taikisha.png" alt="Taikisha interface preview">
                            </a>
                            <div class="bg-overlay">
                                <div class="bg-overlay-content dark flex-column" data-hover-animate="fadeIn">
                                    <div class="portfolio-desc pt-0 center" data-hover-animate="fadeInDownSmall" data-hover-animate-out="fadeOutUpSmall" data-hover-speed="350">
                                        <h3><a href="portfolio-single.html">Taikisha</a></h3>
                                        <span><a href="#">UI Elements</a>, <a href="#">Media</a></span>
                                    </div>

                                    <div class="d-flex">
                                        <a href="/images/portfolio/taikisha.png" class="overlay-trigger-icon bg-light text-dark" data-hover-animate="fadeInUpSmall" data-hover-animate-out="fadeOutDownSmall" data-hover-speed="350" data-lightbox="image" title="Taikisha"><i class="icon-line-plus"></i></a>
                                        <a href="portfolio-single.html" class="overlay-trigger-icon bg-light text-dark" data-hover-animate="fadeInUpSmall" data-hover-animate-out="fadeOutDownSmall" data-hover-speed="350"><i class="icon-line-ellipsis"></i></a>
                                    </div>
                                </div>
                                <div class="bg-overlay-bg dark" data-hover-animate="fadeIn"></div>
                            </div>
                        </div>
                        <div class="content-body p-3 mb-2 mt-2">
                            <h5 class="card-title fw-semibold theme-font-color mb-2">Taikisha</h5>
                            <p class="card-text">UI Elements for Console Activity. Some quick example text to build on the card title.</p>
                        </div>
                    </div>
                </article>
            </div>
            <div class="swiper-slide" data-gjs-type="swiper-slide">
                <article class="portfolio-item pf-uielements pf-media">
                    <div class="grid-inner">
                        <div class="portfolio-image">
                            <a href="portfolio-single.html">
                                <img data-gjs-type="image" src="/images/portfolio/taisho.png" alt="Taisho UI showcase">
                            </a>
                            <div class="bg-overlay">
                                <div class="bg-overlay-content dark flex-column" data-hover-animate="fadeIn">
                                    <div class="portfolio-desc pt-0 center" data-hover-animate="fadeInDownSmall" data-hover-animate-out="fadeOutUpSmall" data-hover-speed="350">
                                        <h3><a href="portfolio-single.html">Taisho</a></h3>
                                        <span><a href="#">UI Elements</a>, <a href="#">Taisho</a></span>
                                    </div>

                                    <div class="d-flex">
                                        <a href="/images/portfolio/taisho.png" class="overlay-trigger-icon bg-light text-dark" data-hover-animate="fadeInUpSmall" data-hover-animate-out="fadeOutDownSmall" data-hover-speed="350" data-lightbox="image" title="Taisho"><i class="icon-line-plus"></i></a>
                                        <a href="portfolio-single.html" class="overlay-trigger-icon bg-light text-dark" data-hover-animate="fadeInUpSmall" data-hover-animate-out="fadeOutDownSmall" data-hover-speed="350"><i class="icon-line-ellipsis"></i></a>
                                    </div>
                                </div>
                                <div class="bg-overlay-bg dark" data-hover-animate="fadeIn"></div>
                            </div>
                        </div>
                        <div class="content-body p-3 mb-2 mt-2">
                            <h5 class="card-title fw-semibold theme-font-color mb-2">Taisho</h5>
                            <p class="card-text">Taisho UI Elements for Console Activity. Some quick example text to build on the card title.</p>
                        </div>
                    </div>
                </article>
            </div>
        </div>
        <div class="swiper-button-prev" data-gjs-type="swiper-prev" tabindex="0" role="button" aria-label="Previous slide" aria-disabled="false"></div>
        <div class="swiper-button-next" data-gjs-type="swiper-next" tabindex="0" role="button" aria-label="Next slide" aria-disabled="false"></div>
    <div class="swiper-pagination" data-gjs-type="swiper-pagination"></div>
        <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
    </div>

    <br />
    <br />
    <br class="hide-450" />
    <br class="hide-450" />
    <br />

    <div class="section bg-transparent testi-cards hidden-up">
        <div class="container">
            <div class="row align-items-center justify-content-around">
                <div class="col-lg-4">
                    <h3 class="fw-bolder h1 mb-4 text-start theme-font-color">What Some of our Clients Say</h3>

                    <div id="testimonials-swiper" class="swiper testimonials-swiper mt-5">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="testimonial border-0 shadow-none bg-transparent">
                                    <div class="testi-content">
                                        <p>Quickly redefine resource sucking web services after exceptional customer service. Professionally coordinate focused platforms before visionary architectures.</p>
                                        <div class="testi-meta d-flex align-items-center">
                                            <img src="/images/testi/face.jpg" alt="Client portrait" width="30">
                                            <div class="d-flex flex-column">
                                                John Doe
                                                <span class="ps-0">XYZ Inc.</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="swiper-slide">
                                <div class="testimonial border-0 shadow-none bg-transparent">
                                    <div class="testi-content">
                                        <p>Dramatically mesh user friendly solutions whereas sticky human capital. Assertively fashion impactful outside the box.</p>
                                        <div class="testi-meta d-flex align-items-center">
                                            <img src="/images/testi/face2.jpg" alt="Client portrait" width="30">
                                            <div class="d-flex flex-column">
                                                John Doe
                                                <span class="ps-0">XYZ Inc.</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="swiper-slide">
                                <div class="testimonial border-0 shadow-none bg-transparent">
                                    <div class="testi-content">
                                        <p>Progressively productivate customer directed meta-services without magnetic bandwidth.</p>
                                        <div class="testi-meta d-flex align-items-center">
                                            <img src="/images/testi/face3.jpg" alt="Client portrait" width="30">
                                            <div class="d-flex flex-column">
                                                John Doe
                                                <span class="ps-0">XYZ Inc.</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="swiper-pagination"></div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <img src="/images/testi/bg.svg" alt="Testimonials illustration">
                </div>
            </div>
        </div>
    </div>
<!-- END Home Page Copy Snippet --> --}}
@endsection


@section('pagejs')
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const animate = document.querySelector('#counter-cards-container');
        if (animate) {
            animate.style.transform = 'translate(0px, 0px)';
            animate.style.opacity = '1';
        }

        const portfolioSwiper = new Swiper('#portfolio-swiper', {
            loop: true,
            loopedSlides: 6,
            loopAdditionalSlides: 6,
            speed: 600,
            spaceBetween: 24,
            slidesPerView: 1,
            autoplay: {
                delay: 3500,
                disableOnInteraction: false
            },
            navigation: {
                nextEl: '#portfolio-swiper .swiper-button-next',
                prevEl: '#portfolio-swiper .swiper-button-prev'
            },
            pagination: {
                el: '#portfolio-swiper .swiper-pagination',
                clickable: true
            },
            breakpoints: {
                768: { slidesPerView: 2 },
                1200: { slidesPerView: 3 },
                1500: { slidesPerView: 4 }
            }
        });

        const testimonialsSwiper = new Swiper('#testimonials-swiper', {
            loop: true,
            autoHeight: false, // keep height stable to avoid page shifting
            speed: 600,
            spaceBetween: 24,
            slidesPerView: 1,
            autoplay: {
                delay: 4000,
                disableOnInteraction: false
            },
            pagination: {
                el: '#testimonials-swiper .swiper-pagination',
                clickable: true
            }
        });

        document.querySelectorAll('.logo-carousel').forEach((carousel) => {
            const swiperEl = carousel.querySelector('.logo-swiper');
            if (!swiperEl) {
                return;
            }

            const slidesCount = swiperEl.querySelectorAll('.swiper-slide').length;
            const MIN_SLIDES = 12;

            if (slidesCount < MIN_SLIDES) {
                const wrapper = swiperEl.querySelector('.swiper-wrapper');
                const slides = Array.from(wrapper.children);
                const clonesNeeded = Math.ceil(MIN_SLIDES / slidesCount) - 1;

                for (let i = 0; i < clonesNeeded; i++) {
                    slides.forEach((slide) => {
                        const clone = slide.cloneNode(true);
                        clone.classList.add('logo-slide-clone');
                        wrapper.appendChild(clone);
                    });
                }
            }

            const effectiveSlides = swiperEl.querySelectorAll('.swiper-slide').length;

            const prevBtn = carousel.querySelector('.logo-nav.logo-prev');
            const nextBtn = carousel.querySelector('.logo-nav.logo-next');

            const logoSwiper = new Swiper(swiperEl, {
                loop: true,
                loopedSlides: effectiveSlides,
                loopAdditionalSlides: effectiveSlides,
                speed: 4000,
                allowTouchMove: false,
                autoplay: {
                    delay: 0,
                    disableOnInteraction: false,
                    stopOnLastSlide: false,
                    pauseOnMouseEnter: false
                },
                slidesPerView: 'auto',
                spaceBetween: 92,
                freeMode: true,
                freeModeMomentum: false,
                centeredSlides: false,
                navigation: {
                    prevEl: prevBtn,
                    nextEl: nextBtn
                }
            });

            if (logoSwiper.autoplay && typeof logoSwiper.autoplay.start === 'function') {
                logoSwiper.autoplay.start();
            }
        });

        const observerUp = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('show-up');
                }
            });
        });

        document.querySelectorAll('.hidden-up').forEach((el) => observerUp.observe(el));

        // add-ons animation
        // document.getElementById('i2uc').style.transform = 'translate(0px, 0px)';
        // document.getElementById('i7y2m').style.transform = 'translate(0px, 0px)';
        // document.getElementById('ij337').style.transform = 'translate(0px, 0px)';

    });
</script>
@endsection
