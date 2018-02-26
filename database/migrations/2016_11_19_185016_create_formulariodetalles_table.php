<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFormulariodetallesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('FormularioDetalle', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('version')->unsigned()->nullable();
            $table->integer('Num')->unsigned()->nullable();
            $table->integer('Formulario')->unsigned();
            $table->date('Fecha');
            $table->string('TipoPlato')->nullable();
            $table->double('CantidadPlatos')->nullable();
            $table->double('Charque')->nullable();
            $table->double('CarnePrimera')->nullable();
            $table->double('CarneSegunda')->nullable();
            $table->double('TotalCarne')->nullable();
            $table->double('Precio')->nullable();
            
            $table->string('NombreProveedor')->nullable();
            $table->string('Producto')->nullable();
            $table->integer('TipoProducto')->unsigned()->nullable();
            $table->double('CantidadProducto')->nullable();
            $table->integer('UnidadMedida')->unsigned()->nullable();

            $table->string('Documento')->nullable();
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

            $table->foreign('Formulario')->references('id')->on('Formulario');
            $table->foreign('TipoProducto')->references('id')->on('TipoProducto');
            $table->foreign('UnidadMedida')->references('id')->on('UnidadMedida');
        });
            
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('FormularioDetalle');
    }

}
