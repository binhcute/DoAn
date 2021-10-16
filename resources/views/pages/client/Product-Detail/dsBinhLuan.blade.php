
<div>{{$comment ->links()}}</div>
<span class="title">Hiển thị {{count($comment)}} reviews sản phẩm {{$product_detail->product_name}}</span>
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
    