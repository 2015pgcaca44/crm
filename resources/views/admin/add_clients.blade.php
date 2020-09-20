@extends('admin.layouts.app')
<style type="text/css">
    div.divscroll { 
    margin-top: -5px; 
    padding:5px; 
    width: 82%; 
    height: 88%; 
    overflow: auto; 
     
  } 
</style>
@section('content')
      
<div class="row">
        <div class="container col-md-10" style="width: 90%;">
            @if(count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            @if(\Session::has('success'))
            <div class="alert alert-success">
                <p>{{ \Session::get('success') }}</p>
            </div>
            @endif
        </div>
    <div class="w3-container w3-card-2 col-md-12 divscroll" style="width: 100%;background-color: #fff;">
        
         <form class="form-horizontal" method="post" action="{{url('insert_client')}}" role="form" style="background-color: #fff;">
            {{ csrf_field() }}
            <!-- <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>"> -->
            <h3 style="color: #1A20D9;">Add Client</h3>
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
                    <label for="package" class="col-md-4 control-label" style="margin-right: 15px;">Package Name<font color="red" size="2">*</font></label>
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
                        <input type="text" name="description" id="description" placeholder="description (if something have)" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="linkdin" class="col-sm-4 control-label">Linkdin</label>
                    <div class="col-sm-6 w3-mobile"  style="width: 65%;">
                        <input type="text" name="linkdin" id="linkdin" placeholder="linkdin url profile link" class="form-control">
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
                        <input type="text" name="name" id="name" placeholder="contact person name" class="form-control" autofocus>
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
                    <label for="personemail" class="col-sm-4 control-label">Person Email<font color="red" size="2">*</font></label>
                    <div class="col-sm-6 w3-mobile"  style="width: 65%;">
                        <input type="email" name="personemail" id="personemail" placeholder="contact person email number" class="form-control">
                        
                    </div>
                </div>
                <div class="form-group">
                    <label for="disignation" class="col-sm-4 control-label">Disignation</label>
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
                    <div class="col-sm-12 pull-right"  style="width: 60%;">
                        <span class="help-block"><font color="red" size="3">*</font>Required fields</span>
                    </div>
                </div>
            </div>
            <div class="span-4 w3-mobile" style="width: 100%;">
                <a class="btn btn-primary pull-right btn-block w3-mobile" href="./clients_list" style="width: 10%; margin-left: 20px;">Cancel</a>
                <button type="submit" class="btn btn-primary btn-block pull-right w3-mobile" style="width: 10%;">Submit</button>
            </div><br />
        </form><br />
        
         <!-- /form -->
    </div><br />
</div>
@endsection()