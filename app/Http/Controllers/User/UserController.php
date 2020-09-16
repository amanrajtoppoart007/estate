<?php

namespace App\Http\Controllers\User;

use App\Favorite;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth:web");
    }

    public function profile()
    {
        return view('user.profile');
    }

    public function store_favorite(Request $request)
    {
        $validator = Validator::make($request->all(),[
             "property_id"=>"required|numeric",
             "unit_id"=>"required|numeric|unique:favorites",
        ],
        [
            "property_id.required"=>"Property is not selected",
            "unit_id.unique"=>"Already added in favorite list"
        ]);
        if(!$validator->fails())
        {
            $store = $request->only(["property_id","unit_id"]);
            $store['user_id'] = auth()->user()->id;

            if(Favorite::create($store))
            {
                $result = ["status"=>1,"response"=>"success","message"=>"Property added to favorite list"];
            }
            else
            {
                $result = ["status"=>0,"response"=>"error","message"=>"Property is not added to favorite list"];
            }
        }
        else
        {
              $result = ["status"=>0,"response"=>"error","message"=>$validator->errors()->all()];
        }
        return response()->json($result,200);
    }
}
