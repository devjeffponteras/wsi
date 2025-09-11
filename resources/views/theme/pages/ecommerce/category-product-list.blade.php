@extends('theme.main')

@section('pagecss')
@endsection

@section('content')
<div class="container content-wrap">
    <div class="row">
        <div class="col-lg-3">
            <span onclick="openNav()" class="d-lg-none mb-4 btn btn-primary btn-bg"><i class="icon-list-alt"></i></span>

            <div id="mySidenav">
                <a href="javascript:void(0)" class="closebtn d-lg-none" onclick="closeNav()">&times;</a>

                @include('theme.layouts.product-search-form')

                @include('theme.layouts.product-categories-menu')
            </div>
        </div>

        <div class="col-lg-9">

            <div class="row">

                <div class="col-12">
                    <div class="heading-block">
                        <h3>{{$page->name}}</h3>
                    </div>
                </div>

                @foreach($products as $product)
                <div class="col-md-3 mb-4">
                    <div class="product-list border rounded">
                        @php
                            $has_subCat_with_product = App\Models\Ecommerce\ProductCategory::has_subCategory_with_products($product->category_id);
                        @endphp

                        @if($has_subCat_with_product > 0)
                            <div class="product-image">                                
                                <a href="{{ route('category.product-list',$product->category->slug) }}"><img src="{{ asset('storage/products/'.$product->photoPrimary) }}" alt="{{$product->name}}"></a>
                            </div>
                            <div class="product-desc text-center border-top">
                                <div class="product-title"><h3><a href="#">{{$product->name}}</a></h3></div>
                                <div class="product-desc px-3">{!!$product->short_description!!}</div>
                            </div>
                        @else
                            <div class="product-image">
                                <a href="{{ route('product.details',$product->slug) }}"><img src="{{ asset('storage/products/'.$product->photoPrimary) }}" alt="{{$product->name}}"></a>
                            </div>
                            <div class="product-desc text-center border-top">
                                <div class="product-title"><h3><a href="#">{{$product->name}}</a></h3></div>
                                <div class="product-desc px-3">{!!$product->short_description!!}</div>
                            </div>
                        @endif 
                    </div>
                </div>
                @endforeach
            </div>

            <div class="line"></div>
            {{ $products->links('theme.layouts.pagination') }}
        </div>
    </div>
</div>
@endsection

@section('pagejs')
@endsection
