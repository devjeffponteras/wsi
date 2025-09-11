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
                        <h3 class="text-primary">{{$page->name}}</h3>
                    </div>
                </div>
                <div class="col-12">
                    <div class="heading-block">
                        <h4>Categories</h4>
                    </div>
                </div>
                @foreach($brand->child_categories as $br)
                <div class="col-md-3 mb-4">
                    <div class="product-list border rounded">
                        <div class="product-image">                                
                            <a href="{{ route('product.sub-categories',$br->category_id) }}"><img src="{{ $br->product_category->image_url}}" alt="{{$br->product_category->name}}"></a>
                        </div>
                        <div class="product-desc text-center border-top">
                            <div class="product-desc px-3">{{$br->product_category->name}}</div>
                        </div>
                    </div>
                </div>
                @endforeach


                <div class="col-12">
                    <div class="heading-block">
                        <h4>Products</h4>
                    </div>
                </div>
                @forelse($products as $product)
                <div class="col-md-3 mb-4">
                    <div class="product-list border rounded"> 
                        <div class="product-image">
                            <a href="{{ route('product.details',$product->slug) }}"><img src="{{ asset('storage/products/'.$product->photoPrimary) }}" alt="{{$product->name}}"></a>
                        </div>
                        <div class="product-desc text-center border-top">
                            <div class="product-title"><h3><a href="{{ route('product.details',$product->slug) }}">{{$product->name}}</a></h3></div>
                            <div class="product-desc px-3">{!!$product->short_description!!}</div>
                        </div>
                    </div>
                </div>
                @empty
                    <div class="alert alert-success">
                        No products found.
                    </div>
                @endforelse
            </div>

            <div class="line"></div>
            {{ $products->links('theme.layouts.pagination') }}
        </div>
    </div>
</div>
@endsection

@section('pagejs')
@endsection
