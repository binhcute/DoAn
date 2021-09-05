<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from admin.pixelstrap.com/cuba/theme/sign-up-wizard.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 16 May 2021 10:57:41 GMT -->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Cuba admin is super flexible, powerful, clean &amp; modern responsive bootstrap 5 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Cuba admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="{{asset('server/assets/images/favicon.png')}}" type="image/x-icon">
    <link rel="shortcut icon" href="{{asset('server/assets/images/favicon.png')}}" type="image/x-icon">
    <title>Cuba - Premium Admin Template</title>
    <!-- Google font-->
    <link href="../../../fonts.googleapis.com/css31d8.css?family=Rubik:400,400i,500,500i,700,700i&amp;display=swap" rel="stylesheet">
    <link href="../../../fonts.googleapis.com/css8807.css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('server/assets/css/font-awesome.css')}}">
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="{{asset('server/assets/css/vendors/icofont.css')}}">
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="{{asset('server/assets/css/vendors/themify.css')}}">
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="{{asset('server/assets/css/vendors/flag-icon.css')}}">
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="{{asset('server/assets/css/vendors/feather-icon.css')}}">
    <!-- Plugins css start-->
    <link rel="stylesheet" type="text/css" href="{{asset('server/assets/css/vendors/animate.css')}}">
    <!-- Plugins css Ends-->
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="{{asset('server/assets/css/vendors/bootstrap.css')}}">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="{{asset('server/assets/css/style.css')}}">
    <link id="color" rel="stylesheet" href="{{asset('server/assets/css/color-1.css')}}" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="{{asset('server/assets/css/responsive.css')}}">
</head>

