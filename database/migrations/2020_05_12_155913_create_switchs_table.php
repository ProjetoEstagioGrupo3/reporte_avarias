<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSwitchsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('switchs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('codbastidor_id')->unsigned();
            $table->bigInteger('equipamento_id')->unsigned()->unique();
            $table->Integer('codSwitch');
            $table->Integer('nrTotalPortas');
            $table->timestamps();

            $table->foreign('codbastidor_id')->references('id')->on('bastidores');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('switchs');
    }
}
