<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modules', function (Blueprint $table) {
            $table->id();

            $table->string('libelle');
            $table->boolean('controle');
            $table->boolean('examen');
            $table->boolean('tp');

            $table->string('option');
            $table->integer('semestre');
           // $table->foreignId('etudiant_id')->constrained()->onDelete('cascade');            



            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');

        Schema::dropIfExists('modules');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');

    }
}
