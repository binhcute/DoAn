@extends('layout_admin')
@section('title','Trang Chủ')
@section('content')

<div class="col-sm-12">
  <div class="page-title">
    <div class="row">
      <div class="col-6">
        <a class="btn btn-primary" href="{{route('TaiKhoan.index')}}"><i class="fa fa-angle-double-left"></i> Quay Lại</a>
      </div>
      <div class="col-6">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('admin.index')}}"> <i data-feather="home"></i></a></li>
          <li class="breadcrumb-item">Tài Khoản</li>
          <li class="breadcrumb-item active">Chỉnh Sửa</li>
        </ol>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header">
      <h5>Chỉnh Sửa Tài Khoản</h5>
    </div>

    <form class="form theme-form" action="{{ route('MyAccount.update',Auth::user()->id)}}" method="post" enctype="multipart/form-data" id="thay-doi-thong-tin-nguoi-dung">
      @csrf
      <input type="hidden" name="_method" value="put" />
      <div class="card-body">
        <div class="row">
          <div class="col">
            <div class="mb-3 row">
              <label class="col-sm-3 col-form-label">Ảnh Đại Điện</label>
              <div class="col-sm-9">
                <div class="profile__right">
                  <div class="profile__avt">
                    @if(Auth::user()->avatar!=null)
                    <img id="event__img-0" src="{{URL::to('/') }}/image/account/{{Auth::user()->avatar }}" alt="slider" width="50%" height="320px">
                    <label id="id-label-0" for="event__input-0" class="form-control form-control__custom" style="width:120px; margin-top:4px; text-align:center">Chọn ảnh</label>
                    <input hidden class="form-control imageItem" id="event__input-0" name="img" type="file" onchange="uploadBannerFile(this, 0)" accept=".jpg, .png">
                    @else
                    <img id="event__img-0" src="{{asset('image/example/add.png')}}" alt="slider" width="50%" height="320px">
                    <label id="id-label-0" for="event__input-0" class="form-control form-control__custom" style="width:120px; margin-top:4px; text-align:center">Chọn ảnh</label>
                    <input hidden class="form-control imageItem" id="event__input-0" name="img" type="file" onchange="uploadBannerFile(this, 0)" accept=".jpg, .png">
                    @endif
                  </div>
                </div>
              </div>
            </div>
            <div class="mb-3 row">
              <label class="col-sm-3 col-form-label">Họ của bạn <abbr class="required">*</abbr></label>
              <div class="col-sm-9">
                <input class="form-control" type="text" placeholder="Nhập họ của bạn" name="firstName" id="firstName" value="{{Auth::user()->firstName}}">
              </div>
            </div>
            <div class="mb-3 row">
              <label class="col-sm-3 col-form-label">Tên của bạn <abbr class="required">*</abbr></label>
              <div class="col-sm-9">
                <input class="form-control" type="text" placeholder="Nhập tên của bạn" name="lastName" id="lastName" value="{{Auth::user()->lastName}}">
              </div>
            </div>
            <div class="mb-3 row">
              <label class="col-sm-3 col-form-label">Tên Tài Khoản <abbr class="required">*</abbr></label>
              <div class="col-sm-9">
                <input class="form-control" type="text" placeholder="Nhập tên tài khoản" name="username" id="username" value="{{Auth::user()->username}}">
              </div>
            </div>
            <div class="mb-3 row">
              <label class="col-sm-3 col-form-label">Mật Khẩu</label>
              <div class="col-sm-9">
                <input class="form-control" type="password" placeholder="**********" name="password" id="password">
                <div class="show-hide"><span class="show"> </span></div>
              </div>
            </div>
            <div class="mb-3 row">
              <label class="col-sm-3 col-form-label">Email</label>
              <div class="col-sm-9">
                <input class="form-control" type="email" placeholder="Nhập email" name="email" id="email" value="{{Auth::user()->email}}">
              </div>
            </div>
            <div class="mb-3 row">
              <label class="col-sm-3 col-form-label">Số điện thoại</label>
              <div class="col-sm-9">
                <input class="form-control" type="number" placeholder="Nhập số điện thoại" name="phone" id="phone" value="{{Auth::user()->phone}}">
              </div>
            </div>
            <div class="mb-3 row">
              <label class="col-sm-3 col-form-label">Địa chỉ</label>
              <div class="col-sm-9">
                <input class="form-control" type="text" placeholder="Nhập địa chỉ" name="address" id="address"value="{{Auth::user()->address}}">
              </div>
            </div>

            <div class="mb-3 row">
              <label class="col-sm-3 col-form-label">Ngày Sinh</label>
              <div class="col-sm-9">
                <input class="form-control" type="date" name="birthday" id="birthday"value="{{Auth::user()->birthday}}">
              </div>
            </div>

            <div class="mb-3 row" id="noti-validate">
              <label class="col-sm-3 col-form-label">Giới tính</label>
              <div class="col-sm-9">
                <select class="form-select" name="gender" id="gender" aria-label="select example">
                  @if (Auth::user()->gender == 1)
                  <option selected="selected" value="1">Nam</option>
                  <option value="0">Nữ</option>
                  @else
                  <option value="1">Nam</option>
                  <option selected="selected" value="0">Nữ</option>
                  @endif
                </select>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="card-footer text-end">
        <div class="col-sm-9 offset-sm-3">
          <button class="btn btn-primary" type="submit">Thay Đổi</button>
          <input class="btn btn-light" type="reset" value="Đặt Lại">
        </div>
      </div>
    </form>
  </div>
</div>
@endsection
@section('page-js')
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
        formData.append('username', $('#username').val());
        formData.append('lastName', $('#lastName').val());
        formData.append('password', $('#password').val());
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
                        window.location.replace("{{URL::to('/admin')}}");
                    }, 2500);
                }
            },
            error: function(response) {
                $.each(response.responseJSON.errors, function(field_name, error) {
                        $('#noti-validate').after('<div class="alert alert-danger noti-alert-danger" role="alert" style="font-size: 1.5rem;">' + error + '</div>');
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
@endsection