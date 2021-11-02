@foreach($comment as $cmt)
<li>
    <div class="comment">
        <div class="thumbnail">
            @if($cmt->avatar)
            <img src="{{URL::to('/') }}/image/account/{{$cmt->avatar}}" alt="">
            @else
            <img src="{{URL::to('/') }}/image/account/1.png" alt="">
            @endif
        </div>
        <div class="content">
            <h4 class="name">{{$cmt->firstName}} {{$cmt->lastName}}</h4>
            <p>{!!$cmt->comment_description!!}</p>
            <div class="actions">
                <span class="date">{{$cmt->updated_at}}</span>
                <a class="reply-link" href="#">Reply</a>
            </div>
        </div>
    </div>
</li>
@endforeach

<div>{{ $comment->links()}}</div>