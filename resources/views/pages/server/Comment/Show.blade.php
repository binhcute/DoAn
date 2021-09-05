@extends('layout_admin')
@section('title','Bình Luận')
@section('content')
<div class="col-sm-12">
    <div class="page-title">
        <div class="row">
            <div class="col-6">
                <a class="btn btn-primary" href="{{route('BinhLuan.index')}}"><i class="fa fa-angle-double-left"></i> Quay Lại</a>
                @if($comment->status == 1)
                <form method="post" action="{{URL::to('/BinhLuan/disabled/'.$comment->comment_id)}}">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <input type="hidden" name="_method" value="put" />
                    <button style="margin-left:10px" class="btn btn-secondary" type="submit" onclick="return confirm('Bạn muốn ẩn bình luận này đi ?')">
                        <i class="icofont-ui-close" style="font-size:15px;color:ghostwhite"></i> Ẩn bình luận</button>
                </form>
                @else
                <form method="post" action="{{URL::to('/BinhLuan/enabled/'.$comment->comment_id)}}">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <input type="hidden" name="_method" value="put" />
                    <button style="margin-left:10px" class="btn btn-success" type="submit"  onclick="return confirm('Bình luận đã bị ẩn, bạn muốn kích hoạt lại ?')">
                        <i class="icofont-ui-check" style="font-size:15px;color:aqua"></i> Kích hoạt bình luận</button>
                    @endif
            </div>
            <div class="col-6">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin.index')}}"> <i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item">Bình Luận</li>
                    <li class="breadcrumb-item active">Chi Tiết</li>
                </ol>
            </div>
        </div>
    </div>
    @if ($info = Session::get('info'))
  <div class="alert alert-primary alert-block">
    <strong>{{ $info }}</strong>
    <?php
    Session::put('info', null);
    ?>
  </div>
  @endif
    <div class="card">
        <div class="card-body">
            <div class="product-page-details">

                <h3>Chi Tiết Bình Luận Số {{$comment->comment_id}}</h3>
            </div>
            <ul class="product-color">
                <li class="bg-primary"></li>
                <li class="bg-secondary"></li>
                <li class="bg-success"></li>
                <li class="bg-info"></li>
                <li class="bg-warning"></li>
            </ul>

            <hr>
            <div>
                <table class="product-page-width">
                    <tbody>
                        <tr>
                        <tr>
                            <td> <b>Id Bình Luận &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
                            <td class="txt-success">{{$comment->comment_id}}</td>
                        </tr>
                        <tr>
                            <td> <b>Tên Tài Khoản &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
                            <td>{{$comment->username}}</td>
                        </tr>
                        <tr>
                            <td> <b>Họ và Tên &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
                            <td class="txt-success">{{$comment->firstName}} {{$comment->lastName}}</td>
                        </tr>

                        @if($comment->role == 1)
                        <tr>
                            <td> <b>ID Sản Phẩm &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
                            <td class="txt-success">{{$comment->product_id}}</td>
                        </tr>
                        <tr>
                            <td> <b>Tên Sản Phẩm &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
                            <td class="txt-success">{{$comment->product_name}}</td>
                        </tr>
                        <tr>
                            <td> <b>Đánh Giá &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
                            <td class="txt-success">{{$comment->rate}}</td>
                        </tr>
                        @else
                        <tr>
                            <td> <b>ID Bài Viết &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
                            <td class="txt-success">{{$comment->article_id}}</td>
                        </tr>
                        <tr>
                            <td> <b>Tên Bài Viết &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
                            <td class="txt-success">{{$comment->article_name}}</td>
                        </tr>
                        @endif
                        <tr>
                            <td> <b>Trạng Thái &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
                            @if($comment->status == 1)
                            <td class="txt-success">Hoạt Động</td>
                            @else
                            <td class="txt-success">Vô Hiệu</td>
                            @endif
                        </tr>
                    </tbody>
                </table>
            </div>
            <hr>
            <b>Nội dung chi tiết</b>
            <br>
            <p>{!! $comment->comment_description !!}</p>
        </div>
    </div>
</div>
@endsection