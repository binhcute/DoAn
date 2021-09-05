@extends('layout_client')
@section('content')
@section('title','Bài Viết')

<!-- Page Title/Header Start -->
<div class="page-title-section section" data-bg-image="{{asset('client/images/bg/page-title-1.jpg')}}">
    <div class="container">
        <div class="row">
            <div class="col">

                <div class="page-title">
                    <h1 class="title">Bài Viết</h1>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Home</a></li>
                        <li class="breadcrumb-item active">Bài Viết</li>
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
        <div class="row learts-mb-n50">

            <div class="col-xl-9 col-lg-8 col-12 learts-mb-50">
                <div class="row no-gutters learts-mb-n40">
                    @foreach ($article as $item)
                    <div class="col-12 border-bottom learts-pb-40 learts-mb-40">
                        <div class="blog">
                            <div class="row learts-mb-n30">
                                <div class="col-md-5 col-12 learts-mb-30">
                                    <div class="image mb-0">
                                        <a href="{{route('Bai-Viet',[Str::slug($item->article_name, '-'),$item->article_id])}}"><img src="{{ URL::to('/') }}/server/assets/image/article/{{$item->article_img}}" alt="Blog Image"></a>
                                    </div>
                                </div>
                                <div class="col-md-7 col-12 align-self-center learts-mb-30">
                                    <div class="content">
                                        <ul class="meta">
                                            <li><i class="far fa-calendar"></i><a href="#">{{$item->created_at}}</a></li>
                                            <li><i class="far fa-eye"></i> {{$item->view}} views</li>
                                        </ul>
                                        <h5 class="title"><a href="{{route('Bai-Viet',[Str::slug($item->article_name, '-'),$item->article_id])}}">{{$item->article_name}}</a></h5>
                                        <div class="desc">
                                            <p>{!!$item->article_description!!}</p>
                                        </div>
                                        <a href="{{route('Bai-Viet',[Str::slug($item->article_name, '-'),$item->article_id])}}" class="link">Read More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                    <div>{{ $article->links()}}</div>
                </div>

            </div>

            <div class="col-xl-3 col-lg-4 col-12 learts-mb-10">
                <!-- Search Start -->
                <div class="single-widget learts-mb-40">
                    <div class="widget-search">
                        <form class="typeahead" role="search">
                            <input type="search" name="q" class="form-control search-input" placeholder="Hãy nhập từ bất kỳ..." autocomplete="off">
                        </form>
                    </div>
                </div>
                <!-- Search End -->

                <!-- Blog Post Widget Start -->
                <div class="single-widget learts-mb-40">

                    <h3 class="widget-title product-filter-widget-title">Bài Viết Xem Nhiều</h3>
                    <ul class="widget-blogs">
                        <li class="widget-blog">
                            <div class="thumbnail">
                                <a href="blog-details-right-sidebar.html"><img src="{{asset('client/images/blog/widget/widget-1.jpg')}}" alt="Widget Blog Post"></a>
                            </div>
                            <div class="content">
                                <h6 class="title"><a href="blog-details-right-sidebar.html">Start a Kickass Online Blog</a></h6>
                                <span class="date">January 22, 2020</span>
                            </div>
                        </li>
                    </ul>
                </div>
                <!-- Blog Post Widget End -->

                <!-- Categories Start -->
                <div class="single-widget learts-mb-40">
                    <div class="widget-banner">
                        <img src="{{asset('client/images/banner/widget-banner.jpg')}}" alt="">
                    </div>
                </div>
                <!-- Categories End -->

                <!-- Categories Start -->
                <div class="single-widget learts-mb-40">
                    <h3 class="widget-title product-filter-widget-title">Danh Mục Sản Phẩm</h3>
                    <ul class="widget-list">
                        @foreach ($product_cate as $item)
                        <li><a href="{{URL::to('/product_categories',$item->cate_id)}}">{{ $item->cate_name}}</a></li>
                        @endforeach
                    </ul>
                </div>
                <!-- Categories End -->

            </div>

        </div>
    </div>

</div>
<!-- Portfolio Section End -->

@endsection