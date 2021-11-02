<!DOCTYPE html>
<html class="no-js" lang="en">


<!-- Mirrored from htmldemo.hasthemes.com/learts/learts/404.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 04 Mar 2021 04:16:35 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Learts – Handmade Shop eCommerce HTML Template</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('client/images/favicon.png')}}">

    <!-- CSS
	============================================ -->

    <!-- Vendor CSS (Bootstrap & Icon Font) -->
    <!-- <link rel="stylesheet" href="{{asset('client/css/vendor/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('client/css/vendor/font-awesome-pro.min.css')}}">
    <link rel="stylesheet" href="{{asset('client/css/vendor/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('client/css/vendor/customFonts.css')}}"> -->

    <!-- Plugins CSS (All Plugins Files) -->
    <!-- <link rel="stylesheet" href="{{asset('client/css/plugins/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('client/css/plugins/perfect-scrollbar.css')}}">
    <link rel="stylesheet" href="{{asset('client/css/plugins/swiper.min.css')}}">
    <link rel="stylesheet" href="{{asset('client/css/plugins/nice-select.css')}}">
    <link rel="stylesheet" href="{{asset('client/css/plugins/ion.rangeSlider.min.css')}}">
    <link rel="stylesheet" href="{{asset('client/css/plugins/photoswipe.css')}}">
    <link rel="stylesheet" href="{{asset('client/css/plugins/photoswipe-default-skin.css')}}">
    <link rel="stylesheet" href="{{asset('client/css/plugins/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('client/css/plugins/slick.css')}}"> -->

    <!-- Main Style CSS -->
    <!-- <link rel="stylesheet" href="{{asset('client/css/style.css')}}"> -->

    <!-- Use the minified version files listed below for better performance and remove the files listed above -->
    <link rel="stylesheet" href="{{asset('client/css/vendor/vendor.min.css')}}">
    <link rel="stylesheet" href="{{asset('client/css/plugins/plugins.min.css')}}">
    <link rel="stylesheet" href="{{asset('client/css/style.min.css')}}">
    <link rel="stylesheet" href="{{asset('sweetarlet2/node_modules/sweetalert2/dist/sweetalert2.css')}}">

</head>

