@php
    $album = isset($page) ? $page->album : null;
    $banners = $album && isset($album->banners) ? $album->banners : [];
    $bannerCount = is_countable($banners) ? count($banners) : 0;
    $hasPageImage = isset($page) && !empty($page->image_url);
    $shouldShowPageSlider = $bannerCount > 1;
    $shouldShowPageBanner = ($bannerCount === 1) || $hasPageImage;
@endphp

@if(isset($forceHomeBanner) && $forceHomeBanner)
    @include('theme.layouts.banners.home-slider')
@elseif(isset($forcePageBanner) && $forcePageBanner)
    @if($shouldShowPageSlider)
        @include('theme.layouts.banners.page-slider')
    @elseif($shouldShowPageBanner)
        @include('theme.layouts.banners.page-banner')
    @endif
@elseif(isset($page) && $page->album && count($page->album->banners) > 0 && $page->album->is_main_banner())
    @include('theme.layouts.banners.home-slider')
@elseif(isset($page) && $page->album && count($page->album->banners) > 1 && !$page->album->is_main_banner())
    @include('theme.layouts.banners.page-slider')
@elseif(isset($page) && (($page->album && isset($page->album->banners) && count($page->album->banners) == 1 && !$page->album->is_main_banner()) || $hasPageImage))
    @include('theme.layouts.banners.page-banner')
@endif
