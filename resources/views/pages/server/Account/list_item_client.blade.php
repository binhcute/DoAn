@foreach($account as $stt => $item)
<tr>
    <th scope="row">{{ $stt+1 }}</th>
    <td>
        <div class="text-center ">
            <img src="{{URL::to('/')}}/image/account/1.png" alt="" width="100px">
            <p>
                <strong>

                    {{ $item->username }}
                </strong>
            </p>
    </td>
    </div>
    <td>
        <p>Họ Tên: <strong>{{ $item->firstName}} {{ $item->lastName}}</strong>
            @if($item->gender==0)
            <i>(Nữ)</i>
            @else
            <i>(Nam)</i>
            @endif
        </p>
        <p>Số điện thoại: <strong> {{$item->phone}}</strong></p>
        <p>Email: <strong> {{$item->email}}</strong></p>
        <p>Địa chỉ: <strong> {{$item->address}}</strong></p>
    </td>
    <td>
        @switch($item->status)
        @case(0)
        <strong style="color:red">Ngưng Hoạt Động</strong>
        <form action="{{URL::to('/TaiKhoan/change_status/'.$item->id)}}" class="change_status_tri" method="post">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <input type="hidden" name="_method" value="put" />
            <a class="btn btn-outline-light" title="Đang Khóa Click để Kích Hoạt"><i class="icofont icofont-refresh" style="font-size:30px;color:red"></i></a>
        </form>
        @break
        @case(1)
        <strong style="color:blue">Đang Hoạt Động</strong>
        <form action="{{URL::to('/TaiKhoan/change_status/'.$item->id)}}" class="change_status_tri" method="post">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <input type="hidden" name="_method" value="put" />
            <a class="btn btn-outline-light" title="Đang Hoạt Động Click để Khóa"><i class="icofont icofont-refresh" style="font-size:30px;color:blue"></i></a>
        </form>
        @break
        @endswitch
    </td>
    <td class="flex-column align-items-center justify-content-around">
        <a href="{{route('TaiKhoan.show',$item->id)}}" method="get" title="Xem chi tiết">
            <i class="icofont icofont-paper" style="font-size:20px;color:green"></i>
        </a>
        <a href="{{route('TaiKhoan.edit',$item->id)}}" title="Chỉnh sửa">
            <i class="icofont icofont-pencil-alt-5" style="font-size:20px;color:blue"></i>
        </a>
        <a href="{{URL::to('/XoaTaiKhoan',$item->id)}}" title="Xóa" onclick="return confirm('Bạn muốn xóa danh mục này ?')">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <input type="hidden" name="_method" value="delete">
            <i class="icofont icofont-trash" style="font-size:20px;color:red"></i>
        </a>

    </td>
</tr>
@endforeach