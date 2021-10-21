@extends('layout_admin')
@section('title','Trang Chủ')
@section('content')
<div class="container-fluid">
  <div class="page-title">
    <div class="row">
      <div class="col-6">
        <h3>User Profile</h3>
      </div>
      <div class="col-6">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('index')}}"> <i data-feather="home"></i></a></li>
          <li class="breadcrumb-item">Users</li>
          <li class="breadcrumb-item active">User Profile</li>
        </ol>
      </div>
    </div>
  </div>
</div>
<div class="card">
    <div class="card-header">
      <h5>Thông Tin Tài Khoản</h5>
      <div style="padding-top:10px" id="noti-validate"></div>
    </div>
<!-- Container-fluid starts-->
<div class="card-body">
        <div class="row">
          <div class="col">
<div class="container-fluid">
  <div class="user-profile">
    <div class="row">
      <div class="col-sm-12">
        <div class="container-profile">
          <div class="profile__left">
            <div class="profile__name profile-commom">
              <div class="profile__name-title profile-title">
                Tên đăng nhập
              </div>
              <input type="text" class="profile__name-content profile-content" disabled="disabled" value="Thanh Bình">
            </div>

            <div class="profile__emaill profile-commom">
              <div class="profile__email-title profile-title">
                Email
              </div>
              <input type="email" class="profile__email-content profile-content" value="000@gmail.com">
            </div>

            <div class="profile__numphone profile-commom">
              <div class="profile__numphine-title profile-title">
                Số điện thoại
              </div>
              <input type="text" class="profile__numphine-content profile-content" value="00000000">
            </div>

            <div class="profile__fisrtname profile-commom">
              <div class="profile__fisrtname-title profile-title">Họ:</div>
              <input type="text" class="profile__fisrtname-content profile-content" value="Huỳnh">
            </div>

            <div class="profile__lastname profile-commom">
              <div class="profile__lastname-title profile-title">Tên: </div>
              <input type="text" class="profile__lastname-content profile-content" value="Bình">
            </div>

            <div class="profile__birthday profile-commom">
              <div class="profile__birthday-title profile-title">Ngày sinh: </div>
              <input type="text" class="profile__birthday-content profile-content" value="00/00/2000">
            </div>
          </div>

          <div class="profile__right">
            <div class="profile__avt">
                  <img id="event__img-0" src="{{asset('image/example/add.jpg')}}" alt="slider" width="50%" height="320px">
                  <label id="id-label-0" for="event__input-0" class="form-control form-control__custom" style="width:120px; margin-top:4px; text-align:center">Thêm ảnh</label>
                  <input hidden class="form-control imageItem" id="event__input-0" name="img" type="file" onchange="uploadBannerFile(this, 0)" accept=".jpg, .png">
            </div>
          </div>

        </div>
      </div>
    </div></div>
      </div>
    </div>
  </div>
</div>
</div>
<!-- Container-fluid Ends-->
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
</script>
@endsection