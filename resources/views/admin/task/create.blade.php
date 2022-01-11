@extends('admin.layout.app')
@include("admin.include.breadcrumb",["page_title"=>"Create Task"])
@section('content')
  <div class="card">

	  <div class="card-body">
          {{Form::open(['route'=>'task.store','id'=>'create_new_task_form'])}}

          <div class="card card-info">
              <div class="card-header">
                    <h6>Assign Task</h6>
                </div>
              <div class="card-body">
             <div class="row">
			  <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                     <div class="form-group">
                        <label for="department_id">Department</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-building"></i></span>
                            </div>
							<select  class="form-control" name="department_id" id="department_id">
								<option value="">Select Department</option>
								@foreach($departments as $department)
							     <option value="{{$department->id}}">{{$department->name}}</option>
								@endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                    <div class="form-group">
                        <label for="designation_id">Designation</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-vector-square"></i></span>
                            </div>
                            <select  class="form-control" name="designation_id" id="designation_id">
								<option value="">Select Designation</option>
								@foreach($designations as $designation)
							     <option value="{{$designation->id}}">{{$designation->name}}</option>
								@endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                    <div class="form-group">
                        <label for="assignee_id">User/Employee</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-user"></i></span>
                            </div>
                            <select  class="form-control" name="assignee_id" id="assignee_id">
                            </select>
                        </div>
                    </div>
                </div>
          </div>
              </div>
          </div>
          <div class="card card-info">
              <div class="card-header">
                  <h6>Property Detail</h6>
              </div>
              <div class="card-body">
                  <div class="row">

			  <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                     <div class="form-group">
                        <label for="property_id"><i class="fas fa-building"></i> Property</label>
                        <div class="input-group">
                            <select  class="form-control" name="property_id" id="property_id">
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                    <div class="form-group">
                        <label for="property_unit_id"><i class="fa fa-university"></i> Flat Number</label>
                        <div class="input-group">
							<select  class="form-control" name="property_unit_id" id="property_unit_id">
                            </select>
                        </div>
                    </div>
                </div>
		  </div>
              </div>
          </div>
		  <div class="card card-info">
              <div class="card-header">
                  <h6>Task Detail</h6>
              </div>
              <div class="card-body">
                  <div class="row">
			  <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                     <div class="form-group">
                        <label for="task_code">Task Code</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-code "></i></span>
                            </div>
                            <input type="text" class="form-control" name="task_code" id="task_code" value="" readonly>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-8 col-lg-8 col-xl-8">
                    <div class="form-group">
                        <label for="task_title">Task Title</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-heading"></i></span>
                            </div>
                            <select class="form-control" name="task_title" id="task_title">
                            </select>
                        </div>
                    </div>
				</div>
				<div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                     <div class="form-group">
                        <label for="priority">Priority</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-building"></i></span>
                            </div>
                            <select  class="form-control" name="priority" id="priority">
								<option value="">Select State</option>
								   @php $priorities = array('1'=>'EMERGENCY','2'=>'HIGH','3'=>'NORMAL','4'=>'LOW') @endphp
									@foreach($priorities as $key=>$value)
									  <option value="{{$key}}">{{$value}}</option>
									@endforeach
                            </select>
                        </div>
                    </div>
                </div>
				<div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                     <div class="form-group">
                        <label class="text-danger" for="deadline">Deadline</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-building"></i></span>
                            </div>
                            <input type="text" class="form-control" name="deadline" id="deadline">
                        </div>
                    </div>
                </div>
		  </div>
		  <div class="row">
			  <div class="col">
				  <div class="form-group">
					  <label for="description">Task Description</label>
                        <div class="input-group">
                            <textarea type="text" class="form-control" name="description" id="description"></textarea>
                        </div>
				  </div>
			  </div>
		  </div>
              </div>
          </div>


          <div class="row">
              <div class="col text-right">
                <div class="form-group">
                  <button type="submit" name="name" class="btn btn-primary">Create New Task</button>
                </div>
              </div>
          </div>
          {{Form::close()}}
	  </div>
  </div>
@endsection

