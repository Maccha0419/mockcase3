<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>COACHTECH</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    @yield('css')
</head>

<body>
    <header class="header">
        <div class="header__inner">
            <div class="header-utilities">
            @if (request()->is('login'))
                <a href="{{URL::to('/')}}">
                    <img src="{{asset('/img/logo.svg')}}" class="header__logo" alt="ロゴ">
                </a>
            @elseif (request()->is('register'))
                <a href="{{URL::to('/')}}">
                    <img src="{{asset('/img/logo.svg')}}" class="header__logo" alt="ロゴ">
                </a>
            @elseif(request()->is('purchase/address/*'))
            @elseif (request()->is('sell'))
            @else
                <a href="{{URL::to('/')}}">
                    <img src="{{asset('/img/logo.svg')}}" class="header__logo" alt="ロゴ">
                </a>
                <form class="header__search" action="/search" method="get">
                    @csrf
                    <input name="search" type="text" value="" placeholder="なにをお探しですか？">
                </form>
                @if (Auth::check())
                <nav>
                    <ul class="header-nav">
                        <li class="header-nav__item">
                            <form class="form" action="/logout" method="post">
                                @csrf
                                <button class="header__logout-button">ログアウト</button>
                            </form>
                        </li>
                        <li class="header-nav__item">
                            <a class="header-nav__link" href="/mypage">マイページ</a>
                        </li>
                    </ul>
                </nav>
                @endif
                @if (!Auth::check())
                <nav>
                    <ul class="header-nav">
                        <li class="header-nav__item">
                            <a class="header-nav__link" href="/login">ログイン</a>
                        </li>
                        <li class="header-nav__item">
                            <a class="header-nav__link" href="/register">会員登録</a>
                        </li>
                    </ul>
                </nav>
                @endif
                <form class="header__sell" action="/sell" method="get">
                    <button class="header__sell-button" type="submit">出品</button>
                </form>
            @endif
            </div>
        </div>
    </header>
    <main>
        @yield('content')
    </main>
</body>

</html>