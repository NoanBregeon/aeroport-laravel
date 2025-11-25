@extends('layouts.app')

@section('content')
    <h1>Créer porte</h1>
    <form method="POST" action="{{ route('gates.store') }}">
        @csrf
        <div style="margin-bottom:0.5rem;">
            <label>Hall ID <input name="hall_id" value="{{ old('hall_id', $hall->id ?? '') }}" required /></label>
            @error('hall_id')<div style="color:red;">{{ $message }}</div>@enderror
        </div>

        <div style="margin-bottom:0.5rem;">
            <label>Nom <input name="nom" value="{{ old('nom') }}" required /></label>
            @error('nom')<div style="color:red;">{{ $message }}</div>@enderror
        </div>

        <div style="margin-bottom:0.5rem;">
            <label>Ouverte
                <select name="ouverte" required>
                    <option value="1" {{ old('ouverte') == '1' ? 'selected' : '' }}>Oui</option>
                    <option value="0" {{ old('ouverte') == '0' ? 'selected' : '' }}>Non</option>
                </select>
            </label>
            @error('ouverte')<div style="color:red;">{{ $message }}</div>@enderror
        </div>

        <div style="margin-bottom:0.5rem;">
            <label>Capacité max <input name="capacite_max" type="number" min="0" value="{{ old('capacite_max') }}" /></label>
            @error('capacite_max')<div style="color:red;">{{ $message }}</div>@enderror
        </div>

        <button type="submit">Créer</button>
    </form>
@endsection
