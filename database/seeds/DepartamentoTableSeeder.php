<?php

use Illuminate\Database\Seeder;

class DepartamentoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Departamento')->insert(['Num'=>1, 'Departamento'=>'La Paz','created_at'=>\Carbon\Carbon::now(),'updated_at'=>\Carbon\Carbon::now()]);
        DB::table('Departamento')->insert(['Num'=>2, 'Departamento'=>'Cochabamba','created_at'=>\Carbon\Carbon::now(),'updated_at'=>\Carbon\Carbon::now()]);
        DB::table('Departamento')->insert(['Num'=>3, 'Departamento'=>'Santa Cruz','created_at'=>\Carbon\Carbon::now(),'updated_at'=>\Carbon\Carbon::now()]);
        DB::table('Departamento')->insert(['Num'=>4, 'Departamento'=>'Potosí','created_at'=>\Carbon\Carbon::now(),'updated_at'=>\Carbon\Carbon::now()]);
        DB::table('Departamento')->insert(['Num'=>5, 'Departamento'=>'Oruro','created_at'=>\Carbon\Carbon::now(),'updated_at'=>\Carbon\Carbon::now()]);
        DB::table('Departamento')->insert(['Num'=>6, 'Departamento'=>'Chuquisaca','created_at'=>\Carbon\Carbon::now(),'updated_at'=>\Carbon\Carbon::now()]);
        DB::table('Departamento')->insert(['Num'=>7, 'Departamento'=>'Tarija','created_at'=>\Carbon\Carbon::now(),'updated_at'=>\Carbon\Carbon::now()]);
        DB::table('Departamento')->insert(['Num'=>8, 'Departamento'=>'Beni','created_at'=>\Carbon\Carbon::now(),'updated_at'=>\Carbon\Carbon::now()]);
        DB::table('Departamento')->insert(['Num'=>9, 'Departamento'=>'Pando','created_at'=>\Carbon\Carbon::now(),'updated_at'=>\Carbon\Carbon::now()]);
	    
    }
}
