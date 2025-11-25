@extends('layouts.app')

@section('content')
	<h1>Terminals</h1>
	<ul>
		@foreach($terminals as $terminal)
			<li>{{ $terminal->nom }} ({{ $terminal->code }})</li>
		@endforeach
	</ul>
@endsection
