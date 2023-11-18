<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuarios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->bigIncrements('id_usuario');
            $table->string('nombre',45);
            $table->string('app',45);
            $table->string('apm',45)->nullable();
            $table->date('fn');
            $table->integer('genero');
            $table->string('celular',45);
            $table->string('correo',45);
            $table->string('contrasena',45);
            $table->string('img')->nullable();
            $table->integer('id_tipo');
            $table->integer('activo');
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
        Schema::dropIfExists('usuarios');
    }
}
