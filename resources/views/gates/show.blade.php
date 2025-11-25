<tr>
    <td style="vertical-align:top;">
        <strong>{{ $hall->nom }}</strong><br>
        <small>Personnel minimum : {{ $hall->personnel_minimum }}</small>
    </td>

    <td style="vertical-align:top;">
        <a href="{{ route('gates.create', ['hall' => $hall->id]) }}">+ Ajouter une porte</a>

        @if ($hall->gates->isEmpty())
            <p style="margin-top:0.5rem;">Aucune porte</p>
        @else
            <ul style="margin-top:0.5rem;padding-left:1rem;">
                @foreach ($hall->gates as $gate)
                    <li>
                        {{ $gate->nom }}
                        (cap. {{ $gate->capacite_max ?? '—' }}, {{ $gate->ouverte ? 'ouverte' : 'fermée' }})
                        — <a href="{{ route('gates.edit', $gate) }}">modifier</a>
                    </li>
                @endforeach
            </ul>
        @endif
    </td>
</tr>
