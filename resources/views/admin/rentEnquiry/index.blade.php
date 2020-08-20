@extends('admin.layout.app')
@section('breadcrumb')
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h4 class="m-0 text-dark">Rent Enquiry List</h4>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Rent Enquiry List</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
@endsection
@section('content')
<div class="items_list color-secondary">
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
				<th>Action</th>
			</tr>
		</thead>
	</table>
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
                return `<a  href="${data.view_rent_breakdown}" data-id="${data.id}" class="btn btn-primary"><i class="fa fa-eye text-white"></i></a>`;
            }
            else
            {
                return "no breakdown created";
            }

        }
        function renderActionBtn(data)
        {
            if(data.status===1)
            {
                return `<a title="Create Tenant"  href="javascript:void(0)"  class="btn btn-outline-success"><i class="fa fa-check"></i></a>`;
            }
            return `
          <a title="Create Tenant"  href="${data.create_tenant_url}" data-id="${data.id}" class="btn btn-primary"><i class="fa fa-sign-in-alt text-white"></i></a>
           <a title="Send current enquiry to archive folder"  href="javascript:void(0)" data-id="${data.id}" class="btn btn-danger deleteBtn"><i class="fa fa-file-archive text-white"></i></a>
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
