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


    public function best_answer($id)
    {
        $reply = Reply::find($id);

        if(Auth::check()){
            if(Auth::id() == $reply->discussion->user->id){
                if(!$reply->discussion->hasBestAnswer()){

                    $reply->best_answer = 1;
                    $reply->save();

                    $reply->user->experience_point += 30;
                    $reply->user->save();

                    Session::flash('success', 'Reply has been marked as best answer !');
                } else {
                    Auth::user()->experience_point -= 10;
                    Auth::user()->save();

                    Session::flash('error', 'You can not change the best answer of closed discussion (-10) !');
                    return redirect()->route('discussion', ['slug' => $reply->discussion->slug ]); 
                }
            } else {
                Auth::user()->experience_point -= 30;
                Auth::user()->save();

                Session::flash('error', 'You can not mark reply as best of other\'s discussion (-30) !');
                return redirect()->route('discussion', ['slug' => $reply->discussion->slug ]); 

            }
        }

        return redirect()->back();
    }

    public function edit($id)
    {
        $reply = Reply::find($id);
        return view('reply.edit')->with('reply', $reply);
    }

    public function update(Request $request, $id)
    {
        $reply = Reply::find($id);

        if(Auth::check()){
            if(Auth::id() == $reply->user_id){
                if(!$reply->best_answer){

                    $reply->content = $request->content;
                    $reply->save();

                    Session::flash('info', 'Reply updated successfully !');
                    return redirect()->route('discussion', ['slug' => $reply->discussion->slug ]);  
                } else {
                    Auth::user()->experience_point -= 5;
                    Auth::user()->save();

                    Session::flash('error', 'You can not update your best answer (-5) !');
                    return redirect()->route('discussion', ['slug' => $reply->discussion->slug ]); 
                }

            } else {
                Auth::user()->experience_point -= 15;
                Auth::user()->save();

                Session::flash('error', 'You can not update other\'s reply (-15) !');
                return redirect()->route('discussion', ['slug' => $reply->discussion->slug ]); 
            }
        }   
    }
}
