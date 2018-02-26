<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRolColumnUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('Usuario', function(Blueprint $table){
            $table->integer('Rol')->unsigned()->nullable();
            $table->foreign('Rol')->references('id')->on('Rol');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('Usuario', function(Blueprint $table){
            $table->dropColumn('Rol');
        });
    }
}
