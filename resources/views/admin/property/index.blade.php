@extends('admin.layout.base')

@section('content')
    <div class="content container-fluid">
        <span class="float-right">Property Listing</span>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Property Management</a></li>
                <li class="breadcrumb-item active" aria-current="page">Property Listing</li>
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
                                    <a href="{{route('property.create')}}" class="btn btn-outline-alhoor mr-2"> <i class="tio-add mr-1"></i>Add Property</a>
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

    <div class="items_list  color-secondery icon_default">

        <div class="table-responsive">
            <table  id="datatable" class="table table-lg table-borderless table-thead-bordered table-nowrap table-align-middle card-table"
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
                        <th>Image</th>
                        <th>Properties</th>
                        <th>status</th>
                        <th>Action</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
                </div></div></div>
    </div>
@endsection
@section('script')
  <script>
     $(document).ready(function()
     {
         let base_url = $('meta[name="base-url"]').attr('content');
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
            let status   = (parseInt(data.is_disabled))?'InActive':'Active';
            let btnColor = (parseInt(data.is_disabled))?'danger':'success';
            return `<a href="javascript:void(0)" data-status="${data.is_disabled}" data-id="${data.id}" class="btn btn-${btnColor} mr-3 changeStatusBtn">${status}</a>`;
        }
        function renderActionBtn(data)
        {
            return `<a href="${data.edit_url}"  class="btn btn-info mr-3"><i class="fa fa-edit text-white"></i></a>
            <a href="${data.view_url}"  class="btn btn-secondary  mr-3"><i class="fa fa-eye text-white"></i>View</a>`;
        }
        function renderImage(data)
        {
            return `<img class="img-thumbnail" src="${data.primary_image}">`;
        }
        function renderTitle(data)
        {
           return `<h6 class="color-primary">${data.title}</h6><span class="location"><i class="fa fa-map-marker" aria-hidden="true"></i> ${data.address}</span>`;
        }
        function renderPropertyMode(data)
        {
          let mode = null;
          switch (data.property_for)
          {
            case 1:
              mode = 'Rent';
              break;
            case 2:
              mode = 'Sale';
              break;
            default:
              mode = null;
              break;
          }
            return mode;
        }
        $.ajaxSetup({ headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
         let datatable = $.HSCore.components.HSDatatables.init($('#datatable'), {


                   serverSide : true,


                    "order": [[ 0, "desc" ]],
                    rowId     : 'row_id',
                        ajax  : {
                       url    : "{{route('property.fetch')}}",
                       type   : "POST",
                       data   : null,
                       error  : function(jqXHR,textStatus,errorThrown)
                       {
                           $.swal(textStatus,errorThrown,'error');
                       }

                   },
                     columns : [
                                { data :"primary_image", name : 'image',
                                render: function(data, type, row, meta)
                                    {
                                      return renderImage(row);
                                    }
                                },
                                { data : "title", name : 'title',
                                render: function(data, type, row, meta)
                                    {
                                      return renderTitle(row);
                                    }
                                },

                                { data : "is_disabled", name : 'is_disabled',searchable: false,orderable: false,
                                    render: function(data, type, row, meta)
                                    {
                                      return renderStatusBtn(row);
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
                  let params = {
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
                  $.fn_ajax('{{route('property.changeStatus')}}',params,fn_success,fn_error);
              });

     })
</script>
<script type="text/javascript">
   $("#sidebar-listing-property").addClass("active");
 </script>
@endsection
