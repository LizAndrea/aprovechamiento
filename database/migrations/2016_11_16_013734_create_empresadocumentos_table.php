<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEmpresadocumentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('EmpresaDocumento', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('version')->unsigned()->nullable();
            $table->integer('Num')->unsigned()->nullable();
            $table->integer('Empresa')->unsigned()->nullable();
            $table->string('EmpresaDocumento',150);
            $table->integer('TipoDocumento')->unsigned()->nullable();
            $table->date('Fecha')->nullable();
            $table->string('Notas')->nullable();
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
            $table->foreign('TipoDocumento')->references('id')->on('TipoDocumento');
        });
            
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('EmpresaDocumento');
    }

}
