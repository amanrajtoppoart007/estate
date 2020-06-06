<?php
namespace App\Library;
use Illuminate\Database\Eloquent\Builder;
use Carbon\Carbon;
use App\Employee;
class CreateSalarySheet
{
   protected $month,$year,$start_date,$end_date,$total_days;
   public function __construct($request = array())
   {
       $this->month      = $request['month'];
       $this->year       = $request['year'];
       $this->start_date = $this->setStartDate($this->month,$this->year);
       $this->end_date   = $this->setEndDate($this->start_date);
       $this->total_days = $this->getTotalDaysInMonth($this->start_date);
   }
   public function setStartDate($month,$year)
   {
       if(empty($month)||empty($year))
       {
           return false;
       }
        $month = str_pad($month,2,'0',STR_PAD_LEFT);
       return "01-$month-$year";
   }
   public function setEndDate($start_date)
   {
       if(empty($start_date))
       {
           return false;
       }
       $carbon      = new Carbon($start_date);
       return $carbon->copy()->endOfMonth()->toDateString();
   }
   public function getTotalDaysInMonth($date)
   {
       if(empty($date))
       {
           return false;
       }
       $carbon      = new Carbon($date);
       return Carbon::parse($carbon->format('Y-m-d'))->daysInMonth;
   }
   public function execute()
   {
       if((!empty($this->month))&&(!empty($this->year)))
        {
                $start_date = $this->start_date;
                $end_date   = $this->end_date;
                $employees = Employee::withCount(['attendances' => function (Builder $query) use($start_date,$end_date) {
                    $start_date = (new Carbon($start_date))->format('Y-m-d');
                    $end_date   = (new Carbon($end_date))->format('Y-m-d');
                    $query->where('attendance','1')->whereDate('date','>=', $start_date)->whereDate('date','<=', $end_date);
                }])->get();
                $start_date = (new Carbon($start_date))->format('d-m-Y');
                $end_date   = (new Carbon($end_date))->format('d-m-Y');
                $main_total_salary = 0;
                $i = 0;
                foreach($employees as $employee)
                {
                    $fixed_salary       = ($employee->fixed_salary)?$employee->fixed_salary:0;
                    $fixed_pay          = round(($employee->fixed_salary/intval($this->total_days))*$employee->attendances_count,2);
                    $total_salary_ind   = $fixed_pay + 0;
                    $main_total_salary += $total_salary_ind;
                    
                    $emp_array[$i]['fixed_salary']     = $fixed_salary;
                    $emp_array[$i]['fixed_pay']        = $fixed_pay;
                    $emp_array[$i]['total_salary_ind'] = $total_salary_ind;
                    $emp_array[$i]['employee_name']    = $employee->name;
                    $emp_array[$i]['employee_id']      = $employee->id;
                    $emp_array[$i]['department_name']  = $employee->department->name;
                    $emp_array[$i]['department_id']    = $employee->department_id;
                    $emp_array[$i]['designation_name'] = $employee->designation->name;
                    $emp_array[$i]['designation_id']   = $employee->designation_id;
                    $emp_array[$i]['account_number']   = $employee->bank_account;
                    $emp_array[$i]['bank_name']        = $employee->bank_name;
                    $emp_array[$i]['iban_number']      = $employee->iban_number;
                    $emp_array[$i]['attendance_count'] = $employee->attendances_count;
                    $emp_array[$i]['leave_count']      = intval($this->total_days) - intval($employee->attendances_count);
                    $emp_array[$i]['variable_pay']     = 0;
                    $i++;
                }
                return array('main_total_salary'=>$main_total_salary,'start_date'=>$start_date,'end_date'=>$end_date,'differenceInDays'=>$this->total_days,'salary_record'=>$emp_array);
        }
   }
}