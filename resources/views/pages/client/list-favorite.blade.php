<div class="container" id="list-favorite">
        <form class="cart-form" action="#">
    @if(Session::has("Favorite") != null)
            <table class="cart-wishlist-table table">
                <thead>
                    <tr>
                        <th class="name" colspan="2">Sản Phẩm</th>
                        <th class="price">Giá</th>
                        <th class="add-to-cart">&nbsp;</th>
                        <th class="remove">&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach(Session::get('Favorite')->product as $item)
                    <tr>
                        <td class="thumbnail"><a href="product-details.html"><img src="{{URL::to('/')}}/server/assets/image/product/{{$item['product_info']->product_img}}"></a></td>
                        <td class="name"> <a href="product-details.html">{{$item['product_info']->product_name}}</a></td>
                        <td class="price"><span>{{number_format($item['product_info']->product_price).' '.'VND'}}</span></td>
                        <td class="add-to-cart"><a href="#" class="btn btn-light btn-hover-dark"><i class="fal fa-shopping-cart mr-2"></i> Thêm vào giỏ hàng</a></td>
                        <td><a onclick="DeleteItemListCart({{$item['product_info']->product_id}});"><i class="fas fa-trash-alt" style="color:crimson"></i></a></td>
                    </tr>
                    <!-- <div onclick="addProduct('{$item->getId()}','{$item->getName()}','{$item->getPrice()}',this)">
													<a class="btn-lienhe ml-3" style="cursor:pointer;">Thêm vào giỏ hàng </a>
													<div class="d-none" data-cus="/upload/1/products/a_{$listavatar[0]}" id="avatar"></div>
												</div> -->
                    @endforeach
                </tbody>
            </table>
        @endif
        @if(Session::has("Favorite") == null)
        <h3>Danh Sách Trống</h3>
        @endif
            <div class="row">
                <div class="col text-center mb-n3">
                    <a class="btn btn-light btn-hover-dark mr-3 mb-3" href="{{URL::to('/')}}">Quay Lại</a>
                    <a class="btn btn-dark btn-outline-hover-dark mb-3" href="{{URL::to('/cart')}}">Xem giỏ hàng</a>
                </div>
            </div>
        </form>
    </div>