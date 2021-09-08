<div class="card">
@if(count($order)!=0)
<div class="card-body">
    <div class="table-responsive">
        <table class="display" id="basic-1">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Người Mua</th>
                    <th scope="col">Ngày Mua</th>
                    <th scope="col">Trạng Thái</th>
                    <th scope="col">Tác Vụ</th>
                </tr>
            </thead>
            <tbody>
                @foreach($order as $item)
                <tr>
                    <th scope="row">{{ $item->order_id }}</th>
                    <td>{{ $item->username}}</td>
                    <td>{{ $item->updated_at }}</td>
                    <td>
                        @switch($item->status)
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
                    <td class="d-flex align-items-center justify-content-around">
                        <form action="{{route('HoaDon.show',$item->order_id)}}" method="get">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <input type="hidden" name="_method" value="put" />
                            <button class="btn btn-outline-light" type="submit"><i class="icofont icofont-paper" style="font-size:20px;color:green"></i></i></button>
                        </form>
                        @if($item->status==0)
                        <form method="post" action="{{URL::to('/HoaDon/xuly/'.$item->order_id)}}" class="change-status-one">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <input type="hidden" name="_method" value="put" />
                            <button class="btn btn-outline-light" type="submit"><i class="icofont-clock-time" style="font-size:20px;color:violet"></i></button>
                        </form>
                        <form method="post" action="{{URL::to('/HoaDon/huy/'.$item->order_id)}}" class="change-status-three">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <input type="hidden" name="_method" value="put" />
                            <button class="btn btn-outline-light" type="submit"><i class="icofont icofont-ui-close" style="font-size:20px;color:red"></i></button>
                        </form>
                        <form method="post" action="{{URL::to('/HoaDon/thanhcong/'.$item->order_id)}}" class="change-status-two">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <input type="hidden" name="_method" value="put" />
                            <button class="btn btn-outline-light" type="submit"><i class="icofont icofont-ui-check" style="font-size:20px;color:blue"></i></button>
                        </form>
                        @endif
                        @if($item->status==1)
                        <form method="post" action="{{URL::to('/HoaDon/danggiao/'.$item->order_id)}}" class="change-status-zero">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <input type="hidden" name="_method" value="put" />
                            <button class="btn btn-outline-light" type="submit"><i class="icofont-motor-biker" style="font-size:20px;color:#00c3da"></i></button>
                        </form>
                        <form method="post" action="{{URL::to('/HoaDon/huy/'.$item->order_id)}}" class="change-status-three">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <input type="hidden" name="_method" value="put" />
                            <button class="btn btn-outline-light" type="submit"><i class="icofont icofont-ui-close" style="font-size:20px;color:red"></i></button>
                        </form>
                        <form method="post" action="{{URL::to('/HoaDon/thanhcong/'.$item->order_id)}}" class="change-status-two">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <input type="hidden" name="_method" value="put" />
                            <button class="btn btn-outline-light" type="submit"><i class="icofont icofont-ui-check" style="font-size:20px;color:blue"></i></button>
                        </form>
                        @endif
                        @if($item->status==2)
                        <form method="post" action="{{URL::to('/HoaDon/danggiao/'.$item->order_id)}}" class="change-status-zero">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <input type="hidden" name="_method" value="put" />
                            <button class="btn btn-outline-light" type="submit">
                                <i class="icofont-motor-biker" style="font-size:20px;color:#00c3da"></i>
                            </button>
                        </form>
                        <form method="post" action="{{URL::to('/HoaDon/huy/'.$item->order_id)}}" class="change-status-three">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <input type="hidden" name="_method" value="put" />
                            <button class="btn btn-outline-light" type="submit">
                                <i class="icofont icofont-ui-close" style="font-size:20px;color:red"></i>
                            </button>
                        </form>
                        <form method="post" action="{{URL::to('/HoaDon/xuly/'.$item->order_id)}}" class="change-status-one">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <input type="hidden" name="_method" value="put" />
                            <button class="btn btn-outline-light" type="submit">
                                <i class="icofont-clock-time" style="font-size:20px;color:violet"></i>
                            </button>
                        </form>
                        @endif
                        @if($item->status==3)
                        <form method="post" action="{{URL::to('/HoaDon/danggiao/'.$item->order_id)}}" class="change-status-zero">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <input type="hidden" name="_method" value="put" />
                            <button class="btn btn-outline-light" type="submit">
                                <i class="icofont-motor-biker" style="font-size:20px;color:#00c3da"></i>
                            </button>
                        </form>
                        <form method="post" action="{{URL::to('/HoaDon/xuly/'.$item->order_id)}}" class="change-status-one">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <input type="hidden" name="_method" value="put" />
                            <button class="btn btn-outline-light" type="submit">
                                <i class="icofont-clock-time" style="font-size:20px;color:violet"></i>
                            </button>
                        </form>
                        <form method="post" action="{{URL::to('/HoaDon/thanhcong/'.$item->order_id)}}" class="change-status-two">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <input type="hidden" name="_method" value="put" />
                            <button class="btn btn-outline-light" type="submit">
                                <i class="icofont icofont-ui-check" style="font-size:20px;color:blue"></i>
                            </button>
                        </form>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tên</th>
                    <th scope="col">Hình Ảnh</th>
                    <th scope="col">Trạng Thái</th>
                    <th scope="col">Tác Vụ</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>

