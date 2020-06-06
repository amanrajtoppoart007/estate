<?php
namespace App\Library;
use Illuminate\Http\Request;
use App\Admin;
use Hash;
class CreateAdmin {
    var $role;
    public function __construct($role)
    {
          $this->role = $role;
    }
    public function execute(Request $request)
    {
          $request            = $request->all();
          $params['name']     = $request['name'];
          $params['email']    = $request['email'];
          $params['password'] = Hash::make($request['password']);
          $params['role']     = $this->role;
          if($admin = Admin::create($params))
          {
             return $admin->id;
          }
          return false;
    }
}