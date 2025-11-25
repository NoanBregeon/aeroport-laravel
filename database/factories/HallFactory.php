<?php

namespace Database\Factories;

use App\Models\Hall;
use App\Models\Terminal;
use Illuminate\Database\Eloquent\Factories\Factory;

class HallFactory extends Factory
{
    protected $model = Hall::class;

    public function definition()
    {
        return [
            'terminal_id' => Terminal::factory(),
            'nom' => $this->faker->word(),
            'personnel_minimum' => $this->faker->numberBetween(0, 20),
        ];
    }
}
