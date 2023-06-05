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
            $table->String('id_identificador')->nullable();
            $table->String('manufactura')->nullable();
            $table->String('modelo')->nullable();
            $table->String('numero_de_serie'); 
            $table->String('firmware')->nullable();
            $table->String('capacidad')->nullable(); 
            $table->String('part_Number')->nullable(); 
            $table->String('date_code')->nullable(); 
            $table->String('site_code')->nullable(); 
            $table->String('rol')->nullable();
            $table->String('tipo')->nullable();
            $table->String('factor_de_forma')->nullable();
            $table->String('hda_barcode')->nullable();
            $table->String('dcm')->nullable();
            $table->String('mlc')->nullable();
            $table->String('product_of')->nullable(); 
            $table->String('pbc')->nullable();
            $table->String('pcb_revision')->nullable(); 
            $table->String('controller_chip')->nullable(); 
            $table->String('phisycal_heads')->nullable(); 
            $table->String('premp_Type')->nullable(); 
            $table->String('ubicacion')->nullable();
            $table->String('nota')->nullable();
            $table->String('cabecera')->nullable();
            $table->String('info_de_cabecera')->nullable();
            $table->String('precio')->nullable();
            $table->String('diagnostico')->nullable();
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
