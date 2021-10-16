@extends('layout_client')
@section('content')
@section('title','Trang Chủ')
<!-- Slider main container Start -->
<div class="home1-slider swiper-container">
    <div class="swiper-wrapper">
        <div class="home1-slide-item swiper-slide" data-swiper-autoplay="5000" data-bg-image="{{asset('client/images/slider/home1/slide-1.jpg')}}">
            <div class="home1-slide1-content">
                <span class="bg"></span>
                <span class="slide-border"></span>
                <span class="icon"><img src="{{asset('client/images/slider/home1/slide-1-1.png')}}" alt="Slide Icon"></span>
                <h2 class="title">Handicraft Shop</h2>
                <h3 class="sub-title">Just for you</h3>
                <div class="link"><a href="{{route('Danh-Sach-San-Pham')}}">shop now</a></div>
            </div>
        </div>
        <div class="home1-slide-item swiper-slide" data-swiper-autoplay="5000" data-bg-image="{{asset('client/images/slider/home1/slide-2.jpg')}}">
            <div class="home1-slide2-content">
                <span class="bg" data-bg-image="{{asset('client/images/slider/home1/slide-2-1.png')}}"></span>
                <span class="slide-border"></span>
                <span class="icon">
                    <img src="{{asset('client/images/slider/home1/slide-2-2.png')}}" alt="Slide Icon">
                    <img src="{{asset('client/images/slider/home1/slide-2-3.png')}}" alt="Slide Icon">
                </span>
                <h2 class="title">Newly arrived</h2>
                <h3 class="sub-title">Sale up to <br>10%</h3>
                <div class="link"><a href="{{route('Danh-Sach-San-Pham')}}">shop now</a></div>
            </div>
        </div>
        <div class="home1-slide-item swiper-slide" data-swiper-autoplay="5000" data-bg-image="{{asset('client/images/slider/home1/slide-3.jpg')}}">
            <div class="home1-slide3-content">
                <h2 class="title">Affectious gifts</h2>
                <h3 class="sub-title">
                    <img class="left-icon " src="{{asset('client/images/slider/home1/slide-2-2.png')}}" alt="Slide Icon">
                    For friends & family
                    <img class="right-icon " src="{{asset('client/images/slider/home1/slide-2-3.png')}}" alt="Slide Icon">
                </h3>
                <div class="link"><a href="{{route('Danh-Sach-San-Pham')}}">shop now</a></div>
            </div>
        </div>
    </div>
    <div class="home1-slider-prev swiper-button-prev"><i class="ti-angle-left"></i></div>
    <div class="home1-slider-next swiper-button-next"><i class="ti-angle-right"></i></div>
</div>
<!-- Slider main container End -->

<!-- Sale Banner Section Start -->
<div class="section section-padding">
    <div class="container">

        <!-- Section Title Start -->
        <div class="section-title text-center">
            <h3 class="sub-title">Dành Cho Bạn</h3>
            <h2 class="title title-icon-both">Danh Mục Sản Phẩm</h2>
        </div>
        <!-- Section Title End -->

    </div>
</div>
<!-- Sale Banner Section End -->

