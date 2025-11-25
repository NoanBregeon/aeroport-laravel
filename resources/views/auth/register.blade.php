<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Inscription</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}

    <style>
        body {
            font-family: system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
            background-color: #0f172a;
            color: #e5e7eb;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            margin: 0;
        }
        .card {
            background-color: #020617;
            padding: 2rem;
            border-radius: 0.75rem;
            width: 100%;
            max-width: 460px;
            box-shadow: 0 25px 50px -12px rgba(15,23,42,0.75);
            border: 1px solid #1f2937;
        }
        .card h1 {
            font-size: 1.5rem;
            margin-bottom: 0.25rem;
        }
        .card p.subtitle {
            font-size: 0.9rem;
            color: #9ca3af;
            margin-bottom: 1.5rem;
        }
        label {
            display: block;
            font-size: 0.9rem;
            margin-bottom: 0.25rem;
        }
        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 0.6rem 0.75rem;
            border-radius: 0.5rem;
            border: 1px solid #374151;
            background-color: #020617;
            color: #e5e7eb;
            font-size: 0.95rem;
            margin-bottom: 0.75rem;
        }
        input:focus {
            outline: 2px solid #38bdf8;
            outline-offset: 1px;
            border-color: #38bdf8;
        }
        .errors {
            background-color: #7f1d1d;
            border: 1px solid #fecaca;
            color: #fee2e2;
            padding: 0.75rem;
            border-radius: 0.5rem;
            font-size: 0.85rem;
            margin-bottom: 1rem;
        }
        button[type="submit"] {
            width: 100%;
            padding: 0.75rem;
            border-radius: 0.5rem;
            border: none;
            background: linear-gradient(to right, #22c55e, #16a34a);
            color: #ecfdf5;
            font-weight: 600;
            font-size: 0.95rem;
            cursor: pointer;
        }
        button[type="submit"]:hover {
            filter: brightness(1.05);
        }
        a {
            color: #38bdf8;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
        .bottom-links {
            margin-top: 1rem;
            text-align: center;
            font-size: 0.85rem;
            color: #9ca3af;
        }
    </style>
</head>
<body>
    <main class="card">
        <h1>Inscription</h1>
        <p class="subtitle">Créer un compte pour gérer l’aéroport.</p>

        {{-- Affichage des erreurs de validation --}}
        @if ($errors->any())
            <div class="errors">
                <ul style="padding-left: 1.2rem; margin: 0;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <label for="name">Nom complet</label>
                <input
                    id="name"
                    type="text"
                    name="name"
                    value="{{ old('name') }}"
                    required
                    autofocus
                    autocomplete="name"
                >
            </div>

            <div>
                <label for="email">Adresse e-mail</label>
                <input
                    id="email"
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    required
                    autocomplete="email"
                >
            </div>

            <div>
                <label for="password">Mot de passe</label>
                <input
                    id="password"
                    type="password"
                    name="password"
                    required
                    autocomplete="new-password"
                >
            </div>

            <div>
                <label for="password_confirmation">Confirmation du mot de passe</label>
                <input
                    id="password_confirmation"
                    type="password"
                    name="password_confirmation"
                    required
                    autocomplete="new-password"
                >
            </div>

            <button type="submit">
                Créer mon compte
            </button>
        </form>

        <div class="bottom-links">
            Déjà un compte ?
            <a href="{{ route('login') }}">Se connecter</a>
        </div>
    </main>
</body>
</html>
