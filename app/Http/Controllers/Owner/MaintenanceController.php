<?php

namespace App\Http\Controllers\Owner;

use App\DataTable\Api;
use App\Document;
use App\Helpers\GlobalHelper;
use App\Http\Controllers\Controller;
use App\Library\GenerateWorkOrderNo;
use App\MaintenanceWork;
use App\MaintenanceWorkCategory;
use App\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MaintenanceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:owner');
    }

    public function fetch(Request $request)
    {
        $model = new MaintenanceWork();
        $api   = new Api($model,$request);
        echo json_encode($api->apply());
    }
    public function index()
    {
        return view('owner.maintenance.index');
    }
    public function create()
    {
        $buildings = Property::whereHas('allotment',function($query){
            $query->where('owner_id',auth('owner')->user()->id);
        })->get();
        $categories = MaintenanceWorkCategory::all();
       return view('owner.maintenance.create',compact('buildings','categories'));
    }



    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'property_id'=>'numeric|required',
            'property_unit_id'=>'numeric|required',
            'category'=>'required',
            'description'=>'required',
            'appointment_date'=>'required',
            'appointment_time_from'=>'required',
            'appointment_time_to'=>'required',
        ]);
        if(!$validator->fails())
        {
            $add  = $request->only(['property_id','property_unit_id','category','description']);
            $add['applicant_id']     = auth('owner')->user()->id;
            $code                    = new GenerateWorkOrderNo($request->all());
            $add['work_order_no']    = $code->execute();
            $add['applicant_type']   = 'owner';
            /*-------------------*/
            $add['appointment_date'] = date('Y-m-d',strtotime($request->appointment_date));
            /*-------------------*/
            $add['appointment_time_from'] = date('H:i:s',strtotime($request->appointment_time_from));
            $add['appointment_time_to'] = date('H:i:s',strtotime($request->appointment_time_to));

             if($order = MaintenanceWork::create($add))
             {
                  $disk          = 'local';
                  $visibility    = 'public';
                  $file_type     = 'image';
                  $referrer_id   = $order->id;
                  $referrer_type = 'maintenance';
                  $documents     = GlobalHelper::multipleDocumentUpload($request,$disk,'images','maintenance');
                  foreach($documents as $document)
                  {
                      $doc['disk']          = $disk;
                      $doc['visibility']    = $visibility;
                      $doc['file_type']     = $file_type;
                      $doc['referrer_id']   = $referrer_id;
                      $doc['referrer_type'] = $referrer_type;
                      $doc['file_url']      = $document['file_url'];
                      $doc['remark']        = 'completed';
                      $doc['extension']     = $document['extension'];
                      Document::create($doc);
                  }
                  $result = ['status'=>'1','response' => 'success', 'message' => 'Maintenance request sent to administrator'];
             }
             else
             {
                $result = ['status'=>'0','response' => 'error', 'message' => 'Something went wrong,please try again'];
             }
        }
        else
        {
            $result = ['status'=>'0','response' => 'error', 'message' => $validator->errors()->all()];
        }
        return response()->json($result,200);
    }

    public function view($id)
    {
        $maintenance = MaintenanceWork::find($id);
        if(!empty($maintenance))
        {
             return view('owner.maintenance.view',compact('maintenance'));
        }
        else
        {
            show_error();
        }
    }
}
