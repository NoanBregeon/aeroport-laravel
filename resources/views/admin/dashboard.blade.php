@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')

<div class="grid grid-cols-1 md:grid-cols-3 gap-6">

    <!-- CARD -->
    <div class="bg-gray-800 shadow rounded-lg p-6 border border-gray-700">
        <h3 class="text-lg font-semibold mb-2">Terminaux</h3>
        <p class="text-4xl font-bold">{{ $terminalsCount }}</p>
    </div>

    <div class="bg-gray-800 shadow rounded-lg p-6 border border-gray-700">
        <h3 class="text-lg font-semibold mb-2">Halls</h3>
        <p class="text-4xl font-bold">{{ $hallsCount }}</p>
    </div>

    <div class="bg-gray-800 shadow rounded-lg p-6 border border-gray-700">
        <h3 class="text-lg font-semibold mb-2">Gates</h3>
        <p class="text-4xl font-bold">{{ $gatesCount }}</p>
    </div>

</div>

@endsection
