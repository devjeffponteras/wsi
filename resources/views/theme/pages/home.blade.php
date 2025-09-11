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

            <div class="mx-auto" style="max-width: 960px">
                <div class="row clearfix">
                    <div class="col-12 col-md-4 center customers-count">
                        <div class="counter center counter-medium font-primary theme-font-color"><span data-from="100" data-to="567" data-refresh-interval="100" data-speed="2000" data-comma="true"></span>+</div>
                        <p class="opac-8">employees from 157+ countries</p>
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

    function buynow(){
        var qty = $('#quantity').val();
        $('#buy_now_qty').val(qty);

        $('#buy-now-form').submit();
    }

    
    function add_to_cart(product, price, remaining_stock, name, image){

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var qty   = 1;
        // var price = parseFloat($('#product_price').val());
        // var remaining_stock = parseFloat($('#remaining_stock').val());

        if(qty <= remaining_stock){

            $.ajax({
                data: {
                    "product_id": product, 
                    "qty": qty,
                    "price": price,
                    "_token": "{{ csrf_token() }}",
                },
                type: "post",
                url: "{{route('product.add-to-cart')}}",
                success: function(returnData) {
                    $("#loading-overlay").hide();
                    if (returnData['success']) {

                        $('.top-cart-number').html(returnData['totalItems']);


                        var cartotal = parseFloat($('#input-top-cart-total').val());
                        var productotal = price*qty;
                        var newtotal = cartotal+productotal;


                        $('#top-cart-total').html('₱'+newtotal.toFixed(2));
				        $('#input-top-cart-total').val(newtotal);

                        // $('#top-cart-items').append(
                        //     '<div class="top-cart-item">'+
                        //         '<div class="top-cart-item-image border-0">'+
                        //             '<a href="#"><img src="{{-- asset('storage/products/'.$product->photoPrimary) --}}" alt="Cart Image 1" /></a>'+
                        //         '</div>'+
                        //         '<div class="top-cart-item-desc">'+
                        //             '<div class="top-cart-item-desc-title">'+
                        //                 '<a href="#" class="fw-medium">{{--$product->name--}}</a>'+
                        //                 '<span class="top-cart-item-price d-block">'+price.toFixed(2)+'</span>'+
                        //                 '<div class="d-flex mt-2">'+
                        //                     '<a href="#" class="fw-normal text-black-50 text-smaller"><u>Edit</u></a>'+
                        //                     '<a href="#" class="fw-normal text-black-50 text-smaller ms-3" onclick="top_remove_product('+returnData['cartId']+');"><u>Remove</u></a>'+
                        //                 '</div>'+
                        //             '</div>'+
                        //             '<div class="top-cart-item-quantity">x '+qty+'</div>'+
                        //         '</div>'+
                        //    '</div>'
                        // );
                        var cartItem = $('#top-cart-items').find('[data-product-id="' + product + '"]');
                        if (cartItem.length) {
                            // If the item already exists in the cart, update its quantity and price
                            var oldQty = parseFloat(cartItem.find('.top-cart-item-quantity').text().trim().replace('x ', ''));
                            var newQty = oldQty + qty;
                            var oldPrice = parseFloat(cartItem.find('.top-cart-item-price').text().trim().replace('₱', ''));
                            var productTotal = price * qty;
                            var newTotal = oldPrice + productTotal;

                            cartItem.find('.top-cart-item-quantity').text('x ' + newQty);
                            // cartItem.find('.top-cart-item-price').text('₱' + newTotal.toFixed(2));
                        } else {

                            $('#top-cart-items').append(
                                '<div class="top-cart-item" data-product-id="' + product + '">' +
                                '<div class="top-cart-item-image border-0">' +
                                '<a href="#"><img src="{{ asset('storage/products/') }}/' + image + '" alt="Cart Image 1" /></a>' +
                                '</div>' +
                                '<div class="top-cart-item-desc">' +
                                '<div class="top-cart-item-desc-title">' +
                                '<a href="#" class="fw-medium">' + name + '</a>' +
                                '<span class="top-cart-item-price d-block">₱' + price + '</span>' +
                                '<div class="d-flex mt-2">' +
                                '<a href="javascript:void()" onclick="location.reload();" class="fw-normal text-black-50 text-smaller"><u>Reload to Edit</u></a>' +
                                '<a href="#" class="fw-normal text-black-50 text-smaller ms-3" onclick="top_remove_product(' + returnData['cartId'] + ');"><u>Remove</u></a>' +
                                '</div>' +
                                '</div>' +
                                '<div class="top-cart-item-quantity">x ' + qty + '</div>' +
                                '</div>' +
                                '</div>'
                            );

                            // $('#top-cart-items').append(
                            //     '<div class="top-cart-item" data-product-id="' + product + '">' +
                            //     '<div class="top-cart-item-image border-0">' +
                            //     '<a href="#"><img src="{{-- asset('storage/products/'.$product->photoPrimary) --}}" alt="Cart Image 1" /></a>' +
                            //     '</div>' +
                            //     '<div class="top-cart-item-desc">' +
                            //     '<div class="top-cart-item-desc-title">' +
                            //     '<a href="#" class="fw-medium">{{--$product->name--}}</a>' +
                            //     '<span class="top-cart-item-price d-block">₱' + price + '</span>' +
                            //     // '<span class="top-cart-item-price d-block">₱' + (price * qty).toFixed(2) + '</span>' +
                            //     '<div class="d-flex mt-2">' +
                            //     '<a href="javascript:void()" onclick="location.reload();" class="fw-normal text-black-50 text-smaller"><u>Reload to Edit</u></a>' +
                            //     '<a href="#" class="fw-normal text-black-50 text-smaller ms-3" onclick="top_remove_product(' + returnData['cartId'] + ');"><u>Remove</u></a>' +
                            //     '</div>' +
                            //     '</div>' +
                            //     '<div class="top-cart-item-quantity">x ' + qty + '</div>' +
                            //     '</div>' +
                            //     '</div>'
                            // );
                        }

                        $.notify("Product Added to your cart",{ 
                            position:"bottom right", 
                            className: "success" 
                        });

                    } else {
                        swal({
                            toast: true,
                            position: 'center',
                            title: "Warning!",
                            text: "We have insufficient inventory for this item.",
                            type: "warning",
                            showCancelButton: true,
                            timerProgressBar: true, 
                            closeOnCancel: false

                        });
                    }
                }
            });

            $('#quantity').val(1);
            $('#remaining_stock').val(remaining_stock - qty);
        }
        else{
            swal({
                toast: true,
                position: 'center',
                title: "Warning!",
                text: "We have insufficient inventory for this item.",
                type: "warning",
                showCancelButton: true,
                timerProgressBar: true, 
                closeOnCancel: false

            });
        }
    }

    // function add_to_cart(product, price){

    //     $.ajaxSetup({
    //         headers: {
    //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //         }
    //     });

    //     var qty   = 1
    //     // var qty   = parseFloat($('#quantity').val());
    //     // var price = parseFloat($('#product_price').val());

    //     $.ajax({
    //         data: {
    //             "product_id": product, 
    //             "qty": qty,
    //             "_token": "{{ csrf_token() }}",
    //         },
    //         type: "post",
    //         url: "{{route('product.add-to-cart')}}",
    //         success: function(returnData) {
    //             $("#loading-overlay").hide();
    //             if (returnData['success']) {

    //                 $('.top-cart-number').html(returnData['totalItems']);


    //                 var cartotal = parseFloat($('#input-top-cart-total').val());
    //                 var productotal = price*qty;
    //                 var newtotal = cartotal+productotal;

    //                 $('#top-cart-total').html('₱'+newtotal.toFixed(2));
    //                 var cartItem = $('#top-cart-items').find('[data-product-id="' + product + '"]');
    //                 // if (cartItem.length) {
    //                 //     // If the item already exists in the cart, update its quantity and price
    //                 //     var oldQty = parseFloat(cartItem.find('.top-cart-item-quantity').text().trim().replace('x ', ''));
    //                 //     var newQty = oldQty + qty;
    //                 //     var oldPrice = parseFloat(cartItem.find('.top-cart-item-price').text().trim().replace('₱', ''));
    //                 //     var productTotal = price * qty;
    //                 //     var newTotal = oldPrice + productTotal;

    //                 //     cartItem.find('.top-cart-item-quantity').text('x ' + newQty);
    //                 //     // cartItem.find('.top-cart-item-price').text('₱' + newTotal.toFixed(2));
    //                 // } else {

    //                 //     $('#top-cart-items').append(
    //                 //         '<div class="top-cart-item" data-product-id="' + product + '">' +
    //                 //         '<div class="top-cart-item-image border-0">' +
    //                 //         '<a href="#"><img src="{{-- asset('storage/products/'.$product->photoPrimary) --}}" alt="Cart Image 1" /></a>' +
    //                 //         '</div>' +
    //                 //         '<div class="top-cart-item-desc">' +
    //                 //         '<div class="top-cart-item-desc-title">' +
    //                 //         '<a href="#" class="fw-medium">{{--$product->name--}}</a>' +
    //                 //         '<span class="top-cart-item-price d-block">₱' + price + '</span>' +
    //                 //         // '<span class="top-cart-item-price d-block">₱' + (price * qty).toFixed(2) + '</span>' +
    //                 //         '<div class="d-flex mt-2">' +
    //                 //         '<a href="javascript:void()" onclick="location.reload();" class="fw-normal text-black-50 text-smaller"><u>Reload to Edit</u></a>' +
    //                 //         '<a href="#" class="fw-normal text-black-50 text-smaller ms-3" onclick="top_remove_product(' + returnData['cartId'] + ');"><u>Remove</u></a>' +
    //                 //         '</div>' +
    //                 //         '</div>' +
    //                 //         '<div class="top-cart-item-quantity">x ' + qty + '</div>' +
    //                 //         '</div>' +
    //                 //         '</div>'
    //                 //     );

    //                 // }
                    
    //                 $('#top-cart-items').append(
    //                     '<div class="top-cart-item" data-product-id="' + product + '">' +
    //                         '<a href="javascript:void()" onclick="location.reload();" class="fw-normal text-black-50 text-smaller"><u>New item added. Reload to Edit</u></a>' +
    //                     '</div>'
    //                 );

    //                 $.notify("Product Added to your cart",{ 
    //                     position:"bottom right", 
    //                     className: "success" 
    //                 });

    //             } else {
    //                 swal({
    //                     toast: true,
    //                     position: 'center',
    //                     title: "Warning!",
    //                     text: "We have insufficient inventory for this item.",
    //                     type: "warning",
    //                     showCancelButton: true,
    //                     timerProgressBar: true, 
    //                     closeOnCancel: false

    //                 });
    //             }
    //         }
    //     });

    //     $('#quantity').val(1);
    // }
    
