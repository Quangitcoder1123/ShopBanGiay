@extends('layouts.auth')
@section('title', 'Đổi mật khẩu')
@section('content')

    <div class="information-page">
        <div class="container" style="background-color: white;">
            <div class="row">
                <div class="col-3"></div>
                <div class="col-6">
                    <div class="infor">
                        <div class="infor-title">
                            <img src="./assets/images/logo_nne.png" alt="">
                            <h3 class="text-align-center">Đổi mật khẩu</h3>
                        </div>
                        <div class="infor-main">
                            <form action="{{ route('account.updatePass', $user->user_id) }}" id="change-pass" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-5">
                                        <label for="">Nhập mật khẩu mới:</label>
                                    </div>
                                    <div class="col-7">
                                        <input type="password" name="password">
                                    </div>
                                </div>
                                <button type="submit">Đổi mật khẩu</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-3"></div>
            </div>
        </div>


    </div>
    <script>
        $(document).ready(function(){
            $("#change-pass").validate({
		onfocusout: false,
		onkeyup: false,
		onclick: false,
		rules: {
            "password":{
                required: true,
                minlength: 8
            },	
		},
		messages: {
			"password": {
				required: "*Bạn chưa nhập mật khẩu",
				maxlength: "*Hãy nhập ít nhất 8 ký tự"
			},
        },
        
	});
        });
    </script>

@endsection
