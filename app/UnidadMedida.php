<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UnidadMedida extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'UnidadMedida';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['version', 'Num', 'UnidadMedidad', 'Equivalencia1', 'Equivalencia2', 'Equivalencia3', 'Equivalencia4', 'Equivalencia5', 'Equivalencia6',
                                    'CreatorUser','CreatorFullName','CreationIP','UpdaterUser','UpdaterFullName','UpdaterIP'];

}
