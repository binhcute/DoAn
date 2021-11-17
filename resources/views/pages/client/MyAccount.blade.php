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
                    <a href="#account-info" data-toggle="tab">Thông tin tài khoản <i class="far fa-user"></i></a>
                    <a href="{{ route('logout') }}">Đăng Xuất <i class="far fa-sign-out-alt"></i></a>
                </div>
            </div>
            <!-- My Account Tab List End -->

            <!-- My Account Tab Content Start -->
            <div class="col-lg-8 col-12 learts-mb-30">
                <div class="tab-content">

                    <!-- Single Tab Content Start -->
                    <div class="tab-pane fade show active" id="dashboad">
                        <div class="myaccount-content dashboad">
                            <p>Xin chào {{Auth::user()->firstName}} {{Auth::user()->lastName}} <strong>({{Auth::user()->username }})</strong> (nếu không phải <strong>{{Auth::user()->username }}</strong>?
                                <a href="{{ route('logout') }}"><i data-feather="log-in"> </i>Xin hãy đăng xuất</a>
                                )
                            </p>
                            <p><a data-toggle="modal" data-target="#modal-change"><strong>Bạn có thể thay đổi mật khẩu tại đây!</strong></a></p>

                        </div>
                    </div>
                    <!-- Single Tab Content End -->

                    <!-- Single Tab Content Start -->
                    <div class="tab-pane fade" id="orders">
                        <div class="myaccount-content order">
                            @if($arrDonHang)
                            <div class="table-responsive table-responsive_custom">
                                @foreach($arrDonHang as $stt => $DonHang)

                                <div class="table-responsive__title table-responsive_bill">Hóa Đơn số <span>{{$stt+1}}</span></div>
                                <div class="table-responsive__title">Tên người nhận: <span>{{$DonHang->firstName}} {{$DonHang->lastName}}</span></div>
                                <div class="table-responsive__title">Tài khoản: <span>{{$DonHang->username}}</span></div>
                                <div class="table-responsive__title">Địa chỉ: <span>{{$DonHang->address}}</span></div>
                                <div class="table-responsive__title">Điện thoại: <span>{{$DonHang->phone}}</span></div>

                                <div class="perfume-cart__contents ">
                                    <!-- Tiêu đề -->
                                    <div class="row_g no-gutters row_g-title hide-on-mobile">

                                        <div class="col_g l-4_g m-4_g">
                                            <div class="perfume-cart__title">
                                                Sản phẩm
                                            </div>
                                        </div>

                                        <div class="col_g l-2_g m-10-2_g">
                                            <div class="perfume-cart__title">
                                                Số lượng
                                            </div>
                                        </div>


                                        <div class="col_g l-3_g m-10-3_g">
                                            <div class="perfume-cart__title">
                                                Thành tiền
                                            </div>
                                        </div>

                                        <div class="col_g l-3_g m-10-3_g">
                                            <div class="perfume-cart__title">
                                                Trạng Thái
                                            </div>
                                        </div>

                                    </div>
                                    <!-- Nội dung -->
                                    @foreach($DonHang->san_pham as $stt => $san_pham)
                                    <div class="row_g no-gutters row_content hide-on-mobile">
                                        <div class="col_g l-4_g m-4_g">
                                            <div class=" perfume-cart__product">
                                                <img class="product__img" src="{{URL::to('/')}}/image/product/{{$san_pham->product_img}}" alt="">
                                                <div>
                                                    <span class="product__name">
                                                        {{$san_pham->product_name}} x {{$san_pham->quantity}}
                                                    </span>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="col_g l-2_g m-10-2_g">
                                            <div class="perfume-cart__content perfume-cart__quantity perfume-cart__center">
                                                <span class="perfume-cart__promotion">{{number_format($san_pham->price)}} vnđ</span>
                                            </div>
                                        </div>

                                        <div class="col_g l-3_g m-10-3_g">
                                            <div class="perfume-cart__content perfume-cart__center">
                                                <span class="perfume-cart__into-money">{{number_format($san_pham->amount)}} vnđ</span>
                                            </div>
                                        </div>
                                        <div class="col_g l-3_g m-10-3_g">
                                            <div class="perfume-cart__content perfume-cart__center">
                                                <span class="perfume-cart__into-money">

                                                    @switch($DonHang->status)
                                                    @case(0)
                                                    <strong style="color:#00c3da">Đang vận chuyển</strong>
                                                    @break
                                                    @case(1)
                                                    <strong style="color:greenyellow">Đang chờ xử lý</strong>
                                                    @break
                                                    @case(2)
                                                    <strong style="color:dodgerblue">Giao hàng thành công</strong>
                                                    @break
                                                    @case(3)
                                                    <strong style="color:orangered">Đơn hàng đã bị hủy</strong>
                                                    @break
                                                    @endswitch
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Sản phẩm của giỏ hàng trên Mobile -->
                                    <div class="row_g hide-on-tablet hide-on-pc">

                                        <div class="col_g col_g-mar">
                                            <div class=" perfume-cart__product">
                                                <img class="product__img" src="{{URL::to('/')}}/image/product/{{$san_pham->product_img}}" alt="">
                                                <div>
                                                    <span class="product__name">
                                                        {{$san_pham->product_name}} x {{$san_pham->quantity}}
                                                    </span>

                                                    <div class="perfume-cart__content perfume-cart__center">
                                                        <span class="perfume-cart__unit-sprice">Giá {{number_format($san_pham->price)}}</span>
                                                        <span>vnđ</span>
                                                    </div>

                                                    <div class="perfume-cart__content perfume-cart__center ">
                                                        <span class="perfume-cart__title-num">Tổng Tiền:</span>
                                                        <span class="perfume-cart__into-money">{{number_format($san_pham->amount)}}</span>
                                                        <span>vnđ</span>
                                                    </div>

                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                    @endforeach
                                </div>
                                <hr>
                                @endforeach
                            </div>
                            @else
                            <div class="text-center">
                                <h4>Bạn chưa có đơn hàng nào</h4>
                                <img src="{{URL::to('/')}}/image/example/empty_cart.jpg" width="50%">
                            </div>
                            @endif
                        </div>
                    </div>
                    <!-- Single Tab Content End -->



                    <!-- Single Tab Content Start -->
                    <div class="tab-pane fade" id="account-info">
                        <div class="myaccount-content account-details">
                            <div class="account-details-form">
                                <form action="{{route('post.change_account')}}" method="post" enctype="multipart/form-data" id="thay-doi-thong-tin-nguoi-dung">
                                    @csrf
                                    <meta name="csrf-token" content="{{ csrf_token() }}">
                                    <div class="row learts-mb-n30">
                                        @if(Auth::user()->avatar!=null)
                                        <div class="col-12 learts-mb-30">
                                            <label id="id_label_hover_0" for="event__input-hover-0">Avatar <abbr class="required">*</abbr></label>
                                            <div class="account-client text-center">
                                                <input hidden class="form-control imageItem" id="event__input-0" name="img" type="file" onchange="uploadBannerFile(this, 0)" accept=".jpg, .png">

                                                <img id="event__img-0" alt="slider" src="{{URL::to('/') }}/image/account/{{Auth::user()->avatar }}" alt="">

                                                <label id="id-label-0" for="event__input-0">Chọn Ảnh</label>
                                            </div>

                                        </div>
                                        @else
                                        <div class="col-12 learts-mb-30">
                                            <label for="event__input-0">Avatar <abbr class="required">*</abbr></label>
                                            <div class="account-client text-center">

                                                <input hidden class="form-control imageItem" id="event__input-0" name="img" type="file" onchange="uploadBannerFile(this, 0)" accept=".jpg, .png">

                                                <img id="event__img-0" alt="slider" src="{{URL::to('/') }}/image/account/1.png" alt="">

                                                <label id="id-label-0" for="event__input-0">Chọn Ảnh</label>
                                            </div>

                                        </div>
                                        @endif
                                        <div class="col-md-6 col-12 learts-mb-30">
                                            <div class="single-input-item">
                                                <label for="first-name">Họ <abbr class="required">*</abbr></label>
                                                <input type="text" name="firstName" id="firstName" value="{{Auth::user()->firstName}}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12 learts-mb-30">
                                            <div class="single-input-item">
                                                <label for="last-name">Tên <abbr class="required">*</abbr></label>
                                                <input type="text" name="lastName" id="lastName" value="{{Auth::user()->lastName}}" required>
                                            </div>
                                        </div>
                                        <div class="col-12 learts-mb-30">
                                            <label for="email">Email<abbr class="required">*</abbr></label>
                                            <input type="email" name="email" id="email" value="{{Auth::user()->email}}" required>
                                        </div>
                                        <div class="col-12 learts-mb-30">
                                            <label for="email">Số Điện Thoại<abbr class="required">*</abbr></label>
                                            <input type="number" name="phone" id="phone" value="{{Auth::user()->phone}}">
                                        </div>
                                        <div class="col-12 learts-mb-30">
                                            <label for="email">Địa Chỉ</label>
                                            <input type="text" name="address" id="address" value="{{Auth::user()->address}}">
                                        </div>
                                        <div class="col-12 learts-mb-30">
                                            <label for="gender">Giới tính</label>
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
                                            <label for="email">Ngày Sinh</label>
                                            <input type="date" name="birthday" id="birthday" value="{{Auth::user()->birthday}}">
                                        </div>
                                        <div class="col-12 learts-mb-30">
                                            <button type="submit" class="btn btn-dark btn-hover-primary">Cập Nhật Thông Tin</button>
                                        </div>
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
<!-- Modal -->
<div class="modal fade" id="modal-change" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel">Thay Đổi Mật Khẩu</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="noti-validate">
                <form action="{{route('post.change_password')}}" method="post" enctype="multipart/form-data" id="thay-doi-mat-khau-nguoi-dung">
                    @csrf
                    <div class="col-12 learts-mb-30 learts-mt-30">
                        <fieldset>
                            <div class="row learts-mb-n30">
                                <div class="col-12 learts-mb-30">
                                    <label for="old_password">Vui lòng nhập mật khẩu cũ</label>
                                    <input type="password" name="old_password">
                                </div>
                                <div class="col-12 learts-mb-30">
                                    <label for="new-pwd">Mật khẩu mới</label>
                                    <input type="password" name="new_pwd" id="new_pwd">
                                </div>
                                <div class="col-12 learts-mb-30">
                                    <label for="confirm-pwd">Nhập lại mật khẩu mới</label>
                                    <input type="password" name="confirm_pwd" id="confirm_pwd">
                                    <span id="message-pwd"></span>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                    <div class="col-12 learts-mb-30">
                        <button type="submit" class="btn btn-dark btn-outline-hover-dark">Thay đổi mật khẩu</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- My Account Section End -->
