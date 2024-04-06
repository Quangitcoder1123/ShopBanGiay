@extends('layouts.auth')
@section('title', trans('main.wishlist.title'))
@section('js')
  <script src="{{asset('ogani/js/jquery.nice-select.min.js')}}"></script>
@endsection('js')
@section('content')

<div class="wishlist-page">
  <div class="container">
    <div class="wishlist-main">
      <div class="wl-header">
        
        <h4><i class="far fa-heart"></i> @lang('main.wishlist.wishlist')</h4>
      </div>
      <div class="wl-content">
        @foreach($wish->wishlist as $pro)
        <div class="row p-5 justify-content-center">
          <div class="col-1 wl-x mt-5">
            <form action="{{route('deleteWish', $pro -> wish_id)}}" method="post">
              @csrf
              <button type="submit"><i class="fas fa-minus-square"></i></button>
            </form>
          </div>
          <div class="col-2 wl-img">
            <img style="width:100px" src="images/products/{{$pro->product -> pro_image}}" alt="">
          </div>
          <div class="col-2 wl-name">
            <p>{{$pro->product->pro_name}}</p>
          </div>
          <div class="col-2 wl-name">
            <p style="margin-right: 30px;">{{ number_format($pro->product->pro_new_price) }}đ </p>
          </div>
          <div class="col-2 wl-btn">
            <a href="{{route('product.show', $pro->pro_id)}}"><button><i class="fa fa-eye"></i></button></a>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>
</div>

@endsection