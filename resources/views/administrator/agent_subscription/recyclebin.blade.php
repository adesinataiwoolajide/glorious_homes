@extends('layouts.app')

@section('content')
    
<div class="clearfix"></div>
<div class="content-wrapper">
    <div class="container-fluid">
        <div class="row pt-2 pb-2">
            <div class="col-sm-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('administrator.dashboard')}}">Home</a></li>
                    @if (Gate::allows('Administrator', auth()->user()) OR (auth()->user()->hasRole('Admin')))
                        <li class="breadcrumb-item"><a href="{{route('subscription.restore')}}">Restore Deleted Subscriptions</a></li>
                    @endif
                    <li class="breadcrumb-item">
                        <a href="{{route('subscription.create')}}">
                            Add Subscription
                        </a>
                    </li>
                    
                    <li class="breadcrumb-item active" aria-current="page">
                       Deleted Agent Subscription
                    </li>
                </ol>
            </div>
        </div>
       
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                   
                    @if(count($subscription) ==0)
                        <div class="card-header" align="center" style="color: red"><i class="fa fa-table"></i> 
                            The List of Deleted Agent Subscription is Empty
                        </div>

                    @else
                        <div class="card-header"><i class="fa fa-table"></i> List of All Deleted Agent Subscriptions</div>
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
                                            
                                            <th>Time Deleted</th>
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
                                            
                                            <th>Time Deleted</th>
                                        </tr>
                                    </tfoot>
                                    <tbody><?php
                                        $y=1; ?>
                                        @foreach($subscription as $subscriptions)
                                            <tr>
                                            
                                                <td>{{$y}}
                                                    @if(auth()->user()->hasPermissionTo('Delete Subscription') OR 
                                                        (Gate::allows('Administrator', auth()->user())))
                                                        <a href="{{route('subscription.undelete', $subscriptions->subscription_id)}}" class="" onclick="return(confirmToRestore());">
                                                            <i class="fa fa-trash-o"></i> Restore
                                                        </a>

                                                    @endif
                                                     
                                                </td>
                                                
                                                <td>{{$subscriptions->agent->agent_name}}</td> 
                                                <td>{{$subscriptions->type}}</td> 
                                                <td>&#8358;{{number_format($subscriptions->amount)}}</td> 
                                                <td>{{$subscriptions->year}}</td>
                                                <td>{{$subscriptions->month}}</td>
                                                <td>{{$subscriptions->expire_on}}</td> 
                                               
                                                <td>{{$subscriptions->deleted_at}}</td> 
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