<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Devolucion extends Model
{
    protected $table = "devoluciones";
    protected $fillable = [ 'departamento_id', 'numpreparacion', 'numdocumento', 'name', 'clasedevolucion_id', 'clasetramite_id', 'tipotramite_id', 'oficina_id', 'fecpreparacion', 'numpreparacionremplazo', 'estado_id', 'numoficiodevolucion', 'fecdevolucion', 'fecenvio', 'path', 'observacion_1', 'fec_observacion_1', 'user1_id', 'observacion_2', 'fec_observacion_2', 'user2_id', 'observacion_3', 'fec_observacion_3', 'user3_id', 'numoficiocierre', 'fechacierre', 'descripcion_solucion', 'userc_id' ];
    protected $guarded = ['id'];
}
