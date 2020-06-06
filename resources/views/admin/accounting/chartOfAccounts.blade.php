@extends('admin.layout.app')

@section('head')

<link rel="stylesheet" href="{{asset('DataTable/datatables.min.css')}}">

@endsection

@section('breadcrumb')

  <div class="content-header">

        <div class="container-fluid">

          <div class="row mb-2">

            <div class="col-sm-6">

              <h1 class="m-0 text-dark">Chart of Accounts</h1>

            </div>

            <div class="col-sm-6">

              <ol class="breadcrumb float-sm-right">

              <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>

                <li class="breadcrumb-item active">Chart of Accounts</li>

              </ol>

            </div>

          </div>

        </div>

      </div>

  @endsection	

@section('content')



       

      

        <div class="card">

            <div class="card-header"> <h6> <strong>All Char of Accounts</strong> </h6> </div>

            <div class="row">

                <div class="col-md-8"></div>

                <div class="col-md-4 mt-2"><button  data-toggle="modal" data-target="#modalAddAcc" type="button" class="btn btn-primary float-right">Add new account</button></div>

            </div>

            <div class="card-body table-responsive">

              <table id="dataTables"  class="w-100 display table table-striped table-hover">

            <thead>

                <tr>

                    <th>S No.</th>

                    <th>Title</th>
                    <th>Code</th>
                   
                    <th>Status</th>

                    <th>Action</th>

                </tr>

            </thead>
            <tbody>
                @foreach($category as $cat)
                <tr>
                    <td colspan="5"><b>{{$cat->title}}</b></td>
                    
                </tr>
                 @foreach($accounts as $acc)
                 @if($acc->coa_category_id==$cat->id)
                <tr>
                    <td>#</td>
                       <td>-{{$acc->name}}</td>
                       <td>{{$acc->code}}</td>
                       <td></td>
                       <td></td>
                </tr>
                @if(if_has_child_accounts($acc->id)>0)
                 @foreach($accounts as $acc2)
                 @if($acc2->parent_id==$acc->id)
                  <tr>
                    <td>#</td>
                       <td><div class="ml-1">--{{$acc->name}}</div></td>
                       <td>{{$acc->code}}</td>
                       <td></td>
                       <td></td>
                </tr>
                @endif
                @endforeach
                @endif
                @endif

                @endforeach
                @endforeach
            </tbody>

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

              <h4 class="modal-title">Add new chart of account</h4>

              <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                <span aria-hidden="true">&times;</span>

              </button>

            </div>

            <div class="modal-body">

             <div class="row">

                 <div class="col-md-12">

                     <label>Account Code</label>

                     <input type="text" autocomplete="off" class="form-control" name="code" placeholder="ex. 100" >
                     <label>Account Category</label>
                     <select class="form-control" data-target="parent_acc" id="category" name="category" required>
                         @foreach($category as $cat)
                         <option value="{{$cat->id}}">{{$cat->title}}</option>
                         @endforeach
                     </select>
                     <label>Account Title</label>

                     <input type="text" autocomplete="off" class="form-control" name="title" placeholder="ex. Main Account 3123xxxxx" required>

                     <label>Parent Account (Optional)</label>

                    <select class="form-control" id="parent_acc" name="parent_account">
                        <option value="0" selected disabled>Select Parent account</option>
                         @foreach($accounts as $acc)
                         <option value="{{$acc->id}}">{{$acc->name}}</option>
                         @endforeach
                    </select>

                    <label>Note</label>

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

   

var fetchlink   =  "{{route('chart.of.accounts.dt')}}";

var viewBanktransroute    = "{{route('acc.bank.tans',['account'=>'123'])}}";

var createnewAcc    = "{{route('chart.of.accounts.store')}}";

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

            $("#modalAddAcc").modal('hide');

            alert(result.msg);

            location.reload();

          // setTimeout(function(){ location.reload(); }, 1000);

             

          }else{

            toast('error',result.msg,'top-center');

          }

        },

        error: function(result)

        {

            console.log(result);

        }

    });

       

 e.preventDefault();

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

                    data: 'code'

                },

                {

                    data: 'name',

                    orderable: false

                },

                {

                    data: 'parent',

                    orderable: false

                },

                {

                    data: 'id'

                },{

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

                    "targets": 3,

                    orderable: true,

                    render: function( type, row, data, meta) {
                        if(data.parent!=null){
                            return data.parent.name;
                        }else{
                        return '-';
                        }


                    }

                }, {

                    "targets": 4,

                    orderable: true,

                    render: function( type, row, data, meta) {
                        if(data.category!=null){
                            return data.category.title;
                        }else{
                        return '-';
                        }


                    }

                },

                {

                    "targets": 6,

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

                    "targets": 7,

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

                             messageTop: 'Chart of Accounts',

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

          

  $("#category").change(function function_name(argument) {
  var id = $(this).val();
  var targetEle = $(this).data("target");
  $.ajax({
        url: "{{route('get.coa.by.category')}}",
        type: 'POST',
        dataType: 'json',
        data: {id,id},
        
        success: function(result)
        {
          //console.log(result);
          if(result.status=='1'){
                document.getElementById(targetEle).options.length = 0;
                let targetSelect = document.getElementById(targetEle)
 targetSelect.options[targetSelect.options.length] = new Option('Select an account','0');
            $(result.accounts).each(function(index,value){
                daySelect = document.getElementById(targetEle);
 daySelect.options[daySelect.options.length] = new Option(value.name,value.id);
              });
         
          }else{
            //alert(result.msg);
          }
        },
        error: function(result)
        {
            console.log(result);
        }
    });
});

          

   

 </script>

@endsection