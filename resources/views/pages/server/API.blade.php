@extends('layout_admin')
@section('title','Quản Lý API')
@section('content')
<div class="col-sm-12">
  <div class="page-title">
    <div class="row">
      <div class="col-6">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('admin.index')}}"> <i data-feather="home"></i></a></li>
          <li class="breadcrumb-item">Quản Lý API</li>
        </ol>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-body">
      <div class="product-page-details">

        <h3>Quản Lý API</h3>
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
        <div class="card-body">
      <a style="margin:10px" class="btn btn-primary-gradien" href="{{URL::to('/api/product')}}">Sản Phẩm</a> 
      <a style="margin:10px" class="btn btn-secondary-gradien" href="{{URL::to('/api/category')}}">Danh Mục</a> 
      <a style="margin:10px" class="btn btn-success-gradien" href="{{URL::to('/api/portfolio')}}">Nhà Cung Cấp</a> 
      <a style="margin:10px" class="btn btn-info-gradien" href="{{URL::to('/api/order')}}">Hóa Đơn</a> 
      <a style="margin:10px" class="btn btn-warning-gradien" href="{{URL::to('/api/order-detail')}}">Chi Tiết Hóa Đơn</a> 
      <a style="margin:10px" class="btn btn-danger-gradien" href="{{URL::to('/api/article')}}">Bài Viết</a> 
      <a style="margin:10px" class="btn btn-primary-gradien" href="{{URL::to('/api/account')}}">Tài Khoản</a>  
      <a style="margin:10px" class="btn btn-success-gradien" href="{{URL::to('/api/show-product-by-portfolio/1')}}">Sản Phẩm theo Nhà Cung Cấp</a> 
      <a style="margin:10px" class="btn btn-info-gradien" href="{{URL::to('/api/show-product-by-category/1')}}">Sản Phẩm theo Danh Mục</a> 
          </div></div>
  </div>
</div>
</div>
@endsection