<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class EtudiantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nom' => $this->faker->name(),
            'prenom' => $this->faker->name(),
            //'email_verified_at' => now(),
            'date_naissance' => $this->faker->date(),
            'promo'=>$this->faker->date($format = 'Y',$max ='now'),
            'file_path'=>$this->faker->image('public/storage/etudiant',650,480,'animals',true),
           // 'remember_token' => Str::random(10),
        ];
    }
}
