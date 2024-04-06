@extends('layouts.admin')
@section('title', trans('admin.home'))
@section('content')
    <div class="right_col" role="main">
        <!-- top tiles -->  
        <div class="row" style="display: inline-block; width:100%;">
            <div class="tile_count">
                <div class="col-md-2 col-sm-4 tile_stats_count">
                    <span class="count_top"><i class="fa fa-user"></i> @lang('admin.chart.user_total')</span>
                    <div class="count">{{ $user_total }}</div>
                </div>
                <div class="col-md-2 col-sm-4  tile_stats_count">
                    <span class="count_top"><i class="fa fa-user"></i> @lang('admin.chart.admin_total')</span>
                    <div class="count">{{ $admin_total }}</div>
                </div>
                <div class="col-md-1 col-sm-4  tile_stats_count">
                    <span class="count_top"><i class="fa fa-user"></i> Nam</span>
                    <div class="count green">{{ $user_male }}</div>
                </div>
                <div class="col-md-1 col-sm-4  tile_stats_count">
                    <span class="count_top"><i class="fa fa-user"></i>Nữ</span>
                    <div class="count">{{ $user_female }}</div>
                </div>
                <div class="col-md-2 col-sm-4  tile_stats_count">
                    <span class="count_top"><i class="fa fa-user"></i> @lang('admin.chart.review_total')</span>
                    <div class="count">{{ $review_total }}</div>
                </div>
                <div class="col-md-4 col-sm-4  tile_stats_count">
                    <span class="count_top"><i class="fa fa-user"></i>Doanh thu</span>
                    <div class="count"><p>{{ number_format($daban)}} đ</p></div>
                </div>

            </div>
            
        </div>
        <!-- /top tiles -->

        <div class="row">
            <div class="col ">
               
                    <div class="col-md-3 col-sm-3  bg-white">
                        <div class="x_title">
                            <h2>@lang('admin.chart.best_product')</h2>
                            <div class="clearfix"></div>
                        </div>

                        <div class="col-md-12    ">
                            @foreach($bestProducts as $best)
                            <div>
                                <p>{{ $best->pro_name, 0, 30 }} <small class="text-danger">({{ $best->view }} @lang('main.product.view')) </small></p>
                                <div style="width:70%">
                                    <div class="progress progress_sm" style="width: 100%;">
                                        <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="{{ $best->view * 0.1 }}"></div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                         <div class="col-md-3 col-sm-3  bg-white ">
                           <h4>Thể loại sản phẩm</h4> 
                            <table class="table">
                                <tr>
                                    <th>Tên</th>
                                    <th>Số lượng</th>

                                </tr>
                            @foreach($categories as $cate)
                           
                                <tr>
                                    <th>
                                       <h5>{{$cate->cate_name}} <span>:</span></h5> 
                                    </th>
                                    <th>
                                        <h5>{{ $cate->products->count()}}</h5>
                                    </th>
                                </tr>
                            
                            @endforeach
                        </div>
                        </table>
                    </div>

                    <div class="clearfix"></div>
                </div>
            </div>

        </div>
        <br />

 
    </div>
@endsection
