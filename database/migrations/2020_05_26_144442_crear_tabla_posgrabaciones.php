<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaPosgrabaciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posgrabaciones', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            $table->unsignedBigInteger('departamento_id');
            $table->foreign('departamento_id', 'fk_posgrabaciones_departamento')->references('id')->on('departamentos')->onDelete('restrict')->onUpdate('restrict');
            
            $table->unsignedBigInteger('municipio_id');
            $table->foreign('municipio_id', 'fk_posgrabaciones_municipios')->references('id')->on('municipios')->onDelete('restrict')->onUpdate('restrict');

            $table->unsignedBigInteger('oficina_id');
            $table->foreign('oficina_id', 'fk_posgrabaciones_oficina')->references('id')->on('oficinas')->onDelete('restrict')->onUpdate('restrict');

            $table->unsignedBigInteger('mes_id');
            $table->foreign('mes_id', 'fk_posgrabaciones_mes')->references('id')->on('mes')->onDelete('restrict')->onUpdate('restrict');
            
            $table->Integer('ano');
            $table->date('feccreacion');
            
            $table->bigInteger('totalinscritosrcn');
            $table->bigInteger('totalinscritosrcm');
            $table->bigInteger('totalinscritosrcd');

            $table->bigInteger('total_posgrabacion_rcn');
            $table->bigInteger('total_posgrabacion_rcm');
            $table->bigInteger('total_posgrabacion_rcd');

            $table->bigInteger('total_modificacion_rcn');
            $table->bigInteger('total_modificacion_rcm');
            $table->bigInteger('total_modificacion_rcd');

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id', 'fk_posgrabaciones_user')->references('id')->on('usuarios')->onDelete('restrict')->onUpdate('restrict');
            
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
        Schema::dropIfExists('posgrabaciones');
    }
}
