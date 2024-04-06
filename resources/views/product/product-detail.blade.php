@extends('layouts.auth')
@section('title', $product->pro_name)
@section('js')
  <script src="{{asset('ogani/js/jquery.nice-select.min.js')}}"></script>
@endsection('js')
@section('content')
  

    <section class="product-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__pic">
                        <div class="product__details__pic__item">
                            <img class="product__details__pic__item--large" src="{{asset('images/products/'. $product->pro_image) }}" alt="">
                        </div>
                        <div class="product__details__pic__slider owl-carousel owl-loaded owl-drag">
                            
                            
                            
                            
                        <div class="owl-stage-outer">
                            <div class="owl-stage" style="transform: translate3d(-822px, 0px, 0px); transition: all 1.2s ease 0s; width: 1410px;">

                                 @foreach ($product->proChillImages as $chill)
                            
                            <div class="owl-item " style="width: 97.5px; margin-right: 20px;">
                                    <img data-imgbigurl=" {{asset('images/chillImageProducts/'. $chill->chill_image) }}" src="{{asset('images/chillImageProducts/'. $chill->chill_image) }}" alt="">
                                </div>
                        @endforeach
                                
                                
                               
                            </div>
                        </div>
                       
                    </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__text">
                        <h3>{{$product->pro_name}}</h3>
                        <div class="product__details__rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-half-o"></i>
                            <span>({{$product->view}} reviews)</span>
                        </div>
                        <div class="product__details__price">
                            <span class="original deal">{{ number_format($product->pro_old_price) }} đ </span>
                                {{ number_format($product->pro_new_price) }} đ 
                        </div>
                    
                        <div>
                            @if ($product->quantity > 0)
                            <span>Cón {{$product->quantity}} sản phẩm</span>
                                              
                            @else
                            <i class="text-danger text-center">Hết hàng</i>
                            @endif
                            
                        </div>
                           @if ($product->quantity > 0)
                           
                                              
                        <form  action="{{ route('addCart') }}" method="post" >
                        <div class="product__details__quantity">
                            <div class="quantity">
                                <div class="pro-qty">
                                    <span class="dec qtybtn">-</span>
                                    <input type="text" name="quantity" value="1">
                                    <span class="inc qtybtn">+</span></div>
                            </div>
                        </div>



                        
                        
                            @csrf
                      
                            <input type="hidden" name="pro_id" value="{{ $product->pro_id }}">
                            <button type="submit" class="primary-btn"  title="Add to cart">
                            Thêm vào giỏ
                             </button>
                        </form>

                        @endif

                    
                      
                        <!-- <ul>
                            <li><b>Availability</b> <span>In Stock</span></li>
                            <li><b>Shipping</b> <span>01 day shipping. <samp>Free pickup today</samp></span></li>
                            <li><b>Weight</b> <span>0.5 kg</span></li>
                            <li><b>Share on</b>
                                <div class="share">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                    <a href="#"><i class="fa fa-pinterest"></i></a>
                                </div>
                            </li>
                        </ul> -->
                        <form  action="{{ route('addWish') }}" method="post">
                            @csrf
                            <input type="hidden" name="pro_id" value="{{ $product->pro_id }}">
                            <button type="submit" class="heart-icon" title="Add to Wishlish">
                                                        <span class="icon_heart_alt"></span>
                            </button>
                        </form>
                    </div>
                   <!--  <div class="product__details__text">
                        <h3>Vetgetable’s Package</h3>
                        <div class="product__details__rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-half-o"></i>
                            <span>(18 reviews)</span>
                        </div>
                        <div class="product__details__price">$50.00</div>
                        <p>Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vestibulum ac diam sit amet quam
                            vehicula elementum sed sit amet dui. Sed porttitor lectus nibh. Vestibulum ac diam sit amet
                            quam vehicula elementum sed sit amet dui. Proin eget tortor risus.</p>
                        

                        <form action="{{ route('addCart') }}" method="post">
                                @csrf
                                
                                        @if (Auth::check())
                                            @if ($product->quantity > 0)
                                                <input type="hidden" name="pro_id" value="{{ $product->pro_id }}">
                                                <div class="yellow"><span>@lang('main.product.rest', ['quantity' => $product->quantity])</span></div>
                                                <button type="submit" class="btn btn-add-to-cart">@lang('main.cart.add')</button>
                                            @else
                                                <i class="text-danger text-center">@lang('main.product.hethang')</i>
                                            @endif
                                        @else
                                            <button type="button" 
                                                class="btn btn-add-to-cart">@lang('main.cart.add')</button>
                                        @endif
                                    </div>
                            
                             </div>

                                <a href="#" class="primary-btn">ADD TO CARD</a>
                                     <a href="#" class="heart-icon"><span class="icon_heart_alt"></span></a>
                                <div class="QualityInput__Wrapper">
                                    <p>@lang('main.cart.quantity')</p>
                                    <div class="group-input">
                                        <input style="width: 100px" class="form-control ml-5" type="number" value="1" min="1" max="{{ $product->quantity }}" name="quantity" class="input">
                                    </div>
                                    <input type="hidden" name="pro_id" value="{{ $product->pro_id }}">
                                    
                                </div>
                            </form>
                        <ul>
                            <li><b>Availability</b> <span>In Stock</span></li>
                            <li><b>Shipping</b> <span>01 day shipping. <samp>Free pickup today</samp></span></li>
                            <li><b>Weight</b> <span>0.5 kg</span></li>
                            <li><b>Share on</b>
                                <div class="share">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                    <a href="#"><i class="fa fa-pinterest"></i></a>
                                </div>
                            </li>
                        </ul>
                    </div> -->
                </div>
                <div class="col-lg-12">
                    <div class="product__details__tab">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab" aria-selected="true">Mô tả</a>
                            </li>
                           
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab" aria-selected="false">Đánh giá <span>{{$product->reviews->count()}}</span></a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                <div class="product__details__tab__desc">
                                    <h6>Thôn tin thêm về sản phẩm</h6>
                                    <div><?php echo $product->pro_desc ?></div>
                                </div>
                            </div>
                            
                            <div class="tab-pane" id="tabs-3" role="tabpanel">
                                <div class="product__details__tab__desc">
                                    <!-- noi dung danh giá -->
                                    <div class="row">
            <div class="col-lg-9 col-md-12">

                <h2>@lang('main.product.cus_review')</h2>
                <div class="container-product">
                    <form id="form-review" action="{{ route('review.store') }}" method="post" onsubmit="return submitForm()">
                        @csrf
                        <div class="review-rating__inner">
                            <div class="review-rating__summary">
                                <div>
                                    <h3 class="mt-5">@lang('main.product.review')</h3>
                                </div>
                                <div class="review-rating__point text-center justtify-content-center">
                                    <span class="point_span">{{ round($product->reviews->avg('rate'), 1, PHP_ROUND_HALF_UP) }}</span><br>
                                    <div class="ratings">
                                        <div class="empty-stars"></div>
                                        <div class="full-stars" style="width:{{ $product->reviews->avg('rate') * 20 }}%"></div>
                                    </div>
                                </div>
                                <div class="review-rating__total">{{ $product->reviews->count() }}
                                    @lang('main.product.review')</div>
                            </div>
                            <!-- số đánh giá -->
                           <!-- số đánh giá -->
                            <div class="review-rating__detail">
                                <div class="review-rating__level mt-5">
                                    @if(Auth::check())
                                    <div class="stars" style="width: 100%">
                                        <div class="">
                                            <input value="5" class="star star-5" id="star-5" type="radio" name="rate" />
                                            <label class="star star-5" for="star-5"><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i>
                                        </label>
                                    </div>
                                         <div class="">
                                        <input value="4" class="star star-4" id="star-4" type="radio" name="rate" />
                                        <label class="star star-4" for="star-4"><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i></label> </div>
                                        <div class=""> <input value="3" class="star star-3" id="star-3" type="radio" name="rate" />
                                        <label class="star star-3" for="star-3"><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i></label> </div>
                                        <div class=""><input value="2" class="star star-2" id="star-2" type="radio" name="rate" />
                                        <label class="star star-2" for="star-2"><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i></label> </div>
                                        <div class=""> <input value="1" class="star star-1" id="star-1" type="radio" name="rate" />
                                        <label class="star star-1" for="star-1"><i class="fa fa-star" aria-hidden="true"></i></label></div>

                                        
                                        
                                       
                                        
                                        
                                    </div>
                                    @else
                                        <div class="star">
                                            <h1><i class="text-secondary">"@lang('main.acc.must_login_to_rate')"</i></h1>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <!-- chi tiết số đánh giá -->
                            <!-- chi tiết số đánh giá -->
                        </div>
                        <!-- đây là phần số liệu đánh giá -->
                        @foreach ($product->reviews as $rev)
                            <div class="review-comment__avatar">
                                <ul>
                                    <li class="ml-4"><img src="images/users/{{ $rev->user->avatar }}" alt=""></li>
                                    {{ $rev->user->fullname }}
                                    <li></li>
                                    <li>
                                        @if ($rev->user->orders->count() > 0)
                                            <i class="fas fa-comments"></i> 
                                        Cảm ơn bạn đã đánh giá sản phẩm 
                                        @endif
                                    </li>
                                </ul>
                                <div class="review-comment-content ml-4">
                                    {{ $rev->comment }}
                                </div>
                        @endforeach
                        @if(Auth::check())
                           
                        <div class="form-cmt">
                            <input class="" id="xxx" type="text" name="comment" placeholder="{{ trans('main.product.cmt_placeholder') }}">
                            <input id="last-name1" type="hidden" value="{{ $product->pro_id }}" name="pro_id">
                            <p class="err_cmt text-danger"></p>
                    
                            @if(session('success'))
                                <p class="text-success">{{ session('success') }}</p>
                            @endif
                    
                            <button id="submit" type="submit">@lang('main.product.send_review')</button>
                        </div>
                        @else
                        <div class="form-cmt text-center justify-content-center">
                            <i class="text-center text-secondary justify-content-center">"@lang('main.acc.must_login_to_cmt')"</i>
                        </div>
                        @endif
                </div>
                </form>
                <script>
                    function submitForm() {
                        var rating = document.querySelector('input[name="rate"]:checked');
                        var comment = document.getElementById('xxx').value;
                        var errorElement = document.querySelector('.err_cmt');
                
                        // Reset error message
                        errorElement.innerText = '';
                
                        // Validate
                        if (!rating) {
                            errorElement.innerText = 'Vui lòng chọn số sao đánh giá.';
                        }
                
                        if (!comment.trim()) {
                            errorElement.innerText += errorElement.innerText === '' ? '' : ' ';
                            errorElement.innerText += 'Vui lòng nhập bình luận.';
                        }
                
                        // If there are errors, return false to prevent form submission
                        return errorElement.innerText === '';
                    }
                </script>
                
            </div>
        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    </div>
@endsection
<!-- Move the script to the head of your HTML document -->
    <!-- Your other head elements -->
  
<!-- Your existing HTML body -->

<!-- Make sure to close your HTML properly -->
</html>
