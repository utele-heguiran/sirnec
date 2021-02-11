<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaCargos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cargos', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('nivel_id');
            $table->foreign('nivel_id', 'fk_cargos_niveles')->references('id')->on('niveles')->onDelete('restrict')->onUpdate('restrict');

            $table->string('name');
            $table->string('codigo');
            $table->string('grado')->nullable();
            $table->string('descripcion');

            $table->bigInteger('sueldo');
            $table->Integer('cantidad');

            $table->timestamps();
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_spanish_ci';

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cargos');
    }
}
