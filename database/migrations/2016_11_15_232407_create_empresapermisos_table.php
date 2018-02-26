<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEmpresapermisosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('EmpresaPermiso', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('version')->unsigned()->nullable();
            $table->integer('Num')->unsigned()->nullable();
            $table->integer('Empresa')->unsigned()->nullable();;
            $table->string('EmpresaPermiso')->nullable();
            $table->date('FechaEmision');
            $table->date('FechaVencimiento')->nullable();
            $table->boolean('Vigente');
            $table->string('Observaciones')->nullable();
            $table->string('FileName')->nullable();
            $table->string('OutPutFileName')->nullable();
            $table->string('FileType')->nullable();

            $table->timestamps();
            $table->string('CreatorUser',200)->nullable();
            $table->string('CreatorFullName',200)->nullable();
            $table->string('CreationIP',200)->nullable();
            $table->string('UpdaterUser',200)->nullable();
            $table->string('UpdaterFullName',200)->nullable();
            $table->string('UpdaterIP',200)->nullable();

            $table->foreign('Empresa')->references('id')->on('Empresa');
        });
            
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('EmpresaPermiso');
    }

}
