<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Discussion;
use App\Reply;
use App\User;
use App\Upvote;

use Notification;
use Session;
use Auth;

class DiscussionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('discuss');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title'      => 'required|max:500',
            'channel_id' => 'required',
            'content'    => 'required'
        ]);

        
        $discussion = Discussion::create([
            'title'      => $request->title,
            'channel_id' => $request->channel_id,
            'content'    => $request->content,
            'user_id'    => Auth::id(),
            'slug'       => str_slug($request->title)
        ]);

        $discussion->user->experience_point += 25;
        $discussion->user->save();

        Session::flash('success', 'Discussion created successfully (+25) !');

        return redirect()->route('discussion', ['slug' => $discussion->slug ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $discussion = Discussion::where('slug', $slug)->first();

        $best = $discussion->replies()->where('best_answer', 1)->first();

        return view('discussions.show')->with('discussion', $discussion)                         
                                       ->with('user', auth()->user())
                                       ->with('best_answer', $best);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $discussion = Discussion::where('slug', $slug)->first();
        return view('discussions.edit')->with('discussion', $discussion);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $discussion = Discussion::where('slug', $slug)->first();

        if(Auth::check()){
            if(Auth::id() == $discussion->user_id){
                if(!$discussion->hasBestAnswer()){
                    $discussion->title   = $request->title;
                    $discussion->slug    = str_slug($request->title);
                    $discussion->content = $request->content;
                    $discussion->save();

                    Session::flash('info', 'Discussion updated successfully !');
                    return redirect()->route('discussion', ['slug' => $discussion->slug ]);  
                } else {
                    Auth::user()->experience_point -= 5;
                    Auth::user()->save();

                    Session::flash('error', 'You can not update closed discussion (-5) !');
                    return redirect()->route('discussion', ['slug' => $discussion->slug ]); 
                }

            } else {
                Auth::user()->experience_point -= 15;
                Auth::user()->save();

                Session::flash('error', 'You can not update other\'s discussion (-15) !');
                return redirect()->route('discussion', ['slug' => $discussion->slug ]); 
            }
        }   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    //Admin Tools

    public function delete($slug)
    {
        $discussion = Discussion::where('slug', $slug)->first();

        $discussion->delete();

        Auth::user()->experience_point += 10;
        Auth::user()->save();

        Session::flash('warning', 'Discussion deleted successfully (+10) !');
        return redirect()->route('forum');
    }

    public function reply($id)
    {
        $d = Discussion::find($id);
        
        $r = Reply::create([
            'user_id'       => Auth::id(),
            'discussion_id' => $id,
            'content'       => request()->reply
        ]);

        $r->user->experience_point += 20;
        $r->user->save();

        $watchers = array();

        foreach ($d->watchers as $watcher) {
            array_push($watchers, User::find($watcher->user_id));
        }


        Notification::send($watchers, new \App\Notifications\NewReplyAdded($d, $r));


        Session::flash('success', 'Replied successfully in this discussion (+20) !');

        return redirect()->back();
    }


    public function upvote($id)
    {
        Upvote::create([
            'discussion_id' => $id,
            'user_id'       => Auth::id()
        ]);

        Session::flash('success', 'Discussion upvoted successfully !');

        return redirect()->back();
    }

    public function unupvote($id)
    {
        $upvote = Upvote::where('discussion_id', $id)->where('user_id', Auth::id())->first();
        $upvote->delete();

        Session::flash('warning', 'Discussion unupvoted successfully !');

        return redirect()->back();
    }
}
