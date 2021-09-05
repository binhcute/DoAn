@extends('layout_admin')
@section('title','Báo Cáo')
@section('content')
<div class="col-sm-12">
    <div class="page-title">
        <div class="row">
            <div class="col-6">
                <h3>Danh Sách Sản Phẩm</h3>
            </div>
            <div class="col-6">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin.index')}}"> <i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item">Sản Phẩm</li>
                    <li class="breadcrumb-item active">Danh Sách</li>
                </ol>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="content-admin">
            <div class="grid_g">
                <div class="row_g">
                    <div class="col_g l-12_g m-12_g">
                        <div class="add-form__header add-form__add-account--center add-form__haeder-product">
                            <h3 class="add-form__haeding add-form__haeding-product">Báo cáo thống kê</h3>
                        </div>
                    </div>
                    <div class="col_g l-12_g m-12_g">
                        <div class="filter-report">
                            <div class="report- from">
                                <label for="" class="report-from__label">Từ: </label>
                                <input type="text" id="datepicker" class="report-from__input">
                            </div>
                            <div class="report-to">
                                <label for="" class="report-to__label">Đến: </label>
                                <input type="text" id="datepicker2" class="report-to__input">
                            </div>
                            <div class="report-button">
                                <button id="btn-filter" class="report__btn">Lọc</button>
                            </div>

                            <div class="filter-select">
                                <label for="" class="report-to__label">Lọc theo: </label>
                                <select name="" id="" class="select-form report-select">
                                    <option>Chọn</option>
                                    <option value="7ngay">7 ngày qua</option>
                                    <option value="thangtruoc">Tháng trước</option>
                                    <option value="thangnay">Tháng này</option>
                                    <option value="365ngay">365 ngày qua</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col_g l-12_g m-12_g">
                        <div class="info-report__title">Thống kê doanh thu:<span> (gồm các đơn hàng đã hoàn thành - đã nhận được tiền)</span></div>
                        <div class="info-report info-report__complete">
                            <a class="total-rating total-rating-complete">
                                <div class="total-rating__icon">
                                    <i class="fas fa-file-invoice-dollar"></i>
                                </div>
                                <div class="total-rating__label">
                                    Doanh thu: <br /><span>40.000.000</span>
                                </div>
                                <div class="total-order__unit">VNĐ</div>
                            </a>

                            <a class="total-order total-order-complete">
                                <div class="total-order__icon">
                                    <i class="fas fa-cart-arrow-down"></i>
                                </div>
                                <div class="total-order__label">
                                    Đơn hàng: <br /><span>100</span>
                                </div>
                                <div class="total-order__unit">Hóa đơn</div>
                            </a>
                            <a class="total-product total-product-complete">
                                <div class="total-product__icon">
                                    <i class="fas fa-air-freshener"></i>
                                </div>
                                <div class="total-product__label">
                                    Tổng sản phẩm: <br /><span>150</span>
                                </div>
                                <div class="total-order__unit">Sản phẩm</div>
                            </a>

                        </div>
                    </div>
                    <div class="col_g l-6_g m-6_g">
                        <div class="chart-doughnut">
                            <canvas id="chart-doughnut-complete"></canvas>
                        </div>
                    </div>
                    <div class="col_g l-6_g m-6_g">
                        <div class="total-turnover total-turnover-complete">
                            <div class="turnover__title">Tổng doanh thu <span>(đã nhận tiền)</span></div>
                            <div class="turnover__content complete" style="background-color: #556b2f;">
                                <div class="turnover__name">Trước giảm giá</div>
                                <div class="turnover__value">24.789.000 <span>VNĐ</span></div>
                            </div>

                            <div class="turnover__content complete">
                                <div class="turnover__name">Giảm giá</i></div>
                                <div class="turnover__value">1.123.000 <span>VNĐ</span></div>
                            </div>

                            <div class="turnover__content complete" style="background-color: #556b2f;">
                                <div class="turnover__name">Thực tế</div>
                                <div class="turnover__value">22.567.000 <span>VNĐ</span></div>
                            </div>
                        </div>
                    </div>
                    <div class="col_g l-12_g m-12_g">
                        <table class="table table-bordered table__product-sold">
                            <thead>
                                <tr>
                                    <th scope="col" class="table__title">STT</th>
                                    <th scope="col" class="table__title">Tên sản phẩm</th>
                                    <th scope="col" class="table__title">Số lượng bán ra</th>
                                    <th scope="col" class="table__title">Doanh thu trước giảm giá</th>
                                    <th scope="col" class="table__title">Doanh thu sau giảm giá</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th class="table__content" scope="row">1</th>
                                    <td>EDP Sauvage </td>
                                    <td class="table__content">03</td>
                                    <td class="table__content">1.500.000 VNĐ</td>
                                    <td class="table__content">1.300.000 VNĐ</td>
                                </tr>

                            </tbody>
                        </table>

                        <!-- Change page -->
                        <div class="change-page">
                            <a class="change-page__link" href=""><i class="fas fa-arrow-left change-page__icon"></i></a>
                            <span class="change-page__num">Trang 1</span>
                            <a class="change-page__link" href=""><i class="fas fa-arrow-right change-page__icon"></i></a>
                        </div>
                    </div>
                    <div class="col_g l-12_g m-12_g">
                        <div class="info-report__title un-complete">Thống kê doanh thu:<span> (gồm các các đơn hàng đang xử lý, đã xử lý và đã hủy)</span></div>
                        <div class="info-report">
                            <a class="total-rating">
                                <div class="total-rating__icon">
                                    <i class="fas fa-file-invoice-dollar"></i>
                                </div>
                                <div class="total-rating__label">
                                    Doanh thu: <br /><span>40.000.000</span>
                                </div>
                                <div class="total-order__unit">VNĐ</div>
                            </a>

                            <a class="total-order">
                                <div class="total-order__icon">
                                    <i class="fas fa-cart-arrow-down"></i>
                                </div>
                                <div class="total-order__label">
                                    Đơn hàng: <br /><span>100</span>
                                </div>
                                <div class="total-order__unit">Hóa đơn</div>
                            </a>
                            <a class="total-product">
                                <div class="total-product__icon">
                                    <i class="fas fa-air-freshener"></i>
                                </div>
                                <div class="total-product__label">
                                    Tổng sản phẩm: <br /><span>150</span>
                                </div>
                                <div class="total-order__unit">Sản phẩm</div>
                            </a>

                        </div>
                    </div>
                    <div class="col_g l-12_g m-12_g">
                        <div class="row_g no-gutters  row_g-chart">
                            <div class="col_g l-6_g m-6_g">
                                <div class="chart-doughnut">
                                    <canvas id="chart-doughnut-bill"></canvas>
                                </div>
                            </div>

                            <div class="col_g l-6_g m-6_g">
                                <div class="chart-doughnut">
                                    <canvas id="chart-doughnut-turnover"></canvas>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col_g l-12_g m-12_g">
                        <div class="row_g no-gutters">
                            <div class="col_g l-4_g m-4_g">
                                <div class="total-turnover total-bill">
                                    <div class="turnover__title">Đơn hàng</div>

                                    <div class="turnover__content turnovar__bill" style="background-color: #cc9b1e;">
                                        <div class="turnover__name">Đang xử lý</i></div>
                                        <div class="turnover__value">10 <span class="unit-bill">đơn hàng</span></div>
                                    </div>

                                    <div class="turnover__content turnovar__bill">
                                        <div class="turnover__name">Đã xử lý</div>
                                        <div class="turnover__value">30 <span class="unit-bill">đơn hàng</span></div>
                                    </div>

                                    <div class="turnover__content turnovar__bill" style="background-color: #cc9b1e;">
                                        <div class="turnover__name">Đã hủy</div>
                                        <div class="turnover__value">05 <span class="unit-bill">đơn hàng</span></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col_g l-4_g m-4_g">
                                <div class="total-turnover">
                                    <div class="turnover__title">Hóa đơn hủy</div>
                                    <div class="turnover__content" style="background-color: #2f4f4f;">
                                        <div class="turnover__name">Trước giảm giá</div>
                                        <div class="turnover__value">1.660.000 <span>VNĐ</span></div>
                                    </div>

                                    <div class="turnover__content">
                                        <div class="turnover__name">Giảm giá</i></div>
                                        <div class="turnover__value">360.000<span>VNĐ</span></div>
                                    </div>

                                    <div class="turnover__content" style="background-color: #2f4f4f;">
                                        <div class="turnover__name">Thực tế</div>
                                        <div class="turnover__value">1.300.000 <span>VNĐ</span></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col_g l-4_g m-4_g">
                                <div class="total-turnover">
                                    <div class="turnover__title">Tổng doanh thu (dự kiến)</div>
                                    <div class="turnover__content" style="background-color: #2f4f4f;">
                                        <div class="turnover__name">Trước giảm giá</div>
                                        <div class="turnover__value">24.789.000 <span>VNĐ</span></div>
                                    </div>

                                    <div class="turnover__content">
                                        <div class="turnover__name">Giảm giá</i></div>
                                        <div class="turnover__value">1.123.000 <span>VNĐ</span></div>
                                    </div>

                                    <div class="turnover__content" style="background-color: #2f4f4f;">
                                        <div class="turnover__name">Thực tế</div>
                                        <div class="turnover__value">22.567.000 <span>VNĐ</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col_g l-12_g m-12_g">
                        <table class="table table-bordered table__product-sold">
                            <thead>
                                <tr>
                                    <th scope="col" class="table__title">STT</th>
                                    <th scope="col" class="table__title">Tên sản phẩm</th>
                                    <th scope="col" class="table__title">Số lượng bán ra</th>
                                    <th scope="col" class="table__title">Doanh thu trước giảm giá</th>
                                    <th scope="col" class="table__title">Doanh thu sau giảm giá</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th class="table__content" scope="row">1</th>
                                    <td>EDP Sauvage </td>
                                    <td class="table__content">03</td>
                                    <td class="table__content">1.500.000 VNĐ</td>
                                    <td class="table__content">1.300.000 VNĐ</td>
                                </tr>

                            </tbody>
                        </table>

                        <!-- Change page -->
                        <div class="change-page">
                            <a class="change-page__link" href=""><i class="fas fa-arrow-left change-page__icon"></i></a>
                            <span class="change-page__num">Trang 1</span>
                            <a class="change-page__link" href=""><i class="fas fa-arrow-right change-page__icon"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('page-js')
