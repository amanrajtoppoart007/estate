<?php

namespace App\Http\Controllers\Admin;

use App\City;
use App\Library\CreateTenantCode;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTenant;
use App\Http\Requests\EditTenant;
use App\Library\CreateTenantRelation;
use App\Library\TenantAction;
use App\Library\UploadEntityDocs;
use App\RentEnquiry;
use App\State;
use App\Tenant;
use App\Country;
use App\DataTable\Api;
use App\PropertyUnitAllotment;
use App\Library\UpdateTenantRelation;
use Illuminate\Support\Facades\Validator;

class TenantController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }


    public function fetch(Request $request)
    {
        echo json_encode((new Api((new Tenant())))->getResult());
    }

    public function index()
    {
        $data = array();

        return view('admin.tenant.index')->with($data);
    }


    public function create(Request $request)
    {
        $data               = array();
        $data['countries']  = Country::where(['is_disabled'=>'0'])->orderBy('name','ASC')->get();
        $data['codes']      = Country::where(['is_disabled'=>'0'])->where('name','like','%United Arab Emirates%')->get();
        if(!empty($request->request_id))
        {
            $data['user'] = RentEnquiry::find(base64_decode($request->request_id));
        }
        else
        {
            $data['user'] = null;
        }
        return view('admin.tenant.create')->with($data);
    }


    public function store(StoreTenant $request)
    {
        $request->validated();
        $tenant_id = (new TenantAction())->store_data();
        if($tenant_id)
        {
            $tenant = Tenant::find($tenant_id);
            $tenant->tenant_code = (new CreateTenantCode())->handle();
            $tenant->save();
            if($request->has('request_id'))
            {
                $request_id = base64_decode($request->request_id);
                RentEnquiry::where(['id'=>$request_id])->update(['status'=>1]);
            }
            (new UploadEntityDocs($tenant_id,'tenant'))->handle();

            if($request->tenant_type!='bachelor')
            {
               (new CreateTenantRelation())->execute($tenant_id);
            }
            if($request->has('next_action'))
            {
                if($request->next_action=="allot_unit")
                {
                    $next_url  = route('tenant.allot.property',$tenant_id);
                    if ($request->has('request_id')) {
                        $request_id = $request->request_id;
                         $next_url.="?request_id=$request_id";
                    }
                    $res['next_url']  = $next_url;
                }

            }
            else
            {
                $res['next_url']  = route('tenant.view',$tenant_id);
            }

            $res['response']  = 'success';
            $res['status']    = 1;
            $res['message']   = 'Data inserted';

        }
        else
        {
            $res['response'] = 'error';
            $res['status']   = 0;
            $res['message']  = 'Data insertion failed';
        }
        return json_encode($res);
    }

    public function show($id)
    {
        $tenant = Tenant::with(['allotment'])->find($id);
        if(!empty($tenant))
        {
            return view('admin.tenant.view',compact('tenant'));
        }
        else
        {
            return view('blank')->with('msg','Invalid data request');
        }

    }

    public function edit($id)
    {
           $tenant     = Tenant::find($id);
        if(!empty($tenant))
        {
            $countries  = Country::where('is_disabled', '0')->get();
            return view('admin.tenant.edit',compact('countries','tenant'));
        }
        else
        {
            return view('blank')->with('msg', 'Invalid Tenant Detail');
        }
    }

    public function update(EditTenant $request, $id)
    {
        if(!empty($id))
        {
            $tenant = Tenant::find($id);
            if(!empty($tenant))
            {
                (new TenantAction())->update_data();
                (new UploadEntityDocs($id,'tenant'))->handle();
                if($request->tenant_type!='bachelor')
                {
                   (new UpdateTenantRelation())->execute($id);
                }
                $result = ["next_url"=>route('tenant.view',$id),"response"=>"success","status"=>1,"message"=>"Data updated successfully"];
            }
            else
            {
                $result = ["response"=>"error","status"=>0,"message"=>"Invalid request"];
            }
        }
        else
        {
            $result = ["response"=>"error","status"=>0,"message"=>"Invalid request"];

        }
        echo json_encode($result);
    }

    public function destroy($id)
    {
        //
    }

    public function changeStatus(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'numeric|required',
            'is_disabled' => 'numeric',
        ]);
        if (!$validator->fails()) {
            $status = ($request->is_disabled) ? '0' : '1';
            if (Tenant::where(['id' => $request->id])->update(['is_disabled' => $status]))
            {
                return response()->json(['status'=>1,'response' => 'success', 'data' => ['is_disabled' => $status, 'id' => $request->id], 'message' => 'Status updated successfully.']);
            }
             else
            {
                return response()->json(['status'=>'0','response' => 'error', 'message' => 'Status not updated.']);
            }
        }
        return response()->json(['status'=>'0','response' => 'error', 'message' => $validator->errors()->all()]);
    }
    public function renewal_list()
    {
        $data = array();
        return view('admin.tenant.renewal_list')->with($data);
    }

    public function fetch_renewal(Request $request)
    {
        $columns = array(
            0 => 'id',
            1 => 'created_at'
        );

        $searchKeyWord  =  htmlspecialchars($request['search']['value']);
        $onlynumber     =  preg_replace('/\D/', '', $searchKeyWord);
        if ($onlynumber == '') {
            $onlynumber   = $searchKeyWord;
        }


        $day60 = date('Y-m-d', strtotime("+1000 days"));
        $totalData      =   PropertyUnitAllotment::where('lease_end', '<=', $day60)
            ->count();
        $totalFiltered  =   $totalData;


        if (!empty($searchKeyWord)) {
            $data = '';
        } else {
            $data = PropertyUnitAllotment::where('lease_end', '<=', $day60)
                ->orderBy($columns[$request["order"][0]["column"]], $request["order"][0]["dir"])
                ->offset($request['start'])
                ->limit($request['length'])
                ->with('property_unit', 'property', 'tenant')
                ->get();
        }


        $json_data = array(
            "draw"            => intval($request['draw']),
            "recordsTotal"    => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data"            => $data
        );

        echo json_encode($json_data);
    }

}
