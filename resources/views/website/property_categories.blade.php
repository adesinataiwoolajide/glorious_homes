@extends('layouts.website')

@section('content')
   
    <section class="page-banner padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h1 class="text-uppercase"> Property Categories for {{$category->property_category_name}}</h1>
                    <p>List of Properties Categories</p>
                    <ol class="breadcrumb text-center ">
                        <li><a href="{{route('web.index')}}">Home</a></li>
                        <li><a href="{{route('web.property')}}">Property Categories</a></li>
                        <li><a href="{{route('web.property')}}">All Properties</a></li>
                        <li class="active">List of All Our Property Categories</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    
      
      <!-- Listing Start -->
    <section id="listing1" class="listing1 padding_top">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-sm-12 col-xs-12">
                    <div class="row">
                        <div class="col-md-9">
                            <h2 class="uppercase">PROPERTIES IN {{strtoupper($category->property_category_name)}} CATEGORY</h2>
                            <p class="heading_space">We have Properties in {{$category->property_category_name}} Categories.</p>
                        </div>
                        <div class="col-md-3">
                            <form class="callus">
                                <div class="single-query">
                                    <div class="intro">
                                        <select>
                                            <option class="active">Default Order</option>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                            <option>6</option>
                                        </select>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="row">
                        <?php $num =1; ?>
                        @forelse ($properties as $property)
                            <div class="col-sm-6">
                                <div class="property_item heading_space">
                                    <div class="image">
                                        <a href="{{route('web.prop.details', $property->property_number)}}"><img src="{{asset('property_cover_images/'.$property->cover_image)}}" 
                                            style="height:224px; width:365px;" alt="latest property" class="img-responsive"></a>
                                        <div class="price clearfix"> 
                                            <span class="tag pull-right">&#8358;<?php echo number_format($property->amount) ?></span>
                                        </div>
                                        <span class="tag_t">For {{$property->purpose}}</span> 
                                        <span class="tag_l">{{$property->category->property_category_name}}</span>
                                    </div>
                                    <div class="proerty_content">
                                        <div class="proerty_text">
                                            <h3 class="captlize"><a href="{{route('web.prop.details', $property->property_number)}}">{{$property->property_name}}</a></h3>
                                            <p>{{$property->state. ' State, '. $property->lga}}</p>
                                        </div>
                                        <div class="property_meta transparent"> 
                                            <span><i class="icon-select-an-objecto-tool"></i>{{$property->property_condition}}</span> 
                                            {{-- <span><i class="icon-bed"></i>2 Office Rooms</span>  --}}
                                            <span><i class="icon-safety-shower"></i>{{$property->size}}</span>   
                                        </div>
                                        <div class="property_meta transparent bottom30">
                                            <span><i class="icon-user"></i>{{substr($property->agent->agent_name, 0,15)}}s</span>
                                            
                                            <span>
                                                <strong>
                                                    <?php 
                                                    if($property->status == 1){ ?>
                                                        <span style="color:green"><i class="fa fa-shopping-cart"></i> Available </p> <?php
                                                    }elseif($property->status == 2){ ?>
                                                        <span style="color:blue"><i class="fa fa-shopping-cart"></i> Booked </p> <?php
                                                    }else{ ?>
                                                        <span style="color:red"><i class="fa fa-shopping-cart"></i> Sold </p><?php
                                                    } ?></span>
                                                </strong>
                                                        
                                            </span>
                                        </div>
                                        <div class="favroute clearfix">
                                            <p class="pull-md-left">{{$property->created_at}}  &nbsp; <i class="icon-calendar2"></i></p>
                                            <ul class="pull-right">
                                                <li><a href="#."><i class="icon-like"></i></a></li>
                                                <li><a href="#{{$num}}" class="share_expender" data-toggle="collapse"><i class="icon-share3"></i></a></li>
                                                <li><a href="#."><i class="icon-plus"></i></a></li>
                                            </ul>
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
                            </div>
                            <?php
                            $num++; ?>
                        @empty
                            <div class="col-sm-12">
                                <p align="center" style="color:red">No Property Was Found for {{$category->property_category_name}} Categories</p>
                            </div>
                            @php $lite =1 @endphp
                            @foreach ($propert as $props)
                                <div class="col-sm-6">
                                    <div class="property_item heading_space">
                                        <div class="image">
                                            <a href="{{route('web.prop.details', $props->property_number)}}"><img src="{{asset('property_cover_images/'.$props->cover_image)}}" 
                                                style="height:224px; width:365px;" alt="latest property" class="img-responsive"></a>
                                            <div class="price clearfix"> 
                                                <span class="tag pull-right">&#8358;<?php echo number_format($props->amount) ?></span>
                                            </div>
                                            <span class="tag_t">For {{$props->purpose}}</span> 
                                            <span class="tag_l">{{$props->category->property_category_name}}</span>
                                        </div>
                                        <div class="proerty_content">
                                            <div class="proerty_text">
                                                <h3 class="captlize"><a href="{{route('web.prop.details', $props->property_number)}}">{{$props->property_name}}</a></h3>
                                                <p>{{$props->state. ' State, '. $props->lga}}</p>
                                            </div>
                                            <div class="property_meta transparent"> 
                                                <span><i class="icon-select-an-objecto-tool"></i>{{$props->property_condition}}</span> 
                                                {{-- <span><i class="icon-bed"></i>2 Office Rooms</span>  --}}
                                                <span><i class="icon-safety-shower"></i>{{$props->size}}</span>   
                                            </div>
                                            <div class="property_meta transparent bottom30">
                                                <span><i class="icon-user"></i>{{substr($props->agent->agent_name, 0,15)}}s</span>
                                                
                                                <span>
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
                                                            
                                                </span>
                                            </div>
                                            <div class="favroute clearfix">
                                                <p class="pull-md-left">{{$props->created_at}}  &nbsp; <i class="icon-calendar2"></i></p>
                                                <ul class="pull-right">
                                                    <li><a href="#."><i class="icon-like"></i></a></li>
                                                    <li><a href="#{{$lite}}" class="share_expender" data-toggle="collapse"><i class="icon-share3"></i></a></li>
                                                    <li><a href="#."><i class="icon-plus"></i></a></li>
                                                </ul>
                                            </div>
                                            <div class="toggle_share collapse" id="{{$lite}}">
                                                <ul>
                                                    <li><a href="javascript:void(0)" class="facebook"><i class="icon-facebook-1"></i> Facebook</a></li>
                                                    <li><a href="javascript:void(0)" class="twitter"><i class="icon-twitter-1"></i> Twitter</a></li>
                                                    <li><a href="javascript:void(0)" class="instagram"><i class="icon-vimeo3"></i> Instagram</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @php $lite++  @endphp
                            @endforeach
                        @endforelse
                        

                    </div>
              
                    <div class="padding_bottom text-center">
                        <ul class="pager">
                            
                            <li class="active">{{$properties->links()}}</li>
                            
                        </ul>
                    </div>
                </div>
                <aside class="col-md-4 col-xs-12">
                    <div class="property-query-area clearfix">
                        <div class="col-md-12">
                        <h3 class="text-uppercase bottom20 top15">Advanced Search</h3>
                        </div>
                        <form class="callus">
                        <div class="single-query form-group col-sm-12">
                            <input type="text" class="keyword-input" placeholder="Keyword (e.g. 'office')">
                        </div>
                        <div class="single-query form-group col-sm-12">
                            <div class="intro">
                            <select>
                                <option selected="" value="any">Location</option>
                                <option>All areas</option>
                                <option>Bayonne </option>
                                <option>Greenville</option>
                                <option>Manhattan</option>
                                <option>Queens</option>
                                <option>The Heights</option>
                            </select>
                            </div>
                        </div>
                        <div class="single-query form-group col-sm-12">
                            <div class="intro">
                            <select>
                                <option class="active">Property Type</option>
                                <option>All areas</option>
                                <option>Bayonne </option>
                                <option>Greenville</option>
                                <option>Manhattan</option>
                                <option>Queens</option>
                                <option>The Heights</option>
                            </select>
                            </div>
                        </div>
                        <div class="single-query form-group col-sm-12">
                            <div class="intro">
                            <select>
                                <option class="active">Property Status</option>
                                <option>All areas</option>
                                <option>Bayonne </option>
                                <option>Greenville</option>
                                <option>Manhattan</option>
                                <option>Queens</option>
                                <option>The Heights</option>
                            </select>
                            </div>
                        </div>
                        <div class="search-2 col-sm-12">
                            <div class="row">
                            <div class="col-sm-6">
                                <div class="single-query form-group">
                                <div class="intro">
                                    <select>
                                    <option class="active">Min Beds</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                    <option>6</option>
                                    </select>
                                </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="single-query form-group">
                                <div class="intro">
                                    <select>
                                    <option class="active">Min Baths</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                    <option>6</option>
                                    </select>
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="row">
                            <div class="col-sm-6">
                                <div class="single-query form-group">
                                <input type="text" class="keyword-input" placeholder="Min Area (sq ft)">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="single-query form-group">
                                <input type="text" class="keyword-input" placeholder="Max Area (sq ft)">
                                </div>
                            </div>
                            </div>
                        </div>
                        <div class="col-sm-12 bottom10">
                            <div class="single-query-slider">
                            <label><strong>Price Range:</strong></label>
                            <div class="price text-right">
                                <span>$</span>
                                <div class="leftLabel"></div>
                                <span>to $</span>
                                <div class="rightLabel"></div>
                            </div>
                            <div data-range_min="0" data-range_max="1500000" data-cur_min="0" data-cur_max="1500000" class="nstSlider">
                                <div class="bar"></div>
                                <div class="leftGrip"></div>
                                <div class="rightGrip"></div>
                            </div>
                            </div>
                        </div>
                        <div class="col-sm-12 form-group">
                            <button type="submit" class="btn-blue border_radius">Search</button>
                        </div>
                        </form>
                        <div class="col-sm-12">
                        <div class="group-button-search">
                            <a data-toggle="collapse" href=".html" class="more-filter bottom15">
                            <i class="fa fa-plus text-1" aria-hidden="true"></i><i class="fa fa-minus text-2 hide" aria-hidden="true"></i>
                            <div class="text-1">Show more search options</div>
                            <div class="text-2 hide">less more search options</div>
                            </a>
                        </div>
                        </div>
                        <div class="search-propertie-filters collapse">
                        <div class="container-2">
                            <div class="row">
                            <div class="col-sm-6 col-xs-6">
                                <div class="search-form-group white">
                                <input type="checkbox" name="check-box" />
                                <span>Rap music</span>
                                </div>
                            </div>
                            <div class="col-sm-6 col-xs-6">
                                <div class="search-form-group white">
                                <input type="checkbox" name="check-box" />
                                <span>Rap music</span>
                                </div>
                            </div>
                            <div class="col-sm-6 col-xs-6">
                                <div class="search-form-group white">
                                <input type="checkbox" name="check-box" />
                                <span>Rap music</span>
                                </div>
                            </div>
                            <div class="col-sm-6 col-xs-6">
                                <div class="search-form-group white">
                                <input type="checkbox" name="check-box" />
                                <span>Rap music</span>
                                </div>
                            </div>
                            </div>
                            <div class="row">
                            <div class="col-sm-6 col-xs-6">
                                <div class="search-form-group white">
                                <input type="checkbox" name="check-box" />
                                <span>Rap music</span>
                                </div>
                            </div>
                            <div class="col-sm-6 col-xs-6">
                                <div class="search-form-group white">
                                <input type="checkbox" name="check-box" />
                                <span>Rap music</span>
                                </div>
                            </div>
                            <div class="col-sm-6 col-xs-6">
                                <div class="search-form-group white">
                                <input type="checkbox" name="check-box" />
                                <span>Rap music</span>
                                </div>
                            </div>
                            <div class="col-sm-6 col-xs-6">
                                <div class="search-form-group white">
                                <input type="checkbox" name="check-box" />
                                <span>Rap music</span>
                                </div>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                        <h3 class="bottom40 margin40">Featured Properties</h3>
                        </div>
                    </div>
                    @foreach ($list as $propk)
                        <div class="row bottom20">
                            <div class="col-md-4 col-sm-4 col-xs-6 p-image">
                                <img src="{{asset('property_cover_images/'.$propk->cover_image)}}" alt="image"/>
                            </div>
                            <div class="col-md-8 col-sm-8 col-xs-6">
                                <div class="feature-p-text">
                                    <h4>{{$propk->property_name}}</h4>
                                    <p class="bottom15">{{$propk->state. ' State, '. $propk->lga}}</p>
                                    <a href="{{route('web.prop.details', $propk->property_number)}}">&#8358;
                                        <?php echo number_format($propk->amount) ?>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    
                </aside>
            </div>
        </div>
    </section>

@endsection