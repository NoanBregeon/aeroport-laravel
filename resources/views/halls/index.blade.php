@extends('layouts.app')

@section('content')
	<h1>Halls</h1>
	<ul>
		@foreach($halls as $hall)
			<li>{{ $hall->nom }} (Terminal: {{ $hall->terminal?->nom ?? '—' }})</li>
		@endforeach
	</ul>
@endsection
