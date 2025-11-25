@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto py-8">
        <h1 class="text-2xl font-bold mb-6">Gestion des halls</h1>

        @if (session('status'))
            <div class="mb-4 p-3 rounded bg-green-100 text-green-800">
                {{ session('status') }}
            </div>
        @endif

        {{-- Formulaire de création d'un hall --}}
        <div class="mb-8 p-4 bg-white shadow rounded">
            <h2 class="text-lg font-semibold mb-4">Ajouter un hall</h2>

            <form method="POST" action="{{ route('halls.store') }}" class="space-y-4">
                @csrf

                <div>
                    <label class="block text-sm font-medium mb-1" for="terminal_id">
                        Terminal
                    </label>
                    <select name="terminal_id" id="terminal_id" class="w-full border rounded px-3 py-2">
                        @foreach ($terminals as $terminal)
                            <option value="{{ $terminal->id }}">
                                {{ $terminal->code }} - {{ $terminal->nom }}
                            </option>
                        @endforeach
                    </select>
                    @error('terminal_id')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1" for="nom">
                        Nom du hall
                    </label>
                    <input type="text" name="nom" id="nom" class="w-full border rounded px-3 py-2"
                           value="{{ old('nom') }}">
                    @error('nom')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1" for="personnel_minimum">
                        Personnel minimum
                    </label>
                    <input type="number" name="personnel_minimum" id="personnel_minimum"
                           class="w-full border rounded px-3 py-2"
                           value="{{ old('personnel_minimum', 0) }}">
                    @error('personnel_minimum')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit"
                        class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                    Créer
                </button>
            </form>
        </div>

        {{-- Liste des halls --}}
        <div class="p-4 bg-white shadow rounded">
            <h2 class="text-lg font-semibold mb-4">Liste des halls</h2>

            @if ($halls->isEmpty())
                <p>Aucun hall pour le moment.</p>
            @else
                <table class="w-full text-left text-sm">
                    <thead>
                        <tr class="border-b">
                            <th class="py-2">ID</th>
                            <th class="py-2">Terminal</th>
                            <th class="py-2">Nom</th>
                            <th class="py-2">Personnel minimum</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($halls as $hall)
                            <tr class="border-b">
                                <td class="py-2">{{ $hall->id }}</td>
                                <td class="py-2">
                                    {{ $hall->terminal?->code }} - {{ $hall->terminal?->nom }}
                                </td>
                                <td class="py-2">{{ $hall->nom }}</td>
                                <td class="py-2">{{ $hall->personnel_minimum }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection
