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
            $table->string('NombreCliente');
            $table->string('VATid');
            $table->string('Calle');
            $table->integer('Numero')->nullable();
            $table->string('Apt');
            $table->integer('CodigoPostal');
            $table->string('Pak');
            $table->string('NombreCiudad');
            $table->string('Pais');
            $table->string('Idioma');
            $table->string('Tipo');
            $table->string('Valor');
            $table->string('NombreX');
            $table->text('Nota');
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
