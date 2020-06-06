<?php
namespace App\Library;
use App\Task;
use App\TaskComment;
class Comments 
{
    var $task_id;
    var $primary_user_id;
     public function __construct($task_id,$primary_user_id)
     {
        $this->task_id         = $task_id;
        $this->primary_user_id = $primary_user_id;
     }
     public function handle()
     {
        $dates  =  $this->getDates();
        $chats  = array();
        foreach($dates as $date)
        {
            $chat    = array();
            $chat['date']      = date('d-m-Y',strtotime($date));
            $chat['comments']  = $this->getComments($date);
            array_push($chats,$chat);
        }
        return $chats;
     }
     protected  function getDates()
     {
        return TaskComment::distinct('date')->where(['task_id'=>$this->task_id])->orderBy('date','DESC')->pluck('date');
     }
     protected function getComments($date)
     {
         $chats  = array();
         $comments =  TaskComment::where(['task_id'=>$this->task_id,'date'=>$date])->orderBy('created_at','DESC')->get()->toArray();
         foreach($comments as $comment)
         {
            $chat              = array();
            $chat['user_id']   = $comment['user_id'];
            $chat['user_type'] = $comment['user_type'];
            if($chat['user_id']==$this->primary_user_id)
            {
              $chat['position']  = 'RIGHT';
            }
            else 
            {
              $chat['position']  = 'LEFT';
            }
             if(!empty($comment['media']))
            {
                $chat['media'] = route('get.doc',base64_encode($comment['media']));
            }
            else
            {
               $chat['media'] = 'NO_MEDIA';
            }
            $chat['msg']       = $comment['msg'];
            $chat['time']      = date('h:i A',strtotime($comment['created_at']));
            $chat['date']      = date('d-m-Y',strtotime($comment['created_at']));
            $chat['user_name'] = pluck_single_value('admins','id',$comment['user_id'],'name');
            array_push($chats,$chat);
         }
         return $chats;
     }
}