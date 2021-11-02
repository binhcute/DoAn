@foreach($port as $stt => $item)
<tr>
    <th scope="row">{{ $stt+1 }}</th>
    <td>{{ $item->port_name}}</td>
    <td><img class="img-thumbnail" width="100" height="100" src="{{ URL::to('/') }}/image/portfolio/{{$item->port_img}}"></td>
    <td>
        @if($item->status==1)

        <form action="{{URL::to('/NhaCungCap/change_status/'.$item->port_id)}}" class="change_status_tri" method="post">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <input type="hidden" name="_method" value="put" />
            <button class="btn btn-outline-light" type="submit"><i class="icofont icofont-ui-check" style="font-size:20px;color:blue"></i></button>
            <p>Đang hiển thị</p>
        </form>
        @else
        <form action="{{URL::to('/NhaCungCap/change_status/'.$item->port_id)}}" class="change_status_tri" method="post">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <input type="hidden" name="_method" value="put" />
            <button class="btn btn-outline-light" type="submit"><i class="icofont icofont-ui-close" style="font-size:20px;color:red"></i></button>
            <p>Đang ẩn</p>
        </form>
        @endif
    </td>
    <td class="flex-column align-items-center justify-content-around">
        <a href="{{route('NhaCungCap.show',$item->port_id)}}" method="get">
            <i class="icofont icofont-paper" style="font-size:20px;color:green"></i>
        </a>
        <a href="{{route('NhaCungCap.edit',$item->port_id)}}">
            <i class="icofont icofont-pencil-alt-5" style="font-size:20px;color:blue"></i>
        </a>
        <a data-url="{{URL::to('/XoaNhaCungCap',$item->port_id)}}" class="delete-item">
            <meta name="csrf-token" content="{{ csrf_token() }}">
            <input type="hidden" name="_method" value="delete">
            <i class="icofont icofont-trash" style="font-size:20px;color:red"></i>
        </a>
    </td>
</tr>
@endforeach