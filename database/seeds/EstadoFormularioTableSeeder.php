<?php

use Illuminate\Database\Seeder;

class EstadoFormularioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('EstadoFormulario')->insert(['Num'=>1, 'EstadoFormulario'=>'Pendiente','created_at'=>\Carbon\Carbon::now(),'updated_at'=>\Carbon\Carbon::now()]);
        DB::table('EstadoFormulario')->insert(['Num'=>2, 'EstadoFormulario'=>'Observado','created_at'=>\Carbon\Carbon::now(),'updated_at'=>\Carbon\Carbon::now()]);
        DB::table('EstadoFormulario')->insert(['Num'=>3, 'EstadoFormulario'=>'Aprobado','created_at'=>\Carbon\Carbon::now(),'updated_at'=>\Carbon\Carbon::now()]);
        DB::table('EstadoFormulario')->insert(['Num'=>4, 'EstadoFormulario'=>'Anulado','created_at'=>\Carbon\Carbon::now(),'updated_at'=>\Carbon\Carbon::now()]);
    }
}
