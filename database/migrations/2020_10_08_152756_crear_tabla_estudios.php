<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaEstudios extends Migration
{

    public function up()
    {
        Schema::create('estudios', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('funcionario_id');
            $table->foreign('funcionario_id', 'fk_estudios_funcionarios')->references('id')->on('funcionarios')->onDelete('restrict')->onUpdate('restrict');

            $table->unsignedBigInteger('niveleducativo_id');
            $table->foreign('niveleducativo_id', 'fk_estudios_niveleducativo')->references('id')->on('niveleseducativos')->onDelete('restrict')->onUpdate('restrict');

            $table->unsignedBigInteger('titulosdeformacion_id');
            $table->foreign('titulosdeformacion_id', 'fk_estudios_titulosdeformacion')->references('id')->on('titulosdeformacion')->onDelete('restrict')->onUpdate('restrict');

            $table->date('fechainicio');
            $table->date('fechafinal');
            $table->string('institucion');
            $table->Integer('obtuvotitulo');
            $table->Integer('semestres')->nullable();

            $table->softDeletes();//Nueva línea, para el borrado lógico

            $table->timestamps();
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_spanish_ci';
        });
    }


    public function down()
    {
        Schema::dropIfExists('estudios');

    }
}
