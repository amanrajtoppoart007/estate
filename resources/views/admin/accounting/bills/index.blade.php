@extends('admin.layout.app')
@section('head')
<link rel="stylesheet" href="{{asset('DataTable/datatables.min.css')}}">
@endsection
@section('breadcrumb')
  <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Bills</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                <li class="breadcrumb-item active">Bills</li>
              </ol>
            </div>
          </div>
        </div>
      </div>
  @endsection	
@section('content')

       
      
        <div class="card">
            <div class="card-header"> <h6> <strong>All Bills</strong> </h6> </div>
            <div class="card-body table-responsive">
              <table id="dataTable"  class="w-100 display table table-striped table-hover">
            <thead>
                <tr>
                    <th>Bill No.</th>
                    <th>Party</th>
                    <th>Amount</th>
                    <th>Type</th>
                    <th>Status</th>
                    <th>Due date</th>
                    <th>Action</th>
                </tr>
            </thead>
        </table>
            </div>
        </div>
        
     
      
     
       
@endsection
@section('script')
@section('modal')

@endsection
<script type="text/javascript" src="{{asset('plugin/jquery/jquery.base64.js')}}"></script>

 <script>
   
var fetchlink = "{{route('all.bills.fetch')}}";
var viewBillRoute    = "{{route('acc.invoice.view',['invoice'=>'123'])}}";
var viewBill = viewBillRoute.slice(0,-3);
      $(document).ready(function(){
  $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    
     
        var dataTable = $('#dataTable').DataTable({            
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
                    data: 'total_amount',
                    orderable: false
                },
                {
                    data: 'bill_type'
                },
                {
                    data: null
                },
                {
                    data: 'due_date'
                },
                 {
                    data: null
                },

            ],
            "columnDefs": [

                 {
                    "targets": 0,
                    orderable: true,
                    render: function( type, row, data, meta) {
                        return data.id;
                    }
                },
                 {
                    "targets": 1,
                    orderable: true,
                    render: function( type, row, data, meta) {
                        if(data.party!=null){
                            if(data.party.name!=null){
                                return data.party.name;
                            }else{
                        return '-';
                                }
                        }else{
                        return '-';
                        }
                    }
                },
                {
                    "targets": 4,
                    orderable: false,
                    render: function(type, row, data, meta) {
                      if(data.status=='1'){
                        var status = '<span class="badge bg-success">Paid</span>';
                      }else{
                        var status = '<span class="badge bg-danger">UnPaid</span>';
                      }
                        return status;
                    }
                },{
                    "targets": 6,
                    orderable: false,
                    render: function( type, row, data, meta) {
                       
                        return '<a href="'+viewBillRoute+$.base64.encode(data.id)+'" class="btn btn-primary text-white">View</a>';
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
                             messageTop: 'All Bills',
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