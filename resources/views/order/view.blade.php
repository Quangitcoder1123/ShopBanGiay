@extends('layouts.admin')
@section('title', 'Order')
@section('content')
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>@lang('admin.orders.order_manage')</h3>
                </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12 col-sm-12 ">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>@lang('admin.orders.order_view')</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                        aria-expanded="false"><i class="fa fa-wrench"></i></a>
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

                                        <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>@lang('admin.orders.id')</th>
                                                    <th>@lang('admin.orders.order_name')</th>
                                                    <th>@lang('admin.orders.order_phone')</th>
                                                    <th>@lang('admin.orders.quantity')</th>
                                                    <th>@lang('admin.orders.total_price')</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($orders as $order)
                                                    <tr @if ($order->order_status == 0)
                                                        class="bg-primary"
                                                @endif
                                                @if ($order->order_status == 1)
                                                        class="bg-info"
                                                @endif
                                                @if ($order->order_status == 2)
                                                        class="bg-success"
                                                @endif
                                                @if ($order->order_status == 3)
                                                        class="bg-light"
                                                @endif
                                                @if ($order->order_status == 4)
                                                        class="bg-secondary"
                                                @endif
                                                >
                                                <td>{{ $order->order_id }}</td>
                                                <td>{{ $order->order_name }}</td>
                                                <td>{{ $order->order_phone }}</td>
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
                                    </div>
                                    <div> {{$orders->links()}}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
