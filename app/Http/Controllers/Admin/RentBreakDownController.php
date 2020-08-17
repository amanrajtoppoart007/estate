<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRentBreakDown;
use App\Library\CreateRentBreakDown;
use App\RentBreakDown;
use Illuminate\Http\Request;

class RentBreakDownController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth:admin");
    }

    public function store(StoreRentBreakDown $request)
    {
         $request->validated();
         if($id = (new CreateRentBreakDown())->handle())
        {
            $next_url = route('view.rent.breakdown',$id);
            $result = ['status'=>1,'response' => 'success','next_url'=>$next_url, 'message' => 'Rent breakdown created successfully'];
        }
         else
        {
            $result = ['status'=>0,'response' => 'error', 'message' => 'Rent breakdown not created.'];
        }
          return response()->json($result,200);
    }

    public function view($id)
    {
        $breakdown = RentBreakDown::find($id);
        if(!empty($breakdown))
        {
            return view("admin.rentBreakDown.view",compact("breakdown"));
        }
        else
        {
            return view("blank")->with(["msg"=>"Invalid Detail"]);
        }

    }

}
