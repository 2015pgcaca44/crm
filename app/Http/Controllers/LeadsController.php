<?php

namespace App\Http\Controllers;
use Session;
use App\Campaign;
use Illuminate\Http\Request;
use Excel;
use DB;
use Auth;

class LeadsController extends Controller
{
    public function index(Request $request)
    {
        $role = Auth::user()->role;
        if($role=="admin")
        {
            DB::update('update campaigns set notify_status = ? where notify_status = ?',['0','1']);
        	// $compaigns = Campaign::where('lead_type','=','our')->get();
        	// return view('admin.leads_admin', ['compaigns' => $compaigns]);
            $compaigns = Campaign::where('lead_type','=','our')->paginate(4);
            return view('admin.leads_admin', compact('compaigns'))->with('i', ($request->input('page', 1) - 1) * 4);
            
            // return $view->with(compact('persons', 'ms'));
            //return view('admin.user_list');
            //$clients = DB::connection('mysql')->select("select * from clients");
            //dd($employee);
            //return $employee;
            //return $employee1;
            //return EmployeeList::all();//->find(2);
            //return response()->json(['success',$clients], 201);
        }else{
            $client_id = Auth::user()->client_id;
            DB::update('update campaigns set notify_status = ? where notify_status = ?',['0','1']);
            // $compaigns = DB::table('campaigns')->get();
            // return view('admin.leads_admin', ['compaigns' => $compaigns]);
            $compaigns = Campaign::where('client_id','=',$client_id)->paginate(8);
            return view('admin.leads_admin', compact('compaigns'))->with('i', ($request->input('page', 1) - 1) * 8);
        }
    }
    public function index_business(Request $request)
    {
        DB::update('update campaigns set notify_status = ? where notify_status = ?',['0','1']);
        // $compaigns = DB::table('compaigns')->get();
        // return view('admin.leads_admin', ['compaigns' => $compaigns]);
        $compaigns = Campaign::where('lead_type','=','business')->paginate(4);
        return view('admin.leads_admin', compact('compaigns'))->with('i', ($request->input('page', 1) - 1) * 4);
    }

