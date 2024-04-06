@extends('layouts.auth')
@section('title', 'Đăng ký')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                <div class="row">
                       <div class="col-md-6 text-center "><a class="btn btn-link" href="{{url('login')}}">Đăng Nhập</a></div> 
                       <div class="col-md-6 text-center btn">Đăng Ký</div>
                    </div></div>
                 
                <div class="card-body">
 
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="username" class="col-md-4 col-form-label text-md-right">Tên đăng nhâp:*</label>

                            <div class="col-md-6"> 
                                <input id="username" type="text" class="form-control" name="username" required>

                                @error('username')
                                    <span class="alert alert-danger" role="alert">
                                        <strong>Tên đăng nhập không đúng</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Email*</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" required>

                                @error('email')
                                    <span class="alert alert-danger" role="alert">
                                        <strong>Email không đúng</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Mật khẩu*</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @error('password')
                                    <span class="alert alert-danger" role="alert">
                                        <strong>Ít nhất 6 kí tự</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Nhập lại mật khẩu*</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                             @error('confirmed')
                                    <span class="alert alert-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="form-group row">
                            <label for="lastname" class="col-md-4 col-form-label text-md-right">Họ và tên*</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" required>

                                @error('name')
                                    <span class="alert alert-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        

                        

                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">Số điện thoại</label>

                            <div class="col-md-6">
                                <input id="phone" type="tel" class="form-control" name="phone" required>

                                @error('phone')
                                    <span class="alert alert-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="birthday" class="col-md-4 col-form-label text-md-right">Ngày sinh</label>

                            <div class="col-md-6">
                                <input id="birthday" type="date" class="form-control" name="birthday" required>

                                @error('birthday')
                                    <span class="alert alert-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="gender" class="col-md-4 col-form-label text-md-right">Giới tính</label>

                            <div class="col-md-6">
                                 <select name="gender" id="">
                                    @foreach (config('app.gender') as $key => $value)
                                        <option value="{{ $key }}"> @lang('main.acc.'.$value) </option>
                                    @endforeach
                                </select>
                                @error('gender')
                                    <span class="alert alert-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>  
 </div>
@endsection
