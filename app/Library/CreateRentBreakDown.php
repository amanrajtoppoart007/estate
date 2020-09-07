<?php
namespace App\Library;
use App\RentBreakDown;

class CreateRentBreakDown
{
    public function handle()
    {
         $store = request()->only(['city_id','tenancy_type','unit_type','property_id','unit_id','rent_period_type','rent_period','parking','parking_number','rent_amount','installments']);
         if(request()->has("lease_start"))
         {
             $store["lease_start_date"] = request()->lease_start ? date("Y-m-d",strtotime(request()->lease_start)) : null;
         }
         if(request()->has("lease_end"))
         {
             $store["lease_end_date"] = request()->lease_end ? date("Y-m-d",strtotime(request()->lease_end)) : null;
         }
         if(request()->has("tenant_id"))
         {
             $store["tenant_id"] = request()->tenant_id ? request()->tenant_id : null;
         }
         if(request()->has("rent_enquiry_id"))
         {
             $store["rent_enquiry_id"] = request()->rent_enquiry_id ? request()->rent_enquiry_id : null;
         }
         if($action = RentBreakDown::create($store))
         {
             (new RentBreakDownItemAction($action->id))->handle();
             return $action->id;
         }
         else
         {
                return false;
         }
    }
}
