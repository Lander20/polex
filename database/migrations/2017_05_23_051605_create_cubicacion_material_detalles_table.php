<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCubicacionMaterialDetallesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cubicacion_material_detalles', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('id_cubicacion')->unsigned();
            $table->foreign('id_cubicacion')
                ->references('id')->on('cubicacions')
                ->onDelete('cascade');

            $table->integer('id_material');
            $table->integer('position');
            $table->double('positionX');
            $table->double('positionY');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('cubicacion_material_detalles');
    }
}
