@extends('layouts.auth')
@section('title', 'admin.title')
@section('content')

    <div class="order-history">
      @if($order->user->user_id == Auth::user()->user_id)
        <div class="container">
            <div class="order-page">
                <div class="or-top">
                    <div class="or-title">
                        <div class="row">
                            <div class="col-6">
                                <h3><i class="fas fa-cart-arrow-down"></i> @lang('main.order.order_detail')</h3>
                            </div>
                            <div class="col-6">
                                <p>@lang('main.order.order_time', ['hour' => $order->created_at->format('H:i:s'), 'day' =>
                                    $order->created_at->format('Y.m.d')])</p>
                            </div>
                        </div>

                    </div>
                    <div class="or-info">
                        <div class="or-info-title">
                            <h3>@lang('main.order.order_info')</h3>
                        </div>
                        <div class="or-info-main">
                            <ul>
                                <li>@lang('admin.orders.order_name'): {{ $order->order_name }}</li>
                                <li>@lang('admin.orders.order_phone'): {{ $order->order_phone }}</li>
                                <li>@lang('admin.user.eamil'): {{ $order->user->email }}</li>
                                <li>@lang('admin.orders.order_address'): {{ $order->order_address }} -
                                    {{ $order->order_ward }} - {{ $order->order_district }} - {{ $order->order_city }}
                                </li>
                                <li>@lang('admin.orders.pay_method.pay_method'):
                                    @lang('admin.orders.pay_method.'.config('app.pay_method.'. $order->pay_method))</li>
                                @if ($order->bill_image != null)
                                    <li><img style="width: 300px" src="images/cart/{{ $order->bill_image }}" alt=""
                                            class="img-fliud"></li>
                                @endif
                            </ul>
                        </div>
                    </div>
                    <div class="or-body">
                        @foreach ($order->checkouts as $checkout)
                            <div class="row">
                                <div class="col-2">
                                    <div class="or-img">
                                        <img class="img-fluid" src="images/products/{{ $checkout->product->pro_image }}"
                                            alt="">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="or-name mt-5">
                                        <a
                                            href="{{ route('product.show', $checkout->product->pro_id) }}">{{ $checkout->product->pro_name }}</a>
                                        <p>{{ number_format($checkout->product->pro_new_price )}}đ</p>
                                        <span>x{{ $checkout->quantity }}</span>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="or-price">
                                        {{ number_format($checkout->product->pro_new_price * $checkout->quantity )}}đ
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                </div>
                <div class="or-mid">
                    <div class="row">
                        <div class="col-6">
                            <div class="or-logo">
                                <img src="./assets/images/logo_nne.png" alt="">
                                <p style="display: inline-block;">@lang('main.order.phan_phoi') <span>Sky Mart</span></p>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="or-total">
                                <p style="font-size: 15px;">@lang('admin.orders.ship_method.ship_method'): <span
                                        style="font-size: 13px;">@lang('admin.orders.ship_method.'.config('app.ship_method.'.
                                        $order->ship_method))</span></p>
                                <p style="font-size: 15px;">@lang('main.ship.ship_fee'): <span
                                        style="font-size: 13px; margin-left: 90px;">
                                    @if ($order->ship_method == 1) 30.000đ @else
                                            50.000đ @endif
                                    </span></p>

                                <p><i class="fas fa-coins"></i> @lang('main.cart.total_price'):
                                    <span>{{ $order->order_total }}đ</span>
                                </p>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="or-bot">
                    <div class="or-btn">
                        <button><a href="{{ route('order.history', Auth::user()->user_id) }}">Quay lại</a></button>
                    </div>
                </div>

            </div>

        </div>
        @else

        <div class="row">
          <div class="col-md-12 justify-content-center text-center">
            <i class="far fa-angry text-center text-danger" style="font-size: 300px"></i>
          </div>
        </div>
        @endif
    </div>
@endsection
