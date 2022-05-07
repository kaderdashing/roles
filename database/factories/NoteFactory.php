<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class NoteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'module' => $this->faker->name(),
            'etudiant' => $this->faker->name(),
            'type' => $this->faker->name(),
            'note' => $this->faker->numberBetween(0,20),

        ];
    }
}