<script>
$(document).ready(function() {
  // Chart doughnut bill
  const data_doughnut = {
    labels: ['Đang xử lý', 'Đã xử lý','Đã hủy'],
    datasets: [{
      label: 'Biểu đồ thống kê đơn hàng',
      data: [5, 10, 3],
      borderWidth: 0.5,
      backgroundColor: ['#CB4335', '#1F618D', '#27AE60',],
    }]
  };

  // Removes the alpha channel from background colors
    function handleLeave(evt, item, legend) {
      legend.chart.data.datasets[0].backgroundColor.forEach((color, index, colors) => {
        colors[index] = color.length === 9 ? color.slice(0, -2) : color;
      });
      legend.chart.update();
    }

    // Append '4d' to the colors (alpha channel), except for the hovered index
    function handleHover(evt, item, legend) {
      legend.chart.data.datasets[0].backgroundColor.forEach((color, index, colors) => {
        colors[index] = index === item.index || color.length === 9 ? color : color + '4D';
      });
      legend.chart.update();
    }

    const config_doughnut = {
      type: 'doughnut',
      data: data_doughnut,
      options: {
        plugins: {
          legend: {
            onHover: handleHover,
            onLeave: handleLeave
          },
          title: {
            display: true,
            text: 'Biểu đồ thống kê đơn hàng'
            }
        },
      }
    };

    var ctx_doungut = document.getElementById('chart-doughnut-bill');
    new Chart(ctx_doungut, config_doughnut);

    // Chart doughnut turnover
    const data_doughnutTurnover = {
    labels: ['Thực thế', 'Khuyến mãi', 'Trước khuyến mãi'],
    datasets: [{
      label: 'Biểu đồ thống kê doanh thu',
      data: [20000000, 10000000, 2100000],
      borderWidth: 0.5,
      backgroundColor: ['#27AE60', '#1F618D', '#F1C40F'],
    }]
  };

  // Removes the alpha channel from background colors
    function handleLeave(evt, item, legend) {
      legend.chart.data.datasets[0].backgroundColor.forEach((color, index, colors) => {
        colors[index] = color.length === 9 ? color.slice(0, -2) : color;
      });
      legend.chart.update();
    }

    // Append '4d' to the colors (alpha channel), except for the hovered index
    function handleHover(evt, item, legend) {
      legend.chart.data.datasets[0].backgroundColor.forEach((color, index, colors) => {
        colors[index] = index === item.index || color.length === 9 ? color : color + '4D';
      });
      legend.chart.update();
    }

    const config_doughnutTurnover = {
      type: 'doughnut',
      data: data_doughnutTurnover,
      options: {
        plugins: {
          legend: {
            onHover: handleHover,
            onLeave: handleLeave
          },
          title: {
            display: true,
            text: 'Biểu đồ thống kê doanh thu'
            }
        },
      }
    };    

    var ctx_doungut = document.getElementById('chart-doughnut-turnover');
    new Chart(ctx_doungut, config_doughnutTurnover);


     // Chart doughnut Complete
     const data_doughnutComplete= {
    labels: ['Thực thế', 'Khuyến mãi', 'Trước khuyến mãi'],
    datasets: [{
      label: 'Biểu đồ thống kê doanh thu',
      data: [20000000, 10000000, 2100000],
      borderWidth: 0.5,
      backgroundColor: ['#27AE60', '#1F618D', '#F1C40F'],
    }]
  };

  // Removes the alpha channel from background colors
    function handleLeave(evt, item, legend) {
      legend.chart.data.datasets[0].backgroundColor.forEach((color, index, colors) => {
        colors[index] = color.length === 9 ? color.slice(0, -2) : color;
      });
      legend.chart.update();
    }

    // Append '4d' to the colors (alpha channel), except for the hovered index
    function handleHover(evt, item, legend) {
      legend.chart.data.datasets[0].backgroundColor.forEach((color, index, colors) => {
        colors[index] = index === item.index || color.length === 9 ? color : color + '4D';
      });
      legend.chart.update();
    }

    const config_doughnutComplete = {
      type: 'doughnut',
      data: data_doughnutComplete,
      options: {
        plugins: {
          legend: {
            onHover: handleHover,
            onLeave: handleLeave
          },
          title: {
            display: true,
            text: 'Biểu đồ thống kê doanh thu đã hoàn thành'
            }
        },
      }
    };
    var ctx_doungut_complete = document.getElementById('chart-doughnut-complete');
    new Chart(ctx_doungut_complete, config_doughnutComplete);
    // Filter Datepicker
    $( function() {
      $( "#datepicker" ).datepicker({
        prevText: "Tháng trước",
        nextText: "Tháng sau",
        dateFormat: "yy-mm-dd",
        dayNamesMin: ['Thứ 2', 'Thứ 3', 'Thứ 4', 'Thứ 5', 'Thứ 6', 'Thứ 7', 'Chủ nhật'],
        duration: "slow"
      });
    } );

    $( function() {
      $( "#datepicker2" ).datepicker({
        prevText: "Tháng trước",
        nextText: "Tháng sau",
        dateFormat: "yy-mm-dd",
        dayNamesMin: ['Thứ 2', 'Thứ 3', 'Thứ 4', 'Thứ 5', 'Thứ 6', 'Thứ 7', 'Chủ nhật'],
        duration: "slow"
      });
    }); 

    $('.select-form').change(function() {
      var select_value = $(this).val();
      var _token = $('input[name="_token"]').val();
      
      $.ajax({
          url: "{{url('/select-filter')}}",
          method: "POST",
          dataType: "JSON",
          data:{select_value:select_value,_token:_token},

          success:function(data) {
            //?
          }
        });
    })

    $('#btn-filter').click(function() {
      var _token = $('input[name="_token"]').val();
      var from_date = $('#datepicker').val();
      var to_date = $('#datepicker2').val();
      console.log(from_date, to_date);
      $.ajax({
          url: "{{url('/filter-by-date')}}",
          method: "POST",
          dataType: "JSON",
          data:{from_date:from_date,to_date:to_date,_token:_token},

          success:function(data) {
            //?
          }
        });
      });
});
</script>
<!-- Navbar -->
<script type="text/javascript">
    $(document).ready(function(){
      $('.nav_btn').click(function(){
        $('.mobile-nav-items').toggleClass('active');
      });
    });
</script>
@endsection