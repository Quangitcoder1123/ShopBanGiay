@extends('layouts.auth')
@section('title', 'Giỏ hàng')
@section('js')
  <script src="{{asset('ogani/js/jquery.nice-select.min.js')}}"></script>
@endsection('js')
@section('content')

<section class="shoping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th class="shoping__product">Sản phẩm</th>
                                    <th>đơn giá</th>
                                    <th>số lượng</th>
                                    <th>thành tiền</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                 @foreach (Cart::content() as $item)
                                <tr>
                                    <td class="shoping__cart__item">
                                        <img style="width:100px; height:100px" src="images/products/{{ $item->options->image }}" alt="">
                                        <h5>{{ $item->name }}</h5>
                                    </td>
                                    <td class="shoping__cart__price">
                                        {{ number_format($item->price) }}đ
                                    </td>
                                    <td class="shoping__cart__quantity">
                                        <div class="quantity">
                                            <form action="{{ route('updateCart', $item->rowId) }}" method="post">
                                                 @csrf
                                            <div class="pro-qty"><span class="dec qtybtn">-</span>
                                                <input name="update_qty" type="number" class="qty-input" value="{{ $item->qty }}" min="1">
                                            <span class="inc qtybtn">+</span></div>

                                                   
                                                  
                                                    <button type="submit" class="btn btn-primary">@lang('admin.action.edit')</button>
                                                </form>
                                        </div>
                                    </td>
                                    <td class="shoping__cart__total">
                                        {{number_format($item->price*$item->qty)}}
                                    </td>
                                    <td class="shoping__cart__item__close">
                                        <a href="{{ route('deleteCart', $item->rowId) }}"><span class="icon_close"></span></a>
                                        
                                    </td>
                                </tr>
                                 @endforeach

                               
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__btns">
                        <a href="#" class="primary-btn cart-btn">Tiếp tục mua sắm</a>
                        
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__continue">
                        
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__checkout">
                        <h5>Cart Total</h5>
                        <ul>
                           
                            <li>Tổng giỏ hàng: <span>{{ Cart::subTotal() }} đ</span></li>
                        </ul>
                        <a href="{{ route('order.create') }}" class="primary-btn">Đặt Hàng</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

   
@endsection
