<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->Increments('User_id')->unsigned();
            $table->unsignedInteger('Role_id')->default(2);
            $table->foreign('Role_id')->references('Role_id')->on('roles');
            $table->string('nombre');
            $table->string('usuario')->unique();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->Integer('estado')->default(1);
            $table->rememberToken();
            $table->timestamp('fecha_creacion')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
