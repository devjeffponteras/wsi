@extends('theme.main')

@section('pagecss')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
@endsection

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
            <h2>My Wishlist</h2>
            
			<form id="sortForm" action="{{ route('customer.wishlist') }}" method="GET" hidden>
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
            
           <table class="table cart mb-5">
                <tbody>
                    
                    @forelse($customer_wishlists as $customer_wishlist)
                        @php
                            $imageUrl = asset('storage/products/'.$customer_wishlist->photoPrimary);
                        @endphp
                        
                        <tr class="cart_item">
                            <td class="cart-product-remove" width="2%">
                                <a href="{{ route('add-to-wishlist', [$customer_wishlist->id]) }}" class="remove" title="Remove this item"><i class="icon-trash2"></i></a>
                            </td>

                            <td width="15%">
                                <a href="{{ env('APP_URL') . '/book-details/' . $customer_wishlist->slug }}"><img src="{{ $imageUrl }}"></a>
                            </td>

                            <td>
                                <div class="product-title"><h3><a href="{{ env('APP_URL') . '/book-details/' . $customer_wishlist->slug }}">{{ $customer_wishlist->name }}</a></h3></div>
							    {!! ($customer_wishlist->discount_price > 0 ? '<div class="product-price"><del>' . number_format($customer_wishlist->price, 2) . '</del> <ins>' . number_format($customer_wishlist->discount_price, 2) . '</ins></div>' : '<div class="product-price"><ins>' . number_format($customer_wishlist->price, 2) . '</ins></div>') !!}
                                <div class="product-rating">
                                    @for($star = 1; $star <= 5; $star++)
                                        <i class="icon-star{{ $star <= App\Models\Ecommerce\ProductReview::getProductRating($customer_wishlist->id) ? '3' : '-empty' }}"></i>
                                    @endfor
                                </div>

                                <div class="mb-1">

                                    @if($customer_wishlist->inventory > 0)
                                        <a href="javascript:void(0);" class="btn btn-info text-white me-1" onclick="buynow('{{$customer_wishlist->id}}');">Buy Now</a>
                                        <a href="javascript:void(0);" class="btn bg-color text-white" onclick="add_to_cart('{{$customer_wishlist->id}}', '{{$customer_wishlist->name}}', '{{$customer_wishlist->photoPrimary}}');">Add To Bag <i class="icon-shopping-bag"></i></a>

                                        {{-- FOR BUY NOW --}}
                                        <div style="display: none;">
                                            <form id="buy-now-form{{$customer_wishlist->id}}" method="post" action="{{route('cart.buy-now')}}">
                                                @csrf
                                                <input type="text" name="product_id" value="{{ $customer_wishlist->id}}">
                                                <input type="hidden" id="price{{$customer_wishlist->id}}" name="price" value="{{$customer_wishlist->discount_price > 0 ? $customer_wishlist->discount_price : $customer_wishlist->price}}">
                                                <input type="text" name="qty" value="1">
                                            </form>
                                        </div>

                                        {{-- FOR ADD TO CART --}}
                                        <input type="hidden" id="remaining_stock{{$customer_wishlist->id}}" value="{{ $customer_wishlist->inventory }}">
                                        <input type="hidden" id="product_price{{$customer_wishlist->id}}" value="{{$customer_wishlist->discount_price > 0 ? $customer_wishlist->discount_price : $customer_wishlist->price}}">
                                    @else
                                        <a href="javascript:;" class="btn btn-secondary text-white">Out of Stock</a>
                                    @endif

                                </div>
                            </td>
                        </tr>

                        
                    @empty
                    @endforelse
                    
                </tbody>

            </table>

            {{ $customer_wishlists->links('theme.layouts.pagination') }}

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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    <script>

        function buynow(product){
            var qty   = 1;
            var remaining_stock = parseFloat($('#remaining_stock' + product).val());
            
            if(qty <= remaining_stock){
                $('#buy-now-form' + product).submit();
            }
            else{
                swal({
                    toast: true,
                    position: 'center',
                    title: "Warning!",
                    text: "We have insufficient inventory for this item.",
                    type: "warning",
                    showCancelButton: true,
                    timerProgressBar: true, 
                    closeOnCancel: false

                });
            }
        }

        function add_to_cart(product, name, image){

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            
            var qty   = 1;
            var price = parseFloat($('#product_price' + product).val());
            var remaining_stock = parseFloat($('#remaining_stock' + product).val());

            if(qty <= remaining_stock){

                $.ajax({
                    data: {
                        "product_id": product, 
                        "qty": qty,
                        "price": price,
                        "_token": "{{ csrf_token() }}",
                    },
                    type: "post",
                    url: "{{route('product.add-to-cart')}}",
                    success: function(returnData) {
                        $("#loading-overlay").hide();
                        if (returnData['success']) {

                            $('.top-cart-number').html(returnData['totalItems']);


                            var cartotal = parseFloat($('#input-top-cart-total').val());
                            var productotal = price*qty;
                            var newtotal = cartotal+productotal;

                            $('#top-cart-total').html('₱'+newtotal.toFixed(2));
                            $('#input-top-cart-total').val(newtotal);
                            
                            var cartItem = $('#top-cart-items').find('[data-product-id="' + product + '"]');
                            if (cartItem.length) {
                                // If the item already exists in the cart, update its quantity and price
                                var oldQty = parseFloat(cartItem.find('.top-cart-item-quantity').text().trim().replace('x ', ''));
                                var newQty = oldQty + qty;
                                var oldPrice = parseFloat(cartItem.find('.top-cart-item-price').text().trim().replace('₱', ''));
                                var productTotal = price * qty;
                                var newTotal = oldPrice + productTotal;

                                cartItem.find('.top-cart-item-quantity').text('x ' + newQty);
                                // cartItem.find('.top-cart-item-price').text('₱' + newTotal.toFixed(2));
                            } else {

                                $('#top-cart-items').append(
                                    '<div class="top-cart-item" data-product-id="' + product + '">' +
                                    '<div class="top-cart-item-image border-0">' +
                                    '<a href="#"><img src="{{ asset('storage/products/') }}/' + image + '" alt="Cart Image 1" /></a>' +
                                    '</div>' +
                                    '<div class="top-cart-item-desc">' +
                                    '<div class="top-cart-item-desc-title">' +
                                    '<a href="#" class="fw-medium">' + name + '</a>' +
                                    '<span class="top-cart-item-price d-block">₱' + price + '</span>' +
                                    '<div class="d-flex mt-2">' +
                                    '<a href="javascript:void()" onclick="location.reload();" class="fw-normal text-black-50 text-smaller"><u>Reload to Edit</u></a>' +
                                    '<a href="#" class="fw-normal text-black-50 text-smaller ms-3" onclick="top_remove_product(' + returnData['cartId'] + ');"><u>Remove</u></a>' +
                                    '</div>' +
                                    '</div>' +
                                    '<div class="top-cart-item-quantity">x ' + qty + '</div>' +
                                    '</div>' +
                                    '</div>'
                                );
                            }

                            $.notify("Product Added to your cart",{ 
                                position:"bottom right", 
                                className: "success" 
                            });

                        } else {
                            swal({
                                toast: true,
                                position: 'center',
                                title: "Warning!",
                                text: "We have insufficient inventory for this item.",
                                type: "warning",
                                showCancelButton: true,
                                timerProgressBar: true, 
                                closeOnCancel: false

                            });
                        }
                    }
                });

                $('#quantity').val(1);
                $('#remaining_stock').val(remaining_stock - qty);
            }
            else{
                swal({
                    toast: true,
                    position: 'center',
                    title: "Warning!",
                    text: "We have insufficient inventory for this item.",
                    type: "warning",
                    showCancelButton: true,
                    timerProgressBar: true, 
                    closeOnCancel: false

                });
            }
        }

        // function add_to_cart(product, name, image){

        //     $.ajaxSetup({
        //         headers: {
        //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //         }
        //     });

        //     var qty   = 1;
        //     var price = parseFloat($('#product_price' + product).val());
        //     var remaining_stock = parseFloat($('#remaining_stock' + product).val());

        //     if(qty <= remaining_stock){

        //         $.ajax({
        //             data: {
        //                 "product_id": product, 
        //                 "qty": qty,
        //                 "_token": "{{ csrf_token() }}",
        //             },
        //             type: "post",
        //             url: "{{route('product.add-to-cart')}}",
        //             success: function(returnData) {
        //                 $("#loading-overlay").hide();
        //                 if (returnData['success']) {

        //                     $('.top-cart-number').html(returnData['totalItems']);


        //                     var cartotal = parseFloat($('#input-top-cart-total').val());
        //                     var productotal = price*qty;
        //                     var newtotal = cartotal+productotal;

        //                     $('#top-cart-total').html('₱'+newtotal.toFixed(2));
        //                     var cartItem = $('#top-cart-items').find('[data-product-id="' + product + '"]');
        //                     if (cartItem.length) {
        //                         // If the item already exists in the cart, update its quantity and price
        //                         var oldQty = parseFloat(cartItem.find('.top-cart-item-quantity').text().trim().replace('x ', ''));
        //                         var newQty = oldQty + qty;
        //                         var oldPrice = parseFloat(cartItem.find('.top-cart-item-price').text().trim().replace('₱', ''));
        //                         var productTotal = price * qty;
        //                         var newTotal = oldPrice + productTotal;

        //                         cartItem.find('.top-cart-item-quantity').text('x ' + newQty);
        //                         // cartItem.find('.top-cart-item-price').text('₱' + newTotal.toFixed(2));
        //                     } else {

        //                         $('#top-cart-items').append(
        //                             '<div class="top-cart-item" data-product-id="' + product + '">' +
        //                             '<div class="top-cart-item-image border-0">' +
        //                             '<a href="#"><img src="{{ asset('storage/products/') }}/' + image + '" alt="Cart Image 1" /></a>' +
        //                             '</div>' +
        //                             '<div class="top-cart-item-desc">' +
        //                             '<div class="top-cart-item-desc-title">' +
        //                             '<a href="#" class="fw-medium">' + name + '</a>' +
        //                             '<span class="top-cart-item-price d-block">₱' + price + '</span>' +
        //                             '<div class="d-flex mt-2">' +
        //                             '<a href="javascript:void()" onclick="location.reload();" class="fw-normal text-black-50 text-smaller"><u>Reload to Edit</u></a>' +
        //                             '<a href="#" class="fw-normal text-black-50 text-smaller ms-3" onclick="top_remove_product(' + returnData['cartId'] + ');"><u>Remove</u></a>' +
        //                             '</div>' +
        //                             '</div>' +
        //                             '<div class="top-cart-item-quantity">x ' + qty + '</div>' +
        //                             '</div>' +
        //                             '</div>'
        //                         );
        //                     }

        //                     $.notify("Product Added to your cart",{ 
        //                         position:"bottom right", 
        //                         className: "success" 
        //                     });

        //                 } else {
        //                     swal({
        //                         toast: true,
        //                         position: 'center',
        //                         title: "Warning!",
        //                         text: "We have insufficient inventory for this item.",
        //                         type: "warning",
        //                         showCancelButton: true,
        //                         timerProgressBar: true, 
        //                         closeOnCancel: false

        //                     });
        //                 }
        //             }
        //         });

        //         $('#quantity').val(1);
        //         $('#remaining_stock'.product).val(remaining_stock - qty);
        //     }
        //     else{
        //         swal({
        //             toast: true,
        //             position: 'center',
        //             title: "Warning!",
        //             text: "We have insufficient inventory for this item.",
        //             type: "warning",
        //             showCancelButton: true,
        //             timerProgressBar: true, 
        //             closeOnCancel: false

        //         });
        //     }
        // }
        
    </script>
    
    <script>
        
        // for edit quantity
        function FormatAmount(number, numberOfDigits) {
            var amount = parseFloat(number).toFixed(numberOfDigits);
            var num_parts = amount.toString().split(".");
            num_parts[0] = num_parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");

            return num_parts.join(".");
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

        function plus_qty(id){
            var qty = parseFloat($('#quantity'+id).val())+1;

            if(parseInt($('#cart_maxorder'+id).val()) < 1){
                swal({
                    title: '',
                    text: 'Sorry. Currently, there is no sufficient stocks for the item you wish to order.',
                    icon: 'warning'
                });

                $('#quantity'+id).val($('#cart_prevqty'+id).val()-1);
                return false;
            }

            order_qty(id,qty);
        }

        function minus_qty(id){
            var qty = parseFloat($('#quantity'+id).val())-1;
            order_qty(id,qty);
        }

        function order_qty(id,qty){

            if(qty == 0){
                $('#quantity'+id).val(1).val();
                return false;
            }
            
            var price = $('#cartItemPrice'+id).val();
            total_price  = parseFloat(price)*parseFloat(qty);

            $('#order'+id+'_total_price').html('₱'+FormatAmount(total_price,2));
            $('#input_order'+id+'_product_total_price').val(total_price);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                data: { 
                    "quantity": qty, 
                    "orderID": id, 
                    "_token": "{{ csrf_token() }}",
                },
                type: "post",
                url: "{{route('cart.update')}}",
                
                success: function(returnData) {

                    $('#maxorder'+id).val(returnData.maxOrder);
                    $('.top-cart-number').html(returnData['totalItems']);
                    $('#prevqty'+id).val(qty);
                    // var promo_discount = parseFloat(returnData.total_promo_discount);

                    // let subtotal = 0;
                    // $(".input_product_total_price").each(function() {
                    //     if(!isNaN(this.value) && this.value.length!=0) {
                    //         subtotal += parseFloat(this.value);
                    //     }
                    // });

                    // $('#subtotal').val(subtotal);


                    // for the sidebar cart total
                    // var cartotal = parseFloat($('#input-top-cart-total').val());
                    // var productotal = price*qty;
                    // var newtotal = cartotal+total_price;
                    
                    // alert(cartotal);

                    // $('#input-top-cart-total').val(newtotal);
                    // $('#top-cart-total').html('₱'+newtotal.toFixed(2));
                    // 
                    
                    // resetCoupons();
                    cart_total();
                }
            });
        }

        function cart_total(){
            var couponTotalDiscount = parseFloat($('#coupon_total_discount').val());
            var promoTotalDiscount = 0;
            var subtotal = 0;

            $(".input_product_total_price").each(function() {
                if(!isNaN(this.value) && this.value.length!=0) {
                    subtotal += parseFloat(this.value);
                }
            });

            if(couponTotalDiscount == 0){
                $('#couponDiscountDiv').css('display','none');
            }

            // var totalDeduction = promoTotalDiscount + couponTotalDiscount;
            // var grandtotal = subtotal - totalDeduction;
            
            // $('#subtotal').html('₱'+FormatAmount(subtotal,2));

            $('#top-cart-total').val(subtotal);
            $('#top-cart-total').html('₱'+subtotal.toFixed(2));
        }
    </script>
@endsection

