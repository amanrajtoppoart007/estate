<?php

namespace App\Http\Controllers\Admin;

use App\DataTable\Api;
use App\Document;
use App\Employee;
use App\Helpers\GlobalHelper;
use App\Http\Controllers\Controller;
use App\Library\GenerateWorkOrderNo;
use App\MaintenanceWork;
use App\MaintenanceWorkCategory;
use App\Property;
use App\Library\CreateMaintenanceWorkProgress;
use Dompdf\Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\UpdateMaintenanceWorkOrder;

class MaintenanceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function fetch(Request $request)
    {
        $model = new MaintenanceWork();
        $api   = new Api($model,$request);
        echo json_encode($api->apply());
    }
    public function index()
    {
        return view('admin.maintenance.index');
    }
    public function create()
    {
        $buildings  = Property::all();
        $categories = MaintenanceWorkCategory::all();
       return view('admin.maintenance.create',compact('buildings','categories'));
    }
    public function create_quotation()
    {
        $buildings  = Property::all();
        $categories = MaintenanceWorkCategory::all();
       return view('admin.maintenance.createQuotation',compact('buildings','categories'));
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
            $store= $request->only(['property_id','property_unit_id','category','description']);
            $store['applicant_id'] = auth('admin')->user()->id;
            $code                  = new GenerateWorkOrderNo($request->all());
            $store['work_order_no'] = $code->execute();
            $store['applicant_type'] = 'admin';
            $store['appointment_date'] = date('Y-m-d',strtotime($request->appointment_date));
            $store['appointment_time_from'] = date('H:i:s',strtotime($request->appointment_time_from));
            $store['appointment_time_to'] = date('H:i:s',strtotime($request->appointment_time_to));

             if($order = MaintenanceWork::create($store))
             {
                  $disk          = 'local';
                  $visibility    = 'public';
                  $file_type     = 'image';
                  $archive_id   = $order->id;
                  $archive_type = 'maintenance';
                  $documents     = GlobalHelper::multipleDocumentUpload($request,$disk,'images','maintenance');
                  foreach($documents as $document)
                  {
                      $doc['disk']          = $disk;
                      $doc['visibility']    = $visibility;
                      $doc['file_type']     = $file_type;
                      $doc['archive_id']    = $archive_id;
                      $doc['archive_type']  = $archive_type;
                      $doc['file_url']      = $document['file_url'];
                      $doc['remark']        = 'completed';
                      $doc['extension']     = $document['extension'];
                      Document::create($doc);
                  }
                  $result = ['status'=>1,'response' => 'success', 'message' => 'Maintenance request sent to administrator'];
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
             $employees  = Employee::where(['status'=>1])->get();
             $status_list = ['pending'=>'pending','completed'=>'completed','on_hold'=>'on hold','work_in_progress'=>'work in progress'];
             return view('admin.maintenance.view',compact('maintenance','employees','status_list'));
        }
        else
        {
            show_error();
        }
    }

    public function updateWorkProgress(UpdateMaintenanceWorkOrder $request)
    {
        $request->validated();
        $update = $request->only(['assignee_id','asst_assignee_id']);
        $update['due_date'] = $request->due_date ?date('Y-m-d',strtotime($request->due_date)) : null;

        try {
           $result = MaintenanceWork::where(['id'=>$request->maintenance_work_order_id])->update($update);
            $count = count($request->status['status_type']);
            for($i=0;$i<$count;$i++)
            {
                $status = array();
                $status['work_order_id'] = $request->maintenance_work_order_id;
                $status['status_type']   = $request->status['status_type'][$i];
                $status['work_status']   = (!empty($request->status['work_status'][$i]))?$request->status['work_status'][$i]:null;
                $status['due_date']      =  (!empty($request->status['due_date'][$i]))?$request->status['due_date'][$i]:null;
                $status['completed_at']  =  (!empty($request->status['completed_at'][$i]))?$request->status['completed_at'][$i]:null;
                $status['remark']        =  (!empty($request->status['remark'][$i]))?$request->status['remark'][$i]:null;
                $progress = new CreateMaintenanceWorkProgress($status,$request->maintenance_work_order_id);
                $progress->execute();
            }
             $result = ['status'=>1,'response' => 'success', 'message' => 'Maintenance status updated'];
        }
        catch (\Exception $exception)
        {
              $result = ['status'=>'0','response' => 'error', 'message' =>$exception->getMessage()];
        }
       return response()->json($result,200);
    }
}
