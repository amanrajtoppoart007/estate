@extends('admin.layout.app')
@section('breadcrumb')
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">dashboard</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
<style>
    canvas {
        -moz-user-select: none;
        -webkit-user-select: none;
        -ms-user-select: none;
    }
    .btn-app {
        width: 105px;
        height: 70px;
    }
</style>
@endsection
@section('content')

    <div class="row">
        <div class="col-12 col-sm-6 col-md-3">
            <a href="{{route('property.list')}}" >
            <div class="info-box">
                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-building"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text text-black-50">Total Properties</span>
                    <span class="info-box-number text-black-50">
                  {{get_item_count('properties',[])}}

                </span>
                </div>
                <!-- /.info-box-content -->
            </div>
            </a>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-12 col-sm-6 col-md-3">
            <a href="{{route('tenant.list')}}" class="small-box-footer">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-users"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text text-black-50">Number of Tenants</span>
                    <span class="info-box-number text-black-50">{{get_item_count('tenants',[])}}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            </a>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix hidden-md-up"></div>

        <div class="col-12 col-sm-6 col-md-3">
            <a href="{{route('propertySales.list')}}" class="small-box-footer">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text text-black-50">Total Property Sold</span>
                    <span class="info-box-number text-black-50">{{get_item_count('property_sales',[])}}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            </a>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-12 col-sm-6 col-md-3">
            <a href="{{route('booking-request.list')}}" class="small-box-footer">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-comments text-white"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text text-black-50">Total Enquiries</span>
                    <span class="info-box-number text-black-50">{{get_item_count('booking_request',[])}}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            </a>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
    </div>

    <div class="row">
        <div class="col-md-6">
            <!-- AREA CHART -->
            <div class="card ">
                <div class="card-header">
                    <h3 class="card-title">Rent</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="chart">
                        <div style="width:100%;">
                            <canvas id="chart-area"></canvas>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->

        </div>
        <div class="col-md-6">
            <!-- AREA CHART -->
            <div class="card ">
                <div class="card-header">
                    <h3 class="card-title">Property Sales</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="chart">
                        <div style="width:100%;">
                            <canvas id="sales-pie-chart"></canvas>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->

        </div>
    </div>
  <div class="row">
      <div class="col-md-12">
          <!-- AREA CHART -->
          <div class="card ">
              <div class="card-header">
                  <h3 class="card-title">Sales</h3>

                  <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                      </button>
                      <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                  </div>
              </div>
              <div class="card-body">
                  <div class="chart">
                      <div style="width:100%;">
                          <canvas id="canvas"></canvas>
                      </div>
                  </div>
              </div>
              <!-- /.card-body -->
          </div>
          <!-- /.card -->

      </div>
  </div>


    <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title">
                   <i class="fa fa-link" aria-hidden="true"></i> Quick Links
                </h5>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>

                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>

              <div class="card-body">
                  @php $quick_links = get_quick_links(); @endphp
                  @foreach($quick_links as $link)
                      <a href="{{route('rentEnquiry.list')}}" class="btn btn-app bg-gradient-{{$link['bg_color']}} text-{{$link['color']}}">
                          <i class="{{$link['icon']}}" aria-hidden="true"></i>
                          <span>{{$link['title']}}</span>
                      </a>
                  @endforeach


              </div>



            </div>

          </div>

        </div>
@endsection
@section('script')
    <script src="{{asset('plugin/chart.js/Chart.min.2.9.4.js')}}"></script>
    <script src="{{asset('plugin/chart.js/utils.js')}}"></script>

    <script>

        $(function () {

         /* Rent chart */
            var randomScalingFactor = function() {
                return Math.round(Math.random() * 100);
            };

            let configd = {
                type: 'doughnut',
                data: {
                    datasets: [{
                        data: [
                            60,
                            30,

                            10,
                        ],
                        backgroundColor: [
                            '#3dce3d',
                            window.chartColors.red,


                            window.chartColors.blue,
                        ],
                        label: 'Dataset 1'
                    }],
                    labels: [
                        'Available',
                        'Rented',
                        'Repairing'
                    ]
                },
                options: {
                    responsive: true,
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: 'Rental Property'
                    },
                    animation: {
                        animateScale: true,
                        animateRotate: true
                    }
                }
            };


/* sales pie chart */


            let configs = {
                type: 'pie',
                data: {
                    datasets: [{
                        data: [
                            '60',
                            '20',
                            '10',
                            '10',

                        ],
                        backgroundColor: [
                            '#3dce3d',
                            window.chartColors.orange,
                            window.chartColors.yellow,
                            window.chartColors.green,

                        ],
                        label: 'Dataset 1'
                    }],
                    labels: [
                        'Available',
                        'Sold',
                        'In Process',
                        'Repairing',

                    ]
                },
                options: {
                    responsive: true
                }
            };


















        /* Sales chart */
            let MONTHS = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
            let config = {
                type: 'line',
                data: {
                    labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                    datasets: [{
                        label: 'Sales',
                        borderColor: window.chartColors.red,
                        backgroundColor: window.chartColors.red,
                        data: [
                            50,
                            10,
                            20,
                            30,
                            40,
                            50,
                            60
                        ],
                    },  {
                        label: 'Expected',
                        borderColor: window.chartColors.green,
                        backgroundColor: window.chartColors.green,
                        data: [
                            40,
                            20,
                            30,
                            40,
                            50,
                            10,
                            40
                        ],
                    }]
                },
                options: {
                    responsive: true,
                    title: {
                        display: true,
                        text: 'Sales Report'
                    },
                    tooltips: {
                        mode: 'index',
                    },
                    hover: {
                        mode: 'index'
                    },
                    scales: {
                        xAxes: [{
                            scaleLabel: {
                                display: true,
                                labelString: 'Month'
                            }
                        }],
                        yAxes: [{
                            stacked: true,
                            scaleLabel: {
                                display: true,
                                labelString: 'Value'
                            }
                        }]
                    }
                }
            };

            window.onload = function() {
                let ctx = document.getElementById('canvas').getContext('2d');
                window.myLine = new Chart(ctx, config);

                let ctxs = document.getElementById('sales-pie-chart').getContext('2d');
                window.myPie = new Chart(ctxs, configs);

                let ctxd = document.getElementById('chart-area').getContext('2d');
                window.myDoughnut = new Chart(ctxd, configd);
            };









        });




    </script>
@endsection
