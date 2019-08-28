@extends('layouts.app')

@section('content')
    
<div class="clearfix"></div>
<div class="content-wrapper">
    <div class="container-fluid">
        <div class="row pt-2 pb-2">
            <div class="col-sm-9">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('administrator.dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{route('agent.restore')}}">Restore Deleted Agents</a></li>
                    <li class="breadcrumb-item">
                        <a href="{{route('agent.create')}}">Add Agent</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">List of Deleted Agents </li>
                </ol>
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
                            <div class="card-header"><i class="fa fa-table"></i> List of Saved Deleted Agents</div>
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
                                                        <a href="{{route('agent.undelete', $agents->agent_id)}}"
                                                            onclick="return(confirmToRestore());" class="btn btn-success">
                                                            <i class="fa fa-trash-o"></i>Restore
                                                        </a>
                                                    @endif
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