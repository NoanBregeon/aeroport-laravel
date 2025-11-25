<tr>
    <td class="px-4 py-2 border align-top">
        {{ $hall->nom }}<br>
        <span class="text-sm text-gray-500">
            Personnel minimum : {{ $hall->personnel_minimum }}
        </span>
    </td>
    <td class="px-4 py-2 border align-top">
        <a href="{{ route('gates.create', ['hall' => $hall->id]) }}"
           class="text-blue-600 underline">
            + Ajouter une porte
        </a>

        @if ($hall->gates->isNotEmpty())
            <ul class="mt-2 space-y-1">
                @foreach ($hall->gates as $gate)
                    <li class="flex items-center justify-between gap-2">
                        <span>
                            {{ $gate->nom }}
                            (cap. {{ $gate->capacite_max }},
                            {{ $gate->ouverte ? 'ouverte' : 'fermée' }})
                        </span>

                        <span class="space-x-2">
                            <a href="{{ route('gates.edit', $gate) }}"
                               class="text-yellow-600 underline">
                                Modifier
                            </a>
                            <form action="{{ route('gates.destroy', $gate) }}"
                                  method="POST" class="inline"
                                  onsubmit="return confirm('Supprimer cette porte ?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 underline">
                                    Supprimer
                                </button>
                            </form>
                        </span>
                    </li>
                @endforeach
            </ul>
        @else
            <p class="text-sm text-gray-500 mt-1">
                Aucune porte pour ce hall.
            </p>
        @endif
    </td>
</tr>
