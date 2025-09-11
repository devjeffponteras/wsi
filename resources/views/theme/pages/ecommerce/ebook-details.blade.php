@extends('theme.main')

@section('pagecss')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
@endsection

@section('content')
<div class="container topmargin-lg bottommargin-lg">
    <div class="row">
        <span onclick="closeNav()" class="dark-curtain"></span>
        <div class="col-lg-12 col-md-5 col-sm-12">
            <span onclick="openNav()" class="button button-small button-circle border-bottom ms-0 text-initial nols fw-normal noleftmargin d-lg-none mb-4"><span class="icon-chevron-left me-2 color-2"></span> Category</span>
        </div>
        <div class="col-lg-3 pe-lg-4">
            <div class="tablet-view">
                <a href="javascript:void(0)" class="closebtn d-block d-lg-none" onclick="closeNav()">&times;</a>

                <div class="card border-0">
                    <div class="border-0 mb-5">
                        <h3 class="mb-3">Search</h3>
                        <div class="search">
                            <form class="mb-0" action="{{ route('search-product') }}" method="get">
                                <div class="searchbar">
                                    <input type="text" name="keyword" class="form-control form-input form-search" placeholder="Search Product" aria-label="Search Product" aria-describedby="button-addon1" />
                                    <button class="form-submit-search" type="submit" name="submit">
                                        <i class="icon-line-search"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    
                    <h3>Category</h3>
                    <div class="side-menu">
                        <ul class="mb-0 pb-0">
                            @foreach($categories as $category)
                                <li class="active"><a href="#"><div>{{$category->name}}</div></a></li>
                            @endforeach

                            <li>
                                <a href="#"><div>Corporate Governance</div></a>
                                <ul>
                                    <li><a href="#"><div>Annual Report</div></a></li>
                                    <li><a href="#"><div>Manual on Corporate Governance</div></a></li>
                                    <li><a href="#"><div>MLPP</div></a></li>
                                    <li><a href="#"><div>RPT</div></a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-9">
            <div class="row bottommargin-sm">
                <div class="col-md-6">

                    <!-- Product Single - Gallery
                    ============================================= -->
                    <div class="product-image">
                        @if(count($product->photos))
                            <div class="fslider" data-pagi="false" data-arrows="false" data-thumbs="true">
                                <div class="flexslider">
                                    <div class="slider-wrap" data-lightbox="gallery">
                                        @foreach($product->photos as $photo)
                                        <div class="slide" data-thumb="{{ asset('storage/products/'.$photo->path) }}"><a href="{{ asset('storage/products/'.$photo->path) }}" title="{{$product->name}}" data-lightbox="gallery-item"><img src="{{ asset('storage/products/'.$photo->path) }}" alt="{{$product->name}}"></a></div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @else
                            <a href="{{ route('product.details',$product->slug) }}"><img src="{{ asset('storage/products/'.$product->photoPrimary) }}" alt="{{$product->name}}"></a>
                        @endif

                    </div><!-- Product Single - Gallery End -->

                </div>

                <div class="col-md-6 product-desc">
                    <h3 class="mb-2">{{$product->name}}</h3>
                    <h4>by: {{ $product->author ?? 'Anonymous' }}</h4>
                    
                    <div class="article-meta">                                  
                        <div class="entry-meta mb-3">
                        
                            @php($is_favorite = \App\Models\Ecommerce\CustomerFavorite::isFavorite($product->id))

                            <ul class="small">
                                <li>SKU: {{$product->sku}}</li>
                                <li>Book Type: {{$product->book_type}}</li>
                                <li><i class="icon-folder-open"></i> <a href="#">{{$product->category->name}}</a></li>
                                <li><a href="{{ route('add-to-favorites', [$product->id]) }}" class="me-1 float-end text-danger" title="{{ $is_favorite ? 'Remove from Favorites' : 'Add to Favorites' }}"><i class="{{ $is_favorite ? 'icon-heart icon' : 'icon-heart-empty icon' }}"></i></a></li>
                            </ul>
                        

                        </div>
                        <hr class="mb-4" />
                    </div>
                    
                    <div class="product-rating">
                        @for($star = 1; $star <= 5; $star++)
                            <i class="icon-star{{ $star <= App\Models\Ecommerce\ProductReview::getProductRating($product->id) ? '3' : '-empty' }}"></i>
                        @endfor
                    </div>
                    
                    {!! ($product->ebook_discount_price > 0 ? '<ins class="h1 text-decoration-none">₱' . number_format($product->ebook_discount_price, 2) . '</ins> <del>₱' . number_format($product->ebook_price, 2) . '</del>' : '<ins class="h1 text-decoration-none">₱' . number_format($product->ebook_price, 2) . '</ins>') !!}
                    <input type="hidden" id="product_price" value="{{$product->ebook_discount_price > 0 ? $product->ebook_discount_price : $product->ebook_price}}">
                    
                    <!-- Product Single - Short Description
                    ============================================= -->
                    
                    <table class="table">
                      <tbody>
                        <tr>
                          <td colspan="2"><span class="bg-success text-white rounded p-1">E-book</span></td>
                        </tr>
                        <tr>
                          <td width="35%">Category:</td>
                          <td>{{$product->category->name}}</td>
                        </tr>
                        
                        <tr hidden>
                          <td>Quantity:</td>
                          <td>
                            <form class=" mb-0 d-flex justify-content-between align-items-center" method="post" enctype='multipart/form-data'>
                                <div class="quantity clearfix">
                                    <input type="button" value="-" class="minus" onclick="minus_qty();">
                                    <input type="number" step="1" min="1" name="quantity" id="quantity" value="1" title="Qty" class="qty" readonly/>
                                    <input type="button" value="+" class="plus" onclick="plus_qty();">
                                </div>
                            </form>
                          </td>
                        </tr>
                      </tbody>
                    </table>

                    
                    <td class="cart-product-quantity" style="display:none;">
                        <div class="quantity">

                            {{-- <input type="hidden" id="orderID" value="{{$product->id}}"> --}}
                            {{-- <input type="hidden" id="prevqty" value="{{ $product->qty }}"> --}}
                            <input type="hidden" id="maxorder" value="9999999">
                        </div>
                    </td>

                    
                    <div class="d-flex justify-content-evenly align-content-stretch mb-1">
                        @if(Auth::check())
                        <a href="javascript:;" class="btn btn-info text-white vw-100 me-1" onclick="buynow();">Buy Now</a>
                        @endif
                        <a href="javascript:;" class="btn bg-color text-white vw-100" onclick="add_to_cart('{{$product->id}}');">Add To Bag <i class="icon-shopping-bag"></i></a>
                    </div>

                    
                    <!-- Product Single - Short Description End -->
                    {{-- @if($product->inventory > 0)
                    <div class="d-flex justify-content-evenly align-content-stretch mb-1">
                        @if(Auth::check())
                        <a href="javascript:;" class="btn btn-info text-white vw-100 me-1" onclick="buynow();">Buy Now</a>
                        @endif
                        <a href="javascript:;" class="btn bg-color text-white vw-100" onclick="add_to_cart('{{$product->id}}');">Add To Bag <i class="icon-shopping-bag"></i></a>
                    </div>
                    @else
                        @if(Auth::check())

                            @php($is_wishlist = \App\Models\Ecommerce\CustomerWishlist::isWishlist($product->id))

                            <div class="d-flex justify-content-evenly align-content-stretch mb-1">
                                <a href="{{ route('add-to-wishlist', [$product->id]) }}" class="btn {{ $is_wishlist ? 'btn-info' : 'btn-secondary' }} text-white vw-100">{{ $is_wishlist ? 'Remove from Wishlist' : 'Add To Wishlist' }} <i class="icon-star"></i></a>
                            </div>
                        @endif
                    @endif --}}
                    
                    {{-- FOR EBOOK
					@if(\App\Models\Ecommerce\Product::has_ebook($product->id))
                        <div class="d-flex justify-content-evenly align-content-stretch mb-1">
                            <a href="javascript:;" class="btn btn-success text-white vw-100" onclick="add_to_cart('{{$product->id}}');"> Purchase E-book for {{ number_format($product->ebook_discount_price, 2) }} <i class="icon-star"></i></a>
                        </div>
                    @endif --}}

                    @if(\App\Models\Ecommerce\Product::has_bundle($product->id))

                        <div class="share mt-3">
                            <h5>Also Available in bundle:</h5>

                            <div id="oc-events" class="owl-carousel events-carousel carousel-widget" data-pagi="true" data-items-md="1" data-items-lg="1" data-items-xl="1">

                                @foreach(\App\Models\Ecommerce\Product::getBundle($product->id) as $bundle)

                                    <div class="oc-item">
                                        <div class="entry mb-3">
                                            <div class="grid-inner row g-0">
                                                <div class="col-md-5 mb-md-0">
                                                    <div class="product-image">
                                                        <img src="{{ asset('storage/products/'.$bundle->photoPrimary) }}" />
                                                    </div>
                                                </div>
                                                <div class="col-md-7 ps-md-4">
                                                    <h3 class="mb-2">{{ $bundle->name }}</h3>
                                                    {!! ($bundle->ebook_discount_price > 0 ? '<ins class="h1 text-decoration-none">₱' . number_format($bundle->ebook_discount_price, 2) . '</ins> <del>₱' . number_format($bundle->ebook_price, 2) . '</del>' : '<ins class="h1 text-decoration-none">₱' . number_format($bundle->ebook_price, 2) . '</ins>') !!}

                                                    @if($bundle->inventory > 0)
                                                        <div class="d-flex justify-content-evenly align-content-stretch mb-1">
                                                            @if(Auth::check())
                                                            <a href="javascript:;" class="btn btn-info text-white vw-100 me-1" onclick="buynow();">Buy Now</a>
                                                            @endif
                                                            <a href="javascript:;" class="btn bg-color text-white vw-100" onclick="add_to_cart('{{$bundle->id}}');">Add To Bag <i class="icon-shopping-bag"></i></a>
                                                        </div>
                                                    @else
                                                        @if(Auth::check())
                                                            @php($is_wishlist = \App\Models\Ecommerce\CustomerWishlist::isWishlist($bundle->id))

                                                            <div class="d-flex justify-content-evenly align-content-stretch mb-1">
                                                                {{-- <a href="#" class="btn btn-secondary text-white vw-100">Add To Wishlist <i class="icon-star"></i></a> --}}
                                                                <a href="{{ route('add-to-wishlist', [$bundle->id]) }}" class="btn {{ $is_wishlist ? 'btn-info' : 'btn-secondary' }} text-white vw-100">{{ $is_wishlist ? 'Remove from Wishlist' : 'Add To Wishlist' }} <i class="icon-star"></i></a>
                                                            </div>
                                                        @endif
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                @endforeach
                                
                            </div>


                            {{-- <div class="row">
                                <div class="col-md-5">
                                    <div class="product-image">
                                        <img src="{{ asset('storage/products/'.$product->photoPrimary) }}" />
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <h3 class="mb-2">{{ $product->name }} bundle</h3>
                                    {!! ($product->ebook_discount_price > 0 ? '<ins class="h1 text-decoration-none">₱' . number_format($product->ebook_discount_price, 2) . '</ins> <del>₱' . number_format($product->ebook_price, 2) . '</del>' : '<ins class="h1 text-decoration-none">₱' . number_format($product->ebook_price, 2) . '</ins>') !!}
                                    
                                    @if($product->inventory > 0)
                                        <div class="d-flex justify-content-evenly align-content-stretch mb-1">
                                            <a href="#" class="btn btn-info text-white vw-100 me-1">Buy Now</a>
                                            <a href="#" class="btn bg-color text-white vw-100">Add To Bag</a>
                                        </div>
                                    @else
                                        @if(Auth::check())
                                            <div class="d-flex justify-content-evenly align-content-stretch mb-1">
                                                <a href="#" class="btn btn-secondary text-white vw-100">Add To Wishlist <i class="icon-star"></i></a>
                                            </div>
                                        @endif
                                    @endif
                                </div>
                            </div> --}}
                        </div>

                    @endif

                    
                    <!-- Product Single - Share
                    ============================================= -->
                    <div class="share mt-3">
                        <h5>Also Available at:</h5>
                        <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{ route('product.details',$product->slug) }}" class="social-icon si-rounded si-facebook">
                            <i class="icon-facebook"></i>
                            <i class="icon-facebook"></i>
                        </a>
                        <a target="_blank" href="https://twitter.com/intent/tweet?url={{ route('product.details',$product->slug) }}&text=text to share" class="social-icon si-rounded si-twitter">
                            <i class="icon-twitter"></i>
                            <i class="icon-twitter"></i>
                        </a>
                        <a target="_blank" href="https://www.linkedin.com/uas/login?session_redirect=https://www.linkedin.com/shareArticle?mini=true&url={{ route('product.details',$product->slug) }}" class="social-icon si-rounded si-linkedin">
                            <i class="icon-linkedin"></i>
                            <i class="icon-linkedin"></i>
                        </a>
                        <div style="clear:both;"></div>
                    </div><!-- Product Single - Share End -->

                </div>
                
                <div class="col-12">
                    <div class="tabs clearfix mt-5" id="tab-1">

                        <ul class="tab-nav clearfix">
                            <li><a href="#tabs-1"><i class="icon-align-justify2"></i><span class="d-none d-md-inline-block"> Description</span></a></li>
                            <li><a href="#tabs-2"><i class="icon-info-sign"></i><span class="d-none d-md-inline-block"> Preview</span></a></li>
                            <li><a href="#tabs-3"><i class="icon-star3"></i><span class="d-none d-md-inline-block"> Reviews ({{ $product_reviews->where('status', 1)->count() }})</span></a></li>
                        </ul>

                        <div class="tab-container border-bottom">

                            <div class="tab-content clearfix pb-4" id="tabs-1">
                                <table class="table table-hover">
                                  <tbody>
                                    <tr>
                                      <td width="35%">Size:</td>
                                      <td>{{$product->size}}</td>
                                    </tr>
                                    <tr>
                                      <td>Weight:</td>
                                      <td>{{$product->weight}} grams</td>
                                    </tr>
                                    <tr>
                                      <td>Texture:</td>
                                      <td>{{$product->texture}}</td>
                                    </tr>
                                  </tbody>
                                </table>
                            </div>
                            <div class="tab-content clearfix" id="tabs-2">
                                {!!$product->description!!}
                            </div>

                            <div class="tab-content clearfix" id="tabs-3">
                                <div id="reviews" class="clearfix">

                                    <ol class="commentlist clearfix">

                                        @forelse($product_reviews as $product_review)
                                            @if($product_review->status == 1)
                                                <li class="comment even thread-even depth-1" id="li-comment-1">
                                                    <div id="comment-1" class="comment-wrap clearfix">

                                                        <div class="comment-meta">
                                                            <div class="comment-author vcard">
                                                                <span class="comment-avatar clearfix">
                                                                <img alt='Image' src='https://0.gravatar.com/avatar/ad516503a11cd5ca435acc9bb6523536?s=60' height='60' width='60' /></span>
                                                            </div>
                                                        </div>

                                                        <div class="comment-content clearfix">
                                                            <div class="comment-author">{{ $product_review->name }}<span><a href="#" title="Permalink to this comment">{{ Setting::date_for_listing($product_review->updated_at) }}</a></span></div>
                                                            
                                                            <p>{{ $product_review->comment }}</p>

                                                            @if(Auth::user())
                                                                <a data-bs-toggle="modal" data-bs-target="#editReviewFormModal{{ $product_review->id }}" {{ Auth::user()->is_an_admin() ? '' : 'hidden' }}><i class="fa fa-sm fa-edit"></i></a>
                                                            @endif

                                                            <div class="review-comment-ratings">
                                                                @for($star = 1; $star <= 5; $star++)
                                                                    <i class="icon-star{{ $star <= $product_review->rating ? '3' : '-empty' }}"></i>
                                                                @endfor
                                                            </div>
                                                        </div>

                                                        <div class="clear"></div>

                                                    </div>
                                                </li>
                                            @endif

                                            <div class="modal fade" id="editReviewFormModal{{ $product_review->id }}" tabindex="-1" role="dialog" aria-labelledby="reviewFormModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title" id="reviewFormModalLabel">Edit Review</h4>
                                                            <button type="button" class="btn-close btn-sm" data-bs-dismiss="modal" aria-hidden="true"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form class="row mb-0" id="editReviewForm" action="{{ route('product-review.update', $product_review->id) }}" method="post">
                                                            @method('PUT')
                                                            @csrf
                                                                <div class="col-6 mb-3">
                                                                    <label for="name">Name <small>*</small></label>
                                                                    <div class="input-group">
                                                                        <div class="input-group-text"><i class="icon-user"></i></div>
                                                                        <input type="text" id="name" name="name" value="{{ $product_review->name  }}" class="form-control required" readonly/>
                                                                    </div>
                                                                </div>
    
                                                                <div class="col-6 mb-3">
                                                                    <label for="email">Email <small>*</small></label>
                                                                    <div class="input-group">
                                                                        <div class="input-group-text">@</div>
                                                                        <input type="email" id="email" name="email" value="{{ $product_review->email }}" class="required email form-control" readonly/>
                                                                    </div>
                                                                </div>
    
                                                                <div class="w-100"></div>
    
                                                                <div class="col-12 mb-3">
                                                                    <label for="rating">Rating</label>
                                                                    <select id="rating" name="rating" class="form-select" disabled required>
                                                                        <option value="">-- Select One --</option>
                                                                        <option value="1" {{ $product_review->rating == 1 ? 'selected' : '' }}>1</option>
                                                                        <option value="2" {{ $product_review->rating == 2 ? 'selected' : '' }}>2</option>
                                                                        <option value="3" {{ $product_review->rating == 3 ? 'selected' : '' }}>3</option>
                                                                        <option value="4" {{ $product_review->rating == 4 ? 'selected' : '' }}>4</option>
                                                                        <option value="5" {{ $product_review->rating == 5 ? 'selected' : '' }}>5</option>
                                                                    </select>
                                                                </div>
    
                                                                <div class="w-100"></div>
    
                                                                <div class="col-12 mb-3">
                                                                    <label for="comment">Comment <small>*</small></label>
                                                                    <textarea class="required form-control" id="comment" name="comment" rows="6" cols="30" required>{{ $product_review->comment }}</textarea>
                                                                </div>
    
                                                                {{-- hidden inputs --}}
                                                                <input type="text" name="product_id" value="{{ $product->id }}" hidden readonly/>
                                                                <input type="text" name="product_name" value="{{ $product->name }}" hidden readonly/>
    
    
                                                                <div class="col-12">
                                                                    <button class="button button-3d m-0" type="submit" id="submit" name="submit" value="submit">Edit Review</button>
                                                                </div>
    
                                                            </form>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        </div>
                                                    </div><!-- /.modal-content -->
                                                </div><!-- /.modal-dialog -->
                                            </div><!-- /.modal -->
                                        @empty
                                            <div class="col-12 text-center mt-4">There are no ratings for this product yet.</div>
                                        @endforelse

                                    </ol>

                                    <!-- Modal Reviews
                                    ============================================= -->
                                    <a href="#" class="btn bg-color text-white mb-3 float-end" data-bs-toggle="modal" data-bs-target="#reviewFormModal" {{ Auth::user() ? '' : 'hidden' }}>Add a Review</a>

                                    @if(auth()->check())
                                        <div class="modal fade" id="reviewFormModal" tabindex="-1" role="dialog" aria-labelledby="reviewFormModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="reviewFormModalLabel">Submit a Review</h4>
                                                        <button type="button" class="btn-close btn-sm" data-bs-dismiss="modal" aria-hidden="true"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form class="row mb-0" id="reviewForm" action="{{ route('product-review.store') }}" method="post">
                                                        @csrf
                                                            <div class="col-6 mb-3">
                                                                <label for="name">Name <small>*</small></label>
                                                                <div class="input-group">
                                                                    <div class="input-group-text"><i class="icon-user"></i></div>
                                                                    <input type="text" id="name" name="name" value="{{ Auth::user()->firstname .' '. Auth::user()->lastname  }}" class="form-control required" readonly/>
                                                                </div>
                                                            </div>

                                                            <div class="col-6 mb-3">
                                                                <label for="email">Email <small>*</small></label>
                                                                <div class="input-group">
                                                                    <div class="input-group-text">@</div>
                                                                    <input type="email" id="email" name="email" value="{{ Auth::user()->email }}" class="required email form-control" readonly/>
                                                                </div>
                                                            </div>

                                                            <div class="w-100"></div>

                                                            <div class="col-12 mb-3">
                                                                <label for="rating">Rating</label>
                                                                <select id="rating" name="rating" class="form-select" required>
                                                                    <option value="">-- Select One --</option>
                                                                    <option value="1">1</option>
                                                                    <option value="2">2</option>
                                                                    <option value="3">3</option>
                                                                    <option value="4">4</option>
                                                                    <option value="5">5</option>
                                                                </select>
                                                            </div>

                                                            <div class="w-100"></div>

                                                            <div class="col-12 mb-3">
                                                                <label for="comment">Comment <small>*</small></label>
                                                                <textarea class="required form-control" id="comment" name="comment" rows="6" cols="30" required></textarea>
                                                            </div>


                                                            {{-- hidden inputs --}}
                                                            <input type="text" name="product_id" value="{{ $product->id }}" hidden readonly/>
                                                            <input type="text" name="product_name" value="{{ $product->name }}" hidden readonly/>
                                                            <input type="text" name="user_id" value="{{ Auth::user()->id }}" hidden readonly/>


                                                            <div class="col-12">
                                                                <button class="button button-3d m-0" type="submit" id="submit" name="submit" value="submit">Submit Review</button>
                                                            </div>

                                                        </form>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    </div>
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </div><!-- /.modal -->
                                    @endif
                                    <!-- Modal Reviews End -->

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            @if(count($relatedProducts))
            <h3>Related Products</h3>
            @endif
            
            <div class="row">
                @foreach($relatedProducts as $rel)
                <div class="product col-md-3 col-sm-6 sf-dress bottommargin-sm">
                    <div class="grid-inner">
                        <div class="product-image">
                            <a href="{{ route('product.details',$rel->slug) }}"><img src="{{ asset('storage/products/'.$rel->photoPrimary) }}" alt="{{$rel->name}}"></a>
                        </div>
                        <div class="product-desc">
                            <div class="product-title"><h3><a href="#">{{$rel->name}}</a></h3></div>
                            {{-- <div class="product-price"><ins>₱{{number_format($rel->ebook_price,2)}}</ins></div> --}}
							{!! ($rel->ebook_discount_price > 0 ? '<div class="product-price"><del>' . number_format($rel->ebook_price, 2) . '</del> <ins>' . number_format($rel->ebook_discount_price, 2) . '</ins></div>' : '<div class="product-price"><ins>' . number_format($rel->ebook_price, 2) . '</ins></div>') !!}
                            <div class="product-rating">
                                @for($star = 1; $star <= 5; $star++)
                                    <i class="icon-star{{ $star <= App\Models\Ecommerce\ProductReview::getProductRating($rel->id) ? '3' : '-empty' }}"></i>
                                @endfor
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<div style="display: none;">
    <form id="buy-now-form" method="post" action="{{route('cart.buy-now')}}">
        @csrf
        <input type="text" name="product_id" value="{{ $product->id}}">
        <input type="text" name="price" value="{{$product->ebook_discount_price > 0 ? $product->ebook_discount_price : $product->ebook_price}}">
        <input type="text" name="qty" id="buy_now_qty">
    </form>
