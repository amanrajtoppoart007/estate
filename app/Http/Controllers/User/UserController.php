<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
}
