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
            <h2>E-Credit</h2>
            
            <p>Fusce ac justo lobortis, consectetur metus vel, varius erat. Cras a ornare nisl. Quisque congue dictum nisl, ac condimentum tortor mattis sed. Quisque erat ligula, fringilla sed mollis at, aliquet at diam. Donec bibendum leo vel vulputate viverra. </p>
            
            <p>Your current balance</p>
            <h3>₱ {{ auth()->user()->ecredits }}</h3>
            
            <a href="{{ env('APP_URL') }}/contact-us" target="_blank" class="button button-border button-rounded ms-0 button-small">Add Credits</a>
            
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

