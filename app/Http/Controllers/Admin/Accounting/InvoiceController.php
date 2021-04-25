<?php

namespace App\Http\Controllers\Admin\Accounting;

use App\AccountTimeline;
use App\BankAccount;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\BillInvData;
use App\Invoice;
use App\Item;
use App\RentInstallment;
use App\Tenant;
use App\Task;
use App\TaskAssignment;


class InvoiceController extends Controller
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
    public function view_invoice($invoice='')
    {
        $data    = array();
        $data['invoice_no'] = $inv = trim(base64_decode($invoice));
        $data['invoice'] = Invoice::with('party')->where('id', $data['invoice_no'])->get();
        $data['bank_acc'] = BankAccount::where('is_disabled', '0')->get();
        if(count($data['invoice'])>0)
        {
            $data['payment']      =  AccountTimeline::where('invoice_id', $data['invoice_no'])->get();
            $data['invoice_data'] = BillInvData::where('invoice_id', $data['invoice_no'])->with('unit')->get();


            return view('admin.accounting.invoices.view')->with($data);
        }
        else {
            $data['msg'] = 'Invalid invoice ID';
            return view('blank')->with($data);
        }
    }
    public function rent_invoice_create($id='')
    {
        $data = array();
        $invoice = Invoice::latest('id')->limit('1')->pluck('id');

        if(count($invoice)=='0'){
            $data['invoice_no'] = '1';
        }else{
            $data['invoice_no'] = $invoice[0] + 1;
        }

       $data['item'] = Item::where('id','1')->first();
       $data['installment'] = RentInstallment::where('id',base64_decode($id))->with('property_unit_allotment.property_unit')->first();
       $data['tenant'] = Tenant::where('id', $data['installment']->tenant_id)->first();

       return view('admin.accounting.invoices.rentInvoiceCreate')->with($data);
    }
    public function task_invoice_create($id='')
    {
        $data = array();
        $invoice = Invoice::latest('id')->limit('1')->pluck('id');

        if(count($invoice)=='0'){
            $data['invoice_no'] = '1';
        }else{
            $data['invoice_no'] = $invoice[0] + 1;
        }

       $data['item'] = Item::where('id','2')->first();
       $data['task'] = Task::where('id',base64_decode($id))->with('task_assignments', 'property_unit')->first();
       $data['assigned'] = TaskAssignment::where('task_id', $data['task']->id)->where('status', 'ASSIGNED')->first();

       return view('admin.accounting.invoices.taskInvoiceCreate')->with($data);
    }
    public function check_invoice_number($invoice)
    {
        if(Invoice::where('id', $invoice)->exists()){
            $invoice = $invoice+'1';
            return $this->check_invoice_number($invoice);
        }else{
            return $invoice;
        }
    }
    public function store_rent_invoice(Request $request)
    {
        $invoice = $this->check_invoice_number($request->invoice);

        $reference = trim($request->reference);
        $arr = array('id'=> $invoice,'party_id'=> $request->party,'party_type'=> $request->party_type, 'ref'=> $reference, 'inv_type'=>'rent_invoice', 'property'=>$request->property, 'unit'=>$request->unit, 'entry_date'=>date('Y-m-d'), 'remark'=>$request->remark, 'total_amount'=>$request->total_amount,'due_date'=>$request->expected,'admin_id'=>auth()->user()->id);
        if($qry = Invoice::create($arr))
        {
            $data               = new BillInvData();
            $data->invoice_id   = $qry->id;
            $data->type         = 'INVOICE';
            $data->item_id      = $request->item;
            $data->qty          = '1';
            $data->amount       = $request->amount;
            $data->unit_id      = $request->unit;
            $data->save();
            /**  send invoice id not bill id **/
            $rent = RentInstallment::findOrFail($request->installment_id);
            $rent->invoice_id = $qry->id;
            $rent->save();
            $result = array('status'=>'1','msg'=>'Invoice created successfully','invoice'=> base64_encode($qry->id));
        }else{
            $result = array('status'=>'0','msg'=>'Something went wrong!!');
        }
        return json_encode($result);

    }
    public function store_task_invoice(Request $request)
    {
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
        //if(Invoice::)
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
    public function store_inovice_payment(Request $request)
    {

        try {
                $inv = Invoice::findOrFail($request->invoice);
                $inv->paid_date = date('Y-m-d');
                $inv->status = '1';
                if($inv->save())
                {
                    $installment = RentInstallment::where(['invoice_id'=>$inv->id])->first();
                     if(!empty($installment))
                    {
                        $installment->paid_date = date('Y-m-d');
                        $installment->status    = 1;
                        $installment->save();
                    }
                }
                $obj = new AccountTimeline();
                $obj->invoice_id    =  $request->invoice;
                $obj->trans_type    =  'CREDIT';
                $obj->amount        =  $request->grand_total;
                $obj->payment_ref   =  $request->ref;
                $obj->payment_mode  =  $request->mode;
                $obj->account_id    =  $request->account;
                $obj->trans_ref     =  $request->ref2;
                $obj->remark        =  $request->remark;
                if($obj->save())
                {
                    $result = array('status'=>'1','msg'=>'Payment record saved successfully.');
                }
                else
                {
                    $result = array('status'=>'0','msg'=>'Something went wrong!!');
                }
        }
        catch (\Exception $exception)
        {
            $result = array('status'=>'0','msg'=>$exception->getMessage());
        }
        return json_encode($result);
    }
}
