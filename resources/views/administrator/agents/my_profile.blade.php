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
                        <a href="{{route('agent.show',$categ->email)}}">
                           
                                View Agent Details
                            
                        </a>
                    </li>
        
                    <li class="breadcrumb-item">
                        <a href="{{route('agent.create')}}">
                            
                                Agent Dashboard
                            
                            
                        </a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{route('agent.edit',$categ->email)}}">Edit Agent</a>
                    </li>
                    @if (Gate::allows('Administrator', auth()->user()) OR (auth()->user()->hasRole('Admin')))
                        <li class="breadcrumb-item"><a href="{{route('agent.restore')}}">Restore Deleted Agents</a></li>
                    @endif
                    <li class="breadcrumb-item active" aria-current="page">
                        @if (Gate::allows('Administrator', auth()->user()) OR (auth()->user()->hasRole('Admin')))
                        Agent Details
                        
                        @endif
                    </li>
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
                    <img class="img-fluid" src="{{asset('agent-passport/'.$categ->passport)}}" 
                    alt="{{$categ->agent_name}}" style="">
                </div>
                <div class="card-body pt-5">
                    <img src="{{asset('agent-passport/'.$categ->passport)}}" alt="profile-image" class="profile">
                    <h5 class="card-title">{{$categ->agent_name}}</h5>
                    <p class="card-text">{{$categ->description}}</p>
                    <div class="icon-block">
                        <a href=""><i class="fa fa-facebook bg-facebook text-white"></i></a>
                        <a href=""> <i class="fa fa-twitter bg-twitter text-white"></i></a>
                        <a href=""> <i class="fa fa-google-plus bg-google-plus text-white"></i></a>
                    </div>
                </div>

                <div class="card-body border-top border-light">
                    <div class="media align-items-center">
                        <div>
                            <img src="{{asset('agent-passport/'.$categ->passport)}}" class="skill-img" alt="skill img">
                        </div>
                        <div class="media-body text-left ml-3">
                            <div class="progress-wrapper">
                                <p>Negotiation  <span class="float-right">100%</span></p>
                                <div class="progress" style="height: 5px;">
                                    <div class="progress-bar gradient-blooker" style="width:100%"></div>
                                </div>
                            </div>                   
                        </div>
                    </div>
                    <hr>
                    <div class="media align-items-center">
                        <div>
                            <img src="{{asset('agent-passport/'.$categ->passport)}}" class="skill-img" alt="skill img">
                        </div>
                        <div class="media-body text-left ml-3">
                            <div class="progress-wrapper">
                                <p>Selling Skills <span class="float-right">100%</span></p>
                                <div class="progress" style="height: 5px;">
                                <div class="progress-bar gradient-purpink" style="width:100%"></div>
                                </div>
                                </div>                   
                            </div>
                        </div>
                        <hr>
                        <div class="media align-items-center">
                            <div><img src="{{asset('agent-passport/'.$categ->passport)}}" class="skill-img" alt="skill img"></div>
                            <div class="media-body text-left ml-3">
                                <div class="progress-wrapper">
                                    <p>Communication <span class="float-right">100%</span></p>
                                    <div class="progress" style="height: 5px;">
                                    <div class="progress-bar gradient-ibiza" style="width:100%"></div>
                                </div>
                                </div>                   
                            </div>
                        </div>
                        <hr>
                        <div class="media align-items-center">
                            <div><img src="{{asset('agent-passport/'.$categ->passport)}}" class="skill-img" alt="skill img"></div>
                                <div class="media-body text-left ml-3">
                                    <div class="progress-wrapper">
                                        <p>Organisation  Skills<span class="float-right">100%</span></p>
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
                                    <a href="" data-target="#profile" data-toggle="pill" class="nav-link active"><i class="icon-user"></i> <span class="hidden-xs">Profile</span></a>
                                </li>
                                <li class="nav-item">
                                    <a href="" data-target="#properties" data-toggle="pill" class="nav-link">
                                        <i class="fa fa-building"></i> 
                                        <span class="hidden-xs">Properties</span>
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
                                    <h5 class="mb-3">Agent Profile</h5>
                                    <div class="row">
                                        
                                        <div class="col-md-12">
                                            
                                            <div class="table-responsive">
                                                <table class="table table-hover table-striped">
                                                    <tbody>                                    
                                                        <tr>
                                                            <td>Name</td>
                                                            <td>{{$categ->agent_name}}</td> 
                                                        </tr>
                                                        <tr>
                                                            <td>Email</td>
                                                            <td>{{$categ->email}}</td> 
                                                        </tr>
                                                        <tr>
                                                            <td>Phone Number</td>
                                                            <td>{{$categ->phone_number}}</td> 
                                                        </tr>
                                                        <tr>
                                                            <td>Category</td>
                                                            <td>{{$categ->agent_category->agent_category_name}}</td> 
                                                        </tr>

                                                        <tr>
                                                            <td>State</td>
                                                            <td>{{$categ->state}}</td> 
                                                        </tr>
                                                        <tr>
                                                            <td>LGA</td>
                                                            <td>{{$categ->lga}}</td> 
                                                        </tr>
                                                        <tr>
                                                            <td>Description</td>
                                                            <td>{{$categ->description}}</td> 
                                                        </tr>
                                                        
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/row-->
                                </div>
                                <div class="tab-pane" id="properties">
                                    
                                    <div class="row">
                                        
                                        @if(count($proper)==0)
                                            <div class=" col-md-12 alert alert-danger alert-dismissible" role="alert">
                                                {{-- <button type="button" class="close" data-dismiss="alert">&times;</button> --}}
                                                <div class="alert-icon">
                                                    <i class="icon-info"></i>
                                                </div>
                                                <div class="alert-message">
                                                    <span><strong>Info! </strong> No Property Was Found</span>
                                                </div>
                                            </div>
                                            
                                        @else
                                            <div class=" col-md-12 alert alert-success alert-dismissible" role="alert">
                                                {{-- <button type="button" class="close" data-dismiss="alert">&times;</button> --}}
                                                <div class="alert-icon">
                                                    <i class="icon-info"></i>
                                                </div>
                                                <div class="alert-message">
                                                    <span><strong>Info! </strong> List of The Agent Properties</span>
                                                </div>
                                            </div>
                                            @foreach ($proper as $prop)
                                                <div class="col-12 col-lg-4">
                                                    <div class="card">
                                                        <img src="{{asset('property_cover_images/'.$prop->cover_image)}}" 
                                                        class="card-img-top" alt="{{$prop->property_number}}" style="width:210px; height:150px">
                                                        <div class="card-body">
                                                            <h4 class="card-title">{{$prop->property_number}}</h4>
                                                            <h6>Price: &#8358;<?php echo number_format($prop->amount) ?></h6>
                                                            <p></p>
                                                            <hr>
                                                            <a href="{{route('property.show', $prop->property_number)}}" class="btn btn-primary btn-sm text-white"><i class="fa fa-star mr-1"></i> View Details</a>
                                                        </div>
                                                    </div>
                                                </div>   
                                            @endforeach
                                        @endif
                                        
                                    </div>
                                </div>
                                <div class="tab-pane" id="edit">
                                    
                                    <form action="{{route('agent.pro',$categ->email)}}" method="POST" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        
                                        <div class="form-group row ">
                                            <div class="col-sm-6">
                                                <label>Passport</label>
                                                <input type="file" name="passport" class="form-control form-control-rounded" 
                                                    value="{{old('passport')}}">
                                                <span style="color: green">** This Field is Optional **</span>
                                                @if ($errors->has('passport'))
                                                    <div class="alert alert-danger alert-dismissible" role="alert">
                                                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                        <div class="alert-icon contrast-alert">
                                                            <i class="fa fa-check"></i>
                                                        </div>
                                                        <div class="alert-message">
                                                            <span><strong>Error!</strong> {{ $errors->first('passport') }} !</span>
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="col-sm-6">
                                                <label>Full Name</label>
                                                <input type="text" name="agent_name" class="form-control form-control-rounded" 
                                                required placeholder="Enter The Agent Name" value="{{$categ->agent_name}}">
                                                <span style="color: red">** This Field is Required **</span>
                                                @if ($errors->has('agent_name'))
                                                    <div class="alert alert-danger alert-dismissible" role="alert">
                                                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                        <div class="alert-icon contrast-alert">
                                                            <i class="fa fa-check"></i>
                                                        </div>
                                                        <div class="alert-message">
                                                            <span><strong>Error!</strong> {{ $errors->first('agent_name') }} !</span>
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>

                                            <div class="col-sm-6">
                                                <label>E-Mail</label>
                                                <input type="email" name="email" required placeholder="Please Enter The E-Mail" 
                                                class="form-control form-control-rounded" value="{{$categ->email}}">
                                        
                                                <span style="color: red">** This Field is Required **</span>
                                                @if ($errors->has('email'))
                                                    <div class="alert alert-danger alert-dismissible" role="alert">
                                                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                        <div class="alert-icon contrast-alert">
                                                            <i class="fa fa-check"></i>
                                                        </div>
                                                        <div class="alert-message">
                                                            <span><strong>Error!</strong> {{ $errors->first('email') }} !</span>
                                                        </div>
                                                    </div>
                                                @endif  
                                            </div>
                                            
                                            
                                            <div class="col-sm-6">
                                                <label>Agent Category</label>
                                                <select class="form-control form-control-rounded" name="agent_category_id" required>
                                                    <option value="{{$categ->agent_category_id}}">{{$categ->agent_category->agent_category_name}} </option>
                                                    <option value="{{old('agent_category_id')}}">{{old('agent_category_id')}} </option>
                                                    <option value=""> </option>
                                                    @foreach($agentCategory as $list_roles)
                                                        <option value="{{$list_roles->agent_category_id}}"> 
                                                            {{$list_roles->agent_category_name}}  </option> 
                                                    @endforeach
                                                <select>
                                                <span style="color: red">** This Field is Required **</span>
                                                @if ($errors->has('agent_category_id'))
                                                    <div class="alert alert-danger alert-dismissible" role="alert">
                                                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                        <div class="alert-icon contrast-alert">
                                                            <i class="fa fa-check"></i>
                                                        </div>
                                                        <div class="alert-message">
                                                            <span><strong>Error!</strong> {{ $errors->first('agent_category_id') }} !</span>
                                                        </div>
                                                    </div>
                                                @endif  

                                            </div>
                                            
                                            <div class="col-sm-6">
                                                <label>Phone Number</label>
                                                <input type="number" name="phone_number" required placeholder="Please Enter The Phone Number" 
                                                class="form-control form-control-rounded" value="{{$categ->phone_number}}"
                                                required>
                                                
                                                <span style="color: red">** This Field is Required **</span>
                                                @if ($errors->has('phone_number'))
                                                    <div class="alert alert-danger alert-dismissible" role="alert">
                                                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                        <div class="alert-icon contrast-alert">
                                                            <i class="fa fa-check"></i>
                                                        </div>
                                                        <div class="alert-message">
                                                            <span><strong>Error!</strong> {{ $errors->first('phone_number') }} !</span>
                                                        </div>
                                                    </div>
                                                @endif  
                                            </div>

                                            <div class="col-sm-6">
                                                <label>Agent State</label>
                                                <select class="form-control form-control-rounded" name="state" 
                                                    required onchange="useSelectedItem(this)" id="theStates">
                                                    <option value="{{$categ->state}}"> {{$categ->state}} </option> 
                                                    
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
                                            <div class="col-sm-6">
                                                <label>Agent Local Govt</label>
                                                <select class="form-control form-control-rounded" id="locaGv" name="lga" required>
                                                    <option value="{{$categ->lga}}"> {{$categ->lga}} </option> 
                                                    
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
                                            <div class="col-sm-6">
                                                <label>Agent Description</label>
                                                <textarea class="form-control form-control-rounded" name="description" placeholder="Enter Brief Description 
                                                About The Agent" required>  {{$categ->description}} 
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
                                                UPDATE THE AGENT</button>
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