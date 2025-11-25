@extends('layouts.app')

@section('content')
<div style="padding:1rem;max-width:600px;">
    <h1>Modifier la porte : {{ $gate->nom }}</h1>

    <form action="{{ route('gates.update', $gate) }}" method="POST">
        @csrf
        @method('PUT')

        <div style="margin-bottom:0.75rem;">
            <label for="capacite_max">Capacité maximale</label><br>
            <input type="number" min="0" name="capacite_max" id="capacite_max"
                   value="{{ old('capacite_max', $gate->capacite_max) }}">
            @error('capacite_max')<div style="color:red;">{{ $message }}</div>@enderror
        </div>

        <div style="margin-bottom:0.75rem;">
            <label>
                <input type="checkbox" name="ouverte" value="1" {{ old('ouverte', $gate->ouverte) ? 'checked' : '' }}>
                Porte ouverte
            </label>
        </div>

        <button type="submit">Enregistrer</button>
    </form>

    <div style="margin-top:1rem;">
        <a href="{{ route('terminals.show', $gate->hall->terminal_id) }}">← Retour au terminal</a>
    </div>
</div>
@endsection
