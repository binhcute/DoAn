@extends('layout_admin')
@section('title','Hóa Đơn')
@section('content')
<div class="col-sm-12">
    <div class="page-title">
        <div class="row">
            <div class="col-6">
                <h3>Danh Sách Hóa Đơn</h3>
            </div>
            <div class="col-6">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin.index')}}"> <i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item">Hóa Đơn</li>
                    <li class="breadcrumb-item active">Danh Sách</li>
                </ol>
            </div>
        </div>
    </div>
    <div>
    <section class="tab__custom">
            <a class="tab__item_custom" href="{{route('HoaDon.index')}}"><i class="fa fa-angle-double-left"></i> Quay Lại</a>
            <a class="tab__item_custom" href="{{route('HoaDon.wait')}}">Chờ xác nhận</a>
            <a class="tab__item_custom" href="{{route('HoaDon.ship')}}">Vận Chuyển</a>
            <a class="tab__item_custom"  href="{{route('HoaDon.success')}}">Thành Công</a>
            <a class="tab__item_custom" href="{{route('HoaDon.cancel')}}">Bị Hủy</a>
        </section>

        <div class="card">
            <div class="card-body" id="change_layout">
                @if(count($order)!=0)
                <div id="waiting" class="tabOrder">
                    <h3>Hóa Đơn Bị Hủy</h3>
                    <div class="table-responsive">
                        <table class="display" id="basic-1">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Người Mua</th>
                                    <th scope="col">Ngày Mua</th>
                                    <th scope="col">Trạng Thái</th>
                                    <th scope="col">Tác Vụ</th>
                                </tr>
                            </thead>
                            <tbody id="change-layout">
                                
                            @include('pages.server.Order.item__0123_detail')
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Tên</th>
                                    <th scope="col">Hình Ảnh</th>
                                    <th scope="col">Trạng Thái</th>
                                    <th scope="col">Tác Vụ</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
                @else
                <div class="text-center">
                    <img width="50%" src="{{ asset('image/example/list-empty.png') }}" alt="">

                </div>
                @endif

            </div>

        </div>
        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12" id="giao-dien-duoi">
                    @include('pages.server.Order.list-orderDetail')
                </div>
            </div>
        </div>

    </div>
</div>
</div>
@endsection
@section('page-js')
<script>
    function changeStatus(event) {
        event.preventDefault();
        var form = $(this);
        var url = form.attr('action');
        Swal.fire({
            title: 'Bạn Muốn Thay Đổi Trạng Thái Đơn Hàng ?',
            icon: 'warning',
            showCancelButton: true,
            cancelButtonColor: '#d33',
            confirmButtonColor: '#3085d6',
            cancelButtonText: 'Hủy',
            confirmButtonText: 'Thay Đổi'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "POST",
                    url: url,
                    data: form.serialize(),
                    success: function(data) {
                        if (data.status == 'error') {
                            Swal.fire({
                                position: 'center',
                                icon: 'error',
                                title: 'Thất Bại',
                                text: data.message,
                                showConfirmButton: true,
                                timer: 2500
                            })
                        }
                        if (data.status == 'success') {
                            $('#change-layout').empty();
                            $('#change-layout').html(data.giao_dien);
                            $('#giao-dien-duoi').html(data.giao_dien_duoi);
                            Swal.fire({
                                position: 'center',
                                icon: 'success',
                                title: 'Thành Công',
                                text: data.message,
                                showConfirmButton: true,
                                timer: 2500
                            })
                        }
                    }
                });
            }
        });
    }
    $(function() {
        $(document).on('click', '.change-status-zero', changeStatus);
    });
    $(function() {
        $(document).on('click', '.change-status-one', changeStatus);
    });
    $(function() {
        $(document).on('click', '.change-status-two', changeStatus);
    });
    $(function() {
        $(document).on('click', '.change-status-three', changeStatus);
    });
</script>
@endsection