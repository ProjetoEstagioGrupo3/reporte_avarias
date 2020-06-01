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
            $table->id();
            $table->foreignId("cod_bastidor");
            $table->bigInteger('codSwitch');
            $table->bigInteger('nrTotalPortas');
            $table->timestamps();

            $table->foreign('cod_bastidor')->references('id')->on('bastidores');
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
