<!DOCTYPE html>
<html class="no-js" lang="vn">


<!-- Mirrored from htmldemo.hasthemes.com/learts/learts/{{route('index')}} by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 04 Mar 2021 04:13:06 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Learts – @yield('title')</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('client/images/favicon.png')}}">

    <!-- CSS
	============================================ -->

    <!-- Vendor CSS (Bootstrap & Icon Font) -->
    <!-- <link rel="stylesheet" href="{{asset('client/css/vendor/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('client/css/vendor/font-awesome-pro.min.css')}}">
    <link rel="stylesheet" href="{{asset('client/css/vendor/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('client/css/vendor/customFonts.css')}}"> -->

    <!-- Plugins CSS (All Plugins Files) -->
    <!-- <link rel="stylesheet" href="{{asset('client/css/plugins/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('client/css/plugins/perfect-scrollbar.css')}}">
    <link rel="stylesheet" href="{{asset('client/css/plugins/swiper.min.css')}}">
    <link rel="stylesheet" href="{{asset('client/css/plugins/nice-select.css')}}">
    <link rel="stylesheet" href="{{asset('client/css/plugins/ion.rangeSlider.min.css')}}">
    <link rel="stylesheet" href="{{asset('client/css/plugins/photoswipe.css')}}">
    <link rel="stylesheet" href="{{asset('client/css/plugins/photoswipe-default-skin.css')}}">
    <link rel="stylesheet" href="{{asset('client/css/plugins/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('client/css/plugins/slick.css')}}"> -->

    <!-- Main Style CSS -->
    <!-- <link rel="stylesheet" href="{{asset('client/css/style.css')}}"> -->

    <!-- Use the minified version files listed below for better performance and remove the files listed above -->
    <link rel="stylesheet" href="{{asset('client/css/vendor/vendor.min.css')}}">
    <link rel="stylesheet" href="{{asset('client/css/plugins/plugins.min.css')}}">
    <link rel="stylesheet" href="{{asset('client/css/style.min.css')}}">
    <link rel="stylesheet" href="{{asset('sweetarlet2/node_modules/sweetalert2/dist/sweetalert2.css')}}">
    <link rel="stylesheet" href="{{asset('client/css/grid_custom.css')}}">
    <link rel="stylesheet" href="{{asset('client/css/responsive.css')}}">

</head>

<body>

    @include('pages.client.layouts.header')

    <div class="offcanvas-overlay"></div>

    @yield('content')

    @include('pages.client.layouts.footer')

    <!-- JS
============================================ -->

    <!-- Vendors JS -->
    <!-- <script src="{{asset('client/js/vendor/modernizr-3.6.0.min.js')}}"></script>
<script src="{{asset('client/js/vendor/jquery-3.4.1.min.js')}}"></script>
<script src="{{asset('client/js/vendor/jquery-migrate-3.1.0.min.js')}}"></script>
<script src="{{asset('client/js/vendor/bootstrap.bundle.min.js')}}"></script> -->

    <!-- Plugins JS -->
    <!-- <script src="{{asset('client/js/plugins/select2.min.js')}}"></script>
