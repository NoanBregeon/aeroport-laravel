@extends('layouts.app')

@section('content')
    <h1>Halls</h1>
    <a href="{{ route('halls.create') }}">Créer</a>
    <ul>
        @foreach($halls as $hall)
            <li>{{ $hall->nom }} (Terminal: {{ $hall->terminal?->nom ?? '—' }}) — personnel min: {{ $hall->personnel_minimum }}</li>
        @endforeach
    </ul>
@endsection
