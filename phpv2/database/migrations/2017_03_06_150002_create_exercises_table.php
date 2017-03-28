<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExercisesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('exercises', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('id_teacher');
          $table->string('name_teacher');
          $table->string('name');
          $table->string('description');
          $table->string('astuce');
          $table->integer('difficulte');
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
      Schema::dropIfExists('exercises');
    }
}
