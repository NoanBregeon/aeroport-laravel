@extends('layouts.app')

@section('title', 'Liste des terminaux')

@section('content')
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-bold">Liste des terminaux</h1>

        <a href="{{ route('terminals.create') }}"
           class="inline-flex items-center px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded hover:bg-blue-700">
            Nouveau terminal
        </a>
    </div>

    @if ($terminals->isEmpty())
        <p class="text-gray-600">Aucun terminal pour le moment.</p>
    @else
        <div class="bg-white rounded shadow overflow-hidden">
            <table class="min-w-full text-sm">
                <thead class="bg-gray-100 border-b">
                    <tr>
                        <th class="px-4 py-2 text-left">#</th>
                        <th class="px-4 py-2 text-left">Nom</th>
                        <th class="px-4 py-2 text-left">Emplacement</th>
                        <th class="px-4 py-2 text-left">Mise en service</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($terminals as $terminal)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="px-4 py-2">{{ $terminal->id }}</td>
                            <td class="px-4 py-2 font-medium">{{ $terminal->nom }}</td>
                            <td class="px-4 py-2">{{ $terminal->emplacement }}</td>
                            <td class="px-4 py-2">
                                {{ \Illuminate\Support\Carbon::parse($terminal->date_mise_en_service)->format('d/m/Y') }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
@endsection
