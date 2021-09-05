@extends('layout_admin')
@section('title','Bình Luận')
@section('content')
<div class="col-sm-12">
  <div class="page-title">
    <div class="row">
      <div class="col-6">
        <h5>Danh Sách Bình Luận</h5>
      </div>
      <div class="col-6">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('admin.index')}}"> <i data-feather="home"></i></a></li>
          <li class="breadcrumb-item">Danh Mục</li>
          <li class="breadcrumb-item active">Danh Sách</li>
        </ol>
      </div>
    </div>
  </div>
  <div class="card">
    @if(count($cmt)!= 0)
    <div class="card-body">
      <div class="table-responsive">
        <table class="display" id="basic-1">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Họ Tên(Tài Khoản)</th>
              <th scope="col">ID tương tác</th>
              <th scope="col">Nội Dung</th>
              <th scope="col">Trạng Thái</th>
              <th scope="col">Tác Vụ</th>
            </tr>
          </thead>
          <tbody>
            @foreach($cmt as $item)
            <tr>
              <th scope="row">{{ $item->comment_id }}</th>
              <td>{{ $item->firstName}} {{ $item->lastName}} <strong>({{$item->username}})</strong></td>
              <td>
                @if($item->role == 1)
                Sản Phẩm Số {{$item->product_id}}
                @else
                Bài Viết Số {{$item->article_id}}
                @endif
              </td>
              <td class="flex-column align-items-center justify-content-around">
                @if($item->role == 1)
                <p>
                <div class="product-ratings">
                  <div class="ratings">
                    @switch($item->rate)
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
                    @case('4.0')
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
                </div>
                </p>
                <p>{!!$item->comment_description!!}</p>
                @else
                <p>{!!$item->comment_description!!}</p>
                @endif
              </td>
              <td>
                @if($item->status==1)
                <p><strong style="color:blue">Đang hiển thị</strong></p>
                @else
                <p><strong style="color:darkgoldenrod">Đang ẩn</strong></p>
                @endif
              </td>
              <td class="d-flex align-items-center justify-content-around">
                <form action="{{route('BinhLuan.show',$item->comment_id)}}" method="get">
                  <input type="hidden" name="_token" value="{{csrf_token()}}">
                  <input type="hidden" name="_method" value="put" />
                  <button class="btn btn-outline-light" type="submit"><i class="icofont icofont-paper" style="font-size:20px;color:green"></i></i></button>
                </form>
                @if ($item->status == 1)
                <form method="post" action="{{URL::to('/BinhLuan/disabled/'.$item->comment_id)}}" class="change_status_tri">
                  <input type="hidden" name="_token" value="{{csrf_token()}}">
                  <input type="hidden" name="_method" value="put" />
                  <button class="btn btn-outline-light" type="submit"><i class="icofont-ui-check" style="font-size:20px;color:cornflowerblue"></i></button>
                </form>
                @else
                <form method="post" action="{{URL::to('/BinhLuan/enabled/'.$item->comment_id)}}" class="change_status_tri">
                  <input type="hidden" name="_token" value="{{csrf_token()}}">
                  <input type="hidden" name="_method" value="put" />
                  <button class="btn btn-outline-light" type="submit"><i class="icofont icofont-ui-close" style="font-size:20px;color:red"></i></button>
                </form>
                @endif
              </td>
            </tr>
            @endforeach
          </tbody>
          <tfoot>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Họ Tên(Tài Khoản)</th>
              <th scope="col">ID tương tác</th>
              <th scope="col">Nội Dung</th>
              <th scope="col">Trạng Thái</th>
              <th scope="col">Tác Vụ</th>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>
  </div>
  @else
  <strong class="text-center">Danh Sách Trống</strong>
  @endif
</div>
</div>
@endsection
@section('page-js')
<script>
  function changeStatus(event) {
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
          Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Thành Công',
            text: data.message,
            showConfirmButton: true,
            timer: 2500
          })
          window.setTimeout(function() {
            window.location.reload();
          }, 2500);
        }
      }
    });

  }
  $(function() {
    $(document).on('click', '.change_status_tri', changeStatus);
  });
</script>
@endsection