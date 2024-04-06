@extends('layouts.admin')
@section('content')
 <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3></h3>
                </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12 col-sm-12 ">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Contacts</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                               
                                
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
                                                <tr class="">
                                                    <th>Tên</th>
                                                    <th>Email</th>
                                                    <th>SĐT</th>
                                                    <th>Tin nhắn</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($contacts as $ct)
                                                <tr class="">
                                                    <th>{{ $ct->name }}</th>
                                                      <th>{{ $ct->email  }}</th>
                                                        <th>{{ $ct->sdt }}</th>
                                                          <th>{{ $ct->message }}</th>
                                                           

                                                    
                                                    <th>
                                                        <form action="{{ route('admin.contacts.destroy', $ct->id) }}" onsubmit="return confirm('Xác nhận xóa');" method="post">
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