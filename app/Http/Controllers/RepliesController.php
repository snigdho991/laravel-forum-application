<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reply;
use App\Like;
use Session;
use Auth;

class RepliesController extends Controller
{
    public function likeReply(Request $request)
    {
    	$reply_id = $request['replyId'];
    	$is_like  = $request['isLike'] === 'true';
    	$update   = false;

    	$reply = Reply::find($reply_id);
    	if(!$reply){
    		return null;
    	}

    	$user = Auth::user();
    	$like = $user->likes()->where('reply_id', $reply_id)->first();
    	if($like){
    		$already_like = $like->status;
    		$update = true;
    		if($already_like == $is_like){
    			if ($already_like == 0) {
	    			Session::flash('info', 'Reply Un-Disliked !');
	    		} else {
	    			Session::flash('warning', 'Reply Unliked !');
	    		}

    			$like->delete();
    			return null;
    		}
    	} else {
    		$like = new Like();
    	}

    	$like->status   = $is_like;
    	$like->user_id  = $user->id;
    	$like->reply_id = $reply_id;

    	if ($update) {
    		$like->update();
    		if ($like->status == 0) {
    			Session::flash('error', 'Reply Disliked !');
    			// return redirect()->back();
    		} else {
    			Session::flash('success', 'Reply Liked !');
    			//return redirect()->back();
    		}
    		
    	} else {
    		$like->save();
    		if ($like->status == 0) {
    			Session::flash('error', 'Reply Disliked !');
    			//return redirect()->back();
    		} else {
    			Session::flash('success', 'Reply Liked !');
    			//return redirect()->back();
    		}
    	}

    	return null;
    }
}
