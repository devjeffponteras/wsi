
@php
    $menu = Menu::where('is_active', 1)->first();
@endphp


<ul class="menu-container" style="border: none">
    @foreach ($menu->parent_navigation() as $item)
        @include('theme.layouts.components.menu-item', ['item' => $item])
    @endforeach
    <!-- Mobile search removed from burger menu: use the header search icon on phones instead -->
    <li class="menu-item d-lg-none">
        <a href="{{ route('contact-us') }}" class="menu-link mobile-cta"><div>GET IN TOUCH WITH US</div></a>
    </li>
    <li class="menu-item d-lg-none">
        <a href="{{ route('customer-front.login') }}" class="menu-link mobile-signin"><div><i class="icon-user" aria-hidden="true"></i> Sign in</div></a>
    </li>
    <li class="menu-item d-lg-none">
        <div class="menu-link mobile-search-menu">
            <form action="{{ route('search') }}" method="get" class="mobile-menu-search-form" role="search">
                <div class="d-flex align-items-center">
                    <i class="icon-search" aria-hidden="true" style="margin-right: .5rem;"></i>
                    <input type="search" name="q" class="form-control mobile-menu-search-input" aria-label="Search site" placeholder="Search..." />
                </div>
            </form>
        </div>
    </li>
</ul>
