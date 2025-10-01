<!DOCTYPE html>
<html dir="ltr" lang="en-US">

@include('theme.layouts.components.styles')

<body class="stretched is-expanded-menu">

	<!-- Cart Panel Background
	============================================= -->
	<div class="body-overlay"></div>

	<!-- Document Wrapper
	============================================= -->
	<div id="wrapper" class="clearfix">

		<!-- Header
		============================================= -->
		@include('theme.layouts.components.header')<!-- #header end -->

		<!-- Slider
		============================================= -->
		@include('theme.layouts.components.banner')

		<!-- #slider end -->

		<!-- Content
		============================================= -->
		<section id="website-content">
			@yield('content')
		</section><!-- #content end -->

		<!-- Footer
		============================================= -->
		<footer id="footer" class="bg-transparent border-0">
			@include('theme.layouts.footer')
		</footer><!-- #footer end -->

	</div><!-- #wrapper end -->

	<!-- Go To Top
	============================================= -->
	<div id="gotoTop" class="icon-angle-up"></div>

	<!-- Privacy and Cookie Policy Banner Wrapper
	============================================= -->
<style>
@keyframes slideIn {
    from {
        bottom: -100px;
        opacity: 0;
    }
    to {
        bottom: 0;
        opacity: 1;
    }
}
.privacy-banner {
    animation: slideIn 0.5s ease-in-out forwards;
}
</style>
<div id="privacyBanner" class="privacy-banner" style="background-color: #f8e1e9; color: #333333; padding: 15px; text-align: center; width: 100%; position: fixed; bottom: 0; left: 0; z-index: 1000; display: none; box-shadow: 0 -2px 5px rgba(0,0,0,0.1);">
    <span>By using the site, you agree to the <span style="color: #ff0000;">Privacy</span> and <span style="color: #ff0000;">Terms of Use</span>.</span>
    <button id="agreeButton" style="background-color: #4CCD99; color: white; border: none; padding: 8px 20px; margin-left: 20px; cursor: pointer; border-radius: 20px;">I Agree</button>
</div>
	<!-- Chatbot
	============================================= -->
    @include('theme.layouts.components.chatbot')

	{{-- /* FOR CAPTCHA */ --}}

	@include('theme.layouts.components.scripts')

	{{-- /* FOR ANALYTICS */ --}}

    <script src="{{ asset('js/chatbot.js') }}"></script>

	<!-- Google tag (gtag.js) -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=G-HR35693H16"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());
		gtag('config', 'G-HR35693H16');

	</script>
</body>
</html>
