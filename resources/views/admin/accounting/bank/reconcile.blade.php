@extends('admin.layout.app')
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

        <div class="row">
            <div class="col-md-12">

                    <div class="panel-body ">
                        <div class="tabbable">

                            <div class="tab-content">
                                <div class="" id="tab_1_1">
                                    <div class="divide-10"></div>
                                    <div class="row" style="font-size: 11px;">
                                        <div class="col-md-12 col-lg-12 col-sm-12">
                                            <div class="row">
                                            <div class="col-md-10 col-lg-10 col-sm-12">

                                            </div>
                                            <div class="col-md-2 col-lg-2 col-sm-12">

                                                    <form name="reconcile_form" id="reconcile_form" method="post">
                                                        <input type="hidden" name="systemTransactions" id="systemTransactions_trans">
                                                        <input type="hidden" name="bank_trans" id="bank_trans">
                                                        <input type="hidden" name="account" value="{{$account}}">

                                                        <button type="submit" class="btn btn-success"><i class="fa fa-recycle" aria-hidden="true"></i> Reconcile Selected</button>
                                                    </form>
                                            </div></div>

                                            <div class="col-md-4 col-lg-4 col-sm-12">
                                                <div class="btn-toolbar pull-right">

                                                </div>
                                            </div>


                                            <div class="row">
                                                <div class="col-md-6">

                                                    <p>System Transactions</p>
                                                    <table id="system_trans_dt" class="display nowrap responsive table table-striped table-bordered dataTable dtr-inline" style="width: 100%">
                                                        <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Date</th>
                                                            <th>Description</th>
                                                            <th>Debit</th>
                                                            <th>Credit</th>
                                                            <th>Payment Reference</th>
                                                            <th>Selection</th>

                                                        </tr>
                                                        </thead>
                                                    </table>
                                                    <div class="dt-more-container">
                                                        <button id="btn-example-load-more" style="display:none">Load More</button>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <p>Bank Statement</p>
                                                    <table id="bankStatementTable" class="display nowrap  table table-striped table-bordered dataTable dtr-inline" style="width: 100%">
                                                        <thead>
                                                        <tr>
                                                            <th>TXN ID</th>
                                                            <th>Selection</th>
                                                            <th>Date</th>
                                                            <th>Details</th>
                                                            <th>Debit</th>
                                                            <th>Credit</th>
                                                            <th>Description</th>
                                                        </tr>
                                                        </thead>
                                                    </table>
                                                    <div class="dt-more-container">
                                                        <button id="btn-example-load-more2" style="display:none">Load More</button>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tab_1_2">
                                </div>
                                <div class="tab-pane fade in active" id="tab_1_3">
                                </div>
                            </div>
                        </div>
                    </div>

            </div>
        </div>

    </div>





@endsection
@section('script')

