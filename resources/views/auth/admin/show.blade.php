@extends('layouts.admin')
@section('content')
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>@lang('admin.user.user_manage')</h3>
                </div>

                <div class="title_right">
                    <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="{{ trans('admin.action.search') }}">
                            <span class="input-group-btn">
                                <button class="btn btn-secondary" type="submit">Go!</button>
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12 col-sm-12 ">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Thông tin người dùng</h2>
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
                                    <div class="information-page">
                                        <div class="container" style="background-color: white;">
                                            <div class="row">
                                                <div class="col-5"> <div class="row">
                                                    <h4>Đơn đã mua</h4>
                                                 <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>@lang('admin.orders.id')</th>
                                                    <th>@lang('admin.orders.quantity')</th>
                                                    <th>@lang('admin.orders.total_price')</th>
                                                </tr>
                                            </thead>
                                              <?php $sumt=0; ?>
                                            <tbody>
                                                @foreach ($user->orders as $order)

                                                <?php if($order->order_status==2||$order->order_status==4)
                                                    {
                                                        $sumt+=$order->order_total;
                                                   }
                                                   ?>

                                                    <tr @if ($order->order_status == 0)
                                                        class="bg-warning"

                                                @endif>
                                                <td>{{ $order->order_id }}</td>
                                                <td>{{ $order->order_qty }}</td>
                                                <td>{{ $order->order_total }}</td>
                                                <td class="text-center"><a
                                                        href="{{ route('admin.order.show', $order->order_id) }}"
                                                        @if($order->order_status != 0) class="btn btn-outline-light btn-xs">  @else class="btn btn-outline-light btn-xs"> @endif
                                                        <i class="fa fa-eye text-dark"></i></a></td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                            
                                        </table>
                                            </div></div>
                                                <div class="col-4">
                                                    <div class="infor">
                                                        <div class="infor-title">
                                                            <h3 class="text-align-center">Thông tin tài khoản</h3>
                                                        </div>
                                                        <div class="infor-main">
                                                            <ul>
                                                            <li><img src="images/users/{{ $user->avatar }}" alt="" class="img-thumbnail"></li>
                                                                <li>Họ và tên: <span
                                                                        class="inf">{{ $user->name }}</span></li>
                                                                <li>Ngày sinh: <span
                                                                        class="inf">{{ $user->birthday }}</span></li>
                                                                <li>Số điện thoại: <span
                                                                        class="inf">{{ $user->phone }}</span></li>
                                                                <li>Email: <span class="inf">{{ $user->email }}</span></li>
                                                                <li>Giới tính: <span class="inf">@lang('admin.user.'.
                                                                        config('app.gender.'.
                                                                        $user->gender))</span></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                              
                                                <div class="col-3">
                                                    <h3>Số đơn đã mua <span>{{ $user->orders->count() }}</span></h3>
                                                     <h3>Tổng tiền đã thanh toán:<span>{{ $sumt}}</span></h3>

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
        </div>
    </div>
@endsection
