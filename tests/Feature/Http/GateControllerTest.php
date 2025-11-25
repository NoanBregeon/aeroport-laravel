<?php

use App\Models\Gate;
use App\Models\Hall;
use App\Models\Terminal;
use App\Models\User;

use function Pest\Laravel\actingAs;
use function Pest\Laravel\get;
use function Pest\Laravel\post;

beforeEach(function () {
    $this->user = User::factory()->create();
    actingAs($this->user);
});

it('affiche la liste des portes', function () {
    $terminal = Terminal::factory()->create();
    $hall = Hall::factory()->create([
        'terminal_id' => $terminal->id,
    ]);

    Gate::factory()->count(3)->create([
        'hall_id' => $hall->id,
    ]);

    // adapte le nom de la route si besoin
    $response = get(route('gates.index'));

    $response->assertOk();
    // adapte le nom de la vue si besoin
    $response->assertViewIs('gates.index');

    $response->assertViewHas('gates', function ($gates) {
        return $gates->count() === 3;
    });
});

it('permet de créer une porte', function () {
    $terminal = Terminal::factory()->create();
    $hall = Hall::factory()->create([
        'terminal_id' => $terminal->id,
    ]);

    $data = [
        'hall_id' => $hall->id,
        'nom' => 'Gate 1',
        'ouverte' => true,
        'capacite_max' => 100,
        'capacite' => 100,
    ];

    // adapte le nom de la route si besoin
    $response = post(route('gates.store'), $data);

    $response->assertRedirect();

    $this->assertDatabaseHas('gates', [
        'hall_id' => $hall->id,
        'nom' => 'Gate 1',
    ]);
});
