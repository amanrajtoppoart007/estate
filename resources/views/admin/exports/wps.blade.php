@extends('admin.layout.export')
@section('content')
  <div class="card">
      <div class="card-body">
          <table class="table table-striped">
              <tbody>
                  <tr>
                      <th>Company Name</th>
                      <td>{{get_systemSetting('company_name')}}</td>
                  </tr>
                  <tr>
                      <th>Company Uid</th>
                      <td>{{get_systemSetting('company_uid')}}</td>
                  </tr>
                  <tr>
                      <th>Month</th>
                      <td>{{$salary_sheet->month}}</td>
                  </tr>
                  <tr>
                      <th>Year</th>
                      <td>{{$salary_sheet->year}}</td>
                  </tr>
                  <tr>
                      <th>Start Date</th>
                      <td>{{$salary_sheet->start_date}}</td>
                  </tr>
                  <tr>
                      <th>End Date</th>
                      <td>{{$salary_sheet->end_date}}</td>
                  </tr>
                  
                  <tr>
                      <th>Corporate Bank Name</th>
                      <td>{{get_systemSetting('carporate_bank_name')}}</td>
                  </tr>
                  <tr>
                      <th>Fund Transfer Date</th>
                      <td>{{$salary_sheet->fund_transfer_date}}</td>
                  </tr>
              </tbody>
          </table>
          <table class="table table-bordered">
              <thead class="bg-primary">
                  <tr>
                      <th>Sr.no</th>
                      <th>Name Of Employee</th>
                      <th>WPN</th>
                      <th>MOBILE NO</th>
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
                  @endphp
                  <tr>
                      <td>{{$i}}</td>
                      <td>{{$detail->employee->name}}</td>
                      <td>{{$detail->employee->work_permit_number}}</td>
                      <td>{{$detail->employee->mobile}}</td>
                      <td>{{$detail->account_number}}</td>
                      <td>{{$detail->bank_name}}</td>
                      <td>{{$detail->iban_number}}</td>
                      <td>{{$detail->attendance_count}}</td>
                      <td>{{$detail->leave_count}}</td>
                      <td>{{$detail->fixed_pay}}</td>
                      <td>{{$detail->variable_pay}}</td>
                      <td>{{$detail->total_salary_ind}}</td>
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
                      <th>{{$main_total_salary}}</th>
                  </tr>
                  <tr>
                      <th colspan="11">Commission</th>
                      <th>{{$salary_sheet->commission}}</th>
                  </tr>
                  <tr>
                      <th colspan="11">Vat</th>
                      <th>{{$salary_sheet->vat}}</th>
                  </tr>
                  <tr>
                      <th colspan="11">Grand Total</th>
                      <th>{{$salary_sheet->total_payment}}</th>
                  </tr>
              </tfoot>
          </table>
        <a href="{{route('salary.wps-sheet.export',$salary_sheet->id)}}"  class="btn btn-success text-white" id="download_wps_sheet"> <i class="fa fa-download"></i></a>
      </div>
  </div>
@endsection