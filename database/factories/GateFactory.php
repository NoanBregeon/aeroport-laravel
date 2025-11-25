<?php

namespace Database\Factories;

use App\Models\Gate;
use App\Models\Hall;
use Illuminate\Database\Eloquent\Factories\Factory;

class GateFactory extends Factory
{
    protected $model = Gate::class;

    public function definition()
    {
        return [
            'hall_id' => Hall::factory(),
            'nom' => strtoupper($this->faker->bothify('G-?')),
            'ouverte' => $this->faker->boolean(80),
            'capacite_max' => $this->faker->numberBetween(0, 200),
            'capacite' => $this->faker->numberBetween(0, 200),
        ];
    }
}
