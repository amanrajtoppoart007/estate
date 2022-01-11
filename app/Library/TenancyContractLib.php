<?php
namespace App\Library;
use App\TenancyContract;
class TenancyContractLib
{
    public function data(): array
    {
        $params = request()->only(['tenant_id','unit_allotment_id','unit_id','breakdown_id']);
        $params['effective_from'] = date("Y-m-d",strtotime(request()->input("effective_from")));
        $params['effective_upto'] = date("Y-m-d",strtotime(request()->input("effective_upto")));
        $params['signature_date'] = date("Y-m-d",strtotime(request()->input("signature_date")));
        return $params;

    }

    public function store(): bool
    {
        if(empty($this->exist()))
        {
               $contract = TenancyContract::create($this->data());
               (new UploadEntityDocs($contract->id,"tenancy_contracts"))->handle();
               return $contract->id;
        }
        else
        {
            return false;
        }
    }

    public function exist(): bool
    {
        $params = request()->only(['tenant_id','unit_allotment_id','unit_id','breakdown_id']);
        return TenancyContract::where($params)->first()?true:false;
    }
}
