<?php

namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Tenant extends Authenticatable
{
    use Notifiable;
    protected $guarded = [];

    protected $appends = ['country_name','tenancy_contract_url','contract_status'];


    public function getTenancyContractUrlAttribute()
    {
        $contract = $this->tenancy_contract->where('status',1)->first();

        if(!empty($contract))
        {
          return route("get.doc",base64_encode($contract->contract_doc_url));
        }
       return false;
    }

    public function getContractStatusAttribute()
    {
        $contract = $this->tenancy_contract->first();

        if(!empty($contract))
        {
          $start_date = strtotime($contract->effective_from);
          $end_date   = strtotime($contract->effective_upto);
          $now        = strtotime(date("d-m-Y"));
          if(($now>$start_date) && ($now<$end_date))
          {
              $status = "Active";
          }
          else
          {
              $status = "Expired";
          }
        }
        else
        {
            $status = "NA";
        }
       return $status;
    }


    public function breakdown()
    {
        return $this->hasOne(RentBreakDown::class,"tenant_id","id");
    }


    public function rent_enquiry()
    {
        return $this->belongsTo(RentEnquiry::class,"rent_enquiry_id","id");
    }

    public function tenancy_contract()
    {
        return $this->hasMany(TenancyContract::class,"tenant_id","id");
    }

    public function country()
    {
         return $this->belongsTo(Country::class,'country_id','id');
    }

    public function getCountryNameAttribute()
    {
         return ($this->country)?$this->country->name:null;
    }
    /******tenant property relation **********/
    public function allotment()
    {
         return $this->hasMany(PropertyUnitAllotment::class,'tenant_id','id');
    }
    /******tenant documents  **********/
    public function documents()
    {
        return $this->morphMany(Document::class,'archive');
    }

     /******tenant relations  **********/
    public function relations()
    {
         return $this->hasMany(TenantRelation::class);
    }

    public function state()
    {
         return $this->belongsTo(State::class,'state_id','id');
    }
    public function city()
    {
         return $this->belongsTo(City::class,'city_id','id');
    }
     public function invoices()
     {
          return $this->morphMany(Invoice::class, 'party');
     }
     public function maintenance_work()
     {
        return $this->morphMany(MaintenanceWork::class, 'applicant');
     }

      protected $hidden = [
        'password', 'remember_token',
    ];
}
