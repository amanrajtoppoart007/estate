<?php

namespace App\Http\Controllers\Admin\Accounting;

use App\AccountTimeline;
use App\BankAccount;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\TenantProfile;
use App\RentInstallment;
use App\Tenant;



class VoucherController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }


    public function invoice_create($id = '')
    {
        $data = array();
        $invoice = Invoice::latest('id')->limit('1')->pluck('id');

        if (count($invoice) == '0') {
            $data['invoice_no'] = '1';
        } else {
            $data['invoice_no'] = $invoice[0] + 1;
        }




        return view('admin.accounting.invoices.create')->with($data);
    }

    public function store_new_invoice(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'invoice' => 'required',


        ]);


        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }
        $invoice = $this->check_invoice_number($request->invoice);
        $reference = trim($request->reference);
        $duedate = date('Y-m-d',strtotime($request->expected));
        $arr = array('id' => $invoice,
            'party_id' => $request->party,
            'party_type' => $request->party_type,
            'ref' => $reference,
            'inv_type' => 'task_invoice',
            'property' => $request->property,
            'unit' => $request->unit,
            'entry_date' => date('Y-m-d'),
            'remark' => $request->remark,
            'total_amount' => $request->total_amount,
            'task_id' => $request->task_id,
            'due_date' => $duedate,
            'admin_id' => auth()->user()->id);
        if ($qry = Invoice::create($arr)) {
            $data               = new BillInvData();
            $data->invoice_id   = $qry->id;
            $data->type         = 'INVOICE';
            $data->item_id      = $request->item;
            $data->qty          = '1';
            $data->amount       = $request->amount;
            $data->unit_id      = $request->unit;
            $data->save();
            // $rent = RentInstallment::findOrFail($request->installment_id);
            // $rent->invoice_id = $data->id;
            // $rent->save();
            $result = array('status' => '1', 'msg' => 'Invoice created successfully', 'invoice' => base64_encode($qry->id));
        } else {
            $result = array('status' => '0', 'msg' => 'Something went wrong!!');
        }
        return json_encode($result);
    }

    public function fetch_all_invoice(Request $request)
    {
        $columns = array(
            0 => 'id'

        );
        $status = $request->status;
        $searchKeyWord  =  htmlspecialchars($request['search']['value']);
        $totalData      =   Invoice::count();
        $totalFiltered  =   $totalData;
        if (!empty($searchKeyWord)) {
            $data = Invoice::where('ref', 'LIKE', '%' . $searchKeyWord . '%')
                ->with('party')
                ->get();

        } else {
            $data = Invoice::orderBy($columns[$request["order"][0]["column"]], $request["order"][0]["dir"])
                ->where(
                    function ($q) use($status){
                        if($status!='all'){

                            $q->where('status',$status);
                        }else{
                            return false;
                        }
                    })
                ->offset($request['start'])
                ->limit($request['length'])
                ->with('party')
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
    // public function rent_invoice_payment_store(Request $request)
    // {
    //     $data = array();
    //     $invoice = Invoice::latest('id')->limit('1')->pluck('id');

    //     if (count($invoice) == '0') {
    //         $data['invoice_no'] = '1';
    //     } else {
    //         $data['invoice_no'] = $invoice[0] + 1;
    //     }

    //     $data['item'] = Item::where('id', '1')->first();
    //     $data['installment'] = RentInstallment::where('id', base64_decode($id))->with('property_unit_allotment.property_unit')->first();

    //     return view('admin.accounting.invoices.rentInvoiceCreate')->with($data);
    // }

}
