<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaHistcontratos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('histcontratos', function (Blueprint $table) {
            $table->bigIncrements('id');


            $table->unsignedBigInteger('funcionario_id');
            $table->foreign('funcionario_id', 'fk_histcontratos_funcionarios')->references('id')->on('funcionarios')->onDelete('restrict')->onUpdate('restrict');

            // $table->unsignedInteger('funcionario_id');
            // $table->foreign('funcionario_id')->references('id')->on('funcionarios');

            // $table->integer('numero_contrato');
            // $table->date('inicio');
            // $table->date('terminacion');

            // $table->unsignedInteger('cargo_id');
            // $table->foreign('cargo_id')->references('id')->on('cargos');

            // $table->unsignedInteger('clascontrato_id');
            // $table->foreign('clascontrato_id')->references('id')->on('clascontratos');

            // $table->unsignedInteger('departamento_id');
            // $table->foreign('departamento_id')->references('id')->on('departamentos');

            // $table->unsignedInteger('municipio_id');
            // $table->foreign('municipio_id')->references('id')->on('municipios');

            // $table->unsignedInteger('oficina_id');
            // $table->foreign('oficina_id')->references('id')->on('oficinas');

            // $table->unsignedInteger('eps_id');
            // $table->foreign('eps_id')->references('id')->on('eps');

            // $table->unsignedInteger('pension_id');
            // $table->foreign('pension_id')->references('id')->on('pensions');

            // $table->integer('num_solic_viavilidad');
            // $table->date('viavilidad');

            // $table->integer('resol_viavilidad');
            // $table->date('res_viavilidad');

            // $table->integer('res_municipio');
            // $table->date('municipio');

            // $table->integer('posec_municipio');
            // $table->date('pos_municipio');

            // $table->integer('certif_municipio');
            // $table->date('cert_municipio');

            // $table->string('certificado_policia');
            // $table->string('certificado_contraloria');
            // $table->string('certificado_procuraduria');

            // $table->unsignedInteger('banco_id');
            // $table->foreign('banco_id')->references('id')->on('bancos');

            // $table->unsignedInteger('clascuenta_id');
            // $table->foreign('clascuenta_id')->references('id')->on('clascuentas');

            // $table->string('cuenta_numero');
            // $table->integer('sueldo_base')->nullable();
            // $table->integer('ley_cuarta')->nullable();
            // $table->integer('prima_tecnica_cordinacion')->nullable();
            // $table->integer('prima_tecnica_fs')->nullable();
            // $table->integer('prima_tecnica_nfs')->nullable();
            // $table->integer('prima_geografica')->nullable();
            // $table->integer('aux_trasporte')->nullable();
            // $table->integer('aux_alimentacion')->nullable();
            // $table->integer('incremento_antiguedad')->nullable();
            // $table->integer('total');

            // $table->unsignedInteger('delegado_id');
            // $table->foreign('delegado_id')->references('id')->on('delegados');

            // $table->unsignedInteger('user_crear_id');
            // $table->foreign('user_crear_id')->references('id')->on('users');

            // $table->unsignedInteger('user_edit_id');
            // $table->foreign('user_edit_id')->references('id')->on('users');


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
        Schema::dropIfExists('histcontratos');
    }
}
