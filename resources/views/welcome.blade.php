@extends('layouts.frontend')

@section('content')

<section class="content">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 breadcrumbf">
                <a href="#">Multiple Login</a> 
            </div>
        </div>
    </div>


    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8">



                <!-- POST -->
                <div class="post">
                    
                        <div class="postinfotop">
                            <h2>Multiple Login</h2>
                        </div>

                        <!-- acc section -->
                        <div class="accsection">
                            <div class="acccap">
                                <div class="userinfo pull-left">&nbsp;</div>
                                <div class="posttext pull-left text-center"><h3>Link Social Networks and Login to Forum</h3></div>
                                <div class="clearfix"></div>
                            </div>
                            
                        </div><!-- acc section END -->

                        <!-- acc section -->
                        <div class="accsection networks">
                            <div class="acccap">
                                <div class="userinfo pull-left">&nbsp;</div>
                                <div class="posttext pull-left">
                                    
                                    
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
                    
                </div><!-- POST -->






            </div>
            <div class="col-lg-4 col-md-4">

                <!-- -->
                @include('includes.channels')
                <!-- -->
                
                @include('includes.poll-sidebar')


            </div>
        </div>
    </div>

</section>

@endsection

    