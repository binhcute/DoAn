@extends('layout_client')
@section('content')
@section('title','Local Brands')

    <!-- Page Title/Header Start -->
    <div class="page-title-section section" data-bg-image="{{asset('client/images/bg/page-title-1.jpg')}}">
        <div class="container">
            <div class="row">
                <div class="col">

                    <div class="page-title">
                        <h1 class="title">Nhà Cung Cấp</h1>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('index')}}">Trang Chủ</a></li>
                            <li class="breadcrumb-item active">Nhà Cung Cấp</li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- Page Title/Header End -->

    <!-- Portfolio Section Start -->
    <div class="section section-padding">
        <div class="container">
            <div class="row row-cols-xl-4 row-cols-lg-3 row-cols-sm-2 row-cols-1 learts-mb-n30">

                @foreach ($portfolio as $item)
                <div class="col learts-mb-30">
                    <div class="portfolio">
                        <div class="thumbnail"><img src="image/portfolio/{{$item->port_img}}" alt=""></div>
                        <div class="content text__center">
                            <div class="desc">
                                <p>Xuất Xứ: {{$item->port_origin}}</p>
                                <p>{!!$item->port_description!!}</p>
                            </div>
                        </div>
                    </div>
                            <h2 class="title name_port__1"><a href="{{route('Nha-Cung-Cap',[Str::slug($item->port_name,'-'), $item->port_id])}}">{{ $item->port_name}}</a></h2>
                </div>
                @endforeach



            </div>
        </div>

    </div>
    <!-- Portfolio Section End -->

    @endsection