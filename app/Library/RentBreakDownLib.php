<?php
namespace App\Library;
use App\RentBreakDown;

class RentBreakDownLib
{
    var $relation;

     public function view($breakdown)
     {
            if(empty($breakdown))
            {
                return [];
            }

             if(!empty($breakdown->tenant))
             {
                 $this->relation = 'allotment';
             }
             else
             {
                 $this->relation = 'rent_enquiry';
             }

              $view['id']                 = $breakdown->id ??null;
              $view['tenancy_type']       = $breakdown->tenancy_type ??null;
              $view['property_id']        = $breakdown->property_id ??null;
              $view['property_title']     = $breakdown->property->title ??null;
              $view['unit_id']            = $breakdown->unit_id ??null;
              $view['unit_type']          = $breakdown->unit_type ??null;
              $view['unit_code']          = $breakdown->unit->unitcode ??null;
              $view['flat_number']        = $breakdown->unit->flat_number ??null;
              $view['rent_frequency']     = $breakdown->rent_period_type ??null;
              $view['rent_period']        = $breakdown->rent_period ??0;
              $view['parking']            = $breakdown->parking ??'no';
              $view['parking_number']     = $breakdown->parking_number ??null;
              $view['lease_start_date']   = $breakdown->lease_start_date ? date('d-m-Y',strtotime($breakdown->lease_start_date)):null;
              $view['lease_end_date']     = $breakdown->lease_end_date ? date('d-m-Y',strtotime($breakdown->lease_end_date)):null;


              $view['rent_amount']  = $breakdown->rent_amount ??0;
              $view['total_rent_amount']  = $breakdown->total_rent_amount??0;
              $view['installments']  = $breakdown->installments ??0;
              $view['security_deposit']  = $breakdown->rent_break_down_items->security_deposit ??0;
              $view['municipality_fees']  = $breakdown->rent_break_down_items->municipality_fees ??0;
              $view['advance_payment']  = $breakdown->rent_break_down_items->advance_payment ??0;
              $view['balance_amount']  = $breakdown->rent_break_down_items->balance_amount??0;

              $view['brokerage']  = $breakdown->rent_break_down_items->brokerage ??0;
              $view['contract']  = $breakdown->rent_break_down_items->contract ??0;
              $view['remote_deposit']  = $breakdown->rent_break_down_items->remote_deposit ??0;
              $view['sewa_deposit']  = $breakdown->rent_break_down_items->sewa_deposit ??0;
              $view['first_installment']  = $breakdown->rent_break_down_items->first_installment??0;
              $view['total_first_installment']  = $breakdown->rent_break_down_items->total_first_installment??0;

         if($this->relation==="rent_enquiry")
         {
              $view['rent_enquiry_id']   = $breakdown->rent_enquiry_id;
              $view['tenant_id']         = $breakdown->tenant->id??null;

              $view['name']              = $breakdown->rent_enquiry->name ??null;
              $view['mobile']              = $breakdown->rent_enquiry->mobile ??null;
              $view['country_name']      = $breakdown->rent_enquiry->country->name ??null;

              $view['tenancy_type']      = $breakdown->rent_enquiry->tenancy_type ??null;
              $view['tenant_count']      = $breakdown->rent_enquiry->tenant_count??0;


         }
         if($this->relation==="allotment")
         {
              $view['rent_enquiry_id'] = $breakdown->rent_enquiry_id;
              $view['tenant_id']         = $breakdown->tenant->id??null;
              $view['property_id']     = $breakdown->property_id ??null;
              $view['unit_id']         = $breakdown->unit_id ??null;
              $view['name']            = $breakdown->tenant->name ??null;
              $view['mobile']          = $breakdown->tenant->mobile ??null;
              $view['country_name']    = $breakdown->country->name ??null;
              $view['tenancy_type']    = $breakdown->tenant->tenant_type ??null;
              $view['tenant_count']    = $breakdown->tenant->tenant_count??0;
         }

         if(!$breakdown->rent_installments->isEmpty())
         {
             $i=0;
            foreach($breakdown->rent_installments as $item)
            {
               $view['rent_installments'][$i]['installment'] = $item->installment;
               $view['rent_installments'][$i]['property_unit_allotment_id'] = $item->property_unit_allotment_id;
               $view['rent_installments'][$i]['rent_breakdown_id'] = $item->rent_breakdown_id;
               $view['rent_installments'][$i]['tenant_id'] = $item->tenant_id;
               $view['rent_installments'][$i]['unit_id'] = $item->unit_id;
               $view['rent_installments'][$i]['invoice_id'] = $item->invoice_id;
               $view['rent_installments'][$i]['amount'] = $item->amount;
               $view['rent_installments'][$i]['bank_name'] = $item->bank_name;
               $view['rent_installments'][$i]['cheque_no'] = $item->cheque_no;
               $view['rent_installments'][$i]['remark'] = $item->remark;
               $view['rent_installments'][$i]['cheque_date'] = $item->cheque_date;
               $view['rent_installments'][$i]['paid_to'] = $item->paid_to;
               $i++;
            }
         }
         else
         {
              $view['rent_installments'] = [];
         }
         return $view;
     }


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
