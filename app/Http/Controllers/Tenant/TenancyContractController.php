<?php

namespace App\Http\Controllers\Tenant;

use App\DataTable\Api;
use App\Http\Controllers\Controller;
use App\TenancyContract;
use Illuminate\Http\Request;

class TenancyContractController extends Controller
{
    public function fetch()
    {
        echo json_encode((new Api((new TenancyContract())))->getResult());
    }
    public function index()
    {
        return view("tenant.contract.index");
    }

    public function renew()
    {
        return view("tenant.contract.renew");
    }
    public function break()
    {
        return view("tenant.contract.break");
    }
}
