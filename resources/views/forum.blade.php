@extends('layouts.frontend')

@section('content')

<style type="text/css">
    .status-green{
        position: absolute;
        right: -2px;
        top: -11px;
        width: 12px;
        height: 12px;
        border-radius: 50%;
        border: solid 2px #ffffff;
        background: #1ABC1A;
    }


    .status-red{
        position: absolute;
        right: -2px;
        top: -11px;
        width: 12px;
        height: 12px;
        border-radius: 50%;
        border: solid 2px #ffffff;
        background: #e67e22;
    }

</style>

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
                                    @if($dis->user->experience_point > 499)
                                        <img src="{{ asset('app/images/icon6.jpg') }}" alt="p-badge" style="margin-left: 13px" data-toggle="tooltip" title="Professional Badge" />
                                        <div class="btn btn-xs btn-default" data-toggle="tooltip" data-placement="right" title="Experience Points"> <span class="badge" style="background-color: #3498db;">{{ $dis->user->experience_point }}</span> EP</div>
                                    @else
                                        <img src="{{ asset('app/images/icon5.jpg') }}" alt="s-badge" style="margin-left: 13px" data-toggle="tooltip" title="Starter Badge" />
                                        <div class="btn btn-xs btn-default" data-toggle="tooltip" data-placement="right" title="Experience Points"> <span class="badge" style="background-color: #e67e22;">{{ $dis->user->experience_point }}</span> EP</div>
                                    @endif
                                </div>
                            </div>
                            <div class="posttext pull-left">
                                
                                <h2><span style="color: #697683; font-weight: 300;">{{ $dis->user->name }} : </span> <a href="{{ route('discussion', ['slug' => $dis->slug ]) }} ">{{ str_limit($dis->title, 30) }}</a> 
                            @if($dis->hasBestAnswer())
                                <span class="btn btn-default btn-xs" data-toggle="tooltip" data-placement="top" title="Closed Discussion"><span class="badge" style="padding: 0px 0px;"><div class="status-red">&nbsp;</div></span> Closed</span>
                            @else 
                                <span class="btn btn-default btn-xs" data-toggle="tooltip" data-placement="top" title="Open Discussion"><span class="badge" style="padding: 0px 0px;"><div class="status-green">&nbsp;</div></span> Open</span>
                            @endif
                            
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
                            <div class="views"><img src="{{ asset('app/images/icon4.jpg') }}" alt="img" /> {{ $dis->upvotes->count() }} @if($dis->upvotes->count() < 2) upvote @else upvotes @endif </div>
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

    