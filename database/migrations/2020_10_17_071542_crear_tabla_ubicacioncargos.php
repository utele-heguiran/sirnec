<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaUbicacioncargos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ubicacioncargos', function (Blueprint $table) {
                $table->bigIncrements('id');

                $table->unsignedBigInteger('oficina_id');
                $table->foreign('oficina_id', 'fk_ubicacioncargos_oficinas')->references('id')->on('oficinas')->onDelete('restrict')->onUpdate('restrict');

                $table->unsignedBigInteger('cargo_id');
                $table->foreign('cargo_id', 'fk_ubicacioncargos_cargos')->references('id')->on('cargos')->onDelete('restrict')->onUpdate('restrict');

                $table->unsignedBigInteger('especificacioncargos_id');
                $table->foreign('especificacioncargos_id', 'fk_ubicacioncargos_especificacioncargos')->references('id')->on('especificacioncargos')->onDelete('restrict')->onUpdate('restrict');

                $table->unsignedBigInteger('funcionario_id')->nullable();
                $table->foreign('funcionario_id', 'fk_ubicacioncargos_funcionarios')->references('id')->on('funcionarios')->onDelete('restrict')->onUpdate('restrict');

                $table->unsignedBigInteger('funcionarioclase4_id')->nullable();
                $table->foreign('funcionarioclase4_id', 'fk_ubicacioncargos_funcionarioclase4')->references('id')->on('funcionarios')->onDelete('restrict')->onUpdate('restrict');

                $table->unsignedBigInteger('funcionarioclase5_id')->nullable();
                $table->foreign('funcionarioclase5_id', 'fk_ubicacioncargos_funcionarioclase5')->references('id')->on('funcionarios')->onDelete('restrict')->onUpdate('restrict');

                $table->unsignedBigInteger('funcionarioclase6_id')->nullable();
                $table->foreign('funcionarioclase6_id', 'fk_ubicacioncargos_funcionarioclase6')->references('id')->on('funcionarios')->onDelete('restrict')->onUpdate('restrict');

                $table->unsignedBigInteger('estado_id');
                $table->foreign('estado_id', 'fk_ubicacioncargos_estado')->references('id')->on('estados')->onDelete('restrict')->onUpdate('restrict');

                $table->softDeletes();
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
        Schema::dropIfExists('ubicacioncargos');
    }
}
