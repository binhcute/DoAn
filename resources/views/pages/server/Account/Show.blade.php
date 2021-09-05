@extends('layout_admin')
@section('title','Tài Khoản')
@section('content')
<div class="col-sm-12">
  <div class="page-title">
    <div class="row">
      <div class="col-6">
        <a class="btn btn-primary" href="{{route('TaiKhoan.index')}}"><i class="fa fa-angle-double-left"></i> Quay Lại</a>
        <a style="margin-left:10px" class="btn btn-secondary" href="{{route('TaiKhoan.edit',$account->id)}}"><i class="fas fa-pencil-alt"></i> Chỉnh Sửa</a>
        </div>
      <div class="col-6">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('admin.index')}}"> <i data-feather="home"></i></a></li>
          <li class="breadcrumb-item">Tài Khoản</li>
          <li class="breadcrumb-item active">Chi Tiết</li>
        </ol>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-body">
      <div class="product-page-details">

        <h3>Chi Tiết Tài Khoản Số {{$account->id}}</h3>
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
              <td> <b>Id Tài Khoản &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
              <td class="txt-success">{{$account->id}}</td>
            </tr>
            <tr>
              <td> <b>Tên Tài Khoản &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
              <td>{{$account->username}}</td>
            </tr>
            <tr>
              <td> <b>Họ và Tên &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
              <td class="txt-success">{{$account->firstName}} {{$account->lastName}}</td>
            </tr>
            <tr>
              <td> <b>Giới Tính &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
              @if($account->gender == 1)
              <td class="txt-success">Nam</td>
              @else
              <td class="txt-success">Nữ</td>
              @endif
            </tr>
            <tr>
              <td> <b>Hệ Tài Khoản &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
              @if($account->level == 1)
              <td class="txt-success">Admin</td>
              @else
              <td class="txt-success">User</td>
              @endif
            </tr>
            <tr>
              <td> <b>Trạng Thái &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
              @if($account->status == 1)
              <td class="txt-success">Hoạt Động</td>
              @else
              <td class="txt-success">Vô Hiệu</td>
              @endif
            </tr>
            <tr>
              <td> <b>Số Điện Thoại &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
              <td>{{$account->phone}}</td>
            </tr>
            <tr>
              <td> <b>Email &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
              <td>{{$account->email}}</td>
            </tr>
            <tr>
              <td> <b>Địa Chỉ &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
              <td>{{$account->address}}</td>
            </tr>
          </tbody>
        </table>
      </div>
      <hr>
      <div class="row">
        <div class="col-md-6">
          <h6 class="product-title">Avatar</h6>
        </div>
        <div class="col-md-6">
          <div class="product-icon">
            <img class="img-thumbnail" src="{{URL::to('/') }}/server/assets/image/account/{{ $account->avatar }}" alt="">
          </div>
        </div>
      </div>
      <hr>
      
  </div>
</div>
</div>
@endsection