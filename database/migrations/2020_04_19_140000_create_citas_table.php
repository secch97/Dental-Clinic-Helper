<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCitasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('citas', function (Blueprint $table) {
            $table->Increments('citas_id')->unsigned();
            $table->unsignedInteger('plandetratamientos_id');
            $table->foreign('plandetratamientos_id')->references('plandetratamientos_id')->on('plandetratamientos');  
            $table->unsignedInteger('User_id');
            $table->foreign('User_id')->references('User_id')->on('users'); 
            $table->date('fechaCita');
            $table->string('horaCita');
            $table->longText('descripcionCita');
            $table->float('abonoCita')->default(0);
            $table->float('saldoCita');
            $table->Integer('estadoCita')->default(1);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plandetratamientos');
    }
}
