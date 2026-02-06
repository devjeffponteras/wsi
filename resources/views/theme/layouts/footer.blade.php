@php
    // Load footer page via settings (keep object for styles/content)
    $footerPage = Setting::getFooter();
    $contents = $footerPage->contents ?? '';

    $socmed = \App\Models\MediaAccounts::all();

    // Build social HTML and include the 'social-media' class so CSS matches
    $socmedHTML = '<div class="social-media mt-0 d-flex justify-content-center gap-3">';
    foreach($socmed as $sm){
        $name = strtolower(trim($sm->name));
        $url = e($sm->media_account);
        $title = e($sm->name);
        $socmedHTML .= "\n            <a href=\"{$url}\" class=\"social-icon si-small si-rounded si-colored si-{$name}\" title=\"{$title}\" target=\"_blank\" aria-label=\"Follow us on {$title}\">\n                <i class=\"icon-{$name}\"></i>\n                <i class=\"icon-{$name}\"></i>\n            </a>\n        ";
    }
    $socmedHTML .= '</div>';

    // Support both placeholder tokens to be safe
    if (strpos($contents, '{Social Media Icons}') !== false) {
        $footerContents = str_replace('{Social Media Icons}', $socmedHTML, $contents);
    } elseif (strpos($contents, '{{social_media}}') !== false || strpos($contents, '[[social_media]]') !== false) {
        $footerContents = str_replace(['{{social_media}}','[[social_media]]'],$socmedHTML,$contents);
    } else {
        // Append social icons after stored content
        $footerContents = $contents . $socmedHTML;
    }
@endphp

@if(!empty($footerPage->styles))
    <style>
        {!! $footerPage->styles !!}
    </style>
@endif


<!-- Footer ============================================= -->
        {!! $footerContents !!}

        <div class="text-center mt-5 pt-4 border-top border-white border-opacity-10">
            <p class="text-white-50 mb-0">Copyright © {{ date('Y') }} Webfocus Solutions Inc. All Rights Reserved.</p><br>
        </div>


{{-- <style>
    /* Footer Styles */

    .footer-container {
        max-width: 1400px;
        margin: 0 auto;
        display: grid;
        grid-template-columns: 1fr 1fr 1fr;
        gap: 60px;
        align-items: start;
    }

    /* Company Info Section */
    .footer-company {
        display: flex;
        flex-direction: column;
        gap: 25px;
    }

    .footer-logo {
        margin-bottom: 10px;
    }

    .footer-logo-img {
        max-width: 250px;
        height: auto;
        display: block;
    }

    .footer-logo span {
        display: block;
        font-size: 1.2rem;
        font-weight: 400;
        opacity: 0.9;
    }

    .footer-contact {
        display: flex;
        flex-direction: column;
        gap: 15px;
    }

    .contact-item {
        display: flex;
        align-items: flex-start;
        gap: 12px;
        font-size: 0.95rem;
        line-height: 1.6;
    }

    .contact-item i {
        font-size: 1.1rem;
        margin-top: 3px;
        color: #60a5fa;
    }

    .contact-item a {
        color: white;
        text-decoration: none;
        transition: color 0.3s ease;
    }

    .contact-item a:hover {
        color: #60a5fa;
    }

    /* Quick Links Section */
    .footer-links {
        display: flex;
        flex-direction: column;
    }

    .footer-links h3 {
        font-size: 1.5rem;
        font-weight: 600;
        margin-bottom: 25px;
        color: white;
    }

    .footer-links ul {
        list-style: none;
        display: flex;
        flex-direction: column;
        gap: 12px;
        padding: 0;
        margin: 0;
    }

    .footer-links a {
        color: white;
        text-decoration: none;
        font-size: 1rem;
        transition: all 0.3s ease;
        display: inline-block;
    }

    .footer-links a:hover {
        color: #60a5fa;
        transform: translateX(5px);
    }

    /* Awards Section */
    .footer-awards {
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
        gap: 40px;
    }

    .award-item {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .award-badge-img {
        max-width: 160px;
        width: 100%;
        height: auto;
        display: block;
    }

    .security-badge-img {
        max-width: 250px;
        width: 100%;
        height: auto;
        display: block;
    }

    .award-text {
        text-align: center;
        margin-top: 10px;
    }

    .award-text h4 {
        font-size: 1.2rem;
        margin-bottom: 5px;
        color: white;
    }

    .award-text p {
        font-size: 0.85rem;
        opacity: 0.9;
        line-height: 1.4;
        color: white;
    }

    .security-badge {
        background: white;
        padding: 15px 25px;
        border-radius: 8px;
        display: flex;
        align-items: center;
        gap: 10px;
        margin-top: 10px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
    }

    .security-badge i {
        font-size: 2rem;
        color: #1e3a8a;
    }

    .security-text {
        text-align: left;
        color: #1e3a8a;
    }

    .security-text strong {
        font-size: 1.1rem;
        display: block;
        margin-bottom: 2px;
    }

    .security-text span {
        font-size: 0.85rem;
        font-weight: 600;
        color: #dc2626;
    }

    /* Social Media */
    .social-media {
        display: flex;
        justify-content: center;
        gap: 15px;
    }

    .social-link {
        width: 45px;
        height: 45px;
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1.2rem;
        transition: all 0.3s ease;
        text-decoration: none;
    }

    .social-link.facebook {
        background: #3b5998;
    }

    .social-link.twitter {
        background: #1da1f2;
    }

    .social-link.youtube {
        background: #ff0000;
    }

    .social-link.instagram {
        background: linear-gradient(45deg, #f09433 0%, #e6683c 25%, #dc2743 50%, #cc2366 75%, #bc1888 100%);
    }

    .social-link:hover {
        transform: translateY(-5px);
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.3);
    }

    /* Copyright */
    .footer-copyright {
        text-align: center;
        padding-top: 30px;
        margin-top: 30px;
        border-top: 1px solid rgba(255, 255, 255, 0.2);
        font-size: 0.9rem;
        opacity: 0.9;
        color:aliceblue;

    }

    /* Responsive */
    @media (max-width: 1024px) {
        .footer-container {
            grid-template-columns: 1fr 1fr;
            gap: 40px;
        }

        .footer-awards {
            grid-column: 1 / -1;
            flex-direction: row;
            justify-content: center;
            flex-wrap: wrap;
        }

        .award-item {
            width: auto;
        }
    }

    @media (max-width: 768px) {
        .footer-container {
            grid-template-columns: 1fr;
            gap: 40px;
        }

        .footer-logo {
            font-size: 2rem;
        }

        .award-badge-img {
            width: 140px;
        }

        .security-badge-img {
            width: 200px;
        }

        .footer-awards {
            flex-direction: column;
        }

        .footer {
            padding: 40px 20px 20px;
        }
    }
</style> --}}
