<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistoAvariasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registo__avarias', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_users')->unsigned();
            $table->bigInteger('id_tipoAvarias')->unsigned();
            $table->bigInteger('id_estado')->unsigned();
            $table->bigInteger('id_localizacoes')->unsigned();
            $table->bigInteger('id_equipamentos')->unsigned();
            $table->string('descricao');
            $table->timestamps();

            $table->foreign('id_users')->references('id')->on('users');
            $table->foreign('id_tipoAvarias')->references('id')->on('tipo__avarias');
            $table->foreign('id_estado')->references('id')->on('estados');
            $table->foreign('id_localizacoes')->references('id')->on('localizacoes');
            $table->foreign('id_equipamentos')->references('id')->on('equipamentos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('registo__avarias');
    }
}
