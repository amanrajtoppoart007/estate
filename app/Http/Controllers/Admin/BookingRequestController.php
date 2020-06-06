<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\BookingRequest;
use App\DataTable\Api;
class BookingRequestController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
     public function fetch(Request $request)
    {
        $model  = new BookingRequest();
        $api    = new Api($model,$request);
        echo json_encode($api->apply());
    }
    public function index()
    {
        $bookingRequests = BookingRequest::with('property')->orderBy('created_at','DESC')->paginate(20);
        return view('admin.bookingRequest.index',compact('bookingRequests'));
    }
}
