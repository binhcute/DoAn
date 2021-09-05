@extends('layout_admin')
@section('title','Sản Phẩm')
@section('content')
<div class="col-sm-12">
  <div class="page-title">
    <div class="row">
      <div class="col-6">
        <a class="btn btn-primary" href="{{route('SanPham.index')}}"><i class="fa fa-angle-double-left"></i>  Quay Lại</a>
      </div>
      <div class="col-6">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('admin.index')}}"> <i data-feather="home"></i></a></li>
          <li class="breadcrumb-item">Sản Phẩm</li>
          <li class="breadcrumb-item active">Chỉnh Sửa</li>
        </ol>
      </div>
    </div>
  </div>
<div class="card">
  <div class="card-header">
    <h5>Chỉnh Sửa Sản Phẩm</h5>
  </div>
  @if ($message = Session::get('success'))
  <div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
  </div>
  <img src="images/{{ Session::get('image') }}">
  @endif

  @if (count($errors) > 0)
  <div class="alert alert-danger">
    <strong>Whoops!</strong> Có một vài lỗi trong quá trình nhập liệu.
    <ul>
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
  @endif
  <form class="form theme-form" action="{{ route('SanPham.update',$product->product_id)}}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="_method" value="put" />
    <div class="card-body">
      <div class="row">
        <div class="col">
          <div class="mb-3 row">
            <label class="col-sm-3 col-form-label pt-0">Người Nhập Hiện Tại</label>
            <div class="col-sm-9">
              <div class="form-control-static">{{ Auth::user()->firstName }} {{ Auth::user()->lastName }}</div>
            </div>
          </div>
          <div class="mb-3 row">
            <label class="col-sm-3 col-form-label">Tên Sản Phẩm</label>
            <div class="col-sm-9">
              <input class="form-control" type="text" placeholder="Nhập tên sản phẩm" name="name" value="{{$product ->product_name}}">
            </div>
          </div>
          <div class="mb-3 row">
            <label class="col-sm-3 col-form-label">Loại Sản Phẩm</label>
            <div class="col-sm-9">
              <select class="form-select" aria-label="select example" name="cate_id">
                @foreach($cate as $cate)
                  @if($cate->cate_id == $product->cate_id)
                    <option selected value="{{$cate->cate_id}}">{{$cate->cate_name}}</option>
                    @else
                    <option value="{{$cate->cate_id}}">{{$cate->cate_name}}</option>
                  @endif
                @endforeach
              </select>
            </div>
          </div>
          <div class="mb-3 row">
            <label class="col-sm-3 col-form-label">Nhà Cung Cấp</label>
            <div class="col-sm-9">
            <select class="form-select" aria-label="select example" name="port_id">
                @foreach($port as $port)
                  @if($port->port_id == $product->port_id)
                    <option selected value="{{$port->port_id}}">{{$port->port_name}}</option>
                    @else
                    <option value="{{$port->port_id}}">{{$port->port_name}}</option>
                  @endif
                @endforeach
              </select>
            </div>
          </div>
          <div class="mb-3 row">
            <label class="col-sm-3 col-form-label">Số Lượng</label>
            <div class="col-sm-9">
              <input class="form-control digits" name="quantity" type="number" placeholder="Number" data-bs-original-title="" title="" value="{{$product->product_quantity}}">
            </div>
          </div>
          <div class="mb-3 row">
            <label class="col-sm-3 col-form-label">Giá</label>
            <div class="col-sm-9">
              <input class="form-control" type="number" placeholder="Price" name="price" value="{{$product->product_price}}">
            </div>
          </div>
          <div class="mb-3 row">
            <label class="col-sm-3 col-form-label pt-0">Màu Sắc</label>
            <div class="col-sm-9">
              <input class="form-control" type="text" name="color"  placeholder="Màu Sắc" value="{{$product->product_color}}">
            </div>
          </div>
          <div class="mb-3 row">
            <label class="col-sm-3 col-form-label">Từ Khóa</label>
            <div class="col-sm-9">
              <input class="form-control" type="text" placeholder="Tối đa 10 ký tự" maxlength="10" name="keyword" value="{{$product->product_keyword}}">
            </div>
          </div>
          <div class="mb-3 row">
            <label class="col-sm-3 col-form-label">Mô Tả</label>
            <div class="col-sm-9">
              <textarea class="form-control" id="ckeditor1" rows="5" cols="5" placeholder="Nội dung mô tả..." name="description">{{$product->product_description}}</textarea>
            </div>
          </div>
        </div>
        <div class="mb-3 row">
          <label class="col-sm-3 col-form-label">Chọn ảnh</label>
          <div class="col-sm-9">
            <input class="form-control" type="file" name="img" data-bs-original-title="" title="">
            <img src="{{URL::to('/') }}/server/assets/image/product/{{ $product->product_img }}" width="250" height="250" alt="">
            <label for="img">{{$product->product_img}}</label> 
          </div>
        </div>
        <div class="mb-3 row">
          <label class="col-sm-3 col-form-label">Chọn ảnh chuyển</label>
          <div class="col-sm-9">
            <input class="form-control" type="file" name="img_hover" data-bs-original-title="" title="">
            <img src="{{URL::to('/') }}/server/assets/image/product/hover/{{ $product->product_img_hover }}" width="250" height="250" alt="">
            <label for="img">{{$product->product_img_hover}}</label> 
          </div>
        </div>
      </div>
    </div>
    <div class="card-footer text-end">
      <div class="col-sm-9 offset-sm-3">
        <button class="btn btn-primary" type="submit">Submit</button>
        <input class="btn btn-light" type="reset" value="Cancel">
      </div>
    </div>
  </form>
</div>
</div>
@endsection