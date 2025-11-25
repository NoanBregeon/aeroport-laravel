@extends('layouts.app')

@section('content')
    <h1>Créer terminal</h1>
    <form method="POST" action="{{ route('terminals.store') }}">
        @csrf
        <label>Nom <input name="nom" required /></label><br/>
        <label>Code <input name="code" /></label><br/>
        <label>Emplacement <input name="emplacement" /></label><br/>
        <label>Date mise en service <input name="date_mise_en_service" type="date" /></label><br/>
        <button type="submit">Créer</button>
    </form>
@endsection
