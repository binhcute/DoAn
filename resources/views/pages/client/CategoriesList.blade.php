@extends('layout_client')
@section('content')
@section('title','Danh Mục')
<!-- Page Title/Header Start -->
<div class="page-title-section section" data-bg-image="{{URL::to('/')}}/image/category/{{$categories->cate_img}}">
    <div class="container">
        <div class="row">
            <div class="col">

                <div class="page-title">
                    <h1 class="title">{{$categories->cate_name}}</h1>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('index')}}">Trang Chủ</a></li>
                        <li class="breadcrumb-item active">Danh Mục Sản Phẩm</li>
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
                    <div class="isotope-filter shop-product-filter" data-target="#shop-products">
                        <button class="active" data-filter="#">{{$categories->cate_name}}</button>
                        <!-- <button data-filter=".featured">Hot Products</button>
                            <button data-filter=".new">New Products</button>
                            <button data-filter=".sales">Sales Products</button> -->
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
                    @if(count($product_by_category)!= 0)
                    <!-- Products Start -->
                    <div id="shop-products" class="products isotope-grid row row-cols-xl-4 row-cols-md-3 row-cols-sm-2 row-cols-1">

                        <div class="grid-sizer col-1"></div>
                        @foreach($product_by_category as $item)
                        <div class="grid-item col">
                            <div class="product">
                                <div class="product-thumb">
                                    <a href="{{route('San-Pham',[Str::slug($item->product_name, '-'),$item->product_id])}}" class="image">
                                        @if($item->product_img_hover !=null)
                                        <img src="{{ URL::to('/') }}/image/product/{{ $item->product_img }}" alt="Product Image">
                                        <img class="image-hover " src="{{ URL::to('/') }}/image/product/hover/{{ $item->product_img_hover }}" alt="Product Image">
                                        @else
                                        <img src="{{ URL::to('/') }}/image/product/{{ $item->product_img }}" alt="Product Image">
                                        @endif
                                    </a>
                                    <a href="javascript:" onclick="AddCart({{$item->product_id}})" class="add-to-wishlist hintT-left" data-hint="Thêm vào Giỏ Hàng"><i class="far fa-shopping-cart"></i></a>
                                </div>
                                <div class="product-info">
                                    <h6 class="title"><a href="{{route('San-Pham',[Str::slug($item->product_name, '-'),$item->product_id])}}">{{$item->product_name}}</a></h6>
                                    <span class="price">
                                        {{number_format($item->product_price).' '.'VND'}}
                                    </span>
                                    <div class="product-buttons">
                                        <a href="#quickViewModal{{$item->product_id}}" data-toggle="modal" class="product-button hintT-top" data-hint="Xem Nhanh"><i class="fal fa-search"></i></a>
                                        <a onclick="AddCart({{$item->product_id}})" class="product-button hintT-top" data-hint="Thêm vào Giỏ Hàng"><i class="fal fa-shopping-cart"></i></a>

                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <!-- Products End -->
                    @else
                    <div class="text-center">
                        <img src="{{URL::to('/')}}/image/example/list-empty.png" alt="" width="50%">
                    </div>
                    @endif
                </div>
                <div class="col-lg-3 col-12 learts-mb-10 order-lg-1">

                    <!-- Categories Start -->
                    <div class="single-widget learts-mb-40">
                        <h3 class="widget-title product-filter-widget-title">Danh Mục Sản Phẩm</h3>
                        <ul class="widget-list">
                            @foreach ($product_cate as $item)
                            <li><a href="{{route('Danh-Muc',[Str::slug($item->cate_name, '-'),$item->cate_id])}}">{{ $item->cate_name}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <!-- Categories End -->
                </div>


            </div>
        </div>
    </div>

</div>
<!-- Shop Products Section End -->
@include('pages.client.Modal.modal-SanPham')
@endsection