<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Estadisticarechazo extends Model
{
    protected $table = "estadisticarechazos";
    protected $fillable = ['numdocumento', 'numpreparacion', 'name', 'origenrechazo_id', 'tipotramite_id', 'departamento_id', 'municipio_id', 'oficina_id', 'fecpreparacion',
    'feccargue', 'fecrechazo', 'codigosrechazo_id', 'hit', 'direccion', 'telefono', 'Of_solicitud', 'estado_id', 'observacion_1', 'fec_observacion_1', 'user1_id',
    'observacion_2', 'fec_observacion_2', 'user2_id', 'observacion_3', 'fec_observacion_3', 'user3_id', 'fechacierre', 'descripcion_solucion', 'userc_id'];
    protected $guarded = ['id'];

    public function scopeRechazospordep($consulta){
        return $consulta->where('departamento_id', auth()->user()->departamento_id);
    }
}
