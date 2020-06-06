<?php

namespace App\Http\Controllers\TenantAuth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{

    public function __construct()
    {

        $this->middleware('guest:tenant')->except('logout');
    }

    public function showLoginForm()
    {

        return view('tenant.auth.login');
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(),[
             'email' => 'required|email',
            'password' => 'required'
        ]);
        if(!$validator->fails())
        {
            if (Auth::guard('tenant')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
                return redirect()->intended(route('tenant.dashboard'));
            }
            else
            {
                return redirect()->back()->with('message','Invalid credentials')->withInput($request->only('email', 'remember'));
            }
        }
        else
        {
            return redirect()->back()->withErrors($validator->errors())->withInput($request->only('email', 'remember'));;
        }
    }

    public function logout()
    {
        Auth::guard('tenant')->logout();
        return redirect()->route('tenant.login');
    }
}
