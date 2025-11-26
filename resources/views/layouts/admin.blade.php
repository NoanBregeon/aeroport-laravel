<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Administration</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100 min-h-screen flex">

    <!-- Sidebar -->
    <aside class="w-64 bg-gray-900 text-white min-h-screen p-4 flex flex-col">

        <h2 class="text-xl font-bold mb-8">Admin</h2>

        <nav class="space-y-2 flex-1">

            {{-- DASHBOARD --}}
            <a href="{{ route('admin.dashboard') }}"
               class="block px-3 py-2 rounded transition
               {{ request()->routeIs('admin.dashboard') ? 'bg-gray-800' : 'hover:bg-gray-700' }}">
                Dashboard
            </a>

            {{-- TERMINAUX --}}
            <a href="{{ route('admin.terminals.index') }}"
               class="block px-3 py-2 rounded transition
               {{ request()->routeIs('admin.terminals.*') ? 'bg-gray-800' : 'hover:bg-gray-700' }}">
                Terminaux
            </a>

            {{-- HALLS --}}
            <a href="{{ route('admin.halls.index') }}"
               class="block px-3 py-2 rounded transition
               {{ request()->routeIs('admin.halls.*') ? 'bg-gray-800' : 'hover:bg-gray-700' }}">
                Halls
            </a>

            {{-- GATES --}}
            <a href="{{ route('admin.gates.index') }}"
               class="block px-3 py-2 rounded transition
               {{ request()->routeIs('admin.gates.*') ? 'bg-gray-800' : 'hover:bg-gray-700' }}">
                Gates
            </a>

        </nav>

        <!-- Footer / logout -->
        <div class="mt-6 border-t border-gray-700 pt-4">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="w-full text-left px-3 py-2 rounded hover:bg-red-600 transition">
                    Déconnexion
                </button>
            </form>
        </div>

    </aside>

    <!-- Contenu principal -->
    <main class="flex-1 p-8">
        @yield('content')
    </main>

</body>
</html>
