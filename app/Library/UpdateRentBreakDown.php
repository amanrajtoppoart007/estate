<?php
namespace App\Library;
use App\RentBreakDown;

class UpdateRentBreakDown
{
    private $rent_breakdown_id;
    public function __construct($rent_breakdown_id)
    {
        $this->rent_breakdown_id = $rent_breakdown_id;
    }
    public function handle()
    {
         $update = request()->only(['city_id','property_id','unit_id','tenancy_type','unit_type','rent_period_type','rent_period','parking','parking_number','rent_amount','installments']);
         if(request()->has("lease_start"))
         {
             $update["lease_start_date"] = request()->lease_start ? date("Y-m-d",strtotime(request()->lease_start)) : null;
         }
         if(request()->has("lease_end"))
         {
             $update["lease_end_date"] = request()->lease_end ? date("Y-m-d",strtotime(request()->lease_end)) : null;
         }
         if(request()->has("tenant_id"))
         {
             $update["tenant_id"] = request()->tenant_id ? request()->tenant_id : null;
         }
         if(request()->has("rent_enquiry_id"))
         {
             $update["rent_enquiry_id"] = request()->rent_enquiry_id ? request()->rent_enquiry_id : null;
         }
         if(RentBreakDown::where(['id'=>$this->rent_breakdown_id])->update($update))
         {
             (new RentBreakDownItemAction($this->rent_breakdown_id))->handle();
             return $this->rent_breakdown_id;
         }
         else
         {
                return false;
         }
    }
}
