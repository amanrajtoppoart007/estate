@extends('admin.layout.accounting')
@section('css')
<style>
    table#dataTable thead, table#dataTable thead tr th{
        background-color: #ffffff !important;
    }
    table#dataTable thead tr th {
        color: #4c4545!important;
    }
</style>

@endsection
@section('breadcrumb')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Receipt Voucher</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Accounting</li>
                        <li class="breadcrumb-item active">Voucher</li>
                        <li class="breadcrumb-item active">Receipt</li>
                        <li class="breadcrumb-item active">All Receipt</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <!-- card 1 -->
    <div class="card card-default">
        <div class="card-header">
            <h3 class="card-title">All Receipt</h3>

            <div class="card-tools">

            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">

            <div class="row">
                <div class="col-md-6">

                </div>
                <div class="col-md-6 ">
                    <div class="form-inline float-right">
                    From <input type="text" class="form-control" value="20/02/2020">
                    To <input type="text" class="form-control" value="20/07/2020">
                    </div>
                </div>
            </div>
                    <div class="row">
                <div class="col-md-12">
                    <table class="table w-100 display table-striped table-hover" id="dataTable">
                        <thead >
                        <tr>
                            <th>Date</th>
                            <th>Voucher #</th>
                            <th>Received From</th>
                            <th>Amount</th>
                            <th>Tower</th>
                            <th>Flat</th>
                            <th>User</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                   


                        </tbody>
                    </table>
                </div>





            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-12">

                </div>
                <!-- /.col -->
            </div>


            <!-- /.row -->
        </div>
        <!-- /.card-body -->
        <div class="card-footer">

        </div>
    </div>
    <!-- /.card 1-->

@endsection
@section('script')
    <script>
        $(document).ready(function () {

            $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
    let fetchlink = "{{route('all.receipt.dt')}}";
let viewBanktrans = '';
            let dataTable = $('#dataTable').DataTable({
                "order": [[ 0, "desc" ]],
                responsive: true,
                "processing": true,
                "serverSide": true,
                "ajax": {
                    url:fetchlink,
                    type: "post",
                    "data": function ( d ) {
                        d.param  = '';
                    },
                    error: function() {
                        $(".users-error").html("");
                        $("#users").append('<tbody class="users-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
                        $("#users_processing").css("display", "none");

                    }
                },

                "aoColumns": [
                    {
                        data: 'id'
                    },
                    {
                        data: null,
                        orderable: false
                    },
                    {
                        data: null,
                        orderable: false
                    },
                    {
                        data: null
                    },
                    {
                        data: null
                    },

                    {
                        data: null
                    },{
                        data: null
                    },{
                        data: null
                    },

                ],
                "columnDefs": [

                    {
                        "targets": 0,
                        orderable: true,
                        visible:false,
                        render: function( type, row, data, meta) {
                            return data.id;
                        }
                    },
                    {
                        "targets": 1,
                        orderable: true,
                        render: function( type, row, data, meta) {
                            return '-';
                        }
                    },
                    {
                        "targets": 4,
                        orderable: false,
                        render: function(type, row, data, meta) {
                            if(data.is_disabled=='1'){
                                var status = '<span class="badge bg-danger">Disabled</span>';
                            }else{
                                var status = '<span class="badge bg-success">Active</span>';
                            }
                            return status;
                        }
                    },{
                        "targets": 5,
                        orderable: false,
                        render: function( type, row, data, meta) {

                            return '<a href="'+viewBanktrans+data.id+'" class="btn btn-primary text-white">View</a>';
                        }
                    }



                ],
                "dom": 'lBfrtip',
                buttons: [

                    'colvis',
                    {
                        extend: 'collection',
                        text: 'Export',


                        buttons: [{
                            extend: 'print',
                            messageTop: 'All Receipt',
                            exportOptions: {
                                columns: ':visible'
                            },
                            action: function(e, dt, button, config) {
                                //responsiveToggle(dt);
                                $.fn.DataTable.ext.buttons.print.action(e, dt, button, config);
                                //responsiveToggle(dt);
                            }
                        },
                            {
                                extend: 'pdf',
                                exportOptions: {
                                    columns: ':visible'
                                }

                            }, {
                                extend: 'excelHtml5',
                                exportOptions: {
                                    columns: ':visible'
                                }
                            }, {
                                extend: 'csv',
                                exportOptions: {
                                    columns: ':visible'
                                }

                            }, {
                                extend: 'copy',
                                exportOptions: {
                                    columns: ':visible'
                                }

                            },


                        ]
                    }
                ]



            });

        });
    </script>
@endsection
