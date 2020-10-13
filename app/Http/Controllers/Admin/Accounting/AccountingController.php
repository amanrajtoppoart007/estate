<?php



namespace App\Http\Controllers\Admin\Accounting;



use App\AccountingSetting;
use App\BankAccount;

use App\Http\Controllers\Controller;

use App\PaymentVoucher;
use App\ReceiptVoucher;
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
        $data = array();
        $td = AccountingSetting::where('name','transaction_description')->pluck('value')->first();
        $data['trans_des']  =  json_decode($td);
        $lastdata         = ReceiptVoucher::orderBy('id','DESC')->first();

        $lastid         = !empty($lastdata) ? $lastdata->voucher_no : 0;

        $data['new_no'] = $lastid+1;
        return view('admin.accounting.voucher.receipt.newCash')->with($data);

    }
    public function receipt_cheque_new()

    {
        $data = array();
        $td = AccountingSetting::where('name','transaction_description')->pluck('value')->first();
        $data['trans_des']  =  json_decode($td);
        $lastdata         = ReceiptVoucher::orderBy('id','DESC')->first();

        $lastid         = !empty($lastdata) ? $lastdata->voucher_no : 0;

        $data['new_no'] = $lastid+1;
        return view('admin.accounting.voucher.receipt.newCheque')->with($data);

    }
    public function view_receipt_voucher($id='')

    {
        $data = array();
        $td = AccountingSetting::where('name','transaction_description')->pluck('value')->first();

        return view('admin.accounting.voucher.receipt.view')->with($data);

    }
    public function all_receipt_voucher()

    {

        return view('admin.accounting.voucher.receipt.index');

    }
    public function payment_cash_new()

    {
        $data = array();
        $td = AccountingSetting::where('name','transaction_description')->pluck('value')->first();
        $data['trans_des']  =  json_decode($td);
        $lastdata         = PaymentVoucher::orderBy('id','DESC')->first();

        $lastid         = !empty($lastdata) ? $lastdata->voucher_no : 0;

        $data['new_no'] = $lastid+1;
        return view('admin.accounting.voucher.payment.newCash')->with($data);

    }
    public function payment_cheque_new()

    {
        $data = array();
        $td = AccountingSetting::where('name','transaction_description')->pluck('value')->first();
        $data['trans_des']  =  json_decode($td);
        $lastdata         = PaymentVoucher::orderBy('id','DESC')->first();

        $lastid         = !empty($lastdata) ? $lastdata->voucher_no : 0;

        $data['new_no'] = $lastid+1;
        return view('admin.accounting.voucher.payment.newCheque')->with($data);

    }
    public function all_payment_voucher()

    {

        return view('admin.accounting.voucher.payment.index');

    }
//////////// Voucher  end ////////////
}

