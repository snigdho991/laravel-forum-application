@extends('layouts.frontend')

@section('content')

    <section class="content">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-xs-12 col-md-8">
                    <div class="pull-left">
                        <ul class="paginationforum">
                            {{ $discussions->links() }}
                        </ul>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>


        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8">
                    <!-- POST -->
                @foreach($discussions as $dis)
                    <div class="post">
                        <div class="wrap-ut pull-left">
                            <div class="userinfo pull-left">
                                <div class="avatar">
                                    <img title="{{ $dis->user->name }}" src="{{ $dis->user->avatar }}" alt="Image" />
                                </div>

                                <div class="icons">
                                    <img src="{{ asset('app/images/icon2.jpg') }}" alt="" /><img src="{{ asset('app/images/icon4.jpg') }}" alt="" /><img src="{{ asset('app/images/icon5.jpg') }}" alt="" /><img src="{{ asset('app/images/icon6.jpg') }}" alt="" />
                                </div>
                            </div>
                            <div class="posttext pull-left">
                                
                                <h2><span style="color: #697683; font-weight: 300;">{{ $dis->user->name }} : </span> <a href="{{ route('discussion', ['slug' => $dis->slug ]) }} ">{{ str_limit($dis->title, 40) }}</a>
                                    <span style="color: #697683;font-size: 12px; font-weight: bold; ; margin-left: 10px;"><i class="fa fa-hand-o-right" style="font-size: 12px; margin-right: 3px;"> </i> <a href="{{ route('channel', ['slug' => $dis->channel->slug ]) }}" style="color: #697683; font-size: 12px; font-weight: bold;">{{ $dis->channel->title }} </a>
                                    </span>
                                </h2>
                                    
                                <p>{{ str_limit($dis->content, 120) }}</p>
                                
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="postinfo pull-left">
                            <div class="comments">
                                <div class="commentbg">
                                    {{ $dis->replies->count() }} @if ($dis->replies->count() < 2 )
                                        Reply @else
                                        Replies
                                    @endif
                                    <div class="mark"></div>
                                </div>

                            </div>
                            <div class="views"><img src="{{ asset('app/images/icon4.jpg') }}" alt="img" /> {{ $dis->upvotes->count() }} @if( $dis->upvotes->count() < 2) upvote @else upvotes @endif </div>
                            <div class="time"><i class="fa fa-clock-o"></i> {{ $dis->created_at->diffForHumans() }}</div>                                    
                        </div>
                        <div class="clearfix"></div>
                    </div><!-- POST -->
                @endforeach
                </div>
                <div class="col-lg-4 col-md-4">
                    
                    @include('includes.channels')
                    
                    @include('includes.poll-sidebar')

                    @include('includes.my-sidebar')

                </div>
            </div>
        </div>


    </section>

@endsection

    