    public function client_leads(Request $request)
    {
        $client_id = Auth::user()->client_id;
        DB::update('update campaigns set notify_status = ? where notify_status = ?',['0','1']);
        // $compaigns = DB::table('compaigns')->get();
        // return view('admin.leads_admin', ['compaigns' => $compaigns]);
        $compaigns = Campaign::where('client_id','=',$client_id)->paginate(8);

        return view('admin.leads_clients', compact('compaigns'))->with('i', ($request->input('page', 1) - 1) * 8);
    }
    function store(Request $request)
    {
        $this->Validate($request, [
            'adset_name' => 'required',
            'campaign_name' => 'required',
            'form_name' => 'required',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|regex:/[0-9]{9}/',
        ]);

        $today = date("Y-m-d");
        $time = date('H:i:s');
        $campaign = new Campaign([
            "client_id"  => 0,
            'contact_person_id' => "1",
            "lead_type"  => "our",
            "cust_id"  => "",
            "created_time"   =>$today,
            "ad_id"   =>"",
            "ad_name"    => "",
            "adset_id"  => "",
            "adset_name"   => $request->get('adset_name'),
            "campaign_id"   => "",
            "campaign_name"   => $request->get('campaign_name'),
            "form_id"   => "",
            "form_name"   =>$request->get('form_name'),
            // "is_organic"   => $filedata[10],
            "contact_via"   => $request->get('platform'),
            "prospect_name"   => $request->get('name'),
            "location"   => $request->get('location'),
            "topic_on"   => $request->get('enquiry'),
            "contact_date" => "",
            "contact_time"=>"",
            "discription"=>"",
            "budget" => $request->get('budget'),
            "start_date"=>"",
            "end_date"=>"",
            "notify_status"=>"1",
            "recieved_amount"=>"",
            "status" => "1",
            "notify_sts_user" => "1",
            'is_organic'=> "",
            'phone_number' => $request->get('phone'),
            'project_start_date' => $request->get('startdate'),
            'possession_time' => $request->get('possasiontime'),
            'email' => $request->get('email')

        ]);
        $campaign->save();
        // return redirect()->route('admin.clients_list')->with('success','One Client Added');
        return back()->with('success', 'One lead Added');
    }
    function import(Request $request)
    {
        $insertData ="";$count="";
        // $file = Input::file('photo');
        $client_id = $request->get('client');
        if($client_id =="0")
        {
            $lead_type = "our";
            $contact_person_id = "";
        }
        else{
            $lead_type = "business";
            $contact_person_id = "";
        }
        $file = $request->file('select_file');
        // dd($file);
      // File Details 
      $filename = $file->getClientOriginalName();
      $extension = $file->getClientOriginalExtension();
      $tempPath = $file->getRealPath();
      $fileSize = $file->getSize();
      $mimeType = $file->getMimeType();
      $filename = $filename;
      $valid_extension = array("csv");
      if(!$valid_extension)
      {
        return back()->with('message', 'Please select CSV file only.');
      }
      
      $maxFileSize = 2097152; 

      if(in_array(strtolower($extension),$valid_extension)){

        if($fileSize <= $maxFileSize){

          $location = 'uploads';

          $file->move($location,$filename);

          $filepath = public_path($location."/".$filename);

          $file = fopen($filepath,"r");

          $importData_arr = array();
          $i = 0;

          while (($filedata = fgetcsv($file, 1000, ",")) !== FALSE) {
             // $num = count($filedata);
                $count++;
             if($count > 1)
            {
             
            $clients = Campaign::create([
                "client_id"  => $client_id,
                'contact_person_id' => "1",
                 "lead_type"  => $lead_type,
                 "cust_id"  => $filedata[0],
                 "created_time"   =>$filedata[1],
                 "ad_id"   =>$filedata[2],
                 "ad_name"    => $filedata[3],
                 "adset_id"  => $filedata[4],
                 "adset_name"   => $filedata[5],
                 "campaign_id"   => $filedata[6],
                 "campaign_name"   => $filedata[7],
                 "form_id"   => $filedata[8],
                 "form_name"   =>$filedata[9],
                 // "is_organic"   => $filedata[10],
                 "contact_via"   => $filedata[11],
                 "prospect_name"   => $filedata[12],
                 // "email"   => $importData[13],
                 // "phone"   => $importData[14],
                 "location"   => $filedata[15],
                 "topic_on"   => $filedata[16],
                 
                 "contact_date" => "",
                 "contact_time"=>"",
                 "discription"=>"",
                 "budget" => $filedata[17],
                 "start_date"=>"",
                 "end_date"=>"",
                 "notify_status"=>"1",
                 "recieved_amount"=>"",
                 "status" => "1",
                 "notify_sts_user" => "1",
                 'is_organic'=> $filedata[10],
                 'phone_number' => $filedata[14],
                 'project_start_date' => $filedata[18],
                 'possession_time' => $filedata[19],
                 'email' => $filedata[13]
             ]);
            $clients->save();
            // Campaign::insert($insert_data);
            // DB::table('campaigns')->insert($insert_data);
            }
          }

}
          fclose($file);
          Session::flash('message','Import Successful.');
        }else{
          Session::flash('message','File too large. File must be less than 2MB.');
        }

      // }else{
      //    Session::flash('message','Invalid File Extension.');
      // }

    // }
      // return view('admin.leads_admin');
    // Redirect to index
    return back()->with('success', 'Excel Data Imported successfully.');
//      $this->validate($request, [
//       // 'select_file'  => 'required|mimes:xls,xlsx,csv',
//         'select_file'  => 'required',
//      ]);
//      // $clients = new Clients([
//      //        $client = $request->get('client_id');
//      //    }
//      // if($client == "0")
//      // {
//      //    $lead_type = "our";
//      //    $contact_person_id = "1";
//      // }else
//      // {
//      //    $lead_type = "business";
//      //    $contact_person_id = "1";
//      // }
//      $path = $request->file('select_file')->getRealPath();

//      $data = Excel::load($path)->get();

//      if($data->count() > 0)
//      {
//       foreach($data->toArray() as $key => $value)
//       {
//         // $arr[] = ['client_id'  => 1, 'contact_person_id' => 1,'lead_type'  => 'our','cust_id'  => $value->cust_id, 'created_time'   => $value->created_time, 'ad_id' => $value->ad_id, 'ad_name' => $value->ad_name, 'adset_id' => $value->adset_id, 'campaign_id' => $value->campaign_id, 'campaign_name' => $value->campaign_name, 'form_id' => $value->form_id, 'form_name' => $value->form_name, 'is_organic' => $value->is_organic,'contact_via' => $value->platform, 'prospect_name' => $value->full_name, 'email' => $value->email,'phone' => $value->phone_number, 'location' => $value->location, 'topic_on' => $value->enquiry_for,'status' => 1, 'notify_sts_user' => 1];
//        // foreach($value as $row)
//        // {
//         // return print_r($value);
//         // dd($value);
        
//         $insert_data = array(
//         // $insert_data = new Campaign([
//          'client_id'  => "1",
//          // 'contact_person_id' => "1",
//          'lead_type'  => "our",
//          'cust_id'  => $value[0],
//          'created_time'   => $value[1],
//          'ad_id'   => $value[2],
//          'ad_name'    => $value[3],
//          'adset_id'  => $value[4],
//          'adset_name'   => $value[5],
//          'campaign_id'   => $value[6],
//          'campaign_name'   => $value[7],
//          'form_id'   => $value[8],
//          'form_name'   => $value[9],
//          'is_organic'   => $value[10],
//          'contact_via'   => $value[11],
//          'prospect_name'   => $value[12],
//          'email'   => $value[13],
//          'phone'   => $value[14],
//          'location'   => $value[15],
//          'topic_on'   => $value[16],
//          'status' => "1",
//          'notify_sts_user' => "1",
//         );
//        // }
//       }
// dd($insert_data);
//       if(!empty($insert_data))
//       {
//         // $insert_data->save();
//        DB::table('campaigns')->insert($insert_data);
//       }
//       // if(!empty($arr)){
//       //       DB::table('compaigns')->insert($arr);
//       //   }
//      }
//      return back()->with('success', 'Excel Data Imported successfully.');
    }

