
<!-- Header
============================================= -->
<header id="header" class="full-header header-size-custom" data-sticky-shrink="false">
    <div id="header-wrap">
        <div class="container-fluid">
            <div class="d-flex flex-row justify-content-between py-2 container-standard">

                <div class="header-row">
                    <!-- Logo
                    ============================================= -->
                    <div id="logo" style="margin: 0px; border-right: none;">
                        <a href="{{ url('/') }}" class="standard-logo" style="display: block !important;">
                            <img src="{{ asset('images/logos/logo-webfocus.png') }}"
                                 alt="{{ Setting::info()->company_name ?? 'Company Name' }}" style="height: 35px;">
                        </a>
                    </div><!-- #logo end -->

                    <div id="primary-menu-trigger" role="button" aria-expanded="false" aria-controls="primary-menu" aria-label="Toggle menu">
                        <svg class="svg-trigger" viewBox="0 0 100 100"><path d="m 30,33 h 40 c 3.722839,0 7.5,3.126468 7.5,8.578427 0,5.451959 -2.727029,8.421573 -7.5,8.421573 h -20"></path><path d="m 30,50 h 40"></path><path d="m 70,67 h -40 c 0,0 -7.5,-0.802118 -7.5,-8.365747 0,-7.563629 7.5,-8.634253 7.5,-8.634253 h 20"></path></svg>
                    </div>

                    <!-- Mobile-only search moved into the collapsed menu to keep header clean on small screens -->

                    <!-- Primary Navigation
                    ============================================= -->
                    <nav id="primary-menu" class="primary-menu with-arrows" aria-hidden="false">

                        @include('theme.layouts.components.menu')

                    </nav><!-- #primary-menu end -->

                    <div class="header-misc">
                    </div>
                </div>

                <div class="header-custom-menu-wrapper d-flex flex-row align-items-center">
                    <form class="top-search-form" action="{{ route('search') }}" method="get" style="width: 380px; transform: translate(325px, 0px);">
                        <input type="text" name="q" class="form-control search-q" value="" aria-label="Search site" style="color: #2b56d3 !important;" placeholder="Type &amp; Hit Enter.." autocomplete="off">
                    </form>
                    <a href="#" id="top-search-trigger" class="custom-menu-link d-flex flex-row align-items-center" style="font-weight: 500;" title="Search">
                        <i class="icon-search"></i>
                    </a>
                    <a href="{{ route('customer-front.login') }}" class="custom-menu-link d-flex flex-row align-items-center header-user d-none d-lg-flex" style="font-weight: 500;" title="Signin">
                        <i class="icon-user"></i>
                    </a>
                    &nbsp;
                    <a href="{{ route('contact-us') }}" class="btn btn-sm btn-primary header-cta d-flex flex-row align-items-center ms-2 btn-hover-theme" style="font-weight: 500;">
                        GET IN TOUCH WITH US
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

<script>
    (function(){
        const trigger = document.getElementById('top-search-trigger');
        const primaryMenuTrigger = document.getElementById('primary-menu-trigger');
        const mobileMenuSearchInput = document.querySelector('.mobile-menu-search-input');
        const primaryMenu = document.getElementById('primary-menu');
        // monitor menu open/close using body classes for robust behavior
        const bodyEl = document.body;
        const classObserver = new MutationObserver(function(mutations) {
            mutations.forEach(function(m) {
                if (m.attributeName === 'class') {
                    const isOpen = bodyEl.classList.contains('primary-menu-open');
                    if (primaryMenu) primaryMenu.setAttribute('aria-hidden', String(!isOpen));
                    if (primaryMenuTrigger) primaryMenuTrigger.setAttribute('aria-expanded', String(isOpen));
                    if (isOpen && window.innerWidth <= 991.98) {
                        // short delay for menu animation to finish
                        setTimeout(function() { mobileMenuSearchInput?.focus() }, 60);
                    }
                }
            });
        });
        classObserver.observe(document.body, { attributes: true, attributeFilter: ['class'] });
        function isMobileOrTablet(){ return window.innerWidth <= 991.98; }
        if(trigger){
            trigger.addEventListener('click', function(e){
                const desktopInput = document.querySelector('.top-search-form .search-q');
                if(desktopInput && !isMobileOrTablet()){
                    desktopInput.focus();
                }
            });
        }
        // focus the menu search input when the burger menu is opened (mobile)
        if(primaryMenuTrigger && mobileMenuSearchInput){
            primaryMenuTrigger.addEventListener('click', function(){
                // let MutationObserver handle focus based on body class changes;
                // still keep a short fallback in case
                setTimeout(function(){
                    if(window.innerWidth <= 991.98){
                        mobileMenuSearchInput?.focus();
                    }
                }, 250);
            });
        }
    })();
</script>
