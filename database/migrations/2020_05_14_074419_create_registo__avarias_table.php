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
            $table->bigInteger('users_id')->unsigned();
            $table->bigInteger('tipoAvarias_id')->unsigned();
            $table->bigInteger('estado_id')->unsigned();
            $table->bigInteger('localizacoes_id')->unsigned();
            $table->bigInteger('equipamentos_id')->unsigned();
            $table->string('descricao');
            $table->timestamps();

            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('tipoAvarias_id')->references('id')->on('tipo__avarias')->onDelete('cascade');
            $table->foreign('estado_id')->references('id')->on('estados')->onDelete('cascade');
            $table->foreign('localizacoes_id')->references('id')->on('localizacoes')->onDelete('cascade');
            $table->foreign('equipamentos_id')->references('id')->on('equipamentos')->onDelete('cascade');
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
