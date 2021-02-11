<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaLotes extends Migration
{
    public function up()
    {
        Schema::create('lotes', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('departamento_id');
            $table->foreign('departamento_id', 'fk_lotes_departamento')->references('id')->on('departamentos')->onDelete('restrict')->onUpdate('restrict');

            $table->unsignedBigInteger('oficina_id');
            $table->foreign('oficina_id', 'fk_lotes_oficina')->references('id')->on('oficinas')->onDelete('restrict')->onUpdate('restrict');

            $table->string('numlote');
            $table->date('feccrealote');
            $table->date('fecenvlote');
            $table->date('fecrecacopio');

            $table->bigInteger('cantfaltantes')->nullable();
            $table->bigInteger('cantanulados')->nullable();

            $table->bigInteger('cantdiastrasporte');
            $table->bigInteger('cantdecasrecibidas');
            $table->string('numoficenvio');
            $table->string('novedad')->nullable();

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id', 'fk_lotes_user')->references('id')->on('usuarios')->onDelete('restrict')->onUpdate('restrict');

            $table->timestamps();
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_spanish_ci';

        });
    }


    public function down()
    {
        Schema::dropIfExists('lotes');
    }
}
