<!-- Modal -->
@foreach ($modal as $modal)
<div class="quickViewModal modal fade" id="quickViewModal{{$modal->product_id}}">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <button class="close" data-dismiss="modal">&times;</button>
            <div class="row learts-mb-n30">

                <!-- Product Images Start -->
                <div class="col-lg-6 col-12 learts-mb-30">
                    <div class="product-images">
                        <div class="product-gallery-slider-quickview">
                            <div class="product-zoom" data-image="{{URL::to('/') }}/server/assets/image/product/{{$modal->product_img}}">
                                <img src="{{URL::to('/') }}/server/assets/image/product/{{$modal->product_img}}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Product Images End -->

                <!-- Product Summery Start Modal -->
                <div class="col-lg-6 col-12 overflow-hidden learts-mb-30">
                    <div class="product-summery customScroll">
                        <div class="product-ratings">
                            <span class="star-rating">
                                <span class="rating-active" style="width: 100%;">Đánh Giá</span>
                            </span>
                            <a href="#reviews" class="review-link">(<span class="count">Có 3</span> lượt đánh giá sản phẩm)</a>
                        </div>
                        <h3 class="product-title">{{$modal->product_name}}</h3>
                        <div class="product-price">{{number_format($modal->product_price).' '.'VND'}}</div>
                        <div class="product-description">
                            <p>{!!$modal->product_description!!}</p>
                        </div>
                        <div class="product-buttons">
                            <a href="#" class="btn btn-icon btn-outline-body btn-hover-dark"><i class="fal fa-heart"></i></a>
                            <a href="javascript:" onclick="AddCart({{$modal->product_id}})" class="btn btn-dark btn-outline-hover-dark"><i class="fal fa-shopping-cart"></i> Add to Cart</a>
                            <a href="#" class="btn btn-icon btn-outline-body btn-hover-dark"><i class="fal fa-random"></i></a>
                        </div>
                        <div class="product-brands">
                            <span class="title">Nhà Cung Cấp</span>
                            <div class="brands">
                                <a href="{{route('Nha-Cung-Cap',[Str::slug($modal->port_name, '-'),$modal->port_id])}}"><img src="{{URL::to('/') }}/server/assets/image/portfolio/avatar/{{$modal->port_avatar}}" alt=""></a>
                            </div>
                        </div>
                        <div class="product-meta mb-0">
                            <table>
                                <tbody>
                                    <tr>
                                        <td class="label"><span>Số Series</span></td>
                                        <td class="value">0{{$modal->product_id}}</td>
                                    </tr>
                                    <tr>
                                        <td class="label"><span>Danh Mục</span></td>
                                        <td class="value">
                                            <ul class="product-category">
                                                <li><a href="#">{{$modal->cate_name}}</a></li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="label"><span>Từ Khóa</span></td>
                                        <td class="value">
                                            <ul class="product-tags">
                                                <li><a href="#">{{$modal->product_keyword}}</a></li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="label"><span>Chia Sẻ</span></td>
                                        <td class="va">
                                            <div class="product-share">
                                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                                <a href="#"><i class="fab fa-twitter"></i></a>
                                                <a href="#"><i class="fab fa-google-plus-g"></i></a>
                                                <a href="#"><i class="fab fa-pinterest"></i></a>
                                                <a href="#"><i class="fal fa-envelope"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- Product Summery End -->

            </div>
        </div>
    </div>
</div>
@endforeach