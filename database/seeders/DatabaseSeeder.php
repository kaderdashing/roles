<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Editeur::factory(10)->create();
      /*  \App\Models\User::factory(10)->create();
        \App\Models\Module::factory(10)->create();
        \App\Models\Note::factory(10)->create();
        \App\Models\Option::factory(10)->create();
        \App\Models\Promotion::factory(10)->create();*/
     //  \App\Models\Etudiant::factory(10)->create();

       // $this->call(EditeurSeeder::class) ;
      // factory(App\Article::class, 200)->create();
    }
}