    public function showleads()
    {
        $compaigns = Campaign::where('status','=','1')->paginate(8);
        return view('admin.leads_user', compact('compaigns'))->with('i', ($request->input('page', 1) - 1) * 8);
    	// $compaigns = DB::select("Select * from compaigns where status='1'");
    	// return view('admin.leads_user', ['compaigns' => $compaigns]);
    }

    public function indexuser(Request $request,$client_id)
    {
        DB::update('update campaigns set notify_sts_user = ? where notify_sts_user = ?',['0','1']);
    	$client_id1 = trim($client_id,'[]');
        $compaigns = Campaign::where('contact_person_id','=','client_id1')->paginate(8);
        return view('admin.leads_user', compact('compaigns'))->with('i', ($request->input('page', 1) - 1) * 8);
    	// $compaigns = DB::select("Select * from compaigns where `contact_person_id` = '$client_id1'");
    	// return view('admin.leads_user', ['compaigns' => $compaigns]);
    }

    public function delete()
    {
        // $compaigns = DB::select("Select * from compaigns where status='0'");
        // return view('admin.tasks', ['compaigns' => $compaigns]);
    }

    public function fblogin()
    {
        // $fb = new Facebook\Facebook([
        //   'app_id' => '487172695170020', // Replace {app-id} with your app id
        //   'app_secret' => 'f7ed720a6aa45dcc5dcf91ebd46180d9',
        //   'default_graph_version' => 'v3.2',
        // ]);

        // $helper = $fb->getRedirectLoginHelper();

        // $permissions = ['email']; // Optional permissions
        // $loginUrl = $helper->getLoginUrl('https://example.com/fb-callback.php', $permissions);

        // echo '<a href="' . htmlspecialchars($loginUrl) . '">Log in with Facebook!</a>';
    }
    public function fbcallback()
    {
        // $fb = new Facebook\Facebook([
        //   'app_id' => '487172695170020', // Replace {app-id} with your app id
        //   'app_secret' => 'f7ed720a6aa45dcc5dcf91ebd46180d9',
        //   'default_graph_version' => 'v3.2',
        //   ]);

        // $helper = $fb->getRedirectLoginHelper();

        // try {
        //   $accessToken = $helper->getAccessToken();
        // } catch(Facebook\Exceptions\FacebookResponseException $e) {
        //   // When Graph returns an error
        //   echo 'Graph returned an error: ' . $e->getMessage();
        //   exit;
        // } catch(Facebook\Exceptions\FacebookSDKException $e) {
        //   // When validation fails or other local issues
        //   echo 'Facebook SDK returned an error: ' . $e->getMessage();
        //   exit;
        // }

        // if (! isset($accessToken)) {
        //   if ($helper->getError()) {
        //     header('HTTP/1.0 401 Unauthorized');
        //     echo "Error: " . $helper->getError() . "\n";
        //     echo "Error Code: " . $helper->getErrorCode() . "\n";
        //     echo "Error Reason: " . $helper->getErrorReason() . "\n";
        //     echo "Error Description: " . $helper->getErrorDescription() . "\n";
        //   } else {
        //     header('HTTP/1.0 400 Bad Request');
        //     echo 'Bad request';
        //   }
        //   exit;
        // }

        // // Logged in
        // echo '<h3>Access Token</h3>';
        // var_dump($accessToken->getValue());

        // // The OAuth 2.0 client handler helps us manage access tokens
        // $oAuth2Client = $fb->getOAuth2Client();

        // // Get the access token metadata from /debug_token
        // $tokenMetadata = $oAuth2Client->debugToken($accessToken);
        // echo '<h3>Metadata</h3>';
        // var_dump($tokenMetadata);

        // // Validation (these will throw FacebookSDKException's when they fail)
        // $tokenMetadata->validateAppId('487172695170020'); // Replace {app-id} with your app id
        // // If you know the user ID this access token belongs to, you can validate it here
        // //$tokenMetadata->validateUserId('123');
        // $tokenMetadata->validateExpiration();

        // if (! $accessToken->isLongLived()) {
        //   // Exchanges a short-lived access token for a long-lived one
        //   try {
        //     $accessToken = $oAuth2Client->getLongLivedAccessToken($accessToken);
        //   } catch (Facebook\Exceptions\FacebookSDKException $e) {
        //     echo "<p>Error getting long-lived access token: " . $e->getMessage() . "</p>\n\n";
        //     exit;
        //   }

        //   echo '<h3>Long-lived</h3>';
        //   var_dump($accessToken->getValue());
        // }

        // $_SESSION['fb_access_token'] = (string) $accessToken;

        // User is logged in with a long-lived access token.
        // You can redirect them to a members-only page.
        //header('Location: https://example.com/members.php');
    }

    public function leadgen()
    {
        // $compaigns = DB::select("Select * from compaigns where status='0'");
        // return view('admin.tasks', ['compaigns' => $compaigns]);
    }

    public function fbprofile()
    {
        // $compaigns = DB::select("Select * from compaigns where status='0'");
        // return view('admin.tasks', ['compaigns' => $compaigns]);
    }
}
?>