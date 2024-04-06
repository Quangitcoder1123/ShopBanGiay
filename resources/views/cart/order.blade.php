@extends('layouts.auth')
@section('title', 'Đặt hàng')
@section('js')
  <script src="{{asset('ogani/js/jquery.nice-select.min.js')}}"></script>
@endsection('js')
@section('content')
    <link rel="stylesheet" href="{{ asset('/assets/css/base.css') }}">
    <div class="container">
        <div class="justify-content-center">
            <div class="   text-center p-0 mt-3 mb-2">
                <div class="card-c px-0 pt-4 pb-0 mt-3 mb-3">
                    
                    <form action="{{ route('order.store') }}" id="msform" method="POST" enctype="multipart/form-data">
                        @csrf
                        <!-- progressbar -->
                        <ul id="progressbar">
                            <li class="active" id="account"><strong>@lang('main.order.title_info')</strong></li>
                            <li id="personal"><strong>@lang('main.order.title_method')</strong></li>
                            <li id="payment"><strong>@lang('main.order.title_viewcart')</strong></li>
                            <li id="confirm"><strong>@lang('main.order.title_complete')</strong></li>
                        </ul>
                        <fieldset>
                            <div class="form-card">

                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <label class="fieldlabels col-3">@lang('main.order.name') : </label>
                                            <input id="huhu-name" name="order_name" type="text" class="col-8" value="{{Auth::user()->name }}" />
                                            {{--  tên  --}}

                                            <label class="fieldlabels col-3">@lang('main.order.phone'): </label>
                                            <input id="first-name" type="number" name="order_phone" class="col-8" value="{{Auth::user()->phone }}" />
                                            {{--  sđt nhận hàng  --}}

                                            <label class="fieldlabels col-3">@lang('main.order.city'): </label>
                                         
                                            {{--  thành phố  --}}

                                            <select name="calc_shipping_provinces"  class="calc_shipping_provinces" required="" style="    flex: 0 0 66.666667%;
    max-width: 66.666667%;">
                                                <option value="">Tỉnh / Thành phố</option>
                                            </select>

                                            <label class="fieldlabels col-3">@lang('main.order.district'): </label>
                                            


                                            <select id="file"  name="calc_shipping_district" class="calc_shipping_district" required=""  style="    flex: 0 0 66.666667%;
    max-width: 66.666667%;">
                                                    <option value="">Quận / Huyện</option>
                                            </select>
                                            {{--  quận huyện  --}}

                                            <label class="fieldlabels col-3">@lang('main.order.ward'): </label>
                                            <input id="cars" type="text" name="order_ward" class="col-8" placeholder="{{ trans('main.order.ward') }}" />
                                            {{--  phường xã  --}}

                                            <label class="fieldlabels col-3">@lang('main.order.address'): </label>
                                            <input id="adress" type="text" name="order_address" class="col-8" placeholder="{{ trans('main.order.address') }}" />
                                            {{--  địa chỉ  --}}





