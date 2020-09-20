<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Http\Request;
use App\Campaign;
use App\Sales;
use DB;
use Auth;
use Redirect;
class TasksController extends Controller
{
  	public function index(Request $request)
    {
        
        if($request->ajax()){
        
        $count=0;$compaigns=""; $product="";
        $products = Sales::where('name','LIKE','%'.$request->search."%")->get();
        //print_r($products);
        if($products){
           foreach ($products as  $product) {
           $tasks = Campaign::where('contact_person_id','=',$product->id)->paginate(8);
           foreach ($tasks as  $compaign) {
            $count++;
            $compaigns.='<tr class="w3-hover-pale-green">'.

            '<td>'.$count.'</td>'.
            '<td>'.$product->name.'</td>'.
            '<td>'.$compaign->prospect_name.'</td>'.
            '<td>'.$compaign->contact_via.'</td>'.
            '<td>'.$compaign->phone_number.'</td>'.
            '<td>'.$compaign->email.'</td>'.
            '<td>'.$compaign->start_date.'</td>'.
            '<td>'.$compaign->end_date.'</td>'.
            '<td>'.$compaign->budget.'</td>'.
            '<td>'.$compaign->discription.'</td>';
           
                if($compaign->status == "1"){
                    $status = "Pending";
                    $compaigns.= '<td style="color:red">'.$status.'</td>';
                }
                elseif ($compaign->status == "0") {
                    $status = "Completed";
                    $compaigns.= '<td style="color:green">'.$status.'</td>';
                }
            $compaigns.= '<td style="padding-left: 20px;"><a href="#{{ $id }}" class="btn btn-sm pull-right" data-toggle="modal" id="modal-edit" ><img class="pull-left" src="./images/edit_icon1.png" height="20px;" width="20px;"></a></td>
                  
                  <td><a onclick="delete_fun(@php echo $id @endphp);"><img class="pull-left" src="./images/delete.png" height="20px;" width="20px;" style="margin-right: 10px;"></a></td>';       
            $compaigns.= '</tr>';
        
            }
            }
            return $compaigns;
        }
        
    }else{

            DB::update('update customers set notify_sts = ? where notify_sts = ?',['0','1']);
            $compaigns = Sales::paginate(8);
            return view('admin.tasks', compact('compaigns'))->with('i', ($request->input('page', 1) - 1) * 8);
        }
        // return view('admin.tasks', compact('compaigns'))->with('i', ($request->input('page', 1) - 1) * 8);
    	// $compaigns = DB::table('compaigns')->get();
    	// return view('admin.tasks', ['compaigns' => $compaigns]);
        //return view('admin.user_list');
        //$clients = DB::connection('mysql')->select("select * from clients");
        //dd($employee);
        //return $employee;
        //return $employee1;
        //return EmployeeList::all();//->find(2);
        //return response()->json(['success',$clients], 201);
    }
    public function get_sales_task(Request $request)
    {
        $sales_name = $request->get('id');dd($sales_name);
    }
    public function store(Request $request)
    {
        
        
    }
    public function pending(Request $request)
    {
        if($request->ajax()){
   
        $count=0;$compaigns="";$product="";
        $products = Sales::where('name','LIKE','%'.$request->search."%")->get();
        if($products){
           foreach ($products as  $product) {
           $tasks = Campaign::where('contact_person_id','=',$product->id)->paginate(8);
           foreach ($tasks as  $compaign) {
            $count++;
            $compaigns.='<tr class="w3-hover-pale-green">'.
            
            '<td>'.$count.'</td>'.
            '<td>'.$product->name.'</td>'.
            '<td>'.$compaign->prospect_name.'</td>'.
            '<td>'.$compaign->contact_via.'</td>'.
            '<td>'.$compaign->phone_number.'</td>'.
            '<td>'.$compaign->email.'</td>'.
            '<td>'.$compaign->start_date.'</td>'.
            '<td>'.$compaign->end_date.'</td>'.
            '<td>'.$compaign->budget.'</td>'.
            '<td>'.$compaign->discription.'</td>';
            if($compaign->status == "1"){
                    $status = "Pending";
                    $compaigns.= '<td style="color:red">'.$status.'</td>';
                }
                elseif ($compaign->status == "0") {
                    $status = "Completed";
                    $compaigns.= '<td style="color:green">'.$status.'</td>';
                }
            $compaigns.= '<td style="padding-left: 20px;"><a href="#{{ $id }}" class="btn btn-sm pull-right" data-toggle="modal" id="modal-edit" ><img class="pull-left" src="./images/edit_icon1.png" height="20px;" width="20px;"></a></td>
                  
                  <td><a onclick="delete_fun(@php echo $id @endphp);"><img class="pull-left" src="./images/delete.png" height="20px;" width="20px;" style="margin-right: 10px;"></a></td>';       
            $compaigns.= '</tr>';
        
            }
            }
            
            return $compaigns;
        }
        // $compaigns = view('admin.tasks')->with('compaign',$compaign)->render();
        // return response()->json(array('success'=>true, 'html'=>$returnHTML));
    }else{
        $compaigns = Sales::where('status','=','1')->paginate(8);
        return view('admin.tasks', compact('compaigns'))->with('i', ($request->input('page', 1) - 1) * 10);
    }
        // $compaigns = DB::table('compaigns')->where('status','=','1')->get()->paginate(10);
    	// $compaigns = DB::select("Select * from compaigns where status='1'");
    }
    public function completed(Request $request)
    {
        if($request->ajax()){
   
        $count=0;$compaigns="";$product="";
        $products = Sales::where('name','LIKE','%'.$request->search."%")->get();
        if($products){
           foreach ($products as  $product) {
           $tasks = Campaign::where('contact_person_id','=',$product->id)->paginate(8);
           foreach ($tasks as  $compaign) {
            $count++;
            $compaigns.='<tr class="w3-hover-pale-green">'.
            
            '<td>'.$count.'</td>'.
            '<td>'.$product->name.'</td>'.
            '<td>'.$compaign->prospect_name.'</td>'.
            '<td>'.$compaign->contact_via.'</td>'.
            '<td>'.$compaign->phone_number.'</td>'.
            '<td>'.$compaign->email.'</td>'.
            '<td>'.$compaign->start_date.'</td>'.
            '<td>'.$compaign->end_date.'</td>'.
            '<td>'.$compaign->budget.'</td>'.
            '<td>'.$compaign->discription.'</td>';
            if($compaign->status == "1"){
                    $status = "Pending";
                    $compaigns.= '<td style="color:red">'.$status.'</td>';
                }
                elseif ($compaign->status == "0") {
                    $status = "Completed";
                    $compaigns.= '<td style="color:green">'.$status.'</td>';
                }
            $compaigns.= '<td style="padding-left: 20px;"><a href="#{{ $id }}" class="btn btn-sm pull-right" data-toggle="modal" id="modal-edit" ><img class="pull-left" src="./images/edit_icon1.png" height="20px;" width="20px;"></a></td>
                  
                  <td><a onclick="delete_fun(@php echo $id @endphp);"><img class="pull-left" src="./images/delete.png" height="20px;" width="20px;" style="margin-right: 10px;"></a></td>';       
            $compaigns.= '</tr>';
        
            }
            }
            return $compaigns;
        }
        // $compaigns = view('admin.tasks')->with('compaign',$compaign)->render();
        // return response()->json(array('success'=>true, 'html'=>$returnHTML));
    }else{
        $compaigns = Sales::where('status','=','0')->paginate(8);
        return view('admin.tasks', compact('compaigns'))->with('i', ($request->input('page', 1) - 1) * 10);
    }
        // $compaigns = DB::table('compaigns')->where('status','=','0')->get()->paginate(10);
    	// $compaigns = DB::select("Select * from compaigns where status='0'");
    }
    public function update(Request $request)
    {
        $today = date("Y-m-d");
        $time = date('H:i:s');
        $id = $request->get('leads_name');
        $tasks = new Campaign([
            // 'sales_name' => $request->get('sales_name'),
            'prospect_name' => $request->get('leads_name'),
            'contact_via' => $request->get('sources'),
            // 'linkdin' => $request->get('linkdin'),
            // 'phone' => $request->get('phone'),
            'budget' => $request->get('budget'),
            'description' => $request->get('description'),
            'start_date' => $request->get('start_date'),
            'end_date' => $request->get('end_date'),
            'recieved_amount' => $request->get('approved_amount'),
            'status' => "1",
            'notify_sts' =>"1"
        ]);
        DB::table('campaigns')->where('id', $id)->update([
            'budget' => $request->get('budget'),
            'discription' => $request->get('description'),
            'start_date' => $request->get('start_date'),
            'end_date' => $request->get('end_date'),
            'recieved_amount' => $request->get('approved_amount'),
        ]);
        // $tasks->update();
        Session::flash('success', "One task Added");
        return Redirect::back();
    }
    public function assign_task_index(Request $request)
    {
       $compaigns = Campaign::where('client_id','=',0)->paginate(8);
            return view('admin.get_assign_task', compact('compaigns'))->with('i', ($request->input('page', 1) - 1) * 8);
    }
    public function assign_task(Request $request)
    {
        $count=0;
        $campaign_id = $request->get('campaign_id');
        foreach ($campaign_id as $key1 => $value) {
            $sales_id = $request->get('sales_id');
            foreach ($sales_id as $key2 => $data) {
                $count++;
                if ($key1 == $key2) {
                    DB::update('update campaigns set contact_person_id = ? where id = ?',[$data,$value]);
                }
            }
        }
        return back()->with('success', 'task assigned');
    }
    public function delete()
    {
        // $compaigns = DB::select("Select * from compaigns where status='0'");
        // return view('admin.tasks', ['compaigns' => $compaigns]);
    }

