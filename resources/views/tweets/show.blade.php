@extends('layouts.default')

@section('title', 'Tweets')

@section('content')

  <div class="content_post" style="background-image: url({{ $tweet->image }});">
    @if (Auth::check() && $user->id == $tweet->user_id)
      <div class="btn-list">
        <a href="/tweets/{{$tweet->id}}/edit" class="edit" method="get">編集</a>
        <a href="#" class="del" data-id="{{ $tweet->id }}">削除</a>
        <form method="post" action="{{ url('/tweets', $tweet->id) }}" id="form_{{ $tweet->id }}">
          {{ csrf_field() }}
          {{ method_field('delete') }}
        </form>
      </div>
    @endif
      {{ $tweet->text }}
      <span class="name">
        <a href="/users/{{ $tweet->user_id }}">
          <span>投稿者</span>{{ $tweet->user_id }}
        </a>
      </span>
  </div>
  <div class="container"> 
    <!-- ここからフォーム -->
    @if (Auth::check())
      <form method="post" action="{{ action('CommentsController@store', $tweet) }}">
        {{ csrf_field() }}
        <textarea cols="30" name="text" placeholder="コメントする" rows="2">{{ old('text') }}</textarea>
        <input type="hidden" name="tweet_id"  value="{{ $tweet->id }}">
        <input type="hidden" name="user_id" value="{{ $user->id }}">
        <input type="submit" value="SENT">
      </form>
      <div class="comments">   
      <h4>＜コメント一覧＞</h4>
        @forelse ($comments as $comment)
          <p>
            <strong><a href="{{ action('UsersController@show', $comment->user->id) }}">{{ $comment->user->name }}</a>：</strong>
            {{ $comment->text }}
          </p>
        @empty
          <p>No comments yet</p>
        @endforelse
      </div>
    @endif
  </div>

@endsection