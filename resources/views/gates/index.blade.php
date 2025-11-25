@extends('layouts.app')

@section('content')
    <div class="max-w-5xl mx-auto py-8">
        <h1 class="text-2xl font-bold mb-6">Gestion des portes</h1>

        @if (session('status'))
            <div class="mb-4 p-3 rounded bg-green-100 text-green-800">
                {{ session('status') }}
            </div>
        @endif

        {{-- Formulaire de création d'une porte --}}
        <div class="mb-8 p-4 bg-white shadow rounded">
            <h2 class="text-lg font-semibold mb-4">Ajouter une porte</h2>

            <form method="POST" action="{{ route('gates.store') }}" class="space-y-4">
                @csrf

                <div>
                    <label class="block text-sm font-medium mb-1" for="hall_id">
                        Hall
                    </label>
                    <select name="hall_id" id="hall_id" class="w-full border rounded px-3 py-2">
                        @foreach ($halls as $hall)
                            <option value="{{ $hall->id }}">
                                {{ $hall->terminal?->code }} - {{ $hall->nom }}
                            </option>
                        @endforeach
                    </select>
                    @error('hall_id')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1" for="nom">
                        Nom de la porte
                    </label>
                    <input type="text" name="nom" id="nom" class="w-full border rounded px-3 py-2"
                           value="{{ old('nom') }}">
                    @error('nom')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium mb-1" for="capacite_max">
                            Capacité max
                        </label>
                        <input type="number" name="capacite_max" id="capacite_max"
                               class="w-full border rounded px-3 py-2"
                               value="{{ old('capacite_max', 0) }}">
                        @error('capacite_max')
                            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium mb-1" for="capacite">
                            Capacité actuelle
                        </label>
                        <input type="number" name="capacite" id="capacite"
                               class="w-full border rounded px-3 py-2"
                               value="{{ old('capacite', 0) }}">
                        @error('capacite')
                            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="flex items-center space-x-2">
                    <input type="checkbox" name="ouverte" id="ouverte"
                           class="rounded border-gray-300"
                           {{ old('ouverte') ? 'checked' : '' }}>
                    <label for="ouverte" class="text-sm">
                        Porte ouverte
                    </label>
                </div>

                <button type="submit"
                        class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                    Créer
                </button>
            </form>
        </div>

        {{-- Liste des portes --}}
        <div class="p-4 bg-white shadow rounded">
            <h2 class="text-lg font-semibold mb-4">Liste des portes</h2>

            @if ($gates->isEmpty())
                <p>Aucune porte pour le moment.</p>
            @else
                <table class="w-full text-left text-sm">
                    <thead>
                        <tr class="border-b">
                            <th class="py-2">ID</th>
                            <th class="py-2">Terminal</th>
                            <th class="py-2">Hall</th>
                            <th class="py-2">Nom</th>
                            <th class="py-2">Ouverte</th>
                            <th class="py-2">Capacité / Max</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($gates as $gate)
                            <tr class="border-b">
                                <td class="py-2">{{ $gate->id }}</td>
                                <td class="py-2">
                                    {{ $gate->hall?->terminal?->code }}
                                </td>
                                <td class="py-2">
                                    {{ $gate->hall?->nom }}
                                </td>
                                <td class="py-2">{{ $gate->nom }}</td>
                                <td class="py-2">
                                    {{ $gate->ouverte ? 'Oui' : 'Non' }}
                                </td>
                                <td class="py-2">
                                    {{ $gate->capacite }} / {{ $gate->capacite_max }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection
