@extends('admin.layout.base')
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
    <!-- Content -->
    <div class="content container-fluid">
        <span class="float-right">Owners</span>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Property Management</a></li>
                <li class="breadcrumb-item active" aria-current="page">Owners</li>
            </ol>

        </nav>

        <div class="row gx-2 gx-lg-3 mt-3">
            <div class="col-lg-12 mb-3 mb-lg-0">

                <!-- Card -->
                <div class="card">
                    <!-- Header -->
                    <div class="card-header">
                        <div class="row justify-content-between align-items-center flex-grow-1">
                            <div class="col-sm-6 col-md-4 mb-3 mb-sm-0">
                                <form>
                                    <!-- Search -->
                                    <div class="input-group input-group-merge input-group-flush">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="tio-search"></i>
                                            </div>
                                        </div>
                                        <input id="datatableSearch" type="search" class="form-control" placeholder="Search users" aria-label="Search users">
                                    </div>
                                    <!-- End Search -->
                                </form>
                            </div>

                            <div class="col-sm-6">
                                <div class="d-sm-flex justify-content-sm-end align-items-sm-center">
                                    <!-- Datatable Info -->
                                    <div id="datatableCounterInfo" class="mr-2 mb-2 mb-sm-0" style="display: none;">
                                        <div class="d-flex align-items-center">
                      <span class="font-size-sm mr-3">
                        <span id="datatableCounter">0</span>
                        Selected
                      </span>
                                            <a class="btn btn-sm btn-outline-danger" href="javascript:;">
                                                <i class="tio-delete-outlined"></i> Delete
                                            </a>
                                        </div>
                                    </div>
                                    <!-- End Datatable Info -->
                                    <a href="{{route('task.create')}}" class="btn btn-outline-alhoor mr-2"> <i class="tio-add mr-1"></i>Create New</a>
                                    <!-- Unfold -->
                                    <div class="hs-unfold mr-2">
                                        <a class="js-hs-unfold-invoker btn btn-sm btn-white dropdown-toggle" href="javascript:;"
                                           data-hs-unfold-options='{
                         "target": "#usersExportDropdown",
                         "type": "css-animation"
                       }'>
                                            <i class="tio-download-to mr-1"></i> Export
                                        </a>

                                        <div id="usersExportDropdown" class="hs-unfold-content dropdown-unfold dropdown-menu dropdown-menu-sm-right">
                                            <span class="dropdown-header">Options</span>
                                            <a id="export-copy" class="dropdown-item" href="javascript:;">
                                                <img class="avatar avatar-xss avatar-4by3 mr-2" src="{{asset('theme/front/assets/svg/illustrations/copy.svg')}}" alt="Image Description">
                                                Copy
                                            </a>
                                            <a id="export-print" class="dropdown-item" href="javascript:;">
                                                <img class="avatar avatar-xss avatar-4by3 mr-2" src="{{asset('theme/front/assets/svg/illustrations/print.svg')}}" alt="Image Description">
                                                Print
                                            </a>
                                            <div class="dropdown-divider"></div>
                                            <span class="dropdown-header">Download options</span>
                                            <a id="export-excel" class="dropdown-item" href="javascript:;">
                                                <img class="avatar avatar-xss avatar-4by3 mr-2" src="{{asset('theme/front/assets/svg/brands/excel.svg')}}" alt="Image Description">
                                                Excel
                                            </a>
                                            <a id="export-csv" class="dropdown-item" href="javascript:;">
                                                <img class="avatar avatar-xss avatar-4by3 mr-2" src="{{asset('theme/front/assets/svg/components/placeholder-csv-format.svg')}}" alt="Image Description">
                                                .CSV
                                            </a>
                                            <a id="export-pdf" class="dropdown-item" href="javascript:;">
                                                <img class="avatar avatar-xss avatar-4by3 mr-2" src="{{asset('theme/front/assets/svg/brands/pdf.svg')}}" alt="Image Description">
                                                PDF
                                            </a>
                                        </div>
                                    </div>
                                    <!-- End Unfold -->


                                </div>
                            </div>
                        </div>
                        <!-- End Row -->
                    </div>
    <div class="table-responsive datatable-custom">

        <table id="datatable"  class="w-100 display table table-striped table-hover">
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
                    <!-- Footer -->
                    <div class="card-footer">
                        <!-- Pagination -->
                        <div class="row justify-content-center justify-content-sm-between align-items-sm-center">
                            <div class="col-sm mb-2 mb-sm-0">
                                <div class="d-flex justify-content-center justify-content-sm-start align-items-center">
                                    <span class="mr-2">Showing:</span>

                                    <!-- Select -->
                                    <select id="datatableEntries" class="js-select2-custom"
                                            data-hs-select2-options='{
                            "minimumResultsForSearch": "Infinity",
                            "customClass": "custom-select custom-select-sm custom-select-borderless",
                            "dropdownAutoWidth": true,
                            "width": true
                          }'>
                                        <option value="10" selected>10</option>
                                        <option value="15" >15</option>
                                        <option value="20">20</option>
                                    </select>
                                    <!-- End Select -->

                                    <span class="text-secondary mr-2">of</span>

                                    <!-- Pagination Quantity -->
                                    <span id="datatableWithPaginationInfoTotalQty"></span>
                                </div>
                            </div>

                            <div class="col-sm-auto">
                                <div class="d-flex justify-content-center justify-content-sm-end">
                                    <!-- Pagination -->
                                    <nav id="datatablePagination" aria-label="Activity pagination"></nav>
                                </div>
                            </div>
                        </div>
                        <!-- End Pagination -->
                    </div>
                    <!-- End Footer -->
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
         // initialization of select2
         $('.js-select2-custom').each(function () {
             let select2 = $.HSCore.components.HSSelect2.init($(this));
         });

         // initialization of counters
         $('.js-counter').each(function() {
             let counter = new HSCounter($(this)).init();
         });
        let datatable = $("#datatable").dataTable({
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
            dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'copy',
                    className: 'd-none'
                },
                {
                    extend: 'excel',
                    className: 'd-none'
                },
                {
                    extend: 'csv',
                    className: 'd-none'
                },
                {
                    extend: 'pdf',
                    className: 'd-none'
                },
                {
                    extend: 'print',
                    className: 'd-none'
                },
            ],
            select: {
                style: 'multi',
                selector: 'td:first-child input[type="checkbox"]',
                classMap: {
                    checkAll: '#datatableCheckAll',
                    counter: '#datatableCounter',
                    counterInfo: '#datatableCounterInfo'
                }
            },
            language: {
                zeroRecords: '<div class="text-center p-4">' +
                    '<img class="mb-3" src="{{asset('theme/front/assets/svg/illustrations/sorry.svg')}}" alt="Image Description" style="width: 7rem;">' +
                    '<p class="mb-0">No data to show</p>' +
                    '</div>'
            }
              });

         $('#export-copy').click(function() {
             datatable.button('.buttons-copy').trigger()
         });

         $('#export-excel').click(function() {
             datatable.button('.buttons-excel').trigger()
         });

         $('#export-csv').click(function() {
             datatable.button('.buttons-csv').trigger()
         });

         $('#export-pdf').click(function() {
             datatable.button('.buttons-pdf').trigger()
         });

         $('#export-print').click(function() {
             datatable.button('.buttons-print').trigger()
         });

         $('.js-datatable-filter').on('change', function() {
             let $this = $(this),
                 elVal = $this.val(),
                 targetColumnIndex = $this.data('target-column-index');

             datatable.column(targetColumnIndex).search(elVal).draw();
         });

         $('#datatableSearch').on('mouseup', function (e) {
             var $input = $(this),
                 oldValue = $input.val();

             if (oldValue == "") return;

             setTimeout(function(){
                 var newValue = $input.val();

                 if (newValue == ""){
                     // Gotcha
                     datatable.search('').draw();
                 }
             }, 1);
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
           let params = new FormData(document.getElementById('add_data_form'));
           let url    = '{{route('state.store')}}';
           function fn_success(result)
           {
                $("#addModal").modal('hide');
               datatable.api().ajax.reload(null,true);
           };
           function fn_error(result)
           {
              toast('error',result.message,'top-right');
           };
           $.fn_ajax_multipart(url,params,fn_success,fn_error);
         });
 $('#edit_data_form').on('submit',function(e){
           e.preventDefault();
           let params = new FormData(document.getElementById('edit_data_form'));
           let url    = '{{route('state.update')}}';
           function fn_success(result)
           {
               toast('success',result.message,'top-right');
               datatable.api().draw(false);
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
           let params = { id : $(this).attr('data-id')};
           let url    = '{{route('state.show')}}';
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
