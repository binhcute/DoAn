@extends('layout_admin')
@section('title','Sản Phẩm')
@section('content')
<div class="col-sm-12">
  <div class="page-title">
    <div class="row">
      <div class="col-6">
        <a class="btn btn-primary" href="{{route('SanPham.index')}}"><i class="fa fa-angle-double-left"></i> Quay Lại</a>
        <a style="margin-left:10px" class="btn btn-secondary" href="{{route('SanPham.edit',$product->product_id)}}"><i class="fas fa-pencil-alt"></i> Chỉnh Sửa</a>
        </div>
      <div class="col-6">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('admin.index')}}"> <i data-feather="home"></i></a></li>
          <li class="breadcrumb-item">Sản Phẩm</li>
          <li class="breadcrumb-item active">Chi Tiết</li>
        </ol>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-body">
      <div class="product-page-details">

        <h3>Chi Tiết Sản Phẩm Số {{$product->product_id}}</h3>
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
              <td> <b>Id Sản Phẩm &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
              <td class="txt-success">{{$product->product_id}}</td>
            </tr>
            <tr>
              <td> <b>Người Đăng &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
              <td class="txt-success">{{$product->firstName}} {{$product->firstName}}</td>
            </tr>
            <tr>
              <td> <b>Tài Khoản &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
              <td class="txt-success">{{$product->username}}</td>
            </tr>
            <tr>
              <td> <b>Tên Sản Phẩm &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
              <td>{{$product->product_name}}</td>
            </tr>
            <tr>
              <td> <b>Giá Sản Phẩm &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
              <td>{{number_format($product->product_price)}}</td>
            </tr>
            <tr>
            <td> <b>Nhà Cung Cấp &nbsp;&nbsp;&nbsp;:</b></td>
            <td>{{$product->port_name}}</td>
            </tr>
            <tr>
              <td> <b>Danh Mục &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
              <td>{{$product->cate_name}}</td>
            </tr>
            <tr>
              <td> <b>Ký hiệu &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
              <td>{{$product->product_keyword}}</td>
            </tr>
            <tr>
              <td> <b>Số Lượng &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
              <td>{{$product->product_quantity}}</td>
            </tr>
            <tr>
              <td> <b>Thời Gian Tạo &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
              <td>{{$product->created_at}}</td>
            </tr>
            <tr>
              <td> <b>Thời Gian Chỉnh Sửa &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
              <td>{{$product->updated_at}}</td>
            </tr>
          </tbody>
        </table>
      </div>
      <hr>
      <b>Nội dung chi tiết</b>
      <br>
      <p>{!! $product->product_description !!}</p>
      <hr>
      <div class="row">
        <div class="col-md-6">
          <h6 class="product-title">Ảnh Sản Phẩm</h6>
        </div>
        <div class="col-md-6">
          <div class="product-icon">
            <img class="img-thumbnail" src="{{URL::to('/') }}/image/product/{{ $product->product_img }}" alt="">
          </div>
        </div>
      </div>
      <hr>
      <div class="row">
        <div class="col-md-6">
          <h6 class="product-title">Ảnh Khác</h6>
        </div>
        <div class="col-md-6">
          <div class="d-flex">
            <img class="img-thumbnail" src="{{URL::to('/') }}/image/product/hover/{{ $product->product_img_hover }}" alt="">
          </div>
        </div>
      </div>
    </div>

  </div>
</div>
</div>
@endsection