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
          <li class="breadcrumb-item active">Thêm</li>
        </ol>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header">
      <h5>Thêm Mã Khuyến Mãi</h5>
      <div style="padding-top:10px" id="noti-validate"></div>
    </div>
    <form class="form theme-form" action="{{ route('KhuyenMai.store')}}" method="post" enctype="multipart/form-data" id="add-data">
      @csrf
      <div class="card-body">
        <div class="row">
          <div class="col">
            <div class="mb-3 row">
              <label class="col-sm-3 col-form-label">Tên Mã Khuyến Mãi</label>
              <div class="col-sm-9">
                <input class="form-control" type="text" placeholder="Nhập tên Mã Khuyến Mãi" name="promotion_name" id="promotion_name">
              </div>
            </div>
            <div class="mb-3 row">
              <label class="col-sm-3 col-form-label">Mã Khuyến Mãi</label>
              <div class="col-sm-9">
                <input class="form-control" type="text" placeholder="Mã" name="promotion_key" id="promotion_key">
              </div>
            </div>
            <div class="mb-3 row">
              <label class="col-sm-3 col-form-label">Số Tiền Giảm</label>
              <div class="col-sm-9">
                <input class="form-control" type="number" placeholder="Giá" name="promotion_money" id="promotion_money">
              </div>
            </div>
            <div class="mb-3 row">
              <label class="col-sm-3 col-form-label">Thời Hạn</label>
              <div class="col-sm-9">
                <input class="form-control" type="date" placeholder="Thời gian hết hạn" name="end_at" id="end_at">
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
    // Khai báo formData
    var formData = new FormData($(this)[0]);
    formData.append('promotion_name', $('#promotion_name').val());
    formData.append('promotion_key', $('#promotion_key').val());
    formData.append('promotion_money', $('#promotion_money').val());
    formData.append('end_at', $('#end_at').val());
    $.ajax({
      type: "POST",
      url: url,
      data: formData,
      async: false,
      cache: false,
      contentType: false,
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