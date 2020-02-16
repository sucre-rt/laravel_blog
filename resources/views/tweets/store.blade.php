@extends('layouts.default')

@section('title', 'Created tweet')

@section('content')
  <div class="success">
    <h3>
      投稿が完了しました。
    </h3>
    <a class="btn" href="/tweets">投稿一覧へ戻る</a>
  </div>
@endsection