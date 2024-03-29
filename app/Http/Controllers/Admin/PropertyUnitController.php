<?php

namespace App\Http\Controllers\Admin;
use App\Agent;
use App\Buyer;
use App\Property;
use App\Tenant;
use App\UnitPrice;
use Carbon\Carbon;
use App\PropertyUnit;
use App\DataTable\Api;

use Illuminate\Http\Request;
use App\Library\CreateUnitCode;
use App\Library\SingleUnitView;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StorePropertyUnit;
use Illuminate\Support\Facades\Validator;


class PropertyUnitController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function fetch(Request $request)
    {
        echo json_encode((new Api((new PropertyUnit())))->getResult());
    }

    public function index()
    {
        $agents = Agent::where(['is_disabled'=>'0'])->get();
        return view('admin.propertyUnit.index',compact('agents'));
    }


    public function store(StorePropertyUnit $request)
    {
        $request->validated();
        $input               = $request->only(['flat_number','property_unit_type_id','property_id','title',
        'owner_id','agent_id','unit_size','rent_type','bathroom','bedroom','furnishing',
         'balcony','parking','purpose','unit_status']);
        if($request->has("unit_price"))
        {
            $input['unit_price'] = $request->unit_price ? $request->unit_price :null;
        }
        if($request->has("unit_rent"))
        {
            $input['unit_rent'] = $request->unit_rent ? $request->unit_rent :null;
        }
        $input['admin_id']    = Auth::guard('admin')->user()->id;
        $unit_gen             = new CreateUnitCode($request->property_id,$request->property_unit_type_id);
        $input['unit_status'] = 1;
        $input['unitcode']    = $unit_gen->generate_unit_code();

        $property = Property::find($request->property_id);
        if(!empty($property))
        {
            $input['owner_id']    = $property->owner_id;
        }

        if (!empty($request->rent_type))
        {
            $input['rent_type'] = $request->rent_type;
        }
        if($unit = PropertyUnit::create($input))
        {
               $date  = new Carbon(date('Y-m-d'));
            switch($request['rent_type'])
            {
                case 'yearly':
                    $effective_upto    = $date->addYear(1);
                break;
                case 'weekly':
                    $effective_upto = $date->addWeek(1);
                break;
                default:
                    $effective_upto   = $date->addMonth(1);
                    break;
            }
            $effective_from = date('Y-m-d');
            $effective_upto = $effective_upto->format('Y-m-d');
            $price          = [
                'property_unit_id'=>$unit->id,
                'unit_price'=>floatval($request['unit_price']),
                'status'=>1,
                'effective_from'=>$effective_from,
                'effective_upto'=>$effective_upto
            ];
            UnitPrice::create($price);
            $res['status']   = '1';
            $res['response'] = 'success';
            $res['message']  = 'Property unit added successfully';
        }
        else
        {
            $res['status']   = '0';
            $res['response'] = 'error';
            $res['message']  = 'Property unit addition failed';
        }
        return response()->json($res,200);
    }


    public function show(Request $request)
    {
      $validator = Validator::make($request->all(), [ 'unit_id' => 'required|numeric']);
        if(!$validator->fails())
        {
            $property_unit = PropertyUnit::with(['property','owner'])->find($request->unit_id);
            if(!empty($property_unit))
            {
                $res['status']   = 1;
                $res['response'] = 'success';
                $res['message']  = 'Data found';
                $res['data']     = $property_unit;
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

    public function view($id)
    {
      $validator = Validator::make(['id'=>$id], [ 'id' => 'required|numeric']);
        if(!$validator->fails())
        {
            $property_unit = PropertyUnit::find($id);
            if(!empty($property_unit))
            {
                $property_unit =  (new SingleUnitView($property_unit))->execute();
                return view('admin.propertyUnit.view',compact('property_unit'));
            }
            else
            {
                return view('blank')->with('msg', 'Given data not found on this server');
            }
        }
            return view('blank')->with('msg','Given data not found on this server');
    }

    public function property_unit_detail(Request $request)
    {
      $validator = Validator::make($request->all(), [ 'unit_id' => 'required|numeric']);
        if(!$validator->fails())
        {
            $data = PropertyUnit::with(['property','owner','agent'])->find($request->unit_id);
            if(!empty($data))
            {
               $allotment_id   = $data['allotment_id'];
               $allotment_type = $data['allotment_type'];
               if($allotment_type=='rent')
                {
                    try {


                        $data['unit_allotment'] = \App\PropertyUnitAllotment::with(['tenant', 'property_unit', 'rent_installments'])->where(['id' => $allotment_id, 'unit_id' => $request->unit_id])->whereHas('property_unit', function ($query) {
                            $query->with(['propertyUnitType', 'owner', 'agent']);
                        })->first();
                        $data['client'] = Tenant::with(['relations', 'documents', 'profile','country'])->find($data['unit_allotment']->tenant_id);
                    }
                    catch (Exception $exception)
                    {
                        $data['unit_allotment'] =  [];
                        $data['client']         =  [];
                    }
                }
                else if($allotment_type=='sale')
                {
                    try {
                        $data['unit_allotment'] = \App\PropertySale::with(['buyer', 'owner'])->where(['id' => $allotment_id, 'unit_id' => $request->unit_id])->first();
                        $data['client'] = Buyer::find($data['unit_allotment']->buyer_id);
                    }
                    catch (Exception $exception)
                    {
                        $data['unit_allotment'] =  [];
                        $data['client']         =  [];
                    }
                }
                else
                {
                    $data['unit_allotment'] =  [];
                    $data['client']         =  [];
                }
                $res['status']          = 1;
                $res['response']        = 'success';
                $res['message']         = 'Data found';
                $res['data']            = $data;
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


    public function get_client(Request $request)
    {
      $validator = Validator::make($request->all(),
          [ 'allotment_type' => 'required']
      );
        if(!$validator->fails())
        {
            if($request->allotment_type==1)
            {
                $data = Tenant::where(['is_disabled'=>'0'])->get();
            }
            else
            {
                $data = Buyer::where(['status'=>'1'])->get();
            }
            $result = ['status'=>1,'response'=>'success','data'=>$data,'message' => 'data found'];
        }
        else
        {
            $result = ['status'=>0,'response'=>'error','message' => $validator->errors()->all()];
        }
         return response()->json($result,200);
    }


    public function get_allotment_link(Request $request)
    {
      $validator = Validator::make($request->all(),
          [ 'property_unit_id' => 'required|numeric',
           'allotment_type' => 'required',
           'client_id'=> 'required|numeric',
          ]
      );
        if(!$validator->fails())
        {
            if($request->allotment_type==1)
            {
                $link = route('tenant.allot.property',['id'=>$request->client_id]);
            }
            else
            {
                $link = route('buyer.sale.property',['id'=>$request->client_id]);
            }
            $result = ['status'=>1,'response'=>'success','link'=>$link,'message' => 'data found'];
        }
        else
        {
            $result = ['status'=>0,'response'=>'error','message' => $validator->errors()->all()];
        }
         return response()->json($result,200);
    }



    public function update(Request $request)
    {
        $validator = Validator::make($request->all(),
         [  'unit_id' => 'required|numeric',
            'flat_number'=>'required',
            'unit_size' => 'required|numeric',
            'bedroom' => 'required|numeric',
            'bathroom' => 'required|numeric',
            'furnishing' => 'required',
            'balcony' => 'required',
            'parking' => 'required',
            'unit_status'=>'numeric',
         ]);
        if(!$validator->fails())
        {
            $property_unit = PropertyUnit::find($request->unit_id);
            if(!empty($property_unit))
            {
                $update = $request->only(['flat_number','floor_no','unit_size','bedroom','bathroom','furnishing','balcony','parking','unit_status','purpose']);

                if(!empty($request->rent_type))
                {
                    $update['rent_type'] = $request->rent_type;
                }
                if ($request->has("unit_price")) {
                    $update['unit_price'] = $request->unit_price ? $request->unit_price : null;
                }
                if ($request->has("unit_rent")) {
                    $update['unit_rent'] = $request->unit_rent ? $request->unit_rent : null;
                }

                if(PropertyUnit::where(['id'=>$request->unit_id])->update($update))
                {
                    $res['status']   = 1;
                    $res['data']     = PropertyUnit::find($request->unit_id);
                    $res['response'] = 'success';
                    $res['message']  = 'Unit updated successfully';
                }
                else
                {
                    $res['status']   = 0;
                    $res['response'] = 'error';
                    $res['message']  = 'Unit updation failed';
                }

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


    public function destroy($id)
    {
        //
    }
}
