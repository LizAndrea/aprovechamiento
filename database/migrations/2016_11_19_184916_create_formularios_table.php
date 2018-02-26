<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFormulariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Formulario', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('version')->unsigned()->nullable();
            $table->integer('Num')->unsigned()->nullable();
            $table->date('Fecha')->nullable();
            $table->integer('NumeroFormulario')->nullable();
            $table->string('Formulario',150)->nullable();
            $table->string('TipoFormulario',1); //'C'=>Carne,'P' =>Producto
            $table->string('CompraVenta',1); //'C'=>Compra, 'V'=>Venta
            $table->integer('EstadoFormulario')->unsigned()->nullable();
            $table->integer('Empresa')->unsigned()->nullable();
            $table->integer('UsuarioRegistro')->unsigned()->nullable();
            $table->date('FechaRegistro')->nullable();
            $table->integer('UsuarioVerifica')->unsigned()->nullable();
            $table->date('FechaVerifica')->nullable();
            $table->integer('UsuarioAprueba')->unsigned()->nullable();
            $table->date('FechaAprueba')->nullable();

            $table->timestamps();
            $table->string('CreatorUser',200)->nullable();
            $table->string('CreatorFullName',200)->nullable();
            $table->string('CreationIP',200)->nullable();
            $table->string('UpdaterUser',200)->nullable();
            $table->string('UpdaterFullName',200)->nullable();
            $table->string('UpdaterIP',200)->nullable();
        
            $table->foreign('EstadoFormulario')->references('id')->on('EstadoFormulario');
            $table->foreign('Empresa')->references('id')->on('Empresa');
            $table->foreign('UsuarioRegistro')->references('id')->on('Usuario');
            $table->foreign('UsuarioVerifica')->references('id')->on('Usuario');
            $table->foreign('UsuarioAprueba')->references('id')->on('Usuario');
        });
                
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('Formulario');
    }

}
