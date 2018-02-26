<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DataBaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(DepartamentoTableSeeder::class);
        $this->call(TipoEmpresaTableSeeder::class);

        Model::reguard();
    }
}
