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
        <div class="container col-md-10  w3-mobile" style="width: 70%;">
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
    <div class="w3-container w3-card-2 col-md-10 divscroll w3-mobile" style="width: 70%; height:60%;background-color: #fff;">
        
         <form class="form-horizontal pull-right" method="post" action="{{url('insert_sales_client')}}" role="form" style="background-color: #fff;">
            {{ csrf_field() }}
            <!-- <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>"> -->
            <h3>Add Sales</h3>
            <div class="container col-sm-6 w3-mobile" style="width: 50%;">
                <div class="form-group">
                    <label for="firstName" class="col-sm-4 control-label" >Name<font color="red" size="2">*</font></label>
                    <div class="col-sm-6 w3-mobile" style="width: 65%;">
                        <input type="text" name="name" id="name" placeholder="input name" class="form-control" autofocus>
                    </div>
                </div>
                <!-- <div class="form-group">
                    <label for="company" class="col-sm-4 control-label">Company</label>
                    <div class="col-sm-6"  style="width: 65%;">
                        <input type="text" name="company" id="company" placeholder="company name" class="form-control" autofocus>
                    </div>
                </div> -->
                <div class="form-group">
                    <label for="email" class="col-sm-4 control-label">Email<font color="red" size="2">*</font></label>
                    <div class="col-sm-6 w3-mobile"  style="width: 65%;">
                        <input type="email" name="email" id="email" placeholder="email" class="form-control" name= "email">
                    </div>
                </div>
                <div class="form-group">
                    <label for="phoneNumber" class="col-sm-4 control-label">Phone number<font color="red" size="2">*</font></label>
                    <div class="col-sm-6 w3-mobile"  style="width: 65%;">
                        <input type="phoneNumber" name="phone" id="phone" placeholder="phone number" class="form-control">
                        <span class="help-block">Your phone number won't be disclosed anywhere </span>
                    </div>
                </div>
                <!-- <div class="form-group">
                    <label for="password" class="col-sm-4 control-label">Industry</label>
                    <div class="col-sm-6"  style="width: 65%;">
                        <input type="text" name="industry" id="industry" placeholder="industry" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col-sm-4 control-label"  style="width: 50%; margin-left: -63px;">Website</label>
                    <div class="col-sm-6"  style="width: 65%;">
                        <input type="text" name="website" id="website" placeholder="website" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="budget" class="col-sm-4 control-label">Budget<font color="red" size="5">*</font></label>
                    <div class="col-sm-6"  style="width: 65%;">
                        <input type="text" name="budget" id="budget" placeholder="budget" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="description" class="col-sm-4 control-label">Description</label>
                    <div class="col-sm-6"  style="width: 65%;">
                        <input type="text" name="description" id="description" placeholder="description" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="linkdin" class="col-sm-4 control-label">Linkdin</label>
                    <div class="col-sm-6"  style="width: 65%;">
                        <input type="text" name="linkdin" id="linkdin" placeholder="linkdin profile link" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="linkdin" class="col-sm-4 control-label">Rating</label>
                    <div class="col-sm-6"  style="width: 65%;">
                        <input type="text" name="rating" id="rating" placeholder="rating" class="form-control">
                    </div>
                </div> -->

            </div>
            <div class="container col-sm-6 w3-mobile" style="width: 50%;">
                <div class="form-group">
                    <label for="project_type" class="col-sm-4 control-label">Project Type</label>
                    <div class="col-sm-6 w3-mobile"  style="width: 65%;">
                        <input type="text" name="project_type" id="project_type" placeholder="project_type" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="Location" class="col-sm-4 control-label">Address </label>
                    <div class="col-sm-6 w3-mobile"  style="width: 65%;">
                        <input type="text" name="location" id="Location" placeholder="Please write your Location in centimetres" class="form-control">
                    </div>
                </div>
                <!-- <div class="form-group">
                    <label for="Location" class="col-sm-4 control-label">City </label>
                    <div class="col-sm-6"  style="width: 65%;">
                        <input type="text" name="city" id="city" placeholder="please write your city" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="Location" class="col-sm-4 control-label">State </label>
                    <div class="col-sm-6"  style="width: 65%;">
                        <input type="text" name="state" id="state" placeholder="please write your state" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="Location" class="col-sm-4 control-label">Pin Code </label>
                    <div class="col-sm-6"  style="width: 65%;">
                        <input type="text" name="pin" id="pin" placeholder="please write your pin" class="form-control">
                    </div>
                </div> -->
                <!-- <div class="form-group">
                    <label for="Date" class="col-sm-4 control-label">Joining Date </label>
                    <div class="col-sm-6"  style="width: 65%;">
                        <input type="Date" name="joindate" id="joindate" placeholder="please write date" class="form-control">
                    </div>
                </div> -->
                <div class="form-group w3-mobile">
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
                        <span class="help-block">Required fields</span>
                    </div>
                </div>
            </div>
            <div class="span-4" style="width: 100%;">
                <a class="btn btn-primary pull-right btn-block w3-mobile" href="./sales_list" style="width: 15%;margin-left: 20px;">Cancel</a>
                <button type="submit" class="btn btn-block btn-primary pull-right w3-mobile" style="width: 15%;">Submit</button>
            </div>
        </form>
        
         <!-- /form -->
    </div>
</div>
@endsection()