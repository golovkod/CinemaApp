<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilmsModelGeneresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('films_model_generes', function (Blueprint $table) {
            $table->id('gf_id');
            $table->bigInteger('films_model_f_id')->unsigned();
            $table->foreign('films_model_f_id')->references('f_id')->on('films_models');
            $table->bigInteger('generes_g_id')->unsigned();
            $table->foreign('generes_g_id')->references('g_id')->on('generes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('films_model_generes');
    }
}
