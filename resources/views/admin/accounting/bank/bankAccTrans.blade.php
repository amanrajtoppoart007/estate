@extends('admin.layout.app')
@section('head')
<link rel="stylesheet" href="{{asset('DataTable/datatables.min.css')}}">
<style>
    .headshadow{
        box-shadow: 0px 5px 5px 0px #487bb3;
    }
</style>
@endsection
@section('breadcrumb')
  <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">View Bank Accounts Transactions in system</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                <li class="breadcrumb-item active">Bank Accounts Transactions</li>
              </ol>
            </div>
          </div>
        </div>
      </div>
  @endsection
@section('content')



        <div class="card">
            <div class="card-header headshadow">
                <div class="row">
                <div class="col-md-8">
                    Bank Account: <strong> {{$account[0]->title}}</strong> <br>
                     Bank :<strong> {{$account[0]->bank}}</strong>
                </div>
                <div class="col-md-4">
                   Balance :<strong> {{number_format($balance,2)}}</strong>
                </div>
                </div>


            </div>
          <br>
            <div class="card-body table-responsive">
                <div class="row">
                    <div class="col-md-12"><a href="{{route('acc.bank.reconcile',['account'=>$account[0]->id])}}">Reconcile</a> </div>
                </div>
              <table id="dataTable"  class="w-100 display table table-striped table-hover">
            <thead>
                <tr>
                    <th>S No.</th>
                    <th>Remark</th>
                    <th>Credit</th>
                    <th>Debit</th>
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

var fetchlink   =  "{{route('acc.bank.tansactions')}}";
var viewInvoiceRoute    = "{{route('acc.invoice.view',['invoice'=>'123'])}}";
var createnewAcc    = "{{route('acc.bank.store')}}";
var viewInvoice = viewInvoiceRoute.slice(0,-3);
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
                    data: 'remark',
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

                            return data.remark;

                    }
                },
                 {
                    "targets": 2,
                    orderable: true,
                    render: function( type, row, data, meta) {
                        if(data.trans_type == 'CREDIT'){
                            return data.amount;
                        }else{
                        return '-';

                        }
                    }
                },
                 {
                    "targets": 3,
                    orderable: true,
                    render: function( type, row, data, meta) {
                        if(data.trans_type =='DEBIT'){

                            return data.amount;
                        }else{
                        return '-';

                        }
                    }
                },
            {
                    "targets": 4,
                    orderable: false,
                    render: function( type, row, data, meta) {

                        return '<a href="'+viewInvoice+$.base64.encode(data.id)+'" class="btn btn-primary text-white">View</a>';
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
                             messageTop: 'Account Transaction',
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
