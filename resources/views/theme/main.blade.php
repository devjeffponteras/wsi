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
	<div id="privacyBanner" class="privacy-banner" style="background-color: #1a1a2e; color: #ffffff; padding: 10px; text-align: center; width: 100%; position: fixed; bottom: 0; left: 0; z-index: 1000; transition: bottom 0.3s ease-in-out; display: none;">
		<span>Privacy & Cookie Policy</span><br>
		<span>By continuing to browse our site, you are agreeing to our Privacy Policy and Terms of Use. <a href="/privacy-policy" style="color: #00d4ff;">Read more</a></span>
		<button id="agreeButton" style="background-color: #00d4ff; color: white; border: none; padding: 5px 15px; margin-left: 20px; cursor: pointer;">Agree</button>
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
