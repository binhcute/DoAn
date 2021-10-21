@extends('layout_client')
@section('content')
@section('title','Tài Khoản')

<!-- Page Title/Header Start -->
<div class="page-title-section section" data-bg-image="{{asset('client/images/bg/page-title-1.jpg')}}">
    <div class="container">
        <div class="row">
            <div class="col">

                <div class="page-title">
                    <h1 class="title">Tài Khoản</h1>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('index')}}">Trang Chủ</a></li>
                        <li class="breadcrumb-item active">Tài Khoản </li>
                    </ul>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- Page Title/Header End -->

<!-- My Account Section Start -->
<div class="section section-padding">
    <div class="container">
        <div class="row learts-mb-n30">

            <!-- My Account Tab List Start -->
            <div class="col-lg-4 col-12 learts-mb-30">
                <div class="myaccount-tab-list nav">
                    <a href="#dashboad" class="active" data-toggle="tab">Thông tin <i class="far fa-home"></i></a>
                    <a href="#orders" data-toggle="tab">Hóa Đơn <i class="far fa-file-alt"></i></a>
                    <a href="#address" data-toggle="tab">Địa Chỉ của bạn <i class="far fa-map-marker-alt"></i></a>
                    <a href="#account-info" data-toggle="tab">Thông tin tài khoản <i class="far fa-user"></i></a>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">Đăng Xuất <i class="far fa-sign-out-alt"></i>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </a>
                </div>
            </div>
            <!-- My Account Tab List End -->

            <!-- My Account Tab Content Start -->
            <div class="col-lg-8 col-12 learts-mb-30">
                <div class="tab-content">

                    <!-- Single Tab Content Start -->
                    <div class="tab-pane fade show active" id="dashboad">
                        <div class="myaccount-content dashboad">
                            <p>Xin chào <strong>{{Auth::user()->username }}</strong> (nếu không phải <strong>{{Auth::user()->username }}</strong>?
                                <a href="{{ route('logout') }}"><i data-feather="log-in"> </i>Xin hãy đăng xuất.)</a>
                            </p>
                            <p>Từ trang tổng quan tài khoản, bạn có thể xem các <span>đơn đặt hàng gần đây</span>, quản lý <span>địa chỉ giao hàng và thah toán</span>, cũng như <span>chỉnh sửa mật khẩu và chi tiết tài khoản của mình</span>.</p>
                        </div>
                    </div>
                    <!-- Single Tab Content End -->

                    <!-- Single Tab Content Start -->
                    <div class="tab-pane fade" id="orders">
                        <div class="myaccount-content order">
                            <div class="table-responsive">

                                <div class="perfume-cart__contents ">
                                    <!-- Tiêu đề -->
                                    <div class="row_g no-gutters row_g-title hide-on-mobile">

                                        <div class="col_g l-4_g m-50_g">
                                            <div class="perfume-cart__title">
                                                Sản phẩm
                                            </div>
                                        </div>

                                        <div class="col_g l-1_g m-10-2_g">
                                            <div class="perfume-cart__title">
                                                Số lượng
                                            </div>
                                        </div>


                                        <div class="col_g l-2_g m-10-2_g">
                                            <div class="perfume-cart__title">
                                                Thành tiền
                                            </div>
                                        </div>

                                        <div class="col_g l-1_g m-10-2_g">
                                            <div class="perfume-cart__title">
                                                Trạng Thái
                                            </div>
                                        </div>

                                    </div>
                                    <!-- Nội dung -->
                                    <div class="row_g no-gutters row_content hide-on-mobile">
                                        <div class="col_g l-4_g m-50_g">
                                            <div class=" perfume-cart__product">
                                                <img class="product__img" src="{{URL::to('/')}}/server/assets/image/product/product_info']->product_img}}" alt="">
                                                <div>
                                                    <span class="product__name">
                                                        product_info']->product_name}}
                                                    </span>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="col_g l-1_g m-10-2_g">
                                            <div class="perfume-cart__content perfume-cart__quantity perfume-cart__center">
                                                <span class="perfume-cart__promotion">price'])}}</span>
                                            </div>
                                        </div>
                                        <div class="col_g l-2_g m-10-2_g">
                                            <div class="perfume-cart__content  perfume-cart__center">
                                                <span class="perfume-cart__promotion">price'])}}</span>
                                                <span>vnđ</span>
                                            </div>
                                        </div>

                                        <div class="col_g l-2_g m-10-2_g">
                                            <div class="perfume-cart__content perfume-cart__center">
                                                <span class="perfume-cart__into-money">price'])}}</span>
                                            </div>
                                        </div>

                                    </div>

                                    <!-- Sản phẩm của giỏ hàng trên Mobile -->
                                    <div class="row_g hide-on-tablet hide-on-pc">

                                        <div class="col_g col_g-mar">
                                            <div class=" perfume-cart__product">
                                                <img class="product__img" src="{{URL::to('/')}}/server/assets/image/product/product_info']->product_img}}" alt="">
                                                <div>
                                                    <span class="product__name">
                                                        product_info']->product_name}}
                                                    </span>

                                                    <div class="col_g c-0_g">
                                                        <div class="perfume-cart__content perfume-cart__center">
                                                            <span class="perfume-cart__unit-sprice">product_info']->product_price}}</span>
                                                            <span>vnđ</span>
                                                        </div>
                                                    </div>

                                                    <div class="col_g c-0_g">
                                                        <div class="perfume-cart__content  perfume-cart__center">
                                                            <span class="perfume-cart__promotion">product_info']->product_price}}</span>
                                                            <span>vnđ</span>
                                                        </div>
                                                    </div>

                                                    <div class="perfume-cart__content perfume-cart__center ">
                                                        <span class="perfume-cart__title-num">Tổng Tiền:</span>
                                                        <span class="perfume-cart__into-money">price']}}</span>
                                                        <span>vnđ</span>
                                                    </div>

                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Single Tab Content End -->


                    <!-- Single Tab Content Start -->
                    <div class="tab-pane fade" id="address">
                        <div class="myaccount-content address">
                            <p>The following addresses will be used on the checkout page by default.</p>
                            <div class="row learts-mb-n30">
                                <div class="col-md-6 col-12 learts-mb-30">
                                    <h4 class="title">Địa Chỉ Của Bạn <a href="#" class="edit-link">edit</a></h4>
                                    <address>
                                        <p><strong>{{Auth::user()->firstName}} {{Auth::user()->lastName}}</strong></p>
                                        <p>{!!Auth::user()->address!!}</p>
                                        <p>Mobile: {{Auth::user()->phone}}</p>
                                    </address>
                                </div>
                                <div class="col-md-6 col-12 learts-mb-30">
                                    <h4 class="title">Shipping Address <a href="#" class="edit-link">edit</a></h4>
                                    <address>
                                        <p><strong>Alex Tuntuni</strong></p>
                                        <p>1355 Market St, Suite 900 <br>
                                            San Francisco, CA 94103</p>
                                        <p>Mobile: (123) 456-7890</p>
                                    </address>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- Single Tab Content End -->

                    <!-- Single Tab Content Start -->
                    <div class="tab-pane fade" id="account-info">
                        <div class="myaccount-content account-details">
                            <div class="account-details-form">
                                <form action="{{route('post.change_account')}}" method="post" enctype="multipart/form-data" class="thay-doi-thong-tin-nguoi-dung">
                                    @csrf
                                    <div class="row learts-mb-n30">
                                        @if(Auth::user()->avatar!=null)
                                        <div class="col-12 learts-mb-30">
                                            <label for="event__input-hover-0">Avatar <abbr class="required">*</abbr></label>
                                            <div class="account-client">
                                                <input hidden class="form-control imageHover" id="event__input-hover-0" name="img_hover" type="file" onchange="uploadFileHover(this, 0)" accept=".jpg, .png">

                                                <img id="event__img-hover-0" alt="slider" src="{{URL::to('/') }}/server/assets/image/account/{{Auth::user()->avatar }}" alt="">

                                            </div>
                                        </div>
                                        @else
                                        <div class="col-12 learts-mb-30">
                                            <div class="single-input-item">
                                                <label for="display-name">Avatar <abbr class="required">*</abbr></label>
                                                <input type="file" name="display-name">
                                            </div>
                                        </div>
                                        @endif
                                        <div class="col-md-6 col-12 learts-mb-30">
                                            <div class="single-input-item">
                                                <label for="first-name">Họ <abbr class="required">*</abbr></label>
                                                <input type="text" name="firstName" value="{{Auth::user()->firstName}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12 learts-mb-30">
                                            <div class="single-input-item">
                                                <label for="last-name">Tên <abbr class="required">*</abbr></label>
                                                <input type="text" name="lastName" value="{{Auth::user()->lastName}}">
                                            </div>
                                        </div>
                                        <div class="col-12 learts-mb-30">
                                            <label for="email">Email<abbr class="required">*</abbr></label>
                                            <input type="email" name="email" value="{{Auth::user()->email}}">
                                        </div>
                                        <div class="col-12 learts-mb-30">
                                            <label for="email">Số Điện Thoại<abbr class="required">*</abbr></label>
                                            <input type="number" name="phone" value="{{Auth::user()->phone}}">
                                        </div>
                                        <div class="col-12 learts-mb-30">
                                            <label for="email">Địa Chỉ<abbr class="required">*</abbr></label>
                                            <input type="text" name="address" value="{{Auth::user()->address}}">
                                        </div>
                                        <div class="col-12 learts-mb-30">
                                            <label for="gender">Giới tính<abbr class="required">*</abbr></label>
                                            @switch (Auth::user()->gender)
                                            @case(1)
                                            <input type="radio" checked name="gender" value="1">Nam
                                            <input type="radio" name="gender" value="0">Nữ
                                            @break
                                            @case(0)
                                            <input type="radio" name="gender" value="1">Nam
                                            <input type="radio" checked name="gender" value="0">Nữ
                                            @break
                                            @endswitch
                                        </div>
                                        <div class="col-12 learts-mb-30">
                                            <label for="email">Ngày Sinh<abbr class="required">*</abbr></label>
                                            <input type="date" name="birthday" value="{{Auth::user()->birthday}}">
                                        </div>
                                        <div class="col-12 learts-mb-30">
                                            <button type="submit" class="btn btn-dark btn-outline-hover-dark">Save Changes</button>
                                        </div>
                                    </div>
                                </form>
                                <form action="{{route('post.change_password')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="col-12 learts-mb-30 learts-mt-30">
                                        <fieldset>
                                            <legend>Password change</legend>
                                            <div class="row learts-mb-n30">
                                                <div class="col-12 learts-mb-30">
                                                    <label for="old_password">Current password (leave blank to leave unchanged)</label>
                                                    <input type="password" name="old_password">
                                                </div>
                                                <div class="col-12 learts-mb-30">
                                                    <label for="new-pwd">New password (leave blank to leave unchanged)</label>
                                                    <input type="password" name="new_pwd" id="new_pwd">
                                                </div>
                                                <div class="col-12 learts-mb-30">
                                                    <label for="confirm-pwd">Confirm new password</label>
                                                    <input type="password" name="confirm_pwd" id="confirm_pwd">
                                                    <span id="message-pwd"></span>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>
                                    <div class="col-12 learts-mb-30">
                                        <button type="submit" class="btn btn-dark btn-outline-hover-dark">Save Changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div> <!-- Single Tab Content End -->

                </div>
            </div> <!-- My Account Tab Content End -->
        </div>
    </div>
