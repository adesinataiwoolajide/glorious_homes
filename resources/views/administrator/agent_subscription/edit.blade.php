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
                        <a href="{{route('subscription.edit', $sub->subscription_id)}}">
                            Edit Subscription
                        </a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{route('subscription.create')}}">
                            Add Subscription
                        </a>
                    </li>
                    @if (Gate::allows('Administrator', auth()->user()) OR (auth()->user()->hasRole('Admin')))
                        <li class="breadcrumb-item"><a href="{{route('subscription.restore')}}">Restore Deleted Subscriptions</a></li>
                    @endif
                    <li class="breadcrumb-item active" aria-current="page">
                       Agent Subscription
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
                            <form action="{{route('subscription.update', $sub->subscription_id)}}" method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                
                                <div class="form-group row ">
                                    <div class="col-sm-3">
                                        <label>Agent</label>
                                        <select class="form-control form-control-rounded" name="agent_id" 
                                        required >
                                        
                                            <option value="{{$sub->agent_id}}">
                                                {{$sub->agent->agent_name}} 
                                            </option>
                                            <option value=""> </option>
                                            @foreach($agent as $agents)
                                                <option value="{{$agents->agent_id}}"> 
                                                    {{$agents->agent_name}}  
                                                </option> 
                                            @endforeach
                                        
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
                                        <label>Subscription Type</label><?php
                                        $list = array('Monthly', 'Quarterly', 'Half Year', 'Yearly', ); ?>

                                        <select class="form-control form-control-rounded" name="type" 
                                            required onchange="useSelectedSub(this)" id="am" >
                                            <option value="{{$sub->type}}">{{$sub->type}} </option>
                                            @foreach($list as $lists)
                                                <option value="{{$lists}}"> {{$lists}}  </option> 
                                            @endforeach
                                        <select>
                                        <span style="color: red">** This Field is Required **</span>
                                        @if ($errors->has('type'))
                                            <div class="alert alert-danger alert-dismissible" role="alert">
                                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                <div class="alert-icon contrast-alert">
                                                    <i class="fa fa-check"></i>
                                                </div>
                                                <div class="alert-message">
                                                    <span><strong>Error!</strong> {{ $errors->first('type') }} !</span>
                                                </div>
                                            </div>
                                        @endif
                                    </div>

                                    <div class="col-sm-3">
                                        <label>Amount</label>
                                        <select class="form-control form-control-rounded" id="amt" name="amount" required>
                                            <option value="{{$sub->amount}}"> {{$sub->amount}} </option>
                                            
                                        <select>
                                        <span style="color: red">** This Field is Preload **</span>
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
                                        <label>Year</label>
                                        <select class="form-control form-control-rounded" name="year" 
                                            required >
                                            <option value="{{$sub->year}}"> {{$sub->year}} </option>
                                            <?php 
                                            $starting_year = 2018;
                                            $ending_year = date('Y'); ?>
                                            @for($starting_year; $starting_year <= $ending_year; $starting_year++)<?php
                                                echo '<option value="'.$starting_year.'" selected="selected">'.$starting_year.'</option>' ?>; 
                                               
                                            @endfor
                                           
                                        <select>
                                
                                        <span style="color: red">** This Field is Required **</span>
                                        @if ($errors->has('year'))
                                            <div class="alert alert-danger alert-dismissible" role="alert">
                                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                <div class="alert-icon contrast-alert">
                                                    <i class="fa fa-check"></i>
                                                </div>
                                                <div class="alert-message">
                                                    <span><strong>Error!</strong> {{ $errors->first('year') }} !</span>
                                                </div>
                                            </div>
                                        @endif  
                                    </div>

                                    <div class="col-sm-12">
                                        <button type="submit" class="btn btn-success btn-lg btn-block" style="border:none">
                                        UPDATE THE AGENT SUBCRIPTION</button>
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
                   
                    @if(count($subscription) ==0)
                        <div class="card-header" align="center" style="color: red"><i class="fa fa-table"></i> 
                            The List of Agent Subscription is Empty
                        </div>

                    @else
                        <div class="card-header"><i class="fa fa-table"></i> List of All Agent Subscriptions</div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="default-datatable" class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>S/N</th>
                                            <th>Agent Name</th>
                                            <th>Sub type</th>
                                            <th>Amount</th>
                                            <th>Year</th>
                                            <th>Month</th>
                                            <th>Expire On</th>
                                            <th>Status</th>
                                            <th>Time Added</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>S/N</th>
                                            <th>Agent Name</th>
                                            <th>Sub type</th>
                                            <th>Amount</th>
                                            <th>Year</th>
                                            <th>Month</th>
                                            <th>Expire On</th>
                                            <th>Status</th>
                                            <th>Time Added</th>
                                        </tr>
                                    </tfoot>
                                    <tbody><?php
                                        $y=1; ?>
                                        @foreach($subscription as $subscriptions)
                                            <tr>
                                            
                                                <td>{{$y}}
                                                    @if(auth()->user()->hasPermissionTo('Delete Subscription') OR 
                                                        (Gate::allows('Administrator', auth()->user())))
                                                        <a href="{{route('subscription.delete', $subscriptions->subscription_id)}}" class="" onclick="return(confirmToDelete());">
                                                            <i class="fa fa-trash-o"></i>
                                                        </a>

                                                    @endif
                                                    <a href="{{route('subscription.edit', $subscriptions->subscription_id)}}" class="" onclick="return(confirmToEdit());">
                                                        <i class="fa fa-pencil"></i> 
                                                    </a>  
                                                </td>
                                                
                                                <td>{{$subscriptions->agent->agent_name}}</td> 
                                                <td>{{$subscriptions->type}}</td> 
                                                <td>&#8358;{{number_format($subscriptions->amount)}}</td>
                                                <td>{{$subscriptions->year}}</td>
                                                <td>{{$subscriptions->month}}</td>
                                                <td>{{$subscriptions->expire_on}}</td> 
                                                <td>
                                                    @if($subscriptions->expire_on < date('Y-M'))
                                                        <p style="color:red"> Expired </p>
                                                    @else
                                                    <p style="color:green">Active </p>
                                                    @endif
                                                </td>  
                                                <td>{{$subscriptions->created_at}}</td> 
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