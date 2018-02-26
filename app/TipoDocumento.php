<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoDocumento extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'TipoDocumento';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['version', 'Num', 'TipoDocumento', 'Obligatorio', 'PublicadoWeb','Descripcion','FileType','OutPutFileName','Filetype',
                                'CreatorUser','CreatorFullName','CreationIP','UpdaterUser','UpdaterFullName','UpdaterIP'];

    public function fileTypeIcon(){
        switch($this->FileType){
            case 'variable':
                return 'jpg';
                break;
            case 'png':
                return '';
                break;
            case 'gif':
                return '';
                break;
            case 'doc':
                return '';
                break;
            case 'docx':
                return '';
                break;
            case 'xls':
                return '';
                break;
            case 'xlsx':
                return '';
                break;
            case 'pdf':
                return 'pdf.ico';
                break;
            default:
                return '';
                break;
        }

    }


    /*scopes*/
    public function scopeObligatorio($query){
        return $query->where('Obligatorio',true);
    }

    public function scopePublicadoWeb($query){
        return $query->where('PublicadoWeb',true);
    }

    /*scopes*/
}
