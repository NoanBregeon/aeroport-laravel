<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">Gestion des Halls</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">

            @if(session('success'))
                <div class="mb-4 p-3 bg-green-100 text-green-800 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <div class="mb-4">
                <a href="{{ route('admin.halls.create') }}"
                   class="px-4 py-2 bg-blue-600 text-white rounded">
                    + Ajouter un Hall
                </a>
            </div>

            <div class="bg-white dark:bg-gray-800 shadow p-6 rounded">
                <table class="w-full border-collapse">
                    <thead>
                        <tr class="border-b">
                            <th class="py-2 text-left">ID</th>
                            <th class="py-2">Nom</th>
                            <th class="py-2">Type</th>
                            <th class="py-2">Terminal</th>
                            <th class="py-2 text-left">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($halls as $hall)
                            <tr class="border-b">
                                <td class="py-2">{{ $hall->id }}</td>
                                <td>{{ $hall->nom }}</td>
                                <td>{{ $hall->type ?? '—' }}</td>
                                <td>{{ $hall->terminal->nom }}</td>

                                <td class="py-2 flex gap-2">
                                    <a href="{{ route('admin.halls.edit', $hall) }}"
                                       class="px-3 py-1 bg-yellow-500 text-white rounded">
                                        Modifier
                                    </a>

                                    <form method="POST"
                                          action="{{ route('admin.halls.destroy', $hall) }}"
                                          onsubmit="return confirm('Supprimer ce hall ?');">
                                        @csrf
                                        @method('DELETE')
                                        <button class="px-3 py-1 bg-red-600 text-white rounded">
                                            Supprimer
                                        </button>
                                    </form>
                                </td>

                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="py-4 text-center text-gray-500">
                                    Aucun hall enregistré.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</x-app-layout>