<script src="{{asset('client/js/plugins/jquery.nice-select.min.js')}}"></script>
<script src="{{asset('client/js/plugins/perfect-scrollbar.min.js')}}"></script>
<script src="{{asset('client/js/plugins/swiper.min.js')}}"></script>
<script src="{{asset('client/js/plugins/slick.min.js')}}"></script>
<script src="{{asset('client/js/plugins/mo.min.js')}}"></script>
<script src="{{asset('client/js/plugins/jquery.ajaxchimp.min.js')}}"></script>
<script src="{{asset('client/js/plugins/jquery.countdown.min.js')}}"></script>
<script src="{{asset('client/js/plugins/imagesloaded.pkgd.min.js')}}"></script>
<script src="{{asset('client/js/plugins/isotope.pkgd.min.js')}}"></script>
<script src="{{asset('client/js/plugins/jquery.matchHeight-min.js')}}"></script>
<script src="{{asset('client/js/plugins/ion.rangeSlider.min.js')}}"></script>
<script src="{{asset('client/js/plugins/photoswipe.min.js')}}"></script>
<script src="{{asset('client/js/plugins/photoswipe-ui-default.min.js')}}"></script>
<script src="{{asset('client/js/plugins/jquery.zoom.min.js')}}"></script>
<script src="{{asset('client/js/plugins/ResizeSensor.js')}}"></script>
<script src="{{asset('client/js/plugins/jquery.sticky-sidebar.min.js')}}"></script>
<script src="{{asset('client/js/plugins/product360.js')}}"></script>
<script src="{{asset('client/js/plugins/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('client/js/plugins/jquery.scrollUp.min.js')}}"></script>
<script src="{{asset('client/js/plugins/scrollax.min.js')}}"></script> -->

    <!-- <script src="{{asset('client/js/plugins/jquery.instagramFeed.min.js')}}"></script> -->
    <!-- Use the minified version files listed below for better performance and remove the files listed above -->
    <script src="{{asset('client/js/vendor/vendor.min.js')}}"></script>
    <script src="{{asset('client/js/plugins/plugins.min.js')}}"></script>
    <!-- <script src="{{asset('client/js/bootstrap3-typeahead.min.js_4.0.2/cdnjs/bootstrap3-typeahead.min.js')}}"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.bundle.min.js"></script>
  
    <script type="text/javascript">
        $(document).ready(function($) {
            var engine1 = new Bloodhound({
                remote: {
                    url: '/tim-kiem/name?value=%QUERY%',
                    wildcard: '%QUERY%'
                },
                datumTokenizer: Bloodhound.tokenizers.whitespace('value'),
                queryTokenizer: Bloodhound.tokenizers.whitespace
            });

            $(".search-input-layout").typeahead({
                hint: true,
                highlight: true,
                minLength: 1
            }, [{
                    source: engine1.ttAdapter(),
                    name: 'product_name',
                    display: function(data) {
                        return data.product_name;
                    },
                    templates: {
                        empty: [
                            '<div class="header-title">Tên Sản Phẩm</div><div class="list-group search-results-dropdown"><div class="list-group-item">Không tìm thấy sản phẩm nào</div></div>'
                        ],
                        header: [
                            '<div class="header-title">Tên Sản Phẩm</div><div class="list-group search-results-dropdown"></div>'
                        ],
                        suggestion: function(data) {
                            
                            return '<a href="/San-Pham/'+ data.product_name.normalize('NFD').replace(/[\u0300-\u036f]/g, '').replace(/[^\w\-]+/g, '-') + '-' + data.product_id + '" class="list-group-item">' + ` <div class="row" style="padding:2px 0px;"><div class="col-md-1" style="padding-right:8px;"><img src="/./image/product/${data.product_img}"/ height="100%" width="200px;"></div><div class="col-md-10 pl-0"><span style="font-size: 1.4rem;">${data.product_name}</span></div></div>` + '</a>';
                        }
                    }
                }
            ]);
        });
    </script>
    <!-- Main Activation JS -->
    <script src="{{asset('client/js/main.js')}}"></script>
    <script>
        function AddCart(id) {
            $.ajax({
                url: '/./item-cart/' + id,
                type: "GET",
            }).done(function(response) {
                Render(response);
                alertify.success('Đã Thêm Vào Giỏ Hàng');
            });
        }
        $("#change-items").on("click", ".content i", function() {

            $.ajax({
                url: '../delete-item-cart/' + $(this).data("id"),
                type: "GET",
            }).done(function(response) {
                Render(response);
                alertify.error('Đã Xóa Sản Phẩm Thành Công');
            });
        });

        function Render(response) {
            $("#change-items").empty();
            $("#change-items").html(response);
            $("#total-qty-show").empty();
            $("#total-qty-show").text($("#total-qty").val());
        }

        $("#change-item").on("click", ".content i", function() {

            $.ajax({
                url: 'delete-item-favorite/' + $(this).data("id"),
                type: "GET",
            }).done(function(response) {
                Render1(response);
                alertify.error('Đã Xóa Sản Phẩm Thành Công');
            });
        });

        function Render1(response) {
            $("#change-item").empty();
            $("#change-item").html(response);
            $("#total-qty-favorite").text($("#total-qty").val());
        }
    </script>


    <!-- JavaScript -->
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

    <!-- CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
    <!-- Default theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css" />
    <!-- Semantic UI theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css" />
    <!-- Bootstrap theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css" />


    <script src="{{asset('sweetarlet2/node_modules/sweetalert2/dist/sweetalert2.js')}}"></script>



    @yield('page-js')
</body>


<!-- Mirrored from htmldemo.hasthemes.com/learts/learts/{{route('index')}} by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 04 Mar 2021 04:14:01 GMT -->

</html>