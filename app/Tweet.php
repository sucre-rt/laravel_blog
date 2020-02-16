<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use App\Tweet;
// use App\Comment;
// use App\User;


class Tweet extends Model
{
    //
    protected $fillable = ['text', 'image'];

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function comments() {
        return $this->hasMany('App\Comment');
    }
}
