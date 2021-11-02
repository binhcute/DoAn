<div class="container" id="list-cart">

    @if(Session::has("Cart") != null)
    <!-- <table class="cart-wishlist-table table">
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
            <td><img src="{{URL::to('/')}}/image/product/{{$item['product_info']->product_img}}" class="img-thumbnail" width="90" height="100"></td>
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
</div> -->
    <div class="row learts-mb-n30">

        <!-- <div class="col-lg-6 order-lg-2 learts-mb-30">
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
    </div> -->

        <div class="perfume-cart__contents ">
            <!-- Tiêu đề -->
            <div class="row_g no-gutters row_g-title hide-on-mobile">

                <div class="col_g l-4_g m-4_g">
                    <div class="perfume-cart__title">
                        Sản phẩm
                    </div>
                </div>

                <div class="col_g l-2_g m-2_g">
                    <div class="perfume-cart__title">
                        Đơn giá
                    </div>
                </div>

                <div class="col_g l-3_g m-3_g">
                    <div class="perfume-cart__title">
                        Số lượng
                    </div>
                </div>

                <div class="col_g l-2_g m-2_g">
                    <div class="perfume-cart__title">
                        Thành tiền
                    </div>
                </div>

                <div class="col_g l-1_g m-1_g">
                    <div class="perfume-cart__title">
                        Xóa
                    </div>
                </div>

            </div>
            @foreach (Session::get('Cart')->product as $item)
            <!-- Nội dung -->
            <div class="row_g no-gutters row_content hide-on-mobile">
                <div class="col_g l-4_g m-4_g">
                    <div class=" perfume-cart__product">
                        <img class="product__img" src="{{URL::to('/')}}/image/product/{{$item['product_info']->product_img}}" alt="">
                        <div>
                            <span class="product__name">
                                {{$item['product_info']->product_name}}
                            </span>
                        </div>

                    </div>
                </div>
                <div class="col_g l-2_g m-2_g">
                    <div class="perfume-cart__content perfume-cart__center">
                        <span class="perfume-cart__unit-sprice">{{number_format($item['product_info']->product_price)}}</span>
                        <span>vnđ</span>
                    </div>
                </div>
                <div class="col_g l-3_g m-3_g">
                    <div class="perfume-cart__content perfume-cart__quantity perfume-cart__center">
                        <button class="quantity__minus" data-product-id="{{$item['product_info']->product_id}}">-</button>
                        <input readonly id="quantity__number" class="quantity_num" value="{{$item['qty']}}">
                        <button class="quantity__plus" data-product-id="{{$item['product_info']->product_id}}">+</button>
                    </div>
                </div>
                <div class="col_g l-2_g m-2_g">
                    <div class="perfume-cart__content perfume-cart__center">
                        <span class="perfume-cart__into-money">{{number_format($item['price'])}}</span>
                        <span>vnđ</span>
                    </div>
                </div>
                <div class="col_g l-1_g m-1_g">
                    <div class="perfume-cart__content perfume-cart__trash perfume-cart__center">
                        <a onclick="DeleteItemListCart({{$item['product_info']->product_id}});"><i class="far fa-trash-alt"></i></a>
                    </div>
                </div>

            </div>

            <!-- Sản phẩm của giỏ hàng trên Mobile -->
            <div class="row_g hide-on-tablet hide-on-pc">

                <div class="col_g col_g-mar">
                    <div class=" perfume-cart__product">
                        <img class="product__img" src="{{URL::to('/')}}/image/product/{{$item['product_info']->product_img}}" alt="">
                        <div>
                            <span class="product__name">
                                {{$item['product_info']->product_name}}
                            </span>

                            <div class="col_g c-0_g">
                                <div class="perfume-cart__content perfume-cart__center">
                                    <span class="perfume-cart__unit-sprice">{{$item['product_info']->product_price}}</span>
                                    <span>vnđ</span>
                                </div>
                            </div>

                            <div class="perfume-cart__content perfume-cart__center ">
                                <span class="perfume-cart__title-num">Giá:</span>
                                <span class="perfume-cart__into-money">{{number_format($item['price'])}}</span>
                                <span>vnđ</span>
                            </div>

                            <div class="perfume-cart__content perfume-cart__quantity perfume-cart__center">
                                <div class="perfume-cart__btn">
                                    <span class="perfume-cart__title-num">Số lượng:</span>
                                    <button class="quantity__minus" data-product-id="{{$item['product_info']->product_id}}">-</button>
                                    <input readonly id="quantity__number" class="quantity_num" value="{{$item['qty']}}">
                                    <button class="quantity__plus" data-product-id="{{$item['product_info']->product_id}}">+</button>
                                </div>
                                <div class="perfume-cart__trash">
                                    <a onclick="DeleteItemListCart({{$item['product_info']->product_id}});"><i class="far fa-trash-alt"></i></a>
                                </div>
                            </div>


                        </div>

                    </div>
                </div>

            </div>
            @endforeach
            <!-- Button -->
            <div class="row_g no-gutters">
                <div class="col_g l-12_g m-12_g c-12_g">
                    <div class="cart-pay">
                        @if(Auth::check())
                        <a href="{{URL::to('/')}}" class="cart-back__btn">Trở lại</a>
                        <a href="{{URL::to('checkout')}}" class="cart-pay__btn">Thanh toán</a>
                        @else
                        <a href="{{URL::to('login')}}" class="btn btn-dark btn-hover-success mr-3 mb-3" href="#">Đăng Nhập Ngay Để Đặt Hàng</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

@endif
@if(Session::has("Cart") == null)
<h3>Giỏ Hàng Trống</h3>
@endif

</div>

<script>
    let valueCount_1 =0;
    tangSanPham();

    function tangSanPham() {
        let btnPlus = document.getElementsByClassName('quantity__plus');
        for (let i = 0; i < btnPlus.length; i++) {
            btnPlus[i].addEventListener('click', function() {
                // Lấy giá trị input
                valueCount_1 = document.getElementsByClassName('quantity_num')[i];

                // Tăng giá trị lên 1
                valueCount_1.value++;
                
                if (valueCount_1.value > 1) {
                    document.getElementsByClassName("quantity__minus")[i].removeAttribute("disabled");
                    document.getElementsByClassName("quantity__minus")[i].classList.remove("disabled");
                }
                SaveItemListCart($(this).data('product-id'), valueCount_1.value);

                thanhTienSanPham(valueCount_1.value, i);


            });
        }
    }

    giamSanPham();

    function giamSanPham() {
        let btnMinus = document.getElementsByClassName('quantity__minus');
        
        for (let i = 0; i < btnMinus.length; i++) {
            btnMinus[i].addEventListener('click', function(e) {
                e.preventDefault();
                // Lấy giá trị input
                valueCount_1 = document.getElementsByClassName('quantity_num')[i];
               
                // Tăng giá trị lên 1
                valueCount_1.value--;
                if (valueCount_1.value == 1) {
                    document.getElementsByClassName('quantity__minus')[i].setAttribute("disabled","disabled");
                }
                SaveItemListCart($(this).data('product-id'), valueCount_1.value);
                thanhTienSanPham(valueCount_1.value, i);
            });
        }
    }

    function thanhTienSanPham(soluong, i) {
        // Lấy giá tiền gốc 
        let priceUnit = document.getElementsByClassName('perfume-cart__unit-sprice')[i].innerText.replace(/\,/g, "");


        document.getElementsByClassName('perfume-cart__into-money')[i].innerText = (priceUnit * soluong).toLocaleString().replace(/\./g, ",");
    }
</script>