@extends("admin.layout.app")
@include("admin.include.breadcrumb",["page_title"=>"Rent Enquiry List"])
@section("content")
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable">
                <thead>
                <tr>
                    <th>Date</th>
                    <th>Name</th>
                    <th>Nationality</th>
                    <th>Email & Mobile</th>
                    <th>Preferred Bedroom</th>
                    <th>Preferred Location</th>
                    <th>View BreakDown</th>
                    <th class="width_200px">Action</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
@endsection
@section('script')
  <script>
	  $(document).ready(function(){
		function renderPropertyTitle(data)
		{
			return data.property.title;
		}
        function renderMessageBtn(data)
        {
            return `<a  href="javascript:void(0)" data-id="${data.id}" class="btn btn-primary"><i class="fa fa-edit text-white"></i></a>`;
        }
        function renderBreakdownViewBtn(data)
        {
            if(data.view_rent_breakdown)
            {
                return `<a  href="${data.view_rent_breakdown}" data-id="${data.id}" class="btn btn-primary"><i class="fa fa-eye text-white">View</i></a>`;
            }
            else
            {
                return `<a  href="${data.create_breakdown_url}" data-id="${data.id}" class="btn btn-success"><i class="fa fa-plus text-white"></i> Add</a>`;
            }

        }
        function renderActionBtn(data)
        {
            if(data.status===1)
            {
                return `<a title="View Rent Enquiry"  href="${data.view_url}" data-id="${data.id}" class="btn btn-info"><i class="fa fa-eye text-white"></i></a>
                  <a title="View Tenant Detail"  href="${data.tenant_url}" data-id="${data.id}" class="btn btn-info"><i class="fa fa-user text-white"></i></a>
`;
            }
            return `
             <span class="form-group">
             <a title="View Rent Enquiry"  href="${data.edit_url}" data-id="${data.id}" class="btn btn-primary"><i class="fa fa-edit text-white"></i></a>
             <a title="Edit Rent Enquiry"  href="${data.view_url}" data-id="${data.id}" class="btn btn-info"><i class="fa fa-eye text-white"></i></a>
             <a title="Create Tenant"  href="${data.create_tenant_url}" data-id="${data.id}" class="btn btn-success"><i class="fa fa-sign-in-alt text-white"></i></a>
             <a title="Send current enquiry to archive folder"  href="javascript:void(0)" data-id="${data.id}" class="btn btn-danger deleteBtn"><i class="fa fa-file-archive text-white"></i></a>
             </span>
             `;
        }


        $.ajaxSetup({ headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
        let dataTable = $("#dataTable").dataTable({
                        dom   : '<"dt-buttons"Bf><"clear">lirtp',
                 processing   : true,
                   serverSide : true,
                    responsive: false,
                    stateSave: true,
                    "order": [[ 0, "desc" ]],
                        ajax  : {
                       url    : "{{route('rentEnquiry.fetch')}}",
                       type   : "POST",
                       data   : null,
                       error  : function(jqXHR,textStatus,errorThrown)
                       {
                           $.swal(textStatus,errorThrown,'error');
                       }

                   },
                     columns : [
                                { data : "created_at", name : "created_at"},
                                { data : "name", name : "name"},
                                { data : "country_name", name : "country_name"},
                                { data : "email", name : "email",
                                render:function(data,type,row,meta)
                                {
                                    return (row.email +" ,"+ row.mobile);
                                 }},
                                { data : "bedroom", name : "bedroom"},
                                { data : "address", name : "address"},
                                {
                                    data : null, name: 'action',searchable: false,orderable :false,
                                    render: function(data, type, row, meta)
                                    {
                                      return renderBreakdownViewBtn(data);
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
                                    title : 'Booking request list',
                                    exportOptions:
                                    {
                                        columns: [0,1,2,3,4]
                                    }
                                }
            ],
              });

        $(document).on('click','.deleteBtn',function(e){
           e.preventDefault();
           let params = { id : $(this).attr('data-id')};
           let url    = '{{route('rentEnquiry.archive')}}';
           function fn_success(result)
           {
               dataTable.api().ajax.reload();
              toast('success',result.message,'top-right');
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
