<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaEspecificacioncargos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('especificacioncargos', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('nivel_id');
            $table->foreign('nivel_id', 'fk_especificacioncargos_niveles')->references('id')->on('niveles')->onDelete('restrict')->onUpdate('restrict');

            $table->unsignedBigInteger('cargo_id');
            $table->foreign('cargo_id', 'fk_especificacioncargos_cargos')->references('id')->on('cargos')->onDelete('restrict')->onUpdate('restrict');

            $table->string('jefeinmediato')->nullable();
            $table->string('areafuncional');
            $table->text('proposito')->nullable();

            $table->text('funcionesesenciales')->nullable();
            $table->text('conocimientosbasicos')->nullable();
            $table->text('competenciascomportamentales')->nullable();
            $table->text('experiencia')->nullable();
            $table->text('educacion')->nullable();
            $table->text('equivalencias')->nullable();

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
        Schema::dropIfExists('especificacioncargos');
    }
}
