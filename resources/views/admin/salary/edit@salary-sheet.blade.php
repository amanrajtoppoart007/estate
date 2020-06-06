@extends('admin.layout.app')
@section('breadcrumb')
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Edit Salary Sheet</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Edit Salary Sheet</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
@endsection
@section('content')
  <div class="card">
      <div class="card-body">
          {{Form::open(['url'=>route('update.salary.sheet',$salary_sheet->id),'id'=>'edit_salary_sheet_form'])}}
          <input type="hidden" name="sheet_id" value="{{$salary_sheet->id}}">
           <div class="row">
               <div class="col-12 col-md-4 col-lg-4 col-xl-4">
                  <dt>Start Date</dt>
                   <dd>{{$salary_sheet->start_date}}</dd>
                    <input type="hidden" name="start_date" id="start_date" value="{{$salary_sheet->start_date}}">  
               </div>
               <div class="col-12 col-md-4 col-lg-4 col-xl-4">
                   <dt>End Date</dt>
                   <dd>{{$salary_sheet->end_date}}</dd>
                   <input type="hidden" name="end_date" id="end_date"  value="{{$salary_sheet->end_date}}">
               </div>
           </div>
          <table class="table table-bordered">
              <thead class="bg-primary">
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
                  @php  $i=1;$j=0;
                     $main_total_salary = 0;
                  @endphp
                  @foreach($salary_sheet->salary_sheet_details as $detail)
                  @php
                    $fixed_salary       = ($detail->fixed_salary)?$detail->fixed_salary:0;
                    $differenceInDays   = $detail->attendance_count + $detail->leave_count;
                    $total_salary_ind   = $detail->total_salary_ind;
                    $main_total_salary += $total_salary_ind;
                    dd($detail);
                  @endphp
                  <tr>
                      <td>
                        {{$i}}
                        <input type="hidden" name="salary_sheet_detail_id[]" value="{{$detail->id}}">
                      </td>
                      <td>
                          {{$detail->employee->name}}
                      <input type="hidden" name="employee_id[]" value="{{$detail->employee_id}}">
                     </td>
                      <td>
                          {{$detail->employee->department->name}}
                          <input type="hidden" name="department_id[]" value="{{$detail->department_id}}">
                    </td>
                      <td>
                          {{$detail->employee->designation->name}}
                           <input type="hidden" name="designation_id[]" value="{{$detail->designation_id}}">
                     </td>
                      <td>
                          {{$detail->account_number}}
                          <input type="hidden" name="account_number[]" value="{{$detail->account_number}}">
                    </td>
                      <td>
                          {{$detail->bank_name}}
                          <input type="hidden" name="bank_name[]" value="{{$detail->bank_name}}">
                        </td>
                      <td>
                          {{$detail->iban_number}}
                          <input type="hidden" name="iban_number[]" value="{{$detail->iban_number}}">
                     </td>
                      <td>
                          {{$detail->attendance_count}}
                          <input type="hidden" name="attendance_count[]" value="{{$detail->attendance_count}}">
                      </td>
                      <td>
                          {{$detail->leave_count}}
                          <input type="hidden" name="leave_count[]" value="{{$detail->leave_count}}">
                      </td>
                      <td>
                        {{$detail->fixed_pay}}
                        <input type="hidden" name="fixed_salary[]" value="{{$detail->fixed_salary}}">
                        <input type="hidden" id="fixed_pay_{{$detail->employee_id}}" name="fixed_pay[]" value="{{$detail->fixed_pay}}">
                      </td>
                      <td>
                      <input type="text" id="variable_pay_{{$detail->employee_id}}" data-employee_id="{{$detail->employee_id}}" name="variable_pay[]" class="form-control numeric variable_pay" value="{{$detail->variable_pay}}">
                      </td>
                    <td>
                        <input type="text" id="total_salary_ind_{{$detail->employee_id}}" name="total_salary_ind[]" class="form-control numeric" value="{{$detail->total_salary_ind}}" readonly>
                    </td>
                  </tr>
                  @php 
                  $i++;
                  $j++;
                   @endphp
                  @endforeach
              </tbody>
              <tfoot>
                  <tr>
                      <th colspan="11">Total Salary</th>
                      <th><input type="text" class="form-control numeric" name="total_salary" id="total_salary" value="{{$main_total_salary}}" readonly></th>
                  </tr>
              </tfoot>
          </table>
             <input type="submit" class="btn btn-success" id="generate_payroll_btn" value="Edit Payroll">
          {{Form::close()}}
      </div>
  </div>
@endsection
@section('script')
  <script>
       $(document).ready(function(){
          $("#edit_salary_sheet_form").on('submit',function(e){
             e.preventDefault();
             var url    = "{{route('update.salary.sheet',$salary_sheet->id)}}";
             var params = $("#edit_salary_sheet_form").serialize();
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
