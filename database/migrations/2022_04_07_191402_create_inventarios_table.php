<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventarios', function (Blueprint $table) {
            
            $table->bigIncrements('id');
            $table->String('manufactura')->nullable();
            $table->String('modelo')->nullable();
            $table->String('numero_de_serie'); 
            $table->String('firmware')->nullable();
            $table->String('capacidad')->nullable(); 
            $table->String('pbc')->nullable();
            $table->String('ubicacion')->nullable();
            $table->String('fechaDisco')->nullable();
            $table->String('factor_de_forma')->nullable();
            $table->String('nota')->nullable();
            $table->String('cabecera')->nullable();
            $table->String('info_de_cabecera')->nullable();
            $table->String('diagnostico')->nullable();
            $table->String('rol')->nullable();
            $table->String('tipo')->nullable();
            $table->String('estado')->nullable();
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
        Schema::dropIfExists('inventarios');
    }
}
