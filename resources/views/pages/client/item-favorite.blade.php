<div class="inner" id="change-item">
    <div class="head">
        <span class="title">Yêu Thích</span>
        <button class="offcanvas-close">×</button>
    </div>
    @if(Session::has("Favorite") != null)
    <div class="body customScroll">
        <ul class="minicart-product-list">
            @foreach(Session::get('Favorite')->product as $item)
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
        
        <input hidden="true" id="total-qty" type="number" value="{{Session::get('Favorite')->totalQuantity}}">
    </div>
    @endif
    <div class="foot">
        <div class="buttons">
            <a href="{{URL::to('/favorite')}}" class="btn btn-dark btn-hover-primary">Xem Danh Sách</a>
        </div>
    </div>
</div>