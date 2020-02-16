<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Tweet;

class UsersController extends Controller
{
    //
    public function show(User $user) {
        $tweets = Tweet::where('user_id', $user->id)->latest()->paginate(5);;
        return view('users.show')->with([
            'user' => $user,
            'tweets' => $tweets
            ]);
    }
}
