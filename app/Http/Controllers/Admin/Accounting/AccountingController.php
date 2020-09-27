<?php



namespace App\Http\Controllers\Admin\Accounting;



use App\BankAccount;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\AccountTimeline;
use App\CoaCategory;
use App\ChartOfAccount;



class AccountingController extends Controller

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





    public function dashboard()

    {



        return view('admin.accounting.dashboard');

    }

    //// *** Contracts ******///
    public function new_lease_contracts()

    {

        return view('admin.accounting.contracts.new');

    }

    public function bills()

    {



        return view('admin.accounting.bills.index');

    }

    public function invoices()

    {

        return view('admin.accounting.invoices.index');

    }



    public function bank_accounts()

    {

        return view('admin.accounting.bank.accounts');

    }

    public function bank_trans($account = '')

    {



        $data = array();

        $id  = base64_decode($account);

        $data['account'] = BankAccount::where('id', $id)->get();

        $credit = AccountTimeline::where('account_id', $id)->where('trans_type','CREDIT')->sum('amount');

        $debit = AccountTimeline::where('account_id', $id)->where('trans_type','DEBIT')->sum('amount');

        $data['balance'] =  $credit-$debit;



        return view('admin.accounting.bank.bankAccTrans')->with($data);



    }
    public function chart_of_acccoutns()
    {
        $data = array();
        $data['category'] = CoaCategory::where('is_disabled','0')->get();
        $data['accounts'] = ChartOfAccount::where('is_disabled','0')->with('category','parent')->get();
        return view('admin.accounting.chartOfAccounts')->with($data);
    }


    ///////// Lease Contracts//////////
    public function new_lease_contract()

    {

        return view('admin.accounting.invoices.newLeaseContract');

    }


//////////// Voucher  start ////////////
    public function receipt_cash_new()

    {

        return view('admin.accounting.voucher.receipt.newCash');

    }
    public function receipt_cheque_new()

    {

        return view('admin.accounting.voucher.receipt.newCheque');

    }
    public function all_receipt()

    {

        return view('admin.accounting.voucher.receipt.index');

    }
//////////// Voucher  end ////////////
}

