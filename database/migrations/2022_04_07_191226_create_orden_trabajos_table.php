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
            $table->string('infoCliente')->nullable();
            $table->string('Prioridad')->nullable();
            $table->string('TiempoEstimado')->nullable();
            $table->string('Tipo')->nullable();
            $table->string('Rol')->nullable();
            $table->string('Fabricante')->nullable();
            $table->string('Modelo')->nullable();
            $table->string('Serial')->nullable();
            $table->string('Localizacion')->nullable();
            $table->string('informacionDispositivo');
            $table->string('datoImportante');
            $table->string('Diagnostico');
            $table->string('Nota');
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
