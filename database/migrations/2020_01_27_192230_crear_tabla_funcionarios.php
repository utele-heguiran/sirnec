<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaFuncionarios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('funcionarios', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('cedula')->unique();

            $table->unsignedBigInteger('deparcedula_id');
            $table->foreign('deparcedula_id', 'fk_funcionarios_deparcedula')->references('id')->on('departamentos')->onDelete('restrict')->onUpdate('restrict');

            $table->unsignedBigInteger('municcedula_id');
            $table->foreign('municcedula_id', 'fk_funcionarios_municcedula')->references('id')->on('municipios')->onDelete('restrict')->onUpdate('restrict');

            $table->unsignedBigInteger('departamento_id')->nullable();
            $table->foreign('departamento_id', 'fk_funcionarios_departamentos')->references('id')->on('departamentos')->onDelete('restrict')->onUpdate('restrict');

            $table->date('expedicion');

            $table->string('name');
            $table->date('nacimiento');

            $table->unsignedBigInteger('paisnacimiento_id');
            $table->foreign('paisnacimiento_id', 'fk_funcionarios_paisnacimiento')->references('id')->on('paises')->onDelete('restrict')->onUpdate('restrict');

            $table->unsignedBigInteger('deparnacimiento_id');
            $table->foreign('deparnacimiento_id', 'fk_funcionarios_deparnacimiento')->references('id')->on('departamentos')->onDelete('restrict')->onUpdate('restrict');

            $table->unsignedBigInteger('municnacimiento_id');
            $table->foreign('municnacimiento_id', 'fk_funcionarios_municnacimiento')->references('id')->on('municipios')->onDelete('restrict')->onUpdate('restrict');

            $table->unsignedBigInteger('genero_id');
            $table->foreign('genero_id', 'fk_funcionarios_genero')->references('id')->on('generos')->onDelete('restrict')->onUpdate('restrict');

            $table->unsignedBigInteger('estadocivil_id');
            $table->foreign('estadocivil_id', 'fk_funcionarios_estadocivil')->references('id')->on('estadosciviles')->onDelete('restrict')->onUpdate('restrict');

            $table->unsignedBigInteger('clasmilitar_id');
            $table->foreign('clasmilitar_id', 'fk_funcionarios_clasmilitar')->references('id')->on('claslibmils')->onDelete('restrict')->onUpdate('restrict');

            $table->string('libreta_militar')->nullable();
            $table->string('distrito')->nullable();

            $table->unsignedBigInteger('rh_id');
            $table->foreign('rh_id', 'fk_funcionarios_rh')->references('id')->on('rhs')->onDelete('restrict')->onUpdate('restrict');

            $table->string('direccion');

            $table->unsignedBigInteger('barrio_id');
            $table->foreign('barrio_id', 'fk_funcionarios_barrio')->references('id')->on('barrios')->onDelete('restrict')->onUpdate('restrict');

            $table->string('telefono_fijo')->nullable();
            $table->string('movil');
            $table->string('emailpersonal')->nullable();
            $table->string('emailcorporativo')->nullable();

            $table->unsignedBigInteger('estado_id');
            $table->foreign('estado_id', 'fk_funcionarios_estado')->references('id')->on('estados')->onDelete('restrict')->onUpdate('restrict');

            $table->string('name_contacto');
            $table->string('movil_contacto');
            $table->Integer('personasacargo');

            $table->Integer('incrementoantiguedad')->nullable();
            $table->Integer('auxiliotrasporte')->nullable();
            $table->Integer('ley4ta')->nullable();
            $table->Integer('primatecnicafs')->nullable();
            $table->Integer('primatecnicanfs')->nullable();
            $table->Integer('primageografica')->nullable();
            $table->Integer('auxilioalimentacion')->nullable();

            $table->unsignedBigInteger('banco_id');
            $table->foreign('banco_id', 'fk_funcionarios_bancos')->references('id')->on('bancos')->onDelete('restrict')->onUpdate('restrict');

            $table->unsignedBigInteger('tipocuenta_id');
            $table->foreign('tipocuenta_id', 'fk_funcionarios_tipocuenta')->references('id')->on('tipocuentas')->onDelete('restrict')->onUpdate('restrict');

            $table->BigInteger('numcuentabanco');

            $table->unsignedBigInteger('eps_id');
            $table->foreign('eps_id', 'fk_funcionarios_eps')->references('id')->on('epss')->onDelete('restrict')->onUpdate('restrict');

            $table->unsignedBigInteger('pension_id');
            $table->foreign('pension_id', 'fk_funcionarios_pension')->references('id')->on('fondopensiones')->onDelete('restrict')->onUpdate('restrict');

            $table->unsignedBigInteger('caja_id');
            $table->foreign('caja_id', 'fk_funcionarios_cajacompensacion')->references('id')->on('compensacioncajas')->onDelete('restrict')->onUpdate('restrict');

            $table->unsignedBigInteger('arl_id');
            $table->foreign('arl_id', 'fk_funcionarios_arl')->references('id')->on('arls')->onDelete('restrict')->onUpdate('restrict');

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
        Schema::dropIfExists('funcionarios');
    }
}
