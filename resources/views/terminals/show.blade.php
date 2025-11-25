@extends('layouts.app')

@section('content')
<div class="container" style="padding:1rem;">
    <h1>Terminal : {{ $terminal->nom }}</h1>

    @if($terminal->emplacement)
        <p><strong>Emplacement :</strong> {{ $terminal->emplacement }}</p>
    @endif

    @if($terminal->date_mise_en_service)
        <p><strong>Date de mise en service :</strong> {{ $terminal->date_mise_en_service->format('d/m/Y') }}</p>
    @endif

    <div style="margin-top:1rem;">
        <h2>Halls</h2>
        @if($terminal->halls->isEmpty())
            <p>Aucun hall.</p>
        @else
            <table border="1" cellpadding="6" cellspacing="0" style="border-collapse:collapse;width:100%;">
                <thead>
                    <tr>
                        <th>Hall</th>
                        <th>Actions / Portes</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($terminal->halls as $hall)
                        @include('gates.show', ['hall' => $hall])
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</div>
@endsection
