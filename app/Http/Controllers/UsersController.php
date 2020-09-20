<?php

namespace App\Http\Controllers;
use Session;
use App\User;
use Illuminate\Http\Request;
use DB;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
class UsersController extends Controller
{
    public function index(Request $request)
    {
        DB::update('update users set notify_sts = ? where notify_sts = ?',['0','1']);
    	// $users = DB::table('users')->get();
        //return view('admin.user_list', ['users' => $users]);
        $users = User::paginate(8);
    	return view('admin.user_list', compact('users'))->with('i', ($request->input('page', 1) - 1) * 8);
        //return view('admin.user_list');
        //$clients = DB::connection('mysql')->select("select * from clients");
        //dd($employee);
        //return $employee;
        //return $employee1;
        //return EmployeeList::all();//->find(2);
        //return response()->json(['success',$clients], 201);
    }
    public function store(Request $request)
    {
        $role = Auth::user()->role;
        if($role=="admin")
        {
            $client_id="0";
        }
        else{
            $client_id = Auth::user()->client_id;
        }
    	$this->Validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed'
        ]);

		$today = date("Y-m-d");
        $time = date('H:i:s');
        $user = new User([
            'client_id' => $client_id,
        	'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => bcrypt($request->get('password')),
            'email_verified_at' => $today,
            'logging_date' => $today,
            'loging_time' => $time,
            'logout_time' => $time,
            'role' => $request->get('role'),
            'status' => "1",
            'notify_sts' => "1"
        ]);
        $user->save();
        return redirect()->back()->withSuccess('One User Added');
        //return redirect()->route('admin.user_list')->with('success','One User Added');

        // return User::create([
        //     'name' => $request['name'],
        //     'email' => $request['email'],
        //     'password' => bcrypt($request['password']),
        //     'email_verified_at' => $today,
        //     'logging_date' => $today,
        //     'loging_time' => $time,
        //     'logout_time' => $time,
        //     'status' => "1"
        // ]);
    }
    public function update()
    {
        // $compaigns = DB::select("Select * from compaigns where status='0'");
        // return view('admin.tasks', ['compaigns' => $compaigns]);
        // return view('ajax_edit_user');
    }
    public function change_status(Request $request,$id)
    {
        $status="1";
        if(User::find($id)){
        $users_status = DB::select('select status from users where id = ?',[$id]);
        foreach ($users_status as $key => $value) {
            
            if($value->status == 1)
            {
                $status = '0';
            }
            if($value->status == 0)
            {
                $status = '1';
            }
        }
        
            DB::update('update users set status = ? where id = ?',[$status,$id]);
            return back()->with('success', 'Successfully updated User');
        }
    }
    public function delete($id)
    {
       if(User::find($id)){
            $user->delete($id);
            Notification::container()->success('Your account has been permanently removed from the system. Sorry to see you go!');
            return redirect()->route('admin.user_list');
        }
    }
}
