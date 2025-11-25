@extends('layouts.app')

@section('title', 'Créer un terminal')

@section('content')
    <h1 class="text-2xl font-bold mb-6">Créer un terminal</h1>

    <form action="{{ route('terminals.store') }}" method="POST" class="bg-white p-6 rounded shadow max-w-xl">
        @csrf

        <div class="mb-4">
            <label class="block text-sm font-medium mb-1" for="nom">Nom</label>
            <input type="text" id="nom" name="nom"
                   value="{{ old('nom') }}"
                   class="w-full border rounded px-3 py-2 text-sm @error('nom') border-red-500 @enderror">
            @error('nom')
                <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium mb-1" for="code">Code</label>
            <input type="text" id="code" name="code"
                   value="{{ old('code') }}"
                   class="w-full border rounded px-3 py-2 text-sm @error('code') border-red-500 @enderror">
            @error('code')
                <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium mb-1" for="emplacement">Emplacement</label>
            <input type="text" id="emplacement" name="emplacement"
                   value="{{ old('emplacement') }}"
                   class="w-full border rounded px-3 py-2 text-sm @error('emplacement') border-red-500 @enderror">
            @error('emplacement')
                <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label class="block text-sm font-medium mb-1" for="date_mise_en_service">Date de mise en service</label>
            <input type="date" id="date_mise_en_service" name="date_mise_en_service"
                   value="{{ old('date_mise_en_service') }}"
                   class="w-full border rounded px-3 py-2 text-sm @error('date_mise_en_service') border-red-500 @enderror">
            @error('date_mise_en_service')
                <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-center gap-3">
            <button type="submit"
                    class="px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded hover:bg-blue-700">
                Enregistrer
            </button>
            <a href="{{ route('terminals.index') }}" class="text-sm text-gray-600 hover:underline">
                Annuler
            </a>
        </div>
    </form>
@endsection
