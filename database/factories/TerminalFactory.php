<?php

namespace Database\Factories;

use App\Models\Terminal;
use Illuminate\Database\Eloquent\Factories\Factory;

class TerminalFactory extends Factory
{
    protected $model = Terminal::class;

    public function definition()
    {
        return [
            'nom' => $this->faker->company(),
            'code' => strtoupper($this->faker->unique()->bothify('T??')),
        ];
    }
}
