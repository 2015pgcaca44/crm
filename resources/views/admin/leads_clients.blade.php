@extends('admin.layouts.app')
@section('content')
<div class="row">
<div class="w3-container col-md-12 w3-mobile">
   <div style="width: 100%;">
      <div class="modal" id="editModal">
             <div class="modal-dialog w3-mobile" style="width: 30%;">
               <div class="modal-content w3-mobile">
               
                 <!-- Modal Header -->
                 <div class="modal-header w3-mobile">
                   <font class="modal-title" color="pblue" size="5" style="color: #1A20D9;">Update Status</font>
                   <button type="button" class="close" onclick="document.getElementById('editModal').style.display = 'none';" data-dismiss="modal">&times;</button>
                 </div>
                 
                 <!-- Modal body -->
                 <div class="modal-body w3-mobile">
                   <div class="panel-body w3-mobile">
                       <form class="form-horizontal" method="POST" action="{{url('tasks')}}">
                           {{ csrf_field() }}
                           <!-- <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>"> -->
                           <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                               <label for="status" class="col-md-4 control-label">Status</label>
                               <div class="col-md-6 w3-mobile">
                                   <select class="w3-input w3-light-grey w3-mobile" name="status" id="status" style="width: 100%;">
                                      <option value="" selected disabled>Select Status</option>
                                      <option value="1">Completed</option>
                                      <option value="0">Pending</option>
                                  </select>

                                   @if ($errors->has('status'))
                                       <span class="help-block">
                                           <strong>{{ $errors->first('status') }}</strong>
                                       </span>
                                   @endif
                               </div>
                           </div>
                           <div class="span-4 w3-mobile" style="width: 100%;">
                              <a class="btn btn-primary pull-right btn-block w3-mobile" onclick="document.getElementById('editModal').style.display = 'none';" data-dismiss="modal" style="width: 10%; margin-left: 20px;">Cancel</a>
                              <button type="submit" class="btn btn-primary btn-block pull-right w3-mobile" style="width: 10%;">Update</button>
                          </div><br />
                           <!-- <div class="form-group">
                           <div class="modal-footer">
                              <button type="submit" class="btn" style="background-color: #00838f;color: #fff;">Update</button>
                              <button type="button" class="btn" onclick="document.getElementById('editModal').style.display = 'none';" data-dismiss="modal" style="background-color: #00838f;color: #fff;">Close</button>
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
     <div class="panel panel-default" style="width: 100% margin-top:40px;">
         <div class="panel-heading">
          <h3 class="panel-title" style="color: #1A20D9;">Our Leads</h3>
         </div>
         <div class="panel-body">
          <div class="table-responsive">
         <table id="dtBasicExample" class="table table-sm w3-small" style="width: 100%; overflow-x:auto;">
            <thead>
               <br />
               <tr class="bg-primary">
                  <th style="color: #fff;" nowrap="nowrap">Slno.</th>
                  <th style="width: 15%; color: #fff;" nowrap="nowrap">Leads Date</th>
                  <th style="width: 13%; color: #fff;" nowrap="nowrap">Sales Name</th>
                  <th style="width: 13%; color: #fff;" nowrap="nowrap">Leads Name</th>
                  <th style="width: 15%; color: #fff;" nowrap="nowrap">Sources</th>
                  <th style="width: 20%; color: #fff;" nowrap="nowrap">Company</th>
                  <th style="width: 15%; color: #fff;" nowrap="nowrap">Phone</th>
                  <th style="width: 13%; color: #fff;" nowrap="nowrap">Email</th>
                  <th style="width: 13%; color: #fff;" nowrap="nowrap">Website</th>
                  <!-- <th style="width: 13%; color: #fff;" nowrap="nowrap">Status</th> -->
                  <th style="color: #fff;" colspan="2"><center>Action</center></th>
               </tr>
            </thead>
            <tbody>
               <!-- $contact_person = $data->contact_person_id;
               $contact_name = Compaigns::connection('mysql')->select("select * from clients where id = 'contact_person' "); -->
               <?php $count = 0; ?>
               @foreach($compaigns as $key => $data)
               <?php 
                  $count++;
                  $id = $data->id;
                  $contact_name1 = \App\Customer::where(['id' => $data->contact_person_id])->pluck('name');
                  $contact_name = trim($contact_name1,'["]');
               ?>
               
               <tr class="w3-hover-pale-green">
                  <td style="color: #000000;">{{$count}}</td>
                  <td style="color: #000000;">{{$data->contact_date}}</td>
                  <td nowrap="nowrap" style="color: #000000;">{{$contact_name}}</td>
                  <td nowrap="nowrap" style="color: #000000;">{{$data->prospect_name}}</td>
                  <td style="color: #000000;">{{$data->contact_via}}</td>
                  <td style="color: #000000;">{{$data->company}}</td>
                  <td nowrap="nowrap" style="color: #000000;">{{$data->phone}}</td>
                  <td nowrap="nowrap" style="color: #000000;"><a href="{{$data->email}}">{{$data->email}}</a></td>
                  <td nowrap="nowrap" style="color: #000000;"><a href="{{ url($data->website) }}">{{$data->website}}</a></td>
                  <!-- <td style="color: #000000;">Lead</td> -->
                  <!-- <td >
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
                  </td> -->
                  <td style="padding-left: 20px;"><a class="btn btn-sm pull-right" data-toggle="modal" data-target="#editModal"><img class="pull-left" src="./images/edit_icon1.png" height="20px;" width="20px;"></a></td>
                  <td><a onclick="delete_fun(@php echo $id @endphp);"><img class="pull-left" src="./images/delete.png" height="20px;" width="20px;" style="margin-right: 10px;"></a></td>
               </tr>
               @endforeach
            </tbody>
         </table>
        <!-- <center>{{ $compaigns->links() }}</center> -->
        <span class="w3-right">{{ $compaigns->links() }}</span>
      </div>
    </div>
  </div>
   </div>
   <!-- <div class="col-md-12 text-center">
      <ul class="pagination pagination-lg pager" id="myPager"></ul>
   </div> -->
</div>
</div><br />
<script type="text/javascript">
   function delete_fun(id)
   {
      //alert(id);
      var choice = confirm("do you want to delete this record "+id);
      if (choice) {
         window.location.href = this.getAttribute('href');
      }
   }
   
</script>
@endsection