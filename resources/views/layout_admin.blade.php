  <!DOCTYPE html>
  <html lang="en">

  <!-- Mirrored from admin.pixelstrap.com/cuba/theme/{{route('admin.index')}} by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 16 May 2021 10:56:01 GMT -->

  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Cuba admin is super flexible, powerful, clean &amp; modern responsive bootstrap 5 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Cuba admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="{{asset('client/images/favicon.png')}}" type="image/x-icon">
    <link rel="shortcut icon" href="{{asset('client/images/favicon.png')}}" type="image/x-icon">
    <title>Admin | @yield('title')</title>
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
    <link rel="stylesheet" type="text/css" href="{{asset('server/assets/css/vendors/scrollbar.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('server/assets/css/vendors/animate.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('server/assets/css/vendors/chartist.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('server/assets/css/vendors/date-picker.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('server/assets/css/vendors/scrollbar.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('server/assets/css/vendors/datatables.css')}}">
    <link rel="stylesheet" href="{{asset('sweetarlet2/node_modules/sweetalert2/dist/sweetalert2.css')}}">
    <!-- Plugins css Ends-->
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="{{asset('server/assets/css/vendors/bootstrap.css')}}">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="{{asset('server/assets/css/style.css')}}">
    <link id="color" rel="stylesheet" href="{{asset('server/assets/css/color-1.css')}}" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="{{asset('server/assets/css/responsive.css')}}">
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>

  </head>

  <body onload="startTime()">

    <div class="loader-wrapper">
      <div class="loader-index"><span></span></div>
      <svg>
        <defs></defs>
        <filter id="goo">
          <fegaussianblur in="SourceGraphic" stddeviation="11" result="blur"></fegaussianblur>
          <fecolormatrix in="blur" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 19 -9" result="goo"> </fecolormatrix>
        </filter>
      </svg>
    </div>
    <!-- tap on top starts-->
    <div class="tap-top"><i data-feather="chevrons-up"></i></div>
    <!-- tap on tap ends-->
    <!-- page-wrapper Start-->
    <div class="page-wrapper compact-wrapper" id="pageWrapper">
      <!-- Page Header Start-->
      <div class="page-header">
        <div class="header-wrapper row m-0">
          <div class="header-logo-wrapper col-auto p-0">
            <div class="logo-wrapper"><a href="{{route('admin.index')}}"><img class="img-fluid" src="{{asset('server/assets/images/logo/logo.png')}}" alt=""></a></div>
            <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="align-center"></i></div>
          </div>
          <div class="left-header col horizontal-wrapper ps-0">
            <ul class="horizontal-menu">
              <li class="mega-menu outside"><a class="nav-link" href="{{route('index')}}"><i data-feather="layers"></i><span>Quay L???i Client</span></a>
              </li>
            </ul>
          </div>
          <div class="nav-right col-8 pull-right right-header p-0">
            <ul class="nav-menus">
              <li class="language-nav">
                <div class="translate_wrapper">
                  <div class="current_lang">
                    <div class="lang"><i class="flag-icon flag-icon-vn"></i><span class="lang-txt">VN </span></div>
                  </div>
                  <div class="more_lang">
                    <div class="lang selected" data-value="en"><i class="flag-icon flag-icon-us"></i><span class="lang-txt">English<span> (US)</span></span></div>

                  </div>
                </div>
              </li>
              <li class="onhover-dropdown header_noti-notice">
                <div class="notification-box"><i data-feather="bell"> </i><span data-count="0" id="header__noti_1" class="header_noti-notice badge rounded-pill badge-secondary">0 </span></div>
                <div class="header__noti-list">
                  <div class="header__noti-heading">Th??ng b??o m???i</div>
                  <ul class="header__noti-list-item">
                    @if($thongBaoMoi!==null)
                    @foreach($thongBaoMoi as $thongBao)
                    <?php $chi_tiet = json_decode($thongBao->noi_dung, TRUE) ?>
                    <a href="{{route('HoaDon.show', $chi_tiet['don_hang_id'])}}">
                      <li class="header__noti-item">
                        <div class="noti-item__avt">
                          @if($chi_tiet['avatar_nguoi_dung']==null)
                          <img src="{{URL::to('/')}}/image/account/1.png" alt="" class="noti-item__avt-img">
                          @else
                          <img src="{{URL::to('/')}}/image/account/{{$chi_tiet['avatar_nguoi_dung']}}" alt="" class="noti-item__avt-img">
                          @endif
                        </div>
                        <div class="noti-item__content">
                          B???n c?? ????n h??ng:
                          <span class="header-noti__code-order">{{$chi_tiet['don_hang_id']}}</span>
                          m???i t???
                          <span class="header-noti__email-order">{{$chi_tiet['email_nguoi_dung']}}</span>. <br />
                          <span class="header-noti__date-order">{{$chi_tiet['thoi_gian']}}</span>
                        </div>
                      </li>
                    </a>
                    @endforeach
                    @else
                    <li class="header__noti-item">
                      <div>Danh S??ch Tr???ng</div>
                    </li>
                    @endif
                  </ul>
                </div>
              </li>
              <li>
                <div class="mode"><i class="fa fa-moon-o"></i></div>
              </li>
              <li class="maximize"><a class="text-dark" href="#!" onclick="javascript:toggleFullScreen()"><i data-feather="maximize"></i></a></li>
              <li class="profile-nav onhover-dropdown p-0 me-0">
                <div class="media profile-media">
                  @if(Auth::user()->avatar != null)
                  <img class="b-r-10" src="{{URL::to('/') }}/image/account/{{Auth::user()->avatar }}" alt="" width="37px" height="37px">
                  @else
                  <img class="b-r-10" src="{{URL::to('/') }}/image/account/1.png" alt="" width="37px" height="37px">
                  @endif
                  <div class="media-body"><span>{{ Auth::user()->lastName }}</span>
                    <p class="mb-0 font-roboto">Admin <i class="middle fa fa-angle-down"></i></p>
                  </div>
                </div>
                <ul class="profile-dropdown onhover-show-div">
                  <li><a href="{{ route('MyAccount.index') }}"><i data-feather="user"></i><span>T??i kho???n </span></a></li>
                  <li><a href="{{ route('logout') }}"><i data-feather="log-in"> </i><span>????ng xu???t</span></a></li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <!-- Page Header Ends                              -->
      <!-- Page Body Start-->
      <div class="page-body-wrapper">
        <!-- Page Sidebar Start-->
        <div class="sidebar-wrapper">
          <div>
            <div class="logo-wrapper"><a href="{{route('admin.index')}}">
                <img class="img-fluid for-light" width="150" height="30" src="{{asset('client/images/logo/logo-2.png')}}">
                <img class="img-fluid for-light" style="max-width:26%" src="{{asset('client/images/logo/genz.gif')}}" alt="Learts Logo">
                <img class="img-fluid for-dark" style="padding-left:40px;max-width:56%" src="{{asset('client/images/logo/dark.gif')}}" alt=""></a>
              <div class="back-btn"><i class="fa fa-angle-left"></i></div>
            </div>
            <div class="logo-icon-wrapper"><a href="{{route('admin.index')}}"><img class="img-fluid" src="{{asset('server/assets/images/logo/logo-icon.png')}}" alt=""></a></div>
            <nav class="sidebar-main">
              <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
              <div id="sidebar-menu">
                <ul class="sidebar-links" id="simple-bar">

                  <li class="back-btn"><a href="{{route('admin.index')}}"><img class="img-fluid" src="{{asset('server/assets/images/logo/logo-icon.png')}}" alt=""></a>
                    <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
                  </li>
                  <li class="sidebar-main-title">
                    <div>
                      <h6>Thanh C??ng C???</h6>
                    </div>
                  </li>
                  <li class="sidebar-list">
                    <a class="sidebar-link sidebar-title link-nav" href="{{route('admin.index')}}"><i data-feather="home"></i><span>Trang Ch???</span></a>
                  </li>
                  <li class="sidebar-list">
                    <a class="sidebar-link sidebar-title link-nav" href="{{route('SanPham.index')}}"><i data-feather="airplay"></i><span>S???n Ph???m</span></a>
                  </li>
                  <li class="sidebar-list">
                    <a class="sidebar-link sidebar-title link-nav" href="{{route('LoaiSanPham.index')}}"><i data-feather="layout"></i><span>Danh M???c</span></a>
                  </li>
                  <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="{{route('NhaCungCap.index')}}"><i data-feather="briefcase"></i><span>Nh?? Cung C???p</span></a>
                  </li>
                  <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="{{route('BaiViet.index')}}"><i data-feather="book-open"></i><span>B??i Vi???t</span></a>
                  </li>
                  <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="#"><i data-feather="box"></i><span>Ch???c N??ng</span></a>
                    <ul class="sidebar-submenu">
                      @if(Auth::user()->id ==1)
                      <li><a href="{{route('QuanLyTaiKhoanAdmin')}}">Qu???n L?? Admin</a></li>
                      @endif
                      <li><a href="{{route('TaiKhoan.index')}}">T??i Kho???n Ng?????i D??ng</a></li>
                      <li><a href="{{route('HoaDon.index')}}">H??a ????n Kh??ch H??ng</a></li>
                      <li><a href="{{route('BinhLuan.store')}}">Danh S??ch B??nh Lu???n</a></li>
                    </ul>
                  </li>
                </ul>
              </div>
              <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
            </nav>
          </div>
        </div>
        <!-- Page Sidebar Ends-->
        <div class="page-body">
          @yield('content')
        </div>
        <!-- footer start-->
        <footer class="footer">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-12 footer-copyright text-center">
                <p class="mb-0">&copy; 2021 | <a href="https://caothang.edu.vn/"><strong> Cao ?????ng k??? thu???t Cao Th???ng.</strong></a></p>
                </p>
              </div>
            </div>
          </div>
        </footer>
      </div>
    </div>
    <!-- latest jquery-->
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script> -->
    <script src="{{URL::asset('server/assets/js/jquery-3.5.1.min.js')}}"></script>
    <script src="{{URL::asset('ckeditor/ckeditor.js')}}"></script>
    <!-- Bootstrap js-->
    <script src="{{URL::asset('server/assets/js/bootstrap/bootstrap.bundle.min.js')}}"></script>
    <!-- feather icon js-->
    <script src="{{URL::asset('server/assets/js/icons/feather-icon/feather.min.js')}}"></script>
    <script src="{{URL::asset('server/assets/js/icons/feather-icon/feather-icon.js')}}"></script>
    <!-- scrollbar js-->
    <script src="{{URL::asset('server/assets/js/scrollbar/simplebar.js')}}"></script>
    <script src="{{URL::asset('server/assets/js/scrollbar/custom.js')}}"></script>
    <!-- Sidebar jquery-->
    <script src="{{URL::asset('server/assets/js/config.js')}}"></script>
    <!-- Plugins JS start-->
    <script src="{{URL::asset('server/assets/js/sidebar-menu.js')}}"></script>
    <script src="{{URL::asset('server/assets/js/chart/chartist/chartist.js')}}"></script>
    <script src="{{URL::asset('server/assets/js/chart/chartist/chartist-plugin-tooltip.js')}}"></script>
    <script src="{{URL::asset('server/assets/js/chart/knob/knob.min.js')}}"></script>
    <script src="{{URL::asset('server/assets/js/chart/knob/knob-chart.js')}}"></script>
    <script src="{{URL::asset('server/assets/js/chart/apex-chart/apex-chart.js')}}"></script>
    <script src="{{URL::asset('server/assets/js/chart/apex-chart/stock-prices.js')}}"></script>
    <script src="{{URL::asset('server/assets/js/notify/bootstrap-notify.min.js')}}"></script>
    <script src="{{URL::asset('server/assets/js/dashboard/default.js')}}"></script>
    <!-- <script src="{{URL::asset('server/assets/js/notify/index.js')}}"></script> -->
    <script src="{{URL::asset('server/assets/js/datepicker/date-picker/datepicker.js')}}"></script>
    <script src="{{URL::asset('server/assets/js/datepicker/date-picker/datepicker.en.js')}}"></script>
    <script src="{{URL::asset('server/assets/js/datepicker/date-picker/datepicker.custom.js')}}"></script>
    <script src="{{URL::asset('server/assets/js/typeahead/handlebars.js')}}"></script>
    <script src="{{URL::asset('server/assets/js/typeahead/typeahead.bundle.js')}}"></script>
    <script src="{{URL::asset('server/assets/js/typeahead/typeahead.custom.js')}}"></script>
    <script src="{{URL::asset('server/assets/js/typeahead-search/handlebars.js')}}"></script>
    <script src="{{URL::asset('server/assets/js/typeahead-search/typeahead-custom.js')}}"></script>
    <script src="{{URL::asset('server/assets/js/datatable/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{URL::asset('server/assets/js/datatable/datatables/datatable.custom.js')}}"></script>
    <script src="{{URL::asset('server/assets/js/tooltip-init.js')}}"></script>
    <script src="{{asset('sweetarlet2/node_modules/sweetalert2/dist/sweetalert2.js')}}"></script>

    <script src="{{URL::asset('server/assets/js/counter/jquery.waypoints.min.js')}}"></script>
    <script src="{{URL::asset('server/assets/js/counter/jquery.counterup.min.js')}}"></script>
    <script src="{{URL::asset('server/assets/js/counter/counter-custom.js')}}"></script>
    <script src="{{URL::asset('server/assets/js/photoswipe/photoswipe.min.js')}}"></script>
    <script src="{{URL::asset('server/assets/js/photoswipe/photoswipe-ui-default.min.js')}}"></script>
    <script src="{{URL::asset('server/assets/js/photoswipe/photoswipe.js')}}"></script>
    <script src="{{URL::asset('server/assets/js/tooltip-init.js')}}"></script>
    <!-- Plugins JS Ends-->
    <!-- Theme js-->
    <script src="{{URL::asset('server/assets/js/script.js')}}"></script>
    <script src="{{URL::asset('server/assets/js/theme-customizer/customizer.js')}}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
    <!-- <script src="{{ asset('js/app.js') }}"></script> -->
    <!-- login js-->
    <!-- Plugin used-->
    @yield('page-js')
    <script>
      // Enable pusher logging - don't include this in production
      Pusher.logToConsole = true;

      var pusher = new Pusher('b126bc4269efe288e2d6', {
        cluster: 'ap1'
      });

      var channel = pusher.subscribe('my-channel');
      var notificationCount = $('#header__noti_1').data('count');
      console.log(notificationCount);
      channel.bind('form-submitted', function(data) {
        $('.header__noti-list-item').prepend(`
          <a href="/./HoaDon/` + data['data']['don_hang_id'] + `">
            <li class="header__noti-item">
              <div class="noti-item__avt">
                <img src="{{asset('image/account/1.png')}}" alt="" class="noti-item__avt-img">
              </div>
              <div class="noti-item__content">
                B???n c?? ????n h??ng:
                <span class="header-noti__code-order">` + data['data']['don_hang_id'] + `</span>
                m???i t???
                <span class="header-noti__email-order">` + data['data']['email_nguoi_dung'] + `</span>.<br />
                <span class="header-noti__date-order">` + data['data']['thoi_gian'] + `</span>
              </div>
            </li>
          </a>
        `)
        notificationCount += 1;
        $('#header__noti_1').attr('data-count', notificationCount);
        $('#header__noti_1').text(notificationCount);
      });
    </script>
  </body>

  <!-- Mirrored from admin.pixelstrap.com/cuba/theme/{{route('admin.index')}} by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 16 May 2021 10:56:01 GMT -->

  </html>