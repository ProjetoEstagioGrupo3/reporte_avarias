<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReparacoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reparacoes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('id_avarias');
            $table->foreignId('id_users');
            $table->foreignId('id_estado');
            $table->text('descricao');
            $table->timestamps();

            $table->foreign('id_users')->references('id')->on('users');
            $table->foreign('id_estado')->references('id')->on('estados');
            $table->foreign('id_avarias')->references('id')->on('registo__avarias');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reparacoes');
    }
}
