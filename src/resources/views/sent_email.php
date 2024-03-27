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
            <div class="email-from">
                <label for="from" class="email-from__label">from</label>
                <p class="email-from__address" id=""from></p>
            </div>
            <div class="email-subject">
                <label for="subject" class="email-subject__label">from</label>
                <p class="email-subject__address" id="subject"></p>
            </div>
            <div class="email-subject">
                a
            </div>
        </div>
    </main>
</body>

</html>