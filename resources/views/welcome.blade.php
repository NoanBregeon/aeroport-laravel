<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name', 'Laravel') }}</title>
        <!-- keep existing fonts / styles -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @endif
    </head>
    <body>
        <div style="padding:2rem;">
            <h1>{{ config('app.name', 'Laravel') }}</h1>
            <p>Bienvenue — accédez aux listes :</p>
            <ul>
                <li><a href="{{ route('terminals.index') }}">Terminals</a></li>
                <li><a href="{{ route('halls.index') }}">Halls</a></li>
                <li><a href="{{ route('gates.index') }}">Gates</a></li>
            </ul>
        </div>
    </body>
</html>
