<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donantes', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->string('id_donante')->nullable();
            $table->string('tipo')->nullable();
            $table->string('manufactura')->nullable();
            $table->string('modelo')->nullable();
            $table->string('numero_serie')->nullable();
            $table->string('ubicacion')->nullable();
            $table->string('nota')->nullable();
            $table->unsignedBigInteger('id_trabajos')->nullable();
            $table->unsignedBigInteger('id_inventarios')->nullable();
            $table->timestamps();

            $table->foreign('id_trabajos')
            ->references('id')
            ->on('orden_trabajos')
            ->onDelete('cascade');

            $table->foreign('id_inventarios')
            ->references('id')
            ->on('inventarios')
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
        Schema::dropIfExists('donantes');
    }
}