<!-- Container-fluid starts-->
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">


            <div class="card">
                <div class="card-header">
                    <h5>Chờ Xác Nhận</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        @foreach($order_detail as $dt)
                        @if($dt->status == 1)
                        <div class="col-xxl-4 col-md-6">
                            <div class="prooduct-details-box">
                                <div class="media"><img class="align-self-center img-fluid img-60" src="{{URL::to('/')}}/server/assets/image/product/{{$dt->product_img}}" alt="#">
                                    <div class="media-body ms-3">
                                        <div class="product-name">
                                            <h6><a href="#">{{$dt->product_name}}</a></h6>
                                        </div>
                                        <div class="rating"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></div>
                                        <div class="price d-flex">
                                            <div class="text-muted me-2">Price</div>: {{number_format($dt->price)}}
                                        </div>
                                        <div class="avaiabilty">
                                            <div class="text-success">Số Lượng: {{$dt->quantity}}</div>
                                        </div><a class="btn btn-primary btn-xs" href="#">Processing</a><i class="close" data-feather="x"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h5>Đang Giao</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        @foreach($order_detail as $dt)
                        @if($dt->status == 0)
                        <div class="col-xxl-4 col-md-6">
                            <div class="prooduct-details-box">
                                <div class="media"><img class="align-self-center img-fluid img-60" src="{{URL::to('/')}}/server/assets/image/product/{{$dt->product_img}}" alt="#">
                                    <div class="media-body ms-3">
                                        <div class="product-name">
                                            <h6><a href="#">{{$dt->product_name}}</a></h6>
                                        </div>
                                        <div class="rating"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></div>
                                        <div class="price d-flex">
                                            <div class="text-muted me-2">Price</div>: {{number_format($dt->price)}}
                                        </div>
                                        <div class="avaiabilty">
                                            <div class="text-success">Số Lượng: {{$dt->quantity}}</div>
                                        </div><a class="btn btn-success btn-xs" href="#">Shipped</a><i class="close" data-feather="x"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        @endforeach
                    </div>
                </div>
            </div>


            <div class="card">
                <div class="card-header">
                    <h5>Giao Thành Công</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        @foreach($order_detail as $dt)
                        @if($dt->status == 2)
                        <div class="col-xxl-4 col-md-6">
                            <div class="prooduct-details-box">
                                <div class="media"><img class="align-self-center img-fluid img-60" src="{{URL::to('/')}}/server/assets/image/product/{{$dt->product_img}}" alt="#">
                                    <div class="media-body ms-3">
                                        <div class="product-name">
                                            <h6><a href="#">{{$dt->product_name}}</a></h6>
                                        </div>
                                        <div class="rating"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></div>
                                        <div class="price d-flex">
                                            <div class="text-muted me-2">Price</div>: {{number_format($dt->price)}}
                                        </div>
                                        <div class="avaiabilty">
                                            <div class="text-success">Số Lượng: {{$dt->quantity}}</div>
                                        </div><a class="btn btn-success btn-xs" href="#">Shipped</a><i class="close" data-feather="x"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h5>Đã Hủy</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        @foreach($order_detail as $dt)
                        @if($dt->status == 3)
                        <div class="col-xxl-4 col-md-6">
                            <div class="prooduct-details-box">
                                <div class="media"><img class="align-self-center img-fluid img-60" src="{{URL::to('/')}}/server/assets/image/product/{{$dt->product_img}}" alt="#">
                                    <div class="media-body ms-3">
                                        <div class="product-name">
                                            <h6><a href="#">{{$dt->product_name}}</a></h6>
                                        </div>
                                        <div class="rating"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></div>
                                        <div class="price d-flex">
                                            <div class="text-muted me-2">Price</div>: {{number_format($dt->price)}}
                                        </div>
                                        <div class="avaiabilty">
                                            <div class="text-success">Số Lượng: {{$dt->quantity}}</div>
                                        </div><a class="btn btn-danger btn-xs" href="#">Cancelled</a><i class="close" data-feather="x"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
  @else
  <strong class="text-center">Danh Sách Trống</strong>
  @endif