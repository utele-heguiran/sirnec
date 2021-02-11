<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaAnalisisrasra14 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('analisisrasra14', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('departamento_id');
            $table->foreign('departamento_id', 'fk_analisisrasra14_departamento')->references('id')->on('departamentos')->onDelete('restrict')->onUpdate('restrict');

            $table->Integer('ano');
            $table->boolean('clase14o13');
            $table->date('feccreacion');

            $table->text('analisis1trimestre')->nullable();
            $table->text('accionmejora1trimestre')->nullable();
            $table->unsignedBigInteger('user_id1trim')->nullable();
            $table->foreign('user_id1trim', 'fk_analisisrasra14_user1trim')->references('id')->on('usuarios')->onDelete('restrict')->onUpdate('restrict');


            $table->text('analisis2trimestre')->nullable();
            $table->text('accionmejora2trimestre')->nullable();
            $table->unsignedBigInteger('user_id2trim')->nullable();
            $table->foreign('user_id2trim', 'fk_analisisrasra14_user2trim')->references('id')->on('usuarios')->onDelete('restrict')->onUpdate('restrict');

            $table->text('analisis3trimestre')->nullable();
            $table->text('accionmejora3trimestre')->nullable();
            $table->unsignedBigInteger('user_id3trim')->nullable();
            $table->foreign('user_id3trim', 'fk_analisisrasra14_user3trim')->references('id')->on('usuarios')->onDelete('restrict')->onUpdate('restrict');

            $table->text('analisis4trimestre')->nullable();
            $table->text('accionmejora4trimestre')->nullable();

            $table->unsignedBigInteger('user_id4trim')->nullable();
            $table->foreign('user_id4trim', 'fk_analisisrasra14_user4trim')->references('id')->on('usuarios')->onDelete('restrict')->onUpdate('restrict');

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id', 'fk_analisisrasra14_user')->references('id')->on('usuarios')->onDelete('restrict')->onUpdate('restrict');

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
        Schema::dropIfExists('analisisrasra14');
    }
}