</div>

@endsection

@section('pagejs')
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<script>

    function buynow(){
        var qty   = parseFloat($('#quantity').val());
        var remaining_stock = 1000;
        
        
        if(qty <= remaining_stock){
            $('#buy_now_qty').val(qty);
            $('#buy-now-form').submit();
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

    function add_to_cart(product){

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var qty   = parseFloat($('#quantity').val());
        var price = parseFloat($('#product_price').val());
        var remaining_stock = 1000;

        if(qty <= remaining_stock){

            $.ajax({
                data: {
                    "product_id": product, 
                    "qty": qty,
                    "price": price,
                    "_token": "{{ csrf_token() }}",
                },
                type: "post",
                url: "{{route('ebook.add-to-cart')}}",
                success: function(returnData) {
                    $("#loading-overlay").hide();
                    if (returnData['success']) {

                        $('.top-cart-number').html(returnData['totalItems']);


                        var cartotal = parseFloat($('#input-top-cart-total').val());
                        var productotal = price*qty;
                        var newtotal = cartotal+productotal;

                        $('#top-cart-total').html('₱'+newtotal.toFixed(2));
                        $('#input-top-cart-total').val(newtotal);

                        // $('#top-cart-items').append(
                        //     '<div class="top-cart-item">'+
                        //         '<div class="top-cart-item-image border-0">'+
                        //             '<a href="#"><img src="{{ asset('storage/products/'.$product->photoPrimary) }}" alt="Cart Image 1" /></a>'+
                        //         '</div>'+
                        //         '<div class="top-cart-item-desc">'+
                        //             '<div class="top-cart-item-desc-title">'+
                        //                 '<a href="#" class="fw-medium">{{$product->name}}</a>'+
                        //                 '<span class="top-cart-item-price d-block">'+price.toFixed(2)+'</span>'+
                        //                 '<div class="d-flex mt-2">'+
                        //                     '<a href="#" class="fw-normal text-black-50 text-smaller"><u>Edit</u></a>'+
                        //                     '<a href="#" class="fw-normal text-black-50 text-smaller ms-3" onclick="top_remove_product('+returnData['cartId']+');"><u>Remove</u></a>'+
                        //                 '</div>'+
                        //             '</div>'+
                        //             '<div class="top-cart-item-quantity">x '+qty+'</div>'+
                        //         '</div>'+
                        //    '</div>'
                        // );
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
                                '<a href="#"><img src="{{ asset('storage/products/'.$product->photoPrimary) }}" alt="Cart Image 1" /></a>' +
                                '</div>' +
                                '<div class="top-cart-item-desc">' +
                                '<div class="top-cart-item-desc-title">' +
                                '<a href="#" class="fw-medium">{{$product->name}}</a>' +
                                '<span class="top-cart-item-price d-block">₱' + price + '</span>' +
                                // '<span class="top-cart-item-price d-block">₱' + (price * qty).toFixed(2) + '</span>' +
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
