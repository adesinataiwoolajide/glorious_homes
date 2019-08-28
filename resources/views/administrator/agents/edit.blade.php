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
                        <a href="{{route('agent.edit',$categ->email)}}">Edit agent</a>
                    </li>
                    @if (Gate::allows('Administrator', auth()->user()))
                        <li class="breadcrumb-item">
                            <a href="{{route('agent.create')}}">Add agent</a>
                        </li>
                        <li class="breadcrumb-item"><a href="{{route('agent.restore')}}">Restore Deleted Agents</a></li>
                    @endif
                    <li class="breadcrumb-item active" aria-current="page">Edit An Agent Details Agents </li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-header"><i class="fa fa-table"></i> Please Fill The Below Form To Update The Agent</div>
                    <div class="card-body">
                        @include('partials._message')
                        <form action="{{route('agent.update',$categ->email)}}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            
                            <div class="form-group row ">
                                <div class="col-sm-3">
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
                                <div class="col-sm-3">
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

                                <div class="col-sm-3">
                                    <label>E-Mail</label>
                                    <input type="email" name="email" required placeholder="Please Enter The E-Mail" 
                                    class="form-control form-control-rounded" value="{{$categ->email}}" readonly>
                                    <input type="hidden" name="email" required  value="{{$categ->email}}" >
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
                                
                                <div class="col-sm-3">
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

                                <div class="col-sm-3">
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
                                <div class="col-sm-3">
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
                                <div class="col-sm-3">
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
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    @if(count($agent) ==0)
                        <div class="card-header" align="center" style="color: red"><i class="fa fa-table"></i> 
                            The List is Empty
                        </div>

                    @else
                        <div class="card-header"><i class="fa fa-table"></i> List of Saved agents</div>
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
                                                    <a href="{{route('agent.show', $agents->email)}}" class="" onclick="return(confirmToEdit());">
                                                            <i class="fa fa-id-badge"></i> 
                                                        </a>
                                                    <a href="{{route('agent.edit', $agents->email)}}" class="" onclick="return(confirmToEdit());">
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
                    
                </div>
            </div>
        </div>
    </div>
</div>



<a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
@endsection