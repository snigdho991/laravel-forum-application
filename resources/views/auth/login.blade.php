@extends('layouts.frontend')

@section('content')

<style>
    .postinfobot_2{
        border-bottom: solid 1px #f1f1f1;
        line-height: 50px;
        padding: 0 30px 10px 94px;
    }

    .postinfobot_3{
        border-bottom: dashed 1px #f1f1f1;
        line-height: 50px;
        padding: 0 30px 10px 94px;
    }

    .newtopic input[type=email] {
        border-radius: 2px;
        box-shadow: none;
        border: none;
        background-color: #f1f1f1;
        padding: 20px;
        font-size: 14px;
        color: #989c9e;
        font-family: 'Open Sans Light', sans-serif;
        margin-bottom: 20px;
        height: 50px;
    }

    @media (max-width: 767px) {
        .postreply{
            font-size: 10px;
        }
        
        #password-confirm{
            margin-top: 20px;
        }

        .postinfobot_2 {
            border-bottom: solid 1px #f1f1f1;
            line-height: 50px;
            padding: 0 30px 10px 94px;
            margin-left: 20px;
        }
    }

    @media (min-width: 768px) and (max-width: 991px) {

        .postreply {
            font-size: 10px;
        }
        
        #password-confirm{
            margin-top: 20px;
        }

        .postinfobot_2 {
            border-bottom: solid 1px #f1f1f1;
            line-height: 50px;
            padding: 0 30px 10px 94px;
            margin-left: 20px;
        }

        @media (min-width: 992px) and (max-width: 1200px) {
            #password-confirm{
                margin-top: 20px;
            }
        }
    }
</style>

<section class="content">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 breadcrumbf">
                <a href="#">Join with us</a> 
            </div>
        </div>
    </div>


    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8">

                <!-- POST -->
                <div class="post">
                    <form class="form newtopic" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
                        <div class="postinfotop">
                            <h2>Sign In</h2>
                        </div>

                        <!-- acc section -->
                        <div class="accsection">
                            <div class="acccap">
                                <div class="userinfo pull-left">&nbsp;</div>
                                <div class="posttext pull-left"><h3>Sign in to the forum with existing account</h3></div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="topwrap">
                                <div class="userinfo pull-left">
                                    
                                </div>
                                <div class="posttext pull-left">

                                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                        <input id="email" type="email" class="form-control" name="email" placeholder="Email Address" value="{{ old('email') }}" required autofocus>

                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                        <input id="password" type="password" class="form-control" name="password" placeholder="Password" style="margin-bottom: -16px;" required>

                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    
                                </div>

                                <div class="clearfix"></div>
                            </div>  
                        </div><!-- acc section END -->

                        <div class="postinfobot_3">
                            <div class="notechbox pull-left" style="margin-left: 22px;">
                                <input type="radio" id ="admin" name="loginvalue" style="cursor: pointer;">
                            </div>

                            <div class="pull-left lblfch postreply">
                                <label for="note"> Login as an Admin </label>
                            </div>

                            <div class="pull-right lblfch postreply">
                                <label for="note"> Login as a member </label>
                            </div>

                            <div class="notechbox pull-right" style="margin-left: 22px;">
                                <input type="radio" id="member" name="loginvalue" style="cursor: pointer;">
                            </div>

                            <div class="clearfix"></div>
                        </div>
                        
                        <div class="postinfobot_2">
                            <div class="notechbox pull-left" style="margin-left: 22px;">
                                <input type="checkbox" style="cursor: pointer;" name="remember" {{ old('remember') ? 'checked' : '' }}>
                            </div>

                            <div class="pull-left lblfch postreply">
                                <label for="note"> Remember me </label>
                            </div>

                            <div class="pull-right postreply">
                                
                                <div class="pull-left"><button type="submit" class="btn btn-primary">Sign In</button></div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        
                    </form>


                    <form class="form newtopic" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}
                        <div class="postinfotop">
                            <h2>Sign Up</h2>
                        </div>
                    
                        <!-- acc section -->
                        <div class="accsection">
                            <div class="acccap">
                                <div class="userinfo pull-left">&nbsp;</div>
                                <div class="posttext pull-left"><h3 style="background-color: #697683;">Register to our forum</h3></div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="topwrap">
                                <div class="userinfo pull-left">
                                    
                                </div>
                                <div class="posttext pull-left">
                                    <div class="row">

                                        <div class="col-lg-6 col-md-6{{ $errors->has('reg_name') ? ' has-error' : '' }}">
                                            <input id="name" type="text" placeholder="Name" class="form-control" name="reg_name" value="{{ old('reg_name') }}" required autofocus>

                                            @if ($errors->has('reg_name'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('reg_name') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                        <div class="col-lg-6 col-md-6{{ $errors->has('reg_email') ? ' has-error' : '' }}">
                                            <input id="reg_email" type="email" placeholder="Email Address" class="form-control" name="reg_email" value="{{ old('reg_email') }}" required>

                                            @if ($errors->has('reg_email'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('reg_email') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6{{ $errors->has('reg_password') ? ' has-error' : '' }}">
                                            <input id="reg_password" type="password" placeholder="Password" class="form-control" name="reg_password" required>

                                            @if ($errors->has('reg_password'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('reg_password') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                        <div class="col-lg-6 col-md-6">
                                            <input id="password-confirm" type="password" placeholder="Retype Password" class="form-control" name="reg_password_confirmation" required>
                                        </div>
                                    </div>
                                
                                </div>

                                <div class="clearfix"></div>
                            </div>   
                        </div><!-- acc section END -->

                        <div class="postinfobot_2">
                            <div class="notechbox pull-left" style="margin-left: 22px;">
                                <input type="checkbox" name="note" id="note" style="cursor: pointer;" class="form-control" required="" />
                            </div>

                            <div class="pull-left lblfch postreply">
                                <label for="note"> I agree with the Terms and Conditions.</label>
                            </div>

                            <div class="pull-right postreply">
                                    
                                <div class="pull-left"><button type="submit" class="btn btn-primary">Sign Up</button></div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </form>


                        <div class="postinfotop">
                            <h2>Link social media</h2>
                        </div>
                        <!-- acc section -->
                        <div class="accsection networks">
                            <div class="acccap">
                                <div class="userinfo pull-left">&nbsp;</div>
                                <div class="posttext pull-left">
                                    <div class="htext">
                                        <h3 style="background-color: #697683;">Use your social media accounts to login</h3>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="topwrap">
                                <div class="userinfo pull-left">&nbsp;</div>
                                <div class="posttext pull-left">

                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <a href="{{ route('social.auth', ['provider' => 'facebook']) }}" class="btn btn-fb"><i class="fa fa-facebook"></i> Login With Facebook </a>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <a href="{{ route('social.auth', ['provider' => 'github']) }}" class="btn btn-git" style="background-color: #444;"><i class="fa fa-github"></i> Login With Github </a>                                                       
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <a href="{{ route('social.auth', ['provider' => 'google']) }}" class="btn btn-gp">Link Google + Account</a>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <a href="{{ url('/login') }}" class="btn btn-pin">Link Pinterest Account</a>                                                       
                                        </div>
                                    </div>

                                </div>
                                <div class="clearfix"></div>
                            </div>  
                        </div><!-- acc section END -->
                </div>
                <!-- POST -->


            </div>
            <div class="col-lg-4 col-md-4">

                <!-- -->
                @include('includes.channels')
                <!-- -->
                
                @include('includes.poll-sidebar')

                <!-- -->

                @include('includes.my-sidebar')

            </div>
        </div>
    </div>


</section>

@endsection

    