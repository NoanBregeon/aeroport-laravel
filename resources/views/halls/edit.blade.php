<x-app-layout>
    @extends('layouts.app')

@section('content')
<div class="container mx-auto py-6">
    <h1 class="text-2xl font-bold mb-4">
        Modifier le hall {{ $hall->nom }}
    </h1>

    <form action="{{ route('halls.update', $hall) }}" method="POST" class="max-w-lg">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block mb-1 font-semibold" for="nom">Nom</label>
            <input type="text" name="nom" id="nom"
                   value="{{ old('nom', $hall->nom) }}"
                   class="border rounded px-3 py-2 w-full">
            @error('nom')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label class="block mb-1 font-semibold" for="personnel_minimum">
                Personnel minimum
            </label>
            <input type="number" name="personnel_minimum" id="personnel_minimum"
                   value="{{ old('personnel_minimum', $hall->personnel_minimum) }}"
                   class="border rounded px-3 py-2 w-full" min="0">
            @error('personnel_minimum')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit"
                class="bg-blue-600 text-white px-4 py-2 rounded">
            Enregistrer
        </button>
    </form>

    <div class="mt-4">
        <a href="{{ route('terminals.show', $hall->terminal_id) }}" class="text-blue-600 underline">
            ← Retour au terminal
        </a>
    </div>
</div>
@endsection
</x-app-layout>
