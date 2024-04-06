<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <meta name="description" content="Shop giày thể thao">
 

     <link rel="icon" type="image/x-icon" href="{{asset('images/icon.png')}}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>  SP SHOP - @yield('title') </title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- Css Styles {{asset('ogani/css/style.css')}} -->
    <link rel="stylesheet" href="{{asset('ogani/css/bootstrap.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('ogani/css/font-awesome.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('ogani/css/elegant-icons.css')}} " type="text/css">
    <link rel="stylesheet" href="{{asset('ogani/css/nice-select.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('ogani/css/jquery-ui.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('ogani/css/owl.carousel.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('ogani/css/slicknav.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('ogani/css/style.css')}}" type="text/css">


   <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/assets/font/fontawesome-free-5.14.0-web/css/all.min.css') }}">

  
   


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>



    <!-- new -->
   
   
  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
 
    <link rel="stylesheet" href="{{ asset('/assets/css/main.css') }}">
    
 
   





</head>

<body>
    <!-- Page Preloder -->



   

    <!-- Humberger Begin -->


    <div class="humberger__menu__overlay"></div>
    <div class="humberger__menu__wrapper">
        <div class="humberger__menu__logo">
            <a href="{{url('')}}"><img src="{{ asset('img/logo.png')}} alt=""></a>
        </div>
        <div class="humberger__menu__cart">




            <ul>
                @if( Auth::user())
                <li><a  href="{{ route('showWish', Auth::user()->user_id) }}"><i class="fa fa-heart"></i> <span>({{ Auth::user()->wishlist->count() }})</span></a></li>
               
                
                @endif
                <li><a href="{{ route('showCart') }}"><i class="fa fa-shopping-bag"></i> <span> {{ Cart::content()->count() }}</span></a></li>
            </ul>
            <div class="header__cart__price">item: <span>{{ Cart::subTotal() }} đ</span></div>
        </div>
        <div class="humberger__menu__widget">
            <div class="header__top__right__language">
                
                
            </div>
            <div class="header__top__right__auth">
                @if (Auth::check())
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-user"></i>
                                        @lang('main.acc.hello') {{ Auth::user()->name }}
                    </button>
                <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="{{ route('account.show', Auth::user()->user_id) }}"><i
                                                class="fas fa-user"></i> @lang('main.acc.acc_info')</a> </li>
                 @if (Auth::user()->role == 1)
                 <li><a class="dropdown-item" href="{{ route('admin.index') }}"><i
                                                    class="fas fa-user-shield"></i> @lang('main.acc.admin_page')</a></li>
                @endif                               
                <li><a class="dropdown-item" href="{{ route('order.history', Auth::user()->user_id) }}"><i class="fa fa-history"></i> @lang('main.order.history')</a></li>
                <li>
                <form action="{{ route('logout') }}" method="post" style="margin-left: 40px">
                                            @csrf
                                            <button>
                                                <i class="fas fa-sign-out-alt"></i>
                                                @lang('main.acc.logout')
                                            </button>
                                        </form></li>
                </ul>
                </div>
      


                @else
                    <a href="{{url('login')}}"><i class="fa fa-user"></i> Login</a>
                @endif
                
            </div>
        </div>
        <nav class="humberger__menu__nav mobile-menu">
            <ul>
                <li class="active"><a href="/">Trang chủ</a></li>
                <li><a href="{{url('/product/show-all')}}">Sản phẩm</a></li>
               
               
                <li><a href="{{url('contact')}}">Contact</a></li>
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        
        <div class="humberger__menu__contact">
            <ul>
                <li><i class="fa fa-envelope"></i> </li>
                <li></li>
            </ul>
        </div>
    </div>
    <!-- Humberger End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                       
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__right">
                         
                            <div class="header__top__right__language">
                                
                            </div>
                            <div class="header__top__right__auth">
                                 @if (Auth::check())
                <div class="dropdown" >
                    <button style="background-color:#6c7ee1; font-size: 12px;   " class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="height: 30px;
    font-size: 12px;">
                        <i class="fas fa-user"></i>
                                        @lang('main.acc.hello') {{ Auth::user()->name }}
                    </button>
                <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="{{ route('account.show', Auth::user()->user_id) }}"><i
                                                class="fas fa-user"></i> @lang('main.acc.acc_info')</a> </li>
                 @if (Auth::user()->role == 1)
                 <li><a class="dropdown-item" href="{{ route('admin.index') }}"><i
                                                    class="fas fa-user-shield"></i> @lang('main.acc.admin_page')</a></li>
                @endif                               
                <li><a class="dropdown-item" href="{{ route('order.history', Auth::user()->user_id) }}"><i class="fa fa-history"></i> @lang('main.order.history')</a></li>
                <li>
                <form action="{{ route('logout') }}" method="post" style="margin-left: 40px">
                                            @csrf
                                            <button>
                                                <i class="fas fa-sign-out-alt"></i>
                                                @lang('main.acc.logout')
                                            </button>
                                        </form></li>
                </ul>
                </div>
      


                @else
                    <a href="{{url('login')}}"><i class="fa fa-user"></i> Login</a>
                @endif
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                         <a href="{{url('')}}"><img src="{{ asset('images/logo.png')}}" alt=""></a>
                         <h3><b>SP SHOP</b></h3>    
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu">
                        <ul>
                            <li class="active"><a href="/">Trang chủ</a></li>
                            <li><a href="{{url('/product/show-all')}}">Sản phẩm</a></li>
                            <li><a href="{{url('/contact')}}">Contact</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__cart">
                        <ul>
                            @if(Auth::check())
                            <li><a href="{{ route('showWish', Auth::user()->user_id) }}"><i class="fa fa-heart"></i> <span>({{ Auth::user()->wishlist->count() }})</span></a></li>
                            
                            @endif
                            
                            <li><a href="{{ route('showCart') }}"><i class="fa fa-shopping-bag"></i> <span>{{ Cart::content()->count() }}</span></a></li>
                        </ul>
                        <div class="header__cart__price">item: <span>{{ Cart::subTotal() }} đ</span></div>
                    </div>
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->

    <!-- Hero Section Begin -->
    <section class="hero">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>LOẠI GIÀY</span>
                        </div>
                        @if(!empty($categories))
                        <ul style="display: none;">
                            @foreach ($categories as $cate)

                            <li><a href="{{ route('category.show', $cate->cate_id) }}"> {{ $cate->cate_name }}</a></li>
                            @endforeach
                        </ul>
                        @endif
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form action="{{url('search')}}" method="get">
                                 @csrf
                                <input type="text" placeholder="{{trans('main.search')}}" name="key">
                                <button type="submit" class="site-btn">SEARCH</button>
                            </form>
                        </div>
                        <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                <h5>0941 757 025</h5>
                                <span>Hỗ trợ 24/7</span>
                            </div>
                        </div>
                    </div>
                    @yield('banner')
                     
                </div>
            </div>
        </div>
    </section>
   

     @yield('content')  



    <!-- Footer Section Begin -->
  <!-- Footer Section Begin -->
    <footer class="footer spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__about__logo">
                         <img src="http://127.0.0.1:8000/images/icon.png" alt="" style="height:70px;margin-left:90px" >
                        </div>

                        <ul>
                            <li>Địa Chỉ: Kí túc xá trường ĐH CNTT vs TT Việt - Hàn</li>
                            <li>Điện thọai: 0387740582</li>
                            <li>Email: quanlqa.21it@vku.udn.vn</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-1">
                    <div class="footer__widget">
                        <h6>Hướng dẫn</h6>
                        <ul>
                            <li><a href="#">Hướng dẫn mua hàng</a></li>
                            <li><a href="#">Đổi tra và bảo hàng</a></li>
                            <li><a href="#">Giao nhận và thanh toán</a></li>
                            <li><a href="#">Đăng kí tài khoản</a></li>
                            <li><a href="#">Tra cứu đơn hàng</a></li>
                        </ul>

                    </div>
                </div>

                <div class="col-lg-4 col-md-12">
                    <div class="footer__widget">
                        <h6>Đăng ký nhận tin</h6>
                        <p>Nhận thông tin sản phẩm mới nhất, tin khuyến mãi và nhiều hơn nữa.</p>
                        <form action="#">
                            <input type="text" placeholder= "Email của bạn">
                            <button type="submit" class="site-btn">Đăng ký</button>
                        </form>
                        {{-- <div class="footer__widget__social">
                            <a href="#"><i class="fa fa-facebook-f"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-pinterest"></i></a>
                        </div> --}}
                    </div>
                </div>
            </div>
       
    </footer>

    <!-- Footer Section End -->

    <!-- Js Plugins -->

    <!-- Css Styles {{asset('ogani/css/style.css')}} -->
   
    
    
 @yield('js') 
  
    
    
   

    <script src=" {{asset('ogani/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('ogani/js/bootstrap.min.js')}}"></script>
  
    <script src=" {{asset('ogani/js/jquery-ui.min.js')}}"></script>
    <script src="  {{asset('ogani/js/jquery.slicknav.js')}}"></script>
    <script src="{{asset('ogani/js/mixitup.min.js')}}"></script>
    <script src="{{asset('ogani/js/owl.carousel.min.js')}}"></script>
    <script src=" {{asset('ogani/js/main.js')}}"></script>



  


</body>

</html>