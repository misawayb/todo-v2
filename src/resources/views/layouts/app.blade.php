<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo</title>
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    @yield('css')
</head>

<body>
    <header class="header">
        <div class="header__top">
            <a class="header__logo" href="/">Todo</a>
            <nav>
                <a class="header__nav" href="/categories">
                カテゴリ一覧
                </a>
            </nav>
        </div>

        <div class="header__bottom">
            @if(session('message'))
            <div class="header__bottom-green">{{ session('message')  }}</div>
            @endif
            @if($errors -> any())
            <div class="header__bottom-red">
                @foreach ( $errors ->all() as $error )
                {{ $error }}
                @endforeach
            </div>
            @endif
        </div>
    </header>

    <main>
        @yield('content')
    </main>
</body>

</html>