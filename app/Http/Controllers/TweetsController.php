<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Tweet;

class TweetsController extends Controller
{
    public function index() {
        $user = \Auth::user();
        $tweets = Tweet::latest()->paginate(5);
        return view('tweets.index')->with([
            'tweets' => $tweets,
            'user' => $user
        ]);
    }

    public function new() {
        $user = \Auth::user();
        return view('tweets.new')->with('user', $user);
    }

    public function store(Request $request) {
        $this->validate($request, [
            'image' => 'required',
            'text' => 'required'
        ]);

        $user = \Auth::user();
        $tweet = new Tweet(
            ['text' => $request->text,
            'image' => $request->image]);
        $user->tweets()->save($tweet);
        return view('tweets.store')->with('user', $user);
    }

    public function destroy(Tweet $tweet) {
        $user = \Auth::user();
        if ($user->id === $tweet->user_id) {
            $tweet->delete();
            return redirect('/');
        } else {
            return redirect('/');
        }
    }

    public function edit(Tweet $tweet) {
        $user = \Auth::user();
        if ($user->id === $tweet->user_id) {
            return view('tweets.edit')->with([
                'tweet' => $tweet,
                'user' => $user
            ]);
        } else {
            return redirect('/');
        }
    }

    public function update(Request $request, Tweet $tweet) {
        $this->validate($request, [
            'image' => 'required',
            'text' => 'required'
        ]);
        $user = \Auth::user();
        if ($user->id === $tweet->user_id) {
            $tweet->text = $request->text;
            $tweet->image = $request->image;
            $tweet->save();
            return redirect('/');
        } else {
            return redirect('/');
        }
    }

    public function show(Tweet $tweet) {
        if (Auth::check()) {
            $user = Auth::user();
            $comments = $tweet->comments;
            return view('tweets.show')->with([
                'tweet' => $tweet,
                'user' => $user,
                'comments' => $comments
            ]);
        } else {
            $comments = $tweet->comments;
            return view('tweets.show')->with([
                'tweet' => $tweet,
                'user' => $user,
                'comments' => $comments
            ]);
        }
    }

}
