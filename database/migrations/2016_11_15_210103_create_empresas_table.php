<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEmpresasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Empresa', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('version')->unsigned()->nullable();
            $table->integer('Num')->unsigned()->nullable();
            $table->string('Empresa',150)->unique();
            $table->string('NIT',50);
            $table->integer('Red')->unsigned()->nullable();;
            $table->integer('TipoActividad')->unsigned()->nullable();;
            $table->string('RepresentanteLegal',500)->nullable();
            $table->integer('TipoEmpresa')->unsigned()->nullable();
            $table->date('FechaInscripcion')->nullable();
            $table->boolean('Estado');
            $table->integer('Departamento')->unsigned()->nullable();
            $table->string('Direccion',500);
            $table->string('Telefono',250);
            $table->string('Email',250);
            $table->string('WebPage',250);
            $table->string('Notas',2500);

            $table->timestamps();
            $table->string('CreatorUser',200)->nullable();
            $table->string('CreatorFullName',200)->nullable();
            $table->string('CreationIP',200)->nullable();
            $table->string('UpdaterUser',200)->nullable();
            $table->string('UpdaterFullName',200)->nullable();
            $table->string('UpdaterIP',200)->nullable();

            $table->foreign('Red')->references('id')->on('Red');
            $table->foreign('TipoActividad')->references('id')->on('TipoActividad');
            $table->foreign('TipoEmpresa')->references('id')->on('TipoEmpresa');
            $table->foreign('Departamento')->references('id')->on('Departamento');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('Empresa');
    }

}
