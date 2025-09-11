<div class="modal fade my-coupons" id="couponModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">My Coupon</h4>
                <button type="button" class="btn-close btn-sm" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <div class="modal-body">

                <div id="collectibles"></div>

                {{-- @foreach($coupons as $coupon)
                
                    <table class="table small border rounded border-top-warning">
                        <tbody>
                            <tr>
                                <td>
                                    <h3 class="mb-0">{{ $coupon->name }}</h3>
                                    {{ $coupon->description }}
                                    <br><br>
                                    Code: {{ $coupon->coupon_code }}
                                    <br>Coupon requirements met, expect to save ₱217.00
                                    <br><br>
                                    <div class="text-secondary">
                                        <ul class="m-0 ms-3">
                                            <li>{{ $coupon->start_date }} - {{ $coupon->end_date }}</li>	
                                            <li>Applies to selected products</li>	
                                        </ul>
                                    </div>
                                </td>
                                <td width="10px">
                                    <label>
                                        <input type="radio" name="coupon" class="required" id="coupon{{ $coupon->id }}" autocomplete="off" data-price="30" value="Creta"> 
                                    </label>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                
                @endforeach --}}
                
            </div>
            {{-- <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Apply</button>
            </div> --}}
        </div>
    </div>
</div>


<div class="modal fade my-coupons" id="modalLoginLink" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-body">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Coupons</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    Login <a href="{{ route('customer-front.login') }}"><strong>here</strong></a> to view available coupons.
                </div>
            </div>
        </div>
    </div>
</div>
