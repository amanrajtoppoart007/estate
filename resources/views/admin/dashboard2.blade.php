@extends('admin.layout.base')
@section('head')
    <link rel="stylesheet" type="text/css" href="{{asset('plugin/chart.js/Chart.min.css')}}">
@endsection
@section('content')
    <!-- Content -->
    <div class="content container-fluid">

        <!-- Stats -->
        <div class="row gx-2 gx-lg-3">
            <div class="col-sm-6 col-lg-3 mb-3 mb-lg-5">
                <!-- Card -->
                <a class="card card-hover-shadow h-100" href="#">
                    <div class="card-body">
                        <h6 class="card-subtitle">Total Properties</h6>

                        <div class="row align-items-center gx-2 mb-1">
                            <div class="col-6">
                                <span class="card-title h2">  {{get_item_count('properties',[])}}</span>
                            </div>

                            <div class="col-6">
                                <!-- Chart -->
                                <div class="chartjs-custom" style="height: 3rem;">
                                    <canvas class="js-chart"
                                            data-hs-chartjs-options='{
                                "type": "line",
                                "data": {
                                   "labels": ["1 May","2 May","3 May","4 May","5 May","6 May","7 May","8 May","9 May","10 May","11 May","12 May","13 May","14 May","15 May","16 May","17 May","18 May","19 May","20 May","21 May","22 May","23 May","24 May","25 May","26 May","27 May","28 May","29 May","30 May","31 May"],
                                   "datasets": [{
                                    "data": [21,20,24,20,18,17,15,17,18,30,31,30,30,35,25,35,35,40,60,90,90,90,85,70,75,70,30,30,30,50,72],
                                    "backgroundColor": ["rgba(55, 125, 255, 0)", "rgba(255, 255, 255, 0)"],
                                    "borderColor": "#377dff",
                                    "borderWidth": 2,
                                    "pointRadius": 0,
                                    "pointHoverRadius": 0
                                  }]
                                },
                                "options": {
                                   "scales": {
                                     "yAxes": [{
                                       "display": false
                                     }],
                                     "xAxes": [{
                                       "display": false
                                     }]
                                   },
                                  "hover": {
                                    "mode": "nearest",
                                    "intersect": false
                                  },
                                  "tooltips": {
                                    "postfix": "k",
                                    "hasIndicator": true,
                                    "intersect": false
                                  }
                                }
                              }'>
                                    </canvas>
                                </div>
                                <!-- End Chart -->
                            </div>
                        </div>
                        <!-- End Row -->

                        <span class="badge badge-soft-success">
                  <i class="tio-trending-up"></i> 12.5%
                </span>
                        <span class="text-body font-size-sm ml-1">from 70,104</span>
                    </div>
                </a>
                <!-- End Card -->
            </div>

            <div class="col-sm-6 col-lg-3 mb-3 mb-lg-5">
                <!-- Card -->
                <a class="card card-hover-shadow h-100" href="#">
                    <div class="card-body">
                        <h6 class="card-subtitle">Number Of Tenants</h6>

                        <div class="row align-items-center gx-2 mb-1">
                            <div class="col-6">
                                <span class="card-title h2">{{get_item_count('tenants',[])}}</span>
                            </div>

                            <div class="col-6">
                                <!-- Chart -->
                                <div class="chartjs-custom" style="height: 3rem;">
                                    <canvas class="js-chart"
                                            data-hs-chartjs-options='{
                                "type": "line",
                                "data": {
                                   "labels": ["1 May","2 May","3 May","4 May","5 May","6 May","7 May","8 May","9 May","10 May","11 May","12 May","13 May","14 May","15 May","16 May","17 May","18 May","19 May","20 May","21 May","22 May","23 May","24 May","25 May","26 May","27 May","28 May","29 May","30 May","31 May"],
                                   "datasets": [{
                                    "data": [21,20,24,20,18,17,15,17,30,30,35,25,18,30,31,35,35,90,90,90,85,100,120,120,120,100,90,75,75,75,90],
                                    "backgroundColor": ["rgba(55, 125, 255, 0)", "rgba(255, 255, 255, 0)"],
                                    "borderColor": "#377dff",
                                    "borderWidth": 2,
                                    "pointRadius": 0,
                                    "pointHoverRadius": 0
                                  }]
                                },
                                "options": {
                                   "scales": {
                                     "yAxes": [{
                                       "display": false
                                     }],
                                     "xAxes": [{
                                       "display": false
                                     }]
                                   },
                                  "hover": {
                                    "mode": "nearest",
                                    "intersect": false
                                  },
                                  "tooltips": {
                                    "postfix": "%",
                                    "hasIndicator": true,
                                    "intersect": false
                                  }
                                }
                              }'>
                                    </canvas>
                                </div>
                                <!-- End Chart -->
                            </div>
                        </div>
                        <!-- End Row -->

                        <span class="badge badge-soft-success">
                  <i class="tio-trending-up"></i> 1.7%
                </span>
                        <span class="text-body font-size-sm ml-1">from 29.1%</span>
                    </div>
                </a>
                <!-- End Card -->
            </div>

            <div class="col-sm-6 col-lg-3 mb-3 mb-lg-5">
                <!-- Card -->
                <a class="card card-hover-shadow h-100" href="#">
                    <div class="card-body">
                        <h6 class="card-subtitle">Total Property Sold</h6>

                        <div class="row align-items-center gx-2 mb-1">
                            <div class="col-6">
                                <span class="card-title h2">{{get_item_count('property_sales',[])}}</span>
                            </div>

                            <div class="col-6">
                                <!-- Chart -->
                                <div class="chartjs-custom" style="height: 3rem;">
                                    <canvas class="js-chart"
                                            data-hs-chartjs-options='{
                                "type": "line",
                                "data": {
                                   "labels": ["1 May","2 May","3 May","4 May","5 May","6 May","7 May","8 May","9 May","10 May","11 May","12 May","13 May","14 May","15 May","16 May","17 May","18 May","19 May","20 May","21 May","22 May","23 May","24 May","25 May","26 May","27 May","28 May","29 May","30 May","31 May"],
                                   "datasets": [{
                                    "data": [25,18,30,31,35,35,60,60,60,75,21,20,24,20,18,17,15,17,30,120,120,120,100,90,75,90,90,90,75,70,60],
                                    "backgroundColor": ["rgba(55, 125, 255, 0)", "rgba(255, 255, 255, 0)"],
                                    "borderColor": "#377dff",
                                    "borderWidth": 2,
                                    "pointRadius": 0,
                                    "pointHoverRadius": 0
                                  }]
                                },
                                "options": {
                                   "scales": {
                                     "yAxes": [{
                                       "display": false
                                     }],
                                     "xAxes": [{
                                       "display": false
                                     }]
                                   },
                                  "hover": {
                                    "mode": "nearest",
                                    "intersect": false
                                  },
                                  "tooltips": {
                                    "postfix": "%",
                                    "hasIndicator": true,
                                    "intersect": false
                                  }
                                }
                              }'>
                                    </canvas>
                                </div>
                                <!-- End Chart -->
                            </div>
                        </div>
                        <!-- End Row -->

                        <span class="badge badge-soft-danger">
                  <i class="tio-trending-down"></i> 4.4%
                </span>
                        <span class="text-body font-size-sm ml-1">from 61.2%</span>
                    </div>
                </a>
                <!-- End Card -->
            </div>

            <div class="col-sm-6 col-lg-3 mb-3 mb-lg-5">
                <!-- Card -->
                <a class="card card-hover-shadow h-100" href="#">
                    <div class="card-body">
                        <h6 class="card-subtitle">Total Inquiry</h6>

                        <div class="row align-items-center gx-2 mb-1">
                            <div class="col-6">
                                <span class="card-title h2">{{get_item_count('booking_request',[])}}</span>
                            </div>

                            <div class="col-6">
                                <!-- Chart -->
                                <div class="chartjs-custom" style="height: 3rem;">
                                    <canvas class="js-chart"
                                            data-hs-chartjs-options='{
                                "type": "line",
                                "data": {
                                   "labels": ["1 May","2 May","3 May","4 May","5 May","6 May","7 May","8 May","9 May","10 May","11 May","12 May","13 May","14 May","15 May","16 May","17 May","18 May","19 May","20 May","21 May","22 May","23 May","24 May","25 May","26 May","27 May","28 May","29 May","30 May","31 May"],
                                   "datasets": [{
                                    "data": [21,20,24,15,17,30,30,35,35,35,40,60,12,90,90,85,70,75,43,75,90,22,120,120,90,85,100,92,92,92,92],
                                    "backgroundColor": ["rgba(55, 125, 255, 0)", "rgba(255, 255, 255, 0)"],
                                    "borderColor": "#377dff",
                                    "borderWidth": 2,
                                    "pointRadius": 0,
                                    "pointHoverRadius": 0
                                  }]
                                },
                                "options": {
                                   "scales": {
                                     "yAxes": [{
                                       "display": false
                                     }],
                                     "xAxes": [{
                                       "display": false
                                     }]
                                   },
                                  "hover": {
                                    "mode": "nearest",
                                    "intersect": false
                                  },
                                  "tooltips": {
                                    "postfix": "k",
                                    "hasIndicator": true,
                                    "intersect": false
                                  }
                                }
                              }'>
                                    </canvas>
                                </div>
                                <!-- End Chart -->
                            </div>
                        </div>
                        <!-- End Row -->

                        <span class="badge badge-soft-success">
                             <i class="tio-trending-up"></i> 25</span>
                        <span class="text-body font-size-sm ml-1">New Enquiry</span>
                    </div>
                </a>
                <!-- End Card -->
            </div>
        </div>
        <!-- End Stats -->

        <!-- 2 cards -->
        <div class="row gx-2 gx-lg-3">
            <div class="col-lg-6 mb-3 mb-lg-0">
                <!-- Card -->
                <div class="card h-100">
                    <!-- Header -->
                    <div class="card-header">
                        <h5 class="card-header-title">Rentable Properties</h5>



                    </div>
                    <!-- End Header -->

                    <!-- Body -->
                    <div class="card-body">
                        <!-- Chart -->
                        <div class="chartjs-custom mx-auto" style="height: 20rem;">

                                <canvas id="pie-chart"></canvas>

                        </div>
                        <!-- End Chart -->


                    </div>
                    <!-- End Body -->
                </div>
                <!-- End Card -->
            </div>

            <div class="col-lg-6">
                <!-- Card -->
                <div class="card h-100">
                    <!-- Header -->
                    <div class="card-header">
                        <h5 class="card-header-title">Reports overview</h5>

                        <!-- Unfold -->
                        <div class="hs-unfold">
                            <a class="js-hs-unfold-invoker btn btn-icon btn-sm btn-ghost-secondary rounded-circle" href="javascript:;"
                               data-hs-unfold-options='{
                       "target": "#reportsOverviewDropdown1",
                       "type": "css-animation"
                     }'>
                                <i class="tio-more-vertical"></i>
                            </a>

                            <div id="reportsOverviewDropdown1" class="hs-unfold-content dropdown-unfold dropdown-menu dropdown-menu-right mt-1">
                                <span class="dropdown-header">Settings</span>

                                <a class="dropdown-item" href="#">
                                    <i class="tio-share dropdown-item-icon"></i>
                                    Share reports
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="tio-download-to dropdown-item-icon"></i>
                                    Download
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="tio-alt dropdown-item-icon"></i>
                                    Connect other apps
                                </a>

                                <div class="dropdown-divider"></div>

                                <span class="dropdown-header">Feedback</span>

                                <a class="dropdown-item" href="#">
                                    <i class="tio-chat-outlined dropdown-item-icon"></i>
                                    Report
                                </a>
                            </div>
                        </div>
                        <!-- End Unfold -->
                    </div>
                    <!-- End Header -->

                    <!-- Body -->
                    <div class="card-body">
                        <span class="h1 d-block mb-4">  92,913 AED</span>

                        <!-- Progress -->
                        <div class="progress rounded-pill mb-2">
                            <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" data-toggle="tooltip" data-placement="top" title="Gross value"></div>
                            <div class="progress-bar opacity" role="progressbar" style="width: 33%" aria-valuenow="33" aria-valuemin="0" aria-valuemax="100" data-toggle="tooltip" data-placement="top" title="Net volume from sales"></div>
                            <div class="progress-bar opacity-xs" role="progressbar" style="width: 9%" aria-valuenow="9" aria-valuemin="0" aria-valuemax="100" data-toggle="tooltip" data-placement="top" title="New volume from sales"></div>
                        </div>

                        <div class="d-flex justify-content-between mb-4">
                            <span>0%</span>
                            <span>100%</span>
                        </div>
                        <!-- End Progress -->

                        <!-- Table -->
                        <div class="table-responsive">
                            <table class="table table-lg table-nowrap card-table mb-0">
                                <tr>
                                    <th scope="row">
                                        <span class="legend-indicator bg-primary"></span>Gross value
                                    </th>
                                    <td>3,500.71 AED</td>
                                    <td>
                                        <span class="badge badge-soft-success">+12.1%</span>
                                    </td>
                                </tr>

                                <tr>
                                    <th scope="row">
                                        <span class="legend-indicator bg-primary opacity"></span>Net volume from sales
                                    </th>
                                    <td>2,980.45 AED</td>
                                    <td>
                                        <span class="badge badge-soft-warning">+6.9%</span>
                                    </td>
                                </tr>

                                <tr>
                                    <th scope="row">
                                        <span class="legend-indicator bg-primary opacity-xs"></span>New volume from sales
                                    </th>
                                    <td>950.00 AED</td>
                                    <td>
                                        <span class="badge badge-soft-danger">-1.5%</span>
                                    </td>
                                </tr>

                                <tr>
                                    <th scope="row">
                                        <span class="legend-indicator"></span>Other
                                    </th>
                                    <td>32</td>
                                    <td>
                                        <span class="badge badge-soft-success">1.9%</span>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <!-- End Table -->
                    </div>
                    <!-- End Body -->
                </div>
                <!-- End Card -->
            </div>
        </div>
        <!-- end 2 cards -->
        <div class="row gx-2 gx-lg-3 mt-3">
            <div class="col-lg-12 mb-3 mb-lg-0">
                <!-- Card -->
                <div class="card h-100">
                    <!-- Header -->
                    <div class="card-header">
                        <h5 class="card-header-title">Properties</h5>



                    </div>
                    <!-- End Header -->

                    <!-- Body -->
                    <div class="card-body">
                        <!-- Chart -->
                        <div class="chartjs-custom mx-auto" >

                            <canvas id="all-property-status-chart"></canvas>

                        </div>
                        <!-- End Chart -->


                    </div>
                    <!-- End Body -->
                </div>
                <!-- End Card -->
            </div>
        </div>


    </div>
    <!-- End Content -->
