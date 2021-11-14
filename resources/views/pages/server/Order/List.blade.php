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
  <div>
    <div class="w3-bar w3-black">
      <button class="w3-bar-item w3-button" onclick="openCity('London')">London</button>
      <button class="w3-bar-item w3-button" onclick="openCity('Paris')">Paris</button>
      <button class="w3-bar-item w3-button" onclick="openCity('Tokyo')">Tokyo</button>
    </div>

    <div class="card">
      @if(count($order)!=0)
      <div class="card-body">
        <div id="London" class="city">
          <h3>Hóa Đơn Chờ Xác Nhận</h3>
          <div class="table-responsive">
            <table class="display" id="basic-1">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Người Mua</th>
                  <th scope="col">Ngày Mua</th>
                  <th scope="col">Trạng Thái</th>
                  <th scope="col">Tác Vụ</th>
                </tr>
              </thead>
              <tbody id="change-layout">
                @include('pages.server.Order.list-item')
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

        <div id="Paris" class="city" style="display:none">
          <h3>Hóa Đơn Đang Vận Chuyển</h3>
          <div class="table-responsive">
            <table class="display" id="basic-1">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Người Mua</th>
                  <th scope="col">Ngày Mua</th>
                  <th scope="col">Trạng Thái</th>
                  <th scope="col">Tác Vụ</th>
                </tr>
              </thead>
              <tbody id="change-layout">
                @include('pages.server.Order.list-item')
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

        <div id="Tokyo" class="city" style="display:none">
          <h3>Hóa Đơn Đã Giao Thành Công</h3>
          <div class="table-responsive">
            <table class="display" id="basic-1">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Người Mua</th>
                  <th scope="col">Ngày Mua</th>
                  <th scope="col">Trạng Thái</th>
                  <th scope="col">Tác Vụ</th>
                </tr>
              </thead>
              <tbody id="change-layout">
                @include('pages.server.Order.list-item')
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
        <script>
          function openCity(cityName) {
            var i;
            var x = document.getElementsByClassName("city");
            for (i = 0; i < x.length; i++) {
              x[i].style.display = "none";
            }
            document.getElementById(cityName).style.display = "block";
          }
        </script>

      </div>

    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-12" id="giao-dien-duoi">
          @include('pages.server.Order.list-orderDetail')
        </div>
      </div>
    </div>
    @else
    <img src="{{ asset('image/example/list-empty.png') }}" alt="">
    @endif
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
    Swal.fire({
      title: 'Bạn Muốn Thay Đổi Trạng Thái Đơn Hàng ?',
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
              $('#change-layout').empty();
              $('#change-layout').html(data.giao_dien);
              $('#giao-dien-duoi').html(data.giao_dien_duoi);
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