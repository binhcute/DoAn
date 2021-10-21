@extends('layout_admin')
@section('title','Khuyến Mãi')
@section('content')
<div class="col-sm-12">
  <div class="page-title">
    <div class="row">
      <div class="col-6">
        <h3>Danh Sách Khuyến Mãi</h3>
        <a style="margin-left:50px" class="btn btn-success" href="{{route('KhuyenMai.create')}}"><i class="fa fa-plus"></i> Thêm Mới</a>
      </div>
      <div class="col-6">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('admin.index')}}"> <i data-feather="home"></i></a></li>
          <li class="breadcrumb-item">Khuyến Mãi</li>
          <li class="breadcrumb-item active">Danh Sách</li>
        </ol>
      </div>
    </div>
  </div>
  <div class="card">
    @if(count($khuyenmai)!=0)
    <div class="card-body">
      <div class="table-responsive">
        <table class="display" id="basic-1">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Tên</th>
              <th scope="col">Số Tiền Giảm Giá</th>
              <th scope="col">Thời gian</th>
              <th scope="col">Tác Vụ</th>
            </tr>
          </thead>
          <tbody id="change-layout">
          @include('pages.server.promotion.list-item')
          </tbody>
          <tfoot>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Tên</th>
              <th scope="col">Số Tiền Giảm Giá</th>
              <th scope="col">Thời gian</th>
              <th scope="col">Tác Vụ</th>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>
  </div>
  @else
  <strong class="text-center">Danh Sách Trống</strong>
  @endif
</div>
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
      text: 'Bạn Muốn Thay Đổi Trạng Thái Loại Sản Phẩm Này ?',
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
              $("#change-layout").html(data.giao_dien)
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
    console.log(url);
    Swal.fire({
      title: 'Bạn Muốn Xóa Loại Sản Phẩm Này ?',
      icon: 'warning',
      showCancelButton: true,
      cancelButtonColor: '#d33',
      confirmButtonColor: '#3085d6',
      cancelButtonText: 'Hủy',
      confirmButtonText: 'Thay Đổi'
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