<input id="checkprice"  name="order_city"  class="billing_address_1" name="" type="hidden"  value="">
<input id="file"  name="order_district" class="billing_address_2" name="" type="hidden" value="">
                                        </div>

                                    </div>
                                    <div class="col-md-3"></div>
                                </div>

                            </div> <input type="button" id="submit" name="next" class="next action-button" value="{{ trans('admin.action.next') }}" />
                        </fieldset>
                        <fieldset>

                            <div class="form-card">
                                <div class="row">
                                   
                                    <div class="col-md-6 ">
                                        <div class="style_shiping">
                                            <h3>1. @lang('main.ship.select_ship')</h3>
                                            <div class="shipping-method">
                                                <div class="shipping-method2">
                                                    <label class="radio-check"  onClick="document.getElementById('shipf').innerHTML='30000'; document.getElementById('tongtien').innerHTML={{   filter_var(Cart::subTotal(), FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION)+30000}} " >
                                                        <p style="font-weight:bold">@lang('main.ship.ship1') </p>
                                                        <input checked="checked" type="radio" value="1" name="ship_method">
                                                        <span class="checkmark" ></span>
                                                        <div style="font-size: 14px; color: rgb(77, 75, 74);">
                                                            <p>@lang('main.ship.ship_desc1')</p>
                                                            <p>@lang('main.ship.ship_fee'): 30.000đ</p>
                                                        </div>
                                                    </label>
                                                    <label class="radio-check"  onClick=" document.getElementById('shipf').innerHTML='50000'; document.getElementById('tongtien').innerHTML={{filter_var(Cart::subTotal(), FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION)+50000}} ">
                                                        <p style="font-weight:bold">@lang('main.ship.ship2')</p>
                                                        <input type="radio" value="2" name="ship_method"  >
                                                        <span class="checkmark"></span>
                                                        <div style="font-size: 14px; color: rgb(77, 75, 74);">
                                                            <p>@lang('main.ship.ship_desc2')</p>
                                                            <p>@lang('main.ship.ship_fee'): 50.000đ</p>
                                                        </div>
                                                    </label>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="style_shiping">
                                            <h3>2. @lang('main.payment.select_pay')</h3>
                                            <div class="shipping-method">
                                                <div class="shipping-method2">
                                                    <label class="radio-check">
                                                        <p style="font-weight:bold"><img class="method-icon"
                                                                src="https://frontend.tikicdn.com/_desktop-next/static/img/icons/checkout/icon-payment-method-cod.svg"
                                                                alt=""> @lang('main.payment.monney') </p>
                                                        <input id="dongchuyenkhoan" type="radio" checked="checked" name="pay_method" value="1">
                                                        <span class="checkmark"></span>

                                                    </label>
                                                    <label class="radio-check">
                                                        <p style="font-weight:bold"><img class="method-icon"
                                                                src="https://frontend.tikicdn.com/_desktop-next/static/img/icons/checkout/icon-payment-method-credit.svg"
                                                                alt=""> @lang('main.payment.online')</p>
                                                        </p>
                                                        <input id="mochuyenkhoan" type="radio" name="pay_method" value="2">
                                                        <span class="checkmark"></span>

                                                    </label>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6"> <div class="col-md-10">
                                        <div class="small-container  cart-page2 ">
                                            <div class="row">
                                                <div class="">
                                                    <table style="text-align:center">
                                                        <tr>
                                                            <th>@lang('admin.products.pro_name')</th>
                                                            <th>@lang('admin.products.pro_image')</th>
                                                            <th>@lang('admin.products.quantity')</th>
                                                            <th>@lang('main.cart.price')</th>
                                                        </tr>
                                                        @foreach(Cart::content() as $item)
                                                        <tr>
                                                            <td>{{ $item->name }}</td>
                                                            <td>
                                                                <div class="cart-info">
                                                                    <img src="{{asset('images/products/'.$item->options->image )}}" alt="">
                                                                </div>
                                                            </td>
                                                            <td>{{ $item->qty }}</td>
                                                            <td>{{ $item->price * $item->qty }}đ</td>
                                                            <input type="hidden" name="total_price" value="{{ $item->price * $item->qty }}">
                                                        </tr>
                                                        @endforeach
                                                    </table>
                                                    <div class="total-price2">
                                                        <table>
                                                            <tr>
                                                                <td>@lang('main.cart.total_price')</td>
                                                                <td>{{ Cart::subTotal() }}đ</td>
                                                            </tr>
                                                            <tr>
                                                                <td > Phí vận chuyển</td>
                                                                <td><i id="shipf">30000</i> đ </td>
                                                            </tr>
                                                        </table>

                                                    </div>
                                                     <h4> Tổng tiền thanh toán là : <span id="tongtien">{{filter_var(Cart::subTotal(), FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION)+30000}}</span> vnđ  </h4>

                                                </div>

                                            </div>
                                        </div>
                                    </div></div>
                                </div>
                            </div><input type="button" name="previous" class="previous action-button-previous"
                                value="{{ trans('admin.action.return') }}" /> <input type="submit" name="next" class="next action-button"
                                value="{{ trans('admin.action.next') }}" />



                        </fieldset>
                     <fieldset>

                                 <div class="form-card">
                                <div class="row">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-10">
                                        <div class="small-container  cart-page2 ">
                                            <div class="row">
                                                <h3> Đang thực hiện đặt hàng</h3>
                                                    <h4>Vui lòng chờ!</h4>
                                                <div class="col-md-10">
                                                    <table style="text-align:center">
                                                        <tr>
                                                            <th>@lang('admin.products.pro_name')</th>
                                                            <th>@lang('admin.products.pro_image')</th>
                                                            <th>@lang('admin.products.quantity')</th>
                                                            <th>@lang('main.cart.price')</th>
                                                        </tr>
                                                        @foreach(Cart::content() as $item)
                                                        <tr>
                                                            <td>{{ $item->name }}</td>
                                                            <td>
                                                                <div class="cart-info">
                                                                    <img src="{{asset('images/products/'.$item->options->image )}}" alt="">
                                                                </div>
                                                            </td>
                                                            <td>{{ $item->qty }}</td>
                                                            <td>{{ $item->price * $item->qty }}đ</td>
                                                            <input type="hidden" name="total_price" value="{{ $item->price * $item->qty }}">
                                                        </tr>
                                                        @endforeach
                                                    </table>
                                                    <div class="total-price2">
                                                        <table>
                                                            <tr>
                                                                <td>@lang('main.cart.total_price')</td>
                                                                <td>{{ Cart::subTotal() }}đ</td>
                                                            </tr>
                                                            <tr>
                                                                <td > Phí vận chuyển</td>
                                                                <td><i id="shipf">30000</i> đ</td>
                                                            </tr>
                                                        </table>
                                                    </div>

                                                </div>

                                                

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2"></div>
                                </div>
                            </div> 
                           
                        </fieldset>
                        <fieldset>
                            <div class="form-card">
                                <br><br>
                                </h2> <br>
                                <div class="row justify-content-center">
                                    <div class="col-3 text-center justify-content-center">
                                        <div style="width: 300px; height:300px" class="spinner-border text-info" role="status">
                                            <span class="sr-only"></span>
                                          </div>
                                    </div>
                                </div> <br>

                                <div class="row justify-content-center">
                                    <div class="col-7 text-center">
                                        <h4 class=" text-center">@lang('main.order.loading')</h4>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function(){
          $("input#submit").click(function(){
            var susu = $("input#huhu-name").val();
            var file = $("input#file").val();
            var ckeditor = $("input#ckeditor1").val();
            var first_name = $("input#first-name").val();
            var getSelect = $("input#cars").val();
            var getCheckprice = $("input#checkprice").val();
            var adress = $("input#adress").val();
            var flag = true
            if(susu ==''){
              $("input#huhu-name").css({"background" : "rgba(255, 147, 146, 0.3)", "border" : "2px solid rgb(255, 0, 0, 0.3)"});
              flag = false
            }else{
              $("input#huhu-name").css({"background" : "rgb(100 216 90 / 30%)", "border" : "2px solid rgb(147 161 146 / 30%)"});
            }
            if(file ==''){
                $("input#file").css({"background" : "rgba(255, 147, 146, 0.3)", "border" : "2px solid rgb(255, 0, 0, 0.3)"});
                alert("lỗi Địa chỉ!");
                flag = false

            }else{
                $("input#file").css({"background" : "rgb(100 216 90 / 30%)", "border" : "2px solid rgb(147 161 146 / 30%)"});
            }
            {{--    --}}
            if(first_name ==''){
                $("input#first-name").css({"background" : "rgba(255, 147, 146, 0.3)", "border" : "2px solid rgb(255, 0, 0, 0.3)"});
                flag = false
            }else{
                $("input#first-name").css({"background" : "rgb(100 216 90 / 30%)", "border" : "2px solid rgb(147 161 146 / 30%)"});
            }
            {{--    --}}
            if(getSelect ==''){
                $("input#cars").css({"background" : "rgba(255, 147, 146, 0.3)", "border" : "2px solid rgb(255, 0, 0, 0.3)"});
                flag = false
            }else{
                $("input#cars").css({"background" : "rgb(100 216 90 / 30%)", "border" : "2px solid rgb(147 161 146 / 30%)"});
            }
            {{--    --}}
            if(ckeditor ==''){
                $("input#ckeditor1").css({"background" : "rgba(255, 147, 146, 0.3)", "border" : "2px solid rgb(255, 0, 0, 0.3)"});
                flag = false
            }else{
                $("input#ckeditor1").css({"background" : "rgb(100 216 90 / 30%)", "border" : "2px solid rgb(147 161 146 / 30%)"});
            }
            {{--    --}}
            if(getCheckprice ==''){
              $("input#checkprice").css({"background" : "rgba(255, 147, 146, 0.3)", "border" : "2px solid rgb(255, 0, 0, 0.3)"});
              alert("lỗi Địa chỉ!");
              flag = false
          }else{
              $("input#checkprice").css({"background" : "rgb(100 216 90 / 30%)", "border" : "2px solid rgb(147 161 146 / 30%)"});
          }
          {{--    --}}
          if(adress ==''){
            $("input#adress").css({"background" : "rgba(255, 147, 146, 0.3)", "border" : "2px solid rgb(255, 0, 0, 0.3)"});
            flag = false
        }else{
            $("input#adress").css({"background" : "rgb(100 216 90 / 30%)", "border" : "2px solid rgb(147 161 146 / 30%)"});
        }
        {{--    --}}
            if(flag == true){
                var current_fs, next_fs, previous_fs; //fieldsets
                var opacity;
                var current = 1;
                var steps = $("fieldset").length;
              
                setProgressBar(current);
                $(".next").click(function() {
                    current_fs = $(this).parent(); //lấy thành phần cha trực tiếp của của thành phần chính
                    next_fs = $(this).parent().next(); //lấy thành phần cha trực tiếp của của thành phần sau
                    //Add Class Active
                    $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
                    //show the next fieldset
                    next_fs.show();
                    console.log(next_fs)
                    //hide the current fieldset with style
                    current_fs.animate({
                        opacity: 0
                    }, {
                        step: function(now) {
                            // for making fielset appear animation
                            opacity = 1 - now;
                            current_fs.css({
                                'display': 'none',
                                'position': 'relative'
                            });
                            next_fs.css({
                                'opacity': opacity
                            });
                        },
                        duration: 500
                    });
                    setProgressBar(++current);
                });
                $(".previous").click(function() {
                    current_fs = $(this).parent();
                    previous_fs = $(this).parent().prev();
                    //Remove class active
                    $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
                    //show the previous fieldset
                    previous_fs.show();
                    //hide the current fieldset with style
                    current_fs.animate({
                        opacity: 0
                    }, {
                        step: function(now) {
                            // for making fielset appear animation
                            opacity = 1 - now;
                            current_fs.css({
                                'display': 'none',
                                'position': 'relative'
                            });
                            previous_fs.css({
                                'opacity': opacity
                            });
                        },
                        duration: 500
                    });
                    setProgressBar(--current);
                });
                function setProgressBar(curStep) {
                    var percent = parseFloat(100 / steps) * curStep;
                    percent = percent.toFixed();
                    $(".progress-bar")
                        .css("width", percent + "%")
                }
                $(".submit").click(function() {
                    return false;
                })
            }
            return false
          });
        })
      </script>




 

