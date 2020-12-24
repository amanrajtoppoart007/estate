<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function profile()
    {
        return view("tenant.profile.index");
    }

    public function renewal()
    {
        return view("tenant.profile.renewal");
    }
}
