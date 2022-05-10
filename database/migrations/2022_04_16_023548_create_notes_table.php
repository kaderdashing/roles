<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notes', function (Blueprint $table) {
            $table->id();
            $table->string('module');
            $table->string('etudiant');
            $table->string('type');
            $table->double('note');
           // $table->foreignId('module_id')->constrained()->onDelete('cascade');
           $table->unsignedBigInteger('module_id');
 
           $table->foreign('module_id')->references('id')->on('modules')->onDelete('cascade');;
           

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

        Schema::dropIfExists('notes');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');

    }
}
