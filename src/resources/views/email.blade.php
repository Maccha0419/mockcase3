<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>COACHTECH</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/email.css') }}">
    @yield('css')
</head>

<body>
    <header class="header">a
    </header>
    <main>
        <div class="email__content">
            <div class="email__left">
                <form class="user-search" action="/search" method="get">
                @csrf
                    <input name="keyword" type="text" value="@if (isset( $keyword )) {{$keyword}} @endif" placeholder="">
                </form>
                <table class="user-table">
                    <tr class="user__row-theme">
                        <th class="user__name">ユーザー名</th>
                        <th class="user__email">メールアドレス</th>
                    </tr>
                    @foreach ($users as $user)
                    <tr class="user__row-item">
                        <td class="user__name-item">{{$user->name}}</td>
                        <td class="user__name-item">{{$user->email}}</td>
                    </tr>
                    @endforeach
                </table>
            </div>
            <div class="email__right">
                <div class="email__inner">
                    <form action="/admin/email" class="email__form" method="post">
                        @csrf
                        <ul class="email-nav">
                            <li class="email-nav__item">
                                <button class="mail-submit">送信</button>
                            </li>
                            <li class="email-nav__item">削除</li>
                        </ul>
                        <textarea class="email__form-content" name="content" id="" cols="30" rows="10"></textarea>
                    </form>
                </div>
            </div>
        </div>
    </main>
</body>

</html>