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

		@hasSection('after-banner')
			@yield('after-banner')
		@endif

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
	@include('theme.layouts.components.privacy-styles')

	@include('theme.layouts.components.privacy-banner')

	@include('theme.layouts.components.privacy-terms-combined-modal')
	<!-- Chatbot
	============================================= -->
	<!-- Embedded chat snippet provided by user -->
	<!-- <script>
	  window.fcSettings = {
	    token: "WEB_CHAT_TOKEN",
	    host: "WEB_HOST_URL",
	    config: {
	      headerProperty: {
	        direction: 'ltr' //will move widget to right side of the screen
	      }
	    }
	  };
	</script> -->
	
	<style>
	  .custom_fc_frame {
	    right:20px !important;
	    bottom: 100px !important;
	  }
	</style>

	<!-- <script>
	  window.fcWidgetMessengerConfig = {
	    config: {
	      cssNames: {
	          widget: "custom_fc_frame"
	      }
	    }
	  }
	</script> -->

	<!-- <script src="WEB_HOST_URL/js/widget.js" defer></script> -->

	<script src='//fw-cdn.com/11419951/4091723.js' chat='true'></script>

	<!-- Ensure chat widget sits above the "Go to Top" button -->
	<style>
		/* Ensure the Go To Top stays under chat (lower z) */
		#gotoTop {
			z-index: 800 !important;
			pointer-events: auto !important;
		}

		/* Aggressively raise common chat widget containers, frames and iframes above #gotoTop */
		.custom_fc_frame,
		#freshchatLauncher,
		.fc-widget,
		.fc-frame,
		.fc-button,
		.fw-chat,
		.fw-widget,
		.fw-widget-container,
		.fw-cdn-widget,
		.wh-widget,
		.wh-widget-container,
		.wh-popup,
		iframe[src*="fw-cdn.com"],
		iframe[src*="wchat.freshchat.com"],
		div[id^="fcWidget"],
		div[class*="fc-"],
		div[class*="fw-"],
		div[class*="wh-"] {
			z-index: 20000 !important;
			pointer-events: auto !important;
		}

		/* If the chat launcher is positioned near gotoTop, nudge it up slightly */
		#freshchatLauncher {
			bottom: calc(30px + 24px) !important; /* move launcher slightly above typical gotoTop */
		}
	</style>

	{{-- /* FOR CAPTCHA */ --}}

	@include('theme.layouts.components.scripts')

	{{-- /* FOR ANALYTICS */ --}}

    <!-- <script src="{{ asset('js/chatbot.js') }}"></script> -->

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
