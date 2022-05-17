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
            $table->increments('id');
            $table->string('NombreCliente')->nullable();
            $table->string('VATid')->nullable();
            $table->string('Calle')->nullable();
            $table->integer('Numero')->nullable();
            $table->string('Apt')->nullable();
            $table->integer('CodigoPostal')->nullable();
            $table->string('Pak')->nullable();
            $table->string('NombreCiudad')->nullable();
            $table->string('Pais')->nullable();
            $table->string('Idioma')->nullable();
            $table->string('Tipo')->nullable();
            $table->string('Valor')->nullable();
            $table->string('NombreX')->nullable();
            $table->text('Nota')->nullable();
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
        Schema::dropIfExists('clientes');
    }
}
