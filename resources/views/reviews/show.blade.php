@extends('layouts.admin')
@section('title', trans('admin.title'))
@section('content')
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>{{ $rev->pro_name }}</h3>
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
                                                    <th>@lang('admin.user.username')</th>
                                                    <th>@lang('admin.reviews.cmt')</th>
                                                    <th>@lang('admin.reviews.rate')</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($rev->reviews as $r)
                                                <tr class="text-center">
                                                    <th>{{ $r->user->username }}</th>
                                                    <th>{{ $r->comment}}</th>
                                                    <th>{{ $r->rate}}</th>
                                                    <th>
                                                        <form onsubmit="return confirm('Xác nhận xóa');" action="{{ route('admin.review.destroy', $r->rev_id) }}" method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit">@lang('admin.action.delete')</button>
                                                        </form>
                                                    </th>
                                                </tr>
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