<!-- delete and choose file -->
<script type="text/javascript">
    function uploadBannerFile(input, tam) {
        $('#id-label-' + tam).html(input.files[0].name);
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#event__img-' + tam).attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
        $('#event__input-' + tam).change(function() {
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
    $('#thay-doi-thong-tin-nguoi-dung').submit(function(event) {
        event.preventDefault();
        var form = $(this);
        var url = form.attr('action');
        let count_banner = document.getElementsByClassName('imageItem');
        var formData = new FormData($(this)[0]);
        formData.append('data_input_banner', count_banner[0].files[0]);
        formData.append('firstName', $('#firstName').val());
        formData.append('lastName', $('#lastName').val());
        formData.append('email', $('#email').val());
        formData.append('phone', $('#phone').val());
        formData.append('address', $('#address').val());
        formData.append('birthday', $('#birthday').val());
        console.log(form.serialize());
        $.ajax({
            type: "POST",
            url: url,
            data: formData,
            async: false,
            cache: false,
            contentType: false,
            enctype: 'multipart/form-data',
            processData: false,
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
                        window.location.reload();
                    }, 2500);
                }
            }
        });
    });
    $('#thay-doi-mat-khau-nguoi-dung').submit(function(event) {
        event.preventDefault();
        var form = $(this);
        var url = form.attr('action');
        console.log(form.serialize());
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
                        window.location.reload();
                    }, 2500);
                }
            },
            error: function(response) {
                $.each(response.responseJSON.errors, function(field_name, error) {
                        $('#noti-validate').before('<div class="alert alert-danger noti-alert-danger" role="alert" style="font-size: 1.5rem;">' + error + '</div>');
                    }),
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: 'Thất bại',
                        text: 'Vui lòng kiểm tra nhập đầy đủ các trường',
                        showConfirmButton: true,
                        timer: 2500
                    }),
                    window.setTimeout(function() {
                        $('.alert.alert-danger.noti-alert-danger').remove();
                    }, 20000);
            }
        });
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