@extends('admin.layout.app')
@section('breadcrumb')
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Attendance</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Attendance</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
@endsection
@section('content')
  <div class="card">
      <div class="card-header">
          <div class="row">
              <div class="col"></div>
              <div class="col">
                  <span class="float-right">Date: {{now()->format('d-m-Y')}}</span>
              </div>
          </div>
      </div>
      <div class="card-body">
       {{Form::open(['url'=>route('attendance.store'),'id'=>'add_data_form'])}}
                 <table class="table">
              <thead class="bg-primary">
                  <tr>
                      <th>Employee Name</th>
                      <th>Department</th>
                      <th>Designation</th>
                      <th>Attendance</th>
                  </tr>
              </thead>
              <tbody>
                  @php $i=1; @endphp
                  @foreach ($employees as $employee)
                      <tr>
                          <td>{{$employee->name}}</td>
                          <td>{{$employee->department_name}}</td>
                          <td>{{$employee->job_title}}</td>
                          <td>
                              <input type="hidden" name="employee_id[]" value="{{$employee->id}}">
                              <span class="icheck icheck-success">
                               <input type="checkbox" name="attendance[]" class="hide attendance_checkbox" id="attendance_checkbox_{{$i}}" value="1">
                               <label for="attendance_checkbox_{{$i}}">&nbsp;</label>
                            </td>
                              </span>
                              
                      </tr>
                      @php $i++ @endphp
                  @endforeach
              </tbody>
              <tfoot>
                  <tr>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th>
                          <button class="btn btn-success" type="submit">Save</button>
                      </th>
                  </tr>
              </tfoot>
          </table>
       {{Form::close()}}
      </div>
  </div>
@endsection
@section('head')
<link rel="stylesheet" href="{{asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
@endsection
@section('script')
  <script>
      $(document).ready(function(){
          $("#add_data_form").on('submit',function(e){
            e.preventDefault();
            $(".attendance_checkbox").each(function(index,element){
                if($(this).is(":checked"))
                {
                    $(this).prop('checked',true);
                    $(this).val('1');
                }
                else
                {
                    $(this).prop('checked',true);
                    $(this).val('0');
                }
            });
            var url    = "{{route('attendance.store')}}";
            var params = new FormData(document.getElementById('add_data_form'));
            function fn_success(result)
            {
                toast('success',result.message,'bottom-right'); 
                $("#add_data_form")[0].reset();
                window.location.href = window.location.href;
            };
            function fn_error(result)
            {
                toast('error',result.message,'bottom-right');  
            };
            $.fn_ajax_multipart(url,params,fn_success,fn_error);
        });
      });
  </script>
@endsection