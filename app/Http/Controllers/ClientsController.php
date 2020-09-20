<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Http\Request;
use App\Customer;
use DB;
class ClientsController extends Controller
{
    public function index(Request $request)
    {
        // DB::table('clients')->where('notify_sts', 1)->update($editdata );
        DB::update('update clients set notify_sts = ? where notify_sts = ?',['0','1']);
        $clients = Customer::where('client_type','=','our')->paginate(8);
        return view('admin.clients_list', compact('clients'))->with('i', ($request->input('page', 1) - 1) * 8);

        //$clients = DB::table('clients')->get();
    	// return view('admin.clients_list', ['clients' => $clients]);
        //$clients = DB::connection('mysql')->select("select * from clients");
        //dd($employee);
        //return $employee;
        //return $employee1;
        //return EmployeeList::all();//->find(2);
        //return response()->json(['success',$clients], 201);
    }
    public function index_business(Request $request)
    {
        // DB::table('clients')->where('notify_sts', 1)->update($editdata );
        DB::update('update clients set notify_sts = ? where notify_sts = ?',['0','1']);
        $clients = Customer::where('client_type','=','business')->paginate(8);
        return view('admin.clients_list', compact('clients'))->with('i', ($request->input('page', 1) - 1) * 8);
    }
 	public function client_form()
    {
        return view('admin.add_clients');
    }
    public function show(Customer $clients)
    {
        return $clients;
    }
    public function store(Request $request)
    {
    	$this->Validate($request, [
            'client_type' => 'required',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'companyphone' => 'required|regex:/[0-9]{9}/',
            'phone' => 'required|regex:/[0-9]{9}/',
            'company' => 'required',
            'gstnumber' => 'required',
            'budget' => 'required',
            'package' => 'required',
            'startdate' => 'required',
            'end_date' => 'required',
            'contact_person_email' => 'required|string|email|unique:customers',
            'project_type' => 'required',
        ]);

		$today = date("Y-m-d");
        $time = date('H:i:s');
        $customer = new Customer([
            'client_type' => $request->get('client_type'),
        	'name' => $request->get('name'),
            'email' => $request->get('email'),
            'website' => $request->get('website'),
            'company' => $request->get('company'),
            'phone' => $request->get('companyphone'),
            'budget' => $request->get('budget'),
            'project_type' => $request->get('project_type'),
            'address' => $request->get('location'),
            'city' => $request->get('city'),
            'state' => $request->get('state'),
            'pin' => $request->get('pin'),
            'joining_date' => $today,
            'status' => "1",
            'gst_number' => $request->get('gstnumber'),
            'country' => $request->get('country'),
            'contact_person_phone' => $request->get('phone'),
            'contact_person_email' => $request->get('contact_person_email'),
            'disignation' => $request->get('disignation'),
            'package_name' => $request->get('package'),
            'pack_start_date' => $request->get('startdate'),
            'pack_end_date' => $request->get('end_date'),
            'notify_sts' => "1"

        ]);
        $clients->save();
        // return redirect()->route('admin.clients_list')->with('success','One Client Added');
        return back()->with('success', 'One Client Added');
        //$clients = Clients::create($request->all());
        /*Notification::send($employee,new MailNotification)
        {
            return $employee;
        }*/
        
        // $body = "A new Employee Added as ".$empname;
        // $message = "test message";
        // Mail::raw($body, function($message) {
        //     $message -> to('nitesh182185048@gmail.com','Kishan')->subject('Employee Information');
        //     $message -> from('nitesh182185048@gmail.com','Information Managementr Tool');
        // });
        //return response()->json(['success,Email Sent',$clients], 201);
    }
    public function update(Request $request,$id)
    {
        $name = $request->get('name');
            $email = $request->get('email');
            $website = $request->get('website');
            $company = $request->get('company');
            $companyphone = $request->get('companyphone');
            $budget = $request->get('budget');
            $project_type = $request->get('project_type');
            $address = $request->get('location');
            $city = $request->get('city');
            $state = $request->get('state');
            $pin = $request->get('pin');
            $gst_number = $request->get('gstnumber');
            $country = $request->get('country');
            $contact_person_phone = $request->get('phone');
            $contact_person_email = $request->get('personemail');
            $disignation = $request->get('disignation');
            $package_name = $request->get('package');
            $pack_start_date = $request->get('startdate');
            $pack_end_date = $request->get('end_date');
        if(Customer::find($id)){
            DB::update('update customers set gst_number=?,country=?,contact_person_phone=?,contact_person_email=?,disignation=?,package_name=?,pack_start_date=?,pack_end_date=?,name=?,phone=?,email=?,company=?,address=?,pin=?,city=?,state=?,website=?,budget=?,project_type=? where id = ?',[$gst_number,$country,$contact_person_phone,$contact_person_email,$disignation,$package_name,$pack_start_date,$pack_end_date,$name,$companyphone,$email,$company,$address,$pin,$city,$state,$website,$budget,$project_type,$id]);
            return back()->with('success', 'Successfully Updated Client Data');
        }
    }
    public function delete(Clients $clients)
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
