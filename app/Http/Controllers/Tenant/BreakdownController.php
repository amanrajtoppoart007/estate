<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use App\Library\RentBreakDownLib;
use App\RentBreakDown;
use Illuminate\Http\Request;

class BreakdownController extends Controller
{
    public function __construct()
    {
         $this->middleware("auth:tenant");
    }
    public function view($id)
    {
        $breakdown = (new RentBreakDownLib())->view(RentBreakDown::find($id));
        if(!empty($breakdown))
        {
            return view("tenant.breakdown.view",compact("breakdown"));
        }
        else
        {
            return view("blank")->with(["msg"=>"Invalid Detail"]);
        }
    }
}
