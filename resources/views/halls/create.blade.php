@extends('layouts.app')

@section('content')
    <h1>Créer hall</h1>
    <form method="POST" action="{{ route('halls.store') }}">
        @csrf
        <label>Terminal ID <input name="terminal_id" required /></label><br/>
        <label>Nom <input name="nom" required /></label><br/>
        <label>Personnel min <input name="personnel_minimum" type="number" min="0" required /></label><br/>
        <button type="submit">Créer</button>
    </form>
@endsection
