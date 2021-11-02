@extends('layout_client')
@section('content')
@section('title','Chi Tiết Sản Phẩm')



<!-- Page Title/Header Start -->
<div class="page-title-section section" data-bg-image="{{ URL::to('/') }}/client/images/bg/page-title-1.jpg">
    <div class="container">
        <div class="row">
            <div class="col">

                <div class="page-title">
                    <h1 class="title">Shop</h1>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('index')}}">Trang Chủ</a></li>
                        <li class="breadcrumb-item"><a href="{{URL::to('/product')}}">Sản Phẩm</a></li>
                        <li class="breadcrumb-item active">{{$product_detail->product_name}}</li>
                    </ul>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- Page Title/Header End -->

<!-- Single Products Section Start -->
<div class="section section-padding border-bottom">
    <div class="container">
        <div class="row learts-mb-n40">

            <!-- Product Images Start -->
            <div class="col-lg-6 col-12 learts-mb-40">
                <div class="product-images">
                    <button class="product-gallery-popup hintT-left" data-hint="Click to enlarge" data-images='[
                            {"src": "{{ url::to("/")}}/image/product/{{$product_detail->product_img}}", "w": 700, "h": 1100},
                            {"src": "client/images/product/single/1/product-zoom-2.jpg", "w": 700, "h": 1100},
                            {"src": "client/images/product/single/1/product-zoom-3.jpg", "w": 700, "h": 1100},
                            {"src": "client/images/product/single/1/product-zoom-4.jpg", "w": 700, "h": 1100}
                        ]'><i class="far fa-expand"></i></button>
                    <a href="https://www.youtube.com/watch?v=M829YSPnjUw" class="product-video-popup video-popup hintT-left" data-hint="Click to see video"><i class="fal fa-play"></i></a>
                    <div class="product-gallery-slider">
                        <div class="product-zoom">
                            <img src="{{ URL::to('/') }}/image/product/{{ $product_detail->product_img }}" alt="">
                        </div>
                        @if ($product_detail->product_img_hover !=null)
                        <div class="product-zoom">
                            <img src="{{ URL::to('/') }}/image/product/hover/{{ $product_detail->product_img_hover }}" alt="">
                        </div>
                        @endif

                    </div>
                    <div class="product-thumb-slider">
                        @if ($product_detail->product_img_hover !=null)
                        <div class="item">
                            <img src="{{ URL::to('/') }}/image/product/{{ $product_detail->product_img }}" alt="">
                        </div>
                        <div class="item">
                            <img src="{{ URL::to('/') }}/image/product/hover/{{ $product_detail->product_img_hover }}" alt="">
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            <!-- Product Images End -->

            <!-- Product Summery Start -->
            <div class="col-lg-6 col-12 learts-mb-40">

                <div class="product-summery">
                    <div class="product-nav">
                        <a href="{{route('San-Pham',[Str::slug($product_detail->product_name, '-'),$product_detail->product_id-1])}}"><i class="fal fa-long-arrow-left"></i></a>
                        <a href="{{route('San-Pham',[Str::slug($product_detail->product_name, '-'),$product_detail->product_id+1])}}"><i class="fal fa-long-arrow-right"></i></a>
                    </div>
                    <div class="product-ratings">
                        <div class="ratings">
                            @switch(round($avg_stars,0))
                            @case(1)
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            @break
                            @case(2)
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            @break
                            @case(3)
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            @break
                            @case('4')
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                            @break
                            @case(5)
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            @break
                            @endswitch
                        </div>
                        <a href="#tab-reviews" class="review-link">( {{count($comment)}}</span> lượt đánh giá sản phẩm )</a>
                    </div>
                    <h3 class="product-title">{{$product_detail->product_name}}</h3>
                    <div class="product-price">{{number_format($product_detail->product_price).' '.'VND'}}</div>
                    <div class="product-description">
                        <p><b>Date: </b><i>{{date('d-m-Y', strtotime($product_detail->updated_at))}}</i></p>
                    </div>
                    <div class="product-description">
                        @if($product_detail->product_quantity == 0)
                        <p><b>Trạng Thái: </b> Đã Hết Hàng</p>
                        @endif

                        @if($product_detail->product_quantity > 0 && $product_detail->product_quantity <= 5) <p><b>Trạng Thái: </b> Sắp Hết Hàng</p>
                            @endif

                            @if($product_detail->product_quantity > 5)
                            <p><b>Trạng Thái: </b> Còn Hàng</p>
                            @endif

                    </div>
                    <div class="product-brands">
                        <span class="title">Nhà Cung Cấp</span>
                        <div class="brands">
                            <a href="{{route('Nha-Cung-Cap',[Str::slug($product_detail->port_name, '-'),$product_detail->port_id])}}"><img src="{{URL::to('/') }}/image/portfolio/avatar/{{$product_detail->port_avatar}}" alt=""></a>
                        </div>
                    </div>
                    <form action="{{URL('/AddCartDT/'.$product_detail->product_id)}}" method="get" enctype="multipart/form-data">
                        @csrf
                        <div class="product-variations">
                            <table>
                                <tbody>
                                    <tr>
                                        <td class="label"><span>Số Lượng</span></td>
                                        <td class="value">
                                            <div class="product-quantity">
                                                <span class="qty-btn minus"><i class="ti-minus"></i></span>
                                                <input type="text" class="input-qty" id="qty" name="qty" value="1">
                                                <span class="qty-btn plus"><i class="ti-plus"></i></span>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="product-buttons">
                            <button type="button" onclick="AddCartDT({{$product_detail->product_id}})" class="btn btn-dark btn-hover-primary"><i class="fal fa-shopping-cart"></i> Thêm vào giỏ hàng</button>
                            </div>
                    </form>
                    <br>
                    <div class="product-meta">
                        <table>
                            <tbody>
                                <tr>
                                    <td class="label"><span>Số Series</span></td>
                                    <td class="value">0{{$product_detail->product_id}}</td>
                                </tr>
                                <tr>
                                    <td class="label"><span>Danh Mục</span></td>
                                    <td class="value">
                                        <ul class="product-category">
                                            <li><a href="{{route('Danh-Muc',[Str::slug($product_detail->cate_name,'-'),$product_detail->cate_id])}}">{{$product_detail->cate_name}}</a></li>
                                        </ul>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="label"><span>Từ Khóa</span></td>
                                    <td class="value">
                                        <ul class="product-tags">
                                            <li><a href="javascript:">{{$product_detail->product_keyword}}</a></li>
                                        </ul>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="label"><span>Chia Sẻ</span></td>
                                    <td class="va">
                                        <div class="product-share">
                                            <a href="javascript:"><i class="fab fa-facebook-f"></i></a>
                                            <a href="javascript:"><i class="fab fa-twitter"></i></a>
                                            <a href="javascript:"><i class="fab fa-google-plus-g"></i></a>
                                            <a href="javascript:"><i class="fab fa-pinterest"></i></a>
                                            <a href="javascript:"><i class="fal fa-envelope"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Product Summery End -->

        </div>
    </div>

