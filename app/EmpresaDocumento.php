<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmpresaDocumento extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'EmpresaDocumento';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['version', 'Num', 'Empresa', 'EmpresaDocumento', 'TipoDocumento', 'Fecha', 'FechaVencimiento', 'Notas','FileName','OutPutFileName','FileType',
                                    'CreatorUser','CreatorFullName','CreationIP','UpdaterUser','UpdaterFullName','UpdaterIP'];

    public function esTipoDocumento(){
        return $this->belongsTo('App\TipoDocumento','TipoDocumento');
    }

    public function esEmpresa(){
        return $this->belongsTo('App\Empresa','Empresa');
    }
}
