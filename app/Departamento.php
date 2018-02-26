<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'Departamento';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['Num', 'Departamento'];

}
