@extends('layouts.auth')
@section('title', 'Thông tin')
@section('content')

<div class="about-page">
    
    <div class="contact">
     <div class="container">
      <div class="form-contact">
        <div class="row" style="padding-bottom: 40px;">
          <iframe   src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1963895.4997836507!2d108.252355!3d15.975292999999999!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x1295cb3d313469c9!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBDw7RuZyBuZ2jhu4cgVGjDtG5nIHRpbiB2w6AgVHJ1eeG7gW4gdGjDtG5nIFZp4buHdCAtIEjDoG4!5e0!3m2!1svi!2sus!4v1671715054058!5m2!1svi!2sus" width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <div class="contact-title">
            <h3>@lang('main.about.line7')</h3>
        </div>
        <div class="contack-form">
          <div class="row">
            <div class="col-2"></div>
            <div class="col-8">
           <form action="/send" onsubmit="return check1()"  method="POST">
                @csrf                       
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label class="form-control-label mbr-fonts-style display-7" for="">@lang('main.acc.fullname')</label>
                      <input type="text" class="form-control" name="name" id="usrname" required >
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label class="form-control-label mbr-fonts-style display-7" for="">Email</label>
                          <input id="email" type="email" class="form-control" name="email" required>
                          @error('email')
                              <span class="alert alert-danger" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      {{-- <label class="form-control-label mbr-fonts-style display-7" for="">Email</label>
                      <input type="text" class="form-control" name="email" id="email" required> --}}
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label class="form-control-label mbr-fonts-style display-7" for="">SĐT</label>
                      <input type="text" class="form-control" name="sdt" id="usrsdt" required>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label class="form-control-label mbr-fonts-style display-7" for="">Nội dung</label>
                  <textarea class="form-control" name="message" id="message" cols="60" rows="10" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary" value="gửi"  >
                  Gửi
              </button>          
                </form>
            </div>
            <div class="col-2"></div>
          </div>
        </div>
     </div>
     </div>
    
   </div>
    
  </div>
  <script type="text/javascript"> 
    function check1() { 
      var usrname = document.getElementById('usrname'); 
      var usrsdt=document.getElementById('usrsdt');
      var message=document.getElementById('message');

    
       

      var ftsdt= /((09|03|07|08|05)+([0-9]{8})\b)/g;
      if (/[0-9]/.test(usrname.value)||usrname.value.trim().length===0) { 
               alert('Tên không hợp lệ vui lòng nhập lại.');
               usrname.focus; 
               return false; 
      }
if (!ftsdt.test(usrsdt.value)) { 
  alert('Số điện thoại không hợp lệ.');
  
  return false; 
}
if (!message.value) { 
  alert('Vui lòng nhập message!');
  message.focus; 
  return false; 
}
 
alert('Chúng tôi sẽ liên hệ sớm nhất có thể. Trân trọng!'); 
return true;
}
    </script>


@endsection