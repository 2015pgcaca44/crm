@extends('admin.layouts.app')

@section('content')
<style type="text/css">
	@media (max-width: 600px){
		.mob_width{
			width:100%;
		}
	}
        .container{
            width:100%;
            height:100%;
        }
</style>
<div class="row">
    <div class="w3-container col-md-12 w3-mobile" style="margin-left: 0px;">
    	<div style="width: 100%;">
    		
    		<a class="btn btn-sm pull-right btn-primary" data-toggle="modal" data-target="#myModal"  style="width: 8%;margin-top: 4px;margin-right: 4px; margin-bottom: 10px;color: #fff;"><span class="glyphicon glyphicon-plus"></span></a>
    		<!-- <a href="#" class="btn btn-info btn-lg"><span class="glyphicon glyphicon-plus"></span>  -->
        	</a>
        	@if(count($errors) > 0)
    		<div class="alert alert-danger w3-mobile" style="width: 100%;">
    			<ul>
    				@foreach($errors->all() as $error)
    				<li>{{$error}}</li>
    				@endforeach
    			</ul>
    		</div>
    		@endif
    		@if(\Session::has('success'))
    		<div class="alert alert-success w3-mobile" style="width: 100%;">
    			<p>{{ \Session::get('success') }}</p>
    		</div>
    		@endif
        	<div class="modal" id="myModal">
			    <div class="modal-dialog w3-mobile">
			      <div class="modal-content w3-mobile">
			      
			        <!-- Modal Header -->
			        <div class="modal-header w3-mobile">
			          <font class="modal-title" size="5" style="color: #1A20D9;">Add Users</font>
			          <button type="button" class="close" data-dismiss="modal">&times;</button>
			        </div>
			        
			        <!-- Modal body -->
			        <div class="modal-body w3-mobile">
			          <div class="panel-body w3-mobile">
	                    <form class="form-horizontal" method="POST" action="{{url('insert_users')}}">
	                        {{ csrf_field() }}
	                        <!-- <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>"> -->
	                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
	                            <label for="name" class="col-md-4 control-label">Name</label>
	                            <div class="col-md-6 w3-mobile">
	                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

	                                @if ($errors->has('name'))
	                                    <span class="help-block">
	                                        <strong>{{ $errors->first('name') }}</strong>
	                                    </span>
	                                @endif
	                            </div>
	                        </div>
	                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
	                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>
	                            <div class="col-md-6 w3-mobile">
	                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

	                                @if ($errors->has('email'))
	                                    <span class="help-block">
	                                        <strong>{{ $errors->first('email') }}</strong>
	                                    </span>
	                                @endif
	                            </div>
	                        </div>
	                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
	                            <label for="password" class="col-md-4 control-label">Password</label>
	                            <div class="col-md-6 w3-mobile">
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
	                            <div class="col-md-6 w3-mobile">
	                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
	                            </div>
	                        </div>
	                        <div class="form-group w3-mobile">
	                        	<label for="role" class="col-md-4 control-label" style="margin-right: 16px;">Role</label>
	                            <select class="w3-input w3-light-grey w3-mobile" name="role" id="role" style="width: 44%;">
								    <option value="" selected disabled>Select Role</option>
								    <option value="admin">Admin</option>
								    <option value="client">Client</option>
								    <option value="user">User</option>
								</select>
	                        </div>
	                        <div class="span-4 w3-mobile" style="width: 100%;">
					            <a class="btn btn-primary pull-right btn-block w3-mobile" data-dismiss="modal" style="width: 15%; margin-left: 20px;">Cancel</a>
					            <button type="submit" class="btn btn-primary btn-block pull-right w3-mobile" style="width: 15%;">Submit</button>
					        </div>
	                        <!-- <div class="form-group">
	                            <div class="modal-footer">
				          			<button type="submit" class="btn btn-primary w3-mobile">Register</button>
				          			<button type="button" class="btn btn-primary w3-mobile" data-dismiss="modal">Close</button>
				        		</div>
	                        </div> -->
	                    </form>
                	</div>
			        </div>
			        <!-- Modal footer -->
			        <!-- <div class="modal-footer">
			          		<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
			          		<button type="submit" class="btn btn-primary">Register</button>
			        	</div> -->
			      </div>
			    </div>
		  </div>		
    	<div class="panel panel-default w3-mobile" style="width: 100% margin-top:40px;">
	      <div class="panel-heading w3-mobile">
	       <h3 class="panel-title" style="color: #1A20D9;">Our Users</h3>
	      </div>
	      <div class="panel-body w3-mobile">
	       <div class="table-responsive">
	    	<table class="table table-sm w3-small w3-mobile" style="width: 100%;">
			  <thead>
			    <tr class="bg-primary">
			      <th style="color: #fff;" nowrap="nowrap">Slno.</th>
			      <th style="width: 30%;color: #fff;">Name</th>
			      <th style="width: 15%;color: #fff;">Email</th>
			      <th style="width: 20%;color: #fff;" nowrap="nowrap">Register (Date Time)</th>
			      <!-- <th scope="col" style="width: 15%;color: #fff;" nowrap="nowrap">Register Time</th> -->
			      <th style="width: 25%;color: #fff;" nowrap="nowrap">Last Seen (Date Time)</th>
			      <th style="color: #fff;">Role</th>
			      <th style="width: 25%;color: #fff;"  nowrap="nowrap">User Info</th>
			      <th style="width: 15%;color: #fff;">Status</th>
			      <th colspan="2" style="width: 15%;color: #fff;"><center>Action</center></th>
			    </tr>
			  </thead>
			  <tbody>
			  	<?php $count=0; ?>
			    @foreach($users as $key => $data)
			    @php
			    $count++;
			    $id = $data->id;
			    if($data->status == "1" && $data->role!="admin")
			    {
			    	$status = "Active";
			    }
			    elseif($data->status == "0" && $data->role!="admin")
			    {
			    	$status = "In-active";
			    }
			    if($data->role=="admin"){
			    	$status = "active";
				}
			    $login_time = $data->email_verified_at;
			    $logout = $data->logout_time;
			    if($login_time > $logout)
			    {
			    	$last_seen = "Online";	    
			    }
			    else
			    {
			    	$last_seen = $logout;
			    }
			   	@endphp
				    <tr class="w3-hover-pale-green"> 
				      <td style="color: #000000;">{{$id}}</td>   
				      <td style="color: #000000;">{{$data->name}}</td>
				      <td style="color: #000000;">{{$data->email}}</td>
				      <td style="color: #000000;">{{$data->logging_date}}&nbsp;&nbsp;{{$data->loging_time}}</td>
				      <!-- <td style="color: #000000;">{{$data->loging_time}}</td> -->
				      
				      	<?php
				      	if($login_time > $logout)
				      	{
				      		?><td style="color: green;" nowrap="nowrap">
				      			<img class="pull-left" src="./images/dot.png" height="10px;" width="10px;" style="margin-right: 5px;margin-top: 5px;"><b>{{$last_seen}}</b></td><?php
				      	}else{
				      	?><td style="color: #000000;" nowrap="nowrap">
				      	{{$last_seen}}</td>
				      <?php } ?>
				      <td style="color: #000000;">{{ucwords($data->role)}}</td>
				      <td style="color: #000000;"></td>
				      <td  nowrap="nowrap">
				      	@php
			    
					    if($data->status == "1" && $data->role!="admin")
					    {
					    	$status = "Active";
					    @endphp
					    <a href='user_status/{{ $id }}'><font color="green">{{$status}}</font></a>
					    @php
					    }
					    elseif($data->status == "0" && $data->role!="admin")
					    {
					    	$status = "In-active";
					    @endphp
					    <a href='user_status/{{ $id }}'><font color="red">{{$status}}</font></a>
					    @php
					    }if($data->role=="admin"){
			    			$status = "active";
			    		@endphp
			    		<font color="green">{{$status}}</font>
					    @php
						}
					   	@endphp
						    
				  	  </td> 
				  	  <!-- <td style="padding-left: 20px;"><a data-toggle="modal" data-target="#editModal" data-id="<?php echo $id; ?>"><img class="pull-left" src="/images/edit_icon.png" height="20px;" width="20px;"></a></td> -->
				  	  <td style="padding-left: 20px;"><a href="#{{ $id }}" class="btn btn-sm pull-right" data-toggle="modal" id="modal-edit"><img class="pull-left" src="./images/edit_icon1.png" height="20px;" width="20px;"></a></td>
                  	  <!-- <td style="padding-left: 20px;"><a onclick="edit_fun(@php echo $id @endphp);"><img class="pull-left" src="/images/edit_icon1.png" height="20px;" width="20px;"></a></td> -->
				  	  <td><a onclick="delete_fun(@php echo $id @endphp);"><img class="pull-left" src="./images/delete.png" height="20px;" width="20px;" style="margin-right: 10px;"></a></td>
				    </tr>
				    <div class="modal" id="{{ $id }}">
			    <div class="modal-dialog w3-mobile">
			      <div class="modal-content w3-mobile">
			      
			        <!-- Modal Header -->
			        <div class="modal-header w3-mobile">
			          <font class="modal-title" size="5" style="color: #1A20D9;">Edit Users Data</font>
			          <button type="button" class="close" onclick="document.getElementById('editModal').style.display = 'none';" data-dismiss="modal">&times;</button>
			        </div>
			        
			        <!-- Modal body -->
			        <div class="modal-body w3-mobile">
			          <div class="panel-body w3-mobile">
	                    <form class="form-horizontal" method="POST" id="edituser" action="{{url('edit_users')}}">
	                        {{ csrf_field() }}
	                        {{ method_field('PUT') }}
	                        <!-- <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>"> -->
	                        <!-- <div class="w3-row" id="edit_inc"> -->
			
							<!-- <br><br><br> -->
							<!-- </div> -->
	                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
	                            <label for="name" class="col-md-4 control-label">Name</label>

	                            <div class="col-md-6 w3-mobile">
	                                <input id="name" type="text" class="form-control" value="{{$data->name}}" name="name" value="{{ old('name') }}" required autofocus>

	                                @if ($errors->has('name'))
	                                    <span class="help-block">
	                                        <strong>{{ $errors->first('name') }}</strong>
	                                    </span>
	                                @endif
	                            </div>
	                        </div>
	                        <br /><br />
	                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
	                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

	                            <div class="col-md-6 w3-mobile">
	                                <input id="email" type="email" class="form-control" value="{{$data->email}}" name="email" value="{{ old('email') }}" required>

	                                @if ($errors->has('email'))
	                                    <span class="help-block">
	                                        <strong>{{ $errors->first('email') }}</strong>
	                                    </span>
	                                @endif
	                            </div>
	                        </div>
	                        <br /><br />
	                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
	                            <label for="password" class="col-md-4 control-label">Password</label>

	                            <div class="col-md-6 w3-mobile">
	                                <input id="password" type="password" class="form-control" value="" name="password">

	                                @if ($errors->has('password'))
	                                    <span class="help-block">
	                                        <strong>{{ $errors->first('password') }}</strong>
	                                    </span>
	                                @endif
	                            </div>
	                        </div>
	                        <br /><br />
	                        <div class="form-group">
	                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

	                            <div class="col-md-6 w3-mobile">
	                                <input id="password-confirm" type="password" class="form-control" value="" name="password_confirmation">
	                            </div>
	                        </div><br /><br />
	                        <div class="form-group">
	                        	<label for="role" class="col-md-4 control-label" style="margin-right: 16px;">Role</label>
	                            <select class="w3-input w3-light-grey w3-mobile" name="role" id="role" style="width: 44%;">
								    <option value="" selected disabled>{{$data->role}}</option>
								    <option value="admin">Client</option>
								    <option value="user">User</option>
								</select>
	                        </div><br /><br />
	                        <div class="span-4 w3-mobile" style="width: 100%;">
					            <a class="btn btn-primary pull-right btn-block w3-mobile" data-dismiss="modal" style="width: 15%; margin-left: 20px;">Cancel</a>
					            <button type="submit" class="btn btn-primary btn-block pull-right w3-mobile" style="width: 15%;">Submit</button>
					        </div>
	                    </form>
                	</div>
			        </div>
			        <!-- Modal footer -->
			        <!-- <div class="modal-footer">
			          		<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
			          		<button type="submit" class="btn btn-primary">Register</button>
			        	</div> -->
			      </div>
			    </div>
		  </div>
				@endforeach
			  </tbody>
			</table>
			<span class="w3-right">{{ $users->links() }}</span>
		</div>
		</div>
		</div>
    </div>
</div>
<script type="text/javascript">
	function delete_fun(id)
	{
		//alert(id);
		var choice = confirm("do you want to delete this record "+id);
		if (choice) {
			//window.location = '/delete_users';
        	window.location.href ="{{url('delete_users')}}/"+id;
      	}
	}
	function edit_fun(id)
   	{
      //alert(id);
      document.getElementById('editModal').style.display = 'block';
		$.ajax({  
	    type: 'POST',  
	    url:"{{ url('ajax_edit_users') }}/"+id,
	    cache: false,
	    contentType: false,
	    processData: false,
	    //data: { id: id },
	    success: function(response) 
	    {
			//alert(response);
			document.getElementById('edit_inc').innerHTML = response;
		}
	  });
   	}
</script>
@endsection