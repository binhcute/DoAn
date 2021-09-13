@extends('layout_client')
@section('content')
@section('title','Danh Mục')
<!-- Page Title/Header Start -->
<div class="page-title-section section" data-bg-image="{{URL::to('/')}}/server/assets/image/category/{{$categories->cate_img}}">
    <div class="container">
        <div class="row">
            <div class="col">

                <div class="page-title">
                    <h1 class="title">{{$categories->cate_name}}</h1>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Trang Chủ</a></li>
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
                    <!-- Products Start -->
                    <div id="shop-products" class="products isotope-grid row row-cols-xl-4 row-cols-md-3 row-cols-sm-2 row-cols-1">

                        <div class="grid-sizer col-1"></div>
                        @foreach($product_by_category as $item)
                        <div class="grid-item col">
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
                                    <a href="wishlist.html" class="add-to-wishlist hintT-left" data-hint="Add to wishlist"><i class="far fa-heart"></i></a>
                                </div>
                                <div class="product-info">
                                    <h6 class="title"><a href="{{route('San-Pham',[Str::slug($item->product_name, '-'),$item->product_id])}}">{{$item->product_name}}</a></h6>
                                    <span class="price">
                                        {{number_format($item->product_price).' '.'VND'}}
                                    </span>
                                    <div class="product-buttons">
                                        <a href="#quickViewModal{{$item->product_id}}" data-toggle="modal" class="product-button hintT-top" data-hint="Quick View"><i class="fal fa-search"></i></a>
                                        <a onclick="AddCart({{$item->product_id}})" class="product-button hintT-top" data-hint="Add to Cart"><i class="fal fa-shopping-cart"></i></a>
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
@endsection