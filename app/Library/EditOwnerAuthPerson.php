<?php

namespace App\Library;

use App\OwnerAuthPerson;
use App\Helpers\GlobalHelper;
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

        $params['email'] = $this->request->auth_person_email ? $this->request->auth_person_email : null;
        $params['name'] = $this->request->auth_person_name ? $this->request->auth_person_name : null;
        $params['mobile'] = ($this->request->auth_person_mobile) ? $this->request->auth_person_mobile : null;
        $params['country_code'] = ($this->request->auth_person_country_code) ? $this->request->auth_person_country_code : null;
        $params['designation'] = ($this->request->auth_person_designation) ? $this->request->auth_person_designation : null;
        if($this->request->hasFile('auth_person_emirates_id_doc'))
        {
            $params['emirates_id'] = GlobalHelper::singleFileUpload( 'local', 'auth_person_emirates_id_doc', 'owner/auth_persons');
        }

        if($this->request->hasFile('auth_person_passport'))
        {
            $params['passport'] = GlobalHelper::singleFileUpload( 'local', 'auth_person_passport', 'owner/auth_persons');
        }
        if($this->request->hasFile('auth_person_visa'))
        {
            $params['visa'] = GlobalHelper::singleFileUpload( 'local', 'auth_person_visa', 'owner/auth_persons');
        }

       if($this->request->hasFile('auth_person_power_of_attorney'))
        {
            $params['poa'] = GlobalHelper::singleFileUpload( 'local', 'auth_person_power_of_attorney', 'owner/auth_persons');
        }

        $params['admin_id'] = $this->admin_id;
        $params['owner_id'] = $this->owner_id;
        $params['emirates_id_exp_date'] = $this->request->auth_person_emirates_exp_date ? date('Y-m-d', strtotime($this->request->auth_person_emirates_exp_date)) : null;
        $params['passport_exp_date'] = $this->request->auth_person_passport_exp_date ? date('Y-m-d', strtotime($this->request->auth_person_passport_exp_date)) : null;
        $params['visa_exp_date'] = $this->request->auth_person_visa_exp_date ? date('Y-m-d', strtotime($this->request->auth_person_visa_exp_date)) : null;
        $params['poa_exp_date'] = $this->request->auth_person_visa_exp_date ? date('Y-m-d', strtotime($this->request->auth_person_visa_exp_date)) : null;

        if(OwnerAuthPerson::where(['owner_id' => $this->owner_id])->first())
        {
            if(OwnerAuthPerson::where(['owner_id' => $this->owner_id])->update($params))
            {
                return true;
            }
        }
        else
        {
            if(OwnerAuthPerson::create($params))
            {
                return true;
            }
        }
        return false;
    }
}
