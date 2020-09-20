<head>
   
      <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <link rel="stylesheet" href="bootstrap-4-dev/dist/css/bootstrap.css">
      <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
      <!-- <script src="//code.jquery.com/jquery-1.11.1.min.js"></script> -->
      <!-- <script src='https://kit.fontawesome.com/a076d05399.js'></script> -->
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
      a {
      color: #f00;
      }
      aside:hover,ul:hover,li:hover{
      background-color: #000;
      }
        nev{
            width:25%;
            height:100%;
        }


    @media (min-width: 1170px){
        .dropdown_width{
        width: 18%;
        padding-bottom: 10px;
        }
    }
    @media (max-width: 600px){
         .hide_menu{
         display: none;
         }
    }
    @media (max-width: 600px){
         .width_mob{
         margin-top: -65px;
         margin-right: 50px;
         }

         /*section{
            margin-bottom: 5px;
         }*/
    }
    @media (min-width: 1170px){
         .align_menu{
         text-align:left;
         margin-top: 65px;
         }
    }
   </style>
</head>
<!-- <div class="card"> -->
<!-- <div class="w3-bar w3-mobile align_menu"> -->
<a href="javascript:void(0)" class="w3-bar-item w3-button w3-right w3-hide-large w3-hide-medium width_mob" onclick="myFunction()" style="margin-top: -80px; color: #fff;">&#9776;</a>
<section id="pmd-main" class="w3-bar-item w3-mobile hide_menu sidebar" style="background-color: #2F453B;height: 700px !important;width: 100%; !important;margin-top: -22px">

   <aside id="basicSidebar" class="pmd-sidebar pmd-z-depth w3-mobile" role="navigation">
      <ul class="nav flex-column pmd-sidebar-nav">
         <?php $role = Auth::user()->role; ?>

         @if($role == "admin")
         <li class="nav-item">
            <!-- <a class="nav-link active" href="/dashboard"> -->
            <a class="nav-link active" href="./home">
               <h4 class="" style="color: #fff;"><img class="pull-left" src="./images/home.png" height="20px;" width="20px;" style="margin-right: 10px;"> Home</h4>
               <!-- <span class="media-body">Stared</span> -->
            </a>
         </li>
         <li class="nav-item">
            <a class="nav-link active" data-toggle="collapse" href="#sales" role="button" aria-expanded="true" aria-controls="sales">
               <h4 class="" style="color: #fff;"><img class="pull-left" src="./images/sales.png" height="20px;" width="20px;" style="margin-right: 10px;"> Sales<span class="caret" style="float: right;margin-top: 8px;"></span></h4>
               <!-- <span class="media-body">Stared</span> -->
            </a>
            <ul class="collapse" id="sales" data-parent="#basicSidebar">
               <li class="nav-item">
                  <a class="nav-link" href="./add_sales" role="button">
                     <h6 style="color: #fff;"><img class="pull-left" src="./images/salesman.png" height="20px;" width="20px;" style="margin-right: 10px;">Add Salesman</h6>
                     <!-- <span class="media-body">Sent Email</span> -->
                  </a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="./sales_list" role="button">
                     <h6 style="color: #fff;"><img class="pull-left" src="./images/sales.png" height="20px;" width="20px;" style="margin-right: 10px;">Sales List</h6>
                     <!-- <span class="media-body">Sent Email</span> -->
                  </a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="./tasks" role="button">
                     <h6 style="color: #fff;"><img class="pull-left" src="./images/lists.png" height="20px;" width="20px;" style="margin-right: 10px;">All Task</h6>
                     <!-- <span class="media-body">Sent Email</span> -->
                  </a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="./tasks_pending" role="button">
                     <h6 style="color: #fff;"><img class="pull-left" src="./images/pending.png" height="20px;" width="20px;" style="margin-right: 10px;">Pending Task</h6>
                     <!-- <span class="media-body">Sent Email</span> -->
                  </a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="./tasks_completed" role="button">
                     <h6 style="color: #fff;"><img class="pull-left" src="./images/complete.png" height="20px;" width="20px;" style="margin-right: 10px;">Coverted Task</h6>
                     <!-- <span class="media-body">Sent Email</span> -->
                  </a>
               </li>
            </ul>
         </li>
         <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#marketing" role="button" aria-expanded="true" aria-controls="marketing">
               <h4 style="color: #fff;"><img class="pull-left" src="./images/marketing.png" height="20px;" width="20px;" style="margin-right: 10px;">Marketing <span class="caret" style="float: right;margin-top: 8px;"></span></h4>
               <!-- <span class="media-body">Inbox</span>
                  <i class="material-icons md-light ml-2 pmd-sm">more_vert</i> -->
            </a>
            <ul class="collapse" id="marketing" data-parent="#basicSidebar">
               <li class="nav-item">
                  <a class="nav-link active"  href="./leads_admin">
                     <h6 style="color: #fff;"><img class="pull-left" src="./images/leads.png" height="20px;" width="20px;" style="margin-right: 10px;">Our Leads</h6>
                  </a>
               </li>
               <li class="nav-item">
                  <a class="nav-link active"  href="./leads_admin_business">
                     <h6 style="color: #fff;"><img class="pull-left" src="./images/leads.png" height="20px;" width="20px;" style="margin-right: 10px;">BusinessLeads</h6>
                  </a>
               </li>
            </ul>
         </li> 
         <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#client" role="button" aria-expanded="true" aria-controls="client">
               <h4 style="color: #fff;"><img class="pull-left" src="./images/clients.png" height="20px;" width="20px;" style="margin-right: 10px;">Clients <span class="caret" style="float: right;margin-top: 8px;"></span></h4>
               <!-- <span class="media-body">Inbox</span>
                  <i class="material-icons md-light ml-2 pmd-sm">more_vert</i> -->
            </a>
            <ul class="collapse" id="client" data-parent="#basicSidebar">
               <li class="nav-item">
                  <a class="nav-link" href="./add_clients">
                     <h6 style="color: #fff;"><img class="pull-left" src="./images/user.png" height="20px;" width="20px;" style="margin-right: 10px;">Add Clients</h6>
                     <!-- <span class="media-body">Sent Email</span> -->
                  </a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="clients_list" role="button">
                     <h6 style="color: #fff;"><img class="pull-left" src="./images/clients.png" height="20px;" width="20px;" style="margin-right: 10px;">Our Clients</h6>
                     <!-- <span class="media-body">Sent Email</span> -->
                  </a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="./clients_list_business" role="button">
                     <h6 style="color: #fff;"><img class="pull-left" src="./images/business_clients.png" height="20px;" width="20px;" style="margin-right: 10px;">Business Clients</h6>
                     <!-- <span class="media-body">Sent Email</span> -->
                  </a>
               </li>
            </ul>
         </li>
         <li class="nav-item">
            <a class="nav-link active" href="./user_list">
               <h4 class="" style="color: #fff;"><img class="pull-left" src="./images/users.png" height="20px;" width="20px;" style="margin-right: 10px;"> Users</h4>
               <!-- <span class="media-body">Stared</span> -->
            </a>
         </li>
         <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#setting1" role="button" aria-expanded="true" aria-controls="setting1">
               <h4 style="color: #fff;"><img class="pull-left" src="./images/setting.png" height="20px;" width="20px;" style="margin-right: 10px;">Setting<span class="caret" style="float: right;margin-top: 8px;"></span></h4>
               <!-- <span class="media-body">Inbox</span>
                  <i class="material-icons md-light ml-2 pmd-sm">more_vert</i> -->
            </a>
            <ul class="collapse" id="setting1" data-parent="#basicSidebar">
               <li class="nav-item" style="margin-left: -25px;">
                  <a class="btn btn-sm" data-toggle="modal" data-target="#editpass">
                     <h6 style="color: #fff;"><img class="pull-left" src="./images/password.png" height="15px;" width="15px;" style="margin-right: 10px;">Change Password</h6>
                     <!-- <span class="media-body">Sent Email</span> -->
                  </a>
               </li>
               <li class="nav-item" style="margin-left: -10px;">
                  <?php 
                     $user_id = Auth::user()->id;
                     
                     ?>
                   <a href="{{ route('logout') }}"
                     onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                  <!--<a href="/logout/{{$user_id}}">-->
                     <!-- <a href="logout/{{$user_id}}"
                        onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();"> -->
                     <h6 style="color: #fff;"><img class="pull-left" src="./images/logout.png" height="15px;" width="15px;" style="margin-right: 10px;">Logout</h6>
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
               <h4 class="" style="color: #fff;"><img class="pull-left" src="./images/tasks.png" height="20px;" width="20px;" style="margin-right: 10px;"> Tasks</h4>
               <!-- <span class="media-body">Stared</span> -->
            </a>
         </li>
         <li class="nav-item">
            <a class="nav-link active" href="./leads_user/{{$client_id}}">
               <h4 class="" style="color: #fff;"><img class="pull-left" src="./images/opportunity.png" height="18px;" width="18px;" style="margin-right: 7px;" nowrap="nowrap"> Opportunities</h4>
            </a>
         </li>
         <li class="nav-item">
            <a class="nav-link active" href="./completed/{{$client_id}}">
               <h4 class="" style="color: #fff;"><img class="pull-left" src="./images/done.png" height="20px;" width="20px;" style="margin-right: 10px;"> Convinced</h4>
               
            </a>
         </li>
         <li class="nav-item">
            <a class="nav-link active"  href="./leads_user/{{$client_id}}">
               <h4 style="color: #fff;"><img class="pull-left" src="./images/leads.png" height="20px;" width="20px;" style="margin-right: 10px;">Lead Report</h4>
            </a>
         </li>
         <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#setting" role="button" aria-expanded="true" aria-controls="setting">
               <h4 style="color: #fff;"><img class="pull-left" src="./images/setting.png" height="20px;" width="20px;" style="margin-right: 10px;">Setting<span class="caret" style="float: right;margin-top: 8px;"></span></h4>
              
            </a>
            <ul class="collapse" id="setting" data-parent="#basicSidebar">
               <li class="nav-item" style="margin-left: -25px;">
                  <a class="btn btn-sm" data-toggle="modal" data-target="#editpass">
                     <h6 style="color: #fff;"><img class="pull-left" src="./images/password.png" height="15px;" width="15px;" style="margin-right: 10px;">Change Password</h6>
                     
                  </a>
               </li>
               <li class="nav-item" style="margin-left: -10px;">
                  <?php 
                     $user_id = Auth::user()->id;
                     
                     ?>
                  <!--<a href="{{ route('logout') }}"
                     onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">-->
                  <a href="./logout/{{$user_id}}">
                     
                     <h6 style="color: #fff;"><img class="pull-left" src="./images/logout.png" height="15px;" width="15px;" style="margin-right: 10px;">Logout</h6>
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
            <a class="nav-link active" href="./home">
               <h4 class="" style="color: #fff;"><img class="pull-left" src="./images/home.png" height="20px;" width="20px;" style="margin-right: 10px;"> Home</h4>
               <!-- <span class="media-body">Stared</span> -->
            </a>
         </li>
         <li class="nav-item">
            <a class="nav-link active" data-toggle="collapse" href="#sales" role="button" aria-expanded="true" aria-controls="sales">
               <h4 class="" style="color: #fff;"><img class="pull-left" src="./images/sales.png" height="20px;" width="20px;" style="margin-right: 10px;"> Sales<span class="caret" style="float: right;margin-top: 8px;"></span></h4>
               <!-- <span class="media-body">Stared</span> -->
            </a>
            <ul class="collapse" id="sales" data-parent="#basicSidebar">
               <li class="nav-item">
                  <a class="nav-link" href="./add_sales_client" role="button">
                     <h6 style="color: #fff;"><img class="pull-left" src="./images/salesman.png" height="20px;" width="20px;" style="margin-right: 10px;">Add Salesman</h6>
                     <!-- <span class="media-body">Sent Email</span> -->
                  </a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="./client_sales_list" role="button">
                     <h6 style="color: #fff;"><img class="pull-left" src="./images/sales.png" height="20px;" width="20px;" style="margin-right: 10px;">Sales List</h6>
                     <!-- <span class="media-body">Sent Email</span> -->
                  </a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="./client_tasks" role="button">
                     <h6 style="color: #fff;"><img class="pull-left" src="./images/lists.png" height="20px;" width="20px;" style="margin-right: 10px;">All Task</h6>
                     <!-- <span class="media-body">Sent Email</span> -->
                  </a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="./client_tasks_pending" role="button">
                     <h6 style="color: #fff;"><img class="pull-left" src="./images/pending.png" height="20px;" width="20px;" style="margin-right: 10px;">Pending Task</h6>
                     <!-- <span class="media-body">Sent Email</span> -->
                  </a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="./client_tasks_completed" role="button">
                     <h6 style="color: #fff;"><img class="pull-left" src="./images/complete.png" height="20px;" width="20px;" style="margin-right: 10px;">Coverted Task</h6>
                     <!-- <span class="media-body">Sent Email</span> -->
                  </a>
               </li>
            </ul>
         </li>
         <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#marketing" role="button" aria-expanded="true" aria-controls="marketing">
               <h4 style="color: #fff;"><img class="pull-left" src="./images/marketing.png" height="20px;" width="20px;" style="margin-right: 10px;">Marketing <span class="caret" style="float: right;margin-top: 8px;"></span></h4>
               <!-- <span class="media-body">Inbox</span>
                  <i class="material-icons md-light ml-2 pmd-sm">more_vert</i> -->
            </a>
            <ul class="collapse" id="marketing" data-parent="#basicSidebar">
               <li class="nav-item">
                  <a class="nav-link active"  href="./leads_clients">
                     <h6 style="color: #fff;"><img class="pull-left" src="./images/leads.png" height="20px;" width="20px;" style="margin-right: 10px;">Leads</h6>
                  </a>
               </li>
            </ul>
         </li>
         <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#setting1" role="button" aria-expanded="true" aria-controls="setting1">
               <h4 style="color: #fff;"><img class="pull-left" src="./images/setting.png" height="20px;" width="20px;" style="margin-right: 10px;">Setting<span class="caret" style="float: right;margin-top: 8px;"></span></h4>
               <!-- <span class="media-body">Inbox</span>
                  <i class="material-icons md-light ml-2 pmd-sm">more_vert</i> -->
            </a>
            <ul class="collapse" id="setting1" data-parent="#basicSidebar">
               <li class="nav-item" style="margin-left: -25px;">
                  <a class="btn btn-sm" data-toggle="modal" data-target="#editpass">
                     <h6 style="color: #fff;"><img class="pull-left" src="./images/password.png" height="15px;" width="15px;" style="margin-right: 10px;">Change Password</h6>
                     <!-- <span class="media-body">Sent Email</span> -->
                  </a>
               </li>
               <li class="nav-item" style="margin-left: -10px;">
                  <?php 
                     $user_id = Auth::user()->id;
                     
                     ?>
                  <!-- <a href="{{ route('logout') }}"
                     onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();"> -->
                  <a href="/logout/{{$user_id}}">
                     <!-- <a href="logout/{{$user_id}}"
                        onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();"> -->
                     <h6 style="color: #fff;"><img class="pull-left" src="./images/logout.png" height="15px;" width="15px;" style="margin-right: 10px;">Logout</h6>
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
      <div class="pmd-sidebar-overlay"></div>
      
   </aside>
</section>

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
<script>
    function myFunction() {
        var x = document.getElementById("demo");
        if (x.className.indexOf("w3-show") == -1) {
            x.className += " w3-show";
        } else { 
            x.className = x.className.replace(" w3-show", "");
        }
    }    
</script> 