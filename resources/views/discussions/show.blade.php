@extends('layouts.frontend')

@section('content')

<style>
    .postinfobot .prev {
        width: 110px;
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
</style>

    <section class="content">

        <div class="container">
            <div class="row">
                <div class="col-lg-8 breadcrumbf">
                    <a href="{{ route('forum') }}"><i class="fa fa-home"></i> Home</a> <span class="diviver"> <i class="fa fa-angle-right"></i></span> <a href="{{ route('channel', ['slug' => $discussion->channel->slug ]) }}">{{ $discussion->channel->title }}</a> <span class="diviver"> <i class="fa fa-angle-right"></i></span> <a href="{{ route('discussion', ['slug' => $discussion->slug ]) }}">{{ $discussion->title }}</a>
                </div>
            </div>
        </div>


        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8">

                    <!-- POST -->
                    <div class="post beforepagination">
                        <div class="topwrap">
                            <div class="userinfo pull-left">
                                <div class="avatar">
                                    <img title="{{ $discussion->user->name }}" src="{{ $discussion->user->avatar }}" alt="Image" />
                                </div>

                                <div class="icons">
                                    <img src="{{ asset('app/images/icon1.jpg') }}" alt="" /><img src="{{ asset('app/images/icon4.jpg') }}" alt="" /><img src="{{ asset('app/images/icon5.jpg') }}" alt="" /><img src="{{ asset('app/images/icon6.jpg') }}" alt="" />
                                </div>
                            </div>
                            <div class="posttext pull-left">
                                <h2><span style="color: #697683; font-weight: 300;">{{ $discussion->user->name }} : </span> {{ $discussion->title }} 
                                    <span style="color: #697683;font-size: 12px; font-weight: bold; ; margin-left: 10px;"><i class="fa fa-reply" style="font-size: 12px; margin-right: 3px;"> </i> {{ $discussion->created_at->diffForHumans() }}
                                    </span>
                                </h2>
                                <p>{{ $discussion->content }}</p>
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

                            <div class="clearfix"></div>
                        </div>
                    </div><!-- POST -->
                    <!-- POST -->
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
                
                    <div class="post" data-replyId="{{ $reply->id }}">
                        <div class="topwrap">
                            <div class="userinfo pull-left">
                                <div class="avatar">
                                    <img title="{{ $reply->user->name }}" src="{{ $reply->user->avatar }}" alt="Image" />
                                </div>

                                <div class="icons">
                                    <img src="images/icon3.jpg" alt="" /><img src="images/icon4.jpg" alt="" /><img src="images/icon5.jpg" alt="" /><img src="images/icon6.jpg" alt="" />
                                </div>
                            </div>
                            <div class="posttext pull-left">
                                <p><span style="color: #697683;font-size: 12px; font-weight: bold; ;"><i class="fa fa-share" style="font-size: 12px; margin-right: 3px;"> </i> {{ $reply->created_at->diffForHumans() }}
                                    </span> <b>-</b> <span style="color: #363838; font-weight: bold;">{{ $reply->user->name }} : </span>{{ $reply->content }}</p>
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

                            <div class="next pull-right">                                        
                                <a href="#"><i class="fa fa-share"></i></a>

                                <a href="#"><i class="fa fa-flag"></i></a>
                            </div>

                            <div class="clearfix"></div>
                        </div>
                    </div>
                @endforeach
                
                    <!-- POST -->
                    <div class="post">
                        <div class="topwrap">
                            <div class="userinfo pull-left">
                                <div class="avatar">
                                    <img src="images/avatar3.jpg" alt="" />
                                    <div class="status red">&nbsp;</div>
                                </div>

                                <div class="icons">
                                    <img src="images/icon3.jpg" alt="" /><img src="images/icon4.jpg" alt="" /><img src="images/icon5.jpg" alt="" /><img src="images/icon6.jpg" alt="" />
                                </div>
                            </div>
                            <div class="posttext pull-left">

                                <blockquote>
                                    <span class="original">Original Posted by - theguy_21:</span>
                                    Did you see that Dove ad pop up in your Facebook feed this year? How about the Geico camel one? 
                                </blockquote>
                                <p>Toronto Mayor Rob Ford does not have a bigger fan than "Anchorman's" Ron Burgundy. In fact, Burgundy wants Ford to be re-elected so much, that he agreed to sing the campaign song Brien. The tune in question ...</p>
                            </div>
                            <div class="clearfix"></div>
                        </div>                              
                        <div class="postinfobot">

                            <div class="likeblock pull-left">
                                <a href="#" class="up"><i class="fa fa-thumbs-up"></i>55</a>
                                <a href="#" class="down"><i class="fa fa-thumbs-o-down"></i>12</a>
                            </div>

                            <div class="prev pull-left">                                        
                                <a href="#"><i class="fa fa-reply"></i></a>
                            </div>

                            <div class="posted pull-left"><i class="fa fa-clock-o"></i> Posted on : 20 Nov @ 9:50am</div>

                            <div class="next pull-right">                                        
                                <a href="#"><i class="fa fa-share"></i></a>

                                <a href="#"><i class="fa fa-flag"></i></a>
                            </div>

                            <div class="clearfix"></div>
                        </div>
                    </div><!-- POST -->



                    <!-- POST -->
                    <div class="post">
                    @if (Auth::check())
                        
                        <form action="{{ route('discussions.reply', ['id' => $discussion->id ]) }}" class="form" method="post">
                            {{ csrf_field() }}
                            <div class="topwrap">
                                <div class="userinfo pull-left">
                                    <div class="avatar">
                                        <img src="{{ $user->avatar }}" alt="Image" />
                                        <div class="status green">&nbsp;</div>
                                    </div>

                                    <div class="icons">
                                        
                                    </div>
                                </div>
                                <div class="posttext pull-left">
                                    <div class="textwraper">
                                        <div class="postreply">Leave a Reply</div>
                                        <textarea name="reply" id="reply" placeholder="Type your message here"></textarea>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>                              
                            <div class="postinfobot">

                                <div class="notechbox pull-left">
                                    <input type="checkbox" name="note" id="note" class="form-control" />
                                </div>

                                <div class="pull-left">
                                    <label for="note"> Email me when some one post a reply</label>
                                </div>

                                <div class="pull-right postreply">
                                    <div class="pull-left smile"><a href="#"><i class="fa fa-smile-o"></i></a></div>
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
                    </div><!-- POST -->


                </div>
                <div class="col-lg-4 col-md-4">
                    
                    @include('includes.channels')
                    
                    @include('includes.poll-sidebar')

                    @include('includes.my-sidebar')

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

            