@section('head')
    <link rel="stylesheet" href="{{asset('plugin/datetimepicker/css/gijgo.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugin/select2/css/select2.min.css')}}">
@endsection
@section('js')
    <script src="{{asset('plugin/datetimepicker/js/gijgo.min.js')}}"></script>
    <script src="{{asset('plugin/select2/js/select2.full.min.js')}}"></script>
@endsection

@section('script')
<script>
	$(document).ready(function(){
	    let property_id = $("#property_id");
      $('#deadline').datepicker({ footer: true, modal: true,format: 'dd-mm-yyyy', minDate : '{{now()->format('d-m-Y')}}'});
    $("#create_new_task_form").on('submit',function(e){
		e.preventDefault();
		let params = new FormData(document.getElementById('create_new_task_form'));
		let url    = "{{route('task.store')}}";
		function fn_success(result)
		{
			if(result.response==="success")
			{
				toast('success', result.message, 'top-right');
				location.reload();
			}
		}
		function fn_error(result)
		{
            toast('error', result.message, 'top-right');
		}
		$.fn_ajax_multipart(url,params,fn_success,fn_error);
	});
        property_id.select2({
            ajax : {
                url: "{{route('task.get.property.list')}}",
                method : "POST",
                dataType: "json",
                data: function (params) {
                    return {title: params.term , _token : "{{ csrf_token() }}" }
                },
                processResults: function (data)
                {
                return {
                           results: data.data
                       };
                    }
            },


        });

       property_id.on('change',function(){
		   $("#property_unit_id").html('');
          let url = "{{route('task.get.property_unit.list')}}";
		  let params = { 'property_id': $("#property_id").val()};
		  function fn_success(result)
		  {
			 let option =  '<option value="">Select Property Unit</option>';
              $.each(result.data,function(index,item){
                option += `<option value="${item.id}">${item.unitcode}/${item.flat_number?item.flat_number:''}</option>`;
			  });
			  $("#property_unit_id").html(option);
		  };
		  function fn_error(result)
		  {
             $("#property_unit_id").html('');
			 toast('error',result.message,'top-right');
		  };
		  $.fn_ajax(url,params,fn_success,fn_error);
	   });
       $("#property_unit_id").on('change',function(){
		   $("#task_code").html('');
          let url    = "{{route('task.generate.code')}}";
		  let params = { 'property_unit_id': $("#property_unit_id").val()};
		  function fn_success(result)
		  {
			 $("#task_code").val(result.task_code);
		  };
		  function fn_error(result)
		  {
             $("#task_code").html('');
			 toast('error',result.message,'top-right');
		  };
		  $.fn_ajax(url,params,fn_success,fn_error);
	   });
       $("#department_id,#designation_id").on('change',function(e){

           if(e.target.id==='department_id')
           {
               get_task_list();
           }
		   $("#assignee_id").html('');
          const url = "{{route('task.get.users.list')}}";
		  let params = {
			   'department_id': $("#department_id").val(),
			   'designation_id': $("#designation_id").val(),
		  };
		  function fn_success(result)
		  {
			 let option =  '<option value="">Select User</option>';
              $.each(result.data,function(index,item){
                option += `<option value="${item.id}">${item.name}</option>`;
			  });
			  $("#assignee_id").html(option);
		  };
		  function fn_error(result)
		  {
             $("#assignee_id").html('');
			 toast('error',result.message,'top-right');
		  };
		  $.fn_ajax(url,params,fn_success,fn_error);
	   });


       function get_task_list()
       {
           $("#task_title").html('');
          const url = "{{route('get.task.list')}}";
		  let params = {
			   'department_id': $("#department_id").val(),
		  };
		  function fn_success(result)
		  {
			 let option =  '<option value="">Select Task</option>';
              $.each(result.data,function(index,item){
                option += `<option value="${item.title}">${item.title}</option>`;
			  });
			  $("#task_title").html(option);
		  };
		  function fn_error(result)
		  {
             $("#task_title").html('');
			 toast('error',result.message,'top-right');
		  };
		  $.fn_ajax(url,params,fn_success,fn_error);
       }
	});
</script>
@endsection
