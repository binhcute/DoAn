@extends('layout_client')
@section('content')
@section('title','Danh Mục')

    <!-- Page Title/Header Start -->
    <div class="page-title-section section" data-bg-image="{{asset('client/images/bg/page-title-1.jpg')}}">
        <div class="container">
            <div class="row">
                <div class="col">

                    <div class="page-title">
                        <h1 class="title">Danh Mục Sản Phẩm</h1>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('index')}}">Trang Chủ</a></li>
                            <li class="breadcrumb-item active">Danh Mục</li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- Page Title/Header End -->

    <!-- categories Section Start -->
    <div class="section section-padding">
        <div class="container">
            <div class="row row-cols-xl-4 row-cols-lg-3 row-cols-sm-2 row-cols-1 learts-mb-n30">

                @foreach ($categories as $item)
                <div class="col learts-mb-30">
                    <div class="portfolio">
                        <div class="thumbnail"><img src="image/category/{{$item->cate_img}}" alt=""></div>
                        <div class="content">
                            <div class="desc">
                                <p>{!!$item->cate_description!!}</p>
                            </div>
                        </div>
                    </div>
                    <h2 class="title name_port__1"><a href="{{route('Danh-Muc',[Str::slug($item->cate_name, '-'),$item->cate_id])}}">{{ $item->cate_name }}</a></h2>
                </div>
                @endforeach



            </div>
        </div>

    </div>
    <!-- categories Section End -->

    @endsection