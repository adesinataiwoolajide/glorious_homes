@extends('layouts.app')

@section('content')
    
<div class="clearfix"></div>
<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumb-->
        <div class="row pt-2 pb-2">
            <div class="col-sm-12">
                
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('administrator.dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item">
                        <a href="{{route('property.show',$property->property_number)}}">View Property Details</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{route('property.edit',$property->property_number)}}">Edit Property</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{route('property.create')}}">Add Property</a>
                    </li>
                    @if (Gate::allows('Administrator', auth()->user()))
                        <li class="breadcrumb-item">
                            <a href="{{route('property.index')}}">View Properties</a>
                        </li>
                        <li class="breadcrumb-item"><a href="{{route('property.restore')}}">Restore Deleted Properties</a></li>
                    @else
                        @if(auth()->user()->hasRole('Agent'))
                            <li class="breadcrumb-item">
                                <a href="{{route('agent.properties', $property->agent_id)}}">View Properties</a>
                            </li>
                        @endif
                    @endif
                </ol>
            </div>
            
        </div>
    </div>
    @include('partials._message')
    <!-- End Breadcrumb-->

    <div class="row">
        <div class="col-lg-4">
            <div class="card profile-card-2">
                <div class="card-img-block" align="center">
                    <img class="img-fluid" src="{{asset('property_cover_images/'.$property->cover_image)}}" 
                    alt="{{$property->property_name}}" style="">
                </div>
                <div class="card-body pt-5">
                    <img src="{{asset('property_cover_images/'.$property->cover_image)}}" alt="profile-image" class="profile">
                    <h5 class="card-title">{{$property->property_name}}</h5>
                    <p class="card-text"><i class="fa fa-map-marker"></i>{{$property->address}}</p>
                    <p class="card-text"><i class="fa fa-money"></i>&#8358;<?php echo number_format($property->amount) ?></p>
                    
                </div> 

                <div class="card-body border-top border-light">
                    <div class="media align-items-center">
                        <div>
                            <img src="{{asset('property_cover_images/'.$property->cover_image)}}" class="skill-img" alt="skill img">
                        </div>
                        <div class="media-body text-left ml-3">
                            <div class="progress-wrapper">
                                <p>Secure  <span class="float-right">100%</span></p>
                                <div class="progress" style="height: 5px;">
                                    <div class="progress-bar gradient-blooker" style="width:100%"></div>
                                </div>
                            </div>                   
                        </div>
                    </div>
                    <hr>
                    <div class="media align-items-center">
                        <div>
                            <img src="{{asset('property_cover_images/'.$property->cover_image)}}" class="skill-img" alt="skill img">
                        </div>
                        <div class="media-body text-left ml-3">
                            <div class="progress-wrapper">
                                <p>Neat <span class="float-right">100%</span></p>
                                <div class="progress" style="height: 5px;">
                                <div class="progress-bar gradient-purpink" style="width:100%"></div>
                                </div>
                                </div>                   
                            </div>
                        </div>
                        <hr>
                        <div class="media align-items-center">
                            <div><img src="{{asset('property_cover_images/'.$property->cover_image)}}" class="skill-img" alt="skill img"></div>
                            <div class="media-body text-left ml-3">
                                <div class="progress-wrapper">
                                    <p>Presentable <span class="float-right">100%</span></p>
                                    <div class="progress" style="height: 5px;">
                                    <div class="progress-bar gradient-ibiza" style="width:100%"></div>
                                </div>
                                </div>                   
                            </div>
                        </div>
                        <hr>
                        <div class="media align-items-center">
                            <div><img src="{{asset('property_cover_images/'.$property->cover_image)}}" class="skill-img" alt="skill img"></div>
                                <div class="media-body text-left ml-3">
                                    <div class="progress-wrapper">
                                        <p>Affordable<span class="float-right">100%</span></p>
                                        <div class="progress" style="height: 5px;">
                                            <div class="progress-bar gradient-scooter" style="width:100%"></div>
                                        </div>
                                    </div>                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <ul class="nav nav-tabs nav-tabs-primary top-icon nav-justified">
                                <li class="nav-item">
                                    <a href="" data-target="#profile" data-toggle="pill" class="nav-link active">
                                        <i class="icon-user"></i> <span class="hidden-xs">Profile</span></a>
                                </li>
                                <li class="nav-item">
                                    <a href="" data-target="#properties" data-toggle="pill" class="nav-link">
                                        <i class="fa fa-building"></i> 
                                        <span class="hidden-xs">Properties Images</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="" data-target="#edit" data-toggle="pill" class="nav-link"><i class="icon-note"></i> 
                                        <span class="hidden-xs">Edit</span>
                                    </a>
                                </li>
                            </ul>
                            <div class="tab-content p-3">
                                <div class="tab-pane active" id="profile">
                                    <h5 class="mb-3">Property Details</h5>
                                    <div class="row">
                                        
                                        <div class="col-md-12">
                                            
                                            <div class="table-responsive">
                                                <table class="table table-hover table-striped">
                                                    <tbody>                                    
                                                        <tr>
                                                            <td>Property Number</td>
                                                            <td>{{$property->property_number}}</td> 
                                                        </tr>
                                                        <tr>
                                                            <td>Agent</td>
                                                            <td>{{$property->agent->agent_name. ", ". $property->agent->email . ", ". $property->agent->phone_number}}</td> 
                                                        </tr>
                                                        <tr>
                                                            <td>Property Price</td>
                                                            <td>&#8358;<?php echo number_format($property->amount) ?></td> 
                                                        </tr>
                                                        <tr>
                                                            <td>Size</td>
                                                            <td>{{$property->size}}</td> 
                                                        </tr>
                                                        <tr>
                                                            <td>Documents</td>
                                                            <td>{{$property->document_id}}</td> 
                                                        </tr>
                                                        <tr>
                                                            <td>Facilities</td>
                                                            <td>{{$property->facility_id}}</td> 
                                                        </tr>
                                                        <tr>
                                                            <td>Condition</td>
                                                            <td>{{$property->property_condition}}</td> 
                                                        </tr>
                                                        <tr>
                                                            <td>Property Category</td>
                                                            <td>{{$property->category->property_category_name}}</td> 
                                                        </tr>
                                                        <tr>
                                                            <td>Property Type</td>
                                                            <td>{{$property->property_type->property_type_name}}</td> 
                                                        </tr>
                                                        <tr>
                                                            <td>Property Location</td>
                                                            <td>{{$property->state . ", ". $property->lga}}</td> 
                                                        </tr>
                                                        <tr>
                                                            <td>Property Address</td>
                                                            <td>{{$property->address}}</td> 
                                                        </tr>
                                                        <tr>
                                                            <td>Property Status</td>
                                                            <td>
                                                                <?php 
                                                                if($property->status == 1){ ?>
                                                                    <p style="color:green"> Available </p> <?php
                                                                }elseif($property->status == 2){ ?>
                                                                    <p style="color:red"> Booked </p> <?php
                                                                }else{ ?>
                                                                    <p style="color:aqua"> Sold </p><?php
                                                                } ?>
                                                                        
                                                            </td> 
                                                        </tr>
                                                        <tr>
                                                            <td>Description</td>
                                                            <td>{{$property->description}}</td> 
                                                        </tr>
                                                       
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/row-->
                                </div>
                                <div class="tab-pane" id="properties">
                                    <div class="alert alert-success alert-dismissible" role="alert">
                                        {{-- <button type="button" class="close" data-dismiss="alert">&times;</button> --}}
                                        <div class="alert-icon">
                                            <i class="icon-info"></i>
                                        </div>
                                        <div class="alert-message">
                                            <span><strong>Info!</strong> Other Property Images.</span>
                                        </div>
                                    </div>
                                    <div class="row">
                                            
                                        <div class="col-12 col-lg-4">
                                            <div class="card">
                                                <img src="{{asset('property_cover_images/'.$property->cover_image)}}" 
                                                class="card-img-top" alt="{{$property->property_number}}" style="width:210px; height:150px">
                                               
                                            </div>
                                        </div>
                                        @foreach($image as $images)
                                            <div class="col-12 col-lg-4">
                                                <div class="card"> 
                                                    <img src="{{asset('storage/property_images/'.$images->image)}}" style="width:210px; height:150px" 
                                                    class="card-img-top" alt="{{$images->property_number}}">
                                                    <a href="{{route('property.delete.image', $images->image_id)}}" 
                                                        onclick="return(confirmToDelete());"><i class="fa fa-trash-o"> 
                                                        </i>
                                                    </a>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="tab-pane" id="edit">
                                    
                                    <form action="{{route('property.update', $property->property_number)}}" method="POST" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        
                                        <div class="form-group row ">
                                            <div class="col-sm-3">
                                                <label>Cover Image</label>
                                                <input type="file" name="cover_image" class="form-control form-control-rounded" placeholder="">
                                                <span style="color: green">** This Field is Optional **</span>
                                                @if ($errors->has('cover_image'))
                                                    <div class="alert alert-danger alert-dismissible" role="alert">
                                                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                        <div class="alert-icon contrast-alert">
                                                            <i class="fa fa-check"></i>
                                                        </div>
                                                        <div class="alert-message">
                                                            <span><strong>Error!</strong> {{ $errors->first('cover_image') }} !</span>
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                            
                                            <div class="col-sm-3">
                                                <label>Property Name</label>
                                                <input type="text" name="property_name" class="form-control form-control-rounded" 
                                                required  placeholder="Enter The Property Name" value="{{$property->property_name}}">
                                                <span style="color: red">** This Field is Required **</span>
                                                @if ($errors->has('property_name'))
                                                    <div class="alert alert-danger alert-dismissible" role="alert">
                                                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                        <div class="alert-icon contrast-alert">
                                                            <i class="fa fa-check"></i>
                                                        </div>
                                                        <div class="alert-message">
                                                            <span><strong>Error!</strong> {{ $errors->first('property_name') }} !</span>
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="col-sm-3">
                                                <label>Other Property Images</label>
                                                <input type="file" name="image[]" class="form-control form-control-rounded" placeholder="" multiple>
                                                <span style="color: green">** This Field is Optional **</span>
                                                @if ($errors->has('image'))
                                                    <div class="alert alert-danger alert-dismissible" role="alert">
                                                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                        <div class="alert-icon contrast-alert">
                                                            <i class="fa fa-check"></i>
                                                        </div>
                                                        <div class="alert-message">
                                                            <span><strong>Error!</strong> {{ $errors->first('image') }} !</span>
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="col-sm-3">
                                                <label>Property Price</label>
                                                <input type="number" name="amount" class="form-control form-control-rounded" 
                                                required placeholder="Enter The Property Price" value="{{$property->amount}}">>
                                                <span style="color: red">** This Field is Required **</span>
                                                @if ($errors->has('amount'))
                                                    <div class="alert alert-danger alert-dismissible" role="alert">
                                                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                        <div class="alert-icon contrast-alert">
                                                            <i class="fa fa-check"></i>
                                                        </div>
                                                        <div class="alert-message">
                                                            <span><strong>Error!</strong> {{ $errors->first('amount') }} !</span>
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="col-sm-3">
                                                <label>Property Purpose</label><?php 
                                                $list = array('Rent', 'Lease', 'Sell'); ?>
            
                                                <select class="form-control form-control-rounded" name="purpose" 
                                                    required >
                                                    
                                                    <option value="{{$property->purpose}}"> {{$property->purpose}} </option>
                                                    
                                                    @foreach($list as $lists)
                                                        <option value="{{$lists}}"> {{$lists}}  </option> 
                                                    @endforeach
                                                    
                                                <select>
                                                <span style="color: red">** This Field is Required **</span>
                                                @if ($errors->has('purpose'))
                                                    <div class="alert alert-danger alert-dismissible" role="alert">
                                                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                        <div class="alert-icon contrast-alert">
                                                            <i class="fa fa-check"></i>
                                                        </div>
                                                        <div class="alert-message">
                                                            <span><strong>Error!</strong> {{ $errors->first('purpose') }} !</span>
                                                        </div>
                                                    </div>
                                                @endif  
            
                                            </div>
            
                                            <div class="col-sm-3">
                                                <label>Property Category</label>
                                                <select class="form-control form-control-rounded" name="property_category_id" 
                                                    required id="property_category_id" >
                                                    <option value="{{$property->property_category_id }}">{{$property->category->property_category_name}} </option>
                                                    {{-- <option value="{{old('property_category_id')}}">{{old('property_category_id')}} </option> --}}
                                                    <option value=""> </option>
                                                    @foreach($category as $listcategory)
                                                        <option value="{{$listcategory->property_category_id}}"> 
                                                            {{$listcategory->property_category_name}}  </option> 
                                                    @endforeach
                                                <select>
                                                <span style="color: red">** This Field is Required **</span>
                                                @if ($errors->has('property_category_id'))
                                                    <div class="alert alert-danger alert-dismissible" role="alert">
                                                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                        <div class="alert-icon contrast-alert">
                                                            <i class="fa fa-check"></i>
                                                        </div>
                                                        <div class="alert-message">
                                                            <span><strong>Error!</strong> {{ $errors->first('property_category_id') }} !</span>
                                                        </div>
                                                    </div>
                                                @endif  
            
                                            </div>
            
                                            <div class="col-sm-3">
                                                <label>Property Type</label>
                                                <select class="form-control form-control-rounded" name="property_type_id" 
                                                    id="sub" required>
                                                    <option value="{{$property->property_type_id}}"> {{$property->property_type->property_type_name}}</option>
                                                    
                                                    @foreach($type as $types)
                                                        <option value="{{$types->property_type_id}}"> 
                                                            {{$types->property_type_name}}  </option> 
                                                    @endforeach
                                                    
                                                <select>
                                                <span style="color: red">** This Field is Required **</span>
                                                @if ($errors->has('property_type_id'))
                                                    <div class="alert alert-danger alert-dismissible" role="alert">
                                                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                        <div class="alert-icon contrast-alert">
                                                            <i class="fa fa-check"></i>
                                                        </div>
                                                        <div class="alert-message">
                                                            <span><strong>Error!</strong> {{ $errors->first('property_type_id') }} !</span>
                                                        </div>
                                                    </div>
                                                @endif  
            
                                            </div>
                                            <div class="col-sm-3">
                                                <label> Property Condition</label><?php 
                                                $lis = array('Newly Built', 'Newly Renovated', 'Renovated', 'Dilapitated'); ?>
                                                <select class="form-control form-control-rounded" name="property_condition" 
                                                    required >
                                                    <option value="{{$property->property_condition}}" selected> {{$property->property_condition}} </option>
                                                    
                                                    @foreach($lis as $liss)
                                                        <option value="{{$liss}}"> {{$liss}}  </option> 
                                                    @endforeach
                                                    
                                                <select>
                                                <span style="color: red">** This Field is Required **</span>
                                                @if ($errors->has('property_condition'))
                                                    <div class="alert alert-danger alert-dismissible" role="alert">
                                                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                        <div class="alert-icon contrast-alert">
                                                            <i class="fa fa-check"></i>
                                                        </div>
                                                        <div class="alert-message">
                                                            <span><strong>Error!</strong> {{ $errors->first('property_condition') }} !</span>
                                                        </div>
                                                    </div>
                                                @endif  
            
                                            </div>
            
                                            <div class="col-sm-3">
                                                <label>Property Owner</label>
                                                <select class="form-control form-control-rounded" name="agent_id" 
                                                    required >
                                                    @if(auth()->user()->hasPermissionTo('Restore Property') OR 
                                                        (Gate::allows('Administrator', auth()->user())))
                                                        <option value="{{$property->agent_id}}">{{$property->agent->agent_name}}</option>
                                                        
                                                        @foreach($agent as $agents)
                                                            <option value="{{$agents->agent_id}}"> 
                                                                {{$agents->agent_name}}  
                                                            </option> 
                                                        @endforeach
                                                    @else
                                                    <option value="{{$property->agent_id}}">{{$property->agent->agent_name}}</option>
                                                    @endif
                                                <select>
                                                <span style="color: red">** This Field is Required **</span>
                                                @if ($errors->has('agent_id'))
                                                    <div class="alert alert-danger alert-dismissible" role="alert">
                                                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                        <div class="alert-icon contrast-alert">
                                                            <i class="fa fa-check"></i>
                                                        </div>
                                                        <div class="alert-message">
                                                            <span><strong>Error!</strong> {{ $errors->first('agent_id') }} !</span>
                                                        </div>
                                                    </div>
                                                @endif  
            
                                            </div>
            
                                            <div class="col-sm-3">
                                                <label>Size</label>
                                                <input type="text" name="size" required placeholder="Please Enter The Size" 
                                                class="form-control form-control-rounded" value="{{$property->size}}">
                                        
                                                <span style="color: red">** This Field is Required **</span>
                                                @if ($errors->has('size'))
                                                    <div class="alert alert-danger alert-dismissible" role="alert">
                                                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                        <div class="alert-icon contrast-alert">
                                                            <i class="fa fa-check"></i>
                                                        </div>
                                                        <div class="alert-message">
                                                            <span><strong>Error!</strong> {{ $errors->first('size') }} !</span>
                                                        </div>
                                                    </div>
                                                @endif  
                                            </div>
            
                                            
                                            <div class="col-sm-3">
                                                <label>Property State</label>
                                                <select class="form-control form-control-rounded" name="state" 
                                                    required onchange="useSelectedItem(this)" id="theStates">
                                                    <option value="{{$property->state}}">{{$property->state}} </option> 
                                                    {{-- <option value="{{old('state')}}">{{old('state')}} </option> --}}
                                                    <option value=""></option>
                                                    <option value="Adamawa">Abia</option>
                                                    <option value="Anambra">Anambra</option>
                                                    <option value="Bauchi">Bauchi</option>
                                                    <option value="Bayelsa">Bayelsa</option>
                                                    <option value="Benue">Benue</option>
                                                    <option value="Borno">Borno</option>
                                                    <option value="Cross River">Cross River</option>
                                                    <option value="Delta">Delta</option>
                                                    <option value="Ebonyi">Ebonyi</option>
                                                    <option value="Edo">Edo</option>
                                                    <option value="Ekiti">Ekiti</option>
                                                    <option value="Enugu">Enugu</option>
                                                    <option value="Gombe">Gombe</option>
                                                    <option value="Imo">Imo</option>
                                                    <option value="Jigawa">Jigawa</option>
                                                    <option value="Kaduna">Kaduna</option>
                                                    <option value="Kano">Kano</option>
                                                    <option value="Katsina">Katsina</option>
                                                    <option value="Kebbi">Kebbi</option>
                                                    <option value="Kogi">Kogi</option>
                                                    <option value="Kwara">Kwara</option>
                                                    <option value="Lagos">Lagos</option>
                                                    <option value="Nasarawa">Nasarawa</option>
                                                    <option value="Niger">Niger</option>
                                                    <option value="Ogun">Ogun</option>
                                                    <option value="Ondo">Ondo</option>
                                                    <option value="Osun">Osun</option>
                                                    <option value="Oyo">Oyo</option>
                                                    <option value="Plateau">Plateau</option>
                                                    <option value="Rivers">Rivers</option>
                                                    <option value="Sokoto">Sokoto</option>
                                                    <option value="Taraba">Taraba</option>
                                                    <option value="Yobe">Yobe</option>
                                                    <option value="Zamfara">Zamfara</option>
                                                    <option value="FCT">FCT</option>
                                                <select>
                                                <span style="color: red">** This Field is Required **</span>
                                                @if ($errors->has('state'))
                                                    <div class="alert alert-danger alert-dismissible" role="alert">
                                                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                        <div class="alert-icon contrast-alert">
                                                            <i class="fa fa-check"></i>
                                                        </div>
                                                        <div class="alert-message">
                                                            <span><strong>Error!</strong> {{ $errors->first('state') }} !</span>
                                                        </div>
                                                    </div>
                                                @endif  
            
                                            </div>
                                            <div class="col-sm-3">
                                                <label>Property Local Govt</label>
                                                <select class="form-control form-control-rounded" id="locaGv" name="lga" required>
                                                    <option value="{{$property->lga}}">{{$property->lga}} </option>
                                                    
                                                <select>
                                                <span style="color: red">** This Field is Required **</span>
                                                @if ($errors->has('lga'))
                                                    <div class="alert alert-danger alert-dismissible" role="alert">
                                                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                        <div class="alert-icon contrast-alert">
                                                            <i class="fa fa-check"></i>
                                                        </div>
                                                        <div class="alert-message">
                                                            <span><strong>Error!</strong> {{ $errors->first('lga') }} !</span>
                                                        </div>
                                                    </div>
                                                @endif  
            
                                            </div>
            
                                            <div class="col-sm-3">
                                                <label>Property Documents</label>
                                                <select class="form-control form-control-rounded" name="document_id[]" 
                                                    required multiple style="height:70px">
                                                    <option value="{{$property->document_id}}" selected> {{$property->document_id}} </option>
                                                    
                                                    @foreach($document as $documents)
                                                        <option value="{{$documents->document_name}}"> 
                                                            {{$documents->document_name}}  
                                                        </option> 
                                                    @endforeach
                                                <select>
                                                <span style="color: red">** This Field is Required **</span>
                                                @if ($errors->has('document_id[]'))
                                                    <div class="alert alert-danger alert-dismissible" role="alert">
                                                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                        <div class="alert-icon contrast-alert">
                                                            <i class="fa fa-check"></i>
                                                        </div>
                                                        <div class="alert-message">
                                                            <span><strong>Error!</strong> {{ $errors->first('document_id[]') }} !</span>
                                                        </div>
                                                    </div>
                                                @endif  
            
                                            </div>
                                            <div class="col-sm-3">
                                                <label>Property Facilities</label>
                                                <select class="form-control form-control-rounded" name="facility_id[]" 
                                                    required multiple style="height:70px">
                                                    <option value="{{$property->facility_id}}" selected> {{$property->facility_id}} </option>
                                                    
                                                    @foreach($facility as $facilities)
                                                        <option value="{{$facilities->facility_name}}"> 
                                                            {{$facilities->facility_name}}  
                                                        </option> 
                                                    @endforeach
                                                <select>
                                                <span style="color: red">** This Field is Required **</span>
                                                @if ($errors->has('facility_id[]'))
                                                    <div class="alert alert-danger alert-dismissible" role="alert">
                                                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                        <div class="alert-icon contrast-alert">
                                                            <i class="fa fa-check"></i>
                                                        </div>
                                                        <div class="alert-message">
                                                            <span><strong>Error!</strong> {{ $errors->first('facility_id[]') }} !</span>
                                                        </div>
                                                    </div>
                                                @endif  
            
                                            </div>
                                            <div class="col-sm-3">
                                                <label>Property Address</label>
                                                <textarea class="form-control form-control-rounded" name="address" 
                                                placeholder="Enter The Property Location" required> {{$property->address}}
                                                </textarea>
                                                <span style="color: red">** This Field is Required **</span>
                                                @if ($errors->has('address'))
                                                    <div class="alert alert-danger alert-dismissible" role="alert">
                                                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                        <div class="alert-icon contrast-alert">
                                                            <i class="fa fa-check"></i>
                                                        </div>
                                                        <div class="alert-message">
                                                            <span><strong>Error!</strong> {{ $errors->first('address') }} !</span>
                                                        </div>
                                                    </div>
                                                @endif  
            
                                            </div>
                                            
                                            <div class="col-sm-3">
                                                <label>Property Description</label>
                                                <textarea class="form-control form-control-rounded" name="description" 
                                                placeholder="Enter Brief Description 
                                                About The Property" required> {{$property->description}}
                                                </textarea>
                                                <span style="color: red">** This Field is Required **</span>
                                                @if ($errors->has('description'))
                                                    <div class="alert alert-danger alert-dismissible" role="alert">
                                                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                        <div class="alert-icon contrast-alert">
                                                            <i class="fa fa-check"></i>
                                                        </div>
                                                        <div class="alert-message">
                                                            <span><strong>Error!</strong> {{ $errors->first('description') }} !</span>
                                                        </div>
                                                    </div>
                                                @endif  
            
                                            </div>
                                            
                                            <div class="col-sm-12">
                                                <button type="submit" class="btn btn-success btn-lg btn-block" style="border:none">
                                                UPDATE THE PROPERTY</button>
                                            </div>
                                            
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    
            </div>

        </div>
    <!-- End container-fluid-->
   </div><!--End content-wrapper-->
   <!--Start Back To Top Button-->
    <a href="" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
    <!--End Back To Top Button-->
@endsection