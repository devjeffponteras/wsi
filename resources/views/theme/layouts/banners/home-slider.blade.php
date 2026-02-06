@php
    $is_video = 0;
    if($page->album->banner_type == 'video'){
        $is_video = 1;
    }
@endphp

<section id="slider" class="slick-wrapper clearfix home-slider-banner"><!--.include-header-->
	<div class="banner-wrapper">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12" style="padding:0;">
					<div id="banner" class="home-slider slick-slider">
						@foreach ($page->album->banners as $banner)

							@php
								$title = trim((string)($banner->title ?? ''));
								$description = trim((string)($banner->description ?? ''));
								$buttonText = trim((string)($banner->button_text ?? ''));
								$url = trim((string)($banner->url ?? ''));
								$hasLink = $url !== '' && $buttonText !== '';
								$hasCaption = $title !== '' || $description !== '' || $hasLink;
							@endphp

							@if($is_video > 0)
								<div class="hero-slide dark{{ $hasCaption ? '' : ' no-caption' }}">
									@php
										$path = is_string($banner->image_path) ? trim($banner->image_path) : '';
										if (Str::startsWith($path, ['/public/storage/', 'public/storage/'])) {
											$path = Str::replaceFirst('public/', '', ltrim($path, '/'));
										}
										$path = preg_replace('#(?<!:)/{2,}#', '/', $path);
										$dirname = Str::beforeLast($path, '/');
										$basename = Str::afterLast($path, '/');
										if ($basename !== '') {
											$path = ($dirname ? $dirname.'/' : '').rawurlencode($basename);
										}
										$isAbsolute = Str::startsWith($path, ['http://', 'https://', '//']);
										$resolved = $isAbsolute ? $path : (Str::startsWith($path, ['storage/', '/storage/']) ? asset($path) : url($path));
										$lower = strtolower($resolved);
										$mime = Str::endsWith($lower, '.webm') ? 'video/webm' : (Str::endsWith($lower, '.ogg') ? 'video/ogg' : 'video/mp4');
									@endphp
									<video class="w-100" autoplay muted loop playsinline>
										<source src="{{ $resolved }}" type="{{ $mime }}">
									</video>
									@if($hasCaption)
										<div class="banner-caption">
											<div class="container">
												<div class="row align-items-center">
													<div class="col-lg-12">
														@if($title !== '')
															<h2 class="text-center slide-content">{{ $banner->title }}</h2>
														@endif
														@if($description !== '')
															<p class="text-center mx-wd-750-f mx-auto slide-content2" data-delay="200">{{ $banner->description }}</p>
														@endif
														@if($hasLink)
															<div class="d-flex justify-content-center mt-5" data-delay="400">
																<a href="{{ $banner->url }}" class="button button-large button-border">{{ $banner->button_text }}</a>
															</div>
														@endif
													</div>
												</div>
											</div>
										</div>
									@endif
								</div>
							@else
								<div class="hero-slide dark{{ $hasCaption ? '' : ' no-caption' }}">
									@php
										$path = is_string($banner->image_path) ? trim($banner->image_path) : '';
										if (Str::startsWith($path, ['/public/storage/', 'public/storage/'])) {
											$path = Str::replaceFirst('public/', '', ltrim($path, '/'));
										}
										$path = preg_replace('#(?<!:)/{2,}#', '/', $path);
										$dirname = Str::beforeLast($path, '/');
										$basename = Str::afterLast($path, '/');
										if ($basename !== '') {
											$path = ($dirname ? $dirname.'/' : '').rawurlencode($basename);
										}
										$isAbsolute = Str::startsWith($path, ['http://', 'https://', '//']);
										$resolved = $isAbsolute ? $path : (Str::startsWith($path, ['storage/', '/storage/']) ? asset($path) : url($path));
									@endphp
									<img src="{{ $resolved }}" alt="{{ $banner->title }}">
									@if($hasCaption)
										<div class="banner-caption">
											<div class="container">
												<div class="row align-items-center">
													<div class="col-lg-12">
														@if($title !== '')
															<h2 class="text-center slide-content">{{ $banner->title }}</h2>
														@endif
														@if($description !== '')
															<p class="text-center mx-wd-750-f mx-auto slide-content2" data-delay="200">{{ $banner->description }}</p>
														@endif

														@if($hasLink)
															<div class="d-flex justify-content-center mt-5" data-delay="400">
																<a href="{{ $banner->url }}" class="button button-large button-border">{{ $banner->button_text }}</a>
															</div>
														@endif
													</div>
												</div>
											</div>
										</div>
									@endif
								</div>
							@endif
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
