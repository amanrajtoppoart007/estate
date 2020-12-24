<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        return view("tenant.payment.index");
    }

    public function view()
    {
        return view("tenant.payment.view");
    }

    public function refund()
    {
        return view("tenant.payment.refund");
    }
}
