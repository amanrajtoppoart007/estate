<?php

namespace App\Http\Controllers\Admin;
use App\Library\CreatePropertyCode;
use App\Library\StorePropertyUnitTypes;
use App\Library\UpdatePropertyUnitTypes;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProperty;
use App\Http\Requests\EditProperty;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\DataTable\Api;
use App\Agent;
use App\Owner;
use App\Property;
use App\Feature;
use App\State;
use App\Country;
use App\City;
use App\PropertyType;
use App\Image;
use App\Library\CreatePropertyImage;
class PropertyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function fetch(Request $request)
    {
         echo json_encode((new Api((new Property())))->getResult());
    }


    public function index()
    {
       return view('admin.property.index');
    }


    public function create()
    {
        $agents        = Agent::where(['is_disabled'=>'0'])->get();
        $owners        = Owner::where(['is_disabled'=>'0'])->whereIn('owner_type',['developer','both'])->get();
        $propertyTypes = PropertyType::where('is_disabled','0')->get();
        $countries     = Country::where(['is_disabled'=>0])->orderBy('name','ASC')->get();
        $cities        = City::where(['is_disabled'=>0,'country_id'=>231])->get();
        $features      = Feature::where('is_disabled', '0')->get();
        return view('admin.property.create',compact('agents','owners','features', 'countries', 'propertyTypes','cities'));
    }


    public function store(StoreProperty $request)
    {

        $request->validated();
        $insert               = $request->only(['title','status', 'type', 'prop_for','description','address',
            'city_id','country_id','zip','latitude', 'longitude','owner_id','completion_date','total_floors','total_flats','total_shops']);
        $features             = array_values($request->input('feature'));
        $insert['feature']    = implode(',', $features);
        $insert['admin_id']   = $admin_id = Auth::guard('admin')->user()->id;
        $insert['propcode']   = $propcode = (new CreatePropertyCode())->generate_property_code($request->all());
        $property             = Property::create($insert);
        if($property)
        {
            $images          =  new CreatePropertyImage($property->id,$propcode);
            $images->execute($request);

            $prop_unit         = new StorePropertyUnitTypes($property->id,$admin_id);
            $input             = $request->all();
            $input['propcode'] = $propcode;
            $prop_unit->handle($request,$input);
            $result = ["status"=>1,"response"=>"success","message"=>"Property successfully created"];
        }
        else
        {
            $result = ["status"=>0,"response"=>"error","message"=>"Property can not created successfully created"];
        }
        return response()->json($result,200);
    }

    public function view($id)
    {
        $property       = Property::find($id);
        if ($property)
        {
            $states         = State::where('is_disabled', '0')->get();
            $propertyTypes  = PropertyType::where('is_disabled', '0')->get();
            $countries      = Country::where('is_disabled', '0')->get();
            $features       = Feature::where('is_disabled', '0')->get();
            $owners         = Owner::where(['owner_type'=>'flat_owner','is_disabled'=> '0'])->get();
            $agents         = Agent::where('is_disabled', '0')->get();
            return view('admin.property.view', compact('property', 'states', 'features', 'countries', 'propertyTypes','owners','agents'));
        }
        else
        {
            return  redirect(route('property.list'))->with('error', 'Oops! no property found with given id');
        }
    }


    public function edit($id)
    {
        $agents        = Agent::where(['is_disabled'=>'0'])->get();
        $owners        = Owner::where(['is_disabled'=>'0'])->get();
        $states        = State::where('is_disabled','0')->get();
        $propertyTypes = PropertyType::where('is_disabled', '0')->get();
        $countries     = Country::where(['is_disabled'=>0])->orderBy('name','ASC')->get();
        $features      = Feature::where('is_disabled', '0')->get();
        $cities        = City::where(['is_disabled'=>0,'country_id'=>231])->get();
        $property      = Property::with("images","propertyUnitTypes","city","state","country","propertyType")->find($id);
          if($property)
          {
             return view('admin.property.edit',compact('agents','owners','property', 'states','features','countries','cities','propertyTypes'));
          }
          else
          {
           return  redirect(route('property.list'))->with('error', 'Oops! no property found with given id');
          }
    }


    public function update(EditProperty $request, $id)
    {
        $request->validated();
        $update               = $request->only(['title', 'type', 'prop_for', 'description', 'address',
            'city_id', 'country_id', 'zip', 'latitude', 'longitude','owner_id','completion_date','total_floors','total_flats','total_shops']);
        $features             = array_values($request->input('feature'));
        $update['feature']    = implode(', ', $features);
        $update['admin_id']   = $admin_id   = Auth::guard('admin')->user()->id;
        if(Property::where(['id'=>$id])->update($update))
        {
            $input             = $request->all();
            $input['propcode'] = $request->propcode;
            (new UpdatePropertyUnitTypes($id,$admin_id))->handle($request,$input);
            (new CreatePropertyImage($id,$request->propcode))->execute($request);
            $result = ["status"=>1,"response"=>"success","message"=>"Property updated successfully"];
        }
        else
        {
            $result = ["status"=>0,"response"=>"error","message"=>"Property not updated"];

        }
        return response()->json($result,200);
    }


    public function destroy(Request $request)
    {
        $validator = Validator::make($request->all(), ['id' => 'required']);
        if (!$validator->fails())
        {
            if(Property::destroy($request->input('id')))
            {
                if(Image::where('property', $request->input('id'))->get())
                {
                    Image::where('property', $request->input('id'))->delete();
                }
                return response()->json(['response' => 'success', 'message' => 'Property deleted successfully.']);
            }
            else
            {
                return response()->json(['response' => 'error', 'message' => 'Property deletion failed.']);
            }
        }
        else
        {
            return response()->json(['response' => 'error', 'message' => $validator->errors()->all()]);
        }
    }
    public function property_setting()
    {
        $data = array();
        return view('admin.property.setting')->with($data);
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
            if (Property::where(['id' => $request->id])->update(['is_disabled' => $status]))
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
    public function allotted_property()
    {
        $data = array();
        return view('admin.property.allottedProperty')->with($data);
    }
}
