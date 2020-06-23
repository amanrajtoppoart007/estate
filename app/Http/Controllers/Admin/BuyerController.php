<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\GlobalHelper;
use Str;
use App\Buyer;
class BuyerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.buyer.index');
    }
    /**
     * fetch  listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function fetch(Request $request)
    {
        $model  = new Buyer();
        $api    = new \App\DataTable\Api($model,$request);
        echo json_encode($api->apply());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.buyer.create');
    }


    public function store(\App\Http\Requests\StoreBuyer $request)
    {
        $request->validated();
        $input = $request->only(['name','email','mobile','emirates_id','country','state','city','address']);
        $input['password']    = Hash::make($request->password);
        $folder               = $request->mobile;
        $input['passport']    = GlobalHelper::singleFileUpload($request,'local', 'passport',"buyers/$folder");
        $input['visa']        = GlobalHelper::singleFileUpload($request,'local', 'visa',"buyers/$folder");
        $input['buyer_image'] = GlobalHelper::singleFileUpload($request,'local', 'buyer_image',"buyers/$folder");
        if(Buyer::create($input))
        {
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
        $data = Buyer::find($id);
        return view('admin.buyer.edit',\compact('data'));
    }


    public function update(\App\Http\Requests\UpdateBuyer $request, $id)
    {
        $request->validated();
        $input = $request->only(['name','email','mobile','emirates_id','country','state','city','address']);
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
