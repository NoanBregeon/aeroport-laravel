@extends('layouts.app')

@section('content')
	<h1>Créer gate</h1>
	<form method="POST" action="{{ route('gates.store') }}">
		@csrf
		<label>Hall ID <input name="hall_id" /></label>
		<label>Nom <input name="nom" /></label>
		<label>Ouverte <select name="ouverte"><option value="1">Oui</option><option value="0">Non</option></select></label>
		<label>Capacité max <input name="capacite_max" /></label>
		<button type="submit">Créer</button>
	</form>
@endsection
