@extends('layout_client')
@section('content')
@section('title','Sản Phẩm')

<!-- Page Title/Header Start -->
<div class="page-title-section section" data-bg-image="{{asset('client/images/bg/page-title-1.jpg')}}">
    <div class="container">
        <div class="row">
            <div class="col">

                <div class="page-title">
                    <h1 class="title">Sản Phẩm</h1>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Trang Chủ</a></li>
                        <li class="breadcrumb-item active">Sản Phẩm</li>
                    </ul>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- Page Title/Header End -->

<!-- Shop Products Section Start -->
<div class="section section-padding pt-0">

    <!-- Shop Toolbar Start -->
    <div class="shop-toolbar border-bottom">
        <div class="container">
            <div class="row learts-mb-n20">

                <!-- Isotop Filter Start -->
                <div class="col-md col-12 align-self-center learts-mb-20">
                    <div class="isotope-filter shop-product-filter">
                        <button onclick="openTabList('all')">Sản Phẩm</button>
                        <button onclick="openTabList('hot')">Sản Phẩm Hot</button>
                        <button onclick="openTabList('new')">Sản Phẩm Mới</button>
                        <button onclick="openTabList('sales')">Sản Phẩm Khuyến Mãi</button>
                    </div>
                </div>
                <!-- Isotop Filter End -->

                <div class="col-md-auto col-12 learts-mb-20">
                    <ul class="shop-toolbar-controls">


                        <li>
                            <div class="product-column-toggle d-none d-xl-flex">
                                <button class="toggle hintT-top" data-hint="5 Column" data-column="5"><i class="ti-layout-grid4-alt"></i></button>
                                <button class="toggle active hintT-top" data-hint="4 Column" data-column="4"><i class="ti-layout-grid3-alt"></i></button>
                                <button class="toggle hintT-top" data-hint="3 Column" data-column="3"><i class="ti-layout-grid2-alt"></i></button>
                            </div>
                        </li>

                    </ul>
                </div>

            </div>
        </div>
    </div>
    <!-- Shop Toolbar End -->

    <div class="section learts-mt-70">
        <div class="container">
            <div class="row learts-mb-n50">

                <div class="col-lg-9 col-12 learts-mb-50 order-lg-2">
                    <!-- Products Start -->
                    <div class="products isotope-grid row row-cols-xl-4 row-cols-md-3 row-cols-sm-2 row-cols-1">

                        <div class="grid-sizer col-1"></div>
                        @foreach($product as $item)
                        <div class="grid-item col list-product-sp" id="all">
                            <div class="product">
                                <div class="product-thumb">
                                    <a href="{{route('San-Pham',[Str::slug($item->product_name, '-'),$item->product_id])}}" class="image">
                                        <img src="{{ URL::to('/') }}/server/assets/image/product/{{ $item->product_img }}" alt="Product Image">
                                        <img class="image-hover " src="{{ URL::to('/') }}/server/assets/image/product/hover/{{ $item->product_img_hover }}" alt="Product Image">
                                    </a>
                                    <a href="wishlist.html" class="add-to-wishlist hintT-left" data-hint="Add to wishlist"><i class="far fa-heart"></i></a>
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
                        @foreach($product_hot as $item)
                        <div class="grid-item col list-product-sp" id="hot" style="display: none">
                            <div class="product">
                                <div class="product-thumb">
                                    <a href="{{route('San-Pham',[Str::slug($item->product_name, '-'),$item->product_id])}}" class="image">
                                        <img src="{{ URL::to('/') }}/server/assets/image/product/{{ $item->product_img }}" alt="Product Image">
                                        <img class="image-hover " src="{{ URL::to('/') }}/server/assets/image/product/hover/{{ $item->product_img_hover }}" alt="Product Image">
                                    </a>
                                    <a href="wishlist.html" class="add-to-wishlist hintT-left" data-hint="Add to wishlist"><i class="far fa-heart"></i></a>
                                </div>
                                <div class="product-info">
                                    <h6 class="title"><a href="{{route('San-Pham',[Str::slug($item->product_name, '-'),$item->product_id])}}">{{$item->product_name}}</a></h6>
                                    <span class="price">
                                        <span class="new">{{number_format($item->product_price).' '.'VND'}}</span>
                                    </span>
                                    <div class="product-buttons">
                                        <a href="#quickViewModal{{$item->product_id}}" data-toggle="modal" class="product-button hintT-top" data-hint="Quick View"><i class="fal fa-search"></i></a>
                                        <a onclick="addCart({{$item->product_id}})" class="product-button hintT-top" data-hint="Add to Cart"><i class="fal fa-shopping-cart"></i></a>
                                        <a href="#" class="product-button hintT-top" data-hint="Compare"><i class="fal fa-random"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @foreach($product_new as $item)
                        <div class="grid-item col list-product-sp" id="new" style="display: none">
                            <div class="product">
                                <div class="product-thumb">
                                    <a href="{{route('San-Pham',[Str::slug($item->product_name, '-'),$item->product_id])}}" class="image">
                                        <img src="{{ URL::to('/') }}/server/assets/image/product/{{ $item->product_img }}" alt="Product Image">
                                        <img class="image-hover " src="{{ URL::to('/') }}/server/assets/image/product/hover/{{ $item->product_img_hover }}" alt="Product Image">
                                    </a>
                                    <a href="wishlist.html" class="add-to-wishlist hintT-left" data-hint="Add to wishlist"><i class="far fa-heart"></i></a>
                                </div>
                                <div class="product-info">
                                    <h6 class="title"><a href="{{route('San-Pham',[Str::slug($item->product_name, '-'),$item->product_id])}}">{{$item->product_name}}</a></h6>
                                    <span class="price">
                                        <span class="new">{{number_format($item->product_price).' '.'VND'}}</span>
                                    </span>
                                    <div class="product-buttons">
                                        <a href="#quickViewModal{{$item->product_id}}" data-toggle="modal" class="product-button hintT-top" data-hint="Quick View"><i class="fal fa-search"></i></a>
                                        <a onclick="addCart({{$item->product_id}})" class="product-button hintT-top" data-hint="Add to Cart"><i class="fal fa-shopping-cart"></i></a>
                                        <a href="#" class="product-button hintT-top" data-hint="Compare"><i class="fal fa-random"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <!-- Products End -->

                </div>

                <div class="col-lg-3 col-12 learts-mb-10 order-lg-1">

                    <!-- Search Start -->
                    <div class="single-widget learts-mb-40">
                    <div class="widget-search">
                        <form class="typeahead" role="search">
                            <input type="search" name="q" class="form-control search-input" placeholder="Hãy nhập từ bất kỳ..." autocomplete="off">
                        </form>
                    </div>
                </div>
                    <!-- Search End -->

                    <!-- Categories Start -->
                    <div class="single-widget learts-mb-40">
                        <h3 class="widget-title product-filter-widget-title">Danh Mục Sản Phẩm</h3>
                        <ul class="widget-list">
                            @foreach ($product_cate as $item)
                            <li><a href="{{URL::to('/product_categories',$item->cate_id)}}">{{ $item->cate_name}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <!-- Categories End -->
                    <!-- Portfolio Start -->
                    <div class="single-widget learts-mb-40">
                        <h3 class="widget-title product-filter-widget-title">Nhà Cung Cấp</h3>
                        <ul class="widget-list">
                            @foreach ($portfolio as $item)
                            <li><a href="{{URL::to('/brand',$item->port_id)}}">{{ $item->port_name}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <!-- Portfolio End -->


                </div>


            </div>
        </div>
    </div>

</div>
<!-- Shop Products Section End -->
<!-- Modal -->
@foreach ($modal as $modal)
<div class="quickViewModal modal fade" id="quickViewModal{{$modal->product_id}}">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <button class="close" data-dismiss="modal">&times;</button>
            <div class="row learts-mb-n30">

                <!-- Product Images Start -->
                <div class="col-lg-6 col-12 learts-mb-30">
                    <div class="product-images">
                        <div class="product-gallery-slider-quickview">
                            <div class="product-zoom" data-image="{{URL::to('/') }}/server/assets/image/product/{{$modal->product_img}}">
                                <img src="{{URL::to('/') }}/server/assets/image/product/{{$modal->product_img}}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Product Images End -->

                <!-- Product Summery Start Modal -->
                <div class="col-lg-6 col-12 overflow-hidden learts-mb-30">
                    <div class="product-summery customScroll">
                        <div class="product-ratings">
                            <span class="star-rating">
                                <span class="rating-active" style="width: 100%;">Đánh Giá</span>
                            </span>
                            <a href="#reviews" class="review-link">(<span class="count">Có 3</span> lượt đánh giá sản phẩm)</a>
                        </div>
                        <h3 class="product-title">{{$modal->product_name}}</h3>
                        <div class="product-price">{{number_format($modal->product_price).' '.'VND'}}</div>
                        <div class="product-description">
                            <p>{!!$modal->product_description!!}</p>
                        </div>
                        <div class="product-buttons">
                            <a href="#" class="btn btn-icon btn-outline-body btn-hover-dark"><i class="fal fa-heart"></i></a>
                            <a href="javascript:" onclick="AddCart({{$item->product_id}})" class="btn btn-dark btn-outline-hover-dark"><i class="fal fa-shopping-cart"></i> Add to Cart</a>
                            <a href="#" class="btn btn-icon btn-outline-body btn-hover-dark"><i class="fal fa-random"></i></a>
                        </div>
                        <div class="product-brands">
                            <span class="title">Nhà Cung Cấp</span>
                            <div class="brands">
                                <a href="{{route('Nha-Cung-Cap',[Str::slug($modal->port_name, '-'),$modal->port_id])}}"><img src="{{URL::to('/') }}/server/assets/image/portfolio/avatar/{{$modal->port_avatar}}" alt=""></a>
                            </div>
                        </div>
                        <div class="product-meta mb-0">
                            <table>
                                <tbody>
                                    <tr>
                                        <td class="label"><span>Số Series</span></td>
                                        <td class="value">0{{$modal->product_id}}</td>
                                    </tr>
                                    <tr>
                                        <td class="label"><span>Danh Mục</span></td>
                                        <td class="value">
                                            <ul class="product-category">
                                                <li><a href="#">{{$modal->cate_name}}</a></li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="label"><span>Từ Khóa</span></td>
                                        <td class="value">
                                            <ul class="product-tags">
                                                <li><a href="#">{{$modal->product_keyword}}</a></li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="label"><span>Chia Sẻ</span></td>
                                        <td class="va">
                                            <div class="product-share">
                                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                                <a href="#"><i class="fab fa-twitter"></i></a>
                                                <a href="#"><i class="fab fa-google-plus-g"></i></a>
                                                <a href="#"><i class="fab fa-pinterest"></i></a>
                                                <a href="#"><i class="fal fa-envelope"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- Product Summery End -->

            </div>
        </div>
    </div>
</div>
@endforeach
@endsection
@section('page-js')
<script type="text/javascript">
    function openTabList(cateSp) {
        var i;
        var x= document.getElementsByClassName("list-product-sp");
        for (i = 0; i < x.length; i++) {
            x[i].style.display="none";
        }
        document.getElementById(cateSp).style.display = "block";
    }
</script>
@endsection
