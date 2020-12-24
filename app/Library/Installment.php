<?php
namespace App\Library;

use App\RentInstallment;

class Installment
{
    var $rent_breakdown_id;
    public function __construct($rent_breakdown_id)
    {
        $this->rent_breakdown_id = $rent_breakdown_id;
    }
    private function data()
    {
        $installment = [];
         $i=0;
           foreach(request()->installment as $item)
           {
               $installment[$i]['installment']  = $item['installment'];
               $installment[$i]['amount']       = $item['amount'];
               $installment[$i]['cheque_no']    = $item['cheque_no'];
               $installment[$i]['remark']       = $item['remark'];
               $installment[$i]['bank_name']    = $item['bank_name'];
               $installment[$i]['cheque_date']  = $item['cheque_date']?date("Y-m-d",strtotime($item['cheque_date'])):null;
               $installment[$i]['paid_to']      = $item['paid_to'];
               $installment[$i]['unit_id']       = request()->unit_id;
               $installment[$i]['tenant_id']     = request()->tenant_id;
               $installment[$i]['rent_breakdown_id']   = $this->rent_breakdown_id;
               $installment[$i]['property_unit_allotment_id']   = request()->property_unit_allotment_id;
               $installment[$i]['admin_id']   = auth('admin')->user()->id;
               $i++;
           }

           return $installment;
    }
    public function store()
    {
          $this->safeDelete();
          return RentInstallment::insert($this->data());
    }



    private function safeDelete()
    {
      if(!(RentInstallment::where(['rent_breakdown_id'=>$this->rent_breakdown_id])->get())->isEmpty())
      {
          RentInstallment::where(['rent_breakdown_id'=>$this->rent_breakdown_id])->delete();
      }
    }
}
