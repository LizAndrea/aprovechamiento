<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmpresaPermiso extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'EmpresaPermiso';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['version', 'Num', 'Empresa','EmpresaPermiso', 'FechaEmision', 'FechaVencimiento', 'Vigente', 'Observaciones', 'FileName', 'OutPutFileName', 'FileType',
                'CreatorUser','CreatorFullName','CreationIP','UpdaterUser','UpdaterFullName','UpdaterIP'];

    public function esEmpresa(){
        return $this->belongsTo('App\Empresa','Empresa');
    }
}
