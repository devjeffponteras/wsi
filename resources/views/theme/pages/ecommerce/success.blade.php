@extends('theme.main')

@section('content')
    
    <div class="container topmargin-lg bottommargin-lg">
        <div class="row">
            <div class="col-12 text-center">
                <i class="icon-thumbs-up icon-5x"></i>
                <h3 class="mb-2">Order Completed Successfully!</h3>
                <p>Thank you for ordering. We received your order and we will begin processing it soon.</p>
                <a href="{{ route('product.front.list') }}" class="btn text-white btn-info">Continue Buying</a>
                <a href="{{ route('profile.sales') }}" class="btn bg-color text-white me-1">Check my Order</a>
            </div>
        </div>
    </div>
    
@endsection

@section('pagejs')
@endsection
