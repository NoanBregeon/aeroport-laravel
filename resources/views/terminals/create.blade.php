@extends('layouts.app')

@section('content')
	<h1>Créer terminal</h1>
	<form method="POST" action="{{ route('terminals.store') }}">
		@csrf
		<label>Nom <input name="nom" /></label>
		<label>Code <input name="code" /></label>
		<button type="submit">Créer</button>
	</form>
@endsection
