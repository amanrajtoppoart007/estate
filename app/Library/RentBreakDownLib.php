<?php
namespace App\Library;
use App\RentBreakDown;

class RentBreakDownLib
{
     public function data()
     {
         $store = request()->only(['tenancy_type', 'unit_type', 'property_id', 'unit_id', 'rent_period_type', 'rent_period', 'parking', 'parking_number', 'rent_amount', 'installments','total_rent_amount']);
         if (request()->has("lease_start_date")) {
             $store["lease_start_date"] = request()->input('lease_start_date') ? date("Y-m-d", strtotime(request()->input('lease_start_date'))) : null;
         }
         if (request()->has("lease_end_date")) {
             $store["lease_end_date"] = request()->input('lease_end_date') ? date("Y-m-d", strtotime(request()->input('lease_end_date'))) : null;
         }
         if (request()->has("tenant_id"))
         {
             $store["tenant_id"] = request()->input('tenant_id') ? request()->input('tenant_id') : null;
         }
         if (request()->has("rent_enquiry_id")) {
             $store["rent_enquiry_id"] = request()->input('rent_enquiry_id') ? request()->input('rent_enquiry_id') : null;
         }
         if (auth('admin')->user()->id) {
             $store['admin_id'] = auth('admin')->user()->id;
         }
         if(request()->has('rent_frequency'))
         {
             $store["rent_period_type"] = request()->input('rent_frequency');
         }
         return $store;
     }

     public function create($breakdown_type)
     {

         if (!empty($breakdown_type))
         {
             $store['breakdown_type'] = $breakdown_type;
         }
         if($action = RentBreakDown::create($this->data()))
         {
             (new RentBreakDownItemAction($action->id))->handle();
              (new Installment($action->id))->store();
             return $action->id;
         } else
             {
             return false;
         }
     }

     public function update($rent_breakdown_id)
    {
         if(RentBreakDown::where(['id'=>$rent_breakdown_id])->update($this->data()))
         {
             (new RentBreakDownItemAction($rent_breakdown_id))->handle();
             (new Installment($rent_breakdown_id))->store();
              return $rent_breakdown_id;
         }
         else
         {
                return false;
         }
    }

    public function getByRentEnquiry()
    {

    }

}
