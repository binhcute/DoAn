@extends('layout_client')
@section('content')
@section('title','Giỏ Hàng')
<!-- Page Title/Header Start -->
<div class="page-title-section section" data-bg-image="{{asset('client/images/bg/page-title-1.jpg')}}">
    <div class="container">
        <div class="row">
            <div class="col">

                <div class="page-title">
                    <h1 class="title">Giỏ Hàng</h1>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('index')}}">Trang Chủ</a></li>
                        <li class="breadcrumb-item active">Giỏ Hàng</li>
                    </ul>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- Page Title/Header End -->
<!-- Shopping Cart Section Start -->
<div class="section section-padding" id="danh_sach">
    @include('pages.client.Cart.list-cart')
</div>
<script>
    function RenderList(response) {
        $("#danh_sach").empty();
        $("#danh_sach").html(response);
    }

    function DeleteItemListCart(id) {
        $.ajax({
            url: 'delete-item-list-cart/' + id,
            type: "GET",
        }).done(function(response) {
            RenderList(response.giao_dien);
            alertify.error('Đã Xóa Sản Phẩm Thành Công');
            tangSanPham();
            giamSanPham();
        });
    }

    function SaveItemListCart(id, so_luong) {
        // console.log($("#qty-item-" + id).val());
        $.ajax({
            url: 'save-item-list-cart/' + id + '/' + so_luong,
            type: "GET",
        }).done(function(response) {
            // console.log($('#danh_sach').html(data.giao_dien));
            $('#danh_sach').empty();
            $('#danh_sach').html(response.giao_dien);

            if ($('.quantity_num').val() == 1) {
                $('.quantity__minus').prop("disabled", true);
            }

            alertify.success('Đã Cập Nhật Sản Phẩm Thành Công');
            tangSanPham();
            giamSanPham();
        });
    }
</script>
@endsection