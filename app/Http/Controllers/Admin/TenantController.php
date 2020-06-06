<?php

namespace App\Http\Controllers\Admin;

use DB;
use App\State;
use App\Tenant;
use App\Country;
use App\DataTable\Api;
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
    /*****ajax fetch *****/
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
        return view('admin.tenant.create')->with($data);
    }


    public function store(\App\Http\Requests\StoreTenant $request)
    {
        $request->validated();
        $action    = new \App\Library\CreateTenant();
        $tenant_id = $action->execute($request);
        if($tenant_id)
        {

            $doc = new \App\Library\UploadTenantDoc();
            $documents =  $doc->execute($request,$tenant_id);
            $profile = new \App\Library\CreateTenantProfile();
            $profile->execute($request,$tenant_id,$documents);
            if($request->tenant_type!='bachelor')
            {
               $relations = new \App\Library\CreateTenantRelation();
               $relations->execute($tenant_id,$request);
            }
            $res['next_url']  = route('tenant.view',$tenant_id);
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
        })->where(['id' => $id])->first();
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
            $data               = array();
            $data['state']      = State::where('is_disabled', '0')->get();
            $data['countries']  = Country::where('is_disabled', '0')->get();
            $data['tenant']     = $tenant;
            return view('admin.tenant.edit')->with($data);
        }
        else
        {
            return view('blank')->with('msg', 'Invalid data request');
        }
    }

    public function update(\App\Http\Requests\UpdateTenant $request, $id)
    {
        if(!empty($id))
        {
            $action = new \App\Library\UpdateTenant($id);
            $action->execute($request);
            $doc    = new \App\Library\UpdateTenantDoc($id);
            $documents = $doc->execute($request);
            $profile = new \App\Library\UpdateTenantProfile();
            $profile->execute($request,$id,$documents);
            if($request->tenant_type!='bachelor')
            {
               $relations  = new UpdateTenantRelation();
               $relations->execute($id,$request);
            }
            $res['next_url']  = route('tenant.view',$id);
            $res['response']  = 'success';
            $res['status']    = 1;
            $res['message']   = "Data updated successfully";
        }
        else
        {
            $res['status']   = 0;
            $res['response'] = 'error';
            $res['message']  = 'Invalid request';
        }
        echo json_encode($res);
    }

    public function destroy($id)
    {
        //
    }



    /*****tenant status change function */
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
                return response()->json(['status'=>'0','response' => 'error', 'message' => 'Status updation failed.']);
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
