<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Red extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'Red';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['version', 'Num', 'Red',
                                    'CreatorUser','CreatorFullName','CreationIP','UpdaterUser','UpdaterFullName','UpdaterIP'];

}
