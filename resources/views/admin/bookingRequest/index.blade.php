@extends('admin.layout.app')
@section('content')
<h4 class="color-primary mb-4">Booking Request</h4>						
<div class="items_list color-secondery">
	<table class="table table-bordered" id="dataTable">
		<thead>
			<tr>
				<th>Name</th>
				<th>Email</th>
				<th>Contact</th>
				<th>Property</th>
				<th>Date</th>
				<th>Message</th>
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
        function renderActionBtn(data)
        {
            return `<a  href="javascript:void(0)" data-id="${data.id}" class="btn btn-primary"><i class="fa fa-edit text-white"></i></a>`;
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
                       url    : "{{route('booking-request.fetch')}}",
                       type   : "POST",
                       data   : null,
                       error  : function(jqXHR,textStatus,errorThrown)
                       {
                           $.swal(textStatus,errorThrown,'error');
                       }

                   },
                     columns : [
                                { data : "name", name : 'name'},
                                { data : "email", name : 'email'},
                                { data : "contact", name : 'contact'},
                                {
									data:null, name: 'property',searchable: false,orderable :false,
								   render: function(data, type, row, meta) 
								   {
									   return renderPropertyTitle(data);
								   }
								},
                                { data : "created_at", name : 'created_at' },
                                { data : "message", name : 'message',
                                    render: function( type, row, data, meta) 
                                    {
                                      return renderMessageBtn(data);
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
	  });
  </script>
@endsection