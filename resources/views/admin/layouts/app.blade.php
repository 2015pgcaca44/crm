<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>kpdigiteers-crm</title>
  <link rel="icon" type="image/ico" href="./images/logo-footer.png" height="50px" width="50px" />
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="{{ asset("/AdminLTE-2.3.11/bootstrap/css/bootstrap.min.css") }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="{{ asset("/AdminLTE-2.3.11/dist/css/AdminLTE.min.css") }}">
  <link rel="stylesheet" href="{{ asset("/AdminLTE-2.3.11/dist/css/skins/skin-blue.min.css") }}">
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="bootstrap-4-dev/dist/css/bootstrap.css">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
  <script src="https://code.highcharts.com/highcharts.js"></script>
  <script src="https://code.highcharts.com/modules/data.js"></script>
  <script src="https://code.highcharts.com/modules/drilldown.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/justgage/1.2.9/justgage.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.1/raphael-min.js"></script>
  <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <style>
    hr {
      margin-top: 1rem;
      margin-bottom: 1rem;
      border: 0;
      border-top: 1px solid rgba(0, 0, 0, 0.2);
    }
    .img1 {
      border-radius: 65%;
    }
    aside img {
      -webkit-filter: grayscale(100%);
      filter: grayscale(100%);
    }
    aside img:hover {
      filter: none;
      -webkit-filter: none;
    }
    header img {
      -webkit-filter: grayscale(100%);
      filter: grayscale(100%);
    }
    header img:hover {
      filter: none;
      -webkit-filter: none;
    }
    @media (max-width: 600px){
       
       .align_col
       {
         margin-right: 60px;
         
       }
     }
  </style>
