<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200">
            Modifier le Terminal : {{ $terminal->nom }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white dark:bg-gray-800 shadow sm:rounded-lg p-6">

                <form action="{{ route('admin.terminals.update', $terminal) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label class="block font-medium">Nom</label>
                        <input type="text" name="nom"
                               value="{{ $terminal->nom }}"
                               class="w-full mt-1 p-2 border rounded dark:bg-gray-700"
                               required>
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium">Code</label>
                        <input type="text" name="code"
                               value="{{ $terminal->code }}"
                               class="w-full mt-1 p-2 border rounded dark:bg-gray-700"
                               required>
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium">Emplacement</label>
                        <input type="text" name="emplacement"
                               value="{{ $terminal->emplacement }}"
                               class="w-full mt-1 p-2 border rounded dark:bg-gray-700">
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium">Date mise en service</label>
                        <input type="date" name="date_mise_en_service"
                               value="{{ $terminal->date_mise_en_service }}"
                               class="w-full mt-1 p-2 border rounded dark:bg-gray-700">
                    </div>

                    <div class="flex justify-between">
                        <a href="{{ route('admin.terminals.index') }}"
                           class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">
                            Retour
                        </a>

                        <button class="px-4 py-2 bg-yellow-600 text-white rounded hover:bg-yellow-700">
                            Mettre à jour
                        </button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</x-app-layout>
