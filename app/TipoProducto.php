<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoProducto extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'TipoProducto';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['version', 'Num', 'TipoProducto', 'Descripcion', 'Activo',
                                    'CreatorUser','CreatorFullName','CreationIP','UpdaterUser','UpdaterFullName','UpdaterIP'];

}
