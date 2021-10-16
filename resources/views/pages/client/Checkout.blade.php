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
                        <li class="breadcrumb-item"><a href="{{route('index')}}">Home</a></li>
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
        <div class="checkout-coupon">
            <p class="coupon-toggle">Have a coupon? <a href="#checkout-coupon-form" data-toggle="collapse">Click here to enter your code</a></p>
            <div id="checkout-coupon-form" class="collapse">
                <div class="coupon-form">
                    <p>If you have a coupon code, please apply it below.</p>
                    <form action="#" class="learts-mb-n10">
                        <input class="learts-mb-10" type="text" placeholder="Coupon code">
                        <button class="btn btn-dark btn-outline-hover-dark learts-mb-10">apply coupon</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="section-title2 text-center">
            <h2 class="title">Thông tin đơn hàng</h2>
        </div>
        <div class="row learts-mb-n30">

            <div class="col-lg-12 order-lg-2 learts-mb-30">
                <form method="post" action="{{route('Dat-Hang')}}" enctype="multipart/form-data" class="checkout-form learts-mb-50 submit-form-checkout">
                    @csrf
                    <div class="row">
                        <div class="col-12 learts-mb-20">
                            <label for="bdCompanyName">Tài Khoản</label>
                            <input type="text" id="bdCompanyName" disabled required value="{{Auth::user()->username}}">
                        </div>
                        <div class="col-12 learts-mb-20">
                            <label for="bdAddress1">Địa Chỉ Nhận Hàng <abbr class="required">*</abbr></label>
                            <input type="text" id="bdAddress1" name="address" placeholder="Địa chỉ nhận hàng của bạn" required value="{{Auth::user()->address}}">
                        </div>
                        <div class="col-12 learts-mb-20">
                            <label for="bdPostcode">Số Điện Thoại</label>
                            <input type="text" id="bdAddress2" name="phone" placeholder="Số điện thoại nhận của bạn.*" required value="{{Auth::user()->phone}}">
                        </div>
                        <div class="col-12 learts-mb-20">
                            <label for="bdOrderNote">Ghi Chú</label>
                            <textarea id="ckeditor" name="note" placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                        </div>
                        <button type="submit" class="btn btn-dark btn-outline-hover-dark">Đặt hàng ngay</button>
                    </div>
                </form>
            </div>


        </div>

        <div class="perfume-cart__contents ">
            <!-- Tiêu đề  -->
            <div class="row_g no-gutters row_g-title hide-on-mobile">

                <div class="col_g l-5_g m-50_g">
                    <div class="perfume-cart__title">
                        Sản phẩm
                    </div>
                </div>

                <div class="col_g l-2_g m-12-2_g">
                    <div class="perfume-cart__title">
                        Đơn giá
                    </div>
                </div>

                <div class="col_g l-1_g m-12-2_g">
                    <div class="perfume-cart__title">
                        Số lượng
                    </div>
                </div>

                <div class="col_g l-2_g m-12-2_g">
                    <div class="perfume-cart__title">
                        Khuyến mãi
                    </div>
                </div>

                <div class="col_g l-2_g m-12-2_g">
                    <div class="perfume-cart__title">
                        Thành tiền
                    </div>
                </div>

            </div>
            @foreach(Session::get('Cart')->product as $item)
            <!-- Nội dung  -->
            <div class="row_g no-gutters row_content hide-on-mobile">
                <div class="col_g l-5_g m-50_g">
                    <div class="perfume-cart__product ">
                        <img class="product__img" src="{{URL::to('/')}}/server/assets/image/product/{{$item['product_info']->product_img}}" alt="">
                        <div>
                            <span class="product__name">
                            {{$item['product_info']->product_name}}
                            </span>
                            <span class="product__promotion-name">
                                Sale 7/7
                            </span>
                        </div>

                    </div>
                </div>

                <div class="col_g l-2_g m-12-2_g">
                    <div class="perfume-cart__content perfume-cart__unit-sprice perfume-cart__center">
                    {{number_format($item['product_info']->product_price)}}vnđ
                    </div>
                </div>

                <div class="col_g l-1_g m-12-2_g">
                    <div class="perfume-cart__content perfume-cart__quantity perfume-cart__center">
                        <span class="quantity_num">{{$item['qty']}}</span>
                    </div>
                </div>

                <div class="col_g l-2_g m-12-2_g">
                    <div class="perfume-cart__content perfume-cart__promotion perfume-cart__center">
                    {{number_format($item['product_info']->product_price)}}vnđ
                    </div>
                </div>

                <div class="col_g l-2_g m-12-2_g">
                    <div class="perfume-cart__content perfume-cart__into-money perfume-cart__center">
                    {{$item['price']}}vnđ
                    </div>
                </div>

            </div>

            <!-- Sản phẩm thanh toán trên Mobile -->
            <div class="row_g hide-on-tablet hide-on-pc">

                <div class="col_g col_g-mar">
                    <div class=" perfume-cart__product">
                        <img class="product__img" src="{{URL::to('/')}}/server/assets/image/product/{{$item['product_info']->product_img}}" alt="">
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
            <!-- Button -->
            <div class="row_g no-gutters">
                <div class="col_g l-12_g m-12_g c-12_g">
                    <div class="cart-pay">
                        <a class="cart-back__btn">Trở lại</a>
                        <a class="cart-pay__btn">
                            <span class="cart-pay__btn-text">Xác nhận</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Checkout Section End -->

    @endsection
    @section('page-js')
    <script>
        $('.submit-form-checkout').submit(function(event) {
            event.preventDefault();
            console.log('fasdf');
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
                            title: 'Thành Công',
                            text: data.message,
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