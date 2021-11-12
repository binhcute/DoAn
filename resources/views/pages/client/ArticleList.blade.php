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
                        <li class="breadcrumb-item"><a href="{{route('index')}}">Trang Chủ</a></li>
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
        @if(count($article) != 0)
        <div class="row learts-mb-n50">
            <div class="col-xl-9 col-lg-8 col-12 learts-mb-50">
                <div class="row no-gutters learts-mb-n40" id="phan-trang-bai-viet">
                    @include('pages.client.Article.dsBaiViet')
                </div>

            </div>

            <div class="col-xl-3 col-lg-4 col-12 learts-mb-10">
 
                <!-- Blog Post Widget Start -->
                <div class="single-widget learts-mb-40">

                    <h3 class="widget-title product-filter-widget-title">Bài Viết Xem Nhiều</h3>
                    <ul class="widget-blogs">
                        @foreach($view_hot as $hot)
                        <li class="widget-blog">
                            <div class="thumbnail">
                                <a href="{{route('Bai-Viet',[Str::slug($hot->article_name, '-'),$hot->article_id])}}"><img src="{{URL::to('/')}}/image/article/{{$hot->article_img}}" alt="Widget Blog Post"></a>
                            </div>
                            <div class="content">
                                <h6 class="title"><a href="{{route('Bai-Viet',[Str::slug($hot->article_name, '-'),$hot->article_id])}}">{{$hot->article_name}}</a></h6>
                                <span class="date"><i class="far fa-eye"></i> {{$hot->view}} Lượt xem</span>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <!-- Blog Post Widget End -->





            </div>

        </div>
        @else
        <div class="text-center">
            <img src="{{URL::to('/')}}/image/example/list-empty.png" alt="" width="50%">
        </div>
        @endif
    </div>

</div>
<!-- Portfolio Section End -->

@endsection
@section('page-js')
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
                $('#phan-trang-bai-viet').html(data);
            }
        });
    }
</script>
<script type="text/javascript">
    $(document).ready(function($) {
        var engine1 = new Bloodhound({
            remote: {
                url: '/tim-kiem-bai-viet/name?value=%QUERY%',
                wildcard: '%QUERY%'
            },
            datumTokenizer: Bloodhound.tokenizers.whitespace('value'),
            queryTokenizer: Bloodhound.tokenizers.whitespace
        });

        $(".search-input-article").typeahead({
            hint: true,
            highlight: true,
            minLength: 1
        }, [{
            source: engine1.ttAdapter(),
            name: 'article_name',
            display: function(data) {
                return data.article_name;
            },
            templates: {
                empty: [
                    '<div class="header-title">Tên Bài Viết</div><div class="list-group search-results-dropdown"><div class="list-group-item">Không tìm thấy Bài Viết nào</div></div>'
                ],
                header: [
                    '<div class="header-title">Tên Bài Viết</div><div class="list-group search-results-dropdown"></div>'
                ],
                suggestion: function(data) {

                    return '<a href="/Bai-Viet/' + data.article_name.normalize('NFD').replace(/[\u0300-\u036f]/g, '').replace(/[^\w\-]+/g, '-') + '-' + data.article_id + '" class="list-group-item">' + ` <div class="row" style="padding:2px 0px;"><div class="col-md-1" style="padding-right:8px;"><img src="/./image/article/${data.article_img}"/ height="100%" width="200px;"></div><div class="col-md-10 pl-0"><span style="font-size: 1.4rem;">${data.article_name}</span></div></div>` + '</a>';
                }
            }
        }]);
    });
</script>
@endsection