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