<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoActividad extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'TipoActividad';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['version', 'Num', 'Codigo', 'TipoActividad',
                                    'CreatorUser','CreatorFullName','CreationIP','UpdaterUser','UpdaterFullName','UpdaterIP'];


}
