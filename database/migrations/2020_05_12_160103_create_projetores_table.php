<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjetoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projetores', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tipoProjetor');
            $table->bigInteger('equipamento_id')->unsigned()->unique();
            $table->string('modeloProjetor');
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
        Schema::dropIfExists('projetores');
    }
}
