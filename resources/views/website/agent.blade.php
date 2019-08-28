@extends('layouts.website')

    @section('content')
    <!-- Page Banner Start-->
    <section class="page-banner padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h1 class="text-uppercase">Our Agent</h1>
                    <p>Our Registered Agent.</p>
                    <ol class="breadcrumb text-center ">
                        <li><a href="{{route('web.index')}}">Home</a></li>
                        <li><a href="{{route('agent')}}">Our Agent</a></li>
                        <li class="active">List of Our Agents</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
  
    {{-- <section id="agent-2" class="padding_top padding_bottom_half">
        <div class="container">
            <div class="row">
                @if(count($agents) < 1)
                    <p align="center" style="color:red"> No Agent was Found </p>
                @else
                    @foreach ($agents as $agent)
                        <div class="col-sm-4 bottom40">
                            <div class="agent_wrap" >
                                <div class="image">
                                    <img src="{{asset('agent-passport/'.$agent->passport)}}" alt="Agents">
                                    <div class="img-info" >
                                        <h3 align="center">Agent Name: {{$agent->agent_name}}</h3>
                                        <span>Specialization: {{$agent->agent_category->agent_category_name}}</span>
                                        <p class="top20 bottom30">{{$agent->description}}.</p>
                                        <table class="agent_contact table">
                                            <tbody>
                                                <tr class="bottom10">
                                                    <td><strong>Phone:</strong></td>
                                                    <td class="text-right">{{$agent->phone_number}}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Email Adress:</strong></td>
                                                    <td class="text-right"><a href="{{route('agent.details', $agent->email)}}">{{$agent->email}}</a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <hr>
                                        <a class="btn-more" href="{{route('agent.details', $agent->email)}}">
                                            <i><img alt="arrow" src="{{asset('design/images/arrow-yellow.png')}}"></i><span>Full Profile</span><i><img alt="arrow" src="images/arrow-yellow.png"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div> 
                    @endforeach
                    <div class="col-sm-12 text-center heading_space">
                        <ul class="pager">
                            <li> {{$agents->links()}}</li>
                        </ul>
                    </div>
                @endif
               
           
            </div>
        </div>
    </section> --}}

    <section id="agents" class="padding_top">
        <div class="container">
            <div class="row">
                @if(count($agents) < 1)
                    <p align="center" style="color:red"> No Agent was Found </p>
                @else
                    @foreach ($agents as $agent)
                        <div class="col-md-4 col-sm-6">
                            <div class="item agent_item margin_bottom">
                                <div class="image"><a href="#.">
                                    <img src="{{asset('agent-passport/'.$agent->passport)}}" alt="Featured Property" 
                                    class="border_radius"> </a>
                                </div>
                                <h3 class="bottom15 top20"> {{$agent->agent_name}} <small>-  {{$agent->agent_category->agent_category_name}}</small></h3>
                                <p class="bottom30"> {{$agent->description}}</p>
                            
                                <div class="agent_wrap">
                                    <table class="agent_contact table">
                                        <tbody>
                                            <tr class="bottom10">
                                                <td><strong>Phone:</strong></td>
                                                <td class="text-right">{{$agent->phone_number}}</td>
                                            </tr>
                                            
                                            <tr>
                                                <td><strong>Email Adress:</strong></td>
                                                <td class="text-right"><a href="#.">{{$agent->email}}</a></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Skype:</strong></td>
                                                <td class="text-right"><a href="#.">bohdan.kononets</a></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div style="border-bottom:1px solid #d3d8dd;"></div>
                                    <a href="{{route('agent.details', $agent->email)}}" class="btn-more">
                                        <i><img src="{{asset('design/images/arrowl.png')}}" alt="arrow"></i>
                                        <span>View Profile</span>
                                        <i><img src="{{asset('design/images/arrowr.png')}}" alt="arrow"></i>
                                    </a>
                                
                                </div>
                            </div>
                        </div>
                            
                        
                    
                    @endforeach

                    
                       
                    <div class="col-sm-12" align="center">
                        <ul class="pager">
                            <li> {{$agents->links()}}</li>
                        </ul>
                    </div>
                @endif
            </div>
        </section>
 
    @endsection