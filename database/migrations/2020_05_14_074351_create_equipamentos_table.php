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
            $table->bigInteger('marca_id')->unsigned();
            $table->bigInteger('localizacao_id')->unsigned();
            $table->bigInteger('computadores_id')->unsigned()->unique();
            $table->bigInteger('projetores_id')->unsigned()->unique();
            $table->bigInteger('switchs_id')->unsigned()->unique();
            $table->bigInteger('bastidores_id')->unsigned()->unique();
            $table->bigInteger('accesspoints_id')->unsigned()->unique();
            $table->bigInteger('tipo_id')->unsigned();
            $table->timestamps();

            $table->foreign('marca_id')->references('id')->on('marcas')->onDelete('cascade');
            $table->foreign('localizacao_id')->references('id')->on('localizacoes')->onDelete('cascade');
            $table->foreign('tipo_id')->references('id')->on('tipo_equipamentos')->onDelete('cascade');
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
