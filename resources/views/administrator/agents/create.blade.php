@extends('layouts.app')

@section('content')
    
<div class="clearfix"></div>
<div class="content-wrapper">
    <div class="container-fluid">
        <div class="row pt-2 pb-2">
            <div class="col-sm-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('administrator.dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item">
                        <a href="{{route('agent.create')}}">
                            @if (Gate::allows('Administrator', auth()->user()) OR (auth()->user()->hasRole('Admin')))
                               Add Agent 
                            @else
                                {{$agen->agent_name }} 
                            @endif
                        </a>
                    </li>
                    @if (Gate::allows('Administrator', auth()->user()) OR (auth()->user()->hasRole('Admin')))
                        <li class="breadcrumb-item"><a href="{{route('agent.restore')}}">Restore Deleted Agents</a></li>
                    @endif
                    <li class="breadcrumb-item active" aria-current="page">
                        @if (Gate::allows('Administrator', auth()->user()) OR (auth()->user()->hasRole('Admin')))
                        List of Saved Agents 
                        @else
                            {{$agen->agent_name }} Details
                        @endif
                    </li>
                </ol>
            </div>
        </div>
        @if (Gate::allows('Administrator', auth()->user()) OR (auth()->user()->hasRole('Admin')))
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-header"><i class="fa fa-table"></i> Please Fill The Below Form To Add An Agent</div>
                        <div class="card-body">
                            @include('partials._message')
                            <form action="{{route('agent.save')}}" method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                
                                <div class="form-group row ">
                                    <div class="col-sm-3">
                                        <label>Passport</label>
                                        <input type="file" name="passport" class="form-control form-control-rounded" 
                                        required value="{{old('passport')}}">
                                        <span style="color: red">** This Field is Required **</span>
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
                                    <div class="col-sm-3">
                                        <label>Full Name</label>
                                        <input type="text" name="agent_name" class="form-control form-control-rounded" 
                                        required placeholder="Enter The Agent Name" value="{{old('agent_name')}}">
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

                                    <div class="col-sm-3">
                                        <label>E-Mail</label>
                                        <input type="email" name="email" required placeholder="Please Enter The E-Mail" 
                                        class="form-control form-control-rounded" value="{{old('email')}}">
                                
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
                                    
                                    
                                    <div class="col-sm-3">
                                        <label>Agent Category</label>
                                        <select class="form-control form-control-rounded" name="agent_category_id" required>
                                            <option value=""> -- Select The Category -- </option>
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
                                    
                                    <div class="col-sm-3">
                                        <label>Phone Number</label>
                                        <input type="number" name="phone_number" required placeholder="Please Enter The Phone Number" 
                                        class="form-control form-control-rounded" value="{{old('phone_number')}}"
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

                                    <div class="col-sm-3">
                                        <label>Agent State</label>
                                        <select class="form-control form-control-rounded" name="state" 
                                            required onchange="useSelectedItem(this)" id="theStates">
                                            <option value=""> -- Select The State -- </option> 
                                            <option value="{{old('state')}}">{{old('state')}} </option>
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
                                        <label>Agent Local Govt</label>
                                        <select class="form-control form-control-rounded" id="locaGv" name="lga" required>
                                            <option value=""> -- Select The Category -- </option>
                                            <option value="{{old('lga')}}"> {{old('lga')}}</option>
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
                                        <label>Agent Brief Description</label>
                                        <textarea class="form-control form-control-rounded" name="description" placeholder="Enter Brief Description 
                                        About The Agent" required> {{old('description')}}
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
                                        ADD THE AGENT</button>
                                    </div>
                                    
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    @if (Gate::allows('Administrator', auth()->user()) OR (auth()->user()->hasRole('Admin')))

                        @if(count($agent) ==0)
                            <div class="card-header" align="center" style="color: red"><i class="fa fa-table"></i> 
                                The List of Agent is Empty
                            </div>

                        @else
                            <div class="card-header"><i class="fa fa-table"></i> List of All Agents</div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="default-datatable" class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>S/N</th>
                                                <th>Image</th>
                                                <th>Full Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Category</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>S/N</th>
                                                <th>Image</th>
                                                <th>Full Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Category</th>
                                                
                                            </tr>
                                        </tfoot>
                                        <tbody><?php
                                            $y=1; ?>
                                            @foreach($agent as $agents)
                                            <tr>
                                            
                                                <td>{{$y}}
                                                    @if(auth()->user()->hasPermissionTo('Restore Agent Category') OR 
                                                        (Gate::allows('Administrator', auth()->user())))
                                                        <a href="{{route('agent.delete', $agents->email)}}" class="" onclick="return(confirmToDelete());">
                                                            <i class="fa fa-trash-o"></i>
                                                        </a>
                                                    @endif
                                                    <a href="{{route('agent.edit', $agents->email)}}" class="" onclick="return(confirmToEdit());">
                                                        <i class="fa fa-pencil"></i> 
                                                    </a>
                                                    <a href="{{route('agent.show', $agents->email)}}" class="" onclick="return(confirmToDetails());">
                                                            <i class="fa fa-id-badge"></i> 
                                                        </a>
                                                    <a href="{{route('agent.properties', $agents->email)}}" class="" onclick="return(confirmToProp());">
                                                        <i class="fa fa-building"></i> 
                                                    </a>
                                                    <a href="{{route('agent.edit', $agents->email)}}" class="" onclick="return(confirmToEdit());">
                                                            <i class="fa fa-shopping-cart"></i> 
                                                        </a>    
                                                </td>
                                                <td><img src="{{asset('agent-passport/'.$agents->passport)}}" 
                                                    style="height:50px; width:50px;" alt="{{$agents->agent_name}}" /></td> 
                                                <td>{{$agents->agent_name}}</td> 
                                                <td>{{$agents->email}}</td> 
                                                <td>{{$agents->phone_number}}</td> 
                                                <td>{{$agents->agent_category->agent_category_name}}</td> 
                                            
                                            </tr><?php $y++; ?>
                                        @endforeach
                                        </tbody>
                                        
                                    </table>
                                </div>
                            </div>
                        @endif
                    @else 
                        
                        <div class="card-header"><i class="fa fa-table"></i> {{$agen->agent_name}} Please Preview Your Details Below</div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="default-datatable" class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>S/N</th>
                                            <th>Image</th>
                                            <th>Full Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Category</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>S/N</th>
                                            <th>Image</th>
                                            <th>Full Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Category</th>
                                            
                                        </tr>
                                    </tfoot>
                                    <tbody><?php
                                        $y=1; ?>
                                        
                                            <tr>
                                            
                                                <td>{{$y}}
                                                
                                                    <a href="{{route('agent.edit', $agen->email)}}" class="" onclick="return(confirmToEdit());">
                                                        <i class="fa fa-pencil"></i> 
                                                    </a>
                                                    <a href="{{route('agent.show', $agen->email)}}" class="" onclick="return(confirmToDetails());">
                                                            <i class="fa fa-id-badge"></i> 
                                                        </a>
                                                    <a href="{{route('agent.properties', $agen->email)}}" class="" onclick="return(confirmToProp());">
                                                        <i class="fa fa-building"></i> 
                                                    </a>
                                                    <a href="{{route('agent.edit', $agen->email)}}" class="" onclick="return(confirmToEdit());">
                                                            <i class="fa fa-shopping-cart"></i> 
                                                        </a>    
                                                </td>
                                                <td><img src="{{asset('agent-passport/'.$agen->passport)}}" 
                                                    style="height:50px; width:50px;" alt="{{$agen->agent_name}}" /></td> 
                                                <td>{{$agen->agent_name}}</td> 
                                                <td>{{$agen->email}}</td> 
                                                <td>{{$agen->phone_number}}</td> 
                                                <td>{{$agen->agent_category->agent_category_name}}</td> 
                                            
                                            </tr><?php $y++; ?>
                                        
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
@endsection