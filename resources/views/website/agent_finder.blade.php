@extends('layouts.website')

    @section('content')
    <!-- Page Banner Start-->
    <section class="page-banner padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h1 class="text-uppercase">Agent Finder</h1>
                    <p> Search for Agents.</p>
                    <ol class="breadcrumb text-center ">
                        <li><a href="{{route('web.index')}}">Home</a></li>
                        <li><a href="{{route('user.updatepassword')}}">Update Password</a></li>
                        <li><a href="{{route('user.forgot')}}">Forgot Password</a></li>
                        <li><a href="{{route('user.login')}}">User Login</a></li>
                        <li class="active">Password Recovery Form</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
  
    <section id="property" class="padding listing1">
        <div class="container">
            
            <div class="row">
                
                <div class="col-sm-1 col-md-2"></div>
                <div class="col-sm-10 col-md-8">
                    <h2 class="text-uppercase bottom40">Find Our Agent</h2>
                    <form class="callus clearfix border_radius submit_property">
                        <div class="row">
                            <div class="col-sm-6">
                            
                                <div class="single-query form-group bottom20">
                                    <label>State</label>
                                    <select class="form-control form-control-rounded" name="state" 
                                        required onchange="useSelectedItem(this)" id="theStates">
                                        <option value=""> -- Select The State -- </option> 
                                        <option value="{{old('state')}}">{{old('state')}} </option>
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
                            </div>
                            <div class="col-sm-6">
                                <div class="single-query form-group bottom20">
                                    <label>Local Govt</label>
                                    <select class="form-control form-control-rounded" id="locaGv" name="lga" required>
                                        <option value=""> -- Select The Local Govt -- </option>
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
                            </div>
                            <div class="col-sm-12" align="center">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block">FIND AN AGENT </button>
                                </div>
                        </div>
                    </form>

                </div>
            </div> 
        </div>
    </section>
@endsection