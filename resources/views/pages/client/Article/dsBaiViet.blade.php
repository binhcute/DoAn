@foreach ($article as $item)
<div class="col-12 border-bottom learts-pb-40 learts-mb-40">
    <div class="blog">
        <div class="row learts-mb-n30">
            <div class="col-md-5 col-12 learts-mb-30">
                <div class="image mb-0">
                    <a href="{{route('Bai-Viet',[Str::slug($item->article_name, '-'),$item->article_id])}}"><img src="{{ URL::to('/') }}/server/assets/image/article/{{$item->article_img}}" alt="Blog Image"></a>
                </div>
            </div>
            <div class="col-md-7 col-12 align-self-center learts-mb-30">
                <div class="content">
                    <ul class="meta">
                        <li><i class="far fa-calendar"></i><a href="#">{{$item->created_at}}</a></li>
                        <li><i class="far fa-eye"></i> {{$item->view}} lượt xem</li>
                    </ul>
                    <h5 class="title"><a href="{{route('Bai-Viet',[Str::slug($item->article_name, '-'),$item->article_id])}}">{{$item->article_name}}</a></h5>
                    <div class="desc">
                        <p>{!!$item->article_description!!}</p>
                    </div>
                    <a href="{{route('Bai-Viet',[Str::slug($item->article_name, '-'),$item->article_id])}}" class="link">Read More</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach

<div>{{ $article->links()}}</div>