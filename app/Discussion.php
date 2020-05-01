<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Discussion extends Model
{
    protected $fillable = ['title', 'content', 'user_id', 'channel_id', 'slug'];

    public function channel()
    {
    	return $this->belongsTo('App\Channel');
    }

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function replies()
    {
    	return $this->hasMany('App\Reply');
    }

    public function upvotes()
    {
        return $this->hasMany('App\Upvote');
    }

    public function is_upvoted_by_auth_user()
    {
        $id = Auth::id();
        
        $voters = array();

        foreach ($this->upvotes as $upvote) {
            array_push($voters, $upvote->user_id);
        }

        if(in_array($id, $voters)){
            return true;
        } else {
            return false;
        }
    }


    public function watchers()
    {
        return $this->hasMany('App\Watcher');
    }


    public function is_being_watched_by_auth_user()
    {
        $id = Auth::id();

        $watchers_id = array();

        foreach ($this->watchers as $wch) {
            array_push($watchers_id, $wch->user_id);
        }

        if (in_array($id, $watchers_id)) {
            return true;
        } else {
            return false;
        }
    }
}
