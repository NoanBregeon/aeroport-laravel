<x-app-layout>
    @extends('layouts.app')

@section('content')
<div class="container mx-auto py-6">
    <h1 class="text-2xl font-bold mb-4">
        Terminal : {{ $terminal->nom }}
    </h1>

    <p class="mb-2"><strong>Emplacement :</strong> {{ $terminal->emplacement }}</p>
    <p class="mb-2">
        <strong>Date de mise en service :</strong>
        {{ $terminal->date_mise_en_service?->format('d/m/Y') }}
    </p>

    <div class="flex justify-between items-center mt-6 mb-4">
        <h2 class="text-xl font-semibold">Halls</h2>
        <a href="{{ route('halls.create', ['terminal' => $terminal->id]) }}"
           class="bg-blue-600 text-white px-4 py-2 rounded">
            Ajouter un hall
        </a>
    </div>

    <table class="min-w-full bg-white border">
        <thead>
            <tr>
                <th class="px-4 py-2 border">Nom</th>
                <th class="px-4 py-2 border">Personnel minimum</th>
                <th class="px-4 py-2 border">Nb de portes</th>
                <th class="px-4 py-2 border">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($terminal->halls as $hall)
                <tr>
                    <td class="px-4 py-2 border">{{ $hall->nom }}</td>
                    <td class="px-4 py-2 border text-center">{{ $hall->personnel_minimum }}</td>
                    <td class="px-4 py-2 border text-center">{{ $hall->gates->count() }}</td>
                    <td class="px-4 py-2 border text-center space-x-2">
                        <a href="{{ route('halls.edit', $hall) }}" class="text-yellow-600 underline">
                            Modifier
                        </a>
                        <form action="{{ route('halls.destroy', $hall) }}"
                              method="POST"
                              class="inline"
                              onsubmit="return confirm('Supprimer ce hall ?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 underline">
                                Supprimer
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="px-4 py-4 text-center text-gray-500">
                        Aucun hall pour ce terminal.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="mt-6">
        <a href="{{ route('terminals.index') }}" class="text-blue-600 underline">
            ← Retour à la liste des terminaux
        </a>
    </div>
</div>
@endsection
</x-app-layout>
