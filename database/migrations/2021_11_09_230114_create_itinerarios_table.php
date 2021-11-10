<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItinerariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('itinerarios', function (Blueprint $table) {
            $table->id();
            $table->dateTime('fecha_hora_salida');
            $table->dateTime('fecha_hora_llegada');

            $table->foreignId('ruta_id')->references('id')->on('rutas')->onDelete('cascade');
            $table->foreignId('nave_id')->references('id')->on('naves')->onDelete('cascade');

            $table->double('precio');

            $table->integer('cant_pasajeros');
            $table->integer('cant_carga');

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
        Schema::dropIfExists('itinerarios');
    }
}