<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js'> </script>
<script src='https://cdn.jsdelivr.net/gh/vietblogdao/js/districts.min.js'> </script>
<script>//<![CDATA[





if (address_2 = localStorage.getItem('address_2_saved')) {
  $('select[class="calc_shipping_district"] option').each(function() {
    if ($(this).text() == address_2) {
      $(this).attr('selected', '')
    }
  })
  $('input.billing_address_2').attr('value', address_2)
}
if (district = localStorage.getItem('district')) {
  $('select[class="calc_shipping_district"]').html(district)
  $('select[class="calc_shipping_district"]').on('change', function() {
    var target = $(this).children('option:selected')
    target.attr('selected', '')
    $('select[class="calc_shipping_district"] option').not(target).removeAttr('selected')
    address_2 = target.text()
    $('input.billing_address_2').attr('value', address_2)
    district = $('select[class="calc_shipping_district"]').html()
    localStorage.setItem('district', district)
    localStorage.setItem('address_2_saved', address_2)
  })
}
$('select[class="calc_shipping_provinces"]').each(function() {
  var $this = $(this),
    stc = ''
  c.forEach(function(i, e) {
    e += +1
    stc += '<option value=' + e + '>' + i + '</option>'
    $this.html('<option value="">Tỉnh / Thành phố</option>' + stc)
    if (address_1 = localStorage.getItem('address_1_saved')) {
      $('select[class="calc_shipping_provinces"] option').each(function() {
        if ($(this).text() == address_1) {
          $(this).attr('selected', '')
        }
      })
      $('input.billing_address_1').attr('value', address_1)

    }
    $this.on('change', function(i) {
      i = $this.children('option:selected').index() - 1
      var str = '',
        r = $this.val()
      if (r != '') {
        arr[i].forEach(function(el) {
          str += '<option value="' + el + '">' + el + '</option>'
          $('select[class="calc_shipping_district"]').html('<option value="">Quận / Huyện</option>' + str)
        })
        var address_1 = $this.children('option:selected').text()
         $('input.billing_address_1').attr('value', address_1)
          $('input.billing_address_2').attr('value', '')
        var district = $('select[class="calc_shipping_district"]').html()
        localStorage.setItem('address_1_saved', address_1)
        localStorage.setItem('district', district)
        $('select[class="calc_shipping_district"]').on('change', function() {
          var target = $(this).children('option:selected')
          target.attr('selected', '')
          $('select[class="calc_shipping_district"] option').not(target).removeAttr('selected')
          var address_2 = target.text()
          $('input.billing_address_2').attr('value', address_2)
          district = $('select[class="calc_shipping_district"]').html()
          localStorage.setItem('district', district)
          localStorage.setItem('address_2_saved', address_2)
        })
      } else {
        $('select[class="calc_shipping_district"]').html('<option value="">Quận / Huyện</option>')
        district = $('select[class="calc_shipping_district"]').html()
        localStorage.setItem('district', district)
        localStorage.removeItem('address_1_saved', address_1)


      }
    })
  })
})
//]]></script>
@endsection        
