<?php

namespace App\Http\Controllers\Admin;

use App\City;
use App\Country;
use App\Http\Requests\EditDeveloper;
use App\Http\Requests\StoreDeveloper;
use App\Library\CreateAuthorisedPerson;

use App\Library\EditAuthorisedPerson;
use App\Library\EditOwnerAuthPerson;
use App\Library\UploadEntityDocs;
use App\Owner;
use App\OwnerDoc;
use App\State;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Helpers\GlobalHelper;
class DeveloperController extends Controller
{

    public function index()
    {
        return view('admin.developer.index');
    }

    public function fetch(Request $request)
    {
        $model = new Owner();
        $api    = new \App\DataTable\Api($model,$request);
        echo json_encode($api->apply());
    }


    public function create()
    {
        $countries = Country::where(['is_disabled'=>0,'code'=>'971'])->get();
        $states = State::where(['is_disabled'=>0,'country_id'=>1])->get();
        return view('admin.developer.create',compact("countries","states"));
    }


    public function store(StoreDeveloper $request)
    {
        $request->validated();
        $data   = $request->only(['name','mobile','email','emirates_id','bank_name','bank_swift_code',
        'bank_account','banking_name','country_id','state_id','city_id','address','country_code','owner_type','firm_type']);

        if($request->firm_type==='company')
        {
            $company_detail = $request->only(['owner_type','firm_type', 'company_name', 'trade_license', 'telephone_number', 'office_address']);
            $data = array_merge($data , $company_detail);
            $data['license_expiry_date'] = date('Y-m-d',strtotime($request->license_expiry_date));
        }
        $folder = Str::studly(strtolower($request->name));


        if($request->has('photo'))
        {
            $data['photo']    = GlobalHelper::singleFileUpload( 'local', 'photo', "developers/$folder");
        }


        $data['admin_id'] = Auth::guard('admin')->user()->id;
        $developer = Owner::create($data);
        if($developer->id)
        {
            try {
                (new UploadEntityDocs($developer->id,'owner'))->handle();
                (new CreateAuthorisedPerson($developer->id,'owner'))->handle();

                if ($request->firm_type == 'company')
                {
                    if ($request->has('vat_number')) {
                        $doc = array();
                        $doc['owner_id'] = $developer->id;
                        $doc['doc_url'] = GlobalHelper::singleFileUpload( 'local', 'vat_number', "owners/$folder");
                        $doc['doc_type'] = 'vat_number';
                        OwnerDoc::create($doc);

                    }

                    if ($request->has('trade_license')) {
                        $doc = array();
                        $doc['owner_id'] = $developer->id;
                        $doc['doc_url'] = GlobalHelper::singleFileUpload( 'local', 'trade_license', "owners/$folder");
                        $doc['doc_type'] = 'trade_license';
                        OwnerDoc::create($doc);
                    }

                }
                $result = ['status'=>'1','response'=>'success','message'=>'Developer added successfully'];
            }
            catch (\Exception $exception)
            {
                $result = ['status'=>'0','response'=>'error','message'=>$exception->getMessage()];
            }

        }
        else
        {
            $result = ['status'=>'0','response'=>'error','message'=>'Developer creation failed'];
        }
        return response()->json($result,200);
    }


    public function view($id)
    {
        $owner = Owner::find($id);
        return view('admin.developer.view',compact('owner'));
    }


    public function edit($id)
    {
        $owner = Owner::find($id);
        $countries = Country::where(['is_disabled'=>0,'code'=>'971'])->get();
        $states = State::where(['is_disabled'=>0,'country_id'=>1])->get();
        $cities = City::where(['is_disabled'=>0,'country_id'=>1])->get();
        return view('admin.developer.edit',compact('owner','countries','states','cities'));
    }


    public function update(EditDeveloper $request,$id)
    {
        $request->validated();
        $data  = $request->only(['name','owner_type','firm_type','mobile','email','emirates_id','bank_name','bank_swift_code','bank_account','banking_name','country_id','state_id','city_id','address','country_code']);
        $folder = Str::studly(strtolower($request->name));
        if($request->hasfile('photo'))
        {
            $data['photo']    = GlobalHelper::singleFileUpload('local','photo',"owners/$folder");
        }

        $data['admin_id'] = Auth::guard('admin')->user()->id;

        if(Owner::where(['id'=>$id])->update($data))
        {
              (new UploadEntityDocs($id,'owner'))->handle();
              (new EditAuthorisedPerson($request->owner_id,'owner'))->handle();
            if(!empty($request->auth_person_name))
            {
                       $action = new EditOwnerAuthPerson($request,$request->owner_id);
                       $action->execute();
            }

            if($request->firm_type == 'company')
            {
                if($request->has('vat_number'))
                {
                    $doc                = array();
                    $doc['owner_id']    = $id;
                    $doc['doc_url']     = GlobalHelper::singleFileUpload('local', 'vat_number', "owners/$folder");
                    $doc['doc_type']    = 'vat_number';
                    OwnerDoc::create($doc);

                }

                if($request->has('trade_license'))
                {
                    $doc                  = array();
                    $doc['owner_id']      = $id;
                    $doc['doc_url']       = GlobalHelper::singleFileUpload('local', 'trade_license', "owners/$folder");
                    $doc['doc_type']      = 'trade_license';
                    OwnerDoc::create($doc);
                }

            }
          return response()->json(['status'=>'1','response'=>'success','message'=>'Developer successfully updated'],200);
        }
        else
        {
            return response()->json(['status'=>'0','response'=>'error','message'=>'Developer detail update failed'],200);
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
