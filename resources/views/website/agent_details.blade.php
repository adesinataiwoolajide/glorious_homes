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
                        <li><a href="{{route('agent.details', $agen->email)}}"> Agent Details</a></li>
                        <li class="active">Agent Details</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section id="agents" class="padding_bottom_half padding_top">
        <div class="container">
            <div class="row">
                <div class="col-md-8 listing1">
                    <div class="row">
                        <div class="col-sm-6 bottom40">
                            <div class="agent_wrap">
                                <div class="image">
                                    <img src="{{asset('agent-passport/'.$agen->passport)}}" alt="Agents">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 bottom40">
                            <div class="agent_wrap">
                                <h3>{{$agen->agent_name}}</h3>
                                <p class="bottom30">{{$agen->description}} .</p>
                                <table class="agent_contact table">
                                    <tbody>
                                        <tr class="bottom10">
                                            <td><strong>Category:</strong></td>
                                            <td class="text-right">{{$agen->agent_category->agent_category_name}}</td>
                                        </tr>
                                        <tr class="bottom10">
                                            <td><strong>Phone:</strong></td>
                                            <td class="text-right">{{$agen->description}}</td>
                                        </tr>
                                        <tr class="bottom10">
                                            <td><strong>Mobile:</strong></td>
                                            <td class="text-right">{{$agen->phone_number}}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Email Adress:</strong></td>
                                            <td class="text-right">{{$agen->email}}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>State:</strong></td>
                                            <td class="text-right">{{$agen->state}}</td>
                                        </tr>
                                        <tr>
                                                <td><strong>LGA:</strong></td>
                                                <td class="text-right">{{$agen->lga}}</td>
                                            </tr>
                                    </tbody>
                                </table>
                                <div style="border-bottom:1px solid #d3d8dd;" class="bottom15"></div>
                                    <ul class="social_share">
                                        <li><a href="javascript:void(0)" class="facebook"><i class="icon-facebook-1"></i></a></li>
                                        <li><a href="javascript:void(0)" class="twitter"><i class="icon-twitter-1"></i></a></li>
                                        <li><a href="javascript:void(0)" class="google"><i class="icon-google4"></i></a></li>
                                        <li><a href="javascript:void(0)" class="linkden"><i class="fa fa-linkedin"></i></a></li>
                                        <li><a href="javascript:void(0)" class="vimo"><i class="icon-vimeo3"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-sm-12 bottom40">
                                @include('partials._message')
                                <form action="{{route('contact.agent')}}" method="POST" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                               
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="Full Name" name="name" required>
                                                @if ($errors->has('name'))
                                                    <div class="alert alert-danger alert-dismissible" role="alert">
                                                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                        <div class="alert-icon contrast-alert">
                                                            <i class="fa fa-check"></i>
                                                        </div>
                                                        <div class="alert-message">
                                                            <span><strong>Error!</strong> {{ $errors->first('name') }} !</span>
                                                        </div>
                                                    </div>
                                                @endif  
                                            </div>
                                            <div class="form-group">
                                                <input type="number" class="form-control" name="phone_number" placeholder="Your Phone Number" required>
                                                @if ($errors->has('phone_number'))
                                                    <div class="alert alert-danger alert-dismissible" role="alert">
                                                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                        <div class="alert-icon contrast-alert">
                                                            <i class="fa fa-check"></i>
                                                        </div>
                                                        <div class="alert-message">
                                                            <span><strong>Error!</strong> {{ $errors->first('phone_number') }} !</span>
                                                        </div>
                                                    </div>
                                                @endif  
                                            </div>
                                            <div class="form-group">
                                                <input type="email" class="form-control" name="email" placeholder="Your Email" required>
                                                @if ($errors->has('email'))
                                                    <div class="alert alert-danger alert-dismissible" role="alert">
                                                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                        <div class="alert-icon contrast-alert">
                                                            <i class="fa fa-check"></i>
                                                        </div>
                                                        <div class="alert-message">
                                                            <span><strong>Error!</strong> {{ $errors->first('email') }} !</span>
                                                        </div>
                                                    </div>
                                                @endif  
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control" readonly name="agent-id" value="{{$agen->agent_name}}">
                                            </div>
                                            <input type="hidden" name="agent_id" value="{{$agen->agent_id}}">
                                            <div class="form-group">
                                                <textarea class="form-control" placeholder="Message Here .." name="content" 
                                                required style="height:80px">
                                                </textarea>
                                                @if ($errors->has('content'))
                                                    <div class="alert alert-danger alert-dismissible" role="alert">
                                                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                        <div class="alert-icon contrast-alert">
                                                            <i class="fa fa-check"></i>
                                                        </div>
                                                        <div class="alert-message">
                                                            <span><strong>Error!</strong> {{ $errors->first('content') }} !</span>
                                                        </div>
                                                    </div>
                                                @endif  
                                            </div>
                                        </div>
                                        
                                        <div class="col-sm-12 row">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <input type="submit" class="btn-blue uppercase border_radius" value="Contact The Agent ">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-12 bottom30 top20">
                                <h2 class="text-uppercase">{{$agen->agent_name}} Properites</h2>
                                <p>Please view the Agent Properties below.</p>
                            </div>
                            @foreach ($proper as $props)
                                <div class="col-sm-6">
                                    <div class="property_item heading_space">
                                        <div class="image">
                                                <img src="{{asset('property_cover_images/'.$props->cover_image)}}" 
                                                style="height:224px; width:365px;" class="img-responsive"></a>
                                            <div class="price clearfix"> 
                                                <span class="tag pull-right">$8,600 Per Month</span>
                                            </div>
                                            <span class="tag_t">For Sale</span> 
                                            <span class="tag_l">Featured</span>
                                        </div>
                                        <div class="proerty_content">
                                            <div class="proerty_text">
                                                <h3 class="captlize"><a href="#.">Historic Town House</a></h3>
                                                <p>45 Regent Street, London, UK</p>
                                            </div>
                                            <div class="property_meta transparent"> 
                                                <span><i class="icon-select-an-objecto-tool"></i>4800 sq ft</span> 
                                                <span><i class="icon-bed"></i>2 Office Rooms</span> 
                                                <span><i class="icon-safety-shower"></i>1 Bathroom</span>   
                                            </div>
                                            <div class="property_meta transparent bottom30">
                                                <span><i class="icon-old-television"></i>TV Lounge</span>
                                                <span><i class="icon-garage"></i>1 Garage</span>
                                                <span></span>
                                            </div>
                                            <div class="favroute clearfix">
                                                <p class="pull-md-left"><i class="icon-calendar2"></i>&nbsp;5 Days ago </p>
                                                <ul class="pull-right">
                                                <li><a href="#."><i class="icon-like"></i></a></li>
                                                <li><a href="#three" class="share_expender" data-toggle="collapse"><i class="icon-share3"></i></a></li>
                                                </ul>
                                            </div>
                                            <div class="toggle_share collapse" id="three">
                                                <ul>
                                                <li><a href="#." class="facebook"><i class="icon-facebook-1"></i> Facebook</a></li>
                                                <li><a href="#." class="twitter"><i class="icon-twitter-1"></i> Twitter</a></li>
                                                <li><a href="#." class="vimo"><i class="icon-vimeo3"></i> Vimeo</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            
                    
                            <div class="col-sm-12 text-center heading_space">
                                <ul class="pager">
                                    <li> {{$proper->links()}}</li>
                                </ul>
                            </div>
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
                        <div class="row bottom20">
                            <div class="col-md-4 col-sm-4 col-xs-6 p-image">
                                <img src="{{asset('design/images/f-p-1.png')}}" alt="image"/>
                            </div>
                            <div class="col-md-8 col-sm-8 col-xs-6">
                                <div class="feature-p-text">
                                    <h4>Historic Town House</h4>
                                    <p class="bottom15">45 Regent Street, London, UK</p>
                                    <a href="#.">$128,600</a>
                                </div>
                            </div>
                        </div>
                    
                        <div class="row">
                            <div class="col-md-12">
                                <h3 class="margin40 bottom20">Featured Properties</h3>
                            </div>
                            <div class="col-md-12">
                                <div id="agent-2-slider" class="owl-carousel">
                                    @foreach ($property as $props)
                                        <div class="item">
                                            <div class="property_item heading_space">
                                                <div class="image">
                                                    <a href=""><img src="{{asset('property_cover_images/'.$props->cover_image)}}" alt="listin" class="img-responsive"></a>
                                                    <div class="feature"><span class="tag-2">For {{$props->purpose}}</span></div>
                                                    <div class="price clearfix"><span class="tag pull-right">&#8358;<?php echo number_format($props->amount) ?> 
                                                    <small>{{$props->property_type->property_type_name}}</small></span></div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                   
                                </div>
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        
        </div>
    </section>
   

@endsection