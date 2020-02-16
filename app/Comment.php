<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use App\Tweet;
// use App\User;
// use App\Comment;

class Comment extends Model
{
    protected $fillable = ['text', 'tweet_id', 'user_id'];

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function tweet() {
        return $this->belongsTo('App\Tweet');
    }
}
