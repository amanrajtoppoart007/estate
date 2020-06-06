@extends('admin.layout.app')
@section('head')
<link rel="stylesheet" href="{{asset('DataTable/datatables.min.css')}}">
@endsection
@section('breadcrumb')
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Task List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Task List</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
@endsection
@section('content')
    <div class="items_list bg_transparent color-secondery icon_default">
        <a href="{{route('task.create')}}" class="btn btn-primary color-primary mb-4 float-right">Add New Task</a>
        <table id="dataTable"  class="w-100 display table table-striped table-hover">
            <thead>
                <tr>
                    <th>Task Code</th>
                    <th>Task</th>
                    <th>Date & Time</th>
                    <th>DeadLine</th>
                    <th>Building</th>
                    <th>Unit Code</th>
                    <th>Flat No.</th>
                    <th>Assignee</th>
                    <th>Work Status</th>
                    <th>Priority</th>
                    <th>Action</th>
                </tr>
            </thead>
        </table>
    </div>
@endsection
@section('script')
<script>
     $(document).ready(function()
     {
        function renderTaskStatus(row)
        {
            switch (row.status)
            {
                case 0:
                    status   = 'PENDING';
                    textColor = 'danger';
                    break;
                case 1:
                    status   = 'WORKING';
                    textColor = 'info';
                    break;
                case 2:
                    status   = 'COMPLETED';
                    textColor = 'success';
                    break;
                case 3:
                    status   = 'ON-HOLD';
                    textColor = 'warning';
                    break;
                case 4:
                    status   = 'IN-REVIEW';
                    textColor = 'primary';
                    break;

                default:
                    status   = 'PENDING';
                    textColor = 'danger';
                    break;
            }
            return `<a href="javascript:void(0)" data-status="${row.status}" data-id="${row.id}" class="text-${textColor} mr-3 changeStatusBtn">${status}</a>`;
        }
        function renderPriority(row)
        {
            switch (row.priority)
            {
                case 1:
                    status    = 'EMERGENCY';
                    textColor = 'danger';
                    break;
                case 2:
                    status    = 'HIGH';
                    textColor = 'warning';
                    break;
                case 3:
                    status    = 'NORMAL';
                    textColor = 'success';
                    break;
                case 4:
                    status    = 'LOW';
                    textColor = 'info';
                    break;

                default:
                    status    = 'NORMAL';
                    textColor = 'success';
                    break;
            }
            return `<a href="javascript:void(0)" data-status="${row.status}" data-id="${row.id}" class="text-${textColor} mr-3 changeStatusBtn">${status}</a>`;
        }
        function renderActionBtn(row)
        {
            return `<a  href="${row.task_view_url}"  class="btn btn-primary"><i class="fa fa-eye text-white"></i>View</a>`;
        }

        $.ajaxSetup({ headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
        var dataTable = $("#dataTable").dataTable({
                        dom   : '<"dt-buttons"Bf><"clear">lirtp',
                 processing   : true,
                   serverSide : true,
                    responsive: true,
                    stateSave: true,
                    "order": [[ 0, "desc" ]],
                        ajax  : {
                       url    : "{{route('task.fetch')}}",
                       type   : "POST",
                       data   : null,
                       error  : function(jqXHR,textStatus,errorThrown)
                       {
                           $.swal(textStatus,errorThrown,'error');
                       }

                   },
                     columns : [
                                { data : "task_code",  name : "task_code"},
                                { data : "task_title", name : "task_title"},
                                { data : "created_at", name : "created_at"},
                                { data : "deadline", name : "deadline"},
                                { data : "building_name", name : "building_name"},
                                { data : "unit_code", name : "unit_code"},
                                { data : "flat_number", name : "flat_number"},
                                { data : "assignee_name",name : "assignee_name"},
                                 {
                                     data: "status", name: "status",
                                     render: function (data, type, row, meta) {
                                         return renderTaskStatus(row);
                                     }
                                 },
                                { data : "priority",   name : "priority",
                                  render: function( data, type, row, meta )
                                    {
                                      return renderPriority(row);
                                    }
                                 },

                                {
                                    data : null, name: "action",searchable: false,orderable :false,
                                    render: function( data, type, row, meta )
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
                  return false;
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
                  $.fn_ajax('{{route('state.changeStatus')}}',params,fn_success,fn_error);
              });

   $('#add_data_form').on('submit',function(e){
           e.preventDefault();
           var params = new FormData(document.getElementById('add_data_form'));
           var url    = '{{route('state.store')}}';
           function fn_success(result)
           {
                $("#addModal").modal('hide');
                dataTable.api().ajax.reload(null,true);
           };
           function fn_error(result)
           {
              toast('error',result.message,'top-right');
           };
           $.fn_ajax_multipart(url,params,fn_success,fn_error);
         });
 $('#edit_data_form').on('submit',function(e){
           e.preventDefault();
           var params = new FormData(document.getElementById('edit_data_form'));
           var url    = '{{route('state.update')}}';
           function fn_success(result)
           {
               toast('success',result.message,'top-right');
                dataTable.api().draw(false);
                $("#editModal").modal('hide');
                $("#edit_data_form")[0].reset();
           };
           function fn_error(result)
           {
              toast('error',result.message,'top-right');
           }
           $.fn_ajax_multipart(url,params,fn_success,fn_error);
         });
$(document).on('click','.editModalOpenBtn',function(e){
           e.preventDefault();
           var params = { id : $(this).attr('data-id')};
           var url    = '{{route('state.show')}}';
           function fn_success(result)
           {
                $("#edit_id").val(result.data.id);
                $("#edit_name").val(result.data.name);
                $("#edit_country_id").val(result.data.country_id);
                $("#editModal").modal('show');
           };
           function fn_error(result)
           {
              toast('error',result.message,'top-right');
           }
           $.fn_ajax(url,params,fn_success,fn_error);
         });
     });
</script>
@endsection