</div>
<!-- My Account Section End -->
<!-- delete and choose file -->
<script type="text/javascript">
    function uploadFileHover(input, tam) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#event__img-hover-' + tam).attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
        $('#event__input-hover-' + tam).change(function() {
            readURL(this);
        });
    }
</script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('.thay-doi-thong-tin-nguoi-dung').submit(function(event) {
        event.preventDefault();
        var form = $(this);
        var url = form.attr('action');
        console.log(form.serialize());
        // $.ajax({
        //     type: "POST",
        //     url: url,
        //     data: form.serialize(),
        //     success: function(data) {
        //         if (data.status == 'error') {
        //             Swal.fire({
        //                 position: 'center',
        //                 icon: 'error',
        //                 title: 'Thất Bại',
        //                 text: data.message,
        //                 showConfirmButton: true,
        //                 timer: 2500
        //             })
        //         }
        //         if (data.status == 'success') {
        //             Swal.fire({
        //                 position: 'center',
        //                 icon: 'success',
        //                 title: 'Thành Công',
        //                 text: data.message,
        //                 showConfirmButton: true,
        //                 timer: 2500
        //             })
        //             window.setTimeout(function() {
        //                 window.location.reload();
        //             }, 2500);
        //         }
        //     }
        // });
    });
</script>
<!-- <script>
    $('#new-pwd, #confirm-pwd').on('keyup', function () {
  if ($('#new-pwd').val() == $('#confirm-pwd').val()) {
    $('#message-pwd').html('Matching').css('color', 'green');
    console.log($('#message-pwd').val());
  } else 
    $('#message-pwd').html('Not Matching').css('color', 'red');
});
</script> -->
@endsection