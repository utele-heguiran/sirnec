<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaStss extends Migration
{
    public function up()
    {
        Schema::create('stss', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('departamento_id');
            $table->foreign('departamento_id', 'fk_stss_departamento')->references('id')->on('departamentos')->onDelete('restrict')->onUpdate('restrict');
            
            $table->unsignedBigInteger('oficina_id');
            $table->foreign('oficina_id', 'fk_stss_oficina')->references('id')->on('oficinas')->onDelete('restrict')->onUpdate('restrict');

            $table->string('numsts');
            $table->date('feccreasts');
            $table->date('fecenvsts');

            $table->unsignedBigInteger('tipotramite_id');
            $table->foreign('tipotramite_id', 'fk_stss_tipotramites')->references('id')->on('tipotramites')->onDelete('restrict')->onUpdate('restrict');

            $table->string('cantidadsts');

            $table->unsignedBigInteger('estado_id');
            $table->foreign('estado_id', 'fk_stss_estado')->references('id')->on('estados')->onDelete('restrict')->onUpdate('restrict');

            $table->date('fecverifists')->nullable();
            $table->string('observaciones')->nullable();

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id', 'fk_stss_user')->references('id')->on('usuarios')->onDelete('restrict')->onUpdate('restrict');
            
            $table->timestamps();
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_spanish_ci'; 
            
        });
    }

    public function down()
    {
        Schema::dropIfExists('stss');
    }
}
