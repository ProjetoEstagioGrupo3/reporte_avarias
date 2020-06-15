<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccessPointsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('access_points', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('codSwitch_id')->unsigned();
            $table->bigInteger('equipamento_id')->unsigned()->unique();
            $table->Integer('nrPortaSwitch');
            $table->Integer('nrTomadaRede');
            $table->timestamps();
             
            $table->foreign('codSwitch_id')->references('id')->on('switchs');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('access_points');
    }
}