</div>
<!-- Single Products Section End -->

<!-- Single Products Infomation Section Start -->
<div class="section section-padding border-bottom">
    <div class="container">

        <ul class="nav product-info-tab-list">
            <li><a class="active" data-toggle="tab" href="#tab-description">Chi Tiết Sản Phẩm</a></li>
            <li><a data-toggle="tab" href="#tab-pwb_tab">Nhà Cung Cấp</a></li>
            <li><a data-toggle="tab" href="#tab-reviews">Bình Luận ({{count($comment)}})</a></li>
        </ul>
        <div class="tab-content product-infor-tab-content">
            <div class="tab-pane fade show active" id="tab-description">
                <div class="row">
                    <div class="col-lg-10 col-12 mx-auto">
                        <p>{!!$product_detail->product_description!!}</p>
                        <br>
                        <p>Số Lượng Tồn Kho: {{$product_detail->product_quantity}} Sản Phẩm</p>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="tab-pwb_tab">
                <div class="row learts-mb-n30">
                    <div class="col-12 learts-mb-30">
                        <div class="row learts-mb-n10">
                            <div class="col-lg-2 col-md-3 col-12 learts-mb-10"><img src="{{URL::to('/')}}/image/portfolio/avatar/{{$product_detail->port_avatar}}" alt=""></div>
                            <div class="col learts-mb-10">
                                <p>{!!$product_detail->port_description!!}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="tab-reviews">
                @include('pages.client.Product-Detail.load-comment')
            </div>
        </div>

    </div>
