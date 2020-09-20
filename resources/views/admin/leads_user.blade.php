@extends('admin.layouts.app')
@section('content')
<div class="row">
<div class="w3-container col-md-12 w3-mobile">
   <div style="width: 100%;">

      <div class="panel panel-default w3-mobile" style="width: 100% margin-top:40px;">
         <div class="panel-heading w3-mobile">
          <h3 class="panel-title" style="color: #1A20D9;">My Leads</h3>
         </div>
         <div class="panel-body w3-mobile">
          <div class="table-responsive">
         <table id="dtBasicExample" class="table table-sm w3-small w3-mobile" style="width: 100%; overflow-x:auto;">
            <thead>
               <br />
               <tr class="bg-primary">
                  <th scope="col" style="color: #fff;" nowrap="nowrap">Slno.</th>
                  <th scope="col" style="width: 13%; color: #fff;" nowrap="nowrap">Sales Name</th>
                  <th scope="col" style="width: 13%; color: #fff;" nowrap="nowrap">Leads Name</th>
                  <th scope="col" style="width: 13%; color: #fff;" nowrap="nowrap">Sources</th>
                  <th scope="col" style="width: 20%; color: #fff;" nowrap="nowrap">Company</th>
                  <th scope="col" style="width: 13%; color: #fff;" nowrap="nowrap">Phone</th>
                  <th scope="col" style="width: 13%; color: #fff;" nowrap="nowrap">Email</th>
                  <th scope="col" style="width: 13%; color: #fff;" nowrap="nowrap">Website</th>
                  <!-- <th scope="col" style="width: 13%; color: #fff;" nowrap="nowrap">Status</th> -->
                  <th scope="col" style="width: 20%; color: #fff;" nowrap="nowrap">Date of Initial</th>
                  <!-- <th scope="col" style="color: #fff;"><center>Action</center></th> -->
               </tr>
            </thead>
            <tbody>
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
                  <td nowrap="nowrap" style="color: #000000;">{{$contact_name}}</td>
                  <td nowrap="nowrap" style="color: #000000;">{{$data->prospect_name}}</td>
                  <td style="color: #000000;">{{$data->contact_via}}</td>
                  <td style="color: #000000;">{{$data->company}}</td>
                  <td nowrap="nowrap" style="color: #000000;">{{$data->phone}}</td>
                  <td nowrap="nowrap" style="color: #000000;"><a href="{{$data->email}}">{{$data->email}}</a></td>
                  <td nowrap="nowrap" style="color: #000000;"><a href="{{ url($data->website) }}">{{$data->website}}</a></td>
                  <!-- <td style="color: #000000;">Lead</td> -->
                  <td style="color: #000000;">{{$data->contact_date}}</td>

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
                  <!-- <td><a onclick="delete_fun(@php echo $id @endphp);"><img class="pull-left" src="/images/delete.png" height="20px;" width="20px;" style="margin-right: 10px;"></a></td> -->
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
</div><br />
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
   //    document.getElementById('editModal').style.display = 'block';
   //    $.ajax({  
   //      type: 'POST',  
   //      url: 'ajax_edit_tasks.php',
   //      data: { id: val },
   //      success: function(response) 
   //      {
   //      //alert(response);
   //      document.getElementById('edit_inc').innerHTML = response;
   //    }
   //    });
   // }
</script>
@endsection