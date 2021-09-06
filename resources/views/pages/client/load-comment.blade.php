<div class="product-review-wrapper">
    <span class="title">Có {{count($comment)}} reviews sản phẩm {{$product_detail->product_name}}</span>
    <ul class="product-review-list">
        @foreach($comment as $cmt)
        <li>
            <div class="product-review">
                <div class="thumb"><img src="{{URL::to('/') }}/server/assets/image/account/{{$cmt->avatar}}" alt=""></div>
                <div class="content">
                    <div class="ratings">
                        @switch($cmt->rate)
                        @case(1)
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                        @break
                        @case(2)
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                        @break
                        @case(3)
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                        @break
                        @case(4)
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star"></span>
                        @break
                        @case(5)
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        @break
                        @endswitch
                    </div>
                    <div class="meta">
                        <h5 class="title">{{$cmt->firstName}} {{$cmt->lastName}}</h5>
                        <span class="date">{{$cmt->updated_at}}</span>
                    </div>
                    <p>{!!$cmt->comment_description !!}</p>
                </div>
            </div>
        </li>
        @endforeach
    </ul>
    <span class="title">Thêm Bình Luận</span>
    @if(Auth::check())
    <div class="review-form">
        <form action="{{route('BinhLuan.store')}}" method="post" enctype="multipart/form-data" class="add-comment">
            @csrf
            <div class="row learts-mb-n30">
                <div class="col-12 learts-mb-10">
                    <div class="form-rating">
                        <span class="title">Đánh giá của bạn</span>
                        <div class="rate1">
                            <input type="radio" id="star5" name="rate" value="5" />
                            <label for="star5" title="text">5 stars</label>
                            <input type="radio" id="star4" name="rate" value="4" />
                            <label for="star4" title="text">4 stars</label>
                            <input type="radio" id="star3" name="rate" value="3" />
                            <label for="star3" title="text">3 stars</label>
                            <input type="radio" id="star2" name="rate" value="2" />
                            <label for="star2" title="text">2 stars</label>
                            <input type="radio" id="star1" name="rate" value="1" />
                            <label for="star1" title="text">1 star</label>
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
</div>