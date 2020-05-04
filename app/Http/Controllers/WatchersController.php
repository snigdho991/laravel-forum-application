<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Watcher;

use Auth;
use Session;

class WatchersController extends Controller
{
    public function watch($id)
    {
    	$w = Watcher::create([
    		'user_id'       => Auth::id(),
    		'discussion_id' => $id
    	]);

        $w->user->experience_point += 50;
        $w->user->save();

    	Session::flash('success', 'You are following this discussion from now (+50) !');

        return redirect()->back();
    }

    public function unwatch($id)
    {
        Auth::user()->experience_point -= 50;
        Auth::user()->save();
        
    	$watch = Watcher::where('user_id', Auth::id())->where('discussion_id', $id);
    	$watch->delete();

    	Session::flash('error', 'You are not following this discussion from now (-50) !');

        return redirect()->back();
    }
}
