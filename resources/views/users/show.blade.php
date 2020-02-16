@extends('layouts.default')

@section('title', 'Mypage')

@section('content')

  <p>{{ $user->name }}さんの投稿一覧</p>
  @forelse ($tweets as $tweet)
    <div class="content_post" style="background-image: url({{ $tweet->image }});">
      {{ $tweet->text }}
      <span class="name">{{ $user->name }}</span>
    </div>
  @empty
    <p>No tweets yet</p>
  @endforelse
  {{ $tweets->links() }}

@endsection