@extends('layout_admin')
@section('title','Chỉnh Sửa Bài Viết')
@section('content')
<div class="col-sm-12">
  <div class="page-title">
    <div class="row">
      <div class="col-6">
        <a class="btn btn-primary" href="{{route('BaiViet.index')}}"><i class="fa fa-angle-double-left"></i> Quay Lại</a>
      </div>
      <div class="col-6">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('admin.index')}}"> <i data-feather="home"></i></a></li>
          <li class="breadcrumb-item">Bài Viết</li>
          <li class="breadcrumb-item active">Chỉnh Sửa Bài Viết</li>
        </ol>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header">
      <h5>Chỉnh Sửa Bài Viết</h5>
    </div>

    <form class="form theme-form" action="{{ route('SuaBaiViet',$article->article_id)}}" method="post" enctype="multipart/form-data" id="edit-data">
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
              <label for="name" class="col-sm-3 col-form-label">Tên Bài Viết <abbr class="required">*</abbr></label>
              <div class="col-sm-9">
                <input class="form-control" type="text" placeholder="Nhập tên Bài Viết" name="name" id="name" value="{{$article->article_name}}" required>
              </div>
            </div>
            <div class="mb-3 row">
              <label for="description" class="col-sm-3 col-form-label">Mô Tả <abbr class="required">*</abbr></label>
              <div class="col-sm-9">
                <input class="form-control" type="text" placeholder="Mô tả ngắn 1000 từ" name="description" id="description" value="{{$article->article_description}}" required>
              </div>
            </div>
            <div class="mb-3 row">
              <label for="keyword" class="col-sm-3 col-form-label">Từ Khóa</label>
              <div class="col-sm-9">
                <input class="form-control" type="text" placeholder="Tối đa 50 ký tự" maxlength="50" name="keyword" id="keyword" value="{{$article->article_keyword}}">
              </div>
            </div>
            <div class="mb-3 row">
              <label class="col-sm-3 col-form-label">Nội Dung Bài Viết <abbr class="required">*</abbr></label>
              <div class="col-sm-9">
                <textarea class="form-control" id="ckeditor" rows="5" cols="5" placeholder="Nội dung chi tiết..." name="detail" required>{{$article->article_detail}}</textarea>
              </div>
            </div>
            <div class="mb-3 row">
              <label class="col-sm-3 col-form-label">Chọn ảnh</label>
              <div class="col-sm-9">
                <label id="id-label-0" for="event__input-0" class="form-control">Thêm ảnh</label>
                <input hidden class="form-control imageItem" id="event__input-0" name="img" type="file" onchange="uploadFile(this, 0)" accept=".jpg, .png">
                <img id="event__img-0" src="{{URL::to('/')}}/image/article/{{$article->article_img}}" alt="slider" width="50%" height="250px">
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="card-footer text-end">
        <div class="col-sm-9 offset-sm-3">
          <button class="btn btn-primary" type="submit">Thay Đổi</button>
          <input class="btn btn-light" type="reset" value="Đặt Lại">
        </div>
      </div>
    </form>
  </div>
</div>
@endsection

@section('page-js')
<script type="text/javascript">
  function uploadFile(input, tam) {
    $('#id-label-' + tam).html(input.files[0].name);
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
        $('#event__img' + tam).attr('src', reader.result);
      }
      reader.readAsDataURL(input.files[0]);
    }
    $('#event__input' + tam).change(function() {
      readURL(this);
    });
  }
</script>
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
    var from = $(this);
    var url = from.attr('action');
    let imageItem = document.getElementsByClassName('imageItem');
    //CKEDITOR
    var data_ckeditor = CKEDITOR.instances.ckeditor.getData();
    //FormData
    var formData = new FormData($(this)[0]);
    if (imageItem[0].files[0] != undefined) {
      formData.append('data_input_item', imageItem[0].files[0]);
    }
    formData.append('name', $('#name').val());
    formData.append('description', $('#description').val());
    formData.append('keyword', $('#keyword').val());
    formData.append('detail', data_ckeditor);
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
            window.location.replace("{{route('BaiViet.index')}}");
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