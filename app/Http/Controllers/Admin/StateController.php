<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use App\DataTable\Api;
use App\State;
use App\Country;

class StateController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function fetch(Request $request)
    {
        echo json_encode((new Api((new State())))->getResult());
    }
    public function index()
    {
        $countryObject =  Country::where(['is_disabled'=>0])->orderBy('name','ASC')->get();
        $countries     = array();
        foreach($countryObject as $country)
        {
            $id               = $country->id;
            $country          = $country->name;
            $countries["$id"] = $country;
        }
        return view('admin.state.index',compact('countries'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'country_id' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if (!$validator->fails())
        {
            $state         = $request->only(['name', 'country_id']);
            $fileNameStore = NULL;
            $ext           = NULL;
            if($request->hasfile('image'))
            {
                $file = $request->file("image");
                if ($file->isValid()) {
                    $ext                = $file->getClientOriginalExtension();
                    $fileNameStore      = 'STATE' . time() . rand(1000, 9999) . '.' . $ext;
                    $path               = $file->move(public_path('/images/states/'), $fileNameStore);
                    $state['image']     = '/images/states/'.basename($path);

                }
            }
            $state['admin_id']    = Auth::guard('admin')->user()->id;
            $state['is_disabled'] = '0';
            $state['created_at']  = date('Y-m-d H:i:s');
            $insert               = State::create($state);
            if ($insert->id)
            {
                $state = State::with('country')->find($insert->id);
                return response()->json(['status'=>1,'response' => 'success','base_url'=>asset('/images/states/'), 'data' => $state, 'message' => 'State added successfully.']);
            } else
            {
                return response()->json(['status'=>0,'response' => 'error', 'message' => 'State addition failed']);
            }
        }
        else
        {
            return response()->json(['status'=>0,'response' => 'error', 'message' => $validator->errors()->all()]);
        }
    }


    public function show(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
        ]);
        if (!$validator->fails())
        {
            $state = State::with('country')->find($request->input('id'));
            if ($state)
            {
                return response()->json(['status'=>1,'response' => 'success', 'base_url' => asset('/images/states/'), 'data' => $state, 'message' => 'State found.']);
            }
            else
            {
                return response()->json(['status'=>0,'response' => 'error', 'message' => 'Specified State not found']);
            }
        }
        return response()->json(['status'=>0,'response' => 'error', 'message' => $validator->errors()->all()]);
    }


    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'country_id' => 'required|numeric',
            'id' => 'required|numeric',
            'image' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);
        if(!$validator->fails())
        {
            $state             = State::find($request->input('id'));
            $state->name       = $request->input('name');
            $state->country_id = $request->input('country_id');
            $state->updated_at = date('Y-m-d H:i:s');
            if($request->hasfile('image'))
            {
                $file = $request->file("image");
                if ($file->isValid()) {
                    $ext                = $file->getClientOriginalExtension();
                    $fileNameStore      = 'STATE' . time() . rand(1000, 9999) . '.' . $ext;
                    $path               = $file->move(public_path() . '/images/states/', $fileNameStore);
                    if($path)
                    {
                        $oldFile  = public_path().$state->image;
                        if(file_exists($file))
                        {
                            File::delete($oldFile);
                        }

                    }
                    $state->image    = '/images/states/'.basename($path);
                }
            }
            if ($state->save())
            {
                $state             = State::with('country')->find($request->input('id'));
                return response()->json(['status'=>1,'response' => 'success', 'base_url' => asset('/images/states/'), 'data' => $state,  'message' => 'State updated successfully.']);
            }
            else
            {
                return response()->json(['status'=>0,'response' => 'error', 'message' => 'State updation failed']);
            }
        }
        return response()->json(['status'=>0,'response' => 'error', 'message' => $validator->errors()->all()]);
    }


    public function destroy(Request $request)
    {
        $validator = Validator::make($request->all(), ['id' => 'required']);
        if (!$validator->fails())
        {
            if (State::destroy($request->input('id')))
            {
                return response()->json(['status'=>1,'response' => 'success', 'message' => 'State deleted successfully.']);
            }
             else
             {
                return response()->json(['status'=>0,'response' => 'error', 'message' => 'State deletion failed.']);
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
            if (State::where(['id' => $request->id])->update(['is_disabled' => $status]))
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
