@extends('layout_admin')
@section('title','Khuyến Mãi')
@section('content')
<div class="col-sm-12">
  <div class="page-title">
    <div class="row">
      <div class="col-6">
        <a class="btn btn-primary" href="{{route('KhuyenMai.index')}}"><i class="fa fa-angle-double-left"></i> Quay Lại</a>
      </div>
      <div class="col-6">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('admin.index')}}"> <i data-feather="home"></i></a></li>
          <li class="breadcrumb-item">Khuyến Mãi</li>
          <li class="breadcrumb-item active">Chỉnh Sửa</li>
        </ol>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header">
      <h5>Chỉnh Sửa Khuyến Mãi</h5>
    </div>
    <form class="form theme-form" action="{{ route('SuaKhuyenMai',$khuyenmai->promotion_id)}}" method="post" enctype="multipart/form-data" id="edit-data">
      <meta name="csrf-token" content="{{ csrf_token() }}">
     
      <div class="card-body">
        <div class="row">
        <div class="col">
            <div class="mb-3 row">
              <label class="col-sm-3 col-form-label">Tên Mã Khuyến Mãi</label>
              <div class="col-sm-9">
                <input class="form-control" type="text" placeholder="Nhập tên Mã Khuyến Mãi" value="{{$khuyenmai->promotion_name}}" name="promotion_name" id="promotion_name">
              </div>
            </div>
            <div class="mb-3 row">
              <label class="col-sm-3 col-form-label">Mã Khuyến Mãi</label>
              <div class="col-sm-9">
                <input class="form-control" type="text" placeholder="Mã" name="promotion_key" id="promotion_key" value="{{$khuyenmai->promotion_key}}">
              </div>
            </div>
            <div class="mb-3 row">
              <label class="col-sm-3 col-form-label">Số Tiền Giảm</label>
              <div class="col-sm-9">
                <input class="form-control" type="number" placeholder="Giá" name="promotion_money" id="promotion_money" value="{{$khuyenmai->promotion_money}}">
              </div>
            </div>
            <div class="mb-3 row">
              <label class="col-sm-3 col-form-label">Thời Hạn</label>
              <div class="col-sm-9">
                <input class="form-control" type="date" placeholder="Thời gian hết hạn" name="end_at" id="end_at" value="{{$khuyenmai->end_at}}">
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="card-footer text-end">
        <div class="col-sm-9 offset-sm-3">
          <button class="btn btn-primary" type="submit">Submit</button>
          <input class="btn btn-light" type="reset" value="Cancel">
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
<script>
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  $('#edit-data').submit(function(event) {
    event.preventDefault();
    var form = $(this);
    var url = form.attr('action');
    let imageItem = document.getElementsByClassName('imageItem');
    //Ckeditor
    var data_ckeditor = CKEDITOR.instances.ckeditor.getData();
    //Khai bao formData
    var formData = new FormData($(this)[0]);
    if (imageItem[0].files[0] != undefined) {
        formData.append('data_input_item', imageItem[0].files[0]);
    }
    formData.append('name', $('#name').val());
    formData.append('description', data_ckeditor);
    $.ajax({
      type: 'POST',
      url: url ,
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
            window.location.replace("{{route('KhuyenMai.index')}}");
          }, 2500);
        }
      }
    });
  })
</script>
@endsection