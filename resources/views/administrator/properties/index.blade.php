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
                        <a href="{{route('property.index')}}">All Properties</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{route('property.booked')}}">Booked </a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{route('property.sold')}}">Sold </a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{route('property.available')}}">Available </a>
                    </li>
                    
                    
                    @if(auth()->user()->hasRole('Administrator') OR auth()->user()->hasRole('Admin'))
                        <li class="breadcrumb-item">
                            <a href="{{route('property.create')}}">Add Property</a>
                        </li>
                        <li class="breadcrumb-item"><a href="{{route('property.restore')}}">Restore Deleted properties</a></li>
                    @endif
                    <li class="breadcrumb-item active" aria-current="page">List of All properties </li>
                </ol>
            </div>
        </div>
        {{-- <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header text-uppercase">Carousel With indicators</div>
                    <div class="card-body">
                        <div id="carousel-3" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-3" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel-3" data-slide-to="1"></li>
                                <li data-target="#carousel-3" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img class="d-block w-100" src="{{asset('styling/assets/images/gallery/fp-1.jpg')}}" alt="First slide">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="{{asset('styling/assets/images/gallery/fp-2.jpg')}}" alt="Second slide">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="{{asset('styling/assets/images/gallery/fp-3.jpg')}}" alt="Third slide">
                                </div>
                            </div>
                            <a class="carousel-control-prev" href="#carousel-3" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carousel-3" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
       
            <div class="col-6">
                <div class="card">
                    <div class="card-header text-uppercase">Without Image Caption</div>
                    <div class="card-body">
                        <div class="row">
                        
                            <div class="col-md-4 col-lg-3 col-xl-3">
                                <a href={{asset('styling/assets/images/gallery/fp-3.jpg')}}" data-fancybox="group2">
                                    <img src="{{asset('styling/assets/images/gallery/fp-3.jpg')}}" alt="lightbox" 
                                    class="lightbox-thumb img-thumbnail">
                                </a>
                                
                            </div>
                            <div class="col-md-6 col-lg-3 col-xl-3">
                                <a href={{asset('styling/assets/images/gallery/fp-4.jpg')}}" data-fancybox="group2">
                                    <img src="{{asset('styling/assets/images/gallery/fp-4.jpg')}}" alt="lightbox" 
                                    class="lightbox-thumb img-thumbnail">
                                </a>
                                
                            </div>
                            <div class="col-md-6 col-lg-3 col-xl-3">
                                <a href={{asset('styling/assets/images/gallery/fp-5.jpg')}}" data-fancybox="group2">
                                    <img src="{{asset('styling/assets/images/gallery/fp-5.jpg')}}" alt="lightbox" 
                                    class="lightbox-thumb img-thumbnail">
                                </a>
                                
                            </div>
                            <div class="col-md-6 col-lg-3 col-xl-3">
                                <a href={{asset('styling/assets/images/gallery/fp-6.jpg')}}" data-fancybox="group2">
                                    <img src="{{asset('styling/assets/images/gallery/fp-6.jpg')}}" alt="lightbox" 
                                    class="lightbox-thumb img-thumbnail">
                                </a>
                                
                            </div>
                        
                    
                        
                        </div>
                    </div>
                </div>
            </div>
        </div><!--End Row--> --}}

        <div class="row">
           
            <div class="col-lg-12">
                @include('partials._message')
                <div class="card">
                    @if (Gate::allows('Administrator', auth()->user()) OR (auth()->user()->hasRole('Admin')))
                        @if(count($property) ==0)
                            <div class="card-header" align="center" style="color: red"><i class="fa fa-table"></i> 
                                The List of All Propertyies is Empty
                            </div>

                        @else
                            <div class="card-header"><i class="fa fa-table"></i> List of All Saved Properties</div>
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
                                                            @if(auth()->user()->hasPermissionTo('Restore Property') OR 
                                                            (Gate::allows('Administrator', auth()->user())))
                                                            <a href="{{route('property.delete', $properties->property_number)}}" class="" onclick="return(confirmToDelete());">
                                                                <i class="fa fa-trash-o"></i>
                                                            </a>
                                                        @endif
                                                        <a href="{{route('property.edit', $properties->property_number)}}" class="" onclick="return(confirmToEdit());">
                                                            <i class="fa fa-pencil"></i> 
                                                        </a>
                                                        <a href="{{route('property.show', $properties->property_number)}}" class="" onclick="return(confirmToDetails());">
                                                            <i class="fa fa-id-badge"></i> 
                                                        </a>
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
                    @else
                        @if(count($proper) ==0)
                            <div class="card-header" align="center" style="color: red"><i class="fa fa-table"></i> 
                               {{$agent->agent_name}} You Have Not Added Any Property
                            </div>

                        @else
                            <div class="card-header"><i class="fa fa-table"></i> {{$agent->agent_name}} List of All Your Saved Properties</div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="default-datatable" class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>S/N</th>
                                                <th>Image</th>
                                                
                                                <th>Price</th>
                                                <th> Purpose</th>
                                                <th>Category</th>
                                                <th>Type</th>
                                                <th>Status</th>
                                                <th> Time Added</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>S/N</th>
                                                <th>Image</th>
                                                
                                                <th>Price</th>
                                                <th> Purpose</th>
                                                <th>Category</th>
                                                <th>Type</th>
                                                <th>Status</th>
                                                <th> Time Added</th>
                                            </tr>
                                        </tfoot>
                                        <tbody><?php
                                            $y=1; ?>
                                        
                                            @foreach($proper as $properti)
                                                <tr>
                                                
                                                    <td>{{$y}}
                                                        @if(auth()->user()->hasPermissionTo('Restore Property') OR 
                                                            (Gate::allows('Administrator', auth()->user())))
                                                            <a href="{{route('property.delete', $properti->property_number)}}" class="" onclick="return(confirmToDelete());">
                                                                <i class="fa fa-trash-o"></i>
                                                            </a>
                                                        @endif
                                                        <a href="{{route('property.edit', $properti->property_number)}}" class="" onclick="return(confirmToEdit());">
                                                            <i class="fa fa-pencil"></i> 
                                                        </a>
                                                        <a href="{{route('property.show', $properti->property_number)}}" class="" onclick="return(confirmToDetails());">
                                                            <i class="fa fa-id-badge"></i> 
                                                        </a>
                                                    </td>
                                                    <td><img src="{{asset('property_cover_images/'.$properti->cover_image)}}" 
                                                        style="height:50px; width:50px;" alt="{{$properti->property_number}}" align="center" /></td> 
                                                    
                                                    <td>&#8358;<?php echo number_format($properti->amount) ?></td> 
                                                    <td>{{$properti->purpose}}</td>
                                                    <td>{{$properti->category->property_category_name}}</td> 
                                                    <td>{{$properti->property_type->property_type_name}}</td>  
                                                    
                                                    <td><?php 
                                                        if($properti->status == 1){ ?>
                                                            <p style="color:green"> Available </p> <?php
                                                        }elseif($properti->status == 2){ ?>
                                                            <p style="color:red"> Booked </p> <?php
                                                        }else{ ?>
                                                            <p style="color:aqua"> Sold </p><?php
                                                        } ?>
                                                        
                                                    </td>
                                                    <td>{{$properti->created_at}} </td> 
                                                </tr><?php $y++; ?>
                                            @endforeach
                                            
                                        </tbody>
                                        
                                    </table>
                                </div>
                            </div>
                        @endif
                    @endif
                   
                    
                </div>
            </div>
        </div>
    </div>
</div>


<a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
@endsection