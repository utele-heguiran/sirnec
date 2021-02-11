<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaMaterialesfaltantes extends Migration
{
    public function up()
    {
        Schema::create('materialesfaltantes', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('lote_id');
            $table->foreign('lote_id', 'fk_materialesfaltantes_lotes')->references('id')->on('lotes')->onDelete('restrict')->onUpdate('restrict');


            $table->unsignedBigInteger('departamento_id');
            $table->foreign('departamento_id', 'fk_materialesfaltantes_departamento')->references('id')->on('departamentos')->onDelete('restrict')->onUpdate('restrict');
           
            $table->unsignedBigInteger('oficina_id');
            $table->foreign('oficina_id', 'fk_materialesfaltantes_oficina')->references('id')->on('oficinas')->onDelete('restrict')->onUpdate('restrict');

            $table->string('numlote');
            $table->date('feccrealote');
            $table->bigInteger('numpreparacion');
            $table->string('numoficenvio');
            
            $table->unsignedBigInteger('claseformatos_id');
            $table->foreign('claseformatos_id', 'fk_materialesfaltantes_claseformatos')->references('id')->on('claseformatos')->onDelete('restrict')->onUpdate('restrict');
           
            $table->unsignedBigInteger('estado_id');
            $table->foreign('estado_id', 'fk_materialesfaltantes_estado')->references('id')->on('estados')->onDelete('restrict')->onUpdate('restrict');

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id', 'fk_materialesfaltantes_user')->references('id')->on('usuarios')->onDelete('restrict')->onUpdate('restrict');
            
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
        Schema::dropIfExists('materialesfaltantes');
    }
}
