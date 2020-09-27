<?php

namespace App\Library;

use App\Helpers\GlobalHelper;
use App\OwnerAuthPerson;
class CreateOwnerAuthPerson
{
    var $request;
    var $admin_id;
    var $owner_id;
    public function __construct($request,$owner_id)
    {
        $this->request = $request;
        $this->admin_id = auth('admin')->user()->id;
        $this->owner_id = $owner_id;
    }

    public function execute()
    {
        $store['name'] = $this->request->auth_person_name ? $this->request->auth_person_name : null;
        $store['email'] = $this->request->auth_person_email ? $this->request->auth_person_email : null;
        $store['mobile'] = $this->request->auth_person_mobile ? $this->request->auth_person_mobile : null;
        $store['country_code'] = $this->request->auth_person_country_code ? $this->request->auth_person_country_code : null;
        $store['designation'] = $this->request->auth_person_designation ? $this->request->auth_person_designation : null;
        $store['emirates_id'] = GlobalHelper::singleFileUpload( 'local', 'auth_person_emirates_id_doc', 'owner/auth_persons');
        $store['passport'] = GlobalHelper::singleFileUpload( 'local', 'auth_person_passport', 'owner/auth_persons');
        $store['visa'] = GlobalHelper::singleFileUpload( 'local', 'auth_person_visa', 'owner/auth_persons');
        $store['poa'] = GlobalHelper::singleFileUpload( 'local', 'auth_person_power_of_attorney', 'owner/auth_persons');
        $store['admin_id'] = $this->admin_id;
        $store['owner_id'] = $this->owner_id;
        $store['emirates_id_exp_date'] = $this->request->auth_person_emirates_exp_date ? date('Y-m-d', strtotime($this->request->auth_person_emirates_exp_date)) : null;
        $store['passport_exp_date'] = $this->request->auth_person_passport_exp_date ? date('Y-m-d', strtotime($this->request->auth_person_passport_exp_date)) : null;
        $store['visa_exp_date'] = $this->request->auth_person_visa_exp_date ? date('Y-m-d', strtotime($this->request->auth_person_visa_exp_date)) : null;
        $store['poa_exp_date'] = $this->request->auth_person_visa_exp_date ? date('Y-m-d', strtotime($this->request->auth_person_visa_exp_date)) : null;

        if($state = OwnerAuthPerson::create($store))
        {
            return $state->id;
        }
       return false;
    }
}
