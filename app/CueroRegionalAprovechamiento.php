<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CueroRegionalAprovechamiento extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'CueroRegionalAprovechamiento';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['version', 'Num', 'Fecha','Comunidad', 'CueroRegional', 'Cupo', 'CupoAprovechado', 'CueroRechazado', 'CueroVendido', 'Empresa', 
                                    'UsuarioRegistro', 'CreatorUser','CreatorFullName','UpdaterUser','UpdaterFullName'];

        public function esEmpresa(){
        return $this->belongsTo('App\Empresa','Empresa');
    }

    public function esUsuarioRegistro(){
        return $this->belongsTo('App\Usuario','UsuarioRegistro');
    }
    
    public function esUsuarioVerifica(){
        return $this->belongsTo('App\Usuario','UsuarioVerifica');
    }
    
    public function esUsuarioAprueba(){
        return $this->belongsTo('App\Usuario','UsuarioAprueba');
    }

    public function esRed(){
        if($this->TipoFormulario=='C')
            return 'Carne';
        elseif($this->TipoFormulario=='P')
            return 'Cuero';
        else
            return 'N/D';
    }

    public function esCompraVenta(){
        if($this->CompraVenta=='C')
            return 'Compra';
        elseif($this->CompraVenta=='V')
            return 'Venta';
        else
            return 'N/D';
    }

    public function classFormulario(){
        switch ($this->EstadoFormulario) {
            case 1: //Pendiente
                return '';
                break;
            case 2: //Observado
                return 'red lighten-3';
                break;
            case 3: //Aprobado
                return 'green lighten-3';
                break;
            case 4: //Anulado
                return 'yellow lighten-3';
                break;
            default:
                return '';
                break;
        }
    }
    public function susFormularioDetalle(){
        return $this->hasMany('App\FormularioDetalle','Formulario');
    }

    public function generaCodigo()
    {
        $this->Formulario = md5(uniqid().\Carbon\Carbon::now());
    }

}