<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ventas', function (Blueprint $table) {
            $table->id();

            $table->foreignId('itinerario_id')->references('id')->on('itinerarios');
            $table->enum('tipo', ['pasaje'=>0, 'carga'=>1]);
            $table->integer('cantidad');
            $table->double('total');
            $table->date('fecha_venta');

            $table->foreignId('user_id')->references('id')->on('users');
            $table->text('descripcion')->nullable(true);
            
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
        Schema::dropIfExists('ventas');
    }
}
