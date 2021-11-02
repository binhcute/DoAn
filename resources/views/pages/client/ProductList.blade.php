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
                        <button class="active">Sản Phẩm</button>
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

               @include('pages.client.List-product.dsSanPham')

                <div class="col-lg-3 col-12 learts-mb-10 order-lg-1">

                    <!-- Categories Start -->
                    <div class="single-widget learts-mb-40">
                        <h3 class="widget-title product-filter-widget-title">Danh Mục Sản Phẩm</h3>
                        <ul class="widget-list">
                            <li><a href="#">Sản Phẩm Hot</a></li>
                            <li><a href="#">Sản Phẩm Mới</a></li>
                            <li><a href="#">Sản Phẩm Khuyến Mãi</a></li>
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
<!-- Lấy giá trị từ phân trang
<script>
    $(document).ready(function() {
        $(document).on('click', '.pagination a', function(event) {
            event.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            phanTrangBaiViet(page);
        });
    });

    function phanTrangBaiViet(page) {
        $.ajax({
            url: '?page=' + page,
            success: function(data) {
                $('#phan-trang-danh-sach-san-pham').html(data);
            }
        });
    }
</script> -->