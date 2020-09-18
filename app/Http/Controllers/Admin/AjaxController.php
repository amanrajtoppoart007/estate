<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\State;
use App\Image;
use App\Item;
use App\City;
use App\Property;
use App\PropertyUnitType;
use App\PropertyUnit;
use File;
use Illuminate\Support\Facades\Validator;
class AjaxController extends Controller
{
    public function get_state_list(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'country_id' => 'required',
        ]);
        if (!$validator->fails())
        {
            $states = State::where(['country_id'=>$request->input('country_id'),'is_disabled'=>'0'])->get();
            if(!$states->isEmpty())
            {
                return response()->json(['response' => 'success','data'=>$states, 'message' => 'States found for selected country.']);
            }
            else
            {
                return response()->json(['response' => 'error', 'message' =>'No state Found']);
            }
        }
        return response()->json(['response'=>'error','message' => $validator->errors()->all()]);
    }
    public function get_cities_list(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'state_id' => 'required',
        ]);
        if (!$validator->fails())
        {
            $cities = City::where(['state_id' => $request->input('state_id'), 'is_disabled' => '0'])->get();
            if(!$cities->isEmpty())
            {
                return response()->json(['response' => 'success','data'=> $cities, 'message' => 'City list found for selected state.']);
            }
            else
            {
                return response()->json(['response' => 'error', 'message' =>'No city Found']);
            }
        }
        return response()->json(['response'=>'error','message' => $validator->errors()->all()]);
    }

    public function deletePropertyImages(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
        ]);
        if (!$validator->fails())
        {
            $image = Image::find($request->input('id'));
            if($image)
            {
                 $file = public_path() .$image->image_url;
                 if(file_exists($file))
                 {
                     File::delete($file);
                 }
            }
            if(Image::destroy($request->input('id')))
            {

                return response()->json(['response' => 'success', 'message' => 'Image Deleted Successfully']);
            }
            else
            {
                return response()->json(['response' => 'error', 'message' =>'Image Can Not Deleted']);
            }
        }
        return response()->json(['response'=>'error','message' => $validator->errors()->all()]);
    }


    //////Property ajax/
    public function select2_get_property(Request $request)
    {

        $result = Property::where('title', 'LIKE', '%' . $request->q . '%')->orWhere('propcode', 'LIKE', '%' . $request->q . '%')->get();
        $data   = array();
        foreach ($result as $value) {
            $data[] = ['id' => $value->id, 'text' => $value->propcode . ' ' . $value->title];
        }


        return json_encode($data);
    }
    public function get_units_by_porperty(Request $request)
    {
        $id = $request->propid;
        $data = PropertyUnit::select('id', 'unitcode', 'title','flat_house_no')->where('property_id', '=', $id)->get();
        return json_encode($data);
    }
    public function select2_get_items(Request $request)
    {

        $result = Item::where('name', 'LIKE', '%' . $request->q . '%')->get();
        $data   = array();
        foreach ($result as $value) {
            $data[] = ['id' => $value->id, 'text' => $value->name];
        }

        return json_encode($data);
    }
 public function store_items(Request $request)
 {
    $obj = new Item();
    $obj->name          = $request->title;
    $obj->unit_price    = $request->price;
    $obj->admin_id      = auth()->user()->id;
    if($obj->save()){
       $data = array('status'=>1,'msg'=>'Successfully stored new item','data'=>$obj);
    }else{
        $data = array('status'=>'0','msg'=>'Something went wrong!!');
    }
     return json_encode($data);
 }
}
