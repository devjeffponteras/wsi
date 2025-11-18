<head>

    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="author" content="SemiColonWeb" />

    <!-- Font Imports -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:ital@0;1&display=swap"
        rel="stylesheet">

    <!-- Stylesheets
    ============================================= -->
    <link rel="stylesheet" href="{{ asset('theme/css/bootstrap.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('theme/css/style.css') }}" type="text/css" />
    <!-- <link rel="stylesheet" href="{{ asset('theme/css/swiper.css') }}" type="text/css" /> -->

    <!-- Construction Demo Specific Stylesheet -->
    <!-- / -->

    <link rel="stylesheet" href="{{ asset('theme/css/dark.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('theme/css/font-icons.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('theme/css/animate.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('theme/css/magnific-popup.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('theme/css/slick.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('theme/css/slick-theme.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('theme/css/fontawesome.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('theme/css/cookiealert.css') }}" type="text/css"  />
    <link rel="stylesheet" href="{{ asset('theme/css/fonts.css') }}" type="text/css"  />
    <!-- <link rel="stylesheet" href="{{ asset('theme/css/cafe.css') }}" type="text/css"  /> -->

    <link rel="stylesheet" href="{{ asset('theme/css/custom.css') }}" type="text/css" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- <link rel="icon" href="{{ asset('storage').'/icons/'.Setting::getFaviconLogo()->website_favicon }}" type="image/x-icon"> -->
    <!-- <link rel="stylesheet" href="{{ asset('theme/extra/drone.css') }}" type="text/css"  /> -->

    <link rel="stylesheet" href="{{ asset('theme/addons/css/style.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('theme/addons/css/font-icons.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('theme/addons/css/swiper.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('theme/addons/include/rs-plugin/css/settings.css') }}" media="screen">
    <link rel="stylesheet" href="{{ asset('theme/addons/include/rs-plugin/css/layers.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('theme/addons/include/rs-plugin/css/navigation.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('theme/addons/css/custom.css') }}" type="text/css" />


    <!-- add-on css -->
    <!-- main color #144596 -->
    <style type="text/css">
        .is-expanded-menu .menu-container:not(.mobile-primary-menu) {
            /*display: flex !important;*/
            flex-wrap: wrap !important;
            align-items: center !important;
        }
        #top-search.header-misc-icon {
/*            display: none;*/
        }
        .primary-menu-trigger {
/*            display: none;*/
        }
        body #header.transparent-header.floating-header {
             margin-top: 0px !important;
        }
        #wrapper #header.transparent-header.floating-header .container {
            background-color: transparent !important;
        }
        /*header#header:not(.sticky-header) div#header-wrap,
        header#header.sticky-header  div#header-wrap {
            margin-top: 24px;
        }*/
        #wrapper header#header div#header-wrap {
             /*background-color: transparent !important;
             box-shadow: none !important;
             border-bottom: none !important;
             margin-top: 24px;*/
        }
        #header-wrap > .container {
            /*border-radius: 50px !important;
            border: 1px solid #e5e5e599 !important;
            box-shadow: 0px 0px 4px #4c4c4c75;*/
        }
        header#header .menu-container > .menu-item.current > .menu-link,
        header#header .menu-container > .menu-item:hover > .menu-link {
/*            color: #144596 !important;*/
        }
        div#wrapper section#slider {
