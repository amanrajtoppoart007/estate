<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ContactRequest;
class ContactRequestController extends Controller
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
    public function index()
    {
        $contactRequests = ContactRequest::orderBy('created_at', 'DESC')->paginate(20);
        return view('admin.contactRequest.index', compact('contactRequests'));
    }
}
