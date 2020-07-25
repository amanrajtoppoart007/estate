<?php

namespace App\Http\Controllers\Admin;

use App\Library\CreateOwnerAuthPerson;
use App\Library\EditOwnerAuthPerson;
use App\Owner;
use App\OwnerDoc;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Helpers\GlobalHelper;
class OwnerController extends Controller
{

    public function index()
    {
        return view('admin.owner.index');
    }

    public function fetch(Request $request)
    {
        $model = new Owner();
        $api    = new \App\DataTable\Api($model,$request);
        echo json_encode($api->apply());
    }


    public function create()
    {
        return view('admin.owner.create');
    }


    public function store(\App\Http\Requests\StoreOwner $request)
    {
        $request->validated();
        $data   = $request->only(['name','owner_type','firm_type','mobile','email','emirates_id','bank_name','bank_swift_code',
        'bank_account','banking_name','country','state','city','address','country_code']);
        $data['emirates_exp_date'] = date('Y-m-d',strtotime($request->emirates_exp_date));
        $data['passport_exp_date'] = date('Y-m-d',strtotime($request->passport_exp_date));
        $data['visa_exp_date'] = date('Y-m-d',strtotime($request->visa_exp_date));
        $data['poa_exp_date'] = date('Y-m-d',strtotime($request->poa_exp_date));
        if($request->firm_type==='company')
        {
            $company_detail = $request->only(['company_name', 'trade_license', 'telephone_number', 'office_address']);
            $data = array_merge($data , $company_detail);
            $data['license_expiry_date'] = date('Y-m-d',strtotime($request->license_expiry_date));
        }
        $folder = Str::studly(strtolower($request->name));
        if($request->has('photo'))
        {
            $data['photo']    = GlobalHelper::singleFileUpload($request, 'local', 'photo', "owners/$folder");
        }
        if($request->has('emirates_id_doc'))
        {
            $data['emirates_id_doc']    = GlobalHelper::singleFileUpload($request, 'local', 'emirates_id_doc', "owners/$folder");
        }

        if($request->has('passport'))
        {
            $data['passport'] = GlobalHelper::singleFileUpload($request, 'local', 'passport', "owners/$folder");
        }

        if($request->has('visa'))
        {
            $data['visa']     = GlobalHelper::singleFileUpload($request, 'local', 'visa', "owners/$folder");
        }

        $data['admin_id'] = Auth::guard('admin')->user()->id;
        $action = Owner::create($data);
        if($action->id)
        {
            try {
                if (!empty($request->auth_person_name)) {
                       $action = new CreateOwnerAuthPerson($request, $action->id);
                       $action->execute();
                }
                if ($request->firm_type == 'company') {
                    if ($request->has('vat_number')) {
                        $doc = array();
                        $doc['owner_id'] = $action->id;
                        $doc['doc_url'] = GlobalHelper::singleFileUpload($request, 'local', 'vat_number', "owners/$folder");
                        $doc['doc_type'] = 'vat_number';
                        OwnerDoc::create($doc);

                    }

                    if ($request->has('trade_license')) {
                        $doc = array();
                        $doc['owner_id'] = $action->id;
                        $doc['doc_url'] = GlobalHelper::singleFileUpload($request, 'local', 'trade_license', "owners/$folder");
                        $doc['doc_type'] = 'trade_license';
                        OwnerDoc::create($doc);
                    }

                }
                $result = ['status'=>'1','response'=>'success','message'=>'Owner added successfully'];
            }
            catch (\Exception $exception)
            {
                $result = ['status'=>'0','response'=>'error','message'=>$exception->getMessage()];
            }

        }
        else
        {
            $result = ['status'=>'0','response'=>'error','message'=>'Owner creation failed'];
        }
        return response()->json($result,200);
    }


    public function view($id)
    {
        $owner = Owner::find($id);
        return view('admin.owner.view',compact('owner'));
    }


    public function edit($id)
    {
        $owner = Owner::find($id);
        return view('admin.owner.edit',compact('owner'));
    }


    public function update(\App\Http\Requests\EditOwner $request,$id)
    {
        $request->validated();
        $data  = $request->only(['name','owner_type','firm_type','mobile','email','emirates_id','bank_name','bank_swift_code','bank_account','banking_name','country','state','city','address','country_code']);
        $data['emirates_exp_date'] = date('Y-m-d',strtotime($request->emirates_exp_date));
        $data['passport_exp_date'] = date('Y-m-d',strtotime($request->passport_exp_date));
        $data['visa_exp_date'] = date('Y-m-d',strtotime($request->visa_exp_date));
        $data['poa_exp_date'] = date('Y-m-d',strtotime($request->poa_exp_date));
        $folder = Str::studly(strtolower($request->name));
        if($request->hasfile('photo'))
        {
            $data['photo']    = GlobalHelper::singleFileUpload($request,'local','photo',"owners/$folder");
        }
        if($request->hasfile('passport'))
        {
            $data['passport']    = GlobalHelper::singleFileUpload($request,'local','passport',"owners/$folder");
        }
        if($request->hasfile('visa'))
        {
            $data['visa']    = GlobalHelper::singleFileUpload($request,'local','visa',"owners/$folder");
        }
        if($request->has('emirates_id_doc'))
        {
            $data['emirates_id_doc']    = GlobalHelper::singleFileUpload($request, 'local', 'emirates_id_doc', "owners/$folder");
        }
        $data['admin_id'] = Auth::guard('admin')->user()->id;
        if(Owner::where(['id'=>$id])->update($data))
        {
            $authPersonEdit = new EditOwnerAuthPerson($request,$request->owner_id);
            $authPersonEdit->execute();
            if($request->firm_type == 'company')
            {
                if($request->has('vat_number'))
                {
                    $doc                = array();
                    $doc['owner_id']    = $id;
                    $doc['doc_url']     = GlobalHelper::singleFileUpload($request, 'local', 'vat_number', "owners/$folder");
                    $doc['doc_type']    = 'vat_number';
                    OwnerDoc::create($doc);

                }

                if($request->has('trade_license'))
                {
                    $doc                  = array();
                    $doc['owner_id']      = $id;
                    $doc['doc_url']       = GlobalHelper::singleFileUpload($request, 'local', 'trade_license', "owners/$folder");
                    $doc['doc_type']      = 'trade_license';
                    OwnerDoc::create($doc);
                }

            }
          return response()->json(['status'=>'1','response'=>'success','message'=>'Owner successfully updated'],200);
        }
        else
        {
            return response()->json(['status'=>'0','response'=>'error','message'=>'Owner updation failed'],200);
        }
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
        if(!$validator->fails())
        {
            $status = ($request->is_disabled) ? '0' : '1';
            if (Owner::where(['id' => $request->id])->update(['is_disabled' => $status]))
            {
                return response()->json(['status'=>1,'response' => 'success', 'data' => ['is_disabled' => $status, 'id' => $request->id], 'message' => 'Status updated successfully.']);
            }
             else
            {
                return response()->json(['status'=>'0','response' => 'error', 'message' => 'Status update failed.']);
            }
        }
        return response()->json(['status'=>'0','response' => 'error', 'message' => $validator->errors()->all()]);
    }
}
