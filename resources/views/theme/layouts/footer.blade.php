@php
    $contents = Setting::getFooter()->contents;

    $socmed = \App\Models\MediaAccounts::all();

    $socmedHTML = '<div class="mt-0 d-flex justify-content-center gap-3">';
    foreach($socmed as $sm){
        $socmedHTML .= '
            <a href="'.$sm->media_account.'" class="social-icon si-small si-rounded si-colored si-'.$sm->name.'" title="'.$sm->name.'" target="_blank" aria-label="Follow us on '.$sm->name.'">
                <i class="icon-'.$sm->name.'"></i>
                <i class="icon-'.$sm->name.'"></i>
            </a>
        ';
    }
    $socmedHTML .= '</div>';

    // If the placeholder exists in the DB content, replace it.
    if (strpos($contents, '{Social Media Icons}') !== false) {
        $footerContents = str_replace('{Social Media Icons}', $socmedHTML, $contents);
    } else {
        // Otherwise, just append it at the end.
        $footerContents = $contents . $socmedHTML;
    }
@endphp


<!-- Footer ============================================= -->
<footer id="footer" class="dark" style="background: linear-gradient(135deg, #1e3a8a 0%; padding: 80px 0 20px;">
    <div class="container" style="margin-top: 2rem;">
        {!! $footerContents !!}
        <!-- Bottom -->
        <div class="text-center mt-5 pt-4 border-top border-white border-opacity-10">
            <p class="text-white-50 mb-0">Copyright © {{ date('Y') }} Webfocus Solutions Inc. All Rights Reserved.</p><br>
        </div>
    </div>
</footer>

<style>
    /* Footer Styling */
    #footer {
        font-family: 'Inter', sans-serif;
        position: relative;
        overflow: hidden;
    }

    #footer::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: radial-gradient(circle at top left, rgba(255,255,255,0.15), transparent 70%);
        pointer-events: none;
    }

    .footer-link {
        color: #ffffff;
        text-decoration: none;
        transition: all 0.3s ease;
        font-size: 1rem;
        line-height: 2;
    }

    .footer-link:hover {
        color: #f97316;
        text-decoration: none;
        padding-left: 8px;
    }

    .footer-list li {
        margin-bottom: 0.5rem;
    }

    .social-icon {
        width: 40px;
        height: 40px;
        font-size: 1.2rem;
        transition: transform 0.3s ease;
    }

    .social-icon:hover {
        transform: scale(1.2);
    }
    

    .award-img {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        border-radius: 8px;
        filter: brightness(0.9);
    }

    .award-img:hover {
        transform: scale(1.1);
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
        filter: brightness(1);
    }

    /* Responsive Adjustments */
    @media (max-width: 767px) {
        #footer {
            padding: 40px 0 20px;
        }
        .social-icon {
            width: 32px;
            height: 32px;
            font-size: 1rem;
        }
    }
</style>
