@extends('theme.main')

@section('pagecss')
<link rel="stylesheet" href="{{ asset('theme/css/newstyle.css') }}" type="text/css" />
<style>

</style>
@endsection

@section('content')
<div class="flex flex-col min-h-screen">
    <!-- Hero Section -->


    <!-- Document Management Systems -->
    {!! $content->contents !!}
           <!-- CTA Section -->
        @include('theme.pages.partials.news-cta', [
            'ctaHeroStyle' => 'transform: rotateY(180deg); bottom: 0; left: 10%; width: 770px;'
        ])
</div>
@endsection

@section('pagejs')
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Intersection Observer for scroll animations
    const observerOptions = {
        threshold: 0.2,
        rootMargin: '0px 0px -30px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate');
            }
        });
    }, observerOptions);

    // Observe scroll animation elements
    document.querySelectorAll('.scroll-animate').forEach(el => observer.observe(el));
});
</script>
@endsection
