@extends('layout_admin')
@section('title','Nhà Cung Cấp')
@section('content')
<div class="col-sm-12">
  <div class="page-title">
    <div class="row">
      <div class="col-6">
        <a class="btn btn-primary" href="{{route('NhaCungCap.index')}}"><i class="fa fa-angle-double-left"></i> Quay Lại</a>
      </div>
      <div class="col-6">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('admin.index')}}"> <i data-feather="home"></i></a></li>
          <li class="breadcrumb-item">Nhà Cung Cấp</li>
          <li class="breadcrumb-item active">Thêm</li>
        </ol>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header">
      <h5>Thêm Nhà Cung Cấp</h5>
      <div style="padding-top:10px"></div>
    </div>
    <form class="form theme-form" action="{{ route('NhaCungCap.store')}}" method="post" enctype="multipart/form-data" id="add-data">
      @csrf
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
              <label class="col-sm-3 col-form-label">Tên Nhà Cung Cấp</label>
              <div class="col-sm-9">
                <input class="form-control" type="text" placeholder="Nhập tên nhà cung cấp" name="name" id="name">
              </div>
            </div>
            <div class="mb-3 row">
              <label class="col-sm-3 col-form-label">Xuất Xứ</label>
              <div class="col-sm-9">
                <input class="form-control" type="text" placeholder="Nhập Xuất Xứ" name="origin" id="origin">
              </div>
            </div>
            <div class="mb-3 row">
              <label class="col-sm-3 col-form-label">Mô Tả</label>
              <div class="col-sm-9">
                <textarea class="form-control" id="ckeditor" rows="5" cols="5" placeholder="Nội dung Mô Tả..." name="description"></textarea>
              </div>
            </div>
          </div>
          <div class="mb-3 row">
            <label class="col-sm-3 col-form-label">Trạng Thái</label>
            <div class="col-sm-9">
              <select class="form-select" name="status" id="status" required="" aria-label="select example">
                <option value="">Open this select menu</option>
                <option value="1">Hiển Thị</option>
                <option value="0">Ẩn</option>
              </select>
            </div>
          </div>
          <div class="mb-3 row">
            <label class="col-sm-3 col-form-label">Chọn Avatar</label>
            <div class="col-sm-9">
              <label id="id-label-0" for="event__input-0" class="form-control">Thêm avatar</label>
              <input hidden class="form-control imageAvatar" id="event__input-0" name="avatar" type="file" onchange="uploadBannerFile(this, 0)" accept=".jpg, .png">
              <img id="event__img-0" src="{{asset('image/example/add.png')}}" alt="slider" height="100%">
            </div>
          </div>
          <div class="mb-3 row">
            <label class="col-sm-3 col-form-label">Chọn ảnh</label>
            <div class="col-sm-9">
              <label id="id-label-hover-0" for="event__input-hover-0" class="form-control">Thêm ảnh</label>
              <input hidden class="form-control imageItem" id="event__input-hover-0" name="img" type="file" onchange="uploadFile(this, 0)" accept=".jpg, .png">
              <img id="event__img-hover-0" src="{{asset('image/example/add.png')}}" alt="slider" height="100%">
            </div>
          </div>
        </div>
      </div>
      <div class="card-footer text-end">
        <div class="col-sm-9 offset-sm-3">
          <button class="btn btn-primary" type="submit">Thêm</button>
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

  function uploadFile(input, tam) {
    $('#id-label-hover-' + tam).html(input.files[0].name);
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
<!-- /delete and choose file -->
<!-- CKEDITOR -->
<script>
  CKEDITOR.replace('ckeditor', {
    filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token()])}}",
    filebrowserUploadMethod: 'form'
  });
</script>

<script>
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  $('#add-data').submit(function(event) {
    event.preventDefault();
    var form = $(this);
    var url = form.attr('action');
    let imageItem = document.getElementsByClassName('imageItem');
    let imageAvatar = document.getElementsByClassName('imageAvatar');
    // Lấy giá trị trong ckeditor
    var data_ckeditor = CKEDITOR.instances.ckeditor.getData();
    // Khai báo formData
    var formData = new FormData($(this)[0]);
    formData.append('data_input_item', imageItem[0].files[0]);
    formData.append('data_input_avatar', imageAvatar[0].files[0]);
    formData.append('name', $('#name').val());
    formData.append('origin', $('#origin').val());
    formData.append('status', $('#status').val());
    formData.append('description', data_ckeditor);
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
            window.location.replace("{{route('NhaCungCap.index')}}");
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