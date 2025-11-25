<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>@yield('title', 'Aéroport')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Tailwind via CDN, simple et suffisant pour l’éval --}}
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-900">

    {{-- Barre de navigation simple --}}
    <nav class="bg-gray-900 text-white">
        <div class="max-w-6xl mx-auto px-4 py-3 flex items-center justify-between">
            <a href="{{ route('terminals.index') }}" class="font-semibold text-lg">
                Gestion des terminaux
            </a>

            <div class="flex items-center gap-4">
                @auth
                    <span class="text-sm">
                        Connecté en tant que <strong>{{ Auth::user()->name }}</strong>
                    </span>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button
                            type="submit"
                            class="text-sm bg-red-600 hover:bg-red-700 px-3 py-1 rounded"
                        >
                            Déconnexion
                        </button>
                    </form>
                @endauth

                @guest
                    <a href="{{ route('login') }}" class="text-sm hover:underline">Connexion</a>
                    <a href="{{ route('register') }}" class="text-sm hover:underline">Inscription</a>
                @endguest
            </div>
        </div>
    </nav>

    <main class="max-w-6xl mx-auto px-4 py-8">
        @if (session('status'))
            <div class="mb-4 p-3 rounded bg-green-100 text-green-800 text-sm">
                {{ session('status') }}
            </div>
        @endif

        @yield('content')
    </main>

</body>
</html>
