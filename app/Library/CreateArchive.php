<?php
namespace App\Library;
use App\Document;

class CreateArchive
{

    public function handle($inputs)
    {
        $params['document_title'] = $inputs['document_title'] ? $inputs['document_title'] : null;
        $params['archive_id']     = $inputs['archive_id'] ? $inputs['archive_id'] : null;
        $params['archive_type']   = $inputs['archive_type'] ? $inputs['archive_type'] : null;
        $params['date_key']       = $inputs['date_key'] ? $inputs['date_key'] : null;
        $params['date_value']     = $inputs['date_value'] ? date("Y-m-d",strtotime($inputs['date_value'])) : null;
        $params['file_url']       = $inputs['file_url'] ? $inputs['file_url'] : null;
        $params['disk']           = $inputs['disk'] ? $inputs['disk'] : null;
        $params['visibility']     = $inputs['visibility'] ? $inputs['visibility'] : null;
        $params['file_type']      = $inputs['file_type'] ? $inputs['file_type'] : null;
        $params['extension']      = $inputs['extension'] ? $inputs['extension'] : null;
        $params['status']         = $inputs['status'] ? $inputs['status'] : null;

        if(Document::create($params))
        {
            return true;
        }
        return false;
    }
}
