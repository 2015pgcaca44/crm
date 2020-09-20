@extends('admin.layouts.app')
@section('content')
<div class="row">
	<div class="col-md-2" style="height: 100%;">
	   @component('admin.layouts.menus.sidebar')
	   @endcomponent
	</div>
<div class="w3-container col-md-10">
  <?php $leads = ""; ?>
  @foreach($compaigns as $key => $data)
  <?php 

    $leads1 = $data->lead_type;
    if($leads1 == "our"){
      $leads = "Our";
  }else{
    $leads = "Business";
  }
  ?>
  @endforeach
   <!-- <h3 style="margin-top: -3px;">{{$leads}} Leads</h3> -->
   <div style="width: 94%;">
    <div class="container">
   <h3 align="">Import leads</h3>
    <br />
   @if(count($errors) > 0)
    <div class="alert alert-danger">
     Upload Validation Error<br><br>
     <ul>
      @foreach($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
     </ul>
    </div>
   @endif

   @if($message = Session::get('success'))
   <div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
           <strong>{{ $message }}</strong>
   </div>
   @endif
   <form method="post" enctype="multipart/form-data" action="{{ url('/import_excel_leads') }}">
    {{ csrf_field() }}
    <div class="form-group">
     <table class="table" style="width:80%">
      <tr>
        <td><label>Clients<font color="red" size="2">*</font></label></td>
        <td>
          <select class="w3-input w3-light-grey" name="client" id="client" required="required">
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
          <input type="file" name="select_file">
        </td>
        <td>
          <input type="submit" name="submit" class="btn" value="Upload" style="background-color: #00838f;color: #fff;">
        </td>
      </tr>
      <!-- <tr>
       <td ></td>
       <td ><span class="text-muted">.xls, .xslx</span></td>
       <td ></td>
      </tr> -->
     </table>
    </div>
   </form>
   
   <br />
   <div class="panel panel-default" style="width: 95%">
    <div class="panel-heading">
     <h3 class="panel-title">Customer Leads</h3>
    </div>
    <div class="panel-body">
     <div class="table-responsive">
      <table class="table table-bordered table-striped">
       <tr style="background-color: #00838f;">
        <th style="color: #fff;" nowrap="nowrap">Slno.</th>
        <th style="width: 15%; color: #fff;" nowrap="nowrap">Leads Date</th>
        <th style="width: 13%; color: #fff;" nowrap="nowrap">Sales Name</th>
        <th style="width: 13%; color: #fff;" nowrap="nowrap">Leads Name</th>
        <th style="width: 15%; color: #fff;" nowrap="nowrap">Sources</th>
        <th style="width: 20%; color: #fff;" nowrap="nowrap">Company</th>
        <th style="width: 15%; color: #fff;" nowrap="nowrap">Phone</th>
        <th style="width: 13%; color: #fff;" nowrap="nowrap">Email</th>
        <th style="width: 13%; color: #fff;" nowrap="nowrap">Website</th>
        <th style="width: 13%; color: #fff;" nowrap="nowrap">Client Name</th>
        <th style="color: #fff;" colspan="2"><center>Action</center></th>
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
                  <td style="color: #000000;">{{$data->contact_date}}</td>
                  <td nowrap="nowrap" style="color: #000000;">{{$contact_name}}</td>
                  <td nowrap="nowrap" style="color: #000000;">{{$data->prospect_name}}</td>
                  <td style="color: #000000;">{{$data->contact_via}}</td>
                  <td style="color: #000000;">{{$data->company}}</td>
                  <td nowrap="nowrap" style="color: #000000;">{{$data->phone}}</td>
                  <td nowrap="nowrap" style="color: #000000;"><a href="{{$data->email}}">{{$data->email}}</a></td>
                  <td nowrap="nowrap" style="color: #000000;"><a href="{{ url($data->website) }}">{{$data->website}}</a></td>
                  <td nowrap="nowrap" style="color: #000000;">{{$client_name}}</td>
                  
                  <td style="padding-left: 20px;"><a class="btn btn-sm pull-right" data-toggle="modal" data-target="#editModal"><img class="pull-left" src="/images/edit_icon1.png" height="20px;" width="20px;"></a></td>
                  <td><a onclick="delete_fun(@php echo $id @endphp);"><img class="pull-left" src="/images/delete.png" height="20px;" width="20px;" style="margin-right: 10px;"></a></td>
               </tr>
               @endforeach
      </table>
     </div>
    </div>
   </div>
  </div>
</div>
      <!-- <div class="modal" id="editModal">
             <div class="modal-dialog" style="width: 30%;">
               <div class="modal-content">
               
                 
                 <div class="modal-header">
                   <font class="modal-title" color="pblue" size="5">Update Status</font>
                   <button type="button" class="close" onclick="document.getElementById('editModal').style.display = 'none';" data-dismiss="modal">&times;</button>
                 </div>
                 
                 
                 <div class="modal-body">
                   <div class="panel-body">
                       <form class="form-horizontal" method="POST" action="{{url('tasks')}}">
                           {{ csrf_field() }}
                           
                           <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                               <label for="status" class="col-md-4 control-label">Status</label>
                               <div class="col-md-6">
                                   <select class="w3-input w3-light-grey" name="status" id="status" style="width: 100%;">
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
                           <div class="form-group">
                           <div class="modal-footer">
                              <button type="submit" class="btn" style="background-color: #00838f;color: #fff;">Update</button>
                              <button type="button" class="btn" onclick="document.getElementById('editModal').style.display = 'none';" data-dismiss="modal" style="background-color: #00838f;color: #fff;">Close</button>
                           </div>
                           </div>
                       </form>
                  </div>
                 </div> -->
                 <!-- Modal footer -->
                 <!-- <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Register</button>
                  </div> -->
               <!-- </div>
             </div>
        </div>
      <div class="w3-container w3-card-4" style="width: 105%;margin-top: 20px;overflow-x:auto; background-color:#fff; padding-bottom: 15px;">
         <table id="dtBasicExample" class="table table-sm w3-small" style="width: 100%; overflow-x:auto;margin-left: -5px;">
            <thead>
               <br />
               <tr style="background-color: #00838f;">
                  <th style="color: #fff;" nowrap="nowrap">Slno.</th>
                  <th style="width: 15%; color: #fff;" nowrap="nowrap">Leads Date</th>
                  <th style="width: 13%; color: #fff;" nowrap="nowrap">Sales Name</th>
                  <th style="width: 13%; color: #fff;" nowrap="nowrap">Leads Name</th>
                  <th style="width: 15%; color: #fff;" nowrap="nowrap">Sources</th>
                  <th style="width: 20%; color: #fff;" nowrap="nowrap">Company</th>
                  <th style="width: 15%; color: #fff;" nowrap="nowrap">Phone</th>
                  <th style="width: 13%; color: #fff;" nowrap="nowrap">Email</th>
                  <th style="width: 13%; color: #fff;" nowrap="nowrap">Website</th>
                  <th style="width: 13%; color: #fff;" nowrap="nowrap">Client Name</th>
                  <th style="color: #fff;" colspan="2"><center>Action</center></th>
               </tr>
            </thead>
            <tbody>
               
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
                  <td style="color: #000000;">{{$data->contact_date}}</td>
                  <td nowrap="nowrap" style="color: #000000;">{{$contact_name}}</td>
                  <td nowrap="nowrap" style="color: #000000;">{{$data->prospect_name}}</td>
                  <td style="color: #000000;">{{$data->contact_via}}</td>
                  <td style="color: #000000;">{{$data->company}}</td>
                  <td nowrap="nowrap" style="color: #000000;">{{$data->phone}}</td>
                  <td nowrap="nowrap" style="color: #000000;"><a href="{{$data->email}}">{{$data->email}}</a></td>
                  <td nowrap="nowrap" style="color: #000000;"><a href="{{ url($data->website) }}">{{$data->website}}</a></td>
                  <td nowrap="nowrap" style="color: #000000;">{{$client_name}}</td>
                  
                  <td style="padding-left: 20px;"><a class="btn btn-sm pull-right" data-toggle="modal" data-target="#editModal"><img class="pull-left" src="/images/edit_icon1.png" height="20px;" width="20px;"></a></td>
                  <td><a onclick="delete_fun(@php echo $id @endphp);"><img class="pull-left" src="/images/delete.png" height="20px;" width="20px;" style="margin-right: 10px;"></a></td>
               </tr>
               @endforeach
            </tbody>
         </table>
        <center>{{ $compaigns->links() }}</center>
      </div>
   </div>
   
</div> -->
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