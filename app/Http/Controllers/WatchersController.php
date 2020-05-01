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
    	Watcher::create([
    		'user_id'       => Auth::id(),
    		'discussion_id' => $id
    	]);

    	Session::flash('success', 'You are following this discussion from now !');

        return redirect()->back();
    }

    public function unwatch($id)
    {
    	$watch = Watcher::where('user_id', Auth::id())->where('discussion_id', $id);
    	$watch->delete();

    	Session::flash('error', 'You are not following this discussion from now !');

        return redirect()->back();
    }
}
