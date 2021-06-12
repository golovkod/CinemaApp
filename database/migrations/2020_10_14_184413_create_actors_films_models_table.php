<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActorsFilmsModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actors_films_model', function (Blueprint $table) {
            $table->id('af_id');
            $table->bigInteger('films_model_f_id')->unsigned();
            $table->foreign('films_model_f_id')->references('f_id')->on('films_models');
            $table->bigInteger('actors_a_id')->unsigned();
            $table->foreign('actors_a_id')->references('a_id')->on('actors');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('actors_films_models');
    }
}
