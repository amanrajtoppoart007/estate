<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SupportController extends Controller
{
    public function index()
    {

    }

    public function faq()
    {
        return view("tenant.support.faq");
    }
}
