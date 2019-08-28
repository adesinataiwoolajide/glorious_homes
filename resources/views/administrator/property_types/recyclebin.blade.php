@extends("layouts.app")
    @section("content")
    <div class="clearfix"></div>
    <div class="content-wrapper">
   		<div class="container-fluid">
   			<div class="row pt-2 pb-2">
		        <div class="col-sm-12">
				    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('administrator.dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{route('property.type.restore')}}">Restore Deleted Property Type</a></li>
                        <li class="breadcrumb-item"><a href="{{route('property.type.create')}}">Add Property Types</a></li>
			            <li class="breadcrumb-item active" aria-current="page">Deleted Property Yypes</li>
			         </ol>
			   	</div>
			</div>
   			
			 <div class="row">
		    	<div class="col-lg-12">
					@include('partials._message')
		          	<div class="card">
                        
		          		@if(count($type) ==0)
                            <div class="card-header" align="center" style="color: red">
                                <i class="fa fa-table"></i> The List is Empty
			            	</div>

			            @else
			            	<div class="card-header"><i class="fa fa-table"></i> List of Deleted Property types</div>
		            		<div class="card-body">
		              			<div class="table-responsive">
                                    <table id="default-datatable" class="table table-bordered">
		              					<thead>
						                    <tr>
												<th>S/N</th>
												<th>Property Type </th>
						                        <th>Property Category</th>
												<th>Time Deleted</th>
						                    </tr>
						                </thead>

						                <tfoot>
						                    <tr>
												<th>S/N</th>
												<th>Property Type </th>
												<th>Property Category</th>
												<th>Time Deleted</th>
						                    </tr>
						                </tfoot>
						                <tbody>
						                	<?php $number =1; ?>
						                	@foreach($type as $types)
							                    <tr>
													<td>{{$number}}
														@if(auth()->user()->hasPermissionTo('Restore Property Category') OR 
															(Gate::allows('Administrator', auth()->user())))
															<a href="{{route('property.type.undelete', $types->property_type_id)}}"
																onclick="return(confirmToRestore());" class="btn btn-success">
																<i class="fa fa-trash-o"></i> Restore
															</a>
														@endif
							                        	
							                        </td>
							                        <td>{{$types->property_type_name}}</td>
							                        <td>{{$types->property_category->property_category_name}}</td>
													<td>{{$types->deleted_at}}</td>
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