<?php

use Illuminate\Database\Seeder;

class TipoEmpresaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('TipoEmpresa')->insert(['Num'=>1, 'TipoEmpresa'=>'Persona Natural','created_at'=>\Carbon\Carbon::now(),'updated_at'=>\Carbon\Carbon::now()]);
        DB::table('TipoEmpresa')->insert(['Num'=>2, 'TipoEmpresa'=>'Persona Jurídica','created_at'=>\Carbon\Carbon::now(),'updated_at'=>\Carbon\Carbon::now()]);
    }
}
