<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Helpers\GlobalHelper;
use App\PropertySale;
use App\Property;
use App\State;
use App\PropertyUnitType;
use App\PropertyUnit;
use App\PropertyUnitAllotment;
use App\RentInstallment;
use App\Buyer;
use Auth;
class SalePropertyController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index()
    {
        return view('admin.sale.index');
    }
    /**
     * Allocate property to a user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function fetch(Request $request)
    {
        $model  = new PropertySale();
        $api    = new \App\DataTable\Api($model,$request);
        echo json_encode($api->apply());
    }
    public function buyer_list()
    {
        $buyers = Buyer::where(['status'=>'1'])->get();
        return view('admin.sale.buyer_list',compact('buyers'));
    }
    public function create(Request $request,$id)
    {
            $buyer      = Buyer::find($id);
            $properties = Property::where(['is_disabled'=>'1'])->get();
            $states     = State::where(['is_disabled'=>'0'])->get();
            return view('admin.sale.create',\compact('buyer','properties','states'));
    }
    public function book_property(Request $request)
    {
        $validator = Validator::make($request->all(), [
                'buyer_id' => 'required|numeric',
                'owner_id' => 'required|numeric',
                'selling_price' => 'required|numeric',
                'booking_amount' => 'required|numeric',
                'property_id' => 'required|numeric',
                'property_unit_type_id' => 'required|numeric',
                'unit_id' => 'required|numeric|unique:property_sales,unit_id',
            ]);
            if(!$validator->fails())
            {
                $input             = $request->only(['buyer_id','selling_price','booking_amount','property_id','unit_id']);
                $property          = Property::find($request->property_id);
                $owner_id          = ($property->owner_id)?($property->owner_id):null;
                $agent_id          = ($property->agent_id)?($property->agent_id):null;
                $input['owner_id'] = $owner_id;
                $input['agent_id'] = $agent_id;
                $input['status']   = '0';
                if($data = PropertySale::create($input))
                {
                    PropertyUnit::where(['id'=>$request->unit_id])->update(['allotment_id'=>$data->id,'allotment_type'=>'sale','status'=>'7']);

                    $res['status']   = 1;
                    $res['response'] = 'success';
                    $res['message']  = 'Property Booking completed';
                    $res['next_url'] = '';
                    $res['data']     = $data;
                }
                else 
                {
                    $res['status']   = 0;
                    $res['response'] = 'error';
                    $res['message']  = 'Data not found';
                }
                return response()->json($res);
            }
            return response()->json(['response'=>'error','message' => $validator->errors()->all()]);     
    }
    public function show($id)
    {
        $data = PropertySale::with('agent','owner','buyer','property_unit','property_unit_type')->find($id);
        return view('admin.sale.view',\compact('data'));
    }
    public function getPropertyList(Request $request)
    {
            $validator = Validator::make($request->all(), [
                'city_id' => 'required',
            ]);
            if(!$validator->fails())
            {
                $params['city_id']  = $request->city_id;
                $params['prop_for'] = 2;
                $properties = Property::with('images')->where($params)->get();
                if(!$properties->isEmpty())
                {
                    $res['status']   = 1;
                    $res['response'] = 'success';
                    $res['message']  = 'Data found';
                    $res['data']     = $properties;
                }
                else 
                {
                    $res['status']   = 0;
                    $res['response'] = 'error';
                    $res['message']  = 'Data not found';
                }
                return response()->json($res);
            }
            return response()->json(['response'=>'error','message' => $validator->errors()->all()]);
    }
    public function getPropertyUnitTypes(Request $request)
    {
            $validator = Validator::make($request->all(), [
                'property_id' => 'required',
            ]);
            if (!$validator->fails())
            {
            $params['property_id'] = $request->property_id;
                $propertyUnitTypes = PropertyUnitType::where($params)->get();
                if(!$propertyUnitTypes->isEmpty())
                {
                    $res['status']   = 1;
                    $res['response'] = 'success';
                    $res['message']  = 'Data found';
                    $res['data']     = $propertyUnitTypes;
                }
                else 
                {
                    $res['status']   = 0;
                    $res['response'] = 'error';
                    $res['message']  = 'Data not found';
                }
            return response()->json($res);
            }
            return response()->json(['response'=>'error','message' => $validator->errors()->all()]);
    }
        /* ************ get proprety unit  list************* */
    public function getPropertyUnit(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'property_unit_type_id' => 'required',
        ]);
        if (!$validator->fails())
        {
            $params['property_unit_type_id'] = $request->property_unit_type_id;
            $params['unit_status']           = 1;
            $params['status']                = 1;
            $propertyUnits = PropertyUnit::where($params)->get();
            if(!$propertyUnits->isEmpty())
            {
                $res['status']   = 1;
                $res['response'] = 'success';
                $res['message']  = 'Data found';
                $res['data']     = $propertyUnits;
            }
            else 
            {
                $res['status']   = 0;
                $res['response'] = 'error';
                $res['message']  = 'Data not found';
            }
        return response()->json($res);
        }
        return response()->json(['response'=>'error','message' => $validator->errors()->all()]);
    }
    public function getPropertyUnitDetail(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'unit_id' => 'required',
        ]);
        if (!$validator->fails())
        {
            $unit = PropertyUnit::with(['property','propertyUnitType'])->find($request->unit_id);
            if(!empty($unit))
            {
                $res['status']   = 1;
                $res['response'] = 'success';
                $res['message']  = 'Data found';
                $res['data']     = $unit;
            }
            else 
            {
                $res['status']   = 0;
                $res['response'] = 'error';
                $res['message']  = 'Data not found';
            }
        return response()->json($res);
        }
        return response()->json(['response'=>'error','message' => $validator->errors()->all()]);
    }

    public function getPropertyOwnerDetail(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'property_id' => 'required',
        ]);
        if (!$validator->fails())
        {
            $property = Property::with(['owner'])->find($request->property_id);
            if(!empty($property->owner))
            {
                $res['status']   = 1;
                $res['response'] = 'success';
                $res['message']  = 'Data found';
                $res['data']     = $property->owner;
            }
            else 
            {
                $res['status']   = 0;
                $res['response'] = 'error';
                $res['message']  = 'Data not found';
            }
        return response()->json($res,200);
        }
        return response()->json(['response'=>'error','message' => $validator->errors()->all()]);
    }

    /******* upload documents to complete 2nd step********/

    public function upload_docs(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'property_sales_id' => 'required|numeric',
            'mulkia_by_owner' => 'required|mimes:jpeg,png,jpg,pdf|max:10048',
            'mulkia_by_buyer' => 'required|mimes:jpeg,png,jpg,pdf|max:10048',
            'sell_agreement' => 'required|mimes:jpeg,png,jpg,pdf|max:10048',
        ]);
        if (!$validator->fails())
        {
             $folder                    = date('Y-m-d');
             $upload['mulkia_by_owner'] = GlobalHelper::singleFileUpload($request,'local','mulkia_by_owner',"agreements/$folder");
             $upload['mulkia_by_buyer'] = GlobalHelper::singleFileUpload($request,'local','mulkia_by_buyer',"agreements/$folder");
             $upload['sell_agreement']  = GlobalHelper::singleFileUpload($request,'local','sell_agreement',"agreements/$folder");
             $upload['status']          = 1;//status code for registration process activation
            if(PropertySale::where(['id'=>$request->property_sales_id])->update($upload))
            {
                $res['status']   = 1;
                $res['response'] = 'success';
                $res['message']  = 'Sales record updated successfully';
            }
            else 
            {
                $res['status']   = 0;
                $res['response'] = 'error';
                $res['message']  = 'Sales record updation failed';
            }
          return response()->json($res,200);
        }
        return response()->json(['response'=>'error','message' => $validator->errors()->all()]);
    }
    public function completePropertySell(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required|numeric',
            'title_deed' => 'required|mimes:jpeg,png,jpg,pdf|max:10048',
        ]);
        if (!$validator->fails())
        {
             $folder                    = date('Y-m-d');
             $upload['title_deed']      = GlobalHelper::singleFileUpload($request,'local','title_deed',"agreements/$folder");
             $upload['status']          = 2;//status code for registration process activation
            if(PropertySale::where(['id'=>$request->id])->update($upload))
            {
                $unit_id   = pluck_single_value('property_sales','id',$request->id,'unit_id');
                if(!empty($unit_id))
                {
                   PropertyUnit::where(['id'=>$unit_id])->update(['allotment_id' =>$request->id, 'allotment_type' => 'sale', 'unit_status'=>8]);
                }
                $res['status']   = 1;
                $res['response'] = 'success';
                $res['message']  = 'Sales record updated successfully';
            }
            else 
            {
                $res['status']   = 0;
                $res['response'] = 'error';
                $res['message']  = 'Sales record updation failed';
            }
          return response()->json($res,200);
        }
        return response()->json(['response'=>'error','message' => $validator->errors()->all()]);
    }
    
}