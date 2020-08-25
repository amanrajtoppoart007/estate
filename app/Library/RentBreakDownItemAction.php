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
        try {
             $this->delete_existing_breakdown_items($this->rent_breakdown_id);
            $i = 0;
            $j = 0;

            foreach (request()->total_monthly_installment as $total_installment) {
                $item["security_deposit"] = (!empty(request()->security_deposit[$i])) ? request()->security_deposit[$i] : 0;
                $item["municipality_fees"] = (!empty(request()->municipality_fees[$i])) ? request()->municipality_fees[$i] : 0;
                $item["brokerage"] = (!empty(request()->brokerage[$i])) ? request()->brokerage[$i] : 0;
                $item["contract"] = (!empty(request()->contract[$i])) ? request()->contract[$i] : 0;
                $item["remote_deposit"] = (!empty(request()->remote_deposit[$i])) ? request()->remote_deposit[$i] : 0;
                $item["sewa_deposit"] = (!empty(request()->sewa_deposit[$i])) ? request()->sewa_deposit[$i] : 0;
                $item["monthly_installment"] = (!empty(request()->monthly_installment[$i])) ? request()->monthly_installment[$i] : 0;
                $item["total_monthly_installment"] = (!empty(request()->total_monthly_installment[$i])) ? request()->total_monthly_installment[$i] : 0;
                $item["rent_break_down_id"] = $this->rent_breakdown_id;
                if(RentBreakDownItem::create($item))
                {
                    $j++;
                }

                $i++;
            }
            return $j;
        } catch (\Exception $exception) {

            return false;
        }
    }

    private function check($item_id)
    {
        $check = RentBreakDownItem::find($item_id);
        return !empty($check);
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
