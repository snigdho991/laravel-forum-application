<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Discussion;
use App\Reply;
use App\Upvote;
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

        Session::flash('success', 'Discussion created successfully !');

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
        return view('discussions.show')->with('discussion', Discussion::where('slug', $slug)->first())->with('user', auth()->user());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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

    public function reply($id)
    {
        $d = Discussion::find($id);

        $r = Reply::create([
            'user_id'       => Auth::id(),
            'discussion_id' => $id,
            'content'       => request()->reply

        ]);

        Session::flash('success', 'Replied successfully in the discussion !');

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
