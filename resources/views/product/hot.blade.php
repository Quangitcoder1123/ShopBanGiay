@extends('layouts.admin')
@section('content')

<div class="selling-max">
    <div class="container">
        <div class="selling-title">
            <img src="https://frontend.tikicdn.com/_desktop-next/static/img/giasoc.svg" alt="">
            <img src="https://frontend.tikicdn.com/_desktop-next/static/img/flash.gif" alt="">
            <img src="https://frontend.tikicdn.com/_desktop-next/static/img/homnay.svg" alt="">
        </div>
        <div class="row">
            @foreach ($products as $pro)
            @if ($pro->pro_sale == 1)
            <div class="col-md-3 pro-hov">
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
                <span class="percent deal">{{FLOOR(100-($pro->pro_new_price/$pro->pro_old_price)*100)}}%</span>
                <div class="product-bottom text-center">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half"></i>
                    <i class="far fa-star"></i>
                    <a href="{{ route('product.show', $pro->pro_id) }}">
                        <p class="title">{{ $pro->pro_name }}</p>
                    </a>

                    <h5 class="price">{{ number_format($pro->pro_new_price) }} đ
                        <span class="original deal">{{ number_format($pro->pro_old_price) }}đ</span>
                    </h5>
                    <button class=""><a href="{{ route('product.show', $pro->pro_id) }}">Xem ngay</a></button>
                </div>
            </div>
            @endif
            @endforeach

        </div>
    </div>
</div>

@endsection