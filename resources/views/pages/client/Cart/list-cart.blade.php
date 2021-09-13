<div class="container" id="list-cart">

@if(Session::has("Cart") != null)
<table class="cart-wishlist-table table">
    <thead>
        <tr>
            <th class="avatar">Hình Ảnh</th>
            <th class="name">Tên Sản Phẩm</th>
            <th class="price">Giá</th>
            <th class="quantity">Số Lượng</th>
            <th class="subtotal">Tổng Tiền</th>
            <th class="subtotal">Lưu</th>
            <th class="remove">Xóa</th>
        </tr>

    </thead>
    <tbody>
        @foreach(Session::get('Cart')->product as $item)
        <tr>
            <td><img src="{{URL::to('/')}}/server/assets/image/product/{{$item['product_info']->product_img}}" class="img-thumbnail" width="90" height="100"></td>
            <td class="name" name="name">{{$item['product_info']->product_name}}</td>
            <td class="price" name="price">{{number_format($item['product_info']->product_price).' '.'VND'}}</td>
            <td class="quantity">
                <div class="product-quantity">
                    <a class="qty-btn minus" href="javascript:" data-product-id="{{$item['product_info']->product_id}}"><i class="ti-minus"></i></a>
                    <input type="text" id="qty-item-{{$item['product_info']->product_id}}" class="quantity-input text-center inputNumber" value="{{$item['qty']}}">
                    <a class="qty-btn plus" href="javascript:" data-product-id="{{$item['product_info']->product_id}}"><i class="ti-plus"></i></a>
                </div>

            </td>
            <td class="subtotal"><span>{{number_format($item['price']).' '.'VND'}}</span></td>
            </td>
            <td><a onclick="DeleteItemListCart({{$item['product_info']->product_id}});"><i class="fas fa-trash-alt" style="color:crimson"></i></a></td>
        </tr>
        @endforeach
    </tbody>
    <tr>
        <th class="avatar"></th>
        <th class="name"></th>
        <th class="price"></th>
        <th class="quantity">{{Session::get("Cart")->totalQuantity}} Sản Phẩm</th>
        <th class="subtotal">{{number_format(Session::get('Cart')->totalPrice).' '.'VND'}}</th>
        <th class="subtotal"><i class="fas fa-cart-arrow-down" style="color:forestgreen"></i></th>
        <th class="remove"><i class="fas fa-trash-alt" style="color:crimson"></i></th>
    </tr>
</table>
<div class="row justify-content-between mb-n3">
    <div class="col-auto mb-3">
    </div>
    <div class="col-auto">
        @if(Auth::check())
        <a href="{{URL::to('checkout')}}" class="btn btn-dark btn-hover-success mr-3 mb-3" href="#">Đặt Hàng Ngay</a>
        @else
        <a href="{{URL::to('login')}}" class="btn btn-dark btn-hover-success mr-3 mb-3" href="#">Đăng Nhập Ngay Để Đặt Hàng</a>
        @endif
    </div>
</div>
<br>
<div class="row learts-mb-n30">

    <div class="col-lg-6 order-lg-2 learts-mb-30">
        <div class="order-review">
            <table class="table">
                <thead>
                    <tr>
                        <th class="name">Sản Phẩm</th>
                        <th class="total">Thành Tiền</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach(Session::get('Cart')->product as $item)
                    <tr>
                        <td class="name">{{$item['product_info']->product_name}}&nbsp; <strong class="quantity">×&nbsp;{{$item['qty']}}</strong></td>
                        <td class="total"><span>{{number_format($item['price']).' '.'VND'}}</span></td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr class="total">
                        <th>Tổng Cộng</th>
                        <td><strong><span>{{number_format(Session::get('Cart')->totalPrice).' '.'VND'}}</span></strong></td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
    @endif

</div>
@if(Session::has("Cart") == null)
<h3>Giỏ Hàng Trống</h3>
@endif

</div>
<script type="text/javascript">
    $('.qty-btn').on('click', function () {
        var $this = $(this);
        var oldValue = $this.siblings('input').val();
        if ($this.hasClass('plus')) {
            var newVal = parseFloat(oldValue) + 1;
        } else {
            // Don't allow decrementing below zero
            if (oldValue > 1) {
                var newVal = parseFloat(oldValue) - 1;
            } else {
                newVal = 1;
            }
        }
        $this.siblings('input').val(newVal);
        SaveItemListCart($(this).data('product-id'));
    });
</script>

<script type="text/javascript">
    $(".inputNumber").change(function(){
        var $this = $(this);
        console.log($this);
        var oldValue = $this.siblings('input').val();
        $this.siblings('input').val(oldValue);
        SaveItemListCart($(this).data('product-id'));
    });
</script>