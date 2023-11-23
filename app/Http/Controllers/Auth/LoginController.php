<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;
    // public function authenticated() {
    //     if (Auth::user()->roles == '1') {
    //         return redirect('admin/dashboard')->with('message','Welcome to dashboard');
    //     } else if(Auth::user()->roles == '2') {
    //         return redirect('/')->with('status', 'Login social account successfully');
    //     } else {
    //         return redirect('/')->with('status','Login successfully logged in');
    //     }
    // }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $input = $request->all();

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if(auth()->attempt(array('email' => $input['email'], 'password' => $input['password'])))
        {
            if (auth()->user()->roles == 'admin')
            {
                return redirect()->route('admin.home');
            }
            else if (auth()->user()->roles == 's_user')
            {
                return redirect()->route('s.home');
            }
            else
            {
                return redirect()->route('home');
            }
        }
        else
        {
            return redirect()
            ->route('login')
            ->with('error','Incorrect email or password!.');
        }
    }
}
