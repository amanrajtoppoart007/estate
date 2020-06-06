@extends('admin.layout.app')
@section('head')
  <link rel="stylesheet" href="{{asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
@endsection
@section('breadcrumb')
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Edit Attendance</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Edit Attendance</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
@endsection
@section('content')
  <div class="card">
      <div class="card-body">
         <table class="table table-striped">
            <tbody>
              <tr>
                <th>Month</th>
              <td>{{$data['month']}}</td>
                <th>Year</th>
                <td>{{$data['year']}}</td>
              </tr>
              <tr>
                <th>Total Employees</th>
                <td>{{count($data['report'])}}</td>
                <th></th>
                <td></td>
              </tr>
              <tr>
                <th>Date From</th>
                <td>{{'01-'.$data['month'].'-'.$data['year']}}</td>
                <th>Date Upto</th>
                <td>{{$data['total_days'].'-'.$data['month'].'-'.$data['year']}}</td>
              </tr>
            </tbody>
         </table>
         <table class="table table-bordered table-responsive">
             <thead class="bg-primary">
                <tr>
                     <th>NAME/DATE</th>
                    @php 
                     $total_days = ($data['total_days'])?$data['total_days']:0;
                    @endphp
                    @for($i=1;$i<=$total_days;$i++)
                     <th>{{$i}}</th>
                    @endfor
                </tr>
             </thead>
             <tbody>
                  @php $i=1;@endphp
                 @foreach($data['report'] as $report)
                 <tr>
                  <td>{{$report['employee_name']}}</td>
                    @php $j=1;@endphp
                   @foreach($report['attendance'] as $a)
                     <th>
                         @php 
                          $checked = ($a['attendance']=='P')?'checked=""':'';
                          $color   = ($a['attendance']=='P')?'success':'danger';
                         @endphp
                         <span class="icheck icheck-{{$color}}">
                         <input data-employee_id="{{$report['employee_id']}}" id="attendance_{{$i.$j}}_{{$a['date']}}" name="date[]" class="hide attendance_input_checkbox" type="checkbox" value="{{$a['date']}}" {{$checked}}>
                            <label for="attendance_{{$i.$j}}_{{$a['date']}}">&nbsp;</label>
                         </span>
                     </th>
                     @php $j++; @endphp
                   @endforeach
                 </tr>
                  @php $i++; @endphp
                 @endforeach
             </tbody>
         </table>
      </div>
  </div>
@endsection
@section('script')
  <script>
    $(document).ready(function(){
       $(document).on('change','.attendance_input_checkbox',function(e){  
          var url    = '{{route('edit.individual.attendance')}}';
          var params = {'employee_id':$(this).attr('data-employee_id'),date : $(this).val(),'attendance':(($(this).is(":checked"))?'1':'0')};
          function fn_success(result)
          {
              toast('success',result.message,'top-right');
          };
          function fn_error(result)
          {
             toast('error',result.message,'top-right');
          };
          $.fn_ajax(url,params,fn_success,fn_error);
       });
    });
  </script>
@endsection