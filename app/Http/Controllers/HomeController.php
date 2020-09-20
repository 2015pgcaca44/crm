<?php

namespace App\Http\Controllers;
use session;
use Illuminate\Http\Request;
use ConsoleTVs\Charts\Facades\Charts;
use Carbon\Carbon;
use App\Campaign;
use App\Sales;
use App\Customer;
use App\User;
use Auth;
// use Charts;
use DB;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Count = 0;$clients_id=0;
        $dt = Carbon::now()->year;
        $role = Auth::user()->role;
        $email = Auth::user()->email;
        
        
        if($role == 'admin')
        {
            // $clients = DB::table("clients")->select('id')->where('email','=' , $email)->first();
            // $clients_id = $clients->id;
            $Compaign_list = DB::table('campaigns')->get();
            $client_list = DB::table('customers')->where('status','=','1')->get();
            $totalleads = Campaign::count();
            $totalsales = Sales::count();
            // $compaign = Campaign::where(DB::raw("(DATE_FORMAT(contact_date,'%Y'))"),date('Y'))->get();
            // $compaigns_jan = DB::table('compaigns')->whereYear('created_at', $dt)->whereMonth('created_at', '1')->count();
            // $compaigns_feb = DB::table('compaigns')->whereYear('created_at', $dt)->whereMonth('created_at', '2')->count();
            // $compaigns_mar = DB::table('compaigns')->whereYear('created_at', $dt)->whereMonth('created_at', '3')->count();
            
            $compaign = Campaign::where("created_at",">", Carbon::now()->subMonths(6))->get();
            $clients_report = Customer::where("created_at",">", Carbon::now()->subMonths(6))->get();
            $compaignCount = $compaign->count();
            $chart = Charts::database($compaign, 'area', 'highcharts')
                    ->title(" ")
                    // ->elementLabel("Total Campaign")
                    // ->dimensions(500, 200)
                    ->responsive(true)
                    ->lastByMonth(6, true);
                    // ->groupByMonth(date('Y'), false);

            // $clients = Clients::where(DB::raw("(DATE_FORMAT(id,'%Y'))"),date('Y'))->get();
            $totalclients = Customer::where('status','=','1')->count();
            $pie = Charts::database($compaign, 'pie', 'highcharts')
                    ->title(" ")
                    // ->showInLegend(true)
                    // ->labels(['First', 'Second', 'Third','four','five','six','seven','eight'])
                    // ->values([5,10,20,10,20,30,15,20])
                    // ->colors(['red', 'green', 'blue','yellow','magenta','pink','purple','orange'])
                    ->dimensions(500, 200)
                    ->responsive(true)
                    ->lastByMonth(6, true);
                    // ->groupByMonth(date('Y'), false);

            $line = Charts::database($clients_report, 'line', 'highcharts')
                    ->title(" ")
                    // ->elementLabel("Total Campaign")
                    ->dimensions(500, 200)
                    ->responsive(true)
                    ->lastByMonth(6, true);
                    // ->groupByMonth(date('Y'), false);

            $convertedleads = Campaign::where('status','=','0')->count();
            // $donut2 = Charts::database($compaign, 'donut', 'highcharts')
            $hold_leads = Campaign::where("created_at",">", Carbon::now()->subMonths(6))->where('status','=','0')->get();
            $donut2 = Charts::database($hold_leads,'donut', 'highcharts')
                    ->title(" ")
                    // ->labels(false)
                    // ->values([40,20,10,30,50,25])
                    // ->elementLabel("Total Leads")
                    ->dimensions(500, 490)
                    ->responsive(true)
                    ->lastByMonth(6, true);

            $products = Campaign::where("created_at",">", Carbon::now()->subMonths(6))->get();
            $chart1 = Charts::database($products, 'bar', 'highcharts')
                      ->title(" ")
                      ->elementLabel("Total Products")
                      ->dimensions(500, 200)
                      ->responsive(true)
                      ->lastByMonth(6, true);
                      // ->groupByMonth(date('Y'), true);

            $products1="";$compaign1="";$converted_leads_monthly1 ="";$months = "";$months1 = "";
            foreach ($compaign as $value) {
                $compaign1 .= $value->id.",";
            }
            // dd($compaign1);
            foreach ($products as $value1) {
                $products1 .= $value->contact_person_id.",";

            }
            // dd($products1);
            $converted_leads_monthly = Campaign::where("created_at",">", Carbon::now()->subMonths(6))->where('status','=','1')->get();
            foreach ($converted_leads_monthly as $value2) {
                $converted_leads_monthly1 .= $value->contact_person_id.",";

            }
            for ($j = 5; $j >= 0; $j--) {
                $months1 .= "'".date("M y", strtotime(" -$j month"))."',";
            }
            $months = rtrim($months1,',');
            // dd($months);
            $areaspline_chart = Charts::multi('areaspline', 'highcharts')
                        ->title(" ")
                        ->colors(['#f2070f', '#cf4286', '#3007f5'])
                        ->labels(['Jun 19','Jul 19','Aug 19','Sep 19','Oct 19','Nov 19'])
                        // ->labels([$months])
                        ->dataset('dataset 1', [$compaign1])
                        ->dataset('Product 2', [$products1])
                        ->dataset('Converted_leads', [$converted_leads_monthly1])
                        // ->dataset('dataset 1', [125, 38, 60,150,100,150])
                        // ->dataset('Product 2',  [14, 15, 50, 125, 40, 50])
                        // ->dataset('Product 3',  [75, 115, 150, 80, 140, 170])
                        ->responsive(true)
                        ->dimensions(500, 200);

            // $Count =0;
            // $users = DB::table('users')->get();          
        //  $login_time = $users->email_verified_at;
            // $logout = $users->logout_time;
            // if($login_time > $logout)
            // {
            //  $Count++;
            //  $last_seen = "Online";
            // }
            // $active_users = $Count;
            // $active_user = User::where('status','=','1')->get();
            // $login_time = $active_user->email_verified_at;
            
            // $active_users = User::where('email_verified_at','>','logout_time')->count();
            
            $users = DB::table('users')->get();
            foreach($users as $key => $data)
            {
                $login_time = $data->email_verified_at;
                $logout = $data->logout_time;
                if($login_time > $logout)
                {
                    $Count++;      
                }
            }
            $active_users = $Count;
            $percent_chart = Charts::create('percentage', 'justgage')
                        ->title(" ")
                        ->elementLabel('Users')
                        ->values([$active_users])
                        ->dimensions(500, 200)

                        // ->responsive(true)
                        ->height(300)
                        // ->width(0)
                        ->responsive(true);
                        
            // $geo_chart = Charts::create('geo', 'highcharts')
            //          ->title('GEO Chart')
            //          ->elementLabel('Chart Labels')
            //          ->labels(['US', 'UK', 'IND'])
            //          ->colors(['#C5CAE9', '#283593'])
            //          ->values([25,55,70,90])
            //          ->dimensions(1000, 450)
            //          ->responsive(true);

            $area_chart = Charts::create('area', 'highcharts')
                    ->title(" ")
                    ->elementLabel('Chart Labels')
                    ->labels(['First', 'Second', 'Third'])
                    ->values([$compaign])
                    ->dimensions(500, 200)
                    ->responsive(true);
            
            return view('admin.charts',compact('chart','pie','line','donut','donut2','totalclients','compaignCount','totalleads','convertedleads','chart1', 'pie_chart', 'line_chart', 'areaspline_chart', 'percent_chart', 'geo_chart', 'area_chart', 'donut_chart','active_users','Compaign_list','client_list','totalsales'));
        }
        else if($role == 'user')
        {
            $sales = DB::table("sales")->select('id','client_id')->where('email','=' , $email)->first();
            $sales_id = $sales->id;
            $client_id = $sales->client_id;
            $totalleads = Campaign::where('contact_person_id','=',$sales_id)->where('client_id','=',$client_id)->count();
            // $compaign = Campaign::where(DB::raw("(DATE_FORMAT(contact_date,'%Y'))")->where('contact_person_id','=',$clients_id),date('Y'))->get();
            $compaign = Campaign::where("created_at",">", Carbon::now()->subMonths(6))->where('contact_person_id','=',$sales_id)->where('client_id','=',$client_id)->get();
            // dd($compaign);
            $compaignCount = $compaign->where('status','=','1')->where('contact_person_id','=',$sales_id)->where('client_id','=',$client_id)->count();
            $chart = Charts::database($compaign, 'area', 'highcharts')
                    ->title(" ")
                    // ->elementLabel("Total Campaign")

                    ->dimensions(500, 200)
                    ->responsive(true)
                    ->lastByMonth(6, true);
                    // ->groupByMonth(date('Y'), false);

            $line = Charts::database($compaign, 'line', 'highcharts')
                    ->title(" ")
                    // ->elementLabel("Total Campaign")
                    ->dimensions(500, 200)
                    ->responsive(true)
                    ->lastByMonth(6, true);
                    // ->groupByMonth(date('Y'), false);

            $convertedleads = Campaign::where('status','=','0')->where('contact_person_id','=',$sales_id)->where('client_id','=',$client_id)->count();
            // $donut2 = Charts::database($compaign, 'donut', 'highcharts')
            $donut2 = Charts::create('donut', 'highcharts')
                    ->title(" ")
                    // ->labels(['Product 1', 'Product 2', 'Product 3', 'Product 4', 'Product 5', 'Product 6'])
                    ->values([$compaign])
                    // ->elementLabel("Total Leads")
                    ->dimensions(500, 200)
                    ->responsive(true);
            
            // $products = Campaign::where(DB::raw("(DATE_FORMAT(contact_date,'%Y'))")->where('contact_person_id','=',$clients_id),date('Y'))->get();
            $products = Campaign::where("created_at",">", Carbon::now()->subMonths(6))->where('contact_person_id','=',$sales_id)->where('client_id','=',$client_id)->get();
            $chart1 = Charts::database($products, 'bar', 'highcharts')
                      ->title(" ")
                      ->elementLabel("Total Products")
                      ->dimensions(500, 200)
                      ->responsive(true)
                      // ->groupByMonth(date('Y'), true);
                      ->lastByMonth(6, true);
            
            $areaspline_chart = Charts::multi('areaspline', 'highcharts')
                        ->title(" ")
                        ->colors(['#f2070f', '#cf4286', '#3007f5'])
                        ->labels(['Jan', 'Feb', 'Mar', 'Apl', 'May','Jun'])
                        ->dataset('Product 1', [125, 38, 60,150,100,150])
                        ->dataset('Product 2',  [14, 15, 50, 125, 40, 50])
                        // ->dataset('Product 3',  [75, 115, 150, 80, 140, 170])
                        ->responsive(true)
                        ->dimensions(500, 200);

            $area_chart = Charts::create('area', 'highcharts')
                    ->title(" ")
                    ->elementLabel('Chart Labels')
                    ->labels(['First', 'Second', 'Third'])
                    ->values([$compaign])
                    ->dimensions(500, 200)
                    ->responsive(true);
            
            return view('admin.charts',compact('chart','pie','line','donut','donut2','compaignCount','totalleads','convertedleads','chart1', 'line_chart', 'areaspline_chart', 'area_chart', 'donut_chart','clients_id'));
        }elseif($role == 'client')
        {
            $client_id = Auth::user()->client_id;
            $Compaign_list = DB::table('campaigns')->where('client_id','=',$client_id)->get();
            $sales_list = DB::table('sales')->where('client_id','=',$client_id)->where('status','=','1')->get();
            $totalleads = Campaign::where('client_id','=',$client_id)->count();
            $totalsales = Sales::where('client_id','=',$client_id)->count();
            $campaign = Campaign::where("created_at",">", Carbon::now()->subMonths(6))->where('client_id','=',$client_id)->get();
            $clients_report = Customer::where("created_at",">", Carbon::now()->subMonths(6))->get();
            $compaignCount = $campaign->count();
            $chart = Charts::database($campaign, 'area', 'highcharts')
                    ->title(" ")
                    // ->elementLabel("Total Compaign")
                    ->dimensions(600, 200)
                    ->responsive(true)
                    ->lastByMonth(6, true);
                    // ->groupByMonth(date('Y'), false);

            // $clients = Clients::where(DB::raw("(DATE_FORMAT(id,'%Y'))"),date('Y'))->get();
            // $totalsales = Sales::where('status','=','1')->where('client_id','=',$client_id)->count();
            $pie = Charts::database($campaign, 'pie', 'highcharts')
                    ->title(" ")
                    // ->showInLegend(true)
                    // ->labels(['First', 'Second', 'Third','four','five','six','seven','eight'])
                    // ->values([5,10,20,10,20,30,15,20])
                    // ->colors(['red', 'green', 'blue','yellow','magenta','pink','purple','orange'])
                    ->dimensions(500, 200)
                    ->responsive(true)
                    ->lastByMonth(6, true);
                    // ->groupByMonth(date('Y'), false);

            $line = Charts::database($clients_report, 'line', 'highcharts')
                    ->title(" ")
                    // ->elementLabel("Total Campaign")
                    ->dimensions(500, 200)
                    ->responsive(true)
                    ->lastByMonth(6, true);
                    // ->groupByMonth(date('Y'), false);

            $convertedleads = Campaign::where('status','=','0')->where('client_id','=',$client_id)->count();
            // $donut2 = Charts::database($compaign, 'donut', 'highcharts')
            $hold_leads = Campaign::where("created_at",">", Carbon::now()->subMonths(6))->where('status','=','0')->where('client_id','=',$client_id)->get();
            $donut2 = Charts::database($hold_leads,'donut', 'highcharts')
                    ->title(" ")
                    // ->labels(false)
                    // ->values([40,20,10,30,50,25])
                    // ->elementLabel("Total Leads")
                    ->dimensions(500, 200)
                    ->responsive(true)
                    ->lastByMonth(6, true);

            $products = Campaign::where("created_at",">", Carbon::now()->subMonths(6))->where('client_id','=',$client_id)->get();
            $chart1 = Charts::database($products, 'bar', 'highcharts')
                      ->title(" ")
                      ->elementLabel("Total Products")
                      ->dimensions(500, 200)
                      ->responsive(true)
                      ->lastByMonth(6, true);
                      // ->groupByMonth(date('Y'), true);

            $products1="";$compaign1="";$converted_leads_monthly1 ="";$months = "";$months1 = "";$value="";
            $value1="";$value2="";
            foreach ($campaign as $value) {
                $compaign1 .= $value->id.",";
            }
            // dd($compaign1);
            foreach ($products as $value1) {
                $products1 .= $value->contact_person_id.",";

            }
            // dd($products1);
            $converted_leads_monthly = Campaign::where("created_at",">", Carbon::now()->subMonths(6))->where('client_id','=',$client_id)->where('status','=','1')->get();
            foreach($converted_leads_monthly as $value2) {
                $converted_leads_monthly1 .= $value->contact_person_id.",";

            }
            for ($j = 5; $j >= 0; $j--) {
                $months1 .= "'".date("M y", strtotime(" -$j month"))."',";
            }
            $months = rtrim($months1,',');
            // dd($months);
            $areaspline_chart = Charts::multi('areaspline', 'highcharts')
                        ->title(" ")
                        ->colors(['#f2070f', '#cf4286', '#3007f5'])
                        ->labels(['Jun 19','Jul 19','Aug 19','Sep 19','Oct 19','Nov 19'])
                        // ->labels([$months])
                        ->dataset('dataset 1', [$compaign1])
                        ->dataset('Product 2', [$products1])
                        ->dataset('Converted_leads', [$converted_leads_monthly1])
                        // ->dataset('dataset 1', [125, 38, 60,150,100,150])
                        // ->dataset('Product 2',  [14, 15, 50, 125, 40, 50])
                        // ->dataset('Product 3',  [75, 115, 150, 80, 140, 170])
                        ->responsive(true)
                        ->dimensions(500, 200);

            $area_chart = Charts::create('area', 'highcharts')
                    ->title(" ")
                    ->elementLabel('Chart Labels')
                    ->labels(['First', 'Second', 'Third'])
                    ->values([$campaign])
                    ->dimensions(500, 200)
                    ->responsive(true);
            
            return view('admin.charts',compact('chart','pie','line','donut','donut2','totalsales','compaignCount','totalleads','convertedleads','chart1', 'pie_chart', 'line_chart', 'areaspline_chart', 'geo_chart', 'area_chart', 'donut_chart','active_users','clients_id','Compaign_list','sales_list','totalsales'));
        }
    }
}