<?php
namespace App\Library;
use Illuminate\Http\Request;
use App\Admin;
use Illuminate\Support\Facades\Hash;
class UpdateAdmin {
    var $admin_id;
    public function __construct($admin_id)
    {
          $this->admin_id = $admin_id;
    }
    public function execute(Request $request)
    {
          $update = array();
          $params =   array('name','email','password');
          foreach($request->all() as $key=>$value)
          {
                if(in_array($key,$params))
                {
                        if($key=='password')
                        {
                              $update['password'] = Hash::make($request->password);
                        }
                        else 
                        {
                              $update[$key]  = $request->$key; 
                        }
                }
          } 
          if(Admin::where(['id'=>$this->admin_id])->update($update))
          {
             return $this->admin_id;
          }
          return false;
    }
}