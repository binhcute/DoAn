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
          <tbody>
            @foreach($port as $item)
            <tr>
              <th scope="row">{{ $item->port_id }}</th>
              <td>{{ $item->port_name}}</td>
              <td><img class="img-thumbnail" width="100" height="100" src="{{ URL::to('/') }}/server/assets/image/portfolio/{{$item->port_img}}"></td>
              <td>
                @if($item->status==1)

                <form action="{{URL::to('/NhaCungCap/disabled/'.$item->port_id)}}" class="change_status_tri" method="post">
                  <input type="hidden" name="_token" value="{{csrf_token()}}">
                  <input type="hidden" name="_method" value="put" />
                  <button class="btn btn-outline-light" type="submit"><i class="icofont icofont-ui-check" style="font-size:20px;color:blue"></i></button>
                  <p>Đang hiển thị</p>
                </form>
                @else
                <form action="{{URL::to('/NhaCungCap/enabled/'.$item->port_id)}}" class="change_status_tri" method="post">
                  <input type="hidden" name="_token" value="{{csrf_token()}}">
                  <input type="hidden" name="_method" value="put" />
                  <button class="btn btn-outline-light" type="submit"><i class="icofont icofont-ui-close" style="font-size:20px;color:red"></i></button>
                  <p>Đang ẩn</p>
                </form>
                @endif
              </td>
              <td class="flex-column align-items-center justify-content-around">
                <a href="{{route('NhaCungCap.show',$item->port_id)}}" method="get">
                  <i class="icofont icofont-paper" style="font-size:20px;color:green"></i>
                </a>
                <a href="{{route('NhaCungCap.edit',$item->port_id)}}">
                  <i class="icofont icofont-pencil-alt-5" style="font-size:20px;color:blue"></i>
                </a>
                <a data-url="{{URL::to('/XoaNhaCungCap',$item->port_id)}}" class="delete-item">
                  <meta name="csrf-token" content="{{ csrf_token() }}">
                  <input type="hidden" name="_method" value="delete">
                  <i class="icofont icofont-trash" style="font-size:20px;color:red"></i>
                </a>
              </td>
            </tr>
            @endforeach
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
      title: 'Bạn muốn thay đổi trạng thái này ?',
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
      title: 'Bạn muốn xóa nhà cung cấp này ?',
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
    });
  }

  $(function() {
    $(document).on('click', '.change_status_tri', changeStatus);
    $(document).on('click', '.delete-item', deleteItem);

  });
</script>
@endsection