</script>

<script>
    
    // for edit quantity
	function FormatAmount(number, numberOfDigits) {
		var amount = parseFloat(number).toFixed(numberOfDigits);
		var num_parts = amount.toString().split(".");
		num_parts[0] = num_parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");

		return num_parts.join(".");
	}

	function addCommas(nStr){
		nStr += '';
		x = nStr.split('.');
		x1 = x[0];
		x2 = x.length > 1 ? '.' + x[1] : '';
		var rgx = /(\d+)(\d{3})/;
		while (rgx.test(x1)) {
			x1 = x1.replace(rgx, '$1' + ',' + '$2');
		}
		return x1 + x2;
	}

    function plus_qty(id){
		var qty = parseFloat($('#quantity'+id).val())+1;

		if(parseInt($('#maxorder'+id).val()) < 1){
			swal({
				title: '',
				text: 'Sorry. Currently, there is no sufficient stocks for the item you wish to order.',
				icon: 'warning'
			});

			$('#quantity'+id).val($('#prevqty'+id).val()-1);
			return false;
		}

		order_qty(id,qty);
	}

	function minus_qty(id){
		var qty = parseFloat($('#quantity'+id).val())-1;
		order_qty(id,qty);
	}

	function order_qty(id,qty){

		if(qty == 0){
			$('#quantity'+id).val(1).val();
			return false;
		}
		
		var price = $('#cartItemPrice'+id).val();
		total_price  = parseFloat(price)*parseFloat(qty);

		$('#order'+id+'_total_price').html('₱'+FormatAmount(total_price,2));
		$('#input_order'+id+'_product_total_price').val(total_price);

		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});

		$.ajax({
			data: { 
				"quantity": qty, 
				"orderID": id, 
				"_token": "{{ csrf_token() }}",
			},
			type: "post",
			url: "{{route('cart.update')}}",
			
			success: function(returnData) {

				$('#maxorder'+id).val(returnData.maxOrder);
				$('.top-cart-number').html(returnData['totalItems']);
				$('#prevqty'+id).val(qty);
				// var promo_discount = parseFloat(returnData.total_promo_discount);

				// let subtotal = 0;
				// $(".input_product_total_price").each(function() {
				//     if(!isNaN(this.value) && this.value.length!=0) {
				//         subtotal += parseFloat(this.value);
				//     }
				// });

				// $('#subtotal').val(subtotal);


				// for the sidebar cart total
				// var cartotal = parseFloat($('#input-top-cart-total').val());
				// var productotal = price*qty;
				// var newtotal = cartotal+total_price;
				
				// alert(cartotal);

				// $('#input-top-cart-total').val(newtotal);
				// $('#top-cart-total').html('₱'+newtotal.toFixed(2));
				// 
				
				// resetCoupons();
				cart_total();
			}
		});
	}

	function cart_total(){
		var couponTotalDiscount = parseFloat($('#coupon_total_discount').val());
		var promoTotalDiscount = 0;
		var subtotal = 0;

		$(".input_product_total_price").each(function() {
			if(!isNaN(this.value) && this.value.length!=0) {
				subtotal += parseFloat(this.value);
			}
		});

		if(couponTotalDiscount == 0){
			$('#couponDiscountDiv').css('display','none');
		}

		// var totalDeduction = promoTotalDiscount + couponTotalDiscount;
		// var grandtotal = subtotal - totalDeduction;
		
		// $('#subtotal').html('₱'+FormatAmount(subtotal,2));

		$('#top-cart-total').val(subtotal);
		$('#top-cart-total').html('₱'+subtotal.toFixed(2));
	}

    $("#op_hov1").on("mouseover", function () {

        $('#img_op1').removeClass('invi');
        for(var i = 2; i <= 11; i++) {
            img_looper(i);
        }
    });

    $("#op_hov2").on("mouseover", function () {

        $('#img_op2').removeClass('invi');
        $('#img_op1').addClass('invi');
        for(var i = 3; i <= 11; i++) {
            img_looper(i);
        }
    });

    $("#op_hov3").on("mouseover", function () {

        $('#img_op3').removeClass('invi');
        for(var u = 1; u <= 2; u++) {
            img_looper(u);
        }
        for(var i = 4; i <= 11; i++) {
            img_looper(i);
        }
    });

    $("#op_hov4").on("mouseover", function () {

        $('#img_op4').removeClass('invi');
        for(var u = 1; u <= 3; u++) {
            img_looper(u);
        }
        for(var i = 5; i <= 11; i++) {
            img_looper(i);
        }
    });

    $("#op_hov5").on("mouseover", function () {

        $('#img_op5').removeClass('invi');
        for(var u = 1; u <= 4; u++) {
            img_looper(u);
        }
        for(var i = 6; i <= 11; i++) {
            img_looper(i);
        }
    });

    $("#op_hov6").on("mouseover", function () {

        $('#img_op6').removeClass('invi');
        for(var u = 1; u <= 5; u++) {
            img_looper(u);
        }
        for(var i = 7; i <= 11; i++) {
            img_looper(i);
        }
    });

    $("#op_hov7").on("mouseover", function () {

        $('#img_op7').removeClass('invi');
        for(var u = 1; u <= 6; u++) {
            img_looper(u);
        }
        for(var i = 8; i <= 11; i++) {
            img_looper(i);
        }
    });

    $("#op_hov8").on("mouseover", function () {

        $('#img_op8').removeClass('invi');
        for(var u = 1; u <= 7; u++) {
            img_looper(u);
        }
        for(var i = 9; i <= 11; i++) {
            img_looper(i);
        }
    });

    $("#op_hov9").on("mouseover", function () {

        $('#img_op9').removeClass('invi');
        for(var u = 1; u <= 8; u++) {
            img_looper(u);
        }
        for(var i = 10; i <= 11; i++) {
            img_looper(i);
        }
    });

    $("#op_hov10").on("mouseover", function () {

        $('#img_op10').removeClass('invi');
        $('#img_op11').addClass('invi');

        for(var u = 1; u <= 9; u++) {
            img_looper(u);
        }
        
    });

    $("#op_hov11").on("mouseover", function () {

        $('#img_op11').removeClass('invi');
        
        for(var u = 1; u <= 10; u++) {
            img_looper(u);
        }
        
    });
    function img_looper(cnt){
        let img_op = '#img_op' + cnt;
        $(img_op).addClass('invi');
    }

    // services js animation
    $('#img_serv_trigger1').on("mouseover", function () {
        $('#img_serv1').addClass('scaleUp');
    });
    $('#img_serv_trigger1').on("mouseout", function () {
        $('#img_serv1').removeClass('scaleUp');
    });

    $('#img_serv_trigger2').on("mouseover", function () {
        $('#img_serv2').addClass('scaleUp');
    });
    $('#img_serv_trigger2').on("mouseout", function () {
        $('#img_serv2').removeClass('scaleUp');
    });

    $('#img_serv_trigger3').on("mouseover", function () {
        $('#img_serv3').addClass('scaleUp');
    });
    $('#img_serv_trigger3').on("mouseout", function () {
        $('#img_serv3').removeClass('scaleUp');
    });

    $('#img_serv_trigger4').on("mouseover", function () {
        $('#img_serv4').addClass('scaleUp');
    });
    $('#img_serv_trigger4').on("mouseout", function () {
        $('#img_serv4').removeClass('scaleUp');
    });

</script>
@endsection

