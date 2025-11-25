@extends('layouts.app')

@section('content')
    <h1>Terminals</h1>
    <a href="{{ route('terminals.create') }}">Créer</a>
    <ul>
        @foreach($terminals as $terminal)
            <li>
                {{ $terminal->nom }}
                @if($terminal->code) ({{ $terminal->code }}) @endif
                @if($terminal->emplacement) — {{ $terminal->emplacement }} @endif
            </li>
        @endforeach
    </ul>
@endsection
