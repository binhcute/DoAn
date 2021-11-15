@extends('layout_admin')
@section('title','Danh Mục')
@section('content')
<div class="col-sm-12">
  <div class="page-title">
    <div class="row">
      <div class="col-6">
        <a class="btn btn-primary" href="{{route('LoaiSanPham.index')}}"><i class="fa fa-angle-double-left"></i> Quay Lại</a>
      </div>
      <div class="col-6">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('admin.index')}}"> <i data-feather="home"></i></a></li>
          <li class="breadcrumb-item">Danh Mục</li>
          <li class="breadcrumb-item active">Thêm</li>
        </ol>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header">
      <h5>Thêm Danh Mục</h5>
      <div style="padding-top:10px"></div>
    </div>
    <form class="form theme-form" action="{{ route('LoaiSanPham.store')}}" method="post" enctype="multipart/form-data" id="add-data">
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
              <label for="name" class="col-sm-3 col-form-label">Tên Danh Mục <abbr class="required">*</abbr></label>
              <div class="col-sm-9">
                <input class="form-control" type="text" placeholder="Nhập tên Danh Mục" name="name" id="name">
              </div>
            </div>
            <div class="mb-3 row">
              <label for="description" class="col-sm-3 col-form-label">Mô Tả</label>
              <div class="col-sm-9">
                <textarea class="form-control" id="ckeditor" rows="5" cols="5" placeholder="Nội dung mô tả..." name="description"></textarea>
              </div>
            </div>

            <div class="mb-3 row">
              <label for="status" class="col-sm-3 col-form-label">Trạng Thái <abbr class="required">*</abbr></label>
              <div class="col-sm-9">
                <select class="form-select" name="status" id="status" aria-label="select example">
                  <option value="">---Chọn---</option>
                  <option value="1">Hiển Thị</option>
                  <option value="0">Ẩn</option>
                </select>
              </div>
            </div>
            <div class="mb-3 row">
              <label class="col-sm-3 col-form-label">Chọn ảnh <abbr class="required">*</abbr></label>
              <div class="col-sm-9">
                <label id="id-label-0" for="event__input-0" class="form-control">Thêm ảnh</label>
                <input hidden class="form-control imageItem" id="event__input-0" name="img" type="file" onchange="uploadBannerFile(this, 0)" accept=".jpg, .png">
                <img id="event__img-0" src="{{asset('image/example/add.png')}}" alt="slider" height="100%">
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="card-footer text-end">
        <div class="col-sm-9 offset-sm-3">
          <button class="btn btn-primary" type="submit">Thêm</button>
          <input class="btn btn-light" type="reset" value="Đặt Lại">
        </div>
      </div>
    </form>
  </div>
</div>
@endsection

@section('page-js')
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
<!-- CKEDITOR -->
<script>
  CKEDITOR.replace('ckeditor', {
    filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token()])}}",
    filebrowserUploadMethod: 'form'
  });
</script>
<!-- Upload Image Files -->
<script type="text/javascript">
  function readURL(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function(e) {
        $('#imgShow').attr('src', e.target.result);
      };

      reader.readAsDataURL(input.files[0]);
    } else {
      removeUpload();
    }
  }
  $("#imgItem").change(function() {
    readURL(this);
  });
</script>

<!-- Add Ajax -->
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
    // Lấy giá trị trong ckeditor
    var data_ckeditor = CKEDITOR.instances.ckeditor.getData();
    // Khai báo formData
    var formData = new FormData($(this)[0]);
    formData.append('data_input_item', imageItem[0].files[0]);
    formData.append('name', $('#name').val());
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
            window.location.replace("{{route('LoaiSanPham.index')}}");
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