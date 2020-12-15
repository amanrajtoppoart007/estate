<?php

namespace App\Library;

use App\RentBreakDownItem;

class RentBreakDownItemAction
{
    var $rent_breakdown_id;

    public function __construct($rent_breakdown_id)
    {
        $this->rent_breakdown_id = $rent_breakdown_id;
    }

    public function handle()
    {
        try
        {
            $this->delete_existing_breakdown_items($this->rent_breakdown_id);
            $item["security_deposit"] = (!empty(request()->security_deposit)) ? request()->security_deposit : 0;
            $item["municipality_fees"] = (!empty(request()->municipality_fees)) ? request()->municipality_fees : 0;
            $item["brokerage"] = (!empty(request()->brokerage)) ? request()->brokerage : 0;
            $item["contract"] = (!empty(request()->contract)) ? request()->contract : 0;
            $item["remote_deposit"] = (!empty(request()->remote_deposit)) ? request()->remote_deposit : 0;
            $item["sewa_deposit"] = (!empty(request()->sewa_deposit)) ? request()->sewa_deposit : 0;
            $item["first_installment"] = (!empty(request()->first_installment)) ? request()->first_installment : 0;
            $item["total_first_installment"] = (!empty(request()->total_first_installment)) ? request()->total_first_installment : 0;
            $item["advance_payment"] = (!empty(request()->advance_payment)) ? request()->advance_payment : 0;
            $item["balance_amount"] = (!empty(request()->balance_amount)) ? request()->balance_amount :0;
            $item["rent_break_down_id"] = $this->rent_breakdown_id;
            $breakDownItem = RentBreakDownItem::create($item);
            return $breakDownItem->id;
        }
        catch (\Exception $exception)
        {
            return false;
        }
    }
    private function delete_existing_breakdown_items($rent_break_down_id)
    {
         $check = RentBreakDownItem::where(['rent_break_down_id'=>$rent_break_down_id])->get();
         if(!$check->isEmpty())
         {
             RentBreakDownItem::where(['rent_break_down_id'=>$rent_break_down_id])->delete();
         }
    }
}
