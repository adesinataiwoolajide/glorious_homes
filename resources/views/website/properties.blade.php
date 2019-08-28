@extends('layouts.website')

    @section('content')
   
    <section class="page-banner padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h1 class="text-uppercase">Our Properties</h1>
                    <p>List of Properties</p>
                    <ol class="breadcrumb text-center ">
                        <li><a href="{{route('web.index')}}">Home</a></li>
                        <li><a href="{{route('web.property')}}">Properties</a></li>
                        <li class="active">List of All Our Properties</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section id="listing_layout" class="listing1 maplisting">
        <div class="container-fluid">
            <div class="row">
                {{-- <div class="ol-md-6 col-sm-6 col-xs-12 listing_map">
                    <div id="banner-map">
                        <div class="row property-list-area property-list-map-area">
                            <div class="property-list-map">
                                <div id="property-listing-map" class="multiple-location-map" 
                                style="width:100%; top:0; bottom:0;"></div>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <div class="ol-md-12 col-sm-12 col-xs-12 ">
                    
                    <div class="row">
                        <div class="col-sm-12">
                            <h2 class="text-uppercase bottom20">Properties listings</h2>
                        </div><?php $num =1; ?>
                        @foreach ($propert as $props)

                            <div class="col-sm-3">
                                <div class="property_item heading_space">
                                    <div class="image">
                                        <a href="{{route('web.prop.details', $props->property_number)}}">
                                        <img src="{{asset('property_cover_images/'.$props->cover_image)}}" 
                                            style="height:224px; width:365px;" class="img-responsive"></a>
                                        <div class="price clearfix"> 
                                            <span class="tag pull-right">&#8358;<?php echo number_format($props->amount) ?></span>
                                        </div>
                                        <span class="tag_t">For {{$props->purpose}}</span> 
                                        <span class="tag_l">{{$props->category->property_category_name}}</span>
                                    </div>
                                    <div class="proerty_content">
                                        <div class="proerty_text">
                                            <h3 class="captlize"><a href="">{{$props->property_name}}</a></h3>
                                            <p>{{$props->address}}</p>
                                            <p>{{$props->state. ' State, '. $props->lga}}</p>
                                        </div>
                                        
                                        <div class="property_meta transparent"> 

                                            <span><i class="icon-select-an-objecto-tool"></i>{{$props->property_condition}}</span> 
                                             
                                            <span><i class="fa fa-cogs"></i>{{$props->size}}</span>   
                                        </div>
                                        <div class="property_meta transparent bottom30">
                                            <span><i class="icon-user"></i>{{substr($props->agent->agent_name, 0,15)}}</span>
                                            <strong>
                                                <?php 
                                                if($props->status == 1){ ?>
                                                    <span style="color:green"><i class="fa fa-shopping-cart"></i> Available </p> <?php
                                                }elseif($props->status == 2){ ?>
                                                    <span style="color:blue"><i class="fa fa-shopping-cart"></i> Booked </p> <?php
                                                }else{ ?>
                                                    <span style="color:red"><i class="fa fa-shopping-cart"></i> Sold </p><?php
                                                } ?></span>
                                            </strong>
                                            
                                        </div>
                                        <div class="favroute clearfix">
                                            <strong>
                                                <p class="pull-md-left">{{$props->created_at}} &nbsp; <i class="icon-calendar2"></i></p>
                                                <ul class="pull-right">
                                                    <li><a href="javascript:void(0)"><i class="icon-plus"></i></a></li>[]
                                                    <li><a href="javascript:void(0)"><i class="icon-like"></i></a></li>
                                                    <li><a href="#{{$num}}" class="share_expender" data-toggle="collapse"><i class="icon-share3"></i></a></li>
                                                    
                                                </ul>
                                            </strong>
                                        </div>
                                        <div class="toggle_share collapse" id="{{$num}}">
                                            <ul>
                                                <li><a href="javascript:void(0)" class="facebook"><i class="icon-facebook-1"></i> Facebook</a></li>
                                                <li><a href="javascript:void(0)" class="twitter"><i class="icon-twitter-1"></i> Twitter</a></li>
                                                <li><a href="javascript:void(0)" class="instagram"><i class="icon-vimeo3"></i> Instagram</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div> <?php
                            $num++; ?>
                        @endforeach
                        <div class="padding_bottom text-center">
                            <ul class="pager">
                                <li>{{$propert->links()}}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection