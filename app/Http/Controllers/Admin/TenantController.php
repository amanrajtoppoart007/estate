<?php

namespace App\Http\Controllers\Admin;

use App\Library\CreateTenant;
use App\Library\CreateTenantProfile;
use App\Library\CreateTenantRelation;
use App\Library\UpdateTenant;
use App\Library\UpdateTenantDoc;
use App\Library\UpdateTenantProfile;
use App\Library\UploadEntityDocs;
use App\Library\UploadTenantDoc;
use App\RentEnquiry;
use DB;
use App\State;
use App\Tenant;
use App\Country;
use App\DataTable\Api;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\PropertyUnitAllotment;
use App\Http\Controllers\Controller;
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
        $model = new Tenant();
        $api    = new Api($model,$request);
        echo json_encode($api->apply());
    }

    public function index()
    {
        $data = array();

        return view('admin.tenant.index')->with($data);
    }


    public function create(Request $request)
    {
        $data               = array();
        $data['state']      = State::where('is_disabled', '0')->get();
        $data['countries']  = Country::where('is_disabled', '0')->get();
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


    public function store(\App\Http\Requests\StoreTenant $request)
    {
        $request->validated();
        $tenant_id = (new CreateTenant())->execute($request);
        if($tenant_id)
        {
            if($request->has('request_id'))
            {
                $request_id = base64_decode($request->request_id);
                RentEnquiry::where(['id'=>$request_id])->update(['status'=>1]);
            }
            (new UploadEntityDocs($tenant_id,'tenant'))->handle();

            (new CreateTenantProfile())->execute($request,$tenant_id);
            if($request->tenant_type!='bachelor')
            {
               (new CreateTenantRelation())->execute($tenant_id,$request);
            }
            if($request->has('next_action'))
            {
                $res['next_url']  = route('tenant.allot.property',$tenant_id);
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
        $tenant = Tenant::with('documents', 'profile', 'relations')->whereHas('documents', function ($query) {
            $query->where('tenant_documents.is_disabled', '0');
        })->find($id);
        if(!empty($tenant))
        {
            $data               = array();
            $data['state']      = State::where('is_disabled', '0')->get();
            $data['countries']  = Country::where('is_disabled', '0')->get();
            $data['tenant']     = $tenant;
            return view('admin.tenant.view')->with($data);
        }
        else
        {
            return view('blank')->with('msg','Invalid data request');
        }

    }

    public function edit($id)
    {
        $tenant            = Tenant::find($id);
        if(!empty($tenant))
        {

            $state      = State::where('is_disabled', '0')->get();
            $countries  = Country::where('is_disabled', '0')->get();
            return view('admin.tenant.edit',compact('state','countries','tenant'));
        }
        else
        {
            return view('blank')->with('msg', 'Invalid Tenant Detail');
        }
    }

    public function update(\App\Http\Requests\UpdateTenant $request, $id)
    {
        if(!empty($id))
        {

            (new UploadEntityDocs($id,'tenant'))->handle();
            (new UpdateTenant($id))->execute($request);
            (new UpdateTenantProfile())->execute($request,$id);
            if($request->tenant_type!='bachelor')
            {
               $relations  = new UpdateTenantRelation();
               $relations->execute($id,$request);
            }
            $result = ["next_url"=>route('tenant.view',$id),"response"=>"success","status"=>1,"message"=>"Data updated successfully"];
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


    /**
     * @param Request $request
     * @return JsonResponse
     */
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


        $day60 = date('Y-m-d', strtotime("+60 days"));
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
