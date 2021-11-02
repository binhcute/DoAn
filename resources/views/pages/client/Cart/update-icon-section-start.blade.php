<div class="header-cart">
                        @if(Session::has("Cart") !=null)
                        <a href="#offcanvas-cart" class="offcanvas-toggle"><span id="total-qty-show" class="cart-count">{{Session::get("Cart")->totalQuantity}}</span><i class="fal fa-shopping-cart"></i></a>
                        @else
                        <a href="#offcanvas-cart" class="offcanvas-toggle"><i class="fal fa-shopping-cart"></i></a>
                        @endif
                    </div>