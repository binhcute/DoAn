<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from admin.pixelstrap.com/cuba/theme/login_one.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 16 May 2021 10:56:12 GMT -->

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Cuba admin is super flexible, powerful, clean &amp; modern responsive bootstrap 5 admin template with unlimited possibilities.">
  <meta name="keywords" content="admin template, Cuba admin template, dashboard template, flat admin template, responsive admin template, web app">
  <meta name="author" content="pixelstrap">
  <link rel="icon" href="{{asset('server/assets/images/favicon.png')}}" type="image/x-icon">
  <link rel="shortcut icon" href="{{asset('server/assets/images/favicon.png')}}" type="image/x-icon">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <title>Đăng Nhập</title>
  <!-- Google font-->
  <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="{{asset('server/assets/css/font-awesome/css/font-awesome.css')}}">
  <!-- ico-font-->
  <link rel="stylesheet" type="text/css" href="{{asset('server/assets/css/vendors/icofont.css')}}">
  <!-- Themify icon-->
  <link rel="stylesheet" type="text/css" href="{{asset('server/assets/css/vendors/themify.css')}}">
  <!-- Flag icon-->
  <link rel="stylesheet" type="text/css" href="{{asset('server/assets/css/vendors/flag-icon.css')}}">
  <!-- Feather icon-->
  <link rel="stylesheet" type="text/css" href="{{asset('server/assets/css/vendors/feather-icon.css')}}">
  <!-- Plugins css start-->
  <!-- Plugins css Ends-->
  <!-- Bootstrap css-->
  <link rel="stylesheet" type="text/css" href="{{asset('server/assets/css/vendors/bootstrap.css')}}">
  <!-- App css-->
  <link rel="stylesheet" type="text/css" href="{{asset('server/assets/css/style.css')}}">
  <link id="color" rel="stylesheet" href="{{asset('server/assets/css/color-1.css')}}" media="screen">
  <!-- Responsive css-->
  <link rel="stylesheet" type="text/css" href="{{asset('server/assets/css/responsive.css')}}">
  <link rel="stylesheet" href="{{asset('sweetarlet2/node_modules/sweetalert2/dist/sweetalert2.css')}}">
</head>

