@extends('layouts.auth')
@section('title', 'lịch sử đặt hàng')
@section('content')

    <div class="order-history">
        <div class="container">
            <div class="order-page">
                <div class="or-top">
                    <div class="or-title">
                        <div class="row">
                            <div class="col-7">
                                <h3><i class="fa fa-file-invoice-dollar"></i> @lang('main.order.your_order')</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="or-body p-5">
                  @if($history->user_id == Auth::user()->user_id)
                    <div class="table-responsive">
                        <table class="table table-bordered bg-white text-center">
                            <thead>
                                <tr>
                                    <th>@lang('admin.orders.id')</th>
                                    <th>@lang('admin.orders.quantity')</th>
                                    <th>@lang('admin.orders.total_price')</th>
                                    <th>@lang('admin.orders.order_status.order_status')</th>
                                    <th colspan="2">@lang('admin.action.option')</th>
                                </tr>
                            </thead>
                            <tbody>
                              @foreach($history->orders as $order)
                                <tr>
                                  <td>#{{ $order->order_id }}</td>
                                  <td>{{ $order->order_qty }}</td>
                                  <td>{{ $order->order_total }}</td>
                                  <td>@lang('admin.orders.order_status.'.config('app.order_status.'. $order->order_status))</td>
                                  <td>
                                      <a href="{{ route('order.history-detail', $order->order_id) }}" class="btn btn-outline-info">
                                        <i class="fa fa-eye"></i>
                                      </a>
                                  </td>
                                  <td>
                                    <form action="{{ route('order.cancel', $order->order_id) }}" method="post">
                                      @csrf
                                      <button @if($order->order_status == 0) type="submit" 
                                        class="btn btn-outline-danger" @else type="button" 
                                        class="btn btn-outline-secondary" disabled @endif>
                                        <i class="fa fa-times-circle"></i> @lang('main.order.order_cancel')
                                      </button>
                                    </form>
                                  </td>
                                </tr>
                              @endforeach
                            </tbody>
                        </table>
                    </div>
                  @else
                  <div class="row">
                    <div class="col-md-12 justify-content-center text-center">
                      <i class="far fa-angry text-center text-danger" style="font-size: 300px"></i>
                    </div>
                  </div>
                    
                  @endif
                </div>
            </div>
        </div>
    </div>

@endsection
