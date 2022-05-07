<?php

namespace Database\Factories;

use App\Models\Module;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


class ModuleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Module::class;

    public function definition()
    {
  
        return [
            'libelle' => $this->faker->name(),
            'controle' => $this->faker->boolean(),
            'examen' => $this->faker->boolean(),
            'tp' => $this->faker->boolean(),
            'option' => $this->faker->name(),
            'semestre' => $this->faker->numberBetween(1,8),


            
        ];
    }
}
