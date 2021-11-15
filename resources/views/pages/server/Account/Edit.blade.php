@extends('layout_admin')
@section('title','Tài Khoản')
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

    <form class="form theme-form" action="{{ route('TaiKhoan.update',$account->id)}}" method="post" enctype="multipart/form-data" id="edit-data">
      @csrf
      <input type="hidden" name="_method" value="put" />
      <div class="card-body" id="noti-validate">
        <div class="row">
          <div class="col">
            <div class="mb-3 row">
              <label class="col-sm-3 col-form-label pt-0">Người Nhập Hiện Tại</label>
              <div class="col-sm-9">
                <div class="form-control-static">{{ Auth::user()->firstName }} {{ Auth::user()->lastName }}</div>
              </div>
            </div>
            <div class="mb-3 row">
              <label for="firstName" class="col-sm-3 col-form-label">Họ của bạn</label>
              <div class="col-sm-9">
                <input class="form-control" type="text" placeholder="Nhập họ của bạn" name="firstName" id="firstName" value="{{$account->firstName}}">
              </div>
            </div>
            <div class="mb-3 row">
              <label for="lastName" class="col-sm-3 col-form-label">Tên của bạn</label>
              <div class="col-sm-9">
                <input class="form-control" type="text" placeholder="Nhập tên của bạn" name="lastName" id="lastName" value="{{$account->lastName}}">
              </div>
            </div>
            <div class="mb-3 row">
              <label for="username" class="col-sm-3 col-form-label">Tên Tài Khoản</label>
              <div class="col-sm-9">
                <input class="form-control" type="text" placeholder="Nhập tên tài khoản" name="username" id="username" value="{{$account->username}}">
              </div>
            </div>
            <div class="mb-3 row">
              <label for="password" class="col-sm-3 col-form-label">Mật Khẩu</label>
              <div class="col-sm-9">
                <input class="form-control" type="password" placeholder="**********" name="password" id="password">
              </div>
            </div>
            <div class="mb-3 row">
              <label for="email" class="col-sm-3 col-form-label">Email</label>
              <div class="col-sm-9">
                <input class="form-control" type="email" placeholder="Nhập email" name="email" for="email" value="{{$account->email}}">
              </div>
            </div>
            <div class="mb-3 row">
              <label for="phone" class="col-sm-3 col-form-label">Số điện thoại</label>
              <div class="col-sm-9">
                <input class="form-control" type="number" placeholder="Nhập số điện thoại" name="phone" id="phone" value="{{$account->phone}}">
              </div>
            </div>
            <div class="mb-3 row">
              <label for="address" class="col-sm-3 col-form-label">Địa chỉ</label>
              <div class="col-sm-9">
                <input class="form-control" type="text" placeholder="Nhập địa chỉ" name="address" id="address" value="{{$account->address}}">
              </div>
            </div>

            <div class="mb-3 row">
              <label class="col-sm-3 col-form-label">Giới tính</label>
              <div class="col-sm-9">
                <select class="form-select" name="gender" id="gender" aria-label="select example">
                  @if ($account->gender == 1)
                  <option value="">---Chọn---</option>
                  <option selected="selected" value="1">Nam</option>
                  <option value="0">Nữ</option>
                  @else
                  <option value="">---Chọn---</option>
                  <option value="1">Nam</option>
                  <option selected="selected" value="0">Nữ</option>
                  @endif
                </select>
              </div>
            </div>
            <div class="mb-3 row">
              <label class="col-sm-3 col-form-label">Cấp bật</label>
              <div class="col-sm-9">
                <select class="form-select" name="level" id="level" aria-label="select example">
                  @if($account->level == 1)
                  <option value="">---Chọn---</option>
                  <option selected="selected" value="1">Admin</option>
                  <option value="0">Người dùng</option>
                  @else
                  <option value="">---Chọn---</option>
                  <option value="1">Admin</option>
                  <option selected="selected" value="0">Người dùng</option>
                  @endif
                </select>
              </div>
            </div>
            <div class="mb-3 row">
              <label class="col-sm-3 col-form-label">Trạng Thái</label>
              <div class="col-sm-9">
                <select class="form-select" name="status" id="status" aria-label="select example">
                  @if ($account->status == 1)
                  <option value="">---Chọn---</option>
                  <option selected="selected" value="1">Hiển Thị</option>
                  <option value="0">Ẩn</option>
                  @else
                  <option value="">---Chọn---</option>
                  <option value="1">Hiển Thị</option>
                  <option selected="selected" value="0">Ẩn</option>
                  @endif
                </select>
              </div>
            </div>
            <div class="mb-3 row">
              <label class="col-sm-3 col-form-label">Chọn ảnh</label>
              
              <div class="col-sm-9">
                <label id="id-label-0" for="event__input-0" class="form-control">Thêm ảnh</label>
                <input hidden class="form-control imageItem" id="event__input-0" name="img" type="file" onchange="uploadFile(this, 0)" accept=".jpg, .png">
                @if($account->avatar != null)
                <img id="event__img-0" src="{{URL::to('/')}}/image/account/{{$account->avatar}}" alt="slider" height="250px" style="border-radius:50%">
                @else
                <img id="event__img-0" src="{{URL::to('/')}}/image/account/1.png" alt="slider" height="250px" style="border-radius:50%">
                @endif
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
<script type="text/javascript">
  function uploadFile(input, tam) {
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
  $('#edit-data').submit(function(event) {
    event.preventDefault();
    var from = $(this);
    var url = from.attr('action');
    let imageItem = document.getElementsByClassName('imageItem');
    //CKEDITOR
    var data_ckeditor = CKEDITOR.instances.ckeditor.getData();
    //FormData
    var formData = new FormData($(this)[0]);
    if (imageItem[0].files[0] != undefined) {
      formData.append('data_input_item', imageItem[0].files[0]);
    }
    formData.append('firstName', $('#firstName').val());
    formData.append('lastName', $('#lastName').val());
    formData.append('username', $('#username').val());
    formData.append('password', $('#password').val());
    formData.append('email', $('#email').val());
    formData.append('phone', $('#phone').val());
    formData.append('address', $('#address').val());
    formData.append('gender', $('#gender').val());
    formData.append('level', $('#level').val());
    formData.append('status', $('#status').val());
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
            window.location.replace("{{route('TaiKhoan.index')}}");
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
  })
</script>

@endsection