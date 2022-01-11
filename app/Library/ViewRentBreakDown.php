<?php
namespace App\Library;
use App\RentBreakDown;
use App\Tenant;

class ViewRentBreakDown
{
    var $relation;
    var $id;

    public function __construct($relation,$id)
    {
        $this->relation = $relation;
        $this->id       = $id;
    }

    public function view(): array
     {
         if($this->relation=="tenant")
         {
           $breakdown = RentBreakDown::where(["tenant_id"=>$this->id])->first();

           if(empty($breakdown) && (!empty($this->id)))
           {
                $tenant = Tenant::find($this->id);
                $rentEnquiryId = $tenant->rent_enquiry_id;
                if(!empty($rentEnquiryId))
                {
                    $breakdown = RentBreakDown::where(['rent_enquiry_id'=>$rentEnquiryId])->first();
                    $breakdown->tenant_id = $this->id;
                    $breakdown->save();
                    $breakdown->refresh();

                }
          }

         }

         if($this->relation=="breakdown")
         {
             $breakdown = RentBreakDown::find($this->id);
         }
         if($this->relation=="rent_enquiry")
         {
                $breakdown = RentBreakDown::where(['rent_enquiry_id'=>$this->id])->first();
         }

            if(empty($breakdown))
            {
                return [];
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

         if($this->relation=="rent_enquiry"||$this->relation=="breakdown")
         {
              $view['rent_enquiry_id']   = $breakdown->rent_enquiry_id;
              $view['tenant_id']         = $breakdown->tenant->id??null;
              $view['name']              = $breakdown->rent_enquiry->name ??null;
              $view['mobile']              = $breakdown->rent_enquiry->mobile ??null;
              $view['country_name']      = $breakdown->rent_enquiry->country->name ??null;
              $view['tenancy_type']      = $breakdown->rent_enquiry->tenancy_type ??null;
              $view['tenant_count']      = $breakdown->rent_enquiry->tenant_count??0;
         }
         if($this->relation=="tenant")
         {
              $view['rent_enquiry_id'] = $breakdown->rent_enquiry_id;
              $view['tenant_id']       = $breakdown->tenant->id??null;
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
               $view['rent_installments'][$i]['cheque_date'] = date("d-m-Y",strtotime($item->cheque_date));
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
}
