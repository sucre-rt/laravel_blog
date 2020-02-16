@extends('layouts.default')

@section('title', 'New tweet')

@section('content')

  <form method="post" action="{{ url('/tweets') }}">
    {{ csrf_field() }}
    <h3>
      投稿する
    </h3>
    
    <input placeholder="Image Url" type="text" name="image" value="{{ old('image') }}">
    @if ($errors->has('image'))
      <span class="error">{{ $errors->first('image') }}</span>
    @endif

    <textarea cols="30" name="text" placeholder="text" rows="10">{{ old('text') }}</textarea>
    @if ($errors->has('text'))
      <span class="errors">{{ $errors->first('text') }}</span>
    @endif

    <input type="submit" value="SENT">

  </form>

@endsection