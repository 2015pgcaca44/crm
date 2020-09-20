<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Http\Request;
use DB;
use Auth;
use App\Http\Controllers\Controller;
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
    function authenticated(Request $request, $user)
    {
         if ($user->status != 1) {
            Auth::logout();
            return redirect(route('login'))->with('success', 'credential does not match !!');
        }
        $user->update([
            'email_verified_at' => date("Y-m-d H:i:s")
            // 'logout_time' => date("H:i:s"),
            // 'loging_time' => date("H:i:s")
        ]);
    }
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // 
    // public function logout_user($user_id)
    // {
    //     dd($user_id);
    //     DB::table('users')->where('id', $user_id)->update('logout_time',date("Y-m-d H:i:s"));
    //     $user->update([
    //         'logout_time' => date("Y-m-d H:i:s")
    //     ]);
    //     Auth::logout();
    // }
    public function __construct()
    {
        
        $this->middleware('guest')->except('logout');
    }
}
