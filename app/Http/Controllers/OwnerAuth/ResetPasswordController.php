<?php

namespace App\Http\Controllers\OwnerAuth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Support\Facades\Auth;
use Password;
class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */
    use ResetsPasswords;
    /**
         * Where to redirect users after resetting their password.
         *
         * @var string
         */
    protected $redirectTo = '/owner';

    public function __construct()
    {
        $this->middleware('guest:owner');
    }


    protected function guard()
    {
      return Auth::guard('owner');
    }

    protected function broker()
    {
      return Password::broker('owners');
    }

    public function showResetForm(Request $request, $token = null)
    {
        return view('owner.auth.passwords.reset')->with(
            ['token' => $token, 'email' => $request->email]
        );
    }
}
