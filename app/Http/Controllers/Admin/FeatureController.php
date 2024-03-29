<?php

namespace App\Http\Controllers\Admin;

use App\Feature;
use Illuminate\Http\Request;
use App\Http\Requests\StoreFeature;
use App\Http\Controllers\Controller;
use App\Http\Resources\FeatureResource;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class FeatureController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $features = Feature::orderBy('created_at','DESC')->paginate(8);
        return view('admin.features.index')->with('features', $features);
    }


    public function store(StoreFeature $request)
    {
            $request->validated();
            $feature                = $request->all();
            $feature['admin_id']    = Auth::guard('admin')->user()->id;
            $feature['is_disabled'] = '0';
            $insert                 = Feature::create($feature);
            if($insert->id)
            {
                $feature = new  FeatureResource(Feature::find($insert->id));
                return response()->json(['response' => 'success', 'data' => $feature, 'message' => 'Feature added successfully.']);
            }
            else
            {
                return response()->json(['response' => 'error', 'message' => 'Feature addition failed']);
            }
    }


    public function show(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
        ]);
        if(!$validator->fails())
        {
            $feature = Feature::find($request->input('id'));
            if($feature)
            {
                return response()->json(['response' => 'success', 'data' => $feature, 'message' => 'Feature found.']);
            }
             else
            {
                return response()->json(['response' => 'error', 'message' => 'Specified feature not found']);
            }
        }
        return response()->json(['response' => 'error', 'message' => $validator->errors()->all()]);
    }


    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'id' => 'required',
        ]);
        if (!$validator->fails())
        {
            $feature             = Feature::find($request->input('id'));
            $feature->title      = $request->input('title');
            $feature->updated_at = date('Y-m-d H:i:s');
            if ($feature->save())
            {
                $feature             = new FeatureResource(Feature::find($request->input('id')));
                return response()->json(['response' => 'success','data'=> $feature,  'message' => 'Feature updated successfully.']);
            }
            else
            {
                return response()->json(['response' => 'error', 'message' => 'Feature updation failed']);
            }
        }
        return response()->json(['response' => 'error', 'message' => $validator->errors()->all()]);
    }


    public function destroy(Request $request)
    {
        $validator = Validator::make($request->all(), ['id' => 'required']);
        if(!$validator->fails())
        {
            if(Feature::destroy($request->input('id')))
            {
                return response()->json(['response' => 'success','message' => 'Feature deleted successfully.']);
            }
            else
            {
                return response()->json(['response' => 'error', 'message' => 'Feature deletion failed.']);
            }
        }
        else
        {
            return response()->json(['response' => 'error', 'message' => $validator->errors()->all()]);
        }
    }

}
