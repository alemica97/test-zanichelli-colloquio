<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>@yield('title')</title>
</head>
<body>
    <header>
        <div class="container d-flex align-items-center justify-content-between px-4">
            <h2>Test Zanichelli</h2>
            <a href="/users">Vai alla lista degli utenti</a>
        </div>
    </header>
    <main>
        <div id="app">
            @yield('content')
        </div>
    </main>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>