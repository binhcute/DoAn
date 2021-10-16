<div class="col-lg-9 col-12 learts-mb-50 order-lg-2" id="phan-trang-danh-sach-san-pham">
    <!-- Products Start -->
    <div class="products isotope-grid row row-cols-xl-4 row-cols-md-3 row-cols-sm-2 row-cols-1">

        <div class="grid-sizer col-1"></div>
        @foreach($product as $item)
        <div class="grid-item col">
            <div class="product">
                <div class="product-thumb">
                    <a href="{{route('San-Pham',[Str::slug($item->product_name, '-'),$item->product_id])}}" class="image">
                        <img src="{{ URL::to('/') }}/server/assets/image/product/{{ $item->product_img }}" alt="Product Image">
                        <img class="image-hover " src="{{ URL::to('/') }}/server/assets/image/product/hover/{{ $item->product_img_hover }}" alt="Product Image">
                    </a>
                    <a href="javascript:" onclick="AddCart({{$item->product_id}})" class="add-to-wishlist hintT-left" data-hint="Add to cart"><i class="far fa-shopping-cart"></i></a>
                </div>
                <div class="product-info">
                    <h6 class="title"><a href="{{route('San-Pham',[Str::slug($item->product_name, '-'),$item->product_id])}}">{{$item->product_name}}</a></h6>
                    <span class="price">

                        <span class="new">{{number_format($item->product_price).' '.'VND'}}</span>
                    </span>
                    <div class="product-buttons">
                        <a href="#quickViewModal{{$item->product_id}}" data-toggle="modal" class="product-button hintT-top" data-hint="Quick View"><i class="fal fa-search"></i></a>
                        <a href="javascript:" onclick="AddCart({{$item->product_id}})" class="product-button hintT-top" data-hint="Add to Cart"><i class="fal fa-shopping-cart"></i></a>
                        <a href="#" class="product-button hintT-top" data-hint="Compare"><i class="fal fa-random"></i></a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

    </div>
    <!-- Products End -->
    <div style="padding-top:20px">{{$product->links()}}</div>
</div>