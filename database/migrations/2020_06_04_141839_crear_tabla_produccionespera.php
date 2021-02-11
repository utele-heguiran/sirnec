<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaProduccionespera extends Migration
{
    public function up()
    {
        Schema::create('produccionespera', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('departamento_id');
            $table->foreign('departamento_id', 'fk_produccionespera_departamento')->references('id')->on('departamentos')->onDelete('restrict')->onUpdate('restrict');

            $table->unsignedBigInteger('oficina_id');
            $table->foreign('oficina_id', 'fk_produccionespera_oficina')->references('id')->on('oficinas')->onDelete('restrict')->onUpdate('restrict');

            $table->date('fechinicial');
            $table->date('fechfinal');
            $table->date('feccreacion');

            $table->Integer('matsinrecepcionarcomprob');
            $table->Integer('matsinrecepcionarescaneo');

            $table->Integer('comprobado_pvc');
            $table->Integer('comprobado_renovc');
            $table->Integer('comprobado_rectc');
            $table->Integer('comprobado_dupc');
            $table->Integer('comprobado_pvt');
            $table->Integer('comprobado_renovt');
            $table->Integer('comprobado_rectt');
            $table->Integer('comprobado_dupt');
            $table->Integer('comprobado_noprocesado');
            $table->Integer('comprobado_total');

            $table->Integer('escaneo_pvc');
            $table->Integer('escaneo_renovc');
            $table->Integer('escaneo_rectc');
            $table->Integer('escaneo_dupc');
            $table->Integer('escaneo_pvt');
            $table->Integer('escaneo_renovt');
            $table->Integer('escaneo_rectt');
            $table->Integer('escaneo_dupt');
            $table->Integer('escaneo_noprocesado');
            $table->Integer('escaneo_total');

            $table->timestamps();
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_spanish_ci';

        });
    }

    public function down()
    {
        Schema::dropIfExists('produccionespera');
    }
}
