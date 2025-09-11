@extends('theme.main')

@section('pagecss')
<style type="text/css">
	li.activeFilter a {
		background-color: #ff7e00 !important;
	}
	.grid-filter li:not(.activeFilter) a:hover {
		color: #ff7e00 !important;
	}
	article.portfolio-item .grid-inner.card.shadow {
		min-height: 365px;
	}

	article.portfolio-item .grid-inner.card.shadow a img {
	    min-height: 200px;
	}

	article.portfolio-item .grid-inner.card.shadow:hover {
	    transform: scale(1.01);
	    transition: all .5s;
	}

	.oc-item a img {
		width: 150px !important;
	    opacity: .75;
	    display: inline !important;
	    -webkit-filter: grayscale(100%);
	    filter: grayscale(100%);
	    vertical-align: middle;
	    transition: all 0.2s ease-in-out;
	    margin: 1rem 3rem;
	}

	article.portfolio-item .grid-inner.card.shadow .portfolio-image .bg-overlay {
		border-bottom: 1px solid #e1e1e1;
	}

	.block-testimonials-3,
		.block-testimonials-3 h1,
		.block-testimonials-3 h2,
		.block-testimonials-3 h3,
		.block-testimonials-3 h4,
		.block-testimonials-3 h5,
		.block-testimonials-3 h6,
		.block-testimonials-3 p,
		.block-testimonials-3 a {
			font-family: 'Inter', sans-serif !important;
		}

		.block-testimonials-3 .swiper-slide {
	    	width: 400px;
	    	padding: 15px;
	    }

	    .block-testimonials-3 .testimonial-col {
	     	border: 1px solid #EEE;
		    border-radius: 4px;
		    padding: 30px;
		    margin-bottom: 30px;
		    box-shadow: 0 4px 10px 0 rgba(0,0,0,.05);
	    }

	    .block-testimonials-3 .testimonial-col p {
	    	font-size: 16px;
	    	line-height: 26px !important;
	    	margin-bottom: 20px;
	    }

	    .block-testimonials-3 .swiper-horizontal>.swiper-scrollbar {
	    	width: 75%;
	    	max-width: 700px;
	    	left: 50%;
	    	transform: translateX(-50%);
	    	background: rgba(0,0,0,.06);
	    }

	    .block-testimonials-3 .swiper,
	    .block-testimonials-3 .swiper-wrapper {
	    	cursor: ew-resize !important;
	    }
</style>
   
@endsection

