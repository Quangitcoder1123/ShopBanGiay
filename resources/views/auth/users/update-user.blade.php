@extends('layouts.auth')
@section('title', 'Tài khoản')
@section('content')
    @if (Auth::user()->user_id == $user->user_id)
        <div class="information-page">
            <div class="container" style="background-color: white;">
                <div class="row">
                    <div class="col-3"></div>
                    <div class="col-6">
                        <div class="infor">
                            <div class="infor-title">
                                <img src="./assets/images/logo_nne.png" alt="">
                                <h3 class="text-align-center">Cập nhật tài khoản</h3>
                            </div>
                            <div class="infor-main">
                                <form action="{{ route('account.update', $user->user_id) }}" method="post" id="change" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="col-5">
                                            <label for="">Họ và tên:</label>
                                        </div>
                                        <div class="col-7">
                                            <input type="text" name="name" value="{{ $user->name }}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-5">
                                            <label for="">Số điện thoại:</label>
                                        </div>
                                        <div class="col-7">
                                            <input type="text" name="phone" value="{{ $user->phone }}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-5">
                                            <label for="">Email:</label>
                                        </div>
                                        <div class="col-7">
                                            <input name="email" value="{{ $user->email }}" type="email">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-5">
                                            <label for="">Ngày sinh:</label>
                                        </div>
                                        <div class="col-7">
                                            <input name="birthday" value="{{ $user->birthday }}" type="date">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-5">
                                            <label for="">Giới tính:</label>
                                        </div>
                                        <div class="col-7">
                                            <select name="gender">
                                                <option value="">...</option>
                                                <option value="1">@lang('admin.user.'. config('app.gender.1'))</option>
                                                <option value="0">@lang('admin.user.'. config('app.gender.0'))</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-5">
                                            <label for="">Avatar : </label>
                                        </div>
                                        <div class="col-7">
                                            <input name="avatar"  type="file">
                                        </div>
                                    </div>

                                    <button type="submit">Thay đổi</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-3"></div>
                </div>
            </div>
        </div>
    @else
        <div class="information-page">
            <div class="container" style="background-color: white;">
                <div class="row">
                    <div class="col-3"></div>
                    <div class="col-6">
                        <div class="infor">
                            <div class="infor-title">
                                <img src="./assets/images/logo_nne.png" alt="">
                                <h3 class="text-align-center">Bạn không thể thay đổi thông tin của người dùng khác!</h3>
                            </div>
                        </div>
                        <div class="col-3"></div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <script>
        $(document).ready(function(){
            $("#change").validate({
		onfocusout: false,
		onkeyup: false,
		onclick: false,
		rules: {
            "fullname":{
                required: true,
            },
            "phone": {
				required: true,
				maxlength: 10
			},
            "email":{
                required: true,
                email: true
            },
            "birthday":{
                required: true,
                date: true
            },
			"avatar": {
				required: true,
				file: true
			},
			
		},
		messages: {
			"phone": {
				required: "*Bạn chưa nhập số điện thoại",
				maxlength: "*Hãy nhập tối đa 25 ký tự"
			},
            "fullname": {
				required: "*Bạn chưa nhập tên",
				maxlength: "*Hãy nhập tối đa 25 ký tự"
			},
            "email": {
				required: "*Bạn chưa nhập email",
				email: "*Nhập sai định dạng email"
			},
            "birthday": {
				required: "*Bạn chưa nhập ngày sinh",
				date: "*Nhập sai ngày"
			},
			"avatar": {
				required: "*Bạn chưa chọn ảnh",
				
			},
			
        },
        
	});
        });
    </script>
@endsection
