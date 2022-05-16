<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlandetratamientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plandetratamientos', function (Blueprint $table) {
            $table->Increments('plandetratamientos_id')->unsigned();
            $table->unsignedInteger('paciente_id');
            $table->foreign('paciente_id')->references('paciente_id')->on('pacientes'); 
            $table->unsignedInteger('tratamiento_id');
            $table->foreign('tratamiento_id')->references('tratamiento_id')->on('tratamientos'); 
            $table->unsignedInteger('User_id');
            $table->foreign('User_id')->references('User_id')->on('users'); 
            $table->longText('descripcion');
            $table->integer('cantidad');
            $table->float('costoTotal');
            $table->float('abonoTratamiento')->default(0);
            $table->float('saldoTratamiento');
            $table->Integer('estado')->default(1);
            $table->timestamp('fechaCreacionTratamiento')->useCurrent();
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
