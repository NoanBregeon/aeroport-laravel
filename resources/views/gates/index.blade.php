@extends('layouts.app')

@section('content')
	<h1>Gates</h1>
	<ul>
		@foreach($gates as $gate)
			<li>{{ $gate->nom }} (Hall: {{ $gate->hall?->nom ?? '—' }})</li>
		@endforeach
	</ul>
@endsection
