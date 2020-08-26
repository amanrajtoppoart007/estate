<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\DataTable\Api;
use App\Country;

class CountryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return void
     */
    public function fetch(Request $request)
    {
        $model  = new Country();
        $api    = new Api($model,$request);
        echo json_encode($api->apply());
    }
    public function index()
    {
        $countries = Country::orderBy('created_at', 'DESC')->paginate(10);
        return view('admin.country.index')->with('countries', $countries);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:countries',
            'code' => 'required|numeric|unique:countries'
        ]);
        if (!$validator->fails())
        {
            $country                = $request->only('name','code');
            $country['admin_id']    = Auth::guard('admin')->user()->id;
            $country['is_disabled'] = '0';
            $country['created_at']  = date('Y-m-d H:i:s');
            $insert                 = Country::create($country);
            if($insert->id)
            {
                $country = Country::find($insert->id);
                return response()->json(['status'=>1,'response' => 'success', 'data' => $country, 'message' => 'Country added successfully.']);
            }
             else
            {
                return response()->json(['status'=>0,'response' => 'error', 'message' => 'Country addition failed']);
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
        if(!$validator->fails())
        {
            $country = Country::find($request->input('id'));
            if ($country)
            {
                return response()->json(['status'=>1,'response' => 'success', 'data' => $country, 'message' => 'country found.']);
            }
            else
            {
                return response()->json(['status'=>0,'response' => 'error', 'message' => 'Specified country not found']);
            }
        }
        return response()->json(['status'=>0,'response' => 'error', 'message' => $validator->errors()->all()]);
    }


    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'code' => 'required',
            'id' => 'required',
        ]);
        if (!$validator->fails()) {
            $country             = Country::find($request->input('id'));
            $country->name       = $request->name;
            $country->code       = $request->code;
            $country->updated_at = date('Y-m-d H:i:s');
            if ($country->save())
            {
                $country             = Country::find($request->input('id'));
                return response()->json(['status'=>1,'response' => 'success', 'data' => $country,  'message' => 'Country updated successfully.']);
            }
            else
            {
                return response()->json(['status'=>0,'response' => 'error', 'message' => 'Country updation failed']);
            }
        }
        return response()->json(['status'=>0,'response' => 'error', 'message' => $validator->errors()->all()]);
    }


    public function destroy(Request $request)
    {
        $validator = Validator::make($request->all(), ['id' => 'required']);
        if (!$validator->fails())
        {
            if (Country::destroy($request->input('id')))
            {
                return response()->json(['status'=>1,'response' => 'success', 'message' => 'Country deleted successfully.']);
            }
            else
            {
                return response()->json(['status'=>0,'response' => 'error', 'message' => 'Country deletion failed.']);
            }
        }
         else
        {
            return response()->json(['status'=>0,'response' => 'error', 'message' => $validator->errors()->all()]);
        }
    }

    /********** active inactive model instance    ****************/
     public function changeStatus(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'numeric|required',
            'is_disabled' => 'numeric',
        ]);
        if (!$validator->fails()) {
            $status = ($request->is_disabled) ? '0' : '1';
            if (Country::where(['id' => $request->id])->update(['is_disabled' => $status]))
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
