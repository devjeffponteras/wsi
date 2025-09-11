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

                @foreach($brands as $brand)
                <div class="col-md-3 mb-4">
                    <div class="product-list border rounded">
                        <div class="product-image">
                            <a href="{{ route('brand.product-category-list',$brand->id)}}"><img src="{{$brand->image_url}}" alt="{{$brand->name}}"></a>
                        </div>
                        <div class="product-desc text-center border-top">
                            <div class="product-desc px-3">{{$brand->description}}</div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="line"></div>
            {{ $brands->links('theme.layouts.pagination') }}
        </div>
    </div>
</div>



@endsection

@section('pagejs')
@endsection
