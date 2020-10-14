<?php
namespace App\Library;
use App\RentInstallment;
use App\Helpers\GlobalHelper;
class CreateInstallments
{
    var $params;
    var $unit_allotment_id;
    public function __construct($unit_allotment_id,$admin_id,$params)
    {
        $this->unit_allotment_id = $unit_allotment_id;
        $this->params            = $params;
        $this->admin_id          = $admin_id;
    }

    public function execute()
    {
        $request = $this->params;
        $count   = count($request['monthly_installment']);
        for($i=0;$i<$count;$i++)
        {
            $security_deposit   = isset($request['security_deposit'][0])?$request['security_deposit'][0]:0;
            $municipality_fees  = isset($request['municipality_fees'][0])?(($request['monthly_installment'][0]*4)/100):0;
            $brokerage          = isset($request['brokerage'][0])?$request['brokerage'][0]:0;
            $contract           = isset($request['contract'][0])?$request['contract'][0]:0;
            $remote_deposit     = isset($request['remote_deposit'][0])?$request['remote_deposit'][0]:0;
            $sewa_deposit       = isset($request['sewa_deposit'][0])?$request['sewa_deposit'][0]:0;
            $amount             = isset($request['monthly_installment'][0])?$request['monthly_installment'][0]:0;
            $total_amount       = GlobalHelper::get_sum($security_deposit,$municipality_fees,$brokerage,$contract,$remote_deposit,$sewa_deposit,$amount);

            $installment['property_unit_allotment_id'] = $this->unit_allotment_id;
            $installment['tenant_id']                  = $request['tenant_id'];
            $installment['unit_id']                    = $request['unit_id'];
            $installment['amount']                     = $amount;
            $installment['total_amount']               = $total_amount;
            $installment['brokerage']                  = $brokerage;
            $installment['security_deposit']           = $security_deposit;
            $installment['remote_deposit']             = $remote_deposit;
            $installment['sewa_deposit']               = $sewa_deposit;
            $installment['contract']                   = $contract;
            $installment['municipality_fees']          = $municipality_fees;
            $installment['status']                     = 0;
            $installment['admin_id']                   = $this->admin_id;
            RentInstallment::create($installment);
        }
    }

}

