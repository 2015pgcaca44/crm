@extends('admin.layouts.app')
<style type="text/css">
    div.divscroll { 
    margin-top: -5px; 
    padding:5px; 
    width: 82%; 
    height: 150%; 
    overflow: auto; 
     
  } 
</style>
@section('content')
      
<div class="row">
        <div class="container col-md-12" style="width: 73%;">
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
    <div class="w3-container w3-card-2 col-md-12 divscroll w3-mobile" style="width: 70%; height:75%;background-color: #fff; margin-left: 10px;">
        
         <form class="form-horizontal w3-mobile" method="post" action="{{url('insert_sales')}}" role="form" style="background-color: #fff;">
            {{ csrf_field() }}
            <!-- <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>"> -->
            <h3 style="color: #1A20D9;">Add Sales</h3>
            <div class="container col-sm-12 w3-mobile">
                <div class="form-group">
                    <label for="firstName" class="col-sm-4 control-label" >Name<font color="red" size="2">*</font></label>
                    <div class="col-sm-8 w3-mobile" style="width: 65%;">
                        <input type="text" name="name" id="name" required="required" placeholder="input name" class="form-control" autofocus>
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
                    <div class="col-sm-10 w3-mobile"  style="width: 65%;">
                        <input type="email" name="email" id="email" required="required" placeholder="email" class="form-control" name= "email">
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="phoneNumber" class="col-sm-4 control-label">Phone number<font color="red" size="2">*</font></label>
                    <div class="col-sm-6 w3-mobile"  style="width: 65%;">
                        <input type="phoneNumber" name="phone" id="phone" placeholder="phone number" required="required" class="form-control">
                        <span class="help-block">Your phone number won't be disclosed anywhere </span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="Location" class="col-sm-4 control-label">Address </label>
                    <div class="col-sm-6 w3-mobile"  style="width: 65%;">
                        <input type="text" name="location" id="Location" placeholder="address" class="form-control">
                    </div>
                </div>
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
                <div class="form-group">
                    <div class="col-sm-12 pull-right w3-mobile"  style="width: 60%;">
                        <span class="help-block">Required fields</span>
                    </div>
                </div>
                <!-- <div class="form-group">
                    <label for="password" class="col-sm-4 control-label">Industry</label>
                    <div class="col-sm-6"  style="width: 65%;">
                        <input type="text" name="industry" id="industry" placeholder="industry" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="linkdin" class="col-sm-4 control-label">Rating</label>
                    <div class="col-sm-6"  style="width: 65%;">
                        <input type="text" name="rating" id="rating" placeholder="rating" class="form-control">
                    </div>
                </div> -->

            </div>
            <div class="span-4 w3-mobile" style="width: 100%;">
                
                <a class="btn btn-primary pull-right btn-block w3-mobile" href="./sales_list" style="width: 15%; margin-left: 20px">Cancel</a>
                <button type="submit" class="btn btn-primary pull-right  btn-block w3-mobile" style="width: 15%;">Submit</button>
            </div>
        </form>
        
         <!-- /form -->
    </div>
</div>
@endsection()