<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEquipamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipamentos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('descricao');
            $table->bigInteger('id_localizacao')->unsigned();
            $table->bigInteger('id_marca')->unsigned();
            $table->bigInteger('tipoequipamento')->unsigned();
            $table->timestamps();

            $table->foreign('id_localizacao')->references('id')->on('localizacoes');
            $table->foreign('id_marca')->references('id')->on('marcas');
            $table->foreign('tipoequipamento')->references('id')->on('equipamentos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('equipamentos');
        
    }
}
