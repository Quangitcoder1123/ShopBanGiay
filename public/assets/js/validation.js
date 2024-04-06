$().ready(function(){
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

$("#login2").validate({
    onfocusout: false,
    onkeyup: false,
    onclick: false,
    rules: {
        "username": {
            required: true,
            maxlength: 25
        },
        "fullname":{
            required: true,
        },
        "email":{
            required: true,
            email: true
        },
        "birthday":{
            required: true,
            date: true
        },
        "password": {
            required: true,
            minlength: 8
        },
        
    },
    messages: {
        "username": {
            required: "*Bạn chưa nhập tên đăng nhập",
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
        "password": {
            required: "*Bạn chưa nhập password",
            minlength: "*Hãy nhập ít nhất 8 ký tự"
        },
        
    },
    
});


$("#login").validate({
    onfocusout: false,
    onkeyup: false,
    onclick: false,
    rules: {
        "username": {
            required: true,
            maxlength: 25
        },
        "password": {
            required: true,
            minlength: 8
        },
        
    },
    messages: {
        "username": {
            required: "*Bạn chưa nhập tên đăng nhập",
            maxlength: "*Hãy nhập tối đa 25 ký tự"
        },
        "password": {
            required: "*Bạn chưa nhập password",
            minlength: "*Hãy nhập ít nhất 8 ký tự"
        },
        
    },
    
});
});