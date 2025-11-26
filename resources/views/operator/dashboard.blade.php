@extends('layouts.operator')

@section('content')
<h1 class="text-2xl font-bold mb-6">Panel Opérateur</h1>

@foreach($terminals as $terminal)
    <div class="bg-white p-5 rounded-lg shadow mb-6">
        <h2 class="text-xl font-semibold">{{ $terminal->nom }}</h2>
        <p class="text-gray-600">Emplacement : {{ $terminal->emplacement }}</p>

        @foreach($terminal->halls as $hall)
            <div class="mt-4 p-4 border rounded">
                <h3 class="font-bold">Hall : {{ $hall->nom }}</h3>

                <!-- Modification min personnel -->
                <form method="POST"
                      action="{{ route('operator.halls.personnel', $hall) }}"
                      class="flex items-center gap-2 mt-2">
                    @csrf
                    @method('PATCH')

                    <input type="number" name="min_personnel" class="border p-1 rounded"
                           value="{{ $hall->min_personnel }}">

                    <button class="px-3 py-1 bg-blue-600 text-white rounded">
                        Modifier
                    </button>
                </form>

                <!-- Gates -->
                @foreach($hall->gates as $gate)
                    <div class="mt-3 p-3 border rounded flex justify-between items-center">
                        <span>Porte : <strong>{{ $gate->nom }}</strong></span>
                        <span>Capacité : {{ $gate->capacite_max }}</span>

                        <form method="POST"
                              action="{{ route('operator.gates.toggle', $gate) }}">
                            @csrf
                            @method('PATCH')

                            <button class="px-3 py-1
                                {{ $gate->is_open ? 'bg-red-600' : 'bg-green-600' }}
                                text-white rounded">
                                {{ $gate->is_open ? 'Fermer' : 'Ouvrir' }}
                            </button>
                        </form>
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>
@endforeach
@endsection
