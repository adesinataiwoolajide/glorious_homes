@extends('layouts.app')

@section('content')
    
    <div class="content-wrapper">
        <div class="container-fluid">
            @include('partials._message')
            @if(( Auth::user()->email_verified_at) == "")
                <div class="card mt-12 gradient-orange" style="color:white">
                    <div class="media-body" align="center">
                        
                        <span class="text-white" align="center">You Have Not Verify Your Account,<br>
                             Please Kindly Visit Your E-Mail for the verification link</span>
                    </div>
                   
                </div>
            @else
                @if(auth()->user()->hasRole('Administrator') OR
                    auth()->user()->hasRole('Admin'))
                    <div class="card mt-3 gradient-forest">
                        <div class="card-content">
                            <div class="row row-group m-0"  style="">
                                <div class="col-12 col-lg-6 col-xl-3 border-white-2" 
                                    onclick="location.href='{{route('agent.create')}}'">
                                    <div class="card-body">
                                        <div class="media align-items-center">
                                            <div class="media-body text-left">
                                                <h4 class="mb-0 text-white"></h4>
                                                <span class="text-white">Our <br> Agents</span>
                                            </div>
                                            <div class="align-self-center w-icon">
                                                <i class="icon-user text-white"><sup> {{count($agent)}}</sup></i>
                                            </div>
                                        </div>
                                        <div class="progress-wrapper mt-3">
                                            <div class="progress" style="height:5px;">
                                                <div class="progress-bar" style="width:90%"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6 col-xl-3 border-white-2" 
                                onclick="location.href='{{route('property.index')}}'">
                                    <div class="card-body">
                                        <div class="media align-items-center">
                                            <div class="media-body text-left">
                                                <h4 class="mb-0 text-white"></h4>
                                                <span class="text-white">Our<br>  Properties</span>
                                            </div>
                                            <div class="align-self-center w-icon">
                                                <i class="fa fa-building text-white">
                                                    <sup> {{count($properties)}} </sup>
                                                </i>
                                            </div>
                                        </div>
                                        <div class="progress-wrapper mt-3">
                                            <div class="progress" style="height:5px;">
                                                <div class="progress-bar" style="width:90%"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6 col-xl-3 border-white-2" 
                                    onclick="location.href='{{route('user.create')}}'">
                                    <div class="card-body">
                                        <div class="media align-items-center">
                                            <div class="media-body text-left">
                                                <h4 class="mb-0 text-white"></h4>
                                                <span class="text-white">Our  <br>Users</span>
                                            </div>
                                            <div class="align-self-center w-icon">
                                                <i class="icon-users text-white"><sup> {{count($user)}} </sup></i></div>
                                        </div>
                                        <div class="progress-wrapper mt-3">
                                            <div class="progress" style="height:5px;">
                                                <div class="progress-bar" style="width:90%"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6 col-xl-3 border-white-2" onclick="location.href='{{route('subscription.create')}}'">
                                    <div class="card-body">
                                        <div class="media align-items-center">
                                            <div class="media-body text-left">
                                                <h4 class="mb-0 text-white"></h4>
                                                <span class="text-white">Agent <br> Subcription</span>
                                            </div>
                                            <div class="align-self-center w-icon">
                                                <i class="fa fa-money text-white"><sup> {{count($subscription)}} </sup></i></div>
                                        </div>
                                        <div class="progress-wrapper mt-3">
                                            <div class="progress" style="height:5px;">
                                                <div class="progress-bar" style="width:50%"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-lg-6 col-xl-3" onclick="location.href='{{route('agent.category.create')}}'" 
                            style="">
                            <div class="card gradient-army">
                                <div class="card-body">
                                    <div class="media d-flex">
                                        <div class="media-body">
                                            <span class="text-white">Agent <br> Categories</span>
                                            <h3 class="text-white"></h3>
                                        </div>
                                        <div class="w-icon">
                                            <i class="fa fa-cogs text-white"><sup> {{count($agentCategory)}} <sup></i>
                                        </div>
                                    </div>
                                    <div id="widget-chart-1"></div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-12 col-lg-6 col-xl-3" onclick="location.href='{{route('property.type.create')}}'" 
                            style="">
                            <div class="card gradient-dusk">
                                <div class="card-body">
                                    <div class="media d-flex">
                                        <div class="media-body">
                                            <span class="text-white"> Property <br> Types</span>
                                            <h3 class="text-white"></h3>
                                        </div>
                                        <div class="w-icon">
                                            <i class="fa fa-sitemap text-white"><sup>{{count($propertyTypes)}} </sup></i>
                                        </div>
                                    </div>
                                    <div id="widget-chart-2"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 col-xl-3" onclick="location.href='{{route('property.category.create')}}'" style="">
                            <div class="card gradient-forest">
                                <div class="card-body">
                                    <div class="media d-flex">
                                        <div class="media-body">
                                            <span class="text-white">Property <br>Categories</span>
                                            <h3 class="text-white"></h3>
                                        </div>
                                        <div class="w-icon">
                                            <i class="fa fa-list text-white"><sup>{{count($propertyCategory)}}</sup></i>
                                        </div>
                                    </div>
                                    <div id="widget-chart-4"></div>
                                </div>
                            </div>
                        </div>
                    
                        <div class="col-12 col-lg-6 col-xl-3" onclick="location.href='{{route('document.create')}}'" style="">
                            <div class="card gradient-orange">
                                <div class="card-body">
                                    <div class="media d-flex">
                                        <div class="media-body">
                                            <span class="text-white">List of <br>Property <br>Documents </span>
                                            <h3 class="text-white"></h3>
                                        </div>
                                        <div class="w-icon">
                                            <i class="fa fa-book text-white"><sup>{{count($propertyDoc)}}</sup></i>
                                        </div>
                                    </div>
                                    <div id="widget-chart-4"></div>
                                </div>
                            </div>
                        </div>
                        

                    </div>
                @endif
                @if(auth()->user()->hasRole('Administrator') OR
                    auth()->user()->hasRole('Agent')  OR
                    auth()->user()->hasRole('Admin')) 
                    <div class="card mt-3 gradient-dusk">
                        <div class="card-content">
                            <div class="row row-group m-0"  style="">
                                <div class="col-12 col-lg-6 col-xl-3 border-white-2" 
                                    onclick="location.href='{{route('property.booked')}}'">
                                    <div class="card-body">
                                        <div class="media align-items-center">
                                            <div class="media-body text-left">
                                                <h4 class="mb-0 text-white"></h4>
                                                <span class="text-white">Booked <br> Properties</span>
                                            </div>
                                            <div class="align-self-center w-icon">
                                                <i class="icon-basket-loaded text-white"><sup>{{count($booked)}}</sup></i></div>
                                        </div>
                                        <div class="progress-wrapper mt-3">
                                            <div class="progress" style="height:5px;">
                                                <div class="progress-bar" style="width:90%"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6 col-xl-3 border-white-2" 
                                onclick="location.href='{{route('property.sold')}}'">
                                    <div class="card-body">
                                        <div class="media align-items-center">
                                            <div class="media-body text-left">
                                                <h4 class="mb-0 text-white"></h4>
                                                <span class="text-white">Sold<br> Properties </span>
                                            </div>
                                            <div class="align-self-center w-icon">
                                                <i class="icon-wallet text-white"><sup>{{count($sold)}}</sup></i></div>
                                        </div>
                                        <div class="progress-wrapper mt-3">
                                            <div class="progress" style="height:5px;">
                                                <div class="progress-bar" style="width:90%"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6 col-xl-3 border-white-2" 
                                    onclick="location.href='{{route('property.available')}}'">
                                    <div class="card-body">
                                        <div class="media align-items-center">
                                            <div class="media-body text-left">
                                                <h4 class="mb-0 text-white"></h4>
                                                <span class="text-white">Available  <br> Properties</span>
                                            </div>
                                            <div class="align-self-center w-icon">
                                                <i class="icon-users text-white"><sup>{{count($available)}}</sup></i></div>
                                        </div>
                                        <div class="progress-wrapper mt-3">
                                            <div class="progress" style="height:5px;">
                                                <div class="progress-bar" style="width:90%"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6 col-xl-3 border-white-2" onclick="location.href=''">
                                    <div class="card-body">
                                        <div class="media align-items-center">
                                            <div class="media-body text-left">
                                                <h4 class="mb-0 text-white"></h4>
                                                <span class="text-white">Property  <br> Request</span>
                                            </div>
                                            <div class="align-self-center w-icon">
                                                <i class="icon-building text-white"><sup>0</sup></i></div>
                                        </div>
                                        <div class="progress-wrapper mt-3">
                                            <div class="progress" style="height:5px;">
                                                <div class="progress-bar" style="width:50%"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                @if(auth()->user()->hasRole('Agent')) 
                    <div class="card mt-3 gradient-forest">
                        <div class="card-content">
                            <div class="row row-group m-0"  style="">
                                <div class="col-12 col-lg-6 col-xl-3 border-white-2" 
                                    onclick="location.href='{{route('agent.create')}}'">
                                    <div class="card-body">
                                        <div class="media align-items-center">
                                            <div class="media-body text-left">
                                                <h4 class="mb-0 text-white"></h4>
                                                <span class="text-white">My <br> Details</span>
                                            </div>
                                            <div class="align-self-center w-icon">
                                                <i class="icon-user text-white"><sup></sup></i></div>
                                        </div>
                                        <div class="progress-wrapper mt-3">
                                            <div class="progress" style="height:5px;">
                                                <div class="progress-bar" style="width:90%"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6 col-xl-3 border-white-2" 
                                onclick="location.href=''">
                                    <div class="card-body">
                                        <div class="media align-items-center">
                                            <div class="media-body text-left">
                                                <h4 class="mb-0 text-white"></h4>
                                                <span class="text-white">Activity<br> Log </span>
                                            </div>
                                            <div class="align-self-center w-icon">
                                                <i class="fa fa-cloud text-white"><sup></sup></i></div>
                                        </div>
                                        <div class="progress-wrapper mt-3">
                                            <div class="progress" style="height:5px;">
                                                <div class="progress-bar" style="width:90%"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6 col-xl-3 border-white-2" 
                                    onclick="location.href='{{route('subscription.create')}}'">
                                    <div class="card-body">
                                        <div class="media align-items-center">
                                            <div class="media-body text-left">
                                                <h4 class="mb-0 text-white"></h4>
                                                <span class="text-white">My  <br> Subscription</span>
                                            </div>
                                            <div class="align-self-center w-icon">
                                                <i class="icon-envelope text-white"><sup></sup></i></div>
                                        </div>
                                        <div class="progress-wrapper mt-3">
                                            <div class="progress" style="height:5px;">
                                                <div class="progress-bar" style="width:90%"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6 col-xl-3 border-white-2" onclick="location.href=''">
                                    <div class="card-body">
                                        <div class="media align-items-center">
                                            <div class="media-body text-left">
                                                <h4 class="mb-0 text-white"></h4>
                                                <span class="text-white">Contact  <br> Admin</span>
                                            </div>
                                            <div class="align-self-center w-icon">
                                                <i class="icon-lock text-white"><sup>0</sup></i></div>
                                        </div>
                                        <div class="progress-wrapper mt-3">
                                            <div class="progress" style="height:5px;">
                                                <div class="progress-bar" style="width:50%"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                @if(auth()->user()->hasRole('Administrator') OR
                    auth()->user()->hasRole('Admin'))
                    <div class="row">
                        <div class="col-12 col-lg-6 col-xl-3" onclick="location.href='{{route('facility.create')}}'" 
                            style="">
                            <div class="card gradient-army">
                                <div class="card-body">
                                    <div class="media d-flex">
                                        <div class="media-body">
                                            <span class="text-white">Property <br> Facilities</span>
                                            <h3 class="text-white"></h3>
                                        </div>
                                        <div class="w-icon">
                                            <i class="fa fa-table text-white"><sup>{{count($propertyFac) }}</sup></i>
                                        </div>
                                    </div>
                                    <div id="widget-chart-1"></div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-12 col-lg-6 col-xl-3" onclick="location.href=''" 
                            style="">
                            <div class="card gradient-dusk">
                                <div class="card-body">
                                    <div class="media d-flex">
                                        <div class="media-body">
                                            <span class="text-white"> My <br> Inbox</span>
                                            <h3 class="text-white"></h3>
                                        </div>
                                        <div class="w-icon">
                                            <i class="fa fa-envelope text-white"><sup>0</sup></i>
                                        </div>
                                    </div>
                                    <div id="widget-chart-2"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 col-xl-3" onclick="location.href=''" style="">
                            <div class="card gradient-forest">
                                <div class="card-body">
                                    <div class="media d-flex">
                                        <div class="media-body">
                                            <span class="text-white">Activity <br>Log </span>
                                            <h3 class="text-white"></h3>
                                        </div>
                                        <div class="w-icon">
                                            <i class="fa fa-cloud text-white"><sup>{{count($log) }}</sup></i>
                                        </div>
                                    </div>
                                    <div id="widget-chart-4"></div>
                                </div>
                            </div>
                        </div>

                    
                        <div class="col-12 col-lg-6 col-xl-3" onclick="location.href=''" style="">
                            <div class="card gradient-orange">
                                <div class="card-body">
                                    <div class="media d-flex">
                                        <div class="media-body">
                                            <span class="text-white">Contact <br>Agent </span>
                                            <h3 class="text-white"></h3>
                                        </div>
                                        <div class="w-icon">
                                            <i class="fa fa-building text-white"><sup>0</sup></i>
                                        </div>
                                    </div>
                                    <div id="widget-chart-4"></div>
                                </div>
                            </div>
                        </div>
                        

                    </div>
                @endif
            @endif
        </div>
        
    </div>
@endsection