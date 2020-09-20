<?php
use Carbon\Carbon;
// use Compaign;
?>
@extends('admin.layouts.app')

<link href="css/bootstrap.min.css" rel="stylesheet" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-colors-highway.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src='https://kit.fontawesome.com/a076d05399.js'></script>
<link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<style> 
  div.divscroll { 
    margin:5px; 
    padding:5px; 
    width: 100%; 
    height: 100%; 
    overflow: auto; 
  } 
  div.divscroll1 {  
    width: 50%; 
    /*height: 100%; */
    overflow: auto; 
  } 
  .flex-container {
    display: flex;
    /*background-color:#fff;*/
    width: 99.5%;
    margin-left: 0px;
  }

  .flex-container > div {
    
    width: 19%;
    height:100px;
    margin: 7px;
    padding: 7px;
    font-size: 30px;
  }
  .flex-container .flex1 {
    background-color:#fff;
    border-left: 10px solid blue;
    /*border-right: 1px solid blue;
    border-top: 1px solid blue;
    border-bottom: 1px solid blue;*/
    /*background-image: linear-gradient(to right, blue, #0B3D93);*/
    
  }
  .flex-container .flex2 {
    background-color:#fff;
    border-left: 10px solid red;
    /*border-right: 1px solid red;
    border-top: 1px solid red;
    border-bottom: 1px solid red;*/
    /*background-image: linear-gradient(to right, black);*/
}

  .flex-container .flex3 {
    background-color:#fff;
    border-left: 10px solid grey;
    /*border-right: 1px solid grey;
    border-top: 1px solid grey;
    border-bottom: 1px solid grey;*/
    /*background-image: linear-gradient(to right, yellow);*/

  }
  .flex-container .flex4 {
    background-color:#fff;
    border-left: 10px solid green;
   /* border-right: 1px solid green;
    border-top: 1px solid green;
    border-bottom: 1px solid green;*/
    /*background-image: linear-gradient(to right, orange, red);*/
    
  }
  .flex-container .flex5 {
    background-color:#fff;
    border-left: 10px solid magenta;
    /*border-right: 1px solid magenta;
    border-top: 1px solid magenta;
    border-bottom: 1px solid magenta;*/
    /*background-image: linear-gradient(to right, yellow);*/
    
  }

  #tv {
      position: relative;
      width: 200px;
      height: 100px;
      margin: 20px 0;
      background-color: #BEB76c;
      border-radius: 50% / 10%;
      color: white;
      text-align: center;
      text-indent: .1em;
    }
    #tv:before {
      content: '';
      position: absolute;
      top: 10%;
      bottom: 10%;
      right: -5%;
      left: -5%;
      background: inherit;
      border-radius: 5% / 50%;
    }

    @media (max-width: 600px){
         .mob_width{
          padding: 10px;
          height: 150px;
         }
         .mobx_width{
          width: 100%;
         }

         .panel_width
         {
            width: 48%;
            margin-left: 42px;
         }

         .mob_panel_width
         {
            width: 48%;
            margin-left: 42px;
         }
    }
    @media (min-width: 1170px){
        .desk_panel_width1{
           width: 48%;
         }
         .desk_panel_width2{
           width: 48%;
          margin-left: 42px;
         }

         /*.toggle_label{
           margin-top: 10px;
         }*/
    }

    /*toggle*/
    .switch {
      position: relative;
      display: inline-block;
      width: 60px;
      height: 34px;
    }

    .switch input { 
      opacity: 0;
      width: 0;
      height: 0;
    }

    .slider {
      position: absolute;
      cursor: pointer;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background-color: #ccc;
      -webkit-transition: .4s;
      transition: .4s;
    }

    .slider:before {
      position: absolute;
      content: "";
      height: 26px;
      width: 26px;
      left: 4px;
      bottom: 4px;
      background-color: white;
      -webkit-transition: .4s;
      transition: .4s;
    }

    input:checked + .slider {
      background-color: #2196F3;
    }

    input:focus + .slider {
      box-shadow: 0 0 1px #2196F3;
    }

    input:checked + .slider:before {
      -webkit-transform: translateX(26px);
      -ms-transform: translateX(26px);
      transform: translateX(26px);
    }

    /* Rounded sliders */
    .slider.round {
      border-radius: 34px;
    }

    .slider.round:before {
      border-radius: 50%;
    }
    tr.noBorder td {
      border: 0;
    }
    
    .flex1{
      -webkit-filter: grayscale(100%);
      filter: grayscale(100%);
    }
    .flex1:hover{
      filter: none;
      -webkit-filter: none;
    }
    .flex2{
      -webkit-filter: grayscale(100%);
      filter: grayscale(100%);
    }
    .flex2:hover{
      filter: none;
      -webkit-filter: none;
    }
    .flex3{
      -webkit-filter: grayscale(100%);
      filter: grayscale(100%);
    }
    .flex3:hover{
      filter: none;
      -webkit-filter: none;
    }
    .flex4{
      -webkit-filter: grayscale(100%);
      filter: grayscale(100%);
    }
    .flex4:hover{
      filter: none;
      -webkit-filter: none;
    }
    .flex5{
      -webkit-filter: grayscale(100%);
      filter: grayscale(100%);
    }
    .flex5:hover{
      filter: none;
      -webkit-filter: none;
    }
