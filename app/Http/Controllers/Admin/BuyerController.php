<?php

namespace App\Http\Controllers\Admin;
use App\City;
use App\Country;
use App\SalesEnquiry;
use App\State;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\GlobalHelper;
use Str;
use App\Buyer;
class BuyerController extends Controller
{

    public function index()
    {
        return view('admin.buyer.index');
    }

    public function fetch(Request $request)
    {
        $model  = new Buyer();
        $api    = new \App\DataTable\Api($model,$request);
        echo json_encode($api->apply());
    }


    public function create(Request $request)
    {

        if($request->has('request_id'))
        {
            $request_id = base64_decode($request->request_id);
            $data['user'] = SalesEnquiry::find($request_id);
        }
        else
        {
            $data['user'] = null;
        }
        $data['countries'] = Country::where(['is_disabled'=>0])->get();
        $data['cities']    = City::where(['is_disabled'=>0])->get();
        return view('admin.buyer.create',$data);
    }


    public function store(\App\Http\Requests\StoreBuyer $request)
    {
        $request->validated();
        $input = $request->only(['name','email','mobile','emirates_id','country_id','state_id','city_id','address']);
        $input['password']    = Hash::make($request->password);
        $folder               = $request->mobile;
        $input['passport']    = GlobalHelper::singleFileUpload($request,'local', 'passport',"buyers/$folder");
        $input['visa']        = GlobalHelper::singleFileUpload($request,'local', 'visa',"buyers/$folder");
        $input['buyer_image'] = GlobalHelper::singleFileUpload($request,'local', 'buyer_image',"buyers/$folder");
        if(Buyer::create($input))
        {

            if($request->has('request_id'))
            {
                $request_id = base64_decode($request->request_id);
                SalesEnquiry::where(['id'=>$request_id])->update(['status'=>1]);
            }
            return response()->json(['status'=>1,'response'=>'success','message'=>'Buyer added successfully.'],200);
        }
        else
        {
            return response()->json(['status'=>'0','response'=>'error','message'=>'Something went wrong,please try again'],200);
        }
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $buyer = Buyer::find($id);
        if(!empty($buyer))
        {
            $countries = Country::where(['is_disabled'=>0])->get();
            $country_id = $buyer->country_id ? $buyer->country_id :null;
            if(!empty($country_id))
            {
                $s_params['country_id'] = $country_id;
            }
            $s_params['is_disabled'] = '0';
            $states = State::where($s_params)->get();
            $state_id = $buyer->state_id ? $buyer->state_id :null;
            if(!empty($state_id))
            {
                $c_params['state_id'] = $state_id;
            }
            $c_params['is_disabled'] = '0';
            $cities = City::where($c_params)->get();
           return view('admin.buyer.edit',\compact('buyer','countries','states','cities'));
        }
        else
        {
            return view("blank")->with(["msg"=>"Invalid Buyer Detail"]);
        }

    }


    public function update(\App\Http\Requests\UpdateBuyer $request, $id)
    {
        $request->validated();
        $input = $request->only(['name','email','mobile','emirates_id','country_id','state_id','city_id','address']);
        if(!empty($request->password))
        {
            $input['password']    = Hash::make($request->password);
        }

        $folder               = $request->mobile;
        if($request->hasfile('passport'))
        {
           $input['passport']    = GlobalHelper::singleFileUpload($request,'local', 'passport',"buyers/$folder");
        }
        if($request->hasfile('visa'))
        {
           $input['passport']    = GlobalHelper::singleFileUpload($request,'local', 'visa',"buyers/$folder");
        }
        if($request->hasfile('buyer_image'))
        {
           $input['passport']    = GlobalHelper::singleFileUpload($request,'local', 'buyer_image',"buyers/$folder");
        }
        if(Buyer::where(['id'=>$id])->update($input))
        {
            return response()->json(['status'=>1,'response'=>'success','message'=>'Buyer detail updated successfully.'],200);
        }
        else
        {
            return response()->json(['status'=>'0','response'=>'error','message'=>'Something went wrong,please try again'],200);
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
            'status' => 'numeric',
        ]);
        if(!$validator->fails())
        {
            $status = ($request->status) ? '0' : 1;
            if (Buyer::where(['id' => $request->id])->update(['status' => $status]))
            {
                return response()->json(['status'=>1,'response' => 'success', 'data' => ['status' => $status, 'id' => $request->id], 'message' => 'Status updated successfully.']);
            }
             else
            {
                return response()->json(['status'=>'0','response' => 'error', 'message' => 'Status updation failed.']);
            }
        }
        return response()->json(['status'=>'0','response' => 'error', 'message' => $validator->errors()->all()]);
    }
}
