<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'Empresa';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['version', 'Num', 'Empresa', 'NIT', 'Red', 'TipoActividad', 'RepresentanteLegal', 'NroSucursal','TipoEmpresa','FechaInscripcion', 'Estado', 'Departamento', 'Direccion', 'Telefono', 'Email', 'WebPage','Notas',
                                    'CreatorUser','CreatorFullName','CreationIP','UpdaterUser','UpdaterFullName','UpdaterIP'];

    public function esTipoActividad(){
        return $this->belongsTo('App\TipoActividad','TipoActividad');
    }

    public function esRed(){
        return $this->belongsTo('App\Red','Red');
    }

    public function esTipoEmpresa(){
        return $this->belongsTo('App\TipoEmpresa','TipoEmpresa');
    }

    public function esDepartamento(){
        return $this->belongsTo('App\Departamento','Departamento');
    }

    public function susEmpresaPermiso(){
        return $this->hasMany('App\EmpresaPermiso','Empresa')->orderBy('FechaEmision','desc');
    }

    public function susEmpresaDocumento(){
        return $this->hasMany('App\EmpresaDocumento','Empresa')->orderBy('Fecha','desc');
    }

    public function susUsuario()
    {
        return $this->hasMany('App\Usuario','Empresa');
    }

    /*scopes*/
    public function scopeActivo($query){
        return $query->where('Estado',true);
    }
    /*scopes*/
}