<body>
  <!-- login page start-->
  <div class="container-fluid">
    <div class="row">
      <div class="col-xl-7"><img class="bg-img-cover bg-center" src="{{asset('image/example/login.jpg')}}" alt="looginpage"></div>
      <div class="col-xl-5 p-0">
        <div class="login-card">
          <div>
            <div class="login-main">
              <div><a class="logo text-start text-center" href="{{route('index')}}"><img class="img-fluid for-light" src="{{asset('client/images/logo/logo-2.png')}}" alt="Learts Logo"><img class="img-fluid for-dark" src="{{asset('server/assets/images/logo/logo_dark.png')}}" alt="looginpage"></a></div>

              <form class="theme-form" method="POST" action="{{ url('/LoginCheck') }}" id="login-check-tri">
                {{ csrf_field() }}
                <h4 id="noti-validated" class="text-center">Đăng nhập</h4>
                <div class="form-group">
                  <label for="username" class="col-form-label">Tài khoản</label>
                  <input type="text" class="form-control" name="username" placeholder="Tài Khoản" value="{{ old('username') }}" autofocus>
                </div>
                <div class="form-group">
                  <label class="col-form-label">Mật khẩu</label>
                  <div class="form-input position-relative">
                    <input type="password" class="form-control" name="password" placeholder="*********">
                    <div class="show-hide"><span class="show"> </span></div>
                  </div>
                </div>
                <div class="form-group mt-4">
                  <button class="btn btn-info btn-block w-100" type="submit">Đăng nhập</button>
                </div>
              </form>
              <hr>
              <p class="mt-4">Bạn không có tài khoản?<a class="ms-2" type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal" href="#">Tạo tài khoản</a></p>

              <p class="mt-4">Bạn quên mật khẩu?<a class="btn btn-link" href="{{ route('getQuenMatKhau') }}">Click vào đây</a></p>

            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Đăng Ký Tài Khoản</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
            <form role="form" method="POST" action="{{ url('/register') }}" id="register-check-tri">
              {{ csrf_field() }}
              <fieldset id="noti-validate">
                <div class="form-row">
                  <div class="form-group col-sm-6">
                    <input type="name" class="form-control" id="firstName" name="firstName" placeholder="Họ" required>
                    @if ($errors->has('firstName'))
                    <span class="help-block">
                      <strong>{{ $errors->first('firstName') }}</strong>
                    </span>
                    @endif
                  </div>

                  <div class="form-group col-sm-6">
                    <input type="name" class="form-control" id="lastName" name="lastName" placeholder="Tên" required>
                    @if ($errors->has('lastName'))
                    <span class="help-block">
                      <strong>{{ $errors->first('lastName') }}</strong>
                    </span>
                    @endif
                  </div>
                </div>
                <div class="form-group">
                  <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                  @if ($errors->has('email'))
                  <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                  </span>
                  @endif
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                  <input type="text" class="form-control" id="username" name="username" placeholder="Tên Tài Khoản" required>
                  @if ($errors->has('username'))
                  <span class="help-block">
                    <strong>{{ $errors->first('username') }}</strong>
                  </span>
                  @endif
                </div>
                <div class="form-group">
                  <input type="password" class="form-control" id="password" name="password" placeholder="Mật Khẩu" required>
                  @if ($errors->has('password'))
                  <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                  </span>
                  @endif
                </div>
                <div class="form-group">
                  <input type="password" class="form-control" id="password-confirm" name="password_confirmation" placeholder="Nhập Lại Mật Khẩu" required>
                </div>
                <div class="text-center">
                  <button class="btn btn-primary" type="submit">Đăng Ký</button>
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- Shopping Cart Section End -->
    <!-- latest jquery-->
    <script src="{{asset('server/assets/js/jquery-3.5.1.min.js')}}"></script>
    <!-- Bootstrap js-->
    <script src="{{asset('server/assets/js/bootstrap/bootstrap.bundle.min.js')}}"></script>
    <!-- feather icon js-->
    <script src="{{asset('server/assets/js/icons/feather-icon/feather.min.js')}}"></script>
    <script src="{{asset('server/assets/js/icons/feather-icon/feather-icon.js')}}"></script>
    <!-- scrollbar js-->
    <!-- Sidebar jquery-->
    <script src="{{asset('server/assets/js/config.js')}}"></script>
    <!-- Plugins JS start-->
    <!-- Plugins JS Ends-->
    <!-- Theme js-->
    <script src="{{asset('server/assets/js/script.js')}}"></script>
    <!-- login js-->
    <!-- Plugin used-->
    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script> -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script src="{{asset('sweetarlet2/node_modules/sweetalert2/dist/sweetalert2.js')}}"></script>
    <script>
      $('#login-check-tri').submit(function(event) {
        event.preventDefault();
        var form = $(this);
        var url = form.attr('action');
        $.ajax({
          type: "POST",
          url: url,
          data: form.serialize(),
          success: function(data) {
            if (data.status == 'error') {
              Swal.fire({
                position: 'center',
                icon: 'error',
                title: 'Thất Bại',
                text: data.message
              })
            }
            if (data.status == 'success') {
              Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Thành Công',
                text: data.message,
                timer: 2500
              })
              window.setTimeout(function() {
                window.location.replace("{{URL::to('/')}} ");
              }, 2500);
            }
          },
          error: function(response) {
            $.each(response.responseJSON.errors, function(field_name, error) {
                $('#noti-validated').after('<p style="color:red" class="noti-alert-danger__1">' + error + '</p>');
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
                $('.noti-alert-danger__1').remove();
              }, 15000);
          }
        });
      });
      $('#register-check-tri').submit(function(event) {
        event.preventDefault();
        var form = $(this);
        var url = form.attr('action');
        $.ajax({
          type: "POST",
          url: url,
          data: form.serialize(),
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
                window.location.replace("{{route('login')}}");
              }, 2500);
            }
          },
          error: function(response) {
            $.each(response.responseJSON.errors, function(field_name, error) {
                $('#noti-validate').before('<div class="alert alert-danger noti-alert-danger" role="alert" style="font-size: 1.5rem;">' + error + '</div>');
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
      });
    </script>
  </div>
</body>

<!-- Mirrored from admin.pixelstrap.com/cuba/theme/login_one.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 16 May 2021 10:56:12 GMT -->

</html>