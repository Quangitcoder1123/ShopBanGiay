@extends('layouts.admin')
@section('title',trans('main.home'))
@section('content')
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>@lang('admin.products.pro_manage')</h3>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 ">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>@lang('admin.products.create')</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <br />
                            <form id="upload" action="{{ route('admin.product.store') }}" method="POST"
                                enctype="multipart/form-data" id="demo-form2" data-parsley-validate
                                class="form-horizontal form-label-left">
                                @csrf
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align"
                                        for="first-name">@lang('admin.products.pro_name')
                                        <span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="text" id="first-name" name="pro_name" class="form-control ">
                                        {{--  tên sp  --}}
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label for="middle-name"
                                        class="col-form-label col-md-3 col-sm-3 label-align">@lang('admin.products.pro_desc')</label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <textarea id="ckeditor" class="form-control" type="text" name="pro_desc"></textarea>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align"
                                        for="last-name">@lang('admin.products.pro_image')
                                    </label>
                                    <div class="col-md-6 col-sm-6">
                                        <input type="file" id="last-name" name="pro_image"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="item form-group anhphu">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align"
                                        for="last-name">@lang('admin.products.pro_image_secondary') </label>
                                    <div class="col-md-6 col-sm-6">
                                        <input type="file" multiple="" class="form-control" name="chill_image[]">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label for="middle-name"
                                        class="col-form-label col-md-3 col-sm-3 label-align">@lang('admin.products.category')</label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <select class="form-control cars" name="cate_id" id="">
                                            @foreach ($categories as $cate)
                                                @if ($cate)
                                                    <option selected value="{{ $cate->cate_id }}">{{ $cate->cate_name }}
                                                    </option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align"
                                        for="last-name">@lang('admin.products.quantity')</label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="number" id="quantity" name="quantity" class="form-control">
                                        {{--  soluong  --}}
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align"
                                        for="last-name">@lang('admin.products.pro_old_price')</label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="number" id="old_price" name="pro_old_price" class="form-control">
                                        {{--  giá cũ  --}}
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align"
                                        for="last-name">@lang('admin.products.pro_new_price')</label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="number" id="new_price" name="pro_new_price" class="form-control">
                                        {{--  giá mới  --}}
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align"
                                        for="last-name">Nổi bật</label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <select class="form-control" name="pro_sale" id="">
                                            <option value="0">Không</option>
                                            <option value="1">Có</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="ln_solid"></div>
                                <div class="item form-group">
                                    <div class="col-md-6 col-sm-6 offset-md-3">
                                        <button class="btn btn-primary" type="reset">Reset</button>
                                        <button id="submit" type="submit" class="btn btn-success">Submit</button>
                                    </div>
                                </div>
                                <div class="row justify-content-center" id="showImage">

                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function(){
          $("button#submit").click(function(){
            var submit = $("input#last-name").val();
            var file = $("input#file").val();
            var new_price = $("input#new_price").val();
            var old_price = $("input#old_price").val();
            var quantity = $("input#quantity").val();
            var first_name = $("input#first-name").val();
            var getSelect = $("select.cars").val();
            var flag = true
            if(submit ==''){
              $("input#last-name").css({"background" : "rgba(255, 147, 146, 0.3)", "border" : "2px solid rgb(255, 0, 0, 0.3)"});
              flag = false
            }else{
              $("input#last-name").css({"background" : "rgb(100 216 90 / 30%)", "border" : "2px solid rgb(147 161 146 / 30%)"});
            }
            {{--    --}}
            if(file ==''){
                $("input#file").css({"background" : "rgba(255, 147, 146, 0.3)", "border" : "2px solid rgb(255, 0, 0, 0.3)"});
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
                $("select.cars").css({"background" : "rgba(255, 147, 146, 0.3)", "border" : "2px solid rgb(255, 0, 0, 0.3)"});
                flag = false
            }else{
                $("select.cars").css({"background" : "rgb(100 216 90 / 30%)", "border" : "2px solid rgb(147 161 146 / 30%)"});
            }
            {{--    --}}
            if(new_price ==''){
                $("input#new_price").css({"background" : "rgba(255, 147, 146, 0.3)", "border" : "2px solid rgb(255, 0, 0, 0.3)"});
                flag = false
            }else{
                $("input#new_price").css({"background" : "rgb(100 216 90 / 30%)", "border" : "2px solid rgb(147 161 146 / 30%)"});
            }
            {{--    --}}
            if(old_price ==''){
                $("input#old_price").css({"background" : "rgba(255, 147, 146, 0.3)", "border" : "2px solid rgb(255, 0, 0, 0.3)"});
                flag = false
            }else{
                $("input#old_price").css({"background" : "rgb(100 216 90 / 30%)", "border" : "2px solid rgb(147 161 146 / 30%)"});
            }
            {{--    --}}
            if(quantity ==''){
                $("input#quantity").css({"background" : "rgba(255, 147, 146, 0.3)", "border" : "2px solid rgb(255, 0, 0, 0.3)"});
                flag = false
            }else{
                $("input#quantity").css({"background" : "rgb(100 216 90 / 30%)", "border" : "2px solid rgb(147 161 146 / 30%)"});
            }
            {{--    --}}

            if(flag == true){
              alert("Thêm Thành Công")
              return true
            }
            return false
          })
        })
    </script>
@endsection
