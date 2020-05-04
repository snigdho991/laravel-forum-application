@extends('layouts.frontend')

@section('content')

    <section class="content">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 breadcrumbf">
                <a href="{{ route('forum') }}"><i class="fa fa-home"></i> Home</a> <span class="diviver"> <i class="fa fa-angle-right"></i></span> <a href="{{ route('reply.edit', ['id' => $reply->id]) }}">Edit Reply</a>
            </div>
        </div>
    </div>


    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8">

                @include('includes.error')

                <!-- POST -->
                <div class="post">

                    <form action="{{ route('reply.update', ['id' => $reply->id]) }}" class="form newtopic" method="post">
                        {{ csrf_field() }}

                        <div class="postinfotop">
                            <h2 class="text-center">Update Your Reply</h2>
                        </div>

                        <div class="topwrap">
                                <div class="userinfo pull-left">
                                    
                                </div>
                                <div class="posttext pull-left">
                                    <div class="row">
                                        
                                    </div>
                                    
                                    <div>
                                        <label for="content">Existing Reply :</label> 
                                        <textarea name="content" cols="15" rows="40" id="content" class="form-control" placeholder="Enter Disscussion Content">{{ $reply->content }}</textarea>
                                    </div>

                                    <div>
                                        <button class="btn btn-success" type="submit">Save Reply Changes</button>
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
