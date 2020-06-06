<?php
namespace App\Library;
use Illuminate\Database\Eloquent\Builder;
use Carbon\Carbon;
use App\Employee;
class MonthlyAttendance
{
    protected $year,$month,$date,$days;
    public function __construct($month,$year)
    {
        $this->month = str_pad($month,2,'0',STR_PAD_LEFT);
        $this->year  = $year;
        $this->date  = date('Y-m-d',strtotime('01-'.$this->month.'-'.$this->year));
        $carbon      = new Carbon($this->date);
        $this->days  = Carbon::parse($carbon->format('Y-m-d'))->daysInMonth;
    }
    public function execute()
    {
        $report  = array();
         $year   = intval($this->year);
         $month  = intval($this->month);
        $employees = Employee::where(['status'=>'1'])->whereHas('attendances', function (Builder $query) use($year,$month) {
            $query->where('attendance','1')->whereYear('date',$year)->whereMonth('date',$month);
        })->get();
        if($employees->isEmpty())
        {
            $employees = Employee::where(['status'=>'1'])->get();
        }
        foreach($employees as $employee)
        {
            $attendance = array();
            if(!empty($employee->attendances))
            {
                $present = array();
                foreach($employee->attendances as $atd)
                {
                    if($atd->attendance=='1')
                    {
                       $present[] = date('d',strtotime($atd->date));
                    }
                    
                }
                $attendance = $this->create_attendance($present);  
            }
            array_push($report,['employee_id'=>$employee->id,'employee_name'=>$employee->name,'attendance'=>$attendance]);
        }
        return array('month'=>$this->month,'year'=>$this->year,'total_days'=>$this->days,'report'=>$report);
    }

    public function create_attendance($present = array())
    {
            $output = array();
            for($i=1;$i<=intval($this->days);$i++)
            {
                $process         = array();
                $day             = str_pad($i,2,'0',STR_PAD_LEFT);
                $process['date'] = $day.'-'.$this->month.'-'.$this->year;
                if(in_array($i,$present))
                {
                    $process['attendance'] = 'P';  
                }
                else 
                {
                    $process['attendance'] = 'A';
                }
                array_push($output,$process);
            }
        return $output;
    }
}