/*            margin-top: -85px;*/
        }
        #footer.modair-footer {
            background-color: #212529 !important;
        }
        .primary-a {
            color: #0c4499 !important;
            background-color: #dfecfd !important;
            font-weight: 800 !important;
            transition: all 0.2s;
        }
        .primary-label {
            color: #0c4499 !important;
            background-color: #dfecfd !important;
            padding: 2px 15px;
            font-size: 32px !important;
            max-width: fit-content;
            border-radius: 14px;
        }
        .light-body {
            background-color: #ffffff !important;
            margin: 0px !important;
            width: 100% !important;
            max-width: 100% !important;
            padding: 55px 80px 80px 80px;
        }
        .dark-body {
            background-color: #c9d3e0 !important;
            margin: 0px !important;
            width: 100% !important;
            max-width: 100% !important;
            padding: 55px 80px 80px 80px;
        }
        .text-extrabold{
            font-weight:900 !important;
        }
        .primary-a span {
            cursor: pointer;
            display: inline-block;
            position: relative;
            transition: 0.5s;
        }
        .primary-a span:after {
            content: '\00bb';
            position: absolute;
            opacity: 0;
            top: 0;
            right: -20px;
            transition: 0.5s;
        }
        .primary-a:hover span {
            padding-right: 25px;
        }
        .primary-a:hover span:after {
            opacity: 1;
            right: 0;
        }
        .primary-a:hover {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        }
        #website-content .heading-block h1 {
            margin-top: -80px;
            z-index: 9;
            position: absolute;
        }
        .primary-colors {
            color: #0c4499 !important;
        }
        .qr-modair-size {
            max-height: 510px !important;
        }
        li.list-style-none {
            list-style: none;
            color: #0c4499 !important;
            font-size: 24px;
            font-weight: 600;
            text-shadow: 2px 2px 4px #767676;
            margin: 10px 0px;
        }
        li.list-style-none a {
            color: #0c4499 !important;
        }
        ul.list-group-container {
            margin-top: -16px;
        }
        li.list-style-none:hover {
            scale: 1.02;
            transition: all .2s;
            color: #c0cde3 !important;
            text-shadow: 2px 2px 4px #0c4499;
        }
        li.list-style-none:hover a {
            color: #c0cde3 !important;
            text-shadow: 2px 2px 4px #0c4499;
        }
        .light-body-services {
            margin-top: 0px !important;
        }
        #website-content .light-body-services .heading-block h1 {
            margin-top: -80px !important;
        }
        .col-md-6.services-list {
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        .rounded-corners {
            border-radius: 16px;
        }
        div#wrapper section#slider.slider-element.boxed-slider .slider-wrap .half-one{
            padding-top: 20px;
        }
        #slider .clearfix .heading-block::after {
            display: none;
        }
        .floating-panel {
            background-color: #85a1cc85;
            border-radius: 16px;
            padding: 24px;
            position: absolute;
            left: 4%;
            top: 20%;
            z-index: 1;
        }
        .flex-center-center {
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        .flex-center-center .position-relative.overflow-hidden a img {
            border-radius: 16px;
        }
        .invi {
            display: none;
        }

        .col-md-6.text-center.flex-center-center .position-relative.overflow-hidden a .card {
            position: absolute;
            z-index: 1;
            min-width: 50%;
            max-width: 50%;
            min-height: 60%;
            left: 5%;
            top: 10%;
            background-color: #85a1ccc7;
            border-radius: 14px;
            border: none;
            text-align: left;
            color: white;
        }
        .col-md-6.text-center.flex-center-center .position-relative.overflow-hidden a .card .card-header {
            border: none;
        }
        i.bi-facebook,
        i.bi-linkedin {
            font-size: 35px;
            margin-right: 12px;
            margin-left: 12px;
        }
        .modair-primary-logo {
            min-width: 210px;
        }

        /*our services animations*/
        a.img-services-wrapper {
            position: relative;
        }
        a.img-services-wrapper img.img-services-item {
            position: absolute;
            left: 0;
            border-radius: 100%;
        }
        img.img-services-item.img-services-animate-odd {
            -webkit-animation:spin 10s linear infinite;
            -moz-animation:spin 10s linear infinite;
            animation:spin 10s linear infinite;
        }
        img.img-services-item.img-services-animate-even {
            -webkit-animation:spin 50s linear infinite;
            -moz-animation:spin 50s linear infinite;
            animation:spin 50s linear infinite;
        }
        @-moz-keyframes spin {
            100% { -moz-transform: rotate(360deg); }
        }
        @-webkit-keyframes spin {
            100% { -webkit-transform: rotate(360deg); }
        }
        @keyframes spin {
            100% {
                -webkit-transform: rotate(360deg);
                transform:rotate(360deg);
            }
        }
        .position-relative.overflow-hidden.img-services-container {
            padding: 15px;
        }
        .scaleUp {
            transform: scale(1.30);
            transition: all .2s;
        }

        .services-list li.list-style-none {
            font-size: 32px;
        }
        .primary-label.neutralfix {
            margin-left: 55px;
        }
        .light-body {
            margin: 0px !important;
            width: 100% !important;
            max-width: 100% !important;
            padding: 55px 80px 80px 80px;
        }

        .card .side-menu ul li a.menu-link {
            color: #2c2c2c !important;
            font-weight: 400 !important;
        }
        #copyrights .copyright-links a {
            color: rgba(255, 255, 255, 0.4);
        }
        #header .header-wrap-clone {
            height: 100% !important;
        }

        /*section#slider.slick-wrapper.clearfix .banner-wrapper:not(.no-slider-banner),
        section#slider.slick-wrapper.clearfix div#banner.home-slider.slick-initialized:not(.no-slider-banner) {
            height: 443px !important;
        }*/
        /*.slick-slide .hero-slide .banner-caption .row.align-items-center .col-lg-12 h2.text-center.slide-content {
            margin-top: -15%;
        }*/
        section#slider.slick-wrapper.clearfix.subpage-banner .banner-wrapper {
            position: relative;
        }
        section#slider.slick-wrapper.clearfix.subpage-banner .col-12,
        section#slider.slick-wrapper.clearfix.subpage-banner .col-lg-12 {
            position: relative;
        }
        section#slider.slick-wrapper.clearfix.subpage-banner #banner {
            position: relative;
            z-index: 1;
        }
        section#slider.slick-wrapper.clearfix.subpage-banner #banner .hero-slide {
            position: relative;
            width: 100%;
            aspect-ratio: 2000 / 600;
            min-height: 200px;
            overflow: hidden;
        }
        section#slider.slick-wrapper.clearfix.subpage-banner #banner .hero-slide img {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        @supports not (aspect-ratio: 1 / 1) {
            section#slider.slick-wrapper.clearfix.subpage-banner #banner .hero-slide {
                height: 0;
                padding-top: 30%;
                min-height: 0;
            }
        }
        section#slider.slick-wrapper.clearfix.subpage-banner .sub-banner-caption {
            position: absolute;
            inset: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: clamp(2rem, 5vw, 4rem) 1.5rem;
            text-align: center;
            z-index: 2;
        }
        section#slider.slick-wrapper.clearfix.subpage-banner .sub-banner-caption::before {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(180deg, rgba(5, 13, 28, 0.55) 0%, rgba(5, 13, 28, 0.75) 100%);
            z-index: -1;
        }
        section#slider.slick-wrapper.clearfix.subpage-banner .sub-banner-caption > .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 1rem;
        }
        section#slider.slick-wrapper.clearfix.subpage-banner .sub-banner-caption h2 {
            margin-bottom: 0;
            font-weight: 600;
            font-size: clamp(1.75rem, 3vw, 2.75rem);
        }
        section#slider.slick-wrapper.clearfix.subpage-banner .sub-banner-flex {
            display: flex;
            justify-content: center;
        }
        section#slider.slick-wrapper.clearfix.subpage-banner .sub-banner-flex .breadcrumb {
            background: transparent;
            margin-bottom: 0;
            gap: 0.75rem;
            flex-wrap: wrap;
            justify-content: center;
        }
        section#slider.slick-wrapper.clearfix.subpage-banner .sub-banner-flex .breadcrumb-item {
            font-size: 0.9375rem;
        }
        section#slider.slick-wrapper.clearfix.subpage-banner .sub-banner-flex .breadcrumb-item + .breadcrumb-item::before {
            color: rgba(255, 255, 255, 0.65);
        }
        nav.primary-menu.with-arrows ul.menu-container li.menu-item.sub-menu ul.sub-menu-container {
            background-color: #ffffff;
        }
        div#banner.home-slider:not(.no-slider-banner) .slick-list.draggable .slick-track .slick-slide .hero-slide {
            max-height: 650px;
        }
        div#banner.home-slider:not(.no-slider-banner) .slick-list.draggable .slick-track .slick-slide .hero-slide .banner-caption .row.align-items-center .col-lg-12 h2 {
            font-size: 48px;
            font-weight: 500 !important;
        }
        section#slider.home-slider-banner img {
            transform: translate(0px, -12%);
        }
        @media only screen and (max-width: 1367px) {
            section#slider.home-slider-banner img {
                transform: translate(0px, -8%);
            }
            div#banner.home-slider:not(.no-slider-banner) .slick-list.draggable .slick-track .slick-slide .hero-slide {
                max-height: 445px;
            }
        }

        @media only screen and (max-width: 991.98px) {
            section#slider.slick-wrapper.clearfix.subpage-banner .sub-banner-caption {
                padding: clamp(2rem, 8vw, 3.5rem) 1.25rem;
            }
            section#slider.slick-wrapper.clearfix.subpage-banner #banner .hero-slide {
                min-height: 180px;
            }
        }

        @media only screen and (max-width: 575.98px) {
            section#slider.slick-wrapper.clearfix.subpage-banner .sub-banner-caption h2 {
                font-size: clamp(1.5rem, 6vw, 2.125rem);
            }
            section#slider.slick-wrapper.clearfix.subpage-banner .sub-banner-flex .breadcrumb-item {
                font-size: 0.875rem;
            }
            section#slider.home-slider-banner img {
                transform: none;
            }
            div#banner.home-slider:not(.no-slider-banner) .slick-list.draggable .slick-track .slick-slide .hero-slide {
                position: relative;
                display: flex;
                align-items: center;
                justify-content: center;
                width: 100%;
                aspect-ratio: 2000 / 600;
                min-height: 200px;
                padding: clamp(2rem, 7vw, 3.5rem) 1.5rem;
                overflow: hidden;
            }
            div#banner.home-slider:not(.no-slider-banner) .slick-list.draggable .slick-track .slick-slide .hero-slide.no-caption {
                padding: 0;
            }
            div#banner.home-slider:not(.no-slider-banner) .slick-list.draggable .slick-track .slick-slide .hero-slide::after {
                content: '';
                position: absolute;
                inset: 0;
                background: linear-gradient(180deg, rgba(5, 13, 28, 0.55) 0%, rgba(5, 13, 28, 0.75) 100%);
                z-index: 1;
            }
            div#banner.home-slider:not(.no-slider-banner) .slick-list.draggable .slick-track .slick-slide .hero-slide.no-caption::after {
                background: none !important;
            }
            div#banner.home-slider:not(.no-slider-banner) .slick-list.draggable .slick-track .slick-slide .hero-slide > img,
            div#banner.home-slider:not(.no-slider-banner) .slick-list.draggable .slick-track .slick-slide .hero-slide > video {
                position: absolute;
                inset: 0;
                width: 100%;
                height: 100%;
                object-fit: cover;
                z-index: 0;
            }
            div#banner.home-slider:not(.no-slider-banner) .slick-list.draggable .slick-track .slick-slide .hero-slide .banner-caption {
                position: relative;
                z-index: 2;
                width: 100%;
                text-align: center;
            }
            div#banner.home-slider:not(.no-slider-banner) .slick-list.draggable .slick-track .slick-slide .hero-slide .banner-caption .container {
                max-width: clamp(300px, 88vw, 480px);
            }
            div#banner.home-slider:not(.no-slider-banner) .slick-list.draggable .slick-track .slick-slide .hero-slide .banner-caption .row.align-items-center {
                justify-content: center;
            }
            div#banner.home-slider:not(.no-slider-banner) .slick-list.draggable .slick-track .slick-slide .hero-slide .banner-caption h2.slide-content {
                font-size: clamp(1.5rem, 7.5vw, 2.2rem);
                margin-bottom: clamp(0.75rem, 4vw, 1.25rem);
            }
            div#banner.home-slider:not(.no-slider-banner) .slick-list.draggable .slick-track .slick-slide .hero-slide .banner-caption p.slide-content2 {
                font-size: clamp(0.62rem, 2.3vw, 0.98rem) !important;
                line-height: 1.35;
                max-width: clamp(220px, 62vw, 320px);
                margin-left: auto;
                margin-right: auto;
                padding-left: clamp(0.75rem, 6vw, 1.5rem);
                padding-right: clamp(0.75rem, 6vw, 1.5rem);
            }
            div#banner.home-slider:not(.no-slider-banner) .slick-list.draggable .slick-track .slick-slide .hero-slide .banner-caption .d-flex.mt-5 {
                margin-top: clamp(0.85rem, 5.5vw, 1.5rem) !important;
                display: flex !important;
            }
            div#banner.home-slider:not(.no-slider-banner) .slick-list.draggable .slick-track .slick-slide .hero-slide .banner-caption .button {
                display: inline-flex !important;
                align-items: center;
                justify-content: center;
                min-width: clamp(64px, 26vw, 98px);
                padding: clamp(0.18rem, 1.2vw, 0.35rem) clamp(0.46rem, 2.4vw, 0.72rem);
                font-size: clamp(0.48rem, 1.7vw, 0.6rem);
                margin-bottom: clamp(0.35rem, 1.8vw, 0.68rem);
            }
            div#banner.home-slider:not(.no-slider-banner) .slick-prev,
            div#banner.home-slider:not(.no-slider-banner) .slick-next {
                width: clamp(38px, 12vw, 48px);
                height: clamp(38px, 12vw, 48px);
                background: rgba(44, 44, 44, 0.85) !important;
                border: none !important;
                border-radius: 10px;
                box-shadow: 0 2px 8px rgba(0,0,0,0.18) !important;
                top: 50% !important;
                transform: translateY(-50%);
                display: flex;
                align-items: center;
                justify-content: center;
                transition: background 0.2s;
            }
            div#banner.home-slider:not(.no-slider-banner) .slick-prev:before,
            div#banner.home-slider:not(.no-slider-banner) .slick-next:before {
                color: #fff;
                opacity: 0.92;
                font-size: 2rem;
                line-height: 1;
            }
            @media only screen and (max-width: 575.98px) {
                div#banner.home-slider:not(.no-slider-banner) .slick-prev,
                div#banner.home-slider:not(.no-slider-banner) .slick-next {
                    width: 32px;
                    height: 32px;
                    background: rgba(44, 44, 44, 0.85) !important;
                    border: none !important;
                    border-radius: 8px;
                    box-shadow: 0 2px 8px rgba(0,0,0,0.18) !important;
                }
                div#banner.home-slider:not(.no-slider-banner) .slick-prev:before,
                div#banner.home-slider:not(.no-slider-banner) .slick-next:before {
                    font-size: 1.3rem;
                }
            }
            }
            div#banner.home-slider:not(.no-slider-banner) .slick-prev {
                left: clamp(0.6rem, 4vw, 1.4rem) !important;
                margin-left: 0 !important;
            }
            div#banner.home-slider:not(.no-slider-banner) .slick-next {
                right: clamp(0.6rem, 4vw, 1.4rem) !important;
                margin-right: 0 !important;
            }
            div#banner.home-slider:not(.no-slider-banner) .slick-prev:before,
            div#banner.home-slider:not(.no-slider-banner) .slick-next:before {
                color: #ffffff;
                opacity: 0.82;
            }
        }

        div#portfolio .entry .grid-inner.shadow-sm.h-shadow .w-100 a img.w-100 {
            max-height: 300px;
        }

        div#banner.home-slider:not(.no-slider-banner) .slick-list.draggable .slick-track .slick-slide .hero-slide .banner-caption .container {
            max-width: 700px;
        }

        div#banner.home-slider:not(.no-slider-banner) .slick-list.draggable .slick-track .slick-slide .hero-slide .banner-caption .container .col-lg-12 h2.text-center.slide-content {
            text-transform: none;
        }

        @media only screen and (max-width: 993px) {
            .header-custom-menu-wrapper.d-flex {
                /*display: none !important;*/
                position: absolute;
                left: 220px;
            }

            .is-expanded-menu .primary-menu {
              max-width: 100%;
            }

            #wrapper header#header div#header-wrap .d-flex.container-standard .header-row {
                justify-content: space-between !important;
                width: 100%;
            }
        }

        @media only screen and (max-width: 625px) {
            .header-custom-menu-wrapper.d-flex {
                display: none !important;
            }
        }

    </style>

    <style>
        @php
            $jsStyle = str_replace(array("'", "&#039;"), "", old('styles', $page->styles) );
            echo $jsStyle;
        @endphp
    </style>
    <!-- Document Title
    ============================================= -->
    @if (isset($page->name) && $page->name == 'Home')
        <title>{{ Setting::info()->company_name }}</title>
    @else
        <title>{{ (empty($page->meta_title) ? $page->name:$page->meta_title) }} | {{ Setting::info()->company_name }}</title>
    @endif

    @if(!empty($page->meta_description))
        <meta name="description" content="{{ $page->meta_description }}">
    @endif

    @if(!empty($page->meta_keyword))
        <meta name="keywords" content="{{ $page->meta_keyword }}">
    @endif

    @yield('pagecss')
</head>
