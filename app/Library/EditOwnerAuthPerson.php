<?php

namespace App\Library;

use App\OwnerAuthPerson;

class EditOwnerAuthPerson
{
    var $request;
    var $admin_id;
    var $owner_id;

    public function __construct($request, $owner_id)
    {
        $this->request = $request;
        $this->admin_id = auth('admin')->user()->id;
        $this->owner_id = $owner_id;
    }

    public function execute()
    {

        $update['email'] = $this->request->auth_person_email ? $this->request->auth_person_email : null;
        $update['name'] = $this->request->auth_person_name ? $this->request->auth_person_name : null;
        $update['mobile'] = ($this->request->auth_person_mobile) ? $this->request->auth_person_mobile : null;
        $update['country_code'] = ($this->request->auth_person_country_code) ? $this->request->auth_person_country_code : null;
        $update['designation'] = ($this->request->auth_person_designation) ? $this->request->auth_person_designation : null;
        if($this->request->hasFile('auth_person_emirates_id_doc'))
        {
            $update['emirates_id'] = GlobalHelper::singleFileUpload($this->request, 'local', 'auth_person_emirates_id_doc', 'owner/auth_persons');
        }

        if($this->request->hasFile('auth_person_passport'))
        {
            $update['passport'] = GlobalHelper::singleFileUpload($this->request, 'local', 'auth_person_passport', 'owner/auth_persons');
        }
        if($this->request->hasFile('auth_person_visa'))
        {
            $update['visa'] = GlobalHelper::singleFileUpload($this->request, 'local', 'auth_person_visa', 'owner/auth_persons');
        }

       if($this->request->hasFile('auth_person_power_of_attorney'))
        {
            $update['poa'] = GlobalHelper::singleFileUpload($this->request, 'local', 'auth_person_power_of_attorney', 'owner/auth_persons');
        }

        $update['admin_id'] = $this->admin_id;
        $update['owner_id'] = $this->owner_id;
        $update['emirates_id_exp_date'] = $this->request->auth_person_emirates_exp_date ? date('Y-m-d', strtotime($this->request->auth_person_emirates_exp_date)) : null;
        $update['passport_exp_date'] = $this->request->auth_person_passport_exp_date ? date('Y-m-d', strtotime($this->request->auth_person_passport_exp_date)) : null;
        $update['visa_exp_date'] = $this->request->auth_person_visa_exp_date ? date('Y-m-d', strtotime($this->request->auth_person_visa_exp_date)) : null;
        $update['poa_exp_date'] = $this->request->auth_person_visa_exp_date ? date('Y-m-d', strtotime($this->request->auth_person_visa_exp_date)) : null;

        if(OwnerAuthPerson::where(['owner_id' => $this->owner_id])->update($update))
        {
            return true;
        }
        return false;
    }
}
