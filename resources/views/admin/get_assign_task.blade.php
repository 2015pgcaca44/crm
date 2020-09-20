@extends('admin.layouts.app')
@section('content')
<div class="row">
<div class="w3-container col-md-12 w3-mobile">
   <div style="width: 100%;">
    <div class="container">
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

   @if($message = Session::get('success'))
   <div class="alert alert-success alert-block w3-mobile">
    <button type="button" class="close" data-dismiss="alert">×</button>
           <strong>{{ $message }}</strong>
   </div>
   @endif
   
   <br />
   <div class="panel panel-default w3-mobile" style="width: 95%;">
    <div class="panel-heading w3-mobile">
     <h3 class="panel-title w3-mobile" style="color: #1A20D9;">Assign Tasks</h3>
    </div>
    <div class="panel-body w3-mobile">
     <div class="table-responsive">
      <form class="form-horizontal" method="post" action="{{url('assign_task')}}" role="form" style="background-color: #fff;">
            {{ csrf_field() }}
      <table class="table table-sm w3-small w3-mobile" style="width: 100%; overflow-x:auto;">
       <tr class="bg-primary">
        <th style="color: #fff;" nowrap="nowrap">Slno.</th>
        <th style="width: 170px; color: #fff;" nowrap="nowrap">Assign Task</th>
        <th style="width: 13%; color: #fff;" nowrap="nowrap">Campaign Name</th>
        <th style="width: 15%; color: #fff;" nowrap="nowrap">Form Name</th>
        <th style="color: #fff;" nowrap="nowrap">Platform</th>
        <th style="width: 15%; color: #fff;" nowrap="nowrap">Full Name</th>
        <th style="color: #fff;" nowrap="nowrap">Email</th>
        <th style="color: #fff;" nowrap="nowrap">Phone Number</th>
        <th style="color: #fff;" nowrap="nowrap">Location</th>
        <!-- <th style="width: 13%; color: #fff;" nowrap="nowrap">Enquiry For</th> -->
        <th style="color: #fff;" nowrap="nowrap">Project start date</th>
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
                  <td style="color: #000000;">{{$count}}
                    <input type="hidden" name="campaign_id[{{$data->id}}]" value="{{$data->id}}"></input>
                  </td>
                  <td nowrap="nowrap" style="color: #000000;">
                    <select class="w3-input w3-light-grey" name="sales_id[{{$data->id}}]" id="sales_id" style="width: 100%;">
                      @php

                      $contact_name1 = \App\Sales::where(['id' => $data->contact_person_id])->where(['client_id' => $data->client_id])->pluck('name');
                      $contact_name = trim($contact_name1,'["]');
                      if($contact_name)
                      {
                        @endphp
                      <option value="{{$data->contact_person_id}}" selected>{{$contact_name}}</option>
                      @php
                      }else{
                      @endphp
                      <option value="" selected>Select Salesman</option>
                      @php
                      }
                       $sales="";
                      $sales = \App\Sales::where(['client_id' => 0])->get();
                      @endphp
                      @foreach($sales as $value)
                      {
                        <option value="{{$value->id}}">{{$value->name}}</option>
                      }
                      @endforeach
                    </select>
                  </td>
                  <td nowrap="nowrap" style="color: #000000;">{{$data->campaign_name}}</td>
                  <td style="color: #000000;">{{$data->form_name}}</td>
                  <td style="color: #000000;">{{$data->contact_via}}</td>
                  <td nowrap="nowrap" style="color: #000000;">{{$data->prospect_name}}</td>
                  <td nowrap="nowrap" style="color: #000000;">{{$data->email}}</td>
                  <td nowrap="nowrap" style="color: #000000;"></td>
                  <td nowrap="nowrap" style="color: #000000;">{{$data->location}}</td>
                  <!-- <td nowrap="nowrap" style="color: #000000;">{{$data->topic_on}}</td> -->
                  <td nowrap="nowrap" style="color: #000000;"></td>
                  
               </tr>

               @endforeach

      </table>
      <table class="table table-sm w3-small w3-mobile"><tr><button type="submit" name="submit" value="" class="btn btn-primary btn-block w3-mobile" style="width: 14%; margin-left: 5%;">assign</tr></table>
      
    </form>
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