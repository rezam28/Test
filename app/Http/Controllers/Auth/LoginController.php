<?php

namespace App\Http\Controllers\Auth;

use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

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
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */

     public function username()
    {
        return 'username';
    }

    public function login(Request $request)
    {
        if(Auth::attempt($request->only('username','password'))){
            if (auth()->user()->status == 'admin') {
                return redirect('/admin');
            }elseif (auth()->user()->status == 'customer') {
                return redirect('/');
            }return redirect('/login');
        }

        // if (Auth::guard('admin')->attempt(['username' => $request->username, 'password' => $request->password], $request->remember)) {
        //     // if successful, then redirect to their intended location
        //     return redirect('/admin');
        //   }elseif(Auth::guard('user')->attempt(['username' => $request->username, 'password' => $request->password], $request->remember)) {
        //     // if successful, then redirect to their intended location
        //     return redirect('/customer');
        //   }
    }

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
