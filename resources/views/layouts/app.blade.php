<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Aéroport</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <nav class="site-nav">
        <a href="{{ route('home') }}" class="nav-brand">Accueil</a>
        <div class="nav-links">
            <a href="{{ route('terminals.index') }}">Terminals</a>
            <a href="{{ route('halls.index') }}">Halls</a>
            <a href="{{ route('gates.index') }}">Gates</a>
        </div>
    </nav>

    <main class="site-main">
        @if(session('status'))
            <div class="flash">{{ session('status') }}</div>
        @endif

        @yield('content')
    </main>
</body>
</html>
