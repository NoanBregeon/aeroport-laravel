@extends('layouts.admin')

@section('content')
<div class="flex items-center justify-between mb-6">
    <h1 class="text-2xl font-bold">Gates</h1>

    <a href="{{ route('admin.gates.create') }}"
       class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
        + Ajouter un Gate
    </a>
</div>

@if (session('success'))
    <div class="mb-4 p-3 bg-green-200 text-green-800 rounded">
        {{ session('success') }}
    </div>
@endif

<table class="w-full border bg-white rounded shadow">
    <thead class="bg-gray-100">
        <tr>
            <th class="p-3 text-left">Numéro</th>
            <th class="p-3 text-left">Hall</th>
            <th class="p-3 text-center">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($gates as $gate)
            <tr class="border-t">
                <td class="p-3">{{ $gate->numero }}</td>
                <td class="p-3">{{ $gate->hall->nom ?? 'N/A' }}</td>
                <td class="p-3 text-center flex gap-2 justify-center">
                    <a href="{{ route('admin.gates.edit', $gate) }}"
                       class="px-3 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600">
                        Modifier
                    </a>

                    <form action="{{ route('admin.gates.destroy', $gate) }}" method="POST"
                          onsubmit="return confirm('Supprimer ce gate ?')">
                        @csrf
                        @method('DELETE')

                        <button class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700">
                            Supprimer
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<div class="mt-4">
    {{ $gates->links() }}
</div>

@endsection
