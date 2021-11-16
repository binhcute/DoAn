@foreach($order as $item)
<tr>
    <th scope="row">{{ $item->order_id }}</th>
    <td>
        <p><strong>Hóa đơn số</strong>: {{ $item->order_id }}</p>
        <p><strong>Email</strong>: {{ $item->email }}</p>
        <p><strong>Tài Khoản</strong>: {{ $item->username }}</p>
        
    </td>
    <td>{{date('d-m-Y', strtotime($item->updated_at)) }}</td>
    <td>
        @switch($item->status)
        @case(0)
        <strong style="color:#00c3da">Đang vận chuyển</strong>
        @break
        @case(1)
        <strong style="color:greenyellow">Đang chờ xử lý</strong>
        @break
        @case(2)
        <strong style="color:dodgerblue">Giao hàng thành công</strong>
        @break
        @case(3)
        <strong style="color:orangered">Đơn hàng đã bị hủy</strong>
        @break
        @endswitch
    </td>
    <td class="d-flex align-items-center justify-content-around">
        <form action="{{route('HoaDon.show',$item->order_id)}}" method="get">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <input type="hidden" name="_method" value="put" />
            <button class="btn btn-outline-light" type="submit" title="Xem chi tiết"><i class="icofont icofont-paper" style="font-size:20px;color:green"></i></i></button>
        </form>
        @if($item->status==0)
        <form method="post" action="{{URL::to('/HoaDon-danggiao/xuly/'.$item->order_id)}}" class="change-status-one">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <input type="hidden" name="_method" value="put" />
            <button class="btn btn-outline-light" type="submit" title="Chuyển về Đang Xử Lý"><i class="icofont-clock-time" style="font-size:20px;color:violet"></i></button>
        </form>
        <form method="post" action="{{URL::to('/HoaDon-danggiao/thanhcong/'.$item->order_id)}}" class="change-status-two">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <input type="hidden" name="_method" value="put" />
            <button class="btn btn-outline-light" type="submit" title="Giao hàng thành công"><i class="icofont icofont-ui-check" style="font-size:20px;color:blue"></i></button>
        </form>
        <form method="post" action="{{URL::to('/HoaDon-danggiao/huy/'.$item->order_id)}}" class="change-status-three">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <input type="hidden" name="_method" value="put" />
            <button class="btn btn-outline-light" type="submit" title="Giao hàng thất bại"><i class="icofont icofont-ui-close" style="font-size:20px;color:red"></i></button>
        </form>
        @endif
        @if($item->status==1)
        <form method="post" action="{{URL::to('/HoaDon-choxuly/danggiao/'.$item->order_id)}}" class="change-status-zero">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <input type="hidden" name="_method" value="put" />
            <button class="btn btn-outline-light" type="submit" title="Chuyển về Đang Vận Chuyển"><i class="icofont-motor-biker" style="font-size:20px;color:#00c3da"></i></button>
        </form>
        <form method="post" action="{{URL::to('/HoaDon-choxuly/thanhcong/'.$item->order_id)}}" class="change-status-two">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <input type="hidden" name="_method" value="put" />
            <button class="btn btn-outline-light" type="submit" title="Giao hàng thành công"><i class="icofont icofont-ui-check" style="font-size:20px;color:blue"></i></button>
        </form>
        <form method="post" action="{{URL::to('/HoaDon-choxuly/huy/'.$item->order_id)}}" class="change-status-three">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <input type="hidden" name="_method" value="put" />
            <button class="btn btn-outline-light" type="submit" title="Giao hàng thất bại"><i class="icofont icofont-ui-close" style="font-size:20px;color:red"></i></button>
        </form>
        @endif
        @if($item->status==2)
        <form method="post" action="{{URL::to('/HoaDon-hoanthanh/danggiao/'.$item->order_id)}}" class="change-status-zero">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <input type="hidden" name="_method" value="put" />
            <button class="btn btn-outline-light" type="submit" title="Chuyển về Đang Vận Chuyển"><i class="icofont-motor-biker" style="font-size:20px;color:#00c3da"></i></button>
        </form>
        <form method="post" action="{{URL::to('/HoaDon-hoanthanh/xuly/'.$item->order_id)}}" class="change-status-one">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <input type="hidden" name="_method" value="put" />
        <button class="btn btn-outline-light" type="submit" title="Chuyển về Đang Xử Lý"><i class="icofont-clock-time" style="font-size:20px;color:violet"></i></button>
    </form>
    <form method="post" action="{{URL::to('/HoaDon-hoanthanh/huy/'.$item->order_id)}}" class="change-status-three">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <input type="hidden" name="_method" value="put" />
        <button class="btn btn-outline-light" type="submit" title="Giao hàng thất bại"><i class="icofont icofont-ui-close" style="font-size:20px;color:red"></i></button>
    </form>
        @endif
        @if($item->status==3)
        <form method="post" action="{{URL::to('/HoaDon-huybo/danggiao/'.$item->order_id)}}" class="change-status-zero">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <input type="hidden" name="_method" value="put" />
            <button class="btn btn-outline-light" type="submit" title="Chuyển về Đang Vận Chuyển"><i class="icofont-motor-biker" style="font-size:20px;color:#00c3da"></i></button>
        </form>
        <form method="post" action="{{URL::to('/HoaDon-huybo/thanhcong/'.$item->order_id)}}" class="change-status-two">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <input type="hidden" name="_method" value="put" />
            <button class="btn btn-outline-light" type="submit" title="Giao hàng thành công"><i class="icofont icofont-ui-check" style="font-size:20px;color:blue"></i></button>
        </form>
        <form method="post" action="{{URL::to('/HoaDon-huybo/xuly/'.$item->order_id)}}" class="change-status-one">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <input type="hidden" name="_method" value="put" />
            <button class="btn btn-outline-light" type="submit" title="Chuyển về Đang Xử Lý"><i class="icofont-clock-time" style="font-size:20px;color:violet"></i></button>
        </form>
        @endif
    </td>
</tr>
@endforeach