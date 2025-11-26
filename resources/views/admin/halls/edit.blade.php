<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">
            Modifier le Hall : {{ $hall->nom }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-xl mx-auto">

            <div class="bg-white dark:bg-gray-800 shadow p-6 rounded">

                <form action="{{ route('admin.halls.update', $hall) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label class="block">Terminal lié</label>
                        <select name="terminal_id"
                                class="w-full p-2 mt-1 border rounded dark:bg-gray-700" required>
                            @foreach($terminals as $t)
                                <option value="{{ $t->id }}" {{ $hall->terminal_id == $t->id ? 'selected' : '' }}>
                                    {{ $t->nom }} ({{ $t->code }})
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="block">Nom</label>
                        <input type="text" name="nom"
                               value="{{ $hall->nom }}"
                               class="w-full p-2 mt-1 border rounded dark:bg-gray-700" required>
                    </div>

                    <div class="mb-4">
                        <label class="block">Type</label>
                        <input type="text" name="type"
                               value="{{ $hall->type }}"
                               class="w-full p-2 mt-1 border rounded dark:bg-gray-700">
                    </div>

                    <div class="flex justify-between">
                        <a href="{{ route('admin.halls.index') }}"
                           class="px-4 py-2 bg-gray-500 text-white rounded">
                            Retour
                        </a>

                        <button class="px-4 py-2 bg-yellow-600 text-white rounded">
                            Mettre à jour
                        </button>
                    </div>

                </form>

            </div>

        </div>
    </div>
</x-app-layout>
