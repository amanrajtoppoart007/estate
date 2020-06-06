<?php
namespace App\Library;
class ContractStatus 
{
    var $code;
    public function __construct($code)
    {
        $this->code = $code;
    }

    public function getStatus()
    {
        switch ($this->code) {
            case 1:
                $status = 'Active';
                break;
            case 2:
                $status = 'Moved Out';
                break;
            case 3:
                $status = 'Evicted';
                break;
            
            default:
                $status = 'In-active';
                break;
        }
        return $status;
    }
    
}
