<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Materialanulado extends Model
{
    protected $table = "materialesanulados";
    protected $fillable = ['lote_id', 'departamento_id', 'oficina_id', 'numlote', 'feccrealote', 'numpreparacion', 'nuip', 'numoficenvio', 'motivosdestrucciones_id', 'claseformatos_id', 'actadestruccion', 'fechadestruccion', 'estado_id',  'user_id'];
    protected $guarded = ['id'];
}
