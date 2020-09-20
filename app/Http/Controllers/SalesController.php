<?php
namespace App\Http\Controllers;
use Session;
use Illuminate\Http\Request;
use Auth;
use App\Sales;
use App\Customer;
use DB;
class SalesController extends Controller
{
    public function index(Request $request)
    {
    	$role = Auth::user()->role;
    	$email = Auth::user()->email;
        // DB::table('clients')->where('notify_sts', 1)->update($editdata );
        DB::update('update sales set notify_sts = ? where notify_sts = ?',['0','1']);
        $contacts = Sales::paginate(8);
        return view('admin.sales_list', compact('contacts'))->with('i', ($request->input('page', 1) - 1) * 8);
     //    $contacts = DB::table('contacts')->get();
    	// return view('admin.sales_list', ['contacts' => $contacts]);

        //$clients = DB::connection('mysql')->select("select * from clients");
        //dd($employee);
        //return $employee;
        //return $employee1;
        //return EmployeeList::all();//->find(2);
        //return response()->json(['success',$clients], 201);
    }
    public function client_sales(Request $request)
    {
        $client_id = Auth::user()->client_id;
        $email = Auth::user()->email;
        // DB::table('clients')->where('notify_sts', 1)->update($editdata );
        DB::update('update sales set notify_sts = ? where notify_sts = ?',['0','1']);
        $contacts = Sales::where('client_id','=',$client_id)->paginate(8);
        return view('admin.client_sales_list', compact('contacts'))->with('i', ($request->input('page', 1) - 1) * 8);
    }
 	public function sales_form()
    {
        return view('admin.add_sales');
    }
    public function client_sales_form()
    {
        return view('admin.add_sales_client');
    }
    
    public function store(Request $request)
    {
    	$role = Auth::user()->role;
    	$email = Auth::user()->email;
    	if($role=="admin")
    	{
    		$client_id="0";
            $company="KP Digiteers";
    	}
        else{
            $client_id = Auth::user()->client_id;
        }
    	$this->Validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|regex:/[0-9]{9}/',
            // 'budget' => 'required',
        ]);

		$today = date("Y-m-d");
        $time = date('H:i:s');
        $sales = new Sales([
        	'client_id' => $client_id,
        	'name' => $request->get('name'),
            'email' => $request->get('email'),
            'website' => "",
            'company' => "",
            'industry' => "",
            'phone' => $request->get('phone'),
            'budget' => "",
            'description' => "",
            'linkdin_profile' => "",
            'project_type' => "",
            'address' => $request->get('location'),
            'gender' => "",
            'city' => "",
            'state' => "",
            'pin' => "",
            'rating' => "",
            'joining_date' => $today,
            'project_discription' => "",
            // 'femaleRadio' => $request->get('femaleRadio'),
            // 'maleRadio' => $request->get('maleRadio'),
            'status' => "1",
            'notify_sts' => "1"
        ]);
        $sales->save();
        return redirect()->route('admin.sales_list')->with('success','One Sales Added');

    }
    public function store_client(Request $request)
    {
        $role = Auth::user()->role;
        $email = Auth::user()->email;
        $client_id = Auth::user()->client_id;
        $clients = Customer::where('id','=',$client_id)->get();
        foreach ($clients as $key => $data) {
            $company = $data->company;
        }
        
        $this->Validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|regex:/[0-9]{9}/',
            // 'company' => 'required',
            // 'budget' => 'required',
        ]);

        $today = date("Y-m-d");
        $time = date('H:i:s');
        $sales = new Sales([
            'client_id' => $client_id,
        	'name' => $request->get('name'),
            'email' => $request->get('email'),
            'website' => "",
            'company' => "",
            'industry' => "",
            'phone' => $request->get('phone'),
            'budget' => "",
            'description' => "",
            'linkdin_profile' => "",
            'project_type' => "",
            'address' => $request->get('location'),
            'gender' => "",
            'city' => "",
            'state' => "",
            'pin' => "",
            'rating' => "",
            'joining_date' => $today,
            'project_discription' => "",
            // 'femaleRadio' => $request->get('femaleRadio'),
            // 'maleRadio' => $request->get('maleRadio'),
            'status' => "1",
            'notify_sts' => "1"
        ]);
        $sales->save();
        return redirect()->route('admin.client_sales_list')->with('success','One Sales Added');
    }
    public function update(Request $request, $id)
    {
        $name = $request->get('name');
        $email = $request->get('email');
        $website = $request->get('website');
        $address = $request->get('location');
        $phone = $request->get('phone');
        $gender = $request->get('gender');
        if(Sales::find($id)){
            DB::update('update sales set name=?,phone=?,email=?,gender=?,address=? where id = ?',[$name,$phone,$email,$gender,$address,$id]);
            return back()->with('success', 'Successfully Updated Sales Data');
        }
    }
    public function delete(Sales $sales)
    {
        $clients->delete();
        return response()->json('success', 200);
    }
    
    public function send_mail(){
        $body = "A New Employee Is Added ";
        $message = "test message";
        Mail::raw($body, function($message) {
            $message -> to('nitesh182185048@gmail.com','Kishan')->subject('Employee Information');
            $message -> from('nitesh182185048@gmail.com','Information Managementr Tool');
        });
    }
    
    public function send_message(){
        $message = "One New Employee Aded";
        //dd($message);
        //$username = "two-t";
        //$password = "viewsonic86";
        $encodemessage = urlencode($message);
        
        $mobile = '6360458959';//ganesh
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,"http://smsreachout.in/api/sendmsg.php");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS,"user=two-t&pass=viewsonic86&sender=TTTECH&phone=".$mobile."&text=".$message."&priority=ndnd&stype=normal");
        curl_exec($ch);
        $status_from_curl = curl_getinfo($ch, CURLINFO_HTTP_CODE);  
        //curl_close($ch);
        //$output = curl_exec($ch);
        if(curl_errno($ch))
        {
            return curl_error($ch);
        }
        //dd('Message  Sent Successfully',$message);
        curl_close($ch);
        
    }//
}
