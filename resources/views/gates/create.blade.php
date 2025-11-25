@extends('layouts.app')

@section('content')
    <h1>Créer gate</h1>
    <form method="POST" action="{{ route('gates.store') }}">
        @csrf
        <label>Hall ID <input name="hall_id" required /></label><br/>
        <label>Nom <input name="nom" required /></label><br/>
        <label>Ouverte
            <select name="ouverte" required>
                <option value="1">Oui</option>
                <option value="0">Non</option>
            </select>
        </label><br/>
        <label>Capacité max <input name="capacite_max" type="number" min="0" /></label><br/>
        <label>Capacité <input name="capacite" type="number" min="0" /></label><br/>
        <button type="submit">Créer</button>
    </form>
@endsection
