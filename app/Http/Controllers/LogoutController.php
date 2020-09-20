<?php

namespace App\Http\Controllers;
// namespace App\Http\Controllers\Auth;
use Session;
use App\User;
use Illuminate\Http\Request;
use DB;
class LogoutController extends Controller
{
	// $user_id = Auth::user()->id;
    
    public function logout ($user_id) {
    	
    	$user_id1 = trim($user_id,'"');
	    DB::table('users')->where('id', $user_id1)->update(['logout_time' => date("Y-m-d H:i:s")]);
	    auth()->logout();
	    return view('welcome');
	    // redirect to homepage
	    // return redirect('/');
	}
}
