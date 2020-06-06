<?php

namespace App\Http\Controllers\Admin\Accounting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\AccountTimeline;
use App\BankStatement;
use App\BankAccount;

class BankAccController extends Controller
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

    public function reconcile($account = ''){
        $data = array();
        $data['account'] = $account;
    return view('admin.accounting.bank.reconcile')->with($data);
    }
  public function store_bank_account(Request $request)
  {
      $obj              = new BankAccount();
      $obj->title       = $request->title;
      $obj->bank        = $request->bank;
      $obj->remark      = $request->remark;
      $obj->admin_id    = auth()->user()->id;
      if($obj->save()){
          $result = array('status'=>'1','msg'=>'Account successfully added.');
        }else{
            $result = array('status'=>'1','msg'=>'Account successfully added.');
        }
        return json_encode($result);
  }
  public function datatable_bank_account(Request $request)
  {
        $columns = array(
            0 => 'id'

        );
        $searchKeyWord  =  htmlspecialchars($request['search']['value']);
        $totalData      =   BankAccount::count();
        $totalFiltered  =   $totalData;
        if (!empty($searchKeyWord)) {
            $data = BankAccount::where('title', 'LIKE', '%' . $searchKeyWord . '%')->get();
        } else {
            $data = BankAccount::orderBy($columns[$request["order"][0]["column"]], $request["order"][0]["dir"])
                ->offset($request['start'])
                ->limit($request['length'])
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
    public function bank_account_transactions(Request $request)
    {
        $columns = array(
            0 => 'id'

        );
        $searchKeyWord  =  htmlspecialchars($request['search']['value']);
        $totalData      =   AccountTimeline::count();
        $totalFiltered  =   $totalData;
        if (!empty($searchKeyWord)) {
            $data = AccountTimeline::where('payment_ref', 'LIKE', '%' . $searchKeyWord . '%')
                    ->orWhere('trans_ref', 'LIKE', '%' . $searchKeyWord . '%')
                    ->orWhere('remark', 'LIKE', '%' . $searchKeyWord . '%')
                    ->get();
        } else {
            $data = AccountTimeline::orderBy($columns[$request["order"][0]["column"]], $request["order"][0]["dir"])
                ->offset($request['start'])
                ->limit($request['length'])
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
////////Reconcile page codes

    public function bank_account_transactions_dt(Request $request)
    {
        $columns = array(
            0 => 'id'

        );

        $searchKeyWord  =  htmlspecialchars($request['search']['value']);
        $totalData      =   AccountTimeline::count();
        $totalFiltered  =   $totalData;
        if (!empty($searchKeyWord)) {
            $data = AccountTimeline::where('payment_ref', 'LIKE', '%' . $searchKeyWord . '%')
                ->orWhere('trans_ref', 'LIKE', '%' . $searchKeyWord . '%')
                ->orWhere('remark', 'LIKE', '%' . $searchKeyWord . '%')
                ->with('bills','invoices')
                ->get();
        } else {
            $data = AccountTimeline::where('account_id',$request->account)
                ->orderBy($columns[$request["order"][0]["column"]], $request["order"][0]["dir"])
                ->offset($request['start'])
                ->limit($request['length'])
                ->with('bills','invoices')
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
    public function bank_statement_dt(Request $request)
    {
        $columns = array(
            0 => 'id'

        );

        $searchKeyWord  =  htmlspecialchars($request['search']['value']);
        $totalData      =   BankStatement::count();
        $totalFiltered  =   $totalData;
        if (!empty($searchKeyWord)) {
            $data = BankStatement::where('payment_ref', 'LIKE', '%' . $searchKeyWord . '%')
                ->orWhere('trans_ref', 'LIKE', '%' . $searchKeyWord . '%')
                ->orWhere('remark', 'LIKE', '%' . $searchKeyWord . '%')

                ->get();
        } else {
            $data = BankStatement::where('account_id',$request->account)
                ->orderBy($columns[$request["order"][0]["column"]], $request["order"][0]["dir"])
                ->offset($request['start'])
                ->limit($request['length'])

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
    public function store_reconciled(Request $request){

    $systemtrans  = $request->systemTransactions;
    $bankstmt = $request->bank_trans;
    $account = $request->account;

    return json_encode($request->all());
}
}
