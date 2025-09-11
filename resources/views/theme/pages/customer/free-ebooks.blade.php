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
            <h2>Free E-books</h2>
            
            <div class="form-group d-flex">
                <label for="inputState" class="col-form-label me-2">Sort by</label>
                <div class="">
                    <select id="inputState" class="form-select">
                        <option selected>Choose...</option>
                        <option>A to Z</option>
                        <option>Z to A</option>
                        <option>By date</option>
                    </select>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-2">
                    <div class="grid-inner">
                        <div class="product-image h-translate-y all-ts">
                            <a href="demo-articles-single.html"><img src="images/products/image1.png" alt="Image 1"></a>
                        </div>
                        <div class="product-desc py-0">
                            <div class="product-title"><h3><a href="demo-articles-single.html">Our Dreams</a></h3></div>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-2">
                    <div class="grid-inner">
                        <div class="product-image h-translate-y all-ts">
                            <a href="demo-articles-single.html"><img src="images/products/image1.png" alt="Image 1"></a>
                        </div>
                        <div class="product-desc py-0">
                            <div class="product-title"><h3><a href="demo-articles-single.html">Our Dreams</a></h3></div>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-2">
                    <div class="grid-inner">
                        <div class="product-image h-translate-y all-ts">
                            <a href="demo-articles-single.html"><img src="images/products/image1.png" alt="Image 1"></a>
                        </div>
                        <div class="product-desc py-0">
                            <div class="product-title"><h3><a href="demo-articles-single.html">Our Dreams</a></h3></div>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-2">
                    <div class="grid-inner">
                        <div class="product-image h-translate-y all-ts">
                            <a href="demo-articles-single.html"><img src="images/products/image1.png" alt="Image 1"></a>
                        </div>
                        <div class="product-desc py-0">
                            <div class="product-title"><h3><a href="demo-articles-single.html">Our Dreams</a></h3></div>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-2">
                    <div class="grid-inner">
                        <div class="product-image h-translate-y all-ts">
                            <a href="demo-articles-single.html"><img src="images/products/image1.png" alt="Image 1"></a>
                        </div>
                        <div class="product-desc py-0">
                            <div class="product-title"><h3><a href="demo-articles-single.html">Our Dreams</a></h3></div>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-2">
                    <div class="grid-inner">
                        <div class="product-image h-translate-y all-ts">
                            <a href="demo-articles-single.html"><img src="images/products/image1.png" alt="Image 1"></a>
                        </div>
                        <div class="product-desc py-0">
                            <div class="product-title"><h3><a href="demo-articles-single.html">Our Dreams</a></h3></div>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-2">
                    <div class="grid-inner">
                        <div class="product-image h-translate-y all-ts">
                            <a href="demo-articles-single.html"><img src="images/products/image1.png" alt="Image 1"></a>
                        </div>
                        <div class="product-desc py-0">
                            <div class="product-title"><h3><a href="demo-articles-single.html">Our Dreams</a></h3></div>
                        </div>
                    </div>
                </div>
            </div>
            
            <ul class="pagination mt-5">
                <li class="page-item"><a class="page-link" href="#" aria-label="Previous"> <span aria-hidden="true">&laquo;</span></a></li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">4</a></li>
                <li class="page-item"><a class="page-link" href="#">5</a></li>
                <li class="page-item"><a class="page-link" href="#" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>
            </ul>
            
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

