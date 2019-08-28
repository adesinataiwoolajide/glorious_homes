@extends("layouts.app")
    @section("content")
    <div class="clearfix"></div>
    <div class="content-wrapper">
   		<div class="container-fluid">
   			<div class="row pt-2 pb-2">
		        <div class="col-sm-12">
				    <ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{route('administrator.dashboard')}}">Home</a></li>
						<li class="breadcrumb-item"><a href="{{route('facility.edit', $categ->facility_id)}}">Edit Facility</a></li>
						<li class="breadcrumb-item"><a href="{{route('facility.create')}}">Add Property Facility</a></li>
						@if(auth()->user()->hasRole('Administrator') OR auth()->user()->hasRole('Admin'))
							<li class="breadcrumb-item"><a href="{{route('facility.restore')}}">
							Restore Deleted Property Facilities</a></li>
						@endif
			            <li class="breadcrumb-item active" aria-current="page">List of Saved Property Facilities</li>
			         </ol>
			   	</div>
			</div>
   			<div class="row">
		    	<div class="col-lg-12">

		    		@include('partials._message')
		          	<div class="card">
		            	<div class="card-header"><i class="fa fa-table"></i> Please Fill The Below Form To Edit Property Facility</div>
	            		<div class="card-body">
	            			<form action="{{route('facility.update', $categ->facility_id)}}" method="POST" enctype="multipart/form-data">
	            				{{ csrf_field() }}
		            			<div class="form-group row ">
		            				<div class="col-sm-6">
										
										<input type="text" class="form-control form-control-rounded" name="facility_name" required 
										placeholder="Enter The facility Name" value="{{$categ->facility_name}}">
										<input type="hidden"  name="prev_name" value="{{$categ->facility_name}}">
					                    <span style="color: red">** This Field is Required **</span>
					                     @if ($errors->has('facility_name'))
                                            <div class="alert alert-danger alert-dismissible" role="alert">
										        <button type="button" class="close" data-dismiss="alert">&times;</button>
										        <div class="alert-icon contrast-alert">
										            <i class="fa fa-check"></i>
										        </div>
										        <div class="alert-message">
										            <span><strong>Error!</strong> {{ $errors->first('facility_name') }} !</span>
										        </div>
										    </div>
                                        @endif  
					                </div>

					                <div class="col-sm-6" align="center">
					                    <button type="submit" class="btn btn-success btn-lg btn-block">UPDATE THE PROPERTY FACILITY </button>
					                </div>
						            
					            </div>
				            </form>
		            	</div>
		            </div>
		        </div>
		    </div>
			 <div class="row">
		    	<div class="col-lg-12">
		          	<div class="card">
		          		@if(count($facility) ==0)
                            <div class="card-header" align="center" style="color: red">
                                <i class="fa fa-table"></i> The List is Empty
			            	</div>

			            @else
			            	<div class="card-header"><i class="fa fa-table"></i> List of Saved Facilities</div>
		            		<div class="card-body">
		              			<div class="table-responsive">
                                    <table id="default-datatable" class="table table-bordered">
		              					<thead>
						                    <tr>
						                        <th>S/N</th>
						                        <th>Facility Name</th>
												<th>Time Added</th>
						                    </tr>
						                </thead>

						                <tfoot>
						                    <tr>
												<th>S/N</th>
												<th>Facility Name</th>
												<th>Time Added</th>
						                    </tr>
						                </tfoot>
						                <tbody>
						                	<?php $number =1; ?>
						                	@foreach($facility as $facilities)
							                    <tr>
													<td>{{$number}}
														@if(auth()->user()->hasPermissionTo('Edit Facility') OR 
															(Gate::allows('Administrator', auth()->user()))
															OR (auth()->user()->hasPermissionTo('Delete Facility')))
															<a href=ss"{{route('facility.delete', $facilities->facility_id)}}" 
																onclick="return(confirmToDelete());" class="btn btn-danger">
																<i class="fa fa-trash-o"></i>
															</a>
														
															<a href="{{route('facility.edit', $facilities->facility_id)}}" 
																onclick="return(confirmToEdit());" class="btn btn-success">
																<i class="fa fa-pencil"></i>
															</a>
														@endif
							                        </td>
							                        <td>{{$facilities->facility_name}}</td>
							                        
													<td>{{$facilities->created_at}}</td>
							                    </tr><?php
							                    $number++; ?>
							                @endforeach
						                </tbody>
						               
		              				</table>
		              			</div>
		              		</div>
		             	@endif
	              	</div>
	            </div>
	        </div>
	     </div>
	</div>


    <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
    <!--End Back To Top Button-->
	
@endsection