<?php

namespace App\Http\Controllers\Admin\Accounting;

use App\AccountTimeline;
use App\BankAccount;
use App\Http\Controllers\Controller;
use App\PaymentData;
use App\PaymentVoucher;
use App\VoucherData;
use App\ReceiptVoucher;
use Illuminate\Http\Request;
use App\TenantProfile;
use App\RentInstallment;
use App\Tenant;
use Illuminate\Support\Facades\Validator;



class VoucherController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }


    public function check_receipt_number($vno)
    {
        if(ReceiptVoucher::where('voucher_no',$vno)->exists()) {
            $invoice = ReceiptVoucher::latest('id')->limit('1')->pluck('voucher_no');
                  $invoice_no = $invoice[0] + 1;
            return $this->check_receipt_number($invoice_no);
        }else{
           return $vno;
        }
    }

    public function store_new_receipt_cash_voucher(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'voucher_number' => 'required',
            'total_amount' => 'required',
        ]);


        if ($validator->fails()) {
            $result = array('status' => '0', 'error_type'=>'validation', 'msg' => $validator->errors());
            return json_encode($result);
        }

        $invoice = $this->check_receipt_number($request->voucher_number);
       // $reference = trim($request->reference);
        //$duedate = date('Y-m-d',strtotime($request->expected));

            $vou = new ReceiptVoucher();
            $vou->voucher_no = $invoice;
            $vou->for_date      = date('Y-m-d');
            $vou->user_id       = $request->payer;
            $vou->user_type     = 'tenant';
            $vou->property_id   = $request->tower;
            $vou->unit_id       = $request->unit;
            $vou->voucher_type  = 'CASH';
            $vou->total_amount  = $request->total_amount;
            $vou->sum_dhs       = $request->dhs;
            $vou->admin_id = auth()->user()->id;
        if ($vou->save()) {
            $i = 0;
            foreach ($request->type as $des){
            $data                       = new VoucherData();
            $data->receipt_vouchers_id  = $vou->id;
            $data->description          = $request->type[$i];
            $data->amount               = $request->amount[$i];
            $data->save();
            if($request->type[$i]=='BOOKING_FEES'){

            }

            $i++;
            }

            $result = array('status' => '1', 'msg' => 'Cash voucher receipt created successfully', 'voucher_no' => $vou->id);
        } else {
            $result = array('status' => '0', 'error_type'=>'other', 'msg' => 'Something went wrong!!');
        }
        return json_encode($result);
    }

    public function fetch_all_receipt_voucher(Request $request)
    {
        $columns = array(
            0 => 'id'

        );
        $status = $request->status;
        $searchKeyWord  =  '';//htmlspecialchars($request['search']['value']);
        $totalData      =   ReceiptVoucher::count();
        $totalFiltered  =   $totalData;
        if (!empty($searchKeyWord)) {
            $data = ReceiptVoucher::where('voucher_no', 'LIKE', '%' . $searchKeyWord . '%')
                ->with('property','unit','tenant')
                ->get();

        } else {
            $data = ReceiptVoucher::orderBy($columns[$request["order"][0]["column"]], $request["order"][0]["dir"])
//                ->where(
//                    function ($q) use($status){
//                        if($status!='all'){
//
//                            $q->where('status',$status);
//                        }else{
//                            return false;
//                        }
//                    })
                ->offset($request['start'])
                ->limit($request['length'])
                ->with('property','unit','tenant')
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
    public function store_new_cheque_voucher(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'voucher_number' => 'required',
            'total_amount' => 'required',
        ]);


        if ($validator->fails()) {
            $result = array('status' => '0', 'error_type'=>'validation', 'msg' => $validator->errors());
            return json_encode($result);
        }

        $invoice = $this->check_receipt_number($request->voucher_number);
        // $reference = trim($request->reference);
        //$duedate = date('Y-m-d',strtotime($request->expected));

        $vou = new ReceiptVoucher();
        $vou->voucher_no = $invoice;
        $vou->for_date      = date('Y-m-d');
        $vou->user_id       = $request->payer;
        $vou->user_type     = 'tenant';
        $vou->property_id   = $request->tower;
        $vou->unit_id       = $request->unit;
        $vou->voucher_type  = 'CHEQUE';
        $vou->total_amount  = $request->total_amount;
        $vou->sum_dhs       = $request->dhs;
        $vou->admin_id = auth()->user()->id;
        if ($vou->save()) {
            $i = 0;
            foreach ($request->type as $des){
                $data               = new VoucherData();
                $data->receipt_vouchers_id   = $vou->id;
                $data->bank         = $request->bank[$i];
                $data->description  = $request->type[$i];
                $data->cheque_no    = $request->cheque_no[$i];
                $data->amount       = $request->amount[$i];
                $data->remark       = $request->remark[$i];
                $data->save();
                $i++;
            }

            $result = array('status' => '1', 'msg' => 'Cash voucher receipt created successfully', 'voucher_no' => $vou->id);
        } else {
            $result = array('status' => '0', 'error_type'=>'other', 'msg' => 'Something went wrong!!');
        }
        return json_encode($result);
    }
    public function store_new_cash_payment_voucher(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'voucher_number' => 'required',
            'total_amount' => 'required',
        ]);


        if ($validator->fails()) {
            $result = array('status' => '0', 'error_type'=>'validation', 'msg' => $validator->errors());
            return json_encode($result);
        }

        $invoice = $this->check_receipt_number($request->voucher_number);
        // $reference = trim($request->reference);
        //$duedate = date('Y-m-d',strtotime($request->expected));

        $vou = new PaymentVoucher();
        $vou->voucher_no = $invoice;
        $vou->for_date      = date('Y-m-d');
        $vou->user_id       = $request->payer;
        $vou->user_type     = 'tenant';
        $vou->property_id   = $request->tower;
        $vou->unit_id       = $request->unit;
        $vou->voucher_type  = 'CASH';
        $vou->total_amount  = $request->total_amount;
        $vou->sum_dhs       = $request->dhs;
        $vou->admin_id = auth()->user()->id;
        if ($vou->save()) {
            $i = 0;
            foreach ($request->type as $des){
                $data               = new PaymentData();
                $data->payment_vouchers_id   = $vou->id;
                $data->description  = $request->type[$i];
                $data->amount       = $request->amount[$i];
                $data->remark      = $request->remark[$i];
                $data->save();
                $i++;
            }

            $result = array('status' => '1', 'msg' => 'Cash payment voucher created successfully', 'voucher_no' => $vou->id);
        } else {
            $result = array('status' => '0', 'error_type'=>'other', 'msg' => 'Something went wrong!!');
        }
        return json_encode($result);
    }
    public function fetch_all_payment_vouchers(Request $request)
    {
        $columns = array(
            0 => 'id'

        );
        $status = $request->status;
        $searchKeyWord  =  '';//htmlspecialchars($request['search']['value']);
        $totalData      =   PaymentVoucher::count();
        $totalFiltered  =   $totalData;
        if (!empty($searchKeyWord)) {
            $data = PaymentVoucher::where('voucher_no', 'LIKE', '%' . $searchKeyWord . '%')
                ->with('property','unit','tenant')
                ->get();

        } else {
            $data = PaymentVoucher::orderBy($columns[$request["order"][0]["column"]], $request["order"][0]["dir"])
//                ->where(
//                    function ($q) use($status){
//                        if($status!='all'){
//
//                            $q->where('status',$status);
//                        }else{
//                            return false;
//                        }
//                    })
                ->offset($request['start'])
                ->limit($request['length'])
                ->with('property','unit','tenant')
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

}
