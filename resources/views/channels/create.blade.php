@extends('layouts.frontend')

@section('content')

<section class="content">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 breadcrumbf">
                <a href="{{ route('channels.create') }}">Administrator Tools</a> 
            </div>
        </div>
    </div>


    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8">

                @include('includes.error')

                <!-- POST -->
                <div class="post">
                    <form action="{{ route('channels.store') }}" class="form newtopic" method="post">
                        {{ csrf_field() }}
                        <div class="postinfotop">
                            <h2 class="text-center">Create New Channel</h2>
                        </div>

                        <div class="topwrap">
                                <div class="userinfo pull-left">
                                    
                                </div>
                                <div class="posttext pull-left">
                                    <div class="row">
                                        
                                    </div>
                                    <div>
                                        <label>Channel Name :</label> <input type="text" name="title" placeholder="Enter Channel Name" class="form-control" />
                                    </div>

                                    <div>
                                        <button class="btn btn-success" type="submit">Save Channel</button>
                                    </div>
                                    <div class="row">
                                        
                                    </div>

                                </div>
                                <div class="clearfix"></div>
                            </div>


                        <!-- acc section -->
                        
                        <!-- acc section END -->
                    </form>
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

    