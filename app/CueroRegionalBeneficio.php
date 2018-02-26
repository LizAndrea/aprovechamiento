<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CueroRegionalBeneficio extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'CueroRegionalBeneficio';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['version', 'Num', 'Fecha','CueroRegional', 'TotalBeneficio', 'TotalGasto', 'TotalAporte', 'TotalBeneficioDistribuido', 
                                    'UsuarioRegistro', 'CreatorUser','CreatorFullName','UpdaterUser','UpdaterFullName'];


}