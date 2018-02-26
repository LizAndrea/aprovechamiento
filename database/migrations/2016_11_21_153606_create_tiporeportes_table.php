<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTiporeportesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('TipoReporte', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('version')->unsigned()->nullable();
            $table->integer('Num')->unsigned()->nullable();
            $table->string('TipoReporte',150)->unique();
            $table->string('Parametros',500)->nullable();
            $table->string('Requerimientos',500)->nullable();
            $table->boolean('Activo');
            $table->integer('Empresa')->nullable();
            $table->string('XLSXFileName');
            $table->text('DefinicionReporte');

            $table->timestamps();
            $table->string('CreatorUser',200)->nullable();
            $table->string('CreatorFullName',200)->nullable();
            $table->string('CreationIP',200)->nullable();
            $table->string('UpdaterUser',200)->nullable();
            $table->string('UpdaterFullName',200)->nullable();
            $table->string('UpdaterIP',200)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('TipoReporte');
    }

}
