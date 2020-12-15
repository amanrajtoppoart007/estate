<?php

namespace App\Services;

use App\Library\RentBreakDownLib;
use App\PropertyUnit;
use App\PropertyUnitAllotment;
use App\RentBreakDown;

class AllotProperty
{

    public function allot():int
    {
        $checkExist = PropertyUnitAllotment::where(['unit_id' => request()->input('unit_id'), 'status' => '1'])->first();
        if (empty($checkExist)) {
            $breakdown = RentBreakDown::where(['tenant_id' => request()->input('tenant_id')])->first();
            $breakdown = (new RentBreakDownLib())->view($breakdown);
            if (!empty($breakdown)) {
                $allotment = [
                    "tenant_id" => $breakdown['tenant_id'],
                    "property_id" => $breakdown['property_id'],
                    "unit_id" => $breakdown['unit_id'],
                    "rent_amount" => $breakdown['rent_amount'],
                    "installments" => $breakdown['installments'],
                    "lease_start" => date("Y-m-d",strtotime($breakdown['lease_start_date'])),
                    "lease_end" => date("Y-m-d",strtotime($breakdown['lease_end_date'])),
                    "admin_id" => auth('admin')->user()->id,
                    "status" => 1,
                    "rent_break_down_id" => $breakdown['id']
                ];
                $unitAllotment = PropertyUnitAllotment::create($allotment);
                PropertyUnit::where(['id' => $breakdown['unit_id']])->update(['allotment_id' => $unitAllotment->id, 'allotment_type' => 'rent', 'unit_status' => 2]);
                $breakdown = RentBreakDown::find($breakdown['id']);
                $breakdown->unit_allotment_id = $unitAllotment->id;
                $breakdown->save();
                return $unitAllotment->id;
            }

        }
        return 0;
    }
}
