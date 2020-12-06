@extends('admin.layout.base')
@section('content')

<!-- Content -->
    <div class="content container-fluid">
        <span class="float-right">Unit Listing</span>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Unit Listing</li>
            </ol>
        </nav>

        <div class="row gx-2 gx-lg-3 mt-3">
            <div class="col-lg-12 mb-3 mb-lg-0">

                <!-- Card -->
                <div class="card">
     <div class="card-body">
         <div class="card">
            <div class="card-body">
                {{Form::open(['id'=>'property_filter_search'])}}
                <h5>Floor</h5>
                <ul class="unstyled">
                @for($i=0;$i<=19;$i++)
                    <li class="d-inline">
                        <label class="btn btn-secondary">
                            <input class="" type="checkbox" name="floor[]" value="{{$i}}">
                            <small class="form-check-label">{{$i}} Floor</small>
                        </label>
                    </li>
                @endfor
            </ul>
                <h5>Select Tenancy contract ending month</h5>
                <ul class="unstyled">
                @for($i=1;$i<=12;$i++)
                    <li class="d-inline">
                        <label class="btn btn-secondary">
                            <input class="" type="checkbox" name="month[]" value="{{$i}}">
                            <small class="form-check-label">{{date('F',mktime( 0, 0, 0, $i, 01, date('Y')))}}</small>
                        </label>
                    </li>
                @endfor
                </ul>
                <h5>Select Broker</h5>
                <ul class="unstyled">
                @foreach($agents as $agent)
                    <li class="d-inline">
                        <label class="btn btn-secondary">
                            <input class="" type="checkbox" name="agent[]" value="{{$agent->id}}">
                            <small class="form-check-label">{{$agent->name}}</small>
                        </label>
                    </li>
                @endforeach
                </ul>
                <h5>Search Keyword</h5>
                <div class="form-group col-md-4">
                    <label class="label" for="custom_search"></label>
                    <input type="text" class="form-control" name="custom_search" id="custom_search" value="">
                </div>
                {{Form::close()}}
           </div>
        </div>
         <table class="table table-bordered" id="dataTable">
             <thead>
                 <th>Property</th>
                 <th>Unit</th>
                 <th>Type</th>
                 <th>Owner</th>
                 <th>Tenant/Buyer</th>
                 <th>Status</th>
                 <th>Action</th>
             </thead>
         </table>
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
         var base_url = $('meta[name="base-url"]').attr('content');
         function renderStatusBtn(data)
        {
            let status   = (parseInt(data.is_disabled))?'InActive':'Active';
            let btnColor = (parseInt(data.is_disabled))?'danger':'success';
            return `<a href="javascript:void(0)" data-status="${data.is_disabled}" data-id="${data.id}" class="btn btn-${btnColor} mr-3 changeStatusBtn">${status}</a>`;
        }
        function renderActionBtn(data)
        {
            return `<a href="${data.edit_url}"  class="btn btn-soft-info mr-3"><i class="fa fa-edit text-white"></i></a>
            <a href="${data.view_url}"  class="btn btn-soft-secondary  mr-3"><i class="fa fa-eye text-white"></i>View</a>`;
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
        var dataTable = $("#dataTable").dataTable({
                        dom   : '<"dt-buttons"Bf><"clear">lirtp',
                 processing   : true,
                   serverSide : true,
                    
                    stateSave: true,
                    "order": [[ 0, "desc" ]],
                    rowId     : 'row_id',
                        ajax  : 
                        {
                            url    : "{{route('property.unit.fetch')}}",
                            type   : "POST",
                            data   : function(d) 
                            {
                                    var form_data = $('#property_filter_search').serializeArray();
                                    $.each(form_data, function(index, item)
                                    {
                                        d[item.name] = item.value;
                                    });
                            },
                            error  : function(jqXHR,textStatus,errorThrown)
                            {
                                $.swal(textStatus,errorThrown,'error');
                            }

                   },
                     columns : [
                                { data :"property_title", name : 'image'},
                                { data : "unitcode", name : 'title'},
                                { data : "unit_type", name : 'unit_type'},
                                { data : "owner_name", name : 'owner_name' },
                                { data : "client_name", name: 'client_name'},
                                { data : "status", name: 'status'},
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
            $.fn_ajax('{{route('property.changeStatus')}}',params,fn_success,fn_error);
        });

        $("input").on('change',function(){
           dataTable.api().ajax.reload();
        });
        $("#property_filter_search").on('submit',function(e){
            e.preventDefault();
           dataTable.api().ajax.reload();
        });


     });
</script>
<script type="text/javascript">
   $("#sidebar-listing-property").addClass("active");
 </script>
@endsection