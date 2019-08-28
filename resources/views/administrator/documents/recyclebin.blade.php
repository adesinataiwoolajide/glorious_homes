@extends("layouts.app")
    @section("content")
    <div class="clearfix"></div>
    <div class="content-wrapper">
   		<div class="container-fluid">
   			<div class="row pt-2 pb-2">
		        <div class="col-sm-9">
				    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('administrator.dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{route('document.restore')}}">Restore Deleted  Document</a></li>
                        <li class="breadcrumb-item"><a href="{{route('document.create')}}">Add Agent Document</a></li>
			            <li class="breadcrumb-item active" aria-current="page">Deleted Property Documents</li>
			         </ol>
			   	</div>
			</div>
			<div class="row">
		    	<div class="col-lg-12">
		          	<div class="card">
		          		@if(count($document) ==0)
                            <div class="card-header" align="center" style="color: red">
                                <i class="fa fa-table"></i> The List is Empty
			            	</div>

			            @else
			            	<div class="card-header"><i class="fa fa-table"></i> List of Saved Deleted Property Documents</div>
		            		<div class="card-body">
		              			<div class="table-responsive">
                                    <table id="default-datatable" class="table table-bordered">
		              					<thead>
						                    <tr>
						                        <th>S/N</th>
						                        <th>Document Name</th>
												<th>Time Added</th>
						                    </tr>
						                </thead>

						                <tfoot>
						                    <tr>
												<th>S/N</th>
												<th>Document Name</th>
												<th>Time Added</th>
						                    </tr>
						                </tfoot>
						                <tbody>
						                	<?php $number =1; ?>
						                	@foreach($document as $documents)
							                    <tr>
													<td>{{$number}}
														@if(auth()->user()->hasPermissionTo('Restore Document') OR 
                                                        (Gate::allows('Administrator', auth()->user())))
															<a href="{{route('document.undelete', $documents->document_id)}}"
																onclick="return(confirmToRestore());" class="btn btn-success">
																<i class="fa fa-trash-o"></i>Restore
															</a>
														@endif
							                        </td>
							                        <td>{{$documents->document_name}}</td>
							                        
													<td>{{$documents->created_at}}</td>
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