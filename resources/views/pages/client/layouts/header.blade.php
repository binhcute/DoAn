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
                                <a href="#offcanvas-account" class="offcanvas-toggle"><img src="{{URL::to('/') }}/image/account/{{Auth::user()->avatar }}" alt="" style="height:32px;"></a>
                                @else
                                <a href="#offcanvas-account" class="offcanvas-toggle"><img src="{{asset('client/images/comment/comment-1.jpg')}}" alt="" style="height:32px"></a>
                                @endif
                            </div>
                        </div>
                        @else
                        <a href="{{route('login')}}"><i class="fal fa-user"></i></a>
                        @endif
                    </div>
                    <div><a href="#"><i class="fal fa-bell"></i>

                        </a></div>
                    <div class="header-search">
                        <a href="#offcanvas-search" class="offcanvas-toggle"><i class="fal fa-search"></i></a>
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
                    <li><a href="{{URL::to('/contact_us')}}"><span class="menu-text">Liên hệ</span></a></li>
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
                        <li><a href="{{URL::to('/contact_us')}}"><span class="menu-text">Liên hệ</span></a></li>
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
                    @include('pages.client.Cart.update-icon-section-start')
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
                        @if(Auth::check())
                        <div class="blog-author" style="margin-bottom: 0px;">
                            <div class="thumbnail" style="width: 32px;">
                                @if(Auth::user()->avatar!=null)
                                <a href="#offcanvas-account" class="offcanvas-toggle"><img src="{{URL::to('/') }}/image/account/{{Auth::user()->avatar }}" alt="" style="height:32px; "></a>
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
<div id="offcanvas-account" class="offcanvas offcanvas-account" style="z-index:9999;">
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
                        <div class="account-content">
                            <a href="#" class="name">{{ Auth::user()->firstName }} {{ Auth::user()->lastName }}</a>
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
                <a href="{{ route('logout') }}" class="btn btn-outline-dark btn-hover-primary"><i class="fas fa-door-open" data-feather="log-in"> </i> Đăng Xuất
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

    </div>
</div>
<!-- OffCanvas Search End -->



<!-- OffCanvas Cart Start -->
<div id="offcanvas-cart" class="offcanvas offcanvas-cart">
    <div class="inner" id="change-items">
        @include('pages.client.Cart.item-cart')
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
                <li><a href="{{URL::to('/contact_us')}}"><span class="menu-text">Liên hệ</span></a></li>
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