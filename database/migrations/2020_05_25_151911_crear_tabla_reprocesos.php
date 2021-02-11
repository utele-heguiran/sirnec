<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaReprocesos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reprocesos', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('departamento_id');
            $table->foreign('departamento_id', 'fk_reprocesos_departamento')->references('id')->on('departamentos')->onDelete('restrict')->onUpdate('restrict');
            
            $table->unsignedBigInteger('oficina_id');
            $table->foreign('oficina_id', 'fk_reprocesos_oficina')->references('id')->on('oficinas')->onDelete('restrict')->onUpdate('restrict');

            $table->date('feccreacion');
            $table->bigInteger('nuip')->nullable();
            $table->string('numpreparacion')->nullable();
            $table->string('numreproceso')->nullable();
            $table->string('factor')->nullable();
            $table->text('observaciones')->nullable();

            $table->unsignedBigInteger('estado_id');
            $table->foreign('estado_id', 'fk_reprocesos_estado')->references('id')->on('estados')->onDelete('restrict')->onUpdate('restrict');

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id', 'fk_reprocesos_user')->references('id')->on('usuarios')->onDelete('restrict')->onUpdate('restrict');
            
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
        Schema::dropIfExists('reprocesos');
    }
}
