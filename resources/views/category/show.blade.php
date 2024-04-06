@extends('layouts.auth')
@section('title', trans('main.home'))
@section('banner')
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators"><?php $dealcout=0; ?>
    @foreach($deals as $deal)
   
    <li data-target="#carouselExampleIndicators" data-slide-to="{{$dealcout++}}"></li>
    @endforeach
  </ol>
  <!--  side default w=850 h=200  -->
  <div class="carousel-inner">
    <?php $dealcout=0; ?>
    @foreach($deals as $deal)
        @if($dealcout==0)
        <div class="carousel-item active">
      <img class="d-block w-100" src="{{asset('images/deal/'.$deal->deal_image)}}" alt="{{$dealcout++}}">
    </div>
       @else
     <div class="carousel-item">
      <img class="d-block w-100" src="{{asset('images/deal/'.$deal->deal_image)}}" alt="{{$dealcout++}}">
    </div>
     @endif
    @endforeach
   
   
   
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
@endsection
@section('content')

<section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-5">
                    <div class="sidebar">
                        <div class="sidebar__item">
                            <h4>Thể loại</h4>
                            <ul>
                                @foreach ($categories as $category)
                                       
                                                <li>
                                                    <a  href="{{ route('category.show', $category->cate_id) }}">{{ $category->cate_name }} ( {{ $category->products->count()}} )</a>
                                                    
                                                   
                                                  
                                                  
                                                      
                                                </li>

                                      
                                        
                                    @endforeach
                              
                             
                            </ul>
                        </div>
                        <div class="sidebar__item">
                            <h4>Price</h4>
                            <div class="price-range-wrap">
                                <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content" data-min="0" data-max="1000000">
                                    <div class="ui-slider-range ui-corner-all ui-widget-header"></div>
                                    <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default" style="left: 0%;"></span>
                                    <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default" style="left: 100%;"></span>
                                <div class="ui-slider-range ui-corner-all ui-widget-header" style="left: 0%; width: 100%;"></div></div>
                                <div class="range-slider">
                                    <form action="{{ route('product.showAll') }}" method="GET">
                                    <div class="price-input">

                                        <input type="text" name="min_pri" id="minamount">
                                        <input type="text" name="max_pri" id="maxamount"> VNĐ
                                        <br>
                                        <input class="btn btn-success" type="submit" name="" value="OK">
                                    </div>
                                </form>
                                </div>
                            </div>
                        </div>
                        
                        
                    </div>
                </div>
                <div class="col-lg-9 col-md-7">
                    
                    <div class="filter__item">
                        <div class="row">
                            <div class="col-lg-4 col-md-5">
                               <div class="col-lg-4 col-md-5">
                                <div class="filter__sort" style="
    display: flex;
">
                                    <span>Sắp xếp</span>
                                   
                                    <div class="dropdown" tabindex="0">
                                        <span class="btn  btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            @if($filter=='')
                                                Mặc định
                                            @endif
                                            @if($filter=='newest')
                                                @lang('main.product.newest')
                                            @else
                                                @if($filter=='viewest')
                                                    @lang('main.product.viewest')
                                                @else
                                           
                                                     @if($filter=='saling')
                                                         @lang('main.product.saling')
                                                    @else
                                                        @if($filter=='Decrease')
                                                            @lang('main.product.pri_decrease')
                                                         @else
                                                            @if($filter=='Ascending')
                                                                     @lang('main.product.pri_ascending')
                                                             @endif
                                                        @endif
                                            
                                                     @endif
                                                @endif 
                                            @endif


                                        

                                        </span>
                                        <ul class="dropdown-menu">
                                           
                                             <li class="option"><a  class="dropdown-item"
                                                        href="{{ route('product.showAll', 'filter=newest') }}">@lang('main.product.newest')</a>
                                                </li>
                                                <li class="option"><a  class="dropdown-item"
                                                        href="{{ route('product.showAll', 'filter=viewest') }}">@lang('main.product.viewest')</a>
                                                </li>
                                                <li class="option"><a  class="dropdown-item"
                                                        href="{{ route('product.showAll', 'filter=saling') }}">@lang('main.product.saling')</a>
                                                </li>
                                                <li class="option"><a  class="dropdown-item"
                                                        href="{{ route('product.showAll', 'filter=Ascending') }}">@lang('main.product.pri_ascending')</a>
                                                </li>
                                                <li class="option"><a  class="dropdown-item"
                                                        href="{{ route('product.showAll', 'filter=Decrease') }}">@lang('main.product.pri_decrease')</a>
                                                </li>
                                        </ul>
                                    </div>
                                   
                                </div>
                            </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="filter__found">
                                    <h6>Tìm thấy <span>{{$products->count()}}</span>sản phẩm </h6>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-3">
                                <div style="display: none;" class="footer__widget">
                                 
                                            <form  action="{{ route('product.showAll') }}" >
                                                <input type="text" name="filter">
                                                <button>Tìm kiếm</button>
                                            </form>
                                        
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">

                    @foreach($products as $pro)
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                  @if ($pro->pro_image == null)
                                        <div class="product__item__pic set-bg" data-setbg="https://salt.tikicdn.com/cache/280x280/ts/product/34/5c/52/85412535723b0e4b72638d79ca2f521f.jpg" style="background-image: url('https://salt.tikicdn.com/cache/280x280/ts/product/34/5c/52/85412535723b0e4b72638d79ca2f521f.jpg');">
                          
                                             @else
                                        <div class="product__item__pic set-bg" data-setbg="
                                        {{asset('images/products/'.$pro->pro_image)}}" style="background-image: url(&quot;img/featured/feature-5.jpg&quot;);">

                                            @endif
                                    <ul class="product__item__pic__hover">
                                        <li>
                                            @if (Auth::check())
                                            <form class="cart_add" action="{{ route('addWish') }}"  method="post">
                                            @else
                                            <form class="cart_add" onsubmit="function() alert("Hello! I am an alert box!!");" action="{{ route('addWish') }}"  method="post">
                                            @endif

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
                                <div class="product__item__text">
                                    <h6><a href="{{ route('product.show', $pro->pro_id) }}">{{ $pro->pro_name }}</a></h6>
                                    <h5>{{ number_format($pro->pro_new_price) }} đ <span class="original deal">{{ number_format($pro->pro_old_price) }} đ</span></h5></a>
                                </div>
                            </div>
                        </div>

                    @endforeach
                        
                        
                      
                    </div>
                    <div class="product__pagination">
                         {{ $products->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>

   
  

    <script>
        $(document).ready(function() {
            $("li.cate-pro").click(function() {
                $("li.cate-pro").find("ul.cate-s").hide(500);
                if ($(this).hasClass("cate-e")) {
                    $(this).find("ul.cate-s").hide(500);
                    $(this).removeClass("cate-e")
                } else {
                    $(this).find("ul.cate-s").show(500);
                    $("li.cate-pro").removeClass("cate-e");
                    $(this).addClass("cate-e");
                }
            })

        })

    </script>

   
@endsection
