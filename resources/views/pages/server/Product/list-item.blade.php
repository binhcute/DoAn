@foreach($product as $stt => $item)
<tr>
    <th scope="row">{{ $stt+1 }}</th>
    <td class="text-center">
        <img class="img-thumbnail" width="75" height="100" width="100" height="100" src="{{ URL::to('/') }}/image/product/{{$item->product_img}}">
        <p> <strong>Tên</strong>: {{ $item->product_name}}</p>
        <p><strong>Giá</strong>: {{number_format($item->product_price).' '.'VND'}}</p>
    </td>
    <td>
        <p><strong> Số lượng tồn</strong>: {{$item->product_quantity}}</p>
        <p><strong>Danh mục</strong>: {{$item->cate_name}}</p>
        <p><strong>Nhà cung cấp</strong>: {{$item->port_name}}</p>
        <p><strong>Ngày sản xuất</strong>: {{date('d-m-Y', strtotime($item->created_at))}}</p>
    </td>
    <td>
        @if($item->status==1)
        <form action="{{URL::to('/SanPham/change_status/'.$item->product_id)}}" class="change_status_tri" method="post">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <input type="hidden" name="_method" value="put" />
            <button class="btn btn-outline-light" type="submit" title="Đang Hiển Thị Click để Ẩn"><i class="icofont icofont-ui-check" style="font-size:35px;color:blue"></i></button>
            <p>Đang hiển thị</p>
        </form>
        @else
        <form action="{{URL::to('/SanPham/change_status/'.$item->product_id)}}" class="change_status_tri" method="post">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <input type="hidden" name="_method" value="put" />
            <button class="btn btn-outline-light" type="submit" title="Đang Ẩn Click để Hiển Thị"><i class="icofont icofont-ui-close" style="font-size:35px;color:red"></i></button>
            <p>Đang ẩn</p>
        </form>
        @endif
    </td>
    <td class="flex-column align-items-center justify-content-around">
        <a href="{{route('SanPham.show',$item->product_id)}}" method="get" title="Xem chi tiết">
            <i class="icofont icofont-paper" style="font-size:20px;color:green"></i></i>
        </a>
        <a href="{{route('SanPham.edit',$item->product_id)}}" title="Chỉnh sửa">
            <i class="icofont icofont-pencil-alt-5" style="font-size:20px;color:blue"></i>
        </a>
        <a data-url="{{URL::to('/XoaSanPham',$item->product_id)}}" class="delete-item" title="Xóa">
            <meta name="csrf-token" content="{{ csrf_token() }}">
            <input type="hidden" name="_method" value="delete">
            <i class="icofont icofont-trash" style="font-size:20px;color:red"></i>
        </a>
    </td>
</tr>
@endforeach