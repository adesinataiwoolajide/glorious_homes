@extends("layouts.app")
    @section("content")
    <div class="clearfix"></div>
    <div class="content-wrapper">
   		<div class="container-fluid">
   			<div class="row pt-2 pb-2">
		        <div class="col-sm-9">
				    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('administrator.dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{route('agent.category.restore')}}">Restore Deleted  Category</a></li>
                        <li class="breadcrumb-item"><a href="{{route('agent.category.create')}}">Add Agent Category</a></li>
			            <li class="breadcrumb-item active" aria-current="page">Deleted Agent Categories</li>
			         </ol>
			   	</div>
			</div>
   			
			 <div class="row">
		    	<div class="col-lg-12">
					@include('partials._message')
		          	<div class="card">
                        
		          		@if(count($category) ==0)
                            <div class="card-header" align="center" style="color: red">
                                <i class="fa fa-table"></i> The List is Empty
			            	</div>

			            @else
			            	<div class="card-header"><i class="fa fa-table"></i> List of Deleted Agent Categories</div>
		            		<div class="card-body">
		              			<div class="table-responsive">
                                    <table id="default-datatable" class="table table-bordered">
		              					<thead>
						                    <tr>
						                        <th>S/N</th>
						                        <th>Agent Category Name</th>
												<th>Time Deleted</th>
						                    </tr>
						                </thead>

						                <tfoot>
						                    <tr>
												<th>S/N</th>
												<th>Agent Category Name</th>
												<th>Time Deleted</th>
						                    </tr>
						                </tfoot>
						                <tbody>
						                	<?php $number =1; ?>
						                	@foreach($category as $categories)
							                    <tr>
													<td>{{$number}}
														@if(auth()->user()->hasPermissionTo('Restore Agent Category') OR 
															(Gate::allows('Administrator', auth()->user())))
															<a href="{{route('agent.category.undelete', $categories->agent_category_id)}}"
																onclick="return(confirmToRestore());" class="btn btn-success">
																<i class="fa fa-trash-o"></i>Restore
															</a>
														@endif
							                        	
							                        </td>
							                        <td>{{$categories->agent_category_name}}</td>
							                        
													<td>{{$categories->deleted_at}}</td>
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