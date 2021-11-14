@extends('layout_admin')
@section('title','Sản Phẩm')
@section('content')
<div class="col-sm-12">
  <div class="page-title">
    <div class="row">
      <div class="col-6">
        <a class="btn btn-primary" href="{{route('SanPham.index')}}"><i class="fa fa-angle-double-left"></i> Quay Lại</a>
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
    <form class="form theme-form" action="{{ route('SuaSanPham',$product->product_id)}}" method="post" enctype="multipart/form-data" id="edit-data">
      @csrf
      <div class="card-body" id="noti-validate">
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
                <input class="form-control" type="text" placeholder="Nhập tên sản phẩm" name="name" id="name" value="{{$product ->product_name}}">
              </div>
            </div>
            <div class="mb-3 row">
              <label class="col-sm-3 col-form-label">Danh Mục</label>
              <div class="col-sm-9">
                <select class="form-select" aria-label="select example" name="cate_id" id="cate_id">
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
                <select class="form-select" aria-label="select example" name="port_id" id="port_id">
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
                <input class="form-control digits" name="quantity" id="quantity" type="number" placeholder="Số Lượng" data-bs-original-title="" title="" value="{{$product->product_quantity}}">
              </div>
            </div>
            <div class="mb-3 row">
              <label class="col-sm-3 col-form-label">Giá</label>
              <div class="col-sm-9">
                <input class="form-control" type="number" id="price" placeholder="Giá" name="price" value="{{$product->product_price}}">
              </div>
            </div>
            <div class="mb-3 row">
              <label class="col-sm-3 col-form-label">Từ Khóa</label>
              <div class="col-sm-9">
                <input class="form-control" type="text" placeholder="Tối đa 10 ký tự" maxlength="10" name="keyword" id="keyword" value="{{$product->product_keyword}}">
              </div>
            </div>
            <div class="mb-3 row">
              <label class="col-sm-3 col-form-label">Mô Tả</label>
              <div class="col-sm-9">
                <textarea class="form-control" id="ckeditor" rows="5" cols="5" placeholder="Nội dung mô tả..." name="description">{{$product->product_description}}</textarea>
              </div>
            </div>
          </div>
          <div class="mb-3 row">
            <label class="col-sm-3 col-form-label">Chọn ảnh</label>
            <div class="col-sm-9">
              <label id="id-label-0" for="event__input-0" class="form-control">Thêm ảnh</label>
              <input hidden class="form-control imageItem" id="event__input-0" name="img" type="file" onchange="uploadBannerFile(this, 0)" accept=".jpg, .png">
              <img id="event__img-0" src="{{URL::to('/')}}/image/product/{{$product->product_img}}" alt="slider" height="100%">
            </div>

          </div>
          <div class="mb-3 row">
            <label class="col-sm-3 col-form-label">Chọn ảnh phụ</label>
            <div class="col-sm-9">
              <label id="id-label-hover-0" for="event__input-hover-0" class="form-control">Thêm ảnh phụ</label>
              <input hidden class="form-control imageHover" id="event__input-hover-0" name="img_hover" type="file" onchange="uploadFileHover(this, 0)" accept=".jpg, .png">
              @if($product->product_img_hover != null)
              <img id="event__img-hover-0" src="{{URL::to('/')}}/image/product/hover/{{$product->product_img_hover}}" alt="slider" height="100%">
              @else
              <img id="event__img-hover-0" src="{{URL::to('/')}}/image/example/add.png" alt="slider" height="100%">
              @endif
            </div>
          </div>
        </div>
      </div>
      <div class="card-footer text-end">
        <div class="col-sm-9 offset-sm-3">
          <button class="btn btn-primary" type="submit">Thay Đổi</button>
          <input class="btn btn-light" type="reset" value="Cancel">
        </div>
      </div>
    </form>
  </div>
</div>
@endsection

@section('page-js')
<!-- delete and choose file -->
<script type="text/javascript">
  function uploadBannerFile(input, tam) {
    $('#id-label-' + tam).html(input.files[0].name);
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
        $('#event__img-' + tam).attr('src', e.target.result);
      }
      reader.readAsDataURL(input.files[0]);
    }
    $('#event__input-' + tam).change(function() {
      readURL(this);
    });
  }

  function uploadFileHover(input, tam) {
    $('#id-label-hover-' + tam).html(input.files[0].name);
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
        $('#event__img-hover-' + tam).attr('src', e.target.result);
      }
      reader.readAsDataURL(input.files[0]);
    }
    $('#event__input-hover-' + tam).change(function() {
      readURL(this);
    });
  }
</script>
<!-- /delete and choose file -->
<!-- CKEDITOR -->
<script>
  CKEDITOR.replace('ckeditor', {
    filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token()])}}",
    filebrowserUploadMethod: 'form'
  });
</script>

<script>
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  $('#edit-data').submit(function(event) {
    event.preventDefault();
    var form = $(this);
    var url = form.attr('action');
    let imageItem = document.getElementsByClassName('imageItem');
    let imageHover = document.getElementsByClassName('imageHover');
    // Lấy giá trị trong ckeditor
    var data_ckeditor = CKEDITOR.instances.ckeditor.getData();
    // Khai báo formData
    var formData = new FormData($(this)[0]);
    if (imageItem[0].files[0] != undefined) {
      formData.append('data_input_item', imageItem[0].files[0]);
    }
    if (imageHover[0].files[0] != undefined) {
      formData.append('data_input_hover', imageHover[0].files[0]);

    }
    formData.append('name', $('#name').val());
    formData.append('cate_id', $('#cate_id').val());
    formData.append('port_id', $('#port_id').val());
    formData.append('quantity', $('#quantity').val());
    formData.append('price', $('#price').val());
    formData.append('color', $('#color').val());
    formData.append('keyword', $('#keyword').val());
    formData.append('description', data_ckeditor);
    $.ajax({
      type: "POST",
      url: url,
      data: formData,
      async: false,
      cache: false,
      contentType: false,
      enctype: 'multipart/form-data',
      processData: false,
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
            window.location.replace("{{route('SanPham.index')}}");
          }, 2500);
        }
      },
      error: function(response) {
        $.each(response.responseJSON.errors, function(field_name, error) {
            $('#noti-validate').after('<div class="alert alert-danger noti-alert-danger" role="alert" style="font-size: 1.5rem;">' + error + '</div>');
          }),
          Swal.fire({
            position: 'center',
            icon: 'error',
            title: 'Thất bại',
            text: 'Vui lòng kiểm tra nhập đầy đủ các trường',
            showConfirmButton: true,
            timer: 2500
          }),
          window.setTimeout(function() {
            $('.alert.alert-danger.noti-alert-danger').remove();
          }, 20000);
      }
    });
  })
</script>

@endsection