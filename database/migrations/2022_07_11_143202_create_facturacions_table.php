<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacturacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facturacions', function (Blueprint $table) {
            
            $table->bigIncrements('id');
            $table->String('estado')->nullable();
            $table->String('servicio')->nullable();
            $table->decimal('precio', 8, 2)->nullable();
            $table->decimal('partes', 8, 2)->nullable();
            $table->decimal('iva', 8, 2)->nullable();
            $table->decimal('descuento', 8, 2)->nullable();
            $table->decimal('total', 8, 2)->nullable();
            $table->decimal('subtotal', 8, 2)->nullable();
            $table->decimal('totalConIva', 8, 2)->nullable();
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
        Schema::dropIfExists('facturacions');
    }
}
