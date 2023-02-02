<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombreCliente')->nullable();
            $table->string('cif')->nullable();
            $table->string('calle')->nullable();
            $table->string('numero')->nullable();
            $table->string('correo')->nullable();
            $table->string('telefono')->nullable();
            $table->string('codigoPostal')->nullable();
            $table->string('poblacion')->nullable();
            $table->string('provincia')->nullable();
            $table->string('pais')->nullable();
            $table->string('idioma')->nullable();
            $table->text('nota')->nullable();
            $table->unsignedBigInteger('id_user')->nullable();
            $table->timestamps();


            $table->foreign('id_user')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');




        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clientes');
    }
}
