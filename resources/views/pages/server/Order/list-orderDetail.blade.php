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
          <div class="media"><img class="align-self-center img-fluid img-60" src="{{URL::to('/')}}/image/product/{{$dt->product_img}}" alt="#">
            <div class="media-body ms-3">
              <div class="product-name">
                <h6>{{$dt->product_name}}</h6>
              </div>
              <div class="price d-flex">
                <div class="text-muted me-2">Price</div>: {{number_format($dt->price)}} vnđ
              </div>
              <div class="price d-flex">
                <div class="text-muted me-2">Số Lượng: {{$dt->quantity}}</div>
              </div>
              <div class="avaiabilty">
                <div class="text-success">Tông tiền: {{number_format($dt->amount)}} vnđ</div>
              </div><a class="btn btn-warning btn-xs" href="#">Chờ xử lý</a>
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
          <div class="media"><img class="align-self-center img-fluid img-60" src="{{URL::to('/')}}/image/product/{{$dt->product_img}}" alt="#">
            <div class="media-body ms-3">
              <div class="product-name">
                <h6>{{$dt->product_name}}</h6>
              </div>
              <div class="price d-flex">
                <div class="text-muted me-2">Price</div>: {{number_format($dt->price)}}
              </div>
              <div class="price d-flex">
                <div class="text-muted me-2">Số Lượng: {{$dt->quantity}}</div>
              </div>
              <div class="avaiabilty">
                <div class="text-success">Tông tiền: {{number_format($dt->amount)}} vnđ</div>
              </div><a class="btn btn-primary btn-xs">Đang vận chuyển</a>
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
          <div class="media"><img class="align-self-center img-fluid img-60" src="{{URL::to('/')}}/image/product/{{$dt->product_img}}" alt="#">
            <div class="media-body ms-3">
              <div class="product-name">
                <h6>{{$dt->product_name}}</h6>
              </div>
              <div class="price d-flex">
                <div class="text-muted me-2">Price</div>: {{number_format($dt->price)}}
              </div>
              <div class="price d-flex">
                <div class="text-muted me-2">Số Lượng: {{$dt->quantity}}</div>
              </div>
              <div class="avaiabilty">
                <div class="text-success">Tông tiền: {{number_format($dt->amount)}} vnđ</div>
              </div><a class="btn btn-success btn-xs" href="#">Hoàn Thành</a>
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
          <div class="media"><img class="align-self-center img-fluid img-60" src="{{URL::to('/')}}/image/product/{{$dt->product_img}}" alt="#">
            <div class="media-body ms-3">
              <div class="product-name">
                <h6>{{$dt->product_name}}</h6>
              </div>
              <div class="price d-flex">
                <div class="text-muted me-2">Price</div>: {{number_format($dt->price)}}
              </div>
              <div class="price d-flex">
                <div class="text-muted me-2">Số Lượng: {{$dt->quantity}}</div>
              </div>
              <div class="avaiabilty">
                <div class="text-success">Tông tiền: {{number_format($dt->amount)}} vnđ</div>
              </div><a class="btn btn-danger btn-xs" href="#">Đã Hủy</a>
            </div>
          </div>
        </div>
      </div>
      @endif
      @endforeach
    </div>
  </div>
</div>