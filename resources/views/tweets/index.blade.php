@extends('layouts.default')

@section('title', 'Tweets')

@section('content')


  @forelse ($tweets as $tweet)
    <div class="content_post" style="background-image: url({{ $tweet->image }});">
      <div class="btn-list"> 
        <a href="/tweets/{{ $tweet->id }}" class="show" method="get">詳細</a>   
        @if (Auth::check() && $user->id == $tweet->user_id)
          <a href="/tweets/{{$tweet->id}}/edit" class="edit" method="get">編集</a>
          <a href="#" class="del" data-id="{{ $tweet->id }}">削除</a>
          <form method="post" action="{{ url('/tweets', $tweet->id) }}" id="form_{{ $tweet->id }}">
            {{ csrf_field() }}
            {{ method_field('delete') }}
          </form>
        @endif
      </div>
      {{ $tweet->text }}
      <span class="name">
        <a href="">
          <span>投稿者</span>{{ $tweet->user->name }}
        </a>
      </span>
    </div>
  @empty
    <p>No tweets yet</p>
  @endforelse
  {{ $tweets->links() }}
  <script src="/js/main.js"></script>

@endsection