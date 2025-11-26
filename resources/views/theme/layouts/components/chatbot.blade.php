@php
	$fwcSrc = env('FWC_SCRIPT_SRC', null); /* e.g. //fw-cdn.com/11419951/4091723.js */
	$fcToken = env('FRESHCHAT_TOKEN', null);
	$fcHost = env('FRESHCHAT_HOST', 'https://wchat.freshchat.com');
	$fcForce = env('FORCE_FRESHCHAT', false);
	$fcDirection = env('FRESHCHAT_DIRECTION', null); /* 'ltr' or 'rtl' */
	$fcCssClass = env('FRESHCHAT_CSS_CLASS', null); /* e.g. custom_fc_frame */
	$fcRight = env('FRESHCHAT_CSS_RIGHT', '50px');
	$fcBottom = env('FRESHCHAT_CSS_BOTTOM', '30px');
@endphp

@if(!empty($fwcSrc))
	<!-- External fw-cdn chat script provided by user -->
	<script src="{{ $fwcSrc }}" chat="true"></script>
@else
	@if(!empty($fcToken) && (app()->environment('production') || $fcForce))
		<!-- Freshchat Widget (loaded in production or when FORCE_FRESHCHAT=true) -->
		<script>
			window.fcSettings = {
				token: "{{ $fcToken }}",
				host: "{{ $fcHost }}",
				config: {
					headerProperty: {
						direction: "{{ $fcDirection ?? 'ltr' }}"
					}
				}
			};
		</script>
		<script src="{{ rtrim($fcHost, '/') }}/js/widget.js" async></script>

		@if(!empty($fcCssClass))
			<script>
				window.fcWidgetMessengerConfig = {
					config: {
						cssNames: {
							widget: "{{ $fcCssClass }}"
						}
					}
				};
			</script>
			<style>
				.{{ $fcCssClass }} {
					right: {{ $fcRight }} !important;
					bottom: {{ $fcBottom }} !important;
				}
			</style>
		@endif
	@else
		<!-- Freshchat not loaded (non-production or missing token). Set env FRESHCHAT_TOKEN and FORCE_FRESHCHAT=true to enable locally. -->
	@endif
@endif

<!-- Floating launcher (calls chat widget programmatically if available). Visible always; button will warn if widget isn't ready. -->
<button id="freshchatLauncher" onclick="openFreshchat()" aria-label="Open chat" title="Chat with us"
	style="position: fixed; bottom: 95px; right: 22px; width: 52px; height: 52px; background-color: #dd3451; border: none; border-radius: 50%; color: white; font-size: 22px; cursor: pointer; z-index: 2000; box-shadow: 0 6px 18px rgba(0,0,0,0.2); display: flex; align-items: center; justify-content: center;">
	💬
</button>

<script>
	function openFreshchat() {
		try {
			/* If fw-cdn script provides a global open method, try common names first */
			if (typeof window.openFWChat === 'function') {
				window.openFWChat();
				return;
			}
			if (typeof window.openFwChat === 'function') {
				window.openFwChat();
				return;
			}
			/* Freshchat widget */
			if (window.fcWidget && typeof window.fcWidget.open === 'function') {
				window.fcWidget.open();
				return;
			}
			console.warn('Chat widget not ready. To test locally enable FORCE_FRESHCHAT=true and set FRESHCHAT_TOKEN, or set FWC_SCRIPT_SRC in .env to the fw-cdn script URL.');
		} catch (e) {
			console.warn('Chat open failed', e);
		}
	}
</script>
