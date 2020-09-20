@extends('admin.layouts.app')
@section('content')
<div class="row">
  <?php $client_type = ""; ?>
  @foreach($clients as $key => $data)
  @php
    $client_type = ucwords($data->client_type);
  @endphp
  @endforeach

<div class="w3-container col-md-12 w3-mobile" style = "overflow-y:auto;">
   <div style="width: 100%;">
      <a class="btn btn-sm btn-primary pull-right" data-toggle="modal" data-target="#myModal"  style="width: 7%;margin-top: 4px;margin-right: 4px;"><span class="glyphicon glyphicon-plus"></span>
      <!-- <a href="#" class="btn btn-info btn-lg"><span class="glyphicon glyphicon-plus"></span>  -->
      </a>
      @if(count($errors) > 0)
      <div class="alert alert-danger w3-mobile">
         <ul>
            @foreach($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
         </ul>
      </div>
      @endif
      @if(\Session::has('success'))
      <div class="alert alert-success w3-mobile">
         <p>{{ \Session::get('success') }}</p>
      </div>
      @endif	
      <div class="modal" id="myModal">
         <div class="modal-dialog w3-mobile" style="width: 85%;">
            <div class="modal-content w3-mobile">
               <!-- Modal Header -->
               <div class="modal-header w3-mobile">
                  <font class="modal-title" size="5" style="color: #1A20D9;">Add Clients</font>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
               </div>
               <!-- Modal body -->
               <div class="modal-body w3-mobile">
                  <div class="panel-body w3-mobile">
                     <form class="form-horizontal" method="post" action="{{url('insert_client')}}" role="form" style="background-color: #fff;">
            {{ csrf_field() }}
            <!-- <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>"> -->
            <div class="container col-sm-6 w3-mobile" style="width: 50%;">
                <div class="form-group">
                    <label for="client_type" class="col-md-4 control-label" style="margin-right: 15px;">Client Type<font color="red" size="2">*</font></label>
                    <select class="w3-input w3-light-grey w3-mobile" name="client_type" id="client_type" required="required" style="width: 59%;">
                        <option value="" selected disabled>Select Type</option>
                        <option value="our">Our Client</option>
                        <option value="business">Business Client</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="package" class="col-md-4 control-label " style="margin-right: 15px;">Package Name<font color="red" size="2">*</font></label>
                    <select class="w3-input w3-light-grey w3-mobile" name="package" id="package" style="width: 59%;">
                        <option value="" selected disabled>Select Package</option>
                        <option value="1 month">1 Month</option>
                        <option value="3 month">3 Month</option>
                        <option value="6 month">6 Month</option>
                        <option value="1 year">1 Year</option>
                    </select>
                </div>
                 <div class="form-group">
                    <label for="startdate" class="col-sm-4 control-label">Start Date<font color="red" size="2">*</font></label>
                    <div class="col-sm-6 w3-mobile"  style="width: 65%;">
                        <input type="date" name="startdate" id="startdate" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="end_date" class="col-sm-4 control-label">End Date<font color="red" size="2">*</font></label>
                    <div class="col-sm-6 w3-mobile"  style="width: 65%;">
                        <input type="date" name="end_date" id="end_date" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="company" class="col-sm-4 control-label">Company Name<font color="red" size="2">*</font></label>
                    <div class="col-sm-6 w3-mobile"  style="width: 65%;">
                        <input type="text" name="company" id="company" placeholder="company name" class="form-control" autofocus>
                    </div>
                </div>
                <div class="form-group">
                    <label for="email" class="col-sm-4 control-label">Company Email<font color="red" size="2">*</font></label>
                    <div class="col-sm-6 w3-mobile"  style="width: 65%;">
                        <input type="email" name="email" id="email" placeholder="company email" class="form-control" name= "email">
                    </div>
                </div>
                <div class="form-group">
                    <label for="companyphone" class="col-sm-4 control-label">Company Phone<font color="red" size="2">*</font></label>
                    <div class="col-sm-6 w3-mobile"  style="width: 65%;">
                        <input type="text" name="companyphone" id="companyphone" placeholder="company phone" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="gstnumber" class="col-sm-4 control-label">GST No.<font color="red" size="2">*</font></label>
                    <div class="col-sm-6 w3-mobile"  style="width: 65%;">
                        <input type="text" name="gstnumber" id="gstnumber" placeholder="gst number" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="country" class="col-sm-4 control-label">Country</label>
                    <div class="col-sm-6 w3-mobile"  style="width: 65%;">
                        <input type="text" name="country" id="country" placeholder="country" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col-sm-4 control-label">Website</label>
                    <div class="col-sm-6 w3-mobile"  style="width: 65%;">
                        <input type="text" name="website" id="website" placeholder="website" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="budget" class="col-sm-4 control-label">Budget<font color="red" size="2">*</font></label>
                    <div class="col-sm-6 w3-mobile"  style="width: 65%;">
                        <input type="text" name="budget" id="budget" placeholder="budget" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="description" class="col-sm-4 control-label">Description</label>
                    <div class="col-sm-6 w3-mobile"  style="width: 65%;">
                        <input type="text" name="description" id="description" placeholder="description" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="linkdin" class="col-sm-4 control-label">Linkdin</label>
                    <div class="col-sm-6 w3-mobile"  style="width: 65%;">
                        <input type="text" name="linkdin" id="linkdin" placeholder="linkdin profile link" class="form-control">
                    </div>
                </div>
                
                 <!-- <div class="form-group">
                    <label for="linkdin" class="col-sm-4 control-label">Linkdin</label>
                    <div class="col-sm-6"  style="width: 65%;">
                        <input type="text" name="linkdin" id="linkdin" placeholder="linkdin profile link" class="form-control">
                    </div>
                </div> -->
            </div>
            <div class="container col-sm-6 w3-mobile"  style="width: 50%;">
                <div class="form-group">
                    <label for="firstName" class="col-sm-4 control-label" >Contact Person (he/she)<font color="red" size="2">*</font></label>
                    <div class="col-sm-6 w3-mobile" style="width: 65%;">
                        <input type="text" name="name" id="name" placeholder="input contact person name" class="form-control" autofocus>
                    </div>
                </div>
                <div class="form-group">
                    <label for="phoneNumber" class="col-sm-4 control-label">Person Phone<font color="red" size="2">*</font></label>
                    <div class="col-sm-6 w3-mobile"  style="width: 65%;">
                        <input type="phoneNumber" name="phone" id="phone" placeholder="contact person phone number" class="form-control">
                        <span class="help-block">Your phone number won't be disclosed anywhere </span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="contact_person_email" class="col-sm-4 control-label">Person Email<font color="red" size="2">*</font></label>
                    <div class="col-sm-6 w3-mobile"  style="width: 65%;">
                        <input type="email" name="contact_person_email" id="contact_person_email" placeholder="contact person email number" class="form-control">
                        
                    </div>
                </div>
                <div class="form-group">
                    <label for="disignation" class="col-sm-4 control-label">Disignation<font color="red" size="2">*</font></label>
                    <div class="col-sm-6 w3-mobile"  style="width: 65%;">
                        <input type="text" name="disignation" id="disignation" placeholder="disignation" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="project_type" class="col-sm-4 control-label">Project Type<font color="red" size="2">*</font></label>
                    <div class="col-sm-6 w3-mobile"  style="width: 65%;">
                        <input type="text" name="project_type" id="project_type" placeholder="project_type" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="Location" class="col-sm-4 control-label">Address </label>
                    <div class="col-sm-6 w3-mobile"  style="width: 65%;">
                        <input type="text" name="location" id="Location" placeholder="address" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="Location" class="col-sm-4 control-label">City </label>
                    <div class="col-sm-6 w3-mobile"  style="width: 65%;">
                        <input type="text" name="city" id="city" placeholder="please write your city" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="Location" class="col-sm-4 control-label">State </label>
                    <div class="col-sm-6 w3-mobile"  style="width: 65%;">
                        <input type="text" name="state" id="state" placeholder="please write your state" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="Location" class="col-sm-4 control-label">Pin Code </label>
                    <div class="col-sm-6 w3-mobile"  style="width: 65%;">
                        <input type="text" name="pin" id="pin" placeholder="please write your pin" class="form-control">
                    </div>
                </div>
                <!-- <div class="form-group">
                    <label for="Date" class="col-sm-4 control-label">Joining Date </label>
                    <div class="col-sm-6"  style="width: 65%;">
                        <input type="Date" name="joindate" id="joindate" placeholder="please write date" class="form-control">
                    </div>
                </div> -->
                <div class="form-group">
                    <label class="control-label col-sm-4">Gender</label>
                    <div class="col-sm-6 w3-mobile"  style="width: 65%;">
                        <div class="row">
                            <div class="col-sm-4 w3-mobile">
                                <label class="radio-inline">
                                    <input type="radio" name="gender" id="gender" value="Female">Female
                                </label>
                            </div>
                            <div class="col-sm-4 w3-mobile">
                                <label class="radio-inline">
                                    <input type="radio" name="gender" id="gender" value="Male">Male
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
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
      @php

      @endphp
      
    <div class="panel panel-default w3-mobile" style="width: 100% margin-top:40px;">
      <div class="panel-heading">
       <h3 class="panel-title" style="color: #1A20D9;">{{$client_type}} Clients</h3>
      </div>
      <div class="panel-body w3-mobile">
       <div class="table-responsive">
         <table id="dtBasicExample" class="table table-sm w3-small w3-mobile" style="margin-top: 10px; overflow-x:auto;">
            <thead style="width: 100%;">
               <tr class="bg-primary">
                  <th style="color: #fff;">Slno.</th>
                  <th style="color: #fff;" nowrap="nowrap">GST Number</th>
                  <th style="color: #fff;" nowrap="nowrap">Register Date</th>
                  <th style="color: #fff;" nowrap="nowrap">Company Name</th>
                  <th style="color: #fff;" nowrap="nowrap">Company Email</th>
                  <th style="color: #fff;" nowrap="nowrap">Company Mobile</th>
                  <!-- <th style="color: #fff;">Industry</th> -->
                  <th style="color: #fff;">Website</th>
                  <th style="color: #fff;" nowrap="nowrap">Contact Person Name</th>
                  <th style="color: #fff;" nowrap="nowrap">Contact Person Email</th>
                  <th style="color: #fff;" nowrap="nowrap">Contact Person Phone</th>
                  <th style="color: #fff;">Designation</th>
                  <th style="color: #fff;" nowrap="nowrap">Package Duration</th>
                  <th style="color: #fff;" nowrap="nowrap">Start Date</th>
                  <th style="color: #fff;" nowrap="nowrap">End Date</th>
                  <!-- <th style="color: #fff;">Rating</th> -->
                  <th style="color: #fff;">Budget</th>
                  <th style="color: #fff;" nowrap="nowrap">Project Type</th>
                  <th style="color: #fff;">Description</th>
                  <th style="color: #fff;">Linkdin</th>
                  <th style="color: #fff;">status</th>
                  <th style="color: #fff;" colspan="2"><center>Action</center></th>
               </tr>
            </thead>
            <tbody>
               <?php $count = 0; ?>
               @foreach($clients as $key => $data)
               @php
               $count++;
               $id = $data->id;
               if($data->status == "1")
               {
               $status = "Active";
               }
               else
               {
               $status = "In-active";
               }
               @endphp
               <tr class="w3-hover-pale-green">
                  <td style="color: #000000;">{{$count}}</td>
                  <td style="color: #000000;">{{$data->gst_number}}</td>
                  <td style="color: #000000;">{{$data->joining_date}}</td>
                  <td nowrap="nowrap" style="color: #000000;">{{$data->company}}</td>
                  <td style="color: #000000;">{{$data->email}}</td>
                  <td style="color: #000000;">{{$data->phone}}</td>
                  <td style="color: #000000;">{{$data->website}}</td>
                  <!-- <td style="color: #000000;">{{$data->industry}}</td> -->
                  <td style="color: #000000;">{{$data->name}}</td>
                  <td nowrap="nowrap" style="color: #000000;">{{$data->contact_person_email}}</td>
                  <td style="color: #000000;">{{$data->contact_person_phone}}</td>
                  <td style="color: #000000;">{{$data->disignation}}</td>
                  <td style="color: #000000;">{{$data->package_name}}</td>
                  <td style="color: #000000;" nowrap="nowrap">{{$data->pack_start_date}}</td>
                  <td style="color: #000000;" nowrap="nowrap">{{$data->pack_end_date}}</td>
                  <td style="color: #000000;">{{$data->budget}}</td>
                  <td nowrap="nowrap" style="color: #000000;">{{$data->project_type}}</td>
                  <td style="color: #000000;">{{$data->description}}</td>
                  <td style="color: #000000;">{{$data->linkdin_profile}}</td>
                  <td style="padding-right: 20px;">
                     @php
                     if($data->status == "1")
                     {
                     $status = "Active";
                     @endphp
                     <font color="green">{{$status}}</font>
                     @php
                     }
                     else
                     {
                     $status = "In-active";
                     @endphp
                     <font color="red">{{$status}}</font>
                     @php
                     }
                     @endphp
                  </td>
                  <!-- <td style="padding-left: 20px;"><a data-toggle="modal" data-target="#editModal" data-id="<?php echo $id; ?>"><img class="pull-left" src="/images/edit_icon.png" height="20px;" width="20px;"></a></td> -->
                  <td style="padding-left: 20px;"><a href="#{{ $id }}" class="btn btn-sm pull-right" data-toggle="modal" id="modal-edit" ><img class="pull-left" src="./images/edit_icon1.png" height="20px;" width="20px;"></a></td>
                  <td><a onclick="delete_fun(@php echo $id @endphp);"><img class="pull-left" src="./images/delete.png" height="20px;" width="20px;" style="margin-right: 10px;"></a></td>
               </tr>
               <div class="modal" id="{{ $id }}">
         <div class="modal-dialog w3-mobile" style="width: 88%;">
            <div class="modal-content w3-mobile">
               <!-- Modal Header -->
               <div class="modal-header">
                  <font class="modal-title" size="5" style="color: #1A20D9;">Edit Clients Data</font>
                  <button type="button" class="close" onclick="document.getElementById('editModal').style.display = 'none';" data-dismiss="modal">&times;</button>
               </div>
               <!-- Modal body -->
               <div class="modal-body w3-mobile" id="edit_inc">
                  <div class="panel-body w3-mobile">
            <form class="form-horizontal" method="POST" action='edit_client/{{ $id }}' role="form" style="background-color: #fff;">
            {{ csrf_field() }}
            <input type = "hidden" name = "c_id" value ="{{ $id }}">
            <div class="container col-sm-6 w3-mobile" style="width: 50%;">
                <div class="form-group">
                    <label for="company" class="col-sm-4 control-label">Company Name</label>
                    <div class="col-sm-6 w3-mobile"  style="width: 65%;">
                        <input type="text" value="{{$data->company}}" name="company" id="company" class="form-control" autofocus>
                    </div>
                </div><br />
                <div class="form-group">
                    <label for="email" class="col-sm-4 control-label">Company Email</label>
                    <div class="col-sm-6 w3-mobile"  style="width: 65%;">
                        <input type="email" value="{{$data->email}}" name="email" id="email" class="form-control" name= "email">
                    </div>
                </div><br />
                <div class="form-group">
                    <label for="companyphone" class="col-sm-4 control-label">Company Phone</label>
                    <div class="col-sm-6 w3-mobile"  style="width: 65%;">
                        <input type="text" value="{{$data->phone}}" name="companyphone" id="companyphone" class="form-control" name= "email">
                    </div>
                </div><br />
                <div class="form-group">
                    <label for="gstnumber" class="col-sm-4 control-label">GST No.</label>
                    <div class="col-sm-6 w3-mobile"  style="width: 65%;">
                        <input type="text" value="{{$data->gst_number}}" name="gstnumber" id="gstnumber" class="form-control">
                    </div>
                </div><br />
                <div class="form-group">
                    <label for="country" class="col-sm-4 control-label">Country</label>
                    <div class="col-sm-6 w3-mobile"  style="width: 65%;">
                        <input type="text" value="{{$data->country}}" name="country" id="country" class="form-control">
                    </div>
                </div><br />
                <div class="form-group">
                    <label for="password" class="col-sm-4 control-label">Website</label>
                    <div class="col-sm-6 w3-mobile"  style="width: 65%;">
                        <input type="text" value="{{$data->website}}" name="website" id="website" class="form-control">
                    </div>
                </div><br />
                <div class="form-group">
                    <label for="budget" class="col-sm-4 control-label">Budget</label>
                    <div class="col-sm-6 w3-mobile"  style="width: 65%;">
                        <input type="text" value="{{$data->budget}}" name="budget" id="budget" class="form-control">
                    </div>
                </div><br />
                <div class="form-group">
                    <label for="description" class="col-sm-4 control-label">Description</label>
                    <div class="col-sm-6 w3-mobile"  style="width: 65%;">
                        <input type="text" value="{{$data->description}}" name="description" id="description" class="form-control">
                    </div>
                </div><br />
                <div class="form-group">
                    <label for="linkdin" class="col-sm-4 control-label">Linkdin</label>
                    <div class="col-sm-6 w3-mobile"  style="width: 65%;">
                        <input type="text" value="{{$data->linkdin_profile}}" name="linkdin" id="linkdin" class="form-control">
                    </div>
                </div><br />
                <div class="form-group">
                    <label for="package" class="col-md-4 control-label" style="margin-right: 15px;">Package Name</label>
                    <select class="w3-input w3-light-grey w3-mobile" name="package" id="package" style="width: 59%;">
                        @if($data->package_name)
                        <option value="{{$data->package_name}}" selected>{{$data->package_name}}</option>
                        @else
                        <option value="">Select Package</option>
                        <option value="1 month">1 Month</option>
                        <option value="3 month">3 Month</option>
                        <option value="6 month">6 Month</option>
                        <option value="1 year">1 Year</option>
                        @endif
                    </select>
                </div><br />
                 <div class="form-group">
                    <label for="startdate" class="col-sm-4 control-label">Start Date</label>
                    <div class="col-sm-6 w3-mobile"  style="width: 65%;">
                        <input type="date" value="{{$data->pack_start_date}}" name="startdate" id="startdate" class="form-control">
                    </div>
                </div><br />
                <div class="form-group">
                    <label for="end_date" class="col-sm-4 control-label">End Date</label>
                    <div class="col-sm-6 w3-mobile"  style="width: 65%;">
                        <input type="date" value="{{$data->pack_end_date}}" name="end_date" id="end_date" class="form-control">
                    </div>
                </div><br />
                 <!-- <div class="form-group">
                    <label for="linkdin" class="col-sm-4 control-label">Linkdin</label>
                    <div class="col-sm-6"  style="width: 65%;">
                        <input type="text" name="linkdin" id="linkdin" placeholder="linkdin profile link" class="form-control">
                    </div>
                </div> -->
            </div>
            <div class="container col-sm-6 w3-mobile"  style="width: 50%;">
                <div class="form-group">
                    <label for="firstName" class="col-sm-4 control-label" >Contact Person</label>
                    <div class="col-sm-6 w3-mobile" style="width: 65%;">
                        <input type="text" value="{{$data->name}}" name="name" id="name" class="form-control" autofocus>
                    </div>
                </div><br />
                <!-- <div class="form-group">
                    <label for="phoneNumber" class="col-sm-4 control-label">Person Phone</label>
                    <div class="col-sm-6"  style="width: 65%;">
                        <input type="phoneNumber" name="phone" id="phone" placeholder="phone number" class="form-control">
                        <span class="help-block">Your phone number won't be disclosed anywhere </span>
                    </div>
                </div><br /> -->
                <div class="form-group">
                    <label for="personemail" class="col-sm-4 control-label">Person Email</label>
                    <div class="col-sm-6 w3-mobile"  style="width: 65%;">
                        <input type="email" value="{{$data->contact_person_email}}" name="personemail" id="personemail" class="form-control">
                        
                    </div>
                </div><br /><br />
                <div class="form-group">
                    <label for="disignation" class="col-sm-4 control-label">Disignation</label>
                    <div class="col-sm-6 w3-mobile"  style="width: 65%;">
                        <input type="text" value="{{$data->disignation}}" name="disignation" id="disignation" class="form-control">
                    </div>
                </div><br />
                <div class="form-group">
                    <label for="project_type" class="col-sm-4 control-label">Project Type</label>
                    <div class="col-sm-6 w3-mobile"  style="width: 65%;">
                        <input type="text" value="{{$data->project_type}}" name="project_type" id="project_type" class="form-control">
                    </div>
                </div><br />
                <div class="form-group">
                    <label for="Location" class="col-sm-4 control-label">Address </label>
                    <div class="col-sm-6 w3-mobile"  style="width: 65%;">
                        <input type="text" value="{{$data->address}}" name="location" id="Location" class="form-control">
                    </div>
                </div><br />
                <div class="form-group">
                    <label for="Location" class="col-sm-4 control-label">City </label>
                    <div class="col-sm-6 w3-mobile"  style="width: 65%;">
                        <input type="text" value="{{$data->city}}" name="city" id="city" class="form-control">
                    </div>
                </div><br />
                <div class="form-group">
                    <label for="Location" class="col-sm-4 control-label">State </label>
                    <div class="col-sm-6 w3-mobile"  style="width: 65%;">
                        <input type="text" value="{{$data->state}}" name="state" id="state" class="form-control">
                    </div>
                </div><br />
                <div class="form-group">
                    <label for="Location" class="col-sm-4 control-label">Pin Code </label>
                    <div class="col-sm-6 w3-mobile"  style="width: 65%;">
                        <input type="text" value="{{$data->pin}}" name="pin" id="pin" class="form-control">
                    </div>
                </div><br />
                <div class="form-group">
                    <label for="phoneNumber" class="col-sm-4 control-label">Person Phone</label>
                    <div class="col-sm-6 w3-mobile"  style="width: 65%;">
                        <input type="phoneNumber" value="{{$data->contact_person_phone}}" name="phone" id="phone" class="form-control">
                        <span class="help-block">Your phone number won't be disclosed anywhere </span>
                    </div>
                </div><br />
                <!-- <div class="form-group">
                    <label for="Date" class="col-sm-4 control-label">Joining Date </label>
                    <div class="col-sm-6"  style="width: 65%;">
                        <input type="Date" name="joindate" id="joindate" placeholder="please write date" class="form-control">
                    </div>
                </div> -->
                <div class="form-group">
                    <label class="control-label col-sm-4">Gender</label>
                    <div class="col-sm-6 w3-mobile"  style="width: 65%;">
                        <div class="row">
                            <div class="col-sm-4 w3-mobile">
                                <label class="radio-inline">
                                    <input type="radio" name="gender" id="gender" value="Female">Female
                                </label>
                            </div>
                            <div class="col-sm-4 w3-mobile">
                                <label class="radio-inline">
                                    <input type="radio" name="gender" id="gender" value="Male">Male
                                </label>
                            </div>
                        </div>
                    </div>
                </div><br />
                <!-- /.form-group -->
                <div class="form-group">
                    <div class="col-sm-12 pull-right w3-mobile"  style="width: 60%;">
                        <span class="help-block "><font color="red" size="3">*</font>Required fields</span>
                    </div>
                </div>
            </div>
            <div class="span-4 w3-mobile" style="width: 100%;">
                <a class="btn btn-primary pull-right btn-block w3-mobile" data-dismiss="modal" style="width: 10%; margin-left: 20px;">Cancel</a>
                <button type="submit" class="btn btn-primary btn-block pull-right w3-mobile" style="width: 10%;">Update</button>
            </div>
        </form>
                  </div>
               </div>
               
               <!-- Modal footer -->
            </div>
         </div>
      </div>
               @endforeach
            </tbody>
         </table>
         <span class="w3-right">{{ $clients->links() }}</span>
      </div>
      </div>
      </div>
   </div>
   <br />
   <!-- <div class="col-md-12 text-center">
      <ul class="pagination pagination-lg pager" id="myPager"></ul>
   </div> -->
</div>
<script type="text/javascript">
   function delete_fun(id)
   {
   		//alert(id);
	    var choice = confirm("do you want to delete this record ?");
	    if (choice) {
	        window.location.href = this.getAttribute('href');
	    }
   }
   function edit_fun(id)
   {
      //alert(id);
      document.getElementById('editModal').style.display = 'block';
		$.ajax({  
	    type: 'POST',  
	    url: 'ajax_edit_clients.php',
	    data: { id: val },
	    success: function(response) 
	    {
			//alert(response);
			document.getElementById('edit_inc').innerHTML = response;
		}
	  });
   }
</script>
@endsection