<body>

    <!-- Header Section Start -->
    <div class="header-section section bg-white d-none d-xl-block">
        <div class="container">
            <div class="row row-cols-lg-3 align-items-center">

                <!-- Header Language & Currency Start -->
                <div class="col">
                    <ul class="header-lan-curr">
                        <li><a href="#">Việt Nam</a>
                            <ul class="curr-lan-sub-menu">
                                <li><a href="#">English</a></li>
                            </ul>
                        </li>
                        <li><a href="#">VND</a>
                            <ul class="curr-lan-sub-menu">
                                <li><a href="#">USD</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <!-- Header Language & Currency End -->

                <!-- Header Logo Start -->
                <div class="col">
                    <div class="header-logo justify-content-center">
                        <a href="{{route('index')}}"><img src="{{asset('client/images/logo/logo.png')}}" alt="Learts Logo"></a>
                    </div>
                </div>
                <!-- Header Logo End -->
                <!-- Header Tools Start -->
                <div class="col">
                    <div class="header-tools justify-content-end">
                        <div class="header-login">
                            @if(Auth::check())
                            <div class="blog-author" style="margin-bottom: 0px;">
                                <div class="thumbnail" style="width: 32px;">
                                    @if(Auth::user()->avatar!=null)
                                    <a href="#offcanvas-account" class="offcanvas-toggle"><img src="{{URL::to('/') }}/image/account/{{Auth::user()->avatar }}" alt="" style="height:32px"></a>
                                    @else
                                    <a href="#offcanvas-account" class="offcanvas-toggle"><img src="{{asset('client/images/comment/comment-1.jpg')}}" alt="" style="height:32px"></a>
                                    @endif
                                </div>
                            </div>
                            @else
                            <a href="{{route('login')}}"><i class="fal fa-user"></i></a>
                            @endif
                        </div>
                        <div class="header-search">
                            <a href="#offcanvas-search" class="offcanvas-toggle"><i class="fal fa-search"></i></a>
                        </div>
                        <div class="header-wishlist">

                            @if(Session::has("Favorite")!= null)
                            <a href="#offcanvas-wishlist" class="offcanvas-toggle"><span id="total-qty-favorite">{{Session::get("Favorite")->totalQuantity}}</span><i class="fal fa-heart"></i></a>
                            @else
                            <a href="#offcanvas-wishlist" class="offcanvas-toggle"><i class="fal fa-heart"></i></a>
                            @endif
                        </div>
                        <div class="header-cart">

                            @if(Session::has("Cart") !=null)
                            <a href="#offcanvas-cart" class="offcanvas-toggle"><span id="total-qty-show" class="cart-count">{{Session::get("Cart")->totalQuantity}}</span><i class="fal fa-shopping-cart"></i></a>
                            @else
                            <a href="#offcanvas-cart" class="offcanvas-toggle"><i class="fal fa-shopping-cart"></i></a>
                            @endif
                        </div>
                    </div>
                </div>
                <!-- Header Tools End -->
            </div>
        </div>

        <!-- Site Menu Section Start -->
        <div class="site-menu-section section">
            <div class="container">
                <nav class="site-main-menu justify-content-center">
                    <ul>
                        <li><a href="{{route('index')}}"><span class="menu-text">Trang Chủ</span></a></li>
                        <li><a href="{{route('Danh-Sach-San-Pham')}}"><span class="menu-text">Sản Phẩm</span></a></li>
                        <li><a href="{{route('Danh-Sach-Bai-Viet')}}"><span class="menu-text">Bài Viết</span></a></li>
                        <li><a href="{{route('Danh-Sach-Danh-Muc')}}"><span class="menu-text">Danh Mục</span></a></li>
                        <li><a href="{{route('Danh-Sach-Nha-Cung-Cap')}}"><span class="menu-text">Nhà Cung Cấp</span></a></li>
                    </ul>
                </nav>
            </div>
        </div>
        <!-- Site Menu Section End -->

    </div>
    <!-- Header Section End -->

    <!-- Header Sticky Section Start -->
    <div class="sticky-header header-menu-center section bg-white d-none d-xl-block">
        <div class="container">
            <div class="row align-items-center">

                <!-- Header Logo Start -->
                <div class="col">
                    <div class="header-logo">
                        <a href="{{route('index')}}"><img width="50" height="50" src="{{asset('client/images/logo/genz.gif')}}" alt="Learts Logo"><img style="padding-left: 15px" width="200" height="40" src="{{asset('client/images/logo/logo-2.png')}}"></a>
                    </div>
                </div>
                <!-- Header Logo End -->

                <!-- Search Start -->
                <div class="col d-none d-xl-block">
                    <nav class="site-main-menu justify-content-center">
                        <ul>
                            <li><a href="{{route('Danh-Sach-San-Pham')}}"><span class="menu-text">Sản Phẩm</span></a></li>
                            <li><a href="{{route('Danh-Sach-Bai-Viet')}}"><span class="menu-text">Bài Viết</span></a></li>
                            <li><a href="{{route('Danh-Sach-Danh-Muc')}}"><span class="menu-text">Danh Mục</span></a></li>
                            <li><a href="{{route('Danh-Sach-Nha-Cung-Cap')}}"><span class="menu-text">Nhà Cung Cấp</span></a></li>
                        </ul>
                    </nav>
                </div>
                <!-- Search End -->

                <!-- Header Tools Start -->
                <div class="col-auto">
                    <div class="header-tools justify-content-end">
                        <div class="header-login">
                            @if(Auth::check())
                            <div class="blog-author" style="margin-bottom: 0px;">
                                <div class="thumbnail" style="width: 32px;">
                                    @if(Auth::user()->avatar!=null)
                                    <a href="#offcanvas-account" class="offcanvas-toggle"><img src="{{URL::to('/') }}/image/account/{{Auth::user()->avatar }}" alt="" style="height:32px"></a>
                                    @else
                                    <a href="#offcanvas-account" class="offcanvas-toggle"><img src="{{asset('client/images/comment/comment-1.jpg')}}" alt="" style="height:32px"></a>
                                    @endif
                                </div>
                            </div>
                            @else
                            <a href="{{route('login')}}"><i class="fal fa-user"></i></a>
                            @endif
                        </div>
                        <div class="header-search d-none d-sm-block">
                            <a href="#offcanvas-search" class="offcanvas-toggle"><i class="fal fa-search"></i></a>
                        </div>
                        <div class="header-wishlist">
                            @if(Session::has("Favorite")!= null)
                            <a href="#offcanvas-wishlist" class="offcanvas-toggle"><span id="total-qty-favorite">{{Session::get("Favorite")->totalQuantity}}</span><i class="fal fa-heart"></i></a>
                            @else
                            <a href="#offcanvas-wishlist" class="offcanvas-toggle"><i class="fal fa-heart"></i></a>
                            @endif
                        </div>
                        <div class="header-cart">
                            @if(Session::has("Cart") !=null)
                            <a href="#offcanvas-cart" class="offcanvas-toggle"><span id="total-qty-show" class="cart-count">{{Session::get("Cart")->totalQuantity}}</span><i class="fal fa-shopping-cart"></i></a>
                            @else
                            <a href="#offcanvas-cart" class="offcanvas-toggle"><i class="fal fa-shopping-cart"></i></a>
                            @endif
                        </div>
                        <div class="mobile-menu-toggle d-xl-none">
                            <a href="#offcanvas-mobile-menu" class="offcanvas-toggle">
                                <svg viewBox="0 0 800 600">
                                    <path d="M300,220 C300,220 520,220 540,220 C740,220 640,540 520,420 C440,340 300,200 300,200" id="top"></path>
                                    <path d="M300,320 L540,320" id="middle"></path>
                                    <path d="M300,210 C300,210 520,210 540,210 C740,210 640,530 520,410 C440,330 300,190 300,190" id="bottom" transform="translate(480, 320) scale(1, -1) translate(-480, -318) "></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- Header Tools End -->

            </div>
        </div>

    </div>
    <!-- Header Sticky Section End -->
    <!-- Mobile Header Section Start -->
    <div class="mobile-header bg-white section d-xl-none">
        <div class="container">
            <div class="row align-items-center">

                <!-- Header Logo Start -->
                <div class="col">
                    <div class="header-logo">
                        <a href="{{route('index')}}"><img src="{{asset('client/images/logo/logo-2.png')}}" alt="Learts Logo"></a>
                    </div>
                </div>
                <!-- Header Logo End -->

                <!-- Header Tools Start -->
                <div class="col-auto">
                    <div class="header-tools justify-content-end">
                        <div class="header-login d-none d-sm-block">
                            <a href="{{route('login')}}"><i class="fal fa-user"></i></a>
                        </div>
                        <div class="header-search d-none d-sm-block">
                            <a href="#offcanvas-search" class="offcanvas-toggle"><i class="fal fa-search"></i></a>
                        </div>
                        <div class="header-wishlist d-none d-sm-block">
                            @if(Session::has("Favorite")!= null)
                            <a href="#offcanvas-wishlist" class="offcanvas-toggle"><span id="total-qty-favorite">{{Session::get("Favorite")->totalQuantity}}</span><i class="fal fa-heart"></i></a>
                            @else
                            <a href="#offcanvas-wishlist" class="offcanvas-toggle"><i class="fal fa-heart"></i></a>
                            @endif
                        </div>
                        <div class="header-cart">
                            @if(Session::has("Cart") !=null)
                            <a href="#offcanvas-cart" class="offcanvas-toggle"><span id="total-qty-show" class="cart-count">{{Session::get("Cart")->totalQuantity}}</span><i class="fal fa-shopping-cart"></i></a>
                            @else
                            <a href="#offcanvas-cart" class="offcanvas-toggle"><i class="fal fa-shopping-cart"></i></a>
                            @endif
                        </div>
                        <div class="mobile-menu-toggle">
                            <a href="#offcanvas-mobile-menu" class="offcanvas-toggle">
                                <svg viewBox="0 0 800 600">
                                    <path d="M300,220 C300,220 520,220 540,220 C740,220 640,540 520,420 C440,340 300,200 300,200" id="top"></path>
                                    <path d="M300,320 L540,320" id="middle"></path>
                                    <path d="M300,210 C300,210 520,210 540,210 C740,210 640,530 520,410 C440,330 300,190 300,190" id="bottom" transform="translate(480, 320) scale(1, -1) translate(-480, -318) "></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- Header Tools End -->

            </div>
        </div>
    </div>
    <!-- Mobile Header Section End -->

    <!-- Mobile Header Section Start -->
    <div class="mobile-header sticky-header bg-white section d-xl-none">
        <div class="container">
            <div class="row align-items-center">

                <!-- Header Logo Start -->
                <div class="col">
                    <div class="header-logo">
                        <a href="{{route('index')}}"><img width="50" height="50" src="{{asset('client/images/logo/genz.gif')}}" alt="Learts Logo"><img style="padding-left: 15px;" width="180" height="40" src="{{asset('client/images/logo/logo-2.png')}}"></a>
                    </div>
                </div>
                <!-- Header Logo End -->

                <!-- Header Tools Start -->
                <div class="col-auto">
                    <div class="header-tools justify-content-end">
                        <div class="header-login d-none d-sm-block">
                            <a href="{{route('login')}}"><i class="fal fa-user"></i></a>
                        </div>
                        <div class="header-search d-none d-sm-block">
                            <a href="#offcanvas-search" class="offcanvas-toggle"><i class="fal fa-search"></i></a>
                        </div>
                        <div class="header-wishlist d-none d-sm-block">
                            @if(Session::has("Favorite")!= null)
                            <a href="#offcanvas-wishlist" class="offcanvas-toggle"><span id="total-qty-favorite">{{Session::get("Favorite")->totalQuantity}}</span><i class="fal fa-heart"></i></a>
                            @else
                            <a href="#offcanvas-wishlist" class="offcanvas-toggle"><i class="fal fa-heart"></i></a>
                            @endif
                        </div>
                        <div class="header-cart">
                            @if(Session::has("Cart") !=null)
                            <a href="#offcanvas-cart" class="offcanvas-toggle"><span id="total-qty-show" class="cart-count">{{Session::get("Cart")->totalQuantity}}</span><i class="fal fa-shopping-cart"></i></a>
                            @else
                            <a href="#offcanvas-cart" class="offcanvas-toggle"><i class="fal fa-shopping-cart"></i></a>
                            @endif
                        </div>
                        <div class="mobile-menu-toggle">
                            <a href="#offcanvas-mobile-menu" class="offcanvas-toggle">
                                <svg viewBox="0 0 800 600">
                                    <path d="M300,220 C300,220 520,220 540,220 C740,220 640,540 520,420 C440,340 300,200 300,200" id="top"></path>
                                    <path d="M300,320 L540,320" id="middle"></path>
                                    <path d="M300,210 C300,210 520,210 540,210 C740,210 640,530 520,410 C440,330 300,190 300,190" id="bottom" transform="translate(480, 320) scale(1, -1) translate(-480, -318) "></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- Header Tools End -->

            </div>
        </div>
    </div>
    <!-- Mobile Header Section End -->
    @if (Auth::check())
    <!-- OffCanvas account Start -->
    <div id="offcanvas-account" class="offcanvas offcanvas-account">
        <div class="inner">
            <div class="head">
                <span class="title">Tài Khoản</span>
                <button class="offcanvas-close">×</button>
            </div>
            <div class="body customScroll">
                <ul class="minicart-product-list">
                    <li>
                        <div class="account-client">
                            @if(Auth::user()->avatar!=null)
                            <img src="{{URL::to('/') }}/image/account/{{Auth::user()->avatar }}" alt="">
                            @else
                            <img src="{{asset('client/images/comment/comment-1.jpg')}}" alt="">
                            @endif
                            <div class="social">
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-linkedin"></i></a>
                                <a href="#"><i class="fab fa-instagram"></i></a>
                            </div>
                            <h5><i>Thông tin cá nhân ({{Auth::user()->username}})</i></h5>
                            <hr>
                            <div class="account-content">
                                <a href="#" class="name">{{ Auth::user()->firstName }} {{ Auth::user()->lastName }}</a>

                                <h5>Phone: <i>{{Auth::user()->phone}}</i></h5>
                                <h5>Email: <i>{{Auth::user()->email}}</i></h5>
                            </div>
                            <hr>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="foot">
                <div class="buttons">
                    @if(Auth::user()->level == 1)
                    <a href="{{URL::to('/admin')}}" class="btn btn-secondary btn-hover-primary"><i class="fas fa-users-cog"></i> Trang Admin</a>
                    @endif
                    <a href="{{route('Tai-Khoan')}}" class="btn btn-dark btn-hover-primary"><i class="fas fa-user-circle"></i> Tài Khoản</a>
                    <a href="{{ route('logout') }}" class="btn btn-outline-dark btn-hover-primary" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();"><i class="fas fa-door-open" data-feather="log-in"> </i> Đăng Xuất
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- OffCanvas Cart End -->
    @endif
    <!-- OffCanvas Search Start -->
    <div id="offcanvas-search" class="offcanvas offcanvas-search">
        <div class="inner">
            <div class="offcanvas-search-form">
                <button class="offcanvas-close">×</button>
                <form action="#" class="typeahead" role="search">
                    <div class="row mb-n3">
                        <div class="col-lg-8 col-12 mb-3"><input type="text" name="typeahead" class="form-control search-input-layout typeahead" placeholder="Hãy nhập từ bất kỳ..." autocomplete="off"></div>
                    
                        <button type="submit" class="btn btn-primary">Search <i class="fas fa-arrow-right"></i></button>
                    </div>
                </form>
            </div>
            <p class="search-description text-body-light mt-2"> <span>Tìm Kiếm Một Sản Phẩm Nào Đó Theo Ý Thích Của Bạn</span></p>

        </div>
    </div>
    <!-- OffCanvas Search End -->

    <!-- OffCanvas Cart Start -->
    <div id="offcanvas-cart" class="offcanvas offcanvas-cart">
        <div class="inner" id="change-items">
            <div class="head">
                <span class="title">Giỏ Hàng</span>
                <button class="offcanvas-close">×</button>
            </div>
            @if(Session::has("Cart") != null)
            <div class="body customScroll">
                <ul class="minicart-product-list">
                    @foreach(Session::get("Cart")->product as $item)
                    <li>
                        <a href="product-details.html" class="image"><img src="{{URL::to('/')}}/image/product/{{$item['product_info']->product_img}}" alt="Cart product Image"></a>
                        <div class="content">
                            <a href="product-details.html" class="title">{{$item['product_info']->product_name}}</a>
                            <span class="quantity-price">{{$item['qty']}} x <span class="amount">{{number_format($item['product_info']->product_price).' '.'VND'}}</span></span>
                            <i class="fa fa-times remove" data-id="{{$item['product_info']->product_id}}"></i>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
            <div class="foot">
                <div class="sub-total">
                    <strong>Tổng Tiền :</strong>
                    @if(Session::get("Cart")->totalPrice != null)
                    <span class="amount">{{number_format(Session::get("Cart")->totalPrice).' '.'VND'}}</span>
                    @else
                    <span class="amount">0</span>
                    @endif
                </div>
                <div class="buttons">
                    <a href="{{route('cart.index')}}" class="btn btn-dark btn-hover-primary">Xem Giỏ Hàng</a>
                </div>
            </div>
            @endif

            @if(Session::has("Cart") == null)
            <div class="body customScroll">
                <strong>Giỏ Hàng trống</strong>
            </div>
            <div class="foot">

                <div class="buttons">
                    <a href="{{route('cart.index')}}" class="btn btn-dark btn-hover-primary">Xem Giỏ Hàng</a>
                </div>
            </div>
            @endif

        </div>
    </div>
    <!-- OffCanvas Cart End -->
    <!-- OffCanvas Search Start -->
    <div id="offcanvas-mobile-menu" class="offcanvas offcanvas-mobile-menu">
        <div class="inner customScroll">
            <div class="offcanvas-menu-search-form">
                <form action="#">
                    <input type="text" placeholder="Search...">
                    <button><i class="fal fa-search"></i></button>
                </form>
            </div>
            <div class="offcanvas-menu">
                <ul>
                    <li><a href="{{route('index')}}"><span class="menu-text">Trang Chủ</span></a></li>
                    <li><a href="{{route('Danh-Sach-San-Pham')}}"><span class="menu-text">Sản Phẩm</span></a></li>
                    <li><a href="{{route('Danh-Sach-Bai-Viet')}}"><span class="menu-text">Bài Viết</span></a></li>
                    <li><a href="{{route('Danh-Sach-Danh-Muc')}}"><span class="menu-text">Danh Mục</span></a></li>
                    <li><a href="{{route('Danh-Sach-Nha-Cung-Cap')}}"><span class="menu-text">Nhà Cung Cấp</span></a></li>
                </ul>
            </div>
            <div class="offcanvas-buttons">
                <div class="header-tools">
                    <div class="header-login">
                        @if(Auth::check())
                        <div class="blog-author" style="margin-bottom: 0px;">
                            <div class="thumbnail" style="width: 32px;">
                                @if(Auth::user()->avatar!=null)
                                <a href="#offcanvas-account" class="offcanvas-toggle"><img src="{{URL::to('/') }}/image/account/{{Auth::user()->avatar }}" alt="" style="height:32px"></a>
                                @else
                                <a href="#offcanvas-account" class="offcanvas-toggle"><img src="{{asset('client/images/comment/comment-1.jpg')}}" alt="" style="height:32px"></a>
                                @endif
                            </div>
                        </div>
                        @else
                        <a href="{{route('login')}}"><i class="fal fa-user"></i></a>
                        @endif
                    </div>
                    <div class="header-wishlist">
                        @if(Session::has("Favorite")!= null)
                        <a href="{{URL::to('/favorite')}}"><span id="total-qty-favorite">{{Session::get("Favorite")->totalQuantity}}</span><i class="fal fa-heart"></i></a>
                        @else
                        <a href="{{URL::to('/favorite')}}"><i class="fal fa-heart"></i></a>
                        @endif
                    </div>
                    <div class="header-cart">
                        @if(Session::has("Cart") !=null)
                        <a href="{{URL::to('/cart')}}"><span id="total-qty-show" class="cart-count">{{Session::get("Cart")->totalQuantity}}</span><i class="fal fa-shopping-cart"></i></a>
                        @else
                        <a href="{{URL::to('/cart')}}"><i class="fal fa-shopping-cart"></i></a>
                        @endif
                    </div>
                </div>
            </div>
            <div class="offcanvas-social">
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-youtube"></i></a>
            </div>
        </div>
    </div>
    <!-- OffCanvas Search End -->

    <!-- 404 Section Start -->
    <div class="section-404 section" data-bg-image="assets/images/bg/bg-404.jpg">
        <div class="container">
            <div class="content-404">
                <h1 class="title">Oops!</h1>
                <h2 class="sub-title">Page not found!</h2>
                <p>You could either go back or go to homepage</p>
                <div class="buttons">
                    <a class="btn btn-primary btn-outline-hover-dark" href="{{route('index')}}">Back</a>Go back</a>
                    <a class="btn btn-dark btn-outline-hover-dark" href="{{route('index')}}">Back</a>Homepage</a>
                </div>
            </div>
        </div>
    </div>
    <!-- 404 Section End -->
    <div class="footer1-section section section-padding">
        <div class="container">
            <div class="row text-center row-cols-1">

                <div class="footer1-logo col text-center">
                    <img width="200" height="200" src="{{asset('client/images/logo/gen.png')}}" alt="">
                </div>

                <div class="footer1-social col">
                    <ul class="widget-social justify-content-center">
                        <li class="hintT-top" data-hint="Twitter"> <a href="https://www.twitter.com/"><i class="fab fa-twitter"></i></a></li>
                        <li class="hintT-top" data-hint="Facebook"> <a href="https://www.facebook.com/"><i class="fab fa-facebook-f"></i></a></li>
                        <li class="hintT-top" data-hint="Instagram"> <a href="https://www.instagram.com/"><i class="fab fa-instagram"></i></a></li>
                        <li class="hintT-top" data-hint="Youtube"> <a href="https://www.youtube.com/"><i class="fab fa-youtube"></i></a></li>
                    </ul>
                </div>

                <div class="footer1-menu col">
                    <ul class="widget-menu justify-content-center">
                        <li><a href="{{URL::to('/about_us')}}">Về chúng tôi</a></li>
                        <li><a href="#">Địa chỉ</a></li>
                        <li><a href="{{URL::to('/contact_us')}}">Liên hệ</a></li>
                        <li><a href="#">Hỗ trợ</a></li>
                        <li><a href="#">Policy</a></li>
                        <li><a href="#">FAQs</a></li>
                    </ul>
                </div>

                <div class="footer1-copyright col">
                    <p class="copyright">&copy; 2021 | <a href="https://caothang.edu.vn/"><strong> Cao đẳng kỹ thuật Cao Thắng.</strong></a></p>
                </div>

            </div>
        </div>
    </div>


    <!-- JS
