@extends('admin.layout.base')
@section('content')


<!-- Content -->
    <div class="content container-fluid">
        <span class="float-right">Property Listing</span>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Property Listing</li>
            </ol>
        </nav>

        <div class="row gx-2 gx-lg-3 mt-3">
            <div class="col-lg-12 mb-3 mb-lg-0">

                <!-- Card -->
                <div class="card">
                  <div class="card-header">
                    <div class="col"></div>
                   <div class="col text-right"><a href="{{route('property.create')}}" class="btn btn-soft-primary color-primaryfloat-right">Add Property</a></div>
             </div>
                    
                    <div class="card-body">
                      <div class="table-responsive">
            <table class="w-100 display table table-striped table-hover" id="dataTable">
                <thead>
                    <tr class="bg-white">
                        <th>Image</th>
                        <th>Property</th>
                        <th>Tenant</th>  
                        <th>Rent</th>   
                        <th>Lease Start</th>
                        <th>Lease End</th>
                        <th>Detail</th>
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
         var base_url = $('meta[name="base-url"]').attr('content');
         function renderStatusBtn(data)
        {
            let status   = (data.status==1)?'Alloted':'Completed';
            let btnColor = (data.status==1)?'success':'info';
            return `<a href="javascript:void(0)" data-status="${data.status}" data-id="${data.id}" class="text-${btnColor}">${status}</a>`;
        }
        function renderActionBtn(data)
        {
            return ``;
        }
        function renderImage(data)
        {
            return `<img class="img-thumbnail" src="${data.property.primary_image}">`;
        }
        function renderTitle(data)
        {
            let property_for = (data.property.property_for==1)?'Rent':'Sale';
            
           return `
           <small>${data.propertyUnitType.title}</small>,
           <small>${property_for}</small>,
           <small class="color-primary">${data.property.title}</small>,</br><small class="location"><i class="fa fa-map-marker text-primary" aria-hidden="true"></i> ${data.property.address}</small>`;
        }
        $.ajaxSetup({ headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
        var dataTable = $("#dataTable").dataTable({
                        dom   : '<"dt-buttons"Bf><"clear">lirtp',
                 processing   : true,
                   serverSide : true,
                    responsive: true,
                    stateSave: true,
                    "order": [[ 0, "desc" ]],
                    rowId     : 'row_id',
                        ajax  : {
                       url    : "{{route('fetch.allocated.properties')}}",
                       type   : "POST",
                       data   : null,
                       error  : function(jqXHR,textStatus,errorThrown)
                       {
                           $.swal(textStatus,errorThrown,'error');
                       }

                   },
                     columns : [
                                { data :null, name : 'property_image',
                                render: function(data, type, row, meta) 
                                    {
                                        
                                      return renderImage(row);
                                    } 
                                },
                                { data : null, name : 'property_title',
                                render: function(data, type, row, meta)  
                                    {
                                        
                                      return renderTitle(row);
                                    } 
                                },
                                { data : null, name : 'tenant_name',
                                 render:function(data,type,row,meta){
                                    return `<h6>${row.tenant.name}</h6><small>${row.tenant.mobile}</small>`;
                                 } 
                                },
                                {data : "rent_amount", name: 'rent_amount'},
                                {data : "lease_start", name: 'lease_start'},
                                {data : "lease_end", name: 'lease_end'},
                               
                                { data : "allotment_detail_url", name : 'allotment_detail_url',searchable: false,orderable: false,
                                    render: function(data, type, row, meta)  
                                    {
                                      return `<a href="${row.allotment_detail_url}" class="text-primary">View</a>`;
                                    }
                                },
                                { data : "status", name : 'is_disabled',searchable: false,orderable: false,
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

     })
</script>
<script type="text/javascript">
   $("#sidebar-listing-property").addClass("active");
 </script>
@endsection