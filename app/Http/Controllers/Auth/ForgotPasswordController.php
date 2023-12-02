<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use App\Notifications\CustomResetPasswordNotification;


class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    public function sendResetLinkEmail(Request $request)
    {
        $this->validateEmail($request);

        $user = User::where('email', $request->email)->first();

        if ($user) {
            $token = $this->broker()->createToken($user);
            $userName = $user->username; // Get user's name from relationship

            $user->notify(new CustomResetPasswordNotification($token, $userName));

            return back()->with('status', 'You may have your reset password link in your email!');
        }

        return back()->withErrors(['email' => 'We may not find a user with that email address.']);
    }
}
