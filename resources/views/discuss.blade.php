@extends('layouts.frontend')

@section('content')

    <section class="content">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 breadcrumbf">
                <a href="{{ route('forum') }}">Home</a> / <a href="{{ route('discussions.create') }}">Start New Discussion</a> 
            </div>
        </div>
    </div>


    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8">

                @include('includes.error')

                <!-- POST -->
                <div class="post">

                    <form action="{{ route('discussions.store') }}" class="form newtopic" method="post">
                        {{ csrf_field() }}

                        <div class="postinfotop">
                            <h2 class="text-center">Create New Disscussion</h2>
                        </div>

                        <div class="topwrap">
                                <div class="userinfo pull-left">
                                    
                                </div>
                                <div class="posttext pull-left">
                                    <div class="row">
                                        
                                    </div>

                                    <div>
                                        <label for="title">Disscussion Title :</label> 
                                        <div>
                                            <input type="text" name="title" placeholder="Enter Disscussion Title" class="form-control" />
                                        </div>
                                    </div>

                                    <div>
                                        <label for="channel">Pick a Channel :</label> 
                                        <select name="channel_id" id="channel_id" class="form-control" >
                                                <option value="" disabled selected>Select a Chaneel</option>
                                            @foreach($channels as $channel)
                                                <option value="{{ $channel->id }}">{{ $channel->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div>
                                        <label for="content">Ask a Question :</label> 
                                        <textarea name="content" cols="35" rows="15" id="content" class="form-control" placeholder="Enter Disscussion Content"></textarea>
                                    </div>

                                    <div>
                                        <button class="btn btn-success" type="submit">Create Disscussion</button>
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

                @include('includes.channels')
                
                @include('includes.poll-sidebar')

            </div>
        </div>
    </div>

</section>

@endsection
