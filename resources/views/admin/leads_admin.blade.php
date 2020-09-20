@extends('admin.layouts.app')
@section('content')
<div class="row">
<div class="w3-container col-md-12 w3-mobile">
   <div style="width: 99%;">
    <div class="container">
   <h4 align="" style="color: #1A20D9;">Import leads</h4>
    <br />
   @if(count($errors) > 0)
    <div class="alert alert-danger w3-mobile">
     Upload Validation Error<br><br>
     <ul>
      @foreach($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
     </ul>
    </div>
   @endif
      <div class="modal" id="myModal">
         <div class="modal-dialog w3-mobile" style="width: 85%;">
            <div class="modal-content w3-mobile">
               <!-- Modal Header -->
               <div class="modal-header w3-mobile">
                  <font class="modal-title" size="5" style="color: #1A20D9;">Add Manual Leads</font>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
               </div>
               <!-- Modal body -->
               <div class="modal-body w3-mobile">
                  <div class="panel-body w3-mobile">
                     <form class="form-horizontal" method="post" action="{{url('insert_leads')}}" role="form" style="background-color: #fff;">
            {{ csrf_field() }}
            <!-- <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>"> -->
            <div class="container col-sm-6 w3-mobile" style="width: 50%;">
                <div class="form-group">
                    <label for="adset_name" class="col-sm-4 control-label">Adset Name<font color="red" size="2">*</font></label>
                    <div class="col-sm-6 w3-mobile"  style="width: 65%;">
                        <input type="text" name="adset_name" id="adset_name" placeholder="adset name" class="form-control" autofocus required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="campaign_name" class="col-sm-4 control-label">Campaign Name<font color="red" size="2">*</font></label>
                    <div class="col-sm-6 w3-mobile"  style="width: 65%;">
                        <input type="text" name="campaign_name" id="campaign_name" placeholder="campaign name" class="form-control" autofocus required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="email" class="col-sm-4 control-label">Email<font color="red" size="2">*</font></label>
                    <div class="col-sm-6 w3-mobile"  style="width: 65%;">
                        <input type="email" name="email" id="email" placeholder="email" class="form-control" name= "email" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="form_name" class="col-sm-4 control-label">Form Name<font color="red" size="2">*</font></label>
                    <div class="col-sm-6 w3-mobile"  style="width: 65%;">
                        <input type="text" name="form_name" id="form_name" placeholder="form name" class="form-control" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="firstName" class="col-sm-4 control-label" >Contact Person (he/she)<font color="red" size="2">*</font></label>
                    <div class="col-sm-6 w3-mobile" style="width: 65%;">
                        <input type="text" name="name" id="name" placeholder="input contact person name" class="form-control" autofocus required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="phoneNumber" class="col-sm-4 control-label">Person Phone<font color="red" size="2">*</font></label>
                    <div class="col-sm-6 w3-mobile"  style="width: 65%;">
                        <input type="phoneNumber" name="phone" id="phone" placeholder="contact person phone number" class="form-control" required>
                        <span class="help-block">Your phone number won't be disclosed anywhere </span>
                    </div>
                </div>
            </div>
            <div class="container col-sm-6 w3-mobile"  style="width: 50%;">
                <div class="form-group">
                    <label for="location" class="col-sm-4 control-label" >Location</label>
                    <div class="col-sm-6 w3-mobile" style="width: 65%;">
                        <input type="text" name="location" id="location" placeholder="location" class="form-control" autofocus>
                    </div>
                </div>
                <div class="form-group">
                    <label for="enquiry" class="col-sm-4 control-label" >Enquiry For</label>
                    <div class="col-sm-6 w3-mobile" style="width: 65%;">
                        <input type="text" name="enquiry" id="enquiry" placeholder="enquiry" class="form-control" autofocus>
                    </div>
                </div>
                <div class="form-group">
                    <label for="budget" class="col-sm-4 control-label" >Budget</label>
                    <div class="col-sm-6 w3-mobile" style="width: 65%;">
                        <input type="text" name="budget" id="budget" placeholder="budget" class="form-control" autofocus>
                    </div>
                </div>
                <div class="form-group">
                    <label for="platform" class="col-sm-4 control-label">Platform</label>
                    <div class="col-sm-6 w3-mobile"  style="width: 65%;">
                        <input type="text" name="platform" id="platform" placeholder="platform" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="startdate" class="col-sm-4 control-label">Project Start Date</label>
                    <div class="col-sm-6 w3-mobile"  style="width: 65%;">
                        <input type="date" name="startdate" id="startdate" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="possasiontime" class="col-sm-4 control-label">Possasion Time</label>
                    <div class="col-sm-6 w3-mobile"  style="width: 65%;">
                        <input type="time" name="possasiontime" id="possasiontime" class="form-control">
                    </div>
                </div>
                <!-- <div class="form-group">
                    <label class="control-label col-sm-4">Gender</label>
                    <div class="col-sm-6"  style="width: 65%;">
                        <div class="row">
                            <div class="col-sm-4">
                                <label class="radio-inline">
                                    <input type="radio" name="gender" id="gender" value="Female">Female
                                </label>
                            </div>
                            <div class="col-sm-4">
                                <label class="radio-inline">
                                    <input type="radio" name="gender" id="gender" value="Male">Male
                                </label>
                            </div>
                        </div>
                    </div>
                </div> -->
                <!-- /.form-group -->
                <div class="form-group">
                    <div class="col-sm-12 pull-right w3-mobile"  style="width: 60%;">
                        <span class="help-block"><font color="red" size="3">*</font>Required fields</span>
                    </div>
                </div>
            </div>
            <div class="span-4 w3-mobile" style="width: 100%;">
                <a class="btn btn-primary pull-right btn-block w3-mobile" data-dismiss="modal" style="width: 10%; margin-left: 20px;">Cancel</a>
                <button type="submit" class="btn btn-primary btn-block pull-right w3-mobile" style="width: 10%;">Submit</button>
            </div><br />
        </form>
                  </div>
               </div>
               
            </div>
         </div>
      </div>
   @if($message = Session::get('success'))
   <div class="alert alert-success alert-block w3-mobile">
    <button type="button" class="close" data-dismiss="alert">×</button>
           <strong>{{ $message }}</strong>
   </div>
   @endif
   <form method="post" enctype="multipart/form-data" action="{{ url('/import_excel_leads') }}">
    {{ csrf_field() }}
    <div class="form-group w3-mobile" style="background-color:#fff;width: 95%;">
     <table class="table w3-responsive" style="width:100%;">
      <tr>
        <td><label>Clients<font color="red" size="2">*</font></label></td>
        <td>
          <select class="w3-input w3-light-grey w3-mobile" name="client" id="client" required="required" style="width:100%;">
              <option value="" selected>Select Type</option>
              <option value="0">Our Client</option>
              @php
              $clients = ""; 
              $clients = DB::table('customers')->get();
              @endphp
              @foreach($clients as $data)
              <option value="{{ $data->id }}">{{ $data->company }}</option>
              @endforeach
          </select>
        </td>
        <td><label>Select File</label></td>
        <td>
          <input type="file" name="select_file" required="required"><br />.csv only
        </td>
        <td>
          <input type="submit" name="submit" class="btn bg-primary" value="Upload">
        </td>
      </tr>
     </table>
    </div>
   </form>
   
   <br />

   <div class="panel panel-default w3-mobile" style="width: 95%; margin-top: -30px;">
    <div class="panel-heading w3-mobile">
     <h3 class="panel-title" style="color: #1A20D9;">Customer Leads</h3>
     <a class="btn btn-sm btn-primary pull-right" data-toggle="modal" data-target="#myModal"  style="width:15%;margin-top: -25px;margin-right: 4px;"><span class="glyphicon glyphicon-plus"></span>add
     </a>
    </div>
    <div class="panel-body">
     <div class="table-responsive">
      <table class="table table-sm w3-small w3-mobile" style="width: 100%; overflow-x:auto;margin-left: -5px;">
       <tr class="bg-primary">
        <th style="color: #fff;" nowrap="nowrap">Slno.</th>
        <th style="width: 13%; color: #fff;" nowrap="nowrap">Client Name</th>
        <th style="width: 13%; color: #fff;" nowrap="nowrap">Adset Name</th>
        <th style="width: 13%; color: #fff;" nowrap="nowrap">Campaign Name</th>
        <th style="width: 15%; color: #fff;" nowrap="nowrap">Form Name</th>
        <th style="width: 20%; color: #fff;" nowrap="nowrap">Platform</th>
        <th style="width: 15%; color: #fff;" nowrap="nowrap">Full Name</th>
        <th style="width: 13%; color: #fff;" nowrap="nowrap">Email</th>
        <th style="width: 13%; color: #fff;" nowrap="nowrap">Phone Number</th>
        <th style="width: 13%; color: #fff;" nowrap="nowrap">Location</th>
        <th style="width: 13%; color: #fff;" nowrap="nowrap">Enquiry For</th>
        <th style="width: 13%; color: #fff;" nowrap="nowrap">Budget</th>
        <th style="width: 13%; color: #fff;" nowrap="nowrap">Project start date</th>
        <th style="width: 13%; color: #fff;" nowrap="nowrap">Possession Time</th>
        <th style="color: #fff;"><center>Action</center></th>
       </tr>
       <?php $count = 0; ?>
               @foreach($compaigns as $key => $data)
               <?php 
                  $count++;
                  $id = $data->id;
                  $contact_name1 = \App\Sales::where(['id' => $data->contact_person_id])->where(['client_id' => $data->client_id])->pluck('name');
                  $contact_name = trim($contact_name1,'["]');
                  if($data->client_id=="0")
                  {
                    $client_name = "Super Admin";
                  }else
                  {
                    $client = \App\Customer::where(['id' => $data->client_id])->pluck('name');
                    $client_name = trim($client,'["]');
                  }
                  
               ?>
               
               <tr class="w3-hover-pale-green">
                  <td style="color: #000000;">{{$count}}</td>
                  <td style="color: #000000;">{{$data->lead_type}}</td>
                  <td nowrap="nowrap" style="color: #000000;">{{$data->adset_name}}</td>
                  <td nowrap="nowrap" style="color: #000000;">{{$data->campaign_name}}</td>
                  <td style="color: #000000;">{{$data->form_name}}</td>
                  <td style="color: #000000;">{{$data->contact_via}}</td>
                  <td nowrap="nowrap" style="color: #000000;">{{$data->prospect_name}}</td>
                  <td nowrap="nowrap" style="color: #000000;">{{$data->email}}</td>
                  <td nowrap="nowrap" style="color: #000000;"></td>
                  <td nowrap="nowrap" style="color: #000000;">{{$data->location}}</td>
                  <td nowrap="nowrap" style="color: #000000;">{{$data->topic_on}}</td>
                  <td nowrap="nowrap" style="color: #000000;">{{$data->budget}}</td>
                  <td nowrap="nowrap" style="color: #000000;"></td>
                  <td nowrap="nowrap" style="color: #000000;"></td>
                  <!-- <td style="padding-left: 20px;"><a class="btn btn-sm pull-right" data-toggle="modal" data-target="#editModal"><img class="pull-left" src="/images/edit_icon1.png" height="20px;" width="20px;"></a></td> -->
                  <td><a onclick="delete_fun(@php echo $id @endphp);"><img class="pull-left" src="./images/delete.png" height="20px;" width="20px;" style="margin-right: 10px;"></a></td>
               </tr>
               @endforeach
      </table>
      <span class="w3-right">{{ $compaigns->links() }}</span>
     </div>
    </div>
   </div>
  </div>
</div>
      
</div><br />
<script type="text/javascript">
   function delete_fun(id)
   {
     
      var choice = confirm("do you want to delete this record "+id);
      if (choice) {
         window.location.href = this.getAttribute('href');
      }
   }
   
</script>
@endsection