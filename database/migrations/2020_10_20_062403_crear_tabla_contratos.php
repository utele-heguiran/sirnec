<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaContratos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contratos', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('funcionario_id');
            $table->foreign('funcionario_id', 'fk_contratos_funcionarios')->references('id')->on('funcionarios')->onDelete('restrict')->onUpdate('restrict');

            $table->unsignedBigInteger('clascontrato_id');
            $table->foreign('clascontrato_id', 'fk_contratos_clascontratos')->references('id')->on('clascontratos')->onDelete('restrict')->onUpdate('restrict');

            $table->unsignedBigInteger('departamento_id');
            $table->foreign('departamento_id', 'fk_contratos_departamentos')->references('id')->on('departamentos')->onDelete('restrict')->onUpdate('restrict');

            $table->unsignedBigInteger('oficina_id')->nullable();
            $table->foreign('oficina_id', 'fk_contratos_oficinas')->references('id')->on('oficinas')->onDelete('restrict')->onUpdate('restrict');

            $table->unsignedBigInteger('ubicacioncargo_id')->nullable();
            $table->foreign('ubicacioncargo_id', 'fk_contratos_ubicacioncargos')->references('id')->on('ubicacioncargos')->onDelete('restrict')->onUpdate('restrict');

            $table->unsignedBigInteger('cargo_id');
            $table->foreign('cargo_id', 'fk_contratos_cargos')->references('id')->on('cargos')->onDelete('restrict')->onUpdate('restrict');

            $table->unsignedBigInteger('especificacioncargos_id');
            $table->foreign('especificacioncargos_id', 'fk_contratos_especificacioncargos')->references('id')->on('especificacioncargos')->onDelete('restrict')->onUpdate('restrict');

            $table->date('fechaviavilidad')->nullable();
            $table->integer('clase_id');

            $table->integer('numactaposecion')->nullable();
            $table->date('fechaactaposesion')->nullable();
            $table->integer('numresolucion');
            $table->date('fecharesolucion');
            $table->integer('numcertificacion')->nullable();
            $table->date('fechacertificacion')->nullable();
            $table->integer('oficpostulacion')->nullable();
            $table->date('fechaoficiopostulacion')->nullable();

            $table->date('fechainicial');
            $table->date('fechaterminacion');

            $table->string('certdiciplinariosprocuraduria')->nullable();
            $table->string('certantecedentespolicia')->nullable();
            $table->string('certresponsabilidadfiscalcontraloria')->nullable();
            $table->string('certmedidascorrectivaspolicia')->nullable();

            $table->unsignedBigInteger('funcionario2_id')->nullable();
            $table->foreign('funcionario2_id', 'fk_contratos_funcionario2_id')->references('id')->on('funcionarios')->onDelete('restrict')->onUpdate('restrict');

            $table->unsignedBigInteger('cargo2_id')->nullable();
            $table->foreign('cargo2_id', 'fk_contratos_cargos2')->references('id')->on('cargos')->onDelete('restrict')->onUpdate('restrict');

            $table->unsignedBigInteger('oficina2_id')->nullable();
            $table->foreign('oficina2_id', 'fk_contratos_oficinas2')->references('id')->on('oficinas')->onDelete('restrict')->onUpdate('restrict');

            $table->string('notaencargodespachos')->nullable();

            $table->unsignedBigInteger('delegado1_id')->nullable();
            $table->foreign('delegado1_id', 'fk_contratos_delegado1')->references('id')->on('funcionarios')->onDelete('restrict')->onUpdate('restrict');

            $table->unsignedBigInteger('delegado2_id')->nullable();
            $table->foreign('delegado2_id', 'fk_contratos_delegado2')->references('id')->on('funcionarios')->onDelete('restrict')->onUpdate('restrict');

            $table->unsignedBigInteger('cordinador_id')->nullable();
            $table->foreign('cordinador_id', 'fk_contratos_cordinador')->references('id')->on('funcionarios')->onDelete('restrict')->onUpdate('restrict');

            $table->unsignedBigInteger('registrador_id')->nullable();
            $table->foreign('registrador_id', 'fk_contratos_registrador')->references('id')->on('funcionarios')->onDelete('restrict')->onUpdate('restrict');

            $table->unsignedBigInteger('estado_id')->nullable();
            $table->foreign('estado_id', 'fk_contratos_estados')->references('id')->on('estados')->onDelete('restrict')->onUpdate('restrict');

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id', 'fk_contratos_usuario')->references('id')->on('usuarios')->onDelete('restrict')->onUpdate('restrict');

            $table->softDeletes();//Nueva línea, para el borrado lógico
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
        Schema::dropIfExists('contratos');
    }
}
