@extends('layouts.admin')
@section('title', trans('admin.title'))
@section('content')
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>@lang('admin.reviews.rev_manage')</h3>
                </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12 col-sm-12 ">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>@lang('admin.reviews.rev_view')</h2>
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

                                        <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                                            <thead>
                                                <tr class="text-center">
                                                    <th>@lang('admin.products.pro_name')</th>
                                                    <th>@lang('admin.reviews.num_rev')</th>
                                                    <th>@lang('admin.action.show')</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($reviews as $rev)
                                                @if($rev->reviews->count() > 0)
                                                <tr class="text-center">
                                                    <th class="text-left">{{ $rev->pro_name }}</th>
                                                    <th>{{ $rev->reviews->count() }}</th>
                                                    <th><a href="{{ route('admin.review.show', $rev->pro_id) }}">@lang('main.see_more')</a></th>
                                                </tr>
                                                @endif
                                                @endforeach
                                            </tbody>
                                        </table>
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
