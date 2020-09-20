<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Http\Request;

//use ConsoleTVs\Charts\Facades\Charts;
use App\Campaign;
use App\Clients;
use App\User;
use Charts;
use DB;
class ChartController extends Controller
{
    public function index()
    {
    	$compaign = Campaign::where(DB::raw("(DATE_FORMAT(contact_date,'%Y'))"),date('Y'))->get();
    	$compaignCount = $compaign->count();
        $chart = Charts::database($compaign, 'area', 'highcharts')
			    ->title("Compaign")
			    // ->elementLabel("Total Compaign")
			    ->dimensions(1000, 450)
			    ->responsive(false)
			    
			    ->groupByMonth(date('Y'), false);

		// $clients = Clients::where(DB::raw("(DATE_FORMAT(id,'%Y'))"),date('Y'))->get();
		$totalclients = Clients::where('status','=','1')->count();
		$pie = Charts::database($compaign, 'pie', 'highcharts')
				->title('Clients')
				// ->showInLegend(true)
				// ->labels(['First', 'Second', 'Third','four','five','six','seven','eight'])
				// ->values([5,10,20,10,20,30,15,20])
				// ->colors(['red', 'green', 'blue','yellow','magenta','pink','purple','orange'])
				->dimensions(1000, 450)
				// ->responsive(false)
				->groupByMonth(date('Y'), false);

		$line = Charts::database($compaign, 'line', 'highcharts')
			   	->title("Campaign")
			    // ->elementLabel("Total Campaign")
			    ->dimensions(1000, 450)
			    ->responsive(false)
			    ->groupByMonth(date('Y'), false);

		$totalleads = Campaign::count();
		//$donut = Charts::database($compaign, 'donut', 'highcharts')
		$donut = Charts::create('donut', 'highcharts')
			    ->labels(['Product 1', 'Product 2', 'Product 3', 'Product 4', 'Product 5', 'Product 6'])
			    ->values([25,50,70,860])
			    // ->elementLabel("Total Leads")
			    ->dimensions(1000, 450);
			    // ->responsive(false)
			   	// ->groupByMonth(date('Y'), false);
		$convertedleads = Campaign::where('status','=','1')->count();
		// $donut2 = Charts::database($compaign, 'donut', 'highcharts')
		$donut2 = Charts::create('donut', 'highcharts')
			    ->title("Hold Leads")
			    ->labels(['Product 1', 'Product 2', 'Product 3', 'Product 4', 'Product 5', 'Product 6'])
			    ->values([25,50,70,860])
			    // ->elementLabel("Total Leads")
			    ->dimensions(1000, 450);
			    // ->responsive(false)
			    // ->groupByMonth(date('Y'), false);

		// $donut3 = Charts::database($compaign, 'donut', 'highcharts')
		// 	    ->title("Converted Leads")
		// 	    // ->elementLabel("Total Leads")
		// 	    ->dimensions(530, 270)
		// 	    // ->responsive(false)
		// 	    ->groupByMonth(date('Y'), false);
		$products = Campaign::where(DB::raw("(DATE_FORMAT(contact_date,'%Y'))"),date('Y'))->get();
        $chart1 = Charts::database($products, 'bar', 'highcharts')
			      ->title("Product Details")
			      ->elementLabel("Total Products")
			      ->dimensions(1000, 450)
			      ->responsive(true)
			      ->groupByMonth(date('Y'), true);
 
 
		$pie_chart = Charts::create('pie', 'highcharts')
				->title('Pie Chart')
				->labels(['Product 1', 'Product 2', 'Product 3'])
				->values([15,25,50])
				->dimensions(1000,500)
				->responsive(true);
 
 
		$line_chart = Charts::create('line', 'highcharts')
			    ->title('Line Chart')
			    ->elementLabel('Chart Labels')
			    ->labels(['Product 1', 'Product 2', 'Product 3', 'Product 4', 'Product 5', 'Product 6'])
			    ->values([15,25,50, 5,10,20])
			    ->dimensions(1000, 450)
			    ->responsive(true);
 
		$areaspline_chart = Charts::multi('areaspline', 'highcharts')
				    ->title('Areaspline Chart')
				    ->colors(['#ff0000', '#ffffff'])
				    ->labels(['Jan', 'Feb', 'Mar', 'Apl', 'May','Jun'])
				    ->dataset('Product 1', [10, 15, 20, 25, 30, 35])
				    ->dataset('Product 2',  [14, 19, 26, 32, 40, 50])
				    ->dimensions(1000, 450);


		// $Count =0;
		// $users = DB::table('users')->get();		    
 	// 	$login_time = $users->email_verified_at;
		// $logout = $users->logout_time;
		// if($login_time > $logout)
		// {
		// 	$Count++;
		// 	$last_seen = "Online";
		// }
		// $active_users = $Count;
 		$active_users = User::where('email_verified_at','>','logout_time')->count();
		$percent_chart = Charts::create('percentage', 'justgage')
				    ->title('Active Users')
				    // ->elementLabel('Chart Labels')
				    ->values([$active_users])
				    ->dimensions(1000, 450)

				    // ->responsive(true)
				    ->height(300)
				    ->width(0);
				    // ->responsive(true);
				    
 
		// $geo_chart = Charts::create('geo', 'highcharts')
		// 		    ->title('GEO Chart')
		// 		    ->elementLabel('Chart Labels')
		// 		    ->labels(['US', 'UK', 'IND'])
		// 		    ->colors(['#C5CAE9', '#283593'])
		// 		    ->values([25,55,70,90])
		// 		    ->dimensions(1000, 450)
		// 		    ->responsive(true);
 
		$area_chart = Charts::create('area', 'highcharts')
			    ->title('Area Chart')
			    ->elementLabel('Chart Labels')
			    ->labels(['First', 'Second', 'Third'])
			    ->values([28,52,64,86,99])
			    ->dimensions(1000, 450)
			    ->responsive(true);
 
		$donut_chart = Charts::create('donut', 'highcharts')
			    ->title('Donut Chart')
			    ->labels(['Product 1', 'Product 2', 'Product 3', 'Product 4', 'Product 5', 'Product 6'])
			    ->values([25,50,70,860])
			    ->dimensions(1000, 500);
			    // ->responsive(true);
 
        return view('admin.charts',compact('chart','pie','line','donut','donut2','totalclients','compaignCount','totalleads','convertedleads','chart1', 'pie_chart', 'line_chart', 'areaspline_chart', 'percent_chart', 'geo_chart', 'area_chart', 'donut_chart','active_users'));
    }
    
}
