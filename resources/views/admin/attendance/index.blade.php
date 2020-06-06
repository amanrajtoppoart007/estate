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
                  <span class="float-right">Date: {{$date}}</span>
              </div>
          </div>
      </div>
      <div class="card-body">
           {{Form::open(['method'=>'get'])}}
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="date">Date</label>
                    <input type="text" name="date" id="date" class="form-control" value="{{$date}}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="submit">&nbsp;</label>
                        <button id="submit" type="submit" class="btn btn-success form-control">Get Attendance</button>
                    </div>
                </div>
            </div>
           {{Form::close()}}
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
                          <td>{{$employee->attendances_count}}/{{$daysCountInMonth}}</td>   
                      </tr>
                      @php $i++ @endphp
                  @endforeach
              </tbody>
          </table>
      </div>
  </div>
@endsection
 @section('head')
    <link rel="stylesheet" href="{{asset('plugin/datetimepicker/css/gijgo.min.css')}}">
  @endsection
  @section('js')
  <script src="{{asset('plugin/datetimepicker/js/gijgo.min.js')}}"></script>
  @endsection
@section('script')
  <script>
      $(document).ready(function(){
          $('#date').datepicker({ footer: true, modal: true,format: 'dd-mm-yyyy', maxDate : '{{now()->format('d-m-Y')}}'});
      });
  </script>
@endsection