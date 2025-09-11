@extends('theme.main')

@section('content')
@php
    $modals='';
@endphp

<div class="container topmargin-lg bottommargin-lg">
    <div class="row">
        <span onclick="closeNav()" class="dark-curtain"></span>
        <div class="col-lg-12 col-md-5 col-sm-12">
            <span onclick="openNav()" class="button button-small button-circle border-bottom ms-0 text-initial nols fw-normal noleftmargin d-lg-none mb-4"><span class="icon-chevron-left me-2 color-2"></span> Quicklinks</span>
        </div>
        <div class="col-lg-3 pe-lg-4">
            @include('theme.pages.customer.sidebar')
        </div>

        
        <div class="col-lg-9">
            <h2>Favorites</h2>
            
            {{-- <div class="form-group d-flex">
                <label for="inputState" class="col-form-label me-2">Sort by</label>
                <div class="">
                    <select id="inputState" class="form-select">
                        <option selected>Choose...</option>
                        <option>A to Z</option>
                        <option>Z to A</option>
                        <option>By date</option>
                    </select>
                </div>
            </div> --}}

            
			<form id="sortForm" action="{{ route('customer.favorites') }}" method="GET">
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
            
            <div class="row">

                @forelse($customer_favorites as $customer_favorite)
                    @php
                        $imageUrl = asset('storage/products/'.$customer_favorite->photoPrimary);
                    @endphp

                    <div class="col-md-2">
                        <div class="grid-inner">
                            <div class="product-image h-translate-y all-ts">
                                <a href="{{ env('APP_URL') . '/book-details/' . $customer_favorite->slug }}" target="blamk_"><img src="{{ $imageUrl }}" alt="Image 1"></a>
                            </div>
                            <div class="product-desc py-0">
                                <div class="product-title"><h3><a href="{{ env('APP_URL') . '/book-details/' . $customer_favorite->slug }}" target="blamk_">{{ $customer_favorite->name }}</a></h3></div>
                            </div>
                        </div>
                    </div>
                @empty
                @endforelse


            </div>

            {{ $customer_favorites->links('theme.layouts.pagination') }}
            
        </div>
    </div>
</div>

{!!$modals!!}

<div class="modal fade bs-example-modal-centered" id="cancel_order" tabindex="-1" role="dialog" aria-labelledby="centerModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable ">
        <div class="modal-content">
            <form action="{{route('my-account.cancel-order')}}" method="post">
                @csrf
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Confirmation</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to cancel this order?</p>
                    <input type="hidden" id="orderid" name="orderid">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Continue</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@section('pagejs')
	<script>
		function view_items(salesID){
            $('#detail'+salesID).modal('show');
        }

        function view_deliveries(salesID){
            $('#delivery'+salesID).modal('show');
        }

        function cancel_unpaid_order(id){
            $('#orderid').val(id);
            $('#cancel_order').modal('show');
        }
	</script>
@endsection

