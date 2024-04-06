@extends('layouts.auth')
@section('title', 'Tài khoản')
@section('content')

    <div class="information-page">
        <div class="container" style="background-color: white;">
            <div class="row">
                <div class="card" style="width: 52rem;">
                  
                    <div class="card-body">
                  <h5 class="card-title">Thông tin tài khoản</h5>
                
                     </div>
                     <ul class="list-group list-group-flush">
                       
                       <li>
                                    <img class="img-thumbnail" width="200" height="200" style="border-radius: 50%" src="{{asset('images/users/'.$user->avatar)}}" alt="">
                                </li>
                                <li class="img-thumbnail">Họ và tên: <span >{{ $user->name }}</span></li>
                                <li  class="img-thumbnail">Ngày sinh: <span>{{ $user->birthday }}</span></li>
                                <li  class="img-thumbnail">Số điện thoại: <span >{{ $user->phone }}</span></li>
                                <li  class="img-thumbnail">Email: <span >{{ $user->email }}</span></li>
                                <li  class="img-thumbnail">Giới tính: <span >@lang('admin.user.'. config('app.gender.'.
                                        $user->gender))</span></li>
             </ul>
              <div class="card-body">
            <div class="change-info-btn">
                                <a href="{{ route('account.edit', $user->user_id) }}">Cập nhật tài khoản</a>
                            </div>
         </div>
            </div>
            </div>
            <div class="row">
                <div class="col-3"></div>
                <div class="col-6">
                    <div class="infor">
                        <div class="infor-title">
                            <img src="./assets/images/logo_nne.png" alt="">
                            <h3 class="text-align-center"></h3>
                        </div>
                        <div class="infor-main">
                            <ul>
                                
                            </ul>
                            
                        </div>
                    </div>
                </div>
                <div class="col-3"></div>
            </div>
        </div>
    </div>

@endsection
