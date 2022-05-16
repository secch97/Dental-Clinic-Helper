<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservacitasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservacitas', function (Blueprint $table) {
            $table->Increments('reservaCitas_id')->unsigned();
            $table->unsignedInteger('User_id');
            $table->foreign('User_id')->references('User_id')->on('users'); 
            $table->string('telefonoReservaCita');
            $table->string('direccionReservaCita');
            $table->date('fechaReservaCita');
            $table->string('horaReservaCita');
            $table->longText('descripcionReservaCita');
            $table->Integer('estadoReservaCita')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservacitas');
    }
}
