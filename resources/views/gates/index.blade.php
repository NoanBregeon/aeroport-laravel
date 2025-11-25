@extends('layouts.app')

@section('content')
    <h1>Gates</h1>
    <a href="{{ route('gates.create') }}">Créer</a>
    <ul>
        @foreach($gates as $gate)
            <li>{{ $gate->nom }} (Hall: {{ $gate->hall?->nom ?? '—' }}) — ouverte: {{ $gate->ouverte ? 'oui' : 'non' }}</li>
        @endforeach
    </ul>
@endsection
