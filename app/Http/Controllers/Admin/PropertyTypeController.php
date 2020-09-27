<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\PropertyType;
use App\DataTable\Api;
use Illuminate\View\View;

class PropertyTypeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        return view('admin.propertyType.index');
    }

    public function fetch(Request $request)
    {
         echo json_encode((new Api((new PropertyType())))->getResult());
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), ['title' => 'required']);
        if (!$validator->fails())
        {
            $propertyType                = $request->all();
            $propertyType['admin_id']    = Auth::guard('admin')->user()->id;
            $propertyType['is_disabled'] = '0';
            $insert                      = PropertyType::create($propertyType);
            if ($insert->id)
            {
                $propertyType = PropertyType::find($insert->id);
                return response()->json(['status'=>1,'response' => 'success', 'data' => $propertyType, 'message' => 'Property Type added successfully.']);
            }
            else
            {
                return response()->json(['status'=>0,'response' => 'error', 'message' => 'Property Type addition failed']);
            }
        }
        else
        {
            return response()->json(['status'=>0,'response' => 'error', 'message' => $validator->errors()->all()]);
        }
    }


    public function show(Request $request)
    {
        $validator = Validator::make($request->all(),['id' => 'required']);
        if (!$validator->fails())
        {
            $propertyType = PropertyType::find($request->input('id'));
            if($propertyType)
            {
                return response()->json(['status'=>1,'response' => 'success', 'data' => $propertyType, 'message' => 'Property Type found.']);
            }
            else
            {
                return response()->json(['status'=>0,'response' => 'error', 'message' => 'Property Type not found']);
            }
        }
        else
        {
            return response()->json(['status'=>0,'response' => 'error', 'message' => $validator->errors()->all()]);
        }
    }


    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'id' => 'required',
        ]);
        if (!$validator->fails())
        {
            $propertyType              = PropertyType::find($request->input('id'));
            $propertyType->title       = $request->input('title');
            $propertyType->admin_id    = Auth::guard('admin')->user()->id;
            $propertyType->updated_at  = date('Y-m-d H:i:s');
            if ($propertyType->save())
            {
                $propertyType           = PropertyType::find($request->input('id'));
                return response()->json(['status'=>1,'response' => 'success', 'data' => $propertyType,  'message' => 'Property Type updated successfully.']);
            }
            else
            {
                return response()->json(['status'=>0,'response' => 'error', 'message' => 'Property Type updation failed']);
            }
        }
        return response()->json(['status'=>0,'response' => 'error', 'message' => $validator->errors()->all()]);
    }


    public function destroy(Request $request)
    {
        $validator = Validator::make($request->all(), ['id' => 'required']);
        if (!$validator->fails())
        {
            if(PropertyType::destroy($request->input('id')))
            {
                return response()->json(['status'=>1,'response' => 'success', 'message' => 'Property Type deleted successfully.']);
            }
             else
             {
                return response()->json(['status'=>0,'response' => 'error', 'message' => 'Property Type deletion failed.']);
             }
        }
         else
         {
            return response()->json(['status'=>0,'response' => 'error', 'message' => $validator->errors()->all()]);
         }
    }
    public function changeStatus(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'numeric|required',
            'is_disabled' => 'numeric',
        ]);
        if (!$validator->fails()) {
            $status = ($request->is_disabled) ? '0' : '1';
            if (PropertyType::where(['id' => $request->id])->update(['is_disabled' => $status]))
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
}
