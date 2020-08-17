<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\RentBreakDown;
use Illuminate\Http\Request;

class RentBreakDownController extends Controller
{
    public function view($encoded_string)
    {
        $id = base64_decode($encoded_string);
        $breakdown = RentBreakDown::find($id);
        if(!empty($breakdown))
        {
             return view("guest.rent.breakdown",compact("breakdown"));
        }
        else
        {
            return view("guest.error")->with(["msg"=>"Invalid Request ,Please Contact Website Administrator For Further Detail"]);
        }
    }
}
