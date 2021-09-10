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
                        <li class="breadcrumb-item"><a href="{{route('index')}}">Home</a></li>
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
    @include('pages.client.cart.list-cart')
</div>
<script>
    function DeleteItemListCart(id) {
        console.log(id);
        $.ajax({
            url: 'delete-item-list-cart/' + id,
            type: "GET",
        }).done(function(response) {
            console.log(response);
            RenderList(response);
            alertify.error('Đã Xóa Sản Phẩm Thành Công');
        });
    }

    function SaveItemListCart(id) {
        console.log($("#qty-item-" + id).val());
        $.ajax({
            url: 'save-item-list-cart/' + id + '/' + $("#qty-item-" + id).val(),
            type: "GET",
        }).done(function(response) {
            // console.log($('#danh_sach').html(data.giao_dien));
            $('#danh_sach').empty();
            $('#danh_sach').html(response.giao_dien);
            console.log(response);
            alertify.success('Đã Cập Nhật Sản Phẩm Thành Công');
        });
    }
</script>
@endsection