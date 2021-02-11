<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaDevoluciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('devoluciones', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('departamento_id');
            $table->foreign('departamento_id', 'fk_devoluciones_departamento')->references('id')->on('departamentos')->onDelete('restrict')->onUpdate('restrict');
            
            $table->string('numpreparacion')->nullable();
            $table->string('numdocumento')->nullable();
            $table->string('name')->nullable();

            $table->unsignedBigInteger('clasedevolucion_id');
            $table->foreign('clasedevolucion_id', 'fk_devoluciones_clasedevolucion')->references('id')->on('clasedevoluciones')->onDelete('restrict')->onUpdate('restrict');

            $table->unsignedBigInteger('clasetramite_id')->nullable();
            $table->foreign('clasetramite_id', 'fk_devoluciones_clasetramite')->references('id')->on('clasetramites')->onDelete('restrict')->onUpdate('restrict');

            $table->unsignedBigInteger('tipotramite_id')->nullable();
            $table->foreign('tipotramite_id', 'fk_devoluciones_tipotramites')->references('id')->on('tipotramites')->onDelete('restrict')->onUpdate('restrict');

            $table->unsignedBigInteger('oficina_id')->nullable();
            $table->foreign('oficina_id', 'fk_devoluciones_oficina')->references('id')->on('oficinas')->onDelete('restrict')->onUpdate('restrict');

            $table->date('fecpreparacion')->nullable();
            $table->string('numpreparacionremplazo')->nullable();

            $table->unsignedBigInteger('estado_id');
            $table->foreign('estado_id', 'fk_devoluciones_estado')->references('id')->on('estados')->onDelete('restrict')->onUpdate('restrict');

            $table->string('numoficiodevolucion')->nullable();
            $table->date('fecdevolucion');
            $table->date('fecenvio')->nullable();
            $table->string('path')->nullable();

            $table->string('observacion_1')->nullable();
            $table->date('fec_observacion_1')->nullable();
            $table->unsignedBigInteger('user1_id')->nullable();
            $table->foreign('user1_id', 'fk_devoluciones_user1')->references('id')->on('usuarios')->onDelete('restrict')->onUpdate('restrict');

            $table->string('observacion_2')->nullable();
            $table->date('fec_observacion_2')->nullable();
            $table->unsignedBigInteger('user2_id')->nullable();
            $table->foreign('user2_id', 'fk_devoluciones_user2')->references('id')->on('usuarios')->onDelete('restrict')->onUpdate('restrict');

            $table->string('observacion_3')->nullable();
            $table->date('fec_observacion_3')->nullable();
            $table->unsignedBigInteger('user3_id')->nullable();
            $table->foreign('user3_id', 'fk_devoluciones_user3')->references('id')->on('usuarios')->onDelete('restrict')->onUpdate('restrict');

            $table->bigInteger('numoficiocierre')->nullable();
            $table->date('fechacierre')->nullable();
            $table->string('descripcion_solucion')->nullable();
            $table->unsignedBigInteger('userc_id')->nullable();
            $table->foreign('userc_id', 'fk_devoluciones_userc')->references('id')->on('usuarios')->onDelete('restrict')->onUpdate('restrict');

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
        Schema::dropIfExists('devoluciones');
    }
}
