<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('ciudad')->nullable();
            $table->string('telefono')->nullable();
            $table->string('provincia')->nullable();
            $table->string('codigoPostal')->nullable();
            $table->string('razonSocial')->nullable();
            $table->string('direccionSocial')->nullable();
            $table->string('nombreComercial')->nullable();
            $table->string('direccionComercial')->nullable();
            $table->string('horarioComercial')->nullable();
            $table->string('password');
            $table->string('photoPerfil')->nullable();
            $table->string('personaContacto')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
