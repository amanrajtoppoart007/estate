<?php
namespace App\Library;
use App\AuthorisedPerson;
use App\Helpers\GlobalHelper;

class EditAuthorisedPerson
{

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
            if(request()->has("auth_person_name"))
            {
                $update['name']   = request()->auth_person_name;
            }
            if(request()->has("auth_person_email"))
            {
                $update['email']   = request()->auth_person_email;
            }
            if(request()->has("auth_person_mobile"))
            {
                $update['mobile']   = request()->auth_person_mobile;
            }
             if(request()->has("auth_person_country_code"))
            {
                $update['country_code']   = request()->auth_person_country_code;
            }
              if(request()->has("auth_person_designation"))
             {
                $update['designation']   = request()->auth_person_designation;
             }
              if(request()->hasFile("auth_person_image"))
             {
               $update["image"]  = GlobalHelper::singleFileUpload(request(), 'local', 'auth_person_image', 'agent/auth_persons');
             }
              $update['authority_id']  = $this->authority_id;
              $update['authority_type'] = $this->authority_type;

             $check = AuthorisedPerson::where(['authority_id'=>$this->authority_id,'authority_type'=>$this->authority_type])->first();
             if(!empty($check))
             {
                    AuthorisedPerson::where(['authority_id'=>$this->authority_id,'authority_type'=>$this->authority_type])->update($update);
                    (new UploadEntityDocs($check->id,'authorised_person'))->handle();
                    return true;
             }
             else
             {
                 if($model = AuthorisedPerson::create($update))
                 {
                     (new UploadEntityDocs($model->id,'authorised_person'))->handle();
                     return true;
                 }
             }
          return false;
        }
        else
        {
            return false;
        }
    }
}
