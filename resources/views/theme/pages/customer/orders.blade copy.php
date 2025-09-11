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
            <h2>Transactions</h2>
            
            <table class="table table-hover">
                <thead>
                  <tr>
                    <th>Order #</th>
                    <th>Date</th>
                    <th>Amount</th>
                    <th>Delivery Status</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                    @forelse($sales as $sale)
                        @php
                            $balance = \App\Models\Ecommerce\SalesHeader::balance($sale->id);
                        @endphp
                        <tr>
                            <td>{{$sale->order_number}}</td>
                            <td>{{$sale->created_at}}</td>
                            <td>{{number_format($sale->gross_amount - $sale->discount_amount + $sale->ecredit_amount,2)}}</td>
                            <td>{{$sale->delivery_status}} @if(optional($sale->deliveries->last())->remarks) <span class="text-primary"> {{ ' | ' . ($sale->cancellation_request == 1 ? $sale->cancellation_reason : optional($sale->deliveries->last())->remarks)}} </span> @endif</td> 
                            <td>
                                <ul class="nav nav-pills">
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle p-0" data-bs-toggle="dropdown" href="#">
                                        <i class="icon-cog1"></i>
                                        </a>
                                        <ul class="dropdown-menu" role="menu">
                                            <a class="dropdown-item" href="#" onclick="view_items('{{$sale->id}}');">View Details</a>
                                            @if($sale->status != 'CANCELLED')
                                                @if($sale->payment_status == 'UNPAID')
                                                    <a href="{{route('my-account.pay-again',$sale->id)}}"  class="dropdown-item">Pay Now</a>
                                                @endif

                                                <a class="dropdown-item" href="#" onclick="view_deliveries('{{$sale->id}}');">View Deliveries</a>
                                                <a class="dropdown-item" href="#" onclick="cancel_unpaid_order('{{$sale->id}}')" @if($sale->delivery_status != "Pending" && $sale->delivery_status != "Pending" && $sale->delivery_status != "Delivered") hidden @endif>Cancel Order</a>
                                            @endif
                                        </ul>
                                    </li>
                                </ul> 
                            </td>
                        </tr>
                        @php
                            $modals .= '
                                <div class="modal fade" id="delivery'.$sale->id.'" tabindex="-1" role="dialog" aria-labelledby="centerModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myModalLabel">'.$sale->order_number.'</h4>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true">&times;</button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="transaction-status">
                                                </div>
                                                <div class="gap-20"></div>
                                                <div class="table-modal-wrap">
                                                    <table class="table table-md table-modal">
                                                        <thead>
                                                            <tr>
                                                                <th>Date and Time</th>
                                                                <th>Status</th>
                                                                <th>Remarks</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>';
                                                            if($sale->deliveries){
                                                                foreach($sale->deliveries as $delivery){
                                                                $modals.='
                                                                    <tr>
                                                                        <td>'.$delivery->created_at.'</td>
                                                                        <td>'.$delivery->status.'</td>
                                                                        <td>'.$delivery->remarks.'</td>
                                                                    </tr>
                                                                ';
                                                                }
                                                            }
                                                        $modals .='
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="gap-20"></div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal fade bs-example-modal-centered" id="detail'.$sale->id.'" tabindex="-1" role="dialog" aria-labelledby="centerModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myModalLabel">'.$sale->order_number.'</h4>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true">&times;</button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="transaction-status">
                                                    <span><strong>Order Date:</strong> '.$sale->created_at.'</span><br>
                                                    <span><strong>Payment Status:</strong> '.$sale->payment_status.'</span><br>
                                                    <span><strong>Delivery Courier:</strong> '.strtoupper($sale->delivery_type).'</span><br>
                                                    <span><strong>Delivery Status:</strong> '.$sale->delivery_status.'</span><br>
                                                    <span><strong>Delivery Remarks:</strong> '. ($sale->cancellation_request == 1 ? $sale->cancellation_reason . ' / ' . $sale->cancellation_remarks : optional($sale->deliveries->last())->remarks) .'</span><br>
                                                    <span><strong>Delivery Tracking #:</strong> '.$sale->delivery_tracking_number.'</span><br>
                                                </div>
                                                <div class="gap-20"></div>
                                                <br><br>
                                                <div class="table-modal-wrap">
                                                    <table class="table table-md table-modal" style="font-size:12px !important;">
                                                        <thead>
                                                            <tr>
                                                                <th>Item</th>
                                                                <th>Qty</th>
                                                                <th>Price</th>
                                                                <th>Total</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>';

                                                            $total_qty = 0;
                                                            $total_sales = 0;

                                                        foreach($sale->items as $item){

                                                            $total_qty += $item->qty;
                                                            $total_sales += $item->qty * $item->price;
                                                            $modals.='
                                                            <tr>
                                                                <td>'.$item->product_name.'</td>
                                                                <td>'.$item->qty.'</td>
                                                                <td>'.number_format($item->price,2).'</td>
                                                                <td>'.number_format(($item->price * $item->qty),2).'</td>
                                                            </tr>';
                                                        }


                                                        $modals.='
                                                        <tr style="font-weight:bold;">
                                                            <td>Sub total</td>
                                                            <td>'.number_format($total_qty,2).'</td>
                                                            <td>&nbsp;</td>
                                                            <td>'.number_format($total_sales,2).'</td>
                                                        </tr>

                                                        <tr style="font-weight:bold;">
                                                            <td colspan="3">Coupon Discount</td>
                                                            <td>- '.number_format($sale->discount_amount,2).'</td>
                                                        </tr>

                                                        <tr style="font-weight:bold;">
                                                            <td colspan="3">Coupons</td>
                                                            <td>';

                                                                foreach($sale->coupons as $couponSale) {
                                                                    $modals .= '<i>'.$couponSale->details->name.'</i><br>';
                                                                }

                                                $modals .='</td>
                                                        </tr>

                                                        <tr style="font-weight:bold;">
                                                            <td colspan="3">Delivery Fee</td>
                                                            <td>'.number_format(($sale->delivery_fee_amount - $sale->delivery_fee_discount), 2).'</td>
                                                        </tr>

                                                        <tr style="font-weight:bold;">
                                                            <td colspan="3">Grand total</td>

                                                            <td>'.number_format($total_sales - $sale->discount_amount + ($sale->delivery_fee_amount - $sale->delivery_fee_discount),2).'</td>
                                                        </tr>

                                                        <tr style="font-weight:bold;">
                                                            <td colspan="3">E-Wallet Payment</td>
                                                            <td>'.number_format($sale->ecredit_amount,2).'</td>
                                                        </tr>

                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="gap-20"></div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            ';
                        @endphp

                    @empty
                        <tr>
                            <td colspan="5">No orders found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            {{ $sales->links('theme.layouts.pagination') }}
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
                    <p>You are about to cancel this order. If you wish to continue, please enter a reason for cancelling this order. </p>
                    <select class="form-control" name="reason" required>
                        <option value="Change of Delivery Address">Change of Delivery Address</option>
                        <option value="Change / Combine Order">Change / Combine Order</option>
                        <option value="Duplicate Order">Duplicate Order</option>
                        <option value="Change of Mind">Change of Mind</option>
                        <option value="Decided on another Product">Decided on another Product</option>
                    </select>
                    <input type="hidden" id="orderid" name="orderid">
                    <br>
                    <label>Reason <span class="text-danger">*</span></label>
                    <textarea class="form-control" name="remarks" rows="5" required></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Continue</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- <div class="modal fade bs-example-modal-centered" id="cancel_order" tabindex="-1" role="dialog" aria-labelledby="centerModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <form action="{{ route('my-account.cancel-order') }}" method="post">
                @csrf
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Confirmation</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to cancel this order?</p>
                    <input type="hidden" id="orderid" name="orderid">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Continue</button>
                </div>
            </form>
        </div>
    </div>
</div> --}}


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

