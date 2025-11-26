<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold">Espace Opérateur</h2>
    </x-slot>

    <div class="p-6">
        <h3 class="text-lg font-bold">Liste des Terminaux</h3>
        @foreach($terminals as $terminal)
            <p>{{ $terminal->nom }}</p>
        @endforeach

        <h3 class="text-lg font-bold mt-4">Liste des Halls</h3>
        @foreach($halls as $hall)
            <p>{{ $hall->nom }}</p>
        @endforeach

        <h3 class="text-lg font-bold mt-4">Liste des Gates</h3>
        @foreach($gates as $gate)
            <p>{{ $gate->nom }}</p>
        @endforeach
    </div>
</x-app-layout>
