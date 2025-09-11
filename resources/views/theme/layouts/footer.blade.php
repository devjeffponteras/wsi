@php
    $contents = Setting::getFooter()->contents;

    $socmed = \App\Models\MediaAccounts::all();

    $socmedHTML = '<div class="mt-4 clearfix">';
    	foreach($socmed as $sm){
    		$socmedHTML .= '
    			<a href="'.$sm->media_account.'" class="social-icon si-small si-rounded si-colored si-'.$sm->name.'" title="'.$sm->name.'" target="_blank">
	                <i class="icon-'.$sm->name.'"></i>
	                <i class="icon-'.$sm->name.'"></i>
	            </a>
    		';
    	}

    $socmedHTML .= '</div>';


    $keywords   = ['{Social Media Icons}'];
    $variables  = [$socmedHTML];

    $footerContents = str_replace($keywords,$variables,$contents);
@endphp


{!! $footerContents !!}

<!-- Footer
============================================= -->
<footer id="footer" class="dark">
	<!-- Copyrights
	============================================= -->
	<div id="copyrights">
		<div class="container">

			<div class="row justify-content-between col-mb-30">
				<div class="col-12 col-lg-auto text-center text-lg-start order-last order-lg-first">
					<a href="{{ url('/') }}" class="standard-logo">
					    <img src="{{ asset('images/logos/logo-webfocus.png') }}"
					         alt="{{ Setting::info()->company_name ?? 'Company Name' }}" style="height: 35px">
					</a>
					<br />
					<br />
					Copyrights &copy; 2025 All Rights Reserved by Webfocus Inc.
				</div>

				<div class="col-12 col-lg-auto text-center text-lg-end">
					<div class="copyrights-menu copyright-links">
						<a href="#">Home</a>/<a href="#">About</a>/<a href="#">Features</a>/<a href="#">Portfolio</a>/<a href="#">FAQs</a>/<a href="#">Contact</a>
					</div>
					<a href="#" class="social-icon inline-block si-small si-borderless mb-0 si-facebook">
						<i class="icon-facebook"></i>
						<i class="icon-facebook"></i>
					</a>

					<a href="#" class="social-icon inline-block si-small si-borderless mb-0 si-twitter">
						<i class="icon-twitter"></i>
						<i class="icon-twitter"></i>
					</a>

					<a href="#" class="social-icon inline-block si-small si-borderless mb-0 si-gplus">
						<i class="icon-gplus"></i>
						<i class="icon-gplus"></i>
					</a>

					<a href="#" class="social-icon inline-block si-small si-borderless mb-0 si-pinterest">
						<i class="icon-pinterest"></i>
						<i class="icon-pinterest"></i>
					</a>

					<a href="#" class="social-icon inline-block si-small si-borderless mb-0 si-vimeo">
						<i class="icon-vimeo"></i>
						<i class="icon-vimeo"></i>
					</a>

					<a href="#" class="social-icon inline-block si-small si-borderless mb-0 si-github">
						<i class="icon-github"></i>
						<i class="icon-github"></i>
					</a>

					<a href="#" class="social-icon inline-block si-small si-borderless mb-0 si-yahoo">
						<i class="icon-yahoo"></i>
						<i class="icon-yahoo"></i>
					</a>

					<a href="#" class="social-icon inline-block si-small si-borderless mb-0 si-linkedin">
						<i class="icon-linkedin"></i>
						<i class="icon-linkedin"></i>
					</a>
				</div>
			</div>

		</div>
	</div><!-- #copyrights end -->
</footer><!-- #footer end -->


<!-- Subscribe Form modal
============================================= -->

<div class="modal1 mfp-hide" id="modal-subscribe">
	<div class="card mx-auto" style="max-width: 540px;">
		<div class="card-body" style="background: linear-gradient(rgba(0,0,0,.6), rgba(0,0,0,.3)), url('images/misc/subscribe.jpeg') no-repeat center center / cover; padding: 60px 50px; border: 12px solid #FFF">
			<div class="d-flex justify-content-between">
				<h2 class="card-title text-white font-body">Subscribe to our Newsletter!</h2>
			</div>
			<p class="text-light">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum nisi beatae temporibus nobis optio eos?</p>

			<div class="subscribe-widget" data-loader="button">

				<div class="widget-subscribe-form-result"></div>

				<form action="{{route('mailing-list.front.subscribe')}}" role="form" method="post" class="mb-0">
					@csrf
					<label for="subscriber_name" class="text-light">Name <span>*</span></label>
					<input type="text" name="name" id="subscriber_name" class="form-control required not-dark" placeholder="your name" required>

					<label for="subscriber_email" class="text-light">Email Address <span>*</span></label>
					<input type="email" name="email" id="subscriber_email" class="form-control required not-dark" placeholder="name@email.com" required>

					<button class="btn rounded btn-danger py-2 mt-3 w-100 text-uppercase ls1 fw-semibold" type="submit">Subscribe</button>
				</form>

			</div>
		</div>
	</div>
</div>
<!-- Subscribe form end modal -->