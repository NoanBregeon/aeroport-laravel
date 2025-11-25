<?php

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

it('affiche la liste des halls', function () {
    $terminal = Terminal::factory()->create();

    Hall::factory()->count(2)->create([
        'terminal_id' => $terminal->id,
    ]);

    // adapte le nom de la route si besoin
    $response = get(route('halls.index'));

    $response->assertOk();
    // adapte le nom de la vue si elle est différente
    $response->assertViewIs('halls.index');

    $response->assertViewHas('halls', function ($halls) {
        return $halls->count() === 2;
    });
});

it('permet de créer un hall', function () {
    $terminal = Terminal::factory()->create();

    $data = [
        'terminal_id' => $terminal->id,
        'nom' => 'Hall A',
    ];

    // adapte le nom de la route si besoin
    $response = post(route('halls.store'), $data);

    $response->assertRedirect();

    $this->assertDatabaseHas('halls', [
        'terminal_id' => $terminal->id,
        'nom' => 'Hall A',
    ]);
});
