<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaEstadisticarechazos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estadisticarechazos', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('numdocumento')->nullable();
            $table->string('numpreparacion')->nullable();
            $table->string('name')->nullable();

            $table->unsignedBigInteger('origenrechazo_id');
            $table->foreign('origenrechazo_id', 'fk_estadisticarechazos_origenrechazo')->references('id')->on('origenrechazos')->onDelete('restrict')->onUpdate('restrict');

            $table->unsignedBigInteger('tipotramite_id');
            $table->foreign('tipotramite_id', 'fk_estadisticarechazos_tipotramite')->references('id')->on('tipotramites')->onDelete('restrict')->onUpdate('restrict');
            
            $table->unsignedBigInteger('departamento_id');
            $table->foreign('departamento_id', 'fk_estadisticarechazos_departamento')->references('id')->on('departamentos')->onDelete('restrict')->onUpdate('restrict');
         
            $table->unsignedBigInteger('municipio_id');
            $table->foreign('municipio_id', 'fk_estadisticarechazos_municipio')->references('id')->on('municipios')->onDelete('restrict')->onUpdate('restrict');
         
            $table->unsignedBigInteger('oficina_id');
            $table->foreign('oficina_id', 'fk_estadisticarechazos_oficina')->references('id')->on('oficinas')->onDelete('restrict')->onUpdate('restrict');
         
            $table->date('fecpreparacion')->nullable();
            $table->date('feccargue')->nullable();
            $table->date('fecrechazo')->nullable();
            
            $table->unsignedBigInteger('codigosrechazo_id');
            $table->foreign('codigosrechazo_id', 'fk_estadisticarechazos_codigosrechazo')->references('id')->on('codigosrechazos')->onDelete('restrict')->onUpdate('restrict');
         
            $table->string('hit')->nullable();
            $table->string('direccion')->nullable();
            $table->string('telefono')->nullable();
            
            $table->string('Of_solicitud')->nullable();

            $table->unsignedBigInteger('estado_id');
            $table->foreign('estado_id', 'fk_estadisticarechazos_estado')->references('id')->on('estados')->onDelete('restrict')->onUpdate('restrict');

            $table->string('observacion_1')->nullable();
            $table->date('fec_observacion_1')->nullable();
            $table->unsignedBigInteger('user1_id')->nullable();
            $table->foreign('user1_id', 'fk_estadisticarechazos_user1')->references('id')->on('usuarios')->onDelete('restrict')->onUpdate('restrict');

            $table->string('observacion_2')->nullable();
            $table->date('fec_observacion_2')->nullable();
            $table->unsignedBigInteger('user2_id')->nullable();
            $table->foreign('user2_id', 'fk_estadisticarechazos_user2')->references('id')->on('usuarios')->onDelete('restrict')->onUpdate('restrict');

            $table->string('observacion_3')->nullable();
            $table->date('fec_observacion_3')->nullable();
            $table->unsignedBigInteger('user3_id')->nullable();
            $table->foreign('user3_id', 'fk_estadisticarechazos_user3')->references('id')->on('usuarios')->onDelete('restrict')->onUpdate('restrict');

            $table->date('fechacierre')->nullable();
            $table->string('descripcion_solucion')->nullable();
            $table->unsignedBigInteger('userc_id')->nullable();
            $table->foreign('userc_id', 'fk_estadisticarechazos_userc')->references('id')->on('usuarios')->onDelete('restrict')->onUpdate('restrict');


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
        Schema::dropIfExists('estadisticarechazos');
    }
}
