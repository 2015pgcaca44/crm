<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>KPD CRM</title>
    <link rel="icon" type="image/ico" href="/images/logo-footer.png" height="50px" width="50px" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style type="text/css">
    
    body{
            width:100%;
        }
    .image {
          border-radius: 100%;
        }

    @media (max-width: 600px){
         .header{
         margin-top: -40px;
         }
         .mob_width{
          margin-left: -10px;px;
          width: 270px;
         }
         .marg_right{
          margin-left: -500px;
         }
    }
    @media (min-width: 1170px){
         .desk_width{
         margin-left: -100px;
         width: 730px;
         }
    }
    .pointer
    {
      cursor: pointer;
    }
    </style>
</head>

<body class="w3-mobile w3-light-grey">
    
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
   
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="js/sb-admin-2.min.js"></script>
    <div id="app" class="w3-mobile">
       
            <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark pmd-navbar pmd-z-depth" style="background-color: #00838f;">
            <div class="container w3-mobile">
                <div class="navbar-header w3-mobile">

                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <a class="navbar-brand" href="#">
                      
                        <div class="span4 header mob_width desk_width"><img class="pull-left" src="/images/logo-footer.png" height="40px;" width="40px;" style="margin-right: 10px; margin-top: -10px;">
                        <h3 style="margin-top: 0px; color: #fff;font-size: 20px;" nowrap="nowrap">kpdigiteers.com <font size="2" class="w3-mobile">(Welcome {{ Auth::user()->role }})</font></h3></div>
                    </a>
                </div>

                <div class="collapse navbar-collapse w3-responsive" id="app-navbar-collapse">
                   
                    
                    <div class="notification w3-mobile pointer" style="margin-top: 15px;">
                      
                        <?php 
                            $count=0;
                            $user_email = Auth::user()->email;
                            $role = Auth::user()->role;
                            if($role == "admin")
                            {
                              $new_user = User::where('notify_sts','=','1')->count();
                              $new_client = Customer::where('notify_sts','=','1')->count();
                              $new_lead = Campaign::where('notify_status','=','1')->count();
                              $new_sales = Sales::where('notify_sts','=','1')->count();
                              // DB::table('users')->where('id', Auth::user()->id)->update(['logout_time' => date("Y-m-d H:i:s")])->first();
                              if($new_user > 0)
                              {
                                $count++;
                              }
                              if($new_client > 0) {
                                $count++;
                              }
                              if($new_lead) {
                                $count++;
                              }
                              if($new_sales) {
                                $count++;
                              }
                            }elseif ($role == "client") {
                              $new_lead = Campaign::where('notify_status','=','1')->count();
                              $new_sales = Sales::where('notify_sts','=','1')->count();
                              if($new_sales) {
                                $count++;
                              }
                            }
                            else{
                              $new_lead_user = Campaign::where('notify_sts_user','=','1')->count();
                              $new_lead = Campaign::where('notify_status','=','1')->count();
                              $new_sales = Sales::where('notify_sts','=','1')->count();
                              if($new_lead_user) {
                                $count++;
                              }
                            }
                        ?>
                        <i class="fa fa-bell dropdown-toggle pointer" data-toggle="dropdown" area-label="Notifications" style="font-size:17px; color : white; height:25px; z-index: 999;" ><span class="w3-badge w3-red" nowrap="nowrap" style="font-size:15px;">{{ $count }}</span>
                        </i>
                          
                          <ul class="dropdown-menu" role="menu" style="margin-left: 980px;padding: 10px;width: 18%;">
                            <li style="background-color: #A5A0A9; color: #fff;margin-left: -10px;margin-top: -10px; margin-bottom: -10px; width: 110%; height: 40px;"><center><p>You have got total {{ $count }} notifications.</p></center></li>
                            <li style="width: 100%;">
                            <?php
                            if($role == "admin")
                            {
                            ?>
                                <a href="leads_admin" style="width: 90%;margin-top: 10px;">you have got new leads<span class="w3-badge w3-red" nowrap="nowrap" style="font-size:10px;">{{ $new_lead }}</span>
                                </a>
                              
                            </li>
                            
                            <li class="divider"></li>
                            <li style="width: 100%;">
                                <a href="clients_list">you have got new clients<span class="w3-badge w3-red" nowrap="nowrap" style="font-size:10px;">{{ $new_client }}</span></a>
                               
                            </li>
                            <li class="divider"></li>
                            <li style="width: 100%;">
                                <a href="user_list" style="width: 90%;">you have got new users<span class="w3-badge w3-red" nowrap="nowrap" style="font-size:10px;">{{ $new_user }}</span>
                                </a>
                                
                            </li>
                            <li class="divider"></li>
                            <li style="width: 100%;">
                                <a href="user_list" style="width: 90%;">you have got new sales<span class="w3-badge w3-red" nowrap="nowrap" style="font-size:10px;">{{ $new_sales }}</span>
                                </a>
                                
                            </li>
                          <?php }elseif ($role == "user") { ?>
                          <li>
                            <a href="leads_admin" style="width: 90%;margin-top: 10px;">you have got new leads<span class="w3-badge w3-red" nowrap="nowrap" style="font-size:10px;">{{ $new_lead_user }}</span>
                                </a>
                              </li>
                          <?php }elseif ($role == "client") { ?>
                          <li>
                            <a href="leads_clients" style="width: 90%;margin-top: 10px;">you have got new leads<span class="w3-badge w3-red" nowrap="nowrap" style="font-size:10px;">{{ $new_lead }}</span>
                                </a>
                              
                            </li>
                            
                            <li class="divider"></li>
                            <li style="width: 100%;">
                                <a href="user_list" style="width: 90%;">you have got new sales<span class="w3-badge w3-red" nowrap="nowrap" style="font-size:10px;">{{ $new_sales }}</span>
                                </a>
                                
                            </li>
                          <?php } ?>
                            <li class="divider"></li>
                            <li style="width: 100%;"><a href="tasks">you have got new task<span class="w3-badge w3-red" nowrap="nowrap" style="font-size:10px;">{{ $new_lead }}</span></a></li>
                          </ul>
                        <div class="emails w3-left">
                           
                            <img class="pull-left dropdown-toggle" data-toggle="dropdown" src="/images/email2.png" height="20px;" width="20px;" style="margin-left: 250px; z-index: 999;">
                            <span class="w3-badge w3-red" nowrap="nowrap" style="font-size:10px;color:#FD9191;margin-top: 5px;margin-right: 10px;">3</span>
                            
                            <ul class="dropdown-menu" role="menu" style="margin-left: 920px; padding: 10px; width: 18%;">
                                <li style="background-color: #A5A0A9; color: #fff;margin-left: -10px;margin-top: -10px; margin-bottom: -10px; width: 110%; height: 40px;"><center><p>You have 3 mails.</p></center></li>
                                <li class="divider"></li>
                                <li><a href="#">you have got new</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Something else here</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Separated link</a></li>
                            </ul>
                        </div>
                    </div>
                   
                    <ul class="nav navbar-nav navbar-right w3-mobile" style="margin-top: -55px;">
                     
                        @if (Auth::guest())

                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                            <?php 
                                $user_id = Auth::user()->id;
                                DB::table('users')->where('id', Auth::user()->id)->update(['logout_time' => date("Y-m-d H:i:s")])->first();
                            ?>
                        @else
                            <li class="dropdown w3-mobile" style="width: 150%;margin-top: 5px;">
                                <a href="#" class="dropdown-toggle marg_right" data-toggle="dropdown" role="button" aria-expanded="false" style="background-color: #00838f; margin-right: 10px;">
                                    
                                     <img class="pull-left" src="/images/admin.png" height="40px;" width="40px;" style="margin-right: 0px;">
                                   <h4 style="color: #fff; margin-right: -80px;">{{ Auth::user()->name }} <span class="caret" nowrap="nowrap"></span></h4>
                                </a> 
                          
                                <ul class="dropdown-menu" role="menu"  style="background-color: #515E58;margin-right: -40px; width: 100%;">
                                    <li class="nav-item">
                                        <a class="btn btn-sm" data-toggle="modal" data-target="#myprofile">
                                            <img class="pull-left" src="/images/profile.png" height="20px;" width="20px;"style="margin-top: 8px;"><h5 style="color: #fff;margin-right: 50px;">View Profile </h5>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="btn btn-sm" data-toggle="modal" data-target="#editpass">
                                            <h5 style="color: #fff;"><img class="pull-left" src="/images/password.png" height="15px;" width="15px;" style="margin-right: -10px;">Change Password</h5>
                                        </a>
                                    </li>
                                    <li>
                                        <?php 
                                            $user_id = Auth::user()->id;
                                            
                                        ?>
                                       
                                        <a href="/logout/{{$user_id}}">
                                       
                                            <h5 style="color: #fff;"><img class="pull-left" src="/images/logout.png" height="15px;" width="15px;" style="margin-right: 10px;">Logout</h5>
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                      
                                            {{ csrf_field() }}

                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
        <?php
        
        $login_email = Auth::user()->email ;
        $login_role = Auth::user()->role ;
        if($login_role!="admin")
        {
          if($login_role == "client")
          {
            $userRecord = Customer::where([['email','=',$login_email]])->first();
          }elseif($login_role == "user")
          {
            $userRecord = Sales::where([['email','=',$login_email]])->first();
          }
        }
        ?>
        <div class="modal" id="myprofile">
         <div class="modal-dialog" style="width: 30%;">
            <div class="modal-content">

               <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <center><img class="image" src="/images/user_profile.jpg" height="80" width="80"></img><br /><font color="green"><img src="/images/dot.png" height="10px;" width="10px;"> Online</font></center>
                  <center><font class="modal-title" size="4" style="color: #00838f;">{{ Auth::user()->name }}</font></center>
               </div>
               <div class="modal-body">
                  <div class="panel-body">
                     <form class="form-horizontal" method="post" action="{{url('insert_client')}}">
                        {{ csrf_field() }}
                       
                        <div class="container col-sm-12" style="width: 100%;">
                           <div class="form-group">
                              Email&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font size="2" style="margin-left: 50px;">{{ Auth::user()->email }}</font>
                           </div>
                           <div class="form-group">
                              Role&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font size="2" style="margin-left: 50px;">{{ Auth::user()->role }}</font>

                           </div>
                           @php
                           if($login_role!="admin")
                          {
                            @endphp
                           <div class="form-group">
                              Contact&nbsp;&nbsp;&nbsp;<font size="2" style="margin-left: 50px;">{{ $userRecord->phone }}</font>
                              
                           </div>
                            <div class="form-group">
                              Website&nbsp;&nbsp;<font size="2" style="margin-left: 50px;">{{ $userRecord->website }}</font>
                             
                           </div>
                           <div class="form-group">
                              Company<font size="2" style="margin-left: 50px;">{{ $userRecord->company }}</font>
                             
                           </div>
                           @php
                         }
                         @endphp
                            <div class="modal-footer">
                             
                               <button type="button" class="btn" data-dismiss="modal" style="background-color: #00838f;color: #fff;">Close</button>
                            </div>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="modal" id="editpass">
          <div class="modal-dialog">
            <div class="modal-content">

              <div class="modal-header">
                <font class="modal-title" size="5" style="color: #00838f;">Change Password</font>
                <button type="button" class="close" onclick="document.getElementById('editModal').style.display = 'none';" data-dismiss="modal">&times;</button>
              </div>

              <div class="modal-body">
                <div class="panel-body">
                      <form class="form-horizontal" method="POST" id="edituser" action="{{url('insert_users')}}">
                          {{ csrf_field() }}
                          {{ method_field('PUT') }}
                         
                          <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                              <label for="email" class="col-md-4 control-label">Old Password</label>

                              <div class="col-md-6">
                                  <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                  @if ($errors->has('email'))
                                      <span class="help-block">
                                          <strong>{{ $errors->first('email') }}</strong>
                                      </span>
                                  @endif
                              </div>
                          </div>

                          <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                              <label for="password" class="col-md-4 control-label">New Password</label>

                              <div class="col-md-6">
                                  <input id="password" type="password" class="form-control" name="password" required>

                                  @if ($errors->has('password'))
                                      <span class="help-block">
                                          <strong>{{ $errors->first('password') }}</strong>
                                      </span>
                                  @endif
                              </div>
                          </div>

                          <div class="form-group">
                              <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                              <div class="col-md-6">
                                  <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                              </div>
                          </div>
                          <div class="form-group">
                              <div class="modal-footer">
                                  <button type="submit" class="btn" style="background-color: #00838f; color: #fff;">Update</button>
                                  <button type="button" class="btn" onclick="document.getElementById('editModal').style.display = 'none';" data-dismiss="modal" style="background-color: #00838f; color: #fff;">Close</button>
                                
                              </div>
                          </div>
                      </form>
                  </div>
              </div>
           
            </div>
          </div>
      </div>    
        @yield('content')
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        $(document).ready(function(){
          $('[data-toggle="tooltip"]').tooltip();   
        });
        
        $(document).ready(function(){
          $('[data-toggle="tooltip1"]').tooltip();   
        });
    </script>
</body>

