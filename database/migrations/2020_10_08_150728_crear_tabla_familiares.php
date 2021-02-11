<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaFamiliares extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('familiares', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('funcionario_id');
            $table->foreign('funcionario_id', 'fk_familiares_funcionarios')->references('id')->on('funcionarios')->onDelete('restrict')->onUpdate('restrict');

            $table->unsignedBigInteger('parentesco_id');
            $table->foreign('parentesco_id', 'fk_familiares_parentescos')->references('id')->on('parentescos')->onDelete('restrict')->onUpdate('restrict');

            $table->integer('cedula')->nullable();
            $table->string('name');

            $table->date('nacimiento')->nullable();
            $table->string('movil')->nullable();
            $table->string('direccion')->nullable();

            $table->integer('porcentpoliza')->nullable();
            $table->integer('porcentpolizacontingente')->nullable();
            $table->string('ocupacion')->nullable();


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
        Schema::dropIfExists('familiares');
    }
}
