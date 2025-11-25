<x-app-layout>
    @extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <h1 class="text-2xl font-bold mb-4">
        Modifier le terminal : {{ $terminal->nom }}
    </h1>

    <form action="{{ route('terminals.update', $terminal) }}" method="POST">
        @method('PUT')
        @include('terminals._form', ['terminal' => $terminal, 'submitLabel' => 'Mettre à jour'])
    </form>
</div>
@endsection
</x-app-layout>
