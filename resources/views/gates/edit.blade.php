<x-app-layout>
    <div class="container mx-auto py-6">
        <h1 class="text-2xl font-bold mb-4">
            Modifier la porte {{ $gate->nom }}
            (Hall {{ $gate->hall->nom }} — Terminal {{ $gate->hall->terminal->nom }})
        </h1>

        <form action="{{ route('gates.update', $gate) }}" method="POST" class="max-w-lg">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block mb-1 font-semibold" for="nom">Nom</label>
                <input type="text" name="nom" id="nom"
                       value="{{ old('nom', $gate->nom) }}"
                       class="border rounded px-3 py-2 w-full">
                @error('nom')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block mb-1 font-semibold" for="capacite_max">
                    Capacité maximale
                </label>
                <input type="number" min="0" name="capacite_max" id="capacite_max"
                       value="{{ old('capacite_max', $gate->capacite_max) }}"
                       class="border rounded px-3 py-2 w-full">
                @error('capacite_max')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4 flex items-center gap-2">
                <input type="checkbox" name="ouverte" id="ouverte"
                       value="1" {{ old('ouverte', $gate->ouverte) ? 'checked' : '' }}>
                <label for="ouverte" class="font-semibold">Porte ouverte</label>
            </div>

            <button type="submit"
                    class="bg-blue-600 text-white px-4 py-2 rounded">
                Enregistrer
            </button>
        </form>

        <div class="mt-4">
            <a href="{{ route('terminals.show', $gate->hall->terminal_id) }}"
               class="text-blue-600 underline">
                ← Retour au terminal
            </a>
        </div>
    </div>
</x-app-layout>
