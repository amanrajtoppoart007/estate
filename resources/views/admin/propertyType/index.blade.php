@extends('admin.layout.app')
@section('content')
    <h4 class="color-primary mb-4">Property Types</h4>
		<div class="submit_form color-secondery icon_primary p-5 bg-white">
			{{ Form::open(['action' => 'Admin\PropertyTypeController@store','id'=>'add_data_form','method'=>'POST','autocomplete'=>'off']) }}
				<div class="description">
					<h5 class="color-primary">Add New Property Type</h5>
					<hr>
					<div class="row">
						<div class="col-lg-4 col-md-6">
							<div class="form-group">
								{{Form::label('title','Title')}}
                                {{ Form::text('title','',['id'=>'title','class'=>'form-control']) }}
							</div>
						</div>
					</div>
				</div>
				{{ Form::submit('Save Change',['class'=>'btn btn-primary mt-4']) }}
			</form>
		</div>
                    <h4 class="color-primary mb-4">Property Type Listing</h4>
                    <div class="items_list bg_transparent color-secondery icon_default">
                        <table class="table table-bordered" id="dataTable">
                            <thead>
                                <tr class="bg-white">
                                    <th>Title</th>
                                    <th>Added Date</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
{{ Form::open(['action' => 'Admin\PropertyTypeController@update','id'=>'edit_data_form','method'=>'POST','autocomplete'=>'off']) }}
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="propertyTypeModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="propertyTypeModalLabel">Edit Property Type </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            {{ Form::hidden('id','',['id'=>'edit_id','class'=>'form-control','required']) }}
					<div class="row">
						<div class="col-lg-12 col-md-12">
							<div class="form-group">
								{{Form::label('title','Title')}}
                                {{ Form::text('title','',['id'=>'edit_title','class'=>'form-control','required']) }}
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
</form>
@endsection
@section('script')
<script>
     $(document).ready(function()
     {
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
        var dataTable = $("#dataTable").dataTable({
                        dom   : '<"dt-buttons"Bf><"clear">lirtp',
                 processing   : true,
                   serverSide : true,
                    responsive: true,
                    stateSave: true,
                    "order": [[ 0, "desc" ]],
                    rowId     : 'row_id',
                        ajax  : {
                       url    : "{{route('propertyType.fetch')}}",
                       type   : "POST",
                       data   : null,
                       error  : function(jqXHR,textStatus,errorThrown)
                       {
                           $.swal(textStatus,errorThrown,'error');
                       }

                   },
                     columns : [
                                { data : "title", name : 'title'},
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
                  $.fn_ajax('{{route('propertyType.changeStatus')}}',params,fn_success,fn_error);
              });
         $(document).on('click','.deleteBtn',function(e){
           e.preventDefault();
           id = $(this).attr('data-id');
	Swal.fire({
				title: 'Are you sure?',
				text: "You won't be able to revert this!",
				type: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Yes, delete it!'
              }).then((result) => {

                   if (result.value) 
                   {

                       var params = { id : $(this).attr('data-id')};
                        var url    = '{{route('propertyType.show')}}';
                        function fn_success(result)
                        {
                            $("#property_row_"+id).remove();
                            dataTable.api().draw(false);
                                
                        };
                        function fn_error(result)
                        {
                            toast('error',result.message,'top-right');
                        }
                        $.fn_ajax(url,params,fn_success,fn_error);
                 }
             });
         });
   $('#add_data_form').on('submit',function(e){
           e.preventDefault();
           var params = $("#add_data_form").serialize();
           var url    = '{{route('propertyType.store')}}';
           function fn_success(result)
           {
                dataTable.api().ajax.reload();
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
           var url    = '{{route('propertyType.update')}}';
           function fn_success(result)
           {
                dataTable.api().draw(false);
                $("#editModal").modal('hide');
                $("#edit_id").val('');
                $("#edit_title").val('');
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
           var url    = '{{route('propertyType.show')}}';
           function fn_success(result)
           {
                $("#edit_id").val(result.data.id);
                $("#edit_title").val(result.data.title);
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