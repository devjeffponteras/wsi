@extends('theme.main')

@section('pagecss')
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
@endsection

@section('content')
<div class="container topmargin-lg bottommargin-lg">	
	<div class="row">
		<div id="processTabs">
			<ul class="process-steps row col-mb-30">
				<li class="col-sm-6 col-lg-3">
					<a href="#ptab1" class="i-circled i-bordered i-alt mx-auto btn_ptab1">1</a>
					<h5>Billing Information</h5>
				</li>
				<li class="col-sm-6 col-lg-3">
					{{-- <a href="#ptab2" class="i-circled i-bordered i-alt mx-auto tab-linker tab-linker-top btn_ptab2" rel="2">2</a> --}}
					<a href="#ptab2"><button class="i-circled i-bordered i-alt mx-auto tab-linker tab-linker-top btn_ptab2" rel="2">2</button></a>
					<h5>Shipping Options</h5>
				</li>
				<li class="col-sm-6 col-lg-3">
					<a href="#ptab3"><button type="button" class="i-circled i-bordered i-alt mx-auto tab-linker tab-linker-top btn_ptab3" rel="2">3</button></a>
					<h5>Payment Method</h5>
				</li>
				<li class="col-sm-6 col-lg-3">
					<a href="#ptab4"><button type="button" class="i-circled i-bordered i-alt mx-auto tab-linker tab-linker-top btn_ptab4" rel="2">4</button></a>
					<h5>Review and Place Order</h5>
				</li>
			</ul>
			<form method="post" action="{{ route('cart.temp_sales') }}" id="chk_form">
				@csrf
				<div id="ptab1">
					<h2>Billing Information</h2>
					<table class="table table-borderless">
						<tbody>
							<tr>
								<td><strong>First Name</strong> <span class="text-danger">*</span></td>
								<td class="p-2" width="80%"><input type="text" class="form-control" name="customer_fname" id="customer_fname" value="{{$customer->firstname}}" required></td>
							</tr>
							<tr>
								<td><strong>Last Name</strong> <span class="text-danger">*</span></td>
								<td class="p-2" width="80%"><input type="text" class="form-control" name="customer_lname" id="customer_lname" value="{{$customer->lastname}}" required></td>
							</tr>
							<tr>
								<td><strong>E-mail Address</strong> <span class="text-danger">*</span></td>
								<td class="p-2"><input type="text" class="form-control" name="customer_email" id="customer_email" value="{{$customer->email}}" required></td>
							</tr>
							<tr>
								<td><strong>Contact Number</strong> <span class="text-danger">*</span></td>
								<td class="p-2"><input type="number" class="form-control" name="customer_contact_number" id="customer_contact_number" oninput="this.value = this.value.replace(/\D/g, '').slice(0, 11);" value="{{$customer->mobile}}" required></td>
							</tr>
							<tr>
								<td><strong>Barangay</strong> <span class="text-danger">*</span></td>
								<td class="p-2"><textarea id="customer_delivery_barangay" name="customer_delivery_barangay" id="address_brgy" class="form-control" rows="3" required>{{$customer->address_street}}</textarea></td>
							</tr>
							<tr>
								<td><strong>City</strong> <span class="text-danger">*</span></td>
								<td class="p-2">
									<input type="text" class="form-control" id="customer_delivery_city" name="customer_delivery_city" value="{{$customer->address_city}}" required>
								</td>
							</tr>
							<tr>
								<td><strong>Province</strong> <span class="text-danger">*</span></td>
								<td class="p-2">
									<input type="text" class="form-control" id="customer_delivery_province" name="customer_delivery_province" value="{{$customer->address_province}}" required>
								</td>
							</tr>
							<tr>
								<td><strong>Zip Code</strong> <span class="text-danger">*</span></td>
								<td class="p-2"><input type="number" name="customer_delivery_zip" id="customer_delivery_zip" class="form-control" oninput="this.value = this.value.replace(/\D/g, '').slice(0, 11);" value="{{$customer->address_zip}}" required></td>
							</tr>
							<tr>
								<td><strong>Notes</td>
								<td class="p-2">
									<textarea name="other_instruction" id="other_instruction" class="form-control" rows="3"></textarea>
								</td>
							</tr>
						</tbody>
					</table>

					<br>
					<a href="#" class="btn bg-color text-white tab-linker float-end" rel="2" onclick="update_details();">Next <i class="icon-arrow-circle-right"></i></a>
				</div>

				<div id="ptab2">
					<h2>Shipping Options</h2>
					
					<div class="row">
						<div class="col-md-8">
							<div class="row justify-content-center">
								<label for="shipping-option-d2d" class="col-sm-6 col-md-4">
									<div class="pricing-box text-center shadow-none border">
										<input type="radio" class="mt-3" autocomplete="off" name="devlivery_type" id="shipping-option-d2d" value="d2d" onclick="shipping_type('d2d');" checked>
										<div class="pricing-price">
											<h3 class="nott ls0 mb-0">Door-to-Door</h3>
										</div>
										<div class="px-3">
											<p class="">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
										</div>
									</div>
								</label>

								<label for="shipping-option-pickup" class="col-sm-6 col-md-4">
									<div class="pricing-box text-center shadow-none border">
										<input type="radio" class="mt-3" autocomplete="off" name="devlivery_type" id="shipping-option-pickup" value="pickup" onclick="shipping_type('pickup');">
										<div class="pricing-price">
											<h3 class="nott ls0 mb-0">For Pickup</h3>
										</div>
										<div class="px-3">
											<p class="">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
										</div>
									</div>
								</label>

								<input type="hidden" name="shippingOption" id="shippingOption" value="d2d">
							</div>
						</div>
						
						<div class="col-md-4">

							<div class="col-lg-auto ps-lg-0">
								<div class="row">
									<div class="col-md-8">
										<input type="text" value="" id="coupon_code" class="sm-form-control text-center text-md-start text-uppercase" placeholder="Enter Coupon Code.." />
									</div>
									<div class="col-md-4 mt-3 mt-md-0">
										<button type="button" class="button button-3d button-black m-0" id="couponManualBtn">Apply Coupon</button>
									</div>
								</div>
								<p><a href="#" onclick="myCoupons()" class="btn mb-2 text-primary px-0"> <small>or click here to  Select from My Coupons</small></a></p>

								<div id="manual-coupon-details"></div>
								<div id="couponList"></div>
								<div id="discount_list"></div>
								<div id="manual-coupons"></div>
								
								<input type="hidden" id="coupon_limit" value="{{ Setting::info()->coupon_limit }}">
								<input type="hidden" id="coupon_counter" name="coupon_counter" value="0">
								<input type="hidden" id="solo_coupon_counter" value="0">
								<input type="hidden" id="total_amount_discount_counter" value="0">
								<input type="hidden" id="coupon_merge_not_allowed" value="0">
							</div>

							{{-- <div id="row">
								<div class="input-group mb-3">
									<input type="text" class="form-control m-input" placeholder="Enter Coupon Code..">
								</div>
								<a href="#" class="small mb-3 d-inline-block" data-bs-toggle="modal" data-bs-target="#myModal">Apply Coupon</a>
							</div>

							<div id="newinput"></div>
							<button id="rowAdder" type="button" class="btn btn-dark">
								<span class="icon icon-plus-square1"></span> Add Coupon
							</button> --}}
						</div>
					</div>
					
					<br>
					<a href="#" class="btn bg-color text-white tab-linker float-start" rel="1"><i class="icon-arrow-circle-left"></i> Previous</a>
					<a href="#" class="btn bg-color text-white tab-linker float-end" rel="3">Next <i class="icon-arrow-circle-right"></i></a>
				</div>

				<div id="ptab3">
					<h2>Payment Method</h2>
					
					<div class="row justify-content-center">
						<div class="col-sm-4 col-md-4">
							<label for="payment-option-card2" class="w-100">
								<div class="pricing-box text-center shadow-none border">
									<input type="radio" name="payment_method" value="cod" class="required mt-3 payment-option" autocomplete="off" id="payment-option-card1" checked>
									<div class="pricing-price">
										<h3 class="nott ls0 mb-0">Cash on Delivery</h3>
									</div>
									<div class="px-3">
										<p class="">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
									</div>
								</div>
							</label>
						</div>

						{{-- <div class="col-sm-4 col-md-4">
							<label for="payment-option-card" class="w-100">
								<div class="pricing-box text-center shadow-none border">
									<input type="radio" name="payment_method" value="credit" class="required mt-3 payment-option" autocomplete="off" id="payment-option-card2">
									<div class="pricing-price">
										<h3 class="nott ls0 mb-0">Credit / Debit Card</h3>
									</div>
									<div class="px-3">
										<p class="">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
									</div>
								</div>
							</label>
						</div> --}}

						{{-- FOR ECREDIT --}}

						@php $cartsubtotal = 0; @endphp

						@foreach($orders as $order)
							@php
								$cartsubtotal += $order->price*$order->qty;
							@endphp
						@endforeach

						@php 
							$ordersubtotal = ($cartsubtotal - $cart->coupon_discount);
						@endphp


						@if(auth()->user()->ecredits >= $ordersubtotal)
							<div class="col-sm-4 col-md-4">
								<label for="payment-option-card" class="w-100">
									<div class="pricing-box text-center shadow-none border">
										<input type="radio" name="payment_method" value="ecredit" class="required mt-3 payment-option" autocomplete="off" id="payment-option-card3">
										<div class="pricing-price">
											<h3 class="nott ls0 mb-0">E-Wallet</h3>
										</div>
										<div class="px-3">
											<p class="">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
										</div>
									</div>
								</label>
							</div>
						@endif
					</div>
					
					
					<br>
					<a href="#" class="btn bg-color text-white tab-linker float-start" rel="2"><i class="icon-arrow-circle-left"></i> Previous</a>
					<a href="#" class="btn bg-color text-white tab-linker float-end" rel="4">Next <i class="icon-arrow-circle-right"></i></a>
				</div>

				<div id="ptab4">
					<h2>Review and Place Order</h2>

					<table class="table">
					  	<tbody>
							<tr>
						  		<td width="20%"><small>Billed to</small></td>
							</tr>
							<tr>
						  		<td>
							  		<h3 class="m-0"><strong id="ck_billed_to"></strong></h3>
							  		<span id="ck_email"></span>
									<br><span id="ck_contact"></span>
									<br><span id="ck_address"></span>
									<br><span id="ck_zip"></span>
						  		</td>
							</tr>
					  </tbody>
					</table>

					<table class="table cart mb-5">
						<thead>
							<tr>
								<th class="cart-product-thumbnail">&nbsp;</th>
								<th class="cart-product-name">Product</th>
								<th class="cart-product-price">Unit Price</th>
								<th class="cart-product-quantity">Quantity</th>
								<th class="cart-product-subtotal">Total</th>
							</tr>
						</thead>
						<tbody>
							@php $subtotal = 0; $totalqty = 0; $grandtotal = 0; $ecredit_balance = $use_ecredit ? auth()->user()->ecredits : 0; @endphp
							@foreach($orders as $order)
								@php
									$subtotal += $order->price*$order->qty;
									$totalqty += $order->qty;
								@endphp
								<tr class="cart_item">
									<td class="cart-product-thumbnail">
										<a href="javascript:;"><img width="64" height="64" src="{{ asset('storage/products/'.$order->product->photoPrimary) }}" alt="{{$order->product->name}}"></a>
									</td>

									<td class="cart-product-name">
										<a href="#">{{ $order->product->name }}</a>
									</td>

									<td class="cart-product-price">
										<span class="amount">₱{{ number_format($order->price,2) }}</span>
									</td>

									<td class="cart-product-quantity">
										<span>{{$order->qty}}</span> pc(s).
									</td>

									<td class="cart-product-subtotal">
										<span class="amount">₱{{ number_format($order->price*$order->qty,2) }}</span>
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>

					<div class="row">
						<div class="col-md-6">
							<p class="text-danger">Notes</p>
							<p id="ck_notes"></p>
						</div>
						<div class="col-md-6">
							<h4>Cart Totals</h4>

							<div class="table-responsive">
								<table class="table cart cart-totals">
									<tbody>
										<tr class="cart_item">
											<td class="cart-product-name">
												<strong>Cart Subtotal</strong>
											</td>

											<td class="cart-product-name text-end">
												<span class="amount">₱{{ number_format($subtotal,2) }}</span>
											</td>
										</tr>



										{{-- for discount  --}}
										@if($cart->coupon_discount > 0)
											<tr class="cart_item">
												<td class="cart-product-name" colspan="2">
													<strong>Coupon Code(s)</strong>
												</td>
											</tr>
											<tr class="cart_item">
												<td class="cart-product-name" colspan="2">
													<ul class="pl-3">
														@foreach($coupons as $cpn)
															<li>{{ $cpn->details->name }}</li>

															<input type="hidden" name="couponUsage[]" value="0">
															<input type="hidden" id="coupon_combination" value="{{$cpn->details->combination}}">
															<input type="hidden" name="couponid[]" value="{{$cpn->coupon_id}}">
															<input type="hidden" name="coupon_productid[]" value="{{$cpn->product_id}}">

															@if(isset($cpn->details->free_product_id))
															<input type="hidden" name="freeproductid[]" value="{{$cpn->details->free_product_id}}">
															@endif
														@endforeach
													</ul>
												</td>
											</tr>
											<tr class="cart_item">
												<td class="cart-product-name">
													<strong>Total Coupon Discount</strong>
												</td>

												<td class="cart-product-name text-end">
													<span class="amount">₱{{ number_format($cart->coupon_discount,2) }}</span>
												</td>
											</tr>
										@endif

										@php $counter = 0; $soloCouponCounter = 0; @endphp
										@foreach($coupons as $cpn)
										@php 
											$counter++; 

											if($cpn->details->combination == 0){
												$soloCouponCounter++;
											}
										@endphp
										@endforeach
										
										<input type="hidden" name="shippingOption" id="shippingOption" value="xde">
										<input type="hidden" name="shippingRate" id="shippingRate" value="500">
										<input type="hidden" name="shippingFeeDiscount" id="sf_discount_amount" value="0">
							
										<input type="hidden" id="coupon_total_discount" name="coupon_total_discount" value="{{$cart->coupon_discount}}">
										<input type="hidden" id="sf_discount_coupon" value="0">

										<input type="hidden" id="solo_coupon_counter" name="solo_coupon_counter" value="{{$soloCouponCounter}}">
										<input type="hidden" id="coupon_counter" name="coupon_counter" value="{{$counter}}">
										{{--  --}}


										<tr id="ecredit_div" class="cart_item" style="display: none">
											<td class="cart-product-name">
												<strong>My E-Wallet</strong>
											</td>
											
											<td class="cart-product-name text-end">
												<span class="amount">₱{{ number_format(auth()->user()->ecredits,2) }}</span>
												<div class="switch mt-1 float-end ms-3">
													<input id="ecredit_toggle" name="ecredit_toggle" class="switch-toggle switch-rounded-mini switch-toggle-round" type="checkbox" checked disabled>
													<label for="ecredit_toggle"></label>
												</div>
											</td>
										</tr>
										
										<tr class="cart_item">
											<td class="cart-product-name">
												<strong>Shipping Fee</strong>
											</td>

											<td class="cart-product-name text-end">
												<span class="amount" id="delivery_fee" value="0"></span>
											</td>
										</tr>
										<tr class="cart_item">
											<td class="cart-product-name">
												<strong>Grand Total</strong>
											</td>

											<td class="cart-product-name text-end">
												<input type="hidden" name="total_amount" id="total_amount" value="{{ ($subtotal - $cart->coupon_discount) - $ecredit_balance }}">
												<span class="amount color lead" id="span_total_amount"><strong>₱{{ number_format(($subtotal - $cart->coupon_discount) - $ecredit_balance ,2) }}</strong></span>
												<input id="ecredit_balance" name="ecredit_amount" value="0"  hidden/>
												{{-- <input id="ecredit_balance" name="ecredit_amount" value="{{ $use_ecredit ? auth()->user()->ecredits : 0 }}" hidden /> --}}
											</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>


					{{-- <input type="hidden" id="coupon_total_discount" name="coupon_total_discount" value="0"> --}}

					<br>
					<a href="#" class="btn bg-color text-white tab-linker float-start" rel="3"><i class="icon-arrow-circle-left"></i> Previous</a>
					<a href="javascript:;" class="btn bg-color text-white float-end" onclick="place_order();">Complete Order <i class="icon-check-circle"></i></a>
				</div>
			</form>
		</div>
	</div>	
