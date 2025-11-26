@extends('layouts.app')

@section('content')
<h1 class="text-3xl font-bold mb-4">Espace Opérateur</h1>

<p class="text-gray-600 mb-6">
    Vous pouvez uniquement consulter les données.
    Vous pouvez modifier :
</p>

<ul class="list-disc ml-6 text-gray-700">
    <li>l’état (ouvert / fermé) d’une porte d’embarquement</li>
    <li>le personnel minimum d’un hall</li>
</ul>

@endsection