</style>
@section('content')
<div class="row">
  <div class="w3-container col-md-10 divscroll w3-mobile">
    <?php $role = Auth::user()->role; ?>
    @if($role == "admin")
    <div class="flex-container w3-mobile">
          <div class="flex1 col-md-3 w3-mobile w3-card-2 w3-round">
              <img class="pull-left" src="./images/compaign.png" height="40px;" width="40px;" style="margin-right: 10px;"><font color="blue" size="2" class="w3-right"><strong>Total Campaigns</strong></font><br />
              <div class="progress" style="margin-top: 25px; height: 7px; width: 80%;">
                <div class="progress-bar" role="progressbar" aria-valuemax="100" style="width: {{ $compaignCount }}%;">
                  <!-- <strong>{{ $compaignCount }}</strong> -->
                </div>
              </div>
              <font color="grey" size="4" style="margin-top: -40px;float: right;">{{ $compaignCount }}</font>
          </div>
          <div class="flex2 col-md-3 w3-mobile w3-card-2 w3-round">
              <img class="pull-left" src="./public/images/clients.png" height="40px;" width="40px;" style="margin-right: 10px;"><font color="red" size="2" class="w3-right"><strong>Total Clients</strong></font><br />
              <div class="progress" style="margin-top: 25px;  height: 7px; width: 80%;">
                <div class="progress-bar" role="progressbar" aria-valuemax="100" style="width: {{ $totalclients }}%;">
                  <!-- <strong>{{ $totalclients }}</strong> -->
                </div>
              </div>
              <font color="grey" size="4" style="margin-top: -40px;float: right;">{{ $totalclients }}</font>
          </div>
          <div class="flex3 col-md-3 w3-mobile w3-card-2 w3-round">
              <img class="pull-left" src="./public/images/leads.png" height="50px;" width="50px;" style="margin-right: 10px; margin-top: -5px;"><font color="grey" size="2" class="w3-right"><strong>Total Leads</strong></font><br />
              <div class="progress" style="margin-top: 25px;  height: 7px; width: 80%;">
                <div class="progress-bar" role="progressbar" aria-valuemax="100" style="width: {{ $totalleads }}%;">
                  <!-- <strong>{{ $totalleads }}</strong> -->
                </div>
              </div>
              <font color="grey" size="4" style="margin-top: -40px;float: right;">{{ $totalleads }}</font>
          </div>
          <div class="flex4 col-md-3 w3-mobile w3-card-2 w3-round">
              <img class="pull-left" src="./images/complete.png" height="40px;" width="40px;" style="margin-right: 10px;"><font color="green" size="2" class="w3-right"><strong>Converted Leads</strong></font><br />
              <div class="progress" style="margin-top: 25px;  height: 7px; width: 80%;">
                <div class="progress-bar" role="progressbar" aria-valuemax="100" style="width: {{ $convertedleads }}%;">
                </div>
              </div>
              <font color="grey" size="4" style="margin-top: -40px;float: right;">{{ $convertedleads }}</font>
          </div>
          <div class="flex5 col-md-3 w3-mobile w3-card-2 w3-round">
              <img class="pull-left" src="./public/images/sales.png" height="40px;" width="40px;" style="margin-right: 10px;"><font color="magenta" size="2" class="w3-right"><strong>Total Sales</strong></font><br />
              <div class="progress" style="margin-top: 25px;  height: 7px; width: 80%;">
                <div class="progress-bar" role="progressbar" aria-valuemax="100" style="width: {{ $totalsales }}%;">
                </div>
              </div>
              <font color="grey" size="4" style="margin-top: -40px;float: right;">{{ $totalsales }}</font>
          </div>
      </div>
      <br />
      <div class="w3-mobile" style="width: 100%;">
        <div class="col-md-12 w3-mobile" style="width: 100%;">
        <div class="panel col-md-6 panel-default w3-mobile" style="width: 48%;">
        <div class="panel-heading w3-mobile" style="margin-left: -15px; margin-right: -15px;">
         <h3 class="panel-title w3-mobile" style="color: #1A20D9;">Deal Forecast by Owner (<font size="2"> last month </font>)</h3>
        </div>
        <div class="panel-body">
         <div class="table-responsive">       
            <table class="table table-sm w3-small w3-mobile w3-white" style="width: 101%;">
              <thead>
                <tr>
                  <th scope="col" style="color: #000000;">Slno.</th>
                  <th scope="col" style="color: #000000;">Owner Name</th>
                  <th scope="col" style="color: #000000;">Qualified to Buy</th>
                  <th scope="col" style="color: #000000;">Appoinment Scheduled</th>
                  <!-- <th scope="col" style="color: #000000;">Register Time</th> -->
                  <th scope="col" style="color: #000000; width: 20%;">Date Time</th>
                  <th scope="col" style="color: #000000;">Negotiated</th>
                </tr>
              </thead>
              <?php $count = 0;
              $c_year = Carbon::now()->year;
              $c_month = Carbon::now()->month-1;
               ?>
              @foreach($client_list as $key => $data1)
              
                <?php
                  $count++;
                  $id = $data1->id;
                  $contact_name = trim($data1->name,'["]');
                  $qualified_to_buy = DB::table('campaigns')->where('contact_person_id','=',$id)->where('status','=','0')->whereYear('created_at', $c_year)->whereMonth('created_at', $c_month)->count();
                  $hold_to_buy = DB::table('campaigns')->where('contact_person_id','=',$id)->where('status','=','1')->whereYear('created_at', $c_year)->whereMonth('created_at', $c_month)->count();
               ?>
              <!--  foreach($Compaign_list as $key => $data)
                
                  $count++;
                  $id = $data->id;
                  $contact_name1 = \App\Clients::where(['id' => $data->contact_person_id])->pluck('name');
                  $contact_name = trim($contact_name1,'["]'); -->
              <tbody>
                <tr>
                  <td style="color: #000000;">{{$count}}</td>
                  <td nowrap="nowrap" style="color: #000000;">{{$contact_name}}</td>
                  <td nowrap="nowrap" style="color: #000000;">{{ $qualified_to_buy }}</td>
                  <td style="color: #000000;">{{ $hold_to_buy }}</td>
                  <td style="color: #000000;"></td>
                  <td nowrap="nowrap" style="color: #000000;"></td>
                </tr>
               @endforeach
               <tr>
                  <td colspan="2"><b>Total</b></td><td></td><td></td><td></td><td></td>
                </tr>  
              </tbody>
            </table>
        </div>
      </div>
    </div>
   
        <div class="panel col-md-6 panel-default pull-right w3-mobile" style="width: 48%;">
        <div class="panel-heading w3-mobile" style="margin-left: -15px; margin-right: -15px;">
         <h3 class="panel-title w3-mobile" style="color: #1A20D9;">Time in Deal Stage (<font size="2"> monthly </font>)</h3>
        </div>
        <div class="panel-body">
         <div class="table-responsive">       
            <table class="table table-sm w3-small w3-white w3-mobile" style="width: 100%;">
              <thead>
                <tr>
                  <th scope="col" style="color: #000000;">Slno.</th>
                  <th scope="col" style="color: #000000; width: 20%;">Months</th>
                  <th scope="col" style="color: #000000;">Early Stage</th>
                  <th scope="col" style="color: #000000;">Middle Stage</th>
                  <!-- <th scope="col" >Register Time</th> -->
                  <th scope="col" style="color: #000000;">Praposal Sent</th>
                  <th scope="col" style="color: #000000;">Negotiated</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $count1 = 0; $months=0;
                  for ($j = 5; $j >= 0; $j--) {
                    $count1++;
                    $months = date("M Y", strtotime(" -$j month"));
                ?>
                  <tr>
                    <td style="color: #000000;">{{ $count1 }}</td>
                    <td style="color: #000000;">{{ $months }}</td>
                    <td style="color: #000000;"></td>
                    <td style="color: #000000;"></td>
                    <td style="color: #000000;"></td>
                    <td style="color: #000000;"></td>
                  </tr>
                <?php } ?>
                  <tr>
                    <td colspan="2"><b>Total</b></td><td></td><td></td><td></td><td></td>
                  </tr>
              </tbody>
            </table>
        </div>
       </div> 
     </div>
   </div>
 </div>
        <div class="panel col-md-6 panel-default w3-mobile" style="width: 48%;line-height: 23%;">
        <div class="panel-heading" style="margin-left: -15px; margin-right: -15px; color: #1A20D9;">Campaigns (<font size="2">six months</font>)</div>
        <div class="panel-body" style="height:400px;">      
          <center>
            {!! $chart->html() !!}
          </center>
        </div>
      </div>
        <div class="panel col-md-6 panel-default w3-mobile w3-right" style="width: 48%;line-height: 23%;">
        <div class="panel-heading" style="margin-left: -15px; margin-right: -15px; color: #1A20D9;">Clients Report (<font size="2">six months</font>)</div>
        <div class="panel-body" style="height:400px;">        
          <center>
            {!! $line->html() !!}
          </center>
        </div>
      </div><br />
        <div class="panel col-md-6 panel-default w3-mobile w3-responsive" style="width: 48%;line-height: 23%;">
        <div class="panel-heading" style="margin-left: -15px; margin-right: -15px; color: #1A20D9;">Hold Leads (<font size="2">six months</font>)</div>
        <div class="panel-body" style="height:400px;">        
          <center>
            {!! $donut2->html() !!}
          </center>
        </div>
      </div>
        <div class="panel col-md-6 panel-default w3-mobile w3-right" style="width: 48%;line-height: 23%;">
        <div class="panel-heading" style="margin-left: -15px; margin-right: -15px; color: #1A20D9;">Product Details (<font size="2">six months</font>)</div>
        <div class="panel-body" style="height:400px;">      
          <center>
            {!! $chart1->html() !!}
          </center>
        </div>
      </div><br/>

        <div class="panel col-md-6 panel-default w3-mobile" style="width: 48%;line-height: 23%;">
        <div class="panel-heading" style="margin-left: -15px; margin-right: -15px; color: #1A20D9;">Areaspline Chart</div>
        <div class="panel-body" style="height:400px;">
            {!! $areaspline_chart->html() !!}
        </div>
      </div>
        
        
        <div class="panel col-md-6 panel-default w3-mobile w3-right" style="width: 48%;line-height: 23%;">
        <div class="panel-heading" style="margin-left: -15px; margin-right: -15px; color: #1A20D9;">Active Current User</div>
        <div class="panel-body" style="height:400px;">
            {!! $percent_chart->script() !!}
        </div>
      </div>
      @php
      $google_leads=0;$facebook_leads=0;$insta_leads=0;$linkdin_leads=0;$twitter_leads=0;
      @endphp
      @foreach($Compaign_list as $key => $output) 
      <?php
      if($output->contact_via=="fb")
      {
         $facebook_leads++;
      }
      if($output->contact_via=="linkdin")
      {
        $linkdin_leads++;
      }
      if($output->contact_via=="google")
      {
        $google_leads++;
      }
      if($output->contact_via=="instagram")
      {
        $insta_leads++;
      }
      if($output->contact_via=="twitter")
      {
        $twitter_leads++;
      }
        ?>
        @endforeach
      <div class="panel col-md-6 panel-default w3-mobile" style="width: 48%;line-height: 23%;">
        <div class="panel-heading" style="margin-left: -15px; margin-right: -15px; color: #1A20D9;">Leads from Platforms</div>
        <div class="panel-body" style="height:350px;">
        <!-- <div class="table-responsive">        -->
            <table class="table-all w3-small w3-white w3-mobile" style="width: 100%;">
              <tr class="noBorder" >
                <td style="width: 5%; height: 50px;">
                  <img class="pull-left" src="{{ asset('public/images/google.png') }}" height="40px;" width="40px;" style="margin-right: 10px;">
                <!-- <small><i class="fa fa-google fa-3x" style="color: blue;width: 15%;"></i></small> -->
              </td>
              <td class="noBorder" style="width: 90%; height: 60px;">
                <div class="progress pull-right" style="width: 100%; margin-top: 20px;">
                  <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40"
                  aria-valuemin="0" aria-valuemax="100" style="width:{{$google_leads}}%">
                    {{$google_leads}}% (Google)
                  </div>
                </div>
              </td>
              <td style="width: 5%;">{{$google_leads}}</td>
              </tr><br />
              <tr><td></td><td></td></tr>
              <tr class="noBorder" style="width: 5%;">
                <td>
                  <img class="pull-left" src="{{ asset('public/images/facebook.png') }}" height="35px;" width="35px;" style="margin-right: 10px;">
                <!-- <small><i class="fa fa-facebook fa-3x" style="color: blue; width: 15%;"></i></small> -->
                </td>
                <td style="width: 90%; height: 60px;"> 
                <div class="progress pull-right" style="width: 100%; margin-top: 20px;">
                  <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="50"
                  aria-valuemin="0" aria-valuemax="100" style="width:{{$facebook_leads}}%">
                    {{$facebook_leads}}% (Facebook)
                  </div>
                </div>
              </td>
              <td style="width: 5%;">{{$facebook_leads}}</td>
                </tr>
                <tr><td></td><td></td></tr>
              <tr class="noBorder">
                <td style="width: 5%;">
                  <img class="pull-left" src="{{ asset('public/images/instagram.png') }}" height="35px;" width="35px;" style="margin-right: 10px;">
                <!-- <small><i class="fa fa-instagram fa-3x" style="color: red; width: 15%;"></i></small> -->
                </td>
                <td style="width: 90%; height: 60px;"> 
                <div class="progress pull-right" style="width: 100%; margin-top: 20px;">
                  <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="70"
                  aria-valuemin="0" aria-valuemax="100" style="width:{{$insta_leads}}%">
                    {{$insta_leads}}% (Instagram)
                  </div>
                </div>
              </td>
              <td style="width: 5%;">{{$insta_leads}}</td>
                </tr>
                <tr><td></td><td></td></tr>
              <tr class="noBorder" style="width: 5%;">
                <td>
                <small><i class="fa fa-twitter fa-4x" style="color: blue; width: 15%;"></i></small> 
              </td>
              <td style="width: 90%; height: 60px;">
                <div class="progress pull-right" style="width: 100%; margin-top: 20px;">
                  <div class="progress-bar progress-bar-blue" role="progressbar" aria-valuenow="70"
                  aria-valuemin="0" aria-valuemax="100" style="width:{{$twitter_leads}}%">
                    {{$twitter_leads}}% (Twitter)
                  </div>
                </div>
              </td>
              <td style="width: 5%;">{{$twitter_leads}}</td>
                </tr>
                <tr><td></td><td></td></tr>
              <tr>
                <td style="width: 5%;">
                  <img class="pull-left" src="{{ asset('public/images/linkdin.png') }}" height="35px;" width="35px;" style="margin-right: 10px;">
                  <!-- <small><i class="fa fa-linkdin fa-3x" style="color: blue; width: 15%;"></i></small> -->
                </td>
                <td style="width: 90%; height: 60px;">
                <div class="progress pull-right" style="width: 100%; margin-top: 20px;">
                  <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60"
                  aria-valuemin="0" aria-valuemax="100" style="width:{{$linkdin_leads}}%">
                   {{$linkdin_leads}}% (linkdin)
                  </div>
                </div>
              </td>
              <td style="width: 5%;">{{$linkdin_leads}}</td>
              </tr>
            </table>
            <!-- </div> -->
        </div>
      </div>
    </div>
    {!! Charts::scripts() !!}
    {!! $chart->script() !!}
    
    {!! $line->script() !!}
    
    {!! $donut2->script() !!}
    {!! $chart1->script() !!}
    
    {!! $areaspline_chart->script() !!}
   
      @elseif($role == "client")
      <div class="flex-container w3-mobile" >
          <div class="flex1 col-md-3 w3-card-2 w3-mobile w3-round">
              <img class="pull-left" src="./images/compaign.png" height="40px;" width="40px;" style="margin-right: 10px;"><font color="blue" size="2" class="w3-right"><strong>Total Compaigns</strong></font><br />
              <div class="progress" style="margin-top: 25px; height: 7px; width: 80%;">
                <div class="progress-bar" role="progressbar" aria-valuemax="100" style="width: {{ $compaignCount }}%;">
                  <strong>{{ $compaignCount }}</strong>
                </div>
              </div>
              <font ccolor="grey" size="4" style="margin-top: -40px;float: right;">{{ $compaignCount }}</font>
          </div>
          <div class="flex2 col-md-3 w3-card-4 w3-mobile w3-round">
              <img class="pull-left" src="./public/images/clients.png" height="40px;" width="40px;" style="margin-right: 10px;"><font color="red" size="2" class="w3-right"><strong>Total Sales</strong></font><br />
              <div class="progress" style="margin-top: 25px;  height: 7px; width: 80%;">
                <div class="progress-bar" role="progressbar" aria-valuemax="100" style="width: {{ $totalsales }}%;">
                  <strong>{{ $totalsales }}</strong>
                </div>
              </div>
              <font color="grey" size="4" style="margin-top: -40px;float: right;">{{ $totalsales }}</font>
          </div>
          
          <div class="flex3 col-md-3 w3-card-4 w3-mobile w3-round">
              <img class="pull-left" src="./public/images/leads.png" height="50px;" width="50px;" style="margin-right: 10px;margin-top: -5px;"><font color="grey" size="2" class="w3-right"><strong>Total Leads</strong></font><br />
              <div class="progress" style="margin-top: 25px;  height: 7px; width: 80%;">
                <div class="progress-bar" role="progressbar" aria-valuemax="100" style="width: {{ $totalleads }}%;">
                  <strong>{{ $totalleads }}</strong>
                </div>
              </div>
              <font color="grey" size="4" style="margin-top: -40px;float: right;">{{ $totalleads }}</font>
          </div>
          <div class="flex4 col-md-3 w3-card-4 w3-mobile w3-round">
              <img class="pull-left" src="./images/complete.png" height="40px;" width="40px;" style="margin-right: 10px;"><font color="green" size="2" class="w3-right"><strong>Converted Leads</strong></font><br />
              <div class="progress" style="margin-top: 25px;  height: 7px; width: 80%;">
                <div class="progress-bar" role="progressbar" aria-valuemax="100" style="width: {{ $convertedleads }}%;">
                </div>
              </div>
              <font color="grey" size="4" style="margin-top: -40px;float: right;">{{ $convertedleads }}</font>
          </div>
          <div class="flex4 col-md-3 w3-card-4 w3-mobile w3-round">
              <img class="pull-left" src="./public/images/sales.png" height="40px;" width="40px;" style="margin-right: 10px;"><font color="magenta" size="2" class="w3-right"><strong>Sales</strong></font><br />
              <div class="progress" style="margin-top: 25px;  height: 7px; width: 80%;">
                <div class="progress-bar" role="progressbar" aria-valuemax="100" style="width: {{ $totalsales }}%;">
                </div>
              </div>
              <font color="grey" size="4" style="margin-top: -40px;float: right;">{{ $totalsales }}</font>
          </div>
      </div>
      <br />
      <div class="w3-mobile" style="width: 100%;">
        <div class="col-md-12" style="width: 100.5%;">
        <div class="panel col-md-6 panel-default" style="width: 50%;margin-left: -20px;">
        <div class="panel-heading" style="margin-left: -15px; margin-right: -15px;">
         <h3 class="panel-title" style="color: #1A20D9;">Deal Forecast by Owner (<font size="2"> last month </font>)</h3>
        </div>
        <div class="panel-body">
         <div class="table-responsive">        
            <table class="table table-sm w3-small w3-responsive w3-mobile w3-white" style="width: 100%;">
              <thead>
                <tr>
                  <th scope="col" style="color: #000000;">Slno.</th>
                  <th scope="col" style="color: #000000;">Owner Name</th>
                  <th scope="col" style="color: #000000;">Qualified to Buy</th>
                  <th scope="col" style="color: #000000;">Appoinment Scheduled</th>
                  <!-- <th scope="col" style="color: #000000;">Register Time</th> -->
                  <th scope="col" style="color: #000000; width: 20%;">Date Time</th>
                  <th scope="col" style="color: #000000;">Negotiated</th>
                </tr>
              </thead>
              <?php $count = 0;
              $c_year = Carbon::now()->year;
              $c_month = Carbon::now()->month-1;
               ?>
              @foreach($sales_list as $key => $data1)
              
                <?php
                  $count++;
                  $id = $data1->id;
                  $contact_name = trim($data1->name,'["]');
                  $qualified_to_buy = DB::table('campaigns')->where('contact_person_id','=',$id)->where('status','=','0')->whereYear('created_at', $c_year)->whereMonth('created_at', $c_month)->count();
                  $hold_to_buy = DB::table('campaigns')->where('contact_person_id','=',$id)->where('status','=','1')->whereYear('created_at', $c_year)->whereMonth('created_at', $c_month)->count();
               ?>
            
              <tbody>
                <tr>
                  <td style="color: #000000;">{{$count}}</td>
                  <td nowrap="nowrap" style="color: #000000;">{{$contact_name}}</td>
                  <td nowrap="nowrap" style="color: #000000;">{{ $qualified_to_buy }}</td>
                  <td style="color: #000000;">{{ $hold_to_buy }}</td>
                  <td style="color: #000000;"></td>
                  <td nowrap="nowrap" style="color: #000000;"></td>
                </tr>
               @endforeach
               <tr>
                  <td colspan="2"><b>Total</b></td><td></td><td></td><td></td><td></td>
                </tr>  
              </tbody>
            </table>
        </div>
      </div>
    </div>
        <div class="panel col-md-6 panel-default" style="width: 50%;margin-left: 20px;">
        <div class="panel-heading" style="margin-left: -15px; margin-right: -15px;">
         <h3 class="panel-title" style="color: #1A20D9;">Time in Deal Stage (<font size="2"> monthly </font>)</h3>
        </div>
        <div class="panel-body">
         <div class="table-responsive">        
            <table class="table table-sm w3-small w3-white w3-mobile w3-responsive" style="width: 100%;">
              <thead>
                <tr style="width: 100%;">
                  <th scope="col" style="color: #000000;">Slno.</th>
                  <th scope="col" style="color: #000000; width: 20%;">Months</th>
                  <th scope="col" style="color: #000000;">Early Stage</th>
                  <th scope="col" style="color: #000000;">Middle Stage</th>
                  <!-- <th scope="col" >Register Time</th> -->
                  <th scope="col" style="color: #000000;">Praposal Sent</th>
                  <th scope="col" style="color: #000000;">Negotiated</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $count1 = 0; $months=0;
                  for ($j = 5; $j >= 0; $j--) {
                    $count1++;
                    $months = date("M Y", strtotime(" -$j month"));
                ?>
                  <tr>
                    <td style="color: #000000;">{{ $count1 }}</td>
                    <td style="color: #000000;">{{ $months }}</td>
                    <td style="color: #000000;"></td>
                    <td style="color: #000000;"></td>
                    <td style="color: #000000;"></td>
                    <td style="color: #000000;"></td>
                  </tr>
                <?php } ?>
                  <tr>
                    <td colspan="2"><b>Total</b></td><td></td><td></td><td></td><td></td>
                  </tr>
              </tbody>
            </table>
        </div>
       </div> 
     </div>
      <div class="panel col-md-6 panel-default w3-mobile" style="width: 48%;line-height: 23%;">
        <div class="panel-heading" style="margin-left: -15px; margin-right: -15px; color: #1A20D9;">Campaigns (<font size="2">six months</font>)</div>
        <div class="panel-body" style="height: 400px;">             
          <center>
            {!! $chart->html() !!}
          </center>
        </div>
      </div>
        <div class="panel col-md-6 panel-default w3-mobile w3-right" style="width: 48%;line-height: 23%;">
        <div class="panel-heading" style="margin-left: -15px; margin-right: -15px; color: #1A20D9;">Clients Report (<font size="2">six months</font>)</div>
        <div class="panel-body" style="height: 400px;">             
          <center>
            {!! $line->html() !!}
          </center>
        </div>
      </div><br />
        
        <div class="panel col-md-6 panel-default w3-mobile w3-responsive" style="width: 48%;line-height: 23%;">
        <div class="panel-heading" style="margin-left: -15px; margin-right: -15px; color: #1A20D9;">Hold Leads (<font size="2">six months</font>)</div>
        <div class="panel-body" style="height:400px;">        
          <center>
            {!! $donut2->html() !!}
          </center>
        </div>
      </div>
        <div class="panel col-md-6 panel-default w3-mobile w3-right" style="width: 48%;line-height: 23%;">
        <div class="panel-heading" style="margin-left: -15px; margin-right: -15px; color: #1A20D9;">Products Detail (<font size="2">six months</font>)</div>
        <div class="panel-body" style="height: 400px;">             
          <center>
            {!! $chart1->html() !!}
          </center>
        </div>
      </div><br/>

        <div class="panel col-md-6 panel-default w3-mobile" style="width: 48%;line-height: 23%;">
        <div class="panel-heading " style="margin-left: -15px; margin-right: -15px; color: #1A20D9;">Areaspline Chart</div>
        <div class="panel-body" style="height: 400px;">      
            {!! $areaspline_chart->html() !!}
        </div>
      </div>
      @php
      $google_leads=0;$facebook_leads=0;$insta_leads=0;$linkdin_leads=0;$twitter_leads=0;
      @endphp
      @foreach($Compaign_list as $key => $output) 
      <?php
      if($output->contact_via=="fb")
      {
         $facebook_leads++;
      }
      if($output->contact_via=="linkdin")
      {
        $linkdin_leads++;
      }
      if($output->contact_via=="google")
      {
        $google_leads++;
      }
      if($output->contact_via=="instagram")
      {
        $insta_leads++;
      }
      if($output->contact_via=="twitter")
      {
        $twitter_leads++;
      }
        ?>
        @endforeach
        <div class="panel col-md-6 panel-default w3-mobile" style="width: 48%;line-height: 23%;">
        <div class="panel-heading" style="margin-left: -15px; margin-right: -15px; color: #1A20D9;">Leads from Platforms</div>
        <div class="panel-body" style="height:350px;">
        <!-- <div class="table-responsive">        -->
            <table class="table-all w3-small w3-white w3-mobile" style="width: 100%;">
              <tr class="noBorder" >
                <td style="width: 5%; height: 50px;">
                  <img class="pull-left" src="{{ asset('public/images/google.png') }}" height="40px;" width="40px;" style="margin-right: 10px;">
                <!-- <small><i class="fa fa-google fa-3x" style="color: blue;width: 15%;"></i></small> -->
              </td>
              <td class="noBorder" style="width: 90%; height: 60px;">
                <div class="progress pull-right" style="width: 100%; margin-top: 20px;">
                  <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40"
                  aria-valuemin="0" aria-valuemax="100" style="width:{{$google_leads}}%">
                    {{$google_leads}}% (Google)
                  </div>
                </div>
              </td>
              <td style="width: 5%;">{{$google_leads}}</td>
              </tr><br />
              <tr><td></td><td></td></tr>
              <tr class="noBorder" style="width: 5%;">
                <td>
                  <img class="pull-left" src="{{ asset('public/images/facebook.png') }}" height="35px;" width="35px;" style="margin-right: 10px;">
                <!-- <small><i class="fa fa-facebook fa-3x" style="color: blue; width: 15%;"></i></small> -->
                </td>
                <td style="width: 90%; height: 60px;"> 
                <div class="progress pull-right" style="width: 100%; margin-top: 20px;">
                  <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="50"
                  aria-valuemin="0" aria-valuemax="100" style="width:{{$facebook_leads}}%">
                    {{$facebook_leads}}% (Facebook)
                  </div>
                </div>
              </td>
              <td style="width: 5%;">{{$facebook_leads}}</td>
                </tr>
                <tr><td></td><td></td></tr>
              <tr class="noBorder">
                <td style="width: 5%;">
                  <img class="pull-left" src="{{ asset('public/images/instagram.png') }}" height="35px;" width="35px;" style="margin-right: 10px;">
                <!-- <small><i class="fa fa-instagram fa-3x" style="color: red; width: 15%;"></i></small> -->
                </td>
                <td style="width: 90%; height: 60px;"> 
                <div class="progress pull-right" style="width: 100%; margin-top: 20px;">
                  <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="70"
                  aria-valuemin="0" aria-valuemax="100" style="width:{{$insta_leads}}%">
                    {{$insta_leads}}% (Instagram)
                  </div>
                </div>
              </td>
              <td style="width: 5%;">{{$insta_leads}}</td>
                </tr>
                <tr><td></td><td></td></tr>
              <tr class="noBorder" style="width: 5%;">
                <td>
                <small><i class="fa fa-twitter fa-4x" style="color: blue; width: 15%;"></i></small> 
              </td>
              <td style="width: 90%; height: 60px;">
                <div class="progress pull-right" style="width: 100%; margin-top: 20px;">
                  <div class="progress-bar progress-bar-blue" role="progressbar" aria-valuenow="70"
                  aria-valuemin="0" aria-valuemax="100" style="width:{{$twitter_leads}}%">
                    {{$twitter_leads}}% (Twitter)
                  </div>
                </div>
              </td>
              <td style="width: 5%;">{{$twitter_leads}}</td>
                </tr>
                <tr><td></td><td></td></tr>
              <tr>
                <td style="width: 5%;">
                  <img class="pull-left" src="{{ asset('public/images/linkdin.png') }}" height="35px;" width="35px;" style="margin-right: 10px;">
                  <!-- <small><i class="fa fa-linkdin fa-3x" style="color: blue; width: 15%;"></i></small> -->
                </td>
                <td style="width: 90%; height: 60px;">
                <div class="progress pull-right" style="width: 100%; margin-top: 20px;">
                  <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60"
                  aria-valuemin="0" aria-valuemax="100" style="width:{{$linkdin_leads}}%">
                   {{$linkdin_leads}}% (linkdin)
                  </div>
                </div>
              </td>
              <td style="width: 5%;">{{$linkdin_leads}}</td>
              </tr>
            </table>
            <!-- </div> -->
        </div>
      </div>
    </div>
    {!! Charts::scripts() !!}
    {!! $chart->script() !!}
    
    {!! $line->script() !!}
    
    {!! $donut2->script() !!}
    {!! $chart1->script() !!}
    
    {!! $areaspline_chart->script() !!}
       @elseif($role == "user")
      <div class="flex-container w3-mobile" >
          <div class="flex1 col-md-3 w3-card-2 w3-mobile w3-round">
              <img class="pull-left" src="./images/compaign.png" height="40px;" width="40px;" style="margin-right: 10px;"><font color="blue" size="2" class="w3-right"><strong>Total Compaigns</strong></font><br />
              <div class="progress" style="margin-top: 25px; height: 7px; width: 80%;">
                <div class="progress-bar" role="progressbar" aria-valuemax="100" style="width: {{ $compaignCount }}%;">
                  <strong>{{ $compaignCount }}</strong>
                </div>
              </div>
              <font color="grey" size="4" style="margin-top: -40px;float: right;">{{ $compaignCount }}</font>
          </div>
          <div class="flex2 col-md-3 w3-card-2 w3-mobile w3-round">
              <img class="pull-left" src="./public/images/clients.png" height="40px;" width="40px;" style="margin-right: 10px;margin-top: -15px;"><font color="red" size="2" class="w3-right"><strong>Total Task</strong></font><br />
              <div class="progress" style="margin-top: 25px;  height: 7px; width: 80%;">
                <div class="progress-bar" role="progressbar" aria-valuemax="100" style="width: 2%;">
                  <strong></strong>
                </div>
              </div>
              <font color="grey" size="4" style="margin-top: -40px;float: right;"></font>
          </div>
          <div class="flex3 col-md-3 w3-card-2 w3-mobile w3-round">
              <img class="pull-left" src="./public/images/leads.png" height="50px;" width="50px;" style="margin-right: 10px;margin-top: -5px;"><font color="grey" size="2" class="w3-right"><strong>Total Leads</strong></font><br />
              <div class="progress" style="margin-top: 25px;  height: 7px; width: 80%;">
                <div class="progress-bar" role="progressbar" aria-valuemax="100" style="width: {{ $totalleads }}%;">
                  <strong>{{ $totalleads }}</strong>
                </div>
              </div>
              <font color="grey" size="4" style="margin-top: -40px;float: right;">{{ $totalleads }}</font>
          </div>
          <div class="flex4 col-md-3 w3-card-2 w3-mobile w3-round">
              <img class="pull-left" src="./images/complete.png" height="40px;" width="40px;" style="margin-right: 10px;"><font color="green" size="2" class="w3-right"><strong>Converted Leads</strong></font><br />
              <div class="progress" style="margin-top: 25px;  height: 7px; width: 80%;">
                <div class="progress-bar" role="progressbar" aria-valuemax="100" style="width: {{ $convertedleads }}%;">
                </div>
              </div>
              <font color="grey" size="4" style="margin-top: -40px;float: right;">{{ $convertedleads }}</font>
          </div>
          <div class="flex5 col-md-3 w3-card-2 w3-mobile w3-round">
              <img class="pull-left" src="./images/complete.png" height="40px;" width="40px;" style="margin-right: 10px;"><font color="magenta" size="2" class="w3-right"><strong>Converted Leads</strong></font><br />
              <div class="progress" style="margin-top: 25px;  height: 7px; width: 80%;">
                <div class="progress-bar" role="progressbar" aria-valuemax="100" style="width: {{ $convertedleads }}%;">
                </div>
              </div>
              <font color="grey" size="4" style="margin-top: -40px;float: right;">{{ $convertedleads }}</font>
          </div>
      </div> 
      <br />
      <div class="w3-mobile" style="width: 100%;">
       <br />
        <div class="panel col-md-6 panel-default w3-mobile" style="width: 48%;line-height: 23%;">
        <div class="panel-heading" style="margin-left: -15px; margin-right: -15px; color: #1A20D9;">Campaigns (<font size="2">six months</font>)</div>
        <div class="panel-body" style="height: 400px;">          
          <center>
            {!! $chart->html() !!}
          </center>
        </div>
      </div>
        <div class="panel col-md-6 panel-default w3-mobile w3-right" style="width: 48%;line-height: 23%;">
        <div class="panel-heading" style="margin-left: -15px; margin-right: -15px; color: #1A20D9;">Clients Report (<font size="2">six months</font>)</div>
        <div class="panel-body" style="height: 400px;">             
          <center>
            {!! $line->html() !!}
          </center>
        </div>
      </div><br />
        
        <div class="panel col-md-6 panel-default w3-mobile w3-responsive" style="width: 48%; line-height: 23%;">
        <div class="panel-heading" style="margin-left: -15px; margin-right: -15px; color: #1A20D9;">Hold Leads (<font size="2">six months>)</div>
        <div class="panel-body" style="height: 400px;">             
          <center>
            {!! $donut2->html() !!}
          </center>
        </div>
      </div>
        <div class="panel col-md-6 panel-default w3-mobile w3-right" style="width: 48%;line-height: 23%;">
        <div class="panel-heading" style="margin-left: -15px; margin-right: -15px; color: #1A20D9;">Products Detail (<font size="2">six months</font>)</div>
        <div class="panel-body" style="height: 400px;">             
          <center>
            {!! $chart1->html() !!}
          </center>
        </div>
      </div><br/>

        <div class="panel col-md-6 panel-default w3-mobile" style="width: 48%; line-height: 23%;">
        <div class="panel-heading" style="margin-left: -15px; margin-right: -15px; color: #1A20D9;">Areaspline Chart</div>
        <div class="panel-body" style="height: 400px;">  
            {!! $areaspline_chart->html() !!}
        </div>
      </div>
    </div>
    {!! Charts::scripts() !!}
    {!! $chart->script() !!}
    
    {!! $line->script() !!}
    
    {!! $donut2->script() !!}
    {!! $chart1->script() !!}
    
    {!! $areaspline_chart->script() !!}

   @endif
  </div>
@endsection