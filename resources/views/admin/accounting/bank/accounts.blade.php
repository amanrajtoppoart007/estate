@extends('admin.layout.accounting')
@section('head')
<link rel="stylesheet" href="{{asset('DataTable/datatables.min.css')}}">
@endsection
@section('breadcrumb')
  <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Bank Accounts</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                <li class="breadcrumb-item active">Bank Accounts</li>
              </ol>
            </div>
          </div>
        </div>
      </div>
  @endsection
@section('content')



        <div class="card">
            <div class="card-header"> <h6> <strong>All Bank Accounts</strong> </h6> </div>
            <div class="row">
                <div class="col-md-8"></div>
                <div class="col-md-4 mt-2"><button  data-toggle="modal" data-target="#modalAddAcc" type="button" class="btn btn-primary float-right">Add new account</button></div>
            </div>
            <div class="card-body table-responsive">
              <table id="dataTable"  class="w-100 display table table-striped table-hover">
            <thead>
                <tr>
                    <th>S No.</th>
                    <th>Title</th>
                    <th>Bank</th>
                    <th>Remark</th>
                    <th>Status</th>

                    <th>Action</th>
                </tr>
            </thead>
        </table>
            </div>
        </div>





@endsection
@section('script')
@section('modal')
<div class="modal fade" id="modalAddAcc">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
              <form id="CreateNewAccForm">
            <div class="modal-header">
              <h4 class="modal-title">Add new bank account</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
             <div class="row">
                 <div class="col-md-12">
                     <label>Account Title</label>
                     <input type="text" autocomplete="off" class="form-control" name="title" placeholder="ex. Main Account 3123xxxxx" required>
                     <label>Bank Name</label>
                     <input type="text" autocomplete="off" class="form-control" name="bank" placeholder="Bank Name" required>
                    <label>Remark</label>
                    <textarea class="form-control" autocomplete="off" name="remark" placeholder="Any note"></textarea>
                </div>
             </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Add Account</button>
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

@endsection
<script type="text/javascript" src="{{asset('plugin/jquery/jquery.base64.js')}}"></script>
 <script>

var fetchlink   =  "{{route('acc.bank.datatable')}}";
var viewBanktransroute    = "{{route('acc.bank.tans',['account'=>'123'])}}";
var createnewAcc    = "{{route('acc.bank.store')}}";
var viewBanktrans = viewBanktransroute.slice(0,-3);
      $(document).ready(function(){
  $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).on('submit', '#CreateNewAccForm', function(e) {
    var formData = new FormData($(this)[0]);
    $.ajax({
        url: createnewAcc,
        type: 'POST',
        dataType: 'json',
        data: formData,
        cache : false,
        processData: false,
        contentType: false,
        success: function(result)
        {
          //console.log(result);
          if(result.status=='1'){
            alert(result.msg);

           setTimeout(function(){ location.reload(); }, 1000);

          }else{
            toast('error',result.msg,'top-center');
          }
        },
        error: function(result)
        {
            console.log(result);
        }
    });
        console.log(formData);
 event.preventDefault();
});



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
                    data: 'title',
                    orderable: false
                },
                {
                    data: 'bank',
                    orderable: false
                },
                {
                    data: 'remark'
                },
                {
                    data: null
                },

                 {
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

                        return '<a href="'+viewBanktrans+$.base64.encode(data.id)+'" class="btn btn-primary text-white">View</a>';
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
                             messageTop: 'All Invoices',
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
