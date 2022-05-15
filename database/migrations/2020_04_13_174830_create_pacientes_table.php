<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePacientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pacientes', function (Blueprint $table) {
            $table->Increments('paciente_id')->unsigned();
            $table->string('nombrePaciente');
            $table->Integer('edadPaciente');
            $table->string('direccionPaciente');
            $table->string('telefonoFijoPaciente');
            $table->string('telefonoMovilPaciente');
            $table->longText('observacionesPaciente');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pacientes');
    }
}
