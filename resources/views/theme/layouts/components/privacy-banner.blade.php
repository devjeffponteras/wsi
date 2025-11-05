<!-- Privacy Banner -->
<div id="privacyBanner" class="privacy-banner" style="background-color: #f8e1e9; color: #333333; padding: 12px 16px; width: 100%; position: fixed; bottom: 0; left: 0; z-index: 1000; display: none; box-shadow: 0 -2px 5px rgba(0,0,0,0.1); padding-bottom: calc(env(safe-area-inset-bottom, 0px) + 12px);">
    <div class="privacy-inner" style="display:flex; align-items:center; justify-content:center; gap:12px; max-width:1200px; margin:0 auto; flex-wrap:wrap;">
        <div class="privacy-text" style="flex:1; text-align:center; font-size:14px; line-height:1.2; max-width:900px;">
            By using the site, you agree to our
            <a href="{{ route('privacy-terms') }}" style="color: #ff0000; text-decoration: underline; cursor: pointer;">Privacy Policy & Terms of Use</a>.
            <button id="agreeButton" type="button" data-redirect="{{ route('home') }}" class="privacy-cta-inline" style="background-color: #4CCD99; color: white; border: none; padding: 8px 14px; margin-left: 8px; cursor: pointer; border-radius: 20px; display: inline-block;" onclick="if (typeof window.acceptPrivacy === 'function') { window.acceptPrivacy(this.dataset.redirect); } else { window.location.href = this.dataset.redirect; }">I Agree</button>
        </div>
    </div>
</div>

<style>
    /* Privacy banner responsive adjustments */
    @media (max-width: 600px) {
        #privacyBanner { padding: 10px 10px; }
        #privacyBanner .privacy-inner { flex-direction: column; align-items: stretch; gap: 8px; }
        #privacyBanner .privacy-text { text-align: center; font-size: 13px; }
        /* Make inline CTA stack and become full-width on mobile */
        #privacyBanner .privacy-cta-inline { display: block !important; width: 100% !important; margin: 6px 0 0 0 !important; padding: 10px 12px !important; border-radius: 10px !important; }
    }

    @media (max-width: 380px) {
        #privacyBanner .privacy-text { font-size: 12px; }
        #privacyBanner .privacy-cta-inline { padding: 9px !important; }
    }
</style>
