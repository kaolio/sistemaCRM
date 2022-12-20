<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleOrdensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_ordens', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->string('tipo')->nullable();
            $table->string('rol')->nullable();
            $table->string('fabricante')->nullable();
            $table->string('modelo')->nullable();
            $table->string('serial')->nullable();
            $table->string('localizacion')->nullable();
            $table->string('diagnostico')->nullable();
            $table->unsignedBigInteger('id_trabajos')->nullable();
            $table->timestamps();

            $table->foreign('id_trabajos')
            ->references('id')
            ->on('orden_trabajos')
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
        Schema::dropIfExists('detalle_ordens');
    }
}
