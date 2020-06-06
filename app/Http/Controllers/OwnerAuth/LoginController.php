<?php

namespace App\Http\Controllers\OwnerAuth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{

    public function __construct()
    {

        $this->middleware('guest:owner')->except('logout');
    }

    public function showLoginForm()
    {
        return view('owner.auth.login');
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(),[
             'email' => 'required|email',
            'password' => 'required'
        ]);
        if(!$validator->fails())
        {
            if (Auth::guard('owner')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
                return redirect()->intended(route('owner.dashboard'));
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
        Auth::guard('owner')->logout();
        return redirect()->route('owner.login');
    }
}
