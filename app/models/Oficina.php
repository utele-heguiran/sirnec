<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Oficina extends Model
{
    protected $table = "oficinas";
    protected $fillable = ['departamento_id','municipio_id', 'claseoficina_id', 'name', 'namescr', 'codpmt', 'diastrasporte', 'direccion', 'telefono_fijo', 'codigopostal', 'estado_id'];
    protected $guarded = ['id'];

    public function Estadisticaregistro(){
        return $this->hasMany(Estadisticaregistro::class, 'oficina_id' );
    }

    public function scopeOficinasdepartamentoact($consulta){
        return $consulta->where('departamento_id', auth()->user()->departamento_id)->where('estado_id', 1);
    }
    public function scopeOficinasdepartamento($consulta){
        return $consulta->where('departamento_id', auth()->user()->departamento_id);
    }


}
