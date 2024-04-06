@extends('layouts.admin')
@section('title', 'admin.title')
@section('content')
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>@lang('admin.orders.order_view')</h3>
                </div>
            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12 col-sm-12 ">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>@lang('admin.orders.order_list')</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                        aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                    {{-- <div class="dropdown-menu"
                                        aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="#">Settings 1</a>
                                        <a class="dropdown-item" href="#">Settings 2</a>
                                    </div> --}}
                                </li>
                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="card-box table-responsive">
                                        <div class="card-header text-center">
                                            <i class="fas fa-file-invoice-dollar"></i>@lang('admin.orders.order_of') {{ $order->order_name }}
                                        </div>
                                        <div class="card-body">
                                            <table>
                                                <tr>
                                                    <td>@lang('admin.orders.order_phone')</td>
                                                    <td>: {{ $order->order_phone }}</td>
                                                </tr>
                                                <tr>
                                                    <td>@lang('admin.orders.order_city')</td>
                                                    <td>: {{ $order->order_city }}</td>
                                                </tr>
                                                <tr>
                                                    <td>@lang('admin.orders.order_district')</td>
                                                    <td>: {{ $order->order_district }}</td>
                                                </tr>
                                                <tr>
                                                    <td>@lang('admin.orders.order_ward')</td>
                                                    <td>: {{ $order->order_ward }}</td>
                                                </tr>
                                                <tr>
                                                    <td>@lang('admin.orders.order_address')</td>
                                                    <td>: {{ $order->order_address }}</td>
                                                </tr>
                                                <tr>
                                                    <td>@lang('admin.orders.ship_method.ship_method')</td>
                                                    <td>: @lang('admin.orders.ship_method.'.config('app.ship_method.'. $order->ship_method))</td>
                                                </tr>
                                                <tr>
                                                    <td>@lang('admin.orders.pay_method.pay_method')</td>
                                                    <td>: @lang('admin.orders.pay_method.'.config('app.pay_method.'. $order->pay_method))</td>
                                                </tr>
                                            </table> <br>

                                            <img style="width: 300px;" src="images/cart/{{ $order->bill_image }}" alt="">

                                            <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>@lang('admin.products.pro_name')</th>
                                                        <th>@lang('admin.products.pro_new_price')</th>
                                                        <th>@lang('admin.products.quantity')</th>
                                                        <th>@lang('admin.orders.order_total')</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($order->checkouts as $checkout)
                                                    @if($checkout->product)
                                                        <tr>
                                                            <td>{{ $checkout->product->pro_name }}</td>
                                                            <td>{{ $checkout->product->pro_new_price }}</td>
                                                            <td>{{ $checkout->quantity }}</td>
                                                            <td>{{ $checkout->product->pro_new_price * $checkout->quantity }}</td>
                                                        </tr>
                                                    @else
                                                    <tr>
                                                        <td>@lang('admin.orders.product_deleted')</td>
                                                    </tr>
                                                    @endif
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            
                                            <p>@lang('main.ship.ship_fee'): 
                                            @if($order->ship_method == 1)
                                                30.000 đ
                                            @else
                                                50.000 đ
                                            @endif
                                            </p>
                                            <p>@lang('admin.orders.order_total'): {{ $order->order_total }}</p>
                                        </div>
                                        <div class="card-footer text-center">
                                            <form action="{{ route('admin.order.update', $order->order_id) }}" method="post">
                                                @csrf
                                                @method('PUT')
                                                <label for="">@lang('admin.orders.order_status.order_status'): </label>
                                                <select onchange='this.form.submit()' name="order_status" id="" @if($order->order_status == 3 || $order->order_status == 4 ) disabled="disabled" @endif>
                                                    <option value="">@lang('admin.orders.order_status.'.config('app.order_status.'. $order->order_status))</option>
                                                    @foreach (config('app.order_status') as $key => $value)
                                                        <option value="{{ $key }}">@lang('admin.orders.order_status.'.config('app.order_status.'. $key))</option>
                                                    @endforeach
                                                </select>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