============================================ -->

    <!-- Vendors JS -->
    <!-- <script src="{{asset('client/js/vendor/modernizr-3.6.0.min.js')}}"></script>
<script src="{{asset('client/js/vendor/jquery-3.4.1.min.js')}}"></script>
<script src="{{asset('client/js/vendor/jquery-migrate-3.1.0.min.js')}}"></script>
<script src="{{asset('client/js/vendor/bootstrap.bundle.min.js')}}"></script> -->

    <!-- Plugins JS -->
    <!-- <script src="{{asset('client/js/plugins/select2.min.js')}}"></script>
<script src="{{asset('client/js/plugins/jquery.nice-select.min.js')}}"></script>
<script src="{{asset('client/js/plugins/perfect-scrollbar.min.js')}}"></script>
<script src="{{asset('client/js/plugins/swiper.min.js')}}"></script>
<script src="{{asset('client/js/plugins/slick.min.js')}}"></script>
<script src="{{asset('client/js/plugins/mo.min.js')}}"></script>
<script src="{{asset('client/js/plugins/jquery.ajaxchimp.min.js')}}"></script>
<script src="{{asset('client/js/plugins/jquery.countdown.min.js')}}"></script>
<script src="{{asset('client/js/plugins/imagesloaded.pkgd.min.js')}}"></script>
<script src="{{asset('client/js/plugins/isotope.pkgd.min.js')}}"></script>
<script src="{{asset('client/js/plugins/jquery.matchHeight-min.js')}}"></script>
<script src="{{asset('client/js/plugins/ion.rangeSlider.min.js')}}"></script>
<script src="{{asset('client/js/plugins/photoswipe.min.js')}}"></script>
<script src="{{asset('client/js/plugins/photoswipe-ui-default.min.js')}}"></script>
<script src="{{asset('client/js/plugins/jquery.zoom.min.js')}}"></script>
<script src="{{asset('client/js/plugins/ResizeSensor.js')}}"></script>
<script src="{{asset('client/js/plugins/jquery.sticky-sidebar.min.js')}}"></script>
<script src="{{asset('client/js/plugins/product360.js')}}"></script>
<script src="{{asset('client/js/plugins/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('client/js/plugins/jquery.scrollUp.min.js')}}"></script>
<script src="{{asset('client/js/plugins/scrollax.min.js')}}"></script> -->

    <!-- <script src="{{asset('client/js/plugins/jquery.instagramFeed.min.js')}}"></script> -->
    <!-- Use the minified version files listed below for better performance and remove the files listed above -->
    <script src="{{asset('client/js/vendor/vendor.min.js')}}"></script>
    <script src="{{asset('client/js/plugins/plugins.min.js')}}"></script>
    <script src="{{asset('client/js/bootstrap3-typeahead.min.js_4.0.2/cdnjs/bootstrap3-typeahead.min.js')}}"></script>
   
    <!-- Main Activation JS -->
    <script src="{{asset('client/js/main.js')}}"></script>
    <script>
        function AddCart(id) {
            $.ajax({
                url: 'item-cart/' + id,
                type: "GET",
            }).done(function(response) {
                Render(response);
                alertify.success('Đã Thêm Vào Giỏ Hàng');
            });
        }
        $("#change-items").on("click", ".content i", function() {

            $.ajax({
                url: 'delete-item-cart/' + $(this).data("id"),
                type: "GET",
            }).done(function(response) {
                Render(response);
                alertify.error('Đã Xóa Sản Phẩm Thành Công');
            });
        });

        function Render(response) {
            $("#change-items").empty();
            $("#change-items").html(response);
            $("#total-qty-show").text($("#total-qty").val());
        }

        function AddFavorite(id) {
            $.ajax({
                url: 'item-favorite/' + id,
                type: "GET",
            }).done(function(response) {
                Render1(response);
                alertify.success('Đã Thêm Vào Yêu Thích');
            });
        }
        $("#change-item").on("click", ".content i", function() {

            $.ajax({
                url: 'delete-item-favorite/' + $(this).data("id"),
                type: "GET",
            }).done(function(response) {
                Render1(response);
                alertify.error('Đã Xóa Sản Phẩm Thành Công');
            });
        });

        function Render1(response) {
            $("#change-item").empty();
            $("#change-item").html(response);
            $("#total-qty-favorite").text($("#total-qty").val());
        }
    </script>


    <!-- JavaScript -->
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

    <!-- CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
    <!-- Default theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css" />
    <!-- Semantic UI theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css" />
    <!-- Bootstrap theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css" />


    <script src="{{asset('sweetarlet2/node_modules/sweetalert2/dist/sweetalert2.js')}}"></script>



    @yield('page-js')
</body>


<!-- Mirrored from htmldemo.hasthemes.com/learts/learts/{{route('index')}} by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 04 Mar 2021 04:14:01 GMT -->

</html>