    public function search(Request $request) {
        if($request->ajax()){
   
        $output="";$count=0;
        $products = Sales::where('name','LIKE','%'.$request->search."%")->get();
        
        if($products){
     
           foreach ($products as  $product) {
           $compaigns = Campaign::where('contact_person_id','=',$product->id)->paginate(8);
           foreach ($compaigns as  $compaign) {
            $count++;
            $output.='<tr class="w3-hover-pale-green">'.
            
            '<td>'.$count.'</td>'.
            '<td>'.$product->name.'</td>'.
            '<td>'.$compaign->prospect_name.'</td>'.
            '<td>'.$compaign->contact_via.'</td>'.
            '<td>'.$compaign->phone_number.'</td>'.
            '<td>'.$compaign->email.'</td>'.
            '<td>'.$compaign->start_date.'</td>'.
            '<td>'.$compaign->end_date.'</td>'.
            '<td>'.$compaign->budget.'</td>'.
            '<td>'.$compaign->discription.'</td>'.
            
            '</tr>';
        
           }
       }
           return $output;  
        }
  
      }else{
 
       }
        
    }

    //////////cleints tasks////////////////////

    public function client_tasks(Request $request)
    {
        $client_id = Auth::user()->client_id;
        DB::update('update clients set notify_sts = ? where notify_sts = ?',['0','1']);
        $compaigns = Campaign::where('client_id','=',$client_id)->paginate(8);
        return view('admin.client_tasks', compact('compaigns'))->with('i', ($request->input('page', 1) - 1) * 8);
    }

    public function client_tasks_pending(Request $request)
    {
        $client_id = Auth::user()->client_id;
        $compaigns = Campaign::where('status','=','1')->where('client_id','=',$client_id)->paginate(8);
        return view('admin.client_tasks', compact('compaigns'))->with('i', ($request->input('page', 1) - 1) * 10);
        // $compaigns = DB::table('compaigns')->where('status','=','1')->get()->paginate(10);
        // $compaigns = DB::select("Select * from compaigns where status='1'");
    }

    public function client_tasks_completed(Request $request)
    {
        $client_id = Auth::user()->client_id;
        $compaigns = Campaign::where('status','=','0')->where('client_id','=',$client_id)->paginate(8);
        return view('admin.client_tasks', compact('compaigns'))->with('i', ($request->input('page', 1) - 1) * 10);
        // $compaigns = DB::table('compaigns')->where('status','=','0')->get()->paginate(10);
        // $compaigns = DB::select("Select * from compaigns where status='0'");
    }
}