</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header" style="background-color: #4F6AF0;">

    <a href="#" class="logo" style="background-color: #4F6AF0; text-decoration: none;">
      <span class="logo-mini"><b>K</b>PD</span>
      <span class="logo-lg"><img class="pull-left" src="{{asset('images/logo-footer.png')}}" height="40px;" width="40px;"><b>kpdigiteers.</b>com</span>
    </a>

    <?php 
    use App\User;
    use App\Customer;
    use App\Campaign;
    use App\Sales;
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
    <nav class="navbar navbar-static-top" role="navigation" style="background-color: #fff; ">
      <a href="#" class="sidebar-toggle w3-hover-white" data-toggle="offcanvas" role="button" style="color: blue;">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o" style="color: black;"></i>
              <!-- <img src="/images/email2.png" height="15px;" width="15px;"> -->
              <span class="label label-success">4</span>
            </a>
            <ul class="dropdown-menu">
              <!-- <li class="header">You have 4 messages</li> -->
              <span class="label" style="color: black; font-size: 15px;">You have 4 messages</span><hr>
              <li>
                <ul class="menu">
                    <a href="#">
                      <div class="pull-left">
                        <img src="{{ asset("/AdminLTE-2.3.11/dist/img/user2-160x160.jpg") }}" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Support Team
                        <small><i class="fa fa-clock-o"></i> 5 mins</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="#">See All Messages</a></li>
            </ul>
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o" style="color: black;"></i>
              <!-- <img src="/images/notification.png" height="15px;" width="15px;"> -->
              <span class="label label-warning">{{ $count }}</span>
            </a>
            <ul class="dropdown-menu" style="padding: 10px;">
              <span class="label" style="color: black; font-size: 15px;">You have {{ $count }} notifications</span><hr>
              <li>
                <ul class="menu">
                   <?php
                            if($role == "admin")
                            {
                            ?>
                            <li>
                           
                                <a href="leads_admin" s>you have got new leads
                                <span class="label pull-right label-danger">{{ $new_lead }}</span>
                                </a>
                              
                            </li>
                            
                            <!-- <li class="divider"></li> -->
                            <li>
                                <a href="clients_list">you have got new clients
                                <span class="label pull-right label-danger">{{ $new_client }}</span></a>
                               
                            </li>
                            <!-- <li class="divider"></li> -->
                            <li>
                                <a href="user_list">you have got new users
                                <span class="label pull-right label-danger">{{ $new_user }}</span>
                                </a>
                                
                            </li>
                            <!-- <li class="divider"></li> -->
                            <li>
                                <a href="user_list">you have got new sales
                                <span class="label pull-right label-danger">{{ $new_sales }}</span>
                                </a>
                                
                            </li>
                          <?php }elseif ($role == "user") { ?>
                          <li>
                            <a href="leads_admin">you have got new leads
                                <span class="label pull-right label-danger">{{ $new_lead_user }}</span>
                                </a>
                              </li>
                          <?php }elseif ($role == "client") { ?>
                          <li>
                            <a href="leads_clients">you have got new leads
                                <span class="label pull-right label-danger">{{ $new_lead }}</span>
                                </a>
                              
                            </li>
                            
                            <!-- <li class="divider"></li> -->
                            <li>
                                <a href="user_list">you have got new sales
                                <span class="label pull-right label-danger">{{ $new_sales }}</span>
                                </a>
                                
                            </li>
                          <?php } ?>
                            <!-- <li class="divider"></li> -->
                            <li><a href="tasks">you have got new task
                                <span class="label pull-right label-danger">{{ $new_lead }}</span></a>
                              </li>
                </ul>
              </li>
              <li class="footer"><a href="#">View all</a></li>
            </ul>
          </li>
          <!-- <li class="dropdown tasks-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-flag-o"></i>
              <span class="label label-danger">9</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 9 tasks</li>
              <li>
                <ul class="menu">
                    <a href="#">
                      <h3>
                        Design some buttons
                        <small class="pull-right">20%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">20% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                </ul>
                  </li>
                  <li class="footer">
                    <a href="#">View all tasks</a>
                  </li> -->
           <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" href="#userprofile" aria-controls="userprofile">
              <img class="pull-left img1" src="{{ asset("/images/admin.png") }}" height="40px;" width="40px;" class="user-image" alt="User Image" style="margin-top: -10px;">
              <span class="hidden-xs" style="color: blue;"><b>{{ Auth::user()->name }}</b></span>
              <i class="fa fa-angle-down pull-right" aria-hidden="true" style="color:black;"></i></span>
            </a>
            <ul class="dropdown w3-mobile" id="userprofile">
                     
                        @if (Auth::guest())

                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                            <?php 
                                $user_id = Auth::user()->id;
                                DB::table('users')->where('id', Auth::user()->id)->update(['logout_time' => date("Y-m-d H:i:s")])->first();
                            ?>
                        @else
                            <div class="dropdown w3-mobile align_col">
                                 
                          
                                <ul class="dropdown-menu" role="menu"  style="background-color: #515E58;margin-right: -50px; width: 110%;">
                                    <li class="nav-item">
                                        <a class="btn btn-sm" data-toggle="modal" data-target="#myprofile">
                                            <img class="pull-left" src="./images/profile.png" height="20px;" width="20px;"style="margin-top: 8px;"><h5 style="color: #fff;margin-right: 50px;">View Profile </h5>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="btn btn-sm" data-toggle="modal" data-target="#editpass">
                                            <h5 style="color: #fff;"><img class="pull-left" src="./images/password.png" height="15px;" width="15px;" style="margin-right: -10px;">Change Password</h5>
                                        </a>
                                    </li>
                                    <li>
                                        <?php 
                                            $user_id = Auth::user()->id;
                                            
                                        ?>
                                        <a href="./logout/{{$user_id}}">
                                        <!--<a href="{{ url('/logout/$user_id') }}">-->
                                       
                                            <h5 style="color: #fff;"><img class="pull-left" src="./images/logout.png" height="15px;" width="15px;" style="margin-right: 10px;">Logout</h5>
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                      
                                            {{ csrf_field() }}

                                        </form>
                                    </li>
                                </ul>
                            </div>
                        @endif
                    </ul>
           <!-- <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="{{ asset("/AdminLTE-2.3.11/dist/img/user2-160x160.jpg") }}" class="user-image" alt="User Image">
              <span class="hidden-xs">Alexander Pierce</span>
            </a>

            <ul class="dropdown-menu">
              <li class="user-header">
                <img src="{{ asset("/AdminLTE-2.3.11/dist/img/user2-160x160.jpg") }}" class="img-circle" alt="User Image">
                <p>
                  Alexander Pierce - Web Developer
                  <small>Member since Nov. 2012</small>
                </p>
              </li>
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">Followers</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Sales</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                  </div>
                </div>
              </li>
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="#" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul> -->
          </li>
          <!-- <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li> -->
        </ul>
      </div>
    </nav>

  </header>
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
         <div class="modal-dialog w3-mobile" style="width: 30%;">
            <div class="modal-content w3-mobile">

               <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <center>
                  <img class="image" src="./images/user_profile.jpg" height="80" width="80">
                  <br />
                  <font color="green">
                    <img src="./images/dot.png" height="10px;" width="10px;"> Online</font>
                </center>
                  <center><font class="modal-title" size="4" style="color: #4F6AF0;">{{ Auth::user()->name }}</font></center>
               </div>
               <div class="modal-body w3-mobile">
                  <div class="panel-body w3-mobile">
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
                             
                               <button type="button" class="btn" data-dismiss="modal" style="background-color: #4F6AF0; color: #fff;">Close</button>
                            </div>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="modal" id="editpass">
          <div class="modal-dialog w3-mobile">
            <div class="modal-content w3-mobile">

              <div class="modal-header">
                <font class="modal-title" size="5" style="color: #4F6AF0;">Change Password</font>
                <button type="button" class="close" onclick="document.getElementById('editModal').style.display = 'none';" data-dismiss="modal">&times;</button>
              </div>

              <div class="modal-body w3-mobile">
                <div class="panel-body w3-mobile">
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
                                  <button type="submit" class="btn btn-primary">Update</button>
                                  <button type="button" class="btn btn-primary" onclick="document.getElementById('editModal').style.display = 'none';" data-dismiss="modal" >Close</button>
                                
                              </div>
                          </div>
                      </form>
                  </div>
              </div>
           
            </div>
          </div>
      </div>  
  <aside class="main-sidebar" style="background-color: #4F6AF0;">
    <section class="sidebar" style="background-color: #4F6AF0;">
      <div class="user-panel">
        <div class="pull-left image">
          <img class="pull-left img1" src="{{ asset("/images/admin.png") }}" height="70px;" width="70px;" class="user-image" alt="User Image">
              <span class="hidden-xs">
        </div>
        <div class="pull-left info">
          <p>welcome {{ Auth::user()->role }}</p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- search form (Optional) -->
      <!-- <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form> -->
      <!-- /.search form -->

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu">
        <!-- <li class="header">HEADER</li> -->
        <!-- Optionally, you can add icons to the links -->
        <!-- <li class="active"><a href="#"><i class="fa fa-link"></i> <span>Link</span></a></li>
        <li><a href="#"><i class="fa fa-link"></i> <span>Another Link</span></a></li>
        <li class="treeview">
          <a href="#"><i class="fa fa-link"></i> <span>Multilevel</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#">Link in level 2</a></li>
            <li><a href="#">Link in level 2</a></li>
          </ul>
        </li> -->
        <hr / style="border-color: #6094BC;">
        <?php $role = Auth::user()->role; ?>

         @if($role == "admin")
         <li>
            
            <a href="./home">
               <img class="pull-left" src="./images/home.png" height="20px;" width="20px;" style="margin-right: 10px;">
               
               <span style="color: #fff;">Home</span>
            </a>
         </li>
         <li class="treeview">
              <a href="#"><img class="pull-left" src="./images/sales.png" height="20px;" width="20px;" style="margin-right: 10px;"><span style="color: #fff;">Sales</span><span class="pull-right-container">
              <i class="fa fa-angle-left pull-right" style="font-size: 20px;"></i>
            </span>
               <!-- <span class="media-body">Stared</span> -->
            </a>
            <ul class="treeview-menu">
               <li class="nav-item">
                  <a href="./add_sales">
                     <img class="pull-left" src="./images/salesman.png" height="20px;" width="20px;" style="margin-right: 10px;"><span style="color: #fff;">Add Salesman</span>
                     <!-- <span class="media-body">Sent Email</span> -->
                  </a>
               </li>
               <li class="nav-item">
                  <a href="./sales_list">
                     <img class="pull-left" src="./images/sales.png" height="20px;" width="20px;" style="margin-right: 10px;">Sales List
                     <!-- <span class="media-body">Sent Email</span> -->
                  </a>
               </li>
               <li class="nav-item">
                  <a href="./get_assign_task">
                     <!-- <img class="pull-left" src="/images/assign task.png" height="20px;" width="20px;" style="margin-right: 10px;">-->                     
                     <i class="fa fa-tasks" aria-hidden="true" style="color: white;margin-right: 10px;"></i>Assign Task
                     <!-- <span class="media-body">Sent Email</span> -->
                  </a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="./tasks">
                     <img class="pull-left" src="./images/lists.png" height="20px;" width="20px;" style="margin-right: 10px;">All Task
                     <!-- <span class="media-body">Sent Email</span> -->
                  </a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="./tasks_pending">
                     <img class="pull-left" src="./images/pending.png" height="20px;" width="20px;" style="margin-right: 10px;">Pending Task
                     <!-- <span class="media-body">Sent Email</span> -->
                  </a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="./tasks_completed">
                     <img class="pull-left" src="./images/complete.png" height="20px;" width="20px;" style="margin-right: 10px;">Coverted Task
                     <!-- <span class="media-body">Sent Email</span> -->
                  </a>
               </li>
            </ul>
         </li>
         <li class="treeview">
            <a href="#"><img class="pull-left" src="./images/marketing.png" height="20px;" width="20px;" style="margin-right: 10px;"><span style="color: #fff;">Marketing </span><span class="pull-right-container">
              <i class="fa fa-angle-left pull-right" style="font-size: 20px;"></i>
            </span>
               <!-- <span class="media-body">Inbox</span>
                  <i class="material-icons md-light ml-2 pmd-sm">more_vert</i> -->
            </a>
            <ul class="treeview-menu">
               <li class="nav-item">
                  <a class="nav-link active"  href="./leads_admin">
                     <img class="pull-left" src="./images/leads.png" height="20px;" width="20px;" style="margin-right: 10px;">Our Leads
                  </a>
               </li>
               <li class="nav-item">
                  <a class="nav-link active"  href="./leads_admin_business">
                     <img class="pull-left" src="./images/leads.png" height="20px;" width="20px;" style="margin-right: 10px;">Business Leads
                  </a>
               </li>
            </ul>
         </li>
         <li class="treeview">
            <a href="#">
               <img class="pull-left" src="./images/clients.png" height="20px;" width="20px;" style="margin-right: 10px;"><span style="color: #fff;">Clients</span><span class="pull-right-container">
              <i class="fa fa-angle-left pull-right" style="font-size: 20px;"></i>
            </span>
               <!-- <span class="media-body">Inbox</span>
                  <i class="material-icons md-light ml-2 pmd-sm">more_vert</i> -->
            </a>
            <ul class="treeview-menu">
               <li class="nav-item">
                  <a class="nav-link" href="./add_clients">
                     <img class="pull-left" src="./images/user.png" height="20px;" width="20px;" style="margin-right: 10px;">Add Clients
                     <!-- <span class="media-body">Sent Email</span> -->
                  </a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="./clients_list">
                     <img class="pull-left" src="./images/clients.png" height="20px;" width="20px;" style="margin-right: 10px;">Our Clients
                     <!-- <span class="media-body">Sent Email</span> -->
                  </a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="./clients_list_business">
                     <img class="pull-left" src="./images/business_clients.png" height="20px;" width="20px;" style="margin-right: 10px;">Business Clients
                     <!-- <span class="media-body">Sent Email</span> -->
                  </a>
               </li>
            </ul>
         </li>
         <li>
            <a class="nav-link active" href="./user_list">
               <img class="pull-left" src="./images/users.png" height="20px;" width="20px;" style="margin-right: 10px;"><span style="color: #fff;">Users</span>
               <!-- <span class="media-body">Stared</span> -->
            </a>
         </li>
         <li class="treeview">
            <a href="#">
               <img class="pull-left" src="./images/setting.png" height="20px;" width="20px;" style="margin-right: 10px;"><span style="color: #fff;">Setting</span><span class="pull-right-container">
              <i class="fa fa-angle-left pull-right" style="font-size: 20px;"></i>
            </span>
               <!-- <span class="media-body">Inbox</span>
                  <i class="material-icons md-light ml-2 pmd-sm">more_vert</i> -->
            </a>
            <ul class="treeview-menu">
               <li class="nav-item">
                  <a class="" data-toggle="modal" data-target="#editpass">
                     <img class="pull-left" src="./images/password.png" height="15px;" width="15px;" style="margin-right: 10px;">Change Password
                     <!-- <span class="media-body">Sent Email</span> -->
                  </a>
               </li>
               <li class="nav-item">
                  <?php 
                     $user_id = Auth::user()->id;
                     
                     ?>
                  <!-- <a href="{{ route('logout') }}"
                     onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();"> -->
                  <a href="./logout/{{$user_id}}">
                     <!-- <a href="logout/{{$user_id}}"
                        onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();"> -->
                     <img class="pull-left" src="./images/logout.png" height="15px;" width="15px;" style="margin-right: 10px;">Logout
                  </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                     <!-- <form id="logout-form" action="{{ route('logout',$user_id) }}" method="POST" style="display: none;"> -->
                     {{ csrf_field() }}
                  </form>
               </li>
              
            </ul>
         </li>
      </ul>
      <ul>
         @elseif($role == "user")
         <?php 
            $user_email = Auth::user()->email;
            $client_id = \App\Customer::where(['email' => $user_email])->pluck('id');
            ?>
         <li class="nav-item">
            <a class="nav-link active" href="./task_list/{{$client_id}}">
               <img class="pull-left" src="./images/tasks.png" height="20px;" width="20px;" style="margin-right: 10px;"> Tasks
               <!-- <span class="media-body">Stared</span> -->
            </a>
         </li>
         <li class="nav-item">
            <a class="nav-link active" href="./leads_user/{{$client_id}}">
               <img class="pull-left" src="./images/opportunity.png" height="18px;" width="18px;" style="margin-right: 7px;" nowrap="nowrap"><span style="color: #fff;">Opportunities</span>
            </a>
         </li>
         <li class="nav-item">
            <a class="nav-link active" href="./completed/{{$client_id}}">
               <img class="pull-left" src="./images/done.png" height="20px;" width="20px;" style="margin-right: 10px;"><span style="color: #fff;">Convinced</span>
            </a>
         </li>
         <li class="nav-item">
            <a class="nav-link active"  href="./leads_user/{{$client_id}}">
               <img class="pull-left" src="./images/leads.png" height="20px;" width="20px;" style="margin-right: 10px;"><span style="color: #fff;">Lead Report</span>
            </a>
         </li>
         <li class="treeview">
            <a class="nav-link" data-toggle="collapse" href="#setting" role="button" aria-expanded="true" aria-controls="setting">
               <img class="pull-left" src="./images/setting.png" height="20px;" width="20px;" style="margin-right: 10px;"><span style="color: #fff;">Setting</span><span class="pull-right-container">
              <i class="fa fa-angle-left pull-right" style="font-size: 20px;"></i>
            </span>
              
            </a>
            <ul class="treeview-menu">
               <li class="nav-item" style="margin-left: 10px;">
                  <a class="" data-toggle="modal" data-target="#editpass">
                     <img class="pull-left" src="./images/password.png" height="15px;" width="15px;" style="margin-right: 10px;">Change Password
                     
                  </a>
               </li>
               <li class="nav-item" style="margin-left: 10px;">
                  <?php 
                     $user_id = Auth::user()->id;
                     
                     ?>
                  
                  <a href="./logout/{{$user_id}}">
                     
                     <img class="pull-left" src="./images/logout.png" height="15px;" width="15px;" style="margin-right: 10px;">Logout
                  </a>
                  <form id="logout-form" action="" method="POST" style="display: none;">
                     {{ route('logout') }}
                     {{ csrf_field() }}
                  </form>
               </li>
               
            </ul>
         </li>
         <br />
      </ul>
      <ul class="nav flex-column pmd-sidebar-nav">
         @elseif($role == "client")
         <li class="nav-item">
            <!-- <a class="nav-link active" href="/dashboard"> -->
            <a href="./home">
               <img class="pull-left" src="./images/home.png" height="20px;" width="20px;" style="margin-right: 10px;"><span style="color: #fff;">Home</span>
               <!-- <span class="media-body">Stared</span> -->
            </a>
         </li>
         <li class="treeview">
               <a href="#"><img class="pull-left" src="./images/sales.png" height="20px;" width="20px;" style="margin-right: 10px;"><span style="color: #fff;">Sales</span><span class="pull-right-container">
              <i class="fa fa-angle-left pull-right" style="font-size: 20px;"></i>
            </span>
               <!-- <span class="media-body">Stared</span> -->
            </a>
            <ul class="treeview-menu">
               <li class="nav-item">
                  <a class="nav-link" href="./add_sales_client" role="button">
                     <img class="pull-left" src="./images/salesman.png" height="20px;" width="20px;" style="margin-right: 10px;">Add Salesman
                     <!-- <span class="media-body">Sent Email</span> -->
                  </a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="./client_sales_list" role="button">
                     <img class="pull-left" src="./images/sales.png" height="20px;" width="20px;" style="margin-right: 10px;">Sales List
                     <!-- <span class="media-body">Sent Email</span> -->
                  </a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="./client_tasks" role="button">
                     <img class="pull-left" src="./images/lists.png" height="20px;" width="20px;" style="margin-right: 10px;">All Task
                     <!-- <span class="media-body">Sent Email</span> -->
                  </a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="./client_tasks_pending" role="button">
                     <img class="pull-left" src="./images/pending.png" height="20px;" width="20px;" style="margin-right: 10px;">Pending Task
                     <!-- <span class="media-body">Sent Email</span> -->
                  </a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="./client_tasks_completed" role="button">
                     <img class="pull-left" src="./images/complete.png" height="20px;" width="20px;" style="margin-right: 10px;">Coverted Task
                     <!-- <span class="media-body">Sent Email</span> -->
                  </a>
               </li>
            </ul>
         </li>
         <li class="treeview">
               <a href="#"><img class="pull-left" src="./images/marketing.png" height="20px;" width="20px;" style="margin-right: 10px;"><span style="color: #fff;">Marketing</span><span class="pull-right-container">
              <i class="fa fa-angle-left pull-right" style="font-size: 20px;"></i>
            </span>
               <!-- <span class="media-body">Inbox</span>
                  <i class="material-icons md-light ml-2 pmd-sm">more_vert</i> -->
            </a>
            <ul class="treeview-menu">
               <li class="nav-item">
                  <a class="nav-link active"  href="./leads_clients">
                     <img class="pull-left" src="./images/leads.png" height="20px;" width="20px;" style="margin-right: 10px;"><span style="color: #fff;">Leads</span>
                  </a>
               </li>
            </ul>
         </li>
         <li class="treeview">
            <a href="#"><img class="pull-left" src="./images/setting.png" height="20px;" width="20px;" style="margin-right: 10px;"><span style="color: #fff;">Setting</span><span class="pull-right-container">
              <i class="fa fa-angle-left pull-right" style="font-size: 20px;"></i>
            </span>
               <!-- <span class="media-body">Inbox</span>
                  <i class="material-icons md-light ml-2 pmd-sm">more_vert</i> -->
            </a>
            <ul class="treeview-menu">
               <li class="nav-item">
                  <a class="" data-toggle="modal" data-target="#editpass">
                     <img class="pull-left" src="./images/password.png" height="15px;" width="15px;" style="margin-right: 10px;">Change Password
                     <!-- <span class="media-body">Sent Email</span> -->
                  </a>
               </li>
               <li class="nav-item">
                  <?php 
                     $user_id = Auth::user()->id;
                     
                     ?>
                  <!-- <a href="{{ route('logout') }}"
                     onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();"> -->
                  <a href="./logout/{{$user_id}}">
                     <!-- <a href="logout/{{$user_id}}"
                        onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();"> -->
                     <img class="pull-left" src="./images/logout.png" height="15px;" width="15px;" style="margin-right: 10px;">Logout
                  </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                     <!-- <form id="logout-form" action="{{ route('logout',$user_id) }}" method="POST" style="display: none;"> -->
                     {{ csrf_field() }}
                  </form>
               </li>
              @endif
            </ul>
         </li>
      </ul>
    </section>

  </aside>

  <div class="content-wrapper">
    <section class="content-header">
      @yield('content')
      <!-- <h1>
        Page Header
        <small>Optional description</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
      </ol> -->
    </section>
    <section class="content">
    </section>
  </div>
</div>
<script src="{{ asset("/AdminLTE-2.3.11/plugins/jQuery/jquery-2.2.3.min.js") }}"></script>
<script src="{{ asset("/AdminLTE-2.3.11/bootstrap/js/bootstrap.min.js") }}"></script>
<script src="{{ asset("/AdminLTE-2.3.11/dist/js/app.min.js") }}"></script>

</body>
</html>