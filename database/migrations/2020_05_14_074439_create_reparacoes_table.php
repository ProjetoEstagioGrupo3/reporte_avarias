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
            $table->bigInteger('avarias_id')->unsigned();
            $table->bigInteger('users_id')->unsigned();
            $table->bigInteger('estado_id')->unsigned();
            $table->string('descricao');
            $table->timestamps();

            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('estado_id')->references('id')->on('estados')->onDelete('cascade');
            $table->foreign('avarias_id')->references('id')->on('registo__avarias')->onDelete('cascade');
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
