@extends('layout_admin')
@section('title','Hóa Đơn')
@section('content')
<div class="col-sm-12">
  <div class="page-title">
    <div class="row">
      <div class="col-6">
        <a class="btn btn-primary" href="{{route('HoaDon.index')}}"><i class="fa fa-angle-double-left"></i> Quay Lại</a>
      </div>
      <div class="col-6">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('admin.index')}}"> <i data-feather="home"></i></a></li>
          <li class="breadcrumb-item">Hóa Đơn</li>
          <li class="breadcrumb-item active">Chi Tiết</li>
        </ol>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-body">
      <div class="product-page-details">

        <h3>Chi Tiết Hóa Đơn Số {{$order_detail->order_id}}</h3>
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
        <div class="card-body">
          <div class="row">
            <div class="col-xl-6 col-sm-12">
              <table class="product-page-width">
                <tbody>
                  <tr>
                  <tr>
                    <td class="col-4"> <b>Id Hóa Đơn &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
                    <td class="txt-success col-8">{{$order_detail->order_id}}</td>
                  </tr>
                  <tr>
                    <td class="col-4"> <b>Người Mua &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
                    <td class="txt-success col-8" >{{$order_detail->firstName}}</td>
                  </tr>
                  <tr>
                    <td class="col-4"> <b>Tài Khoản &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
                    <td class="txt-success col-8">{{$order_detail->username}}</td>
                  </tr>
                  <tr>
                    <td class="col-4"> <b>Địa Chỉ &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
                    <td class="col-8">{{$order_detail->address}}</td>
                  </tr>
                  <tr>
                    <td class="col-4"> <b>Email &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
                    <td class="col-8">
                      {{$order_detail->email}}</td>
                  </tr>
                  <tr>
                    <td class="col-4"> <b>Số Điện Thoại &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
                    <td class="col-8">{{$order_detail->phone}}</td>
                  </tr>
                  <tr>
                    <td class="col-4"> <b>Ghi Chú &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
                    <td class="col-8">
                    {{$order_detail->note}}
                    </td>
                  </tr>
                  <tr>
                    <td class="col-4"> <b>Ngày Tạo &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
                    <td class="col-8">{{$order_detail->created_at}}</td>
                  </tr>
                  <tr>
                    <td class="col-4"> <b>Ngày Chỉnh Sửa &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
                    <td>{{$order_detail->updated_at}}</td>
                  </tr>
                  <tr>
                    <td class="col-4"> <b>Trạng Thái &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
                    <td class="col-8">
                      @switch($order_detail->status)
                      @case(0)
                      <strong style="color:#00c3da">Đang vận chuyển</strong>
                      @break
                      @case(1)
                      <strong style="color:greenyellow">Đang chờ xử lý</strong>
                      @break
                      @case(2)
                      <strong style="color:dodgerblue">Giao hàng thành công</strong>
                      @break
                      @case(3)
                      <strong style="color:orangered">Đơn hàng đã bị hủy</strong>
                      @break
                      @endswitch
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="col-xl-6 col-sm-12">
              <div class="checkout-details">
                <div class="order-box">
                  <div class="title-box">
                    <div class="checkbox-title">
                      <h4>Sản Phẩm </h4><span>Tổng Tiền</span>
                    </div>
                  </div>
                  <ul class="qty">
                    <?php $sum = 0 ?>
                    @foreach($order as $stt => $od)
                    <li>{{$stt+1}}.{{$od -> product_name}} × {{$od->quantity}} <span>{{number_format($od->amount).' '.'VND'}}</span></li>
                    <?php $sum += $od->amount ?>
                    @endforeach
                  </ul>
                  <ul class="sub-total">
                    <li>Tổng Cộng: <span class="count">{{number_format($sum).' '.'VND'}}</span></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>
@endsection