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

        <section id="property" class="padding_top padding_bottom_half">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 listing1 property-details">
                        <h2 class="text-uppercase">{{$property->property_name}}</h2>
                        <p class="bottom30">{{$property->address. ' '. $property->state. ' State,  '. $property->lga}}</p>
                        <div id="property-d-1" class="owl-carousel">
                            <div class="item"><img src="{{asset('property_cover_images/'.$property->cover_image)}}" 
                                alt="image" style="height: 400px"/>
                            </div>
                            @foreach($image as $images)
                                <div class="item"><img src="{{asset('storage/property_images/'.$images->image)}}"" alt="image"/></div>
                            @endforeach
                        </div>
                        <div id="property-d-1-2" class="owl-carousel">
                            <div class="item"><img src="{{asset('property_cover_images/'.$property->cover_image)}}" alt="image"/></div>
                            @foreach($image as $images)
                                <div class="item"><img src="{{asset('storage/property_images/'.$images->image)}}"" alt="image"/></div>
                            @endforeach
                        </div>
                        <div class="property_meta bg-black bottom40">
                            <span><i class="icon-select-an-objecto-tool"></i>{{$property->size}}</span>
                            <span><i class=" icon-user"></i>{{substr($property->agent->agent_name, 0,15)}}</span>
                            <span><i class="icon-safety-shower"></i>1 Bathroom</span>
                            <span><i class="icon-old-television"></i>TV Lounge</span>
                            <span><i class="icon-garage"></i>1 Garage</span>
                        </div>
                        <h2 class="text-uppercase">Property Description</h2>
                        
                        <div class="text-it-p bottom40">
                            <p>{{$property->description}}</p>
                        </div>
                        <h2 class="text-uppercase bottom20">Quick Summary</h2>
                        <div class="row property-d-table bottom40">
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <table class="table table-striped table-responsive">
                                    
                                    <tbody>                                    
                                        <tr>
                                            <td>Property Number</td>
                                            <td class="text-right">{{$property->property_number}}</td> 
                                        </tr>
                                        <tr>
                                            <td>Agent</td>
                                            <td class="text-right">{{$property->agent->agent_name. ", ". $property->agent->email . ", ". $property->agent->phone_number}}</td> 
                                        </tr>
                                        <tr>
                                            <td>Property Price</td>
                                            <td class="text-right">&#8358;<?php echo number_format($property->amount) ?></td> 
                                        </tr>
                                        <tr>
                                            <td>Size</td>
                                            <td class="text-right">{{$property->size}}</td> 
                                        </tr>
                                        <tr>
                                            <td>Documents</td>
                                            <td class="text-right">{{$property->document_id}}</td> 
                                        </tr>
                                        <tr>
                                            <td>Facilities</td>
                                            <td class="text-right">{{$property->facility_id}}</td> 
                                        </tr>
                                       
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <table class="table table-striped table-responsive">
                                    <tbody>
                                        <tr>
                                            <td>Condition</td>
                                            <td class="text-right">{{$property->property_condition}}</td> 
                                        </tr>
                                        <tr>
                                            <td>Property Category</td>
                                            <td class="text-right">{{$property->category->property_category_name}}</td> 
                                        </tr>
                                        <tr>
                                            <td>Property Type</td>
                                            <td class="text-right">{{$property->property_type->property_type_name}}</td> 
                                        </tr>
                                        <tr>
                                            <td>Property Location</td>
                                            <td class="text-right">{{$property->state . ", ". $property->lga}}</td> 
                                        </tr>
                                        <tr>
                                            <td>Property Address</td>
                                            <td class="text-right">{{$property->address}}</td> 
                                        </tr>
                                        <tr>
                                            <td>Property Status</td>
                                            <td class="text-right">
                                                <?php 
                                                if($property->status == 1){ ?>
                                                    <p style="color:green"> Available </p> <?php
                                                }elseif($property->status == 2){ ?>
                                                    <p style="color:red"> Booked </p> <?php
                                                }else{ ?>
                                                    <p style="color:aqua"> Sold </p><?php
                                                } ?>
                                                        
                                            </td> 
                                        </tr>
                                                
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <h2 class="text-uppercase bottom20">Features</h2>
                            <div class="row bottom40">
                                <div class="col-md-4 col-sm-6 col-xs-12">
                                    <ul class="pro-list">
                                        <li> Air Conditioning</li>
                                        <li> Barbeque</li>
                                        <li> Dryer</li>
                                        <li> Laundry</li>
                                    </ul>
                                </div>
                                <div class="col-md-4 col-sm-6 col-xs-12">
                                    <ul class="pro-list">
                                        <li>Microwave</li>
                                        <li>Outdoor Shower</li>
                                        <li>Refrigerator</li>
                                        <li>Swimming Pool</li>
                                    </ul>
                                </div>
                                <div class="col-md-4 col-sm-6 col-xs-12">
                                    <ul class="pro-list">
                                        <li> Quiet Neighbourhood</li>
                                        <li> TV Cable & WIFI</li>
                                        <li> Window Coverings</li>
                                    </ul>
                                </div>
                            </div>
                            <h2 class="text-uppercase">Features</h2>
                            <p class="bottom20">Lorem ipsum dolor sit amet, .
                            </p>
                        
                        
                            <h2 class="text-uppercase bottom20">Property Map</h2>
                            <div class="row bottom40">
                                <div class="col-md-12 bottom20">
                                    <div class="property-list-map">
                                        <div id="property-listing-map" class="multiple-location-map" style="width:100%;height:430px;"></div>
                                    </div>
                                </div>
                                <div class="social-networks">
                                    <div class="social-icons-2">
                                        <span class="share-it">Share this Property</span>
                                        <span><a href="#."><i class="fa fa-facebook" aria-hidden="true"></i> Facebook</a></span>
                                        <span><a href="#."><i class="fa fa-twitter" aria-hidden="true"></i> Twitter</a></span>
                                        <span><a href="#."><i class="fa fa-google-plus" aria-hidden="true"></i> Google +</a></span>
                                    </div>
                                </div>
                            </div>
                            <h2 class="text-uppercase bottom20">Contact Agent</h2>
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
                                                    <td class="text-right">{{$agen->state}} Stte</td>
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
                                </div>
                                <div class="col-sm-12 bottom40">
                                    <form class="callus">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                <input type="text" class="form-control" placeholder="Name">
                                                </div>
                                                <div class="form-group">
                                                <input type="tel" class="form-control" placeholder="Phone Number">
                                                </div>
                                                <div class="form-group">
                                                <input type="email" class="form-control" placeholder="Email">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                <textarea class="form-control" placeholder="Message"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 row">
                                                <div class="row">
                                                <div class="col-sm-3">
                                                    <input type="submit" class="btn-blue uppercase border_radius" value="submit now">
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                    
                                
                                <div class="row">
                                    <div class="col-sm-10">
                                        <h2 class="text-uppercase top20">Similar Properties</h2>
                                        <p class="bottom30">We have Properties in these Areas View a list of Featured Properties.</p>
                                    </div>
                                    <div class="col-sm-12"><div id="two-col-slider" class="owl-carousel">
										@foreach($proper as $propers)
											<div class="item">
												<div class="property_item heading_space">
													<div class="image">
														<a href="#."><img src="{{asset('property_cover_images/'.$propers->cover_image)}}" 
															style="height:254px; width:365px;" alt="latest property" class="img-responsive"></a>
														<div class="price clearfix"> 
															<span class="tag pull-right">&#8358;<?php echo number_format($propers->amount) ?></span>
														</div>
														<span class="tag_t">For {{$propers->purpose}}</span> 
														<span class="tag_l">Featured</span>
													</div>
													<div class="proerty_content">
														<div class="proerty_text">
															<h3 class="captlize"><a href="#.">{{$propers->property_name}}</a></h3>
															<p>{{$propers->address . ' '.$propers->state. ' State' }}</p>
														</div>
														<div class="property_meta transparent"> 
															<span><i class="icon-select-an-objecto-tool"></i>{{$propers->size}}</span> 
															<span><i class="icon-user"></i>{{substr($propers->agent->agent_name, 0,15)}}</span> 
															 
														</div>
														<div class="property_meta transparent bottom30">
															<span><i class="icon-old-television"></i>TV Lounge</span>
															<strong>
																<?php 
																if($propers->status == 1){ ?>
																	<span style="color:green"><i class="fa fa-shopping-cart"></i> Available </p> <?php
																}elseif($propers->status == 2){ ?>
																	<span style="color:blue"><i class="fa fa-shopping-cart"></i> Booked </p> <?php
																}else{ ?>
																	<span style="color:red"><i class="fa fa-shopping-cart"></i> Sold </p><?php
																} ?></span>
															</strong>
														</div>
														<div class="favroute clearfix">
															<p class="pull-md-left"><i class="icon-calendar2"></i>&nbsp;{{$propers->created_at}} </p>
															<ul class="pull-right">
																<li><a href="#."><i class="icon-like"></i></a></li>
																<li><a href="#five" class="share_expender" data-toggle="collapse"><i class="icon-share3"></i></a></li>
															</ul>
														</div>
														<div class="toggle_share collapse" id="five">
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
                                          
									</div>
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
                            
                        </aside>
                </div>
            </div>
        </section>
    @endsection