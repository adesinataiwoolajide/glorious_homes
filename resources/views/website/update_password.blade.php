@extends('layouts.website')

    @section('content')
    <!-- Page Banner Start-->
    <section class="page-banner padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h1 class="text-uppercase">Password Recovery</h1>
                    <p> Password Retrieve Form.</p>
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
  
    <section id="login" class="padding">
        <div class="container">
            <h3 class="hidden">hidden</h3>
            <div class="row">
                    
                <div class="col-md-12 text-center">
                    @include('partials._message')
                    <div class="profile-login">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#user_login" aria-controls="user_login" role="tab" data-toggle="tab">Update Password </a></li>
                            <li role="presentation"><a href="#user_registration" aria-controls="user_registration" role="tab" data-toggle="tab">Recover Password</a></li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content padding_half">
                            <div role="tabpanel" class="tab-pane fade in active" id="user_login">
                                <div class="agent-p-form">
                                    <form class="callus clearfix">
                                        <div class="single-query col-sm-12 form-group">
                                            <input type="text" class="keyword-input" placeholder="Full Name" required>
                                        </div>
                                        <div class="single-query col-sm-12 form-group">
                                            <input type="text" class="keyword-input" placeholder="Email Address">
                                        </div>
                                        <div class="single-query col-sm-12 form-group">
                                            <input type="password" class="keyword-input" placeholder="Password">
                                        </div>
                                        <div class="single-query col-sm-12 form-group">
                                            <input type="password" class="keyword-input" placeholder="Confirm  Password" >
                                        </div>
                                        <div class="search-form-group white col-sm-12 form-group text-left">
                                            <div class="check-box-2"><i><input type="checkbox" name="check-box"></i>
                                        </div>
                                        <span>Receive Newsletter</span>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                                            <div class="query-submit-button">
                                                <input type="submit" value="Creat an Account" class="btn-slide">
                                            </div>
                                        </div>
                                    </form>
                                    
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="user_registration">
                                <div class="agent-p-form">
                                    <form action="#" class="callus clearfix">
                                        <div class="single-query form-group col-sm-12">
                                            <input type="text" class="keyword-input" placeholder="username">
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="col-sm-6">
                                                    {{-- <div class="search-form-group white form-group text-left">
                                                        <div class="check-box-2"><i><input type="checkbox" name="check-box"></i></div>
                                                        <span>Remember Me</span>
                                                    </div> --}}
                                                </div>
                                                <div class="col-sm-6 text-right">
                                                    <a href="{{route('user.login')}}" class="lost-pass">Already Have an Account?</a>
                                                </div>

                                            </div>
                                        </div><br>
                                        <div class=" col-sm-12">
                                            <input type="submit" value="retrieve password" class="btn-slide border_radius"> 
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection