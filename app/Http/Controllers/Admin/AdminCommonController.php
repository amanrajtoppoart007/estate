<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Property;
use Illuminate\Support\Arr;
class AdminCommonController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

public function checkcode($code)
{

      //this recursive code will check and generate code if already exist then it will add +1 and again check for existent of newly generated code and finaly return non existent code.
        $result = Property::select('propcode')->where('propcode','LIKE','%'.$code.'%')->get();
      if(count($result)>0)
      {
        $string = substr($code, 0, 3);//taking first 3 char of code which is investor and state code
        $plus   = preg_replace( '/[^0-9]/', '', $code)+1;
        $string.=str_pad($plus, get_systemSetting('property_code_length'), '0', STR_PAD_LEFT);
        return $this->checkcode($string);

      }
      else
      {
          return $code;
      }
}
    public function generate_property_code(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'state_id' => 'required',
            'city_id' => 'required',
        ]);

        if($validator->fails())
        {
            $data=array('status'=>'0','msg'=>$validator->errors()->all());
            return json_encode($data);
        }
        else
        {
                $state = $request->state_id;
                $city  = $request->city_id;
                $code = strtoupper(substr($state, 0, 2));
                $code.= strtoupper(substr($city, 0, 1));

                $result = Property::select('propcode')->where('propcode','LIKE','%'.$code.'%')->get();//fetching all propcode matching with code investor+state code
              if(count($result)>0)
              {
                $result=Arr::sort(Arr::pluck($result,'propcode'));//making value only array and sorting array in ascending order
                $result=Arr::last($result);//using laravel function to get last array value

                $plus = preg_replace( '/[^0-9]/', '', $result)+1;
                $code.=str_pad($plus, get_systemSetting('property_code_length'), '0', STR_PAD_LEFT);//adding 0 as system setting
              }
              else
              {
                  $x=1;
                  $x = str_pad($x,get_systemSetting('property_code_length'), '0', STR_PAD_LEFT);//adding 0 as system setting
                  $code.=$x;
              }
              $code = $this->checkcode($code);//calling recursive function


            $data=array('status'=>1,'msg'=>  'Successfully Generated',);
            $data['code'] = $code;
            return json_encode($data);
          }
    }

    public function check_property_code(Request $request)
    {
        $code  = $request->code;
          $result = Property::select('prop_code')->where('prop_code','LIKE','%'.$code.'%')->get();//fetching all propcode matching with code investor+state code
          if(count($result)>0)
          {
            //if code exist then generate and suggest new one
                  $codenew = $this->checkcode($code);//calling recursive function
                  $msg='Unacceptable, We suggest '.$codenew;
                  $data=array('status'=>'0','msg'=>  $msg,);
                    return json_encode($data);
          }
          else
          {
              $data=array('status'=>1,'msg'=>  'MSG',);
              return json_encode($data);
          }
    }

}
