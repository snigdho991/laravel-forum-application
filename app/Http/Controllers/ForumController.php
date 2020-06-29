<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

use App\Discussion;
use App\Watcher;
use App\Channel;
use Auth;

class ForumController extends Controller
{
    public function index()
    {

        switch (request('filter')) {
            case 'me':
                $results = Discussion::where('user_id', Auth::id())->paginate(5);
                break;

            case 'open':
                $unanswered = array();

                foreach (Discussion::all() as $d) {
                    if (!$d->hasBestAnswer()) {
                        array_push($unanswered, $d);
                    }
                }

                $results = new Paginator($unanswered, 5);
                break;

            case 'close':
                $answered = array();

                foreach (Discussion::all() as $d) {
                    if ($d->hasBestAnswer()) {
                        array_push($answered, $d);
                    }
                }

                $results = new Paginator($answered, 5);
                break;

            case 'watchlist':
                $watchlist = array();

                foreach (Discussion::all() as $di) {
                    if ($di->is_being_watched_by_auth_user()) {
                        array_push($watchlist, $di);
                    }
                }

                $results = new Paginator($watchlist, 5);
                break;

            case 'upvoted':
                $upvoted = array();

                foreach (Discussion::all() as $dis) {
                    if ($dis->is_upvoted_by_auth_user()) {
                        array_push($upvoted, $dis);
                    }
                }

                $results = new Paginator($upvoted, 5);
                break;

            default:
                $results = Discussion::orderBy('created_at', 'desc')->paginate(5);
                break;
        }

        return view('forum')->with(['discussions' => $results]);
    }

    public function search()
    {
        $results = Discussion::where('title', 'like', '%' . request('query') . '%')->paginate(5);
        return view('forum')->with(['discussions' => $results]);
    }

    public function channel($slug)
    {
    	$channel = Channel::where('slug', $slug)->first();

    	return view('channel')->with('discussions', $channel->discussions()->paginate(3))->with('cha', $channel);
    }

}
