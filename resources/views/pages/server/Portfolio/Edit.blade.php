@extends('layout_admin')
@section('title','Nhà Cung Cấp')
@section('content')
<div class="col-sm-12">
  <div class="page-title">
    <div class="row">
      <div class="col-6">
        <a class="btn btn-primary" href="{{route('NhaCungCap.index')}}"><i class="fa fa-angle-double-left"></i> Quay Lại</a>
      </div>
      <div class="col-6">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('admin.index')}}"> <i data-feather="home"></i></a></li>
          <li class="breadcrumb-item">Nhà Cung Cấp</li>
          <li class="breadcrumb-item active">Chỉnh Sửa</li>
        </ol>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header">
      <h5>Chỉnh Sửa Nhà Cung Cấp</h5>
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
    <form class="form theme-form" action="{{ route('NhaCungCap.update',$port->port_id)}}" method="post" enctype="multipart/form-data">
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
              <label class="col-sm-3 col-form-label">Tên Nhà Cung Cấp</label>
              <div class="col-sm-9">
                <input class="form-control" type="text" placeholder="Nhập tên Nhà Cung Cấp" name="name" value="{{$port ->port_name}}">
              </div>
            </div>
            <div class="mb-3 row">
              <label class="col-sm-3 col-form-label">Xuất Xứ</label>
              <div class="col-sm-9">
                <input class="form-control" type="text" placeholder="Nhập Xuất Xứ" name="origin" value="{{$port ->port_origin}}">
              </div>
            </div>
            <div class="mb-3 row">
              <label class="col-sm-3 col-form-label">Chi Tiết</label>
              <div class="col-sm-9">
                <textarea class="form-control" id="ckeditor1" rows="5" cols="5" placeholder="Nội dung chi tiết..." name="description">{{$port->port_description}}</textarea>
              </div>
            </div>
            <div class="mb-3 row">
              <label class="col-sm-3 col-form-label">Chọn Avatar</label>
              <div class="col-sm-9">
                <input class="form-control" type="file" name="avatar" data-bs-original-title="" title="">
                <div style="padding-top:10px">
                  <img src="{{URL::to('/') }}/server/assets/image/portfolio/avatar/{{ $port->port_avatar }}" alt="">
                  <br>
                  <label for="img" style="text-align:center">{{$port->port_img}}</label>
                </div>

              </div>
            </div>
            <div class="mb-3 row">
              <label class="col-sm-3 col-form-label">Chọn ảnh</label>
              <div class="col-sm-9">
                <input class="form-control" type="file" name="img" data-bs-original-title="" title="">
                <div style="padding-top:10px">
                  <img src="{{URL::to('/') }}/server/assets/image/portfolio/{{ $port->port_img }}" alt="">
                  <br>
                  <label for="img" style="text-align:center">{{$port->port_img}}</label>
                </div>

              </div>
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