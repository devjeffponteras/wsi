@extends('theme.main')

@section('pagecss')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
@endsection

@php
    $contents = $page->contents;

// LATEST NEWS
    $featuredArticles = Article::where('is_featured', 1)->where('status', 'Published')->skip(0)->take(3)->get();
    if($featuredArticles->count()) {

        $featuredArticlesHTML = '';

        $prefooter = asset('theme/images/pre-footer.jpg');

        foreach ($featuredArticles as $index => $article) {
            $imageUrl = (empty($article->thumbnail_url)) ? asset('theme/images/misc/no-image.jpg') : $article->thumbnail_url;

            
            $featuredArticlesHTML .= '

                <div class="slide" data-thumb="'. $imageUrl .'">
                    <a href="'. $article->get_url() .'" class="d-block position-relative">
                        <div class="row">
                            <div class="col-md-6 half-one position-default">
                                <div class="floating-panel">
                                    <h2 class="h2 fw-semibold lh-base" style="margin-bottom: 0px;">'. $article->name .'</h2>
                                    <small style="color: #878787;">Date posted: '. $article->date_posted() .'</small>
                                    <p class="text-muted mt-4">'. $article->teaser .'</p>
                                    <a href="'. $article->get_url() .'" class="button button-3d button-mini button-rounded button-blue">Learn More &nbsp; ></a>
                                </div>
                            </div>
                            <div class="col-md-6 p-5">
                                <img class="rounded-corners" src="'. $imageUrl .'" alt="modair">
                            </div>
                        </div>
                    </a>
                </div>

                ';

            if (Article::has_featured_limit() && $index >= env('FEATURED_NEWS_LIMIT')) {
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

    <div class="section mt-0 clearfix counter-cards" style="padding: 80px 0; background-color: white;">
        <div class="container clearfix">

            <div class="mx-auto" id="counter-cards-container" style="max-width: 960px; transform: translate(0px, 145px); transition: ease 1s all; opacity: 0;">
                <div class="row clearfix">
                    <div class="col-12 col-md-4 center customers-count">
                        <div class="counter center counter-medium font-primary theme-font-color"><span data-from="100" data-to="567" data-refresh-interval="100" data-speed="2000" data-comma="true"></span>+</div>
                        <p class="opac-8" style="font-family: 'Montserrat', sans !important;">employees from 157+ countries</p>
                    </div>
                    <div class="col-12 col-md-4 center customers-count">
                        <div class="counter center counter-medium font-primary theme-font-color"><span data-from="100" data-to="751" data-refresh-interval="100" data-speed="2000" data-comma="true"></span>+</div>
                        <p class="opac-8">SAP partner companies globally</p>
                    </div>
                    <div class="col-12 col-md-4 center customers-count">
                        <div class="counter center counter-medium font-primary theme-font-color">P<span data-from="1" data-to="30" data-refresh-interval="100" data-speed="2000" data-comma="true"></span> billion+</div>
                        <p class="opac-8">total revenue in FY2025</p>
                    </div>
                    <div class="col-12 col-md-4 center customers-count">
                        <div class="counter center counter-medium font-primary theme-font-color"><span data-from="1" data-to="100" data-refresh-interval="100" data-speed="2000" data-comma="true"></span>k+</div>
                        <p class="opac-8">subscribers in our cloud user base</p>
                    </div>
                    <div class="col-12 col-md-4 center customers-count">
                        <div class="counter center counter-medium font-primary theme-font-color"><span data-from="1" data-to="100" data-refresh-interval="100" data-speed="2000" data-comma="true"></span>+</div>
                        <p class="opac-8">development locations worldwide</p>
                    </div>
                    <div class="col-12 col-md-4 center customers-count">
                        <div class="counter center counter-medium font-primary theme-font-color">AAA</div>
                        <p class="opac-8">MSCI ESG rating</p>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="section feature-cards">
        <div class="d-flex flex-column flex-md-row feature-cards-top">
            <a href="#" class="card-animate position-relative col-12 col-md-3">
                <h5 class="i-tittle">AI agents</h5>
                <p class="i-description">Automate your complex workflows with AI agents and assistance</p>
                <i class="icon-world i-animate"></i>
                <i class="icon-line-arrow-right i-animate"></i>
            </a>
            <a href="#" class="card-animate position-relative col-12 col-md-3">
                <h5 class="i-tittle">Data for AI</h5>
                <p class="i-description">Automate your complex workflows with AI agents and assistance</p>
                <i class="icon-data i-animate"></i>
                <i class="icon-line-arrow-right i-animate"></i>
            </a>
            <a href="#" class="card-animate position-relative col-12 col-md-3">
                <h5 class="i-tittle">Automation</h5>
                <p class="i-description">Automate your complex workflows with AI agents and assistance</p>
                <i class="icon-share1 i-animate"></i>
                <i class="icon-line-arrow-right i-animate"></i>
            </a>
            <a href="#" class="card-animate position-relative col-12 col-md-3">
                <h5 class="i-tittle">Hybrid cloud</h5>
                <p class="i-description">Automate your complex workflows with AI agents and assistance</p>
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
            <a href="#" class="card-animate position-relative col-12 col-md-3">
                <h5 class="i-tittle">Consulting</h5>
                <p class="i-description">Automate your complex workflows with AI agents and assistance</p>
                <i class="icon-users2 i-animate"></i>
                <i class="icon-line-arrow-right i-animate"></i>
            </a>
        </div>
    </div>

    <div class="section logo-cards" style="background-color: transparent; background: url({{asset('images/map.png')}}); background-repeat: no-repeat; background-size: cover; padding-bottom: 200px; margin-bottom: 0px;">
        <div class="container-standard">
            <div class="row">
                <h3 class="text-center">Trusted by companies small and large around the globe</h3>

                <br />
                <br />
                <br />
                <br />
                <br />
                <br />

                <div class="text-center mb-4">
                    <button class="btn btn-primary rounded font-bold" style="max-width: fit-content;">See our customer stories</button>
                </div>

                <br />
                <br />
                <br />
                <br />
                <br />
                <br />

                <div id="oc-images" class="owl-carousel image-carousel carousel-widget" data-items-xs="2" data-items-sm="3" data-items-lg="6" data-items-xl="8">
                    <div class="oc-item">
                        <a href="#"><img src="{{ asset('images/clients/logo6.png') }}" style="width: 100px !important;" alt="Image 1"></a>
                    </div>
                    <div class="oc-item">
                        <a href="#"><img src="{{ asset('images/clients/logo34.jpg') }}" style="width: 100px !important;" alt="Image 2"></a>
                    </div>
                    <div class="oc-item">
                        <a href="#"><img src="{{ asset('images/clients/logo35.jpg') }}" style="width: 100px !important;" alt="Image 3"></a>
                    </div>
                    <div class="oc-item">
                        <a href="#"><img src="{{ asset('images/clients/logo32.jpg') }}" style="width: 100px !important;" alt="Image 4"></a>
                    </div>
                    <div class="oc-item">
                        <a href="#"><img src="{{ asset('images/clients/logo4.png') }}" style="width: 100px !important;" alt="Image 5"></a>
                    </div>
                    <div class="oc-item">
                        <a href="#"><img src="{{ asset('images/clients/logo53.jpg') }}" style="width: 100px !important;" alt="Image 6"></a>
                    </div>
                    <div class="oc-item">
                        <a href="#"><img src="{{ asset('images/clients/logo13.jpg') }}" style="width: 100px !important;" alt="Image 7"></a>
                    </div>
                    <div class="oc-item">
                        <a href="#"><img src="{{ asset('images/clients/logo37.jpg') }}" style="width: 100px !important;" alt="Image 7"></a>
                    </div>
                    <div class="oc-item">
                        <a href="#"><img src="{{ asset('images/clients/logo8.png') }}" style="width: 100px !important;" alt="Image 7"></a>
                    </div>
                    <div class="oc-item">
                        <a href="#"><img src="{{ asset('images/clients/logo6.jpg') }}" style="width: 100px !important;" alt="Image 7"></a>
                    </div>
                    <div class="oc-item">
                        <a href="#"><img src="{{ asset('images/clients/logo4.jpg') }}" style="width: 100px !important;" alt="Image 7"></a>
                    </div>
                    <div class="oc-item">
                        <a href="#"><img src="{{ asset('images/clients/logo21.jpg') }}" style="width: 100px !important;" alt="Image 7"></a>
                    </div>
                    <div class="oc-item">
                        <a href="#"><img src="{{ asset('images/clients/logo63.jpg') }}" style="width: 100px !important;" alt="Image 7"></a>
                    </div>
                    <div class="oc-item">
                        <a href="#"><img src="{{ asset('images/clients/logo3.jpg') }}" style="width: 100px !important;" alt="Image 7"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- portfolio-carousel full width -->

    <h3 class="fw-bolder h1 mb-4 text-center py-5">Portfolio Highlights</h3>

    <div id="related-portfolio" class="owl-carousel owl-carousel-full portfolio-carousel carousel-widget" data-margin="10" data-pagi="false" data-items-xs="1" data-items-sm="2" data-items-md="5" data-items-lg="5">

        <article class="portfolio-item pf-uielements pf-media">
            <div class="grid-inner">
                <div class="portfolio-image">
                    <a href="portfolio-single.html">
                        <img src="images/portfolio/clinica.png" alt="Console Activity">
                    </a>
                    <div class="bg-overlay">
                        <div class="bg-overlay-content dark flex-column" data-hover-animate="fadeIn">
                            <div class="portfolio-desc pt-0 center" data-hover-animate="fadeInDownSmall" data-hover-animate-out="fadeOutUpSmall" data-hover-speed="350">
                                <h3><a href="portfolio-single.html">Clinica Manila</a></h3>
                                <span><a href="#">Awesome Webapp for Clinica Manila</a>  <a href="#">5 Star</a></span>
                            </div>

                            <div class="d-flex">
                                <a href="images/portfolio/clinica.png" class="overlay-trigger-icon bg-light text-dark" data-hover-animate="fadeInUpSmall" data-hover-animate-out="fadeOutDownSmall" data-hover-speed="350" data-lightbox="image" title="Clinica Manila"><i class="icon-line-plus"></i></a>
                                <a href="portfolio-single.html" class="overlay-trigger-icon bg-light text-dark" data-hover-animate="fadeInUpSmall" data-hover-animate-out="fadeOutDownSmall" data-hover-speed="350"><i class="icon-line-ellipsis"></i></a>
                            </div>
                        </div>
                        <div class="bg-overlay-bg dark" data-hover-animate="fadeIn"></div>
                    </div>
                </div>
            </div>
        </article>
        <article class="portfolio-item pf-uielements pf-media">
            <div class="grid-inner">
                <div class="portfolio-image">
                    <a href="portfolio-single.html">
                        <img src="images/portfolio/exp.png" alt="Console Activity">
                    </a>
                    <div class="bg-overlay">
                        <div class="bg-overlay-content dark flex-column" data-hover-animate="fadeIn">
                            <div class="portfolio-desc pt-0 center" data-hover-animate="fadeInDownSmall" data-hover-animate-out="fadeOutUpSmall" data-hover-speed="350">
                                <h3><a href="portfolio-single.html">EXP Controls</a></h3>
                                <span><a href="#">Great WepApp design for </a> <a href="#">EXP Controls</a></span>
                            </div>

                            <div class="d-flex">
                                <a href="images/portfolio/exp.png" class="overlay-trigger-icon bg-light text-dark" data-hover-animate="fadeInUpSmall" data-hover-animate-out="fadeOutDownSmall" data-hover-speed="350" data-lightbox="image" title="EXP Controls"><i class="icon-line-plus"></i></a>
                                <a href="portfolio-single.html" class="overlay-trigger-icon bg-light text-dark" data-hover-animate="fadeInUpSmall" data-hover-animate-out="fadeOutDownSmall" data-hover-speed="350"><i class="icon-line-ellipsis"></i></a>
                            </div>
                        </div>
                        <div class="bg-overlay-bg dark" data-hover-animate="fadeIn"></div>
                    </div>
                </div>
            </div>
        </article>
        <article class="portfolio-item pf-uielements pf-media">
            <div class="grid-inner">
                <div class="portfolio-image">
                    <a href="portfolio-single.html">
                        <img src="images/portfolio/lydias.png" alt="Console Activity">
                    </a>
                    <div class="bg-overlay">
                        <div class="bg-overlay-content dark flex-column" data-hover-animate="fadeIn">
                            <div class="portfolio-desc pt-0 center" data-hover-animate="fadeInDownSmall" data-hover-animate-out="fadeOutUpSmall" data-hover-speed="350">
                                <h3><a href="portfolio-single.html">Lydia's Lechon</a></h3>
                                <span><a href="#">Modern and Slick WebApp for </a> <a href="#">Lydia's Lechon</a></span>
                            </div>

                            <div class="d-flex">
                                <a href="images/portfolio/lydias.png" class="overlay-trigger-icon bg-light text-dark" data-hover-animate="fadeInUpSmall" data-hover-animate-out="fadeOutDownSmall" data-hover-speed="350" data-lightbox="image" title="Lydia's Lechon"><i class="icon-line-plus"></i></a>
                                <a href="portfolio-single.html" class="overlay-trigger-icon bg-light text-dark" data-hover-animate="fadeInUpSmall" data-hover-animate-out="fadeOutDownSmall" data-hover-speed="350"><i class="icon-line-ellipsis"></i></a>
                            </div>
                        </div>
                        <div class="bg-overlay-bg dark" data-hover-animate="fadeIn"></div>
                    </div>
                </div>
            </div>
        </article>
        <article class="portfolio-item pf-uielements pf-media">
            <div class="grid-inner">
                <div class="portfolio-image">
                    <a href="portfolio-single.html">
                        <img src="images/portfolio/precious.png" alt="Console Activity">
                    </a>
                    <div class="bg-overlay">
                        <div class="bg-overlay-content dark flex-column" data-hover-animate="fadeIn">
                            <div class="portfolio-desc pt-0 center" data-hover-animate="fadeInDownSmall" data-hover-animate-out="fadeOutUpSmall" data-hover-speed="350">
                                <h3><a href="portfolio-single.html">Precious Hearts Pages</a></h3>
                                <span><a href="#">A desirable WebApp for </a> <a href="#">Precious Hearts Pages</a></span>
                            </div>

                            <div class="d-flex">
                                <a href="images/portfolio/precious.png" class="overlay-trigger-icon bg-light text-dark" data-hover-animate="fadeInUpSmall" data-hover-animate-out="fadeOutDownSmall" data-hover-speed="350" data-lightbox="image" title="Precious Hearts Pages"><i class="icon-line-plus"></i></a>
                                <a href="portfolio-single.html" class="overlay-trigger-icon bg-light text-dark" data-hover-animate="fadeInUpSmall" data-hover-animate-out="fadeOutDownSmall" data-hover-speed="350"><i class="icon-line-ellipsis"></i></a>
                            </div>
                        </div>
                        <div class="bg-overlay-bg dark" data-hover-animate="fadeIn"></div>
                    </div>
                </div>
            </div>
        </article>
        <article class="portfolio-item pf-uielements pf-media">
            <div class="grid-inner">
                <div class="portfolio-image">
                    <a href="portfolio-single.html">
                        <img src="images/portfolio/taikisha.png" alt="Console Activity">
                    </a>
                    <div class="bg-overlay">
                        <div class="bg-overlay-content dark flex-column" data-hover-animate="fadeIn">
                            <div class="portfolio-desc pt-0 center" data-hover-animate="fadeInDownSmall" data-hover-animate-out="fadeOutUpSmall" data-hover-speed="350">
                                <h3><a href="portfolio-single.html">Console Activity</a></h3>
                                <span><a href="#">UI Elements</a>, <a href="#">Media</a></span>
                            </div>

                            <div class="d-flex">
                                <a href="images/portfolio/taikisha.png" class="overlay-trigger-icon bg-light text-dark" data-hover-animate="fadeInUpSmall" data-hover-animate-out="fadeOutDownSmall" data-hover-speed="350" data-lightbox="image" title="Image"><i class="icon-line-plus"></i></a>
                                <a href="portfolio-single.html" class="overlay-trigger-icon bg-light text-dark" data-hover-animate="fadeInUpSmall" data-hover-animate-out="fadeOutDownSmall" data-hover-speed="350"><i class="icon-line-ellipsis"></i></a>
                            </div>
                        </div>
                        <div class="bg-overlay-bg dark" data-hover-animate="fadeIn"></div>
                    </div>
                </div>
            </div>
        </article>
        <article class="portfolio-item pf-uielements pf-media">
            <div class="grid-inner">
                <div class="portfolio-image">
                    <a href="portfolio-single.html">
                        <img src="images/portfolio/taisho.png" alt="Console Activity">
                    </a>
                    <div class="bg-overlay">
                        <div class="bg-overlay-content dark flex-column" data-hover-animate="fadeIn">
                            <div class="portfolio-desc pt-0 center" data-hover-animate="fadeInDownSmall" data-hover-animate-out="fadeOutUpSmall" data-hover-speed="350">
                                <h3><a href="portfolio-single.html">Console Activity</a></h3>
                                <span><a href="#">UI Elements</a>, <a href="#">Media</a></span>
                            </div>

                            <div class="d-flex">
                                <a href="images/portfolio/taisho.png" class="overlay-trigger-icon bg-light text-dark" data-hover-animate="fadeInUpSmall" data-hover-animate-out="fadeOutDownSmall" data-hover-speed="350" data-lightbox="image" title="Image"><i class="icon-line-plus"></i></a>
                                <a href="portfolio-single.html" class="overlay-trigger-icon bg-light text-dark" data-hover-animate="fadeInUpSmall" data-hover-animate-out="fadeOutDownSmall" data-hover-speed="350"><i class="icon-line-ellipsis"></i></a>
                            </div>
                        </div>
                        <div class="bg-overlay-bg dark" data-hover-animate="fadeIn"></div>
                    </div>
                </div>
            </div>
        </article>

    </div><!-- portfolio-carousel end -->

    <br />
    <br />
    <br />
    <br />
    <br />

    <div class="section bg-transparent testi-cards" style="margin-top: 0px; padding-top: 0px">
        <div class="container">
            <div class="row align-items-center justify-content-around">
                <div class="col-lg-4">
                    <h3 class="fw-bolder h1 mb-4 text-start theme-font-color">What Some of our Clients Say</h3>

                    <div id="oc-testi" class="owl-carousel testimonials-carousel carousel-widget mt-5" data-margin="0" data-items="1" data-pagi="true" data-nav="false">

                        <div class="oc-item">
                            <div class="testimonial border-0 shadow-none bg-transparent">
                                <div class="testi-content">
                                    <p>Quickly redefine resource sucking web services after exceptional customer service. Professionally coordinate focused platforms before visionary architectures.</p>
                                    <div class="testi-meta d-flex align-items-center">
                                        <img src="{{ asset('images/testi/face.jpg') }}" alt="Face" width="30" style="    width: 72px; margin-right: 12px;">
                                        <div class="d-flex flex-column">
                                            John Doe
                                            <span class="ps-0">XYZ Inc.</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="oc-item">
                            <div class="testimonial border-0 shadow-none bg-transparent">
                                <div class="testi-content">
                                    <p>Dramatically mesh user friendly solutions whereas sticky human capital. Assertively fashion impactful "outside the box".</p>
                                    <div class="testi-meta d-flex align-items-center">
                                        <img src="{{ asset('images/testi/face2.jpg') }}" alt="Face" width="30" style="    width: 72px; margin-right: 12px;">
                                        <div class="d-flex flex-column">
                                            John Doe
                                            <span class="ps-0">XYZ Inc.</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="oc-item">
                            <div class="testimonial border-0 shadow-none bg-transparent">
                                <div class="testi-content">
                                    <p>Progressively productivate customer directed meta-services without magnetic bandwidth.</p>
                                    <div class="testi-meta d-flex align-items-center">
                                        <img src="{{ asset('images/testi/face3.jpg') }}" alt="Face" width="30" style="    width: 72px; margin-right: 12px;">
                                        <div class="d-flex flex-column">
                                            John Doe
                                            <span class="ps-0">XYZ Inc.</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-lg-6">
                    <img src="{{ asset('images/testi/bg.svg') }}" alt="">
                </div>
            </div>
        </div>
    </div>
@endsection


@section('pagejs')
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        let animate = document.querySelector('#counter-cards-container');
        
        animate.style.transform = 'translate(0px, 0px)';
        animate.style.opacity = '1';
    });
</script>
@endsection

