@foreach($cmt as $stt => $item)
<tr>
    <th scope="row">{{ $stt+1 }}</th>
    <td>{{ $item->firstName}} {{ $item->lastName}} <strong>({{$item->username}})</strong></td>
    <td>
        @if($item->role == 1)
        Sản Phẩm Số {{$item->product_id}}
        @else
        Bài Viết Số {{$item->article_id}}
        @endif
    </td>
    <td class="flex-column align-items-center justify-content-around">
        @if($item->role == 1)
        <p>
        <div class="product-ratings">
            <div class="ratings">
                @switch($item->rate)
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
                @case('4.0')
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
        </div>
        </p>
        <p>{!!$item->comment_description!!}</p>
        @else
        <p>{!!$item->comment_description!!}</p>
        @endif
    </td>
    <td>
        @if($item->status==1)
        <p><strong style="color:blue">Đang hiển thị</strong></p>
        @else
        <p><strong style="color:darkgoldenrod">Đang ẩn</strong></p>
        @endif
    </td>
    <td class="d-flex align-items-center justify-content-around">
        <form action="{{route('BinhLuan.show',$item->comment_id)}}" method="get">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <input type="hidden" name="_method" value="put" />
            <button class="btn btn-outline-light" type="submit" title="Xem chi tiết"><i class="icofont icofont-paper" style="font-size:20px;color:green"></i></i></button>
        </form>
        @if ($item->status == 1)
        <form method="post" action="{{URL::to('/BinhLuan/change_status/'.$item->comment_id)}}" class="change_status_tri">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <input type="hidden" name="_method" value="put" />
            <button class="btn btn-outline-light" type="submit" title="Duyệt Bình Luận"><i class="icofont-ui-check" style="font-size:20px;color:cornflowerblue"></i></button>
        </form>
        @else
        <form method="post" action="{{URL::to('/BinhLuan/change_status/'.$item->comment_id)}}" class="change_status_tri">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <input type="hidden" name="_method" value="put" />
            <button class="btn btn-outline-light" type="submit" title="Ẩn Bình Luận"><i class="icofont icofont-ui-close" style="font-size:20px;color:red"></i></button>
        </form>
        @endif
    </td>
</tr>
@endforeach
