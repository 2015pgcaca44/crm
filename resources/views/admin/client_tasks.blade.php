@extends('admin.layouts.app')
<?php

use App\Campaign;
?>
@section('content')
<div class="row">
  @foreach($compaigns as $key => $data)
  @php
    $status = $data->status;
    if($status == 0)
    {
      $task = "Completed";
    }
    elseif($status == 1)
    {
      $task = "Pending";
    }
  @endphp
  @endforeach
<div class="w3-container col-md-12 w3-mobile">
   <div style="width: 94%;">
    <!-- <a class="btn btn-sm pull-right" data-toggle="modal" data-target="#myModal1"  style="width: 8%;margin-top: -25px;margin-bottom: 10px;background-color: #00838f;color: #fff;"><span class="glyphicon glyphicon-plus"></span></a><br /> -->
     
     
      <div class="panel panel-default w3-mobile" style="width: 100% margin-top:40px;">
         <div class="panel-heading w3-mobile">
          <h3 class="panel-title" style="color: #1A20D9;">Our Tasks</h3>
         </div>
         <div class="panel-body w3-mobile">
          <div class="table-responsive">
         <table id="dtBasicExample" class="table table-sm w3-small w3-mobile" style="width: 100%; overflow-x:auto;">
            <thead>
               <br />
               <tr style="background-color: #00838f;">
                  <th scope="col" style="color: #fff;" nowrap="nowrap">Slno.</th>
                  <th scope="col" style="width: 13%; color: #fff;" nowrap="nowrap">Sales Name</th>
                  <th scope="col" style="width: 13%; color: #fff;" nowrap="nowrap">Leads Name</th>
                  <th scope="col" style="width: 13%; color: #fff;" nowrap="nowrap">Sources</th>
                  <th scope="col" style="width: 13%; color: #fff;" nowrap="nowrap">Phone</th>
                  <th scope="col" style="width: 13%; color: #fff;" nowrap="nowrap">Email</th>
                  
                  <th scope="col" style="width: 13%; color: #fff;" nowrap="nowrap">Start Date</th>
                  <th scope="col" style="width: 13%; color: #fff;" nowrap="nowrap">End Date</th>
                  <th scope="col" style="width: 13%; color: #fff;" nowrap="nowrap">Budget</th>
                  <th scope="col" style="width: 13%; color: #fff;" nowrap="nowrap">Description</th>
                  <th scope="col" style="width: 13%; color: #fff;">status</th>
                  <th colspan="2"  style="color: #fff;"><center>Action</center></th>
               </tr>
            </thead>
            <tbody>
               <!-- $contact_person = $data->contact_person_id;
               $contact_name = Compaigns::connection('mysql')->select("select * from clients where id = 'contact_person' "); -->
               <?php $count=0; ?>
               @foreach($compaigns as $key => $data)
               @php
               $count++;
               $id = $data->id;
               $contact_name1 = \App\Sales::where(['id' => $data->contact_person_id])->pluck('name');
               $contact_name = trim($contact_name1,'["]');
               @endphp
               <tr class="w3-hover-pale-green">
                  <input type="hidden" name="user_id" id="user_id" value="{{ $id}}">
                  <td style="color: #000000;">{{$count}}</td>
                  <td nowrap="nowrap" style="color: #000000;">{{$contact_name}}</td>
                  <!-- <td style="color: #000000;">{{$data->topic_on}}</td> -->
                  <td nowrap="nowrap" style="color: #000000;">{{$data->prospect_name}}</td>
                  <td style="color: #000000;">{{$data->contact_via}}</td>
                  <td style="color: #000000;"></td>
                  <td style="color: #000000;"></td>
                  <td nowrap="nowrap" style="color: #000000;">{{$data->start_date}}</td>
                  <td nowrap="nowrap" style="color: #000000;">{{$data->end_date}}</td>
                  <td style="color: #000000;">{{$data->budget}}</td>
                  <td style="color: #000000;">{{$data->discription}}</td>

                  <td>
                     @php
                     if($data->status == "1")
                     {
                     $status = "Pending";
                     @endphp
                     <font color="red">{{$status}}</font>
                     @php
                     }
                     else
                     {
                     $status = "Completed";
                     @endphp
                     <font color="green">{{$status}}</font>
                     @php
                     }
                     @endphp
                  </td>
                  <td style="padding-left: 20px;"><a href="#{{ $id }}" class="btn btn-sm pull-right" data-toggle="modal" id="modal-edit" ><img class="pull-left" src="./images/edit_icon1.png" height="20px;" width="20px;"></a></td>
                  <!-- <td style="padding-left: 20px;"><a data-toggle="modal" onclick="edit_fun(@php echo $id @endphp);"><img class="pull-left" src="/images/edit_icon1.png" height="20px;" width="20px;"></a></td> -->
                  <td><a onclick="delete_fun(@php echo $id @endphp);"><img class="pull-left" src="./images/delete.png" height="20px;" width="20px;" style="margin-right: 10px;"></a></td>
               </tr>
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
      <div class="modal" id="{{ $id }}">
         <div class="modal-dialog w3-mobile" style="width: 70%;">
            <div class="modal-content w3-mobile">
               <!-- Modal Header -->
               <div class="modal-header w3-mobile">
                  <font class="modal-title" size="2" style="color: #1A20D9;">Add Sales Task / Information</font>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
               </div>
               <!-- Modal body -->
               <div class="modal-body w3-mobile">
                  <div class="panel-body w3-mobile">
                     <form class="form-horizontal" method="post" action="{{url('tasks_insert')}}">
                        {{ csrf_field() }}
                        <!-- <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>"> -->
                        <div class="container col-sm-6" style="width: 50%;">
                          @php
                          $prospect_name1 = Campaign::where(['id' => $id])->pluck('prospect_name');
                          $prospect_name = trim($prospect_name1,'["]');

                          $sources1 = Campaign::where(['id' => $id])->pluck('contact_via');
                          $sources = trim($sources1,'["]');

                          $budget1 = Campaign::where(['id' => $id])->pluck('budget');
                          $task_budget = trim($budget1,'["]');

                          $start_date1 = Campaign::where(['id' => $id])->pluck('start_date');
                          $start_date = trim($start_date1,'["]');

                          $end_date1 = Campaign::where(['id' => $id])->pluck('end_date');
                          $end_date = trim($end_date1,'["]');

                          $approved_amount1 = Campaign::where(['id' => $id])->pluck('recieved_amount');
                          $approved_amount = trim($approved_amount1,'["]');

                          $discription1 = Campaign::where(['id' => $id])->pluck('discription');
                          $discription = trim($discription1,'["]');
                          @endphp
                          <!--  <div class="form-group">
                              <label for="sales_name" class="col-sm-4 control-label" >Sales Name<font color="red" size="5">*</font></label>
                              <div class="col-sm-6" style="width: 65%;">
                                 <input type="text" name="sales_name" id="sales_name" placeholder="input sales name" class="form-control" autofocus>
                              </div>
                           </div> -->
                           <div class="form-group">
                              <label for="leads_name" class="col-sm-4 control-label" style="margin-right: 13px;">Leads Name</label>
                              <!-- <div class="col-sm-6"  style="width: 65%;">
                                 <input type="text" name="leads_name" id="leads_name" placeholder="leads name" class="form-control" autofocus>
                              </div> -->
                              <select class="w3-input w3-light-grey w3-mobile" name="leads_name" id="leads_name" style="width: 58%;">
                                  <option value="{{ $prospect_name }}" selected disabled>{{ $prospect_name }}</option>
                                  <?php $count=0; $id=0; $prospect_name=0; ?>
                                  @foreach($compaigns as $key => $data)
                                  @php
                                  $count++;
                                  $id = $data->id;
                                  $prospect_name = $data->prospect_name;
                                  $budget = $data->budget;
                                  @endphp
                                  
                                  <!-- <option  value="{{ $id }}">{{ $prospect_name }}</option> -->
                          
                                  @endforeach
                              </select>
                           </div>
                           <div class="form-group">
                              <label for="sources" class="col-sm-4 control-label">Sources</label>
                              <div class="col-sm-6 w3-mobile"  style="width: 65%;">
                                 <input type="text" value="{{ $sources }}" name="sources" id="sources" placeholder="sources" class="form-control" autofocus readonly="readonly"></input>
                              </div>
                           </div><br /><br />
                           
                           <div class="form-group">
                              <label for="budget" class="col-sm-4 control-label" style="margin-right: 150px;">Budget</label>
                              <div class="col-sm-6 w3-mobile"  style="width: 65%; margin-left: -150px;">
                                 <input type="text" value="{{ $task_budget }}" name="budget" id="budget" placeholder="budget" class="form-control" readonly="readonly"></input>
                              </div>
                           </div><br /><br />
                           <div class="form-group">
                              <label for="approved_amount" class="col-sm-4 control-label">Approved Amount</label>
                              <div class="col-sm-6 w3-mobile"  style="width: 65%;">
                                 <input type="text" value="{{ $approved_amount }}" name="approved_amount" id="approved_amount" placeholder="approved_amount" class="form-control" readonly="readonly"></input>
                              </div>
                           </div><br /><br />
                          <!--  <div class="form-group">
                              <label for="linkdin" class="col-sm-4 control-label">Rating</label>
                              <div class="col-sm-6"  style="width: 65%;">
                                 <input type="text" name="rating" id="rating" placeholder="rating" class="form-control">
                              </div>
                           </div> -->
                        </div>
                        <div class="container col-sm-6 w3-mobile"  style="width: 50%;">
                           <div class="form-group">
                              <label for="start_date" class="col-sm-4 control-label">Start Date</label>
                              <div class="col-sm-6 w3-mobile"  style="width: 65%;">
                                 <input type="date" value="{{ $start_date }}" name="start_date" id="start_date" placeholder="select_date" class="form-control" readonly="readonly"></input>
                              </div>
                           </div><br /><br />
                           <div class="form-group">
                              <label for="end_date" class="col-sm-4 control-label">End Date</label>
                              <div class="col-sm-6 w3-mobile"  style="width: 65%;">
                                 <input type="date" value="{{ $end_date }}" name="end_date" id="end_date" placeholder="select_date" class="form-control" readonly="readonly"></input>
                              </div>
                           </div><br /><br />
                           <div class="form-group green-border-focus">
                              <label for="description" class="col-sm-4 control-label">Description</label>
                              <div class="col-sm-6 w3-mobile"  style="width: 65%;">
                                <textarea class="form-control" name="description" id="description" rows="3">{{ $discription }}</textarea>
                                 <!-- <textarea type="text" name="description" id="description" placeholder="description" class="form-control"></textarea> -->
                              </div>
                           </div><br /><br />
                           <!-- <div class="form-group">
                              <label for="phoneNumber" class="col-sm-4 control-label">Phone number </label>
                              <div class="col-sm-6"  style="width: 65%;">
                                 <input type="phoneNumber" name="phone" id="phone" placeholder="phone number" class="form-control">
                                 <span class="help-block">Your phone number won't be disclosed anywhere </span>
                              </div>
                           </div>
                           <div class="form-group">
                              <label for="project_type" class="col-sm-4 control-label">Project Type<font color="red" size="5">*</font></label>
                              <div class="col-sm-6"  style="width: 65%;">
                                 <input type="text" name="project_type" id="project_type" placeholder="project_type" class="form-control">
                              </div>
                           </div> 
                           <div class="form-group">
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
                           </div>-->
                           
                        </div>
                        <div class="span-4 w3-mobile" style="width: 100%;">
                            <a class="btn btn-primary pull-right btn-block w3-mobile"data-dismiss="modal" style="width: 15%; margin-left: 20px;">Cancel</a>
                            <button type="submit" class="btn btn-primary btn-block pull-right w3-mobile" style="width: 15%;">Submit</button>
                        </div><br /><br />
                        <!-- <div class="modal-footer w3-mobile" style="margin-top: 220px;">
                           <button type="submit" class="btn btn-primary w3-mobile">Submit</button>
                           <button type="button" class="btn btn-primary w3-mobile" data-dismiss="modal" style=" margin-right: 100px;">Close</button>
                        </div> -->
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
         <!-- <center>{{ $compaigns->links() }}</center> -->
         <span class="w3-right">{{ $compaigns->links() }}</span>
      </div>
    </div>
  </div>
   </div>
   <br />
   <!-- <div class="col-md-12 text-center">
      <ul class="pagination pagination-lg pager" id="myPager"></ul>
   </div> -->
</div>
<br />
<script type="text/javascript">
    
   function delete_fun(id)
   {
      //alert(id);
      var choice = confirm("do you want to delete this record ?");
      if (choice) {
         window.location.href = this.getAttribute('href');
      }
   }
   // function edit_fun(id)
   // {
   //    //alert(id);
   //    document.getElementById('myModal1').style.display = 'block';
   //    // $.ajax({  
   //    //   type: 'POST',  
   //    //   url: 'ajax_edit_tasks.php',
   //    //   data: { id: val },
   //    //   success: function(response) 
   //    //   {
   //    //   //alert(response);
   //    //   document.getElementById('edit_inc').innerHTML = response;
   //    // }
   //    // });
   // }
</script>
@endsection