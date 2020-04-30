<div class="headernav">
    <div class="container">

    @if (Auth::check())
        <div class="row">
                <div class="col-lg-1 col-xs-3 col-sm-2 col-md-2 logo "><a href="{{ route('forum') }}"><img src="{{ asset('app/images/logo.jpg') }}" alt=""  /></a></div>
                <div class="col-lg-3 col-xs-9 col-sm-5 col-md-3 selecttopic">
                    <div class="dropdown">
                        <a data-toggle="dropdown" href="#" >Forum Website</a> <b class="caret"></b>
                        <ul class="dropdown-menu" role="menu">
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">About Us</a></li>
                            <li role="presentation"><a role="menuitem" tabindex="-2" href="#">Contact Us</a></li>

                        </ul>
                    </div>
                </div>

                <div class="col-lg-4 search hidden-xs hidden-sm col-md-3">
                    <div class="wrap">
                        <form action="#" method="post" class="form">
                            <div class="pull-left txt"><input type="text" class="form-control" placeholder="Search Topics"></div>
                            <div class="pull-right"><button class="btn btn-default" type="button"><i class="fa fa-search"></i></button></div>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>

                <div class="col-lg-4 col-xs-12 col-sm-5 col-md-4 avt">
                    <div class="stnt pull-left">                            
                        
                            <a class="btn btn-primary" href="{{ route('discussions.create') }}">Start New Discussion</a>
                        
                    </div>
                    <!-- <div class="env pull-left"><i class="fa fa-envelope"></i></div> -->

                    <div class="avatar pull-left dropdown" style="margin-left: 60px;">
                            @if (!Auth::user()->avatar)
                                <a data-toggle="dropdown" href="#"><img src="{{ asset('avatars/avatar2.png') }}" alt="Image" /></a>
                            @else
                                <a data-toggle="dropdown" href="#"><img src="{{ Auth::user()->avatar }}" alt="Image" /></a>
                            @endif
                        <b class="caret"></b>
                        <div class="status green">&nbsp;</div>
                        <ul class="dropdown-menu" role="menu">
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">My Profile</a></li>
                            <li role="presentation"><a role="menuitem" tabindex="-2" href="{{ url('/logout') }}">Log Out</a></li>
                        </ul>
                    </div>
                    
                    <div class="clearfix"></div>
                </div>
            </div>

    @else

            <div class="row">
                <div class="col-lg-1 col-xs-3 col-sm-2 col-md-2 logo "><a href="{{ route('forum') }}"><img src="{{ asset('app/images/logo.jpg') }}" alt=""  /></a></div>
                <div class="col-lg-3 col-xs-9 col-sm-5 col-md-3 selecttopic">
                    <div class="dropdown">
                        <a data-toggle="dropdown" href="#" >Forum Website</a> <b class="caret"></b>
                        <ul class="dropdown-menu" role="menu">
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="{{ route('join') }}">Create Account</a></li>
                            <li role="presentation"><a role="menuitem" tabindex="-2" href="#">Terms and Conditions</a></li>

                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 search hidden-xs hidden-sm col-md-3">
                    <div class="wrap">
                        <form action="#" method="post" class="form">
                            <div class="pull-left txt"><input type="text" class="form-control" placeholder="Search Topics"></div>
                            <div class="pull-right"><button class="btn btn-default" type="button"><i class="fa fa-search"></i></button></div>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-4 col-xs-12 col-sm-5 col-md-4 avt">
                    <div class="stnt pull-left">                            
                        
                            <a class="btn btn-primary" href="{{ route('join') }}">Join With Us</a>
                        
                    </div>
                    
                    <div class="clearfix"></div>
                </div>
            </div>

    @endif

    </div>
</div>
