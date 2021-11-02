<div class="product-review-wrapper">
    <span class="title">Thêm Bình Luận</span>
    @if(Auth::check())
    <div class="review-form">
        <form action="{{route('BinhLuan.store')}}" method="post" id="rating-start" enctype="multipart/form-data" class="add-comment">
            @csrf
            <div class="row learts-mb-n30">
                <div class="col-12 learts-mb-10">
                    <div class="form-rating">
                        <span class="title">Đánh giá của bạn:</span>
                        <div class="form-reviews__rating">
                            <input hidden type="radio" class="reviews__rating-input" name="rate" id="rate-5" data-id-rating="5" value="5">
                            <label for="rate-5" class="fas fa-star icon5"></label>

                            <input hidden type="radio" class="reviews__rating-input" name="rate" id="rate-4" data-id-rating="4" value="4">
                            <label for="rate-4" class="fas fa-star icon4"></label>

                            <input hidden type="radio" class="reviews__rating-input" name="rate" id="rate-3" data-id-rating="3" value="3">
                            <label for="rate-3" class="fas fa-star icon3"></label>

                            <input hidden type="radio" class="reviews__rating-input" name="rate" id="rate-2" data-id-rating="2" value="2">
                            <label for="rate-2" class="fas fa-star icon2"></label>

                            <input hidden type="radio" class="reviews__rating-input" name="rate" id="rate-1" data-id-rating="1" value="1">
                            <label for="rate-1" class="fas fa-star icon1"></label>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="product_id" value="{{ $product_detail->product_id }}">
                <input type="hidden" name="role" value="1">
                <div class="col-12 learts-mb-30">
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" name="comment_description" placeholder="Bình luận của bạn *"></textarea>
                </div>
                <div class="col-12 text-center learts-mb-30"><button class="btn btn-dark btn-outline-hover-dark" type="submit">Gửi</button></div>
            </div>
        </form>
    </div>
    @else
    <div class="text-center">
        <p class="note">Hãy Đăng Nhập Để Thêm Bình Luận</p>
        <a href="{{route('login')}}" type="button" class="btn btn-info btn-hover-primary">Đăng Nhập Ngay</a>

    </div>
    @endif
    <div id="phan-trang-binh-luan-san-pham">
        @include('pages.client.Product-Detail.dsBinhLuan')
    </div>
</div>