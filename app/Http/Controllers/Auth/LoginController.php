<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectTo () {
        switch (Auth::user()->roles->first()->name) {
            case 'admin':
                return 'A';
            break;
            case 'tutor':
                return 'T';
            break;
            case 'orientador':
                return 'OE';
            break;
            case 'tsocial':
                return 'TS';
            break;
            case 'maestro':
                return 'M';
            break;
        }
        
    }
}
