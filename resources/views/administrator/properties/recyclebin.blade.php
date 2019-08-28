@extends('layouts.app')

@section('content')
    
<div class="clearfix"></div>
<div class="content-wrapper">
    <div class="container-fluid">
        <div class="row pt-2 pb-2">
            <div class="col-sm-9">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('administrator.dashboard')}}">Home</a></li>
                    @if(auth()->user()->hasRole('Administrator') OR auth()->user()->hasRole('Admin'))
                        <li class="breadcrumb-item"><a href="{{route('property.restore')}}">Restore Deleted properties</a></li>
                    @endif 
                    <li class="breadcrumb-item">
                        <a href="{{route('property.index')}}">View Properties</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{route('property.create')}}">Add Property</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">List of Deleted Agents </li>
                </ol>
            </div>
        </div>

        <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        @if(count($property) ==0)
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
                                                <th> Agent</th>
                                                <th>Price</th>
                                                <th>Purpose</th>
                                                <th>Category</th>
                                                <th>Type</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>S/N</th>
                                                <th>Image</th>
                                                <th> Agent</th>
                                                <th>Price</th>
                                                <th>Purpose</th>
                                                <th>Category</th>
                                                <th>Type</th>
                                                <th>Status</th>
                                            </tr>
                                        </tfoot>
                                        <tbody><?php
                                            $y=1; ?>
                                            
                                            @foreach($property as $properties)
                                                <tr>
                                                
                                                    <td>{{$y}}
                                                        @if(auth()->user()->hasPermissionTo('Restore Agent Category') OR 
                                                            (Gate::allows('Administrator', auth()->user())))
                                                            <a href="{{route('property.undelete', $properties->property_number)}}"
                                                                onclick="return(confirmToRestore());" class="btn btn-success">
                                                                <i class="fa fa-trash-o"></i>Restore
                                                            </a>
                                                        @endif
                                                    </td>
                                                    <td><img src="{{asset('property_cover_images/'.$properties->cover_image)}}" 
                                                        style="height:50px; width:50px;" alt="{{$properties->property_number}}" align="center" /></td> 
                                                    <td>{{$properties->agent->agent_name.  ", ". $properties->agent->phone_number}}</td> 
                                                    <td>&#8358;<?php echo number_format($properties->amount) ?></td> 
                                                    <td>{{$properties->purpose}}</td>
                                                    <td>{{$properties->category->property_category_name}}</td> 
                                                    <td>{{$properties->property_type->property_type_name}}</td>  
                                                    
                                                    <td><?php 
                                                        if($properties->status == 1){ ?>
                                                            <p style="color:green"> Available </p> <?php
                                                        }elseif($properties->status == 2){ ?>
                                                            <p style="color:red"> Booked </p> <?php
                                                        }else{ ?>
                                                            <p style="color:aqua"> Sold </p><?php
                                                        } ?>
                                                        
                                                    </td> 
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