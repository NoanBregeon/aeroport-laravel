<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Aéroport</title>
</head>
<body>
    <nav>
        <a href="{{ route('home') }}">Accueil</a> |
        <a href="{{ route('terminals.index') }}">Terminals</a> |
        <a href="{{ route('halls.index') }}">Halls</a> |
        <a href="{{ route('gates.index') }}">Gates</a>
    </nav>

    <main>
        @if(session('status'))
            <div>{{ session('status') }}</div>
        @endif

        @yield('content')
    </main>
</body>
</html>
