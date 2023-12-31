<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('imagenes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo', 20);
            $table->string('archivo', 100);
            $table->boolean('baneada');
            $table->text('motivo_ban')->nullable();
            $table->string('cuenta_user', 20);
            $table->foreign('cuenta_user')->references('user')->on('cuentas');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('imagenes');
    }
};
