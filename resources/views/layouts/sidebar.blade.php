<div id="wrapper">
    <div id="sidebar-wrapper" class="bg-theme bg-theme4" data-simplebar="" data-simplebar-auto-hide="true">
        {{-- <div class="brand-logo">
            <a href="{{route('administrator.dashboard')}}">
                <h5 class="logo-text">Estate Application</h5>
            </a>
        </div> --}}
        <div class="user-details">
            <div class="media align-items-center user-pointer collapsed" data-toggle="collapse" data-target="#user-dropdown">
                <div class="avatar">
                    <img class="mr-3 side-user-img" src="{{asset('house.png')}}" alt="user avatar">
                </div>
                <div class="media-body">
                    <h6 class="side-user-name"><?php $name = Auth::user()->name; ?> {{ $name }}</h6>
                </div>
            </div>
            <div id="user-dropdown" class="collapse">
                <ul class="user-setting-menu">
                    <li><a href="{{route('user.profile')}}"><i class="icon-user"></i>  My Profile</a></li>
                    <li><a href="{{route('change.pasword')}}"><i class="icon-lock"></i> Change Password</a></li>
                    <li><a href="{{ route('admin.logout') }}"><i class="icon-power"></i> Logout</a></li>
                </ul>
            </div>
        </div>
        <ul class="sidebar-menu do-nicescrol">
            <li class="sidebar-header">MAIN NAVIGATION</li>
            @if(( Auth::user()->email_verified_at) == ""))
                <li>
                    <a href="{{ route('verification.resend') }}" class="waves-effect">
                        <i class="zmdi zmdi-view-dashboard text-danger"></i> <span>Resend Link </span>
                        <small class="badge float-right badge-light">
                            <i class="zmdi zmdi-long-arrow-right"></i>
                        </small>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.logout') }}" class="waves-effect">
                        <i class="zmdi zmdi-lock text-danger"></i> <span>Log Out</span>
                        <small class="badge float-right badge-light"><i class="zmdi zmdi-long-arrow-right"></i></small>
                    </a>
                </li>	
                    
            @else
                <li>
                    <a href="{{route('administrator.dashboard')}}" class="waves-effect">
                        <i class="zmdi zmdi-view-dashboard text-success"></i> <span>Dashboard</span>
                        <small class="badge float-right badge-light">
                            <i class="zmdi zmdi-long-arrow-right"></i>
                        </small>
                    </a>
                </li>
                @if ((auth()->user()->hasRole('Administrator')) OR
                    (auth()->user()->hasRole('Admin')))
                    
                    <li>
                        <a href="{{route('user.create')}}" class="waves-effect">
                            <i class="fa fa-user text-success"></i> <span>System Users</span>
                            <small class="badge float-right badge-light">
                                <i class="zmdi zmdi-long-arrow-right"></i>
                            </small>
                        </a>
                    </li>
                    <li>
                        <a href="javaScript:void();" class="waves-effect">
                            <i class="fa fa-users text-success"></i>
                            <span>Agent Mgt</span>
                            <i class="fa fa-angle-left pull-right text-danger"></i>
                        </a>
                        <ul class="sidebar-submenu">
                            <li><a href="{{route('agent.category.create')}}"><i class="zmdi zmdi-long-arrow-right"></i> Categories</a></li>
                            <li><a href="{{route('agent.create')}}"><i class="zmdi zmdi-long-arrow-right"></i> Registration</a></li>
                            <li><a href="{{route('subscription.create')}}"><i class="zmdi zmdi-long-arrow-right"></i> Subscriptions</a></li>
                            
                        </ul>
                    </li>
                    <li>
                        <a href="javaScript:void();" class="waves-effect">
                            <i class="fa fa-building text-success"></i>
                            <span>Property Mgt</span>
                            <i class="fa fa-angle-left pull-right text-danger"></i>
                        </a>
                        <ul class="sidebar-submenu">
                            <li><a href="{{route('property.category.create')}}"><i class="zmdi zmdi-long-arrow-right"></i> Categories</a></li>
                            <li><a href="{{route('property.type.create')}}"><i class="zmdi zmdi-long-arrow-right"></i> Types</a></li>
                            <li><a href="{{route('document.create')}}"><i class="zmdi zmdi-long-arrow-right"></i>Documents </a></li>
                            <li><a href="{{route('facility.create')}}"><i class="zmdi zmdi-long-arrow-right"></i> Facilities</a></li>

                            <li><a href=""><i class="zmdi zmdi-long-arrow-right"></i> Request</a></li>
                        </ul>
                    </li>


                @endif
                @if(auth()->user()->hasRole('Agent')) 
                    <li>
                        <a href="{{route('agent.create')}}" class="waves-effect">
                            <i class="fa fa-user text-success"></i> <span>Agents</span>
                            <small class="badge float-right badge-light">
                                <i class="zmdi zmdi-long-arrow-right"></i>
                            </small>
                        </a>
                    </li>

                    <li>
                        <a href="{{route('subscription.create')}}" class="waves-effect">
                            <i class="fa fa-list text-success"></i> <span>My Subscriptions</span>
                            <small class="badge float-right badge-light">
                                <i class="zmdi zmdi-long-arrow-right"></i>
                            </small>
                        </a>
                    </li>
                    
                @endif
                @if(auth()->user()->hasRole('Administrator') OR
                    auth()->user()->hasRole('Agent')  OR
                   
                    auth()->user()->hasRole('Admin')) 
                    
                    <li>
                        <a href="javaScript:void();" class="waves-effect">
                            <i class="fa fa-money text-success"></i>
                            <span>Assets</span>
                            <i class="fa fa-angle-left pull-right text-danger"></i>
                        </a>
                        <ul class="sidebar-submenu">
                            <li><a href="{{route('property.create')}}"><i class="zmdi zmdi-long-arrow-right"></i> Add Property</a></li>
                            <li><a href="{{route('property.index')}}"><i class="zmdi zmdi-long-arrow-right"></i> All Properties</a></li>
                            <li><a href="{{route('property.sold')}}"><i class="zmdi zmdi-long-arrow-right"></i> Sold Properties</a></li>
                            <li><a href="{{route('property.booked')}}"><i class="zmdi zmdi-long-arrow-right"></i>Booked Properties </a></li>
                            <li><a href="{{route('property.available')}}"><i class="zmdi zmdi-long-arrow-right"></i> Available Properties</a></li>
                            
                        </ul>
                    </li>
                    
                @endif
                <li>
                    <a href="" class="waves-effect">
                        <i class="fa fa-cloud text-success"></i> <span>My Activity Log</span>
                        <small class="badge float-right badge-light"><i class="zmdi zmdi-long-arrow-right"></i></small>
                    </a>
                </li>	
                <li>
                    <a href="{{ route('admin.logout') }}" class="waves-effect">
                        <i class="zmdi zmdi-lock text-success"></i> <span>Log Out</span>
                        <small class="badge float-right badge-light"><i class="zmdi zmdi-long-arrow-right"></i></small>
                    </a>
                </li>	
                    
            @endif
            
        </ul>
        
    </div>
    
    <header class="topbar-nav">
            <nav class="navbar navbar-expand fixed-top">
                <ul class="navbar-nav mr-auto align-items-center">
                <li class="nav-item">
                        <a class="nav-link toggle-menu" href="">
                        <i class="icon-menu menu-icon"></i>
                        </a>
                </li>
                
                <h4 align="center"><p >PROPERTY APPLICATION</p></h4>
                </ul>
            
                <ul class="navbar-nav align-items-center right-nav-link">
        
                <li class="nav-item">
                    
                    <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" data-toggle="dropdown" href="">
                        <span class="user-profile"><img src="{{asset('house.png')}}" class="img-circle" alt="user avatar"></span>
                    </a>
                    
                </li>
                </ul>
        </nav>
    </header>
    <div class="clearfix"></div>