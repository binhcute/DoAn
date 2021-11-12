@extends('layout_admin')
@section('title','Tài Khoản')
@section('content')
<div class="col-sm-12">
  <div class="page-title">
    <div class="row">
      <div class="col-6">
        <h3>Danh Sách Tài Khoản</h3>
        <a style="margin-left:50px" class="btn btn-success" href="{{route('TaiKhoan.create')}}"><i class="fa fa-plus"></i> Thêm Mới</a>
        </div>
      <div class="col-6">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('admin.index')}}"> <i data-feather="home"></i></a></li>
          <li class="breadcrumb-item">Tài Khoản</li>
          <li class="breadcrumb-item active">Danh Sách</li>
        </ol>
      </div>
    </div>
  </div>
  <div class="card">
    @if(count($account)!=0)
    <div class="card-body">
      <div class="table-responsive">
        <table class="display" id="basic-1">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Tài Khoản</th>
              <th scope="col">Họ Tên</th>
              <th scope="col">Trạng Thái</th>
              <th scope="col">Tác Vụ</th>
            </tr>
          </thead>
          <tbody>
            @foreach($account as $stt => $item)
            <tr>
              <th scope="row">{{ $stt+1 }}</th>
              <td>{{ $item->username }}</td>
              <td>{{ $item->firstName}} {{ $item->lastName}}</td>
              <td>
                @switch($item->status)
                @case(0)
                <strong style="color:red">Ngưng Hoạt Động</strong>
                @break
                @case(1)
                <strong style="color:blue">Đang Hoạt Động</strong>
                @break
                @endswitch
              </td>
              <td class="flex-column align-items-center justify-content-around">
                <a href="{{route('TaiKhoan.show',$item->id)}}" method="get" title="Xem chi tiết">
                  <i class="icofont icofont-paper" style="font-size:20px;color:green"></i>
                </a>
                <a href="{{route('TaiKhoan.edit',$item->id)}}" title="Chỉnh sửa">
                  <i class="icofont icofont-pencil-alt-5" style="font-size:20px;color:blue"></i>
                </a>
                <a href="{{URL::to('/XoaTaiKhoan',$item->id)}}" title="Xóa" onclick="return confirm('Bạn muốn xóa danh mục này ?')">
                  <input type="hidden" name="_token" value="{{csrf_token()}}">
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
              <th scope="col">Tài Khoản</th>
              <th scope="col">Họ Tên</th>
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