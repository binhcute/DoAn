@foreach($khuyenmai as $stt => $item)
<tr>
    <th scope="row">{{ $stt+1 }}</th>
    <td>{{ $item->promotion_name. ' (' . $item->promotion_key .')'}}</td>
    
    <td>{{ number_format($item->promotion_money).'vnd'}}    </td>
    <td>Từ ngày {{date('d-m-Y', strtotime($item->updated_at))}} đến ngày {{date('d-m-Y', strtotime($item->end_at))}} </td>
    <td class="flex-column align-items-center justify-content-around">
        <a href="{{route('KhuyenMai.show',$item->promotion_id)}}" method="get">
            <i class="icofont icofont-paper" style="font-size:20px;color:green"></i>
        </a>
        <a href="{{route('KhuyenMai.edit',$item->promotion_id)}}">
            <i class="icofont icofont-pencil-alt-5" style="font-size:20px;color:blue"></i>
        </a>
        <a data-url="{{URL::to('/XoaKhuyenMai',$item->promotion_id)}}" class="delete-item">
            <meta name="csrf-token" content="{{ csrf_token() }}">
            <input type="hidden" name="_method" value="delete">
            <i class="icofont icofont-trash" style="font-size:20px;color:red"></i>
        </a>
    </td>
</tr>
@endforeach