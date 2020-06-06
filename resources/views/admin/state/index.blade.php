@extends('admin.layout.app')
  @section('breadcrumb')
      <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">State List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">States</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
  @endsection
@section('content')
<div class="row">
    <div class="col"><button class="btn btn-success float-right" data-toggle="modal" data-target="#addModal">Add State</button></div>
</div>
                    <div class="items_list bg_transparent color-secondery icon_default">
                        <table class="table table-hover w-100" id="dataTable">
                            <thead>
                                <tr>
                                    <th>State</th>
                                    <th>Image</th>
                                    <th>Country</th>
                                    <th>Added Date</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
{{ Form::open(['action' => 'Admin\StateController@store','id'=>'add_data_form','method'=>'POST','autocomplete'=>'off','enctype'=>'multipart/form-data']) }}
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addModalLabel">Add state </h5>
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
                            <div class="form-group">
								{{Form::label('country_id','Country')}}
                                {{Form::select('country_id', $countries,'',['class'=>'form-control','id'=>'country_id']) }}
                            </div>
                            <div class="form-group">
								{{Form::label('image','Upload Image')}}
                                {{Form::file('image',['class'=>'form-control','id'=>'image']) }}
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

{{ Form::open(['action' => 'Admin\StateController@update','id'=>'edit_data_form','method'=>'POST','autocomplete'=>'off','enctype'=>'multipart/form-data']) }}
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Edit state </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            {{ Form::hidden('id','',['id'=>'edit_id','class'=>'form-control','required']) }}
					<div class="row">
						<div class="col-lg-12 col-md-12">
							<div class="form-group">
								{{Form::label('edit_name','Name')}}
                                {{ Form::text('name','',['id'=>'edit_name','class'=>'form-control','required']) }}
                            </div>
                            <div class="form-group">
								{{Form::label('edit_country_id','Country')}}
                                {{Form::select('country_id', $countries,'',['class'=>'form-control','id'=>'edit_country_id']) }}
                            </div>
                            <div class="form-group">
								{{Form::label('edit_image','Upload Image')}}
                                {{Form::file('image',['class'=>'form-control','id'=>'edit_image']) }}
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
        function renderImage(data)
        {
            return `<img class="img-thumbnail" src="${data.image}">`;
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
                       url    : "{{route('state.fetch')}}",
                       type   : "POST",
                       data   : null,
                       error  : function(jqXHR,textStatus,errorThrown)
                       {
                           $.swal(textStatus,errorThrown,'error');
                       }

                   },
                     columns : [
                                { data : "name", name : 'name'},
                                { data : "image", name : 'image',
                                 render:function(type, row, data, meta){
                                     return renderImage(data);

                                 }
                                 },
                                { data : "country", name : 'country'},
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
                  $.fn_ajax('{{route('state.changeStatus')}}',params,fn_success,fn_error);
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
                        var url    = '{{route('state.delete')}}';
                        function fn_success(result)
                        {
                            dataTable.api().draw();

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
           var params = new FormData(document.getElementById('add_data_form'));
           var url    = '{{route('state.store')}}';
           function fn_success(result)
           {
                $("#addModal").modal('hide');
                dataTable.api().ajax.reload(null,true);
           };
           function fn_error(result)
           {
              toast('error',result.message,'top-right');
           };
           $.fn_ajax_multipart(url,params,fn_success,fn_error);
         });
 $('#edit_data_form').on('submit',function(e){
           e.preventDefault();
           var params = new FormData(document.getElementById('edit_data_form'));
           var url    = '{{route('state.update')}}';
           function fn_success(result)
           {
               toast('success',result.message,'top-right');
                dataTable.api().draw(false);
                $("#editModal").modal('hide');
                $("#edit_data_form")[0].reset();
           };
           function fn_error(result)
           {
              toast('error',result.message,'top-right');
           }
           $.fn_ajax_multipart(url,params,fn_success,fn_error);
         });
$(document).on('click','.editModalOpenBtn',function(e){
           e.preventDefault();
           var params = { id : $(this).attr('data-id')};
           var url    = '{{route('state.show')}}';
           function fn_success(result)
           {
                $("#edit_id").val(result.data.id);
                $("#edit_name").val(result.data.name);
                $("#edit_country_id").val(result.data.country_id);
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
