@extends('layout_admin')
@section('title','Nhà Cung Cấp')
@section('content')
<div class="col-sm-12">
  <div class="page-title">
    <div class="row">
      <div class="col-6">
        <a class="btn btn-primary" href="{{route('NhaCungCap.index')}}"><i class="fa fa-angle-double-left"></i> Quay Lại</a>
        <a style="margin-left:10px" class="btn btn-secondary" href="{{route('NhaCungCap.edit',$port->port_id)}}"><i class="fas fa-pencil-alt"></i> Chỉnh Sửa</a>
        </div>
      <div class="col-6">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('admin.index')}}"> <i data-feather="home"></i></a></li>
          <li class="breadcrumb-item">Nhà Cung Cấp</li>
          <li class="breadcrumb-item active">Chi Tiết</li>
        </ol>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-body">
      <div class="product-page-details">

        <h3>Chi Tiết Nhà Cung Cấp Số {{$port->port_id}}</h3>
      </div>
      <ul class="product-color">
        <li class="bg-primary"></li>
        <li class="bg-secondary"></li>
        <li class="bg-success"></li>
        <li class="bg-info"></li>
        <li class="bg-warning"></li>
      </ul>

      <hr>
      <div>
        <table class="product-page-width">
          <tbody>
            <tr>
            <tr>
              <td> <b>Id Nhà Cung Cấp &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
              <td class="txt-success">{{$port->port_id}}</td>
            </tr>
            <tr>
              <td> <b>Tên Nhà Cung Cấp &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
              <td>{{$port->port_name}}</td>
            </tr>
            <tr>
              <td> <b>Nơi Sản Xuất &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
              <td>{{$port->port_origin}}</td>
            </tr>
            <tr>
              <td> <b>Người Đăng &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
              <td class="txt-success">{{$port->firstName}} {{$port->firstName}}</td>
            </tr>
            <tr>
              <td> <b>Tài Khoản &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
              <td class="txt-success">{{$port->username}}</td>
            </tr>
            <tr>
              <td> <b>Thời Gian Tạo &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
              <td>{{$port->created_at}}</td>
            </tr>
            <tr>
              <td> <b>Thời Gian Chỉnh Sửa &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
              <td>{{$port->updated_at}}</td>
            </tr>
            <tr>
              <td> <b>Avatar &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
              <td><img class="img-thumbnail" src="{{URL::to('/') }}/server/assets/image/portfolio/avatar/{{ $port->port_avatar }}" alt=""></td>
            </tr>
          </tbody>
        </table>
      </div>
      <hr>
      <b>Nội dung chi tiết</b>
      <br>
      <p>{!! $port->port_description !!}</p>
      <hr>
      <div class="row">
        <div class="col-md-6">
          <h6 class="product-title">Ảnh Sản Phẩm</h6>
        </div>
        <div class="col-md-6">
          <div class="product-icon">
            <img class="img-thumbnail" src="{{URL::to('/') }}/server/assets/image/portfolio/{{ $port->port_img }}" alt="">
          </div>
        </div>
      </div>
      <hr>

    </div>
  </div>
</div>
@endsection