</div>


@include('theme.pages.ecommerce.modal')

<input type="hidden" id="totalAmountWithoutCoupon" value="{{number_format($subtotal,2,'.','')}}">
<input type="hidden" id="totalQty" value="{{$totalqty}}">

<input type="hidden" id="coupon_limit" value="{{ Setting::info()->coupon_limit }}">
<input type="hidden" id="solo_coupon_counter" value="{{$soloCouponCounter}}">

@endsection

@section('pagejs')
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

<script>
	$(document).ready(function(){
		$('[data-toggle="popover"]').popover();
	});

	function IsEmail(email) {
	    var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	    if(!regex.test(email)) {
	        return false;
	    } else{
	        return true;
	    }
	}


	// $(function() {
	// 	$("#processTabs").tabs({ show: { effect: "fade", duration: 400 } });
	// 	$(".tab-linker").click(function() {
	// 		var current_tab = $(this).attr('rel');
			
	// 		if (current_tab == 2) {
	// 			var fname = $('#customer_fname').val();
	// 			var lname = $('#customer_lname').val();
	// 			var email = $('#customer_email').val();
	// 			var contact = $('#customer_contact_number').val();
	// 			var brgy = $('#customer_delivery_barangay').val();
	// 			var city = $('#customer_delivery_city').val();
	// 			var province = $('#customer_delivery_province').val();
	// 			var zipcode = $('#customer_delivery_zip').val();

	// 			if (fname.length === 0 || lname.length === 0 || contact.length === 0 || IsEmail(email) == false || zipcode.length === 0 || brgy.length === 0 || city.length === 0 || province.length === 0) {
					
	// 				swal('Oops...', 'Please check required input fields.', 'error');
	// 				return false;
	// 			}
	// 		}

	// 		$( "#processTabs" ).tabs("option", "active", $(this).attr('rel') - 1);
	// 		return false;
	// 	});
	// });


	$(function() {

		$( "#processTabs" ).tabs({ show: { effect: "fade", duration: 400 } });
		$( ".tab-linker" ).click(function() {
			var nxt_tab = $(this).attr('rel');
			
			if(nxt_tab == 2){
				var fname = $('#customer_fname').val();
				var lname = $('#customer_lname').val();
				var email = $('#customer_email').val();
				var contact = $('#customer_contact_number').val();
				var brgy = $('#customer_delivery_barangay').val();
				var city = $('#customer_delivery_city').val();
				var province = $('#customer_delivery_province').val();
				var zipcode = $('#customer_delivery_zip').val();

				if(fname.length === 0 || lname.length === 0 || contact.length === 0 || IsEmail(email) == false || zipcode.length === 0 || brgy.length === 0 || city.length === 0 || province.length === 0){
                    swal('Oops...', 'Please check required input fields.', 'error');
					
		            return false;

                } else {
                    $( "#processTabs" ).tabs("option", "active", $(this).attr('rel') - 1);
					return false;
                }
			} else if(nxt_tab == 3){

	   			var sfOption = $('#shippingOption').val();

	            $( "#processTabs" ).tabs("option", "active", $(this).attr('rel') - 1);
				return false;

			} else {
				$( "#processTabs" ).tabs("option", "active", $(this).attr('rel') - 1);
				return false;
			}	
		});
	});

	function update_details(){
		var customer = $('#customer_fname').val()+' '+$('#customer_lname').val();
		var email = $('#customer_email').val();
		var contact = $('#customer_contact_number').val();
		var address = $('#customer_delivery_barangay').val()+' '+$('#customer_delivery_city').val()+' '+$('#customer_delivery_province').val();
		var zipcode = $('#customer_delivery_zip').val();
		var notes   = $('#other_instruction').val();
		
		$('#ck_billed_to').html(customer);
		$('#ck_email').html(email);
		$('#ck_contact').html(contact);
		$('#ck_address').html(address);
		$('#ck_zip').html(zipcode);
		$('#ck_notes').html(notes);
	}

	function addCommas(nStr){
        nStr += '';
        x = nStr.split('.');
        x1 = x[0];
        x2 = x.length > 1 ? '.' + x[1] : '';
        var rgx = /(\d+)(\d{3})/;
        while (rgx.test(x1)) {
            x1 = x1.replace(rgx, '$1' + ',' + '$2');
        }
        return x1 + x2;
    }

	function shipping_type(stype){
		$('#shippingOption').val(stype);
	}

    // function compute_total(){

    //     var delivery_fee = parseFloat($('#delivery_fee').val());
    //     var delivery_discount = parseFloat($('#sf_discount_amount').val());


    //     var orderAmount = parseFloat($('#totalAmountWithoutCoupon').val());
    //     var couponDiscount = parseFloat($('#coupon_total_discount').val());
    //     var ecreditBalance = parseFloat($('#ecredit_balance').val());

    //     var orderTotal  = (orderAmount-couponDiscount) - ecreditBalance;
    //     var deliveryFee = delivery_fee-delivery_discount;

    //     var grandTotal = parseFloat(orderTotal)+parseFloat(deliveryFee);

    //     $('#span_total_amount').html(addCommas(parseFloat(grandTotal).toFixed(2)));
    //     $('#total_amount').val(grandTotal.toFixed(2));
    // }
	function compute_total(){

		var delivery_fee = parseFloat($('#shippingRate').val());
		var delivery_discount = parseFloat($('#sf_discount_amount').val());

		var orderAmount = parseFloat($('#totalAmountWithoutCoupon').val());
		var couponDiscount = parseFloat($('#coupon_total_discount').val());

		var orderTotal  = orderAmount-couponDiscount;
		var deliveryFee = delivery_fee-delivery_discount;

		var grandTotal = parseFloat(orderTotal)+parseFloat(deliveryFee);

		$('#delivery_fee').html('₱' + addCommas(parseFloat(deliveryFee).toFixed(2)));
		$('#span_total_amount').html('₱' + addCommas(parseFloat(grandTotal).toFixed(2)));
		$('#total_amount').val(grandTotal.toFixed(2));
	}

    function place_order() {   
	    $('#chk_form').submit();
	}

	$('#province').change(function(){
		var province = $(this).val();
		var x = province.split('|');

		$('#cities').empty();
		$('#cities').append(
    		'<option value="">--- Select City ---</option>'
    	);

		$.ajax({
            type: "GET",
            url: "{{ route('checkout.get-lbc-city-list') }}",
            data: {
                'provinceId' : x[0],
                'area' : x[1]
            },
            success: function( response ) {

            	$.each(response.cities, function(key, city) {
                    $('#cities').append(
	            		'<option value="'+city.CityId+'|'+city.CityName+'">'+city.CityName+'</option>'
	            	);
                });
                
                // var deliveryFee = parseFloat(response.lbcrate);
                var deliveryFee = 100;

                $('#shippingRate').val(deliveryFee);
                $('#delivery_fee').html('₱'+deliveryFee.toFixed(2));
                
                compute_total();
        	}
        });
	});

	$('#cities').change(function(){
		var city = $(this).val();
		var x = city.split('|');

		$('#barangay').empty();
		$('#barangay').append(
    		'<option value="">--- Select Barangay ---</option>'
    	);

		$.ajax({
            type: "GET",
            url: "{{ route('checkout.get-lbc-brgy-list') }}",
            data: {
                'cityId' : x[0]
            },
            success: function( response ) {

            	$.each(response.barangays, function(key, brgy) {
                    $('#barangay').append(
	            		'<option value="'+brgy.BarangayId+'|'+brgy.BarangayName+'">'+brgy.BarangayName+'</option>'
	            	);
                });
        	}
        });
	});
	
	$('#couponManualBtn').click(function(){
        var couponCode = $('#coupon_code').val();
        var grandtotal = parseFloat($('#input_total_due').val());

        if($('#location').val() == ''){
            swal({
                title: '',
                text: "Please select a municipality!",         
            });
            return false;
        }

        $.ajax({
            data: {
                "couponcode": couponCode,
                "_token": "{{ csrf_token() }}",
            },
            type: "post",
            url: "{{route('add-manual-coupon')}}",
            success: function(returnData) {

                if(returnData['not_allowed']){
                    swal({
                        title: '',
                        text: "Sorry, you are not authorized to use this coupon.",         
                    });
                    return false;
                }
                
                if(returnData['exist']){
                    swal({
                        title: '',
                        text: "Coupon already used.",         
                    }); 
                    return false;
                }

                if(returnData['not_exist']){
                    swal({
                        title: '',
                        text: "Coupon not found.",         
                    }); 
                    return false;
                }

                if(returnData['expired']){
                    swal({
                        title: '',
                        text: "Coupon is already expired.",         
                    }); 
                    return false;
                }

                if (returnData['success']) {

                    // coupon validity label
                        if(returnData.coupon_details['start_time'] == null){
                            var couponStartDate = returnData.coupon_details['start_date'];
                        } else {
                            var couponStartDate = returnData.coupon_details['start_date']+' '+returnData.coupon_details['start_time'];
                        }
                        
                        if(returnData.coupon_details['end_date'] == null){
                            var couponEndDate = '';
                        } else {
                            if(returnData.coupon_details['end_time'] == null){
                                var couponEndDate = ' - '+returnData.coupon_details['end_date'];
                            } else {
                                var couponEndDate = ' - '+returnData.coupon_details['end_date']+' '+returnData.coupon_details['end_time'];
                            }
                        }
                        var couponValidity = couponStartDate+''+couponEndDate;
                    //

                    $('#manual-coupon-details').append(
                        '<div id="manual_details'+returnData.coupon_details['id']+'">'+
                        // coupons input
                            '<input type="hidden" id="couponcombination'+returnData.coupon_details['id']+'" value="'+returnData.coupon_details['combination']+'">'+
                            '<input type="hidden" id="sfarea'+returnData.coupon_details['id']+'" value="'+returnData.coupon_details['area']+'">'+
                            '<input type="hidden" class="text-uppercase" id="sflocation'+returnData.coupon_details['id']+'" value="'+returnData.coupon_details['location']+'">'+
                            '<input type="hidden" id="sfdiscountamount'+returnData.coupon_details['id']+'" value="'+returnData.coupon_details['location_discount_amount']+'">'+
                            '<input type="hidden" id="sfdiscounttype'+returnData.coupon_details['id']+'" value="'+returnData.coupon_details['location_discount_type']+'">'+
                            '<input type="hidden" id="discountpercentage'+returnData.coupon_details['id']+'" value="'+returnData.coupon_details['percentage']+'">'+
                            '<input type="hidden" id="discountamount'+returnData.coupon_details['id']+'" value="'+returnData.coupon_details['amount']+'">'+
                            '<input type="hidden" id="couponname'+returnData.coupon_details['id']+'" value="'+returnData.coupon_details['name']+'">'+
                            '<input type="hidden" id="couponcode'+returnData.coupon_details['id']+'" value="'+returnData.coupon_details['coupon_code']+'">'+
                            '<input type="hidden" id="couponterms'+returnData.coupon_details['id']+'" value="'+returnData.coupon_details['terms_and_conditions']+'">'+
                            '<input type="hidden" id="coupondesc'+returnData.coupon_details['id']+'" value="'+returnData.coupon_details['description']+'">'+
                            '<input type="hidden" id="couponvalidity'+returnData.coupon_details['id']+'" value="'+couponValidity+'">'+
                        //
                        '</div>'
                    );

                    if(returnData.coupon_details['location'] == null){
                        swal({
                            title: '',
                            text: "Only shipping fee coupon is allowed.",         
                        });

                    } else {
                        if(returnData.coupon_details['amount'] > 0){ 
                            var amountdiscount = parseFloat(returnData.coupon_details['amount']);
                        }

                        if(returnData.coupon_details['percentage'] > 0){
                            var percent  = parseFloat(returnData.coupon_details['percentage'])/100;
                            var discount = parseFloat(grandtotal)*percent;

                            var amountdiscount = parseFloat(discount);
                        }

                        var total = grandtotal-amountdiscount;
                        if(total.toFixed(2) < 1){
                            swal({
                                title: '',
                                text: "The total amount is less than the coupon discount.",         
                            });

                            return false;
                        }
                        
                        use_sf_coupon(returnData.coupon_details['id']);
                    }
                } 
            }
        });
    });
    
    // function isInArrayCaseInsensitive(value, array) {
    //     return array.some(function(item) {
    //       return item.toLowerCase() === value.toLowerCase();
    //     });
    // }
	
    function isInArrayCaseInsensitive(value, array) {
		if (typeof value === 'string') { // Check if value is a string
			return array.some(item => item.toLowerCase() === value.toLowerCase());
		}
		return false; // Return false if value is not a string
	}


    function use_sf_coupon(cid){
    	var sf_discount = parseFloat($('#sfdiscountamount'+cid).val());
        // check total use shipping fee coupons
        var sfcoupon = parseFloat($('#sf_discount_coupon').val());
        var delivery_fee = parseFloat($('#shippingRate').val());

        if(sfcoupon == 1){
            swal({
                title: '',
                text: "Only one (1) coupon for shipping fee discount.",         
            });
            return false;
        }
        
        if(coupon_counter(cid)){
        	
            var selectedLocation = $('#customer_delivery_province').val();
            var loc = selectedLocation.split('|');

            var couponLocation = $('#sflocation'+cid).val();
            var cLocation = couponLocation.split('|');

            var arr_coupon_location = [];
            $.each(cLocation, function(key, value) {
                arr_coupon_location.push(value);
            });

            if(isInArrayCaseInsensitive(loc, arr_coupon_location) || jQuery.inArray('all', arr_coupon_location) !== -1){

                var name  = $('#couponname'+cid).val();
                var terms = $('#couponterms'+cid).val();
                var desc = $('#coupondesc'+cid).val();
                var combination = $('#couponcombination'+cid).val();
                
                $('#couponList').append(
                	'<div class="alert alert-dismissible alert-info mt-3" id="appliedCoupon'+cid+'">'+
                        '<div class="title-bottom-border mb-3">'+
                            '<h4>'+name+'</h4>'+
                        '</div>'+
                        '<p class="mb-3">'+desc+'</p>'+

                        '<input type="hidden" id="coupon_combination'+cid+'" value="'+combination+'">'+
                        '<input type="hidden" name="couponid[]" value="'+cid+'">'+
                        '<input type="hidden" name="coupon_productid[]" value="0">'+

                        '<button type="button" class="btn btn-danger btn-sm sfCouponRemove" id="'+cid+'">Remove</button>&nbsp;'+
                        '<button hidden type="button" class="btn btn-secondary btn-sm me-2" data-container="body" data-toggle="popover" data-placement="right" data-content="'+terms+'">Terms & Condition</button>'+
                    '</div>'
                );

                $('[data-toggle="popover"]').popover();

                

                $('#sf_discount_coupon').val(1);
                var sf_type = $('#sfdiscounttype'+cid).val();
                //var sf_discount = parseFloat($('#sfdiscountamount'+cid).val());

                if(sf_type == 'full'){
                    dfee = parseFloat($('#shippingRate').val());

                    $('#sf_discount_amount').val(dfee);

                    $('#tr_sf_discount').css('display','table-row');
                    $('#shipping_fee_disocunt').html('₱'+addCommas(dfee.toFixed(2)));
                }

                if(sf_type == 'partial'){
                    $('#sf_discount_amount').val(sf_discount.toFixed(2));

                    $('#tr_sf_discount').css('display','table-row');
                    $('#shipping_fee_disocunt').html('-₱'+addCommas(sf_discount.toFixed(2)));
                }

                $('#couponBtn'+cid).prop('disabled',true);
                $('#btnCpnTxt'+cid).html('Applied');

                compute_total();
            } else {
                swal({
                    title: '',
                    text: "Selected delivery location is not in the coupon location.",         
                });
            } 
        }
    }

    $(document).on('click', '.sfCouponRemove', function(){  
        var id = $(this).attr("id");  

        $('#tr_sf_discount').css('display','none');
        
        $('#sf_discount_amount').val(0);
        var totalsfdiscoutcounter = $('#sf_discount_coupon').val();
        $('#sf_discount_coupon').val(parseInt(totalsfdiscoutcounter)-1);

        var counter = $('#coupon_counter').val();
        $('#coupon_counter').val(parseInt(counter)-1);

        var combination = $('#coupon_combination'+id).val();
        if(combination == 0){
            $('#solo_coupon_counter').val(0);
        }

        $('#appliedCoupon'+id+'').remove();

        compute_total();
    });


    function myCoupons(){
        var totalAmount = $('#totalAmountWithoutCoupon').val();
        var totalQty = $('#totalQty').val();

        $.ajax({
            type: "GET",
            url: "{{ route('show-coupons') }}",
            data: {
                'total_amount' : totalAmount,
                'total_qty' : totalQty,
                'page_name' : 'checkout',
            },
            success: function( response ) {
                $('#collectibles').empty();

                var arr_selected_coupons = [];
                $("input[name='couponid[]']").each(function() {
                    arr_selected_coupons.push(parseInt($(this).val()));
                });

                $.each(response.coupons, function(key, coupon) {
                    if(coupon.end_date == null){
                        var validity = '';  
                    } else {
                        if(coupon.end_time == null){
                            var validity = ' Valid Till '+coupon.end_date;
                        } else {
                            var validity = ' Valid Till '+coupon.end_date+' '+coupon.end_time;
                        }
                    }

                    if(jQuery.inArray(coupon.id, response.availability) !== -1){

                        if(jQuery.inArray(coupon.id, arr_selected_coupons) !== -1){
                            var usebtn = '<button class="btn btn-success btn-sm" disabled>Applied</button>';
                        } else {
                            var usebtn = '<button class="btn btn-success btn-sm" id="couponBtn'+coupon.id+'" onclick="use_sf_coupon('+coupon.id+')"><span id="btnCpnTxt'+coupon.id+'">Use Coupon</span></button>';
                        }

                        $('#collectibles').append(
                        	'<div class="alert alert-dismissible alert-info mt-3" id="coupondiv'+coupon.id+'">'+

                                '<input type="hidden" id="couponcombination'+coupon.id+'" value="'+coupon.combination+'">'+
                                '<input type="hidden" id="sflocation'+coupon.id+'" value="'+coupon.location+'">'+
                                '<input type="hidden" id="sfdiscountamount'+coupon.id+'" value="'+coupon.location_discount_amount+'">'+
                                '<input type="hidden" id="sfdiscounttype'+coupon.id+'" value="'+coupon.location_discount_type+'">'+
                                '<input type="hidden" id="discountpercentage'+coupon.id+'" value="'+coupon.percentage+'">'+
                                '<input type="hidden" id="discountamount'+coupon.id+'" value="'+coupon.amount+'">'+
                                '<input type="hidden" id="couponname'+coupon.id+'" value="'+coupon.name+'">'+
                                '<input type="hidden" id="couponcode'+coupon.id+'" value="'+coupon.coupon_code+'">'+
                                '<input type="hidden" id="couponterms'+coupon.id+'" value="'+coupon.terms_and_conditions+'">'+
                                '<input type="hidden" id="coupondesc'+coupon.id+'" value="'+coupon.description+'">'+


                                '<div class="title-bottom-border mb-3">'+
                                    '<h4>'+coupon.name+'</h4>'+
                                '</div>'+
                                '<small><strong>'+validity+'</strong></small>'+
                                '<p class="mb-3">'+coupon.description+'</p>'+

                                usebtn+'&nbsp;'+
                                '<button hidden type="button" class="btn btn-secondary btn-sm me-2" data-bs-container="body" data-toggle="popover" data-placement="right" data-content="'+coupon.terms_and_conditions+'">Terms & Condition</button>'+
                            '</div>'
                        );
                    } else {
                        $('#collectibles').append(
                        	'<div class="alert alert-dismissible alert-secondary mt-3">'+
                                '<div class="title-bottom-border mb-3">'+
                                    '<h4>'+coupon.name+'</h4>'+
                                '</div>'+
                                '<small><strong>'+validity+'</strong></small>'+
                                '<p class="mb-3">'+coupon.description+'</p>'+

                                '<button class="btn btn-warning btn-sm disabled">T&C Not Met</button>&nbsp;'+
                                '<button hidden type="button" class="btn btn-secondary btn-sm me-2" data-bs-container="body" data-toggle="popover" data-placement="right" data-content="'+coupon.terms_and_conditions+'">Terms & Condition</button>'+
                            '</div>'
                        );
                    }

                    $('[data-toggle="popover"]').popover();
                    
                });

                $('#couponModal').modal('show');
            }
        });
    }
    
    
    function coupon_counter(cid){
        var limit = $('#coupon_limit').val();
        var counter = $('#coupon_counter').val();
        var solo_coupon_counter = $('#solo_coupon_counter').val();

        var combination = $('#couponcombination'+cid).val();
        if(parseInt(counter) < parseInt(limit)){

            if(combination == 0){
                if(counter > 0){
                    swal({
                        title: '',
                        text: "Coupon cannot be used together with other coupons.",         
                    });
                    return false;
                } else {
                    $('#solo_coupon_counter').val(1);
                    $('#coupon_counter').val(parseInt(counter)+1);
                    return true;
                }
            } else {
                if(solo_coupon_counter > 0){
                    swal({
                        title: '',
                        text: "Unable to use this coupon. A coupon that cannot be used together with other coupon is already been selected.",         
                    });
                    return false;
                } else {
                    $('#coupon_counter').val(parseInt(counter)+1);
                    return true;
                }
            }
        } else {
            swal({
                title: '',
                text: "Maximum of "+limit+" coupon(s) only.",         
            });
            return false;
        }
    }

	$(document).on('change', '.payment-option', function() {  

		if($('#payment-option-card3').is(':checked')) {
			$('#ecredit_balance').val({{ auth()->user()->ecredits }});
			$('#ecredit_div').show();
		} else {
			$('#ecredit_balance').val(0);
			$('#ecredit_div').hide();
		}
	});

</script>
@endsection