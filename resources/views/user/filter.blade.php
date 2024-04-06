@extends('layouts.auth')
@section('content')

<div class="pro-slider">
    <div class="container">
        <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="https://cf.shopee.vn/file/902e9ba76fc65679ded34aa719f1f68e" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="https://cf.shopee.vn/file/cdf560e62afe43bd10a89a5e87b6a6db" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="https://cf.shopee.vn/file/ec5f39107c7a791e51ecbc3be225b836" class="d-block w-100" alt="...">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>

</div>
<div class="container">
    <div class="product-page">
        <div class="row">
            <div class="col-lg-3 box-pro-1">
                <div class="box-product-left">
                    <div class="pro-cate">
                        <div class="pro-title">
                            <h4>@lang('main.category')</h4>
                        </div>
                        <div>
                            <ul class="cate-pro-item">
                                @foreach ($cate as $category)
                                @if ($category->parent_id == null)
                                <li><a href="{{ route('category.show', $category->cate_id) }}">{{ $category->cate_name }}<span>({{ $category->children->count() }})</span></a>
                                    <ul>
                                        @foreach ($category->children as $c)
                                        <li><a href="{{ route('category.show', $c->cate_id) }}">-{{ $c->cate_name }}<span>({{ $c->products->count() }})</span></a></li>
                                        @endforeach
                                    </ul>
                                </li>
                                @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <div class="pro-cate">
                        <div class="pro-title" style="margin-bottom: -10px;">
                            <h4>Đánh giá</h4>
                        </div>
                        <ul class="pro-star">
                            <form action="{{url('filter')}}" method="get">
                                <button type="submit">
                                    <li><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i> <span>(Từ 5 sao) </span><input type="number" name="star" value="5" style="border: none; width: 0px;"></li>
                                </button>
                            </form>
                            <form action="{{url('filter')}}" method="get">
                                <button type="submit">
                                    <li><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i> <span>(Từ 4 sao) </span><input type="number" name="star" value="4" style="border: none; width: 0px;"></li>
                                </button>
                            </form>
                            <form action="{{url('filter')}}" method="get">
                                <button type="submit">
                                    <li><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i> <span>(Từ 3 sao) </span><input type="number" name="star" value="3" style="border: none; width: 0px;"></li>
                                </button>
                            </form>
                        </ul>
                    </div>
                    <div class="pro-cate" style="margin-top: -30px;">
                        <div class="pro-title">
                            <h4>Khoảng giá</h4>
                        </div>
                        <form action="{{url('filter')}}" method="get">
                            <div style="display: flex; align-items: center; justify-content: space-between;">

                                @csrf
                                <input type="text" class="slide-input slide-from" name="min">
                                <span class="pro-to"> đến</span>
                                <input type="text" class="slide-input slide-to" name="max">

                            </div>

                            <button type="submit" class="btn btn-default btn-block">Ok</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 box-pro-2">
                <div class="pro-box-right">
                    <div class="filter-list-box">

                        @if ($ketqua-> isEmpty())
                        <h1>Có {{$ketqua1 ->count()}} sản phẩm phù hợp với yêu cầu của bạn</h1>
                        @else
                        <h1>Có {{$ketqua ->count()}} sản phẩm phù hợp với yêu cầu của bạn</h1>
                        <div class="option-box-wrap">
                            <div class="option-box">
                                <div class="sort-box-holder">
                                    <div class="btn-group pull-right search-right-box">
                                        <form action="" class="category-search-frm">

                                            <input type="hidden" value="pro_search">
                                            <button>@lang('main.search')</button>
                                        </form>
                                    </div>
                                    <div class="btn-group pull-left sort-box">
                                        <span>Ưu tiên xem: </span>
                                        <ul class="sort-list">
                                            <li><a href="">Hàng mới</a></li>
                                            <li><a href="">Bán chạy</a></li>
                                            <li><a href="">Giảm giá nhiều</a></li>
                                            <li><a href="">Giá tăng dần</a></li>
                                            <li><a href="">Giá giảm dần</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
                <div class="product-box-list">
                    <div class="row">
                        @foreach($ketqua as $pro)
                        <div class="col-md-3 pro-hov">
                            <div class="product-top">
                                <img src="images/products/{{ $pro->pro_image }}" alt="">
                                <div class="overlay">
                                    <a href="{{ route('product.show', $pro->pro_id) }}" class="btn btn-secondary" title="Detail">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <button type="button" class="btn btn-secondary" title="Add to Wishlish">
                                        <i class="fa fa-heart"></i>
                                    </button>
                                    <button type="button" class="btn btn-secondary" title="Add to cart">
                                        <i class="fa fa-shopping-cart"></i>
                                    </button>
                                </div>
                            </div>
                            @if($pro->pro_sale == 1)
                            <span class="percent deal">HOT</span>
                            @endif
                            <div class="product-bottom text-center">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half"></i>
                                <i class="far fa-star"></i>
                                <p class="title"> {{ $pro->pro_name }}</p>
                                <h5 class="price">{{ number_format($pro->pro_new_price) }} đ <span class="original deal">{{ number_format($pro->pro_old_price) }} đ</span></h5>
                            </div>
                        </div>
                        @endforeach

                        @foreach($ketqua1 as $pro)
                        <div class="col-md-3 pro-hov">
                            <div class="product-top">
                                <img src="images/products/{{ $pro->pro_image }}" alt="">
                                <div class="overlay">
                                    <a href="{{ route('product.show', $pro->pro_id) }}" class="btn btn-secondary" title="Detail">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <button type="button" class="btn btn-secondary" title="Add to Wishlish">
                                        <i class="fa fa-heart"></i>
                                    </button>
                                    <button type="button" class="btn btn-secondary" title="Add to cart">
                                        <i class="fa fa-shopping-cart"></i>
                                    </button>
                                </div>
                            </div>
                            @if($pro->pro_sale == 1)
                            <span class="percent deal">HOT</span>
                            @endif
                            <div class="product-bottom text-center">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half"></i>
                                <i class="far fa-star"></i>
                                <p class="title"> {{ $pro->pro_name }}</p>
                                <h5 class="price">{{ number_format($pro->pro_new_price) }} đ <span class="original deal">{{ number_format($pro->pro_old_price) }} đ</span></h5>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection