<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('dispositivo')->nullable();
            $table->string('connection')->nullable();
            $table->string('fabricante')->nullable();
            $table->string('modelo')->nullable();
            $table->string('capacidad_producto')->nullable();
            $table->string('factor')->nullable();
            $table->string('rol')->nullable();
            $table->string('ubicacion')->nullable();
            $table->string('distribuidora')->nullable();
            $table->string('precio_compra')->nullable();
            $table->string('precio_venta')->nullable();
            $table->string('serial')->nullable();
            $table->date('fecha')->nullable();
            $table->string('estado')->nullable();
            $table->string('nota')->nullable();
            $table->unsignedBigInteger('usuario')->nullable();
            $table->timestamps();


            $table->foreign('usuario')
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
        Schema::dropIfExists('productos');
    }
}
