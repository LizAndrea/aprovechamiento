<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Rol', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('version')->unsigned()->nullable();
            $table->integer('Num')->unsigned()->nullable();
            $table->string('Rol',150)->unique();
            $table->string('Descripcion',5000)->nullable();
            $table->boolean('Parametros');
            $table->boolean('Empresas');
            $table->boolean('Usuarios');
            $table->boolean('Formularios');
            $table->boolean('Reportes');
            $table->boolean('SoloEmpresa');

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
        Schema::drop('Rol');
    }

}
