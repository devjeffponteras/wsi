@extends('theme.main')

@section('pagecss')
@endsection

@section('content')
<div class="container topmargin-lg bottommargin-lg">
    <div class="row">
        <div class="col-lg-3">
            <span onclick="openNav()" class="d-lg-none mb-4 btn btn-primary btn-bg"><i class="icon-list-alt"></i></span>

            <div id="mySidenav">
                <a href="javascript:void(0)" class="closebtn d-lg-none" onclick="closeNav()">&times;</a>

                <div class="heading-block">
                    <h3>Search</h3>
                </div>
                <form action="{{ route('search-product') }}" method="GET">
                    <div class="input-group pb-5">
                        <input type="text" class="form-control" name="keyword" placeholder="Search Product" aria-label="Search Product" aria-describedby="button-addon2" value="{{$searchtxt}}" />
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="submit" id="button-addon2"><span class="icon-search"></span></button>
                        </div>
                    </div>
                </form>

                @include('theme.layouts.components.product-categories')
            </div>
        </div>

        <div class="col-lg-9">

            <div class="row">

                <div class="col-12">
                    <div class="heading-block">
                        <h3>Search Products</h3>
                    </div>
                </div>

                <div class="col-12">
                    @if(count($products) > 0)
                        <div class="style-msg successmsg">
                            <div class="sb-msg"><i class="icon-thumbs-up"></i><strong>Woo hoo!</strong> We found <strong>(<span>{{ count($products) }}</span>)</strong> matching results.</div>
                        </div>
                    @else
                        <div class="style-msg2 errormsg">
                            <div class="msgtitle p-0 border-0">
                                <div class="sb-msg">
                                    <i class="icon-thumbs-up"></i><strong>Uh oh</strong>! <span><strong>{{ app('request')->input('keyword') }}</strong></span> you say? Sorry, no results!
                                </div>
                            </div>
                            <div class="sb-msg">
                                <ul>
                                    <li>Check the spelling of your keywords.</li>
                                    <li>Try using fewer, different or more general keywords.</li>
                                </ul>
                            </div>
                        </div>
                    @endif
                </div>
                
                @foreach($products as $product)
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
