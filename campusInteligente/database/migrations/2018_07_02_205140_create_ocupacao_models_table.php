<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOcupacaoModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ocupacao_models', function (Blueprint $table) {
          $table->increments('id');
          $table->date('data');
          $table->unsignedInteger('id_entrada');
          $table->foreign('id_entrada')->references('id')->on('entrada_models');
          $table->unsignedInteger('id_saida');
          $table->foreign('id_saida')->references('id')->on('saida_models');
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
        Schema::dropIfExists('ocupacao_models');
    }
}
