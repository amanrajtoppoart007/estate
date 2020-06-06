<?php

namespace App\Http\Controllers\AdminAuth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class LoginController extends Controller
{
       /**
     *
     * check if user is admin
     */
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }
    /**
     *
     * show login form
     */
    public function showLoginForm()
    {
        return view('admin.auth.login');
    }
    /**
     *
     * POST login request
     */
    public function login(Request $request)
    {
        $this->validate($request,['email' => 'required|email','password' => 'required']);
        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            return redirect()->intended(route('admin.dashboard'));
        }

        return redirect()->back()->withInput($request->only('email', 'remember'));
    }

     public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}
