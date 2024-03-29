<?php

namespace App\Http\Controllers\Admin;

use App\Agent;
use App\City;
use App\DataTable\Api;
use App\Http\Controllers\Controller;
use App\Http\Requests\AllotProperty;
use App\Http\Requests\RenewPropertyAllotment;
use App\Library\CreateInstallments;
use App\Library\CreateRentBreakDown;
use App\Library\UpdateRentBreakDown;
use App\RentBreakDown;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Property;
use App\State;
use App\PropertyUnitType;
use App\PropertyUnit;
use App\PropertyUnitAllotment;
use App\TenantRemove;
use App\Tenant;

class PropertyAllotmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function fetch_allotted_properties(Request $request)
    {
        echo json_encode((new Api((new PropertyUnitAllotment())))->getResult());
    }

    public function index(Request $request, $id, $property_unit_id = null)
    {
        if ((isset($id)) && !empty($id)) {
            $property_unit = [];
            $unit_list = [];
            $breakdown = [];
            $tenant = Tenant::with('relations')->where(['id' => $id])->first();
            $properties = Property::where(['is_disabled' => '0'])->get();
            $cities = City::whereHas('country',function($q){
                $q->where('name','like','%United Arab Emirates%');
            })->get();
            $agents = Agent::where(['is_disabled' => 0])->get();
            if (!empty($property_unit_id)) {
                $property_unit = PropertyUnit::with(['property'])->find($property_unit_id);
                $unit_list = PropertyUnit::where(['property_id' => $property_unit->property_id])->get();

            }
            if ($request->has("request_id")) {
                $request_id = base64_decode($request->request_id);
                $breakdown = RentBreakDown::where(['rent_enquiry_id' => $request_id])->first();
                if (!empty($breakdown)) {
                    $property_unit = PropertyUnit::with(['property'])->find($breakdown->unit_id);

                    $unit_list = PropertyUnit::where(['property_id' => $breakdown->property_id])->get();
                }
            }
            return view('admin.allotProperty.init', \compact('tenant', 'properties', 'property_unit', 'cities', 'breakdown', 'agents', 'unit_list'));
        } else {
            return view('blank');
        }
    }

    public function allotProperty(AllotProperty $request)
    {
        $request->validated();
        $admin_id = Auth::guard('admin')->user()->id;
        $checkExist = PropertyUnitAllotment::where(['unit_id' => $request->unit_id, 'status' => '1'])->first();

        $checkBreakDown = RentBreakDown::where(['unit_id' => $request->input('unit_id'), 'tenant_id' => $request->input('tenant_id')])->get();
        if($checkBreakDown->isEmpty())
        {
          $breakdown_id =  (new CreateRentBreakDown())->handle();
        }
        else
        {
           $breakdown_id = (new UpdateRentBreakDown($request->rent_breakdown_id))->handle();
        }
         if(empty($checkExist))
         {
            $params = $request->only(['tenant_id','agent_id','property_id', 'unit_id', 'rent_amount', 'installments']);
             if(!empty($request->unit_id))
             {
                 $unit = PropertyUnit::find($request->unit_id);
                 $params['property_unit_type_id'] = $unit->property_unit_type_id;
             }
               $params['lease_start'] = date('Y-m-d', strtotime($request->lease_start));
               $params['lease_end'] = date('Y-m-d', strtotime($request->lease_end));
               $params['admin_id'] = $admin_id;
               $params['status'] = 1;
               $params['rent_break_down_id'] = $breakdown_id;

            if ($unitAllotment = PropertyUnitAllotment::create($params))
            {
                PropertyUnit::where(['id' => $request->unit_id])->update(['allotment_id' => $unitAllotment->id, 'allotment_type' => 'rent', 'unit_status' => 2]);
                $action = new CreateInstallments($unitAllotment->id, $admin_id);
                $action->execute();
                $breakdown = RentBreakDown::find($breakdown_id);
                $breakdown->unit_allotment_id = $unitAllotment->id;
                $breakdown->save();
                $res['status'] = 1;
                $res['next_url'] = route('allotment.detail', [$request->tenant_id, $unitAllotment->id]);
                $res['response'] = 'success';
                $res['message'] = 'Property allotment successful to tenant';
            } else {
                $res['status'] = 0;
                $res['response'] = 'error';
                $res['message'] = 'Property allocation failed';
            }

        } else
        {
            $res['status'] = 0;
            $res['response'] = 'error';
            $res['message'] = 'Property already allocated to someone else';
        }
        return response()->json($res);
    }

    public function renewTenancy(RenewPropertyAllotment $request)
    {
        $request->validated();
        $admin_id = Auth::guard('admin')->user()->id;
        $checkExist = PropertyUnitAllotment::where(['unit_id' => $request->unit_id, 'status' => '1'])->first();
        if (!empty($checkExist)) {
            PropertyUnitAllotment::where(['unit_id' => $request->unit_id, 'status' => '1'])->update(['status' => '0']);
            $params = $request->only(['tenant_id', 'property_id', 'property_unit_type_id', 'unit_id', 'rent_amount', 'installments']);
            $params['lease_start'] = date('Y-m-d', strtotime($request->lease_start));
            $params['lease_end'] = date('Y-m-d', strtotime($request->lease_end));
            $params['admin_id'] = $admin_id;
            $params['status'] = 1;

            if ($unitAllotment = PropertyUnitAllotment::create($params)) {
                PropertyUnit::where(['id' => $request->unit_id])->update(['allotment_id' => $unitAllotment->id, 'allotment_type' => 'rent', 'unit_status' => 2]);
                $action = new CreateInstallments($unitAllotment->id, $admin_id, $request->all());
                $action->execute();
                $res['status'] = 1;
                $res['next_url'] = route('allotment.detail', [$request->tenant_id, $unitAllotment->id]);
                $res['response'] = 'success';
                $res['message'] = 'Property allotment done to tenant';
            } else {
                $res['status'] = 0;
                $res['response'] = 'error';
                $res['message'] = 'Property allocation failed';
            }

        } else {
            $res['status'] = 0;
            $res['response'] = 'error';
            $res['message'] = 'Property allotment already done';
        }
        return response()->json($res);
    }

    public function view($tenant_id, $allotmentId)
    {
        $allotment = PropertyUnitAllotment::with(['tenant', 'property_unit', 'rent_installments'])->where(['id' => $allotmentId, 'tenant_id' => $tenant_id])->
        whereHas('property_unit', function ($query) {
            $query->with('propertyUnitType');
        })->first();
        if (!empty($allotment)) {
            return view('admin.allotProperty.view', \compact('allotment'));
        } else {
            return view('blank')->with('msg', 'No entry found');
        }

    }

    public function getPropertyList(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'city_id' => 'required',
        ]);
        if (!$validator->fails()) {
            $params['city_id'] = $request->city_id;
            $properties = Property::with('images')->where($params)->whereIn('prop_for', [1, 3, 4, 6, 8])->get();
            if (!$properties->isEmpty()) {
                $res['status'] = 1;
                $res['response'] = 'success';
                $res['message'] = 'Data found';
                $res['data'] = $properties;
            } else {
                $res['status'] = 0;
                $res['response'] = 'error';
                $res['message'] = 'Data not found';
            }
            return response()->json($res);
        }
        return response()->json(['response' => 'error', 'message' => $validator->errors()->all()]);
    }

    public function getPropertyUnitTypes(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'property_id' => 'required',
        ]);
        if(!$validator->fails())
        {
            $params['property_id'] = $request->property_id;
            $propertyUnitTypes = PropertyUnitType::where($params)->orderBy('flat_number','ASC')->get();
            if (!$propertyUnitTypes->isEmpty())
            {
                $result = ["status"=>1,"response"=>"success","data"=>$propertyUnitTypes,"message"=>"data found"];
            }
            else
            {
                $result = ["status"=>0,"response"=>"error","message"=>"data not found"];
            }
        }
        else
        {
            $result = ['status'=>0,'response' => 'error', 'message' => $validator->errors()->all()];
        }
        return response()->json($result,200);
    }

    /* ************ get property unit  list************* */
    public function getPropertyUnit(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'property_unit_type_id' => 'required',
        ]);
        if (!$validator->fails()) {
            $params['property_unit_type_id'] = $request->property_unit_type_id;
            $params['unit_status'] = 1;
            $params['status'] = 1;
            $propertyUnits = PropertyUnit::where($params)->get();
            if (!$propertyUnits->isEmpty()) {
                $res['status'] = 1;
                $res['response'] = 'success';
                $res['message'] = 'Data found';
                $res['data'] = $propertyUnits;
            } else {
                $res['status'] = 0;
                $res['response'] = 'error';
                $res['message'] = 'Data not found';
            }
            return response()->json($res);
        }
        return response()->json(['response' => 'error', 'message' => $validator->errors()->all()]);
    }

    public function renewal_break_down(Request $request, $id)
    {
        $allotment = PropertyUnitAllotment::with(['tenant','property','unit','breakdown'])->find($id);
        if(!empty($allotment))
        {
              return view("admin.allotProperty.breakDown",compact("allotment"));
        }
        else
        {
            return view("blank")->with(["message"=>"Invalid Allotment Detail"]);
        }

    }

    public function breakdown_pdf_view($breakdown = '')
    {

        $data = array();
        $data['break_down'] = DB::table('break_down_history')->where('id', $breakdown)->first();
        $data['tenant'] = Tenant::where('id', $data['break_down']->tenant_id)->first();
        return view('pdf.property.renewalBreakDown')->with($data);
    }

    public function store_renewal_breakdown(Request $request)
    {
          $validator = Validator::make($request->all(),
          [
            "tenant_id"=>"required|numeric",
            "property_id"=>"required|numeric",
            "unit_id"=>"required|numeric",
            "rent_period_type"=>"required",
            "rent_period"=>"required",
            "parking"=>"required",
            "lease_start"=>"required|date",
            "lease_end"=>"required|date",
            "rent_amount"=>"required|numeric",
            "installments"=>"required|numeric",
            "tenancy_type"=>"required",
            "unit_type"=>"required",
            "security_deposit.*"=>"numeric",
            "municipality_fees.*"=>"numeric",
            "brokerage.*"=>"numeric",
            "contract.*"=>"numeric",
            "remote_deposit.*"=>"numeric",
            "sewa_deposit.*"=>"numeric",
            "monthly_installment.*"=>"numeric",
            "total_monthly_installment.*"=>"numeric",

        ]);
          if(!$validator->fails())
          {

         if($id = (new CreateRentBreakDown('renewal'))->handle())
        {
            $next_url = null;
            if($request->has("next_action"))
            {
                $action = $request->input('next_action');
                switch ($action)
                {
                    case "print_breakdown":
                        $next_url = route('print.rent.breakdown',$id);
                        break;
                    case "preview":
                    default:
                         $next_url = route('view.rent.breakdown',$id);
                         break;
                }
            }

            $result = ['status'=>1,'response' => 'success','next_url'=>$next_url, 'message' => 'Rent breakdown renewed successfully'];
        }
         else
        {
            $result = ['status'=>0,'response' => 'error', 'message' => 'Rent breakdown not created.'];
        }

          }
          else
          {
              $result = ["status"=>0,"response"=>"validation_error","message"=>$validator->errors()->all()];
          }

           return response()->json($result,200);

    }

    public function store_eviction(Request $request)
    {

        if (TenantRemove::where('tenant_id', $request->tenant)->where('unit', $request->unit)->where('status', '0')->doesntExist()) {
            $obj = new TenantRemove();
            $obj->tenant_id = $request->tenant;
            $obj->unit = $request->unit;
            $obj->remark = $request->remark;
            $obj->type = '2';
            $obj->requested_by = auth()->user()->id;
            if ($obj->save()) {
                $result = array('status' => '1', 'msg' => 'Request Successfully Sent');
            } else {
                $result = array('status' => '0', 'msg' => 'Something went wrong!!');
            }
        } else {
            $result = array('status' => '0', 'msg' => 'A request of moveout or evict is already pending for this tenant with current unit.');

        }
        return json_encode($result);
    }

    public function store_move_out(Request $request)
    {
        if (TenantRemove::where('tenant_id', $request->tenant)->where('unit', $request->unit)->where('status', '0')->doesntExist()) {
            $obj = new TenantRemove();
            $obj->tenant_id = $request->tenant;
            $obj->unit = $request->unit;
            $obj->remark = $request->remark;
            $obj->type = '1';
            $obj->requested_by = auth()->user()->id;

            if ($obj->save()) {
                $result = array('status' => '1', 'msg' => 'Request Successfully Sent');
            } else {
                $result = array('status' => '0', 'msg' => 'Something went wrong!!');
            }
        } else {
            $result = array('status' => '0', 'msg' => 'A request of moveout or eviction is already pending for this tenant with current unit.');

        }
        return json_encode($result);
    }

    public function tenant_remove_request()
    {

        return view('admin.tenant.removeRequest');
    }

    public function fetch_all_removal_req(Request $request)
    {
        $columns = array(
            0 => 'id',
            1 => 'created_at'
        );

        $searchKeyWord = htmlspecialchars($request['search']['value']);
        $onlynumber = preg_replace('/\D/', '', $searchKeyWord);
        if ($onlynumber == '') {
            $onlynumber = $searchKeyWord;
        }
        $user_type = $request->param2;
        $status = $request->param1;
        $priority = $request->param;
        $day60 = date('Y-m-d', strtotime("+60 days"));
        $totalData = TenantRemove::count();
        $totalFiltered = $totalData;


        if (!empty($searchKeyWord)) {
            $data = TenantRemove::leftjoin('tenants', 'tenant_remove.tenant_id', '=', 'tenants.id')
                ->leftjoin('property_units', 'tenant_remove.unit', '=', 'property_units.id')
                ->where('tenant_remove.status', '0')
                ->select('tenants.name', 'tenant_remove.*', 'property_units.unitcode')
                ->get();
        } else {
            $data = TenantRemove::leftjoin('tenants', 'tenant_remove.tenant_id', '=', 'tenants.id')
                ->leftjoin('property_units', 'tenant_remove.unit', '=', 'property_units.id')
                ->where('tenant_remove.status', '0')
                ->orderBy($columns[$request["order"][0]["column"]], $request["order"][0]["dir"])
                ->offset($request['start'])
                ->limit($request['length'])
                ->select('tenants.name', 'tenant_remove.*', 'property_units.unitcode')
                ->get();
        }


        $json_data = array(
            "draw" => intval($request['draw']),
            "recordsTotal" => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data" => $data
        );

        echo json_encode($json_data);
    }

    public function store_remove_action(Request $request)
    {

        $obj = TenantRemove::findOrFail($request->id);
        $obj->status = $request->action;
        $obj->admin_id = auth()->user()->id;
        //$obj->admin_type    = $request->remark;
        if ($obj->save()) {
            if ($request->action == '1') {
                if ($obj->type == '1') {
                    $type = 'Moveout';
                    $unitstatus = '8';
                    $allotstatus = '2';
                } elseif ($obj->type == '2') {
                    $type = 'Eviction';
                    $unitstatus = '9';
                    $allotstatus = '3';
                } else {
                    $allotstatus = '2';
                    $type = 'Moveout';
                    $unitstatus = '8';
                }
                $unit = PropertyUnit::findOrFail($obj->unit);
                $unit->unit_status = $unitstatus;
                $unit->save();
                $res = DB::table("property_unit_allotment")->where('tenant_id', $obj->tenant_id)->where('unit_id', $obj->unit)->where('status', '1')->update(['status' => $allotstatus]);

            }

            $result = array('status' => '1', 'msg' => $type . ' Action Successfully Saved.');
        } else {
            $result = array('status' => '0', 'msg' => 'Something went wrong!!');
        }

        return json_encode($result);
    }
}
