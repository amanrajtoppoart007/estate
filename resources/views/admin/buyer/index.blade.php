@extends('admin.layout.base')
@section('content')
<!-- Content -->
    <div class="content container-fluid">
        <span class="float-right">Buyers</span>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Buyers</li>
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

                    <!-- Table -->
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
                            <thead class="thead-light">
                                <tr>

                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Mobile</th>
                                    <th>Added Date</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                    <th>Buy</th>

                                </tr>
                            </thead>

                          <tbody></tbody>
                        </table>
                    </div>
                    <!-- End Table -->

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
            let status   =  (data.status==1)?'Active':'InActive';
            let btnColor = (data.status==1)?'success':'danger';
            return `<a href="javascript:void(0)" data-status="${data.status}" data-id="${data.id}" class="btn btn-outline-${btnColor} mr-3 changeStatusBtn">${status}</a>`;
        }
        function renderActionBtn(data)
        {
            return `<a href="${data.edit_url}"  class="btn btn-soft-primary"><i class="fa fa-edit text-white"></i>Edit</a>
              <a href="${data.view_url}"  class="btn btn-soft-primary"><i class="fa fa-eye" aria-hidden="true"></i>View</a>`;
        }
        function renderBuyBtn(data)
        {
            return `<a href="${data.buy_property_url}"  class="btn btn-soft-primary"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>`;
        }
        $.ajaxSetup({ headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});

        // initialization of datatables
        let datatable = $.HSCore.components.HSDatatables.init($('#datatable'), {
            serverSide : true,
            ajax  : {
                url    : "{{route('buyer.fetch')}}",
                type   : "POST",
                data   : function(d){
                    d.owner_type = "flat_owner"
                },
                error  : function(jqXHR,textStatus,errorThrown)
                {
                    $.swal(textStatus,errorThrown,'error');
                }

            },columns : [{ data : "name", name : 'name'},
                                { data : "email", name : 'email'},
                                { data : "mobile", name : 'mobile'},
                                { data : "created_at", name : 'created_at' },
                                { data : "status", name : 'status',
                                    render: function(data, type, row, meta)
                                    {
                                        console.log(row);
                                      return renderStatusBtn(row);
                                    }
                                },
                                {
                                    data : null, name: 'action',searchable: false,orderable :false,
                                    render: function(data, type, row, meta)
                                    {
                                    return renderActionBtn(row);
                                    }
                                },
                                {
                                    data : "buy_property_url", name: 'buy_property_url',searchable: false,orderable :false,
                                    render: function(data, type, row, meta)
                                    {
                                    return renderBuyBtn(row);
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


              $(document).on('click','.changeStatusBtn',function(e){
                  let statusBtn = $(this);
                  e.preventDefault();
                  var params = {
                      'id'          : $(this).attr('data-id'),
                      'status' : $(this).attr('data-status')
                  }
                  function fn_success(result)
                  {
                      statusBtn.replaceWith(renderStatusBtn(result.data));
                  };
                  function fn_error(result)
                  {
                      toast('error',result.message,'top-right');
                  };
                  $.fn_ajax('{{route('buyer.changeStatus')}}',params,fn_success,fn_error);
              });
     });
</script>
@endsection
