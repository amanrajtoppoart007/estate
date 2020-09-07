<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\DataTable\Api;
use App\Country;
use App\State;
use App\City;

class CityController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }


    public function fetch()
    {
         echo json_encode((new Api((new City())))->getResult());
    }
    public function index()
    {

        $stateObject   = State::all();
        $countryObject = Country::all();
        $states        = array();
        $states['']    = 'Select State';
        foreach ($stateObject as $state)
        {
            $id            = $state->id;
            $states["$id"] = $state->name;
        }
        $countries     = array();
        $countries[''] = 'Select Country';
        foreach ($countryObject as $country)
        {
            $id               = $country->id;
            $countries["$id"] = $country->name;
        }
        return view('admin.city.index', compact('countries','states'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'state_id' => 'required|numeric',
            'country_id' => 'required|numeric'
        ]);
        if (!$validator->fails())
        {
            $city                = $request->all();
            $city['admin_id']    = Auth::guard('admin')->user()->id;
            $city['is_disabled'] = '0';
            $city['created_at']  = date('Y-m-d H:i:s');
            $insert              = City::create($city);
            if ($insert->id)
            {
                $city = City::with('state')->with('country')->find($insert->id);
                return response()->json(['status'=>1,'response' => 'success', 'data' => $city, 'message' => 'City added successfully.']);
            }
             else
            {
                return response()->json(['status'=>0,'response' => 'error', 'message' => 'City addition failed']);
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
            $city = City::with('state')->with('country')->find($request->input('id'));
            if($city)
            {
                return response()->json(['status'=>1,'response' => 'success', 'data' => $city, 'message' => 'City found.']);
            }
            else
            {
                return response()->json(['status'=>0,'response' => 'error', 'message' => 'Specified city not found']);
            }
        }
        return response()->json(['status'=>0,'response' => 'error', 'message' => $validator->errors()->all()]);
    }


    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'country_id' => 'required|numeric',
            'state_id' => 'required|numeric',
            'id' => 'required|numeric',
        ]);
        if (!$validator->fails())
        {
            $city             = City::find($request->input('id'));
            $city->name       = $request->input('name');
            $city->state_id   = $request->input('state_id');
            $city->country_id = $request->input('country_id');
            $city->updated_at = date('Y-m-d H:i:s');
            if ($city->save())
            {
                $city             = City::with('state')->with('country')->find($request->input('id'));
                return response()->json(['status'=>1,'response' => 'success', 'data' => $city,  'message' => 'City updated successfully.']);
            }
            else
            {
                return response()->json(['status'=>0,'response' => 'error', 'message' => 'City updation failed']);
            }
        }
        return response()->json(['status'=>0,'response' => 'error', 'message' => $validator->errors()->all()]);
    }


    public function destroy(Request $request)
    {
        $validator = Validator::make($request->all(), ['id' => 'required']);
        if (!$validator->fails())
        {
            if (City::destroy($request->input('id')))
            {
                return response()->json(['status'=>1,'response' => 'success', 'message' => 'City deleted successfully.']);
            }
            else
            {
                return response()->json(['status'=>0,'response' => 'error', 'message' => 'City deletion failed.']);
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
            if (City::where(['id' => $request->id])->update(['is_disabled' => $status]))
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
