
@extends('layouts.frontend')

@section('content')

<style>
    .postinfobot .prev {
        width: 95px;
        margin-left: 18px;
        font-size: 12px;
        color: #bdc3c7;
        font-family: 'Open Sans Regular', sans-serif;
    }

    .postinfobot .posted {
        width: 170px;
        margin-left: 18px;
        font-size: 12px;
        color: #bdc3c7;
        font-family: 'Open Sans Regular', sans-serif;
    }

    .paginationforum {
        margin: 10px auto;
        padding: 0;
    }

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
                <div class="col-lg-8 breadcrumbf">
                    <a href="{{ route('forum') }}"><i class="fa fa-home"></i> Home</a> <span class="diviver"> <i class="fa fa-angle-right"></i></span> <a href="{{ route('channel', ['slug' => $discussion->channel->slug ]) }}"><b>{{ $discussion->channel->title }}</b></a> <span class="diviver"> <i class="fa fa-angle-right"></i></span> <a href="{{ route('discussion', ['slug' => $discussion->slug ]) }}">{!! $discussion->title !!}</a>
                </div>
            </div>
        </div>


        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8">

                <!-- DISCUSSION -->
                    <div class="post">
                        <div class="topwrap">
                            <div class="userinfo pull-left">
                                <div class="avatar">
                                    <img title="{{ $discussion->user->name }}" src="{{ $discussion->user->avatar }}" alt="Image" />
                                </div>

                                <div class="icons">
                                    @if($discussion->user->experience_point > 499)
                                        <img src="{{ asset('app/images/icon6.jpg') }}" alt="p-badge" style="margin-left: 13px" data-toggle="tooltip" title="Professional Badge" />
                                        <div class="btn btn-xs btn-default" data-toggle="tooltip" data-placement="right" title="Experience Points"> <span class="badge" style="background-color: #3498db;">{{ $discussion->user->experience_point }}</span> EP</div>
                                    @else
                                        <img src="{{ asset('app/images/icon5.jpg') }}" alt="s-badge" style="margin-left: 13px" data-toggle="tooltip" title="Starter Badge" />
                                        <div class="btn btn-xs btn-default" data-toggle="tooltip" data-placement="right" title="Experience Points"> <span class="badge" style="background-color: #e67e22;">{{ $discussion->user->experience_point }}</span> EP</div>
                                    @endif
                    
                                </div>
                            </div>
                            <div class="posttext pull-left">
                                <h2><span style="color: #697683; font-weight: 300;">{{ $discussion->user->name }} : </span> {!! $discussion->title !!} 
                                    <span style="color: #697683;font-size: 12px; font-weight: bold; ; margin-left: 10px;"><i class="fa fa-reply" style="font-size: 12px; margin-right: 3px;"> </i> {{ $discussion->created_at->diffForHumans() }}
                                    </span>
                        @if (Auth::check())
                            @if(Auth::id() == $discussion->user->id)
                                @if(!$discussion->hasBestAnswer())
                                    <div class="userinfo pull-right" style="margin-top: -23px; margin-right: -46px;">
                                        <a href="{{ route('discussion.edit', ['slug' => $discussion->slug]) }}" class="btn btn-info btn-xs" data-toggle="tooltip" data-placement="left" title="Edit Discussion"><span class="badge"><i class="fa fa-pencil"></i></span> </a>
                                    </div>
                                @endif
                            @endif
                        @endif

                                </h2>
                                <p> @markdown($discussion->content) </p>
                            </div>
                            
                            <div class="clearfix"></div>
                        </div> 

                        <div class="postinfobot">
                        
                            <div class="likeblock pull-left">
                                <img src="{{ asset('app/images/icon4.jpg') }}" alt="" />
                            @if($discussion->is_upvoted_by_auth_user())
                                <a href="{{ route('discussion.unupvote', ['id' => $discussion->id ]) }}" class="btn btn-warning btn-xs" data-toggle="tooltip" title="You upvoted this.">Unupvote <span class="badge">{{ $discussion->upvotes->count() }}</span></a>    
                            @else
                                <a href="{{ route('discussion.upvote', ['id' => $discussion->id ]) }}" class="btn btn-info btn-xs">Upvote <span class="badge">{{ $discussion->upvotes->count() }}</span></a>
                            @endif
                            </div>

                            <div class="posted pull-left"><i class="fa fa-calendar-o"></i> Posted on : {{ $discussion->created_at->toFormatteddatestring() }}
                            </div>

                            <div class="prev pull-left"><i class="fa fa-clock-o" style="font-size: 18px; padding-right: 4px "> </i> {{ $discussion->created_at->toTimeString() }}
                            </div>

                            <div class="likeblock pull-right" style="width: 100px; text-align: right;">
                                @if($discussion->is_being_watched_by_auth_user())

                                    <a href="{{ route('discussion.unwatch', ['id' => $discussion->id]) }}" class="btn btn-danger btn-xs" data-toggle="tooltip" data-placement="left" title="Don't email me for further replies"><span class="badge"><i class="fa fa-th"></i></span> Un-watch</a>

                                @else

                                    <a href="{{ route('discussion.watch', ['id' => $discussion->id]) }}" class="btn btn-success btn-xs" data-toggle="tooltip" data-placement="left" title="Email me when some one replies"><span class="badge"><i class="fa fa-th"></i></span> Watch</a>

                                @endif
                            </div>

                            <div class="likeblock pull-right" style="width: 90px; text-align: right;">
                            @if($discussion->hasBestAnswer())
                                <span class="btn btn-default btn-xs" data-toggle="tooltip" data-placement="left" title="Closed Discussion"><span class="badge" style="padding: 0px 0px;"><div class="status-red">&nbsp;</div></span> Closed</span>
                            @else 
                                <span class="btn btn-default btn-xs" data-toggle="tooltip" data-placement="left" title="Open Discussion"><span class="badge" style="padding: 0px 0px;"><div class="status-green">&nbsp;</div></span> Open</span>
                            @endif
                            </div>

                            <div class="clearfix"></div>
                        </div>

                    </div>
        <!-- DISCUSSION -->

        <!-- BEST ANSWER -->

            @if($best_answer)
                <div class="post beforepagination" data-replyId="{{ $best_answer->id }}">
                        <div class="topwrap">
                            <div class="userinfo pull-left">
                                <div class="avatar">
                                    
                                </div>
                            </div>

                            <div class="posttext pull-left">
                                    <blockquote style="background: #e67e22;color: #fff; font-size: 18px; font-weight: bold;">
                                        <div class="text-center"> Best Answer </div>
                                    </blockquote>
                                    <div class="panel panel-info text-center">
                                        <div class="panel-heading"><img src="{{ $best_answer->user->avatar }}" height="37px" width="37px" alt="img" /> <b>{{ $best_answer->user->name }}</b> 
                                            @if($best_answer->user->experience_point > 499)
                                                <div class="btn btn-xs btn-default" data-toggle="tooltip" data-placement="right" title="Experience Points"> <span class="badge" style="background-color: #3498db;">{{ $best_answer->user->experience_point }}</span> EP</div>
                                            @else 
                                                <div class="btn btn-xs btn-default" data-toggle="tooltip" data-placement="right" title="Experience Points"> <span class="badge" style="background-color: #e67e22;">{{ $best_answer->user->experience_point }}</span> EP</div>
                                            @endif
                                        </div>
                                        <div class="panel-body">{!! $best_answer->content !!}</div>
                                    </div>
                            </div>

                            <div class="clearfix"></div>
                        </div>  

                        <div class="postinfobot">

                    @if (Auth::check())
                            <div class="likeblock pull-left">
                        @if(Auth::user()->likes()->where('reply_id', $best_answer->id)->first())
                            @if (Auth::user()->likes()->where('reply_id', $best_answer->id)->first()->status == 1)
                                <a href="#" class="up like" data-custom-value="true"><i class="fa fa-thumbs-up" data-toggle="tooltip" title="Unlike"></i>
                                    <b data-toggle="tooltip" title="You and {{ App\Like::where('status', 1)->where('reply_id', $best_answer->id)->count() - 1 }} others like.">{{ App\Like::where('status', 1)->where('reply_id', $best_answer->id)->count() }}</b>
                                </a>
                            @else
                                <a href="#" class="up like" data-custom-value="true"><i class="fa fa-thumbs-o-up" data-toggle="tooltip" title="Like"></i>
                                   <b>{{ App\Like::where('status', 1)->where('reply_id', $best_answer->id)->count() }}</b>
                                </a>
                            @endif
                        @else
                            <a href="#" class="up like" data-custom-value="true"><i class="fa fa-thumbs-o-up" data-toggle="tooltip" title="Like"></i>
                                <b>{{ App\Like::where('status', 1)->where('reply_id', $best_answer->id)->count() }}</b>
                            </a>
                        @endif
                                
                        @if(Auth::user()->likes()->where('reply_id', $best_answer->id)->first())
                            @if (Auth::user()->likes()->where('reply_id', $best_answer->id)->first()->status == 0)
                                <a href="#" class="down like" data-custom-value="false"><i class="fa fa-thumbs-down" data-toggle="tooltip" title="Undislike"></i>
                                    <b data-toggle="tooltip" title="You and {{ App\Like::where('status', 0)->where('reply_id', $best_answer->id)->count() - 1 }} others dislike.">{{ App\Like::where('status', 0)->where('reply_id', $best_answer->id)->count() }}</b>
                                </a>
                            @else
                                <a href="#" class="down like" data-custom-value="false"><i class="fa fa-thumbs-o-down" data-toggle="tooltip" title="Disike"></i>
                                    <b>{{ App\Like::where('status', 0)->where('reply_id', $best_answer->id)->count() }}</b>
                                </a>
                            @endif
                        @else
                            <a href="#" class="down like" data-custom-value="false"><i class="fa fa-thumbs-o-down" data-toggle="tooltip" title="Disike"></i>
                                <b>{{ App\Like::where('status', 0)->where('reply_id', $best_answer->id)->count() }}</b>
                            </a>
                        @endif
                            </div>
                    @endif
                            <div class="posted pull-left"><i class="fa fa-calendar-o"></i> Replied on : {{ $best_answer->created_at->toFormatteddatestring() }}
                            </div>

                            <div class="prev pull-left"><i class="fa fa-clock-o" style="font-size: 18px; padding-right: 4px "> </i> {{ $best_answer->created_at->toTimeString() }}
                            </div>

                            <div class="prev pull-right" style="width: 150px; text-align: right;">
                                <i class="fa fa-reply" style="font-size: 18px; padding-right: 4px "> </i> {{ $best_answer->created_at->diffForHumans() }}
                            </div>

                            <div class="clearfix"></div>
                        </div>
                </div>
            @endif
            <!-- BEST ANSWER -->
                    
            <!-- REPLY SECTION -->
                    @php
                       $replies = App\Reply::with('discussion')->where('discussion_id', $discussion->id)->orderBy('created_at', 'desc')->paginate(3); 
                    @endphp
                
                    <div class="paginationforum">                        
                        <div class="pull-left">
                            <ul class="paginationforum">
                                {{ $replies->links() }}
                            </ul>
                        </div>
                        
                        <div class="clearfix"></div>
                    </div>

            @foreach($replies as $reply)
                @if($reply->best_answer == 0)
                    <div class="post" data-replyId="{{ $reply->id }}" style="margin-left: 50px;">
                        <div class="topwrap">
                            <div class="userinfo pull-left">
                                <div class="avatar">
                                    <img title="{{ $reply->user->name }}" src="{{ $reply->user->avatar }}" alt="Image" height="37px" width="37px" />
                                </div>

                                <div class="icons">
                                    @if($reply->user->experience_point > 499)
                                        <img src="{{ asset('app/images/icon6.jpg') }}" alt="p-badge" style="margin-left: 13px" data-toggle="tooltip" title="Professional Badge" />
                                        <div class="btn btn-xs btn-default" data-toggle="tooltip" data-placement="right" title="Experience Points"> <span class="badge" style="background-color: #3498db;">{{ $reply->user->experience_point }}</span> EP</div>
                                    @else
                                        <img src="{{ asset('app/images/icon5.jpg') }}" alt="s-badge" style="margin-left: 13px" data-toggle="tooltip" title="Starter Badge" />
                                        <div class="btn btn-xs btn-default" data-toggle="tooltip" data-placement="right" title="Experience Points"> <span class="badge" style="background-color: #e67e22;">{{ $reply->user->experience_point }}</span> EP</div>
                                    @endif
                                </div>
                            </div>
                            <div class="posttext pull-left">
                                <p><span style="color: #697683;font-size: 12px; font-weight: bold; ;"><i class="fa fa-share" style="font-size: 12px; margin-right: 3px;"> </i> {{ $reply->created_at->diffForHumans() }}
                                    </span> <b>-</b> <span style="color: #363838; font-weight: bold;">{{ $reply->user->name }} : </span>{!! $reply->content !!} </p>
                        @if (Auth::check())
                            @if(Auth::id() == $reply->user->id)
                                @if(!$reply->best_answer)

                                    <a href="{{ route('reply.edit', ['id' => $reply->id]) }}" class="btn btn-warning btn-xs" data-toggle="tooltip" data-placement="right" title="Edit Reply"><span class="badge"><i class="fa fa-edit"></i></span> </a>

                                @endif
                            @endif
                        @endif
                            </div>
                            <div class="clearfix"></div>
                        </div>                              
                        <div class="postinfobot">
                    @if (Auth::check())
                            <div class="likeblock pull-left">
                        @if(Auth::user()->likes()->where('reply_id', $reply->id)->first())
                            @if (Auth::user()->likes()->where('reply_id', $reply->id)->first()->status == 1)
                                <a href="#" class="up like" data-custom-value="true"><i class="fa fa-thumbs-up" data-toggle="tooltip" title="Unlike"></i>
                                    <b data-toggle="tooltip" title="You and {{ App\Like::where('status', 1)->where('reply_id', $reply->id)->count() - 1 }} others like.">{{ App\Like::where('status', 1)->where('reply_id', $reply->id)->count() }}</b>
                                </a>
                            @else
                                <a href="#" class="up like" data-custom-value="true"><i class="fa fa-thumbs-o-up" data-toggle="tooltip" title="Like"></i>
                                   <b>{{ App\Like::where('status', 1)->where('reply_id', $reply->id)->count() }}</b>
                                </a>
                            @endif
                        @else
                            <a href="#" class="up like" data-custom-value="true"><i class="fa fa-thumbs-o-up" data-toggle="tooltip" title="Like"></i>
                                <b>{{ App\Like::where('status', 1)->where('reply_id', $reply->id)->count() }}</b>
                            </a>
                        @endif
                                
                        @if(Auth::user()->likes()->where('reply_id', $reply->id)->first())
                            @if (Auth::user()->likes()->where('reply_id', $reply->id)->first()->status == 0)
                                <a href="#" class="down like" data-custom-value="false"><i class="fa fa-thumbs-down" data-toggle="tooltip" title="Undislike"></i>
                                    <b data-toggle="tooltip" title="You and {{ App\Like::where('status', 0)->where('reply_id', $reply->id)->count() - 1 }} others dislike.">{{ App\Like::where('status', 0)->where('reply_id', $reply->id)->count() }}</b>
                                </a>
                            @else
                                <a href="#" class="down like" data-custom-value="false"><i class="fa fa-thumbs-o-down" data-toggle="tooltip" title="Disike"></i>
                                    <b>{{ App\Like::where('status', 0)->where('reply_id', $reply->id)->count() }}</b>
                                </a>
                            @endif
                        @else
                            <a href="#" class="down like" data-custom-value="false"><i class="fa fa-thumbs-o-down" data-toggle="tooltip" title="Disike"></i>
                                <b>{{ App\Like::where('status', 0)->where('reply_id', $reply->id)->count() }}</b>
                            </a>
                        @endif
                            </div>
                    @endif
                            <div class="posted pull-left"><i class="fa fa-calendar-o"></i> Replied on : {{ $reply->created_at->toFormatteddatestring() }}
                            </div>

                            <div class="prev pull-left"><i class="fa fa-clock-o" style="font-size: 18px; padding-right: 4px "> </i> {{ $reply->created_at->toTimeString() }}
                            </div>

                            <div class="likeblock pull-right" style="width: 155px; text-align: right;">

                            @if(!$best_answer) 
                                @if(Auth::id() == $discussion->user->id)                                       
                                    <a href="{{ route('discussion.best.answer', ['id' => $reply->id]) }}" class="btn btn-success btn-xs" data-toggle="tooltip" data-placement="left" title="This discussion will be closed."><span class="badge"><i class="fa fa-check-circle"></i></span> Mark as best answer</a>

                                @endif
                            @endif

                            </div>

                            <div class="clearfix"></div>
                        </div>
                    </div>
                    @endif
                @endforeach
                
            <!-- REPLY SECTION -->

                <!-- LEAVE REPLY -->

                    <div class="post" style="margin-left: 60px; margin-top: 40px;">
                        @if (Auth::check())
                            
                            <form action="{{ route('discussions.reply', ['id' => $discussion->id ]) }}" class="form" method="post">
                                {{ csrf_field() }}
                                <div class="topwrap">
                                    <div class="userinfo pull-left">
                                        <div class="avatar">
                                            <img src="{{ $user->avatar }}" alt="Image" height="37px" width="37px" />
                                            <div class="status green">&nbsp;</div>
                                        </div>

                                        <div class="icons">
                                            @if($user->experience_point > 499)
                                                <img src="{{ asset('app/images/icon6.jpg') }}" alt="p-badge" style="margin-left: 13px" data-toggle="tooltip" title="Professional Badge" />
                                                <div class="btn btn-xs btn-default" data-toggle="tooltip" data-placement="right" title="Experience Points"> <span class="badge" style="background-color: #3498db;">{{ $user->experience_point }}</span> EP</div>
                                            @else
                                                <img src="{{ asset('app/images/icon5.jpg') }}" alt="s-badge" style="margin-left: 13px" data-toggle="tooltip" title="Starter Badge" />
                                                <div class="btn btn-xs btn-default" data-toggle="tooltip" data-placement="right" title="Experience Points"> <span class="badge" style="background-color: #e67e22;">{{ $user->experience_point }}</span> EP</div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="posttext pull-left">
                                        <div class="textwraper">
                                            <div class="postreply">Leave a Reply</div>
                                            <textarea name="reply" id="reply" placeholder="Type your reply"></textarea>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>                              
                                <div class="postinfobot">

                                    <div class="pull-right postreply">
                                        <div class="pull-left smile"><a></a></div>
                                        <div class="pull-left"><button type="submit" class="btn btn-primary">Post Reply</button></div>
                                        <div class="clearfix"></div>
                                    </div>

                                    <div class="clearfix"></div>
                                </div>
                            </form>
                        @else
                            <div class="text-center" style="padding: 30px;">
                                <h2><a href="{{ route('login') }}" target="_blank" style="color: #3498db;">Sign in</a> to reply.</h2>
                            </div>

                        @endif
                    </div>

                <!-- LEAVE REPLY -->


                </div>
                <div class="col-lg-4 col-md-4">
                    
                    @include('includes.channels')
                    
                    @include('includes.poll-sidebar')

                    @include('includes.admin-sidebar')

                </div>
            </div>
        </div>

    </section>
<!-- 
    <script type="text/javascript" src="{{ asset('app/ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.js') }}"></script>
     -->
    <script type="text/javascript">
        var token = '{{ Session::token() }}';
        var urlLike = '{{ route('like') }}';
    </script>

@endsection

@section('styles')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.css" rel="stylesheet">   

    <!-- <link href="{{ asset('css/summernote.min.css') }}" rel="stylesheet"> -->
    
@stop

@section('scripts')
    <script src="{{ asset('js/summernote.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#reply').summernote({
                "height": 200
            });
        });

    </script>
@stop

            