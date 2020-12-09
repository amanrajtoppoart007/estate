@extends('admin.layout.base')
@section('breadcrumb')
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Departments</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
            <li class="breadcrumb-item">Payroll</li>
              <li class="breadcrumb-item active">Departments</li>
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
                <li class="breadcrumb-item active" aria-current="page">Departments</li>
            </ol>

        </nav>

        <div class="row gx-2 gx-lg-3 mt-3">
            <div class="col-lg-12 mb-3 mb-lg-0">
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
                                    <button class="btn btn-outline-alhoor mr-2" data-toggle="modal" data-target="#addModal"><i class="tio-add mr-1"></i> Add Department</button>
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
                    <!-- End Header -->

        <div class="table-responsive datatable-custom">
            <table id="datatable" class="table table-lg table-borderless table-thead-bordered table-nowrap table-align-middle card-table"
                   data-hs-datatables-options='{

                     "order": [],
                     "info": {
                       "totalQty": "#datatableWithPaginationInfoTotalQty"
                     },
                     "search": "#datatableSearch",
                     "entries": "#datatableEntries",

                     "isResponsive": false,
                     "isShowPaging": false,
                     "pagination": "datatablePagination"
                   }'>
                <thead>
                    <tr>
                        <th>Department</th>
                        <th>Added Date</th>
                        <th>Status</th>
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
            </div>
        </div>
    </div>
{{ Form::open(['action' => 'Admin\DepartmentController@store','id'=>'add_data_form','method'=>'POST','autocomplete'=>'off']) }}
<div class="modal" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addModalLabel">Add Department </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
					<div class="row">
						<div class="col-lg-12 col-md-12">
							<div class="form-group">
								{{Form::label('name','Name')}}
                                {{ Form::text('name','',['id'=>'name','class'=>'form-control','required']) }}
							</div>
						</div>
					</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        {{ Form::submit('Save Changes',['class'=>'btn btn-primary']) }}
      </div>
    </div>
  </div>
</div>
{{Form::close()}}
{{ Form::open(['action' => 'Admin\DepartmentController@update','id'=>'edit_data_form','method'=>'POST','autocomplete'=>'off']) }}
<div class="modal" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Edit Department </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            {{ Form::hidden('id','',['id'=>'edit_id','class'=>'form-control','required']) }}
					<div class="row">
						<div class="col-lg-12 col-md-12">
							<div class="form-group">
								{{Form::label('name','Name')}}
                                {{ Form::text('name','',['id'=>'edit_name','class'=>'form-control','required']) }}
							</div>
                        </div>
					</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        {{ Form::submit('Save Changes',['class'=>'btn btn-primary']) }}
      </div>
    </div>
  </div>
</div>
{{Form::close()}}
@endsection
@section('script')
<script>
     $(document).ready(function()
     {
         // initialization of select2
         $('.js-select2-custom').each(function () {
             let select2 = $.HSCore.components.HSSelect2.init($(this));
         });

         // initialization of counters
         $('.js-counter').each(function() {
             let counter = new HSCounter($(this)).init();
         });
        function renderStatusBtn(data)
        {
            let status   =  (parseInt(data.is_disabled))?'In Active':'Active';
            let btnColor = (parseInt(data.is_disabled))?'danger':'success';
            return `<a href="javascript:void(0)" data-status="${data.is_disabled}" data-id="${data.id}" class="btn btn-${btnColor} mr-3 changeStatusBtn">${status}</a>`;
        }
        function renderActionBtn(data)
        {
            return `<a  href="javascript:void(0)" data-id="${data.id}" class="btn btn-primary editModalOpenBtn"><i class="fa fa-edit text-white"></i></a>`;
        }
        $.ajaxSetup({ headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
         let datatable = $.HSCore.components.HSDatatables.init($('#datatable'), {
                        dom   : '<"dt-buttons"Bf><"clear">lirtp',

                   serverSide : true,

                    "order": [[ 0, "desc" ]],
                        ajax  : {
                       url    : "{{route('department.fetch')}}",
                       type   : "POST",
                       data   : null,
                       error  : function(jqXHR,textStatus,errorThrown)
                       {
                           $.swal(textStatus,errorThrown,'error');
                       }

                   },
                     columns : [
                                { data : "name", name : 'name'},
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
                                    return renderActionBtn(data);
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
                  $.fn_ajax('{{route('department.changeStatus')}}',params,fn_success,fn_error);
              });

   $('#add_data_form').on('submit',function(e){
           e.preventDefault();
           var params = $("#add_data_form").serialize();
           var url    = '{{route('department.store')}}';
           function fn_success(result)
           {
                $("#addModal").modal('hide');
                $("#add_data_form")[0].reset();
                datatable.api().ajax.reload();
           };
           function fn_error(result)
           {
              toast('error',result.message,'top-right');
           };
           $.fn_ajax(url,params,fn_success,fn_error);
         });
 $('#edit_data_form').on('submit',function(e){
           e.preventDefault();
           var params = $("#edit_data_form").serialize();
           var url    = '{{route('department.update')}}';
           function fn_success(result)
           {
               datatable.api().draw(false);
                $("#editModal").modal('hide');
                $("#edit_data_form")[0].reset();
           };
           function fn_error(result)
           {
              toast('error',result.message,'top-right');
           }
           $.fn_ajax(url,params,fn_success,fn_error);
         });
$(document).on('click','.editModalOpenBtn',function(e){
           e.preventDefault();
           var params = { id : $(this).attr('data-id')};
           var url    = '{{route('department.show')}}';
           function fn_success(result)
           {
                $("#edit_id").val(result.data.id);
                $("#edit_name").val(result.data.name);
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