</div>
<!-- Single Products Infomation Section End -->

<!-- Recommended Products Section Start -->
<div class="section section-padding">
    <div class="container">

        <!-- Section Title Start -->
        <div class="section-title2 text-center">
            <h2 class="title">Có Thể Bạn Cũng Thích</h2>
        </div>
        <!-- Section Title End -->

        <!-- Products Start -->
        <div class="product-carousel">
            @foreach($list as $item)
            <div class="col">
                <div class="product">
                    <div class="product-thumb">
                        <a href="{{route('San-Pham',[Str::slug($item->product_name, '-'),$item->product_id])}}" class="image">
                            <!-- <span class="product-badges">
                                    <span class="onsale">-13%</span>
                                </span> -->
                            @if($item->product_img_hover !=null)
                            <img src="{{ URL::to('/') }}/image/product/{{ $item->product_img }}" alt="Product Image">
                            <img class="image-hover " src="{{ URL::to('/') }}/image/product/hover/{{ $item->product_img_hover }}" alt="Product Image">
                            @else
                            <img src="{{ URL::to('/') }}/image/product/{{ $item->product_img }}" alt="Product Image">
                            @endif
                        </a>
                        <a href="javascript:" onclick="AddCart({{$item->product_id}})" class="add-to-wishlist hintT-left" data-hint="Add to cart"><i class="far fa-shopping-cart"></i></a>
                    </div>
                    <div class="product-info">
                        <h6 class="title"><a href="{{route('San-Pham',[Str::slug($item->product_name, '-'),$item->product_id])}}">{{$item->product_name}}</a></h6>
                        <span class="price">
                            <span class="new">{{number_format($item->product_price).' '.'VND'}}</span>
                        </span>
                        <div class="product-buttons">
                            <a href="#quickViewModal{{$item->product_id}}" data-toggle="modal" class="product-button hintT-top" data-hint="Quick View"><i class="fal fa-search"></i></a>
                            <a href="javascript:" onclick="AddCart({{$item->product_id}})" class="product-button hintT-top" data-hint="Add to Cart"><i class="fal fa-shopping-cart"></i></a>
                            <a href="javascript:" class="product-button hintT-top" data-hint="Compare"><i class="fal fa-random"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach


        </div>
        <!-- Products End -->

    </div>
</div>
<!-- Recommended Products Section End -->
@include('pages.client.Modal.modal-SanPham')
@endsection
@section('page-js')
<script type="text/javascript">
    function AddCartDT(id) {
        $.ajax({
            url: 'item-cart/' + id + '/' + $("#qty").val(),
            type: "GET",
        }).done(function(response) {
            Render(response);
            alertify.success('Đã Thêm Vào Giỏ Hàng');
        });
    }
    // function Render(response) {
    //     $("#change-items").empty();
    //     $("#change-items").html(response);
    //     $("#total-qty-show").text($("#qty").val());
    // }
</script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('.add-comment').submit(function(event) {
        event.preventDefault();
        var form = $(this);
        var url = form.attr('action');
        // console.log(form.serialize());
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
                    $('#tab-reviews').empty();
                    $('#tab-reviews').html(data.giao_dien);
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Thành Công',
                        text: data.message,
                        showConfirmButton: true,
                        timer: 2500
                    })
                    // window.setTimeout(function() {
                    //     window.location.reload();
                    // }, 2500);
                }
            }
        });
    });
</script>
<!-- Lấy giá trị từ phân trang -->
<script>
    $(document).ready(function() {
        $(document).on('click', '.pagination a', function(event) {
            event.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            phanTrangBaiViet(page);
        });
    });

    function phanTrangBaiViet(page) {
        $.ajax({
            url: '?page=' + page,
            success: function(data) {
                $('#phan-trang-binh-luan-san-pham').html(data);
            }
        });
    }
</script>
@endsection