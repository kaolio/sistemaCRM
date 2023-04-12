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
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_cliente')->nullable();
            $table->string('prioridad')->nullable();
            $table->string('tiempoEstimado')->nullable();
            $table->string('estado')->nullable();
            $table->string('informacion')->nullable();
            $table->string('datosImportantes')->nullable();
            $table->string('nota')->nullable();
            $table->unsignedBigInteger('asignado')->nullable();
            $table->string('creado')->nullable();
            $table->string('diagnostico')->nullable();
            $table->string('precio')->nullable();
            $table->string('bandera')->nullable();
            $table->string('password')->nullable();
            $table->string('lista_archivo')->nullable();
            $table->string('nombre_archivo')->nullable();

            $table->timestamps();

            $table->foreign('id_cliente')
            ->references('id')
            ->on('clientes')
            ->onDelete('cascade');

           $table->foreign('asignado')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');

        
            /*$table->string('infoCliente')->nullable();
            $table->string('Prioridad')->nullable();
            $table->string('TiempoEstimado')->nullable();
            $table->string('Tipo')->nullable();
            $table->string('Rol')->nullable();
            $table->string('Fabricante')->nullable();
            $table->string('Modelo')->nullable();
            $table->string('Serial')->nullable();
            $table->string('Localizacion')->nullable();
            $table->string('informacionDispositivo');
            $table->string('datoImportante');*/

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
