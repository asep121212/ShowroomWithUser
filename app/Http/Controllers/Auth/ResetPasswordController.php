<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;

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
    // protected $redirectTo = '/dashboard';

    protected function redirectTo()
    {
        // Check apakah user memiliki role admin
        if (auth()->user()->is_admin) {
            // Jika user adalah admin, arahkan ke dashboard
            return '/dashboard';
        } else {
            // Jika bukan, arahkan ke welcome
            return '/';
        }
    }
}