@endsection
@section('script')

    <script src="{{asset('plugin/chart.js/chart.js')}}"></script>



    <script>

        let randomScalingFactor = function() {
            return Math.round(Math.random() * 100);
        };

        let config = {
            type: 'pie',

            data: {
                datasets: [{
                    data: [
                        60,
                        40,

                    ],
                    backgroundColor: [
                       '#FF8C00',

                        '#fefaf5',
                    ],
                    label: 'Property Rent'
                }],
                labels: [
                    'Rented',
                    'Vacant',

                ]
            },
            options: {
                responsive: true,
                legend: {
                    position: 'bottom',
                }
            }
        };







        let MONTHS = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

        let barChartData = {
            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
            datasets: [{
                label: 'Property Sale',
                backgroundColor: '#FF8C00',
                borderColor: '#FF8C00',
                borderWidth: 1,
                data: [
                  15,20,80,25,50,30,70
                ]
            }, {
                label: 'Property Rented',
                backgroundColor: '#7e81b5',
                borderColor: '#7e81b5',
                borderWidth: 1,
                data: [
                    10,70,30,25,50,30,70
                ]
            }]

        };

        let propertyChartConfig = {
            type: 'bar',
            data: barChartData,
            options: {
                responsive: true,
                legend: {
                    position: 'bottom',
                },
                title: {
                    display: true,
                    text: 'Property Status'
                }
            }
        };








/*  chart loader */
        window.onload = function() {
            let ctx = document.getElementById('pie-chart').getContext('2d');
            window.myPie = new Chart(ctx, config);

            let ctx2 = document.getElementById('all-property-status-chart').getContext('2d');
            window.myBar = new Chart(ctx2,propertyChartConfig);
        };

    </script>

@endsection
