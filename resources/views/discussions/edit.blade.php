@extends('layouts.frontend')

@section('content')

    <section class="content">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 breadcrumbf">
                <a href="{{ route('forum') }}"><i class="fa fa-home"></i> Home</a> <span class="diviver"> <i class="fa fa-angle-right"></i></span> <a href="{{ route('discussion.edit', ['slug' => $discussion->slug]) }}">Edit Discussion</a>
            </div>
        </div>
    </div>


    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8">

                @include('includes.error')

                <!-- POST -->
                <div class="post">

                    <form action="{{ route('discussion.update', ['slug' => $discussion->slug]) }}" class="form newtopic" method="post">
                        {{ csrf_field() }}

                        <div class="postinfotop">
                            <h2 class="text-center">Update Existing Disscussion</h2>
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
                                            <input type="text" name="title" placeholder="Enter Disscussion Title" value="{{ $discussion->title }}" class="form-control" />
                                        </div>
                                    </div>

                                    <div>
                                        <label for="channel">Picked Channel :</label> <b>(Non editable) </b>
                                        <select name="channel_id" id="channel_id" class="form-control" >
                                            @foreach($channels as $channel)
                                                <option value="{{ $channel->id }}"  disabled=""
                                                @if($discussion->channel_id == $channel->id)
                                                    selected 
                                                @endif>{{ $channel->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div>
                                        <label for="content">Ask a Question :</label> 
                                        <textarea name="content" cols="15" rows="40" id="content" class="form-control" placeholder="Enter Disscussion Content">{{ $discussion->content }}</textarea>
                                    </div>

                                    <div>
                                        <button class="btn btn-success" type="submit">Save Disscussion Changes</button>
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

@section('styles')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.css" rel="stylesheet">   

    <!-- <link href="{{ asset('css/summernote.min.css') }}" rel="stylesheet"> -->
    
@stop

@section('scripts')
    <script src="{{ asset('js/summernote.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#content').summernote({
                "height": 300
            });
        });

    </script>
@stop
