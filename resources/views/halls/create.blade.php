@extends('layouts.app')

@section('content')
	<h1>Créer hall</h1>
	<form method="POST" action="{{ route('halls.store') }}">
		@csrf
		<label>Terminal ID <input name="terminal_id" /></label>
		<label>Nom <input name="nom" /></label>
		<label>Personnel min <input name="personnel_minimum" /></label>
		<button type="submit">Créer</button>
	</form>
@endsection
