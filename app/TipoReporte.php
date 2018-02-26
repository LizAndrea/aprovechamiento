<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoReporte extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'TipoReporte';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['version', 'Num', 'TipoReporte', 'Parametros','Requerimientos', 'Activo', 'Empresa', 'XLSXFileName', 'DefinicionReporte',
                                    'CreatorUser','CreatorFullName','CreationIP','UpdaterUser','UpdaterFullName','UpdaterIP'];

    public function validaRequerimientos(){
        $vars = explode(',', $this->Requerimientos);
        if(sizeof($vars) == 0)
            return false;
        foreach($vars as $var)
            $cumple = str_contains($this->DefinicionReporte,$var);
                if (!$cumple)
        return $cumple;
    }   


    /*scopes*/
    public function scopeActivo($query){
        return $query->where('Activo',true);
    }

    //scopes
}
