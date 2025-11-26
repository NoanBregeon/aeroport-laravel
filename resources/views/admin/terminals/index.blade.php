<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200">
            Gestion des Terminaux
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">

            {{-- Message succès --}}
            @if(session('success'))
                <div class="mb-4 p-3 bg-green-100 text-green-800 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <div class="mb-4">
                <a href="{{ route('admin.terminals.create') }}"
                   class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                    + Ajouter un Terminal
                </a>
            </div>

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg p-6">
                <table class="w-full border-collapse">
                    <thead>
                        <tr class="border-b dark:border-gray-700">
                            <th class="py-2 text-left">ID</th>
                            <th class="py-2 text-left">Nom</th>
                            <th class="py-2 text-left">Code</th>
                            <th class="py-2 text-left">Date mise en service</th>
                            <th class="py-2 text-left">Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($terminals as $terminal)
                            <tr class="border-b dark:border-gray-700">
                                <td class="py-2">{{ $terminal->id }}</td>
                                <td>{{ $terminal->nom }}</td>
                                <td>{{ $terminal->code }}</td>
                                <td>{{ $terminal->date_mise_en_service ?? '—' }}</td>
                                <td class="flex gap-2 py-2">
                                    <a href="{{ route('admin.terminals.edit', $terminal) }}"
                                       class="px-3 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600">
                                        Modifier
                                    </a>

                                    <form action="{{ route('admin.terminals.destroy', $terminal) }}"
                                          method="POST"
                                          onsubmit="return confirm('Supprimer ce terminal ?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700">
                                            Supprimer
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="py-4 text-center text-gray-500">
                                    Aucun terminal enregistré.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</x-app-layout>
