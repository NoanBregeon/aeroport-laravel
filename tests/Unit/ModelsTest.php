<?php

use App\Models\Gate;
use App\Models\Hall;
use App\Models\Terminal;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

// On dit à Pest d'utiliser la classe de test Laravel + la BDD en mémoire
uses(TestCase::class, RefreshDatabase::class);

it('gate ouverte is cast to boolean', function () {
    /** @var Gate $gate */
    $gate = Gate::factory()->create([
        'ouverte' => 1,
    ]);

    expect((bool) $gate->ouverte)->toBeTrue();
});

it('models relations work between terminal, hall and gate', function () {
    /** @var Terminal $terminal */
    $terminal = Terminal::factory()->create();

    /** @var Hall $hall */
    $hall = Hall::factory()->create([
        'terminal_id' => $terminal->id,
    ]);

    /** @var Gate $gate */
    $gate = Gate::factory()->create([
        'hall_id' => $hall->id,
    ]);

    // Un terminal a des halls
    expect($terminal->halls()->count())->toBe(1);
    expect($terminal->halls()->first()->id)->toBe($hall->id);

    // Un hall appartient à un terminal
    expect($hall->terminal->id)->toBe($terminal->id);

    // Un hall a des portes
    expect($hall->gates()->count())->toBe(1);
    expect($hall->gates()->first()->id)->toBe($gate->id);

    // Un terminal voit les gates via hasManyThrough
    expect($terminal->gates()->count())->toBe(1);
    expect($terminal->gates()->first()->id)->toBe($gate->id);
});

it('calculates terminal open gates capacity', function () {
    /** @var Terminal $terminal */
    $terminal = Terminal::factory()->create();

    /** @var Hall $hall1 */
    $hall1 = Hall::factory()->create([
        'terminal_id' => $terminal->id,
    ]);

    /** @var Hall $hall2 */
    $hall2 = Hall::factory()->create([
        'terminal_id' => $terminal->id,
    ]);

    // 2 portes ouvertes + 1 fermée

    Gate::factory()->create([
        'hall_id' => $hall1->id,
        'capacite_max' => 100,
        'ouverte' => true,
    ]);

    Gate::factory()->create([
        'hall_id' => $hall1->id,
        'capacite_max' => 50,
        'ouverte' => false,
    ]);

    Gate::factory()->create([
        'hall_id' => $hall2->id,
        'capacite_max' => 75,
        'ouverte' => true,
    ]);

    $terminal->refresh();

    expect($terminal->openGates()->count())->toBe(2);
    expect($terminal->open_gates_capacity)->toBe(175);
});
