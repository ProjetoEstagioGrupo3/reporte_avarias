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
            $table->id();
            $table->foreignId('id_users');
            $table->foreignId('id_tipoAvarias');
            $table->foreignId('id_estado');
            $table->foreignId('id_localizacoes');
            $table->foreignId('id_equipamentos');
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
