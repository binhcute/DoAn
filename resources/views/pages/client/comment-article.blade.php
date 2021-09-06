@foreach($comment as $cmt)
<li>
    <div class="comment">
        <div class="thumbnail">
            <img src="{{URL::to('/') }}/server/assets/image/account/{{$cmt->avatar}}" alt="">
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