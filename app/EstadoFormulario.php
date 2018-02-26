<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EstadoFormulario extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'EstadoFormulario';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['Num', 'EstadoFormulario'];

}
