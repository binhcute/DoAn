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

    <form class="form theme-form" action="{{ route('TaiKhoan.update',Auth::user()->id)}}" method="post" enctype="multipart/form-data">
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
                    <img id="event__img-0" src="{{asset('image/example/add.png')}}" alt="slider" width="50%" height="320px">
                    <label id="id-label-0" for="event__input-0" class="form-control form-control__custom" style="width:120px; margin-top:4px; text-align:center">Thêm ảnh</label>
                    <input hidden class="form-control imageItem" id="event__input-0" name="img" type="file" onchange="uploadBannerFile(this, 0)" accept=".jpg, .png">
                  </div>
                </div>
              </div>
            </div>
            <div class="mb-3 row">
              <label class="col-sm-3 col-form-label">Họ của bạn</label>
              <div class="col-sm-9">
                <input class="form-control" type="text" placeholder="Nhập họ của bạn" name="firstName" value="{{Auth::user()->firstName}}">
              </div>
            </div>
            <div class="mb-3 row">
              <label class="col-sm-3 col-form-label">Tên của bạn</label>
              <div class="col-sm-9">
                <input class="form-control" type="text" placeholder="Nhập tên của bạn" name="lastName" value="{{Auth::user()->lastName}}">
              </div>
            </div>
            <div class="mb-3 row">
              <label class="col-sm-3 col-form-label">Tên Tài Khoản</label>
              <div class="col-sm-9">
                <input class="form-control" type="text" placeholder="Nhập tên tài khoản" name="username" value="{{Auth::user()->username}}">
              </div>
            </div>
            <div class="mb-3 row">
              <label class="col-sm-3 col-form-label">Mật Khẩu</label>
              <div class="col-sm-9">
                <input class="form-control" type="password" placeholder="**********" name="password">
              </div>
            </div>
            <div class="mb-3 row">
              <label class="col-sm-3 col-form-label">Email</label>
              <div class="col-sm-9">
                <input class="form-control" type="email" placeholder="Nhập email" name="email" value="{{Auth::user()->email}}">
              </div>
            </div>
            <div class="mb-3 row">
              <label class="col-sm-3 col-form-label">Số điện thoại</label>
              <div class="col-sm-9">
                <input class="form-control" type="number" placeholder="Nhập số điện thoại" name="phone" value="{{Auth::user()->phone}}">
              </div>
            </div>
            <div class="mb-3 row">
              <label class="col-sm-3 col-form-label">Địa chỉ</label>
              <div class="col-sm-9">
                <input class="form-control" type="text" placeholder="Nhập địa chỉ" name="address" value="{{Auth::user()->address}}">
              </div>
            </div>

            <div class="mb-3 row">
              <label class="col-sm-3 col-form-label">Giới tính</label>
              <div class="col-sm-9">
                <select class="form-select" name="gender" aria-label="select example">
                  @if (Auth::user()->gender == 1)
                  <option value="">Open this select menu</option>
                  <option selected="selected" value="1">Nam</option>
                  <option value="0">Nữ</option>
                  @else
                  <option value="">Open this select menu</option>
                  <option value="1">Nam</option>
                  <option selected="selected" value="0">Nữ</option>
                  @endif
                </select>
              </div>
            </div>
            <div class="mb-3 row">
              <label class="col-sm-3 col-form-label">Cấp bật</label>
              <div class="col-sm-9">
                <select class="form-select" name="level" aria-label="select example">
                  @if(Auth::user()->level == 1)
                  <option value="">Open this select menu</option>
                  <option selected="selected" value="1">Admin</option>
                  <option value="0">Người dùng</option>
                  @else
                  <option value="">Open this select menu</option>
                  <option value="1">Admin</option>
                  <option selected="selected" value="0">Người dùng</option>
                  @endif
                </select>
              </div>
            </div>
            <div class="mb-3 row">
              <label class="col-sm-3 col-form-label">Trạng Thái</label>
              <div class="col-sm-9">
                <select class="form-select" name="status" aria-label="select example">
                  @if (Auth::user()->status == 1)
                  <option value="">Open this select menu</option>
                  <option selected="selected" value="1">Hiển Thị</option>
                  <option value="0">Ẩn</option>
                  @else
                  <option value="">Open this select menu</option>
                  <option value="1">Hiển Thị</option>
                  <option selected="selected" value="0">Ẩn</option>
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
          <input class="btn btn-light" type="reset" value="Cancel">
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
</script>
@endsection