<script type="text/javascript" src="{{asset('plugin/jquery/jquery.base64.js')}}"></script>
<script>

    {{--var fetchlink   =  "{{route('acc.bank.datatable')}}";--}}
    {{--var viewBanktransroute    = "{{route('acc.bank.tans',['account'=>'123'])}}";--}}
    {{--var createnewAcc    = "{{route('acc.bank.store')}}";--}}
    {{--var viewBanktrans = viewBanktransroute.slice(0,-3);--}}
    $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        $('#reconcile_form').submit(function(event) {



            if(!$("#systemTransactions_trans").val() ) {                      //if it is blank.
                alert('Please select a transaction from system transaction table');
                return false;
            }
            if(!$("#bank_trans").val() ) {                      //if it is blank.
                alert('Please select a transaction from bank transaction table');
                return false;
            }
            var formData = new FormData($(this)[0]);

            $.ajax({
                url: "{{route('store.reconciled.trans')}}",
                type: 'POST',
                dataType: 'json',
                data: formData,
                cache : false,
                processData: false,
                contentType: false,
                success: function(result)
                {

                    console.log(result.status);
                    if(result.status=='0'){

                    }else{

                  //      setTimeout(function() {
                     //       location.reload();
                     //   },1000);
                    }
                    //location.reload();
                },
                error: function(result)
                {
                    console.log(result);
                }
            });
            console.log(formData);
            event.preventDefault();
        });


        var dataTable = $('#system_trans_dt').DataTable({
            "order": [[ 0, "desc" ]],
            responsive: true,
            "processing": true,
            "serverSide": true,
            "ajax": {
                url:"{{route('acc.bank.tansactions.dt')}}",
                type: "post",
                "data": function ( d ) {
                    d.account  = '1';
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
                    data: 'id',
                    orderable: false
                },
                {
                    data: 'id',
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
                        return data.payment_date;
                    }
                },
                {
                    "targets": 3,
                    orderable: false,
                    render: function(type, row, data, meta) {
                        if(data.trans_type=='DEBIT'){
                           return  data.amount;
                        }else{
                           return '-';
                        }
                    }
                },  {
                    "targets": 4,
                    orderable: false,
                    render: function(type, row, data, meta) {
                        if(data.trans_type=='CREDIT'){
                           return  data.amount;
                        }else{
                           return '-';
                        }
                    }
                },
                {
                    "targets": 5,
                    orderable: false,
                    render: function( type, row, data, meta) {

                        return data.payment_ref;
                    }
                },{
                    "targets": 6,
                    orderable: false,
                    render: function( type, row, data, meta) {

                        return '<input type="checkbox" value="'+data.id+'">';
                    }
                }



            ],




        });
        var dataTable = $('#bankStatementTable').DataTable({
            "order": [[ 0, "desc" ]],
            responsive: true,
            "processing": true,
            "serverSide": true,
            "ajax": {
                url:"{{route('acc.bank.statement.dt')}}",
                type: "post",
                "data": function ( d ) {
                    d.account  = '1';
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
                    data: 'id',
                    orderable: false
                },
                {
                    data: 'id',
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
                }, {
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
                    orderable: false,
                    render: function( type, row, data, meta) {

                        return '<input type="checkbox" value="'+data.id+'">';
                    }
                },
                {
                    "targets": 2,
                    orderable: true,
                    render: function( type, row, data, meta) {
                        return data.trans_date;
                    }
                },
                {
                    "targets": 4,
                    orderable: false,
                    render: function(type, row, data, meta) {
                        if(data.trans_type=='DEBIT'){
                           return  data.amount;
                        }else{
                           return '-';
                        }
                    }
                },  {
                    "targets": 5,
                    orderable: false,
                    render: function(type, row, data, meta) {
                        if(data.trans_type=='CREDIT'){
                           return  data.amount;
                        }else{
                           return '-';
                        }
                    }
                },
                {
                    "targets": 6,
                    orderable: false,
                    render: function( type, row, data, meta) {

                        return '-';
                    }
                }



            ],




        });

        var systemTransactions = [];

        $("#system_trans_dt ").on('click','input[type="checkbox"]',function() {
            var checked = $(this).val();
            if ($(this).is(':checked')) {
                systemTransactions.push(checked);
            }else{
                systemTransactions.splice($.inArray(checked, systemTransactions),1);

            }
            systemTransactions = jQuery.unique(systemTransactions);
            console.log(systemTransactions);
            $("#systemTransactions_trans").val(systemTransactions);
        });
        var bank_trans = [];
        $("#bankStatementTable").on('click','input[type="checkbox"]',function() {
            var checked = $(this).val();
            if ($(this).is(':checked')) {
                bank_trans.push(checked);
            }else{
                bank_trans.splice($.inArray(checked, bank_trans),1);
            }
            bank_trans = jQuery.unique(bank_trans);
            console.log(bank_trans);
            $("#bank_trans").val(bank_trans);
        });


    });




</script>
@endsection
