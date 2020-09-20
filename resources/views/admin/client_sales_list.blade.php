@extends('admin.layouts.app')
@section('content')
<div class="row">
<div class="w3-container col-md-12 w3-mobile" style = "overflow-y:auto;">
   <div style="width: 100%;">
      <a class="btn btn-sm pull-right w3-mobile" data-toggle="modal" data-target="#addSales"  style="width: 8%;margin-top: 4px;margin-right: 4px; background-color: #00838f;color: #fff;"><span class="glyphicon glyphicon-plus"></span>
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
      <div class="modal" id="addSales">
         <div class="modal-dialog w3-mobile" style="width: 70%;">
            <div class="modal-conten w3-mobilet">
               <!-- Modal Header -->
               <div class="modal-header w3-mobile">
                  <font class="modal-title w3-mobile" size="5" style="color: #1A20D9;">Add Salesman</font>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
               </div>
               <!-- Modal body -->
               <div class="modal-body w3-mobile">
                  <div class="panel-body w3-mobile">
                  <form class="form-horizontal w3-mobile" method="post" action="{{url('insert_sales')}}" role="form" style="background-color: #fff;">
            {{ csrf_field() }}
            <!-- <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>"> -->
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
                    <div class="col-sm-6 w3-mobile" style="width: 65%;">
                        <input type="phoneNumber" name="phone" id="phone" placeholder="phone number" required="required" class="form-control">
                        <span class="help-block">Your phone number won't be disclosed anywhere </span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="Location" class="col-sm-4 control-label">Address </label>
                    <div class="col-sm-6 w3-mobile" style="width: 65%;">
                        <input type="text" name="location" id="Location" placeholder="Please write your Location" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-4">Gender</label>
                    <div class="col-sm-6 w3-mobile" style="width: 65%;">
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
                    <div class="col-sm-12 pull-right w3-mobile" style="width: 60%;">
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
                <a class="btn btn-primary pull-right btn-block w3-mobile" data-dismiss="modal" style="width: 15%; margin-left: 20px;">Cancel</a>
                <button type="submit" class="btn btn-primary btn-block pull-right w3-mobile" style="width: 15%;">Submit</button>
            </div>
        </form>
                  </div>
               </div>
              <!--  <div class="modal-footer">
                  <button type="submit" class="btn" style="background-color: #00838f; color: #fff;">Submit</button>
                  <button type="button" class="btn" data-dismiss="modal" style="background-color: #00838f;color: #fff;">Close</button>
               </div> -->
            </div>
         </div>
      </div>
      @php

      @endphp
     
      <div class="panel panel-default w3-mobile" style="width: 100% margin-top:40px;">
         <div class="panel-heading w3-mobile">
          <h3 class="panel-title" style="color: #1A20D9;">Our Salesman</h3>
         </div>
         <div class="panel-body w3-mobile">
          <div class="table-responsive">
         <table id="dtBasicExample" class="table table-sm w3-small w3-mobile" style="margin-top: 10px; overflow-x:auto;">
            <thead style="width: 100%;">
               <tr class="bg-primary">
                  <th style="color: #fff;">Slno.</th>
                  <th style="color: #fff;">Name</th>
                  <th style="color: #fff;">Email</th>
                  <th style="color: #fff;">Mobile</th>
                  <th style="color: #fff;">Company</th>
                  <!-- <th style="color: #fff;">Industry</th>
                  <th style="color: #fff;">Website</th> -->
                  <th style="color: #fff;">Date</th>
                  <!-- <th style="color: #fff;">Rating</th>
                  <th style="color: #fff;">Budget</th> -->
                  <th style="color: #fff;" nowrap="nowrap">Project Type</th>
                  <th style="color: #fff;">status</th>
                  <th style="color: #fff;" colspan="2"><center>Action</center></th>
               </tr>
            </thead>
            <tbody>
               <?php $count = 0; $sales = 0; ?>
               @foreach($contacts as $data)
               @php
               $count++;
               $id = $data->id;
               @endphp
               <tr class="w3-hover-pale-green">
                  <td style="color: #000000;">{{$count}}</td>
                  <td nowrap="nowrap" style="color: #000000;">{{$data->name}}</td>
                  <td style="color: #000000;">{{$data->email}}</td>
                  <td style="color: #000000;">{{$data->phone}}</td>
                  <td style="color: #000000;">{{$data->company}}</td>
                  <!-- <td style="color: #000000;">{{$data->industry}}</td>
                  <td style="color: #000000;">{{$data->website}}</td> -->
                  <td nowrap="nowrap" style="color: #000000;">{{$data->joining_date}}</td>
                 <!--  <td style="color: #000000;">{{$data->rating}}</td>
                  <td style="color: #000000;">{{$data->budget}}</td> -->
                  <td nowrap="nowrap" style="color: #000000;">{{$data->project_type}}</td>
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
         <div class="modal-dialog w3-mobile" style="width: 70%;">
            <div class="modal-content w3-mobile">
               <!-- Modal Header -->
               <div class="modal-header w3-mobile">
                  <font class="modal-title" size="5" style="color: #1A20D9;">Edit Salesman Data</font>
                  <button type="button" class="close" onclick="document.getElementById('editModal').style.display = 'none';" data-dismiss="modal">&times;</button>
               </div>
               <!-- Modal body -->
               <div class="modal-body" id="edit_inc">
                  <div class="panel-body w3-mobile">
                  <form class="form-horizontal" method="post" action="{{url('insert_sales_client')}}">
                        {{ csrf_field() }}
                        <!-- <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>"> -->
                        <div class="container col-sm-6 w3-mobile" style="width: 50%;">
                           <div class="form-group">
                              <label for="firstName" class="col-sm-4 control-label" >Name</label>
                              <div class="col-sm-6 w3-mobile" style="width: 65%;">
                                 <input type="text" value="{{$data->name}}" name="name" id="name" placeholder="input name" class="form-control" autofocus>
                              </div>
                           </div><br /><br />
                          <!--  <div class="form-group">
                              <label for="company" class="col-sm-4 control-label">Company<font color="red" size="2">*</font></label>
                              <div class="col-sm-6"  style="width: 65%;">
                                 <input type="text" value="{{$data->company}}" name="company" id="company" placeholder="company name" class="form-control" autofocus>
                              </div>
                           </div><br /><br /> -->
                           <div class="form-group">
                              <label for="email" class="col-sm-4 control-label">Email</label>
                              <div class="col-sm-6 w3-mobile"  style="width: 65%;">
                                 <input type="email" value="{{$data->email}}" name="email" id="email" placeholder="email" class="form-control" name= "email">
                              </div>
                           </div><br /><br />
                           <div class="form-group">
                              <label for="phoneNumber" class="col-sm-4 control-label">Phone number </label>
                              <div class="col-sm-6 w3-mobile"  style="width: 65%;">
                                 <input type="phoneNumber" value="{{$data->phone}}" name="phone" id="phone" placeholder="phone number" class="form-control">
                                 <span class="help-block">Your phone number will not disclosed anywhere </span>
                              </div>
                           </div><br /><br />
                           
                        </div>
                        <div class="container col-sm-6"  style="width: 50%;margin-left: -35px;">
                           <div class="form-group">
                              <label for="project_type" class="col-sm-4 control-label">Project Type</label>
                              <div class="col-sm-6 w3-mobile"  style="width: 65%;">
                                 <input type="text" value="{{$data->project_type}}" name="project_type" id="project_type" placeholder="project_type" class="form-control">
                              </div>
                           </div><br /><br />
                           <div class="form-group">
                              <label for="Location" class="col-sm-4 control-label">Address </label>
                              <div class="col-sm-6 w3-mobile"  style="width: 65%;">
                                 <input type="text" value="{{$data->address}}" name="location" id="Location" placeholder="Please write your Location in centimetres" class="form-control">
                              </div>
                           </div><br /><br />
                           
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
                           </div><br /><br />
                           <!-- /.form-group -->
                           <div class="form-group">
                              <div class="col-sm-12 pull-right w3-mobile"  style="width: 60%;">
                                 <span class="help-block"><font color="red" size="3">*</font>Required fields</span>
                              </div>
                           </div>
                        </div>
                        <div class="span-4 w3-mobile" style="width: 100%;">
                          <a class="btn btn-primary pull-right btn-block w3-mobile" data-dismiss="modal" style="width: 15%; margin-left: 20px;">Cancel</a>
                          <button type="submit" class="btn btn-primary pull-right btn-block w3-mobile" style="width: 15%;">Submit</button>
                        </div><br /><br />
                     </form>
                  </div>
               </div>
              <!--  <div class="modal-footer w3-mobile">
                  <button type="submit" class="btn btn-primary w3-mobile">Update</button>
                  <button type="button" class="btn btn-primary w3-mobile" onclick="document.getElementById('editSales').style.display = 'none';" data-dismiss="modal" style="background-color: #00838f;">Close</button><br />
               </div> -->
            </div>
         </div>
      </div>
               @endforeach
            </tbody>
         </table>
         <!-- <center>{{ $contacts->links() }}</center> -->
         <span class="w3-right">{{ $contacts->links() }}</span>
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
      document.getElementById('editSales').style.display = 'block';
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