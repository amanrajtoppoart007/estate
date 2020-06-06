@extends('admin.layout.app')
@section('breadcrumb')
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Create Salary Sheet</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Create Salary Sheet</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
@endsection
@section('content')
  <div class="card">
      <div class="card-body">
          {{Form::open(['route'=>'generate.salary.sheet','id'=>'create_salary_sheet_form'])}}
           <div class="row">
               <div class="col-12 col-md-4 col-lg-4 col-xl-4">
                  <dt>Start Date</dt>
                   <dd>{{$data['start_date']}}</dd>
                    <input type="hidden" name="start_date" id="start_date" value="{{$data['start_date']}}">  
               </div>
               <div class="col-12 col-md-4 col-lg-4 col-xl-4">
                   <dt>End Date</dt>
                   <dd>{{$data['end_date']}}</dd>
                   <input type="hidden" name="end_date" id="end_date"  value="{{$data['end_date']}}">
               </div>
               <div class="col-12 col-md-4 col-lg-4 col-xl-4">
                   <a href="{{route('create.salary.sheet')}}"  class="btn btn-info"><i class="fa fa-edit"></i> Modify Search</a>
               </div>
           </div>
          <table class="table table-bordered table-primary">
              <thead>
                  <tr>
                      <th>Sr.no</th>
                      <th>Name Of Employee</th>
                      <th>Department</th>
                      <th>Designation</th>
                      <th>Account Number</th>
                      <th>Bank Name</th>
                      <th>IBAN</th>
                      <th>Days In Period</th>
                      <th>Day on Leave For Period</th>
                      <th>Fixed Pay</th>
                      <th>Variable Pay</th>
                      <th>Total Salary</th>
                  </tr>
              </thead>
              <tbody>
                  @php  $i=1;@endphp
                  @foreach($data['salary_record'] as $salary)
                  
                  <tr>
                      <td>{{$i}}</td>
                      <td>
                          {{$salary['employee_name']}}
                      <input type="hidden" name="employee_id[]" value="{{$salary['employee_id']}}">
                     </td>
                      <td>
                          {{$salary['department_name']}}
                          <input type="hidden" name="department_id[]" value="{{$salary['department_id']}}">
                    </td>
                      <td>
                          {{$salary['designation_name']}}
                           <input type="hidden" name="designation_id[]" value="{{$salary['department_id']}}">
                     </td>
                      <td>
                          {{$salary['account_number']}}
                          <input type="hidden" name="account_number[]" value="{{$salary['account_number']}}">
                    </td>
                      <td>
                          {{$salary['bank_name']}}
                          <input type="hidden" name="bank_name[]" value="{{$salary['bank_name']}}">
                        </td>
                      <td>
                          {{$salary['iban_number']}}
                          <input type="hidden" name="iban_number[]" value="{{$salary['iban_number']}}">
                     </td>
                      <td>
                          {{$salary['attendance_count']}}
                          <input type="hidden" name="attendance_count[]" value="{{$salary['attendance_count']}}">
                      </td>
                      <td>
                          {{$salary['leave_count']}}
                          <input type="hidden" name="leave_count[]" value="{{$salary['leave_count']}}">
                      </td>
                      <td>
                        {{$salary['fixed_pay']}}
                        <input type="hidden" name="fixed_salary[]" value="{{$salary['fixed_salary']}}">
                        <input type="hidden" id="fixed_pay_{{$salary['employee_id']}}" name="fixed_pay[]" value="{{$salary['fixed_pay']}}">
                      </td>
                      <td>
                      <input type="text" id="variable_pay_{{$salary['employee_id']}}" data-employee_id="{{$salary['employee_id']}}" name="variable_pay[]" class="form-control numeric variable_pay" value="{{$salary['variable_pay']}}">
                      </td>
                    <td>
                        <input type="text" id="total_salary_ind_{{$salary['employee_id']}}" name="total_salary_ind[]" class="form-control numeric" value="{{$salary['total_salary_ind']}}" readonly>
                    </td>
                  </tr>
                  @php 
                  $i++;
                   @endphp
                  @endforeach
              </tbody>
              <tfoot>
                  <tr>
                      <th colspan="11">Total Salary</th>
                      <th><input type="text" class="form-control numeric" name="total_salary" id="total_salary" value="{{$data['main_total_salary']}}" readonly></th>
                  </tr>
              </tfoot>
          </table>
             <input type="submit" class="btn btn-success" id="generate_payroll_btn" value="Generate Payroll">
          {{Form::close()}}
      </div>
  </div>
@endsection
@section('script')
  <script>
       $(document).ready(function(){
          $("#create_salary_sheet_form").on('submit',function(e){
             e.preventDefault();
             var url    = "{{route('generate.salary.sheet')}}";
             var params = $("#create_salary_sheet_form").serialize();
             function fn_success(result)
             {
                  toast('success',result.message,'top-right');
             };
             function fn_error(result)
             {
                 toast('error',result.message,'bottom-right');
             };
             $.fn_ajax(url,params,fn_success,fn_error);
          });
           
           $(document).on('keyup','.variable_pay',function(){
                total_salary_ind($(this).attr('data-employee_id'));
                calculate_total_salary();
           });
          
          function total_salary_ind(employeeId)
          {
                var fixed_pay    = ($(`#fixed_pay_${employeeId}`).val())?$(`#fixed_pay_${employeeId}`).val():0;
                var variable_pay = ($(`#variable_pay_${employeeId}`).val())?$(`#variable_pay_${employeeId}`).val():0;
                var total_salary    = parseFloat(fixed_pay) + parseFloat(variable_pay);
                $(`#total_salary_ind_${employeeId}`).val(parseFloat(total_salary).toFixed(2))
          };
          function calculate_total_salary()
          {
              var total = 0;
              $('input[name="total_salary_ind[]"]').each(function(index,element){
                  total += parseFloat($(this).val());
              });
              $("#total_salary").val(parseFloat(total).toFixed(2));
          };
          
       });
  </script>
@endsection
