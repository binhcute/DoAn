@extends('layout_admin')
@section('title','Nhà Cung Cấp')
@section('content')
<div class="col-sm-12">
  <div class="page-title">
    <div class="row">
      <div class="col-6">
        <h5>Danh Sách Nhà Cung Cấp</h5>
        <a style="margin-left:50px" class="btn btn-success" href="{{route('NhaCungCap.create')}}"><i class="fa fa-plus"></i> Thêm Mới</a>
      </div>
      <div class="col-6">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('admin.index')}}"> <i data-feather="home"></i></a></li>
          <li class="breadcrumb-item">Danh Mục</li>
          <li class="breadcrumb-item active">Danh Sách</li>
        </ol>
      </div>
    </div>
  </div>
  <div class="card">
    @if(count($port)!= 0)
    <div class="card-body">
      <div class="table-responsive">
        <table class="display" id="basic-1">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Tên</th>
              <th scope="col">Hình Ảnh</th>
              <th scope="col">Trạng Thái</th>
              <th scope="col">Tác Vụ</th>
            </tr>
          </thead>
          <tbody id="change-layout">
           @include("pages.server.portfolio.list-item")
          </tbody>
          <tfoot>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Tên</th>
              <th scope="col">Hình Ảnh</th>
              <th scope="col">Trạng Thái</th>
              <th scope="col">Tác Vụ</th>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>
  </div>
  @else
  <strong class="text-center">
        <img src="{{URL::to('/')}}/image/example/list-empty.png" alt="" width="50%"></strong>
  @endif
</div>
@endsection
@section('page-js')
<script>
  function changeStatus(event) {
    event.preventDefault();
    var form = $(this);
    var url = form.attr('action');
    Swal.fire({
      title: 'Thay Đổi Trạng Thái',
      text: 'Bạn Muốn Thay Đổi Trạng Thái Nhà Cung Cấp Này ?',
      icon: 'warning',
      showCancelButton: true,
      cancelButtonColor: '#d33',
      confirmButtonColor: '#3085d6',
      cancelButtonText: 'Hủy',
      confirmButtonText: 'Thay Đổi'
    }).then((result) => {
      if (result.isConfirmed) {
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
              $("#change-layout").empty();
              $("#change-layout").html(data.giao_dien);
              Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Thành Công',
                text: data.message,
                showConfirmButton: true,
                timer: 2500
              })
            }
          }
        });
      }

    });
  }

  function deleteItem(event) {
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    event.preventDefault();
    var url = $(this).data('url');
    Swal.fire({
      title: 'Bạn Muốn Xóa Nhà Cung Cấp Này ?',
      icon: 'warning',
      showCancelButton: true,
      cancelButtonColor: '#d33',
      confirmButtonColor: '#3085d6',
      cancelButtonText: 'Hủy',
      confirmButtonText: 'Xóa'
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          type: "GET",
          url: url,
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
              $("#change-layout").empty();
              $("#change-layout").html(data.giao_dien);
              Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Thành Công',
                text: data.message,
                showConfirmButton: true,
                timer: 2500
              })
            }
          }
        });
      }
    });
  }

  $(function() {
    $(document).on('click', '.change_status_tri', changeStatus);
    $(document).on('click', '.delete-item', deleteItem);

  });
</script>
@endsection