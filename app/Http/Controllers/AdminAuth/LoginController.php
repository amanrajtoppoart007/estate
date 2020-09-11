<?php

namespace App\Http\Controllers\AdminAuth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function __construct()
    {
       $this->middleware('guest:admin',['except'=>'logout']);
    }


    public function showLoginForm()
    {
        if(Auth::guard('admin')->viaRemember())
        {
                 return redirect()->route('admin.dashboard');
        }
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(),[
             'email' => 'required|email',
            'password' => 'required'
        ]);
        if(!$validator->fails())
        {
            if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
                return redirect()->intended(route('admin.dashboard'));
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
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}
