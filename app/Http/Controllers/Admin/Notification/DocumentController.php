<?php

namespace App\Http\Controllers\Admin\Notification;

use App\DataTable\Api;
use App\Document;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class DocumentController extends Controller
{

     public function __construct()
     {
         $this->middleware("auth:admin");
     }

     public function index()
     {
         return view("admin.notification.document");
     }

     public function fetch(Request $request)
     {
         echo json_encode((new Api((new Document())))->getResult());
     }

}
