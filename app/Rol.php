<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'Rol';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['version', 'Num', 'Rol', 'Descripcion', 'Parametros', 'Empresas', 'Usuarios', 'Formularios', 'Reportes', 'SoloEmpresa',
                                    'CreatorUser','CreatorFullName','CreationIP','UpdaterUser','UpdaterFullName','UpdaterIP'];
                                        

}
