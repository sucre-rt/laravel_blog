<!DOCTYPE html>
<html lang="ja">

  <head>
    <meta charset="utf=8">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="/css/setting.css">
    <link href="/css/style.css" rel="stylesheet" type="text/css">
  </head>

  <body>
    <div class="header__bar row">
      <h1 class="grid-6"><a href="/">PicTweet</a></h1>
      @if (Auth::check())
        <div class="user_nav grid-6">

          <span>{{ $user->name }}
            <ul class="user__info">
              <li>
                <a href="/users/{{ $user->id }}">マイページ</a>
                <a href="#" onclick="document.getElementById('logout-form').submit();">ログアウト</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
              </li>
            </ul>
          </span>
          <a class="new" href="/tweets/new">投稿する</a>
        </div>
      @else
        <div class="grid-6 user_nav">
          <a href="{{ route('login') }}">ログイン</a>
          <a href="{{ route('register') }}">新規登録</a>
        </div>
      @endif
    </div>
    <div class="contents row" >
      @yield('content')
    </div>
  </body>

</html>