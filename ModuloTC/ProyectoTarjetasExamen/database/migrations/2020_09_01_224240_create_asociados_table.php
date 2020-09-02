<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAsociadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asociados', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('CodigoAsociado')->nullable();
            $table->string('NombreAsociado')->nullable();
            $table->string('No_TC')->nullable();
            $table->date('FechaEmisionTC')->nullable();
            $table->string('monto')->nullable();
            $table->string('SaldoActual')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('asociados');
    }
}
