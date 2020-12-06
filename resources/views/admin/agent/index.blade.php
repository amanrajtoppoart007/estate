@extends('admin.layout.base')
@section('content')



<!-- Content -->
    <div class="content container-fluid">
        <span class="float-right">Agent List</span>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{route('agent.index')}}">Agents</a></li>
                <li class="breadcrumb-item active" aria-current="page">Agent List</li>
            </ol>
        </nav>

        <div class="row gx-2 gx-lg-3 mt-3">
            <div class="col-lg-12 mb-3 mb-lg-0">

                <!-- Card -->
                <div class="card">
                    
                    <div class="card-body">
                      
    <div class="table-responsive">
            <table class="table table-bordered" id="dataTable">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th>Agent Type</th>
                        <th>Added Date</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
            </table>
        </div>
  </div>
</div>

                <!-- End Card -->

            </div>
        </div>


    </div>
    <!-- End Content -->
@endsection
@section('script')
<script>
     $(document).ready(function()
     {
        function renderStatusBtn(data)
        {
            let status   =  (parseInt(data.is_disabled))?'In Active':'Active';
            let btnColor = (parseInt(data.is_disabled))?'danger':'success';
            return `<a href="javascript:void(0)" data-status="${data.is_disabled}" data-id="${data.id}" class="btn btn-outline-${btnColor} mr-3 changeStatusBtn">${status}</a>`;
        }
        function renderActionBtn(data)
        {
            return `<a href="${data.edit_url}"  class="btn btn-soft-primary"><i class="fa fa-edit"></i></a> <a href="${data.view_url}"  class="btn btn-soft-primary"><i class="fa fa-eye"></i></a>`;
        }
        $.ajaxSetup({ headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
        var dataTable = $("#dataTable").dataTable({
                        dom   : '<"dt-buttons"Bf><"clear">lirtp',
                 processing   : true,
                   serverSide : true,
                    responsive: false,
                    stateSave: true,
                    "order": [[ 0, "desc" ]],
                        ajax  : {
                       url    : "{{route('agent.fetch')}}",
                       type   : "POST",
                       data   : null,
                       error  : function(jqXHR,textStatus,errorThrown)
                       {
                           $.swal(textStatus,errorThrown,'error');
                       }

                   },
                     columns : [
                                { data : "name", name : 'name'},
                                { data : "email", name : 'email'},
                                { data : "mobile", name : 'mobile'},
                                { data : "agent_type", name : 'agent_type'},
                                { data : "created_at", name : 'created_at' },
                                { data : "is_disabled", name : 'is_disabled',
                                    render: function( type, row, data, meta)
                                    {
                                      return renderStatusBtn(data);
                                    }
                                },
                                {
                                    data : null, name: 'action',searchable: false,orderable :false,
                                    render: function(data, type, row, meta)
                                    {
                                    return renderActionBtn(row);
                                    }
                                }
                              ],
                              "buttons": ['colvis',
                              {
                                    extend: 'copyHtml5',
                                    exportOptions: {
                                        columns: [0,1,2,3,4]
                                    }
                                },
                              {
                                    extend: 'csvHtml5',
                                    exportOptions: {
                                        columns: [0,1,2,3,4]
                                    }
                                },
                              {
                                    extend: 'excelHtml5',
                                    exportOptions: {
                                        columns: [0,1,2,3,4]
                                    }
                                },
                              {
                                    extend: 'pdfHtml5',
                                    exportOptions: {
                                        columns: [0,1,2,3,4]
                                    }
                                },
                              {
                                    extend: 'print',
                                    title : 'State List',
                                    exportOptions:
                                    {
                                        columns: [0,1,2,3,4]
                                    }
                                }
            ],
              });
              $(document).on('click','.changeStatusBtn',function(e){
                  let statusBtn = $(this);
                  e.preventDefault();
                  var params = {
                      'id'          : $(this).attr('data-id'),
                      'is_disabled' : $(this).attr('data-status')
                  }
                  function fn_success(result)
                  {
                      statusBtn.replaceWith(renderStatusBtn(result.data));
                  };
                  function fn_error(result)
                  {
                      toast('error',result.message,'top-right');
                  };
                  $.fn_ajax('{{route('agent.changeStatus')}}',params,fn_success,fn_error);
              });

   $('#add_data_form').on('submit',function(e){
           e.preventDefault();
           let params = $("#add_data_form").serialize();
           let url    = '{{route('country.store')}}';
           function fn_success(result)
           {
                $("#addModal").modal('hide');
                dataTable.api().ajax.reload();
           };
           function fn_error(result)
           {
              toast('error',result.message,'top-right');
           };
           $.fn_ajax(url,params,fn_success,fn_error);
         });
 $('#edit_data_form').on('submit',function(e){
           e.preventDefault();
           let params = $("#edit_data_form").serialize();
           let url    = '{{route('country.update')}}';
           function fn_success(result)
           {
                dataTable.api().draw(false);
                $("#editModal").modal('hide');
                $("#edit_data_form")[0].reset();
           }
           function fn_error(result)
           {
              toast('error',result.message,'top-right');
           }
           $.fn_ajax(url,params,fn_success,fn_error);
         });
     });
</script>
@endsection