@section('content')
	<!-- Document Wrapper
	============================================= -->
	<div id="wrapper">

		<!-- Content
		============================================= -->
		<section id="content">
			<div class="content-wrap">

				<div class="container">

					<div class="grid-filter-wrap mb-4">

						<div class="d-flex flex-column w-50">
							<h1 class="mb-0" style="color: #ff7e00;">Our Portfolio</h1>
							<small style="max-width: 80%; opacity: .8;">
								It has been proven time and time again that we deliver great value for clients who acquire our I.T. services.
							</small>
						</div>

						<!-- Portfolio Filter
						============================================= -->
						<ul class="grid-filter" data-container="#portfolio" style="health: 100%">
							<li class="activeFilter"><a href="javascript:void(0)" data-filter="*">Show All</a></li>
							<li><a href="javascript:void(0)" data-filter=".pf-tech">Technology</a></li>
							<li><a href="javascript:void(0)" data-filter=".pf-org">Organization</a></li>
							<li><a href="javascript:void(0)" data-filter=".pf-food">Food</a></li>
						</ul><!-- .grid-filter end -->

					</div>

					<!-- Portfolio Items
					============================================= -->
					<div id="portfolio" class="portfolio row grid-container gutter-30" data-layout="fitRows">

						<article class="portfolio-item col-md-4 col-sm-6 col-12 pf-media pf-tech">
							<div class="grid-inner card shadow">
								<div class="portfolio-image">
									<a href="#">
										<img src="images/portfolio/clinica.png" alt="Open Imagination">
									</a>
									<div class="bg-overlay">
										<div class="bg-overlay-content dark" data-hover-animate="fadeIn">
											<a href="images/portfolio/clinica.png" class="overlay-trigger-icon bg-light text-dark" data-hover-animate="fadeInDownSmall" data-hover-animate-out="fadeOutUpSmall" data-hover-speed="350" data-lightbox="image" title="Clinica Manila"><i class="uil uil-search"></i></a>
										</div>
										<div class="bg-overlay-bg dark" data-hover-animate="fadeIn"></div>
									</div>
								</div>
								<div class="portfolio-desc p-3">
									<h3><a href="#">Clinica Manila</a></h3>
									<span> Ambulatory Health Care Institute, Inc. is a pioneering comprehensive healthcare facility in a mall. </span>
								</div>
							</div>
						</article>

						<article class="portfolio-item col-md-4 col-sm-6 col-12 pf-tech">
							<div class="grid-inner card shadow">
								<div class="portfolio-image">
									<a href="#">
										<img src="images/portfolio/exp.png" alt="Locked Steel Gate">
									</a>
									<div class="bg-overlay">
										<div class="bg-overlay-content dark" data-hover-animate="fadeIn">
											<a href="images/portfolio/exp.png" class="overlay-trigger-icon bg-light text-dark" data-hover-animate="fadeInDownSmall" data-hover-animate-out="fadeOutUpSmall" data-hover-speed="350" data-lightbox="image" title="Exponent Controls"><i class="uil uil-search"></i></a>
										</div>
										<div class="bg-overlay-bg dark" data-hover-animate="fadeIn"></div>
									</div>
								</div>
								<div class="portfolio-desc p-3">
									<h3><a href="#">Exponent Controls</a></h3>
									<span><a href="#">Exponent Industrial Control Solutions as service provider for system integration of industrial automation systems in the Philippines.</a></span>
								</div>
							</div>
						</article>

						<article class="portfolio-item col-md-4 col-sm-6 col-12 pf-food">
							<div class="grid-inner card shadow">
								<div class="portfolio-image">
									<a href="#">
										<img src="images/portfolio/lydias.png" alt="Mac Sunglasses">
									</a>
									<div class="bg-overlay">
										<div class="bg-overlay-content dark" data-hover-animate="fadeIn">
											<a href="images/portfolio/lydias.png" class="overlay-trigger-icon bg-light text-dark" data-hover-animate="fadeInDownSmall" data-hover-animate-out="fadeOutUpSmall" data-hover-speed="350" data-lightbox="image" title="Ludias Lechon"><i class="uil uil-search"></i></a>
										</div>
										<div class="bg-overlay-bg dark" data-hover-animate="fadeIn"></div>
									</div>
								</div>
								<div class="portfolio-desc p-3">
									<h3><a href="portfolio-single-video.html">Lydia's Lechon</a></h3>
									<span>Lydia's Lechon has been in the market for more than 5 decades of serving the best tasting charcoal roast lechon.</span>
								</div>
							</div>
						</article>

						<article class="portfolio-item col-md-4 col-sm-6 col-12 pf-graphics pf-org">
							<div class="grid-inner card shadow">
								<div class="portfolio-image">
									<a href="#">
										<img src="images/portfolio/precious.png" alt="Mac Sunglasses">
									</a>
									<div class="bg-overlay">
										<div class="bg-overlay-content dark" data-hover-animate="fadeIn">
											<a href="images/portfolio/precious.png" class="overlay-trigger-icon bg-light text-dark" data-hover-animate="fadeInDownSmall" data-hover-animate-out="fadeOutUpSmall" data-hover-speed="350" data-lightbox="image" title="Precious Pages Bookstore"><i class="uil uil-search"></i></a>
										</div>
										<div class="bg-overlay-bg dark" data-hover-animate="fadeIn"></div>
									</div>
								</div>
								<div class="portfolio-desc p-3">
									<h3><a href="portfolio-single-video.html">Precious Pages Bookstore</a></h3>
									<span>Is the home of the Philippines best  love stories of all time, carrying the titles of Precious Hearts Romances.</span>
								</div>
							</div>
						</article>

						<article class="portfolio-item col-md-4 col-sm-6 col-12 pf-tech">
							<div class="grid-inner card shadow">
								<div class="portfolio-image">
									<a href="#">
										<img src="images/portfolio/taikisha.png" alt="Console Activity">
									</a>
									<div class="bg-overlay">
										<div class="bg-overlay-content dark" data-hover-animate="fadeIn">
											<a href="images/portfolio/taikisha.png" class="overlay-trigger-icon bg-light text-dark" data-hover-animate="fadeInDownSmall" data-hover-animate-out="fadeOutUpSmall" data-hover-speed="350" data-lightbox="image" title="Taikisha"><i class="uil uil-search"></i></a>
										</div>
										<div class="bg-overlay-bg dark" data-hover-animate="fadeIn"></div>
									</div>
								</div>
								<div class="portfolio-desc p-3">
									<h3><a href="#">Taikisha</a></h3>
									<span>Taikisha's operations are structured around two main divisions, namely Green Technology in Air Conditioning System and Metal Finishing in Paint System.</span>
								</div>
							</div>
						</article>

						<article class="portfolio-item col-md-4 col-sm-6 col-12 pf-graphics pf-tech">
							<div class="grid-inner card shadow">
								<div class="portfolio-image">
									<a href="#">
										<img src="images/portfolio/taisho.png" alt="Mac Sunglasses">
									</a>
									<div class="bg-overlay">
										<div class="bg-overlay-content dark" data-hover-animate="fadeIn">
											<a href="images/portfolio/taisho.png" class="overlay-trigger-icon bg-light text-dark" data-hover-animate="fadeInDownSmall" data-hover-animate-out="fadeOutUpSmall" data-hover-speed="350" data-lightbox="image" title="Taisho"><i class="uil uil-search"></i></a>
										</div>
										<div class="bg-overlay-bg dark" data-hover-animate="fadeIn"></div>
									</div>
								</div>
								<div class="portfolio-desc p-3">
									<h3><a href="portfolio-single-video.html">Taisho</a></h3>
									<span>The Company’s goal has been to support and enhance the health of individuals and thereby, enable communities to grow.</span>
								</div>
							</div>
						</article>

						<article class="portfolio-item col-md-4 col-sm-6 col-12 pf-uielements pf-org">
							<div class="grid-inner card shadow">
								<div class="portfolio-image">
									<a href="portfolio-single-video.html">
										<img src="images/portfolio/upv.png" alt="Backpack Contents">
									</a>
									<div class="bg-overlay">
										<div class="bg-overlay-content dark" data-hover-animate="fadeIn">
											<a href="images/portfolio/upv.png" class="overlay-trigger-icon bg-light text-dark" data-hover-animate="fadeInDownSmall" data-hover-animate-out="fadeOutUpSmall" data-hover-speed="350" data-lightbox="image" title="UP Vanguard"><i class="uil uil-search"></i></a>
										</div>
										<div class="bg-overlay-bg dark" data-hover-animate="fadeIn"></div>
									</div>
								</div>
								<div class="portfolio-desc p-3">
									<h3><a href="portfolio-single-video.html">Up Vanguard</a></h3>
									<span>The UP Vanguard tradition begins with the UP ROTC Cadet and the academic system and military program under which he is developed.</span>
								</div>
							</div>
						</article>

						<article class="portfolio-item col-md-4 col-sm-6 col-12 pf-tech">
							<div class="grid-inner card shadow">
								<div class="portfolio-image">
									<a href="#">
										<img src="images/portfolio/modair.png" alt="Sunset Bulb Glow">
									</a>
									<div class="bg-overlay">
										<div class="bg-overlay-content dark" data-hover-animate="fadeIn">
											<a href="images/portfolio/modair.png" class="overlay-trigger-icon bg-light text-dark" data-hover-animate="fadeInDownSmall" data-hover-animate-out="fadeOutUpSmall" data-hover-speed="350" data-lightbox="image" title="Modair"><i class="uil uil-search"></i></a>
										</div>
										<div class="bg-overlay-bg dark" data-hover-animate="fadeIn"></div>
									</div>
								</div>
								<div class="portfolio-desc p-3">
									<h3><a href="#">Modair</a></h3>
									<span><a href="#">One of the leading electro-mechanical engineering and construction companies in the Philippines with its mother company.</a></span>
								</div>
							</div>
						</article>

						<article class="portfolio-item col-md-4 col-sm-6 col-12 pf-org">
							<div class="grid-inner card shadow">
								<div class="portfolio-image">
									<a href="#">
										<img src="images/portfolio/stpauls.png" alt="Mac Sunglasses">
									</a>
									<div class="bg-overlay">
										<div class="bg-overlay-content dark" data-hover-animate="fadeIn">
											<a href="images/portfolio/stpauls.png" class="overlay-trigger-icon bg-light text-dark" data-hover-animate="fadeInDownSmall" data-hover-animate-out="fadeOutUpSmall" data-hover-speed="350" data-lightbox="image" title="St. Pauls"><i class="uil uil-search"></i></a>
										</div>
										<div class="bg-overlay-bg dark" data-hover-animate="fadeIn"></div>
									</div>
								</div>
								<div class="portfolio-desc p-3">
									<h3><a href="portfolio-single-video.html">St. Pauls</a></h3>
									<span>Dynamically drive interdependent metrics for worldwide portals. Proactively grow client technology schemas.</span>
								</div>
							</div>
						</article>

					</div><!-- #portfolio end -->

				</div>

				<!-- Clients
				============================================= -->
				<div id="Clients">
					<div class="section rounded">

						<h3 class="text-center" style="color: #ff7e00;">Brands we've worked with</h3>

						<div id="oc-clients-full" class="owl-carousel owl-carousel-full image-carousel carousel-widget" data-margin="30" data-nav="true" data-pagi="false" data-autoplay="5000" data-items-xs="3" data-items-sm="3" data-items-md="5" data-items-lg="6" data-items-xl="7">
							<div class="oc-item"><a href="#"><img src="images/clients/logo37.jpg" alt="Brands"></a></div>
							<div class="oc-item"><a href="#"><img src="images/clients/logo51.jpg" alt="Brands"></a></div>
							<div class="oc-item"><a href="#"><img src="images/clients/logo52.jpg" alt="Brands"></a></div>
							<div class="oc-item"><a href="#"><img src="images/clients/logo53.jpg" alt="Brands"></a></div>
							<div class="oc-item"><a href="#"><img src="images/clients/logo62.jpg" alt="Brands"></a></div>
							<div class="oc-item"><a href="#"><img src="images/clients/logo63.jpg" alt="Brands"></a></div>
							<div class="oc-item"><a href="#"><img src="images/clients/logo71.jpg" alt="Brands"></a></div>
							<div class="oc-item"><a href="#"><img src="images/clients/logo72.jpg" alt="Brands"></a></div>
							<div class="oc-item"><a href="#"><img src="images/clients/logo1.png" alt="Brands"></a></div>
							<div class="oc-item"><a href="#"><img src="images/clients/logo2.jpg" alt="Brands"></a></div>
							<div class="oc-item"><a href="#"><img src="images/clients/logo3.jpg" alt="Brands"></a></div>
							<div class="oc-item"><a href="#"><img src="images/clients/logo4.jpg" alt="Brands"></a></div>
							<div class="oc-item"><a href="#"><img src="images/clients/logo5.jpg" alt="Brands"></a></div>
							<div class="oc-item"><a href="#"><img src="images/clients/logo6.png" alt="Brands"></a></div>
							<div class="oc-item"><a href="#"><img src="images/clients/logo6.jpg" alt="Brands"></a></div>
							<div class="oc-item"><a href="#"><img src="images/clients/logo13.jpg" alt="Brands"></a></div>
							<div class="oc-item"><a href="#"><img src="images/clients/logo21.jpg" alt="Brands"></a></div>
							<div class="oc-item"><a href="#"><img src="images/clients/logo31.jpg" alt="Brands"></a></div>
							<div class="oc-item"><a href="#"><img src="images/clients/logo32.jpg" alt="Brands"></a></div>
							<div class="oc-item"><a href="#"><img src="images/clients/logo34.jpg" alt="Brands"></a></div>
							<div class="oc-item"><a href="#"><img src="images/clients/logo35.jpg" alt="Brands"></a></div>
						</div>

					</div>
				</div><!-- #Clients end -->

				<!-- Testimonial Light
				============================================= -->
				<div class="section parallax scroll-detect dark" style="padding: 120px 0;">
					<img src="images/banner1.jpg" class="parallax-bg">

					<div class="fslider" data-arrows="false" style="z-index: 2;">
						<div class="owl-carousel carousel-widget text-center mw-xs mx-auto dark" data-items="1" data-autoplay="5000" data-nav="false">
							<div class="row">
								<div class="col-12">
									<img class="rounded-circle mx-auto w-auto mb-4" src="img/user.png" width="64" height="64" alt="Customer Testimonails">
									<h3 class="mb-4 lh-base fw-normal font-secondary">I was impressed by how quickly and professionally the team delivered our site. They understood exactly what we needed, added features we hadn’t even thought of, and made the whole process stress-free. Highly recommend their web development services.</h3>
								</div>
								<div class="d-flex align-items-center justify-content-center">
									<div>
										<h4 class="h6 mb-0 fw-medium">Alex Coman</h4>
										<small class="text-white-50">Apple Inc.</small>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-12">
									<img class="rounded-circle mx-auto w-auto mb-4" src="img/user.png" width="64" height="64" alt="Customer Testimonails">
									<h3 class="mb-4 lh-base fw-normal font-secondary">Our old site was outdated and hard to manage, but now everything is clean, responsive, and easy to update. The attention to detail and customer support have been outstanding. It feels like we finally have a website we can be proud of.</h3>
								</div>
								<div class="d-flex align-items-center justify-content-center">
									<div>
										<h4 class="h6 mb-0 fw-medium">John Smith</h4>
										<small class="text-white-50">Apple Inc.</small>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-12">
									<img class="rounded-circle mx-auto w-auto mb-4" src="img/user.png" width="64" height="64" alt="Customer Testimonails">
									<h3 class="mb-4 lh-base fw-normal font-secondary">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Molestias facilis ea voluptatem cum.</h3>
								</div>
								<div class="d-flex align-items-center justify-content-center">
									<div>
										<h4 class="h6 mb-0 fw-medium">Ricky Valdez</h4>
										<small class="text-white-50">Apple Inc.</small>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="video-wrap" style="z-index: 1;">
						<div class="video-overlay" style="background: rgba(241,128,82,0.9);"></div>
					</div>

				</div><!-- #Testimonial end -->

			</div>
		</section><!-- #content end -->

@endsection

@section('pagejs')
	<script>
		
	</script>
@endsection




