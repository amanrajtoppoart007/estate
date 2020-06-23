<?php
namespace App\Library;
use App\MaintenanceWorkProgress;
class CreateMaintenanceWorkProgress
{
    var $request;
    var $work_order_id;
    public function __construct($array,$workOrderId)
    {
        $this->request = $array;
        $this->work_order_id = $workOrderId;
    }
    public function execute()
    {
        $progress = MaintenanceWorkProgress::where(['maintenance_work_order_id'=>$this->work_order_id,'status_type'=>$this->request['status_type']])->first();
        if(empty($progress))
        {
            $progress = new MaintenanceWorkProgress();
        }
        $progress->maintenance_work_order_id = $this->work_order_id;
        $progress->status_type  = $this->request['status_type'];
        $progress->completed_at = $this->request['completed_at'] ? date('Y-m-d',strtotime($this->request['completed_at'])):null;
        $progress->work_status  = $this->request['work_status'];
        $progress->remark       = $this->request['remark'];
        return  $progress->save();
    }
}
