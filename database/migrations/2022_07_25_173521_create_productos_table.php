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
            $table->string('factor')->nullable();
            $table->string('fabricante')->nullable();
            $table->string('modelo')->nullable();
            $table->string('ubicacion')->nullable();
            $table->string('distribuidora')->nullable();
            $table->string('precio')->nullable();
            $table->string('vat')->nullable();
            $table->string('precio_fin')->nullable();
            $table->string('serial')->nullable();
            $table->date('fecha')->nullable();
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
        Schema::dropIfExists('productos');
    }
}
