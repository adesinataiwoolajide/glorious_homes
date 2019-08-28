@extends('layouts.website')

@section('content')
    @include('layouts.slider')

    <section class="property-query-area bg_light">
        <div class="container">
            <div class="row">
                <form class="callus">
                    <div class="col-md-3 col-sm-6">
                        <div class="single-query form-group">
                            <input type="text" class="keyword-input" placeholder="Keyword (e.g. 'office')">
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="single-query form-group">
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
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="single-query form-group">
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
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="single-query form-group">
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
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="row search-2">
                            <div class="col-md-6 col-sm-6">
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
                            <div class="col-md-6 col-sm-6">
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
                    <div class="col-md-3 col-sm-6">
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
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="single-query-slider">
                                    <label>Price Range:</label>
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
                            <div class="col-md-4 text-right form-group">
                                <button type="submit" class="btn-blue border_radius top15">Search</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="group-button-search">
                <a data-toggle="collapse" href=".html" class="more-filter">
                    <i class="fa fa-plus text-1" aria-hidden="true"></i>
                    <i class="fa fa-minus text-2 hide" aria-hidden="true"></i>
                    <div class="text-1">Show more search options</div>
                    <div class="text-2 hide">less more search options</div>
                </a>
            </div>
            <div class="search-propertie-filters collapse">
                <div class="container-2">
                    <div class="row">
                        <div class="col-md-3 col-sm-3 col-xs-4">
                            <div class="search-form-group white">
                                <input type="checkbox" name="check-box" />
                                <span>Rap music</span>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-4">
                            <div class="search-form-group white">
                                <input type="checkbox" name="check-box" />
                                <span>Rap music</span>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-4">
                            <div class="search-form-group white">
                                <input type="checkbox" name="check-box" />
                                <span>Rap music</span>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-4">
                            <div class="search-form-group white">
                                <input type="checkbox" name="check-box" />
                                <span>Rap music</span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 col-sm-3 col-xs-4">
                            <div class="search-form-group white">
                                <input type="checkbox" name="check-box" />
                                <span>Rap music</span>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-4">
                            <div class="search-form-group white">
                                <input type="checkbox" name="check-box" />
                                <span>Rap music</span>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-4">
                            <div class="search-form-group white">
                                <input type="checkbox" name="check-box" />
                                <span>Rap music</span>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-4">
                            <div class="search-form-group white">
                                <input type="checkbox" name="check-box" />
                                <span>Rap music</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--Best Deals-->
    <section id="property" class="padding bg_gallery">
        <div class="container">
            <div class="row">
            <div class="col-sm-12 text-center">
                <h2 class="uppercase">real estate properties</h2>
                <p class="heading_space">We have Properties in these Areas View a list of Featured Properties.</p>
            </div>
            </div>
            <div class="clearfix">
            <div id="filters-property" class="cbp-l-filters-button text-center">
                <div data-filter=".latest" class="cbp-filter-item-active cbp-filter-item">LATEST</div>
                <div data-filter=".sale" class="cbp-filter-item">SALE</div>        
                <div data-filter=".rent" class="cbp-filter-item">RENT</div>
            </div>
            </div>
            <div id="property-gallery" class="cbp listing1">
                <div class="cbp-item latest sale">
                    <div class="property_item">
                        <div class="image">
                            <a href="property_detail1.html"><img src="images/listing1.jpg" alt="latest property" 
                                class="img-responsive"></a>
                            <div class="price clearfix"> 
                                <span class="tag pull-right">$8,600 Per Month</span>
                            </div>
                            <span class="tag_t">For Sale</span> 
                            <span class="tag_l">Featured</span>
                        </div>
                        <div class="proerty_content">
                            <div class="proerty_text">
                                <h3 class="captlize"><a href="property_detail1.html">Park avenue apartment</a></h3>
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
                                <p><i class="icon-calendar2"></i>&nbsp;5 Days ago </p>
                                <ul class="pull-right">
                                    <li><a href="javascript:void(0)"><i class="icon-like"></i></a></li>
                                    <li><a href="#seventy" class="share_expender" data-toggle="collapse"><i class="icon-share3"></i></a></li>
                                </ul>
                            </div>
                            <div class="toggle_share collapse" id="seventy">
                                <ul>
                                    <li><a href="javascript:void(0)" class="facebook"><i class="icon-facebook-1"></i> Facebook</a></li>
                                    <li><a href="javascript:void(0)" class="twitter"><i class="icon-twitter-1"></i> Twitter</a></li>
                                    <li><a href="javascript:void(0)" class="vimo"><i class="icon-vimeo3"></i> Vimeo</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="cbp-item latest rent">
                    <div class="property_item">
                        <div class="image">
                            <a href="property_detail2.html"><img src="images/listing2.jpg" alt="latest property" class="img-responsive"></a>
                            <div class="price clearfix"> 
                                <span class="tag pull-right">$8,600 Per Month</span>
                            </div>
                            <span class="tag_t">For Rent</span> 
                        </div>
                        <div class="proerty_content">
                            <div class="proerty_text">
                                <h3 class="captlize"><a href="property_detail2.html">Park avenue apartment</a></h3>
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
                                <p><i class="icon-calendar2"></i>&nbsp;5 Days ago </p>
                                <ul class="pull-right">
                                    <li><a href="javascript:void(0)"><i class="icon-like"></i></a></li>
                                    <li><a href="#six" class="share_expender" data-toggle="collapse"><i class="icon-share3"></i></a></li>
                                </ul>
                            </div>
                            <div class="toggle_share collapse" id="six">
                                <ul>
                                    <li><a href="javascript:void(0)" class="facebook"><i class="icon-facebook-1"></i> Facebook</a></li>
                                    <li><a href="javascript:void(0)" class="twitter"><i class="icon-twitter-1"></i> Twitter</a></li>
                                    <li><a href="javascript:void(0)" class="vimo"><i class="icon-vimeo3"></i> Vimeo</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="cbp-item latest sale">
                    <div class="property_item">
                        <div class="image">
                            <a href="property_detail3.html"><img src="images/listing3.jpg" alt="latest property" class="img-responsive"></a>
                            <div class="price clearfix"> 
                                <span class="tag pull-right">$8,600 Per Month</span>
                            </div>
                            <span class="tag_t">For Sale</span>
                            <span class="tag_l">Featured</span> 
                        </div>
                        <div class="proerty_content">
                            <div class="proerty_text">
                                <h3 class="captlize"><a href="property_detail3.html">Park avenue apartment</a></h3>
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
                                <p><i class="icon-calendar2"></i>&nbsp;5 Days ago </p>
                                <ul class="pull-right">
                                    <li><a href="javascript:void(0)"><i class="icon-like"></i></a></li>
                                    <li><a href="#three" class="share_expender" data-toggle="collapse"><i class="icon-share3"></i></a></li>
                                </ul>
                            </div>
                            <div class="toggle_share collapse" id="three">
                                <ul>
                                    <li><a href="javascript:void(0)" class="facebook"><i class="icon-facebook-1"></i> Facebook</a></li>
                                    <li><a href="javascript:void(0)" class="twitter"><i class="icon-twitter-1"></i> Twitter</a></li>
                                    <li><a href="javascript:void(0)" class="vimo"><i class="icon-vimeo3"></i> Vimeo</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="cbp-item latest rent">
                    <div class="property_item">
                        <div class="image">
                            <a href="property_detail1.html"><img src="images/listing4.jpg" alt="latest property" class="img-responsive"></a>
                            <div class="price clearfix"> 
                                <span class="tag pull-right">$8,600 Per Month</span>
                            </div>
                            <span class="tag_t">For Rent</span> 
                        </div>
                        <div class="proerty_content">
                            <div class="proerty_text">
                                <h3 class="captlize"><a href="property_detail1.html">Park avenue apartment</a></h3>
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
                                <p><i class="icon-calendar2"></i>&nbsp;5 Days ago </p>
                                <ul class="pull-right">
                                <li><a href="javascript:void(0)"><i class="icon-like"></i></a></li>
                                <li><a href="#twe" class="share_expender" data-toggle="collapse"><i class="icon-share3"></i></a></li>
                                </ul>
                            </div>
                            <div class="toggle_share collapse" id="twe">
                                <ul>
                                <li><a href="javascript:void(0)" class="facebook"><i class="icon-facebook-1"></i> Facebook</a></li>
                                <li><a href="javascript:void(0)" class="twitter"><i class="icon-twitter-1"></i> Twitter</a></li>
                                <li><a href="javascript:void(0)" class="vimo"><i class="icon-vimeo3"></i> Vimeo</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="cbp-item latest sale">
                  <div class="property_item">
                    <div class="image">
                      <a href="property_detail2.html"><img src="images/listing8.jpg" alt="latest property" class="img-responsive"></a>
                      <div class="price clearfix"> 
                        <span class="solid">Solid Out</span>
                      </div>
                      <span class="tag_t">For Sale</span> 
                    </div>
                    <div class="proerty_content">
                      <div class="proerty_text">
                        <h3 class="captlize"><a href="property_detail2.html">Park avenue apartment</a></h3>
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
                        <p><i class="icon-calendar2"></i>&nbsp;5 Days ago </p>
                        <ul class="pull-right">
                          <li><a href="javascript:void(0)"><i class="icon-like"></i></a></li>
                          <li><a href="#twomore" class="share_expender" data-toggle="collapse"><i class="icon-share3"></i></a></li>
                        </ul>
                      </div>
                      <div class="toggle_share collapse" id="twomore">
                        <ul>
                          <li><a href="javascript:void(0)" class="facebook"><i class="icon-facebook-1"></i> Facebook</a></li>
                          <li><a href="javascript:void(0)" class="twitter"><i class="icon-twitter-1"></i> Twitter</a></li>
                          <li><a href="javascript:void(0)" class="vimo"><i class="icon-vimeo3"></i> Vimeo</a></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="cbp-item latest sale">
                  <div class="property_item">
                    <div class="image">
                      <a href="property_detail3.html"><img src="images/listing6.jpg" alt="latest property" class="img-responsive"></a>
                      <div class="price clearfix"> 
                        <span class="tag pull-right">$8,600 Per Month</span>
                      </div>
                      <span class="tag_t">For Sale</span>
                      <span class="tag_l">Featured</span> 
                    </div>
                    <div class="proerty_content">
                      <div class="proerty_text">
                        <h3 class="captlize"><a href="property_detail3.html">Park avenue apartment</a></h3>
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
                        <p><i class="icon-calendar2"></i>&nbsp;5 Days ago </p>
                        <ul class="pull-right">
                          <li><a href="javascript:void(0)"><i class="icon-like"></i></a></li>
                          <li><a href="#one" class="share_expender" data-toggle="collapse"><i class="icon-share3"></i></a></li>
                        </ul>
                      </div>
                      <div class="toggle_share collapse" id="one">
                        <ul>
                          <li><a href="javascript:void(0)" class="facebook"><i class="icon-facebook-1"></i> Facebook</a></li>
                          <li><a href="javascript:void(0)" class="twitter"><i class="icon-twitter-1"></i> Twitter</a></li>
                          <li><a href="javascript:void(0)" class="vimo"><i class="icon-vimeo3"></i> Vimeo</a></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="cbp-item latest rent">
                  <div class="property_item">
                    <div class="image">
                      <a href="property_detail1.html"><img src="images/listing7.jpg" alt="latest property" class="img-responsive"></a>
                      <div class="price clearfix"> 
                        <span class="tag pull-right">$8,600 Per Month</span>
                      </div>
                      <span class="tag_t">For Rent</span> 
                      <span class="tag_l">Featured</span>
                    </div>
                    <div class="proerty_content">
                      <div class="proerty_text">
                        <h3 class="captlize"><a href="property_detail1.html">Park avenue apartment</a></h3>
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
                        <p><i class="icon-calendar2"></i>&nbsp;5 Days ago </p>
                        <ul class="pull-right">
                          <li><a href="javascript:void(0)"><i class="icon-like"></i></a></li>
                          <li><a href="#seven" class="share_expender" data-toggle="collapse"><i class="icon-share3"></i></a></li>
                        </ul>
                      </div>
                      <div class="toggle_share collapse" id="seven">
                        <ul>
                          <li><a href="javascript:void(0)" class="facebook"><i class="icon-facebook-1"></i> Facebook</a></li>
                          <li><a href="javascript:void(0)" class="twitter"><i class="icon-twitter-1"></i> Twitter</a></li>
                          <li><a href="javascript:void(0)" class="vimo"><i class="icon-vimeo3"></i> Vimeo</a></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="cbp-item latest sale">
                  <div class="property_item">
                    <div class="image">
                      <a href="property_detail2.html"><img src="images/listing5.jpg" alt="latest property" class="img-responsive"></a>
                      <div class="price clearfix"> 
                        <span class="tag pull-right">$8,600 Per Month</span>
                      </div>
                      <span class="tag_t">For Sale</span> 
                      <span class="tag_l">Featured</span>
                    </div>
                    <div class="proerty_content">
                      <div class="proerty_text">
                        <h3 class="captlize"><a href="property_detail2.html">Park avenue apartment</a></h3>
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
                        <p><i class="icon-calendar2"></i>&nbsp;5 Days ago </p>
                        <ul class="pull-right">
                          <li><a href="javascript:void(0)"><i class="icon-like"></i></a></li>
                          <li><a href="#onemore" class="share_expender" data-toggle="collapse"><i class="icon-share3"></i></a></li>
                        </ul>
                      </div>
                      <div class="toggle_share collapse" id="onemore">
                        <ul>
                          <li><a href="javascript:void(0)" class="facebook"><i class="icon-facebook-1"></i> Facebook</a></li>
                          <li><a href="javascript:void(0)" class="twitter"><i class="icon-twitter-1"></i> Twitter</a></li>
                          <li><a href="javascript:void(0)" class="vimo"><i class="icon-vimeo3"></i> Vimeo</a></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="cbp-item latest sale">
                  <div class="property_item">
                    <div class="image">
                      <a href="property_detail3.html"><img src="images/listing9.jpg" alt="latest property" class="img-responsive"></a>
                      <div class="price clearfix"> 
                        <span class="tag pull-right">$8,600 Per Month</span>
                      </div>
                      <span class="tag_t">For Sale</span> 
                      </div>
                    <div class="proerty_content">
                      <div class="proerty_text">
                        <h3 class="captlize"><a href="property_detail3.html">Park avenue apartment</a></h3>
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
                        <p><i class="icon-calendar2"></i>&nbsp;5 Days ago </p>
                        <ul class="pull-right">
                          <li><a href="javascript:void(0)"><i class="icon-like"></i></a></li>
                          <li><a href="#sixy" class="share_expender" data-toggle="collapse"><i class="icon-share3"></i></a></li>
                        </ul>
                      </div>
                      <div class="toggle_share collapse" id="sixy">
                        <ul>
                          <li><a href="javascript:void(0)" class="facebook"><i class="icon-facebook-1"></i> Facebook</a></li>
                          <li><a href="javascript:void(0)" class="twitter"><i class="icon-twitter-1"></i> Twitter</a></li>
                          <li><a href="javascript:void(0)" class="vimo"><i class="icon-vimeo3"></i> Vimeo</a></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-12 text-center top20">
                 <a href="listing1.html" class="btn-dark border_radius uppercase margin40">more listings</a>
              </div>
            </div>
          </section>
    <section id="deals" class="padding bg_light">
        <div class="container">
            <div class="row">
                <div class="col-sm-10">
                    <h2 class="uppercase">Best Deal Properties</h2>
                    <p class="heading_space">We have Properties in these Areas View a list of Featured Properties.</p>
                </div>
            </div>
            <div class="row">
                <div class="three-item owl-carousel">

                    @foreach($property as $properties)
                        <div class="item feature_item">
                            <div class="image"><a href="#."> 
                                <img src="{{asset('property_cover_images/'.$properties->cover_image)}}" 
                                style="height:254px; width:365px;"  alt="Featured Property"></a> 
                                <span class="price default_clr">{{$properties->purpose}}</span>
                            </div>
                            <div class="proerty_content">
                                <div class="proerty_text">
                                    <h3 class="bottom15"><a href="#.">{{$properties->property_name}}</a></h3>
                                    <p>{{$properties->address}}</p>
                                    <h4 class="top15">&#8358;<?php echo number_format($properties->amount) ?> <small>Family Home</small></h4>
                                </div>
                                <table class="table table-responsive">
                                    <tbody>
                                        <tr>
                                            <td><i class="icon-select-an-objecto-tool"></i>Total Area</td>
                                            <td class="text-right">4800 sq ft</td>
                                        </tr>
                                        <tr>
                                            <td><i class="icon-bed"></i>BadRooms</td>
                                            <td class="text-right">5</td>
                                        </tr>
                                        <tr>
                                            <td><i class="icon-safety-shower"></i>BathRooms</td>
                                            <td class="text-right">5</td>
                                        </tr>
                                        <tr>
                                            <td><i class="icon-garage"></i>Garage</td>
                                            <td class="text-right">1</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </section>
      <!--Best Deal Ends-->

@endsection