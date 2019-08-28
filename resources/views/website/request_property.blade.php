@extends('layouts.website')

@section('content')
   
    <section class="page-banner padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h1 class="text-uppercase"> Request for Property </h1>
                    <p>List of Properties Categories</p>
                    <ol class="breadcrumb text-center ">
                        <li><a href="{{route('web.index')}}">Home</a></li>
                        <li><a href="{{route('request.property')}}">Property Categories</a></li>
                        <li class="active">Request For A Property</li>
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
                        @include('partials._message')
                        <div class="col-md-8">
                            <h2 class="uppercase">PROPERTY REQUEST FORM</h2>
                        <p class="heading_space">Please Kindly fill the below form to request form a Property.</p>
                        </div>
                    
                        <form action="{{route('subscription.save')}}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            
                            <div class="form-group row ">

                                <div class="col-sm-6" style="margin-bottom:10px">
                                    <label>Full Name</label>
                                    <input type="text" class="form-control " style="height:45px" name="name" value="{{ old('name') }}" required  placeholder="Please Enter Your Full Name">
                                    
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

                                <div class="col-sm-6" style="margin-bottom:10px">
                                    <label>E-Mail</label>
                                    <input type="email" class="form-control " style="height:45px" name="email" value="{{ old('email') }}" required   placeholder="Please Enter Your Active E-Mail">
                                    
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
                                <div class="col-sm-6" style="margin-bottom:10px">
                                    <label>Phone Number</label>
                                    <input type="number" class="form-control " style="height:45px" name="phone_number" value="{{ old('phone_number') }}" required  placeholder="Please Enter Your Phone Number">
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

                                <div class="col-sm-6" style="margin-bottom:10px">
                                    <label>State</label>
                                    <select class="form-control form-control-rounded" name="state" 
                                    required onchange="useSelectedItem(this)" id="theStates" style="height:45px">
                                        <option value=""> -- Select The State -- </option> 
                                        <option value="{{old('state')}}">{{old('state')}} </option>
                                        <option value=""></option>
                                        <option value="Adamawa">Abia State</option>
                                        <option value="Anambra">Anambra State</option>
                                        <option value="Bauchi">Bauchi State</option>
                                        <option value="Bayelsa">Bayelsa State</option>
                                        <option value="Benue">Benue State</option>
                                        <option value="Borno">Borno State</option>
                                        <option value="Cross River">Cross River State</option>
                                        <option value="Delta">Delta State</option>
                                        <option value="Ebonyi">Ebonyi State</option>
                                        <option value="Edo">Edo State</option>
                                        <option value="Ekiti">Ekiti State</option>
                                        <option value="Enugu">Enugu State</option>
                                        <option value="Gombe">Gombe State</option>
                                        <option value="Imo">Imo State</option>
                                        <option value="Jigawa">Jigawa State</option>
                                        <option value="Kaduna">Kaduna State</option>
                                        <option value="Kano">Kano State</option>
                                        <option value="Katsina">Katsina State</option>
                                        <option value="Kebbi">Kebbi State</option>
                                        <option value="Kogi">Kogi State</option>
                                        <option value="Kwara">Kwara State</option>
                                        <option value="Lagos">Lagos State</option>
                                        <option value="Nasarawa">Nasarawa State</option>
                                        <option value="Niger">Niger State</option>
                                        <option value="Ogun">Ogun State</option>
                                        <option value="Ondo">Ondo State</option>
                                        <option value="Osun">Osun State</option>
                                        <option value="Oyo">Oyo State</option>
                                        <option value="Plateau">Plateau State</option>
                                        <option value="Rivers">Rivers State</option>
                                        <option value="Sokoto">Sokoto State</option>
                                        <option value="Taraba">Taraba State</option>
                                        <option value="Yobe">Yobe State</option>
                                        <option value="Zamfara">Zamfara State</option>
                                        <option value="FCT">FCT State</option>
                                    <select>
                                    
                                    @if ($errors->has('state'))
                                        <div class="alert alert-danger alert-dismissible" role="alert">
                                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                                            <div class="alert-icon contrast-alert">
                                                <i class="fa fa-check"></i>
                                            </div>
                                            <div class="alert-message">
                                                <span><strong>Error!</strong> {{ $errors->first('state') }} !</span>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                <div class="col-sm-6" style="margin-bottom:10px">
                                    <label>Local Government</label>
                                    <select class="form-control form-control-rounded" id="locaGv" name="lga" required style="height:45px">
                                        <option value=""> -- Select The Local Govt -- </option>
                                        <option value="{{old('lga')}}"> {{old('lga')}}</option>
                                    <select>
                                    
                                    @if ($errors->has('lga'))
                                        <div class="alert alert-danger alert-dismissible" role="alert">
                                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                                            <div class="alert-icon contrast-alert">
                                                <i class="fa fa-check"></i>
                                            </div>
                                            <div class="alert-message">
                                                <span><strong>Error!</strong> {{ $errors->first('lga') }} !</span>
                                            </div>
                                        </div>
                                    @endif  
                                </div>

                                <div class="col-sm-6"  style="margin-bottom:10px">
                                    <label>Property Purpose</label><?php 
                                    $list = array('Rent', 'Lease', 'Buy'); ?>

                                    <select class="form-control form-control-rounded" name="purpose" 
                                        required style="height:45px">
                                        
                                        <option value=""> -- Select The Purpose -- </option>
                                        
                                        @foreach($list as $lists)
                                            <option value="{{$lists}}"> {{$lists}}  </option> 
                                        @endforeach
                                        
                                    <select>
                                    
                                    @if ($errors->has('purpose'))
                                        <div class="alert alert-danger alert-dismissible" role="alert">
                                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                                            <div class="alert-icon contrast-alert">
                                                <i class="fa fa-check"></i>
                                            </div>
                                            <div class="alert-message">
                                                <span><strong>Error!</strong> {{ $errors->first('purpose') }} !</span>
                                            </div>
                                        </div>
                                    @endif  

                                </div>

                                <div class="col-sm-6" style="margin-bottom:10px">
                                    <label> Property Condition</label><?php 
                                    $lis = array('Newly Built', 'Newly Renovated', 'Renovated', 'Dilapitated'); ?>
                                    <select class="form-control form-control-rounded" name="property_condition" 
                                        required style="height:45px">
                                        <option value=""> -- Select The Property Condition -- </option>
                                        
                                        @foreach($lis as $liss)
                                            <option value="{{$liss}}"> {{$liss}}  </option> 
                                        @endforeach
                                        
                                    <select>
                                    
                                    @if ($errors->has('property_condition'))
                                        <div class="alert alert-danger alert-dismissible" role="alert">
                                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                                            <div class="alert-icon contrast-alert">
                                                <i class="fa fa-check"></i>
                                            </div>
                                            <div class="alert-message">
                                                <span><strong>Error!</strong> {{ $errors->first('property_condition') }} !</span>
                                            </div>
                                        </div>
                                    @endif  

                                </div>

                                <div class="col-sm-6" style="margin-bottom:10px">
                                    <label>Property Category</label>
                                    <select class="form-control" name="property_category_id" 
                                        id ="property_category_id" onchange="showGenre(this.value)" required style="height:45px">
                                        <option value=""> -- Select The Category -- </option>
                                        @foreach($category as $listcategory)
                                            <option value="{{$listcategory->property_category_id}}"> 
                                                {{$listcategory->property_category_name}}  </option> 
                                        @endforeach
                                    <select>
                                    
                                    @if ($errors->has('property_category_id'))
                                        <div class="alert alert-danger alert-dismissible" role="alert">
                                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                                            <div class="alert-icon contrast-alert">
                                                <i class="fa fa-check"></i>
                                            </div>
                                            <div class="alert-message">
                                                <span><strong>Error!</strong> {{ $errors->first('property_category_id') }} !</span>
                                            </div>
                                        </div>
                                    @endif
                                </div>

                                <div class="col-sm-6" style="margin-bottom:10px" id="txtHint2">
                                    <label>Property Type</label>
                                    <select class="form-control" name="property_type_id" id="property_type_id" required style="height:45px">
                                        <option value=""> -- Select The Type -- </option>
                                        
                                    <select>
                                    
                                    @if ($errors->has('property_type_id'))
                                        <div class="alert alert-danger alert-dismissible" role="alert">
                                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                                            <div class="alert-icon contrast-alert">
                                                <i class="fa fa-check"></i>
                                            </div>
                                            <div class="alert-message">
                                                <span><strong>Error!</strong> {{ $errors->first('property_type_id') }} !</span>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                <div class="col-sm-6" style="margin-bottom:10px">
                                    <label>Required Documents</label>
                                    <select class="form-control " name="document_id[]" required multiple style="height:45px">
                                        <option value=""> -- Select The Documents -- </option>
                                        @foreach($document as $documents)
                                            <option value="{{$documents->document_name}}"> 
                                                {{$documents->document_name}}  
                                            </option> 
                                        @endforeach
                                    <select>
                                    
                                    @if ($errors->has('document_id'))
                                        <div class="alert alert-danger alert-dismissible" role="alert">
                                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                                            <div class="alert-icon contrast-alert">
                                                <i class="fa fa-check"></i>
                                            </div>
                                            <div class="alert-message">
                                                <span><strong>Error!</strong> {{ $errors->first('document_id') }} !</span>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                <div class="col-sm-6" style="margin-bottom:10px">
                                    <label>Minimum Budget</label> 
                                    <input type="number" class="form-control " style="height:45px" name="minimum_budget" value="{{ old('minimum_budget') }}" required  placeholder="Please Enter Your Minimum Budage">
                                    
                                    @if ($errors->has('minimum_budget'))
                                        <div class="alert alert-danger alert-dismissible" role="alert">
                                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                                            <div class="alert-icon contrast-alert">
                                                <i class="fa fa-check"></i>
                                            </div>
                                            <div class="alert-message">
                                                <span><strong>Error!</strong> {{ $errors->first('minimum_budget') }} !</span>
                                            </div>
                                        </div>
                                    @endif
                                </div>

                                <div class="col-sm-6" style="margin-bottom:10px">
                                    <label>Maximum Budget</label> 
                                    <input type="number" class="form-control " style="height:45px" name="maximum_budget" value="{{ old('maximum_budget') }}" required  placeholder="Please Enter Your Maximum Budget">
                                    
                                    @if ($errors->has('maximum_budget'))
                                        <div class="alert alert-danger alert-dismissible" role="alert">
                                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                                            <div class="alert-icon contrast-alert">
                                                <i class="fa fa-check"></i>
                                            </div>
                                            <div class="alert-message">
                                                <span><strong>Error!</strong> {{ $errors->first('maximum_udget') }} !</span>
                                            </div>
                                        </div>
                                    @endif
                                </div>

                                <div class="col-sm-6" style="margin-bottom:10px">
                                    <label>Facilities</label> 
                                    <textarea class="form-control " name="facilities" style="height:45px"  required  placeholder="Please Enter Your Expected Facilities seperate with come e.g (AC,Car Park, etc"> {{ old('facilities') }}</textarea>
                                    
                                    @if ($errors->has('facilities'))
                                        <div class="alert alert-danger alert-dismissible" role="alert">
                                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                                            <div class="alert-icon contrast-alert">
                                                <i class="fa fa-check"></i>
                                            </div>
                                            <div class="alert-message">
                                                <span><strong>Error!</strong> {{ $errors->first('facilities') }} !</span>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                <div class="col-sm-6" style="margin-bottom:10px">
                                    <label>Other Description</label> 
                                    <textarea class="form-control " name="other_description" style="height:45px"  required  placeholder="Please Enter Other Description"> {{ old('other_description') }}</textarea>
                                    
                                    @if ($errors->has('other_description'))
                                        <div class="alert alert-danger alert-dismissible" role="alert">
                                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                                            <div class="alert-icon contrast-alert">
                                                <i class="fa fa-check"></i>
                                            </div>
                                            <div class="alert-message">
                                                <span><strong>Error!</strong> {{ $errors->first('other_description') }} !</span>
                                            </div>
                                        </div>
                                    @endif
                                </div>
        
                                            
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block" style="border:none">
                                    REQUEST FOR A PROPERTY</button>
                                </div>
                                
                            </div>
                        </form>
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
                    
                </aside>
            </div>
        </div>
    </section>


    <script>
       
        function showGenre(str) {
		if (str == "") {
		    document.getElementById("txtHint2").innerHTML = "";
		    return;
		} else { 
		    if (window.XMLHttpRequest) {
		        // code for IE7+, Firefox, Chrome, Opera, Safari
		        xmlhttp = new XMLHttpRequest();
		    } else {
		        // code for IE6, IE5
		        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		    }
		    xmlhttp.onreadystatechange = function() {
		        if (this.readyState == 4 && this.status == 200) {
		            document.getElementById("txtHint2").innerHTML = this.responseText;
		        }
		    };
            
		    xmlhttp.open("GET", "load.blade.php?property_category_id="+str,true);
                               
		    xmlhttp.send();
		}
	}
    </script>

@endsection