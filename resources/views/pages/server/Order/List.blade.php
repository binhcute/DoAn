@extends('layout_admin')
@section('title','Hóa Đơn')
@section('content')
<div class="col-sm-12">
  <div class="page-title">
    <div class="row">
      <div class="col-6">
        <h3>Danh Sách Hóa Đơn</h3>
      </div>
      <div class="col-6">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('admin.index')}}"> <i data-feather="home"></i></a></li>
          <li class="breadcrumb-item">Hóa Đơn</li>
          <li class="breadcrumb-item active">Danh Sách</li>
        </ol>
      </div>
    </div>
  </div>
  <div id="change-layout">
    @include('pages.server.order.list-item')
  </div>
</div>
</div>
@endsection
@section('page-js')
<script>
  function changeStatus(event) {
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
            window.location.reload();
          }, 2500);
        }
      }
    });

  }
  $(function() {
    $(document).on('click', '.change-status-zero', changeStatus);
  });
  $(function() {
    $(document).on('click', '.change-status-one', changeStatus);
  });
  $(function() {
    $(document).on('click', '.change-status-two', changeStatus);
  });
  $(function() {
    $(document).on('click', '.change-status-three', changeStatus);
  });
</script>
@endsection