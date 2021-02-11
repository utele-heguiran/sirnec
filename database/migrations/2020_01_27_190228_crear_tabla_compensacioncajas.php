<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaCompensacioncajas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compensacioncajas', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('cod');
            $table->string('name');

            $table->unsignedBigInteger('departamento_id');
            $table->foreign('departamento_id', 'fk_compensacioncajas_departamentos')->references('id')->on('departamentos')->onDelete('restrict')->onUpdate('restrict');


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
        Schema::dropIfExists('compensacioncajas');
    }
}
