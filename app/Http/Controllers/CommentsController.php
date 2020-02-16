<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Comment;
use App\Tweet;

class CommentsController extends Controller
{
    public function store(Request $request, Tweet $tweet) {
       $this->validate($request, [
           'text' => 'required',
           'tweet_id' => 'required|exists:tweets,id',
           'user_id' => 'required|exists:users,id'
       ]);

       if (Auth::check()) {
           $user = \Auth::user();
           
        //    $comment = new Comment([
        //        'text' => $request->text,
        //        'user_id' => $request->user_id,
        //        'tweet_id' => $request->tweet_id
        //    ]);
        //    $comment->save();
        $params = $request->all();
        Comment::create($params);
           
           return redirect()->action('TweetsController@show', $tweet);
       } else {
           return redirect('/');
       }
    }
}
