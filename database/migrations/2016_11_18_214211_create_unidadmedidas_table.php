 <?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUnidadmedidasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('UnidadMedida', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('version')->unsigned()->nullable();
            $table->integer('Num')->unsigned()->nullable();
            $table->string('UnidadMedida',150)->unique();
            $table->double('Equivalencia1')->nullable();
            $table->double('Equivalencia2')->nullable();
            $table->double('Equivalencia3')->nullable();
            $table->double('Equivalencia4')->nullable();;
            $table->double('Equivalencia5')->nullable();;
            $table->double('Equivalencia6')->nullable();;

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
        Schema::drop('UnidadMedida');
    }

}
