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
            $table->id();
            $table->string('descricao');
            $table->foreignId('id_localizacao')->unsigned();
            $table->foreignId('id_marca')->unsigned();
            $table->foreignId('tipoequipamento')->unsigned();
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
