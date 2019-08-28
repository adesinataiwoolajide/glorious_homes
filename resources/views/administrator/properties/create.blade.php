@extends('layouts.app')

@section('content')
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> --}}
<div class="clearfix"></div>
<div class="content-wrapper">
    <div class="container-fluid">
        <div class="row pt-2 pb-2">
            <div class="col-sm-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('administrator.dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item">
                        <a href="{{route('property.create')}}">Add Property</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{route('property.index')}}">View Properties</a>
                    </li>
                    @if(auth()->user()->hasRole('Administrator'))
                        <li class="breadcrumb-item"><a href="{{route('property.restore')}}">Restore Deleted Properties</a></li>
                    @endif
                    <li class="breadcrumb-item active" aria-current="page">Add A New Property </li>
                </ol>
            </div>
        </div>
        
        <div class="row">
            
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-header"><i class="fa fa-table"></i> Please Fill The Below Form To Add  New Property</div>
                    <div class="card-body">
                        @include('partials._message')
                        <form action="{{route('property.save')}}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            
                            <div class="form-group row ">
                                <div class="col-sm-3">
                                    <label>Cover Image</label>
                                    <input type="file" name="cover_image" class="form-control form-control-rounded" 
                                    required value="{{old('cover_image')}}" placeholder="">
                                    <span style="color: red">** This Field is Required **</span>
                                    @if ($errors->has('cover_image'))
                                        <div class="alert alert-danger alert-dismissible" role="alert">
                                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                                            <div class="alert-icon contrast-alert">
                                                <i class="fa fa-check"></i>
                                            </div>
                                            <div class="alert-message">
                                                <span><strong>Error!</strong> {{ $errors->first('cover_image') }} !</span>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                               
                                <div class="col-sm-3">
                                    <label>Property Name</label>
                                    <input type="text" name="property_name" class="form-control form-control-rounded" 
                                    required value="{{old('property_name')}}" placeholder="Enter The Property Name">
                                    <span style="color: red">** This Field is Required **</span>
                                    @if ($errors->has('property_name'))
                                        <div class="alert alert-danger alert-dismissible" role="alert">
                                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                                            <div class="alert-icon contrast-alert">
                                                <i class="fa fa-check"></i>
                                            </div>
                                            <div class="alert-message">
                                                <span><strong>Error!</strong> {{ $errors->first('property_name') }} !</span>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                <div class="col-sm-3">
                                    <label>Other Property Images</label>
                                    <input type="file" name="image[]" class="form-control form-control-rounded" 
                                    required value="{{old('image[]')}}" placeholder="" multiple>
                                    <span style="color: red">** This Field is Required **</span>
                                    @if ($errors->has('image'))
                                        <div class="alert alert-danger alert-dismissible" role="alert">
                                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                                            <div class="alert-icon contrast-alert">
                                                <i class="fa fa-check"></i>
                                            </div>
                                            <div class="alert-message">
                                                <span><strong>Error!</strong> {{ $errors->first('image') }} !</span>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                <div class="col-sm-3">
                                    <label>Property Price</label>
                                    <input type="number" name="amount" class="form-control form-control-rounded" 
                                    required placeholder="Enter The Property Price" value="{{old('amount')}}">
                                    <span style="color: red">** This Field is Required **</span>
                                    @if ($errors->has('amount'))
                                        <div class="alert alert-danger alert-dismissible" role="alert">
                                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                                            <div class="alert-icon contrast-alert">
                                                <i class="fa fa-check"></i>
                                            </div>
                                            <div class="alert-message">
                                                <span><strong>Error!</strong> {{ $errors->first('amount') }} !</span>
                                            </div>
                                        </div>
                                    @endif
                                </div>

                                <div class="col-sm-3">
                                    <label>Property Category</label>
                                    <select class="form-control form-control-rounded" name="property_category_id" 
                                        required id="property_category_id" >
                                        <option value=""> -- Select The Category -- </option>
                                        {{-- <option value="{{old('property_category_id')}}">{{old('property_category_id')}} </option> --}}
                                        <option value=""> </option>
                                        @foreach($category as $listcategory)
                                            <option value="{{$listcategory->property_category_id}}"> 
                                                {{$listcategory->property_category_name}}  </option> 
                                        @endforeach
                                    <select>
                                    <span style="color: red">** This Field is Required **</span>
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

                                <div class="col-sm-3">
                                    <label>Property Type</label>
                                    <select class="form-control form-control-rounded" name="property_type_id" 
                                        id="sub" required>
                                        <option value=""> -- Select The Type -- </option>
                                        
                                        @foreach($type as $types)
                                            <option value="{{$types->property_type_id}}"> 
                                                {{$types->property_type_name}}  </option> 
                                        @endforeach
                                       
                                    <select>
                                    <span style="color: red">** This Field is Required **</span>
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

                                <div class="col-sm-3">
                                    <label>Property Owner</label>
                                    <select class="form-control form-control-rounded" name="agent_id" 
                                        required >
                                        @if(auth()->user()->hasPermissionTo('Restore Property') OR 
                                        (Gate::allows('Administrator', auth()->user())))
                                            <option value=""> -- Select The Owner -- </option>
                                            
                                            @foreach($agent as $agents)
                                                <option value="{{$agents->agent_id}}"> 
                                                    {{$agents->agent_name}}  
                                                </option> 
                                            @endforeach
                                        @else 
                                            <option value="{{$age->agent_id}}">{{$age->agent_name}} </option>

                                        @endif
                                    <select>
                                    <span style="color: red">** This Field is Required **</span>
                                    @if ($errors->has('agent_id'))
                                        <div class="alert alert-danger alert-dismissible" role="alert">
                                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                                            <div class="alert-icon contrast-alert">
                                                <i class="fa fa-check"></i>
                                            </div>
                                            <div class="alert-message">
                                                <span><strong>Error!</strong> {{ $errors->first('agent_id') }} !</span>
                                            </div>
                                        </div>
                                    @endif  

                                </div>

                                <div class="col-sm-3">
                                    <label>Property Purpose</label><?php 
                                    $list = array('Rent', 'Lease', 'Sell'); ?>

                                    <select class="form-control form-control-rounded" name="purpose" 
                                        required >
                                       
                                        <option value=""> -- Select The Purpose -- </option>
                                        
                                        @foreach($list as $lists)
                                            <option value="{{$lists}}"> {{$lists}}  </option> 
                                        @endforeach
                                        
                                    <select>
                                    <span style="color: red">** This Field is Required **</span>
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

                                <div class="col-sm-3">
                                    <label> Property Condition</label><?php 
                                    $lis = array('Newly Built', 'Newly Renovated', 'Renovated', 'Dilapitated'); ?>
                                    <select class="form-control form-control-rounded" name="property_condition" 
                                        required >
                                        <option value=""> -- Select The Property Condition -- </option>
                                        
                                        @foreach($lis as $liss)
                                            <option value="{{$liss}}"> {{$liss}}  </option> 
                                        @endforeach
                                        
                                    <select>
                                    <span style="color: red">** This Field is Required **</span>
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



                                <div class="col-sm-3">
                                    <label>Size</label>
                                    <input type="text" name="size" required placeholder="Please Enter The Size" 
                                    class="form-control form-control-rounded" value="{{old('size')}}">
                            
                                    <span style="color: red">** This Field is Required **</span>
                                    @if ($errors->has('size'))
                                        <div class="alert alert-danger alert-dismissible" role="alert">
                                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                                            <div class="alert-icon contrast-alert">
                                                <i class="fa fa-check"></i>
                                            </div>
                                            <div class="alert-message">
                                                <span><strong>Error!</strong> {{ $errors->first('size') }} !</span>
                                            </div>
                                        </div>
                                    @endif  
                                </div>

                                
                                <div class="col-sm-3">
                                    <label>Property State</label>
                                    <select class="form-control form-control-rounded" name="state" 
                                        required onchange="useSelectedItem(this)" id="theStates">
                                        <option value=""> -- Select The State -- </option> 
                                        {{-- <option value="{{old('state')}}">{{old('state')}} </option> --}}
                                        <option value=""></option>
                                        <option value="Adamawa">Abia</option>
                                        <option value="Anambra">Anambra</option>
                                        <option value="Bauchi">Bauchi</option>
                                        <option value="Bayelsa">Bayelsa</option>
                                        <option value="Benue">Benue</option>
                                        <option value="Borno">Borno</option>
                                        <option value="Cross River">Cross River</option>
                                        <option value="Delta">Delta</option>
                                        <option value="Ebonyi">Ebonyi</option>
                                        <option value="Edo">Edo</option>
                                        <option value="Ekiti">Ekiti</option>
                                        <option value="Enugu">Enugu</option>
                                        <option value="Gombe">Gombe</option>
                                        <option value="Imo">Imo</option>
                                        <option value="Jigawa">Jigawa</option>
                                        <option value="Kaduna">Kaduna</option>
                                        <option value="Kano">Kano</option>
                                        <option value="Katsina">Katsina</option>
                                        <option value="Kebbi">Kebbi</option>
                                        <option value="Kogi">Kogi</option>
                                        <option value="Kwara">Kwara</option>
                                        <option value="Lagos">Lagos</option>
                                        <option value="Nasarawa">Nasarawa</option>
                                        <option value="Niger">Niger</option>
                                        <option value="Ogun">Ogun</option>
                                        <option value="Ondo">Ondo</option>
                                        <option value="Osun">Osun</option>
                                        <option value="Oyo">Oyo</option>
                                        <option value="Plateau">Plateau</option>
                                        <option value="Rivers">Rivers</option>
                                        <option value="Sokoto">Sokoto</option>
                                        <option value="Taraba">Taraba</option>
                                        <option value="Yobe">Yobe</option>
                                        <option value="Zamfara">Zamfara</option>
                                        <option value="FCT">FCT</option>
                                    <select>
                                    <span style="color: red">** This Field is Required **</span>
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
                                <div class="col-sm-3">
                                    <label>Property Local Govt</label>
                                    <select class="form-control form-control-rounded" id="locaGv" name="lga" required>
                                        <option value=""> -- Select The LGA -- </option>
                                        <option value="{{old('lga')}}"> {{old('lga')}}</option>
                                    <select>
                                    <span style="color: red">** This Field is Required **</span>
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

                                <div class="col-sm-3">
                                    <label>Property Documents</label>
                                    <select class="form-control form-control-rounded" name="document_id[]" 
                                        required multiple style="height:70px">
                                        <option value=""> -- Select The Documents -- </option>
                                        
                                        @foreach($document as $documents)
                                            <option value="{{$documents->document_name}}"> 
                                                {{$documents->document_name}}  
                                            </option> 
                                        @endforeach
                                    <select>
                                    <span style="color: red">** This Field is Required **</span>
                                    @if ($errors->has('document_id[]'))
                                        <div class="alert alert-danger alert-dismissible" role="alert">
                                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                                            <div class="alert-icon contrast-alert">
                                                <i class="fa fa-check"></i>
                                            </div>
                                            <div class="alert-message">
                                                <span><strong>Error!</strong> {{ $errors->first('document_id[]') }} !</span>
                                            </div>
                                        </div>
                                    @endif  

                                </div>

                                <div class="col-sm-3">
                                    <label>Property Facilities</label>
                                    <select class="form-control form-control-rounded" name="facility_id[]" 
                                        required multiple style="height:70px">
                                        <option value=""> -- Select The Facilities -- </option>
                                        
                                        @foreach($facility as $facilities)
                                            <option value="{{$facilities->facility_name}}"> 
                                                {{$facilities->facility_name}}  
                                            </option> 
                                        @endforeach
                                    <select>
                                    <span style="color: red">** This Field is Required **</span>
                                    @if ($errors->has('facility_id[]'))
                                        <div class="alert alert-danger alert-dismissible" role="alert">
                                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                                            <div class="alert-icon contrast-alert">
                                                <i class="fa fa-check"></i>
                                            </div>
                                            <div class="alert-message">
                                                <span><strong>Error!</strong> {{ $errors->first('facility_id[]') }} !</span>
                                            </div>
                                        </div>
                                    @endif  

                                </div>
                                <div class="col-sm-3">
                                    <label>Property Location</label>
                                    <textarea class="form-control form-control-rounded" name="address" 
                                    placeholder="Enter The Property Location" required> 
                                    </textarea>
                                    <span style="color: red">** This Field is Required **</span>
                                    @if ($errors->has('address'))
                                        <div class="alert alert-danger alert-dismissible" role="alert">
                                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                                            <div class="alert-icon contrast-alert">
                                                <i class="fa fa-check"></i>
                                            </div>
                                            <div class="alert-message">
                                                <span><strong>Error!</strong> {{ $errors->first('address') }} !</span>
                                            </div>
                                        </div>
                                    @endif  

                                </div>
                                
                                <div class="col-sm-3">
                                    <label>Property Description</label>
                                    <textarea class="form-control form-control-rounded" name="description" 
                                    placeholder="Enter Brief Description 
                                    About The Property" required> 
                                    </textarea>
                                    <span style="color: red">** This Field is Required **</span>
                                    @if ($errors->has('description'))
                                        <div class="alert alert-danger alert-dismissible" role="alert">
                                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                                            <div class="alert-icon contrast-alert">
                                                <i class="fa fa-check"></i>
                                            </div>
                                            <div class="alert-message">
                                                <span><strong>Error!</strong> {{ $errors->first('description') }} !</span>
                                            </div>
                                        </div>
                                    @endif  

                                </div>
                                
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-success btn-lg btn-block" style="border:none">
                                    ADD THE PROPERTY</button>
                                </div>
                                
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
       
    </div>
</div>


<a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
@endsection