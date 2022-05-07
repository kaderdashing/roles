<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PromotionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'option' => $this->faker->name(),
            'libelle' => $this->faker->name(),
            'annee'=>$this->faker->date($format = 'Y',$max ='now'),
            


        ];
    }
}
