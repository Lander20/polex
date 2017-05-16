<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCubicacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cubicacions', function (Blueprint $table) {
            $table->integer('id')->unsigned();
            $table->foreign('id')
                ->references('id')->on('info_cubicacions')
                ->onDelete('cascade');

            $table->integer('id_plano')->unsigned();
            $table->foreign('id_plano')
                ->references('id')->on('planos')
                ->onDelete('cascade');

            $table->integer('id_material')->unsigned();
            $table->foreign('id_material')
                ->references('id')->on('materials')
                ->onDelete('cascade');



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
        Schema::drop('cubicacions');
    }
}
