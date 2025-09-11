

<!-- Header
============================================= -->
<!-- Header
============================================= -->
<header id="header" class="full-header header-size-custom" data-sticky-shrink="false">
    <div id="header-wrap">
        <div class="container-fluid">
            <div class="d-flex flex-row justify-content-between py-2 container-standard">

                <div class="d-flex flex-row">
                    <!-- Logo
                    ============================================= -->
                    <div id="logo" style="margin: 0px; border-right: none;">
                        <a href="{{ url('/') }}" class="standard-logo">
                            <img src="{{ asset('images/logos/logo-webfocus.png') }}"
                                 alt="{{ Setting::info()->company_name ?? 'Company Name' }}" style="height: 35px">
                        </a>
                    </div><!-- #logo end -->

                    <div id="primary-menu-trigger">
                        <svg class="svg-trigger" viewBox="0 0 100 100"><path d="m 30,33 h 40 c 3.722839,0 7.5,3.126468 7.5,8.578427 0,5.451959 -2.727029,8.421573 -7.5,8.421573 h -20"></path><path d="m 30,50 h 40"></path><path d="m 70,67 h -40 c 0,0 -7.5,-0.802118 -7.5,-8.365747 0,-7.563629 7.5,-8.634253 7.5,-8.634253 h 20"></path></svg>
                    </div>

                    <!-- Primary Navigation
                    ============================================= -->
                    <nav class="primary-menu with-arrows">

                        @include('theme.layouts.components.menu')

                    </nav><!-- #primary-menu end -->
                </div>

                <div class="header-custom-menu-wrapper d-flex flex-row align-items-center">
                    <a href="#" class="custom-menu-link d-flex flex-row align-items-center" style="font-weight: 500;" title="Search">
                        <i class="icon-search"></i>
                    </a>
                    <a href="#" class="custom-menu-link d-flex flex-row align-items-center" style="font-weight: 500;" title="Signin">
                        <i class="icon-user"></i>
                    </a>
                    <a href="#" class="custom-menu-link d-flex flex-row align-items-center" style="font-weight: 500;">
                        Subscribe
                        &nbsp;
                        <i class="icon-line-arrow-right"></i>
                    </a>
                </div>

            </div>
        </div>
    </div>
    <div class="header-wrap-clone"></div>
</header><!-- #header end -->


@include('theme.layouts.components.alert')