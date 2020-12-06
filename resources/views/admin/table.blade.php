@extends('admin.layout.base')
@section('head')
    <link rel="stylesheet" type="text/css" href="{{asset('plugin/chart.js/Chart.min.css')}}">
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

                                    <!-- Unfold -->
                                    <div class="hs-unfold">
                                        <a class="js-hs-unfold-invoker btn btn-sm btn-white" href="javascript:;"
                                           data-hs-unfold-options='{
                         "target": "#usersFilterDropdown",
                         "type": "css-animation",
                         "smartPositionOff": true
                       }'>
                                            <i class="tio-filter-list mr-1"></i> Filter <span class="badge badge-soft-dark rounded-circle ml-1">2</span>
                                        </a>

                                        <div id="usersFilterDropdown" class="hs-unfold-content dropdown-unfold dropdown-menu dropdown-menu-sm-right dropdown-card card-dropdown-filter-centered" style="min-width: 22rem;">
                                            <!-- Card -->
                                            <div class="card">
                                                <div class="card-header">
                                                    <h5 class="card-header-title">Filter users</h5>

                                                    <!-- Toggle Button -->
                                                    <a class="js-hs-unfold-invoker btn btn-icon btn-xs btn-ghost-secondary ml-2" href="javascript:;"
                                                       data-hs-unfold-options='{
                              "target": "#usersFilterDropdown",
                              "type": "css-animation",
                              "smartPositionOff": true
                             }'>
                                                        <i class="tio-clear tio-lg"></i>
                                                    </a>
                                                    <!-- End Toggle Button -->
                                                </div>

                                                <div class="card-body">
                                                    <form>
                                                        <div class="form-group">
                                                            <small class="text-cap mb-2">Role</small>

                                                            <div class="form-row">
                                                                <div class="col">
                                                                    <!-- Checkbox -->
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox" class="custom-control-input" id="usersFilerCheck1" checked>
                                                                        <label class="custom-control-label" for="usersFilerCheck1">All</label>
                                                                    </div>
                                                                    <!-- End Checkbox -->
                                                                </div>

                                                                <div class="col">
                                                                    <!-- Checkbox -->
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox" class="custom-control-input" id="usersFilerCheck2">
                                                                        <label class="custom-control-label" for="usersFilerCheck2">Employee</label>
                                                                    </div>
                                                                    <!-- End Checkbox -->
                                                                </div>
                                                            </div>
                                                            <!-- End Row -->
                                                        </div>

                                                        <div class="form-row">
                                                            <div class="col-sm form-group">
                                                                <small class="text-cap mb-2">Position</small>

                                                                <!-- Select -->
                                                                <select class="js-select2-custom js-datatable-filter"
                                                                        data-target-column-index="2"
                                                                        data-hs-select2-options='{
                                          "minimumResultsForSearch": "Infinity"
                                        }'>
                                                                    <option value="">Any</option>
                                                                    <option value="Accountant">Accountant</option>
                                                                    <option value="Co-founder">Co-founder</option>
                                                                    <option value="Designer">Designer</option>
                                                                    <option value="Developer">Developer</option>
                                                                    <option value="Director">Director</option>
                                                                </select>
                                                                <!-- End Select -->
                                                            </div>

                                                            <div class="col-sm form-group">
                                                                <small class="text-cap mb-2">Status</small>

                                                                <!-- Select -->
                                                                <select class="js-select2-custom js-datatable-filter"
                                                                        data-target-column-index="4"
                                                                        data-hs-select2-options='{
                                          "minimumResultsForSearch": "Infinity"
                                        }'>
                                                                    <option value="">Any status</option>
                                                                    <option value="Active" data-option-template='<span class="legend-indicator bg-success"></span>Active'>Active</option>
                                                                    <option value="Pending" data-option-template='<span class="legend-indicator bg-warning"></span>Pending'>Pending</option>
                                                                    <option value="Suspended" data-option-template='<span class="legend-indicator bg-danger"></span>Suspended'>Suspended</option>
                                                                </select>
                                                                <!-- End Select -->
                                                            </div>

                                                            <div class="col-12 form-group">
                                                                <small class="text-cap mb-2">Location</small>

                                                                <!-- Select -->
                                                                <select class="js-select2-custom js-datatable-filter"
                                                                        data-target-column-index="3"
                                                                        data-hs-select2-options='{
                                          "searchInputPlaceholder": "Search a country"
                                        }'>
                                                                    <option label="empty"></option>
                                                                    <option value="AF" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="{{asset('theme/front/assets/vendor/flag-icon-css/flags/1x1/af.svg')}}" alt="Afghanistan Flag" /><span class="text-truncate">Afghanistan</span></span>'>Afghanistan</option>
                                                                    <option value="AX" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="{{asset('theme/front/assets/vendor/flag-icon-css/flags/1x1/ax.svg')}}" alt="Aland Islands Flag" /><span class="text-truncate">Aland Islands</span></span>'>Aland Islands</option>
                                                                 </select>
                                                                <!-- End Select -->
                                                            </div>
                                                        </div>
                                                        <!-- End Row -->

                                                        <a class="js-hs-unfold-invoker btn btn-block btn-primary" href="javascript:;"
                                                           data-hs-unfold-options='{
                                "target": "#usersFilterDropdown",
                                "type": "css-animation",
                                "smartPositionOff": true
                               }'>Apply</a>
                                                    </form>
                                                </div>
                                            </div>
                                            <!-- End Card -->
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
        $.ajaxSetup({ headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
        // initialization of select2
        $('.js-select2-custom').each(function () {
            let select2 = $.HSCore.components.HSSelect2.init($(this));
        });

        // initialization of counters
        $('.js-counter').each(function() {
            let counter = new HSCounter($(this)).init();
        });
        function ProfileImageName(data)
        {
            let img = "{{asset('theme/front/assets/img/160x160/img10.jpg')}}";
         return `<a class="media align-items-center" href="../user-profile.html"><div class="avatar avatar-circle mr-3"><img class="avatar-img" src="${img}" alt="Image Description"></div><div class="media-body"><span class="d-block h5 text-hover-primary mb-0">${data.name}</span><span class="d-block font-size-sm text-body">${data.email}</span></div></a>`;
        }
        function renderStatusBtn(data)
        {
            let status   =  (parseInt(data.is_disabled))?'In Active':'Active';
            let btnColor = (parseInt(data.is_disabled))?'danger':'success';
            return `<a href="javascript:void(0)" data-status="${data.is_disabled}" data-id="${data.id}" class="btn btn-outline-${btnColor} mr-3 changeStatusBtn">${status}</a>`;
        }
        function renderActionBtn(data)
        {
            return `<a href="${data.edit_url}"  class="btn btn-soft-success"><i class="fa fa-edit "></i></a>
             <a href="${data.view_url}"  class="btn btn-soft-info"><i class="fa fa-eye "></i></a>`;
        }
        // initialization of datatables
        let datatable = $.HSCore.components.HSDatatables.init($('#datatable'), {
            serverSide : true,
            ajax  : {
                url    : "{{route('owner.fetch')}}",
                type   : "POST",
                data   : function(d){
                    d.owner_type = "flat_owner"
                },
                error  : function(jqXHR,textStatus,errorThrown)
                {
                    $.swal(textStatus,errorThrown,'error');
                }

            },columns : [

                { data : "name", name : 'name',
                    render: function(data, type, row, meta)
                        {
                            return ProfileImageName(row);
                        }

                },
                { data : "email", name : 'email'},
                { data : "mobile", name : 'mobile'},
                { data : "created_at", name : 'created_at' },
                { data : "is_disabled", name : 'is_disabled',
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
            $.fn_ajax('{{route('owner.changeStatus')}}',params,fn_success,fn_error);
        });
    </script>

@endsection
