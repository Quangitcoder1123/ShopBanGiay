@extends('layouts.auth')
@section('title', 'Trang chủ')
@section('banner')


  <div class=""   >
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  
  <div class="carousel-inner" style="height:431px ;  background-position: center;">
    <div class="carousel-item active">
      <img class="d-block"  style="height:431px ; width: 100%;"  src="https://thietke6d.com/wp-content/uploads/2021/05/banner-quang-cao-giay-1.png" >
    </div>
    @foreach ($banners as $ban)
    <div class="carousel-item">

      <img class="d-block " style="height:431px ; width: 100%;" src="images/banners/{{ $ban->ban_image}}" >
    </div>
     @endforeach

    </div>
  </div>
   <div class="hero__text carousel-caption d-none d-md-block" style="background-color: rgb(0 123 255 / 25%); border-radius: 70%; ">
                            <span>SPORT SHOES</span>
                            <p>Mua giày đẹp chất lượng giá ưu đãi ngay</p>
                            <a href="#" class="primary-btn">MUA NGAY</a>
                        </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>

</div>
</div>
@endsection
@section('content')
<hr style="margin-left: 350px;
   margin-right:350px;">
<!-- trens product -->
<section class="categories">
        <div class="container">

            <div class="row">
                <div class="section-title">
                        <h3>Sản phẩm nổi bật</h4>
                    </div>
                <div class="categories__slider owl-carousel owl-loaded owl-drag">
   
                <div class="owl-stage-outer">
                    <div class="owl-stage" style="transform: translate3d(-1755px, 0px, 0px); transition: all 1.2s ease 0s; width: 3803px;">
                       
                       
                    @foreach ($topSales as $pro)
                        @if ($pro->pro_sale == 1)
                          
                             <div class="owl-item " style="width: 292.5px;">
                                <div class="col-lg-3">
                                        <div class="featured__item">
                                    @if ($pro->pro_image == null)
                                        <div class="featured__item__pic set-bg" data-setbg="https://salt.tikicdn.com/cache/280x280/ts/product/34/5c/52/85412535723b0e4b72638d79ca2f521f.jpg" style="background-image: url('https://salt.tikicdn.com/cache/280x280/ts/product/34/5c/52/85412535723b0e4b72638d79ca2f521f.jpg');">
                          
                                             @else
                                        <div class="featured__item__pic set-bg" data-setbg="images/products/{{ $pro->pro_image }}" style="background-image: url(&quot;img/featured/feature-5.jpg&quot;);">

                                            @endif

                                
                                    <ul class="featured__item__pic__hover">
                                        <li><form class="cart_add" action="{{ route('addWish') }}" method="post">
                                             @csrf
                                                <input type="hidden" name="pro_id" value="{{ $pro->pro_id }}">
                                                <button type="submit"  style="background-color:#ffffff00; border: 0px;" title="Add to Wishlish">
                                                        <i class="fa fa-heart"></i>
                                                 </button>
                                            </form>
                                        </li>
                                        <li><a href="{{ route('product.show', $pro->pro_id) }}"><i class="fa fa-eye"></i>
                                                </a>
                                        </li>
                                        <li>
                                           
                                            <form class="cart_add" action="{{ route('addCart') }}" method="post" style="border: none;">
                                                    @csrf
                                                        <input type="hidden" name="quantity" value="1">
                                                        <input type="hidden" name="pro_id" value="{{ $pro->pro_id }}">
                                                        <button type="submit" style="background-color:#ffffff00; border: 0px;"  title="Add to cart">
                                                            <i class="fa fa-shopping-cart"></i>
                                                        </button>
                                            </form>
                                        
                                        
                                        </li>



                            
                                    </ul>
                                </div>
                                 <!-- end div if  -->
                                <div class="featured__item__text">
                                    <h6><a href="{{ route('product.show', $pro->pro_id) }}">{{ $pro->pro_name }}</a></h6>
                                    <h5>{{ number_format($pro->pro_new_price) }} đ <span class="original deal">{{ number_format($pro->pro_old_price) }} đ</span></h5></a>
                                    
                                </div>
                            </div><!--  featured__item/ -->
                        </div>
                            </div>

                    @endif
                @endforeach

                    

                   
                   
                    </div>
                </div>


                    <div class="owl-nav"><button type="button" role="presentation" class="owl-prev"><span class="fa fa-angle-left"><span></span></span></button><button type="button" role="presentation" class="owl-next"><span class="fa fa-angle-right"><span></span></span></button></div><div class="owl-dots disabled"></div></div>
            </div>
        </div>
</section>

<!-- top -->
<section class="featured spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Sản phẩm HOT</h2>
                    </div>
                    <!-- thanh chonj -->
                    <div class="featured__controls">
                        <ul>
                            <li class="active" data-filter="*">All</li>
                             @foreach ($categories as $cate)
                             <li data-filter=".s{{$cate->cate_id}}">{{ $cate->cate_name }}</li>
                          
                            @endforeach
                            
                           
                        </ul>
                    </div>
                </div>
            </div>
            <!-- list san pham -->
            <div class="row featured__filter" id="MixItUp6C4DA7">
                @foreach($hots as $hot)
                <div class="col-lg-3 col-md-4 col-sm-6 mix s<?php echo $hot->cate_id ?> "   >
                    <div class="featured__item">
                        @if ($hot->pro_image == null)
                                        <div class="featured__item__pic set-bg" data-setbg="https://salt.tikicdn.com/cache/280x280/ts/product/34/5c/52/85412535723b0e4b72638d79ca2f521f.jpg" style="background-image: url('https://salt.tikicdn.com/cache/280x280/ts/product/34/5c/52/85412535723b0e4b72638d79ca2f521f.jpg');">
                          
                                             @else
                                        <div class="featured__item__pic set-bg" data-setbg="images/products/{{ $hot->pro_image }}" style="background-image: url(&quot;img/featured/feature-5.jpg&quot;);">

                                            @endif

                                
                                    <ul class="featured__item__pic__hover">
                                        <li><form class="cart_add" action="{{ route('addWish') }}" method="post">
                                             @csrf
                                                <input type="hidden" name="pro_id" value="{{ $hot->pro_id }}">
                                                <button type="submit"  style="background-color:#ffffff00; border: 0px;" title="Add to Wishlish">
                                                        <i class="fa fa-heart"></i>
                                                 </button>
                                            </form>
                                        </li>
                                        <li><a href="{{ route('product.show', $hot->pro_id) }}"><i class="fa fa-eye"></i>
                                                </a>
                                            </li>
                                        <li>
                                           
                                            <form class="cart_add" action="{{ route('addCart') }}" method="post" style="border: none;">
                                                    @csrf
                                                        <input type="hidden" name="quantity" value="1">
                                                        <input type="hidden" name="pro_id" value="{{ $hot->pro_id }}">
                                                        <button type="submit" style="background-color:#ffffff00; border: 0px;"  title="Add to cart">
                                                            <i class="fa fa-shopping-cart"></i>
                                                        </button>
                                            </form>
                                        
                                        
                                            </li>



                            
                                        </ul>
                                </div>
                        
                        <div class="featured__item__text">
                                    <h6><a href="{{ route('product.show', $hot->pro_id) }}">{{ $hot->pro_name }}</a></h6>
                                    <h5>{{ number_format($hot->pro_new_price) }} đ <span class="original deal">{{ number_format($hot->pro_old_price) }} đ</span></h5></a>
                                    
                                </div>
                    </div>
                </div>

                @endforeach
               
             
              
            </div>
        </div>
    </section>



<!-- end container -->
@endsection
