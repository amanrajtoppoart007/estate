<?php



namespace App\Http\Controllers\Admin\Accounting;



use App\BankAccount;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Validator;
use Exception;
use App\ChartOfAccount;



class CoaController extends Controller

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



  public function store_new_account(Request $request)

  {
     $validator = Validator::make($request->all(), [
            'title' => 'required',
            'code' => 'unique:chart_of_accounts,code',
            'category' => 'required',
        ]);
        if($validator->fails()) {
            $result = array(
                'status' => '0',
                'msg' => $validator->errors()->all()

            );
            return json_encode($result);
        }else{

      $obj                  = new ChartOfAccount();
      $obj->code            = $request->code;
      $obj->name            = $request->title;
      $obj->coa_category_id        = $request->category;
      $obj->parent_id          = $request->parent_account;
      $obj->remark          = $request->remark;
      $obj->admin_id        = auth()->user()->id;
      if($obj->save()){
          $result = array('status'=>'1','msg'=>'Account successfully added.');
        }else{
            $result = array('status'=>'0','msg'=>'Something went wrong!!');
        }
    }

        return json_encode($result);

  }

  public function datatable_coa(Request $request)

  {

        $columns = array(

            0 => 'id'



        );

        $searchKeyWord  =  htmlspecialchars($request['search']['value']);

        $totalData      =   ChartOfAccount::count();

        $totalFiltered  =   $totalData;

        if (!empty($searchKeyWord)) {

            $data = ChartOfAccount::where('name', 'LIKE', '%' . $searchKeyWord . '%')
            ->with('category','parent')->get();

        } else {

            $data = ChartOfAccount::orderBy($columns[$request["order"][0]["column"]], $request["order"][0]["dir"])

                ->offset($request['start'])

                ->limit($request['length'])
                ->with('category','parent')
                ->get();

        }

        $json_data = array(

            "draw"            => intval($request['draw']),

            "recordsTotal"    => intval($totalData),

            "recordsFiltered" => intval($totalFiltered),

            "data"            => $data

        );

        echo json_encode($json_data);

  }
  public function get_account_by_category(Request $request)
  {
    $data  = ChartOfAccount::where('coa_category_id',$request->id)->where('is_disabled','0')->get();
    if(count($data)>0){
            $result = array('status'=>'1','msg'=>'Accounts found.','accounts'=>$data);
    }else{
             $result = array('status'=>'0','msg'=>'No Accounts found.');
    }
    return json_encode($result);
  }

}

