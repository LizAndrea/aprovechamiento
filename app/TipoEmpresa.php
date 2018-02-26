<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoEmpresa extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'TipoEmpresa';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['Num', 'TipoEmpresa'];

}
