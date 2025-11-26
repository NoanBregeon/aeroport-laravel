<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">Ajouter un Hall</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-xl mx-auto">

            <div class="bg-white dark:bg-gray-800 shadow p-6 rounded">
                <form action="{{ route('admin.halls.store') }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label class="block">Terminal lié</label>
                        <select name="terminal_id"
                                class="w-full p-2 mt-1 border rounded dark:bg-gray-700" required>
                            <option value="">Sélectionner…</option>
                            @foreach($terminals as $t)
                                <option value="{{ $t->id }}">{{ $t->nom }} ({{ $t->code }})</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="block">Nom</label>
                        <input type="text" name="nom"
                               class="w-full p-2 mt-1 border rounded dark:bg-gray-700" required>
                    </div>

                    <div class="mb-4">
                        <label class="block">Type</label>
                        <input type="text" name="type"
                               placeholder="Départ / Arrivée…"
                               class="w-full p-2 mt-1 border rounded dark:bg-gray-700">
                    </div>

                    <div class="flex justify-between">
                        <a href="{{ route('admin.halls.index') }}"
                           class="px-4 py-2 bg-gray-500 text-white rounded">
                            Retour
                        </a>
                        <button class="px-4 py-2 bg-blue-600 text-white rounded">
                            Enregistrer
                        </button>
                    </div>

                </form>
            </div>

        </div>
    </div>
</x-app-layout>
