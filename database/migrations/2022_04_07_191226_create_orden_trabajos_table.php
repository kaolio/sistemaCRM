<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdenTrabajosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orden_trabajos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('infoCliente');
            $table->string('Prioridad');
            $table->string('TiempoEstimado');
            $table->string('Tipo');
            $table->string('Rol');
            $table->string('Fabricante');
            $table->string('Modelo');
            $table->string('Serial');
            $table->string('Localizacion');
            $table->string('informacionDispositivo');
            $table->string('datoImportante');

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
        Schema::dropIfExists('orden_trabajos');
    }
}
