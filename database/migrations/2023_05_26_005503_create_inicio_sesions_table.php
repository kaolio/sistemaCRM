<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInicioSesionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inicio_sesions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('usuario')->nullable();
            $table->string('informacion')->nullable();
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
        Schema::dropIfExists('inicio_sesions');
    }
}
