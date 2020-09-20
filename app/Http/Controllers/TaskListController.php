<?php
// use Session;
namespace App\Http\Controllers;
use App\Campaign;
use Illuminate\Http\Request;
use DB;

class TaskListController extends Controller
{
    public function index(Request $request,$client_id)
    {
    	//$compaigns = DB::table('compaigns')->get();
        DB::update('update campaigns set notify_sts_user = ? where notify_sts_user = ?',['0','1']);
    	$client_id1 = trim($client_id,'[]');
        $compaigns = Campaign::where('contact_person_id','=','client_id1')->paginate(8);
        return view('admin.task_list', compact('compaigns'))->with('i', ($request->input('page', 1) - 1) * 8);

    	// $compaigns = DB::select("Select * from compaigns where `contact_person_id` = '$client_id1'");
    	// return view('admin.task_list', ['compaigns' => $compaigns]);

        //return view('admin.user_list');
        //$clients = DB::connection('mysql')->select("select * from clients");
        //dd($employee);
        //return $employee;
        //return $employee1;
        //return EmployeeList::all();//->find(2);
        //return response()->json(['success',$clients], 201);
    }
    public function pending(Request $request,$client_id)
    {
    	$client_id1 = trim($client_id,'[]');
        $compaigns = Campaign::where('contact_person_id','=','client_id1')->where('status','=','1')->paginate(8);
        return view('admin.task_list', compact('compaigns'))->with('i', ($request->input('page', 1) - 1) * 8);
    	// $compaigns = DB::select("Select * from compaigns where status='1' and `contact_person_id` = '$client_id1'");
    	// return view('admin.task_list', ['compaigns' => $compaigns]);
    }
    public function completed(Request $request,$client_id)
    {
    	$client_id1 = trim($client_id,'[]');
        $compaigns = Campaign::where('contact_person_id','=','client_id1')->where('status','=','0')->paginate(8);
        return view('admin.task_list', compact('compaigns'))->with('i', ($request->input('page', 1) - 1) * 8);
    	// $compaigns = DB::select("Select * from compaigns where status='0' and `contact_person_id` = '$client_id1'");
    	// return view('admin.task_list', ['compaigns' => $compaigns]);
    }
    public function delete()
    {
        // $compaigns = DB::select("Select * from compaigns where status='0'");
        // return view('admin.tasks', ['compaigns' => $compaigns]);
    }
}
