<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Employee;
use Carbon\Carbon;
use App\SalarySheet;
use App\SalarySheetDetail;
use Auth;
use Excel;
use App\Exports\WpsSheetExports;
use \App\Library\CreateSalarySheet;
class SalaryController extends Controller
{
    public function generateSheetNumber()
    {
        $count = SalarySheet::count();
        return 'AH'.str_pad(($count+1),6, '0', STR_PAD_LEFT);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.salary.index');
    }
    /**
     * fetch data from salary sheet model
     *
     * @return \Illuminate\Http\Response
     */
    public function fetch(Request $request)
    {
        $model = new SalarySheet();
        $api   = new \App\DataTable\Api($model,$request);
        echo json_encode($api->apply());
    }

    public function createSalarySheet(Request $request)
    {
        if((!empty($request->month))&&(!empty($request->year)))
        {
                $createSalarySheet = new CreateSalarySheet($request->all());
                $data              = $createSalarySheet->execute();
                return view('admin.salary.create_salary_sheet',compact('data'));
        }
        else 
        {
            return view('admin.salary.search_employee');
        }
         
        
    }

    public function generateSalarySheet(Request $request)
    {
      $validator = Validator::make($request->all(), [
            'employee_id.*'  => 'required',
            'department_id.*'  => 'required',
            'designation_id.*'  => 'required',
            'account_number.*'  => 'required',
            'bank_name.*'  => 'required',
            'iban_number.*'  => 'required',
            'attendance_count.*'  => 'required',
            'leave_count.*'  => 'numeric',
            'fixed_salary.*'  => 'required',
            'fixed_pay.*'  => 'required',
            'variable_pay.*'  => 'numeric',
            'total_salary_ind.*'  => 'required|numeric',
            'start_date'  => 'required',
            'end_date'  => 'required',   
        ]);
        $validator->after(function ($validator) use($request){
            if($this->checkFutureDates($request)) 
            {
                $validator->errors()->add('exists', 'Future dates are not allowed');
                return true;
            }
            if($this->checkSalarySheetExists($request)) 
            {
                $validator->errors()->add('exists', 'Salary Sheet for this period allready exist');
            }
        });
        if(!$validator->fails())
        {
            $salary_sheet['start_date']          = date('Y-m-d',strtotime($request->start_date));
            $salary_sheet['end_date']            = date('Y-m-d',strtotime($request->end_date));
            $salary_sheet['admin_id']            = Auth::guard('admin')->user()->id;
            $salary_sheet['status']              = 0;//salary sheet created
            $salary_sheet['sheet_no']            = $this->generateSheetNumber();
            $salary_sheet['company_name']        = get_systemSetting('company_name');
            $salary_sheet['company_uid']         = get_systemSetting('company_uid');
            $salary_sheet['corporate_bank_name'] = get_systemSetting('corporate_bank_name');
            $salary_sheet['total_salary']        = $request->total_salary;
            $salary_sheet['commission']          = 0;
            $salary_sheet['vat']                 = (floatval(($request->total_salary))*intval(get_systemSetting('vat_on_salary')))/100;
            $salary_sheet['total_payment']       = $salary_sheet['total_salary'] + $salary_sheet['commission'] + $salary_sheet['vat'];

            if($sheet = SalarySheet::create($salary_sheet))
            {
                for($i=0;count($request->employee_id)>$i;$i++)
                {
                     
                        $details['employee_id']=$request->employee_id[$i];
                        $details['department_id']=$request->department_id[$i];
                        $details['designation_id']=$request->designation_id[$i];
                        $details['account_number']=$request->account_number[$i];
                        $details['bank_name']=$request->bank_name[$i];
                        $details['iban_number']=$request->iban_number[$i];
                        $details['attendance_count']=$request->attendance_count[$i];
                        $details['leave_count']=$request->leave_count[$i];
                        $details['fixed_salary']=$request->fixed_salary[$i];
                        $details['fixed_pay']=$request->fixed_pay[$i];
                        $details['variable_pay']=$request->variable_pay[$i];
                        $details['total_salary_ind']=$request->total_salary_ind[$i];  
                        $details['sheet_id'] = $sheet->id;
                        $details['start_date'] = date('Y-m-d',strtotime($request->start_date));
                        $details['end_date']   = date('Y-m-d',strtotime($request->end_date));
                        $details['status']     = 0;
                        SalarySheetDetail::create($details);
                }
                
              return response()->json(['status'=>'1','response' => 'success', 'message' => 'Salary sheet successfully created'],200);
            }
            else
            {
                return response()->json(['status'=>'1','response' => 'success', 'message' => 'Salary sheet creation failed'],200);
            }
           
        }
        else
        {
            return response()->json(['status'=>0,'response'=>'error','message' => $validator->errors()->all()],200);
        }
    }
    function checkSalarySheetExists(Request $request)
    {
       $start_date  = (new \Carbon\Carbon($request->start_date))->format('Y-m-d');
       return SalarySheet::whereDate('start_date','<=',$start_date)->whereDate('end_date','>=',$start_date)->first();
    }
    function checkFutureDates(Request $request)
    {
       $start_date = strtotime($request->start_date);
       $end_date   = strtotime($request->end_date);
       if($start_date>strtotime(date('Y-m-d')))
       {
           return true;
       }
       if($end_date>strtotime(date('Y-m-d')))
       {
           return true;
       }
       return false;
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function exportWpsSheet($id) 
    {
        $date = date('Y-m-d');
        return Excel::download(new WpsSheetExports($id), "wps_sheets_$date.xlsx");
    }
    public function show_wps_sheet($id)
    {
        $salary_sheet = SalarySheet::find($id);
        return view('admin.salary.view@wps-sheet',\compact('salary_sheet'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editSalarySheet($id)
    {
        $salary_sheet = SalarySheet::find($id);
        if(empty($salary_sheet->salary_sheet_details[0])) 
        {
            return redirect()->back();
        }
        return view('admin.salary.edit@salary-sheet',\compact('salary_sheet'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateSalarySheet(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'sheet_id'  => 'required|numeric',
            'salary_sheet_detail_id.*'  => 'required|numeric',
            'employee_id.*'  => 'required',
            'department_id.*'  => 'required',
            'designation_id.*'  => 'required',
            'account_number.*'  => 'required',
            'bank_name.*'  => 'required',
            'iban_number.*'  => 'required',
            'attendance_count.*'  => 'required',
            'leave_count.*'  => 'numeric',
            'fixed_salary.*'  => 'required',
            'fixed_pay.*'  => 'required',
            'variable_pay.*'  => 'numeric',
            'total_salary_ind.*'  => 'required|numeric',
            'start_date'  => 'required',
            'end_date'  => 'required',   
        ]);
        
        if(!$validator->fails())
        {
            $salary_sheet['admin_id']   = Auth::guard('admin')->user()->id;
            if($sheet = SalarySheet::where(['id'=>$request->sheet_id])->update($salary_sheet))
            {
                for($i=0;count($request->employee_id)>$i;$i++)
                {
                    $details  = array();
                    $details['employee_id']=$request->employee_id[$i];
                    $details['department_id']=$request->department_id[$i];
                    $details['designation_id']=$request->designation_id[$i];
                    $details['account_number']=$request->account_number[$i];
                    $details['bank_name']=$request->bank_name[$i];
                    $details['iban_number']=$request->iban_number[$i];
                    $details['attendance_count']=$request->attendance_count[$i];
                    $details['leave_count']=$request->leave_count[$i];
                    $details['fixed_salary']=$request->fixed_salary[$i];
                    $details['fixed_pay']=$request->fixed_pay[$i];
                    $details['variable_pay']=floatval($request->variable_pay[$i]);
                    $details['total_salary_ind']=floatval($request->total_salary_ind[$i]);
                    SalarySheetDetail::where(['id'=>$request->salary_sheet_detail_id[$i]])->update($details);
                }
                
              return response()->json(['status'=>'1','response' => 'success', 'message' => 'Salary sheet updated successfully'],200);
            }
            else
            {
                return response()->json(['status'=>'1','response' => 'success', 'message' => 'Salary sheet updation failed'],200);
            }
           
        }
        else
        {
            return response()->json(['status'=>0,'response'=>'error','message' => $validator->errors()->all()],200);
        }
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
