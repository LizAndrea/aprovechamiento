<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class FormularioDetalle extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'FormularioDetalle';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['version', 'Num', 'Formulario', 'Fecha', 'TipoPlato', 'CantidadPlatos', 'Charque', 'CarnePrimera', 'CarneSegunda', 'TotalCarne', 'Precio','NombreProveedor','Producto','TipoProducto','CantidadProducto','UnidadMedida','Documento', 'Observaciones', 'FileName', 'OutPutFileName', 'FileType',
                'CreatorUser','CreatorFullName','CreationIP','UpdaterUser','UpdaterFullName','UpdaterIP'];

    public function esFormulario(){
        return $this->belongsTo('App\Formulario','Formulario');
    }

    public function esTipoProducto(){
        return $this->belongsTo('App\TipoProducto','TipoProducto');
    }

    public function esUnidadMedida(){
        return $this->belongsTo('App\UnidadMedida','UnidadMedida');
    }

    public function totalizaCarne(){
        $this->TotalCarne += $this->Charque != null ? $this->Charque : 0;
        $this->TotalCarne += $this->Charque != null ? $this->CarnePrimera : 0;
        $this->TotalCarne += $this->Charque != null ? $this->CarneSegunda : 0;
    }
}
