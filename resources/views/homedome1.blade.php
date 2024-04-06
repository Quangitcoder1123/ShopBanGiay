@extends('layouts.app')
@section('title', trans('main.home'))
@section('content')
<div class="container">
    <div class="container-row">
        <div id="top-heading-res" class="column-list-product">
            <nav class="list_product">
                <h3 class="heading">
                    <i class="fa fa-bars"></i>@lang('main.categories')
                </h3>
                <ul class="product-list">
                    @foreach ($categories as $cate)
                    @if ($cate->parent_id == null)
                    <li class="product-list-item">
                        <a href="#" class="item-link">
                            <img style="width: 20px; height:20px" class="mr-3" src="images/categories/logos/{{ $cate->cate_logo }}" alt="">
                            {{ $cate->cate_name }}
                        </a>
                        <div class="nho">
                            <div class="to">
                                @foreach ($cate->children as $catehihi)
                                <ul>
                                    <h5><a href="{{ route('category.show', $catehihi->cate_id) }}">{{ $catehihi->cate_name }}</a> </h5>
                                    @foreach ($catehihi->products as $pro)
                                    <li><a href="{{ route('product.show', $pro->pro_id) }}">{{ $pro->pro_name }}</a>
                                    </li>

                                    @if ($proCount++ == 10) @break
                                    @endif

                                    @endforeach

                                </ul>
                                @if ($cateCount++ == 3) @break
                                @endif
                                @endforeach
                            </div>
                        </div>
                    </li>
                    @endif
                    @endforeach
                    <!-- end -->
                </ul>
            </nav>
        </div>
        <div class="column-content">
            <div id="slider">
                <p href="#" class="control next"><i class="fas fa-chevron-right"></i></p>
                <p href="#" class="control prev"><i class="fas fa-chevron-left"></i></p>
                <ul>
                    @foreach ($banners as $ban)
                    <a href="#">
                        <li>
                            <img width="100%" src="images/banners/{{ $ban->ban_image }}" alt="">
                        </li>
                    </a>
                    @endforeach
                </ul>
            </div>
            <div class="list-product-res">
                <ul class="list-product-res-content">
                    @foreach ($categories as $ca_repon)
                    @if ($ca_repon->parent_id == null)
                    <li class="product-res-content"><a href="#">{{ $ca_repon->cate_name }}</a></li>
                    @endif
                    @endforeach
                </ul>
            </div>
            <div class="banner_bottom_container">
                <div class="Banners-MainGrid">
                    <a href="">
                        <img src="./assets/images/Banners-MainGrid1.png" alt=""></a>
                </div>
                <div class="Banners-MainGrid">
                    <a href="">
                        <img src="./assets/images/Banners-MainGrid2.png" alt=""></a>
                </div>
            </div>
        </div>
        <div class="column-quangcao">
            <div class="banner_qc_container">
                <div class="Banners-MainGrid">
                    <a href="">
                        <img src="./assets/images/qc1.png" alt=""></a>
                </div>
                <div class="Banners-MainGrid">
                    <a href="">
                        <img src="./assets/images/qc2.png" alt=""></a>
                </div>
            </div>
            <div class="banner_qc_container">
                <div class="Banners-MainGrid">
                    <a href="">
                        <img src="./assets/images/qc3.png" alt=""></a>
                </div>
                <div class="Banners-MainGrid">
                    <a href="">
                        <img src="./assets/images/qc4.png" alt=""></a>
                </div>
            </div>
            <div class="banner_qc_container">
                <div class="Banners-MainGrid">
                    <a href="">
                        <img src="./assets/images/qc6.png" alt=""></a>
                </div>
                <div class="Banners-MainGrid">
                    <a href="">
                        <img src="./assets/images/qc7.png" alt=""></a>
                </div>
            </div>
        </div>
    </div>
    <!-- end danh mục - slider - quảng cáo -->
    <div class="sales-container">

        <div class="container-row">
            <ul class="sales">
                @foreach ($deals as $deal)
                <li class="sales-item">

                    <a href="#">
                        <img width="100%" src="images/deal/{{ $deal->deal_image }}" alt="">
                    </a>

                </li>
                @endforeach
            </ul>
            <!-- end sales -->
        </div>
    </div>
    <!-- end sales -->
    <div class="selling-max">
        <div class="container">
            <div class="selling-title">
                <img src="https://frontend.tikicdn.com/_desktop-next/static/img/giasoc.svg" alt="">
                <img src="https://frontend.tikicdn.com/_desktop-next/static/img/flash.gif" alt="">
                <img src="https://frontend.tikicdn.com/_desktop-next/static/img/homnay.svg" alt="">
            </div>
            <div class="row">
                @foreach ($topSales as $pro)
                @if ($pro->pro_sale == 1)
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6  pro-hov ty-compact-list2">
                    <div class="product-top">
                        @if ($pro->pro_image == null)
                        <img src="https://salt.tikicdn.com/cache/280x280/ts/product/34/5c/52/85412535723b0e4b72638d79ca2f521f.jpg" alt="">
                        @else
                        <img src="images/products/{{ $pro->pro_image }}" alt="">
                        @endif
                        <div class="overlay">
                            <a href="{{ route('product.show', $pro->pro_id) }}" class="btn btn-secondary" title="Quick Shop">
                                <i class="fa fa-eye"></i>
                            </a>
                            <form action="{{ route('addWish') }}" method="post">
                                @csrf
                                <input type="hidden" name="pro_id" value="{{ $pro->pro_id }}">
                                <button type="submit" class="btn btn-secondary" title="Add to Wishlish">
                                    <i class="fa fa-heart"></i>
                                </button>
                            </form>
                            <form action="{{ route('addCart') }}" method="post">
                                @csrf
                                <input type="hidden" name="quantity" value="1">
                                <input type="hidden" name="pro_id" value="{{ $pro->pro_id }}">
                                <button type="submit" class="btn btn-secondary" title="Add to cart">
                                    <i class="fa fa-shopping-cart"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                    <span class="percent deal">{{ FLOOR(100 - ($pro->pro_new_price / $pro->pro_old_price) * 100) }}%</span>
                    <div class="product-bottom text-center">
                        <div class="ratings">
                            <div class="empty-stars"></div>
                            <div class="full-stars" style="width:{{ $pro->reviews->avg('rate') * 20 }}%"></div>
                        </div>
                        <a href="{{ route('product.show', $pro->pro_id) }}">
                            <p class="title">{{ $pro->pro_name }}</p>
                        </a>

                        <h5 class="price">{{ number_format($pro->pro_new_price) }} đ
                            <span class="original deal">{{ number_format($pro->pro_old_price) }}đ</span>
                        </h5>
                        <button class=""><a href="{{ route('product.show', $pro->pro_id) }}">@lang('admin.notification.content')</a></button>
                    </div>
                </div>
                @endif
                @endforeach
                <div class="btn-more text-center mt-3 mb-3">
                    <a href="{{ route('product.showAll') }}">@lang('main.see_more')</a>
                </div>
            </div>
        </div>

        <div class="top-selling">
            <h2 class="alert alert-warning">@lang('main.top_sale')</h2>
            <div class="custom-slider">
                @foreach ($topSales as $sa)
                <div class="custom-box">
                    <a href="{{ route('product.show', $sa -> pro_id) }}"><img src="images/products/{{ $sa->pro_image }}" alt=""></a>
                </div>
                @endforeach
            </div>
            <!-- end top khuyến mãi -->
            <h2 class="alert alert-warning">@lang('main.cate_quantam')</h2>
            <div id="gallery">
                @foreach ($categories as $cate)
                @if ($cate->parent_id != null)
                <a href="{{ route('category.show', $cate->cate_id) }}">
                    <div class="pro-hov">
                        <div class="product-top">
                            <img src="images/categories/images/{{ $cate->cate_image }}" alt="">
                        </div>
                        <div class="product-bottom text-center">
                            <p class="title text-center">{{ $cate->cate_name }}</p>
                        </div>
                    </div>
                </a>
                @endif
                @endforeach
            </div>
            <!-- end top bán chạy -->

        </div>
        <div class="product">
            <h2 class="alert alert-warning">@lang('main.hot_in_day')</h2>
            <!-- san pham -->
            <div class="container">
                <div class="row">
                    @foreach ($hots as $hot)
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 pro-hov ty-compact-list">
                        <div class="product-top">
                            <img src="images/products/{{ $hot->pro_image }}" alt="">
                            <div class="overlay">
                                <a href="{{ route('product.show', $hot->pro_id) }}" class="btn btn-secondary" title="{{ trans('main.product.detail') }}">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <form action="{{ route('addWish') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="pro_id" value="{{ $hot->pro_id }}">
                                    <button type="submit" class="btn btn-secondary" title="Add to Wishlish">
                                        <i class="fa fa-heart"></i>
                                    </button>
                                </form>
                                <form action="{{ route('addCart') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="quantity" value="1">
                                    <input type="hidden" name="pro_id" value="{{ $hot->pro_id }}">
                                    <button type="submit" class="btn btn-secondary" title="{{ trans('main.product.add_cart') }}">
                                        <i class="fa fa-shopping-cart"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                        <span class="percent deal">{{ FLOOR(100 - ($hot->pro_new_price / $hot->pro_old_price) * 100) }}%</span>
                        <div class="product-bottom text-center">
                            <div class="ratings">
                                <div class="empty-stars"></div>
                                <div class="full-stars" style="width:{{ $hot->reviews->avg('rate') * 20 }}%"></div>
                            </div>
                            <p class="title">{{ $hot->pro_name }}</p>
                            <h5 class="price">{{ number_format($hot->pro_new_price) }} đ
                                <span class="original deal">{{ number_format($hot->pro_old_price) }} đ</span>
                            </h5>
                            <button class=""><a href="{{ route('product.show', $hot->pro_id) }}">Xem
                                    ngay</a></button>
                        </div>
                    </div>
                    @endforeach
                    <div class="btn-more text-center mt-3 mb-3 show-more">
                        <button>
                            <p>@lang('main.see_more')</p>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- end sản phẩm -->
    </div>
</div>
<!-- end container -->
@endsection
