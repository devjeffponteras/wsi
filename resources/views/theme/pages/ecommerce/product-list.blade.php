@extends('theme.main')

@section('content')
<div class="container topmargin-lg bottommargin-lg">
	<div class="row">
		<span onclick="closeNav()" class="dark-curtain"></span>
		<div class="col-lg-12 col-md-5 col-sm-12">
			<span onclick="openNav()" class="button button-small button-circle border-bottom ms-0 text-initial nols fw-normal noleftmargin d-lg-none mb-4"><span class="icon-chevron-left me-2 color-2"></span> Category</span>
		</div>
		<div class="col-lg-3 pe-lg-4">
			<div class="tablet-view">
				<a href="javascript:void(0)" class="closebtn d-block d-lg-none" onclick="closeNav()">&times;</a>

				<div class="card border-0">
					<div class="border-0 mb-5">
						<h3 class="mb-3">Search</h3>
						<div class="search">
							<form action="{{ route('search-product') }}" method="GET">
                                <div class="searchbar">
                                    <input type="text" name="keyword" id="keyword" class="form-control form-input form-search" placeholder="Search a book" aria-label="Search a book" aria-describedby="button-addon1" value="@if(request()->has('keyword')) {{ request('keyword') }} @endif"/>
                                    <button class="form-submit-search" type="submit">
                                        <i class="icon-line-search"></i>
                                    </button>
                                </div>
								{{-- hidden --}}
								<input type="text" name="sort_by" value="@if(request()->has('sort_by')){{ request('sort_by') }}@endif" hidden/>
                            </form>
						</div>
					</div>
					
					@include('theme.layouts.components.product-categories')

				</div>
			</div>
		</div>
		<div class="col-lg-9">
			<form id="sortForm" action="{{ route('search-product') }}" method="GET">
				<div class="form-group d-flex">
					<label for="sort_by" class="col-form-label me-2">Sort by</label>
					<div class="">
						<select id="sort_by" class="form-select" name="sort_by" onchange="document.getElementById('sortForm').submit()">
							<option value="">Choose...</option>
							<option value="name_asc" {{ request('sort_by')== "name_asc"? 'selected' : '' }}>A to Z</option>
							<option value="name_desc" {{ request('sort_by')== "name_desc"? 'selected' : '' }}>Z to A</option>
							<option value="price_asc" {{ request('sort_by')== "price_asc"? 'selected' : '' }}>Prices Low - High</option>
							<option value="price_desc" {{ request('sort_by')== "price_desc"? 'selected' : '' }}>Prices High - Low</option>
							<option value="date_desc" {{ request('sort_by')== "date_desc"? 'selected' : '' }}>Recent - Old</option>
							<option value="date_asc" {{ request('sort_by')== "date_asc"? 'selected' : '' }}>Old - Recent</option>
						</select>
					</div>
				</div>
				{{-- hidden --}}
				<input type="text" name="keyword" value="@if(request()->has('keyword')){{ request('keyword') }}@endif" hidden/>
			</form>
			
			@if(request()->has('keyword') && request('keyword') != '')
				@if(count($products) > 0)
					<div class="style-msg successmsg">
						<div class="sb-msg"><i class="icon-thumbs-up"></i><strong>Woo hoo!</strong> We found <strong>(<span>{{ count($products) }}</span>)</strong> matching results.</div>
					</div>
				@else
					<div class="style-msg2 errormsg">
						<div class="msgtitle p-0 border-0">
							<div class="sb-msg">
								<i class="icon-thumbs-up"></i><strong>Uh oh</strong>! <span><strong>{{ app('request')->input('keyword') }}</strong></span> you say? Sorry, no results!
							</div>
						</div>
						<div class="sb-msg">
							<ul>
								<li>Check the spelling of your keywords.</li>
								<li>Try using fewer, different or more general keywords.</li>
							</ul>
						</div>
					</div>
				@endif
			@endif
			
			<div class="row">
				@forelse($products as $product)
					{{-- @if(\App\Models\Ecommerce\Product::has_ebook($product->id))

						<div class="product col-4 col-md-3 col-sm-6 sf-dress bottommargin-sm">
							<div class="grid-inner">
								<div class="product-image">
									<a href="{{ route('ebook.details',$product->slug) }}"><img src="{{ asset('storage/products/'.$product->photoPrimary) }}" alt="{{$product->name}}"></a>
									<div class="sale-flash badge bg-success p-2">Ebook</div>
								</div>
								<div class="product-desc">
									<div class="product-title"><h3 style="display: -webkit-box;-webkit-line-clamp: 2;-webkit-box-orient: vertical;overflow: hidden;"><a href="{{ route('ebook.details',$product->slug) }}">{{$product->name}}</a></h3></div>
									{!! ($product->ebook_discount_price > 0 ? '<div class="product-price"><del>' . number_format($product->ebook_price, 2) . '</del> <ins>' . number_format($product->ebook_discount_price, 2) . '</ins></div>' : '<div class="product-price"><ins>' . number_format($product->ebook_price, 2) . '</ins></div>') !!}
									<div class="product-rating">
										@for($star = 1; $star <= 5; $star++)
											<i class="icon-star{{ $star <= $product->rating ? '3' : '-empty' }}"></i>
										@endfor
									</div>
								</div>
							</div>
						</div>

					@endif --}}

					<div class="product col-4 col-md-3 col-sm-6 sf-dress bottommargin-sm">
						<div class="grid-inner">
							<div class="product-image">
								<a href="{{ route('product.details',$product->slug) }}"><img src="{{ asset('storage/products/'.$product->photoPrimary) }}" onerror="this.onerror=null;this.src='{{ asset('storage/products/no-image.jpg') }}';" alt="{{$product->name}}"></a>
								@if($product->inventory <= 0)
									<div class="sale-flash badge bg-danger p-2">Out of Stock</div>
								@endif
							</div>
							<div class="product-desc">
								<div class="product-title"><h3 style="display: -webkit-box;-webkit-line-clamp: 2;-webkit-box-orient: vertical;overflow: hidden;"><a href="{{ route('product.details',$product->slug) }}">{{$product->name}}</a></h3></div>
								{!! ($product->discount_price > 0 || $product->discountedprice != $product->price ? '<div class="product-price"><del class="text-danger">' . number_format($product->price, 2) . '</del> <ins>' . number_format($product->discountedprice != $product->price ? $product->discountedprice : $product->discount_price, 2) . '</ins></div>' : '<div class="product-price"><ins>' . number_format($product->price, 2) . '</ins></div>') !!}
								<div class="product-rating text-warning">
									@for($star = 1; $star <= 5; $star++)
										<i class="icon-star{{ $star <= $product->rating ? '3' : '-empty' }}"></i>
									@endfor
								</div>
							</div>
						</div>
					</div>
				@empty
					{{-- <div class="alert alert-info">
                        No books found.
                    </div> --}}
				@endforelse
			</div>
			
			{{ $products->links('theme.layouts.pagination') }}
		</div>
	</div>
</div>
@endsection