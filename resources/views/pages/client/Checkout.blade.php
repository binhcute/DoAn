@extends('layout_client')
@section('content')
@section('title','Thanh Toán')
<!-- Page Title/Header Start -->
<div class="page-title-section section" data-bg-image="{{asset('client/images/bg/page-title-1.jpg')}}">
    <div class="container">
        <div class="row">
            <div class="col">

                <div class="page-title">
                    <h1 class="title">Thanh Toán</h1>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('index')}}">Trang Chủ</a></li>
                        <li class="breadcrumb-item active">Thanh Toán</li>
                    </ul>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- Page Title/Header End -->

<!-- Checkout Section Start -->
<div class="section section-padding">
    <div class="container">
        <div class="section-title2 text-center">
            <h2 class="title">Thông tin thanh toán đơn hàng</h2>
        </div>
        <div class="row learts-mb-n30">

            <div class="col-lg-12 order-lg-2 learts-mb-30">
                <form method="post" action="{{route('Dat-Hang')}}" enctype="multipart/form-data" class="checkout-form learts-mb-50 submit-form-checkout">
                    @csrf
                    <div class="row">
                        <div class="col-12 learts-mb-20">
                            <label for="fullname">Người Nhận</label>
                            <input type="text" name="fullname" disabled required value="{{Auth::user()->firstName}} {{Auth::user()->lastName}}">
                        </div>
                        <div class="col-12 learts-mb-20">
                            <label for="address">Địa Chỉ Nhận Hàng <abbr class="required">*</abbr></label>
                            <input type="text" id="address" name="address" placeholder="Địa chỉ nhận hàng của bạn" required value="{{Auth::user()->address}}">
                        </div>
                        <div class="col-12 learts-mb-20">
                            <label for="phone">Số Điện Thoại <abbr class="required">*</abbr></label>
                            <input type="number" id="phone" name="phone" placeholder="Số điện thoại nhận của bạn.*" required value="{{Auth::user()->phone}}">
                        </div>
                        <div class="col-12 learts-mb-20">
                            <label for="note">Ghi Chú</label>
                            <textarea id="note" name="note" placeholder="Ghi chú cho đơn hàng"></textarea>
                        </div>

                        <div class="perfume-cart__contents ">

                            @foreach(Session::get('Cart')->product as $item)
                            <!-- Nội dung  -->
                            <div class="row_g no-gutters row_content hide-on-mobile">
                                <div class="col_g l-4_g m-4_g">
                                    <div class="perfume-cart__product ">
                                        <img class="product__img" src="{{URL::to('/')}}/image/product/{{$item['product_info']->product_img}}" alt="">
                                        <div>
                                            <span class="product__name">
                                                {{$item['product_info']->product_name}}
                                            </span>

                                        </div>

                                    </div>
                                </div>

                                <div class="col_g l-2_g m-2_g">
                                    <div class="perfume-cart__content perfume-cart__unit-sprice perfume-cart__center">
                                        {{number_format($item['product_info']->product_price)}}vnđ
                                    </div>
                                </div>

                                <div class="col_g l-3_g m-3_g">
                                    <div class="perfume-cart__content perfume-cart__quantity perfume-cart__center">
                                        <span class="quantity_num">{{$item['qty']}}</span>
                                    </div>
                                </div>

                                <div class="col_g l-3_g m-3_g">
                                    <div class="perfume-cart__content perfume-cart__into-money perfume-cart__center">
                                        {{$item['price']}}vnđ
                                    </div>
                                </div>

                            </div>

                            <!-- Sản phẩm thanh toán trên Mobile -->
                            <div class="row_g hide-on-tablet hide-on-pc">

                                <div class="col_g col_g-mar">
                                    <div class=" perfume-cart__product">
                                        <img class="product__img" src="{{URL::to('/')}}/image/product/{{$item['product_info']->product_img}}" alt="">
                                        <div>
                                            <span class="product__name">
                                                {{$item['product_info']->product_name}}
                                            </span>

                                            <div class="perfume-cart__content perfume-cart__center ">
                                                <span class="perfume-cart__title-num">Giá:</span>
                                                <span class="perfume-cart__into-money">{{number_format($item['price'])}}</span>
                                                <span>vnđ</span>
                                            </div>

                                            <div class="perfume-cart__content perfume-cart__quantity perfume-cart__center">
                                                <div class="perfume-cart__btn">
                                                    <span class="perfume-cart__title-num">Số lượng:</span>
                                                    <input readonly class="quantity_num quantity_num-def" value="{{$item['qty']}}">
                                                </div>
                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>
                            @endforeach

                        </div>
                        <table class=" table">
                            <tbody style="border:none;">
                                <tr>
                                    <th style="width:50%"></th>
                                    <th class="">Tổng số lượng: {{Session::get("Cart")->totalQuantity}} Sản Phẩm</th>
                                    <th>Tổng Tiền: {{number_format(Session::get('Cart')->totalPrice).' '.'VND'}}</th>
                                </tr>
                            </tbody>
                        </table>
                        <button type="submit" class="btn btn-dark btn-hover-primary">Đặt hàng ngay</button>
                    </div>
                </form>
            </div>


        </div>

    </div>
    <!-- Checkout Section End -->

    @endsection
    @section('page-js')
    <script>
        $('.submit-form-checkout').submit(function(event) {
            event.preventDefault();
            var form = $(this);
            var url = form.attr('action');
            $.ajax({
                type: "POST",
                url: url,
                data: form.serialize(),
                success: function(data) {
                    if (data.status == 'error') {
                        Swal.fire({
                            position: 'center',
                            icon: 'error',
                            title: 'Thất Bại',
                            text: data.message,
                            showConfirmButton: true,
                            timer: 2500
                        })
                    }
                    if (data.status == 'success') {
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: data.message,
                            text: data.content,
                            showConfirmButton: true,
                            timer: 2500
                        })
                        window.setTimeout(function() {
                            window.location.replace("{{URL::to('/')}}");
                        }, 2500);
                    }
                }
            });
        })
    </script>
    @endsection