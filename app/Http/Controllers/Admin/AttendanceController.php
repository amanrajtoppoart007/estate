<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Validator;
use App\Attendance;
use App\Employee;
use Carbon\Carbon;
class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search()
    {
        return view('admin.attendance.search');
    }
    public function attendance(Request $request)
    {
        if((empty($request->month))&&(empty($request->year)))
        {
            return redirect(route('attendance.search'));
        }
        $attendance = new \App\Library\MonthlyAttendance($request->month,$request->year);
        $data = $attendance->execute();
        return view('admin.attendance.view',\compact('data'));
    }
    public function edit_attendance(Request $request)
    {
         $validator = Validator::make($request->all(),['employee_id' => 'required|numeric','date'=>'required']);
        if(!$validator->fails())
        { 
             $date = date('Y-m-d',strtotime($request->date));
            if($check = Attendance::where(['employee_id'=>$request->employee_id,'date'=>$date])->first())
            {
               Attendance::where(['employee_id'=>$request->employee_id,'date'=>$date])->update(['attendance'=>$request->attendance]);
            }
            else 
            {
                Attendance::create(['employee_id'=>$request->employee_id,'date'=>$date,'attendance'=>$request->attendance]);
            }
            return response()->json(['status'=>1,'response' => 'success', 'message' => 'Employee attendance updated.']);
        }
        return response()->json(['status'=>0,'response'=>'error','message' => $validator->errors()->all()]);
    }
    public function index(Request $request)
    {
        
        $date  = ($request->date)?date('d-m-Y',strtotime($request->date)):date('d-m-Y');
        $carbon = new Carbon($date);
        $daysCountInMonth = Carbon::parse($carbon->format('Y-m-d'))->daysInMonth;
        $year  = ($request->date)?date('Y',strtotime($request->date)):date('Y');
        $month = ($request->date)?date('m',strtotime($request->date)):date('m');
        $employees = Employee::withCount(['attendances' => function (Builder $query) use($year,$month) {
            $query->where('attendance','1')->whereYear('date', $year)->whereMonth('date', $month);
        }])->get();
        return view('admin.attendance.index',compact('date','year','month','daysCountInMonth','employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employees = Employee::whereDoesntHave('attendances',function(Builder $query){
            $query->where('date',date('Y-m-d'));
        })->where(['status'=>'1'])->get();
        return view('admin.attendance.create',\compact('employees'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'employee_id.*' => 'required|numeric',
        ]);
        if(!$validator->fails())
        {  
            $i   = 0;
            $cnt = 0;
            foreach($request->employee_id as $key=>$value)
            {
               $data['employee_id'] = $value;
               $data['attendance']  = $request->attendance[$i];
               $data['date']        = date('Y-m-d');
               if(Attendance::create($data))
               {
                   $cnt++;
               }
               $i++;
            }
            if($cnt)
            {
                return response()->json(['status'=>1,'response' => 'success', 'message' => 'States found for selected country.']);
            }
            else
            {
                return response()->json(['status'=>0,'response' => 'error', 'message' =>'No state Found']);
            }
        }
        return response()->json(['status'=>0,'response'=>'error','message' => $validator->errors()->all()]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
