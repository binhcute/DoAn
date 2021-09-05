<div class="head">
    <span class="title">Giỏ Hàng</span>
    <button class="offcanvas-close">×</button>
</div>
@if(Session::has("Cart") != null)
<div class="body customScroll">
    <ul class="minicart-product-list">
        @foreach(Session::get("Cart")->product as $item)
        <li>
            <a href="product-details.html" class="image"><img src="{{URL::to('/')}}/server/assets/image/product/{{$item['product_info']->product_img}}" alt="Cart product Image"></a>
            <div class="content">
                <a href="product-details.html" class="title">{{$item['product_info']->product_name}}</a>
                <span class="quantity-price">{{$item['qty']}} x <span class="amount">{{number_format($item['product_info']->product_price).' '.'VND'}}</span></span>
                <i class="fa fa-times remove" data-id="{{$item['product_info']->product_id}}"></i>
            </div>
        </li>
        @endforeach
    </ul>
</div>
<div class="foot">
    <div class="sub-total">
        <strong>Tổng Tiền :</strong>
        @if(Session::get("Cart")->totalPrice != null)
        <span class="amount">{{number_format(Session::get("Cart")->totalPrice).' '.'VND'}}</span>
        @else
        <span class="amount">0</span>
        @endif
    </div>
    <div class="buttons">
        <a href="{{route('cart.index')}}" class="btn btn-dark btn-hover-primary">Xem Giỏ Hàng</a>
    </div>
</div>
@endif

@if(Session::has("Cart") == null)
<div class="body customScroll">
    <strong>Giỏ Hàng trống</strong>
</div>
<div class="foot">

    <div class="buttons">
        <a href="{{route('cart.index')}}" class="btn btn-dark btn-hover-primary">Xem Giỏ Hàng</a>
    </div>
</div>
@endif

<!-- đặt tại đây -->