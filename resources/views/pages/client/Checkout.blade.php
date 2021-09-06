@extends('layout_client')
@section('content')
@section('title','Thanh Toán')
<form method="post" action="{{route('Dat-Hang')}}" enctype="multipart/form-data" class="submit-form-checkout">
    @csrf
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
            <div class="section-title2">
                <h2 class="title">Chi Tiết Hóa Đơn</h2>
            </div>
            <form action="#" class="checkout-form learts-mb-50">
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
            <div class="section-title2 text-center">
                <h2 class="title">Your order</h2>
            </div>
            <div class="row learts-mb-n30">

                @if(Session::has("Cart") != null)
                <div class="col-lg-6 order-lg-2 learts-mb-30">
                    <div class="order-review">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="name">Sản Phẩm</th>
                                    <th class="total">Thành Tiền</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach(Session::get('Cart')->product as $item)
                                <tr>
                                    <td class="name">{{$item['product_info']->product_name}}&nbsp; <strong class="quantity">×&nbsp;{{$item['qty']}}</strong></td>
                                    <td class="total"><span>{{number_format($item['price']).' '.'VND'}}</span></td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr class="total">
                                    <th>Tổng Cộng</th>
                                    <td><strong><span>{{number_format(Session::get('Cart')->totalPrice).' '.'VND'}}</span></strong></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>

                <div class="col-lg-6 order-lg-1 learts-mb-30">
                    <div class="order-payment">
                        <div class="payment-method">
                            <div class="accordion" id="paymentMethod">
                                <div class="card active">
                                    <div class="card-header">
                                        <button data-toggle="collapse" type="button" data-target="#checkPayments">Thanh Toán Khi Nhận Hàng</button>
                                    </div>
                                    <div id="checkPayments" class="collapse show" data-parent="#paymentMethod">
                                        @if(Auth::check())
                                        <div class="card-body">
                                            <p>Shipper sẽ giao tới</p>
                                            <input type="text" name="address" value="{{ Auth::user()->address }}">
                                        </div>
                                        <div class="card-body">
                                            <p>Số Điện Thoại Nhận Hàng</p>
                                            <input type="text" name="phone" value="{{ Auth::user()->phone }}">
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <button data-toggle="collapse" type="button" data-target="#cashkPayments">Chuyển Khoản </button>
                                    </div>
                                    <div id="cashkPayments" class="collapse" data-parent="#paymentMethod">
                                        <div class="card-body">
                                            <p>Pay with cash upon delivery.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <button data-toggle="collapse" type="button" data-target="#payPalPayments">Thẻ Ghi Nợ <img src="client/images/others/pay-2.png" alt=""></button>
                                    </div>
                                    <div id="payPalPayments" class="collapse" data-parent="#paymentMethod">
                                        <div class="card-body">
                                            <p>Pay via PayPal; you can pay with your credit card if you don’t have a PayPal account.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <p class="payment-note">Miễn phí vận chuyển</p>
                            <button type="submit" class="btn btn-dark btn-outline-hover-dark">place order</button>
                        </div>
                    </div>
                </div>
                @endif

            </div>
        </div>
    </div>
    <!-- Checkout Section End -->
</form>
@endsection
@section('page-js')
<script>
    function submitCheckout(event) {
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

    }
    $(function() {
        $(document).on('click', '.submit-form-checkout', submitCheckout);
    });
</script>
@endsection