<!-- Category Banner Section Start -->
<div class="section section-fluid section-padding pt-0">
    <div class="container">
        <div class="category-banner1-carousel">
            @foreach ($cate as $item)
            <div class="col">
                <div class="category-banner1">
                    <div class="inner">
                        <a href="{{route('Danh-Muc',[Str::slug($item->cate_name,'-'),$item->cate_id])}}" class="image"><img src="{{ URL::to('/')}}/server/assets/image/category/{{ $item->cate_img }}" alt=""></a>
                        <div class="content">
                            <h3 class="title">
                                <a href="{{route('Danh-Muc',[Str::slug($item->cate_name,'-'),$item->cate_id])}}">{{$item->cate_name}}</a>
                                <span class="number">20</span>
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Category Banner Section End -->
<div class="container">
    <!-- Section Title Start -->
    <div class="section-title4 text-center">
        <h2 class="title title-icon-both">Dành cho bạn</h2>
    </div>
    <!-- Section Title End -->
    <!-- Product Tab Start -->
    <div class="row">
        <div class="col-12">
            <ul class="product-tab-list tab-hover2 nav">
                <li><a class="active" data-toggle="tab" href="#tab-new-sale">Sản Phẩm Mới</a></li>
                <li><a data-toggle="tab" href="#tab-best-sellers">Sản Phẩm Hot</a></li>
            </ul>
            <div class="prodyct-tab-content1 tab-content">
                <div class="tab-pane fade show active" id="tab-new-sale">

                    <!-- Products Start -->
                    <div class="products row row-cols-lg-4 row-cols-md-3 row-cols-sm-2 row-cols-1">
                        @foreach ($product_new as $item)
                        <div class="col">
                            <div class="product">
                                <div class="product-thumb">
                                    <a href="{{route('San-Pham',[Str::slug($item->product_name, '-'),$item->product_id])}}" class="image">
                                        @if($item->product_img_hover !=null)
                                        <img src="{{ URL::to('/') }}/server/assets/image/product/{{ $item->product_img }}" alt="Product Image">
                                        <img class="image-hover " src="{{ URL::to('/') }}/server/assets/image/product/hover/{{ $item->product_img_hover }}" alt="Product Image">
                                        @else
                                        <img src="{{ URL::to('/') }}/server/assets/image/product/{{ $item->product_img }}" alt="Product Image">
                                        @endif
                                    </a>
                                    <a href="javascript:" onclick="AddCart({{$item->product_id}})" class="add-to-wishlist hintT-left" data-hint="Add to cart"><i class="far fa-shopping-cart"></i></a>
                                </div>
                                <div class="product-info">
                                    <h6 class="title"><a href="{{route('San-Pham',[Str::slug($item->product_name, '-'),$item->product_id])}}">{{$item->product_name}}</a></h6>
                                    <span class="price">
                                        <span class="new">{{number_format($item->product_price).' '.'VND'}}</span>
                                    </span>
                                    <div class="product-buttons">
                                        <a href="#quickViewModal{{$item->product_id}}" data-toggle="modal" class="product-button hintT-top" data-hint="Quick View"><i class="fal fa-search"></i></a>
                                        <a href="javascript:" onclick="AddCart({{$item->product_id}})" class="product-button hintT-top" data-hint="Add to Cart"><i class="fal fa-shopping-cart"></i></a>
                                        <a href="#" class="product-button hintT-top" data-hint="Compare"><i class="fal fa-random"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @endforeach

                    </div>
                    <!-- Products End -->

                </div>
                <div class="tab-pane fade" id="tab-best-sellers">

                    <!-- Products Start -->
                    <div class="products row row-cols-lg-4 row-cols-md-3 row-cols-sm-2 row-cols-1">
                        @foreach ($product_hot as $item)
                        <div class="col">
                            <div class="product">
                                <form action="{{route('cart.store')}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{$item->product_id}}">
                                    <input type="hidden" name="qty" value="1">
                                    <div class="product-thumb">
                                        <a href="{{route('San-Pham',[Str::slug($item->product_name, '-'),$item->product_id])}}" class="image">
                                            @if($item->product_img_hover !=null)
                                            <img src="{{ URL::to('/') }}/server/assets/image/product/{{ $item->product_img }}" alt="Product Image">
                                            <img class="image-hover " src="{{ URL::to('/') }}/server/assets/image/product/hover/{{ $item->product_img_hover }}" alt="Product Image">
                                            @else
                                            <img src="{{ URL::to('/') }}/server/assets/image/product/{{ $item->product_img }}" alt="Product Image">
                                            @endif
                                        </a>
                                        <a href="javascript:" onclick="AddCart({{$item->product_id}})" class="add-to-wishlist hintT-left" data-hint="Add to cart"><i class="far fa-shopping-cart"></i></a>
                                    </div>
                                    <div class="product-info">
                                        <h6 class="title"><a href="{{route('San-Pham',[Str::slug($item->product_name, '-'),$item->product_id])}}">{{$item->product_name}}</a></h6>
                                        <span class="price">
                                            <span class="new">{{number_format($item->product_price).' '.'VND'}}</span>
                                        </span>
                                        <div class="product-buttons">
                                            <a href="#quickViewModal{{$item->product_id}}" data-toggle="modal" class="product-button hintT-top" data-hint="Quick View"><i class="fal fa-search"></i></a>
                                            <a href="javascript:" onclick="AddCart({{$item->product_id}})" class="product-button hintT-top" data-hint="Add to Cart"><i class="fal fa-shopping-cart"></i></a>
                                            <a href="#" class="product-button hintT-top" data-hint="Compare"><i class="fal fa-random"></i></a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <!-- Products End -->

                </div>
            </div>
        </div>
    </div>
    <!-- Product Tab End -->
    <div class="text-center learts-mt-70">
        <a href="{{URL::to('/product')}}" class="btn btn-dark btn-outline-hover-dark"><i class="ti-plus"></i> Xem Thêm</a>
    </div>

</div>
<br>
@include('pages.client.modal.modal-sanpham')
@endsection