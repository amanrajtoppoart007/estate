<?php

namespace App\Library;

use App\Document;
use App\Helpers\GlobalHelper;
use Illuminate\Support\Str;

class UploadEntityDocs
{
    var $primary_key;
    var $table;

    public function __construct($primary_key,$table)
    {
        $this->primary_key = $primary_key;
        $this->table = $table;
    }

    public function handle()
    {
        if($this->table=="developer"||$this->table=="owner")
        {
            $documents = array(
                [
                    'document_title' => 'passport',
                    'date_params' => ['EXPIRY_DATE', 'passport_exp_date']
                ],
                [
                    'document_title' => 'visa',
                    'date_params' => ['EXPIRY_DATE', 'visa_exp_date']
                ]
            ,
                [
                    'document_title' => 'emirates_id_doc',
                    'date_params' => ['EXPIRY_DATE', 'emirates_exp_date']
                ]
            ,
                [
                    'document_title' => 'power_of_attorney',
                    'date_params' => ['ISSUE_DATE', 'poa_exp_date']
                ]
            );
        }
        else if($this->table=="tenant")
        {
            $documents = array(
                [
                    'document_title'=>'emirates_id',
                    'date_params'=>['EXPIRY_DATE','emirates_id_exp_date']
                ],
                [
                    'document_title'=>'passport',
                    'date_params'=>['EXPIRY_DATE','passport_exp_date']
                ],
                [
                    'document_title'=>'visa',
                    'date_params'=>['EXPIRY_DATE','visa_exp_date']
                ],
                [
                    'document_title'=>'bank_passbook',
                    'date_params'=>['EXPIRY_DATE','bank_passbook_issue_date']
                ],
                [
                    'document_title'=>'last_sewa_id',
                    'date_params'=>['ISSUE_DATE','last_sewa_id_issue_date']
                ]
                ,
                [
                    'document_title'=>'marriage_certificate',
                    'date_params'=>['ISSUE_DATE','marriage_certificate_issue_date']
                ],
                [
                    'document_title'=>'no_sharing_agreement',
                    'date_params'=>['ISSUE_DATE','no_sharing_agreement_issue_date']
                ]
                ,
                [
                    'document_title'=>'trade_license',
                    'date_params'=>['ISSUE_DATE','trade_license_exp_date']
                ]
            );
        }
        else if($this->table=="authorised_person")
        {
            $documents = array(
                [
                    'document_title' => 'auth_person_emirates_id_doc',
                    'date_params' => ['EXPIRY_DATE', 'auth_person_emirates_exp_date']
                ],
                [
                    'document_title' => 'auth_person_visa',
                    'date_params' => ['EXPIRY_DATE', 'auth_person_passport_exp_date']
                ],
                [
                    'document_title' => 'auth_person_passport',
                    'date_params' => ['EXPIRY_DATE', 'auth_person_visa_exp_date']
                ],
                [
                    'document_title' => 'auth_person_power_of_attorney',
                    'date_params' => ['EXPIRY_DATE', 'auth_poa_exp_date']
                ],
            );
        }
        else if($this->table=="agent")
        {
            $documents = array(
                [
                    'document_title' => 'emirates_id_doc',
                    'date_params' => ['EXPIRY_DATE', 'emirates_exp_date']
                ],
                [
                    'document_title' => 'passport',
                    'date_params' => ['EXPIRY_DATE', 'passport_exp_date']
                ],
                [
                    'document_title' => 'visa',
                    'date_params' => ['EXPIRY_DATE', 'visa_exp_date']
                ],
                [
                    'document_title' => 'power_of_attorney',
                    'date_params' => ['EXPIRY_DATE', 'poa_exp_date']
                ],
            );
        }
        else
        {
            $documents = [];
        }
          if(!empty($documents))
          {
              foreach ($documents as $doc) {
                  $this->createArchive($doc['document_title'], $doc['date_params']);
              }
          }
          else
          {
              return false;
          }
         return true;
    }

    public function createArchive($document_title,$date_params)
    {
        $date_key     = $date_params[0] ? $date_params[0] : "EXPIRY_DATE";
        $date_key_name = $date_params[1] ? $date_params[1] : null;
        $folder = request()->name ? Str::studly(strtolower(request()->name)):$this->table;
        $archive['document_title'] = "$document_title";
        $archive['date_key']       = "$date_key";
        $archive['archive_type']   = $this->table;
        $archive['disk']           = 'local';
        $archive['status']         = 1;
        $archive['archive_id']     = $this->primary_key;
        if(request()->has("$date_key_name"))
        {
            $archive['date_value'] = date('Y-m-d', strtotime(request()->$date_key_name));
        }
        if(request()->hasFile("$document_title"))
        {
            $archive['file_url'] = GlobalHelper::singleFileUpload('local', "$document_title", "documents/$folder");
        }
        $doc_check = Document::where(['document_title'=>"$document_title",'archive_id'=>$this->primary_key,'archive_type'=>"$this->table"])->first();
        if(!empty($doc_check))
        {
            if (request()->hasFile("$document_title")) {
                Document::where(['document_title'=>"$document_title",'archive_id'=>$this->primary_key,'archive_type'=>"$this->table"])->delete();
                Document::create($archive);
            }
            else
            {
                Document::where(['document_title'=>"$document_title",'archive_id'=>$this->primary_key,'archive_type'=>"$this->table"])->update($archive);
            }

        }
        else
        {
            if(request()->hasFile("$document_title")) {
                Document::create($archive);
            }
        }
    }
}
