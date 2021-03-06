@extends('layout_client')
@section('content')
@section('title','Bài Viết')

<!-- Portfolio Section Start -->
<div class="section section-padding">
    <div class="container">
        <div class="row learts-mb-n50">

            <div class="col-xl-9 col-lg-8 col-12 learts-mb-50">
                <div class="single-blog">
                    <div class="content">
                        <h2 class="title">{{$article->article_name}}</h2>
                        <ul class="meta">
                            <li><i class="fal fa-user"></i> By <a href="#">{{$article->firstName}} {{$article->lastName}}</a></li>
                            <li><i class="far fa-calendar"></i><a href="#">{{$article->created_at}}</a></li>
                            <li><i class="fal fa-comment"></i><a href="#">{{count($comment)}} Comments</a></li>
                            <li><i class="far fa-eye"></i> {{$article->view}} Lượt Xem</li>
                        </ul>

                        <div class="desc">
                            <h2>{!!$article->article_description!!}</h2>
                            <br>
                            <div class="image">
                                <a href="javascript:"><img src="{{ URL::to('/') }}/image/article/{{$article->article_img }}" alt="Blog Image"></a>
                            </div>
                            <p>{!!$article->article_detail!!}</p>
                        </div>
                    </div>
                    <div class="blog-footer row no-gutters justify-content-between align-items-center">
                        <div class="col-auto">
                            <ul class="tags">
                                <i class="icon fas fa-tags"></i>
                                <li><a href="#">{{$article->article_keyword}}</a></li>
                            </ul>
                        </div>
                        <div class="col-auto">
                            <div class="post-share">
                                Chia sẻ bài viết
                                <span class="toggle"><i class="fas fa-share-alt"></i></span>
                                <ul class="social-list">
                                    <li class="hintT-top" data-hint="Facebook"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    <li class="hintT-top" data-hint="Twitter"><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li class="hintT-top" data-hint="Pinterest"><a href="#"><i class="fab fa-pinterest-p"></i></a></li>
                                    <li class="hintT-top" data-hint="Google Plus"><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
                                    <li class="hintT-top" data-hint="Email"><a href="#"><i class="fal fa-envelope-open"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="blog-author">
                    <div class="thumbnail">
                        @if($article->avatar!=null)
                        <img src="{{URL::to('/') }}/image/account/{{$article->avatar }}" alt="">
                        @else
                        <img src="{{asset('client/images/comment/comment-1.jpg')}}" alt="">
                        @endif
                        <div class="social">
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-linkedin"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                    <div class="content">
                        <a href="#" class="name">{{$article->firstName}} {{$article->lastName}}</a>
                        <p>Hoa nở là hữu tình</p>
                    </div>
                </div>
                <div class="related-blog">
                    <div class="block-title pb-0 border-bottom-0">
                        <h2 class="title">Có Thể Bạn Nên Xem</h2>
                    </div>
                    <div class="row learts-mb-n40">
                        @foreach($related as $relate)
                        <div class="col-md-6 col-12 learts-mb-40">
                            <div class="blog">
                                <div class="image">
                                    <a href="{{route('Bai-Viet',[Str::slug($relate->article_name, '-'),$relate->article_id])}}"><img src="{{URL::to('/') }}/image/article/{{$relate->article_img}}" alt="Blog Image"></a>
                                </div>
                                <div class="content">
                                    <ul class="meta">
                                        <li><i class="far fa-calendar"></i><a href="#">{{$relate->updated_at}}</a></li>
                                        <li><i class="far fa-eye"></i> {{$relate->view}} views</li>
                                    </ul>
                                    <h5 class="title mb-0"><a href="{{route('Bai-Viet',[Str::slug($relate->article_name, '-'),$relate->article_id])}}">{{$relate->article_name}}</a></h5>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="Comments-wrapper">
                    <div class="block-title pb-0 border-bottom-0" id="noti-validate">
                        <h2 class="title">Hãy để lại suy nghĩ của bạn</h2>
                    </div>
                    @if(Auth::check())
                    <div class="comment-form">
                        <form action="{{route('BinhLuan.store')}}" method="post" enctype="multipart/form-data" class="add-comment">
                            <meta name="csrf-token" content="{{ csrf_token() }}">
                            <div class="row learts-mb-n20">
                                <input type="hidden" name="article_id" value="{{ $article->article_id }}">
                                <input type="hidden" name="role" value="0">
                                <input type="hidden" name="rate" value="0">
                                <div class="col-12 learts-mb-20">
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" name="comment_description" placeholder="Để lại nhận xét của bạn ở đây..."></textarea>
                                </div>
                                <div class="col-12 text-center learts-mb-20 learts-mt-20">
                                    <button type="submit" class="btn btn-dark btn-outline-hover-primary">Đăng</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    @else
                    <div class="text-center">
                        <p class="note">Hãy Đăng Nhập Để Thêm Bình Luận</p>
                        <a href="{{route('login')}}" type="button" class="btn btn-info btn-hover-primary">Đăng Nhập Ngay</a>

                    </div>
                    @endif
                    <div class="block-title pb-0 border-bottom-0">
                        <h2 class="title">Bình Luận <span class="text-muted">({{count($comment)}})</span></h2>
                    </div>
                    <ul class="comment-list" id="tab-comment">
                        @include('pages.client.Article-Detail.comment-article')
                    </ul>


                </div>
            </div>

            <div class="col-xl-3 col-lg-4 col-12 learts-mb-10">

                <!-- Blog Post Widget Start -->
                <div class="single-widget learts-mb-40">
                    <h3 class="widget-title product-filter-widget-title">Bài đăng gần đây</h3>
                    <ul class="widget-blogs">
                        @foreach($recent as $rc)
                        <li class="widget-blog">
                            <div class="thumbnail">
                                <a href="{{route('Bai-Viet',[Str::slug($rc->article_name, '-'),$rc->article_id])}}"><img src="{{URL::to('/') }}/image/article/{{$rc->article_img}}" alt="Widget Blog Post"></a>
                            </div>
                            <div class="content">
                                <h6 class="title"><a href="{{route('Bai-Viet',[Str::slug($rc->article_name, '-'),$rc->article_id])}}">{{$rc->article_name}}</a></h6>
                                <span class="date">{{$rc->updated_at}}</span>
                            </div>
                        </li>
                        @endforeach
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

            </div>

        </div>
    </div>

</div>
<!-- Portfolio Section End -->

@endsection
@section('page-js')
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
                    $('#tab-comment').empty();
                    $('#tab-comment').html(data.giao_dien);
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Thành Công',
                        text: data.message,
                        showConfirmButton: true,
                        timer: 2500
                    })
                }
            },
            error: function(response) {
                $.each(response.responseJSON.errors, function(field_name, error) {
                        $('#noti-validate').after('<div class="alert alert-danger noti-alert-danger" role="alert" style="font-size: 1.5rem;">' + error + '</div>');
                    }),
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: 'Thất bại',
                        text: 'Vui Lòng Kiểm Tra Lại Thông Tin',
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
                $('#tab-comment').html(data);
            }
        });
    }
</script>
@endsection