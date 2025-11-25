<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Si tu as Vite / Tailwind, tu peux décommenter ça --}}
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
            max-width: 420px;
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
        input[type="email"]:focus,
        input[type="password"]:focus {
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
        .actions {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: 0.5rem;
            margin-bottom: 1.25rem;
            font-size: 0.85rem;
        }
        .checkbox-wrapper {
            display: flex;
            align-items: center;
            gap: 0.35rem;
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
        <h1>Connexion</h1>
        <p class="subtitle">Espace d’administration des terminaux / halls / portes.</p>

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

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <label for="email">Adresse e-mail</label>
                <input
                    id="email"
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    required
                    autocomplete="email"
                    autofocus
                >
            </div>

            <div>
                <label for="password">Mot de passe</label>
                <input
                    id="password"
                    type="password"
                    name="password"
                    required
                    autocomplete="current-password"
                >
            </div>

            <div class="actions">
                <div class="checkbox-wrapper">
                    <input id="remember" type="checkbox" name="remember">
                    <label for="remember" style="margin: 0;">Se souvenir de moi</label>
                </div>

                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}">
                        Mot de passe oublié ?
                    </a>
                @endif
            </div>

            <button type="submit">
                Se connecter
            </button>
        </form>

        <div class="bottom-links">
            @if (Route::has('register'))
                Pas encore de compte ?
                <a href="{{ route('register') }}">S’inscrire</a>
            @endif
        </div>
    </main>
</body>
</html>
