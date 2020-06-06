<?php

namespace App\Http\Controllers\Admin\Accounting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Bill;
use App\BillInvData;
use App\Invoice;
use App\Item;
use App\RentInstallment;
use App\Task;
use App\TaskAssignment;

class BillController extends Controller
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


    public function task_to_bill($id='')
    {
        $data = array();
        $bill = Bill::latest('id')->limit('1')->pluck('id');

        if (count($bill) == '0') {
            $data['bill_no'] = '1';
        } else {
            $data['bill_no'] = $bill[0] + 1;
        }

        $data['item'] = Item::where('id', '2')->first();
        $data['task'] = Task::where('id', base64_decode($id))->with('task_assignments', 'property_unit')->first();
        $data['assigned'] = TaskAssignment::where('task_id', $data['task']->id)->where('status', 'ASSIGNED')->first();
       
        return view('admin.accounting.bills.taskBillCreate')->with($data);
    }
    public function check_bill_number($bill)
    {
        if (Bill::where('id', $bill)->exists()) {
            $bill = $bill + '1';
            return $this->check_bill_number($bill);
        } else {
            return $bill;
        }
    }
    public function fetch_all_Bills(Request $request)
    {
        $columns = array(
            0 => 'id'

        );
        $searchKeyWord  =  htmlspecialchars($request['search']['value']);
        $totalData      =   Bill::count();
        $totalFiltered  =   $totalData;
        if (!empty($searchKeyWord)) {
            $data = Bill::where('ref', 'LIKE', '%' . $searchKeyWord . '%')
                ->with('party')
                ->get();
        } else {
            $data = Bill::orderBy($columns[$request["order"][0]["column"]], $request["order"][0]["dir"])
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
    public function store_task_bill(Request $request)
    {
        $invoice = $this->check_bill_number($request->bill);

        $reference = trim($request->reference);
        $duedate = date('Y-m-d', strtotime($request->expected));
        $arr = array(
            'id' => $invoice,
            'party_id' => $request->party,
            'party_type' => $request->party_type,
            'ref' => $reference,
            'bill_type' => 'task_bill',
            'property' => $request->property,
            'unit' => $request->unit,
            'entry_date' => date('Y-m-d'),
            'remark' => $request->remark,
            'total_amount' => $request->total_amount,
            'task_id' => $request->task_id,
            'due_date' => $duedate,
            'admin_id' => auth()->user()->id
        );
        if ($qry = Bill::create($arr)) {
            $data               = new BillInvData();
            $data->bill_id      = $qry->id;
            $data->type         = 'BILL';
            $data->item_id      = $request->item;
            $data->qty          = '1';
            $data->amount       = $request->amount;
            $data->unit_id      = $request->unit;
            $data->save();
        
            $result = array('status' => '1', 'msg' => 'Bill created successfully', 'bill' => base64_encode($qry->id));
        } else {
            $result = array('status' => '0', 'msg' => 'Something went wrong!!');
        }
        return json_encode($result);
        //if(Invoice::)
    }
}
