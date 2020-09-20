@extends('admin.layouts.app')

@section('content')
<!-- <!DOCTYPE html>
<html>
<head>
	<title></title>
	<link src="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
	<link 
  href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css" 
  rel="stylesheet"  type='text/css'>
  <link rel="stylesheet" href="~/lib/Font-Awesome/css/fontawesome.min.css">
<link rel="stylesheet" href="~/lib/Font-Awesome/css/regular.min.css">
<link rel="stylesheet" href="~/lib/Font-Awesome/css/solid.min.css">
</head>
<body> -->



	<div class="row">
		<div class="col-md-2">
			@component('admin.layouts.menus.sidebar')

			@endcomponent
		</div>
		<div class="col-md-10">
			 <div class="row">
			 	<div class="col-sm-3">
			 		<div class="card" style="background-color: #E9E3E3;padding-top: 3px;padding-bottom: 3px;">
			 			<div class="card-header">Active Employee</div>
			 			<div class="card-body" style="background-color: #fff;padding-top: 4px;padding-bottom: 4px;">
			 				<h4 class="text-center">4</h4>
			 			</div>
			 		</div>
			 	</div>
			 	<div class="col-sm-3">	
			 		<div class="card" style="background-color: #E9E3E3;padding-top: 3px;padding-bottom: 3px;">
			 			<div class="card-header">Current Leader</div>
			 			<div class="card-body text-center" style="background-color: #fff;padding-top: 4px;padding-bottom: 4px;">
					        <h4 class="text-center">Ganesh Messi</h4>
					    </div>
					    
			 		</div>
			 	</div>
			 	<div class="col-sm-3">
			 		<div class="card" style="background-color: #E9E3E3;padding-top: 3px;padding-bottom: 3px;">
			 			<div class="card-header">Sales for Month</div>
			 			<div class="card-body" style="background-color: #fff;padding-top: 4px;padding-bottom: 4px;">
			 				<h4 class="text-center">10</h4>
			 			</div>
			 		</div>
			 	</div>	
			 	<div  class="col-sm-3">
			 		<div class="card" style="background-color: #E9E3E3;padding-top: 3px;padding-bottom: 3px;margin-right: 20px;">
			 			<div class="card-header">Total Sales Value</div>
			 			<div class="card-body" style="background-color: #fff;padding-top: 4px;padding-bottom: 4px; ">
			 				<h4 class="text-center"> 44,220 /- </h4>
			 			</div>
			 		</div>
			 	</div>	
			</div>
			 <div class="row"  style="margin-top: 20px;">
			 	<div class="col-sm-5">
			 		<div class="card" >
			 			<div class="card-header" style="background-color: #E9E3E3;padding-top: 3px;padding-bottom: 3px;">Unassigned Prospects</div>
			 			<div class="card-body">
			 				<ul class="list-grop list-grop-flush">
			 					@for($i = 0; $i < 6; $i++)
				 					<li class="list-group-item" style="margin-left: -40px;">
				 						shandhya Gowde<span style="float: right;"><button type="button" class="btn btn-success" style="margin-top: -8px;">Assign</button></span>
				 					</li>
				 				@endfor
				 				<li class="list-group-item" style="margin-left: -40px;">
				 					<a href="" class="btn btn-block btn-sm btn-primary">View all Unassigned leads</a>
				 				</li>
			 				</ul>
			 			</div>

			 		</div>
			 	</div>
			 	<div class="col-sm-7">
			 		<div class="card">
			 			<div class="card-header" style="background-color: #E9E3E3;padding-top: 3px;padding-bottom: 3px;">Recent Estimates</div>
			 			<!-- <div class="card-body"> -->
			 				<!--  -->
			 				<ul class="list-grop list-grop-flush">
			 					@for($i = 0; $i < 6; $i++)
				 					<li class="list-group-item" style="margin-left: -40px;">
				 						<div class="row">
				 							<div class="col-sm-3">
						 						shandhya Gowde
						 					</div>
						 					<div class="col-sm-3">
						 						shandhya Gowde
						 					</div>
						 					<div class="col-sm-3">
						 						shandhya Gowde
						 					</div>
						 					<div class="col-sm-3">
						 						<span style="float: right;"><button type="button" class="btn btn-success" style="margin-top: -8px;">Assign</button></span>
						 					</div>
					 					</div>
					 				</li>
				 				@endfor
				 				<li class="list-group-item" style="margin-left: -40px;">
				 					<a href="" class="btn btn-block btn-sm btn-primary">View all Unassigned leads</a>
				 				</li>
			 				</ul>
			 			<!-- </div> -->

			 		</div>
			 	</div>
			 </div>
		</div>
	</div>
	<!-- </body>
</html> -->
@endsection()