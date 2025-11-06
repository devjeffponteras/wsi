@extends('theme.main')

@php
    $forcePageBanner = true;
    if (isset($page) && empty($page->image_url)) {
        $page->image_url = asset('theme/images/banners/no-banner.jpg');
    }
@endphp

@section('content')

    <div class="unified-content privacy-page-wrapper">
            {!! optional($content)->contents ?? '' !!}
        </div>

@endsection

@section('pagecss')
<style>
    /* Page card styled like the modal content */
    .privacy-page-wrapper { margin-top: 40px; }
    .privacy-page-card {
        background-color: #fefefe;
        padding: 28px; /* more inner space */
        border: none;
        width: 100%;
        max-width: 1200px;
        border-radius: 10px;
        box-shadow: 0 4px 16px rgba(0,0,0,0.25);
        margin: 32px auto; /* more outer space */
        /* Enter animation */
        animation: fadeInUp 320ms ease-out;
        /* Design tokens to easily restyle */
        --accent: #4CCD99;              /* change this to match your brand */
        --heading-size: 28px;           /* H2 size */
        --subheading-size: 18px;        /* H3 size */
        --heading-font: inherit;        /* set a custom font if needed */
    }
    .privacy-page-card h2 {
        color: #222;
        margin-bottom: 14px;
        font-size: var(--heading-size);
        line-height: 1.2;
        text-align: center;
        font-weight: 800;
        letter-spacing: 0.3px;
        font-family: var(--heading-font, inherit);
        position: relative;
    }
    .privacy-page-card h2::after {
        content: "";
        display: block;
        width: 80px;
        height: 3px;
        background: var(--accent);
        border-radius: 2px;
        margin: 10px auto 0 auto;
    }
    .privacy-page-card h3 {
        color: #333;
        margin: 12px 0 8px 0;
        font-size: var(--subheading-size);
        font-weight: 700;
        font-family: var(--heading-font, inherit);
        padding-left: 10px;
        border-left: 4px solid var(--accent);
    }
    .privacy-page-card p { line-height: 1.65; margin-bottom: 14px; color: #666; }
    .privacy-page-card ul { margin: 10px 0; padding-left: 20px; }
    .privacy-page-card li { margin-bottom: 5px; color: #666; }

    /* Acceptance section */
    .privacy-accept-footer {
        display:flex; align-items:center; gap:14px; justify-content:center; flex-wrap:wrap;
        border-top:1px solid #eee; padding-top:16px; margin-top:24px; text-align:center;
    }
    .privacy-accept-label { display:flex; align-items:center; gap:8px; color:#555; font-size:14px; }
    .privacy-accept-btn {
        background-color:#4CCD99; color:#fff; border:none; padding:10px 16px; border-radius:8px;
        cursor:not-allowed; opacity:0.7; margin-top:6px;
        transition: transform 160ms ease, box-shadow 160ms ease, opacity 160ms ease, background-color 200ms ease;
    }
    .privacy-accept-btn:hover:not([disabled]) {
        transform: translateY(-1px) scale(1.02);
        box-shadow: 0 6px 18px rgba(76,205,153,0.35);
    }
    .privacy-accept-btn:active:not([disabled]) { transform: translateY(0) scale(0.98); }
    #pageAcceptButton.cta-ready { animation: ctaPulse 1400ms ease-in-out infinite; }

    /* Keyframes */
    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(10px); }
        to   { opacity: 1; transform: translateY(0); }
    }
    @keyframes ctaPulse {
        0%, 100% { transform: scale(1); }
        50%      { transform: scale(1.03); }
    }

    /* Respect reduced motion */
    @media (prefers-reduced-motion: reduce) {
        .privacy-page-card, .privacy-accept-btn { animation: none !important; transition: none !important; }
    }

    /* Responsive spacing */
    @media (max-width: 768px) {
        .privacy-page-card { margin: 20px auto; padding: 20px; }
        .privacy-accept-footer { gap: 10px; padding-top: 14px; margin-top: 20px; }
        .privacy-page-card h2 { font-size: calc(var(--heading-size) * 0.9); }
        .privacy-page-card h3 { font-size: calc(var(--subheading-size) * 0.95); }
    }
</style>
@endsection

@section('pagejs')
<script>
    jQuery(function($){
        // Initialize button state and visuals based on checkbox
        function syncAcceptButtonState() {
            const enabled = $('#pageAcceptCheck').is(':checked');
            $('#pageAcceptButton')
                .prop('disabled', !enabled)
                    .css({ cursor: enabled ? 'pointer' : 'not-allowed', opacity: enabled ? '1' : '0.7' })
                    .toggleClass('cta-ready', enabled);
        }

        syncAcceptButtonState();

        $('#pageAcceptCheck').on('change', function(){
            syncAcceptButtonState();
        });

        $('#pageAcceptButton').on('click', function(){
            if ($('#pageAcceptCheck').is(':checked')) {
                // Hide the button immediately to prevent re-clicks
                $('#pageAcceptButton').prop('disabled', true).hide();
                if (typeof window.acceptPrivacy === 'function') {
                    window.acceptPrivacy("{{ route('home') }}");
                } else {
                    // Fallback if scripts not loaded for some reason
                    try { localStorage.setItem('privacyAccepted', 'true'); } catch (e) {}
                    try { localStorage.setItem('popState','shown'); } catch (e) {}
                    if ($('#privacyBanner').length) { $('#privacyBanner').fadeOut(); }
                    window.location.href = "{{ route('home') }}";
                }
            }
        });
    });
    </script>
@endsection
