<?php
namespace App\Library;
use App\AuthorisedPerson;
use App\Helpers\GlobalHelper;

class CreateAuthorisedPerson {

    private $authority_id,$authority_type;
    public function __construct($authority_id,$authority_type)
    {
        $this->authority_id   = $authority_id;
        $this->authority_type = $authority_type;
    }

    public function handle()
    {
        if(request()->has("authorised_person_required"))
        {
             $store['name']   = request()->auth_person_name ? request()->auth_person_name : null;
             $store['email']  = request()->auth_person_email ? request()->auth_person_email : null;
             $store['mobile'] = request()->auth_person_mobile ? request()->auth_person_mobile : null;
             $store['country_code'] = request()->auth_person_country_code ? request()->auth_person_country_code : null;
             $store['designation'] = request()->auth_person_designation ? request()->auth_person_designation : null;
             $store['authority_id']  = $this->authority_id;
             $store['authority_type'] = $this->authority_type;
             if(request()->hasFile("auth_person_image"))
             {
               $store["image"]  = GlobalHelper::singleFileUpload( 'local', 'auth_person_image', 'agent/auth_persons');
             }
             if($model = AuthorisedPerson::create($store))
             {
                    (new UploadEntityDocs($model->id,'authorised_person'))->handle();
                    return  true;
             }
          return false;
        }
        else
        {
            return false;
        }
    }
}
