<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaHislaborales extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hislaborales', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('funcionario_id');
            $table->foreign('funcionario_id', 'fk_hislaborales_funcionarios')->references('id')->on('funcionarios')->onDelete('restrict')->onUpdate('restrict');

            $table->string('name');
            $table->Integer('tipoempresa');

            $table->unsignedBigInteger('pais_id');
            $table->foreign('pais_id', 'fk_hislaborales_pais')->references('id')->on('paises')->onDelete('restrict')->onUpdate('restrict');

            $table->unsignedBigInteger('departamento_id');
            $table->foreign('departamento_id', 'fk_hislaborales_departamento')->references('id')->on('departamentos')->onDelete('restrict')->onUpdate('restrict');

            $table->unsignedBigInteger('municipio_id');
            $table->foreign('municipio_id', 'fk_hislaborales_municipio')->references('id')->on('municipios')->onDelete('restrict')->onUpdate('restrict');

            $table->string('email')->nullable();

            $table->string('telefono_fijo')->nullable();
            $table->string('movil')->nullable();

            $table->date('fechaingreso');
            $table->date('fecharetiro');
            $table->string('cargo')->nullable();
            $table->string('dependencia')->nullable();
            $table->string('direccion')->nullable();

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
        Schema::dropIfExists('hislaborales');
    }
}
