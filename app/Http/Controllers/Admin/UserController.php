<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index()
    {
        $users = User::orderBy('created_at', 'DESC')->paginate(20);
        return view('admin.user.index', compact('users'));
    }
    public function pw_gen(){
        echo Hash::make('12345678');
    }
}
