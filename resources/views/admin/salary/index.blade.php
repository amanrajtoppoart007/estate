@extends('admin.layout.app')
@section('breadcrumb')
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Salary Sheet List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Salary Sheet List</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
@endsection
@section('content')
  <div class="card">
      <div class="card-body">
         <table class="table table-bordered" id="dataTable">
             <thead class="bg-primary">
                 <tr>
                     <th>SHEET NO</th>
                     <th>START DATE</th>
                     <th>END DATE</th>
                     <th>WPS SHEET</th>
                     <th>STATUS</th>
                     <th>ACTION</th>
                 </tr>
             </thead>
         </table>
      </div>
  </div>
@endsection
@section('head')

@endsection
@section('js')

@endsection
@section('script')
  <script>
       $(document).ready(function(){

        function renderStatusBtn(data)
        {
            let status   =  (parseInt(data.status))?'Active':'InActive';
            let btnColor = (parseInt(data.status))?'success':'danger';
            return `<a href="javascript:void(0)" data-status="${data.status}" data-id="${data.id}" class="btn btn-${btnColor} mr-3 changeStatusBtn">${status}</a>`;
        }
        function renderActionBtn(data)
        {
            return `<a href="${data.edit_url}" class="btn btn-primary"><i class="fa fa-edit text-white"></i></a>`;
        }
        function viewWpsUrl(data)
        {
            return `<a href="${data.wps_url}" class="btn btn-primary"><i class="fa fa-eye text-white"></i></a>`;
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
                       url    : "{{route('salary.fetch')}}",
                       type   : "POST",
                       data   : null,
                       error  : function(jqXHR,textStatus,errorThrown)
                       {
                           $.swal(textStatus,errorThrown,'error');
                       }

                   },
                     columns : [
                                { data : "sheet_no",   name : "sheet_no"},
                                { data : "start_date", name : "start_date"},
                                { data : "end_date",   name : "end_date"},
                                { data : "wps_url",   name : "wps_url",
                                render: function( data, type, row, meta ) 
                                    {
                                      return viewWpsUrl(row);
                                    }
                                  },
                                { data : "status",     name : "status",
                                  render: function( data, type, row, meta ) 
                                    {
                                      return renderStatusBtn(row);
                                    }
                                },
                                {
                                    data : "edit_url", name: 'action',searchable: false,orderable :false,
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
              /* $(document).on('click','.changeStatusBtn',function(e){
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
                  $.fn_ajax('{{route('city.changeStatus')}}',params,fn_success,fn_error);
              }); */
       });
    </script>
@endsection