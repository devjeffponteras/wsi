<!-- Header ============================================= -->
<header id="header" class="full-header header-size-custom sticky-header" data-sticky-shrink="false">
    <div id="header-wrap">
        <div class="container-fluid">
            <div class="d-flex flex-row justify-content-between align-items-center py-2 container-standard">

                <!-- Left: Logo + Desktop Menu -->
                <div class="d-flex flex-row align-items-center gap-4">
                    <div id="logo" style="margin: 0px; border-right: none;">
                        <a href="{{ url('/') }}" class="standard-logo">
                            <img src="{{ asset('images/logos/logo-webfocus.png') }}"
                                 alt="{{ Setting::info()->company_name ?? 'Company Name' }}">
                        </a>
                    </div>

                    <!-- Desktop Primary Navigation -->
                    <nav class="primary-menu with-arrows d-none d-lg-flex">
                        @include('theme.layouts.components.menu')
                    </nav>
                </div>

                <!-- Burger (visible only on mobile) -->
                <div id="primary-menu-trigger" class="d-lg-none">
                    <svg class="svg-trigger" viewBox="0 0 100 100" width="30" height="30">
                        <path d="m 30,33 h 40 c 3.7,0 7.5,3.1 7.5,8.6 0,5.45-2.7,8.4-7.5,8.4 h -20"></path>
                        <path d="m 30,50 h 40"></path>
                        <path d="m 70,67 h -40 c 0,0 -7.5,-0.8 -7.5,-8.36 0,-7.56 7.5,-8.63 7.5,-8.63 h 20"></path>
                    </svg>
                </div>

                <!-- Desktop Right Links -->
                <div class="header-custom-menu-wrapper d-none d-lg-flex flex-row align-items-center gap-3">
                    <a href="#" class="custom-menu-link" title="Search"><i class="icon-search"></i></a>
                    <a href="#" class="custom-menu-link" title="Signin"><i class="icon-user"></i></a>
                    <a href="#" class="custom-menu-link">
                        Subscribe <i class="icon-line-arrow-right"></i>
                    </a>
                </div>

            </div>
        </div>
    </div>

    <!-- Mobile Slide-Down Menu -->
    <div class="mobile-menu" id="mobileMenu">
        <nav class="mobile-primary-menu">
            @include('theme.layouts.components.menu')
        </nav>
        <div class="mobile-custom-links">
            <a href="#"><i class="icon-search"></i> Search</a>
            <a href="#"><i class="icon-user"></i> Signin</a>
            <a href="#">Subscribe <i class="icon-line-arrow-right"></i></a>
        </div>
    </div>

    <div class="header-wrap-clone"></div>
</header>

@include('theme.layouts.components.alert')

<!-- Styling -->
<style>
/* Sticky header */
.sticky-header {
    position: sticky;
    top: 0;
    left: 0;
    right: 0;
    z-index: 1000;
    background: white;
    box-shadow: 0 2px 6px rgba(0,0,0,0.05);
}

/* Logo */
#logo img {
    display: block !important;
    height: 35px;
    max-height: 40px;
}

@media (max-width: 991px) {
    #logo img { height: 30px !important; }
}

/* Desktop menu alignment */
.primary-menu {
    display: flex;
    gap: 20px;
    align-items: center;
}

/* ✅ Desktop Dropdown Styling */
.primary-menu ul ul {
    background: #ffffff !important;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
    border-radius: 8px;
    padding: 10px 0;
    min-width: 180px;
    z-index: 2000;

    opacity: 0;
    transform: translateY(-5px);
    transition: all 0.2s ease-in-out;
    visibility: hidden;
    position: absolute;
}

.primary-menu li {
    position: relative;
}

.primary-menu li:hover > ul {
    opacity: 1;
    transform: translateY(0);
    visibility: visible;
}

.primary-menu ul ul li {
    margin: 0;
}

.primary-menu ul ul a {
    color: #333 !important;
    padding: 10px 15px;
    display: block;
    font-weight: 500;
    border-radius: 6px;
    transition: background 0.2s, color 0.2s;
}

/* ✅ Hover Effect (Desktop Only) */
.primary-menu ul ul a:hover {
    background: #2b56d3 !important;
    color: #ffffff !important;
}

/* ✅ Submenu Arrow Indicator */
.primary-menu li.menu-item-has-children > a::after {
    content: "▼";
    font-size: 0.6rem;
    margin-left: 6px;
    display: inline-block;
    transition: transform 0.2s ease;
}

.primary-menu li.menu-item-has-children:hover > a::after {
    transform: rotate(180deg);
}

/* Mobile Menu Design */
.mobile-menu {
    display: none;
    position: fixed;
    top: 60px;
    left: 0;
    width: 100%;
    background: #ffffff;
    padding: 20px 15px;
    border-top: 2px solid #eee;
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    z-index: 1500;
    max-height: calc(100vh - 60px);
    overflow-y: auto;
    animation: slideDown 0.3s ease;
}

.mobile-menu.active { display: block; }

.mobile-primary-menu a {
    color: #333;
    text-decoration: none;
    font-weight: 500;
    padding: 10px;
    display: block;
    border-radius: 8px;
    transition: background 0.2s, color 0.2s;
}

/* ✅ REMOVE BLUE ON MOBILE HOVER */
@media (max-width: 991px) {
    .mobile-primary-menu a:hover {
        background: transparent !important;
        color: #333 !important;
    }
}

.mobile-custom-links {
    border-top: 1px solid #ddd;
    margin-top: 15px;
    padding-top: 10px;
    display: flex;
    flex-direction: column;
    gap: 10px;
}

.mobile-custom-links a {
    color: #555;
    text-decoration: none;
    font-weight: 500;
    display: flex;
    align-items: center;
    gap: 6px;
    padding: 10px;
    border-radius: 8px;
    transition: background 0.2s, color 0.2s;
}

/* ✅ REMOVE BLUE ON MOBILE HOVER FOR CUSTOM LINKS */
@media (max-width: 991px) {
    .mobile-custom-links a:hover {
        background: transparent !important;
        color: #555 !important;
    }
}

@keyframes slideDown {
    from { opacity: 0; transform: translateY(-10px); }
    to { opacity: 1; transform: translateY(0); }
}

@media (max-width: 991px) {
    .primary-menu { display: none !important; }
}
</style>

<!-- JS Toggle -->
<script>
document.addEventListener("DOMContentLoaded", function() {
    const burger = document.getElementById("primary-menu-trigger");
    const mobileMenu = document.getElementById("mobileMenu");

    burger.addEventListener("click", function(e) {
        e.stopPropagation();
        mobileMenu.classList.toggle("active");
    });

    document.body.addEventListener("click", function(e) {
        if (mobileMenu.classList.contains("active") && !mobileMenu.contains(e.target) && !burger.contains(e.target)) {
            mobileMenu.classList.remove("active");
        }
    });
});
</script>
