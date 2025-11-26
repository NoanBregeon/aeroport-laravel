@extends('layouts.admin')

@section('content')
<h1 class="text-2xl font-bold mb-6">Créer un Gate</h1>

<form action="{{ route('admin.gates.store') }}" method="POST" class="space-y-4">
    @csrf

    <div>
        <label class="block font-medium">Numéro</label>
        <input type="text" name="numero" class="w-full p-2 border rounded"
               value="{{ old('numero') }}">
        @error('numero')
            <p class="text-red-600 text-sm">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="block font-medium">Hall</label>
        <select name="hall_id" class="w-full p-2 border rounded">
            <option value="">-- Choisir un hall --</option>
            @foreach ($halls as $hall)
                <option value="{{ $hall->id }}">{{ $hall->nom }}</option>
            @endforeach
        </select>
        @error('hall_id')
            <p class="text-red-600 text-sm">{{ $message }}</p>
        @enderror
    </div>

    <button class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
        Créer
    </button>
</form>
@endsection