<body>
    <!-- login page start-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 p-0">
                <div>
                    <div class="theme-form">
                        <form role="form" method="POST" action="{{ url('/register') }}">
                        {{ csrf_field() }}
                            <div class="wizard-4" id="wizard">
                                <ul>
                                    <li><a class="logo text-start ps-0" href="index.html"><img class="img-fluid for-light" src="{{asset('server/assets/images/logo/login.png')}}" alt="looginpage"><img class="img-fluid for-dark" src="{{asset('server/assets/images/logo/logo_dark.png')}}" alt="looginpage"></a></li>
                                    <li><a href="#step-1">
                                            <h4>1</h4>
                                            <h5>personal</h5><small>Add personal details</small>
                                        </a></li>
                                    <li><a href="#step-2">
                                            <h4>2</h4>
                                            <h5>Address</h5><small>Add additional info</small>
                                        </a></li>
                                    <li><a href="#step-3">
                                            <h4>3</h4>
                                            <h5>Message</h5><small>Add message(optional)</small>
                                        </a></li>
                                    <li class="pb-0"><a href="#step-4">
                                            <h4>4</h4>
                                            <h5> Done <i class="fa fa-thumbs-o-up"></i></h5><small>Complete.. !</small>
                                        </a></li>
                                    <li> <img src="{{asset('server/assets/images/login/icon.png')}}" alt="looginpage"></li>
                                </ul>
                                <div id="step-1">
                                    <div class="wizard-title">
                                        <h2>Đăng Ký Tài Khoản</h2>
                                        @if (count($errors) > 0)
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                            <li>
                                                <h5 class="text-muted mb-4" role="alert" style="color:red">
                                                    <strong>{{ $error }}</strong>
                                                </h5>

                                            </li>

                                            @endforeach
                                        </ul>
                                    </div>
                                    @else
                                    <h5 class="text-muted mb-4">Thông Tin Cá Nhân</h5>
                                    @endif
                                </div>
                                <div class="login-main">
                                    <div class="theme-form">
                                        <div class="form-group mb-3">
                                            <label for="name">Tên Lót</label>
                                            <input class="form-control" name="firstName" type="text" placeholder="Nhập tên lót của bạn" required="required">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="lname">Tên</label>
                                            <input class="form-control" name="lastName" type="text" placeholder="Nhập tên của bạn">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="exampleFormControlInput1">Ngày Sinh</label>
                                            <input class="form-control" type="date" name="birthday">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="exampleFormControlInput1">Giới Tính</label>
                                            <div class="col">
                                                <div class="m-t-15 m-checkbox-inline custom-radio-ml">
                                                    <div class="form-check form-check-inline radio radio-primary">
                                                        <input class="form-check-input" name="gender" type="radio" name="radio1" value="0">
                                                        <label class="form-check-label mb-0" for="radioinline1">Nam</label>
                                                    </div>
                                                    <div class="form-check form-check-inline radio radio-primary">
                                                        <input class="form-check-input" name="gender" type="radio" name="radio1" value="1">
                                                        <label class="form-check-label mb-0" for="radioinline2">Nữ</label>
                                                    </div>
                                                    <div class="form-check form-check-inline radio radio-primary">
                                                        <input class="form-check-input" name="gender" type="radio" name="radio1" value="2">
                                                        <label class="form-check-label mb-0" for="radioinline3">Khác</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="step-2">
                                <div class="wizard-title">
                                    <h2>Đăng Ký Tài Khoản</h2>
                                    <h5 class="text-muted mb-4">Tài Khoản & Mật Khẩu</h5>
                                </div>
                                <div class="login-main">
                                    <div class="theme-form">
                                        <div class="form-group mb-3 m-t-15">
                                            <label for="exampleFormControlInput1">Email</label>
                                            <input class="form-control" name="email" type="email" placeholder="Tên đăng nhập của bạn">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="contact">Số Điện Thoại</label>
                                            <input class="form-control" name="phone" type="number" placeholder="123456789">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="contact">Địa Chỉ</label>
                                            <input class="form-control" name="address" type="text" placeholder="Bitexco, Quận 1">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="step-3">
                                <div class="wizard-title">
                                    <h2>Đăng Ký Tài Khoản</h2>
                                    <h5 class="text-muted mb-4">Enter your email & password to login</h5>
                                </div>
                                <div class="login-main">
                                    <div class="form-group mb-3">
                                        <label for="exampleFormControlInput1">Tài Khoản</label>
                                        <input class="form-control" name="username" type="text" placeholder="Tên đăng nhập của bạn">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="exampleInputPassword1">Mật Khẩu</label>
                                        <input class="form-control" name="password" type="password" placeholder="**********">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="exampleInputPassword1">Nhập Lại Mật Khẩu</label>
                                        <input class="form-control" id="password_confirmation" type="password" placeholder="**********">
                                    </div>
                                </div>
                            </div>
                            <div id="step-4">
                                <div class="wizard-title">
                                    <h2>Đăng Ký Tài Khoản</h2>
                                    <h5 class="text-muted mb-4">Enter your email & password to login</h5>
                                </div>
                                <div class="login-main">
                                    <div class="theme-form">
                                        <div class="form-group mb-3">
                                            <label for="exampleFormControlInput1">Avatar</label>
                                            <input class="form-control" type="file" name="avatar" data-bs-original-title="" title="">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            
                            <button type="submit" class="btn btn-primary">Đăng Ký</button>  
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
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
    <script src="{{asset('server/assets/js/form-wizard/form-wizard-five.js')}}"></script>
    <script src="{{asset('server/assets/js/tooltip-init.js')}}"></script>
    <!-- Plugins JS Ends-->
    <!-- Theme js-->
    <script src="{{asset('server/assets/js/script.js')}}"></script>
    <script src="{{asset('server/assets/js/theme-customizer/customizer.js')}}"></script>
    <!-- login js-->
    <!-- Plugin used-->
    </div>
</body>

<!-- Mirrored from admin.pixelstrap.com/cuba/theme/sign-up-wizard.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 16 May 2021 10:57:41 GMT -->

</html>